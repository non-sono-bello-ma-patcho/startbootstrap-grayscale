$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

// $(load_tab('#new-prod'));

$(document).ready(()=>{
    let to_load = $(".tab-pane.active").attr('id');
    load_tab("#"+to_load);
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).attr("href") // activated tab
    flush_tab(target);
    load_tab(target);
});

// activate button on radio check
$("#resultlist").on("change", function(){
    console.log("radio checked: "+$('input[type=radio]:checked').val());
    $('#adduserbtn').toggleClass("disabled", false).attr("disabled", false);
});

/*$('#editproduct').on("click", () => {
    load_product();
});*/

// load user informations on success
function doLogout() {
    window.location.href = 'php/logout.php';
}

// TODO: refactor using components
function searchUserbyUsername(){
    $('#resultlist').empty();
    username = $('#newusername').val();
    // return a list? of user with name similar to given
    $.get("php/rest.php", { param : username, op : "searchuser" },function(response){
        userinfo = JSON.parse(response);
        console.log("got filter: "+username);
        if(userinfo.length <= 0){
            $('#resultlist').toggleClass('d-none', true).toggleClass("custom-hidden", true);
            $('#newusername').toggleClass('is-invalid', true);
        }
        else {
            $('#newusername').toggleClass('is-invalid', false);
            items = userinfo.length;
            offset = 0;
            maxoffset = Math.floor(items/3)*3;
            decks = Math.ceil(items/3);
            for(i=0; i<decks; i++){
                deck = $("<div class=\"card-deck\"></div>");
                for(j=0; j<(offset===maxoffset?items-maxoffset:3); j++){
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
            }
            $('#resultlist').toggleClass('d-none', false).toggleClass("custom-hidden", false);
        }
    });
}

function load_product(){
    product = $('#eID').val();
    $.post("php/rest.php", { param : product, op : "searchproduct" },function(response){
        product_info = JSON.parse(response);
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
    $.ajax(
        {
            url: 'php/itemSearch.php',
            type:'POST',
            dataType: 'text',
            data: {value: value},
            success: function(data){
                $("#item-search-results").html(data);
            }
        })
}

function load_tab(target){
    // add spinner
    var table;
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
            for (var i in fulfilled) {
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