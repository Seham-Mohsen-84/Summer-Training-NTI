<?php
header("Content-Type: application/json");
require_once("../../db/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['id'] ?? null;
    $title = $data['title'] ?? null;
    $description = $data['description'] ?? null;
    $hours = $data['hours'] ?? null;
    $price = $data['price'] ?? null;

    if (!$id || !$title || !$description || !$hours || !$price) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit();
    }

    $sql = "UPDATE courses SET title = ?, description = ?, hours = ?, price = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $title, $description, $hours, $price, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "success", "message" => "Course updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
