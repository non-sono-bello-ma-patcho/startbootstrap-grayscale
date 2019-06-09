import 'bootstrap/js/dist/popover';

let $inputPassword = $('#inputNewPassword');
let $inputConfirm = $('#inputConfirm');

let content = "Password must contains at least one digit, one interpunction symbol and one capital letter";

$(function () {
    $inputPassword.popover({ title : "Password format", content : content, placement : "top"});
    $inputPassword.on("focusout", function(){ $(this).popover('hide')});
});

$inputPassword.keyup(function () {
    let re = /(?=.*\d)(?=.*(\W|_))(?=.*[A-Z]).+/;
    let pw = $(this).val();
    if (pw !== ""){
        let match = re.test(pw), op = match? "hide" : "show";
        $(this).toggleClass("is-invalid", !match).toggleClass("is-valid", match).popover(op);
    }
    else
        $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
});

// this removes popover on focusout, at least I hope


$inputConfirm.keyup(function () {
    let pw = $inputPassword.val();
    let conf =$(this).val();
    if (pw !== ""){
        $(this).toggleClass("is-invalid", pw!==conf).toggleClass("is-valid", pw===conf).parent().toggleClass("mb-0", pw!==conf).toggleClass("mb-3", pw===conf);
    }
    else
        $(this).removeClass("is-invalid").removeClass("is-valid");
});
