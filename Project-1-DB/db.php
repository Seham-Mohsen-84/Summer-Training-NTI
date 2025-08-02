<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "secure_admin";
$port = 3307;
$conn = mysqli_connect($servername, $username, $password, $dbname , $port);
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}
