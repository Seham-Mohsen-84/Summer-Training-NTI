<?php include_once "include/header.php";?>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<h3>Welcome, <?= $_SESSION['user'] ?></h3>

<?php include_once "include/footer.php"; ?>
