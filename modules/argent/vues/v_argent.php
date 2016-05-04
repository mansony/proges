   <?php
$connexion = new ManagerArgent($proges);
if(isset($_POST) AND isset($_SESSION['sauvegarde']) AND $_POST == $_SESSION['sauvegarde'] )
{ 
    unset($_SESSION['sauvegarde'], $_POST);
}

$connexion = new ManagerArgent($proges);

if(isset($_POST['rec']))
{ 
                $rom = $_POST['date_rec'];
                $pieces = explode("/", $rom);
                $date = $pieces[2]."-".$pieces[1]."-".$pieces[0];

if($_POST['montant_rec'] != 0)
    { 
$rec = new Argent(array(
    'date_rec'=>$date,
    'montant_rec'=>$_POST['montant_rec'],
    'intituler_rec'=>$_POST['intituler_rec']
    ));

$_SESSION['sauvegarde'] = $_POST;
$connexion->add_rec($rec); 

}
}


if(isset($_POST['dep']))
{ 

                $rom = $_POST['date_dep'];
                $pieces = explode("/", $rom);
                $date = $pieces[2]."-".$pieces[1]."-".$pieces[0];

	if($_POST['montant_dep'] != 0)
    { 
$dep = new Argent(array(
    'date_dep'=>$date,
    'montant_dep'=>$_POST['montant_dep'],
    'intituler_dep'=>$_POST['intituler_dep']
    ));  

$_SESSION['sauvegarde'] = $_POST;
$connexion->add_dep($dep);
	}
}

 if(isset($_GET['rec']))
    { 
        $connexion->calcul_bilan();
    }

  ?> 
 <style type="text/css">.panel {border: 0px  #E5E5E5;border-radius: 0px !important;box-shadow: none !important;margin-bottom: 20px;background-color: #FFF;}.panel.panel-green > .panel-heading {color: #FFF;background: none repeat scroll 0% 0% #488C6C;border-color: #488C6C !important;}.panel > .panel-heading {font-size: 18px;padding: 7px 15px;border-top-right-radius: 0px !important;border-top-left-radius: 0px !important;border-color: #E5E5E5 !important;}.panel.panel-green > .panel-heading {color: #FFF;background: none repeat scroll 0% 0% #488C6C;border-color: #488C6C !important;}.input-icon.right i {right: 20px;float: right;}.input-icon i { color: #999;display: block;position: absolute;margin: 10px 2px 4px 10px;width: 16px; height: 16px; font-size: 16px;text-align: center;}.note-success {border-color: #5CB85C;background: none repeat scroll 0% 0% #DFF0D8;}.note {margin: 0px 0px 20px;padding: 15px 30px 15px 15px;border-left: 3px solid #E5E5E5;border-radius: 0px !important;}.note-success {color: #5CB85C;}</style>  <link href="styles/dataTables/dataTables.bootstrap.css" rel="stylesheet" /><link href="styles/forme/assets/js/gritter/css/jquery.gritter.css" rel="stylesheet" /><link href="styles/forme/assets/js/gritter/css/jquery.gritter0.css" rel="stylesheet" /><br/><div class="row"><div class="col-lg-5 col-lg-offset-1">
                                <div class="panel panel-green">
                                            <div class="panel-heading li_banknote">
                                                Enregistrement des Recettes</div>
                                            <div class="panel-body pan">
                                                   <form action="index.php?module=argent&action=voir" method="post">
                                                <div class="form-body pal">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputName" class="control-label">
                                                                    Date</label>
                                                                <div class="input-icon right">
                                                                    <i class=" li_calendar "></i>
                                                                    <input type="date" id="inputName" name="date_rec" placeholder="jj/mm/aaaa" class="form-control" required></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputEmail" class="control-label">
                                                                    Montant</label>
                                                                <div class="input-icon right">
                                                                    <i class="  li_banknote"></i>
                                                                    <input type="number" id="inputEmail" name="montant_rec" placeholder="" class="form-control" required></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputMessage" class="control-label">
                                                            intitule</label><textarea name="intituler_rec" rows="5" class="form-control" required></textarea></div>
                                                    <div class="form-group mbn">
                                                        <div class="checkbox">
                                                            <label>
                                                                <div style="position: relative;" class="icheckbox_minimal-grey"></div>&nbsp; Soyez bref dans les intitulés de recettes que vous mettez</label></div>
                                                    </div>
                                                </div>
                                                <div class="form-actions text-right pal">
                                                    <button type="submit" name="rec" class="btn btn-primary">
                                                        Enregistrez</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>




                                     <div class="col-lg-5">
                                        <div class="panel panel-green">
                                            <div class="panel-heading li_banknote">
                                                Enregistrement Depenses </div>
                                            <div class="panel-body pan">
                                                   <form action="index.php?module=argent&action=voir" method="post">
                                                <div class="form-body pal">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputName" class="control-label">
                                                                    Date</label>
                                                                <div class="input-icon right">
                                                                    <i class="li_calendar"></i>
                                                                    <input type="date" id="inputName" name="date_dep" placeholder="jj/mm/aaaa" class="form-control" type="text" required></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputEmail" class="control-label">
                                                                    Montant</label>
                                                                <div class="input-icon right">
                                                                    <i class="li_banknote"></i>
                                                                    <input type="number" id="inputEmail" name="montant_dep" placeholder="" class="form-control" type="text" required></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputMessage" class="control-label">
                                                            intitule</label><textarea name="intituler_dep" rows="5" class="form-control" required></textarea></div>
                                                    <div class="form-group mbn">
                                                        <div class="checkbox">
                                                            <label>
                                                                <div style="position: relative;" class="icheckbox_minimal-grey"></div>&nbsp; Soyez bref dans les intitulés de depenses que vous mettez</label></div>
                                                    </div>
                                                </div>
                                                <div class="form-actions text-right pal">
                                                    <button type="submit" name="dep" class="btn btn-primary">
                                                        Enregistrez</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>  
                                      
                                 </div>
                           </div>
                                 
          	<div class="row">
          		<div class="col-lg-6">
<div class="panel panel-green">
                            <div class="panel-heading"> Tableau des Recettes journalières</div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Intituler</th>
                                        <th>Date</th>
                                        <th>Montant</th>
                                    </tr>
                                    </thead>
                                    <tbody>
    <?php
$listArray = $connexion -> tabRec() ;
$i = 0;
foreach( $listArray AS $ind ){
    ?>
                                    <tr>
                                        <td><?php echo $i++.' - '.$ind->intituler_rec(); ?></td>
                                        <td><?php echo $ind->date_rec(); ?></td>
                                        <td><span class="label label-sm label-success"><?php echo $ind->montant_rec(); ?></span></td>
                                    </tr>
   <?php } ?>                                 
                                  
                                    </tbody>
                                </table>
                            </div>

                                                <div class="form-group mbn">
                                                        <div class="checkbox">
                                                            <label>
                                                                <div style="position: relative;" class="icheckbox_minimal-grey"></div>&nbsp; Soyez bref dans les intitulés de depenses que vous mettez</label></div>
                                                    </div>

                        </div>
                   </div>

                   <div class="col-lg-6">
<div class="panel panel-green">
                            <div class="panel-heading"> Tableau des depense journalières</div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Intituler</th>
                                        <th>Date</th>
                                        <th>Montant</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
    <?php

$listArray = $connexion -> tabDep() ;
$j = 0;
foreach( $listArray AS $ind ){
    ?>
                                    <tr>
                                        <td><?php echo $j++.' - '.$ind->intituler_dep(); ?></td>
                                        <td><?php echo $ind->date_dep(); ?></td>
                                        <td><span class="label label-sm label-success"><?php echo $ind->montant_dep().'F CFA'; ?></span></td>
                                    </tr>
   <?php } ?>                                 
                                   
                                    </tbody>
                                    </tbody>
                                </table>

 <div class="form-group mbn">
                                                        <div class="checkbox">
                                                            <label>
                                                                <div style="position: relative;" class="icheckbox_minimal-grey"></div>&nbsp; Soyez bref dans les intitulés de depenses que vous mettez</label></div>
                                                    </div>
                                               

                            </div>
                        </div>
                   </div>


              </div>

    <?php
        if(verif_auth(2))
        {
    ?> 

 	<div class="row">


        <div class="col-lg-2 col-xs-2 col-md-2">
<div class="panel panel-green">
                            <div class="panel-heading"> <img src="images/iconp/90.png" alt="totaux" /></div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                         <th>MOIS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>RECETTES</td>                 
                                    </tr>

                                    <tr>
                                     <td>DEPENSES</td>
                                      </tr>
                                    <tr>
                                        <td>SOLDES</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   </div>

        
          		<div class="col-lg-10 col-xs-10 col-md-10">
<div class="panel panel-green">
                            <div class="panel-heading"><h2>TABLEAU FINANCES MENSUELLES</h2></div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                         <th>1e mois</th>
                                        <th>2e mois</th>
                                        <th>3e mois</th>
                                        <th>4e mois</th>
                                        <th>5e mois</th>
                                        <th>6e mois</th>
                                        <th>7e mois</th>
                                        <th>8e mois</th>
                                        <th>9e mois</th>
                                        <th>10e mois</th>
                                        <th>11e mois</th>
                             
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

<?php
$listArray = $connexion -> bilan() ;
foreach( $listArray AS $ind ){
    ?>
                                        <td><?php echo $ind->montant_rec_total(); ?></td>
                      <?php } ?>                     
                                    </tr>

                                    <tr>
<?php
$listArray = $connexion -> bilan() ;
foreach( $listArray AS $ind ){
    ?>
                                        <td><?php echo $ind->montant_dep_total(); ?></td>
                                       
<?php } ?> 
                                    </tr>
                                    <tr>
<?php
$listArray = $connexion->bilan() ;
foreach( $listArray AS $ind ){
    ?>
                                        <td><?php echo $ind->solde(); ?></td>
<?php } ?> 
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   </div>
              </div>

    </div>
<?php
        }

  ?> 
 <script src="styles/forme/assets/js/jquery.js"></script><script src="styles/js/Chart.js"></script><script type="text/javascript" src="styles/forme/assets/js/gritter/js/jquery.gritter.js"></script><script type="text/javascript" src="styles/forme/assets/js/gritter-conf.js"></script>

 <?php
$days= date('t');
$daysi=(int)$days;
$dayst= date('d');
$daysti=(int)$dayst;

    if($daysti>=1 && $daysti<=5)
    { 
                             if(verif_auth(2))
                             {
?> 
  <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Nous sommes à la fin du mois calculez les totaux',
            // (string | mandatory) the text inside the notification
            text: '<a href="index.php?module=argent&action=voir&rec=fait&mois=true" class="btn btn-primary">calculer</a>',
            // (string | optional) the image to display on the left
            image: 'images/iconp/2.png',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '10000',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });</script><?php } } ?><script src="styles/dataTables/jquery.dataTables.js"></script><script src="styles/dataTables/dataTables.bootstrap.js"></script><script>$(document).ready(function () {$('#dataTables-example').dataTable();});</script><script>$(function(){$('select.styled').customSelect();});</script>
