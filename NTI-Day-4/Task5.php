<?php
$array=[
    "monitor"=>2000,
    "chair"=>1500,
    "headset"=>400,
    "keyboard"=>200,
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Task5</title>
</head>
<body class="bg-dark-subtle text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row-md-6">
            <ol class="list-group list-group-numbered">
                <h1 class="text-black"><b>Product List</b></h1>
                <?php
                asort($array);
                foreach ($array as $key => $value):?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo $key?></div>
                    </div>
                    <span class="badge bg-primary rounded-pill"><?php echo $value?></span>
                </li>
                <?php endforeach;?>
            </ol>
        </div>
    </div>
</div>

<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
