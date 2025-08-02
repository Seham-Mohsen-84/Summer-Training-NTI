<?php
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$city = $_POST['city'] ?? '';
$age = $_POST['age'] ?? '';
$uploadError = "";
$image = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['upload'])) {
    $allowed = array("jpg", "jpeg", "png");
    $image = $_FILES['upload']['name'];
    $extract = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $mimeType = $_FILES["upload"]["type"];
    $tmp = $_FILES['upload']['tmp_name'];

    if (in_array($extract, $allowed)) {
        if (str_starts_with($mimeType, "image/")) {
            if ($_FILES["upload"]["size"] <= 3 * 1024 * 1024) {
                if (!is_dir('images')) {
                    mkdir('images');
                }
                move_uploaded_file($tmp, "images/" . $image);
            } else {
                $uploadError = "Upload too large (Max 3MB)";
            }
        } else {
            $uploadError = "Uploaded file is not a valid image";
        }
    } else {
        $uploadError = "Invalid file extension";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Profile2</title>
</head>
<body class="bg-primary-subtle vh-100 d-flex justify-content-center align-items-center">

<div class="card text-center" style="width: 30rem;">
    <div class="card-body">
        <h5 class="card-title">User Profile</h5>
        <h2>Thank You</h2>
        <p class="card-text">
            <b>Image:<br>
                <?php
                if ($uploadError) {
                    echo $uploadError;
                } elseif ($image) {
                    echo "<img src='images/$image' class='img-thumbnail rounded-circle m-3' alt='image'>";
                }
                ?></b><br><br>

            <b>Name:</b> <?php echo ($name); ?><br>
            <b>Email:</b> <?php echo ($email); ?><br>
            <b>City:</b> <?php echo ($city); ?><br>
            <b>Age:</b> <?php echo ($age); ?><br>
        </p>
        <a href="Task4.php" class="btn btn-primary">Go Back</a>
    </div>
</div>

<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
