<?php
$manager = new ManagerPersonnel($proges);

if(isset($_POST) AND isset($_SESSION['sauvegarde']) AND  $_POST == $_SESSION['sauvegarde'] )
{
    unset($_SESSION['sauvegarde'], $_POST['submit']);
}

if(isset($_GET['submit']))
{
$q = $proges->query('DELETE FROM personnel WHERE id_p = "'.$_GET['submit'].'" ');  
}

if(isset($_POST['submit']))
{
                $rom = $_POST['dnaiss_p'];
                $pieces = explode("/", $rom);
                $date = $pieces[2]."-".$pieces[1]."-".$pieces[0]; 

$iden = new Personnel(array(
    'id_p'=>$_POST['id_p'],
   'nom_p'=>$_POST['nom_p'],
    'prenom_p'=>$_POST['prenom_p'],
    'matricule_p'=>$_POST['matricule_p'],
    'sexe_p'=>$_POST['sexe_p'],
    'poste_p'=>$_POST['poste_p'],
    'dnaiss_p'=>$date,
    'lnaiss_p'=>$_POST['lnaiss_p'],
    'nation_p'=>$_POST['nation_p'],
    'residence_p'=>$_POST['residence_p'],
    'numero_p'=>$_POST['numero_p'],
    'photo_p'=>$_FILES['photo_p']['name'] 
    ));

$_SESSION['sauvegarde'] = $_POST;

$connexion = new ManagerPersonnel($proges);
$connexion->edit($iden);
                  
} 

?>





 <div class="row">
        <div class="box col-md-12 ">
            <div class="box-inner">
                 <div class="alert bg-warning text-white">
                    <h3> <img src="images/personel.png" alt="totaux" />  LISTE DU PERSONNEL</h3>

                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>

                            <th>photo</th>
                            <th>nom</th>
                            <th>prenom</th>
                            <th>Poste</th>
                            <th>Matricule</th>
                            <th>Numero</th>
                            <th>Sexe</th>
                            <th>Residence</th>
                            <th>Nationalité</th>
                            <th>Date de naissance</th>
                            <th>Lieu de naissance</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php

