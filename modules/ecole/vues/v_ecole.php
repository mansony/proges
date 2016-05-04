<?php
$connexion = new ManagerEcole($proges);

  $data = $connexion->ficheEcole();


if(isset($_POST['submit']))
{
  $iden = new Ecole(array(
    'nom_ecole'=>$_POST['nom_ecole'],
    'nom_fondateur_ecole'=>$_POST['nom_fondateur_ecole'],
    'nom_directeur_ecole'=>$_POST['nom_directeur_ecole'],
    'contact_1_ecole'=>$_POST['contact_1_ecole'],
    'contact_2_ecole'=>$_POST['contact_2_ecole'],
    'localisation_ecole'=>$_POST['localisation_ecole'],
    'mdp_fondateur_ecole'=>$_POST['mdp_fondateur_ecole'],
    'mdp_adjoint_ecole'=>$_POST['mdp_adjoint_ecole'],
    'devise_ecole'=>$_POST['devise_ecole'],
    'logo_ecole'=>$_FILES['logo_ecole']['name'] 
    ));


$_SESSION['sauvegarde'] = $_POST;
$connexion->add($iden);                  
}

?>

<style>
.demo-download {
  background-color: #ebedef;
  height: 190px;
  margin: 0 auto 32px;
  padding: 40px 28px 30px 32px;
  text-align: center;
  width: 190px;
  border-radius: 50%;
}
.demo-download-text {
  font-size: 15px;
  padding: 20px 0;
  text-align: center;
}
.demo-download img {
  height: 104px;
  width: 82px;
}
</style>

<br />
<div class="row">
				<div class="col-lg-4">
					 <p class="text-muted text-center btn-block btn btn-primary btn-rect">LISTE DES ELEVES</p><br/>
            <?php 
              if(verif_auth(2))
               {
            ?>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal">Enregistrer les information de l'école</button>
            <?php 
                }
            ?>
  				</div>  



<!-- Modal modfication du profil-->
<?php  echo '<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> '; ?>
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

        <form  method="post" action="index.php?module=ecole&action=gestion" enctype="multipart/form-data">

        	   <div class="form-inline">
            <div class="input-group has-warning has-feedback col-lg-12 " >
                <span class="input-group-addon">Nom de l'école</span>
                <?php  echo '<input type="text" class="form-control" name="nom_ecole" required> '; ?>
            </div>
          </div><br/>

          <div class="form-inline">
          <div class="input-group has-warning has-feedback col-lg-12">
            <?php  echo ' <input type="text" class="form-control" name="nom_fondateur_ecole"  style="text-align:right" required> '; ?>
            <span class="input-group-addon "> Nom du fondateur de l'école </span>
          </div>
          </div><br/>

      <div class="form-inline">
        <div class="input-group col-lg-12 has-warning has-feedback  ">
        <span class="input-group-addon">Nom du directeur de l'école</span>
        <?php  echo ' <input type="text" name="nom_directeur_ecole" class="form-control" id="idSuccess"> '; ?>
      </div>
      </div><br/>

	<div class="form-inline">
		<div class="input-group col-lg-12 has-warning has-feedback  ">
		<span class="input-group-addon"><i class="fa "></i>Tel école 1:</span>
		<?php  echo ' <input type="text" name="contact_1_ecole" class="form-control" id="idSuccess"> '; ?>
	</div></div><br/>

	<div class="form-inline">
		<div class="input-group col-lg-12 has-warning has-feedback ">
			<?php  echo ' <input type="text" name="contact_2_ecole" class="form-control" id="idSuccess"> '; ?>
			<span class="input-group-addon"><i class="fa"></i>Tel école 2:</span>
		</div>
	</div><br/>

	<div class="form-inline">
		<div class="input-group has-warning has-feedback col-lg-12">
			<?php  echo '   <input type="text" class="form-control" name="localisation_ecole" style="text-align:right"required> '; ?>
			<span class="input-group-addon"> Situation géographique </span>
		</div>
	</div><br/>

	<div class="form-inline">
		<div class="input-group has-warning has-feedback col-lg-12">
			<span class="input-group-addon"><i class="fa fa-eye-open"></i> Mot de passe du Fondateur</span>
			<?php  echo '  <input type="password" class="form-control" name="mdp_fondateur_ecole" required> '; ?>
		</div>
	</div><br/>

	<div class="form-inline">
		<div class="input-group has-warning has-feedback col-lg-12">
 			<?php  echo '  <input type="password" class="form-control" name="mdp_adjoint_ecole" style="text-align:right"required> '; ?>
			<span class="input-group-addon  "><i class="fa fa-phone"></i>Mot de passe travailleur</span>
		</div>
	</div><br/>


	<div class="form-inline">
		<div class="input-group has-warning has-feedback col-lg-12">
			<span class="input-group-addon"><i class="fa fa-eye-open"></i> Devise de l'école</span>
			<?php  echo '  <input type="text" class="form-control" name="devise_ecole" required> '; ?>
		</div>
	</div><br/>

	<div class="form-inline">
                       <div class="input-group has-warning has-feedback col-lg-6">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="images/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new"><i class="fa fa-camera"></i>Logo de l'école</span><span class="fileupload-exists">Change</span><input type="file" name="logo_ecole"/></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>   
	</div><br/>

	<button type="submit" name="submit"  class="btn btn-warning btn-lg col-lg-offset-8 "><i class="fa fa-check"></i> ENREGISTREZ</button>
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




















