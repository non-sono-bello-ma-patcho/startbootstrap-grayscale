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
$product_link = 'herschel.hopto.org/detail.php?id='.$card_code;
$uc = json_encode(unserialize($_COOKIE['cart']));
$response = strpos($card_code, $uc)>=0;
error_log("unserialiazed cart is: {$uc}");
error_log("the response for {$card_code} is {$response}");
$card_cmd = array_search($card_code, unserialize($_COOKIE['cart']))===false? 'add' : 'remove';
$card_class = array_search($card_code, unserialize($_COOKIE['cart']))===false? 'far' : 'fas'; // array search restituisce la chiave, altrimenti resituisce false...
$tab = isset($_REQUEST['tab'])? $_REQUEST['tab'] : "";

// setting button class and style depending on tab
switch($tab){
    case 'purchase-container':
        break;
    case 'wishlist':
    case 'cart':
        $icon = 'minus-circle';
        $color = 'danger';
        $card_class = 'fas';
        $card_cmd  = 'remove';
        break;
    default:
        $icon = '';
        $color = '';
        break;
}
// come faccio a settare il bottone a seconda che il prodotto sia già nel carrello o meno? piango.


echo "
    <div class=\"custom-card card slim-card text-white text-left mt-2 mb-3\">
        <a href=\"{$product_link}\" class=\"read-more text-white\">Read More</a>
        <img src=\"{$card_image}\" class=\"card-img\" alt=\"...\">
        <div class=\"card-img-overlay\">
            <div class='row'>
                <div class='col-8'>
                    <h4 class=\"card-title d-inline\">{$card_title}</h4>
                    <span class='badge badge-info'><small>{$card_price}$</small></span>
                </div>
                <div class='col-2'>
                    <button data-id=\"{$card_code}\" data-cmd='{$card_cmd}' data-table='' class='manage-{$tab} bg-transparent border-0 float-right outline' style='outline: none;'>
                        <span class='{$card_class} fa-{$icon} float-right text-{$color}'></span>
                    </button>    
                </div>
                <div class='col-2'>
                    <button data-id='{$card_code}' data-cmd='{$card_cmd}' data-table='' class='manage-{$tab} bg-transparent border-0 float-right outline' style='outline: none;'>
                        <span class='{$card_class} fa-{$icon} float-right text-{$color}'></span>
                    </button>    
                </div>   
            </div>            
            <p class=\"card-text\">{$card_description}</p>
        </div>
    </div>
";