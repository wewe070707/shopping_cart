<?php
/* Smarty version 3.1.33, created on 2019-06-28 17:18:56
  from 'C:\xampp\htdocs\shopping_cart\view\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d15db80f0bfb0_86008345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a278521c62981a2d865d830d9e27bc1d47f97293' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\edit.tpl',
      1 => 1561713534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d15db80f0bfb0_86008345 (Smarty_Internal_Template $_smarty_tpl) {
?><div class = "container">
    <div class = "row">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
            <div class = "col-lg-4" style = "padding:5px; display:inline-block;">
                <img src = "/uploads/images/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" style = "width:150px; height:150px; float:left;  margin-right:25px;">
            </div>
            <div class = "col-lg-8">
                <form enctype="multipart/form-data" action = "edit" method = "post">
                    <input type = "file" name = "product_image" style  = "display:inline-block">
                    <input type="submit" class = "btn btn-primary" name = "submit_image" style = "float:right;">
                </form>
            </div>
            <!-- <br> -->
            <div class = "col-lg-12">
            <form id = "edit" class = "form-horizontal"  method="post">
                <div class="form-group">
                    <div style="display:flex;">
                        <label for="inputContent" class="col-sm-2 control-label">Type</label>
                        <input type = "text" name="type" class="form-control" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['type'];?>
" >
                        <label for="inputContent" class="col-sm-2 control-label">Name</label>
                        <input type = "text" name="name" class="form-control" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
                    </div>
                </div>
                <div class="form-group">
                    <div style="display:flex;">
                        <label for="inputContent" class="col-sm-2 control-label">Stock</label>
                        <input type = "number" name="quantity" class="form-control" min = "0" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
">
                        <label for="inputContent" class="col-sm-2 control-label">Sale</label>
                        <input type="checkbox" id = "sale" class = "" name = "sale">
                        <label for="inputContent" class="col-sm-2 control-label">Price</label>
                        <input type = "number" id = "price" name="price" class="form-control" min = "0" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
">
                        <input type = "number" id = "sale_price" name="sale_price" class="form-control" max = "<?php echo sprintf('%.2f',$_smarty_tpl->tpl_vars['product']->value['price']);?>
" style="display:none;">
                    </div>
                </div>
                <div class="form-group">
                    <div style="display:flex;">
                        <label for="inputContent" class="col-sm-2 control-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</textarea>
                    </div>
                </div>
                <div class=" form-group modal-body">
                    <div class="form-group modal-footer" id="modal_footer">
                        <input type="submit" name ="submit" class = "btn btn-primary" value="送出">
                    </div>
                </div>
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
