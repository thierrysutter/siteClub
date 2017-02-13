<?php
ob_start();


$listeDernier = array();
$listeProchain = array();
$listeStaffs = array();
$listeGardiens = array();
$listeDefenseurs = array();
$listeMilieux = array();
$listeAttaquants = array();
$listeEquipes = array();
$categorie = 9; // senior

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
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#lienStaff").removeClass("active");
			$("#lienEffectif").addClass("active");

			$("#lienStaff").click(function(e) {
				e.preventDefault();
				$(".active").removeClass("active");
				$(this).addClass("active");
				$(".staff").toggle(true);
				$(".effectif").toggle(false);
			});
			$("#lienEffectif").click(function(e) {
				e.preventDefault();
				$(".active").removeClass("active");
				$(this).addClass("active");
				$(".staff").toggle(false);
				$(".effectif").toggle(true);
			});

			$(".staff").toggle(false);
			$(".effectif").toggle(true);

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
	if (isset($_SESSION['listeEquipes']))
		$listeEquipes = $_SESSION['listeEquipes'];
	if (isset($_SESSION['listeDernier']))
		$listeDernier = $_SESSION['listeDernier'];
	if (isset($_SESSION['listeProchain']))
		$listeProchain = $_SESSION['listeProchain'];
	if (isset($_SESSION['listeStaffs']))
		$listeStaffs = $_SESSION['listeStaffs'];
	if (isset($_SESSION['listeGardiens']))
		$listeGardiens = $_SESSION['listeGardiens'];
	if (isset($_SESSION['listeDefenseurs']))
		$listeDefenseurs = $_SESSION['listeDefenseurs'];
	if (isset($_SESSION['listeMilieux']))
		$listeMilieux = $_SESSION['listeMilieux'];
	if (isset($_SESSION['listeAttaquants']))
		$listeAttaquants = $_SESSION['listeAttaquants'];
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
						<li id="lienEffectif"><div class="link"><a href="#">Effectif</a></div></li>
						<li id="lienStaff"><div class="link"><a href="#">Staff</a></div></li>
					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<?php /* ?>
						<div class="featured-main-joueur">
							<div class="autoplay8">
								<?php
								if (!empty($listeGardiens)) {
									foreach($listeGardiens as $gardien) {
										if ($gardien->getPhoto() != null && $gardien->getPhoto() != "" && $gardien->getPhoto() != "images/photo/" && file_exists($gardien->getPhoto())) {
								?>
								<div><img src="<?php echo $gardien->getPhoto();?>" width="80" height="80"/></div>
								<?php }}}
								if (!empty($listeDefenseurs)) {
									foreach($listeDefenseurs as $gardien) {
										if ($gardien->getPhoto() != null && $gardien->getPhoto() != "" && $gardien->getPhoto() != "images/photo/" && file_exists($gardien->getPhoto())) {
								?>
								<div><img src="<?php echo $gardien->getPhoto();?>" width="80" height="80"/></div>
								<?php }}}
								if (!empty($listeMilieux)) {
									foreach($$listeMilieux as $gardien) {
										if ($gardien->getPhoto() != null && $gardien->getPhoto() != "" && $gardien->getPhoto() != "images/photo/" && file_exists($gardien->getPhoto())) {
								?>
								<div><img src="<?php echo $gardien->getPhoto();?>" width="80" height="80"/></div>
								<?php }}}
								if (!empty($listeAttaquants)) {
									foreach($listeAttaquants as $gardien) {
										if ($gardien->getPhoto() != null && $gardien->getPhoto() != "" && $gardien->getPhoto() != "images/photo/" && file_exists($gardien->getPhoto())) {
								?>
								<div><img src="<?php echo $gardien->getPhoto();?>" width="80" height="80"/></div>
								<?php }}}
								if (!empty($listeStaffs)) {
									foreach($listeStaffs as $gardien) {
										if ($gardien->getPhoto() != null && $gardien->getPhoto() != "" && $gardien->getPhoto() != "images/photo/" && file_exists($gardien->getPhoto())) {
								?>
								<div><img src="<?php echo $gardien->getPhoto();?>" width="80" height="80"/></div>
								<?php }}}
								?>
							</div>
						</div>
						<?php */ ?>
