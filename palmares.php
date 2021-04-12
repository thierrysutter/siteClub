<?php
ob_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>
	<meta charset="iso-8859-15" />
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

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

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
					<ul>
					    <li><div class="link"><a href="club.php">Pr�sentation</a></div></li>
						<li><div class="link"><a href="historique.php">Historique</a></div></li>
					    <li class="active"><div class="link"><a href="palmares.php">Palmar�s</a></div></li>
					    <li><div class="link"><a href="stade.php">Installations</a></div></li>
					    <li><div class="link"><a href="reglement.php">R�glement</a></div></li>
					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<div class="featured-main">
							1904: Cr�ation du club<br/>
							2000: Vainqueur coupe de Moselle U15<br/>
							2005: Vainqueur coupe de Moselle U17<br/>
							2006: Vainqueur coupe de Moselle U17<br/>
							2007: Accession en PHR (S�niors A)<br/>
							2008: Accession en PH (S�niors A)<br/>
							2009: Vainqueur coupe de Moselle U17<br/>
							2014: Accession en PHR (S�niors A), Finaliste de la coupe de Moselle S�niors, Accession en 2�me division (S�niors B), Finaliste de la coupe de Moselle des �quipes r�serves S�niors<br/>
						</div>
					</div>
				</div>
				<!-- End Widget ->

				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>



						<!- Main Slide Item --
						<div class="featured-main">
							<a href="#"><img src="css/images/travaux_stade.jpg" width="438px" height="310px" alt="" /></a>
							<div class="featured-main-details">
								<div class="featured-main-details-cnt">
									<h4><a href="#">R�novation du terrain d'honneur</a></h4>
									<p>Les travaux du nouveau terrain synth�tique ont d�but� il y a quelques jours et dureront jusqu'� la fin du mois. Un synth�tique de derni�re g�n�ration remplacera l'ancien tapis.</p>
								</div>
							</div>
						</div>
						<!- End Main Slide Item ->

						<div class="featured-side">

							<!- Slide Item 1 ->
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<a href="#" class="left"><img src="css/images/choucroute.gif" width="60px" height="60px" alt="" /></a>
								<h4><a href="#">Soir�e choucroute</a></h4>
								<p>Le club organise une soir�e "choucroute" le 20 Octobre 2013. Renseignements au 03  87 37 04 34.</p>
								<div class="cl">&nbsp;</div>
							</div>
							<!- End Slide Item 1 ->

							<!- Slide Item 2 ->
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<a href="#" class="left"><img src="css/images/featured-side-2.jpg" width="60px" height="60px" alt="" /></a>
								<h4><a href="#">Nouvelle saison</a></h4>
								<p>La saison 2013/2014 reprend avec pour objectif la mont�e des S�niors au niveau Ligue.</p>
								<div class="cl">&nbsp;</div>
							</div>
							<!- End Slide Item 2 ->

							<!- Slide Item 3 --
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<a href="#" class="left"><img src="css/images/featured-side-3.jpg" width="60px" height="60px" alt="" /></a>
								<h4><a href="#">Inscriptions 2013/2014</a></h4>
								<p>Pour tous renseignements, contactez nous au 03 87 37 04 34 ou remplissez ce <a href="#">formulaire</a>.</p>
								<div class="cl">&nbsp;</div>
							</div>
							<!- End Slide Item 3 --

							<!- Slide Item 4 ->
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<a href="#" class="left"><img src="css/images/featured-side-4.jpg" width="60px" height="60px" alt="" /></a>
								<h4><a href="#">F�te du foot</a></h4>
								<p>Comme chaque ann�e, le club a organis� sa f�te du football.</p>
								<div class="cl">&nbsp;</div>
							</div>
							<!- End Slide Item 4 ->
						</div>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
				<!- End Widget -->

			</div>
		</div>
	</div>
	<!-- End Heading -->

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