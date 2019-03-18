// activate button on radio check
$("#resultlist").on("change", function(){
    console.log("radio checked: "+$('input[type=radio]:checked').val());
    $('#adduserbtn').toggleClass("disabled", false).attr("disabled", false);
});

$('#editproduct').onclick = () => {
    load_product();
};

// load user informations on success
function doLogout() {
    console.log("Trying to destroy session...");
    window.location.href = '../php/logout.php';
    console.log("destroyed");
}

function searchUserbyUsername(){
    $('#resultlist').empty();
    username = $('#newusername').val();
    // return a list? of user with name similar to given
    console.log("got filter: "+username);
    $.post("php/formUtility.php", { username : username, op : "searchuser" },function(response){
        userinfo = JSON.parse(response);
        if(userinfo.length <= 0){
            $('#adminufb').text(`${username} doesn't match any profile...`);
            $('#resultlist').toggleClass('d-none', true).toggleClass("custom-hidden", true);
            $('#newusername').toggleClass('is-invalid', true);
        }
        else {
            $('#newusername').toggleClass('is-invalid', false);
            console.log("Found matching users: "+userinfo.length);
            items = userinfo.length;
            offset = 0;
            maxoffset = Math.floor(items/3)*3;
            decks = Math.ceil(items/3);
            console.log("Initializing "+decks+" decks");
            for(i=0; i<decks; i++){
                deck = $("<div class=\"card-deck\"></div>");
                console.log("maxoffset: "+maxoffset+" as module value is: "+3%items);
                console.log("Cycling over"+(offset<=maxoffset?items-maxoffset:3));
                for(j=0; j<(offset===maxoffset?items-maxoffset:3); j++){
                    console.log("index is: "+(offset+j));
                    deck.append(`<div class="card m-2">
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
    product = $('#producttoedit').val();
    $.post("php/formUtility.php", { username : username, op : "searchproduct" },function(response){
       // load fields in placeholders

    });
}