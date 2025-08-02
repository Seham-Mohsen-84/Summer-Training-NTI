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
    <title>Document</title>
    <?php include_once "../public/navbar.php"; ?>
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex">
        <div class="col">
            <h3>Add New Student</h3>
            <div class="card text-center">
                <div class="card-body was-validated">
                    <form class="row g-3" id="student-form" method="post">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control is-valid" id="name" name="name" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control is-valid" id="email" name="email" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control is-valid" id="phone" name="phone" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control is-valid" id="dob" name="dob" size="70" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100 mb-2" size="70">Add Student</button>
                    </form>
                    <div id="response" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../NTI-Day-1/js/bootstrap.bundle.js"></script>
<script>
    document.getElementById('student-form').addEventListener('submit', function(e) {
        e.preventDefault();

        fetch('api/post.php', {
            method: 'POST',
            body: JSON.stringify({
                name: this.name.value,
                email: this.email.value,
                phone: this.phone.value,
                dob: this.dob.value
            }),
            headers: { 'Content-Type': 'application/json' },
        })
            .then(response => response.json())
            .then(data => {
                console.log(data.status);
                console.log(data.message);
                const responseDiv = document.getElementById('response');
                if (data.status === 'success') {
                    responseDiv.innerHTML = `<div class='alert alert-success text-center'>${data.message}</div>`;
                    document.getElementById('student-form').reset();
                } else {
                    responseDiv.innerHTML = `<div class='alert alert-danger text-center'>${data.message}</div>`;
                }
            })
            .catch(error => {
                document.getElementById('response').innerHTML = `<div class='alert alert-danger text-center'>Something went wrong</div>`;
            });
    });
</script>
</body>
</html>
