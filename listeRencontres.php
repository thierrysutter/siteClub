<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

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
			/* m�thode tri pour les colonnes contenant des dates */
			jQuery.fn.dataTableExt.oSort['date-asc']  = function(a,b) {
			    /*
			    var datea = a.split('/');
			    var dateb = b.split('/');

			    var x = (datea[2] + datea[1] + datea[0]) * 1;
			    var y = (dateb[2] + dateb[1] + dateb[0]) * 1;

			    return ((x < y) ? -1 : ((x > y) ?  1 : 0));
			    */
			    return ((a<b) ? -1 : ((a>b) ? 1 : 0));
			};

			jQuery.fn.dataTableExt.oSort['date-desc'] = function(a,b) {
			    /*
			    var datea = a.split('/');
			    var dateb = b.split('/');

			    var x = (datea[2] + datea[1] + datea[0]) * 1;
			    var y = (dateb[2] + dateb[1] + dateb[0]) * 1;

			    return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
				*/
				return ((a<b) ? 1 : ((a>b) ? -1 : 0));
			};

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
				"aaSorting": [ [0,'asc'] ],
		        "aoColumns": [ { "sType": "date-dmy", "aTargets": [ 0 ]  }, null, null, { "sSortable": false }, null, null,{ "sSortable": false }]
			});

			$( ".datepicker" ).datepicker( {
				showOn: "button",
			    buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
			    buttonImageOnly: true,
				dateFormat: "dd/mm/yy",
				setDate: new Date()
			});

			$(".ui-datepicker-trigger").css({
                position: "absolute",
                marginLeft: "370px",
                marginTop: "-25px",
            });

			$(".ui-datepicker-trigger").each(function() {
	  			$(this).attr("alt","Calendrier");
	  			$(this).attr("title","");
	  		});

	  		$("img.ui-datepicker-trigger").click(
	  				function(){
	  					$(this).parent().find(".datepicker").blur();
	  					}
	  		);

	  		$("#ajoutRencontre").click(function(){
				document.location = "creationRencontre.php";
			});

			$(".fiche").click(function(){
				$idRencontre = $(this).prop('id').split('_')[1];
				document.location = "RechercherRencontre.php?id="+$idRencontre;
			});

			$(".convocation").click(function(){
				$idRencontre = $(this).prop('id').split('_')[1];
				document.location = "ActionConvocation.php?rencontre="+$idRencontre;
			});

			$(".cr").click(function(){
				$.ajax({ // fonction permettant de faire de l'ajax
				   type: "POST", // methode de transmission des donn�es au fichier php
				   url: "AfficherPopupCompteRendu.php", // url du fichier php
				   data: {id : $(this).prop('id').split('_')[1], mode : "popup"}, // donn�es � transmettre
				   dataType: 'json', // JSON
				   success: function(compteRendu){ // si l'appel a bien fonctionn�
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
					   // on affiche un message d'erreur dans le span pr�vu � cet effet

				   }
				});
			});

			$(".suppression").click(function(){
				$idRencontre = $(this).prop('id').split('_')[1];
				document.location = "SupprimerRencontre.php?id="+$idRencontre;
			});
		});

		function enregistrerCompteRendu(idRencontre) {

			$.ajax({ // fonction permettant de faire de l'ajax
			   type: "POST", // methode de transmission des donn�es au fichier php
			   url: "EnregistrerCompteRendu.php", // url du fichier php
			   data: {id: idRencontre, texte : $("#texteCompteRenduPopup").val(), methode: "create", zone : "compteRendu"}, // donn�es � transmettre
			   dataType: 'json', // JSON
			   success: function(){
				   // si l'appel a bien fonctionn�
				   alert("Modification enregistr�e");
			   },
			   error: function(){
				   // on affiche un message d'erreur dans le span pr�vu � cet effet

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
	  	  
	  $listeRencontres = $_SESSION['listeRencontres'];
	  $listeCategories = $_SESSION['listeCategories'];
	  $listeEquipes = $_SESSION['listeEquipes'];
	  $debut = $_SESSION['debut'];
	  $fin = $_SESSION['fin'];
	  $categorieSelectionnee = $_SESSION['categorieSelectionnee'];
	  ?>
	<?php include("head.php"); ?>
	<!-- End Navigation -->
						
	<div class="my-3">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	          <form action="ActionRencontre.php" method="post" name="filtre">
	          	<input type="hidden" name="methode" id="methode" value="filtre"/>
	            <h3 class="mx-5 pb-3">Affiner la recherche</h3>
	            
	            <div class="form-group row mx-5">
	              <label for="debut" class="col-sm-1 col-form-label">Du</label>
	              <div class="col-sm-5">
		              <input type="text" class="datepicker form-control w-100 form-control-md" id="debut" name="debut" size="8" maxlength="10" value="<?php echo $debut; ?>"/>
	              </div>
	              <label for="fin" class="col-sm-1 col-form-label">Au</label>
	              <div class="col-sm-5">
		              <input type="text" class="datepicker form-control w-100 form-control-md" id="fin" name="fin" size="8" maxlength="10" value="<?php echo $fin; ?>"/>
	              </div>
	            </div>
	            
	            <div class="form-group row mx-5">
	              <label for="categorie" class="col-sm-1 col-form-label">Cat�gorie</label>
	              <div class="col-sm-11">
		              <select class="form-control w-100 form-control-md" id="categorie" name="categorie">
			              <option label="Toutes" value="-1"  <?php echo ($_SESSION['$categorieSelectionnee'] == -1 ? "selected" : "") ;?>>Toutes</option>
						  <?php foreach($listeCategories as $categorie) {?>
						  <option label="" value="<?php echo $categorie->getId();?>" <?php echo ($_SESSION['$categorieSelectionnee'] == $categorie->getId() ? "selected" : "") ;?>><?php echo $categorie->getLibelle(); ?></option>
						  <?php } ?>
		              </select>
	              </div>
	            </div>
	            
	            <div class="form-group row mx-5">
	              <label for="equipe" class="col-sm-1 col-form-label">Equipe</label>
	              <div class="col-sm-11">
		              <select class="form-control w-100 form-control-md" id="equipe" name="equipe">
			              <option label="Toutes" value="-1"  <?php echo ($_SESSION['equipeSelectionnee'] == -1 ? "selected" : "") ;?>>Toutes</option>
						  <?php foreach($listeEquipes as $equipe) {?>
						  <option label="" value="<?php echo $equipe->getId();?>" <?php echo ($_SESSION['equipeSelectionnee'] == $equipe->getId() ? "selected" : "") ;?>><?php echo $equipe->getLibelle(); ?></option>
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
		        <table class="table table-bordered table-striped table-hover table-responsive" id="tableATrier">
		          <thead class="thead-inverse">
		            <tr class="text-center">
		              <th>Jour</th>
		              <th>Cat�gorie</th>
		              <th>Comp�tition</th>
		              <th>Adversaire</th>
		              <th>Lieu</th>
		              <th>Score</th>
		              <th>Action</th>
		            </tr>
		          </thead>
		          <tbody>
		          	<?php foreach($listeRencontres as $rencontre) { ?>
		            <tr>
		              <td class="text-center"><?php echo date_format(new DateTime($rencontre->getJour()), 'd/m/Y');?></td>
					  <td class="text-center"><?php echo $rencontre->getLibelleCategorie();?></td>
					  <td class="text-left"><?php echo $rencontre->getLibelleCompetition();?></td>
					  <td class="text-left"><?php echo ($rencontre->getEquipeDom() == "ST JULIEN" ? $rencontre->getEquipeExt() : $rencontre->getEquipeDom());?></td>
					  <td class="text-center"><?php echo ($rencontre->getEquipeDom() == "ST JULIEN" ? "Domicile" : "Ext�rieur");?></td>
					  <td class="text-center"><?php echo ($rencontre->getStatut() == 1 ? $rencontre->getEquipeDom() == "ST JULIEN" ? $rencontre->getScoreDom()." - ".$rencontre->getScoreExt(): $rencontre->getScoreExt()." - ".$rencontre->getScoreDom() : "");?></td>
					  <td class="text-center">
						<img class="convocation" id="convocation_<?php echo $rencontre->getId();?>" src="images/rdv16.png" style="border: 0;cursor: pointer;" title="Convocation"/>
						<img class="fiche" id="fiche_<?php echo $rencontre->getId();?>" src="images/modify16.png" style="border: 0;cursor: pointer;" title="Modifier"/>
						<img class="cr" id="cr_<?php echo $rencontre->getId();?>" src="images/compteRendu16.png" style="border: 0;cursor: pointer;" title="Compte rendu"/>
						<img class="suppression" id="suppr_<?php echo $rencontre->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;" title="Supprimer"/>
					  </td>
		            </tr>
		            <?php } ?>
		          </tbody>
		        </table>
		      </div>
	      </div>
	      
	      <div class="row text-center py-4">
		      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		      	<input type="button" id="ajoutRencontre" class="btn btn-success btn-lg active" value="Ajouter une rencontre"/>
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