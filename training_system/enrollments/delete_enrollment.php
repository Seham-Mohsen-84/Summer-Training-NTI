<?php
include_once "../db/db.php";

$id = $_GET['id'];
$sql="DELETE FROM enrollments WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: enrollments.php");
    exit();
}
