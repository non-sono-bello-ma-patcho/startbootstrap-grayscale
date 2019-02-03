<?php session_start();
require 'php/userUtility.php';
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Herschel - Mismatched Credentials</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/redirect.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grayscale.css">
</head>
<body style="background: #171544">
    <div class="main-bg mismatched-bg">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="img/logo_magenta_green.png" alt="">
            <h2 class="text-white">Wrong Credential</h2>
            <p class="lead text-white">You are trying to access as <span class="font-weight-bold"><?php echo 'Pinin Farina'; ?></span></p>
            <div class="container mx-auto col-md-3 py-5">
                <img src="img/default-account.png" alt="" class="custom-userimage my-5">
                <form name="sign_in"  method="post" class="form-signin">
                    <input type="hidden" name="loginform">
                    <input id="usernameinput" readonly type="text" class="preat form-control bg-transparent text-white mr-0 mr-sm-2 mb-3 mb-sm-0 disabled" value="pininfarina" name="username" placeholder="Enter your username">
                    <label for="inputPassowrdlog" class="sr-only">Password</label>
                    <input id="passwordinput" type="password" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id= "inputPassowrdlog" name="pswd" placeholder="Type your password...">
                    <div class="invalid-feedback text-left">
                        <p>Wrong Password for Account</p>
                    </div>
                    <div class="checkbox mb3">
                        <label class="text-white">
                            <input type="checkbox" value="Remember me">
                            Remember me
                        </label>
                    </div>
                    <input type="submit" class="btn btn-outline-light border-light" onclick="sign_in.action='php/sign_in.php'"  value="Log In">
                </form>
            </div>
            <a href="" id="toggleForm" class="text-white"><small>Wrong Account?</small></a>
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
    <div class="container">
        Copyright &copy; Herschel 2018
    </div>
</footer>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.js"></script>
<script src="js/redirect.js"></script>
</body>
</html>