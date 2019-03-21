<?php session_start();
    if(!isset($_SESSION['id'])) header("Location: index.php");
    require "php/userUtility.php";
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Private Page - Herschel</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/private.css">
    <link rel="stylesheet" href="css/grayscale.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<!-- LogOut Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="row">
                    <p class="col-md-12">Log out from Herschel?</p>
                    <div class="col-md-6">
                        <button class="btn custom-btn" id="logoutbtn" onclick="doLogout()">log out</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn custom-btn" data-dismiss="modal">close</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="main-bg private-bg" style="height: calc(100vh - 20px);">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger a-logo" href=""></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=""><?php echo $_SESSION['id'];?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a id="logoutbtn" class="btn btn-nav custom-btn text-white border-light" data-target="#logoutModal" data-toggle="modal">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- User Profile Section -->
        <div id="usercontent" class="mt-5">
            <div class="container pt-1 pb-5 card" style="background: white;">
                <div class="container-lg px-3 mt-4">
                    <div id="userinfoColumn" class="col-sm-5 col-md-4 col-lg-3  float-left">
                        <div class="card-deck">
                            <div class="card mx-auto">
                                <div class="card-header position-relative">
                                    <a href="modifyform.php?<?php echo  htmlspecialchars(session_id());?>'" aria-label="edit profile" title="edit profile" class="idlink">
                                        <span class="modify-icon glyphicon glyphicon-cog text-muted custom-icon"></span>
                                        <img src="<?php echo getUserImg($_SESSION['id']);?>" class="card-img-top profile-image" alt="..." style="overflow: hidden">
                                    </a>
                                </div>
                                <div class="card-body shadow">
                                    <p class="card-title font-weight-bolder">
                                        <?php echo getUserName($_SESSION['id'])." ".getUserSurname($_SESSION['id']); ?>
                                    </p>
                                    <p class="d-block text-muted"><?php echo "@".$_SESSION['id']; ?></p>
                                    <p class="card-text"><?php echo getUserDescription($_SESSION['id']); ?></p>
                                    <ul class="no-bullet">
                                        <li>
                                            <span class="glyphicon glyphicon-map-marker"></span>
                                            <span><?php echo getUserLocation($_SESSION['id']); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tabColumn" class="col-sm-7 col-md-8 col-lg-9 float-left">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#overview" class="nav-link active text-muted" id="overview-tab" data-toggle="tab" role="tab" aria-controls="overview">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cart" class="nav-link text-muted" id="cart-tab" data-toggle="tab" role="tab" aria-controls="cart">Cart <span class="badge badge-light">10</span></a>
                            </li>
                            <li>
                                <a href="#trips" class="nav-link text-muted" id="trip-tab" data-toggle="tab" role="tab">My Trips</a>
                            </li>
                            <li>
                                <a href="#wishlist" class="nav-link text-muted" id="wish-tab" data-toggle="tab" role="tab">Wishlist</a>
                            </li>
                            <li>
                                <!-- To remove if not admin  -->
                                <a href="#admin" class="nav-link text-muted" id="admin-tab"
                                    <?php echo isAdmin($_SESSION['id'])? 'data-toggle="tab" role="tab"' : 'data-toggle="tooltip" data-placement="bottom" title="Only for developers"'?>>Admin</a>
                                <!-- End of area to remove -->
                            </li>
                        </ul>
                        <div class="tab-content" id="usercontent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                <div class="container">
                                    <h3 class="mt-3 text-muted">Recommended for you</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card slim-card mt-2">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                                    <p class="card-text">Some quick example text.</p>
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card slim-card mt-2">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                                    <p class="card-text">Some quick example text.</p>
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card slim-card mt-2">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card slim-card text-white mt-2 mb-3">
                                                <img src="img/demo1.jpg" class="card-img" alt="...">
                                                <div class="card-img-overlay">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <p class="card-text">Last updated 3 mins ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="cart">
                                <div class="container">
                                    <h3 class="mt-3 text-muted">Your Cart</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card slim-card mt-2">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                                    <p class="card-text">Some quick example text.</p>
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card slim-card mt-2">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                                    <p class="card-text">Some quick example text.</p>
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card slim-card mt-2">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card slim-card text-white mt-2 mb-3">
                                                <img src="img/demo1.jpg" class="card-img" alt="...">
                                                <div class="card-img-overlay">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <p class="card-text">Last updated 3 mins ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="trips" role="tabpanel" aria-labelledby="trips">
                                <div class="container">
                                    <h3 class="mt-3 text-muted">Your Trips</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card slim-card mt-2">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                                    <p class="card-text">Some quick example text.</p>
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card slim-card mt-2">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                                    <p class="card-text">Some quick example text.</p>
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card slim-card mt-2">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 position-relative mt-3 pr-0">
                                            <div class="card slim-card text-white mt-2 mb-3">
                                                <a href="index.php" class="read-more text-white">Read more</a>
                                                <img src="img/demo1.jpg" class="card-img" alt="...">
                                                <div class="card-img-overlay">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <p class="card-text">tua madre</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 mt-3 px-0">
                                            <button class="mt-1 remove-button px-0"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist">
                                <h3 class="text-muted mt-3">Your Wishlist</h3>
                                <!-- loads wishlist -->
                            </div>
                            <!-- To remove if not admin -->
                            <?php if(isAdmin($_SESSION['id'])) require_once './components/admin_panel.php'?>
                            <!-- end of area to remove -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50" style="height: 20px;">
        <div class="container">
            Copyright &copy; Herschel 2018
        </div>
    </footer>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/private.js"></script>
</body>
</html>
