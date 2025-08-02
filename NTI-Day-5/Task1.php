<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Task1</title>
</head>
<body class="bg-primary-subtle text-black">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row-md-6">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Key</th>
                    <th scope="col">Value</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>PHP_SElF</td>
                    <td><?= $_SERVER["PHP_SELF"];?></td>
                </tr>
                <tr>
                    <td>SERVER_NAME</td>
                    <td><?= $_SERVER["SERVER_NAME"];?></td>
                </tr>
                <tr>
                    <td>HTTP_HOST</td>
                    <td><?= $_SERVER["HTTP_HOST"];?></td>
                </tr>
                <tr>
                    <td>USER_AGENT</td>
                    <td><?= $_SERVER["HTTP_USER_AGENT"];?></td>
                </tr>
                <tr>
                    <td>REQUEST_METHOD</td>
                    <td><?= $_SERVER["REQUEST_METHOD"];?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>