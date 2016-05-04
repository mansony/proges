
<?php
if (isset($_GET['action']) && !empty($_GET['action']))
{
	$action=$_GET['action'];
	switch($action)
	{
		case 'v_scolarite':
		{
			include('vues/v_scolarite.php');
			break;
		}
		default:
		{
			include('vues/index.php');
			break;
		}
		
	}
}


?>