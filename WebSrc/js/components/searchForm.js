import '../../scss/_search_form.scss';

import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/carousel';
import './datepicker';

/*
* add this feature on price field
*
* var cleave = new Cleave('.input-element', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
*
* */

$(window).on("load", ()=>{
    console.log("uncollapsing div on page load");
    $('.search-input-group input').each(function () {
        let _this = this;
        console.log(`${$(_this).attr('id')} has value: (${$(_this).val()})`);
        if($(_this).val()!=="")
            $(_this).parent().toggle('collapse');
    });
});

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


$('.carousel').carousel({
    interval : false
});