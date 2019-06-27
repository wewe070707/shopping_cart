<?php
/* Smarty version 3.1.33, created on 2019-06-24 09:48:04
  from 'C:\xampp\htdocs\shopping_cart\test.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d102bd49109b1_32548762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4489550c54840879b0e8f814c40e20e890afb26' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\test.tpl',
      1 => 1561340852,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d102bd49109b1_32548762 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- include('simple_html_dom.php');
$html = new simple_html_dom(); -->

<!-- // $html->load_file('https://tw.buy.yahoo.com/act/activity/welfaregoods.html?guccounter=1&guce_referrer=aHR0cHM6Ly90dy5idXkueWFob28uY29tLw&guce_referrer_sig=AQAAAJqQNpmZ0-6VefzZX55SlJ5qq4qQFdoAmlHHcV9V4wGmxg_4YNS_D58c5F4-HdvXt5O0VQl9L_kOubjX9o-wCn1nOCVlays27tTxpFHd8iRSem_TA0o7fRxq2Lmlr6bC_Je-LX6kdLIjS2FAoVj1fmw88DWYEbYh5RF0QftL6gpz#aa');
// $ret = $html->find('.productcard-skin');
// <pre>var_dump($ret);<pre>
// $html->clear(); -->
<button id = "ajax" value = "1">click</button>
<input type = "number" id = "quantity" name = "quantity" list = "defaultNumbers" style = "width:70px" min = 1 max = "5" placeholder="1" value = "1">
<input type = "hidden" id = "image" name = "image" value = "test_mg">
<input type = "hidden" id = "product_id" name = "product_id" value = "77">
<input type = "hidden" id = "price" name = "price" value = "777">
<input type = "hidden" id = "name" name = "name" value = "testname">
<button id = "ajax2" >click2</button>
<?php echo '<script'; ?>
>
$("#ajax").click(function() {
    var quantity = document.getElementById('quantity').value;
    var image = document.getElementById('image').value;
    var product_id = document.getElementById('product_id').value;
    var price = document.getElementById('price').value;
    var name = document.getElementById('name').value;
    // alert(image);
    $.ajax({
        url: "test",
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
                alert(msg);
                console.log(msg);
                console.log('123');
            },
            error: function(xhr) {
                console.log("fail");
            },
            complete: function() {
                console.log("fail");
            }
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
<?php echo '</script'; ?>
>
<?php }
}
