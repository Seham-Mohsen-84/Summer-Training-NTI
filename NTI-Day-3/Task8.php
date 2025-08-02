<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../NTI-Day-1/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-primary-subtle text-item">
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="row-md-6">

            <form action="" class="p-3 was-validated text-black">
                <h3>Students Form Registration</h3>
                <div class="mb-3">
                    <label class="form-label" >Full Name</label>
                    <input type="text" class="form-control is-valid" id="valid1" required placeholder="Type your name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control is-valid" id="valid2" required placeholder="Type your email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" class="form-control is-valid" id="valid3" required  placeholder="Type your age">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select class="form-control is-valid" id="valid4" required>
                        <option value="" disabled selected hidden>Choose gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Grade</label>
                    <input type="number" class="form-control is-valid" id="valid5" required placeholder="Type your grade">
                </div>

                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea type="tel" class="form-control is-valid" id="valid6" required placeholder="Type something"></textarea>
                </div>

                <div class="mb-3"> <button type="submit" class="btn btn-success btn-lg btn-dark w-100">Register</button></div>

                <div class="mb-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success btn-lg btn-dark w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Read More
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    $grade = 90;
                                    ?>

                                    <div class="modal-body">
                                        <?php if (!isset($grade)) : ?>
                                            <p>Nothing to view</p>

                                        <?php elseif ($grade >= 50) : ?>
                                            <div class="row-md-6">
                                                <table class="table table-dark table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Grade</th>
                                                        <th scope="col">Gpa</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>60</td>
                                                        <td>good</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>80</td>
                                                        <td>very good</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>90</td>
                                                        <td>Excellent</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        <?php else : ?>
                                            <p>You aren't successful</p>
                                        <?php endif; ?>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        <div/>
    <div/>
<div/>

<script src="../NTI-Day-1/js/bootstrap.bundle.js"></script>
</body>
</html>
