<?php session_start(); ?>

<html lang="en" xmlns:size="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="phibonachos and PageFaultHandler">

    <title>Herschel - Space's your playground</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger a-logo" href="#page-top"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#projects">Planets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#shop">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#signup">Sign Up</a>
                </li>
                <li class="nav-item">
                    <?php if(isset($_SESSION['bad_input'])){
                        echo "<div style='top:0%; text-align:center; font-size:12px;  height:1%;'><label style=\"color:red;\">"
                            .$_SESSION['bad_input']."</label></div>";
                        session_destroy();
                        }?>
                    <a class="btn btn-nav custom-btn" href="" data-toggle="modal" data-target="#loginModal">Log In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Log In Modal-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form name="sign_in"  method="post" class="form-signin">
                    <input type="hidden" name="loginform">
                    <input type="text" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="username" placeholder="Enter your username">
                    <label for="inputPassowrdlog" class="sr-only">Password</label>
                    <input type="password" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id= "inputPassowrdlog" name="pswd" placeholder="Type your password...">
                    <div class="checkbox mb3">
                        <label>
                            <input type="checkbox" value="Remember me">
                            Remember me
                        </label>
                    </div>
                    <input type="submit" class="form-control btn-primary" onclick="sign_in.action='php/sign_in.php'"  value="Log In">
                </form>
            </div>
            <div class="modal-footer">
                <p class="align-content-between">Don't have an account? <a id="loglink" class="js-scroll-trigger" href="#signup" aria-label="Close">Sign up!</a> or
                    <a href="private.php">preview user account</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Header -->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
            <h1 class="mx-auto my-0 text-uppercase">Herschel</h1>
            <h2 class="text-white-50 mx-auto mt-2 mb-5">That’s the advantage of space.  It’s big enough to hold practically anything, and so, eventually, it does.
                <figcaption>-T. Pratchett</figcaption></h2>
            <a href="#about" class="btn btn-primary js-scroll-trigger">Get Started</a>
        </div>
    </div>
</header>

