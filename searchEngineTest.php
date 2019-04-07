<?php
session_start();
require_once "php/databaseUtility.php";
require_once "php/productUtility.php";
require_once "php/userUtility.php";
?>



<html>
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

    <!-- PRICE SLIDER -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"  media="screen">
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>



<div data-role="main" class="ui-content">
    <label class="text-muted" for="newusername">Search within our catalogue</label>
    <div class="input-group">
        <input type="text" name="itemsearchID" id="itemsearch" placeholder="Type something..." class="form-control rightcorners" style="border-top-right-radius: 0 !important; border-bottom-right-radius: 0 !important;">
    </div>

    <form method="post" >
        <div data-role="rangeslider">
            <label for="price-min">Price:</label>
            <input type="range" name="price-min" id="price-min" value="2000" min="0" max="50000">
            <label for="price-max">Price:</label>
            <input type="range" name="price-max" id="price-max" value="200000" min="0" max="50000">
        </div>
        <input type="radio" name="orderby" id="order_by_min_price" value="lowest price" > lowest price<br>
        <input type="radio" name="orderby" id="order_by_max_price" value="hightest price" >hightest price<br>
        <input type="radio" name="orderby" id="order_by_relevance" value="relevance" > relevance<br>
        <input type="submit" data-inline="true" value="Submit" onclick="load_search_result()">
    </form>
</div>
<div id="item-search-results"></div> <!-- qui in mezzo vengono stampati i risultati -->

</div>





<script src ="js/popper.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/private.js"></script>
<script src="js/common.js"></script>
</body>
</html>

