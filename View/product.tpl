<div class = "container">
    <div class = "row" style="background:white;">
        {foreach $products as $product}
            <div class = "col-lg-4">
                <img id = "imgChange" src = "/uploads/images/{$product['image']}" style="width:350px;height:400px;">
            </div>
            <div class = "col-lg-8">
                <div>
                    <h3>{$product['name']}</h3>
                </div>
                <hr>
                <div>
                    {if $product['price_before_discount'] != 0}
                        <div class = "col-lg-2">
                            <h3><STRIKE style="font-size: 20px;">NT${$product['price_before_discount']}</STRIKE></h3>
                        </div>
                        <div class = "col-lg-10">
                            <h3><strong style="color:tomato">NT$ {$product['price']}</strong></h3>
                        </div>
                    {else}
                        <h3><strong>NT$ {$product['price']}</strong></h3>
                    {/if}
                </div>
                <div>
                    <h4>剩餘庫存: {$product['stock']} 件</h4>
                </div>
                <br>
                <br>
                <div class = "form-inline">
                    <div class = "form-group mb-2">
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
                            <button type = "submit" id = "btn-add-cart" class = "btn btn-primary btn-lg">
                                <i class="fas fa-cart-plus fa" style = "padding-right:1em;"></i>加入購物車
                            </button>
                            <!-- <input type="submit" id = "btn-add-cart" class = "btn btn-primary btn-lg" value = "加入購物車"> -->
                        </form>
                    </div>
                    <div class = "form-group mb-2 pull-right">
                        <form action = "confirm" method = "POST" style="float: right;">
                            <input type = "hidden" name = "price" value = "{$product['price']}">
                            <input type = "hidden" name = "image" value = "{$product['image']}">
                            <input type = "hidden" name = "product_id" value = "{$product['id']}">
                            <input type = "hidden" name = "name" value = "{$product['name']}">
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
                            {if isset($product_imgs)}
                                <!-- <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left fa-lg text-muted"></i>
                                    <span class="sr-only">Previous</span>
                                </a> -->
                                {foreach $product_imgs as $product_img}
                                    <div class="carousel-item col-md-4 ">
                                        <img src = "/uploads/images/{$product_img['image']}" style="width:150px;height:150px; cursor:pointer;" onclick = "changeImage(this)">
                                    </div>
                                {/foreach}

                                <!-- <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right fa-lg text-muted"></i>
                                    <span class="sr-only">Next</span>
                                </a> -->
                            {/if}
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
</div>
<hr>
<div class = "container" style="background:white;">
    <div class = "row" s>
    <h3 style = "text-align:center;">你可能也感興趣</h3>
    {foreach $random_prods as $random_prod}
        <div id = "products" style ="margin: 1em;">
            <a href = "product?product_id={$random_prod['id']}" style = "color: inherit;text-decoration: none;" >
                <div>
                    <img src = "/uploads/images/{$random_prod['image']}" style = "width:150px;height:150px;" title ="{$random_prod['description']}">
                </div>
                <span id = "test" style="">{$random_prod['name']}</span>
                <h3><strong>NT$ {$random_prod['price']}</strong></h3>
            </a>
            <form id = "number_form" action="/add_cart" method="post" >
                <input type = "hidden" name = "image" value = "{$random_prod['image']}">
                <input type = "hidden" name = "product_id" value = "{$random_prod['id']}">
                <input type = "hidden" name = "price" value = "{$random_prod['price']}">
                <input type = "hidden" name = "name" value = "{$random_prod['name']}">
                <input type = "number" id = "quantity" name = "quantity" list = "defaultNumbers" style = "width:70px" min = 1 max = "{$random_prod['stock']}" placeholder="1" value = "1">
                <input type="submit" id = "btn-add-cart" class = "btn btn-primary" value = "加入購物車">
            </form>
        </div>
    {/foreach}
    </div>
</div>
