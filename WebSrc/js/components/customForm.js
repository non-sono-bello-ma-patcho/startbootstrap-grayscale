import '../../scss/_custom_form.scss';

import 'bootstrap/js/dist/collapse';

/*
* add this feature on price field
*
* var cleave = new Cleave('.input-element', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
*
* */

$(document).on("ready", ()=>{
    $('.custom-input-group input').each(function () {
        let _this = this;
        console.log(`${$(_this).attr('id')} has value: (${$(_this).val()})`);
        console.log(`${$(_this).attr('id')} has placholder: (${$(_this).attr('placeholder')})`);
        if($(_this).val()!=="" || $(_this).attr('placeholder')!=="")
            $(_this).parent().toggle('collapse');
    });
});

$('.custom-input-group input').focusout(function () {
    let _this = this;
    setTimeout(()=>{
        if($(_this).val() === "" && ($(_this).attr('placeholder') === "" || $(_this).attr('placeholder') === undefined)){
            console.log($(_this).attr('id')+': lost focus');
            $(_this).parent().toggle('collapse');
        }
    }, 500);
});


$('.custom-input-group label').click(function () {
    console.log('label clicked');
    let inputWrapper = $(this).next();
    if(!$(inputWrapper).is(':visible'))
        $(inputWrapper).toggle('collapse');
});

$('.custom-form').on('submit', function(){

});

