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
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$( ".datepicker" ).datepicker( {
				/*showOn: "button",
				buttonImage: "images/calendar16.png",
				buttonImageOnly: true,
				*/
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
	  		//include("menuHaut.php");
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
	<?php include("head.php"); ?>
	
  	
  	<div class="py-5">
	    <div class="container">
	      <div class="row">
	      	<div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
		      	<div id="message" style="text-align: center; height: 5px; "></div><!-- div qui contiendra le message de retour -->
				<?php if (isset($_SESSION['messageKO'])) { ?>
				<div id="messageErreur" style="color: red; font-weight: bold; text-align: center;"><?php echo $_SESSION['messageKO']; ?></div>
				<?php } ?>
				<?php if (isset($_SESSION['messageOK'])) { ?>
				<div id="messageOK" style="color: green; font-weight: bold; text-align: center;"><?php echo $_SESSION['messageOK']; ?></div>
				<?php } ?>
	      	</div>
	      </div>
	    
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	          <form action="EnregistrerProfil.php" method="post" name="form1" >
            	<div class="form-group row mx-5">
            		<img class="d-block img-fluid mx-auto rounded h-25 w-25" src="<?php echo ($user->getPhoto() != '') ? $user->getPhoto() : 'images\silhouette.jpeg';?>">
            	</div>
	            <div class="form-group row mx-5">
	              <label for="inputLogin" class="col-sm-1 col-form-label">Login</label>
	              <div class="col-sm-5">
	                <input type="text" class="form-control w-100 form-control-md" id="inputLogin" name="login" placeholder="Login" value="<?php echo $user->getLogin();?>">
	              </div>
	              <label for="inputAdresse" class="col-sm-1 col-form-label">Adresse</label>
	              <div class="col-sm-5">
	                <input type="text" class="form-control w-100 form-control-md" id="inputAdresse" name="adresse" placeholder="Adresse" value="<?php echo $user->getAdresse();?>">
	              </div>
	            </div>
	            <div class="form-group row mx-5">
	              <label for="inputEmail" class="col-form-label col-sm-1">Email</label>
	              <div class="col-sm-5">
	                <input type="email" class="form-control w-100 form-control-md" id="inputEmail" name="email" placeholder="Email" value="<?php echo $user->getEmail();?>">
	              </div>
	              <label for="inputCodePostal" class="col-form-label col-sm-1">Code postal</label>
	              <div class="col-sm-5">
	                <input type="text" class="form-control w-100 form-control-md" id="inputCodePostal" name="codePostal" placeholder="Code postal" value="<?php echo $user->getCodePostal();?>">
	              </div>
	            </div>
	            <div class="form-group row mx-5">
	              <label class="col-form-label col-sm-1" for="inputNom">Nom</label>
	              <div class="col-sm-5">
	                <input type="text" class="form-control w-100 form-control-md" id="inputNom" name="nom" placeholder="Nom" value="<?php echo $user->getNom();?>">
	              </div>
	              <label class="col-form-label col-sm-1" for="inputVille">Ville</label>
	              <div class="col-sm-5">
	                <input type="text" class="form-control w-100 form-control-md" id="inputVille" name="ville" placeholder="Ville" value="<?php echo $user->getVille();?>">
	              </div>
	            </div>
	            <div class="form-group row mx-5">
	              <label for="inputPrenom" class="col-form-label col-sm-1">Prénom</label>
	              <div class="col-sm-5">
	                <input type="text" class="form-control w-100 form-control-md" id="inputPrenom" name="prenom" placeholder="Prénom" value="<?php echo $user->getPrenom();?>">
	              </div>
	              <label for="inputTelFixe" class="col-form-label col-sm-1">Tél. fixe</label>
	              <div class="col-sm-5">
	                <input type="text" class="form-control w-100 form-control-md" id="inputTelFixe" name="telFixe" placeholder="Téléphone fixe" value="<?php echo $user->getTelFixe();?>">
	              </div>
	            </div>
	            <div class="form-group row mx-5">
	              <label for="inputNom" class="col-form-label col-sm-1">Date de naissance</label>
	              <div class="col-sm-5">
	                <input type="text" class="datepicker form-control w-100 form-control-md" id="inputDateNaissance" name="dateNaissance" placeholder="Date de naissance" value="<?php echo date_format(new DateTime($user->getDateNaissance()), 'd/m/Y');?>">
	              </div>
	              <label for="inputTelPort" class="col-form-label col-sm-1">Tél. portable</label>
	              <div class="col-sm-5">
	                <input type="text" class="form-control w-100 form-control-md" id="inputTelPort" name="telPortable" placeholder="Téléphone portable" value="<?php echo $user->getTelPortable();?>">
	              </div>
	            </div>
	            <div class="form-group row mx-5">
	              <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12 text-right">
	                <button type="submit" class="btn btn-primary active">Enregistrer</button>
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