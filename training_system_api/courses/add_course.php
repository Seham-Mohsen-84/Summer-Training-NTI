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
    <title>Add Course</title>
    <?php include_once "../public/navbar.php"; ?>
</head>
<body class="bg-light text-black">
<div class="container">
    <div class="row mt-5 d-flex ">
        <div class="col">
            <h3>Add New Course</h3>
            <div class="card text-center">
                <div class="card-body was-validated">
                    <form class="row g-3" id="course-form" method="post">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control is-valid" id="title" name="title" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control is-valid" id="description" name="description" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="hours" class="form-label">Hours</label>
                            <input type="number" class="form-control is-valid" id="hours" name="hours" size="70" required>
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control is-valid" id="price" name="price" size="70" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100 mb-2" size="70">Add Course</button>
                    </form>
                    <div id="response" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../NTI-Day-1/js/bootstrap.bundle.js"></script>
<script>
    document.getElementById('course-form').addEventListener('submit', function(e) {
        e.preventDefault();

        fetch('api/post.php', {
            method: 'POST',
            body: JSON.stringify({
                title: this.title.value,
                description: this.description.value,
                hours: this.hours.value,
                price: this.price.value
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
                    document.getElementById('course-form').reset();
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