<!-- About Section -->
<section id="about" class="about-section text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-white mb-4">Everyone on board!</h2>
                <p class="text-white-50">

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras accumsan nec sem et maximus. Donec convallis efficitur pharetra. Nullam iaculis, magna nec aliquet consectetur, eros risus pretium nisi, vitae ultricies quam orci et erat. Vivamus varius diam non ligula rutrum, a maximus lorem convallis. Maecenas faucibus lectus diam, vel porta quam bibendum ac. Sed vulputate sem sapien, id pretium turpis accumsan sit amet. Ut suscipit quis turpis a volutpat. Phasellus pulvinar nunc non placerat molestie. In neque leo, fringilla sit amet nisl blandit, pretium tempus ante. Phasellus quis nisi mauris. Vivamus commodo iaculis posuere. Aliquam bibendum orci nulla, dictum tincidunt erat scelerisque ornare. Nulla ullamcorper lacus vitae orci posuere lobortis. Sed pharetra nunc ut tristique posuere.

                    Nullam a justo cursus, luctus sem at, lobortis ex. Nullam vitae est id odio finibus viverra. Nam leo dolor, aliquam congue augue sed, pulvinar tristique lectus. Cras et imperdiet elit. Pellentesque tristique mi sem. Vivamus pretium, est vitae luctus euismod, ipsum quam dapibus lacus, eu tincidunt arcu metus ut justo. Maecenas pellentesque, eros sagittis volutpat auctor, est elit consequat diam, non molestie ex ante sit amet sem. Vestibulum consequat sem eros. Nunc sit amet lectus at quam pharetra suscipit in a eros. Vivamus at consectetur risus. Nam lorem dolor, luctus sed elit sit amet, condimentum sodales ipsum. </p>
            </div>
        </div>

    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="projects-section bg-light">
    <div class="container">

        <!-- Featured Project Row -->
        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
            <div class="col-xl-8 col-lg-7">
                <img class="img-fluid mb-3 mb-lg-0" src="img/demo2.jpg" alt="">
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left">
                    <h4>Explore</h4>
                    <p class="text-black-50 mb-0">

                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis sapien ante. Aenean nec odio leo. Morbi at ultricies erat. Vivamus at dolor lacus. Curabitur accumsan porta nisi, id convallis nisi malesuada non. Curabitur posuere non velit in accumsan. Integer quis molestie lectus, eu tristique sem.

                        Maecenas condimentum egestas porta. Mauris et tellus diam. Curabitur et urna finibus, malesuada dolor non, scelerisque neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi aliquam libero eros, quis convallis urna dapibus id. Maecenas nec ipsum neque. Etiam sit amet est quam. Sed vulputate sed quam ac laoreet. Nunc elementum nunc vitae volutpat tincidunt. Etiam vulputate turpis eu ornare blandit. Maecenas viverra, est quis fringilla scelerisque, quam libero faucibus tellus, a porttitor eros diam sit amet nisi. Nullam tempor tortor ornare, faucibus tellus a, aliquam nibh. Sed placerat ex tincidunt, pulvinar ipsum nec, hendrerit mi. Nulla rhoncus est vel maximus placerat. Fusce eget iaculis est.

                        Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris ac dui sem. Quisque sagittis maximus nisl, elementum dapibus massa feugiat dignissim. Donec condimentum ut ex a pellentesque. Phasellus pulvinar a enim eget commodo. Nulla facilisis nisl vitae sem lacinia, nec rhoncus sem dapibus. Fusce luctus molestie ex id consectetur. Aenean vestibulum augue sed sagittis pretium. Cras vel tempor nunc. Sed et cursus nunc. Suspendisse vehicula risus vitae urna suscipit elementum.</p>
                </div>
            </div>
        </div>

        <!-- Project One Row -->
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
            <div class="col-lg-6">
                <img class="img-fluid" src="img/demo1.jpg" alt="">
            </div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Lorem</h4>
                            <p class="mb-0 text-white-50">

                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras accumsan nec sem et maximus. Donec convallis efficitur pharetra. Nullam iaculis, magna nec aliquet consectetur, eros risus pretium nisi, vitae ultricies quam orci et erat. Vivamus varius diam non ligula rutrum, a maximus lorem convallis. Maecenas faucibus lectus diam, vel porta quam bibendum ac. Sed vulputate sem sapien, id pretium turpis accumsan sit amet. Ut suscipit quis turpis a volutpat. Phasellus pulvinar nunc non placerat molestie. In neque leo, fringilla sit amet nisl blandit, pretium tempus ante. Phasellus quis nisi mauris. Vivamus commodo iaculis posuere. Aliquam bibendum orci nulla, dictum tincidunt erat scelerisque ornare. Nulla ullamcorper lacus vitae orci posuere lobortis. Sed pharetra nunc ut tristique posuere.

                                Nullam a justo cursus, luctus sem at, lobortis ex. Nullam vitae est id odio finibus viverra. Nam leo dolor, aliquam congue augue sed, pulvinar tristique lectus. Cras et imperdiet elit. Pellentesque tristique mi sem. Vivamus pretium, est vitae luctus euismod, ipsum quam dapibus lacus, eu tincidunt arcu metus ut justo. Maecenas pellentesque, eros sagittis volutpat auctor, est elit consequat diam, non molestie ex ante sit amet sem. Vestibulum consequat sem eros. Nunc sit amet lectus at quam pharetra suscipit in a eros. Vivamus at consectetur risus. Nam lorem dolor, luctus sed elit sit amet, condimentum sodales ipsum. </p>
                            <hr class="d-none d-lg-block mb-0 ml-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Two Row -->
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-6">
                <img class="img-fluid custom-img" src="img/demo4.jpg" alt="">
            </div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4 class="text-white">Ipsum</h4>
                            <p class="mb-0 text-white-50">

                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras accumsan nec sem et maximus. Donec convallis efficitur pharetra. Nullam iaculis, magna nec aliquet consectetur, eros risus pretium nisi, vitae ultricies quam orci et erat. Vivamus varius diam non ligula rutrum, a maximus lorem convallis. Maecenas faucibus lectus diam, vel porta quam bibendum ac. Sed vulputate sem sapien, id pretium turpis accumsan sit amet. Ut suscipit quis turpis a volutpat. Phasellus pulvinar nunc non placerat molestie. In neque leo, fringilla sit amet nisl blandit, pretium tempus ante. Phasellus quis nisi mauris. Vivamus commodo iaculis posuere. Aliquam bibendum orci nulla, dictum tincidunt erat scelerisque ornare. Nulla ullamcorper lacus vitae orci posuere lobortis. Sed pharetra nunc ut tristique posuere.

                                Nullam a justo cursus, luctus sem at, lobortis ex. Nullam vitae est id odio finibus viverra. Nam leo dolor, aliquam congue augue sed, pulvinar tristique lectus. Cras et imperdiet elit. Pellentesque tristique mi sem. Vivamus pretium, est vitae luctus euismod, ipsum quam dapibus lacus, eu tincidunt arcu metus ut justo. Maecenas pellentesque, eros sagittis volutpat auctor, est elit consequat diam, non molestie ex ante sit amet sem. Vestibulum consequat sem eros. Nunc sit amet lectus at quam pharetra suscipit in a eros. Vivamus at consectetur risus. Nam lorem dolor, luctus sed elit sit amet, condimentum sodales ipsum. </p>
                            <hr class="d-none d-lg-block mb-0 mr-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Shop Preview Section -->
