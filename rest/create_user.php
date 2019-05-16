<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// files needed to connect to database
include_once './DataBase.php';
include_once './User.php';

// get database connection
$db = new Database();

// instantiate product object
$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

// set product property values
$user->name = $data->name;
$user->surname = $data->surname;
$user->username = $data->username;
$user->email = $data->email;
$user->password = $data->password;
$user->description = $data->description;
$user->img = $data->img;
$user->location = $data->location;
$user->admin = $data->admin;

if($user->create()){

    // set response code
    http_response_code(200);

    // display message: user was created
    echo json_encode(array("message" => "User was created."));
    setcookie("username", $user->username);
}

// message if unable to create user
else{

    // set response code
    http_response_code(400);

    // display message: unable to create user
    echo json_encode(array("message" => "Unable to create user."));
}