<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

session_start();

// files needed to connect to database
require_once '../php/userUtility.php';

if(!isset($_SESSION['id']) || !isAdmin($_SESSION['id'])){
    http_response_code(401);
    exit;
}


$username = json_decode(file_get_contents("php://input"))->username;

// set product property values

//$result = get_information_listed('users', 'name, surname, username, mail, img, description', 'username', $data->username);

$result = [
    'name' => getUserName($username),
    'surname' => getUserSurname($username),
    'username' => $username,
    'mail' => getUserMail($username),
    'img' => getUserImg($username),
    'description' => getUserDescription($username)
];

echo json_encode($result);

