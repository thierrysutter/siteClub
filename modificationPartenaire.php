<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
require_once("config/config.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
	<meta name="keywords" content="mots-clés" />
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
			
			$("#reset").click(function(){
	  			document.location="ActionPartenaire.php";
		  	});
			
			$("#visuPhoto").click(function(){
				$("#photo").click();
			});

			$("#photo").change(function(){
				// une fois le fichier choisi, afficher la photo dans son cadre pour visu
				if (document.getElementById("photo").files[0] != null && document.getElementById("photo").files[0] != "undefined") {
			        $("#annulImage").css("display","");
			        $("#aide").css("display","");
			        var oFReader = new FileReader();
			        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

			        oFReader.onload = function (oFREvent) {
			            //document.getElementById("visuPhoto").src = oFREvent.target.result;
			            $("#visuPhoto").attr("src", oFREvent.target.result);
			        };
		        } else {
		        	$("#annulImage").css("display","none");
		        	document.getElementById("visuPhoto").src = "";
			    }
			});

			$("#annulImage").click(function(){
				//document.getElementById("visuPhoto").src = "";
				$("#visuPhoto").attr("src"," ");
				$("#aide").css("display","none");
				$("#annulImage").css("display","none");
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
			/* End Navigation */
		} else {
			//header("Location: ActionAccueil.php");
			header("Location: Deconnexion.php");
		}
	} else {
		//header("Location: ActionAccueil.php");
		header("Location: Deconnexion.php");
	}
	$partenaire = $_SESSION['partenaire'];
	?>
	<?php
	  include("head.php");
	?>
	<!-- End Navigation -->
	
	<div class="my-3">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	        	<form action="EnregistrerPartenaire.php" method="post" enctype="multipart/form-data">
	        		<input type="hidden" name="methode" id="methode" value="modif"/>
					<input type="hidden" name="id" id="id" value="<?php echo $partenaire->getId();?>"/>
					<h3 class="mx-5 pb-3">Modifier un partenaire</h3>
					
	        		<div class="form-group row mx-5">
				        <div class="col-sm-12 text-center">
				        	<img id="visuPhoto" src="images/sponsor/<?php echo ($partenaire->getVignette()!=null && $partenaire->getVignette()!="" ? $partenaire->getVignette() : "noimage.png");?>" style="width: 150px; height: 200px; cursor: pointer;vertical-align: middle;" title="Cliquez pour ajouter une photo"/>
				        </div>
				        
				        <div id="aide" style="text-align: center; font-style: italic; display:<?php echo ($partenaire->getVignette()!=null && $partenaire->getVignette()!='' ? '' : 'none');?>;">Cliquez pour modifier la photo</div>
				        <div style="display:<?php echo ($partenaire->getVignette()!='' ? '' : 'none');?>;"><img id="annulImage" src="images/annul16.png" style="cursor: pointer;width: 12px; height: 12px;" title="Supprimer l'image"></div>
				        <input type="file" class="file" name="photo" id="photo" accept="image/*" style="display: none;"/>
				        
					</div>
	        		
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="nom">Libelle</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="nom" id="nom" value="<?php echo $partenaire->getNom();?>"/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="url">Site web</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="url" id="url" value="<?php echo $partenaire->getURL();?>"/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="adresse">Adresse</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="adresse" id="adresse" value="<?php echo $partenaire->getAdresse();?>"/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="codePostal">Code postal</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="codePostal" id="codePostal" value="<?php echo $partenaire->getCP() != null ? $partenaire->getCP() : "";?>"/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="ville">Ville</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="ville" id="ville" value="<?php echo $partenaire->getVille();?>"/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="tel">Tel</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="tel" id="tel" value="<?php echo $partenaire->getTel();?>"/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="fax">Fax</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="text" name="fax" id="fax" value="<?php echo $partenaire->getFax();?>"/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-1 col-form-label" for="email">Email</label>
			        	<div class="col-sm-11">
			        		<input class="form-control w-100 form-control-md" type="email" name="email" id="email" value="<?php echo $partenaire->getEmail();?>"/>
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