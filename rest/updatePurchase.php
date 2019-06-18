<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../php/purchaseUtility.php';
require_once '../php/userUtility.php';

if(!isset($_SESSION['id'])){
    http_response_code(401);
    exit;
}

$username = $_SESSION['id'];

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database



$data = json_decode(file_get_contents("php://input"));
//$username = $data->username;

// set product property values
if(!$data->items){
    http_response_code(400);
    return;
}

// inserisco in acquisti
insertUserPurchases($username, $data->items);

// rimuovo dal carrello
foreach ($data->items as $key => $value){
    removeFromCart($username, $key);
    setProductRelevance($key,getProductRelevance($key)+$value);
}


//    // aggiorno cookie
setcookie('cart', serialize(getUserCart($username)), time()+3600, "/");
setcookie('cart-total', getTotalCartPrice($username), time()+3600, "/");
http_response_code(200);

echo json_encode(getUserPurchases($username));


