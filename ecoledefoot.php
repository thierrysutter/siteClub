<?php
ob_start();
$listeDernier = array();
$listeProchain = array();
$listeStaffs = array();
$listeJoueurs = array();
$listeGardiens = array();
$listeDefenseurs = array();
$listeMilieux = array();
$listeAttaquants = array();
$listeEquipes = array();
$categorie = 1; // u7
$cat = null;
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
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$idCategorie = $("#categorie").val(); 
			$("#lienU7").removeClass("active");
			$("#lienU9").removeClass("active");
			$("#lienU11").removeClass("active");
			$("#lienU13").removeClass("active");
			$("#lienU15").removeClass("active");
			$("#lienU17").removeClass("active");
			if ($idCategorie == 1)
				$("#lienU7").addClass("active");
			else if ($idCategorie == 2)
				$("#lienU9").addClass("active");
			else if ($idCategorie == 3)
				$("#lienU11").addClass("active");
			else if ($idCategorie == 4)
				$("#lienU13").addClass("active");
			else if ($idCategorie == 5)
				$("#lienU15").addClass("active");
			else if ($idCategorie == 6)
				$("#lienU17").addClass("active");
			
			$("#lienU7").click(function(e) {
				$("#categorie").val(1);
				$("#form1").submit();
				return false;
			});

			$("#lienU9").click(function(e) {
				$("#categorie").val(2);
				$("#form1").submit();
				return false;
			});

			$("#lienU11").click(function(e) {
				$("#categorie").val(3);
				$("#form1").submit();
				return false;
			});

			$("#lienU13").click(function(e) {
				$("#categorie").val(4);
				$("#form1").submit();
				return false;
			});

			$("#lienU15").click(function(e) {
				$("#categorie").val(5);
				$("#form1").submit();
				return false;
			});

			$("#lienU17").click(function(e) {
				$("#categorie").val(6);
				$("#form1").submit();
				return false;
			});

			$(".vignette").click(function(){
				$id=$(this).prop("id");
				$src=$(this).prop("src");
				$("#detailPhoto").prop("src",$src);

				$nom = $("#nom_"+$id).val();
				$prenom = $("#prenom_"+$id).val();
				$dateNaissance = $("#dateNaissance_"+$id).val();
				$fonction = $("#fonction_"+$id).val();
				$poste = $("#poste_"+$id).val();
				$numLicence = $("#numLicence_"+$id).val();

				if($nom != null && $prenom != null && $nom != "" || $prenom != "") {
					$("#identiteDetail").html($nom+" "+$prenom);
				} else {
					$("#identiteDetail").html("");
				}
				if($dateNaissance != null && $dateNaissance != "") {
					$("#ageDetail").html($dateNaissance);
				} else {
					$("#ageDetail").html("");
				}
				if($fonction != null && $fonction != "") {
					$("#fonctionDetail").html($fonction);
				} else {
					$("#fonctionDetail").html("");
				}
				if($poste != null && $poste != "") {
					$("#posteDetail").html($poste);
				} else {
					$("#posteDetail").html("");
				}

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
	if (isset($_SESSION['categorie']))
		$categorie = $_SESSION['categorie'];
	if (isset($_SESSION['cat']))
		$cat = $_SESSION['cat'];
	if (isset($_SESSION['listeEquipes']))
		$listeEquipes = $_SESSION['listeEquipes'];
	if (isset($_SESSION['listeDernier']))
		$listeDernier = $_SESSION['listeDernier'];
	if (isset($_SESSION['listeProchain']))
		$listeProchain = $_SESSION['listeProchain'];
	if (isset($_SESSION['listeStaffs']))
		$listeStaffs = $_SESSION['listeStaffs'];
	if (isset($_SESSION['listeJoueurs']))
		$listeJoueurs = $_SESSION['listeJoueurs'];
	/*if (isset($_SESSION['listeGardiens']))
		$listeGardiens = $_SESSION['listeGardiens'];
	if (isset($_SESSION['listeDefenseurs']))
		$listeDefenseurs = $_SESSION['listeDefenseurs'];
	if (isset($_SESSION['listeMilieux']))
		$listeMilieux = $_SESSION['listeMilieux'];
	if (isset($_SESSION['listeAttaquants']))
		$listeAttaquants = $_SESSION['listeAttaquants'];*/
	
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
					<form id="form1" name="form1" action="ActionEcoleDeFoot.php" method="post">
						<input type="hidden" name="categorie" id="categorie" value="<?php echo $categorie;?>" />
					</form>
					<ul>
					    <!--<li class=""><div class="link"><a href="joueursstaffs.php">Effectifs</a></div></li>-->
						<li id="lienU7" class="active"><div class="link"><a href="#">U7</a></div></li>
						<li id="lienU9"><div class="link"><a href="#">U9</a></div></li>
					    <li id="lienU11"><div class="link"><a href="#">U11</a></div></li>
					    <li id="lienU13"><div class="link"><a href="#">U13</a></div></li>
					    <li id="lienU15"><div class="link"><a href="#">U15</a></div></li>
					    <li id="lienU17"><div class="link"><a href="#">U17</a></div></li>
					</ul>
				</div>
				<!-- End Sub nav -->

				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>

						<!-- Main Slide Item -->
						<div class="featured-main">
							<a href="#"><img src="./images/article/repriseJeunes2014.jpg" width="438px" height="310px" alt="" /></a>
							<div class="featured-main-details">
								<!--<div class="featured-main-details-cnt">
									<h4><a href="#">Reprise section jeunes</a></h4>
									<p>Les jeunes joueurs de l'école de foot (U6 à U13) ont repris le chemin des entrainements depuis la fin du mois d'août.</p>
								</div>-->
							</div>
						</div>
						<!-- End Main Slide Item -->

						<div class="featured-side">

							<!-- Slide Item 1 -->
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<!--<a href="#" class="left"><img src="css/images/travaux_stade.jpg" width="60px" height="60px" alt="" /></a>-->
								<h4><a href="#">Infos catégorie</a></h4>
								<?php
								try {
									if ($cat != null) {
										echo "<p>Joueurs né(e)s en ".$cat->getAnneeDebut()." et ".$cat->getAnneeFin()."</p>";
									}
								} catch (PDOException $error) { //Le catch est chargé dintercepter une éventuelle erreur
									echo "N° : ".$error->getCode()."<br />";
									die ("Erreur : ".$error->getMessage()."<br />");
								}
								?>
								<div class="cl">&nbsp;</div>
							</div>
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<h4><a href="#">Entrainements</a></h4>
								<?php
								try {
									$listeEntrainements = $cat->getEntrainements();
									
									if (!empty($listeEntrainements)) {
										foreach($listeEntrainements as $entrainement) {
											echo "<p>".$entrainement->getJour()." à ".$entrainement->getHeureDebut()." / ".$entrainement->getLieu()."</p>";
										}
									}
								} catch (PDOException $error) { //Le catch est chargé dintercepter une éventuelle erreur
									echo "N° : ".$error->getCode()."<br />";
									die ("Erreur : ".$error->getMessage()."<br />");
								}
								?>
								<div class="cl">&nbsp;</div>
							</div>
							<!-- End Slide Item 1 -->

							<!-- Slide Item 2 -->
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<!--<a href="#" class="left"><img src="css/images/featured-side-2.jpg" width="60px" height="60px" alt="" /></a>-->
								<h4><a href="#">Educateurs</a></h4>
								<?php
								try {
									if (!empty($listeStaffs)) {
										foreach($listeStaffs as $staff) {
											echo "<p>".$staff->getNom()." ".$staff->getPrenom()."</p>";
										}
									}
								} catch (PDOException $error) { //Le catch est chargé dintercepter une éventuelle erreur
									echo "N° : ".$error->getCode()."<br />";
									die ("Erreur : ".$error->getMessage()."<br />");
								}
								?>
								<div class="cl">&nbsp;</div>
							</div>
							<!-- End Slide Item 2 -->

							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<h4><a href="#">Derniers résultats</a></h4>
								<?php if (!empty($listeDernier)) {
									foreach ($listeDernier as $dernier) {
										echo "<p>".date_format(new DateTime($dernier->getJour()), 'd/m/Y').": ".$dernier->getEquipeDom()." - ".$dernier->getEquipeExt()." : ".$dernier->getScoreDom()." - ".$dernier->getScoreExt()."&nbsp;".($dernier->getCompteRendu()!=null && $dernier->getCompteRendu()!="" ? "<img class=\"CR\" id=\"".$dernier->getId()."\" src=\"images/compteRendu16.png\" style=\"vertical-align: middle;\" />" : "")."</p>";
									}
								}?>

								<div class="cl">&nbsp;</div>
							</div>

							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<h4><a href="#">Prochaines rencontres</a></h4>
								<?php if (!empty($listeProchain)) {
									foreach ($listeProchain as $prochain) {
										echo "<p>".date_format(new DateTime($prochain->getJour()), 'd/m/Y').": ".$prochain->getEquipeDom()." - ".$prochain->getEquipeExt()."</p>";
									}
								}?>
								<div class="cl">&nbsp;</div>
							</div>

							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<h4><a href="#">Classements</a></h4>
								<?php if (!empty($listeEquipes)) {
										foreach ($listeEquipes as $equipe) {
											echo "<p style=\"cursor: pointer;\" onclick=\"window.open('".$equipe->getLienClassement()."','_new')\">".$equipe->getLibelle()."</p>";
										}
									}?>
								<div class="cl">&nbsp;</div>
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
			<div class="cl">&nbsp;</div>
			<div id="sidebar">

			</div>
			<div id="content">
				<div class="featured-main-bas">
					<div id="gardiens" class="effectif featured-main-bas-item">
						<div class="cl">&nbsp;</div>
						<h4><a href="#">Effectif</a></h4>

						<?php
						if (!empty($listeJoueurs)) {
							foreach($listeJoueurs as $joueur) {
						?>
						<div class="joueur ">
							
							<?php if ($joueur->getPhoto() != null && $joueur->getPhoto() != "" && $joueur->getPhoto() != "images/photo/" && file_exists($joueur->getPhoto())) { ?>
							<img class="vignette" id="<?php echo $joueur->getId(); ?>" src="<?php echo $joueur->getPhoto();?>" width="55px" height="65px" alt="" />
							<?php } else {?>
							<img class="vignette" id="<?php echo $joueur->getId(); ?>" src="images/silhouette.jpeg" width="55px" height="65px" alt="" title="<?php echo $joueur->getPhoto(); ?>"/>
							<?php } 
							echo $joueur->getNom()." ".$joueur->getPrenom(); ?>
							<input type="hidden" id="nom_<?php echo $joueur->getId(); ?>" name="nom_<?php echo $joueur->getId(); ?>" value="<?php echo $joueur->getNom(); ?>" />
							<input type="hidden" id="prenom_<?php echo $joueur->getId(); ?>" name="prenom_<?php echo $joueur->getId(); ?>" value="<?php echo $joueur->getPrenom(); ?>" />
							<input type="hidden" id="dateNaissance_<?php echo $joueur->getId(); ?>" name="dateNaissance_<?php echo $joueur->getId(); ?>" value="<?php echo date_format(new DateTime($joueur->getDateNaissance()), 'd/m/Y'); ?>" />
							<input type="hidden" id="poste_<?php echo $joueur->getId(); ?>" name="poste_<?php echo $joueur->getId(); ?>" value="<?php echo $joueur->getLibellePoste(); ?>" />
							<input type="hidden" id="numLicence_<?php echo $joueur->getId(); ?>" name="numLicence_<?php echo $joueur->getId(); ?>" value="<?php echo $joueur->getNumeroLicence(); ?>" />
						</div>
						<?php } } ?>
					</div>
				</div>
				<div class="featured-side-bas">
					<img id="detailPhoto" src="images/silhouette.jpeg" width="160px" height="160px" alt="" />
					<div id="detail" class="featured-main-bas-item">
						<div class="cl">&nbsp;</div>
						<h4><a><div id="identiteDetail"></div></a></h4>
						<p><div id="ageDetail"></div></p>
						<p><div id="tailleDetail"></div></p>
						<p><div id="piedDetail"></div></p>
						<p><div id="fonctionDetail"></div></p>
						<p><div id="posteDetail"></div></p>
						<p><div id="parcoursDetail"></div></p>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
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