<div class = "container">
    <div class = "row">
        <div class = "col-lg-10">
            <ul class = "nav nav-tabs nav-justified" >
                <li id = "add">
                    <a data-toggle = "tab" href = "#recharge">
                        <i class="fab fa-edge fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;"></i>
                        加值
                    </a>
                </li>
                <li id = "ext">
                    <a data-toggle = "tab" href = "#change">
                        <i class="fas fa-exchange-alt fa-3x" style = "padding-right: inherit;line-height: 150px;vertical-align: middle;"></i>
                        兌換
                    </a>
                </li>
            </ul>

        </div>
        <div class = "col-lg-2">
            <i class="fas fa-dollar-sign fa-3x" style = "color:#e6c61e;line-height: 150px;vertical-align: middle;">{$money|string_format:"%.2f"}</i>
        </div>
    </div>
    <div class = "row">
        <div class = "tab-content">
            <div id = "recharge" class = "tab-pane fade">
            {* <div class = "col-md-12"> *}
                <ul class = "nav nav-tabs nav-justified" >
                    <li >
                        <a data-toggle = "tab" href = "#recharge_self">
                            加值到帳戶
                        </a>
                    </li>
                    <li>
                        <a data-toggle = "tab" href = "#recharge_other">
                            加值到他人帳戶
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class = "tab-content">
            <div id = "recharge_self" class = "tab-pane fade">
                <form action="confirm" role = "form" method ="post">
                    <label style="display:block; margin-top:1em;">
                        <span class="" style="">► 1.</span>
                        您要儲值的點數為<i class="fas fa-coins fa-2x" style = "color:#e6c61e;"></i> E 幣
                    </label>
                    {* <label> 
                        <span class="" style="">► 2.</span>
                        您要儲值的帳戶id:<input type="text" style="margin-left:1em;" name = "account_id" required>
                    </label> *}
                    <label>
                        <span class="" style="">► 2.</span>
                        您要儲值的面額
                    </label>
                    <div id="coin">
                        <div class = "col-lg-12">
                            <label><input type="radio" name="coin" id="option1" value = "100"><span> $NT 100 <br> (100 E 幣)</span></label>
                            <label><input type="radio" name="coin" id="option2" value = "250"><span> $NT 250 <br> (250 E 幣)</span></label>
                            <label><input type="radio" name="coin" id="option3" value = "500"><span> $NT 500 <br> (525 E 幣)</span> </label>
                            <label><input type="radio" name="coin" id="option3" value = "1000"><span> $NT 1000 <br> (1075 E 幣)</span></label>
                            <label><input type="radio" name="coin" id="option3" value = "2000"><span> $NT 2000 <br> (2200 E 幣)</span></label>
                            <label><input type="radio" name="coin" id="option3" value = "5000"><span> $NT 5000 <br> (5750 E 幣)</span></label>
                        </div>
                        <input id = "confirm" type="submit" class = "btn btn-primary btn-block" name="recharge_self" value="確認" disabled>
                        <!-- <button type="submit" name ="submit"  onclick="javascript:document.forms[0].submit();">確認</button> -->
                    </div>
                </form>
            </div>
            <div id = "recharge_other" class = "tab-pane fade">
                <form action="confirm" role = "form"method ="post">
                    <label style="display:block; margin-top:1em;">
                        <span class="" style="">► 1.</span>
                        您要儲值的點數為<i class="fas fa-coins fa-2x" style = "color:#e6c61e;"></i> E 幣
                    </label>
                    <label>
                        <span class="" style="">► 2.</span>
                        您要儲值的帳戶id:<input type="text" style="margin-left:1em;" name = "account_id" required>
                    </label>
                    <label>
                        <span class="" style="">► 3.</span>
                        您要儲值的面額
                    </label>
                    <div id="coin">
                        <div class = "col-lg-12">
                              <label><input type="radio" name="coin" id="option1" value = "100"><span> $NT 100 <br> (100 E 幣)</span></label>
                              <label><input type="radio" name="coin" id="option2" value = "250"><span> $NT 250 <br> (250 E 幣)</span></label>
                              <label><input type="radio" name="coin" id="option3" value = "500"><span> $NT 500 <br> (525 E 幣)</span> </label>
                              <label><input type="radio" name="coin" id="option3" value = "1000"><span> $NT 1000 <br> (1075 E 幣)</span></label>
                              <label><input type="radio" name="coin" id="option3" value = "2000"><span> $NT 2000 <br> (2200 E 幣)</span></label>
                              <label><input type="radio" name="coin" id="option3" value = "5000"><span> $NT 5000 <br> (5750 E 幣)</span></label>
                        </div>
                          <input id = "confirm" type="submit" class = "btn btn-primary btn-block" name="recharge_submit" value="確認" disabled>
                          <!-- <button type="submit" name ="submit"  onclick="javascript:document.forms[0].submit();">確認</button> -->
                    </div>
                </form>
            </div>
            <div id = "change" class = "tab-pane fade">
                <form action="confirm" method ="post">
                    <label style="display:block; margin-top:1em;">
                        <span class="" style="">► 1.</span>
                        您目前將要用 <i class="fas fa-coins fa-2x" style = "color:#e6c61e;"></i> E 幣 兌換為 NT$
                    </label>
                    {* <label>
                        <span class="" style="">► 2.</span>
                        您的帳戶:<input type="text" style="margin-left:1em;" name = "account_id" required>
                    </label> *}
                    <label>
                        <span class="" style="">► 2.</span>
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
                            <input id = "confirm" type="submit" class = "btn btn-block btn-primary" name="change_submit" value="確認" disabled>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
