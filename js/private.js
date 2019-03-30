$(function () {
    $('[data-toggle="tooltip"]').tooltip();

});

// loads products on overview
/*$.get(
    "php/formUtility.php",
    { param : "products", op : "latest_prod"},
    function(response){
        let products = JSON.parse(response);
        for (var i in products){
            console.log(products[i]);
            addCard(products[i], $('#new-prod-container'));
        }
    }
);*/

$(load_tab('#new-prod'));

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
    console.log("Trying to destroy session...");
    window.location.href = 'php/logout.php';
    console.log("destroyed");
}

// TODO: refactor using components
function searchUserbyUsername(){
    $('#resultlist').empty();
    username = $('#newusername').val();
    // return a list? of user with name similar to given
    $.get("php/formUtility.php", { param : username, op : "searchuser" },function(response){
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
    $.post("php/formUtility.php", { param : product, op : "searchproduct" },function(response){
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


function toggleSpinner(){

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
        case '#cart-container':
            break;
    }
    new Promise((resolve, reject)=>{
        $.get(
            "php/formUtility.php",
            { param : table, op : "latest_prod"},
            function(response){
                try{
                    resolve(JSON.parse(response));
                } catch (e) {
                    reject(new Error("couldn't fetch product codes from table"));
                }
            }
        );
    }).then((fulfilled) => {
        for (var i in fulfilled) {
            addCard(fulfilled[i], $(target + "-container"));
        }
    }).catch((error) => {
        $(target+"-container").append("<p class='text-muted m-auto' style='height: 160px'>An error occured on loading products...</p>");
    }).finally(() => {
        // remove spinner
        $(target+"-spinner").toggleClass('d-none', true).toggleClass('d-flex', false);
    });

}