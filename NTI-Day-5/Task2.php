<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Task2</title>
</head>
<body class="bg-primary-subtle text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row-md-6">
            <?php
              if ($_SERVER["HTTP_HOST"] == "127.0.0.1") {
                  header('Location: denied.php');
                  exit();
              }
              else{
                  echo '<div class="alert alert-success m-3">Access ok: Good Host.</div>';
              }

            ?>
        </div>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
