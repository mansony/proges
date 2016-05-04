<?php
$connexion = new ManagerSearch($proges);

$id = isset($_GET['id'])?$_GET['id']:'';


if(isset($_GET['exclu']))
{
  $connexion->exclusion($_GET['exclu']); 
}



  $data = $connexion->ficheEleve($id);
?>
  <div class="well row">
     <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
       <div class=" profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
          <?php 
                            echo ' 
                    <h2>'.$data['nom_e'].' '.$data['prenom_e'].'</h2>
                    
                    <h4>née le '.$data['dnaiss_e'].' à '.$data['lnaiss_e'].' originaire du: '.$data['nation_e'].',matricule: '.$data['matricule_e'].'<br/>
                    Classe de: '.$data['classe_e'].' '.$data['salle_e'].'<br/>
                    Résidence : '.$data['residence_e'].'.<br/>
                    Nom du tuteur:'.$data['tuteure_e'].'<br/>
                    Contact du tuteur : '.$data['numero_e'].'</h4>';
        ?> 
                </div>             
                <div class="col-xs-12 col-sm-2 text-center">
                    <figure>
                        <img src="avatars/<?php echo $data['photo_e']; ?>" alt="" width="100" height="100"  class="img-circle img-responsive">
                        <?php
             echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#1'.$data['id_e'].'Modal">Modif</button> ';
                     
            echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#2'.$data['id_e'].'Modal">supp</button> ';
              
                        ?>
                  </figure>
                </div>
            </div> 
          </div> <br/><br/><br/><br/><br/><br/><br/><br/><br/>



                    
                  
 
 <?php 
  $scolarite = $connexion->scolarite($id);
?>				
	 <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title " style="texte-align:center">Tableau des payements</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered" style="background-color:white">
                    <tr class=" success">
                      <th></th>
                      <th>1er mois</th>
                      <th>2e mois</th>
                      <th>3e mois</th>
                      <th>4e mois</th>
                      <th>5e mois</th>
                      <th>6e mois</th>
                      <th>7e mois</th>
                      <th>8e mois</th>
                      <th>9e mois</th>
                    </tr>
                    <tr>
                      <td>Scolarité</td>

                    <?php
                      for($i = 1; $i < 10; $i++)
                      {
                        if($scolarite['mois'] >= $i)
                          echo '<td><button type="button" class="btn btn-info" >Payé</button></td>';
                        else
                          echo '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#m1'.$id.'Modal">non Payé</button></td>';
                     ?>


             
<?php  echo '<div class="modal fade" id="m1'.$id.'Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> '; ?>
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3>Choisissez le montant</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                      <form  method="post" action="index.php?module=argent&action=scolarite&mois=<?php echo $i; ?>&elv=<?php echo $id; ?>" >
                        <input type="number" name="montant" placeholder="MONTANT">
                        <button type="submit" class="btn btn-warning">Facturer</button>
                      </form>
                  </div>
                <div class="modal-footer">                         
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>         
                    <?php
                      }
                    ?>
                    </tr>
          <?php
            $cantine = $connexion->cantine($id);
          ?> 
                    <tr>
                      <td>Cantine</td>
                     <?php
                      for($i = 1; $i < 10; $i++)
                      {
                         if($cantine['mois_c'] >= $i)
                            echo '<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#c1'.$id.'Modal">Payé</button></td>';
                         else
                            echo '<td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#c1'.$id.'Modal">non Payé</button></td>';
                     ?>


             
<?php  echo '<div class="modal fade" id="c1'.$id.'Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> '; ?>
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3>Choisissez le montant</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form  method="post" action="index.php?module=argent&action=cantine&mois=<?php echo $i; ?>&elv=<?php echo $id; ?>" >
                      <input type="number" name="montant" placeholder="MONTANT">
                      <button type="submit" class="btn btn-warning">Facturer</button>
                    </form>    
                  </div>
                <div class="modal-footer">                         
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div> 

                    <?php
                      }
                    ?>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
  </div><!-- /.box -->					
						

      
  
  
  
  
  

