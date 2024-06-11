<?php
session_start();
include('../../include/db.php');

if (isset($_POST['uprofile'])) {
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $query = "UPDATE user SET ";
    $query .= "firstname='$firstname',";
    $query .= "lastname='$lastname',";

    $query .= "email='$email' WHERE id=" . $_SESSION["user_id"];
    echo $query;
    $queryrun = mysqli_query($db, $query);
    if ($queryrun) {
        $_SESSION['username'] = $name;
        header("location:../?editprofile=true&msg=updated");
    }
}