
// load user informations on success
function loaduserinfo() {
    // activate information area
    var input=$('#newusername');
    var infoarea=$('#userinfo');
    var addbutton=$('#adduserbtn');
    if(input.val()==="phibonachos"){
        input.toggleClass('is-invalid', false);
        // init component
        // call async request
        $('#usernametag').innerHTML = "phibonachos";
        $('#nametag').innerHTML = "Mario";
        $('#surnametag').innerHTML = "Rossi";
        $('#emailtag').innerHTML = "123@abc.com";

        // display area
        infoarea.toggleClass('d-block', true).toggleClass('d-none', false);

        // activate add button
        addbutton.toggleClass('disabled', false);
    }
    else {
        infoarea.toggleClass('d-block', false).toggleClass('d-none', true);
        input.toggleClass('is-invalid', true);
        addbutton.toggleClass('disabled', true);
    }
}
