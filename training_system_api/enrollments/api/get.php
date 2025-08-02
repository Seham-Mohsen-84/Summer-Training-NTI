<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
require_once "../../db/db.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] == 0) {
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit();
}
$id = $_GET['id'] ?? null;

if($id){
    $sql = "SELECT e.id, s.name, c.title, e.grade, e.enrollment_date
        FROM students AS s
        JOIN enrollments AS e ON e.student_id = s.id
        JOIN courses AS c ON e.course_id = c.id where id= ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $enrollments = mysqli_fetch_assoc($result);

    if ($enrollments) {
        echo json_encode(["status" => "success", "data" => $enrollments]);
    }
    else{
        echo json_encode(["status" => "error", "message" => "No data found"]);
    }
    mysqli_stmt_close($stmt);
}
else{

    $sql = "SELECT e.id, s.name, c.title, e.grade, e.enrollment_date
        FROM students AS s
        JOIN enrollments AS e ON e.student_id = s.id
        JOIN courses AS c ON e.course_id = c.id";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $enrollments = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $enrollments[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $enrollments]);
    } else {
        echo json_encode(["status" => "success", "data" => []]);
    }
}

mysqli_close($conn);
