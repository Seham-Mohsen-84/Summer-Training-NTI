<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Information</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success-subtle vh-100 d-flex justify-content-center align-items-center">

<div class="card p-4 shadow" style="width: 300px;">
    <h5 class="text-center mb-3">User Information</h5>
    <form action="profile.php" method="post">
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
        <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
</div>
</body>
</html>
