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

    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $student = mysqli_fetch_assoc($result);

    if ($student) {
        echo json_encode(["status" => "success", "data" => $student]);
    } else {
        echo json_encode(["status" => "error", "message" => "Student not found"]);
    }

    mysqli_stmt_close($stmt);

}
else {

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $students = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $students]);
    } else {
        echo json_encode(["status" => "success", "data" => []]);
    }
}

mysqli_close($conn);
