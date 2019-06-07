import "../scss/login.scss";

import 'bootstrap/js/dist/carousel';
import {getCookie} from "./common.js";
import './components/signupForm';

$('.carousel').carousel({
    interval : false
});

$(document).ready(()=>{
    $('input,textarea').attr('autocomplete', 'off');
    // load placeholder
    activateSlide();
});

function activateSlide(){
    let urlParams = new URLSearchParams(window.location.search), missing = "";
    if(urlParams.has('missing'))
        missing = urlParams.get('missing');
    console.log(`missing: ${missing}`);
    switch (missing) {
        case "password":
            $('#inputUsernamelog').val(getCookie('user'));
            $('#imgUserlog').removeClass('d-none');
            $('.carousel').carousel('prev');
            break;
        default:
            $('#suUsername').val(getCookie('user'));
            break;
    }
}