<nav class="navbar navbar-expand-lg navbar-light bg-primary-subtle">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Training System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="../students/students.php">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../courses/courses.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../enrollments/enrollments.php">Enrollments</a>
                </li>
            </ul>
        </div>

        <form class="d-flex align-items-center gap-3">
            <?php if($_SESSION['role'] == 1): ?>
            <label class="form-control btn btn-light text-primary">Admin</label>
            <?php else:?>
            <label class="form-control btn bg-light text-primary">Student</label>
            <?php endif;?>
            <a href="../logout.php" class="btn btn-outline-primary">Logout</a>
        </form>

    </div>
</nav>