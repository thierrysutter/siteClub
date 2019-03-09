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
			$("#reset").click(function(){
	  			document.location="ActionEquipe.php";
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
	
	$equipe = $_SESSION['equipe'];
	$listeCategories = $_SESSION['listeCategories'];
	?>
	<?php
	  include("head.php");
	?>
	<!-- End Navigation -->
	
	<div class="my-3">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	        	<form action="EnregistrerEquipe.php" method="post">
	        		<input type="hidden" name="methode" id="methode" value="modif"/>
	        		<input type="hidden" name="id" id="id" value="<?php echo $equipe->getId();?>"/>
	        		<h3 class="mx-5 pb-3">Modifier une équipe</h3>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="libelle">Libelle</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="libelle" id="libelle" value="<?php echo $equipe->getLibelle();?>" required/>
			        	</div>
			        </div>
	        		
	        		<div class="form-group row mx-5">
	        			<label class="col-sm-1 col-form-label" for="categorie">Catégorie</label>
	        			<div class="col-sm-11">
			              <select class="form-control w-100 form-control-md" name="categorie" id="categorie" required>
							<?php foreach($listeCategories as $categorie) {?>
							<option value="<?php echo $categorie->getId();?>" <?php echo ($categorie->getId()==$equipe->getCategorie() ? "selected" : "");?>><?php echo $categorie->getLibelle(); ?></option>
							<?php } ?>
						  </select>
			            </div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="lienClassement">Lien vers classement de l'équipe</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="lienClassement" id="lienClassement" value="<?php echo $equipe->getLienClassement();?>"/>
			        	</div>
			        </div>
					
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