<!-- Modal modfication du profil-->
<?php  echo '<div class="modal fade" id="1'.$data['id_e'].'Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> '; ?>
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ENREGISTREMENT D'UN ELEVE</h4>
                  </div>
                  <div class="modal-body">
                       <div class="content-panel">
                          <div class="row">
                            <div class="col-lg-12">
                               <div class="panel-body pan">             

        <form  method="post" action="index.php?module=recherche&action=v_scolarite" enctype="multipart/form-data">
          <div class="form-inline">
            <?php  echo '<input type="hidden" name="id_e" value="'.$data['id_e'].'"> '; ?>
            <div class="input-group has-warning has-feedback col-lg-6 " >
                <span class="input-group-addon">Nom </span>
                <?php  echo '<input type="text" class="form-control" name="nom_e" value="'.$data['nom_e'].'" placeholder="'.$data['nom_e'].'" required> '; ?>
            </div>
          
          <div class="input-group has-warning has-feedback col-lg-5">
            <?php  echo ' <input type="text" class="form-control" name="prenom_e" value="'.$data['prenom_e'].'" placeholder="'.$data['prenom_e'].'" style="text-align:right" required> '; ?>
            <span class="input-group-addon "> Prenom </span>
          </div>
          </div><br/><br/>


      <div class="form-inline">
        <div class="input-group col-lg-5 has-warning has-feedback  ">
        <span class="input-group-addon">Matricule</span>
        <?php  echo ' <input type="text" name="matricule_e" value="'.$data['matricule_e'].'" placeholder="'.$data['matricule_e'].'" class="form-control" id="idSuccess"> '; ?>
      </div>

        <div class="input-group col-lg-6 has-warning has-feedback ">
        <span class="input-group-addon"><i class="fa fa-lag-alt "></i> Nationalité</span>
        <?php  echo ' <select name="nation_e" value="'.$data['nation_e'].'" class="form-control">'; ?>
         <?php 
            $requete=$proges->query('SELECT nom_pays FROM pays') ;
	           echo '<option value="'.$data['nation_e'].'">'.strtoupper($data['nation_e']).'</option>';
             while( $donnees = $requete ->fetch() ){
              echo '<option value="'.$donnees['nom_pays'].'">'.strtoupper($donnees['nom_pays']).'</option>';
            }
        ?>
        </select>         

        </div>
      </div><br/><br/>

<div class="form-inline">
<div class="input-group  has-warning has-feedback ">
<input type="radio" class="form-control" name="sexe_e" value="F" required>

<span class="input-group-addon"><i class="fa fa-female"></i> FILLE</span>
</div>

<div class="input-group has-warning has-feedback  ">
  <input type="radio" class="form-control" name="sexe_e" value="M">
<span class="input-group-addon "> <i class="fa fa-male"></i> GARCON</span>
</div>


                       <div class="input-group has-warning has-feedback col-lg-6">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="images/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new"><i class="fa fa-camera"></i> demi-carte photo</span><span class="fileupload-exists">Change</span><input type="file" name="photo_e"/></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    
</div><br/><br/>



<div class="form-inline">
<div class="input-group col-lg-6 has-warning has-feedback  ">
<span class="input-group-addon"><i class="fa fa-book "></i>Classe</span>

<select name="classe_e" class="form-control">

 <?php 
    $requete=$proges->query('SELECT nom_classe FROM classe') ;
	echo '<option value="'.$data['classe_e'].'">'.strtoupper($data['classe_e']).'</option>';
    while( $donnees = $requete ->fetch() ){
echo '<option value="'.$donnees['nom_classe'].'">'.strtoupper($donnees['nom_classe']).'</option>';
    }
?>

</select>         

</div>

<div class="input-group col-lg-5  has-warning has-feedback ">
<span class="input-group-addon"><i class="fa fa-search "></i>Salle</span>
<?php  echo '  <select id="select" name="salle_e" value="'.$data['salle_e'].'" class="form-control" >'; ?>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
</select>
</div>
</div><br/><br/>


<div class="form-inline">
<div class="input-group col-lg-6 has-warning has-feedback  ">
<span class="input-group-addon"><i class="fa fa-calendar"></i>D.Naiss</span>
<?php  echo ' <input type="date" name="dnaiss_e" value="'.$data['dnaiss_e'].'" placeholder="'.$data['dnaiss_e'].'" class="form-control" id="idSuccess"> '; ?>
</div>

