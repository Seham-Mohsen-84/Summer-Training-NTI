<?php
$student=[
    [
        "Name"=>"Ahmed",
        "Course"=>"PHP",
        "Grade"=>75,
    ],
    [
        "Name"=>"Salma",
        "Course"=>"JS",
        "Grade"=>95,
    ],
    [
        "Name"=>"Youssef",
        "Course"=>"MySQL",
        "Grade"=>58,
    ],
    [
        "Name"=>"Laila",
        "Course"=>"Html",
        "Grade"=>88,
    ]
];?>

<!DOCTYPE html>
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
        <table class="table table-success table-striped">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Course</th>
                <th scope="col">Grade</th>
                <th scope="col">Statues</th>
                <th scope="col">Details</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($student as $key => $value) :?>
                <tr class="<?= ($value["Grade"] < 60) ? 'table-danger' : '' ?>">
                <td><?php echo $value["Name"]?></td>
                     <td><?php echo $value["Course"]?></td>
                     <td><?php echo $value["Grade"]?></td>
                     <td><?php echo($value["Grade"])>=60?"Passed":"Failed"; ?></td>
                     <td>
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-dark text-white" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $key?>">
                             View
                         </button>

                         <!-- Modal -->
                         <div class="modal fade" id="exampleModal<?php echo $key?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <b>Name: <?php echo $value["Name"];?></b><br>
                                         <b>Course: <?php echo $value["Course"];?></b><br>
                                         <b>Grade: <?php echo $value["Grade"];?></b><br>
                                         <b>Statues: <?php echo($value["Grade"])>=60?"Passed":"Failed"; ?></b>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </td>
                 </tr>
            <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
