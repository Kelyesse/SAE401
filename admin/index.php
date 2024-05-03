<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login/');
}

include('../include/db.php');

$query = "SELECT * FROM user";

$queryrun = mysqli_query($db, $query);

$data = mysqli_fetch_array($queryrun);

$query2 = "SELECT * FROM user WHERE id=" . $_SESSION["user_id"];

$queryrun2 = mysqli_query($db, $query2);

$data2 = mysqli_fetch_array($queryrun2);

?>
<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Admin Panel</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link href="assets/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Bonjour, <?= $_SESSION['username'] ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="php/logout.php">Deconnexion</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Paramètre/Édition</span>

                        </h6>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="?editmessage=true">
                                <span data-feather="home"></span>
                                Message reçu
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="?editabout=true">
                                <span data-feather="info"></span>
                                Compétences
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?editresume=true">
                                <span data-feather="briefcase"></span>
                                CV

                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="?edittraces=true">
                                <span data-feather="archive"></span>
                                Traces
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?edituser=true">
                                <span data-feather="user"></span>
                                Utilisateurs
                            </a>
                        </li>

                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Paramètre de compte</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="?editprofile=true">
                                <span data-feather="user"></span>
                                Modifier le profil
                            </a>
                        </li>
                    </ul>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">
                                <span data-feather="user"></span>
                                Revenir à l'accueil !
                            </a>
                        </li>
                    </ul>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="php/logout.php">
                                <span data-feather="log-out"></span>
                                Se déconnecter
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <?php
                if (isset($_GET['editabout'])) {
                    include('php/about.php');
                } else if (isset($_GET['editresume'])) {
                    include('php/resume.php');
                } else if (isset($_GET['editmessage'])) {
                    include('php/welcome.php');
                } else if (isset($_GET['edittraces'])) {
                    include('php/portfolio.php');
                } else if (isset($_GET['edituser'])) {
                    include('php/users.php');
                } else if (isset($_GET['edituserprofile']))
                    //{
                    include('php/users.php');
                //} else if (isset($_GET['editprofile']))
                //{ 
                ?>
                <h2>Edit Profile</h2>
                <?php
                if (isset($_GET['msg'])) {

                    if ($_GET['msg'] == 'updated') {
                ?>
                <div class="alert alert-success text-center" role="alert">
                    Modification validé !
                </div>
                <?php
                    }
                }
                ?>


                <form method="post">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="ptitle">Prénom</label>
                            <input type="text" name="firstname" value="<?= $data2['firstname'] ?>" class="form-control"
                                id="ptitle" placeholder="Elyesse">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ptitle">Nom</label>
                            <input type="text" name="lastname" value="<?= $data2['lastname'] ?>" class="form-control"
                                id="ptitle" placeholder="Kourdourli">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="psubtitle">Email ID</label>
                            <input type="text" name="email" value="<?= $data2['email'] ?>" class="form-control"
                                id="psubtitle" placeholder="admin@admin.com">
                        </div>
                    </div>
                    <input type="hidden" name="uprofile" class="btn btn-primary" value="Save Changes">
                    <input type="submit" name="edituserprofile" class="btn btn-primary" value="Save Changes">
                </form>
                <?php
                /*} else {
                    include('php/uprofile.php');
                }*/ ?>

            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
    window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="assets/dist/js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>