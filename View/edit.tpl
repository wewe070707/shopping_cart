<div class = "container">
    <div class = "row">
        {foreach $products as $product}
            <div class = "col-lg-4" style = "padding:5px; display:inline-block;">
                <img src = "/uploads/images/{$product['image']}" style = "width:150px; height:150px; float:left;  margin-right:25px;">
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
                        <input type = "text" name="type" class="form-control" value = "{$product['type']}" >
                        <label for="inputContent" class="col-sm-2 control-label">Name</label>
                        <input type = "text" name="name" class="form-control" value = "{$product['name']}">
                    </div>
                </div>
                <div class="form-group">
                    <div style="display:flex;">
                        <label for="inputContent" class="col-sm-2 control-label">Quantity</label>
                        <input type = "number" name="quantity" class="form-control" min = "0" value = "{$product['quantity']}">
                        <label for="inputContent" class="col-sm-2 control-label">Price</label>
                        <input type = "number" name="price" class="form-control" min = "0" value = "{$product['price']}">
                    </div>
                </div>
                <div class="form-group">
                    <div style="display:flex;">
                        <label for="inputContent" class="col-sm-2 control-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{$product['description']}</textarea>
                    </div>
                </div>
                <div class=" form-group modal-body">
                    <div class="form-group modal-footer" id="modal_footer">
                        <input type="submit" name ="submit" class = "btn btn-primary" value="送出">
                    </div>
                </div>
            </form>
        </div>
        {/foreach}
    </div>
</div>