<div class="input-group col-lg-5  has-warning has-feedback ">
<span class="input-group-addon"><i class="fa fa-fighter-jetLieu"></i>L.Naiss</span>
<?php  echo ' <input type="text" name="lnaiss_e" value="'.$data['lnaiss_e'].'" placeholder="'.$data['lnaiss_e'].'" class="form-control" id="idSuccess"> '; ?>
</div>
</div><br/><br/>

<div class="form-inline">
<div class="input-group has-warning has-feedback col-lg-5">
<span class="input-group-addon">Statut</span> 
<?php  echo ' <select id="select" name="statut_e" value="'.$data['statut_e'].'"  class="form-control" > '; ?>
<option value="Nouveau">Nouveau</option>
<option value="Ancien">Ancien</option>
</select>
</div>

<div class="input-group has-warning has-feedback col-lg-6">
<?php  echo '   <input type="text" class="form-control" name="residence_e" value="'.$data['residence_e'].'" placeholder="'.$data['residence_e'].'" style="text-align:right"required> '; ?>
<span class="input-group-addon   ">Residence</span>
</div>
</div><br/><br/>

<div class="form-inline">
<div class="input-group has-warning has-feedback col-lg-6 ">
<span class="input-group-addon"><i class="fa fa-eye-open"></i> Tuteure </span>
<?php  echo '  <input type="text" class="form-control" name="tuteure_e" value="'.$data['tuteure_e'].'" placeholder="'.$data['tuteure_e'].'" required> '; ?>
</div>

<div class="input-group has-warning has-feedback col-lg-5 ">
 <?php  echo '  <input type="text" class="form-control" name="numero_e" value="'.$data['numero_e'].'" placeholder="'.$data['numero_e'].'" style="text-align:right"required> '; ?>
<span class="input-group-addon  "><i class="fa fa-phone"></i>Tel </span>
</div>
</div><br/><br/>

 

<button type="submit" name="submit" value="Envoyer" class="btn btn-warning btn-lg col-lg-offset-8 "><i class="fa fa-check"></i> ENREGISTREZ</button>
</form>
</div>
</div>

                  </div>
                  </div>  
                </div>
               </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
                      
</div> <!-- Fin du modal de modification du profil --> 



<!-- Modal supression du profil-->
<?php  echo '<div class="modal fade" id="2'.$data['id_e'].'Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> '; ?>
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h1 class="modal-title" id="myModalLabel">Etes-vous sur que cet élève ne viens plus et vous voulez bien le supprimer</h1>
                  </div>
                 
                <div class="modal-footer">                         
<?php  echo '  <a type="button" href="index.php?module=recherche&action=v_scolarite&exclu='.$data['id_e'].'" class="btn btn-danger">SUPPRIMER</a></form> ';?> 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
               </div>
            </div> <!-- Fin du modal supression du profil --> 



      </div>  <!-- fermeture du row -->
    </div> 
  </div>
<br/>

</body>
     <!-- END BODY -->
</html>

<?php
  if(isset($_POST['submit']))
{
                $rom = $_POST['dnaiss_e'];
                $pieces = explode("/", $rom);
                $date = $pieces[2]."-".$pieces[1]."-".$pieces[0]; 

$iden = new Eleve(array(
    'id_e'=>$_POST['id_e'],
    'nom_e'=>$_POST['nom_e'],
    'prenom_e'=>$_POST['prenom_e'],
    'matricule_e'=>$_POST['matricule_e'],
    'sexe_e'=>$_POST['sexe_e'],
    'classe_e'=>$_POST['classe_e'],
    'salle_e'=>$_POST['salle_e'],
    'dnaiss_e'=>$date,
    'lnaiss_e'=>$_POST['lnaiss_e'],
    'nation_e'=>$_POST['nation_e'],
    'residence_e'=>$_POST['residence_e'],
    'tuteure_e'=>$_POST['tuteure_e'],
    'numero_e'=>$_POST['numero_e'],
    'statut_e'=>$_POST['statut_e'],
    'photo_e'=>$_FILES['photo_e']['name'] 
    ));

$_SESSION['sauvegarde'] = $_POST;
$connexion->edit($iden);                  
}
?>


