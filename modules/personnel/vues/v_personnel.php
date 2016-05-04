<?php
if(isset($_POST) AND isset($_SESSION['sauvegarde']) AND  $_POST == $_SESSION['sauvegarde'] )
{ 
    unset($_SESSION['sauvegarde'], $_POST['submit']);
}
?>



            <div class="row mt">
             
                <div class="col-lg-10 col-lg-offset-1 ">

  <div class="panel panel-green">

    <div class="fs1" aria-hidden="true" ></div>

 <div class="panel-heading" style="text-align:center;" data-icon="&#xe00f;"> ENREGISTREMENT D'UN PERSONNEL </div>

     <div class="panel-body pan">             
<form class="well" method="post" action="index.php?module=personnel&action=register" enctype="multipart/form-data">
<div class="form-inline">
<div class="input-group has-warning has-feedback col-lg-5 col-lg-offset-1 " >
<span class="input-group-addon">Nom </span>

<input type="text" class="form-control" name="nom_p" placeholder="belongo" required>
</div>
<div class="input-group has-warning has-feedback col-lg-5">

<span class="input-group-addon ">Prenom </span>  
<input type="text" class="form-control" name="prenom_p" placeholder="belongo" required>

</div>
</div><br/><br/>


<div class="form-inline">
<div class="input-group col-lg-5 col-lg-offset-1 has-warning has-feedback  ">
<span class="input-group-addon">Matricule</span>
<input type="text" name="matricule_p" placeholder="213" class="form-control" id="idSuccess">
</div>

<div class="input-group col-lg-5  has-warning has-feedback ">
<span class="input-group-addon"> Nationalité</span>


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
<div class="input-group has-warning has-feedback col-lg-offset-1">
<input type="radio" class="form-control" name="sexe_p" value="F"required>

<span class="input-group-addon"><i class="fa fa-female"></i> FEMME</span>
</div>

<div class="input-group has-warning has-feedback  ">
  <input type="radio" class="form-control" name="sexe_p" value="M">
<span class="input-group-addon "> <i class="fa fa-male"></i> HOMME</span>
</div>

<div class="input-group has-warning has-feedback col-lg-5">
  <input type="file" name="photo_p"/>
  <span class="input-group-addon "><i class="fa fa-user"></i> Photo </span>
</div>
                    
</div><br/><br/>


<div class="form-inline">
<div class="input-group col-lg-5 col-lg-offset-1 has-warning has-feedback  ">
<span class="input-group-addon">Date Naissance</span>
<input type="date" name="dnaiss_p" placeholder="21/10/2013" class="form-control" id="idSuccess">
</div>

<div class="input-group col-lg-5  has-warning has-feedback ">
<span class="input-group-addon">Lieu Naissance</span>
<input type="text" name="lnaiss_p" placeholder="libreville" class="form-control" id="idSuccess">
</div>
</div><br/><br/>

<div class="form-inline">
<div class="input-group has-warning has-feedback col-lg-5 col-lg-offset-1">
  <span class="input-group-addon   "> Residence</span>
  <input type="text" class="form-control" name="residence_p" placeholder="louis" style="text-align:right"required>

</div>

<div class="input-group has-warning has-feedback col-lg-5 ">
  <span class="input-group-addon  ">Tel </span>
  <input type="text" class="form-control" name="numero_p" placeholder="0X XX XX XX" style="text-align:right"required>

</div>
</div><br/><br/>

 
<div class="input-group has-warning has-feedback col-lg-5 col-lg-offset-1">
  <span class="input-group-addon   ">Fonction</span>
  <input type="text" class="form-control" name="poste_p" placeholder="enseignant" style="text-align:right"required>

</div>
<button type="submit" name="submit" value="Envoyer" class="btn btn-warning btn-lg col-lg-offset-8 "><i class="fa fa-check"></i> Enregistrer</button>
</form>
</div>
</div>
</div>

                </div><!-- col-lg-12--> 
    
    <script src="styles/assets/js/jquery.js"></script>
    
    <script type="text/javascript" src="styles/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="styles/assets/js/gritter-conf.js"></script>





  <?php
if(isset($_POST['submit']))
{
   if(!empty($_FILES['photo_p']['size'])) 
    $photo=$_FILES['photo_p']['name']; 
  else
      $photo = 'avatar.jpg';

                $rom = $_POST['dnaiss_p'];
                $pieces = explode("/", $rom);
                $date = $pieces[2]."-".$pieces[1]."-".$pieces[0]; 

  $iden = new Personnel(array(
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
    'photo_p'=>$photo
    ));

$_SESSION['sauvegarde'] = $_POST;
$connexion = new ManagerPersonnel($proges);
$connexion->add($iden);                
} 
?>

