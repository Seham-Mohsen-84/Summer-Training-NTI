<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == 0) {
    header("Location: ../login.php");
    exit();
}
?>
<?php
include_once "../db/db.php";

$id = $_GET['id'];
$sql="DELETE FROM enrollments WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: enrollments.php");
    exit();
}
