import "../../scss/_private_card.scss";
import {updateTotal, getCookie, removeSpinner, addSpinner} from "../common";

// delegate on card click
// TODO fix no event on listing page (creare un id generico anziché selettivo)
$(document).on('click', '.manage-cart .cart-handler, .manage-cart .purchase-handler, .manage-wishlist .wishlist-handler, .manage-wishlist .cart-handler', function(e){
    let btn = $(this);
    //alter behaviour

    let icon = btn.find('svg').data('icon');
    addSpinner(btn);
    cardHandler(btn, ()=>{
        let card = btn.closest('.bubble-box');
        card.fadeOut('slow').remove();
    });
});/*

$(document).on('click', '', function(e){
    let btn = $(this);
    //alter behaviour

    let icon = btn.find('svg').data('icon');
    addSpinner(btn);
    cardHandler(btn, ()=>{
        let card = btn.closest('.bubble-box');
        card.fadeOut('slow').remove();
    });
});*/

/*
$(document).on('click', '', function(e){
    let btn = $(this);
    //alter behaviour

    let icon = btn.find('svg').data('icon');
    addSpinner(btn);
    cardHandler(btn, ()=>{
        let card = btn.closest('.bubble-box');
        card.fadeOut('slow').remove();
    });
});
*/

$(document).on('click', '.manage-products .cart-handler, .manage-products .wishlist-handler', function(e){
    let btn = $(this);

    let icon = btn.find('svg').data('icon');
    addSpinner(btn);
    cardHandler(btn,()=>{

        btn.data('command', btn.data('command') === 'add' ? "remove" : 'add');

        removeSpinner(btn);

        btn.empty().append(`<span class="${btn.data('command') === 'add' ?'far':'fas'} fa-${icon}"></span>`)
    });
});



function cardHandler(btn, callback){
    let username = getCookie('user');
    let id = btn.data('id');
    let cmd = btn.data('command');
    let target = btn.data('target'); // adding data attribute to div...
    let $data = JSON.stringify({ username : username, code : id, op : cmd });
    let rest;
    switch (target) {
        case 'cart':
            rest = 'rest/updateCart.php';
            break;
        case 'wishlist':
            rest = 'rest/updateWishList.php';
            break;
        case 'purchase':
            rest = 'rest/updatePurchase.php';
            $data = `{ "username" : "${username}", "items" : { "${id}" : 1 } }`;
            break;
    }
    $.ajax({
        contentType : "application/json",
        data : $data,
        type : 'POST',
        processData: false,
        url : rest,
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.error("Status: " + textStatus); console.error("Error: " + errorThrown);
        }
    }).then((response, status)=>{
        updateTotal();
        callback();
    }).catch((e)=>{
        console.log('an error occurred...');
        removeSpinner(btn);
    }).always();
}

// TODO add empty tab check on removing action (cart and wishlist), append empty target message, disable checkout button