$listArray = $manager->listePersonnel();
foreach( $listArray AS $ind ){
						?>
                        <tr>
                             <td class="center"> <img src="avatars/<?php echo $ind->photo_p; ?>" width="100" height="100" /></td>
                            <td><?php echo $ind->nom_p; ?></td>
                            <td class="center"> <?php echo $ind->prenom_p; ?></td>
                            <td class="center"><?php echo $ind->poste_p; ?></td>
                            <td class="center"><?php echo $ind->matricule_p; ?></td>
                            <td class="center"><?php echo $ind->numero_p; ?></td>
                            <td class="center"><?php echo $ind->sexe_p; ?></td>
                            <td class="center"><?php echo $ind->residence_p; ?></td>
                            <td class="center"><?php echo $ind->nation_p; ?></td>
                            <td class="center"><?php echo $ind->dnaiss_p; ?></td>
                            <td class="center"><?php echo $ind->lnaiss_p; ?></td>
                            <td class="center">
                                 <?php
         //   echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m'.$ind->id_p.'Modal">modifier</button> ';
                              if(verif_auth(2))
                             {
            echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#s'.$ind->id_p.'Modal">supp</button> ';
                            }
                            ?>
                            </td>
                        </tr>


        


<!-- Fenêtre modal de suppression d'un personnel -->          
 <?php  echo '<div class="modal fade" id="s'.$ind->id_p.'Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> '; ?>
              <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Etes-vous sur de vouloir renvoyer ce personnel</h4>
                  </div>
                  <div class="modal-body">        
                    <div class="row">
                        <div class="col-lg-10">
                         <div class="well">
<?php  echo '  <a type="button" href="index.php?module=personnel&action=view&submit='.$ind->id_p.'" class="btn btn-danger">SUPPRIMER</a>';?> 
<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                         </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>





<!-- Formulaire de modification du profil d'un personnel en fenetre modal -->
            <?php  echo '<div class="modal fade" id="m'.$ind->id_p.'Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> '; ?>
              <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modification du profil</h4>
                  </div>
                  <div class="modal-body">        
                    <div class="row">
                        <div class="col-lg-12">

 <div class="panel panel-green">

     <div class="panel-body pan"> 

<form class="" method="post" action="index.php?module=personnel&action=view" enctype="multipart/form-data">
<div class="form-inline">
  <?php  echo '<input type="hidden" name="id_p" value="'.$ind->id_p.'"> '; ?>
<div class="input-group has-warning has-feedback col-lg-6 " >
<span class="input-group-addon">Nom </span>
<?php  echo '<input type="text" class="form-control" name="nom_p" value="'.$ind->nom_p.'" placeholder="'.$ind->nom_p.'" required> '; ?>
</div>

<div class="input-group has-warning has-feedback col-lg-6">
  <span class="input-group-addon "> Prenom </span>
 <?php  echo ' <input type="text" class="form-control" name="prenom_p" value="'.$ind->prenom_p.'" placeholder="'.$ind->prenom_p.'" style="text-align:right" required> '; ?>

</div>
</div><br/><br/>


<div class="form-inline">
<div class="input-group col-lg-6 has-warning has-feedback  ">
<span class="input-group-addon">Matricule</span>
<?php  echo ' <input type="text" name="matricule_p" value="'.$ind->matricule_p.'" placeholder="'.$ind->matricule_p.'" class="form-control" id="idSuccess"> '; ?>
</div>

<div class="input-group col-lg-6 has-warning has-feedback ">
<span class="input-group-addon"><i class="fa fa-lag-alt "></i> Nationalité</span>

<select name="nation_p" class="form-control">
<?php
$manager = new ManagerPersonnel($proges);
$listArray = $manager -> tabpays() ;
foreach( $listArray AS $ind ){
echo '              
<option value="'.$ind.'">'.strtoupper($ind).'</option>';
}
?>
</select>        

</div>
</div><br/><br/>

<div class="form-inline">
<div class="input-group  has-warning has-feedback ">
<input type="radio" class="form-control" name="sexe_p" value="fille" required>

<span class="input-group-addon"><i class="fa fa-female"></i> FILLE</span>
</div>

<div class="input-group has-warning has-feedback  ">
  <input type="radio" class="form-control" name="sexe_p" value="garcon">
<span class="input-group-addon "> <i class="fa fa-male"></i> GARCON</span>
</div>

<div class="input-group has-warning has-feedback col-lg-4">
<?php  echo ' <input type="file" name="photo_p" value="'.$ind->photo_p.'" /> '; ?>
  <span class="input-group-addon "><i class="fa fa-user"></i> Photo </span>
</div>
                    
</div><br/><br/>

<div class="form-inline">
<div class="input-group col-lg-6 has-warning has-feedback  ">
<span class="input-group-addon"><i class="fa fa-calendar"></i>D.Naiss</span>
<?php  echo ' <input type="date" name="dnaiss_p" value="'.$ind->dnaiss_p.'" placeholder="'.$ind->dnaiss_p.'" class="form-control" id="idSuccess"> '; ?>
</div>

<div class="input-group col-lg-6  has-warning has-feedback ">
<span class="input-group-addon"><i class="fa fa-fighter-jetLieu"></i>L.Naiss</span>
<?php  echo ' <input type="text" name="lnaiss_p" value="'.$ind->lnaiss_p.'" placeholder="'.$ind->lnaiss_p.'" class="form-control" id="idSuccess"> '; ?>
</div>
</div><br/><br/>

<div class="form-inline">

<div class="input-group has-warning has-feedback col-lg-6 ">
  <span class="input-group-addon   ">Residence</span>
<?php  echo '<input type="text" class="form-control" name="residence_p" value="'.$ind->residence_p.'" placeholder="'.$ind->residence_p.'" style="text-align:right"> '; ?>
</div>

<div class="input-group has-warning has-feedback col-lg-6 ">
  <span class="input-group-addon  "><i class="fa fa-phone"></i>Tel </span>
 <?php  echo '  <input type="text" class="form-control" name="numero_p" value="'.$ind->numero_p.'" placeholder="'.$ind->numero_p.'" style="text-align:right"> '; ?>
</div>
</div><br/><br/>

<div class="input-group has-warning has-feedback col-lg-6">
  <span class="input-group-addon   "><i class="fa fa-home"></i> Fonction</span>
 <?php  echo '  <input type="text" class="form-control" name="poste_p" value="'.$ind->poste_p.'" placeholder="'.$ind->poste_p.'" style="text-align:right"> '; ?>

</div>

<button type="submit" name="submit" value="Envoyer" class="btn btn-warning btn-lg col-lg-offset-8 "><i class="fa fa-check"></i> ENREGISTREZ</button>
</form>
</div>
</div>

      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!--/fin du formulaire-->


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

