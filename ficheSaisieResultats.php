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
	$login = $_SESSION['login'];
	if (!empty($login)) {
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
					
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>


						<!-- Main Slide Item -->
						<div class="featured-main">
							<?php
								$login = "";
								$listeProchainesRencontres = array();
							
								if (isset($_SESSION['session_started'])) {
									// une session est ouverte, on récupère le login de l'utilisateur connecté
									if (isset($_SESSION['login'])) {
										$login = $_SESSION['login'];
									}
							
									if (isset($_SESSION['listeProchainesRencontres'])) {
										$listeProchainesRencontres = $_SESSION['listeProchainesRencontres'];
									}
								}
								if (!empty($listeProchainesRencontres)) { ?>
							<form action="EnregistrerResultats.php" method="post" style="width: 600px;">
								
							
							<?php foreach($listeProchainesRencontres as $prochain) { ?>
							
								<div>
									<small class="date"><?php echo date_format(new DateTime($prochain->getJour()), 'd/m/Y'); ?> : <?php echo $prochain->getLibelleCompetition(); ?></small>
									<p><?php echo $prochain->getEquipeDom(); ?> - <?php echo $prochain->getEquipeExt(); ?>
										<input type="hidden" id="idRencontre_<?php echo $prochain->getId(); ?>" name="idRencontre" value="<?php echo $prochain->getId(); ?>"/>
										<input type="text" id="scoreDom_<?php echo $prochain->getId(); ?>" name="scoreDom_<?php echo $prochain->getId(); ?>" size="2"/> - <input type="text" id="scoreExt_<?php echo $prochain->getId(); ?>" name="scoreExt_<?php echo $prochain->getId(); ?>" size="2"/>
									</p><br/>
								</div>
							<?php } ?>
							
							
							<input type="submit" value="Enregistrer" style="float: right;"/>
							
							</form>
							<?php } ?>
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