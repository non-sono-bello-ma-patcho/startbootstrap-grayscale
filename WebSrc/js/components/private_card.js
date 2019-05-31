import "../../scss/_private_card.scss";
import {updateTotal, getCookie, removeSpinner, addSpinner} from "../common";

// delegate on card click
// TODO fix no event on listing page (creare un id generico anziché selettivo)
$(document).on('click', '.manage-cart .cart-handler, .manage-wishlist .wishlist-handler', function(e){
    let btn = $(this);
    //alter behaviour

    let icon = btn.find('svg').data('icon');
    addSpinner(btn);
    cardHandler(btn, ()=>{
        let card = btn.closest('.bubble-box');
        card.fadeOut('slow').remove();
    });
});

$(document).on('click', '.manage-wishlist .cart-handler', function(e){
    let btn = $(this);
    //alter behaviour

    let icon = btn.find('svg').data('icon');
    addSpinner(btn);
    cardHandler(btn, ()=>{
        let card = btn.closest('.bubble-box');
        card.fadeOut('slow').remove();
        // se il target è il carrello vuol dire che devo eliminare il prodotto dalla wishlist
        if(btn.data('target')==='cart') {
            let $data = JSON.stringify({ username : getCookie('user'), code : btn.data('id'), op : 'remove' });
            $.ajax({
                contentType: "application/json",
                data: $data,
                type: 'POST',
                processData: false,
                url: 'rest/updateWishList.php'
            }).then((response, status) => {
                if (status === 200) {
                    updateTotal();
                    console.log(`the item: ${id} had been successfully ${cmd}ed by ${username}`); // thinking about a toast to display on success
                }
            }).catch((e) => {
                console.log(`could not send request due to: ${e.message}`);
            });
        }
    });
});

$(document).on('click', '.manage-products .cart-handler, .manage-products .wishlist-handler, .manage-wishlist .wishlist-handler', function(e){
    let btn = $(this);

    let icon = btn.find('svg').data('icon');
    addSpinner(btn);
    cardHandler(btn,()=>{
        console.log(`cmd pre: ${btn.data('command')}`);
        btn.data('command', btn.data('command') === 'add' ? "remove" : 'add');
        console.log(`cmd after: ${btn.data('command')}`);
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
    }
    console.log(`sending request ${rest} with paramas: ${$data}`);
    $.ajax({
        contentType : "application/json",
        data : $data,
        type : 'POST',
        processData: false,
        url : rest
    }).then((response, status)=>{
        updateTotal();
        callback();
    }).catch((e)=>{
        removeSpinner(btn);
    });
}
