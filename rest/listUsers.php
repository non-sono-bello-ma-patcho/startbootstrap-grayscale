<?php

require_once "../php/userUtility.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['id']) && !isAdmin($_SESSION['id'])){
    http_response_code(401);
    exit;
}

// files needed to connect to database

$username = json_decode(file_get_contents("php://input"))->username;

$response = [];

// set product property values
$dbcon = database_connection();
$query = "SELECT username, name, surname, email, img from users WHERE username like '%{$username}%'";
$result = send_query($dbcon, $query);

mysqli_close($dbcon);

while( $row = mysqli_fetch_assoc($result)){
    array_push($response,$row);
}

echo json_encode($response);