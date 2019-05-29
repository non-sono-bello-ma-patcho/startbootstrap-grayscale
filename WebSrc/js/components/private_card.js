import "../../scss/_private_card.scss";
import {updateTotal, getCookie} from "../common";

// delegate on card click
// TODO fix no event on listing page (creare un id generico anziché selettivo)
$(document).on('click', '.manage-cart-container', function(e){
    let btn = $(this);
    //alter behaviour

    cardHandler(btn, ()=>{
        let card = btn.closest('.card');
        card.fadeOut('slow').remove();
    });
});

$(document).on('click', '.manage-products-container', function(e){
    let btn = $(this);

    cardHandler(btn,()=>{
        btn.data('cmd', btn.data('cmd') === 'add' ? "remove" : 'add');
        btn.empty().append(`<span class="${btn.data('cmd') === 'add' ?'far':'fas'} fa-star text-warning"></span>`)
    });
});

$(document).on('click', '.manage-wishlist-container', function(e){
    let btn = $(this);

    cardHandler(btn,()=>{
        btn.data('cmd', btn.data('cmd') === 'add' ? "remove" : 'add');
        btn.empty().append(`<span class="${btn.data('cmd') === 'add' ?'far':'fas'} fa-star text-warning"></span>`)
    });
});


function cardHandler(btn, callback){
    let username = getCookie('user');
    let id = btn.data('id');
    let cmd = btn.data('cmd');
    let target = btn.data('table'); // adding data attribute to div...
    let $data = JSON.stringify({ username : username, code : id, op : cmd });

    $.ajax({
        contentType : "application/json",
        data : $data,
        type : 'POST',
        processData: false,
        url : `rest/updateCart.php`
    }).then((response)=>{
        console.log(`the item: ${id} had been successfully ${cmd}ed by ${username}`); // thinking about a toast to display on success
        updateTotal();
        callback();
    }).catch((e)=>{
        console.log(`could not send request due to: ${e.message}`);
    });
}
