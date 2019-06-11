<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
require_once '../php/userUtility.php';


$bean = json_decode(file_get_contents("php://input"));
$prop = $bean->prop;
$result = [];
if($prop === 'username'){
    $result['exists'] = existingUser($bean->username);
}
else {
    $result['exists'] = existingMail($bean->email);
}


echo json_encode($result);

