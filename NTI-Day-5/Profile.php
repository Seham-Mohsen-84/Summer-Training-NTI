<?php
(isset($_GET['name'])) ? $name = $_GET['name'] : $name = "";
(isset($_GET['email'])) ? $email = $_GET['email'] : $email = "";
(isset($_GET['city'])) ? $city = $_GET['city'] : $city = "";
(isset($_GET['age'])) ? $age = $_GET['age'] : $age = "";

?>


<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Profile</title>
</head>
<body class="bg-primary-subtle vh-100 d-flex justify-content-center align-items-center">

<div class="card text-center" style="width: 30rem;">
    <div class="card-body">
        <h5 class="card-title">User Profile</h5>
        <p class="card-text">
           <h2>Thank You</h2>
           <b>Name: <?php echo $name?></b><br>
           <b>Email: <?php echo $email?></b><br>
           <b>City: <?php echo $city?></b><br>
           <b>Age: <?php echo $age?></b><br>
        </p>
        <a href="Task3.php" class="btn btn-primary">Go Back</a>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