<!-- 						<div class="featured-main-joueur"> -->
<!-- 							<div><img src="" alt="" title="Séniors A" width="30%"/></div> -->
<!-- 							<div><img src="" alt="" title="Séniors B" width="30%"/></div> -->
<!-- 							<div><img src="" alt="" title="Séniors C" width="30%"/></div> -->
<!-- 						</div> -->

						<div class="featured-main-joueur-bas">
							<div class="featured-main-joueur-details-gauche">
								<div class="featured-main-joueur-details-gauche-cnt">
									<h4><a href="#">Entrainements</a></h4>
									<p>Les mercredis et vendredis de 19h à 21h</p>
								</div>
								<div class="featured-main-joueur-details-gauche-cnt">
									<h4><a href="#">Derniers matchs</a></h4>
									<?php if (!empty($listeDernier)) {
										foreach ($listeDernier as $dernier) {
											echo "<p>".date_format(new DateTime($dernier->getJour()), 'd/m/Y').": ".$dernier->getEquipeDom()." - ".$dernier->getEquipeExt()." : ".$dernier->getScoreDom()." - ".$dernier->getScoreExt()."&nbsp;".($dernier->getCompteRendu()!=null && $dernier->getCompteRendu()!="" ? "<img class=\"CR\" id=\"".$dernier->getId()."\" src=\"images/compteRendu16.png\" style=\"vertical-align: middle;\" />" : "")."</p>";
										}
									}?>
								</div>
								<div class="featured-main-joueur-details-gauche-cnt" >
									<h4><a href="#">Prochains matchs</a></h4>
									<?php if (!empty($listeProchain)) {
										foreach ($listeProchain as $prochain) {
											echo "<p>".date_format(new DateTime($prochain->getJour()), 'd/m/Y').": ".$prochain->getEquipeDom()." - ".$prochain->getEquipeExt()." (".$prochain->getLibelleCompetition().")</p>";
										}
									}?>
								</div>
								<div class="featured-main-joueur-details-gauche-cnt">
									<h4><a href="#">Classement</a></h4>
									<?php if (!empty($listeEquipes)) {
										foreach ($listeEquipes as $equipe) {
											echo "<p style=\"cursor: pointer;\" onclick=\"window.open('".$equipe->getLienClassement()."','_new')\">".$equipe->getLibelle()."</p>";
										}
									}?>
								</div>
							</div>

<!-- 							<div class="featured-main-joueur-details-droite"> -->

