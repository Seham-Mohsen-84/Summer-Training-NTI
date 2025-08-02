<?php

$localhost="localhost";
$username="root";
$password="";
$database="training_system_api";
$port="3307";

$conn = new mysqli($localhost, $username, $password, $database, $port);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
