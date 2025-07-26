<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if(!isset($_SESSION['user'] )|| $_SESSION['user'] ==0 ){
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit();
}

require_once "../../db/db.php";

$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0 && $result) {
    $courses = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
    echo json_encode(['status' => 'success', 'data' => $courses]);
}else{
    echo json_encode(["status"=>"success", 'data'=>[]]);
}
mysqli_close($conn);
?>