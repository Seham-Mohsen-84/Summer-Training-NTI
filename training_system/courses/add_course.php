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
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        $hours = $_POST['hours'] ?? null;
        $price = $_POST['price'] ?? null;

        if ($title && $description && $hours && $price ) {
            $sql = "INSERT INTO courses(title, description, hours, price) VALUES (?, ?, ?, ?)";
            $stmt =mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $hours, $price);
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                echo "<div class='alert alert-success text-center'>Course Added Successfully!</div>";
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
            <h3>Add New Course</h3>
            <div class="card text-center">
                <div class="card-body was-validated">
                    <form class="row g-3" action="" method="post">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control is-valid" id="title" name="title" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control is-valid" id="description" name="description" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="hours" class="form-label">Hours</label>
                            <input type="number" class="form-control is-valid" id="hours" name="hours" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control is-valid" id="price" name="price" size="70" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100 mb-2" size="70">Add Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
