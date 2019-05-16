<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
require_once '../php/purchaseUtility.php';


$username = json_decode(file_get_contents("php://input"))->username;

// set product property values

//$result = get_information_listed('users', 'name, surname, username, mail, img, description', 'username', $data->username);

$cart = array();

foreach(get_multiple_information("cart c inner join products p on c.item = p.code", [ "code", "name", "description", "price", "img" ], "username", $username) as $row){
    array_push($cart, $row);
}

$result = [
    "cart" => get_multiple_information("cart c inner join products p on c.item = p.code", [ "code", "name", "description", "price", "img" ], "username", $username),
    "total" => getTotalCartPrice($username)
];

echo json_encode($cart);

