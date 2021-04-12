<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
require_once("config/config.php");

	//session_start();


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
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

	<link href="css/caroussel3D.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery/jquery.min.js" ></script>
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

	$convocation = $_SESSION['convocation'];
	$debut = $_SESSION['debut'];
	$fin = $_SESSION['fin'];
	$categorieSelectionnee = $_SESSION['categorieSelectionnee'];
	
	$listeJoueursCategorie = $_SESSION['listeJoueursCategorie'];
	
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
				<select name="" id="" style="">
					<?php foreach($listeJoueursCategorie as $joueurCat) { ?>
						<option value="<?php echo $joueurCat->getId();?>"><?php echo $joueurCat->getNom()." ".$joueurCat->getPrenom(); ?></option>
					<?php } ?>
				</select>
				</div></li>
					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<form id="formRetour" action="ActionRencontre.php" method="post">
							<input type="hidden" name="methode" id="methode" value="retour"/>
							<!-- R�cup des filtres pr�c�dents -->
							<input type="hidden" name="categorie" id="categorie" value="<?php echo $categorieSelectionnee; ?>"/>
							<input type="hidden" name="debut" id="debut" value="<?php echo $debut; ?>"/>
							<input type="hidden" name="fin" id="fin" value="<?php echo $fin; ?>"/>
						</form>
						
						<form id="form1" action="EnregistrerConvocation.php" method="post">
						<div class="featured-main-joueur" ">
							<fieldset><legend></legend>
							<p class="first" id="container" >
								<?php 
								echo $convocation->getRencontre()->getLibellecompetition()." - ".date_format(new DateTime($convocation->getRencontre()->getJour()), 'd/m/Y')."<br>";
								echo $convocation->getRencontre()->getEquipeDom()."-".$convocation->getRencontre()->getEquipeExt()."<br>";
								?>
								<input type="hidden" name="methode" id="methode" value="create"/>
								<input type="hidden" name="categorie" id="categorie" value="<?php echo $categorieSelectionnee; ?>"/>
								<input type="hidden" name="debut" id="debut" value="<?php echo $debut; ?>"/>
								<input type="hidden" name="fin" id="fin" value="<?php echo $fin; ?>"/>
								<input type="hidden" name="rencontre" id="rencontre" value="<?php echo $convocation->getRencontre()->getId(); ?>" />
							</p>
							<p id="container" ><label for="heureRDV" style="">Heure du rendez-vous</label><input type="time" name="heureRDV" id="heureRDV" style="width: auto;" value="<?php echo ($convocation->getRencontre()->getHeureRDV()!='' ? $convocation->getRencontre()->getHeureRDV() : ''); ?>"/></p>
							<p id="container" ><label for="lieuRDV" style="">Lieu du rendez-vous</label><input type="text" name="lieuRDV" id="lieuRDV" size="10" style="width: 150px;" value="<?php echo ($convocation->getRencontre()->getLieuRDV()!='' ? $convocation->getRencontre()->getLieuRDV() : ''); ?>"/></p>
							<p id="container" ><label for="commentaireRDV" style="">Commentaires</label><textarea name="commentaireRDV" id="commentaireRDV" cols="10" rows="10" style="width: 250px; height: 100px;"><?php echo (($convocation->getRencontre()->getCommentaireRDV()!='' && !is_null($convocation->getRencontre()->getCommentaireRDV())) ? $convocation->getRencontre()->getCommentaireRDV() : ''); ?></textarea></p>
							</fieldset>
							
							<fieldset>
								<p id="container" >
								<label for="nomJoueur1" style="padding-right: 5px; display: inline; ">1</label><input type="text" name="nomJoueur[]" id="nomJoueur1" size="20" style="width: 120px;" value="<?php echo (!is_null($convocation->getListeJoueurs()[0]) ? $convocation->getListeJoueurs()[0] : ""); ?>"/>
								<label for="nomJoueur8" style="margin-left: 10px; padding-right: 5px; display: inline;">8</label><input type="text" name="nomJoueur[]" id="nomJoueur8" size="20" style="width: 120px; float: right;" value="<?php echo (!is_null($convocation->getListeJoueurs()[7]) ? $convocation->getListeJoueurs()[7] : ""); ?>"/>
								</p>
								<p id="container" >
								<label for="nomJoueur2" style="padding-right: 5px; display: inline; ">2</label><input type="text" name="nomJoueur[]" id="nomJoueur2" size="20" style="width: 120px;" value="<?php echo (!is_null($convocation->getListeJoueurs()[1]) ? $convocation->getListeJoueurs()[1] : ""); ?>"/>
								<label for="nomJoueur9" style="margin-left: 10px; padding-right: 5px; display: inline; ">9</label><input type="text" name="nomJoueur[]" id="nomJoueur9" size="20" style="width: 120px; float: right;" value="<?php echo (!is_null($convocation->getListeJoueurs()[8]) ? $convocation->getListeJoueurs()[8] : ""); ?>"/>
								</p>
								<p id="container" >
								<label for="nomJoueur3" style="padding-right: 5px; display: inline; ">3</label><input type="text" name="nomJoueur[]" id="nomJoueur2" size="20" style="width: 120px;" value="<?php echo (!is_null($convocation->getListeJoueurs()[2]) ? $convocation->getListeJoueurs()[2] : ""); ?>"/>
								<label for="nomJoueur10" style="margin-left: 10px; padding-right: 5px; display: inline; ">10</label><input type="text" name="nomJoueur[]" id="nomJoueur10" size="20" style="width: 120px; float: right;" value="<?php echo (!is_null($convocation->getListeJoueurs()[9]) ? $convocation->getListeJoueurs()[9] : ""); ?>"/>
								</p>
								<p id="container" >
								<label for="nomJoueur4" style="padding-right: 5px; display: inline; ">4</label><input type="text" name="nomJoueur[]" id="nomJoueur2" size="20" style="width: 120px;" value="<?php echo (!is_null($convocation->getListeJoueurs()[3]) ? $convocation->getListeJoueurs()[3] : ""); ?>"/>
								<label for="nomJoueur11" style="margin-left: 10px; padding-right: 5px; display: inline; ">11</label><input type="text" name="nomJoueur[]" id="nomJoueur11" size="20" style="width: 120px; float: right;" value="<?php echo (!is_null($convocation->getListeJoueurs()[10]) ? $convocation->getListeJoueurs()[10] : ""); ?>"/>
								</p>
								<p id="container" >
								<label for="nomJoueur5" style="padding-right: 5px; display: inline; ">5</label><input type="text" name="nomJoueur[]" id="nomJoueur2" size="20" style="width: 120px;" value="<?php echo (!is_null($convocation->getListeJoueurs()[4]) ? $convocation->getListeJoueurs()[4] : ""); ?>"/>
								<label for="nomJoueur12" style="margin-left: 10px; padding-right: 5px; display: inline; ">12</label><input type="text" name="nomJoueur[]" id="nomJoueur12" size="20" style="width: 120px; float: right;" value="<?php echo (!is_null($convocation->getListeJoueurs()[11]) ? $convocation->getListeJoueurs()[11] : ""); ?>"/>
								</p>
								<p id="container" >
								<label for="nomJoueur6" style="padding-right: 5px; display: inline; ">6</label><input type="text" name="nomJoueur[]" id="nomJoueur2" size="20" style="width: 120px;" value="<?php echo (!is_null($convocation->getListeJoueurs()[5]) ? $convocation->getListeJoueurs()[5] : ""); ?>"/>
								<label for="nomJoueur13" style="margin-left: 10px; padding-right: 5px; display: inline; ">13</label><input type="text" name="nomJoueur[]" id="nomJoueur13" size="20" style="width: 120px; float: right;" value="<?php echo (!is_null($convocation->getListeJoueurs()[12]) ? $convocation->getListeJoueurs()[12] : ""); ?>"/>
								</p>
								<p id="container" >
								<label for="nomJoueur7" style="padding-right: 5px; display: inline; ">7</label><input type="text" name="nomJoueur[]" id="nomJoueur2" size="20" style="width: 120px;" value="<?php echo (!is_null($convocation->getListeJoueurs()[6]) ? $convocation->getListeJoueurs()[6] : ""); ?>"/>
								<label for="nomJoueur14" style="margin-left: 10px; padding-right: 5px; display: inline; ">14</label><input type="text" name="nomJoueur[]" id="nomJoueur14" size="20" style="width: 120px; float: right;" value="<?php echo (!is_null($convocation->getListeJoueurs()[13]) ? $convocation->getListeJoueurs()[13] : ""); ?>"/>
								</p>
							</fieldset>
							</div>
							<div class="featured-main-joueur-bas" style="padding-top: 10px;text-align: center;width: 100%; height: 280px;">
								<button class="bouton" id="enregistrer" type="submit" style="width: 107px; height:25px; line-height:25px; " value="Enregistrer">Enregistrer</button>
								<button class="bouton" id="reset" type="reset" style="width: 107px; height:25px; line-height:25px; " value="Annuler">Annuler</button>
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