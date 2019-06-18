import "./passwordCheck";

let $signupForm = $('#signUpForm input');
let $signUpEmail = $('#suEmail');
let $anagraphic = $('#suName, #suSurname');
let $signUpUsername = $('#suUsername');
let $signupSubmit = $('#suSubmit');

$signUpEmail.keyup(() => {
    let re = /([^@]+)(@[a-z]+)(.com|it|en|es)/;
    let email = $signUpEmail.val();
    if (email !== ""){
        let $data = `{ "prop" : "email", "email" : "${email}" }`;
        $.ajax({
            contentType : 'text/html',
            data : $data,
            type : 'POST',
            url : `rest/checkExist.php`
        }).done((response)=>{
            let exists = response.exists;
            let valid = re.test(email) && !exists;
            $signUpEmail.toggleClass("is-invalid", !valid).toggleClass("is-valid", valid).parent().toggleClass("mb-0", !valid).toggleClass("mb-3", valid);
            toggleSubmit(valid);
        }).catch((error)=>{
            console.log("an error occurred");
        });
    }
    else{
        $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
    }
});

$anagraphic.keyup(()=>{
    let re = /[A-Z][a-z]+/;
    $anagraphic.each((i, elem)=>{
        let val = $(elem).val();
        if(val !== ""){
            let valid = re.test(val);
            $(elem).toggleClass("is-invalid", !valid).toggleClass("is-valid", valid);
        }
        else{
            $(elem).toggleClass("is-invalid", false).toggleClass("is-valid", false);
        }

    });
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
                toggleSubmit(exists);
        }).catch((error)=>{
            console.log("an error occured");
        });
    } else {
        $(this).removeClass('is-valid').removeClass('is-invalid');
        toggleSubmit(true);
    }
});

$signupForm.on("change", ()=>{
    console.log("change detected");
    console.log($signupForm);
    toggleSubmit($('#signUpForm input.is-valid').length !== 6)
});

function toggleSubmit(val){
    $signupSubmit.prop("disabled", val).toggleClass("disabled", val);
}