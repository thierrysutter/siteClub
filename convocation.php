<?php
ob_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>
	<meta charset="windows-1252">
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

	<link href="css/caroussel3D.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery/jquery.min.js" ></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/util.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#reset").click(function(){
	  			$("#formRetour").submit();
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
	
	<?php
try {
	session_start();
	$convocation = $_SESSION['convocation'];
	$categorieSelectionnee = $_SESSION['categorieSelectionnee'];
	
} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}

	?>
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav" style="width: 225px;">
					<ul style="width: 225px;padding-left: 5px">
						<li style="width: 225px;">
							<div>
								
							</div>
						</li>
					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<form id="formRetour" action="ActionAfficherConvocations.php" method="post">
							<input type="hidden" name="methode" id="methode" value="retour"/>
							<!-- R�cup des filtres pr�c�dents -->
							<input type="hidden" name="categorie" id="categorie" value="<?php echo $categorieSelectionnee; ?>"/>
							<input type="hidden" name="debut" id="debut" value="<?php echo $debut; ?>"/>
							<input type="hidden" name="fin" id="fin" value="<?php echo $fin; ?>"/>
						</form>
						
						<form id="form1" action="EnregistrerConvocation.php" method="post">
						<div class="featured-main-joueur">
							<fieldset><legend></legend>
							<p class="first" id="container" ><?php echo $convocation->getRencontre()->getLibellecompetition(); ?></p>
							<p id="container" ><?php echo $convocation->getRencontre()->getEquipeDom()."-".$convocation->getRencontre()->getEquipeExt(); ?></p>
							<p id="container" ><?php echo date_format(new DateTime($convocation->getRencontre()->getJour()), 'd/m/Y'); ?></p>
							<p id="container" >Heure du rendez-vous: <?php echo ($convocation->getRencontre()->getHeureRDV()!='' ? $convocation->getRencontre()->getHeureRDV() : ''); ?></p>
							<p id="container" >Lieu du rendez-vous: <?php echo ($convocation->getRencontre()->getLieuRDV()!='' ? $convocation->getRencontre()->getLieuRDV() : ''); ?></p>
							<p id="container" ><?php echo (($convocation->getRencontre()->getCommentaireRDV()!='' && !is_null($convocation->getRencontre()->getCommentaireRDV())) ? $convocation->getRencontre()->getCommentaireRDV() : ''); ?></p>
							</fieldset>
							
							<fieldset>
								<p id="container" >
								<label for="nomJoueur1" style="">Joueurs convoqu�s</label>
								<div>
									<?php 
										$i=0;
										foreach($convocation->getListeJoueurs() as $joueur) {
											$i++; 
											echo  $i."  ".$joueur->getNom()." ".$joueur->getPrenom()."<br>";
										}
									?>
								</div>
								</p>
							</fieldset>
							</div>
							<div class="featured-main-joueur-bas" style="padding-top: 10px;text-align: center;width: 100%; height: 280px;">
								<div class="bouton" id="reset" type="" style="width: 100px; height:25px; line-height:25px; " value="Retour">Retour</div>
							</div>
							</form>
						
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
			<div class="cl">&nbsp;</div>
			<div id="sidebar">

			</div>
			<div id="content">

			</div>
			<div class="cl">&nbsp;</div>
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