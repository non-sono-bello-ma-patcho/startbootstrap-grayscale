/* CSS */
import '../scss/private.scss';

/* JS */
import 'bootstrap/js/dist/tooltip';
import 'bootstrap/js/dist/tab';
import 'bootstrap/js/dist/button';
import 'bootstrap/js/dist/modal';

import './components/addProdcutForm';
import './components/editProductForm';
import './components/addAdminForm';

import './components/private_card';

import {addCard, getCookie, updateTotal, username, initCart} from "./common";


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
    console.log("loading: "+$(target).attr('id'));
    // add spinner
    let command, $data = {username : getCookie("user")};
    switch (target) {
        case '#new-prod':
            command = 'listProducts';
            break;
        case '#cart':
            command = 'getCart';
            break;
    }
    new Promise((resolve, reject)=>{
        console.log("calling rest, retrieving products");
        $.ajax({
            contentType : "application/json",
            data : JSON.stringify($data),
            type : 'POST',
            processData: false,
            url : `rest/${command}.php`
        }).then((response)=>{
            console.log("got response: ");
            console.log(response);
            try{
                if(response !==[]) {
                    switch (target) {
                        case '#new-prod':
                            resolve(response);
                            break;
                        case '#cart':
                            resolve(response["cart"]);
                            break;
                    }
                }
                else
                    resolve(command);
            } catch (e) {
                reject(e);
            }
        });
    }).then((fulfilled) => {
        console.log("resolved value");
        console.log(fulfilled);
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
            console.log("this is not an array");
            console.log(fulfilled);
            $(target+"-container").append(`<p class='text-muted m-auto' style='height: 160px'>Your ${fulfilled} is empty</p>`);
        }
    }).catch((error) => {
        $(target+"-container").append(`<p class='text-muted m-auto' style='height: 160px'>An error occured loading ${error.message}</p>`);
    }).finally(() => {
        // remove spinner
        $(target+"-spinner").toggleClass('d-none', true).toggleClass('d-flex', false);
    });

}

function flush_tab(target){
    $(target+"-container").empty();
}