<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 08/05/19
 * Time: 21.20
 */
// set all the variables to pages

$number_of_trips = '6.800';
$destination = 'Mars';
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <span class="fas fa-sliders-h text-primary m-auto"></span>
            </button>
        </div>
    </div>
    <div class="row h-100 px-4">
        <div class="col-lg-8 col-12 pl-0" id="items_column">
            <div class="" id="item_container">
                <?php
                    // here iterate over found tuples and print html

                ?>
            </div>
        </div>
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