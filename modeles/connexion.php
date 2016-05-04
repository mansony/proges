<?php

$nom_ecole = "proges";

	try 
		{
		// Connexion à la base de données
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$proges = new PDO('mysql:host=localhost;dbname='.$nom_ecole.'', 'root', 'root',$pdo_options);
		} 
		catch (PDOException $e) 
		{
			die('Erreur : '.$e->getMessage());
		}
if(isset($_POST['pass']))
{		
	$q=$proges->query('SELECT mdp_fondateur_ecole,mdp_adjoint_ecole FROM config WHERE mdp_fondateur_ecole = "'.$_POST['pass'].'" OR mdp_adjoint_ecole = "'.$_POST['pass'].'"');
	$count = $q->rowCount();
	if($count != 0)
	{
	
		$data=$q->fetch();
			if($data['mdp_adjoint_ecole'] == $_POST['pass'])
				$_SESSION['niveau'] =  1;
			else
				$_SESSION['niveau'] =  2;	
	}
	else
	{
		header("location: index.php");
	}
}
?>