<?php
include_once "../db/db.php";

$id = $_GET['id'];
$sql="DELETE FROM students WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    mysqli_query($conn,$sql);
    header("Location: students.php");
    exit();
}