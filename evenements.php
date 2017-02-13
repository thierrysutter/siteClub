<?php
ob_start();
$listeEvenements = array();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="ISO-8859-1">
	<meta name="keywords" content="mots-clés" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>

	
	<script type="text/javascript">
		$(document).ready(function(){
			$(".entete").click(function() {
				$id=$(this).prop("id");

				$photo = $("#photo_"+$id).val();
				$texte = $("#texte_"+$id).val();
				$document = $("#document_"+$id).val();

				$("img#detailPhoto").prop("src",$photo);
				$("#detailTexte").html($texte);
				$("#detailDocument").prop("href",$document);
				$("#detailDocument").html($document);

				$("#galeriePhoto").html("");
				//recharger galerie photo 
			});

			$(".vignette").click(function() {
				$("#imageArticlePopup").prop("src", $(this).prop("src"));
				$("#dialogPhoto").dialog("open");
			});
	
			$("#dialogPhoto").dialog({
				autoOpen: false,
				width: 1024,
				height: 768,
	  			modal: true,
	  			title: "",
	  			buttons: {
	  				Fermer: function() {
	  					$(this).dialog( "close" );
	  				}
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
	if (isset($_SESSION['listeEvenements']))
		$listeEvenements = $_SESSION['listeEvenements'];
} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
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
						<?php
							
						    if (!empty($listeEvenements)) {
							foreach($listeEvenements as $evenement) {
								echo "<li class=\"entete\" id=\"".$evenement->getId()."\"><div class=\"link\"><a href=\"#\" id=\"\">".$evenement->getTitre()."</a></div></li>";
								echo "<input type=\"hidden\" name=\"photo_".$evenement->getId()."\" id=\"photo_".$evenement->getId()."\" value=\"".$evenement->getPhoto()."\"/>";
								echo "<input type=\"hidden\" name=\"texte_".$evenement->getId()."\" id=\"texte_".$evenement->getId()."\" value=\"".$evenement->getTexte()."\"/>";
								echo "<input type=\"hidden\" name=\"document_".$evenement->getId()."\" id=\"document_".$evenement->getId()."\" value=\"document/".$evenement->getDocument()."\"/>";
								
							}
						}?>
					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
					<?php if (!empty($listeEvenements)) {
					}?>
						<div class="cl">&nbsp;</div>
						<div class="featured-main-evt" id="detailPhoto">
							<img id="detailPhoto" src="<?php echo $listeEvenements[0]->getPhoto();?>" width="219px" height="310px" style="text-align: center;"/>
						</div>
						<div class="featured-side-evt" id="detailTexte"><?php echo $listeEvenements[0]->getTexte();?></div>
						<div class="featured-side-evt"><span style="text-decoration: underline; cursor: pointer;"><a id="detailDocument" href="document/<?php echo $listeEvenements[0]->getDocument();?>" target="new"><?php echo $listeEvenements[0]->getDocument();?></a></span>.</div>
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
			<div id="sidebar">

			</div>
			<div id="content">
				<!-- 
				<div class="featured-main-bas-evt" id="galeriePhoto">
					<div class="cl">&nbsp;</div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/coupes.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/coupes2.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/coupes3.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/apmu13.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/assjCartier.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/assjChoplin.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/buvetteExt.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/cartierChoplin.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/chalonschampagne.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/choplin.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/escaudain.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/etzellaEttelbruck.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/forbachu11.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/jarvilleu11.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/templiersCartier.jpg" width="100%" height="100%"/></div>
					<div class="evenement"><img class="vignette" id="" src="images/evenement/1/vignette/villerssemeuse.jpg" width="100%" height="100%"/></div>
					<div class="cl">&nbsp;</div>
				</div>-->
				 
			</div>
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
	<div id="dialogPhoto" style="display: none;">
		<div class="popup-featured-side" style="text-align: center;">
			<div class="popup-featured-side-item">
	    		<a class="left" href="#"><img id="imageArticlePopup" style="width: 100%; height: 100%;" alt="" src=""></img></a>
			</div>
		</div>
	</div>
	
	
	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js" ></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
</body>


</html>
<?php
ob_end_flush();
?>