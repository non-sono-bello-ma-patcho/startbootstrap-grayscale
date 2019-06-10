<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 06/05/19
 * Time: 23.30
 */

require_once "php/userUtility.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_REQUEST['id'])) header("Location: listing.php");

require_once "php/productUtility.php";

$product_code = $_REQUEST['id'];
$product_name = getProductName($product_code);
$product_description = getProductDescription($product_code);
$product_price = getProductPrice($product_code);
$product_img = getProductImg($product_code);
$product_relevance = getProductRelevance($product_code);
$product_level = getProductLevel($product_code);
$product_minAge = getProductMinAge($product_code);
$product_distance = getProductDistance($product_code);
$product_duration = getProductDuration($product_code);
$product_guide = getProductGuide($product_code);
$product_housing = getProductHousing($product_code);
$housing_content = "This product provides accommodation in which to rest, or enjoy yourself during the space adventure. The accommodations are affiliated with Herschel and have all the necessary devices for survival in space";
$guide_content = "This product provides a guide to a more complete experience of the place you are going to visit and to make your trip safer. The guides chosen by Herschel are selected by experience and knowledge of the area, to offer you the best service.";
$level_content = "";
// e qua tutti gli altri campi
?>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>
            Herschel | <?php echo $product_name; ?>
        </title>

        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    </head>
    <body class="bg-white">
    <!-- NavBar -->
    <% var template = require("../components/navbar_component.php")%>
    <%= template.replace('${logo_link}', 'index.php').replace('${link-2}','#logoutModal').replace('${anchor-2}', 'Log Out').replace('${link-1}','private.php') %>
    <!--  Log in modal  -->
    <?php
    if(!isset($_SESSION['id']))
        echo '<%=require("../components/login_modal_component.html")%> <%=require("../components/signup_modal_component.html")%>';
    else
        echo '<%=require("../components/logout_modal_component.html")%>';
    ?>


    <!--    Main body section    -->

    <div class="container mt-5 mb-3 py-2">
        <?php

        switch ($product_level) {
            case '1':
                $lev = 'starter';
                $level_content = "The starter level includes shorter or longer trips accompanied by a space operator who will follow you for the duration of the trip and who will follow you along with the local guide to help you take your first steps into space.";
                break;
            case '2':
                $lev = 'average';
                $level_content = "The average level includes long journeys in which you will be accompanied by a space operator who will follow you only during the round-trip journeys from the place of your choice. You will still be accompanied by the local guide if provided for in the package.";
                break;
            default:
                $lev = 'expert';
                $level_content = "The expert package includes long journeys. Assistance is guaranteed through the communication system on our travel devices. Please note that to make trips of this level you must have completed at least the second level certificate of CCoS (Civil Citizen of Space).";
        }

        $level_box = "<div class='col-md-4 feature-container col-12 py-3 level $lev'><span class='feature-title'>$lev</span><p>$level_content</p></div>";
        $housing_box = $product_housing ? "<div class='col-md-4 col-12 py-3 feature-container housing'><span class='feature-title'>Accommodation</span><p>$housing_content</p></div>" : "";
        $guide_box = $product_guide ? "<div class='col-md-4 col-12 py-3 feature-container guide'><span class='feature-title'>Guided</span><p>$guide_content</p></div>" : "";

        echo "
        <div class='bubble-box round'>
            <div class='row'>
                <div class='col-12 position-relative'>
                    <h3>$product_name<span class='custom-tag price'>$product_price</span></h3>
                    <p>{$product_description}</p>
                </div>
                <div class='d-none d-md-block col-12'>
                    <img src='$product_img' alt='' class='img-fluid'>
                </div>
                <div class='justify-content-center m-3 features'>
                    $level_box$housing_box$guide_box
                </div>
            </div>
        </div>
    </div>
    "; ?>
    <!-- Footer -->
    <div class="fading"></div>
    <%=require('../components/footer_component.html')%>
    </body>
</html>
