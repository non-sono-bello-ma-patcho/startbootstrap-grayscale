<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 08/05/19
 * Time: 21.20
 */
// set all the variables to pages

require_once 'php/databaseUtility.php';
require_once 'php/productUtility.php';

$destination = trim($_REQUEST['destination']);

$filters = [];

$filters['destination'] = $destination;
if(!empty($_REQUEST["maxPrice"]))
    $filters['maxPrice'] = $_REQUEST["maxPrice"] === "" ? 999999 : trim($_REQUEST["maxPrice"]);
if(!empty($_REQUEST["minPrice"]))
    $filters['minPrice'] = trim($_REQUEST["minPrice"]);
if(!empty($_REQUEST["arrival"]))
    $filters['arrival'] = trim($_REQUEST["arrival"]);
if(!empty($_REQUEST["departure"]))
    $filters['departure'] = trim($_REQUEST["departure"]);
if(!empty($_REQUEST["distance"]))
    $filters['distance'] = trim($_REQUEST["distance"]);
if(!empty($_REQUEST["guide"]))
    $filters['guide'] = trim($_REQUEST["guide"]);
if(!empty($_REQUEST["housing"]))
    $filters['housing'] = $_REQUEST["housing"];
if(!empty($_REQUEST["minAge"]))
    $filters['minAge'] = $_REQUEST["minAge"];
if(!empty($_REQUEST["level"]))
    $filters['level'] = $_REQUEST["level"];
if(!empty($_REQUEST["maxUsers"]))
    $filters['maxUsers'] = $_REQUEST["maxUsers"];

$stringFilters = json_encode($filters);

error_log("launching search with params : {$destination}, {$stringFilters}");

setrawcookie("filters", $stringFilters, time()+3600, "/");

//search_items($resultColumn,$table,$columnMatch,$search,$orderby,$direction,$filters){
if(isset($_REQUEST["order"]))
    switch($_REQUEST['order']){
        case "lowest":
            $result = search_items('name, code, description, img, price, level, guide, housing','products',array('name','description'),$destination,"price","ASC",$filters);
            break;
        case "hightest":
            $result = search_items('name, code, description, img, price, level, guide, housing','products',array('name','description'),$destination,"price","DESC",$filters);
            break;
        case "relevance":
            $result = search_items('name, code, description, img, price, level, guide, housing','products',array('name','description'),$destination,"relevance","DESC",$filters);
            break;
        default:
            $result = search_items('name, code, description, img, price, level, guide, housing','products',array('name','description'),$destination,false,false, $filters);
    }
else
    $result = search_items('name, code, description, img, price, level, guide, housing','products',array('name','description'),$destination,false,false, $filters);

$number_of_trips = sizeof($result);


$h1 = "{$number_of_trips} trips to {$destination}";

function initFirstAction(){
    global $tab, $action_1, $card_code;
    $action_1->jselector = 'cart-handler';
    switch($tab){
        case 'cart':
            // nel cart c'è solo la prima action: delete from cart
            $action_1->icon = 'fas fa-minus-circle';
            $action_1->color = 'text-danger';
            $action_1->target = 'cart';
            $action_1->id = $card_code;
            $action_1->cmd = 'remove';
            break;
        case 'products':
            // statici
            $action_1->target = 'cart';
            $action_1->color = 'text-warning';
            $action_1->id = $_REQUEST['code'];
            if(array_search($card_code, unserialize($_COOKIE['cart']))===false) {
                // card non nel carrello
                $action_1->icon = 'far fa-star';
                $action_1->cmd = 'add';
            }
            else {
                $action_1->icon = 'fas fa-star';
                $action_1->cmd = 'remove';
            }
            break;
        case 'wishlist':
            // la prima action è quella che sposta il prodotto nel carrello
            $action_1->cart = 'cart';
            $action_1->color = 'text-info';
            $action_1->id = $_REQUEST['code'];
            $action_1->icon = 'far fa-star';
            $action_1->cmd = 'add';
            $action_1->target = 'cart';
            break;
        default:
            // purchase e listato non hanno actions.. o almeno per ora
            $action_1->deactivated = true;
            return;
    }
}

