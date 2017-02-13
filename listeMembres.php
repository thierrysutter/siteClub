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

	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/filtre.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/table-sorting.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/print.css" type="text/css" media="print" />

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.dataTables.min.js"></script>
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
				"aaSorting": [ [1,'asc'], [2,'asc'], [3,'asc'], [4,'asc']],
		        "aoColumns": [ { "sSortable": false }, null, null, null, null,{ "sSortable": false }]
			});

			$("#ajoutMembre").click(function(){

				// filtres
				$filtreCategorie = $("#filtreCategorie").val();
				$filtreFonction = $("#filtreFonction").val();
				$filtrePoste = $("#filtrePoste").val();
				$filtreNom = $("#filtreNom").val();
				document.location = "creationMembre.php?filtreCategorie="+$filtreCategorie+"&filtreFonction="+$filtreFonction+"&filtrePoste="+$filtrePoste+"&filtreNom="+$filtreNom;
			});

			$(".fiche").click(function(){

				// filtres
				$filtreCategorie = $("#filtreCategorie").val();
				$filtreFonction = $("#filtreFonction").val();
				$filtrePoste = $("#filtrePoste").val();
				$filtreNom = $("#filtreNom").val();

				$idMembre = $(this).prop('id').split('_')[1];
				document.location = "RechercherMembre.php?id="+$idMembre+"&filtreCategorie="+$filtreCategorie+"&filtreFonction="+$filtreFonction+"&filtrePoste="+$filtrePoste+"&filtreNom="+$filtreNom;
			});

			$(".suppression").click(function(){

				// filtres
				$filtreCategorie = $("#filtreCategorie").val();
				$filtreFonction = $("#filtreFonction").val();
				$filtrePoste = $("#filtrePoste").val();
				$filtreNom = $("#filtreNom").val();

				$idMembre = $(this).prop('id').split('_')[1];
				document.location = "SupprimerMembre.php?id="+$idMembre+"&filtreCategorie="+$filtreCategorie+"&filtreFonction="+$filtreFonction+"&filtrePoste="+$filtrePoste+"&filtreNom="+$filtreNom;
			});


			$("#filtreFonction").change(function(){
				if($(this).val() == -1 || $(this).val() == 12) {
					$("#zoneFiltrePoste").css("display", "");
				} else {
					$("#zoneFiltrePoste").css("display", "none");
				}
			});

			$("#check_all").change(function(){
				if ($(this).is(":checked")==true) {
					//alert("tout cocher");
					$("input:checkbox[id^='check_']").prop( "checked", true );
				} else {
					//alert("tout décocher");
					$("input:checkbox[id^='check_']").prop( "checked", false );
				}
			});

			$frameApercuImpression = $('#apercuImpression');
			$frameApercuImpression.dialog({
				 autoOpen: false,
				 width: "85%",
				 height: 700,
				 title: "Aperçu avant impression",
				 modal: true,
				 open: function() {
					 $('body').addClass('stop-scrolling');
					 $(".CSSTableGenerator").css("max-height", "100%");
					 $(".CSSTableGenerator").css("overflow", false);
					 $(this).html($("#tableau").html());
				 },
				 buttons: {
					 "Lancer l'impression": function() {
						 window.print();
				 		 $(".CSSTableGenerator").css("max-height", "240px");
						 $(".CSSTableGenerator").css("overflow", "auto");
				 		 $( this ).dialog( "close" );
				 	 }
				 },
				 close: function() {
					 $(".CSSTableGenerator").css("max-height", "240px");
					 $(".CSSTableGenerator").css("overflow", "auto");
					 $('body').removeClass('stop-scrolling');
				 }
			});
			$( "#impression" ).click(function() {
				$( "#apercuImpression" ).dialog( "open" );
				//window.open(window.location,"maFenetre",'menubar=false,toolbar=false');
				//window.print();
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
	$listeJoueurs = $_SESSION['listeJoueurs'];
	$listeStaffs = $_SESSION['listeStaffs'];
	$listeCategories = $_SESSION['listeCategories'];
	$listeFonctions = $_SESSION['listeFonctions'];
	$listePostes = $_SESSION['listePostes'];
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
						<form id="filtre" name="filtre" action="ActionMembre.php" method="post">
						<input type="hidden" name="methode" id="methode" value="filtre"/>
						<fieldset><legend>Affiner la recherche</legend>
						<p class="first" id="zoneFiltreCategorie" >
							<label for="filtreCategorie">Catégorie</label>
							<select name="filtreCategorie" id="filtreCategorie">
							<option label="" value="-1"  <?php echo ($_SESSION['filtreCategorie'] == -1 ? "selected" : "") ;?>>Toutes</option>
							<?php foreach($listeCategories as $categorie) {?>
							<option label="" value="<?php echo $categorie->getId();?>" <?php echo ($_SESSION['filtreCategorie'] == $categorie->getId() ? "selected" : "") ;?>><?php echo $categorie->getLibelle(); ?></option>
							<?php } ?>
							</select>
						</p>

						<p id="zoneFiltreFonction" >
							<label for="filtreFonction">Fonction</label>
							<select name="filtreFonction" id="filtreFonction">
							<option label="Toutes" value="-1"  <?php echo ($_SESSION['filtreFonction'] == -1 ? "selected" : "") ;?>>Toutes</option>
							<?php foreach($listeFonctions as $fonction) {?>
							<option label="" value="<?php echo $fonction->getId();?>" <?php echo ($_SESSION['filtreFonction'] == $fonction->getId() ? "selected" : "") ;?>><?php echo $fonction->getLibelle(); ?></option>
							<?php } ?>
							</select>
						</p>

						<p id="zoneFiltrePoste" >
							<label id="labelPoste" for="filtrePoste">Poste</label>
							<select name="filtrePoste" id="filtrePoste">
							<option label="Tous" value="-1"  <?php echo ($_SESSION['filtrePoste'] == -1 ? "selected" : "") ;?>>Tous</option>
							<?php foreach($listePostes as $poste) {?>
							<option label="" value="<?php echo $poste->getId();?>" <?php echo ($_SESSION['filtrePoste'] == $poste->getId() ? "selected" : "") ;?>><?php echo $poste->getLibelle(); ?></option>
							<?php } ?>
							</select>
						</p>

						<p id="zoneFiltreNom" >
							<label for="filtreNom">Nom/Prénom</label>
							<input type="text" name="filtreNom" id="filtreNom" value="<?php echo $_SESSION['filtreNom'] ;?>"/>
						</p>

						<p class="submit"><button type="submit"  class="bouton">Rechercher</button></p>
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
						<div class="featured-main-joueur" id="tableau" >
							<div class="CSSTableGenerator " style="text-align: center; max-height: 240px; overflow: auto;">
								<table id="tableATrier" >
									<thead>
									<tr>
										<th>
											<input type="checkbox" class="noprint" id="check_all" name="check_all" title="Tout cocher/décocher"/>
											<img id="impression" class="noprint" src="images/print.gif" style="cursor: pointer; width: 20px; height: 20px; vertical-align: bottom;" title="Imprimer la sélection"/>
										</th>
										<th>Nom<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th>Prénom<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th>Catégorie<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th>Poste/Fonction<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th>Liens</th>
									</tr>
									</thead>
									<?php foreach($listeJoueurs as $joueur) { ?>
									<tr class="centre">
										<td><input type="checkbox" class="noprint" id="check_<?php echo $joueur->getId();?>" name="check_<?php echo $joueur->getId();?>"/> </td>
										<td><?php echo $joueur->getNom();?></td>
										<td><?php echo $joueur->getPrenom();?></td>
										<td><?php echo $joueur->getLibelleCategorie();?></td>
										<td><?php echo $joueur->getLibellePoste();?></td>
										<td>
											<img class="fiche" id="fiche_<?php echo $joueur->getId();?>" src="images/modify16.png" style="border: 0;cursor: pointer;"/>
											<img class="suppression" id="suppr_<?php echo $joueur->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;"/>
										</td>
									</tr>
									<?php } ?>
									<?php foreach($listeStaffs as $staff) { ?>
									<tr class="centre">
										<td><input type="checkbox" class="noprint" id="check_<?php echo $staff->getId();?>" name="check_<?php echo $staff->getId();?>"/> </td>
										<td><?php echo $staff->getNom();?></td>
										<td><?php echo $staff->getPrenom();?></td>
										<td><?php echo $staff->getLibelleCategorie();?></td>
										<td><?php echo $staff->getLibelleFonction();?></td>
										<td>
											<img class="fiche noprint" id="fiche_<?php echo $staff->getId();?>" src="images/modify16.png" style="border: 0;cursor: pointer;"/>
											<img class="suppression noprint" id="suppr_<?php echo $staff->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;"/>
										</td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>

						<div class="featured-main-joueur-bas" style="padding-top: 4px;text-align: center;width: 100%; height: 280px;">
							<input type="text" id="ajoutMembre" class="bouton" value="Ajouter un membre"/>
							<!--<input type="text" id="export" class="bouton" value="Imprimer la liste"/>-->
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

	<div class="apercuImpression" id="apercuImpression" style="display: none;"></div>

</body>
</html>
<?php
ob_end_flush();
?>