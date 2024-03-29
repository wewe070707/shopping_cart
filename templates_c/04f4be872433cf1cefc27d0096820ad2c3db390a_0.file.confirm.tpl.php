<?php
/* Smarty version 3.1.33, created on 2019-07-11 11:59:33
  from 'C:\xampp\htdocs\shopping_cart\view\confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d26b4253d4ef7_17856455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04f4be872433cf1cefc27d0096820ad2c3db390a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\confirm.tpl',
      1 => 1562817563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d26b4253d4ef7_17856455 (Smarty_Internal_Template $_smarty_tpl) {
?><div class = "container" style="background:white">
    <div class = "row">
        <div class = 'col-lg-12'>
            <!-- For shopping confirm page -->
            <?php if ($_smarty_tpl->tpl_vars['confirm_type']->value == 'shopping') {?>
                <ul class = "nav" style="text-align:center;">
                    <h3><strong>確認購買以下商品?</strong></h3>
                </ul>
                <?php if (isset($_smarty_tpl->tpl_vars['shopping_carts']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shopping_carts']->value, 'shopping_cart');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['shopping_cart']->value) {
?>
                        <div class = "col-lg-12" style="margin-bottom:1em;">
                            <div class = "col-lg-2">
                                <img src = "/uploads/images/<?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['image'];?>
" style = "width:150px;height:150px;">
                            </div>
                            <div class = "col-lg-5">
                                <span style="vertical-align: middle;"><?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['name'];?>
</span>
                            </div>
                            <div class = "col-lg-2">
                                <span style="vertical-align: middle;"><?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['price'];?>
</span>
                            </div>
                            <div class = "col-lg-1">
                                <span style="vertical-align: middle;"><?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['quantity'];?>
</span>
                            </div>
                            <div class = "col-lg-2">
                                <span style="vertical-align: middle;"><?php echo intval($_smarty_tpl->tpl_vars['shopping_cart']->value['price'])*intval($_smarty_tpl->tpl_vars['shopping_cart']->value['quantity']);?>
</span>
                            </div>
                        </div>

                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>

                <div class = "col-lg-12">
                    <form action = "transfer" method = "POST">
                        <div class="col-lg-12 form-group">
                            <div style="display:flex;">
                                <label for="inputContent" class="col-sm-2 control-label">備註</label>
                                <textarea maxlength='250' name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class = "col-lg-12">
                            <div class = "col-lg-8">
                                <h3><strong>目前金額 ： E幣 <?php echo $_smarty_tpl->tpl_vars['wallet']->value;?>
</strong></h3>
                                <h3><strong>商品金額 ： E幣 <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong></h3>
                                <hr>
                                <h3><strong>剩餘金額 ： E幣 <?php echo $_smarty_tpl->tpl_vars['wallet']->value-$_smarty_tpl->tpl_vars['total']->value;?>
</strong></h3>
                            </div>
                            <div class = "col-lg-4">
                                <input type = "hidden" name = "total" value = "<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
">
                                <?php if (isset($_smarty_tpl->tpl_vars['direct']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shopping_carts']->value, 'shopping_cart');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['shopping_cart']->value) {
?>
                                        <input type="hidden" name = "direct" value ="1">
                                        <input type = "hidden" name = "product_id" value = "<?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['id'];?>
">
                                        <input type = "hidden" name = "price" value = "<?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['price'];?>
">
                                        <input type = "hidden" name = "quantity" value = "<?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['quantity'];?>
">
                                        <input type = "hidden" name = "name" value = "<?php echo $_smarty_tpl->tpl_vars['shopping_cart']->value['name'];?>
">
                                        
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php }?>
                                <button type = "button" onclick = "history.back()" class = "btn btn-primary">返回</button>
                                <?php if ($_smarty_tpl->tpl_vars['wallet']->value < $_smarty_tpl->tpl_vars['total']->value) {?>
                                    <input class = "btn btn-primary" type = "submit" value = "餘額不足" disabled>
                                <?php } else { ?>
                                    <button type = "submit" class = "btn btn-primary" name = "total_confirm" >
                                        <i class="fas fa-cash-register fa" style = "padding-right:1em; color:white"></i>結帳
                                    </button>
                                <?php }?>
                            </div>
                        </div>
                    </form>
                </div>
            <!-- For recharge tab -->
            <?php } elseif ($_smarty_tpl->tpl_vars['confirm_type']->value == 'recharge') {?>
                <ul class = "nav" style="text-align:center;">
                    <h2><strong>確認送出交易?</strong></h2>
                    <label>
                        <p>您所選擇的面額為E幣 <?php echo $_smarty_tpl->tpl_vars['coin']->value;?>
</p>
                        您將儲值<span style="font-size: 25px;color:tomato">
                        <?php if ($_smarty_tpl->tpl_vars['coin']->value == 100) {
$_smarty_tpl->_assignInScope('e_coin', 100);?>100
                        <?php } elseif ($_smarty_tpl->tpl_vars['coin']->value == 250) {
$_smarty_tpl->_assignInScope('e_coin', 250);?>250
                        <?php } elseif ($_smarty_tpl->tpl_vars['coin']->value == 500) {
$_smarty_tpl->_assignInScope('e_coin', 525);?>525
                        <?php } elseif ($_smarty_tpl->tpl_vars['coin']->value == 1000) {
$_smarty_tpl->_assignInScope('e_coin', 1075);?>1075
                        <?php } elseif ($_smarty_tpl->tpl_vars['coin']->value == 2000) {
$_smarty_tpl->_assignInScope('e_coin', 2200);?>2200
                        <?php } elseif ($_smarty_tpl->tpl_vars['coin']->value == 5000) {
$_smarty_tpl->_assignInScope('e_coin', 5750);?>5750
                        <?php }?></span>
                        枚<i class="fab fa-edge fa-2x"></i> 幣
                        至 帳戶: <span style="font-size: 25px;color:tomato"><?php echo $_SESSION['transfer_target_account'];?>
</span>
                    </label>
                    <div class = "row">

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                            <div class = "col-lg-6">
                                <i class="fas fa-user fa-2x" style = "margin-top:1em ;display:block;">您的帳戶 ： <?php echo $_smarty_tpl->tpl_vars['user']->value['wallet_account'];?>
</i>
                                <i class="fas fa-wallet fa-2x" style = "margin-top:1em;display:block;">帳戶餘額 ： <?php echo $_smarty_tpl->tpl_vars['user']->value['money'];?>
</i>
                                <i class="fas fa-wallet fa-2x" style = "margin-top:1em">購買後餘額 ： <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['user']->value['money']-$_smarty_tpl->tpl_vars['coin']->value);?>
 </i>
                            </div>
                            <div class = "col-lg-6">
                                <i class="fas fa-wallet fa-2x" style="margin-top:1em;">目前<i class="fab fa-edge" style=""></i>幣 ： <?php echo $_smarty_tpl->tpl_vars['user']->value['e_coin'];?>
</i>
                                <br>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value['wallet_account'] == $_SESSION['transfer_target_account']) {?>
                                    <i class="fas fa-wallet fa-2x" style="margin-top:1em;">儲值後<i class="fab fa-edge" style=""></i>幣 ： <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['user']->value['e_coin']+$_smarty_tpl->tpl_vars['e_coin']->value);?>
</i>
                                <?php } else { ?>
                                    <i class="fas fa-wallet fa-2x" style="margin-top:1em;">儲值後<i class="fab fa-edge" style=""></i>幣 ： 不變</i>
                                <?php }?>
                            </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                    <form id = "test" action = "transfer" method="post">
                        <input type ="hidden" name = "coin" value = "<?php echo $_smarty_tpl->tpl_vars['coin']->value;?>
">
                        <input type ="hidden" name = "e_coin" value = "<?php echo $_smarty_tpl->tpl_vars['e_coin']->value;?>
">
                        <input type ="hidden" name = "recharge">
                        <button type = "button" onclick = "history.back()" class = "btn btn-primary">返回</button>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value['money'] < sprintf("%.2f",$_smarty_tpl->tpl_vars['coin']->value)) {?>
                            <input type ="submit" class = "btn btn-primary" value = "餘額不足" disabled>
                        <?php } else { ?>
                            <input type ="submit" class = "btn btn-primary recharge" name = "recharge" value = "送出" >
                        <?php }?>
                    </form>
                </ul>
            <!-- For change tab -->
            <?php } elseif ($_smarty_tpl->tpl_vars['confirm_type']->value == 'change') {?>
            <ul class = "nav" style="text-align:center;">
                <h2><strong>確認送出交易?</strong></h2>
                <label>
                    <p>您所選擇的面額為<span style="font-size: 25px;color:tomato">E幣: <?php echo $_smarty_tpl->tpl_vars['amount_of_money']->value;?>
</span></p>
                    您將兌換<span style="font-size: 25px;color:tomato">NT$
                    <?php if ($_smarty_tpl->tpl_vars['amount_of_money']->value == 100) {
$_smarty_tpl->_assignInScope('money', 85);?>85
                    <?php } elseif ($_smarty_tpl->tpl_vars['amount_of_money']->value == 250) {
$_smarty_tpl->_assignInScope('money', 212.5);?>212.5
                    <?php } elseif ($_smarty_tpl->tpl_vars['amount_of_money']->value == 500) {
$_smarty_tpl->_assignInScope('money', 425);?>425
                    <?php } elseif ($_smarty_tpl->tpl_vars['amount_of_money']->value == 1000) {
$_smarty_tpl->_assignInScope('money', 850);?>850
                    <?php } elseif ($_smarty_tpl->tpl_vars['amount_of_money']->value == 2000) {
$_smarty_tpl->_assignInScope('money', 1700);?>1700
                    <?php } elseif ($_smarty_tpl->tpl_vars['amount_of_money']->value == 5000) {
$_smarty_tpl->_assignInScope('money', 4250);?>4250
                    <?php }?></span>
                    至 帳戶: <span style="font-size: 25px;color:tomato"><?php echo $_smarty_tpl->tpl_vars['users']->value[0]['wallet_account'];?>
</span>
                </label>
                <div class = "row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                        <div class = "col-lg-6">
                            <i class="fas fa-user fa-2x" style = "margin-top:1em ;display:block;">您的帳戶 ： <?php echo $_smarty_tpl->tpl_vars['user']->value['wallet_account'];?>
</i>
                            <i class="fas fa-wallet fa-2x" style = "margin-top:1em;display:block;">帳戶餘額 ： <?php echo $_smarty_tpl->tpl_vars['user']->value['money'];?>
</i>
                            <i class="fas fa-wallet fa-2x" style = "margin-top:1em">兌換後餘額 ： <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['user']->value['money']+$_smarty_tpl->tpl_vars['money']->value);?>
 </i>
                        </div>
                        <div class = "col-lg-6">
                            <i class="fas fa-wallet fa-2x" style="margin-top:1em;">目前<i class="fab fa-edge" style=""></i>幣 ： <?php echo $_smarty_tpl->tpl_vars['user']->value['e_coin'];?>
</i>
                            <br>
                                <i class="fas fa-wallet fa-2x" style="margin-top:1em;">兌換後<i class="fab fa-edge" style=""></i>幣 ： <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['user']->value['e_coin']-$_smarty_tpl->tpl_vars['amount_of_money']->value);?>
</i>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <form action = "transfer" method="post">
                    <input type ="hidden" name = "money" value = "<?php echo $_smarty_tpl->tpl_vars['money']->value;?>
">
                    <input type ="hidden" name = "e_coin" value = "<?php echo $_smarty_tpl->tpl_vars['amount_of_money']->value;?>
">
                    <input type ="hidden" name = "change">
                    <button type = "button" onclick = "history.back()" class = "btn btn-primary">返回</button>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['e_coin'] < sprintf("%.2f",$_smarty_tpl->tpl_vars['amount_of_money']->value)) {?>
                        <input type ="submit" class = "btn btn-primary" value = "餘額不足" disabled>
                    <?php } else { ?>
                        <input type ="submit" class = "btn btn-primary" name = "change" value = "送出" >
                    <?php }?>
                </form>
            </ul>
            <?php }?>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>
$('form').submit(function() {
    $(this).find('input[type="submit"]').prop('disabled',true);
  });
<?php echo '</script'; ?>
><?php }
}