<section id="shop" class="shop-section bg-light">
    <div class="shop-header text-center">
        <h2>Shop</h2>
    </div>
    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Item</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$1</h1>
                    <ul class="list-unstyled mt-3 mb4">
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Consectetur adipiscing elit.</li>
                        <li>Ut viverra augue a elementum molestie.</li>
                    </ul>
                    <button type="button" class="btn custom-btn">Sign up or log in for purchase</button>
                </div>

            </div>
            <div class="card mb-4 bg-dark text-white custom-card font-weight-bolder border-0">
                <img class="card-img custom-img" src="img/demo1.jpg" alt="Card Image">
                <div class="card-img-overlay">
                    <div class="col-md-3 ml-auto">
                        <span class="badge badge-danger">1k</span>
                    </div>
                    <h4 class="card-title text-center">Your Soul</h4>
                    <h1 class="card-title pricing-card-title">$0</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>An All Stars Winner whom actually deserves it</li>
                        <li>2 GB of kittens vids</li>
                        <li>Email support</li>
                        <li>French Fries</li>
                    </ul>
                    <button type="button" class="btn custom-btn text-white">Sign up for free</button>
                    <div class="mb-4">
                        <small class="text-white">*You'll have to wait about 72 hours to get an answer</small>
                    </div>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Free</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>10 users included</li>
                        <li>2 GB of storage</li>
                        <li>Email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
                </div>

            </div>
        </div>
    </div>
    <div class="mb-4 text-center">
        <a class="btn custom-btn">Find more in store</a>
    </div>
</section>
<!-- Signup Section -->
<section id="signup" class="signup-section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <h2 class="text-white mb-5">Sign up to Herschel and start to explore!</h2>
                <form name ="sign_up" class="needs-validation" method='post' novalidate>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="hidden" name="signupform">
                                <input type="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="email" placeholder="Enter email address..." required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    </div>
                                    <input type="text" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="username" placeholder="Enter your username..." required>
                                    <div class="invalid-feedback">This username is already taken.</div>
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

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="password" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="pswd" placeholder="Type your password..." required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="password" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" name="pswdConfirm" placeholder="Confirm your password..." required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto" onclick="sign_up.action='php/sign_up.php'">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section bg-black">
    <div class="container">

        <div class="row">

            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Address</h4>
                        <hr class="my-4">
                        <div class="small text-black-50">Fakestreet 123</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Email</h4>
                        <hr class="my-4">
                        <div class="small text-black-50">
                            <a href="#">hello@yourdomain.com</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-mobile-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Phone</h4>
                        <hr class="my-4">
                        <div class="small text-black-50">Orso Balù</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="social d-flex justify-content-center">
            <a href="https://www.instagram.com/nonsonobellomapatcho/?hl=it" class="mx-2">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://github.com/non-sono-bello-ma-patcho" class="mx-2">
                <i class="fab fa-github"></i>
            </a>
        </div>

    </div>
</section>

<!-- Footer -->
<footer class="bg-black small text-center text-white-50">
    <div class="container">
        Copyright &copy; Herschel 2018
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/grayscale.js"></script>

</body>

</html>
