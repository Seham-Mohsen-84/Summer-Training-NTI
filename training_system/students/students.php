<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
    <?php include_once "../public/navbar.php"; ?>
    <?php include_once "../db/db.php"; ?>
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex ">
        <h3>Student List</h3>
        <span><a class="btn btn-outline-primary" href="add_student.php">+Add Student</a></span>
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date_of_birth</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) :
                    while($row = $result->fetch_assoc()) :?>
                <tr>
                    <td><?php echo  $row["name"] ?></td>
                    <td><?php echo  $row["email"] ?></td>
                    <td><?php echo  $row["phone"] ?></td>
                    <td><?php echo  $row["date_of_birth"] ?></td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <a href="edit_student.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_student.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
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
