<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-success-subtle text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class=col-md-6">
            <div class="card text-center">
                <div class="card-header">
                    <h3>Sign Up</h3>
                </div>
                <div class="card-body">
                    <form class="row g-3" method="post" action="">
                        <div class="col-md-6">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" name="Name" required>
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
                            <label for="formFile" class="form-label">Product Images</label>
                            <input class="form-control" type="file" id="formFile" name="formFile">
                        </div>
                        <button type="submit" class="btn btn-outline-success w-100 mb-2">Sign Up</button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                   Creat Your Account!
                </div>
            </div>

        </div>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
