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
    <title>Student List</title>
    <?php include_once "../public/navbar.php"; ?>
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex">
        <h3>Student List</h3>
        <?php if($_SESSION['role'] == 1): ?>
            <span><a class="btn btn-outline-primary" href="add_student.php">+Add Student</a></span>
        <?php endif; ?>
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date_of_birth</th>
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
                        <td>${item.email}</td>
                        <td>${item.phone}</td>
                        <td>${item.date_of_birth}</td>
                        <?php if($_SESSION['role'] == 1): ?>
                        <td>
                            <div class="d-grid gap-2 d-md-block">
                                <a href="edit_student.php?id=${item.id}" class="btn btn-warning">Edit</a>
                                <a href="delete_student.php?id=${item.id}" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                        <?php endif; ?>
                    </tr>
                `;
                });
            } else {
                container.innerHTML = `<tr><td colspan="5" class="text-center text-muted">No Students Found</td></tr>`;
            }
        })
        .catch(error => console.log("Error fetching students:", error));
</script>
</body>
</html>
