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
$card_code = isset($_REQUEST['code'])? trim($_REQUEST['code']) : $code;
$product_link = 'herschel.hopto.org/products.php?id='.$card_code;



echo "
<div class=\"col-lg-6 position-relative mt-3 pr-0\">
    <div class=\"custom-card card slim-card text-white text-left mt-2 mb-3\">
        <a href=\"{$product_link}\" class=\"read-more text-white\">Read More</a>
        <img src=\"{$card_image}\" class=\"card-img\" alt=\"...\">
        <div class=\"card-img-overlay\">
            <h4 class=\"card-title d-inline\">{$card_title}</h4>
            <span class='badge badge-info'><small>{$card_price}$</small></span>
            <button data-id=\"{$card_code}\" data-cmd='add' class='manage-cart bg-transparent border-0 float-right outline'  style='outline: none;' onclick='addtoCart(this)'>
                <span class='far fa-star float-right text-warning'></span>
            </button>
            <p class=\"card-text\">{$card_description}</p>
        </div>
    </div>
</div>
";