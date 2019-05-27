<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
require_once '../php/wishlistUtility.php';


try {
    $bean = json_decode(file_get_contents("php://input"));

    $username = $bean->username;

    $cookie_wishlist = getUserWishList($username);

    setcookie("wishlist", serialize($cookie_wishlist), time()+3600, "/");
    error_log("set");
    $result = get_multiple_information("wishlist w inner join products p on w.product = p.code", [ "code", "name", "description", "price", "img" ], "username", $username);
} catch (Exception $e){
    http_response(400);
}
echo json_encode($result);

