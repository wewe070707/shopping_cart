<?php
/* Smarty version 3.1.33, created on 2019-06-18 18:21:34
  from 'C:\xampp\htdocs\shopping_cart\view\search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d08bb2e97f401_17363417',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ada7b971aea85dd1bce4448852e46afbc20b291' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\search.tpl',
      1 => 1560853293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d08bb2e97f401_17363417 (Smarty_Internal_Template $_smarty_tpl) {
?><div class = "container-fluid" style = "text-align: center;">
    <h2 style = "text-align:center;">以下為<strong><?php echo $_smarty_tpl->tpl_vars['search_text']->value;?>
</strong>的搜尋結果</h2>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['query_results']->value, 'query_result');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['query_result']->value) {
?>
        <div id = "products" style ="margin: 1em;">
            <div id = "products-image">
                <img src = "/uploads/images/<?php echo $_smarty_tpl->tpl_vars['query_result']->value['image'];?>
" style = "width:150px;height:150px;" title ="<?php echo $_smarty_tpl->tpl_vars['query_result']->value['description'];?>
">
            </div>
            <span><?php echo $_smarty_tpl->tpl_vars['query_result']->value['name'];?>
</span>
            <!-- <span><?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
</span> -->
            <h4><?php echo $_smarty_tpl->tpl_vars['query_result']->value['price'];?>
</h4>
            <form id = "number_form" action="/add_cart" method="post" >
                <input type = "hidden" name = "image" value = "<?php echo $_smarty_tpl->tpl_vars['query_result']->value['image'];?>
">
                <input type = "hidden" name = "product_id" value = "<?php echo $_smarty_tpl->tpl_vars['query_result']->value['id'];?>
">
                <input type = "hidden" name = "price" value = "<?php echo $_smarty_tpl->tpl_vars['query_result']->value['price'];?>
">
                <input type = "hidden" name = "name" value = "<?php echo $_smarty_tpl->tpl_vars['query_result']->value['name'];?>
">
                <input type = "number" id = "quantity" name = "quantity" list = "defaultNumbers" style = "width:70px" min = 1 max = "5" placeholder="1" value = "1">
                <datalist id="defaultNumbers">
                  <option value="1">
                  <option value="2">
                  <option value="3">
                  <option value="4">
                  <option value="5">
                </datalist>
                <input type="submit" id = "btn-add-cart" class = "btn btn-primary" value = "加入購物車">
            </form>
        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
