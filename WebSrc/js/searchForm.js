import 'bootstrap/js/dist/collapse';

let searchForm = $('.search-form-wrapper');
let div_top = searchForm.offset().top - (searchForm.height()-4);

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
//
// $(window).scroll(()=>{
//     console.log('page scrolling...');
//     let window_top = $(window).scrollTop();
//     console.log(`window top: ${window_top}, form-top: ${div_top}`);
//     if ((window_top > div_top)){
//         console.log('sticking to top');
//         $(searchForm).toggleClass('fixed-form', true);
//     }
//     else {
//         $(searchForm).toggleClass('fixed-form', false);
//     }
// });