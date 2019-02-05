window.onload =() => {
   var username = getCookie('username');
   console.log("got username: "+username);
   // load name and surname
   // load  username

};

$('#toggleForm').on('click', ()=>{
    // remove from body img div and banner
    $('#infoBanner').toggleClass('invisible');
    $('.custom-userimage').toggleClass('invisible', true).css("{height: 0;}");
    $('#filler').toggleClass('d-none', false);
    // remove attribute from inputtext and change style
    $('#usernameinput').attr('readonly', false).toggleClass('bg-transparent', false).toggleClass('text-white', false);
});

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = document.cookie;
    console.log(decodedCookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
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