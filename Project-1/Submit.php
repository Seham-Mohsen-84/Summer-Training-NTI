<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Submission Form</title>
</head>
<body class="bg-success-subtle text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-6">
          <div class="card text-center shadow-lg">
            <div class="card-header text-black">
                <h3>Submission</h3>
            </div>
            <div class="card-body">
                <!-- SVG Icons -->
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06l2.5 2.5a.75.75 0 0 0 1.08-.02l3.992-4.99a.75.75 0 0 0-.022-1.06z"/>
                    </symbol>
                </svg>

                <div class="alert alert-success d-flex align-items-center justify-content-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill"/>
                    </svg>
                    <div>Welcome MR.Admin</div>
                </div>

                <a href="Sign-In.php" class="btn btn-outline-success w-100 mb-2">Logout</a>
                <a href="Product.php" class="btn btn-outline-success w-100 mb-2">Products</a>
                <a href="Sign-Up.php" class="btn btn-outline-success w-100 mb-2">Create Account</a>
            </div>

            <div class="card-footer text-muted">
                Have a nice day!
            </div>
          </div>
        </div>
    </div>
</div>

<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
