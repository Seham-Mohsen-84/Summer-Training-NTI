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
                    <form class="row g-3" method="post" action="Submit.php">
                        <div class="col-md-6">
                            <label for="Product-Name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="Product-Name" name="Product-Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="Description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="Description" name="Description" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Product Images</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <a href="#" class="btn btn-outline-success w-100 mb-2">Add Product</a>
                        <a href="Submit.php" class="btn btn-outline-success w-100 mb-2">Submission</a>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Add Your Products!
                </div>
            </div>

        </div>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
