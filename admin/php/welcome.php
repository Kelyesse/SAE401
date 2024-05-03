   <h2>Message des utilisateurs</h2>
   <div class="table-responsive">
       <table class="table table-striped table-sm">
           <thead>
               <tr>
                   <th>Id</th>
                   <th>Nom</th>
                   <th>Sujet</th>
                   <th>Email</th>
                   <th>Message</th>
               </tr>
           </thead>
           <tbody>

               <?php
                $query = "SELECT * FROM contact";
                $queryrun = mysqli_query($db, $query);
                $count = 0;
                while ($data = mysqli_fetch_array($queryrun)) {
                ?>
               <tr>
                   <td>#<?= $count + 1 ?></td>
                   <td><?= $data['cname'] ?></td>
                   <td><?= $data['csubject'] ?></td>
                   <td><?= $data['cemail'] ?></td>
                   <td><?= $data['cmessage'] ?></td>
               </tr>
               <?php
                    $count++;
                }
                if ($count == 0) { ?>
               <td colspan="5" align="center"> Pour le moment il n'y a pas de messages ou de requête !</td>
               <?php }
                ?>

           </tbody>
       </table>
   </div>