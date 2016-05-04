<?php 
ob_start();
?>
<style type="text/css">
<!--
table
{ width:  100%;
    border:none;
    border-collapse: collapse;}
th
{text-align: center;border: solid 1px #eee;background: #f8f8f8;}
td
{ text-align: center; }
.dataTable td{
padding:10px 5px;
background-color:#efefef;
}
.dataTable th{
padding:10px 5px;
}
-->
</style>


<?php

$montant = 15000;
//
  $q=$proges->query("SELECT * FROM config ");
    $dt=$q->fetch();


$q=$proges->query('SELECT * FROM eleve WHERE id_e = "'.$_GET['elv'].'" ');
$data=$q->fetch(); 

$q=$proges->query('SELECT frais FROM classe WHERE nom_classe = "'.$data['classe_e'].'" ');
$data=$q->fetch(); 


$req=$proges->query('INSERT INTO recette(montant_rec,intituler_rec,date_rec) VALUES ('.$montant.',"payement de la scolarité de l élève '.$data['nom_e'].'",NOW())');

$query=$proges->query('UPDATE mensualite SET mois = mois + 1 WHERE id_m_e ='.$_GET['elv'].'');

?>



<page style="font-size: 12pt" backimg="./images/sign.png" backimgy="bottom">
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="./images/ui-sam.png" alt="Logo"><br><br>
                <?php echo $dt['nom_ecole']; ?>
            </td>
            <td style="width: 75%;">
            <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
       
        <tr>
            <td style="width:50%;"></td>
            <td style="width:14%;text-align:left; ">Adresse</td>
            <td style="width:36%">
                <?php echo $dt['localisation_ecole']; ?><br>
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:14%;text-align:left; ">Téléphone</td>
            <td style="width:36%"><?php echo $dt['contact_directeur']; ?></td>
        </tr>
 </table>
    
    
<barcode type="EAN13" value="123467891245" style="margin-left:100mm;margin-top:10mm;width: 30mm; height: 12mm; font-size: 4mm"></barcode>
      
</td>
 </tr>
</table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%; ">Libreville, le <?php echo date(YY-mm-dd); ?></td>
        </tr>
    </table>
    <br>
    <i>
        <b><u>RECU</u>: &laquo; N°1 &raquo;</b><br><br>
        la somme de : <?php echo '<h3>'.$montant.'</h3>'?><br> a été perçu concernant la scolarité du mois novembre de l'élève<?php echo '<h3>'.$data['nom_e'].' '.$$data['prenom_e'].'</h3>'?>
        Référence du Dossier : 5406666<br>
    </i>
    <br>
    <br>
    SIGNATURE<br>
    <br>
   
   <hr/>



   <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="./images/ui-sam.png" alt="Logo"><br><br>
                <?php echo "TERRE PROMISE"; ?>
            </td>
            <td style="width: 75%;">
            <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
       
        <tr>
            <td style="width:50%;"></td>
            <td style="width:14%;text-align:left; ">Adresse</td>
            <td style="width:36%">
                OWENDO<br>
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:14%;text-align:left; ">Téléphone</td>
            <td style="width:36%">O7 35 25 54</td>
        </tr>
 </table>
    
    
<barcode type="EAN13" value="123467891245" style="margin-left:100mm;margin-top:10mm;width: 30mm; height: 12mm; font-size: 4mm"></barcode>
      
</td>
 </tr>
</table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%; ">Libreville, le 23/11/2015</td>
        </tr>
    </table>
    <br>
    <i>
        <b><u>RECU</u>: &laquo; N°1 &raquo;</b><br><br>
        la somme de : <?php echo '<h3>'.$montant.'</h3>'?><br> a été perçu concernant la scolarité du mois novembre de l'élève<?php echo '<h3>'.$data['nom_e'].' '.$$data['prenom_e'].'</h3>'?>
        Référence du Dossier : 5406666<br>
    </i>
    <br>
    <br>
    SIGNATURE<br>
    <br>
   
   <hr/>
    
    
   
    
</page>

<?php 
    $content = ob_get_clean();
    require_once( __DIR__ . "/html2pdf.class.php");
    try
    {
        $html2pdf = new HTML2PDF("P", "A4", "fr");
       
        $html2pdf->setDefaultFont("Arial");
        $html2pdf->writeHTML($content);
        $html2pdf->Output("votre_pdf.pdf");
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>
Vous pouvez visualiser le PDF Commande PDF


