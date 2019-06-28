$(document).ready(function(){
// ajax for add to shopping carts
$(".btn-add-cart").click(function() {
    var quantity = $(this).closest('div').find('#quantity').val();
    var image = $(this).closest('div').find('#image').val();
    var product_id = $(this).closest('div').find('#product_id').val();
    var price = $(this).closest('div').find('#price').val();
    var name = $(this).closest('div').find('#name').val();
    var clickevent = $(this);
    $.ajax({
        url: "add_cart",
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
                console.log(msg);
                if(msg.msg == "fail login"){
                    window.location.href = "login";
                } else{
                    $(clickevent).attr('disabled',true);
                    $(clickevent).text('已加入購物車');
                }
            },
            error: function(xhr) {
                alert(JSON.stringify(xhr));
                console.log("fail");
            },
    });
});
$('#sale').click(function() {
    var max_price = $("#sale_price").attr('max');
    $("#sale_price").toggle(this.checked);
    $("#sale_price").attr('placeholder',"must lower than "+ max_price);
    $("#price").toggle(!this.checked);
});

// Prevent user reload page again and again after submiting form
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}


//Checkbox disabled until checkbox checked
// $('#check').change(function () {
//     $('#status_submit').prop("disabled", !this.checked);
// }).change()




function Msg(){
    alert("系統閒置已登出!");
    location.href = "/logout";
}
 //閒置20分鐘，Session預設是20分鐘
 // window.setInterval(Msg(),6000   );

$('body').on('submit','form',function () {
    $('this').submit(function () {
        return false;
    });
    return true;
});


window.onerror = function(msg, url, linenumber) {
    alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
    return true;
}

});

function getNumber(){
    var num = document.getElementById('quantity').value;
    document.getElementById('h_quantity').value = num;
    // return confirm('前往結帳?');
}

//Click product image to change imgage
function changeImage(element) {
    // alert($(element).attr('src'));
    document.getElementById("imgChange").src = $(element).attr('src');
}

$(function() {
    $("textarea[maxlength]").bind('input propertychange', function() {
        var maxLength = $(this).attr('maxlength');
        if ($(this).val().length > maxLength) {
            $(this).val($(this).val().substring(0, maxLength));
        }
    })
});

//For bootstrap tab clcik to add # to url and show tab content
$(function(){
    var hash = window.location.hash;
    // alert(hash);
    var splits = hash.split('#');
    if(splits.length == 3 ){
        ('#'+splits[1]) && $('ul.nav a[href="' + ('#'+splits[1]) + '"]').tab('show');
        ('#order#'+splits[2]) && $('ul.nav a[href="' + ('#order#'+splits[2]) + '"]').tab('show');
    }else{
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');
    }
    $('.nav-tabs a').click(function (e) {
        $(this).tab('show');
        //scroll top
        var scrollmem = $('body').scrollTop() || $('html').scrollTop();
        // alert(this.hash);
        // change url #
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
    });
});

//Checkbox disabled until checkbox checked
$(function(){
    var init_hash = window.location.hash;
    $("input[type='radio']").change(function(){
        $("input[type='submit']").prop("disabled", false);
    });
    // If tab changed, unchecked the selected radio button
    $("a[data-toggle = 'tab']").click(function(){
        var hash = window.location.hash;
        if(init_hash != hash){
            $("input[type='radio']").prop('checked', false);
        }
    });
});
