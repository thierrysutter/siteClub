<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramétre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dés qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
require_once("config/config.php");

session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>

	<meta charset="windows-1252">
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
	<link rel="stylesheet" href="css/table-sorting.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/resultat.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/filtre.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script type="text/javascript">


		$(document).ready(function(){
			/* méthode tri pour les colonnes contenant des dates */
			jQuery.extend( jQuery.fn.dataTableExt.oSort, {
			    "date-dmy-pre": function ( a ) {
			        if (a == null || a == "") {
			            return 0;
			        }
			        var date = a.split('/');
			        return (date[2] + date[1] + date[0]) * 1;
			    },

			    "date-dmy-asc": function ( a, b ) {
			        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
			    },

			    "date-dmy-desc": function ( a, b ) {
			        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
			    }
			} );

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
				"aaSorting": [ [0,'asc']],
		        "aoColumns": [ { "sType": "date-dmy", "aTargets": [ 0 ] }, null, null, { "sSortable": false }, { "sSortable": false },{ "sSortable": false }]
			});



			/*$(".cr").click(function(){
				$idRrencontre = $(this).prop('id').split('_')[1];
				document.location = "RechercherCompteRendu.php?id="+$idRrencontre;
			});*/
			

			$("#submitResultats").click(function(){
				//document.location = "EnregistrerResultats.php";
				$("#formRes").submit();
			});

			$(".cr").click(function(){
				$.ajax({ // fonction permettant de faire de l'ajax
				   type: "POST", // methode de transmission des données au fichier php
				   url: "AfficherPopupCompteRendu.php", // url du fichier php
				   data: {id : $(this).prop('id').split('_')[1], mode : "popup"}, // données é transmettre
				   dataType: 'json', // JSON
				   success: function(compteRendu){ // si l'appel a bien fonctionné
					   //$("#imageArticlePopup").prop("src", "images/article/"+article.photo);
					   $("#texteCompteRenduPopup").val(compteRendu.texte);

					   $("#dialogCompteRendu").dialog({
				  			height: 425,
				  			width: 705,
				  			modal: true,
				  			title: compteRendu.titre,
				  			buttons: {
				  				Fermer: function() {
				  					$(this).dialog( "close" );
				  				},
				  				Enregistrer: function() {
									enregistrerCompteRendu(compteRendu.id);
				  					$(this).dialog( "close" );
				  				}
				  			}
				  		});

				   },
				   error: function(){
					   // on affiche un message d'erreur dans le span prévu é cet effet

				   }
				});
			});
		});

		function enregistrerCompteRendu(idRencontre) {

			$.ajax({ // fonction permettant de faire de l'ajax
			   type: "POST", // methode de transmission des données au fichier php
			   url: "EnregistrerCompteRendu.php", // url du fichier php
			   data: {id: idRencontre, texte : $("#texteCompteRenduPopup").val(), methode: "create", zone : "compteRendu"}, // données é transmettre
			   dataType: 'json', // JSON
			   success: function(){
				   // si l'appel a bien fonctionné
				   alert("Modification enregistrée");
			   },
			   error: function(){
				   // on affiche un message d'erreur dans le span prévu é cet effet

			   }
			});
		}
	</script>