<div class="col-lg-4">

	 <p class="text-muted text-center btn-block btn btn-primary btn-rect">LISTE DU PERSONNEL</p>
    <br /><form method="post" action="index.php?module=ecole&action=personnel">
<button class="btn text-muted text-center btn-success" type="submit">Lancer la mise en file</button>
</form>
</div> 

<div class="col-lg-4">

	 <p class="text-muted text-center btn-block btn btn-primary btn-rect">ETAT DE PAYEMENT DE SCOLARITES</p>
	 <br /><form method="post" action="index.php?module=ecole&action=scolarite">

<select name="classe_e">
	<option value="#">Choisir la classe</option>
 <?php 
 $query=$proges->query('SELECT nom_classe FROM classe');
    while( $donnees = $query ->fetch() ){
echo '<option value="'.$donnees['nom_classe'].'">'.$donnees['nom_classe'].'</option>';
    }
?>
</select> 
<select class="span2" name="salle_e">
<option value="#">Salle</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="E">E</option>
</select>
<select class="span2" name="mois">
<option value="#">Mois</option>
<option value="1">1er Mois</option>
<option value="2">2e Mois</option>
<option value="3">3e Mois</option>
<option value="4">4e Mois</option>
<option value="5">5e Mois</option>
<option value="6">6e Mois</option>
<option value="7">7e Mois</option>
<option value="8">8e Mois</option>
<option value="9">9e Mois</option>
<option value="10">10e Mois</option>
</select>


<button class="btn text-muted text-center btn-success" type="submit">OK</button>
</form>	 
	 
</div> 
				
</div>

<br /><br /><br /><br /><br /><br />

<div class="row">
<div class="col-lg-4">
 <?php 
	if(verif_auth(2))
    {
?>
	<p class="text-muted text-center btn-block btn btn-primary btn-rect">FICHE DES FINANCES</p><br />
	<form method="post" action="index.php?module=ecole&action=finance">
	  <button class="btn text-muted text-center btn-success" name="today" type="submit">Aujourd'hui</button>
    </form><br/>
	
	<form method="post" action="index.php?module=ecole&action=finance">
	</select> 
<select class="span2" name="jour">
<option value="0">Choisissez le jour</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select> 
<button class="btn text-muted text-center btn-success"  type="submit">voir</button>
	</form><br/>
	
	<form method="post" action="index.php?module=ecole&action=finance">
	<select class="span2" name="mois">
<option value="0">Mois</option>
<option value="9">Septembre</option>
<option value="10">Octobre</option>
<option value="11">Novembre</option>
<option value="12">Decembre</option>
<option value="1">Janvier</option>
<option value="2">Fevrier</option>
<option value="3">Mars</option>
<option value="4">Avril</option>
<option value="5">Mai</option>
<option value="6">Juin</option>
<option value="7">Juillet</option>
</select>   <button class="btn text-muted text-center btn-success"  type="submit">voir</button>
	</form>
 <?php 
	}
?>
  </div>  
  
  <div class="col-lg-4">
	<p class="text-muted text-center btn-block btn btn-primary btn-rect">RECU</p><br/>
	<form method="post" action="index.php?module=ecole&action=recu">
	  <button class="btn text-muted text-center btn-success" type="submit">IMPRIMER</button>
    </form>
  </div> 
 
<div class="row">
<div class="col-lg-4">
 <?php 
	if(verif_auth(2))
    {
?>
	<p class="text-muted text-center btn-block btn btn-primary btn-rect">SCOLARITE ET CANTINE</p><br />
	<form method="post" action="index.php?module=ecole&action=finance2">
	  <button class="btn text-muted text-center btn-info" name="today" type="submit">Aujourd'hui</button>
    </form><br/>
	
	<form method="post" action="index.php?module=ecole&action=finance2">
	</select> 
<select class="span2" name="jour">
<option value="0">Choisissez le jour</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select> 
<button class="btn text-muted text-center btn-info"  type="submit">voir</button>
	</form><br/>
	
	<form method="post" action="index.php?module=ecole&action=finance">
	<select class="span2" name="mois">
<option value="0">Mois</option>
<option value="9">Septembre</option>
<option value="10">Octobre</option>
<option value="11">Novembre</option>
<option value="12">Decembre</option>
<option value="1">Janvier</option>
<option value="2">Fevrier</option>
<option value="3">Mars</option>
<option value="4">Avril</option>
<option value="5">Mai</option>
<option value="6">Juin</option>
<option value="7">Juillet</option>
</select>   <button class="btn text-muted text-center btn-info"  type="submit">voir</button>
	</form>
 <?php 
	}
?>
  </div>  
  
				
</div>

<br />

