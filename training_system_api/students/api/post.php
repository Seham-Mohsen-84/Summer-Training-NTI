<?php
header("Content-Type: application/json");
require_once("../../db/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data['name'] ?? null;
    $email = $data['email']  ?? null ;
    $phone = $data['phone']  ?? null;
    $dob = $data['dob']  ?? null;

    if (!$name || !$email || !$phone || !$dob) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit();
    }

    $sql = "INSERT INTO students (name, email, phone, date_of_birth) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $dob);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "success", "message" => "Student added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }

} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
