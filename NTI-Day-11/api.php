<?php
include_once "student.php";
header("content-type:application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
        $student = new Student($data['name'], $data['email'], $data['age']);
        $student->activate();
        echo $student->toJson();
}
