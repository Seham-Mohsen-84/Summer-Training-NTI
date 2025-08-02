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
        $title = $_POST['title'];
        $description = $_POST['description'];
        $hours = $_POST['hours'];
        $price = $_POST['price'];

        $sql = "UPDATE courses 
            SET title=?, description=?, hours=?, price=? 
            WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssiii", $title, $description, $hours, $id, $price);
            mysqli_stmt_execute($stmt);
            header("Location: courses.php");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center'>Error: " . $conn->error . "</div>";
        }
    }

    $id =$_GET['id'] ?? null;
    if (!$id) {
        header("Location: courses.php");
        exit();
    }

    $sql1="SELECT * FROM courses WHERE id=?";
    $stmt1=mysqli_prepare($conn,$sql1);
    mysqli_stmt_bind_param($stmt1, "i", $id);
    mysqli_stmt_execute($stmt1);
    $result = mysqli_stmt_get_result($stmt1);
    $courses = mysqli_fetch_assoc($result);
    ?>

</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex ">
        <div class="col">
            <h3>Edit Course</h3>
            <div class="card text-center">
                <div class="card-body was-validated">
                    <form class="row g-3" action="" method="post">
                        <input type="hidden" name="id" value="<?= $courses['id'] ?>">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control is-valid" id="title" name="title" size="70" value="<?= $courses['title'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control is-valid" id="description" name="description" size="70" value="<?= $courses['description'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="hours" class="form-label">Hours</label>
                            <input type="number" class="form-control is-valid" id="hours" name="hours" size="70" value="<?= $courses['hours'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control is-valid" id="price" name="price" size="70" value="<?= $courses['price'] ?>" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-outline-primary w-100 mb-2" size="70">Edit Courses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
