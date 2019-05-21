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
        return ($(tab).attr('id'));
    }
};

export let username = document.cookie.match(/user=([a-zA-Z0-9]+)/)[1] | 'none'; // fa schifo sto coso...

export function addCard(entity_obj, target, type='product'){
    console.log('rendering ');
    console.log(entity_obj);
    console.log(' to '+target.attr('id'));
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
    entity_obj.tab = conf.op(target);
    console.log("tab is: "+conf.op(target));
    console.log(entity_obj);// sta cosa è ridondante, definire direttamente il valore tab...
    // dal momento che ho l'oggetto intero non mi resta che chiamare la componente
    // aggiungo il campo tab all'oggetto che passo:

    return new Promise((resolve, reject)=>{
        // faccio la chiamata ajax alla componente
        $.ajax({
            contentType : 'application/json',
            data : entity_obj,
            type : 'GET',
            url : `components/${conf.component}.php`
        }).done((response)=>{
            // adesso che ho la risposta non so cosa cazzo farmene ma qualcosa mi invento
            resolve(response); // risolvo la componente da caricare sul dom beibi
        });
    }).then((fulfilled)=>{
        // carico tutto sul dom
        $(target).append(fulfilled); // se non funziona urlo
    }).catch((error)=>{
        // stica
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
                let cart = response['cart'];
                resolve(cart);
            } catch (e) {
                reject(e);
            }
        });
    }).then((fulfilled)=>createCookie('cart', JSON.stringify(fulfilled), 1));
    console.log(document.cookie);
}
