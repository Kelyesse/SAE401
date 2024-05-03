<?php
session_start();

require_once 'include/db.php';


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email']) and isset($_POST['password'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_acess = 2; 
    $sql = "INSERT INTO `user` (firstname, lastname, email, password, user_acess) VALUES ('$firstname', '$lastname', '$email', '$password', '$user_acess')";

    if ($conn->query($sql) === TRUE) {
        header('location: login.php?msg=register');
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['email']) and isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `user` WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['firstname'] . " " . $user['lastname'];
            $_SESSION['role'] = $user['user_acess'];

            if ($user['status'] == 'off') {
                header("location: login.php?msg=off");
                die();
            } elseif ($user['user_acess'] == 1) {

                header("location: admin/index.php");
                die();
            } elseif ($user['user_acess'] == 2) {
                header("location: index.php");
                die();
            }
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Email non trouvé";
    }
}



if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_id']);
    echo "Déconnexion réussie";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/styles/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">


    <!-- Montserrat style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Favicons
	================================================== -->
    <link rel="shortcut icon" type="image/png" href="assets/img/Elyesse.png">

</head>

<body>


    <?php

    if (isset($_GET['msg'])) {

        if ($_GET['msg'] == 'off') {
    ?>
    <div>
        Merci d'attendre validation de l'administrateur !
    </div>
    <?php
        }


        if ($_GET['msg'] == 'register') {
        ?>
    <div>
        Compte crée avec succès, merci d'attendre validation de l'administrateur !
    </div>
    <?php
        }

        if ($_GET['msg'] == 'logout') {
        ?>
    <div class="alert alert-success text-center" role="alert">
        Déconnexion réussie !
    </div>
    <?php
        }
        if ($_GET['msg'] == 'iuser') {
        ?>
    <div class="alert alert-danger text-center" role="alert">
        Mauvais Email/Password !
    </div>
    <?php
        }
    }
    ?>


    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="login.php" method="post">
                <h1>Se créer un compte</h1>

                <input type="text" name="firstname" placeholder="Prénom" />
                <input type="text" name="lastname" placeholder="Nom" />
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Mot de passe" />
                <button>S'inscrire</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" method="post">
                <h1>Connexion</h1>

                <input type="email" name="email" placeholder="Saisir votre email" />
                <input type="password" name="password" placeholder="Mot de passe" />

                <button>Se connecter</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>De retour !</h1>
                    <p>Pour rester connecter veuillez rentrer vos informations personnelles</p>
                    <button class="ghost" id="signIn">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1> Bienvenue !</h1>
                    <p>Entrer vos informations personnelles pour vous inscrire</p>
                    <button class="ghost" id="signUp">S'incrire</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>

</body>

</html>