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
<div class=\"col-sm-6 position-relative mt-3 pr-0\">
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