<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == 0) {
    header("Location: ../login.php");
    exit();
}
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
    <?php include_once "../public/navbar.php"; ?>
    <?php include_once "../db/db.php"; ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];

        $sql = "UPDATE students 
            SET name=?, email=?, phone=?, date_of_birth=? 
            WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $phone, $dob, $id);
            mysqli_stmt_execute($stmt);
            header("Location: students.php");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center'>Error: " . $conn->error . "</div>";
        }
    }

    $id =$_GET['id'] ?? null;
    if (!$id) {
        header("Location: students.php");
        exit();
    }
    $sql1 = "SELECT * FROM students WHERE id=?";
    $stmt1=mysqli_prepare($conn, $sql1);
    mysqli_stmt_bind_param($stmt1, "i", $id);
    mysqli_stmt_execute($stmt1);
    $result=mysqli_stmt_get_result($stmt1);
    $student = mysqli_fetch_assoc($result);
    ?>

</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex ">
        <div class="col">
            <h3>Edit Student</h3>
            <div class="card text-center">
                <div class="card-body was-validated">
                    <form class="row g-3" action="" method="post">
                        <input type="hidden" name="id" value="<?= $student['id'] ?>">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control is-valid" id="name" name="name" size="70" value="<?= $student['name'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="Email" class="form-control is-valid" id="email" name="email" size="70" value="<?= $student['email'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control is-valid" id="phone" name="phone" size="70" value="<?= $student['phone'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date_Of_Birth</label>
                            <input type="date" class="form-control is-valid" id="dob" name="dob" size="70" value="<?= $student['date_of_birth'] ?>" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-outline-primary w-100 mb-2" size="70">Edit Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
