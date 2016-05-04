<style type="text/css">
.lienoir{
    color: black;
}
</style>
<?php
$manager = new ManagerEleve($proges);
?>
 <div class="row">
        <div class="box col-md-12">
           
        
            <div class="box-inner">
           
                    <h3 class=" alert alert-info"><img src="images/cl.png" alt="totaux" />Liste de la <button class="btn btn-info" style="font-size:20px"><?php  echo $_GET['classe']; ?></button>
                        <a href="index.php?module=eleve&action=liste&classe=2 ans" class="lienoir btn btn-succes">2 ans</a></span>
                        <a href="index.php?module=eleve&action=liste&classe=3 ans" class="lienoir btn btn-succes">3 ans</a></span>
                        <a href="index.php?module=eleve&action=liste&classe=4 ans" class="lienoir btn btn-succes">4 ans</a></span>
                        <a href="index.php?module=eleve&action=liste&classe=5 ans" class="lienoir btn btn-succes">5 ans</a></span>
                        <a href="index.php?module=eleve&action=liste&classe=1e annee" class="lienoir btn btn-succes">1e ANNEE</a></span>
                        <a href="index.php?module=eleve&action=liste&classe=2e annee" class="lienoir btn btn-succes">2e ANNEE</a></span>
                        <a href="index.php?module=eleve&action=liste&classe=3e annee" class="lienoir btn btn-succes">3e ANNEE</a></span>
                        <a href="index.php?module=eleve&action=liste&classe=4e annee" class="lienoir btn btn-succes">4e ANNEE A</a></span>
                        <a href="index.php?module=eleve&action=liste&classe=5e annee" class="lienoir btn btn-succes">5e ANNEE</a></span>
                        <span></span>

                    </h3>
                <div class="box-content">

                    <table class="table table-striped table-bordered responsive success">
                        <thead>
                        <tr class="info">
							<th></th>
                            <th>MATRICULE</th>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>SEXE</th>
                            <th>N° PARENT</th>
                            <th>RESIDENCE</th>
                        </tr>
                        </thead>
                        <tbody>


<?php
//affichage des élèves par liste en fonction de leur classe
$listArray = $manager -> listeEleveParClasse($_GET['classe']) ;
foreach( $listArray AS $ind ){
            ?>
                        <tr style="font-size:19px;">
                            <td class="">
                         <?php echo $i++; ?>
                          </td>
							<td class="">
                         <?php echo $ind->matricule_e; ?>
                          </td>
                            <td>
                              <span class="center">
                               <?php echo $ind->nom_e; ?></td>
                              </span>
                            <td class="center"> <?php echo $ind->prenom_e; ?></td>
                            <td class="center">
                                <?php echo $ind->sexe_e; ?>
                            </td>
                          <td class="center">
                                <?php echo $ind->numero_e; ?>
                            </td>
                            <td class="center">
                         <?php echo $ind->residence_e; ?>
                          </td>
                        </tr>

<?php
}
?>


                         </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->


