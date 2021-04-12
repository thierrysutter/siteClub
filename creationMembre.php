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

	<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
	<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css">
  <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
  <!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
  <!-- optionally uncomment line below if using a theme or icon set like font awesome (note that default icons used are glyphicons and `fa` theme can override it) -->
  <!-- link https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css media="all" rel="stylesheet" type="text/css" /-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- piexif.min.js is only needed for restoring exif data in resized images and when you 
      wish to resize images before upload. This must be loaded before fileinput.min.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/js/plugins/piexif.min.js" type="text/javascript"></script>
  <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
      This must be loaded before fileinput.min.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/js/plugins/sortable.min.js" type="text/javascript"></script>
  <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
      HTML files. This must be loaded before fileinput.min.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/js/plugins/purify.min.js" type="text/javascript"></script>
  <!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
     3.3.x versions without popper.min.js. -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
      dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- the main fileinput plugin file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/js/fileinput.min.js"></script>
  <!-- optionally uncomment line below for loading your theme assets for a theme like Font Awesome (`fa`) -->
  <!-- script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/themes/fa/theme.min.js"></script -->
  <!-- optionally if you need translation for your language then include  locale file as mentioned below -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.4/js/locales/fr.js"></script>
  
	<script type="text/javascript">
		$(document).ready(function(){
			$( ".datepicker" ).datepicker( {
				showOn: "button",
				buttonImage: "images/calendar16.png",
				buttonImageOnly: true,
				dateFormat: 'dd/mm/yy'
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

			$(".file").change(function(){
				// une fois le fichier choisi, afficher la photo dans son cadre pour visu
				if (document.getElementById("photo").files[0] != null && document.getElementById("photo").files[0] != "undefined") {
			        //$("#annulImage").css("display","");
			        var oFReader = new FileReader();
			        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

			        oFReader.onload = function (oFREvent) {
			            document.getElementById("visuPhoto").src = oFREvent.target.result;
			        };
		        } else {
		        	//$("#annulImage").css("display","none");
		        	//document.getElementById("visuPhoto").src = "";
			    }
			});

			$("#reset").click(function(){
	  			//document.location = "ActionMembre.php?methode=retour&filtreCategorie="+$("#filtreCategorie").val()+"&filtreFonction="+$("#filtreFonction").val()+"&filtrePoste="+$("#filtrePoste").val()+"&filtreNom="+$("#filtreNom").val();
	  			$("#formRetour").submit();
		  	});
		});
	</script>
</head>
<body class="w-75 mx-auto bg-light">
	<!-- Navigation Haut-->
	<?php

	session_start();

	$user = $_SESSION['user'];
	$listeCategories = $_SESSION['listeCategories'];
	$listeFonctions = $_SESSION['listeFonctions'];
	$listePostes = $_SESSION['listePostes'];
	if (!empty($user)) {
		include("menuAdmin.php");
	} else {
		header("Location: ActionAccueil.php");
	}
	?>
	<?php
	  include("head.php");
	?>
	<!-- End Navigation -->
	
	<div class="my-3">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	        	<form id="formRetour" action="ActionMembre.php" method="post">
					<input type="hidden" name="methode" id="methode" value="retour"/>
					<!-- R�cup des filtres pr�c�dents -->
					<input type="hidden" name="filtreCategorie" id="filtreCategorie" value="<?php echo $_GET['filtreCategorie'];?>"/>
					<input type="hidden" name="filtreFonction" id="filtreFonction" value="<?php echo $_GET['filtreFonction'];?>"/>
					<input type="hidden" name="filtrePoste" id="filtrePoste" value="<?php echo $_GET['filtrePoste'];?>"/>
					<input type="hidden" name="filtreNom" id="filtreNom" value="<?php echo ($_GET['filtreNom']!='' ? $_GET['filtreNom'] : '');?>"/>
				</form>
				
				<form id="" action="EnregistrerMembre.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="methode" id="methode" value="create"/>
					<input type="hidden" name="filtreCategorie" id="filtreCategorie" value="<?php echo $_GET['filtreCategorie'];?>"/>
					<input type="hidden" name="filtreFonction" id="filtreFonction" value="<?php echo $_GET['filtreFonction'];?>"/>
					<input type="hidden" name="filtrePoste" id="filtrePoste" value="<?php echo $_GET['filtrePoste'];?>"/>
					<input type="hidden" name="filtreNom" id="filtreNom" value="<?php echo ($_GET['filtreNom']!='' ? $_GET['filtreNom'] : '');?>"/>
	        		<h3 class="mx-5 pb-3">Ajouter un licenci�</h3>
	        		
					<div class="form-group row mx-5">
				        <div class="col-sm-12 text-center">
				        	<img id="visuPhoto" style="width: 150px; height: 200px; cursor: pointer;vertical-align: middle;" />
				        </div>
					</div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="nom">Nom</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="nom" id="nom" value="" required/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="prenom">Pr�nom</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="prenom" id="prenom" value="" required/>
			        	</div>
			        </div>
	        		
	        		<div class="form-group row mx-5">
	        			<label class="col-sm-1 col-form-label" for="categorie">Cat�gorie</label>
	        			<div class="col-sm-11">
			              <select class="form-control w-100 form-control-md" name="categorie" id="categorie" required>
			              	<option label="S�lectionnez une cat�gorie" value=""/>
							<?php foreach($listeCategories as $categorie) {?>
							<option value="<?php echo $categorie->getId();?>"><?php echo $categorie->getLibelle(); ?></option>
							<?php } ?>
						  </select>
			            </div>
			        </div>
	        		
	        		<div class="form-group row mx-5">
	        			<label class="col-sm-1 col-form-label" for="fonction">Fonction</label>
	        			<div class="col-sm-11">
			              <select class="form-control w-100 form-control-md" name="fonction" id="fonction" required>
			              	<option label="S�lectionnez une fonction" value=""/>
							<?php foreach($listeFonctions as $fonction) {?>
							<option value="<?php echo $fonction->getId();?>"><?php echo $fonction->getLibelle(); ?></option>
							<?php } ?>
						  </select>
			            </div>
			        </div>
	        		
	        		<div class="form-group row mx-5">
	        			<label class="col-sm-1 col-form-label" for="poste">Poste</label>
	        			<div class="col-sm-11">
			              <select class="form-control w-100 form-control-md" name="poste" id="poste" required>
			              	<option label="S�lectionnez un poste" value=""/>
							<?php foreach($listePostes as $poste) {?>
							<option value="<?php echo $poste->getId();?>"><?php echo $poste->getLibelle(); ?></option>
							<?php } ?>
						  </select>
			            </div>
			        </div>
					
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="dateNaissance">Date de naissance</label>
			        	<div class="col-sm-3">
			        		<input class="form-control w-100 form-control-md datepicker" type="date" name="dateNaissance" id="dateNaissance" value="" required/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="email">Email</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="email" name="email" id="email" value="" required/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="numLicence">N� licence</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="numLicence" id="numLicence" value=""/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="taille">Taille</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="taille" id="taille" value=""/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="poids">Poids</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="poids" id="poids" value=""/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="meilleurPied">Meilleur pied</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="meilleurPied" id="meilleurPied" value=""/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="photo">Fichier photo</label>
			        	<div class="col-sm-11">
			        		<input id="photo" name="photo" class="file" type="file" accept="image/*">
			        	</div>
			        </div>
			        
					<div class="form-group row mx-5">
		              <div class="col-sm-12 text-right">
		                <button type="submit" class="btn btn-primary btn-lg active" value="Enregistrer">Enregistrer</button>
		                <button type="reset" id="reset" class="btn btn-primary btn-lg active" value="Annuler">Annuler</button>
		              </div>
		            </div>
				</form>
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