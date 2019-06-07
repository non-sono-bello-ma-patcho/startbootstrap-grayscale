import 'bootstrap/js/dist/popover';

let $signUpEmail = $('#suEmail');
let $signUpUsername = $('#suUsername');
let $signUpPassword = $('#suPassword');
let $signUpConfirm = $('#suConfirmPassword');
let content = "Password must contains at least one digit, one interpunction symbol and one capital letter"

$(function () {
    $signUpPassword.parent().popover({ title : "Password format", content : content, placement : "top"});
});

$signUpPassword.on("focusout", function(){ $(this).parent().popover('hide')});

$signUpEmail.keyup(function () {
    let re = /([^@]+@[a-z]+.(com|it|en|es))/;
    let email = $(this).val();
    if (email !== "")
        $(this).toggleClass("is-invalid", !re.test(email)).toggleClass("is-valid", re.test(email)).parent().toggleClass("mb-0", re.test(email)).toggleClass("mb-3", re.test(email));
    else
        $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
});

$signUpPassword.keyup(function () {
    let re = /(?=.*\d)(?=.*(\W|_))(?=.*[A-Z]).+/;
    let email = $(this).val();
    if (email !== ""){
        let match = re.test(email), op = match? "hide" : "show";
        $(this).toggleClass("is-invalid", !match).toggleClass("is-valid", match).parent().popover(op);
    }
    else
        $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
});

// this removes popover on focusout, at least I hope


$signUpConfirm.keyup(function () {
    let pw = $signUpPassword.val();
    let conf =$(this).val();
    if (pw !== ""){
        $(this).toggleClass("is-invalid", pw!==conf).toggleClass("is-valid", pw===conf).parent.toggleClass("mb-0", pw!==conf).toggleClass("mb-3", pw===conf);
    }
    else
        $(this).removeClass("is-invalid").removeClass("is-valid");
});

$signUpUsername.keyup(function () {
    let test = $(this).val().toLowerCase();
    if(test!==""){
        let $data = `{ "prop" : "username", "username" : "${test}" }`;
        $.ajax({
            contentType : 'text/html',
            data : $data,
            type : 'POST',
            url : `rest/checkExist.php`
        }).done((response)=>{
            let exists = response.exists;
                $(this).toggleClass("is-invalid", exists).toggleClass("is-valid", !exists).parent().toggleClass("mb-0", exists).toggleClass("mb-3", !exists);
        }).catch((error)=>{
            console.log("an error occured");
        });
    } else {
        $(this).removeClass('is-valid').removeClass('is-invalid');
    }
});