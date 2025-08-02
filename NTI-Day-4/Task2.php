<?php
$array=[
    [
        "name"=>"Laptop",
        "price"=>3000,
        "quantity"=>"1"
    ],
    [
        "name"=>"Personal computer",
        "price"=>9000,
        "quantity"=>"3"
    ],
    [
        "name"=>"phone",
        "price"=>99900,
        "quantity"=>"4"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Task2</title>
</head>
<body class="bg-dark-subtle text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row-md-6">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price(EGP)</th>
                    <th scope="col">Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($array as $value):
                    if ($value['price']>=7000) :?>
                    <tr>
                        <td><?php echo $value["name"]?></td>
                        <td><?php echo $value["price"]?></td>
                        <td><?php echo $value["quantity"]?></td>
                    </tr>

                <?php endif; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
