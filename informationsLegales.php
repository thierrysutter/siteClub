<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php
	  include("tac.php");
	?>

<meta charset="windows-1252">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>

	
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
	
  	<?php
	  include("head.php");
	?>

    <div class="container">
        <div class="row mx-auto">
            <div class="col-md-12 text-center">
            <h1>Mentions légales</h1>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-md-12 ">
            Nom du club : AS Saint Julien Lès Metz<br/>
            N° affiliation FFF : 521781<br/>
            Adresse postale : Boucle de la bergerie 57070 SAINT-JULIEN-LES-METZ<br/>
			Email : contact@assaintjulienlesmetz.com<br/>
			Téléphone : 03 87 37 04 34<br/>
			Président : Bernard PIGEOT<br/>
			Webmaster : Thierry SUTTER
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