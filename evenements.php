<?php
ob_start();
$listeEvenements = array();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>
	<meta charset="ISO-8859-1">
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">-->
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">
	
	
</head>
<body class="w-75 mx-auto bg-light">
	<!-- Header -->
	<?php
	  //include("head.php");
	?>
	<!-- End Header -->

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
	if (isset($_SESSION['listeEvenements']))
		$listeEvenements = $_SESSION['listeEvenements'];
} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
?>

	<div class="py-5">
	    <div class="container">
	    <!-- On boucle 6 fois -->
	    <?php
		    if (!empty($listeEvenements))
	        {
	          foreach($listeEvenements as $evenement)
	          {
		      	echo "<div class=\"row mb-5\">";
		      	echo "<div class=\"col-md-9 align-self-center\">";
		      	echo "<h2 class=\"\">";echo $evenement->getTitre();echo "</h2>";
		      	echo "<p class=\"\">";echo $evenement->getTexte();echo "</p>";
		      	//echo "<a href=\"".$sponsor->getURL()."\" target=\"_blank\">";echo $sponsor->getURL();echo "</a>";
		      	echo "</div>";
		      	echo "<div class=\"col-md-3 align-self-center\">";
		      	echo "<img class=\"img-fluid d-block w-75\" src=\"".$evenement->getPhoto()."\">";
		      	echo "</div>";
		      	echo "</div>";
			  }
			}
			else
			{
				echo "<div class=\"row mb-5\">";
				  echo "<div class=\"col-md-9 align-self-center\">";
				  echo "<h2 class=\"\">Aucun evenement</h2>";
				  echo "</div>";
		      	echo "</div>";
			}
			?>	      
	    </div>
	</div>

	<!-- Bandeau sponsors -->
	<?php
	//include("bandeau_sponsors.php");
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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js" ></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
</body>


</html>
<?php
ob_end_flush();
?>