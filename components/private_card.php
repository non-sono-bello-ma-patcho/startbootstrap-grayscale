<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 21/03/19
 * Time: 23.14
 */

// a seconda che la carta sia vista nello store, nel carrello o wishlist, deve reindirizzare sul carrello o sul dettaglio
$card_title =  isset($_REQUEST['name']) ? trim($_REQUEST['name']) : $card_title = $name;
$card_description = isset($_REQUEST['description']) ? trim($_REQUEST['description']) : $card_description = $description;
$card_price = isset($_REQUEST['price']) ? trim($_REQUEST['price']) : $card_price = $price;
$card_image = isset($_REQUEST['img']) ? trim($_REQUEST['img']) : $card_image = $img;
$product_link = 'herschel.hopto.org/products.php?id='.(isset($_REQUEST['code']) ? trim($_REQUEST['code']) :  $code);

echo "
<div class=\"col-lg-6 position-relative mt-3 pr-0\">
    <div class=\"custom-card card slim-card text-white text-left mt-2 mb-3\">
        <a href=\"{$product_link}\" class=\"read-more text-white\">Read More</a>
        <img src=\"{$card_image}\" class=\"card-img\" alt=\"...\">
        <div class=\"card-img-overlay\">
            <h4 class=\"card-title d-inline\">{$card_title}</h4>
            <span class='badge badge-info'><small>{$card_price}$</small></span>
            <label class='float-right'>
                <input type='checkbox' id=\"add_{$card_code}\"  style='opacity: 0; width: 0; height: 0;' onclick='addtoCart(this)'>
                <span class='far fa-star float-right text-warning'></span>
            </label>
            <button id=\"remove_{$card_code}\" class='fas fa-star float-right text-warning d-none' style='background: transparent; border: 0; outline: none; cursor:pointer;' onclick='remove_from_Cart(this)'></button>
            <p class=\"card-text\">{$card_description}</p>
        </div>
    </div>
</div>
";