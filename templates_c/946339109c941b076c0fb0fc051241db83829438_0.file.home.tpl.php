<?php
/* Smarty version 3.1.33, created on 2019-06-25 16:31:05
  from 'C:\xampp\htdocs\shopping_cart\view\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d11dbc94de9b5_79519268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '946339109c941b076c0fb0fc051241db83829438' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\home.tpl',
      1 => 1561451463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d11dbc94de9b5_79519268 (Smarty_Internal_Template $_smarty_tpl) {
?><div class = "container-fluid" style="text-align: center;">

    <form class = "form-inline my-2 my-lg-0" action = "search" method = "POST" style = "float:right;">
        <input name = "seacrh_text" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button name = "search_submit"  class = "btn btn-outline-success my-2 my-sm-0" type = "submit" >
            <i class="fa fa-search" style = "color: Dodgerblue"></i>
        </button>
    </form>
    <nav class = "nav">
        <div class="navbar-header">
            <ul class="navbar-nav" style = "list-style-type:none;">
                <!-- <li class = ""> -->
                    <a class="nav-link" href="/home"><h3>全部</h3></a>
                <!-- </li> -->
                <li class="dropdown" style = " margin-left: 15em;"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 20px;">Type<span class="caret"></span></a>
                    <ul class="dropdown-menu" style = "text-align: center;">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 'type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
?>
                            <li>
                                <form action="home" method="POST">
                                    <input style="" type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value['type'];?>
" />
                                    <a href="?type=<?php echo $_smarty_tpl->tpl_vars['type']->value['type'];?>
" onclick="this.parentNode.submit()"><h4><?php echo $_smarty_tpl->tpl_vars['type']->value['type'];?>
</h4></a>
                                </form>
                            </li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </li>
            </ul>
        </div>


<!-- <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shopping_carts']->value, 'res2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['res2']->value) {
?>
    <pre><?php echo print_r($_smarty_tpl->tpl_vars['res2']->value);?>
</pre>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> -->

    </nav>
    <?php if (isset($_smarty_tpl->tpl_vars['select_type']->value)) {?>
        <h3 style  ="text-align:center;margin-right: 15em;">以下為 <strong><?php echo $_smarty_tpl->tpl_vars['select_type']->value;?>
</strong> 的商品</h3>
    <?php } else { ?>
        <h3 style  ="text-align:center;margin-right: 15em;">全部商品</h3>
    <?php }?>
    <div class = "row" style = "background:white;">

        <div class="col-lg-9" style="border-right: inset;">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['product']->value) {
?>
                <div id = "products" style ="margin: 1em;">
                    <a href = "product?product_id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" style = "color: inherit;" >
                        <div id = "products-image">
                            <img src = "/uploads/images/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" style = "width:150px;height:150px;" title ="<?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
">
                        </div>
                        <span><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</span>
                        <?php if ($_smarty_tpl->tpl_vars['product']->value['price_before_discount'] != 0) {?>
                        <div class="row">
                            <div class = "col-lg-3">
                                <h4 style="line-height: inherit;"><STRIKE>$<?php echo $_smarty_tpl->tpl_vars['product']->value['price_before_discount'];?>
</STRIKE></h4>
                            </div>
                            <div class = "col-lg-9">
                                <h3><strong style="color:tomato">NT$ <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</strong></h3>
                            </div>
                        </div>
                        <?php } else { ?>
                            <h3><strong>NT$ <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</strong></h3>
                        <?php }?>

                    </a>
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
                        <!-- <input type="submit" id = "btn-add-cart" class = "btn btn-primary" value = "加入購物車"> -->
                        <button type = "submit" id = "btn-add-cart" class = "btn btn-primary">
                            <i class="fas fa-cart-plus fa" style = "padding-right:1em;"></i>加入購物車
                        </button>
                    </form>

                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <div class = "col-lg-3">

            <h3>Random Product</h3>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['random_prods']->value, 'random_prod', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['random_prod']->value) {
?>
                <a href = "product?product_id=<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['id'];?>
" style = "color: inherit;text-decoration: none;" >
                    <div>
                        <img src = "/uploads/images/<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['image'];?>
" style = "width:150px;height:150px;" title ="<?php echo $_smarty_tpl->tpl_vars['random_prod']->value['description'];?>
">
                    </div>
                    <span id = "test" style="line-height: 40px;"><?php echo $_smarty_tpl->tpl_vars['random_prod']->value['name'];?>
</span>
                    <h3><strong>NT$ <?php echo $_smarty_tpl->tpl_vars['random_prod']->value['price'];?>
</strong></h3>
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
                        <!-- <input type="submit" id = "btn-add-cart" class = "btn btn-primary" value = "加入購物車"> -->
                        <button type = "submit" id = "btn-add-cart" class = "btn btn-primary">
                            <i class="fas fa-cart-plus fa" style = "padding-right:1em;"></i>加入購物車
                        </button>
                    </form>
                    <br>
                </a>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
    <nav style = "text-align:center;">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['flag']->value)) {?>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['page']->value['pages']+1 - (1) : 1-($_smarty_tpl->tpl_vars['page']->value['pages'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                        <li class="page-item"><a class="page-link" href="?type=<?php echo $_smarty_tpl->tpl_vars['select_type']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                    <?php }
}
?>
                <?php } else { ?>
                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['page']->value['pages']+1 - (1) : 1-($_smarty_tpl->tpl_vars['page']->value['pages'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                    <?php }
}
?>
                <?php }?>
            <?php } else { ?>
                <li class="page-item"><a class="page-link">1</a></li>
            <?php }?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
          </ul>
      </nav>
</div>
<?php }
}
