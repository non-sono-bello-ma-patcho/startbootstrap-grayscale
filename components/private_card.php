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
$card_cmd = !is_int(strpos($_COOKIE['cart'], $card_code))? 'add' : 'remove';
$card_class = !is_int(strpos($_COOKIE['cart'], $card_code))? 'far' : 'fas';
$tab = isset($_REQUEST['tab'])? $_REQUEST['tab'] : "";

// setting button class and style depending on tab
switch($tab){
    case 'new-prod':
        $icon = 'star';
        $color = 'warning';
        break;
    case 'cart':
        $icon = 'minus-circle';
        $color = 'danger';
        break;
}
// come faccio a settare il bottone a seconda che il prodotto sia già nel carrello o meno? piango.


echo "
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