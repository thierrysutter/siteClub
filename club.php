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
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/club.js"></script>
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
	if (isset($_SESSION['listePalmares']))
		$listePalmares = $_SESSION['listePalmares'];

	if (isset($_SESSION['listeReglements']))
		$listeReglements = $_SESSION['listeReglements'];
} catch (PDOException $error) { //Le catch est chargé dintercepter une éventuelle erreur
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
						<li id="lienPresentation"><div class="link"><a href="club.php" id="entetePresentation">Présentation</a></div></li>
					    <li id="lienPalmares"><div class="link"><a href="#" id="entetePalmares">Palmarès</a></div></li>
						<li id="lienOrganigramme"><div class="link"><a href="#" id="enteteOrganigramme">Organigramme</a></div></li>
						<li id="lienReglement"><div class="link"><a href="#" id="enteteReglement">Règlement intérieur</a></div></li>
					    <li id="lienInstallations"><div class="link"><a href="#" id="enteteInstallations">Nos installations</a></div></li>

					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<div class="featured-main">
							<img src="images/dessin.png" style="width: 100px; height: 125px; border: 1px; border-style: solid; border-color: black; float: left; margin: 0px 20px 0px 0px;" />
							<div style="text-align: left;font-size: 15px; font-weight: bold; ">Ligue Lorraine > District Mosellan</div>
							<div style="text-align: left;font-size: 12px; ">N° Affiliation FFF: 521781</div>
							<div style="font-size: 12px; padding-top: 0px;">
								Stade de Grimont<br>
								Boucle de la bergerie<br>57070 Saint-Julien-Lès-Metz<br><br>
								Tél/Fax: 03 87 37 04 34<br>
								Email: saintjulienlesmetz.foot@orange.fr<br>
								Email: saintjulienlesmetz.foot@gmail.com
							</div>
							<div id="" class="" style="height: 135px; width: 704px; overflow: auto; text-align: left; font-size: 12px; margin-top: 25px; ">
							<?php if ($user != null) {?>
							&nbsp;<img id="modif" class="modif" style="width: 10px; height: 10px; cursor: pointer;" alt="modifier le texte" src="images/modify16.png">
							<?php } ?>
							  <p id="presentationClub">Le club a été créé vers 1935. Nous avons peu de traces de cette époque mis à part une photo de 1936 photo "ici". A partir de 1946, le club évolue son les couleurs de la manufacture lorraine de tabac, en grenat, en ce jusqu'au début des années 60. En 1965, le club prend un nouveau départ, pour compter plus de 300 licenciés en 2010, répartis 8 catégories d'âge allant des débutants (6 ans) à vétérans (+35 ans). 9 arbitres officient pour le compte du club. Le club obtient le label "Qualité Argent" du district mosellan pour les années 2007 à 2010, récompensant ainsi le travail de tous les éducateurs bénévoles du club. Cette année là, nous avons également obtenu les Alérions d'Or récompensant le club classé premier au challenge de la promotion de l'arbitrage en Lorraine. Depuis 2007, le club organise un tournoi international pour les U11 et U13 réunissant plus de 30 équipes, soit environ 1000 personnes (joueurs, éducateurs, arbitres, spectateurs et bénévoles) à accueillir sur nos installations du stade de Grimont.</p>
							</div>
						</div>
					</div>

				</div>
				<!-- End Widget -->
			</div>
		</div>
	</div>
	<!-- End Heading -->

	<!-- Main -->
	<div id="presentation">
	<?php
	  include("situationGeo.php");
	?>
	</div>
	<div id="palmares">
	<?php
	  include("historique.php");
	?>
	</div>
	<div id="reglement">
	<?php
	  include("reglement.php");
	?>
	</div>
	<div id="installations">
	<?php
	  include("stade.php");
	?>
	</div>
	<div id="organigramme">
	  <?php
	  include("organigramme.php");
	?>
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

	<div id="dialogModification" style="display: none;">
		<div class="popup-featured-side"><div class="popup-featured-side-item"><div class="cl"></div>
	    <div ><textarea rows="20" cols="80" id="textePopup"></textarea></div>
	    <div class="cl"></div>
		</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			$("#modif").click(function(){
				$texte = $("#presentationClub").html();
				$("#textePopup").val($texte);
				$("#dialogModification").dialog({
		  			height: 425,
		  			width: 705,
		  			modal: true,
		  			title: "Présentation du club",
		  			buttons: {
		  				Fermer: function() {
		  					$(this).dialog( "close" );
		  				},
		  				Enregistrer: function() {
							enregistrerPresentation();
		  					$(this).dialog( "close" );
		  				}
		  			}
		  		});
			});
		});

		function enregistrerPresentation() {
			$("#presentationClub").html($("#textePopup").val());
			$.ajax({ // fonction permettant de faire de l'ajax
			   type: "POST", // methode de transmission des données au fichier php
			   url: "EnregistrerContenu.php", // url du fichier php
			   data: {texte : $("#textePopup").val(), zone : "presentation"}, // données à transmettre
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
</body>
</html>
<?php
ob_end_flush();
?>