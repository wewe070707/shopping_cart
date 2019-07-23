<?php
/* Smarty version 3.1.33, created on 2019-07-19 11:31:19
  from 'C:\xampp\htdocs\shopping_cart\view\profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d313987ea6079_97172869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5171ad6f8084894d64ed65525b586eddf27898f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\profile.tpl',
      1 => 1563507076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d313987ea6079_97172869 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\shopping_cart\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class = "container" style = "background-image:/uploads/123.png">
    <div class = "row">
        <div class = "col-lg-10">
            <ul class="nav nav-tabs nav-justified" style = "display:inline-block;border-bottom: none;">
                <li style = "padding-right: inherit;">
                    <a data-toggle="tab" href="#user">
                        <i class="fas fa-user-alt fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;">
                        </i>個人頁面
                    </a>
                </li>
                <li style = "padding-right: inherit;">
                    <a data-toggle="tab" href="#shopping_cart">
                        <i class="fas fa-shopping-cart fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;">
                        </i>購物車
                    </a>
                </li>
                <li style = "padding-right: inherit;">
                    <a data-toggle="tab" href="#order">
                        <i class="fas fa-dolly fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;">
                        </i>訂單
                    </a>
                </li>
                <li style = "padding-right: inherit;">
                    <a data-toggle="tab" href="#wallet">
                        <i class="fas fa-money-bill-alt fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;">
                        </i>錢包管理
                    </a>
                </li>
            </ul>
        </div>
        <div class = "col-lg-2" style="text-align:center;">
            <i class="fas fa-coins fa-3x" style = "color:#e6c61e;line-height: 100px;vertical-align: middle;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['users']->value[0]['e_coin']);?>
</i>
            <form action = "recharge" method = "post">
                <input type = "hidden" name = "money" value = "<?php echo $_smarty_tpl->tpl_vars['money']->value;?>
">
                <button type = "submit" class = "btn btn-info">儲值</button>
            </form>
        </div>
    </div>
    <div class = "row">
        <div class="tab-content">
            <div id="user" class="tab-pane fade ">
                <div class="col-md-10" style = "padding:5px">
                    <img src = "/uploads/<?php echo $_smarty_tpl->tpl_vars['avatar']->value;?>
" style = "width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <h2>
                        <?php echo $_SESSION['username'];?>

                    </h2>
                    <form enctype="multipart/form-data" action = "profile" method = "post">
                        <input type = "file" name = "avatar" style  ="display:inline-block">
                        <input type="submit" class = "btn btn-primary" name = "submit" style = "float:right;">
                    </form>
                </div>
            </div>
            <div id="shopping_cart" class="tab-pane fade">
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
                                    <td>
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
                                        <form action = "profile" method = "POST">
                                            <input type = "hidden" name = "del_product_id" value = "<?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['id'];?>
">
                                            <button type = "submit" name = "del_product" onclick = "return confirm('確認刪除此商品?')"><i class="fas fa-trash-alt fa-2x" style = "color:#d9534f"></i></button>
                                            <!-- <input type = "submit" name = "del_product" class = "btn btn-danger" onclick = "return confirm('確認刪除此商品?')"  value = "刪除"> -->
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
                        <i class="fas fa-money-bill-alt fa-3x">ToTal price ： E幣 <?php echo $_smarty_tpl->tpl_vars['total_price']->value;?>
</i>
                        <form action = "confirm" method = "POST" style="float: right;">
                            <input type = "hidden" name = "total" value = "<?php echo $_smarty_tpl->tpl_vars['total_price']->value;?>
">

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value['money'] < $_smarty_tpl->tpl_vars['total_price']->value) {?>
                                    <button type = "submit" class = "btn btn-primary" disabled = "disabled">
                                        <i class="fas fa-cash-register fa" style = "padding-right:1em; color:white"></i>金額不足
                                    </button>
                                <?php } elseif ($_smarty_tpl->tpl_vars['total_price']->value == 0) {?>
                                <button type = "submit" class = "btn btn-primary" disabled = "disabled">
                                    <i class="fas fa-cash-register fa" style = "padding-right:1em; color:white"></i>金額不足
                                </button>
                                <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['money'] >= $_smarty_tpl->tpl_vars['total_price']->value) {?>
                                    <input type = "hidden" name = "e_coin" value = "<?php echo $_smarty_tpl->tpl_vars['user']->value['e_coin'];?>
">
                                    <button type = "submit" class = "btn btn-primary" name = "total_confirm" onclick = "return confirm('前往結帳?')">
                                        <i class="fas fa-cash-register fa" style = "padding-right:1em; color:white"></i>全部結帳去
                                    </button>
                                <?php }?>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                            <!-- <input type = "submit" class = "btn btn-primary" name = "pay" value = "結帳"> -->
                        </form>
                    <!-- </div> -->
                </div>
            </div>
            <div id="order" class="tab-pane fade">
                <div class = "row">
                    <div class = "col-lg-12" >
                        <ul class = "nav nav-tabs">
                            <li style = "padding-right: inherit;"><a data-toggle="tab" href="#all">全部</a></li>
                            <li><a data-toggle = "tab" href = "#processed">已處理</a></li>
                            <li><a data-toggle = "tab" href = "#unprocessed">待處理</a></li>
                        </ul>
                        <div class = "tab-content">
                            <div id = "all" class = "tab-pane fade in active">
                                <table class = "table table-hover">
                                    <tr>
                                        <td>商品編號</td>
                                        <td>名稱</td>
                                        <td>數量</td>
                                        <td>價格</td>
                                        <td>狀態</td>
                                    </tr>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
                                        <tr>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order']->value['product_id'];?>

                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order']->value['name'];?>

                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order']->value['quantity'];?>

                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order']->value['money'];?>

                                            </td>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['order']->value['status'] == 0) {?>
                                                    待處理
                                                <?php } else { ?>
                                                    已處理
                                                <?php }?>
                                            </td>
                                        </tr>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </table>
                            </div>
                            <div id = "processed" class = "tab-pane fade">
                                <table class = "table table-hover">
                                    <tr>
                                        <td>商品編號</td>
                                        <td>名稱</td>
                                        <td>數量</td>
                                        <td>價格</td>
                                        <td>狀態</td>
                                    </tr>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_checks']->value, 'order_check');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order_check']->value) {
?>
                                        <tr>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order_check']->value['product_id'];?>

                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order_check']->value['name'];?>

                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order_check']->value['quantity'];?>

                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order_check']->value['money'];?>

                                            </td>
                                            <td>已處理</td>
                                        </tr>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </table>
                            </div>
                            <div id = "unprocessed" class = "tab-pane fade">
                                <table class = "table table-hover">
                                    <tr>
                                        <td>商品編號</td>
                                        <td>名稱</td>
                                        <td>數量</td>
                                        <td>價格</td>
                                        <td>狀態</td>
                                    </tr>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_not_checks']->value, 'order_not_check');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order_not_check']->value) {
?>
                                        <tr>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order_not_check']->value['product_id'];?>

                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order_not_check']->value['name'];?>

                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order_not_check']->value['quantity'];?>

                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['order_not_check']->value['money'];?>

                                            </td>
                                            <td>待處理</td>
                                        </tr>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- <div class = "col-lg-4">
                        test
                    </div> -->
                </div>
            </div>
            <div id="wallet" class="tab-pane fade">
                <div class = "row">
                    <div class = "col-lg-12" style = "height:100px; display:inline-grid;">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                            <i class="fas fa-user fa-2x" style = "">帳戶號碼 ： <?php echo $_smarty_tpl->tpl_vars['user']->value['wallet_account'];?>
</i>
                            <i class="fas fa-wallet fa-2x">帳戶餘額 ： NT$ <?php echo $_smarty_tpl->tpl_vars['user']->value['money'];?>
</i>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                    <div class = "col-lg-12">
                        <ul class = "nav nav-tabs">
                            <li><a data-toggle = "" href = "#shop_record">購買紀錄</a></li>
                            <li><a data-toggle = "" href = "#recharge_record">儲值、兌換紀錄</a></li>
                        </ul>

                    </div>
                    <div class = "tab-content">
                        <div id = "shop_record" class = "tab-pane fade in active">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order', false, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value => $_smarty_tpl->tpl_vars['order']->value) {
?>
                                <button class="collapsible" style="border: 1px solid;">第<?php echo $_smarty_tpl->tpl_vars['item']->value+1;?>
筆: NT$ -<?php echo $_smarty_tpl->tpl_vars['order']->value['money']*$_smarty_tpl->tpl_vars['order']->value['quantity'];?>
</button>
                                <div class="content">
                                    <strong><span>於<?php echo smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['order']->value['created_at']),"%Y %m %d");?>
 購買 <?php echo $_smarty_tpl->tpl_vars['order']->value['name'];?>
 數量 <?php echo $_smarty_tpl->tpl_vars['order']->value['quantity'];?>
 共 <?php echo $_smarty_tpl->tpl_vars['order']->value['money']*$_smarty_tpl->tpl_vars['order']->value['quantity'];?>
 元</span></strong>
                                </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                        <div id = "recharge_record" class = "tab-pane fade">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recharges']->value, 'recharge', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['recharge']->value) {
?>
                                <div>
                                    第<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
筆:
                                    <?php if ($_smarty_tpl->tpl_vars['recharge']->value['status'] == 0) {?>
                                        <strong><span>於<?php echo smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['recharge']->value['created_at']),"%Y %m %d");?>
 儲值 <?php echo $_smarty_tpl->tpl_vars['recharge']->value['e_coin'];?>
 E幣 至 帳戶 : <?php echo $_smarty_tpl->tpl_vars['recharge']->value['target_account'];?>
</span></strong>
                                    <?php } else { ?>
                                        <strong><span>於<?php echo smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['recharge']->value['created_at']),"%Y %m %d");?>
 花費 <?php echo $_smarty_tpl->tpl_vars['recharge']->value['e_coin'];?>
 E幣 兌換 NT$ <?php echo $_smarty_tpl->tpl_vars['recharge']->value['money'];?>
</span></strong>
                                    <?php }?>
                                </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>
if (!localStorage.getItem("reload")) {
    /* set reload to true and then reload the page */
    localStorage.setItem("reload", "true");
    location.reload();
}
/* after reloading remove "reload" from localStorage */
else {
    localStorage.removeItem("reload");
    // localStorage.clear(); // or clear it, instead
}

<?php echo '</script'; ?>
><?php }
}
