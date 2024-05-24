<?php
session_start();
require_once __DIR__ . '/../../include/db.php';

// Vérifiez la connexion à la base de données
if ($db) {
    echo "Database is connected!";
} else {
    die("Something is wrong with the database connection!");
}

// Inscription d'un utilisateur
if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['adresse'], $_POST['ville'], $_POST['code_postal'], $_POST['statut'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $complement = isset($_POST['complement']) ? $_POST['complement'] : '';
    $statut = $_POST['statut'];

    $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, adresse, ville, code_postal, complement, type_utilisateur, statut) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'utilisateur', ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssssssss", $lastname, $firstname, $email, $password, $adresse, $ville, $code_postal, $complement, $statut);
    if ($stmt->execute()) {
        header('location: login.php?msg=register');
        exit;
    } else {
        echo "Erreur: " . $stmt->error;
    }
}

// Connexion d'un utilisateur
if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['prenom'] . " " . $user['nom'];
            $_SESSION['role'] = $user['type_utilisateur'];

            if ($user['statut'] == 'off') {
                header("location: login.php?msg=off");
                exit;
            } elseif ($user['type_utilisateur'] == 'admin') {
                header("location: admin/index.php");
                exit;
            } else {
                header("location: index.blade.php");
                exit;
            }
        } else {
            header("location: login.php?msg=iuser");
            exit;
        }
    } else {
        header("location: login.php?msg=iuser");
        exit;
    }
}

// Déconnexion d'un utilisateur
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_id']);
    header("location: login.php?msg=logout");
    exit;
}

mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/style/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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
        } elseif ($_GET['msg'] == 'register') {
        ?>
    <div>
        Compte créé avec succès, merci d'attendre validation de l'administrateur !
    </div>
    <?php
        } elseif ($_GET['msg'] == 'logout') {
        ?>
    <div class="alert alert-success text-center" role="alert">
        Déconnexion réussie !
    </div>
    <?php
        } elseif ($_GET['msg'] == 'iuser') {
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
                <input type="text" name="firstname" placeholder="Prénom" required />
                <input type="text" name="lastname" placeholder="Nom" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Mot de passe" required />
                <input type="text" name="adresse" placeholder="Adresse" required />
                <input type="text" name="ville" placeholder="Ville" required />
                <input type="text" name="code_postal" placeholder="Code postal" required />
                <input type="text" name="complement" placeholder="Complément" />
                <select name="statut" required>
                    <option value="utilisateur">Utilisateur</option>
                    <option value="admin">Admin</option>
                </select>
                <button>S'inscrire</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" method="post">
                <h1>Connexion</h1>
                <input type="email" name="email" placeholder="Saisir votre email" required />
                <input type="password" name="password" placeholder="Mot de passe" required />
                <button>Se connecter</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>De retour !</h1>
                    <p>Pour rester connecté veuillez rentrer vos informations personnelles</p>
                    <button class="ghost" id="signIn">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Bienvenue !</h1>
                    <p>Entrer vos informations personnelles pour vous inscrire</p>
                    <button class="ghost" id="signUp">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/login.js"></script>
</body>

</html>