
<?php
if (isset($_GET['action']) && !empty($_GET['action']))
{
	$action=$_GET['action'];
	switch($action)
	{
		case 'voir':
		{
			include("vues/v_argent.php");
			break;
		}
		case 'scolarite':
		{
			include("vues/scolarite.php");
			break;
		}
		case 'cantine':
		{
			include("vues/cantine.php");
			break;
		}
		default:
		{
			include("vues/v_argent.php");
			break;
		}
		
	}
}
else
{
include("vues/v_argent.php");
}
?>

