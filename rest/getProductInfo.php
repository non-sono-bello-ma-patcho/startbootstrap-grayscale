<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
require_once '../php/productUtility.php';



//$code = isset($_REQUEST['code'])?$_REQUEST['code']:"";
$code = json_decode(file_get_contents("php://input"))->code;


// set product property values

//$result = get_information_listed('users', 'name, surname, username, mail, img, description', 'username', $data->username);

$result = [
    'code' => $code,
    'name' => getProductName($code),
    'description' => getProductDescription($code),
    'price' => getProductPrice($code),
    'img' => getProductImg($code),
    'relevance' => getProductRelevance($code),
    'level' => getProductLevel($code),
    'minAge' => getProductMinAge($code),
    'distance' => getProductDistance($code),
    'duration' => getProductDuration($code),
    'guide' => getProductGuide($code),
    'housing' => getProductHousing($code),
    'maxUsers' => getProductMaxUsers($code),
];

echo json_encode($result);


