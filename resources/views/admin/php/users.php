<?php
include('../include/db.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'add':

            // Insert user
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];

            $user_acess = $_POST['user_acess'];
            $status = $_POST['status'];

            $sql = "INSERT INTO user (firstname, lastname, email, user_acess, status) VALUES ('$firstname', '$lastname', '$email', '$user_acess', '$status')";
            mysqli_query($conn, $sql);
            break;


        case 'delete':
            // Delete user
            $id = $_POST['id'];
            $sql = "DELETE FROM user WHERE id = $id";
            mysqli_query($conn, $sql);
            break;

        case 'update':
            // Update user
            $id = $_POST['id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $user_acess = $_POST['user_acess'];
            $status = $_POST['status'];

            $sql = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', email = '$email', user_acess = '$user_acess', status = '$status' WHERE id = $id";
            mysqli_query($conn, $sql);
            break;
    }
}

?>

<script>
function showForm(id) {
    var form = document.getElementById('editForm' + id);
    form.style.display = 'block';
}
</script>

<div class="container">
    <h1>Gestion des utilisateurs</h1>


    <!-- Add user form -->
    <div class="add-user-form">
        <h2>Ajouter un utilisateur</h2>
        <form method="post">
            <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom" required>
            </div>
            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="user_acess">Accès</label>
                <select class="form-control" id="user_acess" name="user_acess">
                    <option value="1">Concepteur</option>
                    <option value="2">Évaluateur</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Statut</label>
                <select class="form-control" id="status" name="status">
                    <option value="off">Refuser/Attente</option>
                    <option value="on">Accepté</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ajouter l'utilisateur</button>
        </form>
    </div>

    <!-- ... -->

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <!-- Table headers -->

            <tbody>
                <?php
                $sql = "SELECT * FROM user";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Error: " . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td>#<?= $row['id'] ?></td>
                    <td><?= $row['firstname'] ?></td>
                    <td><?= $row['lastname'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <?php

                            if ($row['user_acess'] == 1) {
                                echo 'Concepteur';
                            } elseif ($row['user_acess'] == 2) {
                                echo 'Évaluateur';
                            }
                            ?>
                    </td>
                    <td>
                        <?php

                            if ($row['status'] == "off") {
                                echo 'off';
                            } elseif ($row['status'] == "on") {
                                echo 'on';
                            }


                            ?>
                    </td>
                    <td>
                        <button onclick="showForm(<?= $row['id'] ?>)" class="btn btn-warning btn-sm">Modifier</button>
                        <form style="display: inline;" method="post">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <tr id="editForm<?= $row['id'] ?>" style="display: none;">
                    <td colspan="6">
                        <form method="post">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="text" name="firstname" value="<?= $row['firstname'] ?>" placeholder="Prénom"
                                required>
                            <input type="text" name="lastname" value="<?= $row['lastname'] ?>" placeholder="Nom"
                                required>
                            <input type="email" name="email" value="<?= $row['email'] ?>" placeholder="Email" required>
                            <select name="user_acess">
                                <option value="1">Concepteur</option>
                                <option value="2" <?php
                                                        if ($row['user_acess'] == 2) {
                                                            echo 'selected';
                                                        }
                                                        ?>>Évaluateur</option>
                            </select>
                            <select name="status">
                                <option value="off" <?php
                                                        if ($row['status'] == "off") {
                                                            echo 'selected';
                                                        }


                                                        ?>>Refuser/Attente</option>
                                <option value="on">Accepté</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Mettre à jour l'utilisateur</button>
                        </form>
                    </td>
                </tr>
                <?php
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</div>