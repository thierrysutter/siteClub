<?php
ob_start();


$listeDernier = array();
$listeDernierA = array();
$listeDernierB = array();
$listeDernierC = array();
$listeProchain = array();
$listeProchainA = array();
$listeProchainB = array();
$listeProchainC = array();
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
	<meta charset="ISO-8859-1">
	<meta http-equiv="Cache-Control" content="max-age=600" />
	<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-clés" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
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
<body class="w-75 mx-auto bg-light">

	<!-- Navigation Haut-->
	<?php
	  include("menuHaut.php");
	?>
	<!-- End Navigation -->
	
	<!-- Header -->
	<?php
	  include("head.php");
	?>
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
	
	if (isset($_SESSION['listeDernierA']))
		$listeDernierA = $_SESSION['listeDernierA'];
	if (isset($_SESSION['listeProchainA']))
		$listeProchainA = $_SESSION['listeProchainA'];
		
	if (isset($_SESSION['listeDernierB']))
		$listeDernierB = $_SESSION['listeDernierB'];
	if (isset($_SESSION['listeProchainB']))
		$listeProchainB = $_SESSION['listeProchainB'];
			
				
	if (isset($_SESSION['listeDernierC']))
		$listeDernierC = $_SESSION['listeDernierC'];
	if (isset($_SESSION['listeProchainC']))
		$listeProchainC = $_SESSION['listeProchainC'];
	
} catch (PDOException $error) { //Le catch est chargé d'intercepter une éventuelle erreur
	echo "NÂ° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
?>

	<div class="py-0">
	    <div class="container">
	      	<div class="row mx-auto">
	        	<div class="col-md-12 ">
	          		<ul class="nav nav-pills nav-justified" role="tablist">
	            		<li class="nav-item">
	              			<a data-toggle="pill" href="#equipeA" class="active nav-link" role="tab"> <i class="fa "></i>&nbsp;Equipe A</a>
	            		</li>
	            		<li class="nav-item">
	              			<a data-toggle="pill" href="#equipeB" class="nav-link" role="tab"><i class="fa "></i>&nbsp;Equipe B</a>
	            		</li>
	            		<li class="nav-item">
	              			<a data-toggle="pill" href="#equipeC" class="nav-link" role="tab"><i class="fa "></i>&nbsp;Equipe C</a>
	            		</li>
	            		<li class="nav-item">
	              			<a data-toggle="pill" href="#equipeD" class="nav-link" role="tab"><i class="fa "></i>&nbsp;Equipe D</a>
	            		</li>
	            		<li class="nav-item">
	              			<a data-toggle="pill" href="#equipeFem" class="nav-link" role="tab"><i class="fa "></i>&nbsp;Equipe Féminines</a>
	            		</li>
	          		</ul>
	        	</div>
	      	</div>
	      	<div class="row mx-auto">
		      	<div class="col-md-12 ">
					<div class="tab-content">
				  		<div id="equipeA" class="tab-pane fade show active" role="tabpanel">
				    		<div class="my-4">
					    		<div class="container">
					      			<div class="row text-center my-3">
					      				<div class="col-md-12"><h3>Régionale 2 - Groupe </h3></div>
					      			</div>
					      			<div class="row">
						        		<div class="col-md-6">
					          				<h4 class="text-center">Dernier match</h4>
					          				<p>
												<?php if (!empty($listeDernierA)) {
												foreach ($listeDernierA as $dernier) {
												echo "<p>".date_format(new DateTime($dernier->getJour()), 'd/m/Y').": ".$dernier->getEquipeDom()." - ".$dernier->getEquipeExt()." : ".$dernier->getScoreDom()." - ".$dernier->getScoreExt()."&nbsp;".($dernier->getCompteRendu()!=null && $dernier->getCompteRendu()!="" ? "<img class=\"CR\" id=\"".$dernier->getId()."\" src=\"images/compteRendu16.png\" style=\"vertical-align: middle;\" />" : "")."</p>";
												}
												}?>
							  				</p>
					        			</div>
					        			<div class="col-md-6">
					          				<h4 class="text-center">Prochain match</h4>
					          				<p>
											  	<?php if (!empty($listeProchainA)) {
												foreach ($listeProchainA as $prochain) {
												echo "<p>".date_format(new DateTime($prochain->getJour()), 'd/m/Y').": ".$prochain->getEquipeDom()." - ".$prochain->getEquipeExt()."</p>";
												}
												}?>
											</p>
					        			</div>
					      			</div>
					    		</div>
					  		</div>
				  		</div>
				  		<div id="equipeB" class="tab-pane fade" role="tabpanel">
				    		<div class="my-4">
					    		<div class="container">
					      			<div class="row text-center my-3">
					      				<div class="col-md-12"><h3>Deuxième division - Groupe </h3></div>
					      			</div>
					      			<div class="row ">
					        			<div class="col-md-6 ">
					          				<h4 class="text-center">Dernier match</h4>
					          				<p>
											  	<?php if (!empty($listeDernierB)) {
												foreach ($listeDernierB as $dernier) {
												echo "<p>".date_format(new DateTime($dernier->getJour()), 'd/m/Y').": ".$dernier->getEquipeDom()." - ".$dernier->getEquipeExt()." : ".$dernier->getScoreDom()." - ".$dernier->getScoreExt()."&nbsp;".($dernier->getCompteRendu()!=null && $dernier->getCompteRendu()!="" ? "<img class=\"CR\" id=\"".$dernier->getId()."\" src=\"images/compteRendu16.png\" style=\"vertical-align: middle;\" />" : "")."</p>";
												}
												}?>
											</p>
					        			</div>
					        			<div class="col-md-6">
					          				<h4 class="text-center">Prochain match</h4>
					          				<p>
												<?php if (!empty($listeProchainB)) {
												foreach ($listeProchainB as $prochain) {
												echo "<p>".date_format(new DateTime($prochain->getJour()), 'd/m/Y').": ".$prochain->getEquipeDom()." - ".$prochain->getEquipeExt()." </p>";
												}
												}?>
											</p>
					        			</div>
					      			</div>
					    		</div>
					  		</div>
				  		</div>
						<div id="equipeC" class="tab-pane fade" role="tabpanel">
							<div class="my-4">
								<div class="container">
									<div class="row text-center my-3">
										<div class="col-md-12"><h3>Troisième division - Groupe </h3></div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<h4 class="text-center">Dernier match</h4>
											<p>
												<?php if (!empty($listeDernierC)) {
												foreach ($listeDernierC as $dernier) {
													echo "<p>".date_format(new DateTime($dernier->getJour()), 'd/m/Y').": ".$dernier->getEquipeDom()." - ".$dernier->getEquipeExt()." : ".$dernier->getScoreDom()." - ".$dernier->getScoreExt()."&nbsp;".($dernier->getCompteRendu()!=null && $dernier->getCompteRendu()!="" ? "<img class=\"CR\" id=\"".$dernier->getId()."\" src=\"images/compteRendu16.png\" style=\"vertical-align: middle;\" />" : "")."</p>";
												}
												}?>
											</p>
										</div>
										<div class="col-md-6">
											<h4 class="text-center">Prochain match</h4>
											<p>
												<?php if (!empty($listeProchainC)) {
												foreach ($listeProchainC as $prochain) {
													echo "<p>".date_format(new DateTime($prochain->getJour()), 'd/m/Y').": ".$prochain->getEquipeDom()." - ".$prochain->getEquipeExt()." </p>";
												}
												}?>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="equipeD" class="tab-pane fade" role="tabpanel">
							<div class="my-4">
								<div class="container">
									<div class="row text-center my-3">
										<div class="col-md-12"><h3>Quatrième division - Groupe </h3></div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<h4 class="text-center">Dernier match</h4>
											<p>
												<?php if (!empty($listeDernierD)) {
												foreach ($listeDernierD as $dernier) {
													echo "<p>".date_format(new DateTime($dernier->getJour()), 'd/m/Y').": ".$dernier->getEquipeDom()." - ".$dernier->getEquipeExt()." : ".$dernier->getScoreDom()." - ".$dernier->getScoreExt()."&nbsp;".($dernier->getCompteRendu()!=null && $dernier->getCompteRendu()!="" ? "<img class=\"CR\" id=\"".$dernier->getId()."\" src=\"images/compteRendu16.png\" style=\"vertical-align: middle;\" />" : "")."</p>";
												}
												}?>
											</p>
										</div>
										<div class="col-md-6">
											<h4 class="text-center">Prochain match</h4>
											<p>
												<?php if (!empty($listeProchainD)) {
												foreach ($listeProchainD as $prochain) {
													echo "<p>".date_format(new DateTime($prochain->getJour()), 'd/m/Y').": ".$prochain->getEquipeDom()." - ".$prochain->getEquipeExt()." </p>";
												}
												}?>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Main 
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