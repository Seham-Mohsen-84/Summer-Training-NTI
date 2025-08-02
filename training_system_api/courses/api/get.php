<?php
session_start();
header("Content-Type: application/json;");
require_once "../../db/db.php";

if (!isset($_SESSION['user']) || $_SESSION['user'] == 0) {
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit();
}


$id = $_GET['id'] ?? null;

if ($id) {

    $sql = "SELECT * FROM courses WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $course = mysqli_fetch_assoc($result);

    if ($course) {
        echo json_encode(["status" => "success", "data" => $course]);
    } else {
        echo json_encode(["status" => "error", "message" => "Student not found"]);
    }

    mysqli_stmt_close($stmt);

}
else {

    $sql = "SELECT * FROM courses";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $courses = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $courses[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $courses]);
    } else {
        echo json_encode(["status" => "success", "data" => []]);
    }
}

mysqli_close($conn);
