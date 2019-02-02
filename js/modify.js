function loadname() {
    var full_path =$('#inputGroupFile01').val();
    var filename = full_path.substring(full_path.lastIndexOf('\\')+1, full_path.length);
    $('#inputGroupFile01label').text(filename);
    console.log("got filename: "+filename+"\n");
}

function loadDiv(doc, target){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", doc, true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(target).innerHTML =
                this.responseText;
        }
    };
    xhttp.send();
}

function displayPreview(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview')
                .attr('src', e.target.result)
                .width(115)
                .height(115);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$('.dropdown').on('show.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
});

$('.dropdown').on('hide.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
});

// set placeholders on load:
window.onload = function() {
// send request:
    console.log("got: "+getCookie("username"));
    $.post("php/formUtility.php", { username : getCookie("username"), op : "get_info" },function(response){
      var user = JSON.parse(response);
      console.log("got username: "+user.username);
      $('#modifyName').attr('placeholder', user.name);
      $('#modifyUsername').attr('placeholder', user.username);
      $('#modifySurname').attr('placeholder', user.surname);
      $('#modifyLocation').attr('placeholder', user.location);
      $('#modifyDescription').val(user.description);
    });
};

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

