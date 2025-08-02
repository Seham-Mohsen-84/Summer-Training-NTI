<?php
session_start();
include_once "db/db.php";

$loginerror = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';


    $sql = "SELECT * FROM admin WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $fetch = mysqli_fetch_assoc($result);
    $num_rows = mysqli_num_rows($result);

    if ($fetch && $num_rows >=1) {
        if (password_verify($password, $fetch['password'])) {
            $_SESSION['role'] = $fetch['role'];
            $_SESSION['password'] = $password;
            $_SESSION['user'] = 1;
            header("Location: index.php");
            exit();
        } else {
            $loginerror = "Incorrect Password : ".$fetch['password'];
        }
    } else {
        $loginerror = "Incorrect Email";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Login Page</title>
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header bg-primary-subtle">
                    <h3>Sign In</h3>
                </div>
                <div class="card-body was-validated">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    <?php if(!empty($loginerror)):?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill"/>
                            </svg>
                            <div><?= $loginerror?></div>
                        </div>
                    <?php endif;?>
                    <form class="row g-3" method="post" action="">
                        <div class="col-md-6">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control is-valid" id="Email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control is-valid" id="Password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100 mb-2">Sign in</button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Doesn't have an account! <a href="signup.php" >Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
