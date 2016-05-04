
<?php
$action=$_GET['action'];
	switch($action)
	{
		case 'finance':
		{
			include("vues/finance.php");
			break;
		}
		case 'finance2':
		{
			include("vues/finance2.php");
			break;
		}
		case 'gestion':
		{
			include("vues/v_ecole.php");
			break;
		}
		case 'personnel':
		{
			include("vues/ListePersonnel.php");
			break;
		}
		case 'scolarite':
		{
			include("vues/compteur_scolarite.php");
			break;
		}
		case 'recu':
		{
			include("vues/recu.php");
			break;
		}
		default:
		{
			include("vues/v_ecole.php");
			break;
		}
		
	}
?>