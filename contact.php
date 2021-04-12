<?php
ob_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">-->
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">
	
	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#message").dialog({
				autoOpen: false,
				height: 200,
				width: 350,
				modal: true,
				title: "Message",
				buttons: {
					OK: function() {
						$(this).dialog( "close" );
					},
					Annuler: function() {
						$(this).dialog( "close" );
					}
				}
			});
		});
	</script>	
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
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
	
	
	
	<div class="">
	  <div class="container">
	    <?php
		if (isset($_SESSION['retour'])) {
		if (isset($_SESSION['messageOK'])) {
		?>
	  	<div class="row" id="divOK">
	  	  <div class="col-md-12">
	  	  	<div class="alert alert-success" role="alert">
	    	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    	  	<span aria-hidden="true">�</span>
	    	  </button>
	    	  <h4 class="alert-heading">Votre message a bien &eacute;t&eacute; envoy&eacute; !</h4>
	    	  <p class="mb-0">Nous vous r&eacute;pondrons dans les plus bref d&eacute;lais.</p>
	    	</div>
	      </div>
	    </div>
	  	<?php
		}
		if (isset($_SESSION['messageKO'])) {
			$civilite = $_SESSION['civilite'];
			$nom = $_SESSION['nom'];
			$prenom = $_SESSION['prenom'];
			$email = $_SESSION['email'];
			$objet = $_SESSION['objet'];
			$message = $_SESSION['message'];
		?>
		<div class="row" id="divErreur">
	      <div class="col-md-12">
	      	<div class="alert alert-danger" role="alert">
	      	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	      	  	<span aria-hidden="true">X</span>
	      	  </button>
	      	  <h4 class="alert-heading">Votre message n'a pas &eacute;t&eacute; envoy&eacute; !</h4>
	    	  <p class="mb-0">Une erreur est intervenue pendant l'envoi de votre message. Merci de v&eacute;rifier tous les champs du formulaire. Si le probl�me persiste, vous pouvez nous contactez au 03 87 37 04 34.</p>
	      	</div>
	      </div>
	    </div>
	    <?php
		}
		} else {
		//unset($_SESSION['messageOK']);
		//unset($_SESSION['messageKO']);
		}
		unset($_SESSION['retour']);
		?>
	  </div>
	</div>
  
	<div class="py-5 my-5 text-center text-white opaque-overlay" style="background-image: url(&quot;css/images/heading.jpg&quot;);">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	          <h1 class="text-gray-dark">Contactez nous</h1>
	          <p class="lead mb-4">Compl&eacute;tez tous les champs et envoyer votre message</p>
	          <form class="text-left" action="EnvoyerMessage.php" method="post" id="form">
	          	<input type="hidden" id="origine" name="origine" value="contact"/>
	            <div class="form-group row">
	              <div class="col-md-4"> <label for="nom">Nom</label>
	                <input type="text" required id="nom" name="nom" class="form-control" placeholder="Votre nom" <?php if (isset($_SESSION['messageKO'])) { echo "value='$nom'"; } ?>> </div>
	              <div class="col-md-4"> <label for="prenom">Pr&eacute;nom</label>
	                <input type="text" required class="form-control" id="prenom" name="prenom" placeholder="Votre pr&eacute;nom" <?php if (isset($_SESSION['messageKO'])) { echo "value='$prenom'"; } ?> > </div>
	              <div class="col-md-4"> <label for="email">Email</label>
	                <input type="email" required class="form-control" id="email" name="email" placeholder="Votre email" <?php if (isset($_SESSION['messageKO'])) { echo "value='$email'"; } ?> > </div>
	            </div>
	            <div class="form-group row">
	              <div class="col-md-12"> <label for="message">Message</label> <textarea class="form-control" id="message" name="message" rows="8" placeholder="Votre message"><?php if (isset($_SESSION['messageKO'])) { echo "$message"; } ?></textarea>
	                <button type="submit" class="btn btn-primary mt-4 btn-block">Envoyer</button>
	              </div>
	            </div>
	          </form>
	          <!-- <p><div class="g-recaptcha" data-sitekey="6LeDJikTAAAAAKF_QM6eq4rkUFHVHyem88svQtUc"></div></p> -->
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