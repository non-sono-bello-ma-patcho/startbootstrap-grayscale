<?php session_start();
    if(!isset($_SESSION['id'])){
        http_response_code(401);
        $_SESSION['last_error'] = "trying to access to private.php without passing trough sign in or sign up";
        header("Location: ../error.php?code=" . http_response_code());
    }
    /*
if(isset($_SERVER['PHP_AUTH_USER'])) {
    if ($_SERVER['PHP_AUTH_USER'] !== true) {
        http_response_code(401);
        $_SESSION['last_error'] = "trying to access into private.php without passing trough sign in or sign up";
        header("Location: ../error.php?code=" . http_response_code());
    }
}else{
    http_response_code(401);
    $_SESSION['last_error'] = "sono nell'else quindi non è settato";
    header("Location: ../error.php?code=" . http_response_code());
}
*/
    //setcookie("username", $_SESSION['id']); serviva veramente ????????????? viene già fatto nella sign_in
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
                        <form action="php/logout.php">
                            <input type="submit" value="log out" class="btn custom-btn">
                        </form>
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
    <!-- Navigation -->
    <!--<nav class="navbar navbar-expand-lg navbar-shrink navbar-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger a-logo" href=""></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=""><?php /*echo $_SESSION['id'];*/?></a>
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
    </nav>-->

    <nav class="navbar navbar-expand-lg navbar-shrink navbar-light shadow" id="mainNav">
        <div class="container">
            <a class="navbar-brand a-logo" href="index.php"></a>
            <h1 class="mx-auto my-0 text-uppercase gradient-title">Herschel</h1>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- User Profile Section -->
        <div id="usercontent" class="mt-5" style="">
            <div class="container mb-5 pt-1 px-0 card">
                <div class="container-lg px-3 card-body" style="background: white;">
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
                                    <span class="text-muted fas fa-user"></span>
                                    <span><?php echo $_SESSION['id']; ?></span>
                                    <hr>
                                    <p class="card-text"><?php echo getUserDescription($_SESSION['id']); ?></p>
                                    <ul class="no-bullet">
                                        <li>
                                            <span class="fas fa-map-marked-alt"></span>
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
                                <a href="#new-prod" class="nav-link active text-muted" id="overview-tab" data-toggle="tab" role="tab" aria-controls="overview">New Products</a>
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
                            <div class="tab-pane fade show active" id="new-prod" role="tabpanel" aria-labelledby="overview">
                                <h3 class="mt-3 text-muted">Freshly baked</h3>
                                <div id="new-prod-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="card-columns" id="new-prod-container">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="cart">
                                <h3 class="mt-3 text-muted">Your Cart</h3>
                                <div id="cart-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="card-columns" id="cart-container">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="trips" role="tabpanel" aria-labelledby="trips">
                                <h3 class="mt-3 text-muted">Your Trips</h3>
                                <div id="trips-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="card-group" id="trips-container"></div>
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
                            <?php if(isAdmin($_SESSION['id'])) require_once './components/admin_panel.php' ?>
                            <!-- end of area to remove -->
                        </div>

                    </div>
                </div>
                <div class="card-footer py-3 bg-white">
                    <div class="row text-right align-baseline mb-0">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <span class="text-muted font-weight-bold fas fa-shopping-cart"></span>
                            <span class="text-muted font-weight-bold">Total <span class="text-black-50 font-weight-normal" id="total-cart"></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Footer -->
<div class="fading"></div>
<!-- Footer -->
<footer class="bg-black small text-center text-white-50">
    <div class="container">
        Copyright &copy; Herschel 2018
    </div>
</footer>
</body>
</html>
