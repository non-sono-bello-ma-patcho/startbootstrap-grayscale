import "../common";
import "./fontawesome";
import {readURL} from "../common";


let $idSearch = $('#product-edit');
let $searchBtn = $('#edit-search-btn');

$('.search-input-group input').on("change", function () {
    if(($(this).val()!=="" || $(this).attr('placeholder') !== "") && !$(this).is(':visible'))
        $(this).parent().toggle('collapse');

    // iterate over inputs and enable update button if at least one is filled

});

$("#eimg").change(function() {
    readURL(this);
});

$idSearch.keyup(()=>$idSearch.removeClass('is-invalid'));

$searchBtn.click(()=>{
    let $searchInput = $('#product-edit');
    let $data = { 'code' : $searchInput.val()};

    addSpinner($searchBtn);
    $.ajax({
        contentType : "application/json",
        data : JSON.stringify($data),
        type : 'POST',
        processData: false,
        url : `rest/getProductInfo.php`
    }).done((response)=>{
        // se la richiesta va a buon fine carico i place holder, se il risultato è vuoto, attivo la classe invalid sull'input testuale
        if(response.length === 0){
            // display empty message
            $searchInput.addClass('is-invalid');
        }
        else{
            // load all promise
            for(let key in response){
                let selector = `[name='e${key}']`;
                let $target = $(selector);

                switch(key){
                    case 'code':
                        if(response.hasOwnProperty(key) && response[key]!==null){
                            $target.val(response[key]);
                            if(($target.val()!=="" || $target.attr('placeholder') !== "") && !$target.is(':visible'))
                                $target.parent().toggle('collapse');
                        }
                        break;
                    case 'description':
                        if(response.hasOwnProperty(key))
                            $target.html(response[key]);
                        break;
                    case 'guide':
                    case 'housing':
                        if(response.hasOwnProperty(key) && response[key]) $target.attr('checked');
                           break;
                    case 'img':
                        $('#edit-preview').attr('src', response[key]).removeClass('d-none');
                        break;
                    default:
                        if(response.hasOwnProperty(key) && response[key]!==null){
                            $target.attr('placeholder', response[key]);
                            if(($target.val()!=="" || $target.attr('placeholder') !== "") && !$target.is(':visible'))
                                $target.parent().toggle('collapse');
                        }
                }
            }
        }
    })
        .fail(()=>$searchInput.addClass('is-invalid'))
        .always(()=>{
            // remove spinner
            removeSpinner($searchBtn)

            // enable delete button
        });
});

function addSpinner(btn){
    let icon = btn.find('svg').data('icon');
    let prefix = btn.find('svg').data('prefix');
    btn.data('icon', icon).data('prefix', prefix).empty().append('<i class="fas fa-circle-notch fa-spin"></i>');
}

function removeSpinner(btn){
    btn.empty();
    let icon = btn.data('icon');
    let prefix = btn.data('prefix');
    btn.append(`<i class="${prefix} fa-${icon}"></i>`);
}