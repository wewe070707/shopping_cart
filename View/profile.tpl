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
            <i class="fas fa-coins fa-3x" style = "color:#e6c61e;line-height: 100px;vertical-align: middle;">{$users[0]['e_coin']|string_format:"%.2f"}</i>
            <form action = "recharge" method = "post">
                <input type = "hidden" name = "money" value = "{$money}">
                <button type = "submit" class = "btn btn-info">儲值</button>
            </form>
        </div>
    </div>
    <div class = "row">
        <div class="tab-content">
            <div id="user" class="tab-pane fade ">
                <div class="col-md-10" style = "padding:5px">
                    <img src = "/uploads/{$avatar}" style = "width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <h2>
                        {$smarty.session.username}
                    </h2>
                    <form enctype="multipart/form-data" action = "profile" method = "post">
                        <input type = "file" name = "avatar" style  ="display:inline-block">
                        <input type="submit" class = "btn btn-primary" name = "submit" style = "float:right;">
                    </form>
                </div>
            </div>
            <div id="shopping_cart" class="tab-pane fade">
                <div class = "row">
                    {$total_price=0}
                    <!-- <div id = "products"> -->
                        <table class = "table table-hover">
                            <tr>
                                <td>image</td>
                                <td>名稱</td>
                                <td>數量</td>
                                <td>價錢</td>
                                <td></td>
                            </tr>
                            {foreach $shopping_carts as $shopping_cart}
                                <tr>
                                    <td>
                                        <img src = "/uploads/images/{$shopping_cart['image']}" style = "width:150px;height:150px;">
                                    </td>
                                    <td>
                                        {$shopping_cart['name']}
                                    </td>
                                    <td>
                                        {$shopping_cart['quantity']}
                                    </td>
                                    <td>
                                        {$temp_price = $shopping_cart['price']*$shopping_cart['quantity']}
                                        {$shopping_cart['price']*$shopping_cart['quantity']}
                                    </td>
                                    <td>
                                        <form action = "profile" method = "POST">
                                            <input type = "hidden" name = "del_product_id" value = "{$shopping_cart['id']}">
                                            <button type = "submit" name = "del_product" onclick = "return confirm('確認刪除此商品?')"><i class="fas fa-trash-alt fa-2x" style = "color:#d9534f"></i></button>
                                            <!-- <input type = "submit" name = "del_product" class = "btn btn-danger" onclick = "return confirm('確認刪除此商品?')"  value = "刪除"> -->
                                        </form>
                                    </td>
                                </tr>
                                {$total_price=$total_price+$temp_price}
                            {/foreach}
                        </table>
                    <!-- </div> -->
                    <!-- <div class = "container"> -->
                        <i class="fas fa-money-bill-alt fa-3x">ToTal price ： E幣 {$total_price}</i>
                        <form action = "confirm" method = "POST" style="float: right;">
                            <input type = "hidden" name = "total" value = "{$total_price}">

                            {foreach $users as $user}
                                {if $user['money']<$total_price}
                                    <button type = "submit" class = "btn btn-primary" disabled = "disabled">
                                        <i class="fas fa-cash-register fa" style = "padding-right:1em; color:white"></i>金額不足
                                    </button>
                                {elseif $total_price==0}
                                <button type = "submit" class = "btn btn-primary" disabled = "disabled">
                                    <i class="fas fa-cash-register fa" style = "padding-right:1em; color:white"></i>金額不足
                                </button>
                                {elseif $user['money']>=$total_price}
                                    <input type = "hidden" name = "e_coin" value = "{$user['e_coin']}">
                                    <button type = "submit" class = "btn btn-primary" name = "total_confirm" onclick = "return confirm('前往結帳?')">
                                        <i class="fas fa-cash-register fa" style = "padding-right:1em; color:white"></i>全部結帳去
                                    </button>
                                {/if}
                            {/foreach}

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
                                    {foreach $orders as $order}
                                        <tr>
                                            <td>
                                                {$order['product_id']}
                                            </td>
                                            <td>
                                                {$order['name']}
                                            </td>
                                            <td>
                                                {$order['quantity']}
                                            </td>
                                            <td>
                                                {$order['money']}
                                            </td>
                                            <td>
                                                {if $order['status'] eq 0}
                                                    待處理
                                                {else}
                                                    已處理
                                                {/if}
                                            </td>
                                        </tr>
                                    {/foreach}
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
                                    {foreach $order_checks as $order_check}
                                        <tr>
                                            <td>
                                                {$order_check['product_id']}
                                            </td>
                                            <td>
                                                {$order_check['name']}
                                            </td>
                                            <td>
                                                {$order_check['quantity']}
                                            </td>
                                            <td>
                                                {$order_check['money']}
                                            </td>
                                            <td>已處理</td>
                                        </tr>
                                    {/foreach}
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
                                    {foreach $order_not_checks as $order_not_check}
                                        <tr>
                                            <td>
                                                {$order_not_check['product_id']}
                                            </td>
                                            <td>
                                                {$order_not_check['name']}
                                            </td>
                                            <td>
                                                {$order_not_check['quantity']}
                                            </td>
                                            <td>
                                                {$order_not_check['money']}
                                            </td>
                                            <td>待處理</td>
                                        </tr>
                                    {/foreach}
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
                        {foreach $users as $user}
                            <i class="fas fa-user fa-2x" style = "">帳戶號碼 ： {$user['wallet_account']}</i>
                            <i class="fas fa-wallet fa-2x">帳戶餘額 ： NT$ {$user['money']}</i>
                        {/foreach}
                    </div>
                    <div class = "col-lg-12">
                        <ul class = "nav nav-tabs">
                            <li><a data-toggle = "" href = "#shop_record">購買紀錄</a></li>
                            <li><a data-toggle = "" href = "#recharge_record">儲值、兌換紀錄</a></li>
                        </ul>

                    </div>
                    <div class = "tab-content">
                        <div id = "shop_record" class = "tab-pane fade in active">
                            {foreach $orders as $item =>$order}
                                <button class="collapsible" style="border: 1px solid;">第{$item+1}筆: NT$ -{$order['money']*$order['quantity']}</button>
                                <div class="content">
                                    <strong><span>於{$order['created_at']|strtotime|date_format:"%Y %m %d"} 購買 {$order['name']} 數量 {$order['quantity']} 共 {$order['money']*$order['quantity']} 元</span></strong>
                                </div>
                            {/foreach}
                        </div>
                        <div id = "recharge_record" class = "tab-pane fade">
                            {foreach $recharges as $index => $recharge}
                                <div>
                                    第{$index}筆:
                                    {if $recharge['status'] eq 0}
                                        <strong><span>於{$recharge['created_at']|strtotime|date_format:"%Y %m %d"} 儲值 {$recharge['e_coin']} E幣 至 帳戶 : {$recharge['target_account']}</span></strong>
                                    {else}
                                        <strong><span>於{$recharge['created_at']|strtotime|date_format:"%Y %m %d"} 花費 {$recharge['e_coin']} E幣 兌換 NT$ {$recharge['money']}</span></strong>
                                    {/if}
                                </div>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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

</script>