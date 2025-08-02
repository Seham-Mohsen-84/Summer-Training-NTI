<?php
header("Content-Type: application/json");
require_once("../../db/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $title = $data['title'] ?? null;
    $description = $data['description']  ?? null ;
    $hours = $data['hours']  ?? null;
    $price = $data['price']  ?? null;

    if (!$title || !$description || !$hours || !$price) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit();
    }

    $sql = "INSERT INTO courses (title, description, hours, price) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $hours, $price);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "success", "message" => "Course added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }

} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
