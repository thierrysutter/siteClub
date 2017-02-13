<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
require_once("config/config.php");

session_start();

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
	<link rel="stylesheet" href="css/resultat.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/filtre.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>

	<script type="text/javascript" src="js/jquery/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">


		$(document).ready(function(){
			/* méthode tri pour les colonnes contenant des dates */
			jQuery.extend( jQuery.fn.dataTableExt.oSort, {
			    "date-dmy-pre": function ( a ) {
			        if (a == null || a == "") {
			            return 0;
			        }
			        var date = a.split('/');
			        return (date[2] + date[1] + date[0]) * 1;
			    },

			    "date-dmy-asc": function ( a, b ) {
			        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
			    },

			    "date-dmy-desc": function ( a, b ) {
			        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
			    }
			} );

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
				"aaSorting": [ [0,'asc']],
		        "aoColumns": [ { "sType": "date-dmy", "aTargets": [ 0 ] }, null, null, { "sSortable": false }, { "sSortable": false },{ "sSortable": false }]
			});



			/*$(".cr").click(function(){
				$idRrencontre = $(this).prop('id').split('_')[1];
				document.location = "RechercherCompteRendu.php?id="+$idRrencontre;
			});*/

			$(".cr").click(function(){
				$.ajax({ // fonction permettant de faire de l'ajax
				   type: "POST", // methode de transmission des données au fichier php
				   url: "AfficherPopupCompteRendu.php", // url du fichier php
				   data: {id : $(this).prop('id').split('_')[1], mode : "popup"}, // données à transmettre
				   dataType: 'json', // JSON
				   success: function(compteRendu){ // si l'appel a bien fonctionné
					   //$("#imageArticlePopup").prop("src", "images/article/"+article.photo);
					   $("#texteCompteRenduPopup").val(compteRendu.texte);

					   $("#dialogCompteRendu").dialog({
				  			height: 425,
				  			width: 705,
				  			modal: true,
				  			title: compteRendu.titre,
				  			buttons: {
				  				Fermer: function() {
				  					$(this).dialog( "close" );
				  				},
				  				Enregistrer: function() {
									enregistrerCompteRendu(compteRendu.id);
				  					$(this).dialog( "close" );
				  				}
				  			}
				  		});

				   },
				   error: function(){
					   // on affiche un message d'erreur dans le span prévu à cet effet

				   }
				});
			});
		});

		function enregistrerCompteRendu(idRencontre) {

			$.ajax({ // fonction permettant de faire de l'ajax
			   type: "POST", // methode de transmission des données au fichier php
			   url: "EnregistrerCompteRendu.php", // url du fichier php
			   data: {id: idRencontre, texte : $("#texteCompteRenduPopup").val(), methode: "create", zone : "compteRendu"}, // données à transmettre
			   dataType: 'json', // JSON
			   success: function(){
				   // si l'appel a bien fonctionné
				   alert("Modification enregistrée");
			   },
			   error: function(){
				   // on affiche un message d'erreur dans le span prévu à cet effet

			   }
			});
		}
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
	$user = null;
	$listeProchainesRencontres = array();

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

	if (isset($_SESSION['listeProchainesRencontres'])) {
		$listeProchainesRencontres = $_SESSION['listeProchainesRencontres'];
	}
	$listeCategories = $_SESSION['listeCategories'];
	?>
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
				<?php if ($user->isSuperAdmin()) { ?>
					<ul>
						<li><div>
						<form id="filtre" name="filtre" action="ActionResultat.php" method="post">
						<input type="hidden" name="methode" id="methode" value="filtre"/>
						<fieldset><legend>Affiner la recherche</legend>
						<p class="first" id="filtreCategorie" >
							<label for="categorie">Catégorie</label>
							<select name="categorie" id="categorie">
							<option label="" value="-1"  <?php echo ($_SESSION['filtreCategorie'] == -1 ? "selected" : "") ;?>>Toutes</option>
							<?php foreach($listeCategories as $categorie) {?>
							<option label="" value="<?php echo $categorie->getId();?>" <?php echo ($_SESSION['filtreCategorie'] == $categorie->getId() ? "selected" : "") ;?>><?php echo $categorie->getLibelle(); ?></option>
							<?php } ?>
							</select>
						</p>

						<p class="submit"><button type="submit"  class="bouton">Rechercher</button></p>
						</fieldset>

						</form>
						</div></li>
					</ul>
					<?php } ?>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<div id="message" style="text-align: center; height: 5px; "></div><!-- div qui contiendra le message de retour -->


						<!-- Main Slide Item -->
						<div class="featured-main-joueur">

							<form id="formRes" name="formRes" action="EnregistrerResultats.php" method="post">
							<input type="hidden" name="methode" id="methode" value="modif"/>

							<div class="CSSTableGenerator" style="text-align: center; max-height: 235px;overflow: auto;">
								<table id="tableATrier" style="">
								<thead>
									<tr>
										<th style="width:10%;">Jour<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th style="width:10%;">Catégorie<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th style="width:30%;">Compétition<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<!--<th>Adversaire</th>-->
										<th style="width:30%;">Rencontre<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th style="width:15%;">Score</th>
										<th style="width:5%;">CR</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($listeProchainesRencontres as $prochain) { ?>
									<tr class="centre">
										<td><?php echo date_format(new DateTime($prochain->getJour()), 'd/m/Y');?></td>
										<td><?php echo $prochain->getLibelleCategorie();?></td>
										<td><?php echo $prochain->getLibelleCompetition();?></td>
										<!--<td><?php echo ($prochain->getEquipeDom() == "ST JULIEN" ? $prochain->getEquipeExt() : $prochain->getEquipeDom());?></td>-->

										<td><?php echo $prochain->getEquipeDom(); ?> - <?php echo $prochain->getEquipeExt(); ?></td>

										<td>
											<input type="hidden" id="idRencontre_<?php echo $prochain->getId(); ?>" name="idRencontre" value="<?php echo $prochain->getId(); ?>" size="10"/>
											<input type="text" id="scoreDom_<?php echo $prochain->getId(); ?>" name="scoreDom_<?php echo $prochain->getId(); ?>" size="2"/> - <input type="text" id="scoreExt_<?php echo $prochain->getId(); ?>" name="scoreExt_<?php echo $prochain->getId(); ?>" size="2"/>
										</td>
										<td>
											<img class="cr" id="cr_<?php echo $prochain->getId();?>" src="images/compteRendu20.png" title="Saisir le compte rendu du match" style="border: 0; cursor: pointer;" />
										</td>
									</tr>
									<?php } ?>
								</tbody>
								</table>
							</div>
							<p class="submit"><button type="submit" class="bouton" id="submit">Enregistrer</button></p>
							</form>



						<?php /*
							if (!empty($listeProchainesRencontres)) { ?>
							<form id="formRes" name="formRes" action="EnregistrerResultats.php" method="post">
								<input type="hidden" name="methode" id="methode" value="modif"/>
								<fieldset><legend>Saisie des résultats</legend>
									<?php foreach($listeProchainesRencontres as $prochain) { ?>
									<p id="container" >
										<label for="scoreDom_<?php echo $prochain->getId(); ?>" style="font-weight: bold;"><?php echo date_format(new DateTime($prochain->getJour()), 'd/m/Y'); ?> - <?php echo $prochain->getLibelleCompetition(); ?></label>
										<div style="margin-left: 10px;">
											<?php echo $prochain->getEquipeDom(); ?> - <?php echo $prochain->getEquipeExt(); ?>
											<input type="hidden" id="idRencontre_<?php echo $prochain->getId(); ?>" name="idRencontre" value="<?php echo $prochain->getId(); ?>" size="10"/>
											<input type="text" id="scoreDom_<?php echo $prochain->getId(); ?>" name="scoreDom_<?php echo $prochain->getId(); ?>" size="2"/> - <input type="text" id="scoreExt_<?php echo $prochain->getId(); ?>" name="scoreExt_<?php echo $prochain->getId(); ?>" size="2"/>
										</div>
									</p>
									<?php } ?>

								</fieldset>
								<p class="submit"><button type="submit" class="bouton" id="submit">Enregistrer</button></p>

						<?php } */ ?>
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

	<div id="dialogCompteRendu" style="display: none;">
		<div class="popup-featured-side"><div class="popup-featured-side-item"><div class="cl"></div>
	    <div ><textarea rows="20" cols="80" id="texteCompteRenduPopup"></textarea></div>
	    <div class="cl"></div>
		</div>
		</div>
	</div>

</body>
</html>
<?php
ob_end_flush();
?>