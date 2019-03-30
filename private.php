<?php session_start();
    if(!isset($_SESSION['id'])) header("Location: index.php");
    require_once "php/userUtility.php";
    require_once "php/purchaseUtility.php";
    require_once "php/productUtility.php";
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Private Page - Herschel</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/private.css">
    <link rel="stylesheet" href="css/grayscale.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.css">
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
                                <div class="position-relative">
                                    <a href="modifyform.php?<?php echo  htmlspecialchars(session_id());?>'" aria-label="edit profile" title="edit profile" class="idlink">
                                        <span class="modify-icon fas fa-cog text-white custom-icon"></span>
                                        <img src="<?php echo getUserImg($_SESSION['id']);?>" class="card-img-top" alt="..." style="overflow: hidden">
                                    </a>
                                </div>
                                <div class="card-body shadow">
                                    <p class="card-title font-weight-bolder">
                                        <?php echo getUserName($_SESSION['id'])." ".getUserSurname($_SESSION['id']); ?>
                                    </p>
                                    <span class="text-muted fas fa-user"><?php echo $_SESSION['id']; ?></span>
                                    <hr>
                                    <p class="card-text"><?php echo getUserDescription($_SESSION['id']); ?></p>
                                    <ul class="no-bullet">
                                        <li>
                                            <span class="fas fa-map-marker-alt"></span>
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
                                <a href="#newproduct" class="nav-link active text-muted" id="overview-tab" data-toggle="tab" role="tab" aria-controls="overview">New Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cart" class="nav-link text-muted" id="cart-tab" data-toggle="tab" role="tab" aria-controls="cart">Cart <span class="badge badge-light"><?php //echo sizeof(getUserCart($_SESSION['id']));?></span></a>
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
                            <div class="tab-pane fade show active" id="newproduct" role="tabpanel" aria-labelledby="overview">
<!--                                <div class="container">-->
                                <h3 class="mt-3 text-muted">Freshly baked</h3>
                                <div id="new-prod-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="card-deck justify-content-between" id="new-prod-container">

                                </div>

                               <!-- MOTORE DI RICERCA, CORRETTO  -->

                                <!--  MOTORE DI RICERCA

                                        <label class="text-muted" >Search within our catalogue</label>
                                        <div class="input-group">
                                            <input type="text" name="itemsearchID" id="itemsearch" placeholder="Type something..." class="form-control rightcorners" style="border-top-right-radius: 0 !important; border-bottom-right-radius: 0 !important;">
                                        </div>
                                        <input type="radio" name="orderby" id="order_by_min_price" value="lowest price" > lowest price <br>
                                        <input type="radio" name="orderby" id="order_by_max_price" value="hightest price" >hightest price <br>
                                        <input type="radio" name="orderby" id="order_by_relevance" value="relevance" > relevance <br>
                                        <input type = "submit" onclick="load_search_result()">
                                    </div>
                                </div>
                                <div id="item-search-results"></div> dove verranno stampati i risulatti della ricerca
                                -->



<!--                                </div>-->
                            </div>
                            <div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="cart">
                                <h3 class="mt-3 text-muted">Your Cart</h3>
                                <div id="cart-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="card-deck justify-content-between" id="cart-container">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="trips" role="tabpanel" aria-labelledby="trips">
                                <h3 class="mt-3 text-muted">Your Trips</h3>
                                <div id="trips-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="card-deck justify-content-between" id="trips-container"></div>
                            </div>
                            <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist">
                                <h3 class="text-muted mt-3">Your Wishlist</h3>
                                <!-- loads wishlist -->
                                <div id="wishlist-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="card-deck justify-content-between" id="wishlist-container"></div>
                            </div>
                            <!-- To remove if not admin -->
                            <?php if(isAdmin($_SESSION['id'])) require_once './components/admin_panel.php'?>
                            <!-- end of area to remove -->
                        </div>
                        <div class="row text-right align-baseline mb-0">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <span class="text-muted font-weight-bold far fa-shopping-cart">Total: <span class="text-black-50 font-weight-normal">0.00$</span></span>
                            </div>
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
<script src="js/popper.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/private.js"></script>
<script src="js/common.js"></script>
</body>
</html>
