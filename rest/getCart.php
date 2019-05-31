<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
require_once '../php/purchaseUtility.php';


try {
    $bean = json_decode(file_get_contents("php://input"));

    $username = $bean->username;

    error_log("got {$username}");

// set product property values

//    $result = get_information_listed('users', 'name, surname, username, mail, img, description', 'username', $bean->username);
    error_log("setting cookie");
    $cookie_cart = getUserCart($username);
    error_log("encoding {$cookie_cart}");
    setcookie("cart", serialize($cookie_cart), time()+3600, "/");
    error_log("set");
    $result = get_multiple_information("cart c inner join products p on c.item = p.code", [ "code", "name", "description", "price", "img", "guide", "housing", "level" ], "username", $username);
} catch (Exception $e){
    $result = [
        "error" => $e->getMessage()
    ];
}
echo json_encode($result);

