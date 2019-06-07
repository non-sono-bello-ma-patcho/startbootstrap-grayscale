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
                    <form  method="post" class="form-signin" action="php/sign_in.php">
                        <input type="hidden" name="loginform">
                        <div class="form-group">
                            <label for="inputUsernamelog" class="sr-only">Password</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter your username" id="inputUsernamelog">
                            <label for="inputPassowrdlog" class="sr-only">Password</label>
                            <input type="password" class="form-control" id= "inputPassowrdlog" name="pswd" placeholder="Type your password...">
                        </div>

                        <div class="form-row justify-content-center text-center">
                            <label class="switch d-inline-block">
                                <input type="checkbox" name="eguide" id="rememberuser" value="1">
                                <span class="slider round"></span>
                            </label>
                            <label for="rememberuser" class="text-primary ml-1 d-inline">Remember me</label>

                        </div>
                        <input type="submit" class="form-control btn-primary" value="Log In">
                    </form>

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
                    <form name ="sign_up" class="needs-validation" method='post' action="php/sign_up.php">
                        <div class="form-group">
                            <div class="form-row">
                                <div id="emailcol" class="col-md-6 mb-3">
                                    <input type="hidden" name="signupform">
                                    <input type="email" id="suEmail" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="email" placeholder="Enter email address..." required>
                                    <div class="text-left invalid-feedback mt-0">
                                        <small class="font-weight-bold">
                                            Email format not valid.
                                        </small>
                                    </div>
                                </div>
                                <div id="usernamecol" class="col-md-6 mb-3">
                                    <input type="text" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="username" id="suUsername" placeholder="Enter your username..." required>
                                    <div class="text-left invalid-feedback mt-0">
                                        <small class="font-weight-bold">
                                            This username is already taken.
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="name" placeholder="Enter your name..." required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="surname" placeholder="Enter your surname..." required>
                                </div>
                            </div>

                            <div class="form-row pb-2">
                                <div id="pwcol" class="col-md-6 mb-3">
                                    <input type="password" id="suPassword" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="pswd" placeholder="Type your password..." required>
                                </div>
                                <div id="pwccol" class="col-md-6 mb-3">
                                    <input type="password" id="suConfirmPassword" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="pswdConfirm" placeholder="Confirm your password..." required>
                                    <div class="text-left invalid-feedback mt-0">
                                        <small class="font-weight-bold">
                                            Confirm password doesn't match.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row text-center justify-content-center pb-2">
                            <button type="submit" class="btn btn-primary mx-auto">Sign Up</button>
                        </div>
                    </form>
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