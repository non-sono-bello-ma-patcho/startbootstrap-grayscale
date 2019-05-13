import 'bootstrap/js/dist/button';
import 'bootstrap/js/dist/dropdown';
import 'bootstrap/js/dist/alert';
import 'bootstrap/js/dist/toast';
import 'bootstrap/js/dist/modal';
import 'bootstrap/js/dist/popover';
import 'bootstrap/js/dist/tooltip';
import 'bootstrap/js/dist/scrollspy';
import './fontawesome';

import '../scss/common.scss';

let user_card_cfg = {
    command : 'getUserInfo',
    component : 'user_card',
    key : 'username'
};
let prod_card_cfg = {
    command : 'getProductInfo',
    component : 'private_card',
    key : 'code',
    op : (tab)=>{
        if(tab==='product')
            return 'new-prod';
        return 'cart';
    }
};

export let username = document.cookie.match(/user=([a-zA-Z0-9]+)/)[1] | 'none'; // fa schifo sto coso...
export let cart;

initCart();

export function addCard(product_id, target, type='product'){
    console.log('trying to load card '+product_id+' to '+target.attr('id'));
    let productInfo, conf;

    switch(type){
        case 'product':
            conf = prod_card_cfg;
            break;
        case 'user':
            conf = user_card_cfg;
            break;
    }

    console.log("initialized variables");

    return new Promise((resolve, reject)=>{
        // get product information via rest:
        let $data = type==="product"?{code:product_id}:{username:product_id};
        console.log('data: '+$data);
        $.ajax({
            contentType : "application/json",
            data : JSON.stringify($data),
            type : 'POST',
            processData: false,
            url : `rest/${conf.command}.php`
        }).done((response)=>{
            // once got the product info, use them as data for the next $.get call
            try {
                /*if(type === 'product'){
                    let tab = target.attr('id').replace('-container', '');
                    response = JSON.stringify(response);
                    response.substring(0, response.length-1).concat(`, "tab" : "${tab}"}`);
                    response = JSON.parse(response);
                }*/
                // add tab key to data
                response.tab = conf.op(type);
                console.log(response);
                productInfo = response;
                resolve(productInfo);
            }
            catch(e){
                reject(new Error("Couldn't load product: "+e.message));
            }
        });
        }).then((fulfilled) => { // in fulfilled c'è la robaccia che ho settato prima;
            console.log('retrieving component: '+conf.component);
            $.get(
                `../components/${conf.component}.php`,
                fulfilled,
                (response, status) => {
                    console.log(`response status is: ${status}`);
                    let card = $(response);
                    // add event handlers
                    /*card.find('.selection').on('change', function () {
                        $(this).toggleClass('callout-cyan', $(this).prop('checked')).toggleClass('callout-gray', !$(this).prop('checked'));
                    });*/
                    target.append(card);
                }
            );
        }).catch(function (error) {
            console.log(error.message);
        });
}

let createCookie = function(name, value, days) {
    let expires;
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
};

export function getCookie(c_name) {
    if (document.cookie.length > 0) {
        let c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            let c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}

export var updateCart = () => createCookie('cart', JSON.stringify(cart), false);

export function updateTotal(total) {
    $('#total-cart').html("$"+total);
}

function initCart(){
    let $username = getCookie('username');
    new Promise((resolve, reject)=>{
        $.ajax({
            contentType : "application/json",
            data : JSON.stringify({username : $username}),
            type : 'POST',
            processData: false,
            url : `rest/getCart.php`
        }).then((response)=>{
            console.log("username: "+$username);
            console.log(response);
            console.log('initializing cart with: '+response['cart']);
            try{
                cart = response['cart'];
                resolve(cart);
            } catch (e) {
                reject(e);
            }
        });
    }).then((fulfilled)=>createCookie('cart', JSON.stringify(fulfilled), 1));
    console.log(document.cookie);
}
