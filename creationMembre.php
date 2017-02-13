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

			$(".file").change(function(){
				// une fois le fichier choisi, afficher la photo dans son cadre pour visu
				if (document.getElementById("photo").files[0] != null && document.getElementById("photo").files[0] != "undefined") {
			        //$("#annulImage").css("display","");
			        var oFReader = new FileReader();
			        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

			        oFReader.onload = function (oFREvent) {
			            document.getElementById("visuPhoto").src = oFREvent.target.result;
			        };
		        } else {
		        	//$("#annulImage").css("display","none");
		        	//document.getElementById("visuPhoto").src = "";
			    }
			});

			$("#reset").click(function(){
	  			//document.location = "ActionMembre.php?methode=retour&filtreCategorie="+$("#filtreCategorie").val()+"&filtreFonction="+$("#filtreFonction").val()+"&filtrePoste="+$("#filtrePoste").val()+"&filtreNom="+$("#filtreNom").val();
	  			$("#formRetour").submit();
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

	$user = $_SESSION['user'];
	$listeCategories = $_SESSION['listeCategories'];
	$listeFonctions = $_SESSION['listeFonctions'];
	$listePostes = $_SESSION['listePostes'];
	if (!empty($user)) {
		include("menuAdmin.php");
	} else {
		header("Location: ActionAccueil.php");
	}
	?>
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
				<ul><li><div style="text-align: center;">
				<img id="visuPhoto" style="width: 150px; height: 200px; cursor: pointer;vertical-align: middle;" /></div></li></ul>
				</div>

				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<!-- Main Slide Item -->
						<div class="featured-main-joueur">
							<form id="formRetour" action="ActionMembre.php" method="post">
								<input type="hidden" name="methode" id="methode" value="retour"/>
								<!-- Récup des filtres précédents -->
								<input type="hidden" name="filtreCategorie" id="filtreCategorie" value="<?php echo $_GET['filtreCategorie'];?>"/>
								<input type="hidden" name="filtreFonction" id="filtreFonction" value="<?php echo $_GET['filtreFonction'];?>"/>
								<input type="hidden" name="filtrePoste" id="filtrePoste" value="<?php echo $_GET['filtrePoste'];?>"/>
								<input type="hidden" name="filtreNom" id="filtreNom" value="<?php echo ($_GET['filtreNom']!='' ? $_GET['filtreNom'] : '');?>"/>

							</form>


							<form id="form1" action="EnregistrerMembre.php" method="post" enctype="multipart/form-data">
								<input type="hidden" name="methode" id="methode" value="create"/>
								<input type="hidden" name="filtreCategorie" id="filtreCategorie" value="<?php echo $_GET['filtreCategorie'];?>"/>
								<input type="hidden" name="filtreFonction" id="filtreFonction" value="<?php echo $_GET['filtreFonction'];?>"/>
								<input type="hidden" name="filtrePoste" id="filtrePoste" value="<?php echo $_GET['filtrePoste'];?>"/>
								<input type="hidden" name="filtreNom" id="filtreNom" value="<?php echo ($_GET['filtreNom']!='' ? $_GET['filtreNom'] : '');?>"/>


								<fieldset><legend>Création d'un membre</legend>
								<p class="first" id="container" >
									<label for="nom">Nom</label>
									<input type="text" name="nom" id="nom" value="" required/>
								</p>
								<p id="container" >
									<label for="prenom">Prénom</label>
									<input type="text" name="prenom" id="prenom" value="" required/>
								</p>
								<p id="container" >
									<label for="categorie">Catégorie</label>
									<select name="categorie" id="categorie" required>
									<option label="" value=""/>
									<?php foreach($listeCategories as $categorie) {?>
									<option value="<?php echo $categorie->getId();?>"><?php echo $categorie->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<p id="container" >
									<label for="fonction">Fonction</label>
									<select name="fonction" id="fonction" required>
									<option label="" value=""/>
									<?php foreach($listeFonctions as $fonction) {?>
									<option value="<?php echo $fonction->getId();?>"><?php echo $fonction->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<p id="container" >
									<label for="poste">Poste</label>
									<select name="poste" id="poste">
									<option label="" value=""/>
									<?php foreach($listePostes as $poste) {?>
									<option value="<?php echo $poste->getId();?>"><?php echo $poste->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<p id="container" >
									<label for="dateNaissance">Date de naissance</label>
									<input type="text" class="datepicker" name="dateNaissance" id="dateNaissance" value=""/>
								</p>

								</fieldset>
								<fieldset>
								<p id="container" >
									<label for="email">Email</label>
									<input type="text" name="email" id="email" value=""/>
								</p>
								<p id="container" >
									<label for="numLicence">N° licence</label>
									<input type="text" name="numLicence" id="numLicence" value=""/>
								</p>
								<p id="container" >
									<label for="taille">Taille</label>
									<input type="text" name="taille" id="taille" value=""/>
								</p>
								<p id="container" >
									<label for="poids">Poids</label>
									<input type="text" name="poids" id="poids" value=""/>
								</p>
								<p id="container" >
									<label for="meilleurPied">Meilleur pied</label>
									<input type="text" name="meilleurPied" id="meilleurPied" value=""/>
								</p>
								<p id="container" >
									<label for="photo">Fichier photo</label>
									<input type="file" class="file" name="photo" id="photo"  accept="image/*"/><img id="annulImage" src="images/annul16.png" style="display: none;cursor: pointer;" title="Supprimer l'image">
								</p>
								</fieldset>
								<p class="" style="float: right; padding: 0; margin: 0 26px 0 25px; width: 314px;">
									<button type="submit" style="width: 107px; height:25px; line-height:25px; " value="Enregistrer">Enregistrer</button>
									<button type="reset" id="reset" style="width: 107px; height:25px; line-height:25px; " value="Annuler">Annuler</button>
								</p>


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