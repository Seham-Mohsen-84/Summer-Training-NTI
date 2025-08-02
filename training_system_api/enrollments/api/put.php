<?php
header("Access-Control-Allow-Origin: *");
header("content-type: application/json");
require_once '../../db/db.php';

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = json_decode(file_get_contents("php://input"),true);

    $id = $data["id"]??null;
    $student_id = $data["student_id"]??null;
    $course_id = $data["course_id"]??null;
    $grade = $data["grade"]??null;
    $enrollment_date = $data["enrollment_date"]??null;

    if(!$id || !$student_id || !$course_id || !$grade || !$enrollment_date) {
        echo json_encode(["status" => "error", "message" => "missing required fields"]);
        exit();
    }

    $sql = "UPDATE enrollments SET student_id = ?, course_id = ?, grade = ?, enrollment_date = ? where id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iiisi", $student_id, $course_id, $grade, $enrollment_date, $id);

    if(mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "success", "message" => "Enrollment updated"]);
    }else{
        echo json_encode(["status" => "error", "message" => "Database error :".$conn->error]);
    }

}else{
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}

