<div class = "container" style="background:white;">
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
                {foreach $users as $user}
                    <tr>
                        <td>{$user['id']}</td>
                        <td>{$user['username']}</td>
                        <td>{$user['email']}</td>
                        <td>{$user['created_at']}</td>
                        <td>
                            <form action = "admin_home" method = "POST">
                                <input type = "hidden" name = "user_id" value = "{$user['id']}">
                                <button type = "submit" name = "edit_user" ><a data-toggle="modal" data-id = "{$user['id']}" data-backdrop="true" data-keyboard="true" data-target="#editPassword"><i class="fas fa-edit fa-2x" style = "color:#4f92d9"></i></a></button>
                                {if $user['id'] eq $smarty.session.id}
                                    <button type = "submit" disabled><i class="fas fa-trash-alt fa-2x" style = "color:#b3b3b3"></i></button>
                                {else}
                                    <button type = "submit" name = "delete_user" onclick = "return confirm('確認刪除?')"><i class="fas fa-trash-alt fa-2x" style = "color:#d9534f"></i></button>
                                {/if}
                            </form>
                        </td>
                    </tr>
                {/foreach}
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
                {foreach $products as $product}
                    <tr>
                        <td><img style = "width:100px;height:100px;" src = "/uploads/images/{$product['image']}"></td>
                        <td>{$product['type']|strip_tags}</td>
                        <td>{$product['name']|strip_tags}</td>
                        <td>{$product['stock']|strip_tags}</td>
                        {if $product['price_before_discount'] eq 0}
                            <td>{$product['price']|strip_tags}</td>
                        {else}
                            <td>{$product['price_before_discount']|strip_tags}</td>
                        {/if}
                        {if $product['price_before_discount'] != 0}
                            <td>{$product['price']|strip_tags}</td>
                        {else}
                            <td>無</td>
                        {/if}
                        <td>{$product['description']|strip_tags}</td>
                        <td style = "vertical-align: middle;">
                            <form action = "admin_home" method = "post">
                                <!-- <input name = "edit" class = "btn btn-primary" type = "submit" value = '編輯' > -->
                                <input name = "edit" class = "btn btn-primary" type = "submit" value = '編輯' >
                                <input name = "product_id" type = "hidden" value = "{$product['id']}">
                            </form>
                        </td>
                    <tr>
                {/foreach}
            </table>
            <nav style = "text-align:center;">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    {if isset($page_prouduct)}
                        {for $i=1 to $page_prouduct['pages']}
                            <li class="page-item"><a class="page-link" href="?page={$i}#product">{$i}</a></li>
                        {/for}
                    {else}
                        <li class="page-item"><a class="page-link">1</a></li>
                    {/if}
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
                        {foreach $orders as $order}
                            <tr>
                                <td style="width: 100px;">
                                    {if $order['status']}
                                        <input type="checkbox" class="custom-control-input" disabled = "disabled" checked = "checked">
                                    {else}
                                        <input type="checkbox" id = "check" name = "check_status[]" value = "{$order['id']}" class="custom-control-input" onchange="document.getElementById('status_submit').disabled = !this.checked;">
                                        <label class="" for=""></label>
                                    {/if}
                                </td>
                                <td>{$order['user_id']|strip_tags}</td>
                                <td>{$order['name']|strip_tags}</td>
                                <td>{$order['quantity']|strip_tags}</td>
                                <td>{$order['money']|strip_tags}</td>
                                <td>{$order['description']|strip_tags}</td>
                            </tr>
                        {/foreach}
                    </table>
                    <nav style = "text-align:center;">
                          <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            {if isset($page)}
                                {for $i=1 to $page['pages']}
                                    <li class="page-item"><a class="page-link" href="?page={$i}#order#all">{$i}</a></li>
                                {/for}
                            {else}
                                <li class="page-item"><a class="page-link">1</a></li>
                            {/if}
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
                        {foreach $order_not_checks as $order_not_check}
                            <tr>
                                <td style="width: 100px;">
                                      <input type="checkbox" id = "check" name = "check_status[]" value = "{$order_not_check['id']}" class="custom-control-input" onchange="document.getElementById('status_submit').disabled = !this.checked;">
                                      <label class="" for=""></label>
                                </td>
                                <td>{$order_not_check['user_id']|strip_tags}</td>
                                <td>{$order_not_check['name']|strip_tags}</td>
                                <td>{$order_not_check['quantity']|strip_tags}</td>
                                <td>{$order_not_check['money']|strip_tags}</td>
                                <td>{$order_not_check['description']|strip_tags}</td>
                            </tr>
                        {/foreach}
                    </table>
                    <nav style = "text-align:center;">
                          <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            {if isset($page_incomplete)}
                                {for $i=1 to $page_incomplete['pages']}
                                    <li class="page-item"><a class="page-link" href="?page={$i}#order#unprocessed">{$i}</a></li>
                                {/for}
                            {else}
                                <li class="page-item"><a class="page-link">1</a></li>
                            {/if}
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
                        {foreach $order_checks as $order_check}
                            <tr>
                                <td>{$order_check['user_id']|strip_tags}</td>
                                <td>{$order_check['name']|strip_tags}</td>
                                <td>{$order_check['quantity']|strip_tags}</td>
                                <td>{$order_check['money']|strip_tags}</td>
                                <td>{$order_check['description']|strip_tags}</td>
                            </tr>
                        {/foreach}
                    </table>
                    <nav style = "text-align:center;">
                          <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            {if isset($page_complete)}
                                {for $i=1 to $page_complete['pages']}
                                    <li class="page-item"><a class="page-link" href="?page={$i}#order#processed">{$i}</a></li>
                                {/for}
                            {else}
                                <li class="page-item"><a class="page-link">1</a></li>
                            {/if}
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
                <h3>平台全部E幣: {$e_coins[0]['total']}</h3>

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
                                    {foreach $types as $type}
                                        <option>{$type['type']}</option>
                                    {/foreach}
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
