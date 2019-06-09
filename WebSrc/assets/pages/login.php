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
    <div class="container custom-container bg-dark-transparent border-none card mt-5 py-5 px-3 w-50">
        <div id="loginCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item" id="login_slide">
                    <div class=" row px-1 mt-4 mb-2 justify-content-center text-center">
                        <h2 class="text-white w-100"><?php echo "$name $surname"; ?></h2>
                        <div class="bg-black overflow-hidden image-previewer row align-content-center mb-5" style="height: 256px; width: 256px; -webkit-border-radius: 128px">
                            <img src="<?php echo $img; ?>" id="imgUserlog" alt="" class="col align-self-center px-0 d-none">
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
                        <div class="d-flex mx-auto pb-4" style="max-width: 127px">
                            <svg class="h-100" height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient id="linear0" gradientUnits="userSpaceOnUse" x1="256" x2="256" y1="0" y2="512"><stop offset="0" stop-color="#54defd"/><stop offset="1" stop-color="#312c83"/></linearGradient><path d="m512 256c0 68.378906-26.628906 132.667969-74.980469 181.019531-48.351562 48.351563-112.640625 74.980469-181.019531 74.980469-25.761719 0-50.941406-3.785156-74.910156-11.082031 14.546875-9.253907 29.582031-19.640625 44.925781-31.007813 9.804687 1.367188 19.808594 2.089844 29.984375 2.089844 119.101562 0 216-96.898438 216-216 0-10.164062-.722656-20.164062-2.089844-29.960938 11.425782-15.417968 21.792969-30.441406 31.011719-44.9375 7.296875 23.964844 11.078125 49.140626 11.078125 74.898438zm-189.25 77.40625c-60.585938 59.902344-123.324219 110.351562-177.261719 142.480469-40.320312 24.019531-72.828125 36.054687-97.210937 36.054687-14.675782 0-26.40625-4.355468-35.136719-13.082031-21.964844-21.96875-16.234375-63.019531 17.015625-122.066406-19.699219-36.71875-30.15625-77.949219-30.15625-120.792969 0-68.378906 26.628906-132.667969 74.980469-181.019531 48.351562-48.351563 112.640625-74.980469 181.019531-74.980469 42.84375 0 84.078125 10.457031 120.796875 30.15625 59.042969-33.242188 100.09375-38.980469 122.0625-17.015625 19.660156 19.664063 17.136719 54.71875-7.507813 104.1875-19.207031 38.554687-50.589843 84.101563-91.082031 132.265625 4.914063 8.695312 7.730469 18.726562 7.730469 29.40625 0 33.085938-26.914062 60-60 60-9.019531 0-17.570312-2.011719-25.25-5.59375zm45.25-54.40625c0-11.027344-8.972656-20-20-20s-20 8.972656-20 20 8.972656 20 20 20 20-8.972656 20-20zm46.921875-223.71875c7.675781 6.101562 15.058594 12.660156 22.097656 19.699219 7.039063 7.039062 13.601563 14.425781 19.707031 22.109375 18.855469-38.710938 15.765626-53.742188 13.847657-55.664063-2.082031-2.078125-17.910157-4.488281-55.652344 13.855469zm-374.921875 200.71875c0 74.496094 37.917969 140.289062 95.457031 179.132812 48.71875-30.585937 104.425781-76.09375 158.695313-129.699218-3.933594-7.980469-6.152344-16.953125-6.152344-26.433594 0-33.085938 26.914062-60 60-60 7.820312 0 15.292969 1.519531 22.148438 4.253906 25.746093-30.691406 47.921874-60.710937 64.976562-87.828125-38.84375-57.523437-104.640625-95.425781-179.125-95.425781-119.101562 0-216 96.898438-216 216zm57.089844 200.714844c-7.679688-6.101563-15.070313-12.65625-22.109375-19.695313-7.039063-7.039062-13.601563-14.421875-19.703125-22.097656-18.359375 37.773437-15.921875 53.582031-13.851563 55.652344 2.117188 2.113281 17.984375 4.453125 55.664063-13.859375zm0 0" fill="url(#linear0)"/></svg>
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
    <%=require('../components/footer_component.html')%>
<!-- Bootstrap core JavaScript -->
</body>
</html>