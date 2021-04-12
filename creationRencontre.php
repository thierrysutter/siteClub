<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
require_once("config/config.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>

	<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#reset").click(function(){
	  			document.location="ActionRencontre.php";
		  	});

			$( ".datepicker" ).datepicker( {
				showOn: "button",
				buttonImage: "images/calendar16.png",
				buttonImageOnly: true
			});

			$(".ui-datepicker-trigger").each(function() {
	  			$(this).attr("alt","Calendrier");
	  			$(this).attr("title","");
	  		});

	  		$("img.ui-datepicker-trigger").click(
	  				function(){
	  					$(this).parent().find(".datepicker").blur();
	  					}
	  		);


		    var $categories = $('#categorie');
		    var $equipes = $('#equipe');
		    var $lieu = $('#lieu');
		    var $typeCompetitions = $('#competition');
		    var $adversaire = $('#adversaire');

		 // � la s�lection d une cat�gorie dans la liste
		    $categories.on('change', function() {
		    	$('.containerEquipe').css("display", "none");

		        var val = $(this).val(); // on r�cup�re la valeur de la cat�gorie
		        if(val != '') {
		            $equipes.empty(); // on vide la liste des �quipes
		            $typeCompetitions.empty(); // on vide la liste des �quipes

		            $.ajax({
		                url: 'RechercherEquipe.php',
		                data: 'categorie='+ val, // on envoie $_GET['categorie']
		                dataType: 'json',
		                success: function(json) {
		                	$equipes.append("<option value=''>S�lectionnez une �quipe</option>");
		                    $.each(json, function(index, value) {
		                        $equipes.append('<option value="'+ index +'">'+ value +'</option>');
		                    });
		                    $('.containerEquipe').css("display", "");
		                },
		                error: function(result){
			                alert(result);
		                }
		            });

		            /*$.ajax({
		                url: 'RechercherTypeCompetition.php',
		                data: 'categorie='+ val, // on envoie $_GET['categorie']
		                dataType: 'json',
		                success: function(json) {
		                	$typeCompetitions.append("<option value=''>S�lectionnez une comp�tition</option>");
		                    $.each(json, function(index, value) {
		                        $typeCompetitions.append('<option value="'+ index +'">'+ value +'</option>');
		                    });
		                    $('.containerTypeCompetition').css("display", "");
		                },
		                error: function(){
			                alert("erreur");
		                }
		            });*/

		            /*$('.containerLieu').css("display", "");
			    	$('.containerAdversaire').css("display", "");*/
		        }
		    });

		    $equipes.on('change', function() {
		    	$('.containerTypeCompetition').css("display", "none");
		    	$('.containerLieu').css("display", "none");
		    	$('.containerAdversaire').css("display", "none");
				var categorie = $categories.val(); // on r�cup�re la valeur de la cat�gorie
		    	var equipe = $(this).val(); // on r�cup�re la valeur de l'equipe
		    	$typeCompetitions.empty(); // on vide la liste des comp�titions
			    $.ajax({
	                url: 'RechercherCompetitionEquipe.php',
	                data: 'categorie='+ categorie + '&equipe=' + equipe, // on envoie $_GET['categorie'] et $_GET['equipe']
	                dataType: 'json',
	                success: function(json) {
	                	$typeCompetitions.append("<option value=''>S�lectionnez une comp�tition</option>");
	                    $.each(json, function(index, value) {
	                        $typeCompetitions.append('<option value="'+ index +'">'+ value +'</option>');
	                    });
	                    $('.containerTypeCompetition').css("display", "");
	                    $('.containerLieu').css("display", "");
				    	$('.containerAdversaire').css("display", "");
	                },
	                error: function(result){
		                alert("Erreur lors de la racherche des comp�titions de cette �quipe.");
	                }
	            });
		    });

		});
	</script>
