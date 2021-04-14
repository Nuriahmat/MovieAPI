<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once 'config/Database.php';
include_once 'objects/Movie.php';

$database = new Database();
$db = $database->getConnection();

$movie = new Movie($db);

$movie->id = isset($_GET['id']) ? $_GET['id'] : die();

if ($movie->addFavorite()) {
    http_response_code(200);
    echo json_encode(
        array('message' => 'Success to add favorite ')
    );
} else {
    http_response_code(422);
    echo json_encode(
        array('message' => 'Fail to add favorite list')
    ); 
}

