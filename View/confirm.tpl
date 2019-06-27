<div class = "container" style="background:white">
    <div class = "row">
        <div class = 'col-lg-12'>
            {if $confirm_type eq 'shopping'}
                <ul class = "nav" style="text-align:center;">
                    <h3><strong>確認購買以下商品?</strong></h3>
                </ul>
                {if isset($shopping_carts)}
                    {foreach $shopping_carts as $shopping_cart}
                        <div class = "col-lg-12" style="margin-bottom:1em;">
                            <div class = "col-lg-2">
                                <img src = "/uploads/images/{$shopping_cart['image']}" style = "width:150px;height:150px;">
                            </div>
                            <div class = "col-lg-5">
                                <span style="vertical-align: middle;">{$shopping_cart['name']}</span>
                            </div>
                            <div class = "col-lg-2">
                                <span style="vertical-align: middle;">{$shopping_cart['price']}</span>
                            </div>
                            <div class = "col-lg-1">
                                <span style="vertical-align: middle;">{$shopping_cart['quantity']}</span>
                            </div>
                            <div class = "col-lg-2">
                                <span style="vertical-align: middle;">{$shopping_cart['price']|intval*$shopping_cart['quantity']|intval}</span>
                            </div>
                        </div>

                    {/foreach}
                {/if}

                <div class = "col-lg-12">
                    <form action = "transfer" method = "POST">
                        <div class="col-lg-12 form-group">
                            <div style="display:flex;">
                                <label for="inputContent" class="col-sm-2 control-label">備註</label>
                                <textarea maxlength='250' name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class = "col-lg-12">
                            <div class = "col-lg-8">
                                <h3><strong>目前金額 ： NT$ {$wallet}</strong></h3>
                                <h3><strong>商品金額 ： NT$ {$total}</strong></h3>
                                <hr>
                                <h3><strong>剩餘金額 ： NT$ {$wallet-$total}</strong></h3>
                            </div>
                            <div class = "col-lg-4">
                                <input type = "hidden" name = "total" value = "{$total}">
                                {if isset($direct)}
                                    {foreach $shopping_carts as $shopping_cart}
                                        <input type="hidden" name = "direct" value ="1">
                                        <input type = "hidden" name = "product_id" value = "{$shopping_cart['id']}">
                                        <input type = "hidden" name = "price" value = "{$shopping_cart['price']}">
                                        <input type = "hidden" name = "quantity" value = "{$shopping_cart['quantity']}">
                                        <input type = "hidden" name = "name" value = "{$shopping_cart['name']}">

                                    {/foreach}
                                {/if}
                                <button type = "button" onclick = "history.back()" class = "btn btn-primary">返回</button>
                                <button type = "submit" class = "btn btn-primary" name = "total_confirm" onclick = "return confirm('確認結帳?')">
                                    <i class="fas fa-cash-register fa" style = "padding-right:1em; color:white"></i>結帳
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            {elseif $confirm_type eq 'recharge'}
                <ul class = "nav" style="text-align:center;">
                    <h2><strong>確認送出交易?</strong></h2>
                    <label>
                        <p>您所選擇的面額為$NT {$coin}</p>
                        您將儲值<span style="font-size: 25px;color:tomato">
                        {if $coin eq 100}
                        {elseif $coin eq 250}{$e_coin=250}250
                        {elseif $coin eq 500}{$e_coin=525}525
                        {elseif $coin eq 1000}{$e_coin=1075}1075
                        {elseif $coin eq 2000}{$e_coin=2200}2200
                        {elseif $coin eq 5000}{$e_coin=5750}5750
                        {/if}</span>
                        枚<i class="fab fa-edge fa-2x"></i> 幣
                        至 帳戶: <span style="font-size: 25px;color:tomato">{$smarty.session.transfer_target_account}</span>
                    </label>
                    <div class = "row">

                        {foreach $users as $user}
                            <div class = "col-lg-6">
                                <i class="fas fa-user fa-2x" style = "margin-top:1em ;display:block;">您的帳戶 ： {$user['wallet_account']}</i>
                                <i class="fas fa-wallet fa-2x" style = "margin-top:1em;display:block;">帳戶餘額 ： {$user['money']}</i>
                                <i class="fas fa-wallet fa-2x" style = "margin-top:1em">購買後餘額 ： {$user['money']-$coin|string_format:"%.2f"} </i>
                            </div>
                            <div class = "col-lg-6">
                                <i class="fas fa-wallet fa-2x" style="margin-top:1em;">目前<i class="fab fa-edge" style=""></i>幣 ： {$user['e_coin']}</i>
                                <br>
                                {if $user['wallet_account'] eq $smarty.session.transfer_target_account}
                                    <i class="fas fa-wallet fa-2x" style="margin-top:1em;">儲值後<i class="fab fa-edge" style=""></i>幣 ： {$user['e_coin']+$e_coin|string_format:"%.2f"}</i>
                                {else}
                                    <i class="fas fa-wallet fa-2x" style="margin-top:1em;">儲值後<i class="fab fa-edge" style=""></i>幣 ： 不變</i>
                                {/if}
                            </div>
                        {/foreach}
                    </div>
                    <form action = "transfer" method="post">
                        <input type ="hidden" name = "coin" value = "{$coin}">
                        <input type ="hidden" name = "e_coin" value = "{$e_coin}">
                        <button type = "button" onclick = "history.back()" class = "btn btn-primary">返回</button>
                        {if $user['money'] < $coin|string_format:"%.2f"}
                            <input type ="submit" class = "btn btn-primary" value = "餘額不足" disabled>
                        {else}
                            <input type ="submit" class = "btn btn-primary" name = "recharge" value = "送出" onclick="return confirm('確認送出?');">
                        {/if}
                    </form>
                </ul>
            {/if}
        </div>
    </div>
</div>
