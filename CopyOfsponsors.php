<?php
ob_start();

$listeSponsors = array();
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
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

	<link href="css/caroussel3D.css" rel="stylesheet">
    
    
    
	<script type="text/javascript" src="js/jquery/jquery.min.js" ></script>
	
	<script type="text/javascript" src="js/slick.js" ></script>
	<script type="text/javascript" src="js/scripts.js" ></script>
    <script src="js/util.js"></script>
    <script src="js/caroussel3D.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#detailPhoto").click(function(){
				window.open($("#detailURL").attr("href"), '_new');
			});

			$(".vignette").click(function(){
				$id=$(this).prop("id");

				//$src=$(this).prop("src"); // url de l'image du sponsor choisi
				$src=$("#logoSponsor_"+$id).val();;

				$nom = $("#nomSponsor_"+$id).val();
				$url = $("#urlSponsor_"+$id).val();

				$adresse = $("#adresseSponsor_"+$id).val();
				$cp = $("#cpSponsor_"+$id).val();
				$ville = $("#villeSponsor_"+$id).val();
				$tel = $("#telSponsor_"+$id).val();
				$fax = $("#faxSponsor_"+$id).val();
				$email = $("#emailSponsor_"+$id).val();
				$description = $("#descriptionSponsor_"+$id).val();
				$message = $("#messageSponsor_"+$id).val();

				$("#detailPhoto").prop("src","images/sponsor/"+$src);
				$("#detailURL").html($nom.toUpperCase());
				$("#detailURL").prop("href",$url);

				if($adresse != "") {
					$("#adresse").html($adresse);
					$("#cpville").html($cp + " " + $ville);
				} else {
					$("#adresse").html("");
					$("#cpville").html("");
				}
				if($tel != "") {
					$("#tel").html("Tel: "+$tel);
				} else {
					$("#tel").html("");
				}
				if($fax != "") {
					$("#fax").html("Fax: "+$fax);
				} else {
					$("#fax").html("");
				}
				if($email != "") {
					$("#email").html("Email: "+$email);
				} else {
					$("#email").html("");
				}

				if($description != "") {
					//$("#description").html("Description: "+$description);
					$("#description").html(""+$description);
				} else {
					$("#description").html("");
				}

				if($message != "") {
					$("#message").html($message);
				} else {
					$("#message").html("");
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
	if (isset($_SESSION['listeSponsors']))
		$listeSponsors = $_SESSION['listeSponsors'];

} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
?>
	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav ->
				<div id="side-nav">
					<ul>
					    <li><div class="link"><a href="ActionAccueil.php">Accueil</a></div></li>
					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<div class="featured-main-joueur">
						<div style="margin-bottom: 10px;">
						Votre aide est pour beaucoup dans notre r�ussite et nous tenons � vous t�moigner toute la reconnaissance de notre club pour votre aide. <br>
						Si vous aussi, vous souhaitez nous apporter votre aide (financi�re, mat�rielle, etc ...), n'h�sitez pas � prendre contact avec nous <img alt="" src="images/form_email.gif" width="16px" height="16px"  style="vertical-align: middle; cursor: pointer;" onclick="window.open('contact.php', '_self')"/><br>
						</div>
						
						<?php
						if (!empty($listeSponsors)) {
						?>
						<section class="containerCaroussel">
						    <div id="carousel3D">
						    <?php foreach($listeSponsors as $sponsor) { ?>
						    	<img class="" <?php echo $sponsor->getId();?>" src="images/sponsor/moyen/<?php echo $sponsor->getVignette(); ?>" width="80px" height="80px"  >
						    <?php } ?>
						    </div>
						</section>
						
						
						<div class="featured-main-joueur-bas" style="padding-top: 4px;text-align: center;width: 100%; height: 280px;">
							
						
						<section id="options">
						  	<input type="hidden" id="panel-count" value="<?php echo count($listeSponsors); ?>"/>
						    <p id="navigation">
						      <button class="bouton" id="previous" data-increment="-1" class="btn btn-default" role="button">Pr�c�dent</button>
						      <button class="bouton" id="next" data-increment="1" class="btn btn-default" role="button">Suivant</button>
						    </p>
						</section>
						</div>
						<?php } ?>
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
				<div class="sponsor-main-bas">
					<img id="detailPhoto" src="images/sponsor/<?php echo $listeSponsors[0]->getVignette(); ?>" style="max-width: 260px; max-height: 260px; cursor:pointer;" alt=""/>
				</div>
				<div class="sponsor-side-bas">
					<div id="detail" class="staff sponsor-main-bas-item">
						<div class="cl">&nbsp;</div>
						<h4><a id="detailURL" href="<?php echo $listeSponsors[0]->getURL(); ?>" target="_new"><?php echo $listeSponsors[0]->getNom(); ?></a></h4>
						<div id="adresse"><?php echo $listeSponsors[0]->getAdresse(); ?></div>
						<div id="cpville"><?php echo $listeSponsors[0]->getCP()." ".$listeSponsors[0]->getVille(); ?></div>
						<div id="tel">T�l: <?php echo $listeSponsors[0]->getTel(); ?></div>
						<div id="fax">Fax: <?php echo $listeSponsors[0]->getFax(); ?></div>
						<div id="email">Email: <?php echo $listeSponsors[0]->getEmail(); ?></div>
							<!--<span style="text-decoration: underline; cursor: pointer;" onclick="window.open('http://kinepolis.fr/splash?destination=cinemas/kinepolis-st-julien-les-metz')">Site web</span>-->
						<div id="description" style="margin-top: 10px;"><!-- Description: --><?php echo $listeSponsors[0]->getDescription(); ?></div>

						<div id="message" style="margin-top: 10px;"><?php echo $listeSponsors[0]->getMessage(); ?></div>
						<!--
						<div>
							<div class="cl">&nbsp;</div>
							<h4>Description</h4>
							<div id="description">
							bla bla bla
							</div>
							<div class="cl">&nbsp;</div>
						</div>
						<div>
							<div class="cl">&nbsp;</div>
							<h4>Message</h4>
							<div id="message">
							bla bla bla
							</div>
							<div class="cl">&nbsp;</div>
						</div>
						-->
					</div>
				</div>
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