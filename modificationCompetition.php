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
	  			document.location="ActionCompetition.php";
		  	});

			var $saisons = $('#saison');
		    var $categories = $('#categorie');
		    var $equipes = $('#equipe');
		    var $divisions = $('#division');
		    var $typeCompetitions = $('#typeCompetition');

		 // à la sélection d une catégorie dans la liste
		    $categories.on('change', function() {
		    	$('.containerEquipe').css("display", "none");
		    	$('.containerTypeCompetition').css("display", "none");
		    	$('.containerDivision').css("display", "none");
		        var val = $(this).val(); // on récupère la valeur de la catégorie
		        if(val != '') {
		            $equipes.empty(); // on vide la liste des équipes
		            $typeCompetitions.empty(); // on vide la liste des équipes

		            $.ajax({
		                url: 'RechercherEquipe.php',
		                data: 'categorie='+ val, // on envoie $_GET['categorie']
		                dataType: 'json',
		                success: function(json) {
		                    $.each(json, function(index, value) {
		                        $equipes.append('<option value="'+ index +'">'+ value +'</option>');
		                    });
		                    $('.containerEquipe').css("display", "");
		                },
		                error: function(){
			                alert("erreur");
		                }
		            });

		            $.ajax({
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
		            });
		        }
		    });

		 	// à la sélection d une catégorie dans la liste
		    $typeCompetitions.on('change', function() {
		        var idTypeCompetition = $(this).val(); // on récupère la valeur du type de compétition
		        var libelleTypeCompetition = $("#typeCompetition option:selected").text(); // on récupère la valeur du type de compétition
		        var idCategorie = $categories.val(); // on récupère la valeur de la catégorie
		        if(idCategorie != "" && libelleTypeCompetition == "CHAMPIONNAT") {
		            $divisions.empty(); // on vide la liste des divisions
		            $.ajax({
		                url: 'RechercherDivision.php',
		                data: 'categorie='+ idCategorie, // on envoie $_GET['categorie']
		                dataType: 'json',
		                success: function(json) {
		                	$divisions.append('<option value="0">Sélectionnez une division</option>');
		                    $.each(json, function(index, value) {
		                        $divisions.append('<option value="'+ index +'">'+ value +'</option>');
		                    });
		                    $('.containerDivision').css("display", "");
		                },
		                error: function(){
			                alert("erreur");
		                }
		            });
		        }
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
	$listeSaisons = $_SESSION['listeSaisons'];
	$listeDivisions= $_SESSION['listeDivisions'];
	$listeTypeCompetitions= $_SESSION['listeTypeCompetitions'];

	$competition = $_SESSION['competition'];
	?>
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav"></div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<!-- Main Slide Item -->
						<form id="form1" action="EnregistrerCompetition.php" method="post">
						<div class="featured-main-joueur">

								<input type="hidden" name="methode" id="methode" value="modif"/>
								<input type="hidden" name="id" id="id" value="<?php echo $competition->getId();?>"/>
								<fieldset><legend>Modification d'une compétition</legend>
								<p class="first" id="container" >
									<label for="saison">Saison</label>
									<select name="saison" id="saison">
									<?php foreach($listeSaisons as $saison) {?>
									<option value="<?php echo $saison->getId();?>" <?php echo ($saison->getId()==$competition->getSaison() ? "selected" : "");?> ><?php echo $saison->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<p id="container" >
									<label for="libelle">Libelle</label>
									<input type="text" name="libelle" id="libelle" value="<?php echo $competition->getLibelle();?>"/>
								</p>
								<p id="container" >
									<label for="categorie">Catégorie</label>
									<select name="categorie" id="categorie">
									<?php foreach($listeCategories as $categorie) {?>
									<option value="<?php echo $categorie->getId();?>" <?php echo ($categorie->getId()==$competition->getCategorie() ? "selected" : "");?>><?php echo $categorie->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								</fieldset>
								<fieldset>
								<p id="container" class="containerEquipe" >
									<label for="equipe">Equipe</label>
									<select name="equipe" id="equipe">
									<?php foreach($listeEquipes as $equipe) {?>
									<option value="<?php echo $equipe->getId();?>" <?php echo ($equipe->getId()==$competition->getEquipe() ? "selected" : "");?>><?php echo $equipe->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<p id="container" class="containerTypeCompetition">
									<label for="typeCompetition">Type</label>
									<select name="typeCompetition" id="typeCompetition">
									<?php foreach($listeTypeCompetitions as $typeCompetition) {?>
									<option value="<?php echo $typeCompetition->getId();?>" <?php echo ($typeCompetition->getId()==$competition->getTypeCompetition() ? "selected" : "");?>><?php echo $typeCompetition->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<p id="container" class="containerDivision" style="display: <?php echo ($competition->getLibelleTypeCompetition()=='CHAMPIONNAT' ? '' : 'none'); ?>;">
									<label for="division">Division</label>
									<select name="division" id="division">
									<option value="0">Sélectionnez une division</option>
									<?php foreach($listeDivisions as $division) {?>
									<option value="<?php echo $division->getId();?>" <?php echo ($division->getId()==$competition->getDivision() ? "selected" : "");?>><?php echo $division->getLibelleCategorie()." - ".$division->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								</fieldset>
								<!-- <p class="" style="float: right; padding: 0; margin: 0 26px 0 25px; width: 314px;">
									<button type="submit" style="width: 107px; height:25px; line-height:25px; " value="Enregistrer">Enregistrer</button>
									<button type="reset" id="reset" style="width: 107px; height:25px; line-height:25px; " value="Annuler">Annuler</button>
								</p>
								-->
						</div>
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