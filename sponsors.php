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
	<meta name="keywords" content="mots-cls" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

	<link href="css/caroussel3D.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">-->
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">
    
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
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
</head>
<body class="w-75 mx-auto bg-light">
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

} catch (PDOException $error) { //Le catch est charg dintercepter une ventuelle erreur
	echo "N : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
?>
	
	<div class="py-5 bg-light">
	    <div class="container">
	      <div class="row text-center">
	        <div class="col-md-12">
	          <h1 class="mb-4">Merci à tous nos partenaires !</h1>
	          <div class="row text-left mt-5">
	            
	            <!-- On boucle 6 fois -->
	            <?php
	            if (!empty($listeSponsors))
	            { 
	              for ($i=0; $i<6; $i++)
	              {
	            	$sponsor = $listeSponsors[$i];
			    	
					?>
					<input type="hidden" id="nomSponsor_<?php echo $sponsor->getId(); ?>" name="nomSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getNom(); ?>" />
					<input type="hidden" id="urlSponsor_<?php echo $sponsor->getId(); ?>" name="urlSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getURL(); ?>" />
					<input type="hidden" id="adresseSponsor_<?php echo $sponsor->getId(); ?>" name="adresseSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getAdresse(); ?>" />
					<input type="hidden" id="cpSponsor_<?php echo $sponsor->getId(); ?>" name="cpSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getCP(); ?>" />
					<input type="hidden" id="villeSponsor_<?php echo $sponsor->getId(); ?>" name="villeSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getVille(); ?>" />
					<input type="hidden" id="telSponsor_<?php echo $sponsor->getId(); ?>" name="telSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getTel(); ?>" />
					<input type="hidden" id="faxSponsor_<?php echo $sponsor->getId(); ?>" name="faxSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getFax(); ?>" />
					<input type="hidden" id="emailSponsor_<?php echo $sponsor->getId(); ?>" name="emailSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getEmail(); ?>" />
					<input type="hidden" id="descriptionSponsor_<?php echo $sponsor->getId(); ?>" name="descriptionSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getDescription(); ?>" />
					<input type="hidden" id="messageSponsor_<?php echo $sponsor->getId(); ?>" name="messageSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getMessage(); ?>" />
					<input type="hidden" id="logoSponsor_<?php echo $sponsor->getId(); ?>" name="logoSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getVignette(); ?>" />
					
					<div class="col-md-6 my-3">
		              <div class="row mb-3">
		                <div class="text-center col-12">
		                  <i class="d-block mx-auto fa fa-3x">
		                  	<img id="c_img" class="img-fluid d-block pi-draggable" src="images/sponsor/moyen/<?php echo $sponsor->getVignette(); ?>" draggable="true"/>
		                  </i>
		                </div>
		                <!--<div class="align-self-center col-12">
		                  <h5 class=""><b><?php echo $sponsor->getNom(); ?></b></h5>
		                </div>-->
		              </div>
		              <p>
		              <?php
		                if (strlen($sponsor->getDescription()) > 250)
		              		echo substr($sponsor->getDescription(), 0, 250)." ...";
						else
							echo $sponsor->getDescription();
					  ?>
					  </p>
		              <a href="<?php echo $sponsor->getURL(); ?>" target="_blank">Site web</a>
		            </div>
					<?php 
			      }
	            }
				?>
	          </div>
	        </div>
	      </div>
	    </div>
	</div>
	
	<div class="py-5">
	    <div class="container">
	    
	    <!-- On boucle 6 fois -->
	    <?php
        if (!empty($listeSponsors))
        { 
          for ($i=6; $i<10; $i++)
          {
        	$sponsor = $listeSponsors[$i];
		?>
		  <input type="hidden" id="nomSponsor_<?php echo $sponsor->getId(); ?>" name="nomSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getNom(); ?>" />
		  <input type="hidden" id="urlSponsor_<?php echo $sponsor->getId(); ?>" name="urlSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getURL(); ?>" />
		  <input type="hidden" id="adresseSponsor_<?php echo $sponsor->getId(); ?>" name="adresseSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getAdresse(); ?>" />
		  <input type="hidden" id="cpSponsor_<?php echo $sponsor->getId(); ?>" name="cpSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getCP(); ?>" />
		  <input type="hidden" id="villeSponsor_<?php echo $sponsor->getId(); ?>" name="villeSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getVille(); ?>" />
		  <input type="hidden" id="telSponsor_<?php echo $sponsor->getId(); ?>" name="telSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getTel(); ?>" />
		  <input type="hidden" id="faxSponsor_<?php echo $sponsor->getId(); ?>" name="faxSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getFax(); ?>" />
		  <input type="hidden" id="emailSponsor_<?php echo $sponsor->getId(); ?>" name="emailSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getEmail(); ?>" />
		  <input type="hidden" id="descriptionSponsor_<?php echo $sponsor->getId(); ?>" name="descriptionSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getDescription(); ?>" />
		  <input type="hidden" id="messageSponsor_<?php echo $sponsor->getId(); ?>" name="messageSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getMessage(); ?>" />
		  <input type="hidden" id="logoSponsor_<?php echo $sponsor->getId(); ?>" name="logoSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getVignette(); ?>" />
	      
	      <?php
	      if ($i % 2 == 0)
	      {
	      	echo "<div class=\"row mb-5\">";
	      	echo "<div class=\"col-md-9 align-self-center\">";
	      	echo "<h2 class=\"\">";echo $sponsor->getNom();echo "</h2>";
	      	echo "<p class=\"\">";echo $sponsor->getDescription();echo "</p>";
	      	echo "<a href=\"".$sponsor->getURL()."\" target=\"_blank\">";echo $sponsor->getURL();echo "</a>";
	      	echo "</div>";
	      	echo "<div class=\"col-md-3 align-self-center\">";
	      	echo "<img class=\"img-fluid d-block w-50\" src=\"images\/sponsor\/moyen\/".$sponsor->getVignette()."\">";
	      	echo "</div>";
	      	echo "</div>";
	      }
	      else
	      {
	      	echo "<div class=\"row\">";
	      	echo "<div class=\"col-md-3\">";
	      	echo "<img class=\"img-fluid d-block w-50\" src=\"images\/sponsor\/moyen\/".$sponsor->getVignette()."\">";
	      	echo "</div>";
	      	echo "<div class=\"col-md-9 align-self-center\">";
	      	echo "<h2 class=\"\">";echo $sponsor->getNom();echo "</h2>";
	      	echo "<p class=\"\">";echo $sponsor->getDescription();echo "</p>";
	      	echo "<a href=\"".$sponsor->getURL()."\" target=\"_blank\">";echo $sponsor->getURL();echo "</a>";
	      	echo "</div>";
	      	echo "</div>";
	      }
	      ?>
	    <?php 
		  }
        }
		?>	      
	    </div>
	</div>
	
	<div class="py-5">
	    <div class="container">
			<div class="row">
				<!-- On boucle 6 fois -->
			    <?php
		        if (!empty($listeSponsors))
		        { 
		          for ($i=10; $i < count($listeSponsors); $i++)
		          {
		        	$sponsor = $listeSponsors[$i];
				?>
				  <input type="hidden" id="nomSponsor_<?php echo $sponsor->getId(); ?>" name="nomSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getNom(); ?>" />
				  <input type="hidden" id="urlSponsor_<?php echo $sponsor->getId(); ?>" name="urlSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getURL(); ?>" />
				  <input type="hidden" id="adresseSponsor_<?php echo $sponsor->getId(); ?>" name="adresseSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getAdresse(); ?>" />
				  <input type="hidden" id="cpSponsor_<?php echo $sponsor->getId(); ?>" name="cpSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getCP(); ?>" />
				  <input type="hidden" id="villeSponsor_<?php echo $sponsor->getId(); ?>" name="villeSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getVille(); ?>" />
				  <input type="hidden" id="telSponsor_<?php echo $sponsor->getId(); ?>" name="telSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getTel(); ?>" />
				  <input type="hidden" id="faxSponsor_<?php echo $sponsor->getId(); ?>" name="faxSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getFax(); ?>" />
				  <input type="hidden" id="emailSponsor_<?php echo $sponsor->getId(); ?>" name="emailSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getEmail(); ?>" />
				  <input type="hidden" id="descriptionSponsor_<?php echo $sponsor->getId(); ?>" name="descriptionSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getDescription(); ?>" />
				  <input type="hidden" id="messageSponsor_<?php echo $sponsor->getId(); ?>" name="messageSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getMessage(); ?>" />
				  <input type="hidden" id="logoSponsor_<?php echo $sponsor->getId(); ?>" name="logoSponsor_<?php echo $sponsor->getId(); ?>" value="<?php echo $sponsor->getVignette(); ?>" />
			      
			      <div class="p-2 col-md-2 col-6">
			      	<a href="<?php echo $sponsor->getURL(); ?>">
			      	  <img src="images/sponsor/moyen/<?php echo $sponsor->getVignette(); ?>" class="img-fluid mx-auto img-thumbnail" width="150" height="150">
			      	</a>
			      </div>
				<?php 
				  }
		        }
				?>
			</div>
		</div>
	</div>
	
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