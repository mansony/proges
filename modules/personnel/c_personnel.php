
<?php
if (isset($_GET['action']) && !empty($_GET['action']))
{
	$action=$_GET['action'];
	switch($action)
	{
		case 'register':
		{
			include('vues/v_personnel.php');
			break;
		}
		case 'view':
		{
			include("vues/v_view.php");
			break;
		}
		case 'voir_liste':
		{
			include("vues/voir_liste.php");
			break;
		}
		
		default:
		{
			include('vues/v_view.php');
			break;
		}
		
	}
}
else
{
include("vues/v_login.php");
}
?>