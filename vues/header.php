<?php

//    if(empty($_SESSION['niveau'] ))
  //  {
    //    header("location: index.php");
    //} 

if(isset($_POST['doc_e']))
{
$q=$proges->query('SELECT * FROM eleve WHERE nom_e LIKE "'.$_POST['doc_e'].'" OR  prenom_e LIKE "'.$_POST['doc_e'].'" ');
$count = $q->rowCount();
$elv = $_POST['doc_e'];
if(!$count)
{
  header("location:index.php?module=ecole&action=voir"); 
}
}


if(isset($_POST['doc_p']))
{
$q=$proges->query('SELECT * FROM eleve WHERE nom_e LIKE "'.$_POST['doc'].'" OR  prenom_e LIKE "'.$_POST['doc'].'" ');
$count = $q->rowCount();

if( $count == 0)
{
echo 'Pas résultat pour <em>'.$_POST['doc'].'</em>';
}
else{
  header("location:modeles/login.php"); 
}
}

function verif_auth($auth_necessaire)
{
  $rang=(isset($_SESSION['niveau']))?$_SESSION['niveau']:1;
  return ($auth_necessaire <= intval($rang));
}

//if(isset($_POST['matricule_e']))
//{
//$q=$proges->query('SELECT * FROM eleve WHERE matricule_e = "'.$_POST['matricule_e'].'"');
//$count = $q->rowCount();
//  if($count)
//  {
//    header("location:index.php?module=eleve&action=voir");
//  }
//}

  $rep=$proges->query("SELECT * FROM config ");
    $dt=$rep->fetch();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Proges</title>

    <!-- Bootstrap core CSS -->
    <link href="styles/forme/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="styles/forme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="styles/forme/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="styles/forme/assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="styles/forme/assets/css/style.css" rel="stylesheet">
    <link href="styles/forme/assets/css/style-responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="styles/forme/assets/css/bootstrap-fileupload.min.css" />
    
    <script src="styles/forme/assets/js/chart-master/Chart.js"></script> 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <![endif]-->
	
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Agrandir"></div>
              </div>
            <!--logo start-->
             <a href="" class="logo"><b>PROGES</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
               
            </div>
            <div class="top-menu">
            	
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <li class="sub-menu">
                      <a href="index.php?module=eleve&action=voir" >
                          <i class="fa fa-desktop"></i>
                          <span><strong>Elèves</strong></span>
                      </a>
                      <ul class="sub">
                           <li><a  href="index.php?module=eleve&action=voir_classe">Liste</a></li>
						   <li><a  href="index.php?module=eleve&action=voir" >Enregister</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="index.php?module=ecole&action=voir" >
                          <i class="fa fa-cogs"></i>
                          <span>Administration</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="index.php?module=argent&action=voir" >
                          <i class="fa fa-book"></i>
                          <span>Finance</span>
                      </a>
                   
                  </li>
                  <li class="sub-menu">
                      <a href="index.php?module=recherche&action=v_search" >
                          <i class="fa fa-tasks"></i>
                          <span>Recheche</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="index.php?module=personnel&action=voir" >
                          <i class="fa fa-th"></i>
                          <span>Personnel</span>
                      </a>
					  <ul class="sub">
                          <li><a  href="index.php?module=personnel&action=register" >Enregister</a></li>
                          <li><a  href="index.php?module=personnel&action=view">Liste</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="index.php?module=statistique&action=voir" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Statistique</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="btn " href="index.php?fermer=oui">
                          <span>Quiter</span>
                      </a>
                  </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

             
          
