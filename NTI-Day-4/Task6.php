<?php
$students=[
    "Ahmed"=>85,
    "Salma"=>92,
    "Youssef"=>48,
    "Nour"=>77,
    "Omar"=>60
];

$passed=array_filter($students,function($grades){return $grades>=50;});
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
                <h1 class="text-black"><b>Passed students are : </b></h1>
                <?php
                foreach ($passed as $key => $grades) :?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?php echo $key?></div>
                        </div>
                        <span class="badge bg-primary rounded-pill"><?php echo $grades?></span>
                    </li>
                <?php endforeach;?>
            </ol>
        </div>

        <div class="row-md-6">
            <h1 class="text-black"><b>Passed students are : </b></h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Grade</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($passed as $key => $grades) :?>
                        <tr>
                            <td><?php echo $key?></td>
                            <td><?php echo $grades?></td>
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
