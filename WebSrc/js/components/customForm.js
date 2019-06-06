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
let $select = $('select[name=level]');


$(document).ready(()=>{
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

$('.custom-form .dropdown-item').click(function () {
    let $level_button = $(this).parent().prev();
    let prev = $level_button.data('class');
    let _this = this;
    let level = $(_this).text();
    let _class = level === "select"? "primary" : level;
    let _text = level === "select"? "level" : level;
    $(`.custom-form select[name=level] option:contains("${level}")`).prop('selected', true); // select correct style
    console.log(`triggering change event with class: ${_class}, text: ${_text}`);
    $select.trigger('change', [_class, _text]);
});

$select.on("change", function(event, _class, _text){

    console.log("select changed option...");
    console.log(`class: ${_class}, text: ${_text}`);

    let $this = $(this);
    let $level_button = $this.parent().find('button');
    let prev = $level_button.data('class');
    $level_button.removeClass(`btn-outline-${prev}`).addClass(`btn-outline-${_class}`).text(_text);
    $level_button.data('class', _class);

});

