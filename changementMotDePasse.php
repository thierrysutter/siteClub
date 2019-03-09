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

	<meta charset="ISO-8859-1">
	<meta http-equiv="Cache-Control" content="max-age=600" />
	<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-clés" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<link rel="stylesheet" href="css/login.css" type="text/css" media="all" />

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
  			header("Location: ActionAccueil.php");
	  	}
	  } else {
	  	//header("Location: ActionAccueil.php");
  		header("Location: ActionAccueil.php");
	  }
	?>
	<?php include("head.php"); ?>
	<!-- End Navigation -->
		
	<div class="my-3">
	    <div class="container">
	      
	      <div class="row my-4">
	      	<div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
				<div id="messageConnexion" style="text-align: center; height: 5px; color: red; font-size: 14px; font-weight: bold; ">Pour plus de sécurité et obtenir l'accès à l'espace membre, merci de mettre à jour votre mot de passe.</div>
				<div id="message" style="text-align: center; height: 5px; "></div>
	      	</div>
	      </div>
	    
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	          <form action="#" method="post" name="connexionForm" id="connexionForm" >
	          	<input type="hidden" name="login" id="login" value="<?php echo $user->getLogin();?>"/>
	            	            
	            <div class="form-group row mx-5">
	              <label for="ancienMdp" class="col-sm-2 col-form-label">Ancien mot de passe</label>
	              <div class="col-sm-9">
	              	<input type="password" class="form-control w-100 form-control-md" name="ancienMdp" id="ancienMdp" value="" required/>
	              </div>
	            </div>
	            	            
	            <div class="form-group row mx-5">
	              <label for="nouveauMdp" class="col-sm-2 col-form-label">Nouveau mot de passe</label>
	              <div class="col-sm-9">
	              	<input type="password" class="form-control w-100 form-control-md" name="nouveauMdp" id="nouveauMdp" value="" required/>
	              </div>
	            </div>
	            	            
	            <div class="form-group row mx-5">
	              <label for="confirmMdp" class="col-sm-2 col-form-label">Confirmer le mot de passe</label>
	              <div class="col-sm-9">
	              	<input type="password" class="form-control w-100 form-control-md" name="confirmMdp" id="confirmMdp" value="" required/>
	              </div>
	            </div>
	            
	            <div class="form-group row mx-5">
	              <div class="col-sm-12 text-center">
	                <button type="submit" id="submit" class="btn btn-primary btn-lg active" >Enregistrer</button>
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