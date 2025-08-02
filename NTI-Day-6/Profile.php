<?php
$name=$_GET['name']??" ";
$email=$_GET['email']??" ";
$city=$_GET['city']??" ";
$age=$_GET['age']??" ";
$cash=$_GET['cash'] ?? " ";

$tax = fn($value) => $value*.01;

$len=strlen($name);
$sub=substr($name,0,$len);

function cash($value){
    return $value;
}
?>


<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Profile</title>
</head>
<body class="bg-success-subtle vh-100 d-flex justify-content-center align-items-center">

<div class="card text-center" style="width: 30rem;">
    <div class="card-body">
        <h5 class="card-title">User Profile</h5>
        <p class="card-text">
        <h2>Thank You</h2>
        <b>Name: <?php echo strtoupper($name)?></b><br>
        <b>Email: <?php echo trim($email," ")?></b><br>
        <b>City: <?php echo strtoupper($city)?></b><br>
        <b>Age: <?php echo $age?></b><br>
        <b>Tax: <?php echo $tax($cash)?></b><br>
        <b>Cash: <?php echo cash($cash)?></b><br>
        </p>
        <a href="Task1-2.php" class="btn btn-success">Go Back</a>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
