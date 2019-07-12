<?php
// $route = new Router(Request::uri()); //搭配 .htaccess 排除資料夾名稱後解析 URL
// $route->getParameter(0); //
// try{
$path=@$_SERVER['PATH_INFO'];
// } catch (Exception $e) {
    // echo $e->getMessage();
// }
$path=ltrim($path,'/');
require 'libs/Smarty.class.php';
$smarty = new Smarty;

$msg = new \Plasticbrain\FlashMessages\FlashMessages();

date_default_timezone_set('Asia/Taipei');
// echo $path.PHP_EOL;
// $path_arr=explode('/', $path);
// echo $path;

// 用參數決定載入某頁並讀取需要的資料
switch($path){
    case "register":
    
    if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
        header('Location: home');
    }
      if(isset($_POST['submit']))
      {
        $gump = new GUMP();

        $_POST = $gump->sanitize($_POST);

        $validation_rules_array = array(
          'username'    => 'required|alpha_numeric|max_len,20|min_len,4',
          'email'       => 'required|valid_email',
          'password'    => 'required|max_len,20|min_len,8',
          'passwordConfirm' => 'required'
        );
        $gump->validation_rules($validation_rules_array);

        $filter_rules_array = array(
          'username' => 'trim|sanitize_string',
          'email'    => 'trim|sanitize_email',
          'password' => 'trim',
          'passwordConfirm' => 'trim'
        );
        $gump->filter_rules($filter_rules_array);

        $validated_data = $gump->run($_POST);

        if($validated_data === false) {
          $error = $gump->get_readable_errors(false);
          $smarty->assign('error',$error);
        } else {
          // validation successful
          foreach($validation_rules_array as $key => $val) {
            ${$key} = $_POST[$key];
          }
          $userVeridator = new UserVeridator();
          $userVeridator->isPasswordMatch($password, $passwordConfirm);
          $userVeridator->isUsernameDuplicate($username);
          $userVeridator->isEmailDuplicate($email);
          $error = $userVeridator->getErrorArray();

          foreach($error as $e){
              echo $e;
          }

        }
        //if no errors have been created carry on
        if(count($error) == 0)
        {
          //hash the password
          $passwordObject = new Password();
          $hashedpassword = $passwordObject->password_hash($password, PASSWORD_BCRYPT);

          //create the random activasion code
          $activasion = md5(uniqid(rand(),true));
          try {
              print_r($error);
              $date =  date("Y-m-d H:i:s");
              $uniqueId= mt_rand(100000, 999999);
            // 新增到資料庫
            $data_array = array(
              'wallet_account' => $uniqueId,
              'level' => "user",
              'username' => $username,
              'password' => $hashedpassword,
              'email' => $email,
              'created_at' => $date
              // 'active' => $activasion
            );

            $wallet = new Wallet();
            $output = $wallet->createWallet($uniqueId);
            if( strpos($output,"false")){
                $_SESSION['error'] = 'Create api account fail!';
                header('Location: register');
            }else{
                Database::get()->insert("users", $data_array);
                $user_id = Database::get()->getLastId();
                unset($_SESSION['error']);
                $_SESSION['level'] = 'user';
                $_SESSION['id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['wallet_account'] = $uniqueId;
                header('Location: '.'home');
            }            
          //else catch the exception and show the error.
          } catch(PDOException $e) {
              $error[] = $e->getMessage();
          }
        }
      }

        $smarty->display('view/layout/header.tpl');
        $smarty->display("view/register.tpl");
        $smarty->display('view/layout/footer.tpl');
    break;

    case "login":
      if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
          header('Location: home');
      }
      if(isset($_POST['submit']))
      {
        $gump = new GUMP();

        $_POST = $gump->sanitize($_POST);

        $validation_rules_array = array(
          'username'    => 'required|alpha_numeric|max_len,20|min_len,3',
          'password'    => 'required|max_len,20|min_len,3'
        );
        $gump->validation_rules($validation_rules_array);

        $filter_rules_array = array(
          'username' => 'trim|sanitize_string',
          'password' => 'trim',
        );
        $gump->filter_rules($filter_rules_array);

        $validated_data = $gump->run($_POST);

        if($validated_data === false) {
          $error = $gump->get_readable_errors(false);
        } else {
          // validation successful
          foreach($validation_rules_array as $key => $val) {
            ${$key} = $_POST[$key];
          }
          $userVeridator = new UserVeridator();
          $userVeridator->loginVerification($username, $password);
          $error = $userVeridator->getErrorArray();

          $smarty->assign('error',$error);

          if(count($error) == 0){
            $condition = "username = :username";
            $order_by = "1";
            $fields = "*";
            $limit = "LIMIT 1";
            $data_array = array(":username" => $username);
            $result = Database::get()->query("users", $condition, $order_by, $fields, $limit, $data_array);

            $_SESSION['level'] = $result[0]['level'];
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['username'] = $username;
            $_SESSION['wallet_account'] = $result[0]['wallet_account'];

            // check login level
            if(UserVeridator::isAdmin($_SESSION['level'])){
                header('Location: admin_home');
            } else{
                header('Location: home');
            }
          }
        }
      }

        $smarty->display('view/layout/header.tpl');
        $smarty->display("view/login.tpl");
        $smarty->display('view/layout/footer.tpl');
    break;

    case "logout":
        unset($_SESSION['avatar']);
        unset($_SESSION['level']);
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['wallet_account']);
        header('Location: login');
    break;

    case "home":
          //Random show product
          $result4 = Database::get()->execute('SELECT * FROM products ORDER BY RAND() LIMIT 3',array());
          //Get all product type
          $result5 = Database::get()->execute('SELECT type FROM products GROUP BY type',array());
          $result6 = Database::get()->execute('SELECT COUNT(*) FROM products',array());
          $smarty->assign('random_prods',$result4);
          $smarty->assign('types',$result5);

          if(isset($_GET['type'])){
              $data_array = array(
                  ':type' => $_GET['type']
              );
              // $result = Database::get()->execute('SELECT * FROM products WHERE type = :type',$data_array);
              $type_nums = Database::get()->execute('SELECT COUNT(*) FROM products WHERE type = :type',$data_array);
              $data_nums = $type_nums[0][0];
              $per = 18;
              $pages  = ceil($data_nums/$per);;

              if(!isset($_GET['page'])){
                  $page=1;
              } else {
                  $page = intval($_GET["page"]);
              }
              $start = ($page-1)*$per;
              $sql = "select * from products where type = '".$_GET['type']. "' limit ".$start.",". $per;

              $result = Database::get()->execute($sql, array());
              $page_result = array(
                  'data_nums' => $data_nums,
                  'page' => $page,
                  'pages' => $pages
              );
              $smarty->assign('flag','1');
              $smarty->assign('page',$page_result);
              $smarty->assign('products',$result);
              $smarty->assign('select_type',$_GET['type']);
          } else{
              //For pagenation
              $data_nums = $result6[0][0];
              $per = 18;
              $pages  = ceil($data_nums/$per);;

              if(!isset($_GET['page'])){
                  $page=1;
              } else {
                  $page = intval($_GET["page"]);
              }
              $start = ($page-1)*$per;
              $sql = "select * from products limit ".$start.",". $per;
              $result = Database::get()->execute($sql, array());
              $page_result = array(
                  'data_nums' => $data_nums,
                  'page' => $page,
                  'pages' => $pages
              );
              $smarty->assign('page',$page_result);
              //Get all product form database
              // $result = Database::get()->execute('SELECT * FROM products', array());
              //Get the product image from table product_images
              // $result2 = Database::get()->execute('SELECT * FROM products LEFT JOIN product_images ON products.id = product_images.product_id',array());
              //Get all table of cart_items
              $smarty->assign('products',$result);
        }
      if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
          $user_carts = Database::get()->execute("SELECT * FROM cart_items WHERE user_id = ". $_SESSION['id'],array());
          $smarty->assign('user_carts',$user_carts);
          // $smarty->display('view/home.tpl');
          //Get user image save to session
          $condition = "id = :userid";
          $order_by = "1";
          $fields = "*";
          $limit = "LIMIT 1";
          $data_array = array(":userid" => $_SESSION['id']);
          $avatar = Database::get()->query("users", $condition, $order_by, $fields, $limit, $data_array);
          $filename = $avatar[0]['avatar'];
          $_SESSION['avatar'] = $filename;

          $smarty->display('view/layout/header.tpl');
          $smarty->display('view/home.tpl');
          $smarty->display('view/layout/footer.tpl');
      } else{
          $smarty->display('view/layout/header.tpl');
          $smarty->display('view/home.tpl');
          $smarty->display('view/layout/footer.tpl');
      }
    break;

    case "admin_home":
        if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
            if(UserVeridator::isAdmin($_SESSION['level'])){
            //Get all cart_items
            $result = Database::get()->execute('SELECT * FROM cart_items',array());
            //Get all users
            $result2 = Database::get()->execute('SELECT * FROM users',array());
            //Get all products
            $result3 = Database::get()->execute('SELECT * FROM products',array());
            //For create product type dropdown
            $result4 = Database::get()->execute('SELECT type FROM products GROUP BY type',array());
            //For all orders
            $orders = Database::get()->execute('SELECT * FROM orders',array());
            $products_num = Database::get()->execute('SELECT COUNT(*) FROM products',array());
            $orders_num = Database::get()->execute('SELECT COUNT(*) FROM orders',array());
            $orders_incomplete_num = Database::get()->execute('SELECT COUNT(*) FROM orders WHERE status = 0',array());
            $orders_complete_num = Database::get()->execute('SELECT COUNT(*) FROM orders WHERE status = 1',array());
            $order_not_checks = Database::get()->execute('SELECT * FROM orders WHERE status = 0',array());
            $order_checks = Database::get()->execute("SELECT * FROM orders WHERE status = 1 ORDER BY 'update_at' DESC",array());
            $e_coins = Database::get()->execute("SELECT SUM(e_coin) as total FROM users",array());

            $smarty->assign('e_coins',$e_coins);
            $smarty->assign('shopping_carts',$result);
            $smarty->assign('users',$result2);
            // $smarty->assign('products',$result3);
            $smarty->assign('types',$result4);
            $smarty->assign('orders',$orders);
            // $smarty->assign('order_not_checks',$order_not_checks);
            // $smarty->assign('order_checks',$order_checks);

            //For product pagination
            $data_nums = $products_num[0][0];
            $per = 5;
            $pages  = ceil($data_nums/$per);

            if(!isset($_GET['page'])){
                $page=1;
            } else {
                $page = intval($_GET["page"]);
            }
            $start = ($page-1)*$per;
            $sql = "select * from products limit ".$start.",". $per;
            $page_order = Database::get()->execute($sql, array());
            $page_result = array(
                'data_nums' => $data_nums,
                'page' => $page,
                'pages' => $pages
            );
            $smarty->assign('page_prouduct',$page_result);
            $smarty->assign('products',$page_order);

            //For order pagination
            $data_nums = $orders_num[0][0];
            $per = 5;
            $pages  = ceil($data_nums/$per);

            if(!isset($_GET['page'])){
                $page=1;
            } else {
                $page = intval($_GET["page"]);
            }
            $start = ($page-1)*$per;
            $sql = "select * from orders limit ".$start.",". $per;
            $page_order = Database::get()->execute($sql, array());
            $page_result = array(
                'data_nums' => $data_nums,
                'page' => $page,
                'pages' => $pages
            );
            $smarty->assign('page',$page_result);
            $smarty->assign('orders',$page_order);
            //For order not complete pagination
            $data_nums = $orders_incomplete_num[0][0];
            $per = 5;
            $pages  = ceil($data_nums/$per);

            if(!isset($_GET['page'])){
                $page=1;
            } else {
                $page = intval($_GET["page"]);
            }
            $start = ($page-1)*$per;
            $sql = "select * from orders WHERE status = 0 limit ".$start.",". $per;
            $page_order = Database::get()->execute($sql, array());
            $page_result = array(
                'data_nums' => $data_nums,
                'page' => $page,
                'pages' => $pages
            );
            $smarty->assign('page_incomplete',$page_result);
            $smarty->assign('order_not_checks',$page_order);
            //For order complete pagination
            $data_nums = $orders_complete_num[0][0];
            $per = 5;
            $pages  = ceil($data_nums/$per);

            if(!isset($_GET['page'])){
                $page=1;
            } else {
                $page = intval($_GET["page"]);
            }
            $start = ($page-1)*$per;
            $sql = "select * from orders WHERE status = 1 ORDER BY orders.updated_at DESC limit ".$start.",". $per;
            $page_order = Database::get()->execute($sql, array());
            $page_result = array(
                'data_nums' => $data_nums,
                'page' => $page,
                'pages' => $pages
            );
            $smarty->assign('page_complete',$page_result);
            $smarty->assign('order_checks',$page_order);
            //For create new product
            if(isset($_POST['submit_product'])){
                $ext = basename($_FILES['product_image']['type']);
                echo $ext;
                try{
                    $uploadOK = 1;
                    $target_dir = "uploads/images/";
                    
                    $check = getimagesize($_FILES['product_image']['tmp_name']);

                    if($check == False){
                        echo '<div class = "alert alert-danger">Fail uploade!</div>';
                        $uploadOK = 0;
                    }
                    if($ext != "jpg" && $ext != "png" && $ext != "jpeg"&& $ext != "gif" ) {
                        echo '<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
                        $uploadOK = 0;
                    }
                    if($uploadOK == 1){
                        $filename = time() . '.' . $ext;
                        $target_file = $target_dir . $filename;
                        $data_array = array(
                            'type' => $_POST['type'],
                            'name' => $_POST['name'],
                            'stock' => $_POST['quantity'],
                            'description' => $_POST['description'],
                            'image' => $filename,
                            'price_before_discount' => $_POST['price']
                        );
                        Database::get()->insert("products",$data_array);
                        $product_id = Database::get()->getLastId();
                        $data_array = array(
                            'product_id' =>  $product_id,
                            'image' => $filename
                        );
                        Database::get()->insert("product_images",$data_array);
                        if(move_uploaded_file($_FILES["product_image"]["tmp_name"],$target_file)){
                            echo "The file ". basename( $_FILES["product_image"]["type"]) . " has been uploaded.";
                        } else {
                            echo "sorry";
                        }
                        header('Location: admin_home#product');
                    }
                } catch(PDOException $e) {
                    $error[] = $e->getMessage();
                }
            }
            //For which edit product id
            if(isset($_POST['edit'])){
                    $product_id = $_POST['product_id'];
                    $_SESSION['edit_id'] = $product_id;
                    header('Location: edit');
            }
            //For edit password
            Database::get()->execute("UPDATE users SET users.password = 123 WHERE id = 2",array());
            // var_dump($test);
            if(isset($_POST['edit_password'])){
                $edit_id = $_POST['edit_id'];
                $password = $_POST['password'];
                $passwordObject = new Password();
                
                $hashedpassword = $passwordObject->password_hash($password,PASSWORD_BCRYPT);
                Database::get()->execute("UPDATE users SET users.password = '".$hashedpassword."' WHERE id = ".$edit_id,array());
                // header('Location: admin_home#user');
            }
            //For delete user
            if(isset($_POST['delete_user'])){
                try{
                    $condition = "id = :userid";
                    $key_column = "id";
                    $id = $_POST['user_id'];
                    // $data_array = array(":userid" => $_POST['user_id']);
                    // Database::get()->delete('users',$key_column.$id);
                    Database::get()->execute('DELETE FROM users WHERE id = '. $id ,array());
                    header('Location: admin_home#user');
                } catch(PDOException $e){
                    $error[] = $e->getMessage();
                }
            }
            //For status checked
            if(isset($_POST['check_status'])){
                $check_status = $_POST['check_status'];
                foreach( $check_status as $check){
                    Database::get()->update('orders',array('status' => true),'id',$check);
                }
                header('Location: admin_home#order#all');
            }

            $smarty->display('view/layout/header.tpl');
            $smarty->display('view/admin_home.tpl');
            $smarty->display('view/layout/footer.tpl');
        } else {
            header('Location: home');
        }
        } else{
          header('Location: logout');
        }
    break;

    case "profile":
        if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
            $condition = "id = :userid";
            $order_by = "1";
            $fields = "*";
            $limit = "LIMIT 1";
            $data_array = array(":userid" => $_SESSION['id']);
            $result = Database::get()->query("users", $condition, $order_by, $fields, $limit, $data_array);
            $filename = $result[0]['avatar'];
            $smarty->assign('avatar',$filename);
            $smarty->assign('users',$result);
            $users = Database::get()->execute('SELECT * FROM users WHERE id ='. $_SESSION['id'],array());

            $url = "http://phili.test/wallet.class.php?action=get_wallet&userid=".$result[0]['wallet_account'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);
            // echo $output;
            $output = json_decode($output,true);
            Database::get()->update('users',array('money'=>$output['data'][0]['amount']),'id',$_SESSION['id']);

            $results = Database::get()->execute('SELECT * FROM cart_items WHERE user_id = :userid',$data_array);

            $orders = Database::get()->execute('SELECT * FROM orders WHERE user_id = :userid',$data_array);
            $recharges = Database::get()->execute("SELECT * FROM recharge WHERE user_id = ". $_SESSION['id'],array());
            $data_array = array(
                ":userid" => $_SESSION['id'],
                ":status" => '1'
            );
            $order_checks = Database::get()->execute('SELECT * FROM orders WHERE user_id = :userid and status = :status',$data_array);
            $data_array = array(
                ":userid" => $_SESSION['id'],
                ':status' => '0'
            );
            $order_not_checks = Database::get()->execute('SELECT * FROM orders WHERE user_id = :userid and status = :status',$data_array);

            $smarty->assign('users',$users);
            $smarty->assign('money',$output['data'][0]['amount']);
            $smarty->assign('shopping_carts',$results);
            $smarty->assign('orders',$orders);
            $smarty->assign('recharges',$recharges);
            $smarty->assign('order_checks',$order_checks);
            $smarty->assign('order_not_checks',$order_not_checks);

            if(isset($_POST['del_product'])){
                $id = $_POST['del_product_id'];
                Database::get()->execute('DELETE FROM cart_items WHERE id = '. $id ,array());

                header('Location: profile#shopping_cart');
            }

            if(isset($_POST['submit'])){
                try{
                    $target_dir = "uploads/";

                    $uploadOK = 1;
                    $ext = basename($_FILES["avatar"]["type"]);
                    $check = getimagesize($_FILES['avatar']['tmp_name']);
                    //Check if image file is a actual image or fake image
                    if($check !== False){
                    } else{
                        // echo '<div class="alert alert-danger">Sorry, you don\'t select a file.</div>';
                        $uploadOK = 0;
                    }
                    //Allow these type format
                    if($ext != "jpg" && $ext != "png" && $ext != "jpeg"&& $ext != "gif" ) {
                        echo '<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
                        $uploadOK = 0;
                    }
                    if ($uploadOK == 0) {}
                        else{
                            // echo '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
                            // $smarty->assign('error',$result);

                        }
                    if($uploadOK == 0){
                        // echo "<script>alert('uploadFail')</script>";
                    } else {
                        //Delete local file before upload
                        if(file_exists($target_dir . $filename)){
                            unlink($target_dir . $filename);
                            echo "file del";
                        } else{
                            echo "no file";
                        }

                        $filename = time() . '.' . $ext;
                        $target_file = $target_dir . $filename;
                        $date =  date("Y-m-d H:i:s");
                        $data_array = array(
                            'avatar' => $filename,
                            'updated_at' => $date
                        );
                        Database::get()->update("users",$data_array,"id",$_SESSION['id']);

                        if(move_uploaded_file($_FILES["avatar"]["tmp_name"],$target_file)){
                            echo "The file t ". basename( $_FILES["avatar"]["type"]) . " has been uploaded.";

                            $_SESSION['avatar'] = $filename;
                            // $smarty->assign('avatar',$filename);
                        } else {
                            echo "sorry";
                        }
                        header('Location: profile');
                    }
                } catch(PDOException $e){
                    $error[] = $e->getMessage();
                }
            }
            $smarty->display('view/layout/header.tpl');
            $smarty->display('view/profile.tpl');
            $smarty->display('view/layout/footer.tpl');
        }else{
          header('Location: logout');
        }
    break;

    case "product":
        if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
            $data_array = array(':id' => $product_id);
            $product = Database::get()->execute('SELECT * FROM products WHERE id = :id',$data_array);
            $random_prods = Database::get()->execute("SELECT * FROM products WHERE type = '". $product[0]['type'] ."' ORDER BY RAND() LIMIT 5",array());
            $product_imgs = Database::get()->execute("SELECT * FROM product_images WHERE product_id = :id",$data_array);
            if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
                $user_carts = Database::get()->execute("SELECT * FROM cart_items WHERE user_id = ".$_SESSION['id'],array());
                $smarty->assign('user_carts',$user_carts);
            }
            if(count($product_imgs) !== 0){
                $smarty->assign('product_imgs',$product_imgs);
            }
            $smarty->assign('random_prods',$random_prods);
            $smarty->assign('products',$product);
        }
        $smarty->display('view/layout/header.tpl');
        $smarty->display('view/product.tpl');
        $smarty->display('view/layout/footer.tpl');
    break;

    case "add_cart":
        if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
            $date =  date("Y-m-d H:i:s");
            $data_array = array(
                'image' => $_POST['image'],
                'product_id' => $_POST['product_id'],
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
                'name' => $_POST['name'],
                'user_id' => $_SESSION['id']
            );
            Database::get()->insert("cart_items",$data_array);
            echo json_encode(array('msg' => 'success'));
        } else{
            echo json_encode(array('msg' => 'fail login'));
            // header('Location: login');
        }
    break;

    case "search":
        if(isset($_POST['search_submit'])){
            $term = $_POST['seacrh_text'];
            $sql = "SELECT * FROM products WHERE name LIKE '%".$term."%'";
            // $sql  = prepare($sql);
            $query_result = Database::get()->execute($sql,array());
            // $res = Database::get()->getLastSql();
            // var_dump($query_result);
            $smarty->assign('search_text',$term);
            $smarty->assign('query_results',$query_result);
            // header('Location: search');

            $smarty->display('view/layout/header.tpl');
            $smarty->display('view/search.tpl');
            $smarty->display('view/layout/footer.tpl');
        }
    break;

    case "edit":
        if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
            if(UserVeridator::isAdmin($_SESSION['level'])){
                $condition = "id = :id";
                $order_by = "1";
                $fields = "*";
                $limit = "LIMIT 1";
                $data_array = array(":id" => $_SESSION['edit_id']);
                $result = Database::get()->query("products", $condition, $order_by, $fields, $limit, $data_array);
                $smarty->assign('products',$result);
                //For product edit
                if(isset($_POST['submit'])){
                    try{
                        $date =  date("Y-m-d H:i:s");
                        $data_array = array(
                            'type' => $_POST['type'],
                            'name' => $_POST['name'],
                            'stock' => $_POST['quantity'],
                            'description' => $_POST['description'],
                            'price_before_discount' =>$_POST['price'],
                            'price' => $_POST['sale_price'],
                            'updated_at' => $date
                        );
                        Database::get()->update("products",$data_array,"id",$_SESSION['edit_id']);
                        unset($_SESSION['edit_id']);
                        header('Location: admin_home#product');
                    } catch(PDOException $e) {
                        $error[] = $e->getMessage();
                    }
                }
            //For upload product image
            if(isset($_POST['submit_image'])){
                try{
                    $condition = "id = :id";
                    $order_by = "1";
                    $fields = "*";
                    $limit = "LIMIT 1";
                    $data_array = array(":id" => $_SESSION['edit_id']);
                    $origin_image = Database::get()->query("products", $condition, $order_by, $fields, $limit, $data_array);
                    $filename = $origin_image[0]['image'];
                    $target_dir = "uploads/images/";
                    $uploadOK = 1;
                    $ext = basename($_FILES["product_image"]["type"]);
                    $check = getimagesize($_FILES['product_image']['tmp_name']);

                    //Check if image file is a actual image or fake image
                    if($check !== False){
                    } else{
                        echo '<div class="alert alert-danger">Uploaded fail. Something went wrong !.</div>';
                        $uploadOK = 0;
                        // echo "<script>alert('not')</script>";
                    }
                    //Allow these type format
                    if($ext != "jpg" && $ext != "png" && $ext != "jpeg"&& $ext != "gif" ) {
                        echo '<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
                        $uploadOK = 0;
                    }

                    if($uploadOK == 0){

                    } else {
                        //Delete local file before upload
                        if(file_exists($target_dir . $filename)){
                            unlink($target_dir . $filename);

                        } else{
                            echo "no file";
                        }
                        $filename = time() . '.' . $ext;
                        $target_file = $target_dir . $filename;
                        $date =  date("Y-m-d H:i:s");
                        $data_array = array(
                            'image' => $filename,
                            'updated_at' => $date
                        );
                        Database::get()->update("products",$data_array,"id",$_SESSION['edit_id']);
                        Database::get()->execute("UPDATE product_images SET image =".$filename ."WHERE product_id = ". $_SESSION['edit_id'],array());
                        $res = Database::get()->getLastSql();
                        if(move_uploaded_file($_FILES["product_image"]["tmp_name"],$target_file)){
                            echo "The file ". basename( $_FILES["product_image"]["type"]) . " has been uploaded.";
                        } else {
                            echo "sorry";
                        }
                        unset($_SESSION['edit_id']);
                        header('Location: admin_home#product');
                    }
                    }catch(PDOException $e) {
                        $error[] = $e->getMessage();
                    }
            }
            $smarty->display('view/layout/header.tpl');
            $smarty->display("view/edit.tpl");
            $smarty->display('view/layout/footer.tpl');
        }  else{
            header('Location: home');
        }
        }  else{
          header('Location: logout');
        }
    break;

    case "confirm":
        if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
            //For submit from shopping cart
            if(isset($_POST['total_confirm'])){
                $total = $_POST['total'];
                $e_coin = $_POST['e_coin'];
                $carts = Database::get()->execute('SELECT * FROM cart_items WHERE user_id = '.$_SESSION['id'],array());
                $smarty->assign('wallet',$e_coin);
                $smarty->assign('shopping_carts',$carts);
                $smarty->assign('total',$total);
                $smarty->assign('confirm_type','shopping');
                $smarty->display('view/layout/header.tpl');
                $smarty->display('view/confirm.tpl');
                $smarty->display('view/layout/footer.tpl');

            } //For directly but an item
            elseif(isset($_POST['single_confirm'])){
                $direct = $_POST['direct'];
                // $price = $_POST['price'];
                $result = Database::get()->execute("SELECT * FROM users WHERE id =". $_SESSION['id'],array());
                $wallet = $result[0]['e_coin'];
                $carts = array(array(
                    'id' => $_POST['product_id'],
                    'image' => $_POST['image'],
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'quantity' => $_POST['quantity'],
                    'description' =>''
                ));
                $total = $_POST['price']*$_POST['quantity'];
                $smarty->assign('direct',$direct);
                $smarty->assign('wallet',$wallet);
                $smarty->assign('shopping_carts',$carts);
                $smarty->assign('total',$total);
                $smarty->assign('confirm_type','shopping');
                $smarty->display('view/layout/header.tpl');
                $smarty->display('view/confirm.tpl');
                $smarty->display('view/layout/footer.tpl');
            } //For recharge submit to self
            elseif(isset($_POST['recharge_self'])){
                if(isset($_POST['coin'])){
                    $_SESSION['transfer_target_account'] = $_SESSION['wallet_account'];
                    $users = Database::get()->execute("SELECT * FROM users WHERE id =". $_SESSION['id'],array());

                    $smarty->assign('users',$users);
                    $smarty->assign('coin',$_POST['coin']);
                    $smarty->assign('confirm_type','recharge');

                    $smarty->display('view/layout/header.tpl');
                    $smarty->display('view/confirm.tpl');
                    $smarty->display('view/layout/footer.tpl');
                } else{
                    header('Location: home');
                }
            }
            //For recharge submit to others
            elseif(isset($_POST['recharge_submit'])){
                if(isset($_POST['account_id'])){
                    unset($_SESSION['error_message']);
                    $userVeridator = new UserVeridator();
                    $userVeridator->isAccountExist($_POST['account_id']);
                    $error = $userVeridator->getErrorArray();
                    if (is_array($error) || is_object($error)){
                        foreach($error as $e){
                            $_SESSION['error_message'] = $e;
                            header('Location: recharge#recharge');
                        }
                    }
                    if(count($error) ==0){
                        if(isset($_POST['coin'])){
                            $_SESSION['transfer_target_account'] = $_POST['account_id'];
                            $users = Database::get()->execute("SELECT * FROM users WHERE id =". $_SESSION['id'],array());

                            $smarty->assign('users',$users);
                            $smarty->assign('coin',$_POST['coin']);
                            $smarty->assign('confirm_type','recharge');

                            $smarty->display('view/layout/header.tpl');
                            $smarty->display('view/confirm.tpl');
                            $smarty->display('view/layout/footer.tpl');
                        } else{
                            header('Location: home');
                        }
                    }

                } else {
                    header('Location: recharge');
                }
                //For change money submit
            } elseif(isset($_POST['change_submit'])){
                if(isset($_POST['account_id'])){
                    unset($_SESSION['error_message']);
                    $users = Database::get()->execute("SELECT * FROM users WHERE id = ".$_SESSION['id'],array());
                    if($_POST['account_id'] != $users[0]['wallet_account']){
                        $_SESSION['error_message'] = "The typing account is not corrospond to your account.";
                        header('Location: recharge#change');
                    } else{
                        if(isset($_POST['money'])){
                            $smarty->assign('users',$users);
                            $smarty->assign('amount_of_money',$_POST['money']);
                            $smarty->assign('confirm_type','change');

                            $smarty->display('view/layout/header.tpl');
                            $smarty->display('view/confirm.tpl');
                            $smarty->display('view/layout/footer.tpl');
                        }
                    }


                } else {
                    header('Location: recharge');
                }
            }else{
                header('Location: home');
            }
        } else{
            header('Location: logout');
        }
    break;

    case "transfer":
        if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
            //For buying products
            if(isset($_POST['total']) || isset($_POST['total_confirm'])){
                $total = $_POST['total'];
                if(isset($_POST['total_confirm'])){
                    if(isset($_POST['direct'])){
                        $data_array = array(
                            'user_id' => $_SESSION['id'],
                            'product_id' => $_POST['product_id'],
                            'name' => $_POST['name'],
                            'quantity' => $_POST['quantity'],
                            'money' => $_POST['price'],
                            'description' => $_POST['description']
                        );
                        Database::get()->insert('orders',$data_array);
                        Database::get()->execute("UPDATE products SET stock = stock - " . $_POST['quantity'] ." WHERE id = ". $_POST['product_id'],array());
                    } else{
                        $total = $_POST['total'];
                        $carts = Database::get()->execute('SELECT * FROM cart_items WHERE user_id = '.$_SESSION['id'],array());
                        foreach ($carts as $cart) {
                            $data_array = array(
                                'user_id' => $_SESSION['id'],
                                'product_id' => $cart['product_id'],
                                'name' => $cart['name'],
                                'quantity' => $cart['quantity'],
                                'money' => $cart['price'],
                                'description' => $_POST['description']
                            );
                            Database::get()->insert('orders',$data_array);
                            Database::get()->execute("UPDATE products SET stock = stock - " . $cart['quantity'] ." WHERE id = ". $cart['product_id'],array());

                        }
                    }
                Database::get()->execute("UPDATE users SET e_coin = e_coin - ". $total . " WHERE id = " . $_SESSION['id'],array());
                if(isset($_POST['direct'])){
                } else{
                    Database::get()->execute('DELETE FROM cart_items WHERE user_id = '.$_SESSION['id'],array());
                }

                $smarty->display('view/layout/header.tpl');
                $smarty->display('view/transfer.tpl');
                $smarty->display('view/layout/footer.tpl');
                // header('Location: transfer');
            } else {
                header('Location: home');
            }
        } elseif(isset($_POST['recharge'])){
                $trans_id= mt_rand(100, 999);
                $coin = $_POST['coin'];
                $users = Database::get()->execute('SELECT * FROM users WHERE id = '.$_SESSION['id'],array());
                $url = "http://phili.test/wallet.class.php?action=update_wallet&userid=".$users[0]['wallet_account'] ."&amount=-".$coin. "&trans_id=".$trans_id;
                $url2 = "http://phili.test/wallet.class.php?action=get_wallet&userid=".$users[0]['wallet_account'];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
                $output = curl_exec($ch);
                curl_setopt($ch, CURLOPT_URL, $url2);
                $output2 = curl_exec($ch);
                curl_close($ch);
                if (strpos($output, 'true') !== false) {
                    $data_array = array(
                        'user_id' => $_SESSION['id'],
                        'target_account' => $_SESSION['transfer_target_account'],
                        'money' => $coin,
                        'e_coin' => $_POST['e_coin'],
                        'status' => 0                   // 0 indicate recharge
                    );
                    Database::get()->insert("recharge",$data_array);
                    $output2 = json_decode($output2,true);
                    $data_array = array(
                        'money' => $output2['data'][0]['amount']
                    );
                    Database::get()->update("users",$data_array,'id',$_SESSION['id']);
                    $data_array = array(
                        'e_coin' => $coin
                    );
                    Database::get()->execute("UPDATE users SET e_coin = e_coin +".$coin ." WHERE wallet_account = ".$_SESSION['transfer_target_account'],array());

                    $smarty->display('view/layout/header.tpl');
                    $smarty->display('view/transfer.tpl');
                    $smarty->display('view/layout/footer.tpl');
                } else {
                    echo "<div class = 'container'><div class='alert alert-danger '>Fail transfer.<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a></div></div>";
                }
        } elseif(isset($_POST['change'])){
            $trans_id= mt_rand(100, 999);
            $money = $_POST['money'];
            $users = Database::get()->execute('SELECT * FROM users WHERE id = '.$_SESSION['id'],array());

            // $data_array = array(
            //     'user_id' => $_SESSION['id'],
            //     'target_account' => $users[0]['wallet_account'],
            //     'money' => $money,
            //     'e_coin' => $_POST['e_coin'],
            //     'status' => 1                   // 1 indicate change
            // );
            //Insert the trade to recharge table
            // Database::get()->insert("recharge",$data_array);
            $db = new mysqli("localhost", "root", "", "shopping_cart");
            $db->begin_transaction();
            $db->query("INSERT INTO recharge (user_id,target_account,money,e_coin,status) VALUES (".$_SESSION['id'].",".$users[0]['wallet_account'].",".$money.",".$_POST['e_coin'].","."1".")");
            $db->query("UPDATE users SET e_coin = e_coin -".$_POST['e_coin'] .",money = money + ".$money." WHERE id = ".$_SESSION['id']);
            
            // Database::get()->execute("UPDATE users SET e_coin = e_coin -".$_POST['e_coin'] .",money = money + ".$money." WHERE id = ".$_SESSION['id'],array());
            $wallet = new Wallet();
            $output = $wallet->updateWallet($users[0]['wallet_account'],$money,$trans_id);
            $output2 = $wallet->getWallet($users[0]['wallet_account']);
            $output2 = json_decode($output2,true);
            
            
            // $url = "http://phili.test/wallet.class.php?action=update_wallet&userid=".$users[0]['wallet_account'] ."&amount=".$money. "&trans_id=".$trans_id;
            // $url2 = "http://phili.test/wallet.class.php?action=get_wallet&userid=".$users[0]['wallet_account'];
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            // $output = curl_exec($ch);
            // curl_setopt($ch, CURLOPT_URL, $url2);
            // $output2 = curl_exec($ch);
            // curl_close($ch);
            if (strpos($output, 'true') !== false) { 
                $db->commit();
                // Database::get()->execute("UPDATE users SET e_coin = e_coin -".$_POST['e_coin'] .",money = ".$output2['data'][0]['amount']." WHERE id = ".$_SESSION['id'],array());
                $smarty->display('view/layout/header.tpl');
                $smarty->display('view/transfer.tpl');
                $smarty->display('view/layout/footer.tpl');
            } else {
                for($i=0; $i <5 ; $i++){
                    $check_trans_output = $wallet->checkTrans($trans_id);
                    if(strpos($check_trans_output,'true')){
                        break;
                    }
                    sleep(1);
                }
                if(strpos($check_trans_output, 'true')){
                    $db->commit();
                } else{ 
                    $db->rollback();
                    $smarty->display('view/layout/header.tpl');
                    echo "<div class = 'container'><div class='alert alert-danger '>Fail transfer.<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a></div></div>";
                    $smarty->display('view/layout/footer.tpl');
                }
                
            }
        }   else{
            header('Location: home');
        }
        } else{
            header('Location: logout');
        }
    break;

    case "recharge":
        if(UserVeridator::isLogin(isset($_SESSION['username'])?$_SESSION['username']:'')){
            if(isset($_POST['money'])){
                $smarty->assign('money',$_POST['money']);
            } else{
                $users = Database::get()->execute('SELECT * FROM users WHERE id = '.$_SESSION['id'],array());
                $url = "http://phili.test/wallet.class.php?action=get_wallet&userid=".$users[0]['wallet_account'];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
                $output = curl_exec($ch);
                curl_close($ch);
                $output = json_decode($output,true);
                $smarty->assign('money',$output['data'][0]['amount']);
            }
            if(isset($_SESSION['error_message'])){
                echo "<div class = 'container'><div class='alert alert-danger '><strong>".$_SESSION['error_message']."</strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a></div></div>";
            }
            unset($_SESSION['error_message']);
            $smarty->display('view/layout/header.tpl');
            $smarty->display('view/recharge.tpl');
            $smarty->display('view/layout/footer.tpl');

        } else{
            header('Location: Logout');
        }
    break;

    case "test":
        if(isset($_POST['submit_product'])){
            $ext = basename($_FILES['product_image']['type']);
            echo $ext;
        }
        if(isset($_POST['ajax'])){
            $data_array = array(
                'image' => $_POST['image'],
                'product_id' => $_POST['product_id'],
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
                'name' => $_POST['name'],
                'user_id' => $_SESSION['id']
            );
            Database::get()->insert("cart_items",$data_array);
        }
        $smarty->display('view/layout/header.tpl');
        // $smarty->display('test.tpl');
        include('test.php');
        $smarty->display('view/layout/footer.tpl');
    break;

    case "crawler":
        $smarty->display('view/layout/header.tpl');
        include('crawler.php');
        $smarty->display('view/layout/footer.tpl');
    break;

    default:
        $smarty->display('view/layout/header.tpl');
        // $smarty->display('view/home.tpl');
        $smarty->display('view/layout/footer.tpl');
    break;
}
