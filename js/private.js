// load user informations on success
function doLogout() {
    console.log("Trying to destroy session...");
    window.location.href = '../php/logout.php';
    console.log("destroyed");
}