<?php
$connexion = new ManagerEcole($proges);

  $data = $connexion->ficheEcole();
?>
<style>

</style>
<link href="styles/css/AdminLTE.css" rel="stylesheet" type="text/css" />
 <link href="styles/css/finance.css" rel="stylesheet" type="text/css" />
 		 <section class="content invoice"> 
			<div class="inner" >
           		<div class="row">
           		    <div class="col-lg-12">

              	
                    
			<br /><br /><center><b>REPUBLIQUE GABONAISE</b></center><br /><center><font color="#00CC00">Union</font><font color="#FFFF00">-Travail-</font><font color="#0000FF">Justice</font><br /><br />
			<?php echo ' <img src="images/'.$data['logo_ecole'].'" alt="logo" width="80px" height="100px"/>'; ?><br /><br /></center>
		
                    	<div class="row">
          		<div class="col-lg-6">
<div class="panel panel-green">
                            <div class="panel-heading"> Tableau des recettes de la scolarité</div>
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

$i= 0;
	if(isset($_POST['today']))
        $q = $connexion->today_rec_type('scolarite');
    
    if(isset($_POST['jour']))
        $q = $connexion->jour_rec_type($_POST['jour'],'scolarite');
    
    if(isset($_POST['mois']))
        $q = $connexion->mois_rec_type($_POST['mois'],'scolarite');

		while($donnees=$q->fetch()){
			
    ?>
                                    <tr>
                                        <td><?php echo $i++.' - '.$donnees['intituler_rec']; ?></td>
                                        <td><?php echo $donnees['date_rec']; ?></td>
                                        <td><span class="label label-sm label-success"><?php echo $donnees['montant_rec']; ?></span></td>
                                    </tr>
   <?php }
   ?>                                 
                                    <tr style="font-size:20px;">
                                        <td>Total</td>
                                        <td></td>
                                     
								 <td><span class="label label-lg label-danger" >
 <?php
		$i = 0 ;
		if(isset($_POST['today']))
        $q = $connexion->today_rec_type('scolarite');

        if(isset($_POST['jour']))
        $q = $connexion->jour_rec_type($_POST['jour'],'scolarite');

        if(isset($_POST['mois']))
        $q = $connexion->mois_rec_type($_POST['mois'],'scolarite');

		while( $donnees = $q ->fetch() ){
		$i = $i + $donnees['montant_rec'] ;
		}
 
echo $i.'F CFA' ;
 
    ?>
</span></td>	 	 
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   </div>

                   <div class="col-lg-6">
<div class="panel panel-green">
                            <div class="panel-heading"> Tableau des recettes de la cantine</div>
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
$i= 0;
        if(isset($_POST['today']))
        $req = $connexion->today_rec_type('cantine');

        if(isset($_POST['jour']))
        $req = $connexion->jour_rec_type($_POST['jour'],'cantine');

        if(isset($_POST['mois']))
        $req = $connexion->mois_rec_type($_POST['mois'],'cantine');

		while( $data=$req->fetch()){
    
    ?>
                                    <tr>
                                        <td><?php echo $data['id_rec'].' - '.$data['intituler_rec']; ?></td>
                                        <td><?php echo $data['date_rec']; ?></td>
                                        <td><span class="label label-sm label-success"><?php echo $data['montant_rec'].'F CFA'; ?></span></td>
                                    </tr>
   <?php } ?>                                 
                                    <tr style="font-size:20px;">
                                        <td>Total</td>
                                        <td><span class="label label-lg label-danger" >


 <?php
 	$i = 0 ;
		 if(isset($_POST['today']))
        $req = $connexion->today_rec_type('cantine');

        if(isset($_POST['jour']))
        $req = $connexion->jour_rec_type($_POST['jour'],'cantine');

        if(isset($_POST['mois']))
        $req = $connexion->mois_rec_type($_POST['mois'],'cantine');


        while( $donnees = $req ->fetch()){
        $i = $i + $donnees['montant_rec'] ;
        }
        echo  $i.'F CFA' ;
    ?>

                                        </span></td>
                                      
                                    </tr>
                                    </tbody>
                                    </tbody>
                                </table>

 <div class="form-group mbn">
                            </div>
                        </div>
                   </div>


              </div>
			
                </div>
				
        </div>
  </div>

 <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Imprimer</button>
                       </div>
                    </div>
                </section><!-- /.content -->
			
			
