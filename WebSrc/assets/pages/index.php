<?php
    session_start();
    require_once "php/userUtility.php";
   // if(isset($_SESSION['id']))
      //  header("Location: private.php");
?>

<!DOCTYPE html>
<html lang="en" xmlns:size="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="phibonachos and PageFaultHandler">

    <title>Herschel | Space's your playground</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger logo" href="#page-top">
            <%=require('../..//img/logo_ext.svg')%>
        </a>
        <h1 class="mx-auto my-0 text-uppercase gradient-title">Herschel</h1>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php

                if(!isset($_SESSION['id'])) {
                    echo '
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link js-scroll-trigger" href="#projects">Planets</a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link js-scroll-trigger" href="#signup">Sign Up</a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link" href="#signUpModal" data-toggle="modal">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#loginModal" data-toggle="modal">Log In</a>
                </li>
                ';
                } else{
                    $userImg = getUserImg($_SESSION['id']);
                    echo "
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href='private.php'>
                        <div style=\"\" class=\"bg-black overflow-hidden image-previewer d-flex align-content-center avatar\">
                            <img src=\"".$userImg."\" id=\"imgUserlog\" alt=\"\" class=\"col align-self-center px-0\">
                        </div>
                    </a>
                </li>
                <li class=\"nav-item d-flex align-content-center\">
                    <a class=\"nav-link align-self-center\" href=\"#logoutModal\" data-toggle=\"modal\">Log Out</a>
                </li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Log In Modal-->
<?php
    if(!isset($_SESSION['id']))
        echo '<%=require("../components/login_modal_component.html")%>';
    else
        echo '<%=require("../components/logout_modal_component.html")%>';
?>



<!-- small search form -->
<div id="small_form_wrapper" class="d-none d-xl-block">
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item" id="form-item">
                <div class="fixed-form">
                    <div class="custom-form-wrapper bg-white">
                        <%=require('../components/small_search_form_component.html')%>
                    </div>
                </div>
            </div>
            <div class="carousel-item active">
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="d-block w-100">
            <div class="mx-auto text-center d-block">
                <h1 class="mx-auto my-0 text-uppercase">Herschel</h1>
            </div>
            <div class="w-100 bg-white mb-0 py-0 custom-form-wrapper" id="big_form_wrapper">
                <%=require('../components/search_form_component.html')%>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<!--
<section id="about" class="about-section text-center d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <blockquote class="blockquote text-center text-white">
                    <p class="mb-0">That’s the advantage of space.  It’s big enough to hold practically anything, and so, eventually, it does.</p>
                    <div class="blockquote-footer">Terry Pratchet, <cite title="Source Title">The Last Hero</cite></div>
                </blockquote>
            </div>
        </div>

    </div>
</section>
-->
<!-- Projects Section -->
<section id="projects" class="projects-section bg-light d-none d-md-block">
    <div class="container">

        <!-- Featured Project Row -->
        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
            <div class="col-xl-5 col-md-6">
                <img class="img-fluid mb-3 mb-lg-0" src="<%=require('../..//img/project2_ext.jpg')%>" alt="">
            </div>
            <div class="col-xl-7 col-md-6">
                <div class="featured-text right text-center text-lg-left">
                    <h4 class="text-black-50">Explore</h4>
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <blockquote class="blockquote text-center py-5 text-black-50">
                                <p class="">That’s the advantage of space.  It’s big enough to hold practically anything, and so, eventually, it does.</p>
                                <div class="blockquote-footer">Terry Pratchet, <cite title="Source Title">The Last Hero</cite></div>
                            </blockquote>
                        </div>
                    </div>
                    <p class="text-black-50 mb-0">Bored of the old fashioned vacation where your kids keep on crying about every single thing and your partner has probably fled with the lifeguard? Tired Of all those mosquitoes, of the long lines on the highway at 3AM of the famous "holiday pack" which include merely a breakfast and maybe (maybe) sunscreen protection? Well you're lucky 'cause with Herschel you can get rid of all those hassles sending you, your kids and your partner (this part is optional) to space! Yes you read that right. Space. Join Herschel program to flee all your troubles and rediscover the joy of a holiday with a capital H.</p>
                </div>
            </div>
        </div>

        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
            <div class="col-xl-7 col-md-6">
                <div class="featured-text left text-center text-lg-left">
                    <h4 class="text-black-50 pb-5">Easy, quick and safe</h4>
                    <p class="text-black-50 pt-5">Can you remember the last time you came to visit your grandma in Pizzo Calabro, how much did it takes you? 12-15 hours? How many trains did you changed? How many shirt did you changed trying not to melt on that lonely sunny platform? Or in your dad's old car?</p>
                    <p class="text-black-50 mb-0">Herschel is a Safari agency launched in 2019 by Andrea Storace and Alessandro Savona. We are the world's second largest online safary company aimed at international audiences. The website provides booking services for trips around the cosmos. You can look at our catalogue and you'll find over 18000 fantastic packets to choose. So what are you waiting for? Get off that stupid train, throw your flip flop in the trash and enjoy Herschel!</p>
                </div>
            </div>
            <div class="col-xl-5 col-md-6">
                <img class="img-fluid mb-3 mb-lg-0" src="<%=require('../../img/mismatched_ext.jpg')%>" alt="">
            </div>
        </div>

        <!-- Project One Row -->
        <!--<h4 class="text-white">Easy, quick and safe</h4>
        <p class="text-white-50">
            Can you remember the last time you came to visit your grandma in Pizzo Calabro, how much did it takes you? 12-15 hours? How many trains did you changed? How many shirt did you changed trying not to melt on that lonely sunny platform? Or in your dad's old car?
        </p>
        <p class="mb-0 text-white-50">
            Herschel is a Safari agency launched in 2019 by Andrea Storace and Alessandro Savona. We are the world's second largest online safary company aimed at international audiences. The website provides booking services for trips around the cosmos. You can look at our catalogue and you'll find over 18000 fantastic packets to choose. So what are you waiting for? Get off that stupid train, throw your flip flop in the trash and enjoy Herschel!
        </p>-->
        <!-- Project Two Row -->
<!--        <div class="row justify-content-center no-gutters d-none">-->
<!--            <div class="col-lg-6">-->
<!--                <img class="img-fluid custom-img" src="<%=require('../../img/project4_ext.jpg')%>" alt="">-->
<!--            </div>-->
<!--            <div class="col-lg-6 bg-black order-lg-first">-->
<!--                <div class="bg-black text-center h-100 project">-->
<!--                    <div class="d-flex h-100">-->
<!--                        <div class="project-text w-100 my-auto text-center text-lg-right">-->
<!--                            <h4 class="text-white">Ipsum</h4>-->
<!--                            <p class="mb-0 text-white-50">-->
<!--                                A this point we have nothing less to say but we found this layout so beautiful-->
<!--                            </p>-->
<!--                            <hr class="d-none d-lg-block mb-0 mr-0">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

    </div>
</section>

<!-- Signup Section -->
<?php
    if(!isset($_SESSION['id']))
        echo '
        <section id="signup" class="signup-section">
            <div class="container d-md-block d-none">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <h2 class="text-white mb-5">Sign up to Herschel and start to explore!</h2>
                    </div>
                </div>
            </div>
            <%=require("../components/signup_modal_component.html")%>
        </section>
        ';
?>


<!-- Footer -->
<%=require('../components/footer_component.html')%>
</body>

</html>
