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
			$( ".datepicker" ).datepicker( {
				showOn: "button",
				buttonImage: "images/calendar16.png",
				buttonImageOnly: true,
				dateFormat: 'dd/mm/yy'
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

			/*$("#visuPhoto").click(function(){
				$("#photo").click();
			});

			$("#photo").change(function(){
				// une fois le fichier choisi, afficher la photo dans son cadre pour visu
				if (document.getElementById("photo").files[0] != null && document.getElementById("photo").files[0] != "undefined") {
			        $("#annulImage").css("display","");
			        var oFReader = new FileReader();
			        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

			        oFReader.onload = function (oFREvent) {
			            document.getElementById("visuPhoto").src = oFREvent.target.result;
			        };
		        } else {
		        	$("#annulImage").css("display","none");
		        	document.getElementById("visuPhoto").src = "";
			    }
			});*/
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

	$rencontre = $_SESSION['rencontre'];
	$listeCategories = $_SESSION['listeCategories'];
	$listeEquipes = $_SESSION['listeEquipes'];
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
						<div class="featured-main-joueur">
							<form id="form1" action="EnregistrerRencontre.php" method="post">
								<input type="hidden" name="methode" id="methode" value="modif"/>
								<input type="hidden" name="id" id="id" value="<?php echo $rencontre->getId();?>"/>
								<input type="hidden" name="competition" id="competition" value="<?php echo $rencontre->getCompetition();?>"/>
								<fieldset><legend>Modification d'un match</legend>
								<p class="first" id="container" >
									<label for="categorie">Catégorie</label>
									<select name="categorie" id="categorie">
									<?php foreach($listeCategories as $categorie) {?>
									<option label="" value="<?php echo $categorie->getId();?>" <?php echo ($categorie->getId()==$rencontre->getCategorie() ? "selected" : "");?>><?php echo $categorie->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<p id="container" >
									<label for="equipe">Equipe</label>
									<select name="equipe" id="equipe">
									<?php foreach($listeEquipes as $equipe) {?>
									<option label="" value="<?php echo $equipe->getId();?>" <?php echo ($equipe->getId()==$rencontre->getEquipe() ? "selected" : "");?>><?php echo $equipe->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<p id="container" >
									<label for=jour>Jour</label>
									<input type="text" class="datepicker" name="jour" id="jour" value="<?php echo date_format(new DateTime($rencontre->getJour()), 'd/m/Y');?>"/>
								</p>
								<p id="container" >
									<label for="lieu">Lieu</label>
									<select name="lieu" id="lieu">
									<option label="Domicile" value="domicile" <?php echo ($rencontre->getEquipeDom() == 'ST JULIEN' ? "selected" : "");?>>Domicile</option>
									<option label="Exterieur" value="exterieur" <?php echo ($rencontre->getEquipeExt() == 'ST JULIEN' ? "selected" : "");?>>Exterieur</option>
									</select>
								</p>
								<!-- <p id="container" >
									<label for="competition">Type</label>
									<select name="competition" id="competition">
										<option label="Choisissez..." value=""/>
										<option label="Coupe de France" value="COUPE DE FRANCE"/>
										<option label="Coupe de Lorraine" value="COUPE DE LORRAINE"/>
										<option label="Coupe de Moselle" value="COUPE DE MOSELLE"/>
										<option label="Coupe (Foot réduit)" value="COUPE"/>
										<option label="Amical" value="AMICAL"/>
										<option label="Tournoi" value="TOURNOI"/>
										<option label="Autre" value="AUTRE"/>
									</select>
								</p>-->
								<p id="container" >
									<label for="adversaire">Libelle</label>
									<input type="text" name="adversaire" id="adversaire" value="<?php echo ($rencontre->getEquipeDom() == "ST JULIEN" ? $rencontre->getEquipeExt() : $rencontre->getEquipeDom()) ;?>"/>
								</p>

								</fieldset>

								<p class="submit"><button type="submit">Enregistrer</button></p>

							</form>
						</div>
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