<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == 0) {
    header("Location: login.php");
    exit();
}
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Index</title>
    <?php include_once "public/navbar.php"; ?>
    <?php include_once "db/db.php"; ?>
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <p class="card-text">total students :
                            <?php
                            $sql = "SELECT id FROM students";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                $numrows = mysqli_num_rows($result);
                                echo $numrows;
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                            ?>
                        </p>
                        <a href="students/students.php" class="btn btn-outline-success">View Students</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">total courses :
                            <?php
                            $sql1 = "SELECT id FROM courses";
                            $result1 = mysqli_query($conn, $sql1);

                            if ($result1) {
                                $numrows1 = mysqli_num_rows($result1);
                                echo $numrows1;
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                            ?>
                        </p>
                        <a href="courses/courses.php" class="btn btn-outline-primary">View Course</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Enrollments</h5>
                        <p class="card-text">total enrollment :
                            <?php
                            $sql2 = "SELECT id FROM enrollments";
                            $result2 = mysqli_query($conn, $sql2);

                            if ($result2) {
                                $numrows2 = mysqli_num_rows($result2);
                                echo $numrows2;
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                            ?>
                        </p>
                        <a href="enrollments/enrollments.php" class="btn btn-outline-danger">View Enrollments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
