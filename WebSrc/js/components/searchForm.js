import '../../scss/_slider.scss';

import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/carousel';
import './datepicker';

$('.search-input-group input').focusout(function () {
    let _this = this;
    setTimeout(()=>{
        if($(_this).val()===""){
            console.log($(_this).attr('id')+': lost focus');
            $(_this).parent().toggle('collapse');
        }
    }, 500);
});


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


$(window).scroll((e)=>{
    let wrap = $('#small_form_wrapper');
    if ($(window).scrollTop() > $('#big_form_wrapper').offset().top+20 && !$('.fixed-form').is(':visible')) {
        $('.carousel').carousel('next');
    } else if($(window).scrollTop() < $('#big_form_wrapper').offset().top+20 && $('.fixed-form').is(':visible')){
        $('.carousel').carousel('prev');
    }
});


$('.carousel').carousel({
    interval : false
});