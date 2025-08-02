<?php
header("Content-Type: application/json");
require_once("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $title = $data['title'] ;
    $description = $data['description'] ;
    $hours = $data['hours'] ;
    $price = $data['price'] ;

    if (!$title || !$description || !$hours || !$price) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit();
    }


    $sql = "INSERT INTO courses (title, description, hours, price) VALUES ('$title', '$description', $hours, $price)";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Course added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
