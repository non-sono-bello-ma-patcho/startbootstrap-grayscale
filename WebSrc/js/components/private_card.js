import "../../scss/_private_card.scss";
import {updateTotal, getCookie} from "../common";

// delegate on card click
$(document).on('click', '.manage-cart-container', function(e){
    console.log("Oh crap someone clicked, delegate private cart functions");
    let btn = $(this);
    let id = btn.data('id');
    let cmd = btn.data('cmd');
    let username = getCookie('user');

    //alter behaviour

    console.log(`about to send request for ${id}, ${cmd}, ${username}`);
    updateCart(username, id, cmd, ()=>{
        let card = btn.closest('.card');
        card.fadeOut('slow').remove();
    });
});

$(document).on('click', '.manage-new-prod-container', function(e){
    let btn = $(this);
    let id = btn.data('id');
    let cmd = btn.data('cmd');
    let username = getCookie('user');

    console.log(`about to send request for ${id}, ${cmd}, ${username}`);
    updateCart(username, id, cmd, ()=>{
        btn.data('cmd', btn.data('cmd') === 'add' ? "remove" : 'add');
        btn.empty().append(`<span class="${btn.data('cmd') === 'add' ?'far':'fas'} fa-star text-warning"></span>`)
    });
});

function updateCart(username, id, cmd, callback){
    console.log("Oh crap someone clicked, delegate private cart functions");
    $.ajax({
        contentType : "application/json",
        data : JSON.stringify({username : username, item : id, op : cmd}),
        type : 'POST',
        processData: false,
        url : `rest/updateCart.php`
    }).then((response)=>{
        console.log(`the item: ${id} had been successfully ${cmd}ed by ${username}`);
        updateTotal(response['total']);
        callback();
    });
}
