<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

require_once("db_connection.php");

if (!$conn) {
    echo json_encode(["status" => "error", "message" => "no connection"]);
    exit();
}

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

mysqli_close($conn);
?>
