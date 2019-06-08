<?php   session_start();
require_once 'php/userUtility.php';
if(!isset($_SESSION['id'])){
    http_response_code(401);
    exit;
}
$username = $_SESSION['id'];
$img = isset($_COOKIE['user'])? getUserImg($username) : "";
$name = isset($_COOKIE['user'])? getUserName($username) : "";
$surname = isset($_COOKIE['user'])? getUserSurname($username) : "";

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <title>Herschel | </title>
</head>
<body>
<div class="container custom-container bg-dark-transparent border-none card mt-5 py-5 px-3 w-50">
    <div class=" row px-1 mt-4 mb-2 justify-content-center text-center">
        <h2 class="text-white w-100"><?php echo "$name $surname"; ?></h2>
        <div class="bg-black overflow-hidden image-previewer row align-content-center mb-5" style="height: 256px; width: 256px; -webkit-border-radius: 128px">
            <img src="<?php echo $img; ?>" id="imgUserlog" alt="" class="col align-self-center px-0">
        </div>

    </div>
    <form  method="post" class="form-signin" action="php/changePassword.php">
        <input type="hidden" name="loginform">
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" class="form-control" name="username" placeholder="Type new password..." id="inputPassword">
            <label for="inputConfirm" class="sr-only">Password</label>
            <input type="password" class="form-control" id= "inputConfirm" name="pswd" placeholder="Confirm new password">
        </div>
        <input type="submit" class="form-control btn-primary" value="Change Password">
    </form>
</div>

<!-- Footer -->
<div class="fading"></div>
<%=require('../components/footer_component.html')%>
<!-- Bootstrap core JavaScript -->
</body>
</html>