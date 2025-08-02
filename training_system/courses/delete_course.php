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
$sql="DELETE FROM courses WHERE id=?";
$stmt=mysqli_prepare($conn,$sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt,"i",$id);
    mysqli_stmt_execute($stmt);
    header("Location: courses.php");
    exit();
}
