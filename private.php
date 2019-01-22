<?php session_start();
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
    <link rel="stylesheet" href="css/main.css">
</head>

<body class="" style="background: #f8f9fa;">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="index.php" title="Herschel: Space is your Playground"><img src="img/logo_purple_char.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- User Profile Section -->
<section id="user-section" class="mt-5">
    <div class="container pt-1 pb-5 card" style="background: white;">
        <div class="container-lg clearfix px-3 mt-4">
            <div class="col-sm-5 col-md-4 col-lg-3  float-left">
                <div class="card-deck">
                    <div class="card mx-auto">
                        <div class="card-header position-relative">
                            <a href="modifyform.php" aria-label="edit profile" title="edit profile" class="idlink">
                                <span class="modify-icon glyphicon glyphicon-cog text-muted custom-icon"></span>
                                <img src=<?php echo "\"".getUserImg($_SESSION['id'])."\"";?> class="card-img-top profile-image" alt="..." style="overflow: hidden">
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
            <div class="col-sm-7 col-md-8 col-lg-9 float-left">
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
                        <a href="#admin" class="nav-link text-muted" id="admin-tab" data-toggle="tab" role="tab">Admin</a>
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
                                        <a href="index.html" class="read-more text-white">Read more</a>
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
                    </div>
                    <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin">
                        <h3 class="text-muted mt-3">Admin Pane</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row py-3">
                                    <button class="btn custom-btn mx-auto">Add product</button>
                                    <div class="modal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Modal body text goes here.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-3">
                                    <button class="btn custom-btn mx-auto">Edit product</button>
                                </div>
                                <div class="row py-3">
                                    <button class="btn custom-btn mx-auto">Add administrator</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Lower section -->

<!-- Footer -->
<footer class="bg-black small text-center text-white-50 fixed-bottom">
    <div class="container">
        Copyright &copy; Herschel 2018
    </div>
</footer>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
