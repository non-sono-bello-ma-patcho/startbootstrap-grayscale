<?php session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
    require_once "php/userUtility.php";
    require_once "php/purchaseUtility.php";
    require_once "php/productUtility.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Private Page - Herschel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">

</head>
<body>
<!-- LogOut Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="logOutModalButton">Log Out</h5>
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

<!-- NavBar -->

<% var template = require("../components/navbar_component.php")%>
<%= template.replace('${logo_link}', 'index.php').replace('${link-2}','#logoutModal').replace('${anchor-2}', 'Log Out').replace('${link-1}','#') %>

<!-- User Profile Section -->
<div id="user-info" class="mt-5" style="">
    <div class="container mb-5 pt-1 px-0 card shadow">
        <div class="container-lg px-3 card-body" style="background: white;">
            <div id="userinfoColumn" class="col-12 col-md-4 col-lg-3  float-left">
                <div class="card-deck">
                    <div class="card mx-auto">
                        <div class="position-relative row overflow-hidden align-content-center" style="max-height: 256px;">
                            <a href="changeInfo.php" aria-label="edit profile" title="edit profile" data-toggle="tooltip" data-placement="bottom" class="idlink">
                                <span class="modify-icon fas fa-cog text-white custom-icon"></span>
                                <img src="<?php echo getUserImg($_SESSION['id']);?>" class="card-img-top col align-self-center" alt="..." style="overflow: hidden">
                            </a>
                        </div>
                        <div class="card-body">
                            <ul class="no-bullet">
                                <li>
                                    <p class="card-title font-weight-bolder">
                                        <?php echo getUserName($_SESSION['id'])." ".getUserSurname($_SESSION['id']); ?>
                                    </p>
                                </li>
                                <li>
                                    <span class="text-muted fas fa-user"></span>
                                    <span><?php echo $_SESSION['id']; ?></span>
                                </li>
                                <li>
                                    <span class="fas fa-map-marked-alt"></span>
                                    <span><?php echo getUserLocation($_SESSION['id']); ?></span>
                                </li>
                            </ul>
                            <hr>
                            <p class="card-text"><?php echo getUserDescription($_SESSION['id']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabColumn" class="col-12 col-md-8 col-lg-9 float-left">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#products" class="nav-link active text-muted" id="overview-tab" data-toggle="tab" role="tab" aria-controls="products">New Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="#cart" class="nav-link text-muted" id="cart-tab" data-toggle="tab" role="tab" aria-controls="cart">Cart <span class="badge badge-light"><?php //echo sizeof(getUserCart($_SESSION['id']));?></span></a>
                            </li>
                            <li>
                                <a href="#trips" class="nav-link text-muted" id="trip-tab" data-toggle="tab" role="tab">My Trips</a>
                            </li>
                            <li>
                                <a href="#wishlist" class="nav-link text-muted" id="wish-tab" data-toggle="tab" role="tab">Wish list</a>
                            </li>
                            <li class="d-none d-md-block">
                                <!-- To remove if not admin  -->
                                <a href="#admin" class="nav-link text-muted" id="admin-tab"
                                    <?php echo isAdmin($_SESSION['id'])? 'data-toggle="tab" role="tab"' : 'data-toggle="tooltip" data-placement="bottom" title="Only for developers"'?>>Admin</a>
                                <!-- End of area to remove -->
                            </li>
                        </ul>
                        <div class="tab-content" id="user-content">
                            <div class="tab-pane fade show active" id="products" data-action="listProducts" role="tabpanel" aria-labelledby="overview">
                                <h3 class="mt-3 text-muted">Freshly baked</h3>
                                <div id="products-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="" id="products-container">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="cart" role="tabpanel" data-action="getCart">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="mt-3 text-muted">Your Cart</h3>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-success disabled mt-3" id="buyAll" disabled>Checkout</button>
                                    </div>
                                </div>
                                <div id="cart-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="" id="cart-container">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="trips" role="tabpanel" data-action="getPurchase" aria-labelledby="trips">
                                <h3 class="mt-3 text-muted">Your Trips</h3>
                                <div id="trips-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="" id="purchase-container"></div>
                            </div>
                            <div class="tab-pane fade" id="wishlist" role="tabpanel" data-action="getWishList" aria-labelledby="wishlist">
                                <h3 class="text-muted mt-3">Your Wishlist</h3>
                                <!-- loads wishlist -->
                                <div id="wishlist-spinner" class="d-flex justify-content-center" style="height: 160px;">
                                    <div class="my-auto spinner-border text-primary align-middle" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="" id="wishlist-container"></div>
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
<%=require('../components/footer_component.html')%>
</body>
</html>
