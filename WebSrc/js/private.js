/* CSS */
import '../scss/_temp-private.scss';

/* JS */
import 'bootstrap/js/dist/tooltip';
import 'bootstrap/js/dist/tab';
import 'bootstrap/js/dist/button';
import 'bootstrap/js/dist/modal';

import {addCard, updateCart, updateTotal, username, cart} from "./common";

// activate tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('#searchbtn').click(()=>load_likable_users());
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
    flush_tab(target);
    load_tab(target);
});

// this delegates action on button click depending on card type
$(document).on('click', '.manage-new-prod', function(e){
    let btn = $(this);
    let id = btn.data('id');
    let cmd = btn.data('cmd')+'_cart';

    $.post(
        'php/rest.php',
        {
            id : id,
            username : username,
            op : cmd
        },
        (response, status) => {
            if(cmd === "add_cart") cart.push(id);
            else cart.splice(cart.indexOf(id), 1);
            console.log("status: "+status); //TODO manage addition and deletion

        }
    ).done(()=>{
        updateCart();
        updateTotal();
        //alter behaviour
        btn.data('cmd', btn.data('cmd') === 'add' ? "remove" : 'add');
        btn.children('span').toggleClass('far').toggleClass('fas');
    });
});


$(document).on('click', '.manage-cart', function(e){
    let btn = $(this);
    let id = btn.data('id');
    let cmd = btn.data('cmd')+'_cart';

    //alter behaviour

    $.post(
        'php/rest.php',
        {
            id : id,
            username : username,
            op : cmd
        },
        (response, status) => {
            if(cmd === "add_cart") cart.push(id);
            else cart.splice(cart.indexOf(id), 1);
            console.log("status: "+status); //TODO manage addition and deletion

        }
    ).done(()=>{
        updateCart();
        updateTotal();
        let card = $(this).closest('.card');
        card.fadeOut('slow').remove();
    });
});

// activate button on radio check
$("#resultlist").on("change", function(){
    console.log("radio checked: "+$('input[type=radio]:checked').val());
    $('#adduserbtn').toggleClass("disabled", false).attr("disabled", false);
});

// TODO: refactor using components
function load_likable_users(){
    $('#resultlist').empty();
    let username = $('#newusername').val();
    console.log('calling promise:');
    new Promise((resolve, reject)=>{
        // in questa puntata di Andreo e le pormise carichiamo delle carte contenenti un profilo da aggiungere come admin
        // eseguo una chiamata get per ottenere la lista dei papabili
        console.log('calling rest: guessuser');
        $.get("php/rest.php", { param : username, op : "guessuser" })
            .done((response)=>JSON.parse(response).length>0?resolve(JSON.parse(response)):reject())
            .fail(()=>reject());
    }).then((users)=>{
        // a questo punto carico gli utenti
        console.log('successfull: adding cards!');
            $('#newusername').toggleClass('is-invalid', false);
        for(let i = 0; i<users.length; i++){
            addCard(users[i], $('#resultlist'), 'user');
        }
        $('#resultlist').toggleClass('d-none', false).toggleClass("custom-hidden", false);
    },
        ()=>{
            console.log('failed: show error message');
            // a questo punto dico che non ci sono utenti papabili con quel nome
            $('#resultlist').toggleClass('d-none', true).toggleClass("custom-hidden", true);
            $('#newusername').toggleClass('is-invalid', true);
        });
    // return a list of user with name similar to given
    /*$.get("php/rest.php", { param : username, op : "searchuser" },function(response){
        let userinfo = JSON.parse(response);
        console.log("got filter: "+username);
        if(userinfo.length <= 0){

        }
        else {

            // a questo punto aggiungo tutte le card caricate...
            /!*let items = userinfo.length;
            let offset = 0;
            let maxoffset = Math.floor(items/3)*3;
            let decks = Math.ceil(items/3);
            for(let i=0; i<decks; i++){
                let deck = $("<div class=\"card-deck\"></div>");
                for(let j=0; j<(offset===maxoffset?items-maxoffset:3); j++){
                    console.log("index is: "+(offset+j));
                    deck.append(`<div class="card m-2 col-md-6">
                                    <div class="card-header">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="userID" value="${userinfo[j+offset].username}">
                                            <label for="usernamec" class="form-check-label">${userinfo[j+offset].username}</label>
                                        </div>
                                        </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p id="nametag">${userinfo[j+offset].name}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="surnametag">${userinfo[j+offset].surname}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="mb-0" id="emailtag">${userinfo[j+offset].email}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                    );
                }
                offset += 3;
                $('#resultlist').append(deck);
            }*!/
        }
    });*/
}

function load_product(){
    let product = $('#eID').val();
    $.post("php/rest.php", { param : product, op : "searchproduct" },function(response){
        let product_info = JSON.parse(response);
        if(product_info.length <= 0) {
            $('#eID').toggleClass('is-invalid', true);
        }
        else{
            $('#eID').toggleClass('is-invalid', false);

            console.log("loading placeholders");
            // load placeholders dynamically
            for(var key in product_info){
                if(key!=="description" && product_info.hasOwnProperty(key))
                    $("#e"+key).attr("placeholder", product_info[key]);
                else
                    $("#edescription").html(product_info[key]);
            }
        }
    });
}

function load_search_result(){
    var value = document.getElementById("itemsearch").value;
    var min_price = document.getElementById("price-min").value;
    var max_price = document.getElementById("price-max").value;

    var order;
    if(document.getElementById("order_by_min_price").checked)
        order = "lowest";
    else if(document.getElementById("order_by_max_price").checked)
        order = "hightest";
    else if(document.getElementById("order_by_relevance").checked)
        order = "relevance";
    else order = false;

    $.ajax(
        {
            url: 'php/itemSearch.php',
            type:'POST',
            dataType: 'text',
            data: {value: value,
                order: order,
                min: min_price,
                max: max_price
            },
            success: function(data){
                $("#item-search-results").html(data);
            }
        })
}

function load_tab(target){
    // add spinner
    let table;
    switch (target) {
        case '#new-prod':
            table = 'products';
            break;
        case '#cart':
            table = 'cart';
            break;
    }
    new Promise((resolve, reject)=>{
        $.get(
            "php/rest.php",
            { param : table, op : "latest_prod"},
            function(response){
                try{
                    if(response !=="[]")
                        resolve(JSON.parse(response));
                    else
                        resolve(table);
                } catch (e) {
                    reject(new Error(target));
                }
            }
        );
    }).then((fulfilled) => {
        if(Array.isArray(fulfilled)){
            let promises = [];
            $(target + "-container").hide();
            for (let i in fulfilled) {
                promises.push(addCard(fulfilled[i], $(target + "-container")));
            }
            Promise.all(promises).then(() => {
                $(target+"-container").fadeIn('slow');
            });
        }
        else {
            $(target+"-container").append(`<p class='text-muted m-auto' style='height: 160px'>Your ${fulfilled} is empty</p>`);
        }
    }).catch((error) => {
        $(target+"-container").append(`<p class='text-muted m-auto' style='height: 160px'>An error occured loading ${error.message.slice(1)}</p>`);
    }).finally(() => {
        // remove spinner
        $(target+"-spinner").toggleClass('d-none', true).toggleClass('d-flex', false);
    });

}

function flush_tab(target){
    $(target+"-container").empty();
}