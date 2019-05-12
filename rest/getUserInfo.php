<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
require_once '../php/userUtility.php';


$data = json_decode(file_get_contents("php://input"));

// set product property values

//$result = get_information_listed('users', 'name, surname, username, mail, img, description', 'username', $data->username);

$result = [
    'name' => getUserName($data->username),
    'surname' => getUserSurname($data->username),
    'username' => $data->username,
    'mail' => getUserMail($data->username),
    'img' => getUserImg($data->username),
    'description' => getUserDescription($data->username)
];

echo json_encode($result);

