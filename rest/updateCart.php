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
if(!$data->op){
    http_response_code(400);
    return;
}


try {
    if($data->op==="add"){
        error_log("adding item to cart");
        insertUserCart($data->username, $data->code);
    }
    else{
        error_log("removing item from cart");
        removeFromCart($data->username, $data->code);
    }
    setcookie('cart', serialize(getUserCart($data->username)), time()+3600, "/");

    http_response_code(200);
    echo json_encode(getTotalCartPrice($data->username));
} catch (Exception $e){
    http_response_code(500);
}

