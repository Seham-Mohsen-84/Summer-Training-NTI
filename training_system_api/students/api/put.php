<?php
header("Content-Type: application/json");
require_once("../../db/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['id'] ?? null;
    $name = $data['name'] ?? null;
    $email = $data['email'] ?? null;
    $phone = $data['phone'] ?? null;
    $dob = $data['dob'] ?? null;

    if (!$id || !$name || !$email || !$phone || !$dob) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit();
    }

    $sql = "UPDATE students SET name = ?, email = ?, phone = ?, date_of_birth = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $phone, $dob, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "success", "message" => "Student updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
