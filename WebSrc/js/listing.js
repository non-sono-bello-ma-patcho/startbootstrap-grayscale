import '../scss/listing.scss';

import "./common";
import "./components/searchForm";
import "./components/private_card";
import "./components/signupForm";

$('#loglink').click(()=>{
    $('#loginModal').modal('hide');
    $('#signUpModal').modal('show');
});