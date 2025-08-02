<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Task6</title>
</head>
<body>

<?php
$grade = 66;
if(isset($grade)== null){
  echo "Enter your grade";
}
else if ($grade>=50){
  echo "You are success";
}
else if($grade<50) {
  echo "Yor aren't success";
}


?>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
