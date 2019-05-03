import 'bootstrap/js/dist/collapse';
import 'eonasdan-bootstrap-datetimepicker';

$('.search-input-group input').focusout(function () {
   if($(this).val()===""){
       console.log('focus lost');
       $(this).parent().toggle('collapse');
   }
});



$('.search-input-group label').click(function () {
    console.log('label clicked');
    let inputWrapper = $(this).next();
    let input = $(inputWrapper).children();
    if($(input).val() === "" || ($(input).val() !== "" && !$(inputWrapper).is(':visible')))
        $(inputWrapper).toggle('collapse');
});

$( function() {
    $( ".datepicker" ).datetimepicker();
} );