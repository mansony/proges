<?php
$connexion = new ManagerEcole($proges);
$dt =  $connexion->ficheEcole();

	$classe = $_POST['classe_e'];
	$salle  = $_POST['salle_e'];
	$mois   = $_POST['mois'];
?>


<link href="styles/css/AdminLTE.css" rel="stylesheet" type="text/css" />
 <link href="styles/css/finance.css" rel="stylesheet" type="text/css" />
 		 <section class="content invoice"> 
<div class="inner" >
           <div class="row">
            <div class="col-lg-offset-1 col-lg-10">
              <center><b>REPUBLIQUE GABONAISE</b></center><br /><center><font color="#00CC00">Union</font><font color="#FFFF00">-Travail-</font><font color="#0000FF">Justice</font>
              <br /><br /><?php echo '<img src="images/'.$dt['logo_ecole'].'" alt="logo" width="80px" height="100px"/>'; ?><br /><br /></center>
		
           
                <h1 class="text-muted text-center btn-block btn btn-primary btn-rect">
                  LISTE DES PAYEMENTS DE SCOLARITE<?php echo " $mois <sup>e</sup> MOIS ";?><br/><?php echo "$classe $salle";?>
                </h1>
				
				<div class="panel panel-default">
                  
                        <div class="panel-body">
                            <div class="table-responsive">

<br />
								
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
					 
											<th><font color="white" size="3"><center>Nom</center></font></th>
                                            <th><font color="white" size="3"><center>Prénom</center></font></th>
                                            <th><font color="white" size="3"><center>Sexe</center></font></th>
                                            <th><font color="white" size="3"><center>Statut</center></font></th>
                                            <th><font color="white" size="3"><center>Contacts</center></font></th>
                       	                    
                                        </tr>
                                    </thead>
                                    <tbody>
									
									
									<tr class="odd gradeX">
									
<?php

$q = $connexion->listePayer($classe,$salle);
while($data = $q->fetch()){

?>									
                                            <td><?php echo $data['nom_e'];?></td>
                                            <td><?php echo $data['prenom_e'];?></td>
                                            <td><?php echo $data['sexe_e'];?></td> 
											<td><?php
													if($mois > $data['mois'])
														echo '<span class="label label-danger">NON PAYE</span>';
													else
														echo '<span class="label label-success"> PAYE</span>';
											?></td>
											<td><?php echo $data['numero_e'];?></td>
                     	          
                                        </tr>
                                        
                                    </tbody>
									<?php } ?>
                                </table>
                            </div>
                          
                        </div>
                    </div>
				    
                </div>	
        </div>
  </div>


</section><!-- /.content -->
			
			
