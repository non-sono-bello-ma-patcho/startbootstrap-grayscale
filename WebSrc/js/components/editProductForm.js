import "../common";
import "./fontawesome";
import {readURL, addSpinner, removeSpinner} from "../common";


let $idSearch = $('#product-edit');
let $searchBtn = $('#edit-search-btn');
let $updateBtn = $('#update-product-btn');
let $deleteBtn = $('#delete-product-btn');
let $editForm = $('#editProduct');

$('.search-input-group input').on("change", function () {
    if(($(this).val()!=="" || $(this).attr('placeholder') !== "") && !$(this).is(':visible'))
        $(this).parent().toggle('collapse');
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
            $updateBtn.addClass('disabled').attr('disabled', true);
            $deleteBtn.addClass('disabled').attr('disabled', true);
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
                        console.log(`setting ${key} to ${!!parseInt(response[key])}`);
                        if(response.hasOwnProperty(key)){
                            $target.prop('checked', !!parseInt(response[key]));
                        }
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
            removeSpinner($searchBtn);
            $updateBtn.removeClass('disabled').attr('disabled', false);
            $deleteBtn.removeClass('disabled').attr('disabled', false);
        });
});