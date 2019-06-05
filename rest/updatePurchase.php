<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
require_once '../php/purchaseUtility.php';


$data = json_decode(file_get_contents("php://input"));

// set product property values
if(!$data->items){
    http_response_code(400);
    return;
}


// inserisco in acquisti
insertUserPurchases($data->username, $data->items);

// rimuovo dal carrello
foreach ($data->items as $key => $value){
    removeFromCart($data->username, $key);
    setProductRelevance($key,getProductRelevance($key)+$value);
}


//    // aggiorno cookie
setcookie('cart', serialize(getUserCart($data->username)), time()+3600, "/");
setcookie('cart-total', getTotalCartPrice($data->username), time()+3600, "/");
http_response_code(200);

echo json_encode(getUserPurchases($data->username));


