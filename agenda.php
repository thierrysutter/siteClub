<?php
ob_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="iso-8859-15" />
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
		        "bSort": false,
		        "oLanguage": {
					"sSearch": "Filtrer ",
					"sZeroRecords": "Aucun enregistrement disponible."
				},
				"aaSorting": [ [0,'asc'] ],
		        "aoColumns": [ { "sType": "date-dmy-asc", "aTargets": [ 0 ]  }, null, null, null, null,null,{ "sSortable": false },{ "sSortable": false }]
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

			$("#lienAgenda").addClass("active");
			$("#lienClassements").removeClass("active");
			$("#lienCompteRendu").removeClass("active");
			$("#lienLiens").removeClass("active");

			$("#lienAgenda").click(function(e) {
				e.preventDefault();
				$(".active").removeClass("active");
				$(this).addClass("active");
			});
			$("#lienClassements").click(function(e) {
				e.preventDefault();
				$(".active").removeClass("active");
				$(this).addClass("active");
			});
			$("#lienCompteRendu").click(function(e) {
				e.preventDefault();
				$(".active").removeClass("active");
				$(this).addClass("active");
			});
			$("#lienLiens").click(function(e) {
				e.preventDefault();
				$(".active").removeClass("active");
				$(this).addClass("active");
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

session_start();
$debut = $_SESSION['debut'];
$fin = $_SESSION['fin'];
$listeCategories = $_SESSION['listeCategories'];
$listeEquipes = $_SESSION['listeEquipes'];
$listeRencontres = $_SESSION['listeRencontres'];
?>
	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
					
					<ul>
						<li><div>
						<form id="filtre" name="filtre" action="ActionAgenda.php" method="post">
						<input type="hidden" name="methode" id="methode" value="filtre"/>
						<fieldset><legend>Affiner la recherche</legend>
						
						<p class="first" id="container" >
							<label for="debut">Du</label>
							<input type="text" class="datepicker" id="debut" name="debut" size="8" maxlength="10" value="<?php echo $debut; ?>"/>
							<label for="fin">Au</label>
							<input type="text" class="datepicker" id="fin" name="fin" size="8" maxlength="10" value="<?php echo $fin; ?>"/>
						</p>
						
						<p class="first" id="container" >
							<label for="categorie">Catégorie</label>
							<select name="categorie" id="categorie">
							<option label="Toutes" value="-1"  <?php echo ($_SESSION['categorieSelectionnee'] == -1 ? "selected" : "") ;?>>Toutes</option>
							<?php foreach($listeCategories as $categorie) {?>
							<option label="" value="<?php echo $categorie->getId();?>" <?php echo ($_SESSION['categorieSelectionnee'] == $categorie->getId() ? "selected" : "") ;?>><?php echo $categorie->getLibelle(); ?></option>
							<?php } ?>
							</select>
						</p>
						
						<p class="first" id="container" >
                            <label for="equipe">Equipe</label>
                            <select name="equipe" id="equipe">
                            <option label="Toutes" value="-1"  <?php echo ($_SESSION['equipeSelectionnee'] == -1 ? "selected" : "") ;?>>Toutes</option>
                            <?php foreach($listeEquipes as $equipe) {?>
                            <option label="" value="<?php echo $equipe->getId();?>" <?php echo ($_SESSION['equipeSelectionnee'] == $equipe->getId() ? "selected" : "") ;?>><?php echo $equipe->getLibelle(); ?></option>
                            <?php } ?>
                            </select>
                        </p>

						<p class="first" id="container" >
							<label for="lieu">Lieu</label>
							<select name="lieu" id="lieu">
								<option value="tous" label="Tous" <?php echo ($_SESSION['lieuSelectionne'] == "tous" ? "selected" : "") ;?>/>
								<option value="domicile" label="Domicile" <?php echo ($_SESSION['lieuSelectionne'] == "domicile" ? "selected" : "") ;?>/>
								<option value="exterieur" label="Exterieur" <?php echo ($_SESSION['lieuSelectionne'] == "exterieur" ? "selected" : "") ;?>/>
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

						<div class="featured-main-joueur-bas" style="height: 280px; overflow: auto;">
							<div class="CSSTableGenerator" >
								<table id="tableATrier">
									<thead>
										<tr>
											<th>Date<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
											<th >Categorie</th>
											<th >Equipe</th>
											<th>Comp&eacute;tition</th>
											<th>Adversaire</th>
											<th>Lieu</th>
											<th>Score</th>
											<th>Liens</th>
										</tr>
									</thead>
									<?php foreach($listeRencontres as $rencontre) { ?>
									
									<tr class="centre">
										<td><?php echo date_format(new DateTime($rencontre->getJour()), 'd/m/Y');?></td>
										<td><?php echo $rencontre->getLibelleCategorie();?></td>
										<td><?php echo $rencontre->getLibelleEquipe();?></td>
										<td><?php echo $rencontre->getLibelleCompetition();?></td>
										<td><?php echo ($rencontre->getEquipeDom() == "ST JULIEN" ? $rencontre->getEquipeExt() : $rencontre->getEquipeDom());?></td>
										<td><?php echo ($rencontre->getEquipeDom() == "ST JULIEN" ? "Domicile" : "Extérieur");?></td>
										<td><?php echo $rencontre->getStatut()>0 ? $rencontre->getScoreDom()." - ".$rencontre->getScoreExt() : "";?></td>
										<td>
											<?php if ($rencontre->getStatut()>0) { ?>
											<img class="cr" id="cr_<?php echo $rencontre->getId();?>" src="images/compteRendu16.png" style="border: 0;cursor: pointer;" title="Compte rendu"/>
											<?php } ?>
										</td>
									</tr>
									
									<?php } ?>
								</table>
							</div>

						</div>

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