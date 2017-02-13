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
	<link rel="stylesheet" href="css/table-sorting.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/filtre.css" type="text/css" media="all" />

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tableATrier').dataTable({
				"bPaging":   false,
				"bLengthChange": false,
				"bInfo":     false,
		        "bFilter":     false,
		        "bPaginate":   false,
		        "bAutoWidth": false,
		        "bSort": true,
		        "oLanguage": {
					"sSearch": "Filtrer ",
					"sZeroRecords": "Aucun enregistrement disponible."
				},
				"aaSorting": [ [0,'asc'], [1,'asc']],
		        "aoColumns": [ null, null, { "sSortable": false }]
			});

			$("#ajoutEquipe").click(function(){
				document.location = "creationEquipe.php";
			});

			$(".fiche").click(function(){
				$idEquipe = $(this).prop('id').split('_')[1];
				document.location = "RechercherEquipe.php?id="+$idEquipe;
			});

			$(".suppression").click(function(){
				$idEquipe = $(this).prop('id').split('_')[1];
				document.location = "SupprimerEquipe.php?id="+$idEquipe;
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

	$listeEquipes = $_SESSION['listeEquipes'];
	$listeCategories = $_SESSION['listeCategories'];
	?>
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
					<ul>
						<li><div>

						<form id="filtre" name="filtre" action="ActionEquipe.php" method="post">
						<input type="hidden" name="methode" id="methode" value="filtre"/>
						<fieldset><legend>Affiner la recherche</legend>
						<p class="first" id="container" >
							<label for="categorie">Catégorie</label>
							<select name="categorie" id="categorie">
							<option label="Toutes" value="-1"  <?php echo ($_SESSION['categorieSelectionnee'] == -1 ? "selected" : "") ;?>>Toutes</option>
							<?php foreach($listeCategories as $categorie) {?>
							<option label="" value="<?php echo $categorie->getId();?>" <?php echo ($_SESSION['categorieSelectionnee'] == $categorie->getId() ? "selected" : "") ;?>><?php echo $categorie->getLibelle(); ?></option>
							<?php } ?>
							</select>
						</p>
						<p class="submit"><button type="submit" class="bouton">Rechercher</button></p>
						</fieldset>

						</form>


						</div></li>
					</ul>



					<!-- <div style="width: 100px;">
					<form id="formFiltre" name="formFiltre" action="ActionEquipe" method="post">
						<input type="hidden" name="methode" id="methode" value="filtre"/>
						<fieldset><legend>Profil de l'utilisateur</legend>
						<p class="first" id="container" >
							<label for="categorie">Libelle</label>
							<select name="categorie" id="categorie">
							<?php foreach($listeCategories as $categorie) {?>
							<option label="<?php echo $categorie->getLibelle(); ?>" value="<?php echo $categorie->getId();?>"/>
							<?php } ?>
							</select>
						</p>
					</form>
					</div>-->
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<!-- Main Slide Item -->
						<div class="featured-main-joueur" ">
							<div class="CSSTableGenerator" style="text-align: center; max-height: 235px; overflow: auto;">
								<table id="tableATrier">
									<thead>
									<tr>
										<th>Catégorie<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th >Libelle<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th>Liens</th>
									</tr>
									</thead>
									<?php foreach($listeEquipes as $equipe) { ?>
									<tr class="centre">
										<td><?php echo $equipe->getLibelleCategorie();?></td>
										<td><?php echo $equipe->getLibelle();?></td>
										<td>
											<img class="fiche" id="fiche_<?php echo $equipe->getId();?>" src="images/modify16.png" style="border: 0;cursor: pointer;" title="Modifier"/>
											<img class="suppression" id="suppr_<?php echo $equipe->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;" title="Supprimer"/>
										</td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>

						<div class="featured-main-joueur-bas" style="padding-top: 4px;text-align: center;width: 100%; height: 280px;">
							<button class="bouton" id="ajoutEquipe" type="submit">Ajouter une équipe</button>
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