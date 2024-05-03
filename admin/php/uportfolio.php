<?php
include('../../include/db.php');
include('checkupload.php');

$id = $_POST['id'];
$query = "SELECT * FROM traces WHERE id='$id'";

$queryrun = mysqli_query($db, $query);
$data = mysqli_fetch_array($queryrun);

$target_dir = "assets/image/";

if (isset($_POST['pupdate'])) {
    $projectpic = $_FILES['projectpic']['name'];
    $projectpic2 = $_FILES['projectpic2']['name'];  // New image
    $pdone = "ok";  // Initialize $pdone to "ok" by default
    if ($projectpic == "") {
        $projectpic = $data['projectpic'];
    } else {
        $pdone = Upload('projectpic', $target_dir);
    }
    if ($projectpic2 == "") {  // If projectpic2 is empty, use the one in the database
        $projectpic2 = $data['projectpic2'];
    } else {
        $pdone2 = Upload('projectpic2', $target_dir);  // Upload projectpic2
    }

    $projectname = mysqli_real_escape_string($db, $_POST['projectname']);
    $project_desc = mysqli_real_escape_string($db, $_POST['project_desc']);
    $type = isset($_POST['type']) ? mysqli_real_escape_string($db, $_POST['type']) : '';  // Check if 'type' is set
    $creationYear = !empty($_POST['creation']) ? $_POST['creation'] : '2000';  // default year is 2000
    $create = mysqli_real_escape_string($db, $creationYear . "-01-01");
    $competence_id = mysqli_real_escape_string($db, $_POST['competence_id']);

    if ($pdone == "error" || $pdone2 == "error") {  // Add a condition for projectpic2
        header("location:../?edithome=true&msg=error");
    } else {
        $query = "UPDATE traces SET ";
        $query .= "projectpic='$projectpic',";
        $query .= "projectpic2='$projectpic2',";  // Add projectpic2 to the query
        $query .= "projectname='$projectname', ";
        $query .= "project_desc='$project_desc', ";
        $query .= "type='$type', ";
        $query .= "creation='$create', ";
        $query .= "competence_id='$competence_id' ";
        $query .= "WHERE id='$id'";

        echo $query;
        $queryrun = mysqli_query($db, $query);
        if ($queryrun) {
            foreach ($_POST as $key => $value) {
                if (strpos($key, "ac") !== false) {
                    // Verify if the relationship already exists in immatriculation_trace
                    $exists_query = "SELECT * FROM immatriculation_trace WHERE trace_id='$id' AND immat_id='$key'";
                    $exists_run = mysqli_query($db, $exists_query);
                    if (!mysqli_num_rows($exists_run)) {
                        // If the relationship doesn't exist yet, insert it
                        $insert_query = "INSERT INTO immatriculation_trace (trace_id,immat_id) VALUES ('$id', '$key')";
                        mysqli_query($db, $insert_query);
                    }
                }
            }
            header("location:../?edittraces=true&msg=updated");
        }
    }
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $query = "DELETE FROM traces WHERE id='$id'";
    echo $query;
    $queryrun = mysqli_query($db, $query);
    var_dump($queryrun);
    if ($queryrun) {
        header("location:../?edittraces=true#done");
    }
}

