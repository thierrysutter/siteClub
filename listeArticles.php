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

	<meta charset="windows-1252">
	<meta http-equiv="Cache-Control" content="max-age=600" />
	<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#ajoutArticle").click(function(){
				document.location = "creationArticle.php";
			});

			$(".fiche").click(function(){
				$idArticle = $(this).prop('id').split('_')[1];
				$mode = $(this).prop('id').split('_')[2];
				document.location = "RechercherArticle.php?id="+$idArticle+"&mode="+$mode;
			});

			$(".activation").click(function(){
				$idArticle = $(this).prop('id').split('_')[1];
				document.location = "ActiverArticle.php?id="+$idArticle;
			});

			$(".annulation").click(function(){
				$idArticle = $(this).prop('id').split('_')[1];
				document.location = "AnnulerArticle.php?id="+$idArticle;
			});

			$(".suppression").click(function(){
				$idArticle = $(this).prop('id').split('_')[1];
				document.location = "SupprimerArticle.php?id="+$idArticle;
			});
		});
	</script>
</head>
<body class="w-75 mx-auto bg-light">
	<!-- Navigation Haut-->
	<?php
	  //include("menuHaut.php");
	
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
	<?php
	  if (isset($_SESSION['listeArticles']))
	  	$listeArticles = $_SESSION['listeArticles'];
	?>
	<?php include("head.php"); ?>
	<!-- End Navigation -->
	
  	
  	<div class="py-5">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12 " style="overflow: auto; max-height: 300px;">
  					<table class="table table-bordered table-striped table-hover table-sm table-responsive">
					    <thead class="thead-inverse">
					      <tr>
					        <th>#</th>
					        <th>Titre</th>
					        <th>Auteur</th>
					        <th>Date</th>
					        <th>Statut</th>
					        <th>Actions</th>
					      </tr>
					    </thead>
					    <tbody>
					    <?php foreach($listeArticles as $article) { ?>
					      <tr>
					      	<th scope="row"><?php echo $article->getId();?></th>
					        <td><?php echo $article->getTitre();?></td>
					        <td><?php echo $article->getAuteur();?></td>
							<td><?php echo date_format(new DateTime($article->getDateParution()), 'd/m/Y H:i:s');?></td>
							<td><?php echo ($article->getStatut()==1 ? "En ligne" : "D�sactiv�" );?></td>
							<td>
								<?php if ($user != null && (strtoupper($user->getLogin()) == strtoupper($article->getAuteur())) || $user->isSuperAdmin()) {?>
								<img class="fiche" id="fiche_<?php echo $article->getId();?>_modif" src="images/modify16.png" style="border: 0;cursor: pointer;" title="Modifier"/>
								<?php } else { ?>
								<img class="fiche" id="fiche_<?php echo $article->getId();?>_visu" src="images/loupe16.png" style="border: 0;cursor: pointer;" title="Lire"/>
								<?php } ?>
								<?php if ($article->getStatut() == 0) {?>
								<img class="activation" id="activ_<?php echo $article->getId();?>" src="images/valid16.png" style="border: 0;cursor: pointer;" title="Activer"/>
								<?php } else {?>
								<img class="annulation" id="annul_<?php echo $article->getId();?>" src="images/annul16.png" style="border: 0;cursor: pointer;" title="Annuler"/>
								<?php } ?>
								<?php if ($user->isSuperAdmin()) {?>
								<img class="suppression" id="suppr_<?php echo $article->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;" title="Supprimer"/>
								<?php }?>
							</td>
					      </tr>
					    <?php } ?>
					    </tbody>
  					</table>
  				</div>
  			</div>
  			
  			<div class="row text-center py-4">
		      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		          <!-- <button class="btn w-50 mx-auto btn-lg btn-block active btn-success" href="" id="ajoutArticle" type="submit">Ajouter un article</button> -->
		          <input type="button" id="ajoutArticle" class="btn btn-success btn-lg active" value="Ajouter un article"/>
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