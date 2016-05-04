
<?php
if (isset($_GET['action']) && !empty($_GET['action']))
{
	$action=$_GET['action'];
	switch($action)
	{
		case 'voir':
		{
			include('vues/v_eleve.php');
			break;
		}
		case 'voir_classe':
		{
			include("vues/v_classe.php");
			break;
		}
		case 'inscription':
		{
			include("vues/inscription.php");
			break;
		}
		case 'liste':
		{
			include("vues/voir_liste.php");
			break;
		}
		
		default:
		{
			include('vues/v_eleve.php');
			break;
		}
		
	}
}
else
{
include("vues/v_login.php");
}
?>