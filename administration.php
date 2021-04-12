<?php
ob_start();
session_start();
$user = null;
if (isset($_SESSION['session_started'])) {
	// une session est ouverte, on r�cup�re le login de l'utilisateur connect�
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
		header("Location: ActionProfil.php");
	}
}


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
	<link rel="stylesheet" href="css/login.css" type="text/css" media="all" />

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script>
	$(document).ready( function () {
		$("#login").focus();

		$("#oubli").submit( function() {
			// appel d'une action qui va g�n�rer un nouveau mot de passe et l'envoyer par mail
		});
		
		$("#connexionForm").submit( function() {	// � la soumission du formulaire
			$.ajax({ // fonction permettant de faire de l'ajax
			   type: "POST", // methode de transmission des donn�es au fichier php
			   url: "ActionLogin.php", // url du fichier php
			   data: "login="+$("#login").val()+"&password="+$("#password").val(), // donn�es � transmettre
			   success: function(msg){ // si l'appel a bien fonctionn�
					if(msg == 0) // si la connexion en php a fonctionn�e mais l'utilisateur doit changer son mdp
					{
						//$("div#message").html("<span id=\"confirmMsg\" style=\"color: green; text-align: center;\">Vous &ecirc;tes maintenant connect&eacute;.</span>");
						document.location = "ActionChangementMotDePasse.php";
					}
					if(msg == 1) // si la connexion en php a fonctionn�e mais l'utilisateur doit changer son mdp
					{
						$("div#message").html("<img src=\"images/interdit16.gif\" style=\"float:left;\" />&nbsp;Votre compte est verouille. Veuillez contactez l'administrateur.");
					}
				    if(msg == 2) // si la connexion en php a fonctionn�e
					{
				    	// on affiche un message de bienvenue � la place
				    	//$("div#message").html("<span id=\"confirmMsg\" style=\"color: green; text-align: center;\">Vous &ecirc;tes maintenant connect&eacute;.</span>");
						
						//redirection vers la page de profil de l'utilisateur
						document.location = "ActionProfil.php";
					}
					else // si la connexion en php n'a pas fonctionn�e
					{
						// on affiche un message d'erreur dans le span pr�vu � cet effet
						$("div#message").html("Erreur lors de la connexion, veuillez v&eacute;rifier votre login et votre mot de passe.");
					}
			   },
			   error: function(){
				   // on affiche un message d'erreur dans le span pr�vu � cet effet
				   $("div#message").html("Erreur lors de la connexion, merci de reessayer ulterieurement.");
			   }
			});
			return false; // permet de rester sur la m�me page � la soumission du formulaire
		});
	});

	</script>

</head>
<body >
	<!-- Header -->
	<?php
	  include("head.php");
	?>
	<!-- End Header -->

	<!-- Navigation Haut-->
	<?php
	  include("menuHaut.php");
	?>
	<!-- End Navigation -->
	
	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
					<ul>
					    <!-- <li><div class="link"><a href="ActionAccueil.php">Accueil</a></div></li>-->
					    <li><div style="text-align: center;"><img id="blason" style="width: 200px; height: 250px; cursor: pointer;vertical-align: middle;" src="images/logo.svg" /></div></li>
					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<div id="message" style="text-align: center; color: red;"></div><!-- div qui contiendra le message de retour -->
							
						<div class="featured-main-joueur">
							<div id="container">
						        <form name="connexionForm" id="connexionForm" action="#">
						            <label for="login">Login:</label>
						            <input type="text" id="login" name="login" required>
						            <label for="password">Mot de passe:</label>
						            <input type="password" id="password" name="password" required>
						            <!-- <div style="margin-top: 15px;"><p><a id="oubli" href="#">Mot de passe oubli� ?</a></p></div> -->
						            <div id="lower">
						            	<input type="submit" class="bouton" value="Connexion">
						            </div><!--/ lower-->
						        </form>
						         
						    </div><!--/ container-->
						</div>
						<div class="featured-main-joueur-bas">

						</div>
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