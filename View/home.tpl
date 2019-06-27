<div class = "container-fluid" style="text-align: center;">

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
                        {foreach $types as $type}
                            <li>
                                <form action="home" method="POST">
                                    <input style="" type="hidden" name="type" value="{$type['type']}" />
                                    <a href="?type={$type['type']}" onclick="this.parentNode.submit()"><h4>{$type['type']}</h4></a>
                                </form>
                            </li>
                        {/foreach}
                    </ul>
                </li>
            </ul>
        </div>


<!-- {foreach $shopping_carts as $res2}
    <pre>{print_r($res2)}</pre>
{/foreach} -->

    </nav>
    {if isset($select_type)}
        <h3 style  ="text-align:center;margin-right: 15em;">以下為 <strong>{$select_type}</strong> 的商品</h3>
    {else}
        <h3 style  ="text-align:center;margin-right: 15em;">全部商品</h3>
    {/if}
    <div class = "row" style = "background:white;">

        <div class="col-lg-9" style="border-right: inset;">
            {foreach $products as $index => $product}
                <div id = "products" style ="margin: 1em;">
                    <a href = "product?product_id={$product['id']}" style = "color: inherit;" >
                        <div id = "products-image">
                            <img src = "/uploads/images/{$product['image']}" style = "width:150px;height:150px;" title ="{$product['description']}">
                        </div>
                        <span>{$product['name']}</span>
                        {if $product['price_before_discount'] != 0}
                        <div class="row">
                            <div class = "col-lg-3">
                                <h4 style="line-height: inherit;"><STRIKE>${$product['price_before_discount']}</STRIKE></h4>
                            </div>
                            <div class = "col-lg-9">
                                <h3><strong style="color:tomato">NT$ {$product['price']}</strong></h3>
                            </div>
                        </div>
                        {else}
                            <h3><strong>NT$ {$product['price']}</strong></h3>
                        {/if}

                    </a>
                    <form id = "number_form" action="/add_cart" method="post" >
                        <input type = "hidden" name = "image" value = "{$product['image']}">
                        <input type = "hidden" name = "product_id" value = "{$product['id']}">
                        <input type = "hidden" name = "price" value = "{$product['price']}">
                        <input type = "hidden" name = "name" value = "{$product['name']}">
                        <input type = "number" id = "quantity" name = "quantity" list = "defaultNumbers" style = "width:70px" min = 1 max = "{$product['stock']}" placeholder="1" value = "1">
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
            {/foreach}
        </div>
        <div class = "col-lg-3">

            <h3>Random Product</h3>
            {foreach $random_prods as $index => $random_prod}
                <a href = "product?product_id={$random_prod['id']}" style = "color: inherit;text-decoration: none;" >
                    <div>
                        <img src = "/uploads/images/{$random_prod['image']}" style = "width:150px;height:150px;" title ="{$random_prod['description']}">
                    </div>
                    <span id = "test" style="line-height: 40px;">{$random_prod['name']}</span>
                    <h3><strong>NT$ {$random_prod['price']}</strong></h3>
                    <form id = "number_form" action="/add_cart" method="post" >
                        <input type = "hidden" name = "image" value = "{$random_prod['image']}">
                        <input type = "hidden" name = "product_id" value = "{$random_prod['id']}">
                        <input type = "hidden" name = "price" value = "{$random_prod['price']}">
                        <input type = "hidden" name = "name" value = "{$random_prod['name']}">
                        <input type = "number" id = "quantity" name = "quantity" list = "defaultNumbers" style = "width:70px" min = 1 max = "{$random_prod['stock']}" placeholder="1" value = "1">
                        <!-- <input type="submit" id = "btn-add-cart" class = "btn btn-primary" value = "加入購物車"> -->
                        <button type = "submit" id = "btn-add-cart" class = "btn btn-primary">
                            <i class="fas fa-cart-plus fa" style = "padding-right:1em;"></i>加入購物車
                        </button>
                    </form>
                    <br>
                </a>
            {/foreach}
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
            {if isset($page)}
                {if isset($flag)}
                    {for $i=1 to $page['pages']}
                        <li class="page-item"><a class="page-link" href="?type={$select_type}&page={$i}">{$i}</a></li>
                    {/for}
                {else}
                    {for $i=1 to $page['pages']}
                        <li class="page-item"><a class="page-link" href="?page={$i}">{$i}</a></li>
                    {/for}
                {/if}
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
