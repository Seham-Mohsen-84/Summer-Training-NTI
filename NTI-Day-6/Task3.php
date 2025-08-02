<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['name']) && isset($_GET['email']) && $_GET['name'] !== '' && $_GET['email'] !== '') {
        $_SESSION['users'][] = [
            'name' => $_GET['name'],
            'email' => $_GET['email']
        ];
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'remove_last') {
            array_pop($_SESSION['users']);
        } elseif ($_GET['action'] === 'clear') {
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['users'] = [];
        }
    }
}
?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="text-black">
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card p-4 shadow">
                <form method="get">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Full Name" name="name">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-success w-100">Save</button>
                    </div>
                </form>
                <form method="get" class="mt-2">
                    <div class="mb-3">
                        <button type="submit" name="action" value="remove_last" class="btn btn-outline-warning w-100">Remove last</button>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="action" value="clear" class="btn btn-outline-danger w-100">Clear Session</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($_SESSION['users'])): ?>
                    <?php foreach ($_SESSION['users'] as $user): ?>
                        <tr>
                            <td><?= ($user['name']) ?></td>
                            <td><?= ($user['email']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="text-center text-muted">No data yet</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
