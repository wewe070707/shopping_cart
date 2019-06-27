<div class = "container">

<!-- include('simple_html_dom.php');
$html = new simple_html_dom(); -->

<!-- // $html->load_file('');
// $ret = $html->find('.productcard-skin');
// <pre>var_dump($ret);<pre>
// $html->clear(); -->
<div class = "container">
    <div class = "row">
        <div class = "col-lg-10">
            <ul class = "nav nav-tabs nav-justified" >
                <li >
                    <a data-toggle = "tab" href = "#recharge">
                        <i class="fab fa-edge fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;"></i>
                        加值
                    </a>
                </li>
                <li>
                    <a data-toggle = "tab" href = "#change">
                        <i class="fas fa-exchange-alt fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;"></i>
                        兌換
                    </a>
                </li>
            </ul>

        </div>
        <div class = "col-lg-2">
            <i class="fas fa-dollar-sign fa-3x" style = "color:#e6c61e;line-height: 150px;vertical-align: middle;"></i>
        </div>
    </div>
    <div class = "row">
        <div class = "tab-content">
            <div id = "recharge" class = "tab-pane fade">
                <form action="confirm" role = "form"method ="post">
                    <label style="display:block;">
                        <span class="" style="">► 1.</span>
                        您要儲值的點數
                    </label>
                    <label>
                        <span class="" style="">► 2.</span>
                        您要儲值的帳戶id:<input type="text" style="margin-left:1em;" name = "account_id" required>
                    </label>
                    <label>
                        <span class="" style="">► 3.</span>
                        您要儲值的面額
                    </label>
                    <div id="e_coin" data-toggle="" data-disable="false">
                          <label class="btn btn-primary btn-block" style="color: black;">
                            <input type="radio" name="coin" id="option1" value = "100"> $NT 100 (100 <i class="fab fa-edge"></i> 幣)
                          </label>
                          <label class="btn btn-primary btn-block" style="color: black;">
                            <input type="radio" name="coin" id="option2" value = "250"> $NT 250 (250 <i class="fab fa-edge"></i> 幣)
                          </label>
                          <label class="btn btn-primary btn-block" style="color: black;">
                            <input type="radio" name="coin" id="option3" value = "500"> $NT 500 (525 <i class="fab fa-edge"></i> 幣)
                          </label>
                          <label class="btn btn-primary btn-block" style="color: black;">
                            <input type="radio" name="coin" id="option3" value = "1000"> $NT 1000 (1075 <i class="fab fa-edge"></i> 幣)
                          </label>
                          <label class="btn btn-primary btn-block" style="color: black;">
                            <input type="radio" name="coin" id="option3" value = "2000"> $NT 2000 (2200 <i class="fab fa-edge"></i> 幣)
                          </label>
                          <label class="btn btn-primary btn-block" style="color: black;">
                            <input type="radio" name="coin" id="option3" value = "5000"> $NT 5000 (5750 <i class="fab fa-edge"></i> 幣)
                          </label>
                          <input id = "confirm" type="submit" class = "btn btn-block" name="recharge_submit" value="確認">
                          <!-- <button type="submit" name ="submit"  onclick="javascript:document.forms[0].submit();">確認</button> -->
                    </div>
                </form>
            </div>
            <div id = "change" class = "tab-pane fade">
                <form action="confirm" method ="post">
                    <label style="display:block;">
                        <span class="" style="">► 1.</span>
                        您要兌換的數量
                    </label>
                    <label>
                        <span class="" style="">► 2.</span>
                        您要儲值的帳戶id:<input type="text" style="margin-left:1em;" name = "account_id" required>
                    </label>
                    <label>
                        <span class="" style="">► 3.</span>
                        您要兌換的面額
                    </label>
                    <div id="money">
                            <div class = "col-lg-12">
                                <label><input type="radio" name="money" value = "100"><span>100 E 幣<br>($NT 85 )</span></label>
                                <label><input type="radio" name="money" value = "250"><span>250 E 幣<br>($NT 212.5 )</span></label>
                                <label><input type="radio" name="money" value = "500"><span>500 E 幣<br>($NT 425 )</span></label>
                                <label><input type="radio" name="money" value = "1000"><span>1000 E 幣<br>($NT 850 )</span></label>
                                <label><input type="radio" name="money" value = "2000"><span>2000 E 幣<br>($NT 1700 )</span></label>
                            </div>
                            <div class  ="col-lg-12">
                                <label><input type="radio" name="money" value = "5000"><span>5000 E 幣<br>($NT 4250 )</span></label>
                            </div>
                            <input id = "confirm" type="submit" class = "btn btn-block" name="recharge_submit" value="確認">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


    <!-- <div id="donate">
        <div class = "col-lg-12">
            <label><input type="radio" name="money" value = "100"><span>100 E 幣<br>($NT 85 )</span></label>
            <label><input type="radio" name="money" value = "250"><span>250 E 幣<br>($NT 212.5 )</span></label>
            <label><input type="radio" name="money" value = "500"><span>500 E 幣<br>($NT 425 )</span></label>
            <label><input type="radio" name="money" value = "1000"><span>1000 E 幣<br>($NT 850 )</span></label>
            <label><input type="radio" name="money" value = "2000"><span>2000 E 幣<br>($NT 1700 )</span></label>
        </div>
        <div class  ="col-lg-12">
            <label><input type="radio" name="money" value = "5000"><span>5000 E 幣<br>($NT 4250 )</span></label>
        </div>
        <input id = "confirm" type="submit" class = "btn btn-block" name="recharge_submit" value="確認">
    </div> -->



<button id = "ajax" value = "1">click</button>
<input type = "number" id = "quantity" name = "quantity" list = "defaultNumbers" style = "width:70px" min = 1 max = "5" placeholder="1" value = "1">
<input type = "hidden" id = "image" name = "image" value = "test_mg">
<input type = "hidden" id = "product_id" name = "product_id" value = "77">
<input type = "hidden" id = "price" name = "price" value = "777">
<input type = "hidden" id = "name" name = "name" value = "testname">
<button id = "ajax2" >click2</button>
<script>
$("#ajax").click(function() {
    var quantity = document.getElementById('quantity').value;
    var image = document.getElementById('image').value;
    var product_id = document.getElementById('product_id').value;
    var price = document.getElementById('price').value;
    var name = document.getElementById('name').value;
    // alert(image);
    $.ajax({
        // url: "test.php",
        data: {
            quantity: quantity,
            image: image,
            product_id: product_id,
            price: price,
            name: name
        },
        type: "POST",
        dataType: 'json',
        success: function(msg) {
                alert(msg);
                console.log(msg);
                console.log('123');
            },
            error: function(xhr) {
                console.log("fail");
            },
            complete: function() {
                console.log("fail");
            }
    });
});
$("#ajax2").click(function() {
    $.ajax({
        url: "http://192.168.154.209/phili.test/wallet.class.php?action=insert_wallet&userid=1571102",
        // data: {
        //     action: "insert_wallet",
        //     userid: "12345"
        // },
        type: "GET",
        dataType: 'json',
        success: function(msg) {
                alert(msg);
                console.log(msg);
            },
            error: function(xhr) {
                console.log("fail");
            },
            complete: function() {
                console.log("fail");
            }
    });
});
</script>
