
<?php
if (isset($_GET['action']) && !empty($_GET['action']))
{
	$action=$_GET['action'];
	switch($action)
	{
		case 'voir':
		{
			include('vues/v_statistique.php');
			break;
		}
		default:
		{
			include('vues/v_statistique.php');
			break;
		}
		
	}
}
else
{
include("vues/v_login.php");
}
?>