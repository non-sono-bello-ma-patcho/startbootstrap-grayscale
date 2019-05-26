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
            $result = search_items('name, code, description, img, price','products',array('name','description'),$destination,"price","ASC",$filters);
            break;
        case "hightest":
            $result = search_items('name, code, description, img, price','products',array('name','description'),$destination,"price","DESC",$filters);
            break;
        case "relevance":
            $result = search_items('name, code, description, img, price','products',array('name','description'),$destination,"relevance","DESC",$filters);
            break;
        default:
            $result = search_items('name, code, description, img, price','products',array('name','description'),$destination,false,false, $filters);
    }
else
    $result = search_items('name, code, description, img, price','products',array('name','description'),$destination,false,false, $filters);

$number_of_trips = sizeof($result);


$h1 = "{$number_of_trips} trips to {$destination}";



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
                        $card_cmd = !is_int(strpos($_COOKIE['cart'], $card_code))? 'add' : 'remove';
                        $card_class = !is_int(strpos($_COOKIE['cart'], $card_code))? 'far' : 'fas';
                        $tab = "";
// setting button class and style depending on tab
                        switch($tab){
                            case 'wishlist-container':
                            case 'cart-container':
                                $icon = 'minus-circle';
                                $color = 'danger';
                                break;
                            case 'new-prod-container':
                            default:
                                $icon = 'star';
                                $color = 'warning';
                                break;

                        }
// come faccio a settare il bottone a seconda che il prodotto sia già nel carrello o meno? piango.
                        $card_pattern = "
                            <div class=\"custom-card card slim-card text-white text-left mt-2 mb-3\">
                                <a href=\"{$product_link}\" class=\"read-more text-white\">Read More</a>
                                <img src=\"{$card_image}\" class=\"card-img\" alt=\"...\">
                                <div class=\"card-img-overlay\">
                                    <div class='row'>
                                        <div class='col-10'>
                                            <h4 class=\"card-title d-inline\">{$card_title}</h4>
                                            <span class='badge badge-info'><small>{$card_price}$</small></span>
                                        </div>
                                        <div class='col-2'>
                                            <button data-id=\"{$card_code}\" data-cmd='{$card_cmd}' class='manage-{$tab} bg-transparent border-0 float-right outline' style='outline: none;'>
                                                <span class='{$card_class} fa-{$icon} float-right text-{$color}'></span>
                                            </button>    
                                        </div>  
                                    </div>            
                                    <p class=\"card-text\">{$card_description}</p>
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