<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 06/05/19
 * Time: 23.30
 */

if(!isset($_REQUEST["id"])) header("index.php");

$id = trim($_REQUEST["param"]);

$productName = getProductName($id);
$productPrice = getProductPrice($id);
$productDescription = getProductDescription($id);

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

    </head>
    <body>
    <!--    Detail Navigation    -->
        <%=require('./components/detail_bar_component.html')%>
    </body>
</html>
