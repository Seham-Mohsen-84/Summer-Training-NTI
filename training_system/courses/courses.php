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
    <title>Courses</title>
    <?php include_once "../public/navbar.php"; ?>
    <?php include_once "../db/db.php"; ?>
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex ">
        <h3>Course List</h3>
        <?php if($_SESSION['role'] == 1): ?>
        <span><a class="btn btn-outline-primary" href="add_course.php">+Add Courses</a></span>
        <?php endif; ?>
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Hours</th>
                    <th>Price</th>
                    <?php if($_SESSION['role'] == 1): ?>
                    <th>Action</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM courses";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) :
                    while($row = $result->fetch_assoc()) :?>
                        <tr>
                            <td><?php echo  $row["title"] ?></td>
                            <td><?php echo  $row["description"] ?></td>
                            <td><?php echo  $row["hours"] ?></td>
                            <td><?php echo  $row["price"] ?></td>
                            <?php if($_SESSION['role'] == 1): ?>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    <a href="edit_course.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="delete_course.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endwhile; ?>
                <?php endif ; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
