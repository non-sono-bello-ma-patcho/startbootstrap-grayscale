<?php   session_start();
    require_once 'php/userUtility.php';
    $username = isset($_COOKIE['user'])? $_COOKIE['user'] : "";
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
    <div class="container bg-dark-transparent border-none card mt-5 py-5 px-3 w-50">
        <div id="loginCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item" id="login_slide">
                    <div class=" row px-1 mt-4 mb-2 justify-content-center text-center">
                        <h2 class="text-white w-100"><?php echo "$name $surname"; ?></h2>
                        <div class="bg-black overflow-hidden image-previewer row align-content-center mb-5" style="height: 256px; width: 256px; -webkit-border-radius: 128px">
                            <img src="<?php echo $img; ?>" id="imgUserlog" alt="" class="col align-self-center px-0 d-none">
                            <input type="file" name="modifyImage" class="d-none" id="image" lang="en">
                        </div>
                    </div>
                    <%=require('../components/login_modal_component.html')%>
                    <div class="row justify-content-around">
                        <p class="text-white">don't have an account?<a class="font-weight-bold text-white" href="#loginCarousel" data-slide-to="1">Sign up</a></p>
                    </div>
                </div>
                <div class="carousel-item active" id="signup_slide">
                    <div class="px-1 mx-auto pt-4 pb-5 justify-content-center text-center">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="img/logo_purple_char_css.png" alt="">
                        </div>
                        <h2 class="text-white w-100">Looks like you're not registered yet</h2>
                        <p class="text-white">Join Herschel today and start to explore! It will take just few minutes!</p>
                    </div>
                    <%=require('../components/signup_form_component.html')%>
                    <div class="row justify-content-around">
                        <p class="text-white">Already subscribed?<a class="font-weight-bold text-white" href="#loginCarousel" data-slide-to="0">Log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="fading"></div>
    <footer class="bg-black small text-center text-white-50">
    <div class="container">
        Copyright &copy; Herschel 2018
    </div>
</footer>
<!-- Bootstrap core JavaScript -->
</body>
</html>