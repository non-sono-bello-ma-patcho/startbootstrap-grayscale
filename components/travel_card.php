<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 21/03/19
 * Time: 23.14
 */

$product_link = 'herschel.hopto.org/products.php?id=';
// a seconda che la carta sia vista nello store, nel carrello o wishlist, deve reindirizzare sul carrello o sul dettaglio
isset($_REQUEST['name']) ? $card_title = trim($_REQUEST['name']) : $card_title = $name;
isset($_REQUEST['description']) ? $card_description = trim($_REQUEST['description']) : $card_description = $description;
isset($_REQUEST['price']) ? $card_price = trim($_REQUEST['price']) : $card_price = $price;
isset($_REQUEST['img']) ? $card_image = 'img/productImg/'.trim($_REQUEST['img']) : $card_image = $img;
isset($_REQUEST['code']) ? $product_link .= trim($_REQUEST['code']) : $product_link .= $code;

echo "
<div class=\"col-sm-5 position-relative mt-3 pr-0\">
    <div class=\"custom-card card slim-card text-white text-left mt-2 mb-3\">
        <a href=\"{$product_link}\" class=\"read-more text-white\">Read more</a>
        <img src=\"{$card_image}\" class=\"card-img\" alt=\"...\">
        <div class=\"card-img-overlay\">
            <h4 class=\"card-title d-inline\">{$card_title}</h4>
            <span class='badge badge-info'><small>{$card_price}$</small></span>
            <span class='badge badge-pill badge-danger float-right'>15</span>
            <p class=\"card-text\">{$card_description}</p>
        </div>
    </div>
</div>
";