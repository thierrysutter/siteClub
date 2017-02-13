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
		});
	</script>
</head>
<body>
	
	<?php
	/* Header */
	include("head.php");
	/* End Header */
	  
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
	?>

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
				<?php if ($user->getPhoto() != "") {?>
				<ul><li><div style="text-align: center;"><img id="visuPhoto" style="width: 150px; height: 200px; cursor: pointer;vertical-align: middle;" src="<?php echo $user->getPhoto(); ?>" /></div></li></ul>
				<?php } ?>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<div id="message" style="text-align: center; height: 5px; "></div><!-- div qui contiendra le message de retour -->
						<?php if (isset($_SESSION['messageKO'])) { ?>
						<div id="messageErreur" style="color: red; font-weight: bold; text-align: center;"><?php echo $_SESSION['messageKO']; ?></div>
						<?php } ?>
						<?php if (isset($_SESSION['messageOK'])) { ?>
						<div id="messageOK" style="color: green; font-weight: bold; text-align: center;"><?php echo $_SESSION['messageOK']; ?></div>
						<?php } ?>
						<!-- Main Slide Item -->
						<div class="featured-main-joueur">
							<form id="form1" action="EnregistrerProfil.php" method="post">
								<input type="hidden" name="methode" id="methode" value="modif"/>
								<input type="hidden" name="ancienLogin" id="ancienLogin"value="<?php echo $user->getLogin();?>"/>
								<fieldset><legend>Fiche profil de l'utilisateur</legend>
									<p class="first" id="container" >
										<label for="login">Login</label>
										<input type="text" name="login" id="login" readonly value="<?php echo $user->getLogin();?>"/>
									</p>
									<p id="container" >
										<label for="email">Email</label>
										<input type="text" name="email" id="email" value="<?php echo $user->getEmail();?>"/>
									</p>
									<p id="container" >
										<label for="nom">Nom</label>
										<input type="text" name="nom" id="nom" value="<?php echo $user->getNom();?>"/>
									</p>
									<p id="container" >
										<label for="prenom">Prenom</label>
										<input type="text" name="prenom" id="prenom" value="<?php echo $user->getPrenom();?>"/>
									</p>
									<p id="container" >
										<label for="dateNaissance">Date de naissance</label>
										<input type="text" class="datepicker" name="dateNaissance" id="dateNaissance" value="<?php echo date_format(new DateTime($user->getDateNaissance()), 'd/m/Y');?>"/>
									</p>
									
									<p id="container" >
										Profil "Super Admin"<input type="checkbox" class="checkbox" name="superAdmin" id="superAdmin" value="1" <?php echo ($user->isSuperAdmin() ? "checked" : ""); ?> disabled="disabled" />
									</p>
								</fieldset>
								<fieldset>
									<p id="container" >
										<label for="adresse">Adresse</label>
										<input type="text" name="adresse" id="adresse" value="<?php echo $user->getAdresse();?>"/>
										<label for="codePostal">Code postal</label>
										<input type="text" name="codePostal" id="codePostal" value="<?php echo $user->getCodePostal();?>"/>
										<label for="ville">Ville</label>
										<input type="text" name="ville" id="ville" value="<?php echo $user->getVille();?>"/>
									</p>
									<p id="container" >
										<label for="telFixe">Tel fixe</label>
										<input type="text" name="telFixe" id="telFixe" value="<?php echo $user->getTelFixe();?>"/>
									</p>
									<p id="container" >
										<label for="telPortable">Tel portable</label>
										<input type="text" name="telPortable" id="telPortable" value="<?php echo $user->getTelPortable();?>"/>
									</p>
									<!-- <p id="container" >
										<label for="mdpAnc">Ancien mot de passe</label>
										<input type="password" name="mdpAnc" id="mdpAnc" value=""/>
									</p>
									<p id="container" >
										<label for="mdpNew">Nouveau mot de passe</label>
										<input type="password" name="mdpNew" id="mdpNew" value=""/>
									</p>
									<p id="container" >
										<label for="mdpConfirm">Confirmer le mot de passe</label>
										<input type="password" name="mdpConfirm" id="mdpConfirm" value=""/>
									</p>-->
								</fieldset>
								
								<p class="submit"><button type="submit" id="submit">Enregistrer</button></p>


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