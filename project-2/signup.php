<?php include_once "include/header.php"; ?>
<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
    !empty($_POST['name']) &&
    !empty($_POST['email']) &&
    !empty($_POST['password']) &&
    isset($_FILES['formFile']) && $_FILES['formFile']['error'] === 0) {

    $newUser = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ];
    $_SESSION['users'][] = $newUser;
}
?>

<div class="card text-center">
    <div class="card-header">
        <h3>Sign Up</h3>
    </div>
    <div class="card-body">

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>

            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06l2.5 2.5a.75.75 0 0 0 1.08-.02l3.992-4.99a.75.75 0 0 0-.022-1.06z"/>
                </symbol>
            </svg>

            <div class="alert alert-success d-flex align-items-center justify-content-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill"/>
                </svg>
                <div>Account Created Successfully!</div>
            </div>

        <?php endif; ?>

        <form class="row g-3" method="post" action="" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name" name="name" required>
            </div>
            <div class="col-md-6">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password" required>
            </div>
            <div class="col-md-6">
                <label for="formFile" class="form-label">Profile Image</label>
                <input class="form-control" type="file" id="formFile" name="formFile" required>
            </div>
            <button type="submit" class="btn btn-outline-success w-100 mb-2">Sign Up</button>
        </form>
    </div>
    <div class="card-footer text-muted">
        Already have an account! <a href="login.php" id="login">Log In</a>

    </div>
</div>
<?php include_once "include/footer.php"; ?>
