<?php

if(isset($_POST) AND isset($_SESSION['sauvegarde']) AND  $_POST == $_SESSION['sauvegarde'] )
{
    unset($_SESSION['sauvegarde'], $_POST['submit']);
}

$connexion = new ManagerSearch($proges);
?>


     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
  <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="styles/recherche/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="styles/recherche/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <link href="styles/forme/assets/font-awesome/css/searchstyle.css" rel="stylesheet" />

</head>
     <!-- END HEAD -->

<body >

  <!--  PAGE CONTENT --> 
       <div class="container">
        <div class="col-lg-10 text-center">
      <br/><br/><br/>
                <div class="well">
                    <form method="post" action="index.php?module=recherche&action=v_search">
                <a class="input-group demo-input-group">
                 <input class="form-control nav-input-search pull-right" style="font-size:25px;margin:0px;height:55px;" size="20" placeholder="Nom ou Prenom" name="nom" type="text" >
                 <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit" style="font-size:25px;height:55px;"><i class="fa fa-search"></i></button>
                </span>
                </form>
              </a>
               </form>
            </div>
             

<?php



if(isset($_POST['nom']))
{


  if($connexion->countEleveByName($_POST['nom']) == 0)
  {
    echo '<em>'.$_POST['nom'].'</em> n\'existe pas,essayer son autre nom';
  }
  else{


  $listArray = $connexion->search($_POST['nom']);
  foreach( $listArray AS $ind ){

?>
      <div class="row">
          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <div class="profil">
              <div class="col-sm-12"><br/><br/><br/>
                <div class="col-xs-12 col-sm-8">
                  
                  <?php  echo ' <h2>'.$ind->nom_e.' '.$ind->prenom_e.'</h2>'; ?> 
                 
                </div>             
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="avatars/<?php echo $ind->photo_e; ?>" alt="" width="100" height="100"  class="img-circle img-responsive">

                        <?php echo '<a type="button"  class="btn btn-success" href="index.php?module=recherche&action=v_scolarite&id='.$ind->id_e.'">voir</a><br/> '; ?>
                        
                  </figure>
                </div>
            </div> 
          </div> 
        </div>

 


  <?php }
    }
}
?>
      </div>  <!-- fermeture du row -->
    </div> 
  </div>
<br/>

</body>
     <!-- END BODY -->
</html>

