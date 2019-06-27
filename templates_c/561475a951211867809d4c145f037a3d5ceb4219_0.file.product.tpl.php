<?php
/* Smarty version 3.1.33, created on 2019-06-27 17:20:52
  from 'C:\xampp\htdocs\shopping_cart\view\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d148a74129201_26804624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '561475a951211867809d4c145f037a3d5ceb4219' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\product.tpl',
      1 => 1561627249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d148a74129201_26804624 (Smarty_Internal_Template $_smarty_tpl) {
?><div class = "container">
    <div class = "row" style="background:white;">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
            <div class = "col-lg-4">
                <img id = "imgChange" src = "/uploads/images/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" style="width:350px;height:400px;">
            </div>
            <div class = "col-lg-8">
                <div>
                    <h3><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h3>
                </div>
                <hr>
                <div>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['price_before_discount'] != 0) {?>
                        <div class = "col-lg-2">
                            <h3><STRIKE style="font-size: 20px;"> <?php echo $_smarty_tpl->tpl_vars['product']->value['price_before_discount'];?>
</STRIKE></h3>
                        </div>
                        <div class = "col-lg-10">
                            <h3><strong style="color:tomato">E幣 <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</strong></h3>
                        </div>
                    <?php } else { ?>
                        <h3><strong>E幣 <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</strong></h3>
                    <?php }?>
                </div>
                <div>
                    <h4>剩餘庫存: <?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
 件</h4>
                </div>
                <br>
                <br>
                <div class = "form-inline">
                    <div class = "form-group mb-2">
                        <form id = "number_form" action="/add_cart" method="post" >
                            <input type = "hidden" name = "image" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
">
                            <input type = "hidden" name = "product_id" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                            <input type = "hidden" name = "price" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
">
                            <input type = "hidden" name = "name" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
                            <input type = "number" id = "quantity" name = "quantity" list = "defaultNumbers" style = "width:70px" min = 1 max = "<?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
" placeholder="1" value = "1">
                            <datalist id="defaultNumbers">
                                <option value="1">
                                <option value="2">
                                <option value="3">
                                <option value="4">
                                <option value="5">
                                <option value="6">
                                <option value="7">
                                <option value="8">
                                <option value="9">
                            </datalist>
                            <button type = "submit" id = "btn-add-cart" class = "btn btn-primary btn-lg">
                                <i class="fas fa-cart-plus fa" style = "padding-right:1em;"></i>加入購物車
                            </button>
                            <!-- <input type="submit" id = "btn-add-cart" class = "btn btn-primary btn-lg" value = "加入購物車"> -->
                        </form>
                    </div>
                    <div class = "form-group mb-2 pull-right">
                        <form action = "confirm" method = "POST" style="float: right;">
                            <input type = "hidden" name = "price" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
">
                            <input type = "hidden" name = "image" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
">
                            <input type = "hidden" name = "product_id" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                            <input type = "hidden" name = "name" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
                            <input type = "hidden" id = "h_quantity" name = "quantity" value = "">
                            <input type = "hidden" name = "direct" value = "1">
                            <button type = "submit" class = "btn btn-primary btn-lg" style="background:#ca4242" name = "single_confirm" onclick = "getNumber();" >
                                <i class="fas fa-cash-register fa" style = "color: #e6c61e;padding-right:1em;"></i>直接購買
                            </button>
                        </form>
                    </div>
                    <div class="container-fluid" style="margin-top:1em;">
                        <!-- <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000"> -->
                            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                            <?php if (isset($_smarty_tpl->tpl_vars['product_imgs']->value)) {?>
                                <!-- <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left fa-lg text-muted"></i>
                                    <span class="sr-only">Previous</span>
                                </a> -->
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product_imgs']->value, 'product_img');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product_img']->value) {
?>
                                    <div class="carousel-item col-md-4 ">
                                        <img src = "/uploads/images/<?php echo $_smarty_tpl->tpl_vars['product_img']->value['image'];?>
" style="width:150px;height:150px; cursor:pointer;" onclick = "changeImage(this)">
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <!-- <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right fa-lg text-muted"></i>
                                    <span class="sr-only">Next</span>
                                </a> -->
                            <?php }?>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</div>
<hr>
<div class = "container" style="background:white;">
    <div class = "row" s>
    <h3 style = "text-align:center;">你可能也感興趣</h3>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['random_prods']->value, 'random_prod');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['random_prod']->value) {
?>
        <div id = "products" style ="margin: 1em;">
            <a href = "product?product_id=<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['id'];?>
" style = "color: inherit;text-decoration: none;" >
                <div>
                    <img src = "/uploads/images/<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['image'];?>
" style = "width:150px;height:150px;" title ="<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['description'];?>
">
                </div>
                <span id = "test" style=""><?php echo $_smarty_tpl->tpl_vars['random_prod']->value['name'];?>
</span>
                <h3><strong>E幣 <?php echo $_smarty_tpl->tpl_vars['random_prod']->value['price'];?>
</strong></h3>
            </a>
            <form id = "number_form" action="/add_cart" method="post" >
                <input type = "hidden" name = "image" value = "<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['image'];?>
">
                <input type = "hidden" name = "product_id" value = "<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['id'];?>
">
                <input type = "hidden" name = "price" value = "<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['price'];?>
">
                <input type = "hidden" name = "name" value = "<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['name'];?>
">
                <input type = "number" id = "quantity" name = "quantity" list = "defaultNumbers" style = "width:70px" min = 1 max = "<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['stock'];?>
" placeholder="1" value = "1">
                <input type="submit" id = "btn-add-cart" class = "btn btn-primary" value = "加入購物車">
            </form>
        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</div>
<?php }
}
