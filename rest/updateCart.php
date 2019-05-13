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
    if($data->op==="add")
        insertUserCart($data->username, $data->item);
    else
        removeFromCart($data->username, $data->item);

} catch (Exception $e){
    http_response_code(500);
}

setrawcookie('cart', getUserCart($data->username));

$result = [
    "total" => getUserTotal($data->username)!==null?getUserTotal($data->username) : 0
];

http_response_code(200);

echo json_encode($result);


