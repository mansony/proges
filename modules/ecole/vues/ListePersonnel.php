<?php
$connexion = new ManagerEcole($proges);
$data =  $connexion->ficheEcole();
?>
<style>


</style>
<link href="styles/css/AdminLTE.css" rel="stylesheet" type="text/css" />
 <link href="styles/css/finance.css" rel="stylesheet" type="text/css" />
		 <section class="content invoice"> 
<div class="inner" >
           <div class="row">
            <div class="col-lg-12">
<center><b>REPUBLIQUE GABONAISE</b></center><br /><center><font color="#00CC00">Union</font><font color="#FFFF00">-Travail-</font><font color="#0000FF">Justice</font><br /><br /><?php echo '<img src="images/'.$data['logo_ecole'].'" alt="logo" width="80px" height="100px"/>'; ?><br /><br /></center>
	
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                  LISTE DES ELEVES DU PERSONNEL
                </p>
				
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
											<th><font color="white" size="3"><center>Profession</center></font></th>
                                            <th><font color="white" size="3"><center>D.naissance</center></font></th>
											<th><font color="white" size="3">Nationalité</font></th>
										    <th><font color="white" size="3"><center>N° Tél.</center></font></th>
                       	                    
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php 
                                        $q = $connexion->listePersonnel();
                                        while($donnee = $q->fetch()){	
                                    ?>
                                    
									<tr class="odd gradeX">
			
                                            <td><?php echo $donnee['nom_p'];?></td>
                                            <td><?php echo $donnee['prenom_p'];?></td>
                                            <td><?php echo $donnee['sexe_p'];?></td>
											<td><?php echo $donnee['poste_p'];?></td>
                                            <td><?php echo $donnee['dnaiss_p'];?></td>
                                            <td><?php echo $donnee['nation_p'];?></td>
											<td><?php echo $donnee['numero_p'];?></td>
                     	          
                                        </tr>
                                        
                                    </tbody>
									<?php 
                                        } 
                                    ?>
                                </table>
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
			
			
