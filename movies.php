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

$stmt = $movie->list();
$count = $stmt->rowCount();

if ($count > 0) {
    $movie_arr = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $movie_item = [
            'id' => $id,
            'name' => $name,
            'favorite' => $favorite,
        ];

        array_push($movie_arr, $movie_item);
        http_response_code(200);
        echo json_encode($movie_arr);
    }
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No movies found")
    );
}

?>