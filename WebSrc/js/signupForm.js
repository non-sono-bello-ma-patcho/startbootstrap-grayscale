$(document).ready(function (){
    $('#suUsername').keyup(function () {
        var currentUsername = $(this).val().toLowerCase();
        if(currentUsername!==""){
            $.get("php/rest.php", { param : currentUsername, op : "check" },(response)=>{
                let data = JSON.parse(response);
                $('#suUsername').toggleClass("is-invalid", data!=null).toggleClass("is-valid", data==null);
                $('#usernamecol').toggleClass("mb-0", data!=null).toggleClass("mb-3", data==null); // prevent form from warp
            });
        }
        // remove validation feedback if text is empty
        else
            $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
    });
    $('#suEmail').keyup(function () {
        var re = /([^\._]+@[a-z]+.(com|it|en|es))/;
        var email = $(this).val();
        if (email !== ""){
            $(this).toggleClass("is-invalid", !re.test(email)).toggleClass("is-valid", re.test(email));
            $('#emailcol').toggleClass("mb-0", re.test(email)).toggleClass("mb-3", re.test(email));
        }
        else
            $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
    });
    $('#suPassword').keyup(function () {
        var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&.]).{8,10}$/;
        var email = $(this).val();
        if (email !== ""){
            $(this).toggleClass("is-invalid", !re.test(email)).toggleClass("is-valid", re.test(email));
            $('#pwcol').toggleClass("mb-0", re.test(email)).toggleClass("mb-3", re.test(email));
        }
        else
            $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
    });
    $('#suConfirmPassword').keyup(function () {
        var pw = $('#suPassword').val();
        var conf =$(this).val();
        if (pw !== ""){
            $(this).toggleClass("is-invalid", pw!==conf).toggleClass("is-valid", pw===conf);
            $('#pwccol').toggleClass("mb-0", pw!==conf).toggleClass("mb-3", pw===conf);
        }
        else
            $(this).toggleClass("is-invalid", false).toggleClass("is-valid", false);
    });
});