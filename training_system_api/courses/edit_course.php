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
    <title>Edit Course</title>
</head>
<body class="bg-light text-black">

      <?php include_once "../public/navbar.php"; ?>

<div class="container">
    <div class="row mt-5 d-flex ">
        <div class="col">
            <h3>Edit Course</h3>
            <div class="card text-center">
                <div class="card-body was-validated">
                    <form class="row g-3" id="editForm">
                        <input type="hidden" id="id">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control is-valid" id="title" name="title" size="70" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control is-valid" id="description" name="description" size="70" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="hours" class="form-label">Hours</label>
                            <input type="number" class="form-control is-valid" id="hours" name="hours" size="70" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control is-valid" id="price" name="price" size="70" value="" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-outline-primary w-100 mb-2" size="70">Edit Courses</button>
                    </form>
                    <div id="message" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
      <script>

          const urlParams = new URLSearchParams(window.location.search);
          const courseId = urlParams.get('id');

          fetch(`api/get.php?id=${courseId}`)
              .then(response => response.json())
              .then(data => {
                  if (data.status === 'success') {
                      const course = data.data;
                      document.getElementById('id').value = course.id;
                      document.getElementById('title').value = course.title;
                      document.getElementById('description').value = course.description;
                      document.getElementById('hours').value = course.hours;
                      document.getElementById('price').value=course.price;

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
                      title:  this.title.value,
                      description:  this.description.value,
                      hours:  this.hours.value,
                      price:  this.price.value
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
