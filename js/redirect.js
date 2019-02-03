window.onload =() => {
   var username = getCookie('username');
   console.log("got username: "+username);
   // load name and surname
   // load  username

};

$('#toggleForm').onclick = ()=>{

};

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