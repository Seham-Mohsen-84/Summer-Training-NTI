<?php
header("Content-Type: application/json");
require_once("../../db/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $student_id = $data['student_id'] ?? null;
    $course_id = $data['course_id']  ?? null ;
    $grade = $data['grade']  ?? null;
    $enrollment_date = $data['enrollment_date']  ?? null;

    if (!$student_id || !$course_id || !$grade || !$enrollment_date) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit();
    }

    $sql = "INSERT INTO enrollments (student_id, course_id, grade, enrollment_date) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iiis", $student_id, $course_id, $grade, $enrollment_date);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "success", "message" => "Student added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }

} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
