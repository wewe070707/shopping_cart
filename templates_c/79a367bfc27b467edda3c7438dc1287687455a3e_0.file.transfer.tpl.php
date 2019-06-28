<?php
/* Smarty version 3.1.33, created on 2019-06-28 10:07:32
  from 'C:\xampp\htdocs\shopping_cart\view\transfer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d157664cd6ad7_34106614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79a367bfc27b467edda3c7438dc1287687455a3e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\transfer.tpl',
      1 => 1561685009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d157664cd6ad7_34106614 (Smarty_Internal_Template $_smarty_tpl) {
?><div class = "container">
    <div class = "row">
        <div class = "col-lg-6 center-block" style="float: none;text-align: center;">
            <div class="alert alert-success">
                <i class="far fa-check-circle fa-5x" style="display:block;"></i>
                成功購買
            </div>
            <h3>3秒後自動跳轉......</h3>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>
    var delay = 3000;
    setTimeout(function(){ window.location = 'profile#wallet'; }, delay);
<?php echo '</script'; ?>
>
<?php }
}