function initSecondAction(){
    global $tab, $action_2, $card_code;
    $action_2->jselector = 'wishlist-handler';
    switch($tab){
        case 'products':
            // statici
            $action_2->target = 'wishlist';
            $action_2->color = 'text-danger';
            $action_2->id = $card_code;
            if(array_search($card_code, unserialize($_COOKIE['wishlist']))===false) {
                // card non nel carrello
                $action_2->icon = 'far fa-heart';
                $action_2->cmd = 'add';
            }
            else {
                $action_2->icon = 'fas fa-heart';
                $action_2->cmd = 'remove';
            }
            break;
        case 'wishlist':
            // la seconda action è quella che elimina il prodotto dalla wishlist
            $action_2->target = 'wishlist';
            $action_2->id = $card_code;
            $action_2->icon = 'fas fa-minus-circle';
            $action_2->cmd = 'remove';
            $action_2->color = 'text-danger';
            break;
        default:
            // purchase e listato non hanno actions.. o almeno per ora
            $action_2->deactivated = true;
    }
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="phibonachos and PageFaultHandler">

    <title>Herschel | Listato provvisorio</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
</head>
<body class="h-100">

<!-- Log In Modal-->
<%=require('../components/login_modal_component.html')%>

<!-- mobile filters modal -->
<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">
                    <span class="fas fa-sliders-h"></span>
                    Filter your search
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <%=require('../components/modal_search_form_component.html')%>
            </div>
        </div>
    </div>
</div>

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
                    <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Log In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container bg-light mt-3">
    <div class="row px-4 pt-4">
        <div class="col-lg-12 col-10">
            <h3 class="text-primary mb-0"><?php echo $h1; ?></h3>
        </div>
        <div class="col-2 d-lg-none text-center my-auto">
            <button type="button" class="btn btn-light btn-outline-light" data-toggle="modal" data-target="#form_modal">
                <span class="fas fa-sliders-h text-primary m-auto"></span>
            </button>
        </div>
    </div>
    <div class="row px-4">
        <div class="col-lg-8 col-12 pl-0" id="items_column">
            <div class="" id="item_container">
                <?php
                    // here iterate over found tuples and print html
                    foreach ($result as $item){
//                        echo get_include("components/private_card.php",$item);
                        // a seconda che la carta sia vista nello store, nel carrello o wishlist, deve reindirizzare sul carrello o sul dettaglio
                        $card_title =  $item['name'];
                        $card_description = $item['description'];
                        $card_price = $item['price'];
                        $card_image = $item['img'];
                        $card_code = $item['code'];
                        $product_link = 'herschel.hopto.org/detail.php?id='.$card_code;
                        $tab = "";
// setting button class and style depending on tab
                        $action_1 = new stdClass();
                        $action_2 = new stdClass();

                        $tab = isset($_REQUEST['tab'])? $_REQUEST['tab'] : "";

// setting button class and style depending on tab
                        switch($tab){
                            case 'purchase':
                                break;
                            case 'wishlist':
                            case 'cart':
                                $icon = 'minus-circle';
                                $color = 'danger';
                                $card_class = 'fas';
                                $card_cmd  = 'remove';
                                break;
                            default:
                                $icon = '';
                                $color = '';
                                break;
                        }

                        switch($_REQUEST['level']){
                            case '0':
                                $lev = 'beginner';
                                break;
                            case '1':
                                $lev = 'medium';
                                break;
                            default:
                                $lev = 'expert';
                        }

                        initFirstAction();
                        initSecondAction();

                        $card_level = isset($item['level']) ? "<span class='custom-tag level {$lev}'>{$lev}</span>" : "";
                        $housing_tag = $item['housing']? "<span class='custom-tag housing'>acc.</span>" : "";
                        $guide_tag = $item['guide']? "<span class='custom-tag guide'>guide</span>" : "";

                        $faction = isset($action_1->deactivated)? "" : "<button class='bg-transparent border-0 px-1 $action_1->color $action_1->jselector' data-id='{$action_1->id}' data-command='{$action_1->cmd}' data-target='{$action_1->target}'><span class='{$action_1->icon} '></span></button>";
                        $saction = isset($action_2->deactivated)? "" : "<button class='bg-transparent border-0 px-1 $action_2->color $action_2->jselector' data-id='{$action_2->id}' data-command='{$action_2->cmd}' data-target='{$action_2->target}'><span class='{$action_2->icon} '></span></button>";

                        $card_pattern = "
                                <div class='bubble-box'>
                                    <div class='row'>
                                        <div class='d-none d-md-block col-lg-6 col-12'>
                                            <img src='{$card_image}' alt='' class='img-fluid'>
                                        </div>
                                        <div class='col-lg-6 col-12 position-relative'>
                                            <div class='position-absolute manage-$tab' style='right: 0; top: 0; z-index: 2; padding-right: 1rem'>
                                                $faction
                                                $saction
                                            </div>
                                            <h4>$card_title</h4>
                                            $card_level$housing_tag$guide_tag<span class='custom-tag price'>$card_price</span>
                                            <p class='description'>{$card_description}</p>
                                            <div class='row justify-content-center w-100 position-absolute' style='bottom: 0'>
                                                <a href='$product_link'>read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ";
                        echo $card_pattern;
                        error_log("loaded");
                    }
                ?>
            </div>
            <!--      Pagination navbar      -->
            <nav aria-label="Page navigation example" class="listing-pagination py-2">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
-        </div>
        <div class="col-lg-4 d-none d-lg-block px-2" id="filters_column">
            <div class="card shadow">
                <div class="card-header bg-primary text-white font-weight-bolder">
                    <span class="fas fa-sliders-h"></span>
                    filters
                </div>
                <div class="card-body">
                    <%=require('../components/listing_search_form_component.html')%>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="fading"></div>
<!-- Footer -->
<footer class="bg-black small text-center text-white-50">
    <div class="container">
        Copyright &copy; Herschel 2018
    </div>
</footer>
</body>
</html>