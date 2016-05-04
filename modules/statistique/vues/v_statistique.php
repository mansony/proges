
<?php 
$connexion = new ManagerStat($proges);
 ?>
<link href="styles/accueil/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
 <link href="styles/accueil/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="styles/accueil/css/AdminLTE.css" rel="stylesheet" type="text/css" />

	<script src="styles/libraries/RGraph.common.core.js" ></script>
    <script src="styles/libraries/RGraph.common.dynamic.js" ></script>
    <script src="styles/libraries/RGraph.common.key.js" ></script>
    <script src="styles/libraries/RGraph.drawing.rect.js" ></script>
    <script src="styles/libraries/RGraph.bar.js" ></script>

    <script src="styles/libraries/RGraph.common.tooltips.js" ></script>

    <script src="styles/libraries/RGraph.common.effects.js" ></script>
    <script src="styles/libraries/RGraph.pie.js" ></script>


    <script src="styles/libraries/jquery.min.js"></script>


<div class="container">
    <br/>        
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title text-center"><?php  echo $connexion->countTotal(); ?></h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>TOTAL:  ELEVES</strong>
                </div>
            </div>
        </div>          
        

        <div class="col-xs-6 col-md-3">
         <div class="panel status panel-warning">
                <div class="panel-heading">
                    <h1 class="panel-title text-center"><?php  echo $connexion->countBoy(); ?></h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>TOTAL:  GARCONS</strong>
                </div>
            </div>
        </div>


        <div class="col-xs-6 col-md-3">
           <div class="panel status panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title text-center"><?php  echo $connexion->countGirl(); ?></h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>TOTAL:  FILLES</strong>
                </div>
            </div>
        </div>


        <div class="col-xs-6 col-md-3">
            <div class="panel status panel-info">
                <div class="panel-heading">
                    <h1 class="panel-title text-center"><?php  echo $connexion->countWork(); ?></h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>TOTAL:  PERSONNELS</strong>
                </div>
            </div>
        </div>
    </div>

 <br/> 
<div class="row">
  
  <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">			
	</div>

<div class="row">
<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 ">
    <h1 class="col-lg-offset-2 col-lg-8 alert alert-info">Schemas des effectifs de l'école</h1>
    
    <canvas id="cvs1" width="600" height="250">[No canvas support]</canvas>
    <canvas id="cvs2" width="300" height="250">[No canvas support]</canvas>

    <script>
        $(document).ready(function ()
        {
            var bar = new RGraph.Bar({
                id: 'cvs1',
                data: [<?php echo $connexion->countTotal(); ?>,<?php echo $connexion->countBoy(); ?>,<?php echo $connexion->countGirl(); ?>,<?php echo $connexion->countWork(); ?>],
                options: {
                    gutter: {
                        left: 35
                    },
                    colors: ['red'],
                    labels: ['T.Elèves', 'T.Garçons', 'T.Filles', 'T.Personnnels'],
                    tooltips: ['T.Elèves', 'T.Garçons', 'T.Filles', 'T.Personnnels']
                }
            }).draw();

        });


    </script>

 </div>
</div>


<div class="row">
<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <h1 class="col-lg-offset-2 col-lg-8 alert alert-info">Difference effectif entre <strong style="color:RGB(239,154,18);">Filles</strong> et <strong style="color:RGB(66,74,93);">Garçons</strong></h1>
  	<div style="width: 100%">
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>

<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : ["2 ans","3 ans","4 ans","5 ans","1e Année","2e Année","3e Année","4e Année","5e Année"],
		datasets : [
			{
				fillColor : "RGB(66,74,93)",
				strokeColor : "RGB(66,74,93)",
				highlightFill: "RGB(0,172,214)",
				highlightStroke: "RGB(0,172,214)",
				data : [<?php echo $connexion->statClasse('2 ans','M'); ?>,<?php echo $connexion->statClasse('3 ans','M'); ?>,<?php echo $connexion->statClasse('4 ans','M'); ?>,<?php echo $connexion->statClasse('5 ans','M'); ?>,<?php echo $connexion->statClasse('1e annee','M'); ?>,<?php echo $connexion->statClasse('2e annee','M'); ?>,<?php echo $connexion->statClasse('3e annee','M'); ?>,<?php echo $connexion->statClasse('4e annee','M'); ?>,<?php echo $connexion->statClasse('5e annee','M'); ?>]
			},
			{
				fillColor : "RGB(239,154,18)",
				strokeColor : "RGB(239,154,18)",
				highlightFill : "RGB(231,99,79)",
				highlightStroke : "RGB(231,99,79)",
				data : [<?php echo $connexion->statClasse('2 ans','F'); ?>,<?php echo $connexion->statClasse('3 ans','F');  ?>,<?php echo $connexion->statClasse('4 ans','F');  ?>,<?php echo $connexion->statClasse('5 ans','F'); ?>,<?php echo $connexion->statClasse('1e annee','F'); ?>,<?php echo $connexion->statClasse('2e annee','F'); ?>,<?php echo $connexion->statClasse('3e annee','F'); ?>,<?php echo $connexion->statClasse('4e annee','F'); ?>,<?php echo $connexion->statClasse('5e annee','F'); ?>]
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

	</script>
	

	</div>
  </div>

</div>


<script src="styles/js/Chart.js"></script>
<footer class="site-footer">
          <div class="text-center">
             designed by <a href="http://www.gabonweb.net">Mansony, Design</a>
          </div>
      </footer>