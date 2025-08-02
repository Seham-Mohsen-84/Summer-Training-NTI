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
    <title>Enrollment List</title>
    <?php include_once "../public/navbar.php"; ?>
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex ">
        <h3>Enrollment List</h3>
        <?php if($_SESSION['role'] == 1): ?>
            <span><a class="btn btn-outline-primary" href="add_enrollment.php">+Add Enrollment</a></span>
        <?php endif; ?>
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Grade</th>
                    <th>Enrollment_date</th>
                    <?php if($_SESSION['role'] == 1): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody id="read">
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../../NTI-Day-1/js/bootstrap.bundle.js"></script>

<script>
    fetch('api/get.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('read');
            if (data.status === "success" && data.data.length > 0) {
                data.data.forEach(item => {
                    container.innerHTML += `
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.title}</td>
                        <td>${item.grade}</td>
                        <td>${item.enrollment_date}</td>
                        <?php if($_SESSION['role'] == 1): ?>
                        <td>
                            <div class="d-grid gap-2 d-md-block">
                                <a href="edit_enrollment.php?id=${item.id}" class="btn btn-warning">Edit</a>
                                <a href="delete_enrollment.php?id=${item.id}" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                        <?php endif; ?>
                    </tr>
                    `;
                });
            } else {
                container.innerHTML = `<tr><td colspan="5" class="text-center text-muted">No Enrollments Found</td></tr>`;
            }
        })
        .catch(error => console.log("Error fetching enrollments:", error));
</script>
</body>
</html>
