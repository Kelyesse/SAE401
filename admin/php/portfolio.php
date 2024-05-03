 <h2>Edit Portfolio Section</h2>
 <?php
    if (isset($_GET['msg'])) {

        if ($_GET['msg'] == 'updated') {
    ?>
 <div class="alert alert-success text-center" role="alert">
     Projet ajouter avec succès !
 </div>
 <?php
        }
        if ($_GET['msg'] == 'error') {
        ?>
 <div class="alert alert-danger text-center" role="alert">
     Il y a un problème avec votre image, veuillez vérifier le type et la taille !
 </div>

 <?php
        }
    }
    ?>
 <form method="post" action="php/uportfolio.php" enctype="multipart/form-data">
     <div class="form-row">
         <div class="form-group col-md-6">
             <label>Projet Screenshot/Image (Minimum 600px X 600px, Maxsize 2mb)</label>
             <div class="custom-file">
                 <input type="file" name="projectpic" class="custom-file-input" id="profilepic">
                 <label class="custom-file-label" for="projectpic">Choisir image...</label>
             </div>
         </div>

         <div class="form-group col-md-6">
             <label>Deuxième Project Screenshot/Video (Minimum 600px X 600px, Maxsize 50mb)</label>
             <div class="custom-file">
                 <input type="file" name="projectpic2" class="custom-file-input" id="profilepic2">
                 <label class="custom-file-label" for="projectpic2">Choisir deuxième image ou video...</label>
             </div>
         </div>


         <div class="form-group col-md-6 mt-auto">
             <label for="name">Nom du projet</label>
             <input type="name" name="projectname" class="form-control" id="name" placeholder="SAE...">
         </div>

         <div class="form-group col-md-12">
             <label for="text">Description</label>
             <textarea name="project_desc" class="form-control" id="description"
                 placeholder="Saisir la description du projet"></textarea>
         </div>

         <!-- Faire pour les autres compétences -->

         <script>
         const categories = ['developper', 'comprendre', 'exprimer', 'concevoir', 'entreprendre'];

         // Récupération des éléments et des checkboxes pour chaque catégorie
         const elems = {};
         const checks = {};
         categories.forEach(category => {
             elems[category] = document.querySelectorAll(`.${category}`);
             checks[category] = document.querySelector(`#${category}`);
         });

         // Fonction pour masquer ou afficher les éléments en fonction de l'état de la checkbox
         function toggleDisplay() {
             categories.forEach(category => {
                 elems[category].forEach(element => {
                     if (checks[category].checked) {
                         element.removeAttribute("disabled");
                         element.style.display = "block";
                     } else {
                         element.setAttribute("disabled", true);
                         element.style.display = "none";
                     }
                 });
             });
         }

         // Initialisation : masquer tous les éléments
         categories.forEach(category => toggleDisplay());

         // Ajout des listeners pour chaque checkbox
         categories.forEach(category => {
             checks[category].addEventListener("click", () => toggleDisplay());
         });
         </script>





         <div class="form-group col-md-12">
             <label for="year">Année de BUT</label>
             <input type="number" name="create" id="year" min="2000" max="2030" required>
         </div>


         <div class="form-group col-md-12">
             <!-- <label for="type">Type : </label> -->
             <input type="radio" name="type" value="prog">
             <label for="type">Programmation</label>
             <input type="radio" name="type" value="info">
             <label for="type">Infographie</label>
             <input type="radio" name="type" value="photo">
             <label for="type">Photo</label>
             <input type="radio" name="type" value="video">
             <label for="type">Video</label>
             <input type="radio" name="type" value="projet">
             <label for="type">Gestion de projet</label>

         </div>




         <div class="form-group col-md-2 ml-auto">
             <input type="submit" name="addtoportfolio" class="btn btn-primary" value="Add To Portfolio">
         </div>



 </form>



 <!-- Edit traces -->

 <table class="table table-striped table-sm">
     <thead>
         <tr>
             <th>Id</th>
             <th>Project Image</th>
             <th>Project Name</th>
             <th>Project Description</th>
             <th>Compétence</th>
             <th>Immatriculation</th>
             <th>Nature</th>
             <th>Année BUT</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>
         <?php
            $query2 = "SELECT * FROM traces";
            $queryrun2 = mysqli_query($db, $query2);
            $count = 1;
            while ($data2 = mysqli_fetch_array($queryrun2)) {


            ?>
         <tr>
             <div class="modal fade" id="modal<?= $data2['id'] ?>" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h6 class="modal-title" id="exampleModalLabel">Edit Portfolio</h6>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form method="post" action="php/uportfolio.php" enctype="multipart/form-data">
                                 <input type="hidden" name="id" value="<?= $data2['id'] ?>">
                                 <div class="form-row">
                                     <div class="form-group col-md-12">
                                         <img src="assets/image/<?= $data2['projectpic'] ?>" class="oo img-thumbnail">
                                     </div>
                                     <div class="form-group col-md-6">
                                         <label>Project Screenshot/Image (Minimum 600px X 600px, Maxsize 2mb)</label>
                                         <div class="custom-file">
                                             <input type="file" name="projectpic" class="custom-file-input"
                                                 id="profilepic">
                                             <label class="custom-file-label" for="projectpic">Choisir image...</label>
                                         </div>
                                     </div>

                                     <!-- New image input -->
                                     <div class="form-group col-md-12">
                                         <img src="assets/image/<?= $data2['projectpic2'] ?>" class="oo img-thumbnail">
                                     </div>
                                     <div class="form-group col-md-6">
                                         <label>Deuxième Project Screenshot/Video (Minimum 600px X 600px, Maxsize
                                             50mb)</label>
                                         <div class="custom-file">
                                             <input type="file" name="projectpic2" class="custom-file-input"
                                                 id="profilepic2">
                                             <label class="custom-file-label" for="projectpic2">Choisir deuxième image
                                                 ou video...</label>
                                         </div>
                                     </div>

                                     <!-- End of new image input -->

                                     <div class="form-group col-md-6 mt-auto">
                                         <label for="name">Nom du projet</label>
                                         <input type="name" name="projectname" value="<?= $data2['projectname'] ?>"
                                             class="form-control" id="name" placeholder="SAE ###">
                                     </div>

                                     <div class="form-group col-md-6 mt-auto">
                                         <label for="name">Description</label>
                                         <textarea name="project_desc" id="name" cols="30" rows="10"
                                             value="<?= $data2['project_desc'] ?>" class="form-control"
                                             placeholder="Description du projet"></textarea>

                                     </div>



                                     <!-- FAIRE IMMATRICULATION ICI -->


                                     <div class="form-group col-md-12">
                                         <label for="text">Comprendre</label>
                                         <input type="radio" name="competence_id" id="comprendre_<?php echo $count; ?>"
                                             value="comprendre">
                                         <div class="form-group col-md-12 comprendre_<?php echo $count; ?>">
                                             <label for="text">AC 11.01</label>
                                             <input type="checkbox" name="ac1101" id="ac1101_<?php echo $count; ?>"
                                                 class="comprendre_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 comprendre_<?php echo $count; ?>">
                                             <label for="text">AC 11.02</label>
                                             <input type="checkbox" name="ac1102" id="ac1102_<?php echo $count; ?>"
                                                 class="comprendre_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 comprendre_<?php echo $count; ?>">
                                             <label for="text">AC 11.03</label>
                                             <input type="checkbox" name="ac1103" id="ac1103_<?php echo $count; ?>"
                                                 class="comprendre_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 comprendre_<?php echo $count; ?>">
                                             <label for="text">AC 11.04</label>
                                             <input type="checkbox" name="ac1104" id="ac1104_<?php echo $count; ?>"
                                                 class="comprendre_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 comprendre_<?php echo $count; ?>">
                                             <label for="text">AC 11.05</label>
                                             <input type="checkbox" name="ac1105" id="ac1105_<?php echo $count; ?>"
                                                 class="comprendre_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 comprendre_<?php echo $count; ?>">
                                             <label for="text">AC 11.06</label>
                                             <input type="checkbox" name="ac1106" id="ac1106_<?php echo $count; ?>"
                                                 class="comprendre_<?php echo $count; ?>">
                                         </div>
                                     </div>


                                     <div class="form-group col-md-12">
                                         <label for="text">Concevoir</label>
                                         <input type="radio" name="competence_id" id="concevoir_<?php echo $count; ?>"
                                             value="concevoir">
                                         <div class="form-group col-md-12 concevoir_<?php echo $count; ?>">
                                             <label for="text">AC 12.01</label>
                                             <input type="checkbox" name="ac1201" id="ac1201_<?php echo $count; ?>"
                                                 class="concevoir_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 concevoir_<?php echo $count; ?>">
                                             <label for="text">AC 12.02</label>
                                             <input type="checkbox" name="ac1202" id="ac1202_<?php echo $count; ?>"
                                                 class="concevoir_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 concevoir_<?php echo $count; ?>">
                                             <label for="text">AC 12.03</label>
                                             <input type="checkbox" name="ac1203" id="ac1203_<?php echo $count; ?>"
                                                 class="concevoir_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 concevoir_<?php echo $count; ?>">
                                             <label for="text">AC 12.04</label>
                                             <input type="checkbox" name="ac1204" id="ac1204_<?php echo $count; ?>"
                                                 class="concevoir_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 concevoir_<?php echo $count; ?>">
                                             <label for="text">AC 12.05</label>
                                             <input type="checkbox" name="ac1205" id="ac1205_<?php echo $count; ?>"
                                                 class="concevoir_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 concevoir_<?php echo $count; ?>">
                                             <label for="text">AC 12.06</label>
                                             <input type="checkbox" name="ac1206" id="ac1206_<?php echo $count; ?>"
                                                 class="concevoir_<?php echo $count; ?>">
                                         </div>
                                     </div>

                                     <div class="form-group col-md-12">
                                         <label for="text">Exprimer</label>
                                         <input type="radio" name="competence_id" id="exprimer_<?php echo $count; ?>"
                                             value="exprimer">
                                         <div class="form-group col-md-12 exprimer_<?php echo $count; ?>">
                                             <label for="text">AC 13.01</label>
                                             <input type="checkbox" name="ac1301" id="ac1301_<?php echo $count; ?>"
                                                 class="exprimer_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 exprimer_<?php echo $count; ?>">
                                             <label for="text">AC 13.02</label>
                                             <input type="checkbox" name="ac1302" id="ac1302_<?php echo $count; ?>"
                                                 class="exprimer_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 exprimer_<?php echo $count; ?>">
                                             <label for="text">AC 13.03</label>
                                             <input type="checkbox" name="ac1303" id="ac1303_<?php echo $count; ?>"
                                                 class="exprimer_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 exprimer_<?php echo $count; ?>">
                                             <label for="text">AC 13.04</label>
                                             <input type="checkbox" name="ac1304" id="ac1304_<?php echo $count; ?>"
                                                 class="exprimer_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 exprimer_<?php echo $count; ?>">
                                             <label for="text">AC 13.05</label>
                                             <input type="checkbox" name="ac1305" id="ac1305_<?php echo $count; ?>"
                                                 class="exprimer_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 exprimer_<?php echo $count; ?>">
                                             <label for="text">AC 13.06</label>
                                             <input type="checkbox" name="ac1306" id="ac1306_<?php echo $count; ?>"
                                                 class="exprimer_<?php echo $count; ?>">
                                         </div>
                                     </div>




                                     <div class="form-group col-md-12">
                                         <label for="text">Developper</label>
                                         <input type="radio" name="competence_id" id="developper_<?php echo $count; ?>"
                                             value="developper">
                                         <div class="form-group col-md-12 developper_<?php echo $count; ?>">
                                             <label for="text">AC 14.01</label>
                                             <input type="checkbox" name="ac1401" id="ac1401_<?php echo $count; ?>"
                                                 class="developper_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 developper_<?php echo $count; ?>">
                                             <label for="text">AC 14.02</label>
                                             <input type="checkbox" name="ac1402" id="ac1402_<?php echo $count; ?>"
                                                 class="developper_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 developper_<?php echo $count; ?>">
                                             <label for="text">AC 14.03</label>
                                             <input type="checkbox" name="ac1403" id="ac1403_<?php echo $count; ?>"
                                                 class="developper_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 developper_<?php echo $count; ?>">
                                             <label for="text">AC 14.04</label>
                                             <input type="checkbox" name="ac1404" id="ac1404_<?php echo $count; ?>"
                                                 class="developper_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 developper_<?php echo $count; ?>">
                                             <label for="text">AC 14.05</label>
                                             <input type="checkbox" name="ac1405" id="ac1405_<?php echo $count; ?>"
                                                 class="developper_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 developper_<?php echo $count; ?>">
                                             <label for="text">AC 14.06</label>
                                             <input type="checkbox" name="ac1406" id="ac1406_<?php echo $count; ?>"
                                                 class="developper_<?php echo $count; ?>">
                                         </div>

                                     </div>

                                     <div class="form-group col-md-12">
                                         <label for="text">Entreprendre</label>
                                         <input type="radio" name="competence_id"
                                             id="entreprendre_<?php echo $count; ?>" value="entreprendre">
                                         <div class="form-group col-md-12 entreprendre_<?php echo $count; ?>">
                                             <label for="text">AC 15.01</label>
                                             <input type="checkbox" name="ac1501" id="ac1501_<?php echo $count; ?>"
                                                 class="entreprendre_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 entreprendre_<?php echo $count; ?>">
                                             <label for="text">AC 15.02</label>
                                             <input type="checkbox" name="ac1502" id="ac1502_<?php echo $count; ?>"
                                                 class="entreprendre_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 entreprendre_<?php echo $count; ?>">
                                             <label for="text">AC 15.03</label>
                                             <input type="checkbox" name="ac1503" id="ac1503_<?php echo $count; ?>"
                                                 class="entreprendre_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 entreprendre_<?php echo $count; ?>">
                                             <label for="text">AC 15.04</label>
                                             <input type="checkbox" name="ac1504" id="ac1504_<?php echo $count; ?>"
                                                 class="entreprendre_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 entreprendre_<?php echo $count; ?>">
                                             <label for="text">AC 15.05</label>
                                             <input type="checkbox" name="ac1505" id="ac1505_<?php echo $count; ?>"
                                                 class="entreprendre_<?php echo $count; ?>">
                                         </div>
                                         <div class="form-group col-md-12 entreprendre_<?php echo $count; ?>">
                                             <label for="text">AC 15.06</label>
                                             <input type="checkbox" name="ac1506" id="ac1506_<?php echo $count; ?>"
                                                 class="entreprendre_<?php echo $count; ?>">
                                         </div>
                                     </div>


                                     <script>
                                     const categories_<?php echo $count; ?> = ['developper_<?php echo $count; ?>',
                                         'comprendre_<?php echo $count; ?>', 'exprimer_<?php echo $count; ?>',
                                         'concevoir_<?php echo $count; ?>',
                                         'entreprendre_<?php echo $count; ?>'
                                     ];

                                     // Récupération des éléments et des checkboxes pour chaque catégorie
                                     const elems_<?php echo $count; ?> = {};
                                     const checks_<?php echo $count; ?> = {};
                                     categories_<?php echo $count; ?>.forEach(category => {
                                         elems_<?php echo $count; ?>[category] = document.querySelectorAll(
                                             `.${category}`);

                                         checks_<?php echo $count; ?>[category] = document.querySelector(
                                             `#${category}`);
                                     });

                                     // Fonction pour masquer ou afficher les éléments en fonction de l'état de la checkbox
                                     function toggleDisplay_<?php echo $count; ?>() {
                                         categories_<?php echo $count; ?>.forEach(category => {
                                             elems_<?php echo $count; ?>[category].forEach(element => {
                                                 if (checks_<?php echo $count; ?>[category].checked) {
                                                     element.removeAttribute("disabled");
                                                     element.style.display = "block";
                                                 } else {
                                                     element.setAttribute("disabled", true);
                                                     element.style.display = "none";
                                                 }
                                             });
                                         });
                                     }

                                     // Initialisation : masquer tous les éléments
                                     categories_<?php echo $count; ?>.forEach(category =>
                                         toggleDisplay_<?php echo $count; ?>());

                                     // Ajout des listeners pour chaque checkbox
                                     categories_<?php echo $count; ?>.forEach(category => {
                                         checks_<?php echo $count; ?>[category].addEventListener("click", () =>
                                             toggleDisplay_<?php echo $count; ?>());
                                     });

                                     document.getElementById(
                                             "<?php echo $data2['competence_id']; ?>_<?php echo $count; ?>").checked =
                                         true;
                                     document.getElementById(
                                         "<?php echo $data2['competence_id']; ?>_<?php echo $count; ?>").click();

                                     <?php
                                                $query3 = "SELECT immat_id FROM immatriculation_trace WHERE " . $data2['id'] . "= trace_id";
                                                $queryrun3 = mysqli_query($db, $query3);
                                                while ($data3 = mysqli_fetch_array($queryrun3)) {
                                                    if (isset($data3)) {
                                                ?>
                                     console.log(document.getElementById(
                                         "<?php echo $data3['immat_id']; ?>_<?php echo $count; ?>"));
                                     document.getElementById("<?php echo $data3['immat_id']; ?>_<?php echo $count; ?>")
                                         .checked = true;
                                     <?php
                                                    }
                                                }
                                                ?>
                                     </script>


                                     <div class="form-group col-md-6 mt-auto">
                                         <label for="name">Année</label>
                                         <input type="number" name="creation" value="<?= $data2['creation'] ?>"
                                             class="form-control" id="name" placeholder="2022, 2023, 2024" min="2000"
                                             max="2030">
                                     </div>

                                     <div class="form-group col-md-12">
                                         <!-- <label for="type">Type : </label> -->
                                         <input type="radio" name="type" value="prog">
                                         <label for="type">Programmation</label>
                                         <input type="radio" name="type" value="info">
                                         <label for="type">Infographie</label>
                                         <input type="radio" name="type" value="photo">
                                         <label for="type">Photo</label>
                                         <input type="radio" name="type" value="video">
                                         <label for="type">Video</label>
                                         <input type="radio" name="type" value="projet">
                                         <label for="type">Gestion de projet</label>

                                     </div>

                                 </div>


                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary"
                                         data-dismiss="modal">Fermer</button>
                                     <input type="submit" class="btn btn-primary" name="pupdate" value="Update">

                             </form>
                         </div>
                     </div>
                 </div>
             </div>


         <tr>
             <td>#<?= $count ?></td>
             <td><img src="assets/image/<?= $data2['projectpic'] ?>" class="oo img-thumbnail"></td>

             <!-- New image display -->
             <td><img src="assets/image/<?= $data2['projectpic2'] ?>" class="oo img-thumbnail"></td>
             <!-- End of new image display -->

             <td><?= $data2['projectname'] ?></td>
             <td><?= $data2['project_desc'] ?></td>
             <td><?= $data2['competence_id'] ?></td>
             <td><?php
                        $query3 = "SELECT immat_id FROM immatriculation_trace WHERE " . $data2['id'] . "= trace_id";
                        $queryrun3 = mysqli_query($db, $query3);
                        while ($data3 = mysqli_fetch_array($queryrun3)) {
                            echo $data3['immat_id'] . '<br>';
                        }
                        ?></td>
             <td><?= $data2['type'] ?></td>
             <td><?php echo date("Y", strtotime($data2['creation'])); ?></td>
             <td>
                 <!-- <a href="#"> <button type="button" class="btn btn-success btn-sm">Visite</button></a> -->
                 <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                     data-target="#modal<?= $data2['id'] ?>">
                     Modifier
                 </button>
                 <a href="php/uportfolio.php?del=<?= $data2['id'] ?>">
                     <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                         data-target="#exampleModal">
                         Supprimer
                     </button>
                 </a>
             </td>
         </tr>


         <?php $count++;
            } ?>
     </tbody>
 </table>