if (isset($_POST['addtoportfolio'])) {
    $pdone = "ok";
    $projectpic = $_FILES['projectpic']['name'];
    $projectpic2 = $_FILES['projectpic2']['name'];  // New image

    if ($projectpic == "") {
        // $projectpic = $data['projectpic'];
    } else {
        /* $pdone = Upload('projectpic', $target_dir);*/
        $pdone = "ok";
    }

    if ($projectpic2 == "") {  // If projectpic2 is empty, use the one in the database
        $projectpic2 = $data['projectpic2'];
    } else {
        $pdone2 = Upload('projectpic2', $target_dir);  // Upload projectpic2
    }

    $projectname = mysqli_real_escape_string($db, $_POST['projectname']);
    $project_desc = mysqli_real_escape_string($db, $_POST['project_desc']);
    $type = mysqli_real_escape_string($db, $_POST['type']);

    $create = mysqli_real_escape_string($db, $_POST['create'] . "-01-01");

    $competence_id = mysqli_real_escape_string($db, $_POST['competence_id']);

    if ($pdone == "error" || $pdone2 == "error") {  // Add a condition for projectpic2
        header("location:../?edittraces=true&msg=error");
    } else {

        //La première requête SQL est exécutée : "SELECT MAX(id) +1 as new_id FROM traces". Elle sélectionne la valeur maximale de l'ID dans la table traces et l'incrémente de 1. L'alias new_id est utilisé pour cette valeur.

        // La requête SQL est exécutée avec mysqli_query($db, $query) et le résultat est stocké dans $queryrun.

        // La condition if ($queryrun) vérifie si la requête a été exécutée avec succès (c'est-à-dire si $queryrun n'est pas false).

        // Si la requête a été exécutée avec succès, les résultats sont extraits de $queryrun à l'aide de mysqli_fetch_array($queryrun). Les résultats sont stockés dans le tableau $data.

        // La nouvelle ID est récupérée à partir de $data['new_id'] et stockée dans la variable $id.

        // Si la requête a échoué (c'est-à-dire si $queryrun est false), alors la variable $id est définie à 1.

        // Ensuite, une nouvelle requête SQL est construite pour insérer les données du nouveau projet dans la table traces. Les valeurs des colonnes sont récupérées à partir des variables précédemment définies ($id, $projectname, $projectpic, $projectpic2, $project_desc, $type, $create, $competence_id).

        // Enfin, echo $query affiche la requête SQL complète à des fins de débogage. Cela permet de vérifier la syntaxe de la requête et de s'assurer que les valeurs sont correctement incluses.

        $query = "SELECT MAX(id) +1 as new_id FROM traces";
        $queryrun = mysqli_query($db, $query);
        if ($queryrun) {
            $data = mysqli_fetch_array($queryrun);
            $id = ($data['new_id']);
        } else {
            $id = 1;
        }

        $query = "INSERT INTO traces (id, projectname,projectpic,projectpic2,project_desc,type,creation,competence_id) ";  // Add projectpic2 to the query
        $query .=  "VALUES ('$id','$projectname','$projectpic','$projectpic2','$project_desc','$type','$create','$competence_id')";  // Add projectpic2 to the values
        //echo $query;


        //Dans cette section du code, une nouvelle entrée est insérée dans la table traces de la base de données. Si cette opération est réussie (c'est-à-dire si mysqli_query() renvoie true), le script entre dans la condition if.

        // À l'intérieur de cette condition, il y a une boucle foreach qui parcourt tous les éléments de la superglobale $_POST. $_POST est un tableau associatif contenant toutes les données envoyées par le client via une requête HTTP POST, souvent utilisée pour soumettre des formulaires. Chaque élément du tableau est une paire clé-valeur où la clé est le nom du champ du formulaire et la valeur est la valeur que l'utilisateur a entrée ou sélectionnée pour ce champ.

        // Pour chaque paire clé-valeur de $_POST, la fonction strpos() est utilisée pour vérifier si la clé contient la chaîne de caractères "ac". strpos() renvoie la position de la première occurrence de la chaîne de caractères "ac" dans la clé, ou false si "ac" n'est pas trouvé.

        // Si "ac" est trouvé dans la clé (c'est-à-dire si strpos() ne renvoie pas false), alors une nouvelle entrée est insérée dans la table immatriculation_trace de la base de données. L'ID de cette nouvelle entrée est l'ID du projet qui vient d'être inséré dans la table traces ($id), et l'immat_id est la clé actuelle du tableau $_POST.

        // Cela suggère que pour chaque champ du formulaire dont le nom contient "ac", une nouvelle entrée est créée dans la table immatriculation_trace, associant l'ID de ce projet à la clé du champ du formulaire. Cela pourrait être utilisé, par exemple, pour créer des associations entre le projet et d'autres entités représentées dans la base de données.

        // Enfin, une fois que tous les champs appropriés de $_POST ont été traités de cette manière, l'utilisateur est redirigé vers une autre page avec la fonction header(), qui envoie une en-tête HTTP de redirection. Dans ce cas, l'utilisateur est renvoyé à la page d'édition avec un message indiquant que le projet a été mis à jour.

        $queryrun = mysqli_query($db, $query);
        if ($queryrun) {
            foreach ($_POST as $key => $value) {
                // strpos = 2 paramètre -> 
                if (strpos($key, "ac") !== false) {
                    // var_dump($key);
                    $query = "INSERT INTO immatriculation_trace (trace_id,immat_id) ";
                    $query .=  "VALUES ('$id', '$key')";

                    $queryrun = mysqli_query($db, $query);
                }
            }
            header("location:../?edittraces=true&msg=updated");
        }
    }
}