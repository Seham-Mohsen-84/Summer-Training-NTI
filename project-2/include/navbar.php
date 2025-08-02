<?php include_once "header.php"; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link "  href="#">Upload Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#" >Image Log Table</a>
                    </li>
                </ul>
                <form class="d-flex align-items-center gap-3">
                    <span class="form-control border-0 bg-transparent">Welcome:)</span>
                    <a href="logout.php" class="btn btn-outline-success">Logout</a>
                </form>

            </div>
        </div>
    </nav>
<?php include_once "footer.php"; ?>