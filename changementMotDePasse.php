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
	<link rel="stylesheet" href="css/login.css" type="text/css" media="all" />

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#submit").click( function() {	// à la soumission du formulaire
				
				if (validFormulaire()) {
					$.ajax({ // fonction permettant de faire de l'ajax
					   type: "POST", // methode de transmission des données au fichier php
					   url: "EnregistrerMotDePasse.php", // url du fichier php
					   data: "login="+$("#login").val()+"&ancienMdp="+$("#ancienMdp").val()+"&nouveauMdp="+$("#nouveauMdp").val()+"&confirmMdp="+$("#confirmMdp").val(), // données à transmettre
					   success: function(msg){ // si l'appel a bien fonctionné
						    
							$("div#message").html(msg);
							document.connexionForm.reset();
							document.location = "ActionProfil.php";
					   },
					   error: function(){
						   // on affiche un message d'erreur dans le span prévu à cet effet
						   $("div#message").html("Erreur lors de la connexion, merci de reessayer ulterieurement.");
					   }
					});
					return false; // permet de rester sur la même page à la soumission du formulaire
				}
				return false;
			});
		});

		function validFormulaire() {
			$login = $("#login").val();
			$ancienMdp = $("#ancienMdp").val();
			$nouveauMdp = $("#nouveauMdp").val();
			$confirmMdp = $("#confirmMdp").val();

			if ($login == "") {
				return false;
			}

			if ($ancienMdp == "") {
				alert("Vous devez renseigner votre ancien mot de passe");
				$("#ancienMdp").focus();
				return false;
			}

			if ($nouveauMdp == "") {
				alert("Vous devez renseigner votre nouveau mot de passe");
				$("#nouveauMdp").focus();
				return false;
			}

			if ($confirmMdp == "") {
				alert("Vous devez confirmer votre nouveau mot de passe");
				$("#confirmMdp").focus();
				return false;
			}

			if ($nouveauMdp != $confirmMdp) {
				alert("Mot de passe erroné");
				$("#confirmMdp").focus();
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
	
	<?php
	  /* Header */
	  include("head.php");
	  /* End Header */
	  
	  session_start();
	  if (isset($_SESSION['session_started'])) {
	  	$user = $_SESSION['user'];
	  	if (!empty($user)) {
	  		/* Navigation Haut */
	  		include("menuAdmin.php");
	  		/* End Navigation */
	  	} else {
	  		header("Location: ActionAccueil.php");
	  	}
	  } else {
	  	header("Location: ActionAccueil.php");
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
						<div id="messageConnexion" style="text-align: center; height: 5px; color: red; font-size: 14px; font-weight: bold; ">Pour plus de sécurité et obtenir l'accès à l'espace membre, merci de mettre à jour votre mot de passe.</div>
						<div id="message" style="text-align: center; height: 5px; "></div><!-- div qui contiendra le message de retour -->
						<!-- Main Slide Item -->
						<div class="featured-main-joueur">
							<div id="container">
						        <form name="connexionForm" id="connexionForm" method="POST" action="#">
						        	<input type="hidden" name="login" id="login" value="<?php echo $user->getLogin();?>"/>
						            <label for="ancienMdp">Ancien mot de passe</label>
									<input type="password" name="ancienMdp" id="ancienMdp" value="" required/>
						            <label for="nouveauMdp">Nouveau mot de passe</label>
									<input type="password" name="nouveauMdp" id="nouveauMdp" value="" required/>
									<label for="confirmMdp">Confirmer le mot de passe</label>
									<input type="password" name="confirmMdp" id="confirmMdp" value="" required/>
						            <div id="lower">
						            	<input type="submit" id="submit" value="Enregistrer">
						            </div><!--/ lower-->
						        </form>
						    </div><!--/ container-->
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