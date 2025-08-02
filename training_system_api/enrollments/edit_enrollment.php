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

    $id =$_GET['id'] ?? null;
    if (!$id) {
        header("Location: enrollments.php");
        exit();
    }
    $sql="SELECT e.id, e.student_id, e.course_id, e.grade, e.enrollment_date 
      FROM enrollments AS e WHERE e.id = ?";
    $stmt=mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    $enrollments = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];
        $grade = $_POST['grade'];
        $enrollment_date = $_POST['enrollment_date'];

        $sql = "UPDATE enrollments 
            SET student_id=?, course_id=?, grade=?, enrollment_date=?
            WHERE id=?";
        $stmt=mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "iiisi", $student_id, $course_id, $grade, $enrollment_date, $id);
        $result=mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: enrollments.php");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center'>Error: " . $conn->error . "</div>";
        }
    }

    ?>

</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex ">
        <div class="col">
            <h3>Edit Enrollment</h3>
            <div class="card text-center">
                <div class="card-body was-validated">
                    <form class="row g-3" action="" method="post">
                        <input type="hidden" name="id" value="<?= $enrollments['id'] ?>">
                        <div class="col-md-6">
                            <label for="student_id" class="form-label">Student</label>
                            <select name="student_id" class="form-select" required>
                                <?php
                                $students = mysqli_query($conn, "SELECT id, name FROM students");
                                while ($student = mysqli_fetch_assoc($students)) :
                                    ?>
                                    <option value="<?= $student['id'] ?>" <?= $student['id'] == $enrollments['student_id'] ? 'selected' : '' ?>>
                                        <?= $student['name'] ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="course_id" class="form-label">Course</label>
                            <select name="course_id" class="form-select" required>
                                <?php
                                $courses = mysqli_query($conn, "SELECT id, title FROM courses");
                                while ($course = mysqli_fetch_assoc($courses)) :
                                    ?>
                                    <option value="<?= $course['id'] ?>" <?= $course['id'] == $enrollments['course_id'] ? 'selected' : '' ?>>
                                        <?= $course['title'] ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="grade" class="form-label">Grade</label>
                            <input type="number" class="form-control is-valid" id="grade" name="grade" size="70" value="<?= $enrollments['grade'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="enrollment_date" class="form-label">Enrollment_date</label>
                            <input type="date" class="form-control is-valid" id="enrollment_date" name="enrollment_date" size="70" value="<?= $enrollments['enrollment_date'] ?>" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-outline-primary w-100 mb-2" size="70">Edit Enrollment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
