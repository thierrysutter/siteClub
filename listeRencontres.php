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
			/* méthode tri pour les colonnes contenant des dates */
			jQuery.fn.dataTableExt.oSort['date-asc']  = function(a,b) {
			    /*
			    var datea = a.split('/');
			    var dateb = b.split('/');

			    var x = (datea[2] + datea[1] + datea[0]) * 1;
			    var y = (dateb[2] + dateb[1] + dateb[0]) * 1;

			    return ((x < y) ? -1 : ((x > y) ?  1 : 0));
			    */
			    return ((a<b) ? -1 : ((a>b) ? 1 : 0));
			};

			jQuery.fn.dataTableExt.oSort['date-desc'] = function(a,b) {
			    /*
			    var datea = a.split('/');
			    var dateb = b.split('/');

			    var x = (datea[2] + datea[1] + datea[0]) * 1;
			    var y = (dateb[2] + dateb[1] + dateb[0]) * 1;

			    return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
				*/
				return ((a<b) ? 1 : ((a>b) ? -1 : 0));
			};

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
				"aaSorting": [ [0,'asc'] ],
		        "aoColumns": [ { "sType": "date-dmy", "aTargets": [ 0 ]  }, null, null, { "sSortable": false }, null,{ "sSortable": false }]
			});

			$( ".datepicker" ).datepicker( {
				showOn: "button",
				buttonImage: "images/calendar16.png",
				buttonImageOnly: true
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

	  		$("#ajoutRencontre").click(function(){
				document.location = "creationRencontre.php";
			});

			$(".fiche").click(function(){
				$idRencontre = $(this).prop('id').split('_')[1];
				document.location = "RechercherRencontre.php?id="+$idRencontre;
			});

			$(".convocation").click(function(){
				$idRencontre = $(this).prop('id').split('_')[1];
				document.location = "ActionConvocation.php?rencontre="+$idRencontre;
			});

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

			$(".suppression").click(function(){
				$idRencontre = $(this).prop('id').split('_')[1];
				document.location = "SupprimerRencontre.php?id="+$idRencontre;
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

	$listeRencontres = $_SESSION['listeRencontres'];
	$listeCategories = $_SESSION['listeCategories'];
    $listeEquipes = $_SESSION['listeEquipes'];
	$debut = $_SESSION['debut'];
	$fin = $_SESSION['fin'];
	$categorieSelectionnee = $_SESSION['categorieSelectionnee'];

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

						<form id="filtre" name="filtre" action="ActionRencontre.php" method="post">
						<input type="hidden" name="methode" id="methode" value="filtre"/>
						<fieldset><legend>Affiner la recherche</legend>
						<p class="first" id="container" >
							<label for="debut">Du</label>
							<input type="text" class="datepicker" id="debut" name="debut" size="8" maxlength="10" value="<?php echo $debut; ?>"/>
							<label for="fin">au</label>
							<input type="text" class="datepicker" id="fin" name="fin" size="8" maxlength="10" value="<?php echo $fin; ?>"/>
							<label for="categorie">Catégorie</label>
							<select name="categorie" id="categorie">
							<option label="Toutes" value="-1"  <?php echo ($categorieSelectionnee== -1 ? "selected" : "") ;?>>Toutes</option>
							<?php foreach($listeCategories as $categorie) {?>
							<option label="" value="<?php echo $categorie->getId();?>" <?php echo ($categorieSelectionnee == $categorie->getId() ? "selected" : "") ;?>><?php echo $categorie->getLibelle(); ?></option>
							<?php } ?>
							</select>
							
							<label for="equipe">Equipe</label>
                            <select name="equipe" id="equipe">
                            <option label="Toutes" value="-1"  <?php echo ($_SESSION['equipeSelectionnee'] == -1 ? "selected" : "") ;?>>Toutes</option>
                            <?php foreach($listeEquipes as $equipe) {?>
                            <option label="" value="<?php echo $equipe->getId();?>" <?php echo ($_SESSION['equipeSelectionnee'] == $equipe->getId() ? "selected" : "") ;?>><?php echo $equipe->getLibelle(); ?></option>
                            <?php } ?>
                            </select>
						</p>
						<p class="submit"><button type="submit" class="bouton">Rechercher</button></p>
						</fieldset>

						</form>


						</div></li>
					</ul>
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
									  <th>Jour<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
									  <th>Catégorie<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
									  <th>Compétition<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
									  <th>Adversaire<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
									  <th>Lieu<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
									  <th>Liens</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($listeRencontres as $rencontre) { ?>
									<tr class="centre">
										<td><?php echo date_format(new DateTime($rencontre->getJour()), 'd/m/Y');?></td>
										<td><?php echo $rencontre->getLibelleCategorie();?></td>
										<td><?php echo $rencontre->getLibelleCompetition();?></td>
										<td><?php echo ($rencontre->getEquipeDom() == "ST JULIEN" ? $rencontre->getEquipeExt() : $rencontre->getEquipeDom());?></td>
										<td><?php echo ($rencontre->getEquipeDom() == "ST JULIEN" ? "Domicile" : "Extérieur");?></td>
										<td>
											<img class="convocation" id="convocation_<?php echo $rencontre->getId();?>" src="images/rdv16.png" style="border: 0;cursor: pointer;" title="Convocation"/>
											<img class="fiche" id="fiche_<?php echo $rencontre->getId();?>" src="images/modify16.png" style="border: 0;cursor: pointer;" title="Modifier"/>
											<img class="cr" id="cr_<?php echo $rencontre->getId();?>" src="images/compteRendu16.png" style="border: 0;cursor: pointer;" title="Compte rendu"/>
											<img class="suppression" id="suppr_<?php echo $rencontre->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;" title="Supprimer"/>
										</td>
									</tr>
									<?php } ?>
								</tbody>
								</table>
							</div>
						</div>

						<div class="featured-main-joueur-bas" style="padding-top: 4px;text-align: center;width: 100%; height: 280px;">
							<button class="bouton" id="ajoutRencontre" type="submit">Ajouter une rencontre</button>
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