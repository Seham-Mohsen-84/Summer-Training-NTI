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
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <p class="card-text">total students : <strong id="students-count">0</strong></p>
                        <a href="students/students.php" class="btn btn-outline-success">View Students</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">total courses : <strong id="courses-count">0</strong></p>
                        <a href="courses/courses.php" class="btn btn-outline-primary">View Course</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Enrollments</h5>
                        <p class="card-text">total enrollment : <strong id="enrollments-count">0</strong></p>
                        <a href="enrollments/enrollments.php" class="btn btn-outline-danger">View Enrollments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>

<script>

    fetch('students/api/get.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                document.getElementById("students-count").innerHTML = data.data.length;
            }
        })
        .catch(error => console.log("Error fetching students count:", error));


    fetch('courses/api/get.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                document.getElementById("courses-count").innerHTML = data.data.length;
            }
        })
        .catch(error => console.log("Error fetching courses count:", error));


    fetch('enrollments/api/get.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                document.getElementById("enrollments-count").innerHTML = data.data.length;
            }
        })
        .catch(error => console.log("Error fetching enrollments count:", error));
</script>
</body>
</html>
