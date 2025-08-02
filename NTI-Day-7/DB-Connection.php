<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "training_system";
$conn = new mysqli($host, $user, $pass, $dbname,3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>