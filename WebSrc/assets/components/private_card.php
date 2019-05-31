<?php
/**
 * Created by PhpStorm.
 * User: phibonachos
 * Date: 21/03/19
 * Time: 23.14
 */

$action_1 -> name = "1";
$action_2 -> name = "2";
// a seconda che la carta sia vista nello store, nel carrello o wishlist, deve reindirizzare sul carrello o sul dettaglio
$card_title =  isset($_REQUEST['name']) ? trim($_REQUEST['name']) : $card_title = $name;
$card_price = isset($_REQUEST['price']) ? trim($_REQUEST['price']) : $card_price = $price;
$card_description = isset($_REQUEST['description']) ? trim($_REQUEST['description']) : $card_description = $description;
$card_image = isset($_REQUEST['img']) ? trim($_REQUEST['img']) : $card_image = $img;
$card_code = isset($_REQUEST['code'])? trim($_REQUEST['code']) : $code;
$product_link = 'herschel.hopto.org/detail.php?id='.$card_code;
$tab = isset($_REQUEST['tab'])? $_REQUEST['tab'] : "";

// setting button class and style depending on tab
switch($tab){
    case 'purchase':
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

switch($_REQUEST['level']){
    case '0':
        $lev = 'beginner';
        break;
    case '1':
        $lev = 'medium';
        break;
    default:
        $lev = 'expert';
}

initFirstAction();
initSecondAction();

$card_level = isset($_REQUEST['level']) ? "<span class='custom-tag level {$lev}'>{$lev}</span>" : "";
$housing_tag = $_REQUEST['housing']? "<span class='custom-tag housing'>acc.</span>" : "";
$guide_tag = $_REQUEST['guide']? "<span class='custom-tag guide'>guide</span>" : "";

$faction = isset($action_1->deactivated)? "" : "<button class='bg-transparent border-0 px-1 $action_1->color $action_1->jselector' data-id='{$action_1->id}' data-command='{$action_1->cmd}' data-target='{$action_1->target}'><span class='{$action_1->icon} '></span></button>";
$saction = isset($action_2->deactivated)? "" : "<button class='bg-transparent border-0 px-1 $action_2->color $action_2->jselector' data-id='{$action_2->id}' data-command='{$action_2->cmd}' data-target='{$action_2->target}'><span class='{$action_2->icon} '></span></button>";

echo "
<div class='bubble-box'>
    <div class='row'>
        <div class='d-none d-md-block col-lg-6 col-12'>
            <img src='{$card_image}' alt='' class='img-fluid'>
        </div>
        <div class='col-lg-6 col-12 position-relative'>
            <div class='position-absolute manage-$tab' style='right: 0; top: 0; z-index: 2; padding-right: 1rem'>
                $faction
                $saction
            </div>
            <h4>$card_title</h4>
            $card_level$housing_tag$guide_tag<span class='custom-tag price'>$card_price</span>
            <p class='description'>{$card_description}</p>
            <div class='row justify-content-center w-100 position-absolute' style='bottom: 0'>
                <a href='$product_link'>read more</a>
            </div>
        </div>
    </div>
</div>
";

function initFirstAction(){
    global $tab, $action_1, $card_code;
    $action_1->jselector = 'cart-handler';
    switch($tab){
        case 'cart':
            // nel cart c'è solo la prima action: delete from cart
            $action_1->icon = 'fas fa-minus-circle';
            $action_1->color = 'text-danger';
            $action_1->target = 'cart';
            $action_1->id = $card_code;
            $action_1->cmd = 'remove';
            break;
        case 'products':
            // statici
            $action_1->target = 'cart';
            $action_1->color = 'text-warning';
            $action_1->id = $_REQUEST['code'];
            if(array_search($card_code, unserialize($_COOKIE['cart']))===false) {
                // card non nel carrello
                $action_1->icon = 'far fa-star';
                $action_1->cmd = 'add';
            }
            else {
                $action_1->icon = 'fas fa-star';
                $action_1->cmd = 'remove';
            }
            break;
        case 'wishlist':
            // la prima action è quella che sposta il prodotto nel carrello
            $action_1->cart = 'cart';
            $action_1->color = 'text-info';
            $action_1->id = $_REQUEST['code'];
            $action_1->icon = 'far fa-star';
            $action_1->cmd = 'add';
            $action_1->target = 'cart';
            break;
        default:
            // purchase e listato non hanno actions.. o almeno per ora
            $action_1->deactivated = true;
            return;
    }
}

function initSecondAction(){
    global $tab, $action_2, $card_code;
    $action_2->jselector = 'wishlist-handler';
    switch($tab){
        case 'products':
            // statici
            $action_2->target = 'wishlist';
            $action_2->color = 'text-danger';
            $action_2->id = $card_code;
            if(array_search($card_code, unserialize($_COOKIE['wishlist']))===false) {
                // card non nel carrello
                $action_2->icon = 'far fa-heart';
                $action_2->cmd = 'add';
            }
            else {
                $action_2->icon = 'fas fa-heart';
                $action_2->cmd = 'remove';
            }
            break;
        case 'wishlist':
            // la seconda action è quella che elimina il prodotto dalla wishlist
            $action_2->target = 'wishlist';
            $action_2->id = $card_code;
            $action_2->icon = 'fas fa-minus-circle';
            $action_2->cmd = 'remove';
            $action_2->color = 'text-danger';
            break;
        default:
            // purchase e listato non hanno actions.. o almeno per ora
            $action_2->deactivated = true;
    }
}