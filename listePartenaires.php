<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
require_once("config/config.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>

	<meta charset="ISO-8859-1">
	<meta http-equiv="Cache-Control" content="max-age=600" />
	<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/table-sorting.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/filtre.css" type="text/css" media="all" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tableATrier').dataTable({
				"bPaging":   false,
				"bLengthChange": false,
				"bInfo":     false,
		        "bFilter":     false,
		        "bPaginate":   false,
		        "bAutoWidth": false,
		        "bSort": true,
		        "oLanguage": {
					"sSearch": "Filtrer ",
					"sZeroRecords": "Aucun enregistrement disponible."
				},
				"aaSorting": [ [0,'asc'], [1,'asc']],
		        "aoColumns": [ null, null, { "sSortable": false }]
			});

			$("#ajoutPartenaire").click(function(){
				document.location = "creationPartenaire.php";
			});

			$(".fiche").click(function(){
				$idPartenaire = $(this).prop('id').split('_')[1];
				document.location = "RechercherPartenaire.php?id="+$idPartenaire;
			});

			$(".suppression").click(function(){
				$idPartenaire = $(this).prop('id').split('_')[1];
				document.location = "SupprimerPartenaire.php?id="+$idPartenaire;
			});
		});
	</script>
</head>
<body class="w-75 mx-auto bg-light">
	<!-- Navigation Haut-->
	<?php
	session_start();
	$user = null;
	if (isset($_SESSION['session_started'])) {
	  	$user = $_SESSION['user'];
	  	if (!empty($user)) {
	  		/* Navigation Haut */
	  		include("menuAdmin.php");
	  		//include("menuHaut.php");
	  		/* End Navigation */
	  	} else {
	  		//header("Location: ActionAccueil.php");
  			header("Location: Deconnexion.php");
	  	}
	  } else {
	  	//header("Location: ActionAccueil.php");
  		header("Location: Deconnexion.php");
	  }
	  	  
	  $listePartenaires = $_SESSION['listePartenaires'];
	  ?>
	<?php include("head.php"); ?>
	<!-- End Navigation -->
	
	<div class="py-3">
	    <div class="container">
	      <div class="row">
		      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		        <table class="table table-bordered table-striped table-hover table-responsive" id="tableATrier">
		          <thead class="thead-inverse">
		            <tr>
					  <th>Nom</th>
		              <th>Email</th>
		              <th>Action</th>
		            </tr>
		          </thead>
		          <tbody>
		          	<?php foreach($listePartenaires as $partenaire) { ?>
		            <tr>
		              <td><?php echo strtoupper($partenaire->getNom());?></td>
						<td><?php echo $partenaire->getEmail();?></td>
						<td>
							<img class="fiche" id="fiche_<?php echo $partenaire->getId();?>" src="images/modify16.png" style="border: 0;cursor: pointer;" title="Modifier"/>
							<img class="suppression" id="suppr_<?php echo $partenaire->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;" title="Supprimer"/>
						</td>
		            </tr>
		            <?php } ?>
		          </tbody>
		        </table>
		      </div>
	      </div>
	      
	      <div class="row text-center py-4">
		      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		      	<input type="button" id="ajoutPartenaire" class="btn btn-success btn-lg active" value="Ajouter un partenaire"/>
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