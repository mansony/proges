<?php
session_start();


if(isset($_GET['fermer']))
{
	session_destroy();
}

$def_module = 'modeles/login.php';
//$def_module = 'modules/accueil/c_accueil.php';
if (isset($_GET['module']) && !empty($_GET['module']))
{
	
	$module='modules/'.$_GET['module'].'/c_'.$_GET['module'].'.php';
	$v_footer='vues/v_footer.php';	
	function chargerClasse($classname)
	{
		require 'modules/'.$_GET['module'].'/modeles/'.$classname.'.class.php';
	}
	spl_autoload_register('chargerClasse');  
	if(is_file($module))
	{
			include_once('modeles/connexion.php');
			include('vues/header.php');
	include($module);
	
			include('vues/footer.html');
		
	}
	else
	{
		include('vues/header.php');
		include($def_module);
		
			include('vues/footer.html');
	}
}
else
{
	//include('vues/header.html');
		include($def_module);
		
	//		include('vues/footer.html');
}
 if(isset($_GET['deconnection']))
{
	session_unset(); // suppression des variables de sessions
	session_destroy(); // destruction de la session
	header("location: index.php"); // redirection
}

//include_once('vues/v_footer.php');

?>