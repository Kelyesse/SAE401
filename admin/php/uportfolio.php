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