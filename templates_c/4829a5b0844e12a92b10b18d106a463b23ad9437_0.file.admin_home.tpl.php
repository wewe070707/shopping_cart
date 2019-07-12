<?php
/* Smarty version 3.1.33, created on 2019-07-12 15:54:32
  from 'C:\xampp\htdocs\shopping_cart\view\admin_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d283cb8b77d52_92641422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4829a5b0844e12a92b10b18d106a463b23ad9437' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\admin_home.tpl',
      1 => 1562918072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d283cb8b77d52_92641422 (Smarty_Internal_Template $_smarty_tpl) {
?><div class = "container" style="background:white;">
    <div class = "row">
        <div class = "col-lg-12">
            <ul class="nav nav-tabs nav-justified" style = "display:inline-block;border-bottom: none;">
                <li style = "padding-right: inherit;"><a data-toggle="tab" href="#user"><i class="fas fa-user-alt fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;"></i>User Management</a></li>
                <li style = "padding-right: inherit;"><a data-toggle="tab" href="#product"><i class="fas fa-gifts fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;"></i>Products</a></li>
                <li style = "padding-right: inherit;"><a data-toggle="tab" href="#order"><i class="fas fa-truck fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;"></i>Orders</a></li>
                <li style = "padding-right: inherit;"><a data-toggle="tab" href="#e_coin"><i class="fas fa-coins fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;"></i>E coin</a></li>
                <li style = "padding-right: inherit;"><a data-toggle="modal"  data-backdrop="true" data-keyboard="true" data-target="#newProduct"><i class="fas fa-plus fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;"></i>新增商品</a></li>
                <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">First</a></li>
                        <li><a href="#">Second</a></li>
                        <li><a href="#">Third</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div id="user" class="tab-pane fade in active">
            <table class = "table table-hover">
                <tr>
                    <td>使用者id</td>
                    <td>使用者名稱</td>
                    <td>使用者E-mail</td>
                    <td>註冊時間</td>
                    <td>操作</td>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['created_at'];?>
</td>
                        <td>
                            <form action = "admin_home" method = "POST">
                                <input type = "hidden" name = "user_id" value = "<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                                <button type = "submit" name = "edit_user" ><a data-toggle="modal" data-id = "<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" data-backdrop="true" data-keyboard="true" data-target="#editPassword"><i class="fas fa-edit fa-2x" style = "color:#4f92d9"></i></a></button>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value['id'] == $_SESSION['id']) {?>
                                    <button type = "submit" disabled><i class="fas fa-trash-alt fa-2x" style = "color:#b3b3b3"></i></button>
                                <?php } else { ?>
                                    <button type = "submit" name = "delete_user" onclick = "return confirm('確認刪除?')"><i class="fas fa-trash-alt fa-2x" style = "color:#d9534f"></i></button>
                                <?php }?>
                            </form>
                        </td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
        </div>
        <div id="product" class="tab-pane fade">
            <table id = "" class = "table table-hover">
                <tr id= "product_tr" style="text-align:center;">
                    <td>圖片</td>
                    <td>類型</td>
                    <td style = "width:150px;">名稱</td>
                    <td style="vertical-align: middle;">數量</td>
                    <td>價格</td>
                    <td>特價</td>
                    <td>敘述</td>
                    <td></td>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
                    <tr>
                        <td><img style = "width:100px;height:100px;" src = "/uploads/images/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
"></td>
                        <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['type']);?>
</td>
                        <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['name']);?>
</td>
                        <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['stock']);?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['product']->value['price_before_discount'] == 0) {?>
                            <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['price']);?>
</td>
                        <?php } else { ?>
                            <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['price_before_discount']);?>
</td>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['product']->value['price_before_discount'] != 0) {?>
                            <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['price']);?>
</td>
                        <?php } else { ?>
                            <td>無</td>
                        <?php }?>
                        <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['description']);?>
</td>
                        <td style = "vertical-align: middle;">
                            <form action = "admin_home" method = "post">
                                <!-- <input name = "edit" class = "btn btn-primary" type = "submit" value = '編輯' > -->
                                <input name = "edit" class = "btn btn-primary" type = "submit" value = '編輯' >
                                <input name = "product_id" type = "hidden" value = "<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                            </form>
                        </td>
                    <tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
            <nav style = "text-align:center;">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <?php if (isset($_smarty_tpl->tpl_vars['page_prouduct']->value)) {?>
                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['page_prouduct']->value['pages']+1 - (1) : 1-($_smarty_tpl->tpl_vars['page_prouduct']->value['pages'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
#product"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                        <?php }
}
?>
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
        <div id="order" class="tab-pane fade">
            <div class="row">
                <div class = "col-lg-10">
                    <ul class="nav nav-tabs " style = "display:inline-block;border-bottom: none;">
                        <li style = "padding-right: inherit;"><a data-toggle="tab" href="#order#all">全部</a></li>
                        <li style = "padding-right: inherit;"><a data-toggle="tab" href="#order#unprocessed">未處理</a></li>
                        <li style = "padding-right: inherit;"><a data-toggle="tab" href="#order#processed">已送出</a></li>
                    </ul>
                </div>
                <div class = "col-lg-2">
                    <form action = "admin_home" method = "post">
                    <button type = "submit" id = "status_submit" name = "status_submit" class = "btn btn-primary">送出</button>
                </div>
            </div>
            <div class="tab-content">
                <!--  All order table -->
                <div id="all" class="tab-pane fade in active">
                    <table class = "table table-hover">
                        <tr>
                            <td>Complete</td>
                            <td>user id</td>
                            <td>名稱</td>
                            <td>數量</td>
                            <td>金額</td>
                            <td>備註</td>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
                            <tr>
                                <td style="width: 100px;">
                                    <?php if ($_smarty_tpl->tpl_vars['order']->value['status']) {?>
                                        <input type="checkbox" class="custom-control-input" disabled = "disabled" checked = "checked">
                                    <?php } else { ?>
                                        <input type="checkbox" id = "check" name = "check_status[]" value = "<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" class="custom-control-input" onchange="document.getElementById('status_submit').disabled = !this.checked;">
                                        <label class="" for=""></label>
                                    <?php }?>
                                </td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order']->value['user_id']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order']->value['name']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order']->value['quantity']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order']->value['money']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order']->value['description']);?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                    <nav style = "text-align:center;">
                          <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {?>
                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['page']->value['pages']+1 - (1) : 1-($_smarty_tpl->tpl_vars['page']->value['pages'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                    <li class="page-item"><a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
#order#all"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                                <?php }
}
?>
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

                <!--  order unprocessed table -->
                <div id="unprocessed" class="tab-pane fade">
                    <table class = "table table-hover">
                        <tr>
                            <td>Complete</td>
                            <td>user id</td>
                            <td>名稱</td>
                            <td>數量</td>
                            <td>金額</td>
                            <td>備註</td>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_not_checks']->value, 'order_not_check');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order_not_check']->value) {
?>
                            <tr>
                                <td style="width: 100px;">
                                      <input type="checkbox" id = "check" name = "check_status[]" value = "<?php echo $_smarty_tpl->tpl_vars['order_not_check']->value['id'];?>
" class="custom-control-input" onchange="document.getElementById('status_submit').disabled = !this.checked;">
                                      <label class="" for=""></label>
                                </td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order_not_check']->value['user_id']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order_not_check']->value['name']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order_not_check']->value['quantity']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order_not_check']->value['money']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order_not_check']->value['description']);?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                    <nav style = "text-align:center;">
                          <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <?php if (isset($_smarty_tpl->tpl_vars['page_incomplete']->value)) {?>
                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['page_incomplete']->value['pages']+1 - (1) : 1-($_smarty_tpl->tpl_vars['page_incomplete']->value['pages'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                    <li class="page-item"><a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
#order#unprocessed"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                                <?php }
}
?>
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
                </form>
                <!--  order processed table -->
                <div id="processed" class="tab-pane fade">
                    <table class = "table table-hover">
                        <tr>
                            <td>user id</td>
                            <td>名稱</td>
                            <td>數量</td>
                            <td>金額</td>
                            <td>備註</td>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_checks']->value, 'order_check');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order_check']->value) {
?>
                            <tr>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order_check']->value['user_id']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order_check']->value['name']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order_check']->value['quantity']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order_check']->value['money']);?>
</td>
                                <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order_check']->value['description']);?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                    <nav style = "text-align:center;">
                          <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <?php if (isset($_smarty_tpl->tpl_vars['page_complete']->value)) {?>
                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['page_complete']->value['pages']+1 - (1) : 1-($_smarty_tpl->tpl_vars['page_complete']->value['pages'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                    <li class="page-item"><a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
#order#processed"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                                <?php }
}
?>
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
            </div>
        </div>
        <div id = "e_coin" class = "tab-pane fade">
            <div style="text-align:center;">
                <h3>平台全部E幣: <?php echo $_smarty_tpl->tpl_vars['e_coins']->value[0]['total'];?>
</h3>

            </div>
        </div>
    </div>
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
                    <form enctype = "multipart/form-data" class = "form-horizontal"  method="post">
                        <div class="form-group">
                            <div style="display:flex;">
                                <label for="inputContent" class="col-sm-2 control-label">Type</label>
                                <input type = "text" name="type" class="form-control" list = "type">
                                <datalist id ="type" class="form-control" style="display:none;">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['types']->value, 'type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
?>
                                        <option><?php echo $_smarty_tpl->tpl_vars['type']->value['type'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
                                <label for="inputContent" class="col-sm-2 control-label">image</label>
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

      <div class="modal" id="editPassword" >
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header" style="background: #3490dc">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="fas fa-times"></i>
                      </button>
                      <h3 style = "color: #f8f9fa">Edit Password</h3>
                  </div>
                  <div class="modal-body">
                      <form class = "form-horizontal"  method="post">
                          <div class="form-group">
                              <div style="display:flex;">
                                  <label for="inputContent" class="col-sm-2 control-label">Password</label>
                                  <input type = "password" name="password" class="form-control">
                                  <input id = "edit_id" type = "hidden" name="edit_id" class="form-control">
                              </div>
                          </div>
                          <div class=" form-group modal-body">
                              <div class="form-group modal-footer" id="modal_footer">
                                  <input type="submit" name ="edit_password" class = "btn btn-primary" value="送出">
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
</div>
<?php }
}
