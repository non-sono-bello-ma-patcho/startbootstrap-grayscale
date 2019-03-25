<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 21/03/19
 * Time: 23.14
 */

// a seconda che la carta sia vista nello store, nel carrello o wishlist, deve reindirizzare sul carrello o sul dettaglio
$product_link = "";

echo "
<div class=\"col-sm-5 position-relative mt-3 pr-0\">
    <div class=\"card slim-card text-white text-left mt-2 mb-3\">
        <a href=\"../index.php\" class=\"read-more text-white\">Read more</a>
        <img src=\"{$card_image}\" class=\"card-img\" alt=\"...\">
        <div class=\"card-img-overlay\">
            <h5 class=\"card-title d-inline\">{$card_title}</h5>
            <span class='badge badge-info'><small>{$card_price}$</small></span>
            <span class='badge badge-pill badge-danger float-right'>15</span>
            <p class=\"card-text\">{$card_description}</p>
        </div>
    </div>
</div>
";