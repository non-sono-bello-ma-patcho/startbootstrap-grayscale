import 'bootstrap/js/dist/collapse';
$('.search-input-group input').focusout(function () {
    let _this = this;
    setTimeout(()=>{
        if($(_this).val()===""){
            console.log($(_this).attr('id')+': lost focus');
            $(_this).parent().toggle('collapse');
        }
    }, 500);
});

import './datepicker';



$('.search-input-group label').click(function () {
    console.log('label clicked');
    let inputWrapper = $(this).next();
    let input = $(inputWrapper).children();
    if($(input).val() === "" || ($(input).val() !== "" && !$(inputWrapper).is(':visible')))
        $(inputWrapper).toggle('collapse');
});

$( function() {
    $( ".datepicker" ).datepicker({orientation : 'bottom'});
} );