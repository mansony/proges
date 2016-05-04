<?php
$manager = new ManagerEleve($proges);

if(isset($_POST) AND isset($_SESSION['sauvegarde']) AND  $_POST == $_SESSION['sauvegarde'] )
{
    unset($_SESSION['sauvegarde'], $_POST['submit']);
}
?>
       <style type="text/css">

.panel.panel-green {
    border-color: #488C6C;
}
.panel {
    border: 0px  #E5E5E5;
    border-radius: 0px !important;
    box-shadow: none !important;
    margin-bottom: 20px;
background-color: #FFF;
}
.panel.panel-green > .panel-heading {
    color: #FFF;
    background: none repeat scroll 0% 0% #488C6C;
    border-color: #488C6C !important;
}
.panel > .panel-heading {
    font-size: 18px;
    padding: 7px 15px;
    border-top-right-radius: 0px !important;
    border-top-left-radius: 0px !important;
    border-color: #E5E5E5 !important;
}
.panel.panel-green > .panel-heading {
    color: #FFF;
    background: none repeat scroll 0% 0% #488C6C;
    border-color: #488C6C !important;
}

}

       </style>
<link href="styles/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<link href="styles/forme/assets/js/gritter/css/jquery.gritter.css" rel="stylesheet" />
<link href="styles/forme/assets/js/gritter/css/jquery.gritter0.css" rel="stylesheet" />
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
             
          		<div class="col-lg-9 col-lg-offset-2 ">



  <div class="panel panel-green">
                                            <div class="panel-heading" style="text-align:center;">
                                              ENREGISTREMENT D'UN ELEVE</div>

     <div class="panel-body pan">             
<form class="well" method="post" action="index.php?module=eleve&action=voir" enctype="multipart/form-data">
<div class="form-inline">
<div class="input-group has-warning has-feedback col-lg-5 col-lg-offset-1 " >
<span class="input-group-addon"> Nom </span>
<input type="text" class="form-control" name="nom_e"  required>
</div>
<div class="input-group has-warning has-feedback col-lg-5">
  <span class="input-group-addon ">Prenom </span>
  <input type="text" class="form-control" name="prenom_e" style="text-align:right"required>
</div>
</div><br/><br/>


<div class="form-inline">
<div class="input-group col-lg-5 col-lg-offset-1 has-warning has-feedback  ">
<span class="input-group-addon">Matricule</span>
<input type="text" name="matricule_e" class="form-control" id="idSuccess" >
</div>

<div class="input-group col-lg-5  has-warning has-feedback ">
<span class="input-group-addon"> Nationalité</span>


<select name="nation_e" class="form-control">
<option value="">choisissez</option>
<?php
$listArray = $manager -> tabpays() ;
foreach( $listArray AS $ind ){
echo '              
<option value="'.$ind.'">'.$ind.'</option>';
}
?>
</select>         
</div>
</div><br/><br/>


<div class="form-inline">
<div class="input-group  has-warning has-feedback col-lg-offset-1">
<input type="radio" class="form-control" name="sexe_e" value="F" required>

<span class="input-group-addon">FILLE</span>
</div>

<div class="input-group has-warning has-feedback  ">
  <input type="radio" class="form-control" name="sexe_e" value="M">
<span class="input-group-addon "> <i class="fa fa-male"></i> GARCON</span>
</div>

<div class="input-group has-warning has-feedback col-lg-5">
  <input type="file" name="photo_e"/>
  <span class="input-group-addon "><i class="fa fa-user"></i> Photo </span>
</div>
               
</div><br/><br/>



<div class="form-inline">
<div class="input-group col-lg-5 col-lg-offset-1 has-warning has-feedback  ">
<span class="input-group-addon">Classe</span>


<select name="classe_e" class="form-control">

<option value="">choisissez</option>
<?php
$listArray = $manager -> tabClasse() ;
foreach( $listArray AS $ind ){
echo '              
<option value="'.$ind.'">'.$ind.'</option>';
}
?>

</select>         

</div>

<div class="input-group col-lg-5  has-warning has-feedback ">
<span class="input-group-addon"><i class="fa fa-search "></i>Salle</span>
<select id="select" name="salle_e" class="form-control" >
  <option value="">choisissez</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
</select>
</div>
</div><br/><br/>

<div class="form-inline">
<div class="input-group col-lg-5 col-lg-offset-1 has-warning has-feedback  ">
<span class="input-group-addon">D. Naissance</span>
<input type="date" name="dnaiss_e"  class="form-control" id="idSuccess">
</div>

<div class="input-group col-lg-5  has-warning has-feedback ">
<span class="input-group-addon">L. Naissance</span>
<input type="text" name="lnaiss_e"  class="form-control" id="idSuccess" required>
</div>
</div><br/><br/>

<div class="form-inline">
<div class="input-group has-warning has-feedback col-lg-5 col-lg-offset-1">
<span class="input-group-addon">Statut</span>
<select id="select" name="statut_e" class="form-control" >
<option value="">choisissez</option>
<option value="Nouveau">Nouveau</option>
<option value="Ancien">Ancien</option>
</select>
</div>

<div class="input-group has-warning has-feedback col-lg-5">
  <span class="input-group-addon   ">Residence</span>
  <input type="text" class="form-control" name="residence_e"  style="text-align:right" required>

</div>
</div><br/><br/>

<div class="form-inline">
<div class="input-group has-warning has-feedback col-lg-5 col-lg-offset-1">
<span class="input-group-addon">Tuteure </span>
<input type="text" class="form-control" name="tuteure_e"   required>
</div>

<div class="input-group has-warning has-feedback col-lg-5 ">
  <span class="input-group-addon  ">Tel tuteure </span>
  <input type="number" class="form-control" name="numero_e"  style="text-align:right" required>

</div>
</div><br/><br/>

 

<button type="submit" name="submit" value="Envoyer" class="btn btn-warning btn-lg col-lg-offset-8 ">Inscription</button>
</form>
</div>
</div>
</div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->

 <script src="styles/forme/assets/js/jquery.js"></script>
    
    <script type="text/javascript" src="styles/forme/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="styles/forme/assets/js/gritter-conf.js"></script>

   <?php
  
if(isset($_POST['submit']))
{ 
  ?>
  <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
          title: 'Entrez le montant et Imprimer le reçu',
            // (string | mandatory) the text inside the notification
            text: '<form  method="post" action="index.php?module=eleve&action=inscription&elv=<?php echo $_POST['matricule_e'] ?>" ><input type="text" name="montant" placeholder"montant" class="form-control" id="idSuccess" ><button type="submit" class="btn btn-warning">Imprimer</button>',
            // (string | optional) the image to display on the left
            image: 'images/icon/29.png',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '20000',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
  </script>

  <?php
}
  ?>

  <script src="styles/dataTables/jquery.dataTables.js"></script>
    <script src="styles/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>

  <?php
if(isset($_POST['submit']))
{  
if(!empty($_FILES['photo_e']['size']))
       $photo = $_FILES['photo_e']['name'];
  else
      $photo = 'avatar.jpg';

				$rom = $_POST['dnaiss_e'];
                $pieces = explode("/", $rom);
                $date = $pieces[2]."-".$pieces[1]."-".$pieces[0]; 

$iden = new Eleve(array(
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
    'photo_e'=>$photo
    ));

$_SESSION['sauvegarde'] = $_POST;

$manager->add($iden);
                   
}
?>