<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
require_once("config/config.php");
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
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$( ".datepicker" ).datepicker( {
				showOn: "button",
				buttonImage: "images/calendar16.png",
				buttonImageOnly: true,
				dateFormat: 'dd/mm/yyyy'
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
			
			$("#reset").click(function(){
	  			document.location="ActionUtilisateur.php";
		  	});
		});
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
  			header("Location: Deconnexion.php");
	  	}
	} else {
		//header("Location: ActionAccueil.php");
  		header("Location: Deconnexion.php");
	}
	$utilisateur = $_SESSION['utilisateur'];
	?>
	<?php include("head.php"); ?>
	<!-- End Navigation -->
	
	<div class="my-3">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	        	<form id="" action="EnregistrerUtilisateur.php" method="post" enctype="multipart/form-data">
	        		<input type="hidden" name="methode" id="methode" value="modif"/>
	        		<input type="hidden" name="ancienLogin" id="ancienLogin"value="<?php echo $utilisateur->getLogin();?>"/>
	        		<h3 class="mx-5 pb-3">Modifier un utilisateur</h3>
	        		<div class="form-group row mx-5">
				        <div class="col-sm-12 text-center">
				        	<img id="visuPhoto" src="<?php echo $utilisateur->getPhoto();?>" style="width: 150px; height: 200px; cursor: pointer;vertical-align: middle;" />
				        </div>
					</div>					
								        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="login">Login</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="login" id="login" value="<?php echo $utilisateur->getLogin();?>" required/>
			        	</div>
			        </div>
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="email">Email</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="email" name="email" id="email" value="<?php echo $utilisateur->getEmail();?>" required/>
			        	</div>
			        </div>
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="nom">Nom</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="nom" id="nom" value="<?php echo $utilisateur->getNom();?>" required/>
			        	</div>
			        </div>
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="prenom">Pr�nom</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="prenom" id="prenom" value="<?php echo $utilisateur->getPrenom();?>" required/>
			        	</div>
			        </div>
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="dateNaissance">Date de naissance</label>
			        	<div class="col-sm-3">
			        		<input class="form-control w-100 form-control-md datepicker" type="text" name="dateNaissance" id="dateNaissance" value="<?php echo date_format(new DateTime($utilisateur->getDateNaissance()), 'd/m/Y');?>" required/>
			        	</div>
			        </div>
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="superAdmin">Super admin</label>
			        	<div class="col-sm-1">
			        		<input class="form-control w-100 form-control-md" type="checkbox" name="superAdmin" id="superAdmin" value="1" <?php echo ($utilisateur->isSuperAdmin() ? "checked" : "");?>/>
			        	</div>
			        </div>
	        		
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="adresse">Adresse</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="adresse" id="adresse" value="<?php echo $utilisateur->getAdresse();?>" required/>
			        	</div>
			        </div>
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="codePostal">Code postal</label>
			        	<div class="col-sm-2">
			        		<input class="form-control w-100 form-control-md" type="text" name="codePostal" id="codePostal" value="<?php echo $utilisateur->getCodePostal();?>" required/>
			        	</div>
			        </div>
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="ville">Ville</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="ville" id="ville" value="<?php echo $utilisateur->getVille();?>" required/>
			        	</div>
			        </div>
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="telFixe">Tel fixe</label>
			        	<div class="col-sm-3">
			        		<input class="form-control w-100 form-control-md" type="text" name="telFixe" id="telFixe" value="<?php echo $utilisateur->getTelFixe();?>" required/>
			        	</div>
			        </div>
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="telPortable">Tel portable</label>
			        	<div class="col-sm-3">
			        		<input class="form-control w-100 form-control-md" type="text" name="telPortable" id="telPortable" value="<?php echo $utilisateur->getTelPortable();?>" required/>
			        	</div>
			        </div>
			        <!-- 
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="photo">Fichier photo</label>
			        	<div class="col-sm-11">
			        		<input id="photo" name="photo" class="file" type="file" accept="image/*">
			        	</div>
			        </div>
			         -->
			        <div class="form-group row mx-5">
		              <div class="col-sm-12 text-right">
		                <button type="submit" class="btn btn-primary btn-lg active" value="Enregistrer">Enregistrer</button>
		                <button type="reset" id="reset" class="btn btn-primary btn-lg active" value="Annuler">Annuler</button>
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