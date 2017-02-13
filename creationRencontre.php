<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
require_once("config/config.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
	<meta name="keywords" content="mots-clés" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />


	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
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

		 // à la sélection d une catégorie dans la liste
		    $categories.on('change', function() {
		    	$('.containerEquipe').css("display", "none");

		        var val = $(this).val(); // on récupère la valeur de la catégorie
		        if(val != '') {
		            $equipes.empty(); // on vide la liste des équipes
		            $typeCompetitions.empty(); // on vide la liste des équipes

		            $.ajax({
		                url: 'RechercherEquipe.php',
		                data: 'categorie='+ val, // on envoie $_GET['categorie']
		                dataType: 'json',
		                success: function(json) {
		                	$equipes.append("<option value=''>Sélectionnez une équipe</option>");
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
		                	$typeCompetitions.append("<option value=''>Sélectionnez une compétition</option>");
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
				var categorie = $categories.val(); // on récupère la valeur de la catégorie
		    	var equipe = $(this).val(); // on récupère la valeur de l'equipe
		    	$typeCompetitions.empty(); // on vide la liste des compétitions
			    $.ajax({
	                url: 'RechercherCompetitionEquipe.php',
	                data: 'categorie='+ categorie + '&equipe=' + equipe, // on envoie $_GET['categorie'] et $_GET['equipe']
	                dataType: 'json',
	                success: function(json) {
	                	$typeCompetitions.append("<option value=''>Sélectionnez une compétition</option>");
	                    $.each(json, function(index, value) {
	                        $typeCompetitions.append('<option value="'+ index +'">'+ value +'</option>');
	                    });
	                    $('.containerTypeCompetition').css("display", "");
	                    $('.containerLieu').css("display", "");
				    	$('.containerAdversaire').css("display", "");
	                },
	                error: function(result){
		                alert("Erreur lors de la racherche des compétitions de cette équipe.");
	                }
	            });
		    });

		});
	</script>
</head>
<body>
	<!-- Header -->
	<?php
	  include("head.php");
	?>
	<!-- End Header -->

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
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
					<!-- <ul>
						<li><div class="link"><a href="ChangementMotDePasse.php">Modifier mot de passe</a></div></li>
					</ul>-->
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<!-- Main Slide Item -->
						<form id="form1" action="EnregistrerRencontre.php" method="post">
						<div class="featured-main-joueur">
								<input type="hidden" name="methode" id="methode" value="create"/>
								<fieldset>
									<legend>ajout d'un match</legend>
									<p class="first" id="container" >
										<label for="jour">Jour</label>
										<input type="text" class="datepicker" id="jour" name="jour" size="8" maxlength="10" value=""/>
									</p>
									<p id="container" >
										<label for="categorie">Catégorie</label>
										<select name="categorie" id="categorie" required>
										<option value="">Sélectionnez une catégorie</option>
										<?php foreach($listeCategories as $categorie) {?>
										<option value="<?php echo $categorie->getId();?>"><?php echo $categorie->getLibelle(); ?></option>
										<?php } ?>
										</select>
									</p>
									<p id="container" class="containerEquipe" style="display: none;">
										<label for="equipe">Equipe</label>
										<select name="equipe" id="equipe">
										<?php foreach($listeEquipes as $equipe) {?>
										<option value="<?php echo $equipe->getId();?>"><?php echo $equipe->getLibelle(); ?></option>
										<?php } ?>
										</select>
									</p>
								</fieldset>
								<fieldset>
									<p id="container" class="containerLieu" style="display: none;">
										<label for="lieu">Lieu</label>
										<select name="lieu" id="lieu">
										<option label="Domicile" value="domicile">Domicile</option>
										<option label="Exterieur" value="exterieur">Exterieur</option>
										</select>
									</p>
									<p id="container" class="containerTypeCompetition" style="display: none;">
										<label for="competition">Compétition</label>

										<select name="competition" id="competition" required>
										<option value="">Sélectionnez une compétition</option>
										<?php foreach($listeCompetitions as $competition) {?>
										<option value="<?php echo $competition->getId();?>"><?php echo $competition->getLibelle(); ?></option>
										<?php } ?>
										</select>
									</p>
									<p id="container" class="containerAdversaire" style="display: none;">
										<label for="adversaire">Adversaire</label>
										<input type="text" name="adversaire" id="adversaire" value=""/>
									</p>
								</fieldset>
						</div>
								<!-- <p class="submit"><button type="submit">Enregistrer</button></p> -->

								<div class="featured-main-joueur-bas" style="padding-top: 4px;text-align: center;width: 100%; height: 280px;">
								<!-- <p class="" style="float: right; padding: 0; margin: 0 26px 0 25px; width: 314px;">-->
									<button type="submit" style="width: 107px; height:25px; line-height:25px; " value="Enregistrer">Enregistrer</button>
									<button type="reset" id="reset" style="width: 107px; height:25px; line-height:25px; " value="Annuler">Annuler</button>
								<!-- </p>-->
								</div>


							</form>

						<!-- End Main Slide Item -->

						<div class="cl">&nbsp;</div>


					</div>
				</div>

				<!-- End Widget -->
			</div>
		</div>
	</div>
	<!-- End Heading -->

	<!-- Main -->
	<div id="main">
		<div class="shell">
			<div id="sidebar">

			</div>
			<div id="content">

			</div>
		</div>
	</div>
	<!-- End Main -->

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