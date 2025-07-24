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
$sql="DELETE FROM courses WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    mysqli_query($conn,$sql);
    header("Location: courses.php");
    exit();
}
