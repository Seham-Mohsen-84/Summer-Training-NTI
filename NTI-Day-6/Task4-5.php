<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-primary-subtle text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row-md-6">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
                $folder = '../NTI-Day-6/uploads/' . date('Y/m/d') . '/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }

                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $newfilename = uniqid() . '.' . $ext;
                $target = $folder . $newfilename;

                $allowed = ['jpg', 'jpeg', 'png', 'gif'];

                if (in_array(strtolower($ext), $allowed)) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                        echo "<div class='alert alert-success' role='alert'>Upload success!</div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Error moving file!</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>File type not allowed!</div>";
                }
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="file" required>
                    <button class="btn btn-outline-primary" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