<!-- 							</div> -->
						</div>


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
					<div id="staff" class="staff featured-main-bas-item">
						<div class="cl">&nbsp;</div>
						<h4><a href="#">Staff</a></h4>

						<?php

						if (!empty($listeStaffs)) {
							foreach($listeStaffs as $staff) {
						?>
						<div class="joueur ">
							<?php if ($staff->getPhoto() != null && $staff->getPhoto() != "images/photo/" && $staff->getPhoto() != "" && file_exists($staff->getPhoto())) { ?>
							<img class="vignette" id="<?php echo $staff->getId(); ?>" src="<?php echo $staff->getPhoto();?>" width="55px" height="65px" alt="" title="Entraineur"/>
							<?php } else {?>
							<img class="vignette" id="<?php echo $staff->getId(); ?>" src="images/silhouette.jpeg" width="55px" height="65px" alt="" title="Entraineur"/>
							<?php } ?>
							<?php echo $staff->getNom()." ".$staff->getPrenom(); ?>
							<input type="hidden" id="nom_<?php echo $staff->getId(); ?>" name="nom_<?php echo $staff->getId(); ?>" value="<?php echo $staff->getNom(); ?>" />
							<input type="hidden" id="prenom_<?php echo $staff->getId(); ?>" name="prenom_<?php echo $staff->getId(); ?>" value="<?php echo $staff->getPrenom(); ?>" />
							<input type="hidden" id="dateNaissance_<?php echo $staff->getId(); ?>" name="dateNaissance_<?php echo $staff->getId(); ?>" value="<?php echo date_format(new DateTime($staff->getDateNaissance()), 'd/m/Y'); ?>" />
							<input type="hidden" id="fonction_<?php echo $staff->getId(); ?>" name="fonction_<?php echo $staff->getId(); ?>" value="<?php echo $staff->getLibelleFonction(); ?>" />
							<input type="hidden" id="numLicence_<?php echo $staff->getId(); ?>" name="numLicence_<?php echo $staff->getId(); ?>" value="<?php echo $staff->getNumeroLicence(); ?>" />
						</div>
						<?php } } ?>
					</div>

					<div id="gardiens" class="effectif featured-main-bas-item">
						<div class="cl">&nbsp;</div>
						<h4><a href="#">Gardiens</a></h4>

						<?php

						if (!empty($listeGardiens)) {
							foreach($listeGardiens as $gardien) {
						?>
						<div class="joueur ">


						<?php if ($gardien->getPhoto() != null && $gardien->getPhoto() != "images/photo/" && $gardien->getPhoto() != "" && file_exists($gardien->getPhoto())) { ?>
						<img class="vignette" id="<?php echo $gardien->getId(); ?>" src="<?php echo $gardien->getPhoto();?>" width="55px" height="65px" alt="" />
						<?php } else {?>
						<img class="vignette" id="<?php echo $gardien->getId(); ?>" src="images/silhouette.jpeg" width="55px" height="65px" alt="" />
						<?php } ?>



							<?php echo $gardien->getNom()." ".$gardien->getPrenom(); ?>
							<input type="hidden" id="nom_<?php echo $gardien->getId(); ?>" name="nom_<?php echo $gardien->getId(); ?>" value="<?php echo $gardien->getNom(); ?>" />
							<input type="hidden" id="prenom_<?php echo $gardien->getId(); ?>" name="prenom_<?php echo $gardien->getId(); ?>" value="<?php echo $gardien->getPrenom(); ?>" />
							<input type="hidden" id="dateNaissance_<?php echo $gardien->getId(); ?>" name="dateNaissance_<?php echo $gardien->getId(); ?>" value="<?php echo date_format(new DateTime($gardien->getDateNaissance()), 'd/m/Y'); ?>" />
							<input type="hidden" id="poste_<?php echo $gardien->getId(); ?>" name="poste_<?php echo $gardien->getId(); ?>" value="<?php echo $gardien->getLibellePoste(); ?>" />
							<input type="hidden" id="numLicence_<?php echo $gardien->getId(); ?>" name="numLicence_<?php echo $gardien->getId(); ?>" value="<?php echo $gardien->getNumeroLicence(); ?>" />



						</div>
						<?php } } ?>
					</div>

					<div id="defenseurs" class="effectif featured-main-bas-item">
						<div class="cl">&nbsp;</div>
						<h4><a href="#">Défenseurs</a></h4>

						<?php

						if (!empty($listeDefenseurs)) {
							foreach($listeDefenseurs as $defenseur) {
						?>
						<div class="joueur ">
							<?php if ($defenseur->getPhoto() != null && $defenseur->getPhoto() != "images/photo/" && $defenseur->getPhoto() != "" && file_exists($defenseur->getPhoto())) { ?>
							<img class="vignette" id="<?php echo $defenseur->getId(); ?>" src="<?php echo $defenseur->getPhoto();?>" width="55px" height="65px" alt="" />
							<?php } else {?>
							<img class="vignette" id="<?php echo $defenseur->getId(); ?>" src="images/silhouette.jpeg" width="55px" height="65px" alt="" />
							<?php } ?>
							<?php echo $defenseur->getNom()." ".$defenseur->getPrenom(); ?>
							<input type="hidden" id="nom_<?php echo $defenseur->getId(); ?>" name="nom_<?php echo $defenseur->getId(); ?>" value="<?php echo $defenseur->getNom(); ?>" />
							<input type="hidden" id="prenom_<?php echo $defenseur->getId(); ?>" name="prenom_<?php echo $defenseur->getId(); ?>" value="<?php echo $defenseur->getPrenom(); ?>" />
							<input type="hidden" id="dateNaissance_<?php echo $defenseur->getId(); ?>" name="dateNaissance_<?php echo $defenseur->getId(); ?>" value="<?php echo date_format(new DateTime($defenseur->getDateNaissance()), 'd/m/Y'); ?>" />
							<input type="hidden" id="poste_<?php echo $defenseur->getId(); ?>" name="poste_<?php echo $defenseur->getId(); ?>" value="<?php echo $defenseur->getLibellePoste(); ?>" />
							<input type="hidden" id="numLicence_<?php echo $defenseur->getId(); ?>" name="numLicence_<?php echo $defenseur->getId(); ?>" value="<?php echo $defenseur->getNumeroLicence(); ?>" />
						</div>
						<?php } } ?>


					</div>
					<div id="milieux" class="effectif featured-main-bas-item">
						<div class="cl">&nbsp;</div>
						<h4><a href="#">Milieux</a></h4>
						<?php
						if (!empty($listeMilieux)) {
							foreach($listeMilieux as $milieu) {
						?>
						<div class="joueur ">
							<?php if ($milieu->getPhoto() != null && $milieu->getPhoto() != "images/photo/" && $milieu->getPhoto() != "" && file_exists($milieu->getPhoto())) { ?>
							<img class="vignette" id="<?php echo $milieu->getId(); ?>" src="<?php echo $milieu->getPhoto();?>" width="55px" height="65px" alt="" />
							<?php } else {?>
							<img class="vignette" id="<?php echo $milieu->getId(); ?>" src="images/silhouette.jpeg" width="55px" height="65px" alt="" />
							<?php } ?>
							<?php echo $milieu->getNom()." ".$milieu->getPrenom(); ?>
							<input type="hidden" id="nom_<?php echo $milieu->getId(); ?>" name="nom_<?php echo $milieu->getId(); ?>" value="<?php echo $milieu->getNom(); ?>" />
							<input type="hidden" id="prenom_<?php echo $milieu->getId(); ?>" name="prenom_<?php echo $milieu->getId(); ?>" value="<?php echo $milieu->getPrenom(); ?>" />
							<input type="hidden" id="dateNaissance_<?php echo $milieu->getId(); ?>" name="dateNaissance_<?php echo $milieu->getId(); ?>" value="<?php echo date_format(new DateTime($milieu->getDateNaissance()), 'd/m/Y'); ?>" />
							<input type="hidden" id="poste_<?php echo $milieu->getId(); ?>" name="poste_<?php echo $milieu->getId(); ?>" value="<?php echo $milieu->getLibellePoste(); ?>" />
							<input type="hidden" id="numLicence_<?php echo $milieu->getId(); ?>" name="numLicence_<?php echo $milieu->getId(); ?>" value="<?php echo $milieu->getNumeroLicence(); ?>" />
						</div>
						<?php } } ?>
					</div>
					<div id="attaquants" class="effectif featured-main-bas-item">
						<div class="cl">&nbsp;</div>
						<h4><a href="#">Attaquants</a></h4>
						<?php
						if (!empty($listeAttaquants)) {
							foreach($listeAttaquants as $attaquant) {
						?>
						<div class="joueur ">
							<?php if ($attaquant->getPhoto() != null && $attaquant->getPhoto() != "images/photo/" && $attaquant->getPhoto() != "" && file_exists($attaquant->getPhoto())) { ?>
							<img class="vignette" id="<?php echo $attaquant->getId(); ?>" src="<?php echo $attaquant->getPhoto();?>" width="55px" height="65px" alt="" />
							<?php } else {?>
							<img class="vignette" id="<?php echo $attaquant->getId(); ?>" src="images/silhouette.jpeg" width="55px" height="65px" alt="" />
							<?php } ?>
							<?php echo $attaquant->getNom()." ".$attaquant->getPrenom(); ?>
							<input type="hidden" id="nom_<?php echo $attaquant->getId(); ?>" name="nom_<?php echo $attaquant->getId(); ?>" value="<?php echo $attaquant->getNom(); ?>" />
							<input type="hidden" id="prenom_<?php echo $attaquant->getId(); ?>" name="prenom_<?php echo $attaquant->getId(); ?>" value="<?php echo $attaquant->getPrenom(); ?>" />
							<input type="hidden" id="dateNaissance_<?php echo $attaquant->getId(); ?>" name="dateNaissance_<?php echo $attaquant->getId(); ?>" value="<?php echo date_format(new DateTime($attaquant->getDateNaissance()), 'd/m/Y'); ?>" />
							<input type="hidden" id="poste_<?php echo $attaquant->getId(); ?>" name="poste_<?php echo $attaquant->getId(); ?>" value="<?php echo $attaquant->getLibellePoste(); ?>" />
							<input type="hidden" id="numLicence_<?php echo $attaquant->getId(); ?>" name="numLicence_<?php echo $attaquant->getId(); ?>" value="<?php echo $attaquant->getNumeroLicence(); ?>" />
						</div>
						<?php } } ?>
					</div>
				</div>
				<div class="featured-side-bas">
					<img id="detailPhoto" src="images/silhouette.jpeg" width="250px" height="300px" alt="" />
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