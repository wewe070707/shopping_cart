<?php
/* Smarty version 3.1.33, created on 2019-06-19 15:38:18
  from 'C:\xampp\htdocs\shopping_cart\controller\do_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d09e66abcc152_00375065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4c0bfb602842b9b8860333cf6e7ba47d7a3b947' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\controller\\do_login.tpl',
      1 => 1560929897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d09e66abcc152_00375065 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
    ';?>if(isset($_POST['submit']))
    {
      $error = array();
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
        // basic validation successful
        foreach($validation_rules_array as $key => $val) {
          $<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 = $_POST[$key]; // trans to local parameters
        }
        $userVeridator = new UserVeridator();
        $userVeridator->loginVerification($username, $password);
        $error = $userVeridator->getErrorArray();

        if(count($error) == 0){
          $table = "members";
          $condition = "username = :username";
          $order_by = "1";
          $fields = "*";
          $limit = "LIMIT 1";
          $data_array = array(":username" => $username);
          $result = Database::get()->query($table, $condition, $order_by, $fields, $limit, $data_array);
          $_SESSION['memberID'] = $result[0]['memberID'];
          $_SESSION['username'] = $username;
          header('Location: home');
          exit;
        }
      }
      if(isset($error) AND count($error) > 0){
        foreach( $error as $e) {
            $msg->error($e);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
      }
    }else{
      header('Location: ' . Config::BASE_URL);
      exit;
    }
<?php echo '?>';
}
}
