<div class = "container">
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
                        <td>{$shopping_cart['image']}
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
                            <form action = "shopping_cart" method = "POST">
                                <input type = "hidden" name = "del_product_id" value = "{$shopping_cart['id']}">
                                <input type = "submit" name = "del_product" class = "btn btn-danger" onclick = "return confirm('確認刪除此商品?')"  value = "刪除">
                            </form>

                        </td>

                    </tr>
                    {$total_price=$total_price+$temp_price}
                {/foreach}
            </table>
        <!-- </div> -->
        <!-- <div class = "container"> -->
            <i class="fas fa-money-bill-alt fa-3x">ToTal price ： {$total_price}</i>
            <form action = "" method = "POST" style="float: right;">
                <button type = "submit" class = "btn btn-primary" name = "pay">
                    <i class="fas fa-cash-register fa" style = "padding-right:1em; color:white"></i>結帳
                </button>
                <!-- <input type = "submit" class = "btn btn-primary" name = "pay" value = "結帳"> -->
            </form>
        <!-- </div> -->
    </div>
</div>
