<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
require_once '../php/purchaseUtility.php';



$bean = json_decode(file_get_contents("php://input"));

$username = $bean->username;

$result = get_multiple_information("purchases c inner join products p on c.item = p.code", [ "code", "name", "description", "price", "img", "guide", "housing", "level", "active", "amount" ], "username", $username);

echo json_encode($result);

