<?php
/* Smarty version 3.1.33, created on 2019-06-27 10:48:59
  from 'C:\xampp\htdocs\shopping_cart\view\recharge.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d142e9bb93068_69488694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dd000a12f223f0f630581713c7c2f916525d095' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping_cart\\view\\recharge.tpl',
      1 => 1561603738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d142e9bb93068_69488694 (Smarty_Internal_Template $_smarty_tpl) {
?><div class = "container">
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
            <i class="fas fa-dollar-sign fa-3x" style = "color:#e6c61e;line-height: 150px;vertical-align: middle;"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['money']->value);?>
</i>
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
                    <div id="coin" data-toggle="" data-disable="false">
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
                        您的帳戶:<input type="text" style="margin-left:1em;" name = "account_id" required>
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
<?php }
}