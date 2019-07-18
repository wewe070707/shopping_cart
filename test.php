<head>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

</head>
<?php
// $ret = Database::get()->execute("INSERT INTO recharge (user_id,target_account,money,e_coin,status) VALUES (35,123456,1000,1050,1)",array());
// $id = Database::get()->getLastId();
// var_dump($ret);
// var_dump($id);
try {
$conn = new PDO("mysql:host=localhost;dbname=shopping_cart", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully"; 
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
};
// sleep(5);
$ret = $conn->exec("INSERT INTO recharge (user_id,target_account,money,e_coin,status) VALUES (4,123456,1000,1050,0)");
if($ret){
    echo 'suc';
} else {
    header('Location: test123');
}
var_dump($ret);
// $wallet = new Wallet();
// $output = $wallet->checkTrans(7777);
// var_dump($output);


// echo"INSERT INTO recharge (user_id,target_account,money,e_coin,status) VALUES (".$_SESSION['id'].",".$users[0]['wallet_account'].",".$money.",".$_POST['e_coin'].","."1".")";
// Database::get()->execute("UPDATE users SET e_coin = 400,money = 300 WHERE id = 2",array());
// Database::get()->execute('commit',array());
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// try{
//     $db = new mysqli("localhost", "root", "", "shopping_cart");
//     $db->begin_transaction();
//     $db->query('UPDATE users SET e_coin = 12344444,money = 123 WHERE id = 2');
//     $db->query('UPDATE users SET e_coin = 321,money = 1321321 WHERE id = 3');
//     $db->query("INSERT INTO recharge (user_id,target_account,money,e_coin,status) VALUES (777,12333,300,200,1)");
//     $db->commit();
// } catch (Exception $e) {
//     echo 'error';
//     $db->rollback();
// }

?>
<button type = "submit" name = "" ><a data-toggle="modal" data-id = "{$user['id']}" data-backdrop="true" data-keyboard="true" data-target="#editPassword">123</a></button>
<button type = "submit" name = "" ><a data-toggle="modal"  data-backdrop="true" data-keyboard="true" data-target="#newProduct">tests</a></button>

      <div class="modal" id="newProduct" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #3490dc">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <h3 style = "color: #f8f9fa">New Product</h3>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class = "form-horizontal" action = "test"  method="post">
                        <div class="form-group">
                            <div style="display:flex;">
                                <label for="inputContent" class="col-sm-2 control-label">Type</label>
                                <input type = "text" name="type" class="form-control" list = "type">
                                <datalist id ="type" class="form-control" style="display:none;">
                                    {foreach $types as $type}
                                        <option>{$type['type']}</option>
                                    {/foreach}
                                </datalist>
                                <label for="inputContent" class="col-sm-2 control-label">Name</label>
                                <input type = "text" name="name" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="display:flex;">
                                <label for="inputContent" class="col-sm-2 control-label">Quantity</label>
                                <input type = "number" name="quantity" class="form-control" min = "0">
                                <label for="inputContent" class="col-sm-2 control-label">Price</label>
                                <input type = "number" name="price" class="form-control" min = "0" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="display:flex;">
                                <label for="inputContent" class="col-sm-2 control-label">Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="display:flex;">
                                <!-- <label for="inputContent" class="col-sm-2 control-label">image</label> -->
                                <input type = "file" name = "product_image" >
                            </div>
                        </div>
                        <div class=" form-group modal-body">
                            <div class="form-group modal-footer" id="modal_footer">
                                <input type="submit" name ="submit_product" class = "btn btn-primary" value="送出">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>

<div class = "container">
    <div class = "row">
        <div id="app1">
            <input v-model="message"><br>
            {{ message }}<br>
            <button v-on:click="reverseMessage">Reverse Message</button>
        </div>

        <div id="app2">
            <span v-bind:title="message">
                請將滑鼠移到本段文字上方
            </span>
        </div>

        <div id="app3">
            <span v-if="seen">Now you see me</span>
        </div>    

        <div id="app4">
            <ol>
                <li v-for="todoItem in todoList">
                    {{ todoItem.text }}
                </li>
            </ol>
        </div> 
    </div>
</div>


<script>
    var app1 = new Vue({
        el: "#app1",
        data: {
            message: 'Hello Vue!'
        },
        methods: {
            reverseMessage: function () {
                this.message = this.message.split('').reverse().join('');
            }
        }
    });
    var app2 = new Vue({
        el: '#app2',
        data: {
            message: '載入時間: ' + new Date().toLocaleString()
        }
    });
    var app3 = new Vue({
        el: '#app3',
        data: {
            seen: true
        }
    });
    var app4 = new Vue({
        el: '#app4',
        data: {
            todoList: [
                { text: 'Learn JavaScript' },
                { text: 'Learn Vue' },
                { text: 'Build something awesome' }
            ]
        }
    });
$(".ajax").click(function() {
    var quantity = $(this).closest('div').find('#quantity').val();
    var image = $(this).closest('div').find('#image').val();
    var product_id = $(this).closest('div').find('#product_id').val();
    var price = $(this).closest('div').find('#price').val();
    var name = $(this).closest('div').find('#name').val();
    var clickevent = $(this);
    alert(clickevent)
    $.ajax({
        url: "add_cart",
        data: {
            quantity: quantity,
            image: image,
            product_id: product_id,
            price: price,
            name: name
        },
        type: "POST",
        dataType: 'json',
        success: function(msg) {
                console.log(msg);
                $(clickevent).attr('disabled',true);
                $(clickevent).text('已加入購物車');
            },
        error: function(xhr) {
            alert(JSON.stringify(xhr));
            console.log("fail");
        },
    });
});
$("#ajax2").click(function() {
    $.ajax({
        url: "http://192.168.154.209/phili.test/wallet.class.php?action=insert_wallet&userid=1571102",
        // data: {
        //     action: "insert_wallet",
        //     userid: "12345"
        // },
        type: "GET",
        dataType: 'json',
        success: function(msg) {
                alert(msg);
                console.log(msg);
            },
            error: function(xhr) {
                console.log("fail");
            },
            complete: function() {
                console.log("fail");
            }
    });
});
</script>
