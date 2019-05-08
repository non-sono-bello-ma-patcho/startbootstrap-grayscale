<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 08/05/19
 * Time: 21.20
 */
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
<body>
<nav class="navbar navbar-expand-lg navbar-shrink navbar-light shadow" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger a-logo" href="index.php"></a>
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
<div class="container h-100 bg-light">
    <div class="row mx-3 pt-4">
        <h3 class="text-primary">Trips to Mars <small class="text-muted"> for beginners > with guides</small></h3>
    </div>
    <div class="row h-100 mx-3">
        <div class="col-md-8 col-12" id="items_column">
            <div class="" id="item_container">
                <div class="custom-card card slim-card text-white text-left mt-2 mb-3">
                    <a href="link" class="read-more text-white">Read More</a>
                    <img src="../../img/project4_ext.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class='row'>
                            <div class='col-10'>
                                <h4 class="card-title d-inline">Asgardia</h4>
                                <span class='badge badge-info'><small>1.000$</small></span>
                            </div>
                            <div class='col-2'>
                                <button data-id="" data-cmd='' class='bg-transparent border-0 float-right outline' style='outline: none;'>
                                    <span class='far fa-star float-right text-primary'></span>
                                </button>
                            </div>
                        </div>
                        <p class="card-text">Carta di prova per il listato</p>
                    </div>
                </div>
                <div class="custom-card card slim-card text-white text-left mt-2 mb-3">
                    <a href="link" class="read-more text-white">Read More</a>
                    <img src="../../img/project2_ext.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class='row'>
                            <div class='col-10'>
                                <h4 class="card-title d-inline">Erebor</h4>
                                <span class='badge badge-info'><small>1.000$</small></span>
                            </div>
                            <div class='col-2'>
                                <button data-id="" data-cmd='' class='bg-transparent border-0 float-right outline' style='outline: none;'>
                                    <span class='far fa-star float-right text-primary'></span>
                                </button>
                            </div>
                        </div>
                        <p class="card-text">Carta di prova per il listato</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12" id="filters_column">
            <div class="card shadow">
                <div class="card-header bg-primary text-white font-weight-bolder">
                    <span class="fas fa-sliders-h"></span>
                    filters
                </div>
                <div class="card-body">
                    <%=require('../components/small_search_form_component.html')%>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>