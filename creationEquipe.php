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
						<div class="featured-main-joueur">
							<form id="form1" action="EnregistrerEquipe.php" method="post">
								<input type="hidden" name="methode" id="methode" value="create"/>
								<fieldset><legend>Profil de l'utilisateur</legend>
								<p class="first" id="container" >
									<label for="libelle">Libelle</label>
									<input type="text" name="libelle" id="libelle" value=""/>
								</p>
								<p id="container" >
									<label for="categorie">Catégorie</label>
									<select name="categorie" id="categorie">
									<?php foreach($listeCategories as $categorie) {?>
									<option value="<?php echo $categorie->getId();?>"><?php echo $categorie->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<!--
								<p id="container" >
									<label for="entraineur">Entraineur</label>
									<input type="text" name="entraineur" id="entraineur" value=""/>
								</p>
								<p id="container" >
									<label for="adjoint">Adjoint</label>
									<input type="text" name="adjoint" id="adjoint" value=""/>
								</p>
								<p id="container" >
									<label for="delegue">Délégué</label>
									<input type="text" name="delegue" id="delegue" value=""/>
								</p>
								-->
								<p id="container" >
									<label for="lienClassement">Lien vers classement de l'équipe</label>
									<input type="text" name="lienClassement" id="lienClassement" value=""/>
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