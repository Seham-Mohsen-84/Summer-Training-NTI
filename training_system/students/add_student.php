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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $dob = $_POST['dob'] ?? null;

        if ($name && $email && $phone && $dob) {
            $sql = "INSERT INTO students(name, email, phone, date_of_birth) VALUES (?, ?, ?, ?)";
            $stmt=mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $dob);
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                echo "<div class='alert alert-success text-center'>Student Added Successfully!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Error: " . $conn->error . "</div>";
            }
        }
    }
    ?>
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex ">
        <div class="col">
            <h3>Add New Student</h3>
            <div class="card text-center">
                <div class="card-body was-validated">
                    <form class="row g-3" action="" method="post">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control is-valid" id="name" name="name" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="Email" class="form-control is-valid" id="email" name="email" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control is-valid" id="phone" name="phone" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date_Of_Birth</label>
                            <input type="date" class="form-control is-valid" id="dob" name="dob" size="70" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100 mb-2" size="70">Add Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
