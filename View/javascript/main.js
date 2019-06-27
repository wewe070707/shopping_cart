// $("#btn-addcart").click(function() {
//     $.ajax({
//         url:route.php,
//         data:,
//         type: "POST",
//         dataType: "json",
//         success: function(){
//
//         },
//         error: function(){
//
//         }
//     });
// });

$(document).ready(function(){
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
$('#check').change(function () {
    $('#status_submit').prop("disabled", !this.checked);
}).change()




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

$(function(){
    $("input[type = 'radio']").change(function(){
         $("input[type='submit']").prop("disabled", false);
    });
})

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
