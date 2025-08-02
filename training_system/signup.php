<?php
session_start();
require "db/db.php";

$successmessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'
    && !empty($_POST['Name'])
    && !empty($_POST['email'])
    && !empty($_POST['password'])){
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hpassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (user_name,email,password) values (?,?,?) ";
    $stmt =mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hpassword);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $successmessage = "Account Created Successfully";
        header("Location: login.php");
    }
}
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header bg-primary-subtle">
                    <h3>Sign Up</h3>
                </div>
                <div class="card-body">

                    <?php if($successmessage ): ?>

                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06l2.5 2.5a.75.75 0 0 0 1.08-.02l3.992-4.99a.75.75 0 0 0-.022-1.06z"/>
                            </symbol>
                        </svg>

                        <div class="alert alert-success d-flex align-items-center justify-content-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill"/>
                            </svg>
                            <div><?= $successmessage?></div>
                        </div>

                    <?php endif; ?>

                    <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" name="Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="Email" name="email" required>
                        </div>
                        <div class="col-md-12">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="password"  required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100 mb-2">Sign Up</button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Create Your Account!
                    Or Go Back <a href="login.php">Log In</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
