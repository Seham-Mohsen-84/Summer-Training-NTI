<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");


if (!isset($_SESSION['user']) || $_SESSION['user'] == 0) {
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit();
}

require_once "../../db/db.php";

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

mysqli_close($conn);
?>
