<div class = "container-fluid" style = "text-align: center;">
    <h2 style = "text-align:center;">以下為<strong>{$search_text}</strong>的搜尋結果</h2>
    {foreach $query_results as $query_result}
        <div id = "products" style ="margin: 1em;">
            <div id = "products-image">
                <img src = "/uploads/images/{$query_result['image']}" style = "width:150px;height:150px;" title ="{$query_result['description']}">
            </div>
            <span>{$query_result['name']}</span>
            <!-- <span>{$result['id']}</span> -->
            <h4>{$query_result['price']}</h4>
            <form id = "number_form" action="/add_cart" method="post" >
                <input type = "hidden" name = "image" value = "{$query_result['image']}">
                <input type = "hidden" name = "product_id" value = "{$query_result['id']}">
                <input type = "hidden" name = "price" value = "{$query_result['price']}">
                <input type = "hidden" name = "name" value = "{$query_result['name']}">
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
    {/foreach}
</div>
