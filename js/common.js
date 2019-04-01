var username = document.cookie.match(/user=([a-zA-Z0-9]+)/)[1];

var cart;

new Promise((resolve, reject)=>{
    $.get(
        "php/rest.php",
        {
            param : 'cart',
            op : 'latest_prod'
        },
        (response) => {
            console.log('initializing cart with: '+response);
            try{
                cart = JSON.parse(response);
                resolve(cart);
                console.log(cart);
            } catch (e) {
                reject(new Error('lol'));
            }

        }
    );
}).then((fulfilled)=>{
    createCookie('cart', JSON.stringify(fulfilled), 1);
    console.log(document.cookie);
});


function addCard(product_id, target){
    let productInfo;
    return new Promise((resolve, reject)=>{
         $.get(
            "php/rest.php",
            { param : product_id, op : "searchproduct"},
            (response) => {
                try {
                    productInfo = JSON.parse(response);
                    resolve(productInfo);
                }
                catch(e){
                    reject(new Error("Couldn't load product: "+e.message));
                }
            }
        );
    }).then((fullfilled) => { // in fullfilled c'è la robaccia che ho settato prima;
        $.get(
            "components/private_card.php",
            fullfilled,
            (response) => {
                target.append(response);
            }
        );
    }).catch(function (error) {
        console.log(error.message);
    });
}

$(document).on('click', '.manage-cart', function(e){
    let btn = $(this);
    let id = btn.data('id');
    let cmd = btn.data('cmd')+'_cart';

    //alter behaviour
    console.log("setting data to remove");
    btn.data('cmd', "remove");
    console.log(btn.data('cmd'));
    btn.children('span').toggleClass('far').toggleClass('fas');

    $.post(
        'php/rest.php',
        {
            param : cmd ,
            id : id,
            username : username,
            op : cmd
        },
        (response, status) => {
            console.log("status: "+status);
        }
    );
});

var createCookie = function(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}