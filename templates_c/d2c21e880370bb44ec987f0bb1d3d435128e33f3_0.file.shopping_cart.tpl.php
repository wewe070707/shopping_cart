<?php
/* Smarty version 3.1.33, created on 2019-06-20 14:04:23
  from 'C:\xampp\htdocs\shopping_cart\view\shopping_cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0b21e7af04a4_20735594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2c21e880370bb44ec987f0bb1d3d435128e33f3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\shopping_cart.tpl',
      1 => 1561005095,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d0b21e7af04a4_20735594 (Smarty_Internal_Template $_smarty_tpl) {
?><div class = "container">
    <ul class="nav nav-tabs" style = "display:inline-block;border-bottom: none;">
        <li style = "padding-right: inherit;">
            <a data-toggle="tab" href="#user">
                <i class="fas fa-user-alt fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;">
                </i>個人頁面
            </a>
        </li>
        <li style = "padding-right: inherit;">
            <a href="shopping_cart">
                <i class="fas fa-shopping-cart fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;">
                </i>購物車
            </a>
        </li>
        <li style = "padding-right: inherit;">
            <a data-toggle="tab" href="#wallet">
                <i class="fas fa-money-bill-alt fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;">
                </i>錢包管理
            </a>
        </li>
        <!-- <i class="fas fa-shopping-cart fa-3x" style = "line-height: 150px;vertical-align: middle;"></i> -->
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">First</a></li>
                <li><a href="#">Second</a></li>
                <li><a href="#">Third</a></li>
            </ul>
        </li>
    </ul>
    <div class = "row">
        <?php $_smarty_tpl->_assignInScope('total_price', 0);?>
        <!-- <div id = "products"> -->
            <table class = "table table-hover">
                <tr>
                    <td>image</td>
                    <td>名稱</td>
                    <td>數量</td>
                    <td>價錢</td>
                    <td></td>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shopping_carts']->value, 'shopping_cart');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['shopping_cart']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['image'];?>

                            <img src = "/uploads/images/<?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['image'];?>
" style = "width:150px;height:150px;">
                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['name'];?>

                        </td>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['quantity'];?>

                        </td>
                        <td>
                            <?php $_smarty_tpl->_assignInScope('temp_price', $_smarty_tpl->tpl_vars['shopping_cart']->value['price']*$_smarty_tpl->tpl_vars['shopping_cart']->value['quantity']);?>
                            <?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['price']*$_smarty_tpl->tpl_vars['shopping_cart']->value['quantity'];?>

                        </td>
                        <td>
                            <form action = "shopping_cart" method = "POST">
                                <input type = "hidden" name = "del_product_id" value = "<?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['id'];?>
">
                                <input type = "submit" name = "del_product" class = "btn btn-danger" onclick = "return confirm('確認刪除此商品?')"  value = "刪除">
                            </form>

                        </td>

                    </tr>
                    <?php $_smarty_tpl->_assignInScope('total_price', $_smarty_tpl->tpl_vars['total_price']->value+$_smarty_tpl->tpl_vars['temp_price']->value);?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
        <!-- </div> -->
        <!-- <div class = "container"> -->
            <i class="fas fa-money-bill-alt fa-3x">ToTal price ： <?php echo $_smarty_tpl->tpl_vars['total_price']->value;?>
</i>
            <form action = "" method = "POST" style="float: right;">
                <button type = "submit" class = "btn btn-primary" name = "pay">
                    <i class="fas fa-cash-register fa" style = "padding-right:1em; color:white"></i>結帳
                </button>
                <!-- <input type = "submit" class = "btn btn-primary" name = "pay" value = "結帳"> -->
            </form>
        <!-- </div> -->
    </div>
</div>
<?php }
}