</head>
<body class="w-75 mx-auto bg-light">
	<!-- Navigation Haut-->
	<?php
	session_start();
	$user = null;
	$listeProchainesRencontres = array();
	
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
	  	  
	  if (isset($_SESSION['listeProchainesRencontres'])) {
	  	$listeProchainesRencontres = $_SESSION['listeProchainesRencontres'];
	  }
	  $listeCategories = $_SESSION['listeCategories'];
	  ?>
	<?php include("head.php"); ?>
	<!-- End Navigation -->

	<div class="my-3">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	          <form action="ActionResultat.php" method="post" name="filtre">
	          	<input type="hidden" name="methode" id="methode" value="filtre"/>
	            <h3 class="mx-5 pb-3">Affiner la recherche</h3>
	            
	            <div class="form-group row mx-5">
	              <label for="categorie" class="col-sm-1 col-form-label">Catégorie</label>
	              <div class="col-sm-11">
		              <select class="form-control w-100 form-control-md" id="categorie" name="categorie">
			              <option label="Toutes" value="-1"  <?php echo ($_SESSION['filtreCategorie'] == -1 ? "selected" : "") ;?>>Toutes</option>
						  <?php foreach($listeCategories as $categorie) {?>
						  <option label="" value="<?php echo $categorie->getId();?>" <?php echo ($_SESSION['filtreCategorie'] == $categorie->getId() ? "selected" : "") ;?>><?php echo $categorie->getLibelle(); ?></option>
						  <?php } ?>
		              </select>
	              </div>
	            </div>
	            
	            <div class="form-group row mx-5">
	              <div class="col-sm-12 text-right">
	                <button type="submit" class="btn btn-primary btn-lg active" >Rechercher</button>
	              </div>
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>
	</div>
	
	<div class="py-3">
	    <div class="container">
	      <div class="row">
		      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
	    		<div id="message" style="text-align: center; height: 5px; "></div><!-- div qui contiendra le message de retour -->
	    	  </div>
		  </div>
	      <form id="formRes" name="formRes" action="EnregistrerResultats.php" method="post">
			  <input type="hidden" name="methode" id="methode" value="modif"/>
			  <div class="row">
			      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			        <table class="table table-bordered table-striped table-hover table-responsive" id="tableATrier">
			          <thead class="thead-inverse">
			            <tr>
			              <th>Jour</th>
			              <th>Catégorie</th>
			              <th>Compétition</th>
			              <th>Rencontre</th>
			              <th>Score</th>
			              <th>CR</th>
			            </tr>
			          </thead>
			          <tbody>
			          	<?php foreach($listeProchainesRencontres as $prochain) { ?>
			            <tr>
			              <td><?php echo date_format(new DateTime($prochain->getJour()), 'd/m/Y');?></td>
							<td><?php echo $prochain->getLibelleCategorie();?></td>
							<td><?php echo $prochain->getLibelleCompetition();?></td>
							<!--<td><?php echo ($prochain->getEquipeDom() == "ST JULIEN" ? $prochain->getEquipeExt() : $prochain->getEquipeDom());?></td>-->
	
							<td><?php echo $prochain->getEquipeDom(); ?> - <?php echo $prochain->getEquipeExt(); ?></td>
	
							<td>
								<input type="hidden" id="idRencontre_<?php echo $prochain->getId(); ?>" name="idRencontre" value="<?php echo $prochain->getId(); ?>" size="10"/>
								<input type="text" id="scoreDom_<?php echo $prochain->getId(); ?>" name="scoreDom_<?php echo $prochain->getId(); ?>" size="2"/> - <input type="text" id="scoreExt_<?php echo $prochain->getId(); ?>" name="scoreExt_<?php echo $prochain->getId(); ?>" size="2"/>
							</td>
							<td>
								<img class="cr" id="cr_<?php echo $prochain->getId();?>" src="images/compteRendu20.png" title="Saisir le compte rendu du match" style="border: 0; cursor: pointer;" />
							</td>
			            </tr>
			            <?php } ?>
			          </tbody>
			        </table>
			      </div>
		      </div>
		      
	      </form>
		      <div class="row text-center py-4">
			      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<input type="button" id="submitResultats" class="btn btn-success btn-lg active" value="Enregistrer"/>
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

	<div id="dialogCompteRendu" style="display: none;">
		<div class="popup-featured-side"><div class="popup-featured-side-item"><div class="cl"></div>
	    <div ><textarea rows="20" cols="80" id="texteCompteRenduPopup"></textarea></div>
	    <div class="cl"></div>
		</div>
		</div>
	</div>

</body>
</html>
<?php
ob_end_flush();
?>