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

	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/filtre.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/table-sorting.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/print.css" type="text/css" media="print" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.dataTables.min.js"></script>
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
				"aaSorting": [ [1,'asc'], [2,'asc'], [3,'asc'], [4,'asc']],
		        "aoColumns": [ { "sSortable": false }, null, null, null, null,{ "sSortable": false }]
			});

			$("#ajoutMembre").click(function(){

				// filtres
				$filtreCategorie = $("#filtreCategorie").val();
				$filtreFonction = $("#filtreFonction").val();
				$filtrePoste = $("#filtrePoste").val();
				$filtreNom = $("#filtreNom").val();
				document.location = "creationMembre.php?filtreCategorie="+$filtreCategorie+"&filtreFonction="+$filtreFonction+"&filtrePoste="+$filtrePoste+"&filtreNom="+$filtreNom;
			});

			$(".fiche").click(function(){

				// filtres
				$filtreCategorie = $("#filtreCategorie").val();
				$filtreFonction = $("#filtreFonction").val();
				$filtrePoste = $("#filtrePoste").val();
				$filtreNom = $("#filtreNom").val();

				$idMembre = $(this).prop('id').split('_')[1];
				document.location = "RechercherMembre.php?id="+$idMembre+"&filtreCategorie="+$filtreCategorie+"&filtreFonction="+$filtreFonction+"&filtrePoste="+$filtrePoste+"&filtreNom="+$filtreNom;
			});

			$(".suppression").click(function(){

				// filtres
				$filtreCategorie = $("#filtreCategorie").val();
				$filtreFonction = $("#filtreFonction").val();
				$filtrePoste = $("#filtrePoste").val();
				$filtreNom = $("#filtreNom").val();

				$idMembre = $(this).prop('id').split('_')[1];
				document.location = "SupprimerMembre.php?id="+$idMembre+"&filtreCategorie="+$filtreCategorie+"&filtreFonction="+$filtreFonction+"&filtrePoste="+$filtrePoste+"&filtreNom="+$filtreNom;
			});


			$("#filtreFonction").change(function(){
				if($(this).val() == -1 || $(this).val() == 12) {
					$("#zoneFiltrePoste").css("display", "");
				} else {
					$("#zoneFiltrePoste").css("display", "none");
				}
			});

			$("#check_all").change(function(){
				if ($(this).is(":checked")==true) {
					//alert("tout cocher");
					$("input:checkbox[id^='check_']").prop( "checked", true );
				} else {
					//alert("tout d�cocher");
					$("input:checkbox[id^='check_']").prop( "checked", false );
				}
			});

			$frameApercuImpression = $('#apercuImpression');
			$frameApercuImpression.dialog({
				 autoOpen: false,
				 width: "85%",
				 height: 700,
				 title: "Aper�u avant impression",
				 modal: true,
				 open: function() {
					 $('body').addClass('stop-scrolling');
					 $(".CSSTableGenerator").css("max-height", "100%");
					 $(".CSSTableGenerator").css("overflow", false);
					 $(this).html($("#tableau").html());
				 },
				 buttons: {
					 "Lancer l'impression": function() {
						 window.print();
				 		 $(".CSSTableGenerator").css("max-height", "240px");
						 $(".CSSTableGenerator").css("overflow", "auto");
				 		 $( this ).dialog( "close" );
				 	 }
				 },
				 close: function() {
					 $(".CSSTableGenerator").css("max-height", "240px");
					 $(".CSSTableGenerator").css("overflow", "auto");
					 $('body').removeClass('stop-scrolling');
				 }
			});
			$( "#impression" ).click(function() {
				$( "#apercuImpression" ).dialog( "open" );
				//window.open(window.location,"maFenetre",'menubar=false,toolbar=false');
				//window.print();
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
	  	  
	  $listeJoueurs = $_SESSION['listeJoueurs'];
	  $listeStaffs = $_SESSION['listeStaffs'];
	  $listeCategories = $_SESSION['listeCategories'];
	  $listeFonctions = $_SESSION['listeFonctions'];
	  $listePostes = $_SESSION['listePostes'];
	  ?>
	<?php include("head.php"); ?>
	<!-- End Navigation -->

	<div class="my-3">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	          <form action="ActionMembre.php" method="post" name="filtre">
	          	<input type="hidden" name="methode" id="methode" value="filtre"/>
	            <h3 class="mx-5 pb-3">Affiner la recherche</h3>
	            
	            <div class="form-group row mx-5">
	              <label for="filtreCategorie" class="col-sm-1 col-form-label">Cat�gorie</label>
	              <div class="col-sm-11">
		              <select class="form-control w-100 form-control-md" id="filtreCategorie" name="filtreCategorie">
			              <option label="Toutes" value="-1"  <?php echo ($_SESSION['filtreCategorie'] == -1 ? "selected" : "") ;?>>Toutes</option>
						  <?php foreach($listeCategories as $categorie) {?>
						  <option label="" value="<?php echo $categorie->getId();?>" <?php echo ($_SESSION['filtreCategorie'] == $categorie->getId() ? "selected" : "") ;?>><?php echo $categorie->getLibelle(); ?></option>
						  <?php } ?>
		              </select>
	              </div>
	            </div>
	            
	            <div class="form-group row mx-5">
	              <label for="filtreFonction" class="col-sm-1 col-form-label">Fonction</label>
	              <div class="col-sm-11">
		              <select class="form-control w-100 form-control-md" id="filtreFonction" name="filtreFonction">
			              <option label="Toutes" value="-1"  <?php echo ($_SESSION['filtreFonction'] == -1 ? "selected" : "") ;?>>Toutes</option>
						  <?php foreach($listeFonctions as $fonction) {?>
						  <option label="" value="<?php echo $fonction->getId();?>" <?php echo ($_SESSION['filtreFonction'] == $fonction->getId() ? "selected" : "") ;?>><?php echo $fonction->getLibelle(); ?></option>
						  <?php } ?>
		              </select>
	              </div>
	            </div>
	            
	            <div class="form-group row mx-5">
	              <label for="filtrePoste" class="col-sm-1 col-form-label">Poste</label>
	              <div class="col-sm-11">
		              <select class="form-control w-100 form-control-md" id="filtrePoste" name="filtrePoste">
			              <option label="Toutes" value="-1"  <?php echo ($_SESSION['filtrePoste'] == -1 ? "selected" : "") ;?>>Toutes</option>
						  <?php foreach($listePostes as $poste) {?>
						  <option label="" value="<?php echo $poste->getId();?>" <?php echo ($_SESSION['filtrePoste'] == $poste->getId() ? "selected" : "") ;?>><?php echo $poste->getLibelle(); ?></option>
						  <?php } ?>
		              </select>
	              </div>
	            </div>
	            
	            <div class="form-group row mx-5">
	              <label for="filtreNom" class="col-sm-1 col-form-label">Nom / Pr�nom</label>
	              <div class="col-sm-11">
		              <input type="text" class="form-control w-100 form-control-md" name="filtreNom" id="filtreNom" value="<?php echo $_SESSION['filtreNom'] ;?>"/>
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
		            <tr>
		              <th>
						<input type="checkbox" class="noprint" id="check_all" name="check_all" title="Tout cocher/d�cocher"/>
						<img id="impression" class="noprint" src="images/print.gif" style="cursor: pointer; width: 20px; height: 20px; vertical-align: bottom;" title="Imprimer la s�lection"/>
					  </th>
					  <th>Nom</th>
		              <th>Pr�nom</th>
		              <th>Cat�gorie</th>
		              <th>Poste/Fonction</th>
		              <th>Action</th>
		            </tr>
		          </thead>
		          <tbody>
		          	<?php foreach($listeJoueurs as $joueur) { ?>
		            <tr>
		              <td><input type="checkbox" class="noprint" id="check_<?php echo $joueur->getId();?>" name="check_<?php echo $joueur->getId();?>"/> </td>
					  <td><?php echo $joueur->getNom();?></td>
					  <td><?php echo $joueur->getPrenom();?></td>
					  <td><?php echo $joueur->getLibelleCategorie();?></td>
					  <td><?php echo $joueur->getLibellePoste();?></td>
					  <td>
						<img class="fiche" id="fiche_<?php echo $joueur->getId();?>" src="images/modify16.png" style="border: 0;cursor: pointer;"/>
						<img class="suppression" id="suppr_<?php echo $joueur->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;"/>
					  </td>
		            </tr>
		            <?php } ?>
		            <?php foreach($listeStaffs as $staff) { ?>
					<tr>
						<td><input type="checkbox" class="noprint" id="check_<?php echo $staff->getId();?>" name="check_<?php echo $staff->getId();?>"/> </td>
						<td><?php echo $staff->getNom();?></td>
						<td><?php echo $staff->getPrenom();?></td>
						<td><?php echo $staff->getLibelleCategorie();?></td>
						<td><?php echo $staff->getLibelleFonction();?></td>
						<td>
							<img class="fiche noprint" id="fiche_<?php echo $staff->getId();?>" src="images/modify16.png" style="border: 0;cursor: pointer;"/>
							<img class="suppression noprint" id="suppr_<?php echo $staff->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;"/>
						</td>
					</tr>
					<?php } ?>
		          </tbody>
		        </table>
		      </div>
	      </div>
	      
	      <div class="row text-center py-4">
		      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		      	<input type="button" id="ajoutMembre" class="btn btn-success btn-lg active" value="Ajouter un membre"/>
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

	<div class="apercuImpression" id="apercuImpression" style="display: none;"></div>

</body>
</html>
<?php
ob_end_flush();
?>