<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == 0) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
</head>
<body class="bg-light text-black">

<?php include_once "../public/navbar.php"; ?>

<div class="container">
    <div class="row mt-5">
        <div class="col">
            <h3>Edit Student</h3>
            <div class="card text-center">
                <div class="card-body was-validated">
                    <form class="row g-3" id="editForm" >
                        <input type="hidden" id="id">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary w-100">Update Student</button>
                        </div>
                    </form>
                    <div id="message" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    const urlParams = new URLSearchParams(window.location.search);
    const studentId = urlParams.get('id');

    fetch(`api/get.php?id=${studentId}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const student = data.data;
                document.getElementById('id').value = student.id;
                document.getElementById('name').value = student.name;
                document.getElementById('email').value = student.email;
                document.getElementById('phone').value = student.phone;
                document.getElementById('dob').value = student.date_of_birth;
            } else {
                document.body.innerHTML = `<div class='alert alert-danger text-center mt-5'>${data.message}</div>`;
            }
        })
        .catch(err => {
            document.body.innerHTML = `<div class='alert alert-danger text-center mt-5'>Error: ${err.message}</div>`;
        });


    document.getElementById('editForm').addEventListener('submit', function (e) {
        e.preventDefault();

        fetch('api/put.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: this.id.value,
                name:  this.name.value,
                email:  this.email.value,
                phone:  this.phone.value,
                dob:  this.dob.value
            })
        })
            .then(response => response.json())
            .then(data => {
                const msg = document.getElementById('message');
                if (data.status === 'success') {
                    msg.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                } else {
                    msg.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                }
            })
            .catch(error => {
                document.getElementById('message').innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
            });
    });
</script>

<script src="../../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
