
 <link href="styles/css/AdminLTE.css" rel="stylesheet" type="text/css" />
 <link href="styles/forme/assets/css/styleCantine.css" rel="stylesheet">

<section class="content invoice"> 
    <div class="row">
                        <div class="col-xs-12">

<?php
$connexion = new ManagerArgent($proges);
$montant = $_POST['montant'];
//Obtention des données de configuration de l'école
$config = $connexion->config();
//Obtention de l'élève concerné
$elv = $connexion->eleveCantine($_GET['elv']);
//insertion dans la table des recette
    if($montant != 0)
        $connexion->registerScolariteRecette($montant,$elv['nom_e'],$elv['prenom_e']); 
//insertion dans la table mensualité
$connexion->registerScolarite($_GET['elv']);
//selection du mois payé
$mois = $connexion->selectMoisScolarite($_GET['elv']);        

?>

<table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 15%; color: #444444;">
                <?php echo ' <img  src="images/'.$config['logo_ecole'].'" alt="Logo" width="110px" height="120px"/>'; ?><br>             
            </td>
            <td style="width: 65%;">
            <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:20%;"></td>
            <td style="width:14%;text-align:left;font-size:17px; "></td>
            <td style="width:26%;font-size:17px;"><td style="width:26%;font-size:17px;">Tél: <?php echo $config['contact_1_ecole'].'/'.$config['contact_2_ecole']; ?><br>
            </td>
        </tr>
        <tr>
            <td style="width:20%;"></td>
            <td style="width:26%;font-size:17px;"></td>
        </tr>
 </table> 
<barcode type="EAN13" value="123467891245" style="margin-left:100mm;margin-top:10mm;width: 30mm; height: 12mm; font-size: 4mm"></barcode>   
</td>
 </tr>
</table>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;font-size:17px; ">Libreville, le <?php echo date('d/m/Y'); ?></td>
        </tr>
    </table>
   <i>
        <h3><u>RECU</u>: &laquo;<?php echo 'N° S'.$mois['mois'].'-'.$elv['id_e'];?> &raquo;</b><br></h2>

        <p style="font-size:17px;">Reçu de l'élève : <?php echo '<strong> '.$elv['nom_e'].' '.$elv['prenom_e'].'</strong>';?> </p>    
        <p style="font-size:17px;">Somme : <?php echo '<strong>'.$montant.'</strong>';?>Frs, En lettre.............................................................................................Frs CFA</p> 

        <p style="font-size:17px;">Motif: Payement de la scolarité du <?php echo '<strong>'.$mois['mois'].'<sup>e</sup> mois</strong>';?> </p>
        <br>
    </i>
    <h4>SIGNATURE</h4><br><br><br> 
   
   <hr/>

  
<table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 15%; color: #444444;">
                <?php echo ' <img  src="images/'.$config['logo_ecole'].'" alt="Logo" width="110px" height="120px"/>'; ?><br>             
            </td>
            <td style="width: 65%;">
            <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
            <td style="width:20%;"></td>
            <td style="width:14%;text-align:left;font-size:17px; "></td>
            <td style="width:26%;font-size:17px;"><td style="width:26%;font-size:17px;">Tél: <?php echo $config['contact_1_ecole'].'/'.$config['contact_2_ecole']; ?><br>
            </td>
        </tr>
        <tr>
            <td style="width:20%;"></td>
            <td style="width:26%;font-size:17px;"></td>
        </tr>
 </table>
    
<barcode type="EAN13" value="123467891245" style="margin-left:100mm;margin-top:10mm;width: 30mm; height: 12mm; font-size: 4mm"></barcode>
      
</td>
 </tr>
</table>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;font-size:17px; ">Libreville, le <?php echo date('d/m/Y'); ?></td>
        </tr>
    </table>
   <i>
        <h3><u>RECU</u>: &laquo;<?php echo 'N° S'.$mois['mois'].'-'.$elv['id_e'];?> &raquo;</b><br></h2>

        <p style="font-size:17px;">Reçu de l'élève : <?php echo '<strong> '.$elv['nom_e'].' '.$elv['prenom_e'].'</strong>';?> </p>    
        <p style="font-size:17px;">Somme : <?php echo '<strong>'.$montant.'</strong>';?>Frs, En lettre.............................................................................................Frs CFA</p> 

        <p style="font-size:17px;">Motif: Payement de la scolarité du <?php echo '<strong>'.$mois['mois'].'<sup>e</sup> mois</strong>';?> </p>
        <br>
    </i>
    <h4>SIGNATURE</h4><br><br><br> 
   
   <hr/>  
  
    </div><!-- /.col -->
                    </div><!-- /.row -->
  <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> IMPRIMER</button><br />
                         <?php echo '<a type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" href="index.php?module=argent&action="><i class="fa fa-download"></i>RETOURNER</a>'; ?>
                      </div>
                    </div>
                </section><!-- /.content -->  