</head>
<body class="w-75 mx-auto bg-light">
	<!-- Navigation Haut-->
	<?php

	session_start();
	$user = null;
	if (isset($_SESSION['session_started'])) {
		$user = $_SESSION['user'];
	  	if (!empty($user)) {
	  		/* Navigation Haut */
	  		include("menuAdmin.php");
	  		/* End Navigation */
	  	} else {
	  		//header("Location: ActionAccueil.php");
  			header("Location: Deconnexion.php");
	  	}
	} else {
		//header("Location: ActionAccueil.php");
  		header("Location: Deconnexion.php");
	}


	$listeCategories = $_SESSION['listeCategories'];
	$listeEquipes = $_SESSION['listeEquipes'];
	$listeTypeCompetitions = $_SESSION['listeTypeCompetitions'];
	$listeCompetitions = $_SESSION['listeCompetitions'];
	?>
	<?php
	  include("head.php");
	?>
	<!-- End Navigation -->
	
	<div class="my-3">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	        	<form id="" action="EnregistrerRencontre.php" method="post">
	        		<input type="hidden" name="methode" id="methode" value="create"/>
	        		<h3 class="mx-5 pb-3">Ajouter une rencontre</h3>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="jour">Jour</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md datepicker" type="text" id="jour" name="jour" value="" required/>
			        	</div>
			        </div>
	        		
	        		<div class="form-group row mx-5">
	        			<label class="col-sm-1 col-form-label" for="categorie">Cat�gorie</label>
	        			<div class="col-sm-11">
			              <select class="form-control w-100 form-control-md" name="categorie" id="categorie" required>
							<?php foreach($listeCategories as $categorie) {?>
							<option value="<?php echo $categorie->getId();?>"><?php echo $categorie->getLibelle(); ?></option>
							<?php } ?>
						  </select>
			            </div>
			        </div>
	        		
	        		<div class="form-group row mx-5 containerEquipe" style="display: none;">
	        			<label class="col-sm-1 col-form-label" for="equipe">Equipe</label>
	        			<div class="col-sm-11">
			              <select class="form-control w-100 form-control-md" name="equipe" id="equipe" required>
							<?php foreach($listeEquipes as $equipe) {?>
							<option value="<?php echo $equipe->getId();?>"><?php echo $equipe->getLibelle(); ?></option>
							<?php } ?>
						  </select>
			            </div>
			        </div>
	        		
	        		<div class="form-group row mx-5 containerLieu" style="display: none;">
	        			<label class="col-sm-1 col-form-label" for="lieu">Lieu</label>
	        			<div class="col-sm-11">
			              <select class="form-control w-100 form-control-md" name="lieu" id="lieu" required>
							<option label="Domicile" value="domicile">Domicile</option>
							<option label="Exterieur" value="exterieur">Exterieur</option>
						  </select>
			            </div>
			        </div>
	        		
	        		<div class="form-group row mx-5 containerTypeCompetition" style="display: none;">
	        			<label class="col-sm-1 col-form-label" for="competition">Comp�tition</label>
	        			<div class="col-sm-11">
			              <select class="form-control w-100 form-control-md" name="competition" id="competition" required>
							<option value="">S�lectionnez une comp�tition</option>
							<?php foreach($listeCompetitions as $competition) {?>
							<option value="<?php echo $competition->getId();?>"><?php echo $competition->getLibelle(); ?></option>
							<?php } ?>
						  </select>
			            </div>
			        </div>
			        
			        <div class="form-group row mx-5 containerAdversaire" style="display: none;">
			        	<label class="col-sm-1 col-form-label" for="adversaire">Adversaire</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" id="adversaire" name="adversaire" value="" required/>
			        	</div>
			        </div>
					
					<div class="form-group row mx-5">
		              <div class="col-sm-12 text-right">
		                <button type="submit" class="btn btn-primary btn-lg active" value="Enregistrer">Enregistrer</button>
		                <button type="reset" id="reset" class="btn btn-primary btn-lg active" value="Annuler">Annuler</button>
		              </div>
		            </div>
	        	</form>
	        </div>
	      </div>
	    </div>
	</div>

	<!-- Bandeau sponsors -->
	<?php
	  include("bandeau_sponsors.php");
	?>
	<!-- End bandeau sponsors -->

	<!-- Footer -->
	<?php
	  include("footer.php");
	?>
	<!-- End Footer -->
</body>
</html>
<?php
ob_end_flush();
?>