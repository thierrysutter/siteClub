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
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>


	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
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

	  if (isset($_SESSION['listeArticles']))
	  	$listeArticles = $_SESSION['listeArticles'];
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
						<div class="featured-main-joueur" >
							<div class="CSSTableGenerator" style="text-align: center; max-height: 240px; overflow: auto;">
								<table >
									<tr><th>Titre</th><th>Auteur</th><th>Date parution</th><th>Statut</th><th>Liens</th></tr>
									<?php foreach($listeArticles as $article) { ?>
									<tr class="centre">
										<td><?php echo $article->getTitre();?></td>
										<td><?php echo $article->getAuteur();?></td>
										<td><?php echo date_format(new DateTime($article->getDateParution()), 'd/m/Y H:i:s');?></td>
										<td><?php echo ($article->getStatut()==1 ? "En ligne" : "Désactivé" );?></td>
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
								</table>
							</div>
						</div>

						<div class="featured-main-joueur-bas" style="padding-top: 4px;text-align: center;width: 100%; height: 280px;">
							<button class="bouton" id="ajoutArticle" type="submit">Ajouter un article</button>
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