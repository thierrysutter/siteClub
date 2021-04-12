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
	<?php
	  include("tac.php");
	?>
	<meta charset="UTF-8">
	<meta http-equiv="Cache-Control" content="max-age=600" />
	<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-cl�s" />
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

			$idCategorie = $("#categorie").val(); 
			$("#lienU7").removeClass("active");
			$("#lienU9").removeClass("active");
			$("#lienU11").removeClass("active");
			if ($idCategorie == 1)
				$("#lienU7").addClass("active");
			else if ($idCategorie == 2)
				$("#lienU9").addClass("active");
			else if ($idCategorie == 3)
				$("#lienU11").addClass("active");
			
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
	              <a data-toggle="pill" href="#u7" class="active nav-link" role="tab"> <i class="fa fa-bars"></i>&nbsp;U6-U7</a>
	            </li>
	            <li class="nav-item">
	              <a data-toggle="pill" href="#u9" class="nav-link" role="tab"><i class="fa fa-bars"></i>&nbsp;U8-U9</a>
	            </li>
	            <li class="nav-item">
	              <a data-toggle="pill" href="#u11" class="nav-link" role="tab"><i class="fa fa-bars"></i>&nbsp;U10-U11</a>
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
				  <div id="u7" class="tab-pane fade show active" role="tabpanel">
				    <div class="py-5">
					    <div class="container">
					      <div class="row">
					        <div class="col-md-3">
					          <img class="img-fluid d-block mb-4 w-50 img-thumbnail" src="images/ASSJLMVERT.jpg"> </div>
					        <div class="col-md-9">
					          <h3 class="text-primary pt-3">Categorie U6/U7</h3>
					          <p class="">Joueurs et joueuses né.e.s en 2014 et 2015 </p>
					          <h5 class="text-primary pt-3">Entrainements </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								Tous les mercredis à 14:30:00 au Stade de Grimont
							  </p>
							  <h5 class="text-primary pt-3">Educateurs </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								
							  </p>
					        </div>
					      </div>
					    </div>
					  </div>
				  </div>
				  <div id="u9" class="tab-pane fade" role="tabpanel">
				    <div class="py-5">
					    <div class="container">
					      <div class="row">
					        <div class="col-md-3">
					          <img class="img-fluid d-block mb-4 w-50 img-thumbnail" src="images/ASSJLMVERT.jpg"> </div>
					        <div class="col-md-9">
					          <h3 class="text-primary pt-3">Categorie U8/U9</h3>
					          <p class="">Joueurs et joueuses né.e.s en 2012 et 2013 </p>
					          <h5 class="text-primary pt-3">Entrainements </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								Tous les mercredis à 15:30:00 au Stade de Grimont<br/>
								Tous les vendredis à 16:30:00 au Stade de Grimont<br/>
							  </p>
							  <h5 class="text-primary pt-3">Educateurs </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								
							  </p>
					        </div>
					      </div>
					    </div>
					  </div>
				  </div>
				  <div id="u11" class="tab-pane fade" role="tabpanel">
				  	<div class="py-5">
					    <div class="container">
					      <div class="row">
					        <div class="col-md-3">
					          <img class="img-fluid d-block mb-4 w-50 img-thumbnail" src="images/article/repriseJeunes2014.jpg"> </div>
					        <div class="col-md-9">
					          <h3 class="text-primary pt-3">Categorie U10/U11</h3>
					          <p class="">Joueurs et joueuses né.e.s en 2010 et 2011 </p>
					          <h5 class="text-primary pt-3">Entrainements </h5>
					          <p style="font-size: 14px; padding-top: 0px;">
								Tous les mercredis à 15:30:00 au Stade de Grimont<br/>
								Tous les vendredis à 16:30:00 au Stade de Grimont<br/>
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