<?php
ob_start();
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
				"aaSorting": [ [0,'asc'], [1,'asc'], [2,'asc'], [3,'asc'], [4,'asc'], [5,'asc'] ],
		        "aoColumns": [ null, null, null, { "sSortable": false }, null,{ "sSortable": false }]	
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

			$(".afficher").click(function(){
				$idRencontre = $(this).prop('id').split('_')[1];
				document.location = "AfficherConvocation.php?rencontre="+$idRencontre+"&categorie="+$("#categorie").val();
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
	  include("menuHaut.php");
	?>
	<!-- End Navigation -->
<?php
try {
	session_start();
	$listeCategories = array();
	if (isset($_SESSION['listeCategories']))
		$listeCategories = $_SESSION['listeCategories'];
	
	$listeConvocations = array();
	if (isset($_SESSION['listeConvocations']))
		$listeConvocations = $_SESSION['listeConvocations'];
	
} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
?>

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
					<ul>
						<li><div>
						
						<form id="filtre" name="filtre" action="ActionAfficherConvocations.php" method="post">
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
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<!-- Main Slide Item -->
						<div class="featured-main-joueur" ">
							<div class="CSSTableGenerator" style="text-align: center; max-height: 235px; overflow: auto;">
							
								<?php 
									if (!is_null($listeConvocations) && count($listeConvocations)>0) {
										
									} else {
										echo "Aucune convocation";
									}
								?>
								
								
								<table id="tableATrier">
								<thead>
									<tr>
									  <th>Jour<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
									  <th>Catégorie<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
									  <th>Compétition<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
									  <th>Adversaire</th>
									  <th>Lieu<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
									  <th>Liens</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($listeConvocations as $convocation) { ?>
									<tr class="centre">
										<td><?php echo date_format(new DateTime($convocation->getRencontre()->getJour()), 'd/m/Y');?></td>
										<td><?php echo $convocation->getRencontre()->getLibelleCategorie();?></td>
										<td><?php echo $convocation->getRencontre()->getLibelleCompetition();?></td>
										<td><?php echo ($convocation->getRencontre()->getEquipeDom() == "ST JULIEN" ? $convocation->getRencontre()->getEquipeExt() : $convocation->getRencontre()->getEquipeDom());?></td>
										<td><?php echo ($convocation->getRencontre()->getEquipeDom() == "ST JULIEN" ? "Domicile" : "Extérieur");?></td>
										<td>
											<img class="afficher" id="afficher_<?php echo $convocation->getRencontre()->getId();?>" src="images/loupe16.png" style="border: 0;cursor: pointer;" title="Afficher"/>
										</td>
									</tr>
									<?php } ?>
								</tbody>
								</table>
							</div>
						</div>

						<!-- <div class="featured-main-joueur-bas" style="padding-top: 4px;text-align: center;width: 100%; height: 280px;">
							<button class="bouton" id="ajoutRencontre" type="submit">Ajouter une rencontre</button>
						</div>
						-->
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

	<!--
	<div id="dialogCompteRendu" style="display: none;">
		<div class="popup-featured-side"><div class="popup-featured-side-item"><div class="cl"></div>
	    <div ><textarea rows="20" cols="80" id="texteCompteRenduPopup"></textarea></div>
	    <div class="cl"></div>
		</div>
		</div>
	</div>
	-->
</body>
</html>
<?php
ob_end_flush();
?>