<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 06/05/19
 * Time: 23.30
 */

/*if(!isset($_REQUEST["id"])) header("Location: index.php");

$id = trim($_REQUEST["param"]);

$productName = getProductName($id);
$productPrice = getProductPrice($id);
$productDescription = getProductDescription($id);*/


$productName = "prodotto di prova";

// e qua tutti gli altri campi
?>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>
            Herschel | <?php echo $productName; ?>
        </title>

        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    </head>
    <body class="bg-white">
    <!--    Detail Navigation    -->
    <!-- NavBar -->
    <%=require('../components/navbar_component.html')%>

    <!--  Log in modal  -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Log In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <%=require('../components/login_modal_component.html')%>
                </div>
                <div class="modal-footer">
                    <p class="align-content-between">Don't have an account? <a id="loglink" class="js-scroll-trigger" href="" aria-label="Close">Sign up!</a>
                </div>
            </div>
        </div>
    </div>

    <!--    Main body section    -->
    <div class="container">
        <section id="projects" class="detail-section bg-white">
            <div class="container">
                <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                    <div class="col-lg-6">
                        <div class="container" style="height: 820px; overflow: hidden;">
                            <img class="img-fluid" src="<%=require('../../img/project1_ext.jpg')%>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 bg-white">
                        <div class="container align-items-start h-50">
                            <div class="detail-text w-100 my-auto text-center text-lg-left">
                                <h4 class="">Lorem</h4>
                                <p class="mb-0">

                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras accumsan nec sem et maximus. Donec convallis efficitur pharetra. Nullam iaculis, magna nec aliquet consectetur, eros risus pretium nisi, vitae ultricies quam orci et erat. Vivamus varius diam non ligula rutrum, a maximus lorem convallis. Maecenas faucibus lectus diam, vel porta quam bibendum ac. Sed vulputate sem sapien, id pretium turpis accumsan sit amet. Ut suscipit quis turpis a volutpat. Phasellus pulvinar nunc non placerat molestie. In neque leo, fringilla sit amet nisl blandit, pretium tempus ante. Phasellus quis nisi mauris. Vivamus commodo iaculis posuere. Aliquam bibendum orci nulla, dictum tincidunt erat scelerisque ornare. Nulla ullamcorper lacus vitae orci posuere lobortis. Sed pharetra nunc ut tristique posuere.

                                    Nullam a justo cursus, luctus sem at, lobortis ex. </p>
                                <hr class="mb-0 ml-0">
                            </div>
                        </div>
                        <div class="container align-items-end h-50">
                            <div class="detail-features">
                                <!--<div class="row prop-separator">
                                    <div class="col-12">
                                        <i class="fas fa-rocket"></i>
                                    </div>
                                </div>
                                <div class="row prop-separator">
                                    <span class="fas fa-code"></span>
                                    property B
                                </div>
                                <div class="row prop-separator">
                                    <span class="fas fa-code"></span>
                                    property C
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="fading"></div>
    <%=require('../components/footer_component.html')%>
    </body>
</html>
