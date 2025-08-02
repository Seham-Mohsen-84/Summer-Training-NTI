<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Task7</title>
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <?php

     for ($i=0; $i <=20 ; $i+=5) {
       echo $i . " ";
     }
     echo "<br>";
     for ($i=0; $i <=20 ; $i++) {
       echo ($i % 5 == 0)? $i." ":"";
     }
 ?>

    <script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
  </body>
</html>
