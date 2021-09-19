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
$categorie2 = 4; // u7
$cat2 = null;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>
	<meta charset="windows-1252">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-clés" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">-->
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$idCategorie = $("#categorie2").val(); 
			
			$("#lienU13").removeClass("active");
			$("#lienU15").removeClass("active");
			$("#lienU17").removeClass("active");
			$("#lienU18").removeClass("active");
			
			if ($idCategorie == 4)
				$("#lienU13").addClass("active");
			else if ($idCategorie == 5)
				$("#lienU15").addClass("active");
			else if ($idCategorie == 6)
				$("#lienU17").addClass("active");
			else if ($idCategorie == 7)
				$("#lienU18").addClass("active");
			
			$("#lienU13").click(function(e) {
				$("#categorie2").val(4);
				$("#form1").submit();
				return false;
			});

			$("#lienU15").click(function(e) {
				$("#categorie2").val(5);
				$("#form1").submit();
				return false;
			});

			$("#lienU17").click(function(e) {
				$("#categorie2").val(6);
				$("#form1").submit();
				return false;
			});

			$("#lienU18").click(function(e) {
				$("#categorie2").val(7);
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
	if (isset($_SESSION['categorie2']))
		$categorie2 = $_SESSION['categorie2'];
	if (isset($_SESSION['cat2']))
		$cat2 = $_SESSION['cat2'];
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
	
} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
?>

	<div class="py-0">
	    <div class="container">
	      <div class="row mx-auto">
	        <div class="col-md-12 ">
	          <ul class="nav nav-pills nav-justified" role="tablist">
	            <li class="nav-item">
	              <a data-toggle="pill" href="#u13" class="active nav-link" role="tab"><i class="fa fa-bars"></i>&nbsp;U12-U13</a>
	            </li>
	            <li class="nav-item">
	              <a data-toggle="pill" href="#u15" class="nav-link" role="tab"><i class="fa fa-bars"></i>&nbsp;U14-U15</a>
	            </li>
	            <li class="nav-item">
	              <a data-toggle="pill" href="#u17" class="nav-link" role="tab"><i class="fa fa-bars"></i>&nbsp;U16-U17</a>
	            </li>
	            <li class="nav-item">
	              <a data-toggle="pill" href="#u18" class="nav-link" role="tab"><i class="fa fa-bars"></i>&nbsp;U18</a>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </div>
	</div>
	<div class="py-2">
	    <div class="container">
		  <div class="row">
  			<div class="col-sm-12">
				<div class="tab-content">
				  <div id="u13" class="tab-pane fade show active" role="tabpanel">
				    <div class="py-5">
					    <div class="container">
					      <div class="row">
					        <div class="col-md-3">
					          <img class="img-fluid d-block mb-4 w-50 img-thumbnail" src="images/ASSJLMVERT.jpg"> </div>
					        <div class="col-md-9">
					          <h3 class="text-primary pt-3">Categorie U12/U13</h3>
					          <p class="">Joueurs et joueuses né.e.s en 2008 et 2009 </p>
					          <h5 class="text-primary pt-3">Entrainements </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								Tous les mercredis à 17:30:00 au Stade de Grimont<br/>
								Tous les vendredis à 18:00:00 au Stade de Grimont<br/>
							  </p>
							  <h5 class="text-primary pt-3">Educateurs </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								
							  </p>
					        </div>
					      </div>
					    </div>
					  </div>
				  </div>
				  <div id="u15" class="tab-pane fade" role="tabpanel">
				    <div class="py-5">
					    <div class="container">
					      <div class="row">
					        <div class="col-md-3">
					          <img class="img-fluid d-block mb-4 w-50 img-thumbnail" src="images/ASSJLMVERT.jpg"> </div>
					        <div class="col-md-9">
					          <h3 class="text-primary pt-3">Categorie U14/U15</h3>
					          <p class="">Joueurs et joueuses né.e.s en 2006 et 2007 </p>
					          <h5 class="text-primary pt-3">Entrainements </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								Tous les mercredis à 18:00:00 au Stade de Grimont
								Tous les vendredis à 18:00:00 au Stade de Grimont
							  </p>
							  <h5 class="text-primary pt-3">Educateurs </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								Franco GASTRINI<br/>
								Eric PETOT
							  </p>
					        </div>
					      </div>
					    </div>
					  </div>
				  </div>
				  <div id="u17" class="tab-pane fade" role="tabpanel">
				    <div class="py-5">
					    <div class="container">
					      <div class="row">
					        <div class="col-md-3">
					          <img class="img-fluid d-block mb-4 w-50 img-thumbnail" src="images/ASSJLMVERT.jpg"> </div>
					        <div class="col-md-9">
					          <h3 class="text-primary pt-3">Categorie U16/U17</h3>
					          <p class="">Joueurs et joueuses né.e.s en 2004 et 2005 </p>
					          <h5 class="text-primary pt-3">Entrainements </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								Tous les mardis à 18:00:00 au Stade de Grimont
								Tous les jeudis à 18:30:00 au Stade de Grimont
							  </p>
							  <h5 class="text-primary pt-3">Educateurs </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								
							  </p>
					        </div>
					      </div>
					    </div>
					  </div>
				  </div>

				  <div id="u18" class="tab-pane fade" role="tabpanel">
				    <div class="py-5">
					    <div class="container">
					      <div class="row">
					        <div class="col-md-3">
					          <img class="img-fluid d-block mb-4 w-50 img-thumbnail" src="images/ASSJLMVERT.jpg"> </div>
					        <div class="col-md-9">
					          <h3 class="text-primary pt-3">Categorie U18</h3>
					          <p class="">Joueurs et joueuses né.e.s en 2003</p>
					          <h5 class="text-primary pt-3">Entrainements </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
							  </p>
							  <h5 class="text-primary pt-3">Educateurs </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								
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