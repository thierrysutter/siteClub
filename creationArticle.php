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

	<meta charset="ISO-8859-1">
	<meta http-equiv="Cache-Control" content="max-age=600" />
	<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-clés" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">-->
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
			$("#imageUpload").fileinput({
		        showUpload:false, 
		        previewFileType:'any',
		        //uploadUrl: "images/article/tmp/",
		        allowedFileExtensions: ["jpg", "png", "jpeg", "JPG", "JPEG", "PNG"],
		        maxImageWidth: 200,
		        maxImageHeight: 150,
		        resizePreference: 'auto',
		        maxFileCount: 5,
		        resizeImage: true,
		        language: "fr"
		   	}).on('filepreupload', function() {
		        $('#kv-success-box').html('');
		   	}).on('fileuploaded', function(event, data) {
				$('#kv-success-box').append(data.response.link);
		        $('#kv-success-modal').modal('show');
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
	?>
	<!-- End Navigation -->
	
	<div class="text-center gradient-overlay w-100 py-1 h-25 my-5" style="background-image: url(&quot;https://img4.hostingpics.net/pics/270625heading.jpg&quot;);">
	    <div class="container py-1">
	      <div class="row">
	        <div class="col-md-12 text-white">
	          <h1 class="display-3 mb-5 py-5">AS Saint Julien Les Metz&nbsp;</h1>
	        </div>
	      </div>
	    </div>
  	</div>

	<div class="py-5">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	          <h1>Ajout d'un article</h1>
	          <p>Publier un nouvel article sur le site</p>
	          <form id="form" action="EnregistrerArticle.php" method="post" enctype="multipart/form-data">
	          	<input type="hidden" name="methode" id="methode" value="create"/>
	            <div class="form-group">
	            	<label for="InputName">Titre de l'article</label>
	            	<input type="text" class="form-control" id="titre" name="titre" placeholder="Saisissez le titre de l'article"> </div>
	            <div class="form-group"> <label for="Textarea">Texte</label> <textarea class="form-control" id="texte" name="texte" rows="10" placeholder="Saisissez votre texte"></textarea> </div>
	            <div class="form-group">
	            	<label for="imageUpload">Image(s) (Extensions autorisées : JPG, JPEG ou PNG)</label>
	            	<input id="imageUpload" name="imageUpload[]" type="file" multiple="multiple" />
	            </div>
	            <button type="submit" class="btn btn-success btn-lg active">Enregistrer</button>
	            <button type="submit" class="btn btn-danger btn-lg active" onclick="location.href='ActionArticle.php'">Annuler</button>
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