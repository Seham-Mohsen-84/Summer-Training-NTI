<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Product Page</title>
</head>
<body class="bg-success-subtle text-black">

<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header">
                    <h3>Products</h3>
                </div>
                <div class="card-body">
                    <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label for="Product-Name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="Product-Name" name="product_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="Description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="Description" name="description" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Product Images</label>
                            <input class="form-control" type="file" id="formFile" name="product_image" required>
                        </div>
                        <button type="submit" class="btn btn-outline-success w-100 mb-2">Add Product</button>
                        <a href="Submit.php" class="btn btn-outline-success w-100 mb-2">Submission</a>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Add Your Products!
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['product_image'])) {
        $productName = $_POST['product_name'];
        $description = $_POST['description'];
        $imageName = $_FILES['product_image']['name'];
        $imageTmp = $_FILES['product_image']['tmp_name'];
        $uploadDir = "uploads/";

        move_uploaded_file($imageTmp, $uploadDir.$imageName);
        ?>

        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $uploadDir.$imageName; ?>" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo ($productName); ?></h5>
                        <p class="card-text"><?php echo ($description); ?></p>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</div>

<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
