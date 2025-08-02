<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Task3</title>
</head>
<body class="bg-success-subtle vh-100 d-flex justify-content-center align-items-center">
<div class="card p-4 shadow" style="width: 300px;">
    <h5 class="text-center mb-3">User Information</h5>
    <form action="Profile.php" method="get">
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Full Name" name="name">
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" placeholder="Age" name="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="City" name="city">
        </div>
        <div class="mb-3">
            <input type="Number" class="form-control" placeholder="Cash" name="cash">
        </div>
        <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
