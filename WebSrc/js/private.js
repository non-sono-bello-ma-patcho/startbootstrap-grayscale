/* CSS */
import '../scss/private.scss';

/* JS */
import 'bootstrap/js/dist/tooltip';
import 'bootstrap/js/dist/tab';
import 'bootstrap/js/dist/button';
import 'bootstrap/js/dist/modal';

import {addCard, addSpinner, getCookie, removeSpinner, updateTotal} from "./common";

import './components/private_card';
import './components/customForm';
import './components/editProductForm';
import './components/addProdcutForm';
import './components/addAdminForm';
import './components/customForm';

let checkoutBtn = $('#buyAll');

// activate tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

// load active tab and update total
$(document).ready(()=>{
    let to_load = $(".tab-pane.active").attr('id');
    load_tab("#"+to_load);
    updateTotal();
});

// reload active tab on click
$(document).on('shown.bs.tab', 'a[data-toggle="tab"]',function (e) {
    let target = $(e.target).attr("href"); // activated tab
    load_tab(target);
});

checkoutBtn.click(()=>{
    let $targetContainer = $('#cart-container');
    let items = {};
    let cards = $targetContainer.find('.purchase-handler');
    addSpinner(checkoutBtn);
    cards.each((index, btn)=>{
        console.log(btn);
        items[$(btn).data('id')]=1;
    });
    let $data = JSON.stringify({ username : getCookie('user'), 'items' : items });
    console.log(`sending request with data: ${$data}`);
    $.ajax({
        contentType : "application/json",
        data : $data,
        type : 'POST',
        processData: false,
        url : 'rest/updatePurchase.php',
}).done((response, status)=>{
        updateTotal();
        $targetContainer.empty().append(`<p class='text-muted m-auto' style='height: 160px'>Your cart is empty</p>`);
    }).catch((e)=>{
        console.error(e.stackTrace);
    }).always(()=>removeSpinner(checkoutBtn));
});



// activate button on radio check
$("#resultlist").on("change", function(){
    console.log("radio checked: "+$('input[type=radio]:checked').val());
    $('#adduserbtn').toggleClass("disabled", false).attr("disabled", false);
});

function load_tab(target){
    console.log("loading: "+$(target).attr('id'));
    // add spinner
    let command = $(target).data('action'), $data = {username : getCookie("user")}, $targetContainer = $(target).find("[id$='-container']"), $targetSpinner = $(target).find("div[id$='-spinner']");
    if(command === undefined) return;

    flush_tab($targetContainer);
    $targetSpinner.removeClass('d-none').addClass('d-flex');
    console.log("calling rest, "+command);
    $.ajax({
        contentType : "application/json",
        data : JSON.stringify($data),
        type : 'POST',
        processData: false,
        url : `rest/${command}.php`,
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.error("Status: " + textStatus); console.error("Error: " + errorThrown);
        }
    }).done((response)=>{
        // se la richiesta va a buon fine carico il contenuto o, se il risultato è vuoto, mostro l'informazione
        if(response.length === 0){
            // display empty message
            $targetContainer.append(`<p class='text-muted m-auto' style='height: 160px'>Your ${$(target).attr('id')} is empty</p>`);
            if($(target).attr('id')==='cart') $('#buyAll').attr('disabled', true).addClass('disabled');
        }
        else{
            // load all promise
            let promises = [];
            response.forEach((item) => promises.push(addCard(item,$targetContainer)));

            // load all promises
            Promise.all(promises).then(()=>{
                if($(target).attr('id')==='cart') $('#buyAll').removeAttr('disabled').removeClass('disabled');
            });
        }
    }).fail(()=>$targetContainer.append(`<p class='text-muted m-auto' style='height: 160px'>An error occured loading ${$(target).attr('id')}</p>`))
        .always(()=>$targetSpinner.addClass('d-none').removeClass('d-flex'));
}

function flush_tab(target){
    $(target).empty();
}