<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['id'])){
    http_response_code(401);
    exit;
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
require_once '../php/purchaseUtility.php';
require_once '../php/wishlistUtility.php';


$data = json_decode(file_get_contents("php://input"));
$username = $_SESSION['id'];

// set product property values
if(!$data->op){
    http_response_code(400);
    return;
}


try {
    if($data->op==="add"){
        insertUserCart($username, $data->code);
        if(array_search($data->code, unserialize($_COOKIE['wishlist']))!==false){
            // rimuovo item dalla wishlist e aggiorno wishlist cookie
            removeFromWishList($username, $data->code);
            setcookie('wishlist', serialize(getUserWishList($data->username)), time()+3600, "/");
        }

    }
    else{
        removeFromCart($username, $data->code);
    }
    setcookie('cart', serialize(getUserCart($username)), time()+3600, "/");
    setcookie('cart-total', getTotalCartPrice($username), time()+3600, "/");

    http_response_code(200);
    echo json_encode(getTotalCartPrice($username));
} catch (Exception $e){
    http_response_code(500);
}

