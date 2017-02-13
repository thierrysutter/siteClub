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


	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
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
		        	document.getElementById("visuPhoto").src = "";
			    }
			});
		});
		
	</script>
</head>
<body>
	<!-- Header -->
	<?php
	  include("head.php");
	?>
	<!-- End Header -->

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

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
				<ul><li><div style="text-align: center;"><img id="visuPhoto" style="width: 150px; height: 200px; cursor: pointer;vertical-align: middle;" /></div></li></ul>
				</div>
				
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<!-- Main Slide Item -->
						<div class="featured-main-joueur">
							<form id="form1" action="EnregistrerUtilisateur.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="methode" id="methode" value="create"/>
								<fieldset><legend>Ajout d'un utilisateur</legend>
								<p class="first" id="container" >
									<label for="login">Login</label>
									<input type="text" name="login" id="login" value=""/>
								</p>
								<p id="container" >
									<label for="texte">Password</label>
									<input type="password" name="password" id="password" value=""/>
								</p>
								<p id="container" >
									<label for="email">Email</label>
									<input type="text" name="email" id="email" value=""/>
								</p>
								<p id="container" >
									<label for="nom">Nom</label>
									<input type="text" name="nom" id="nom" value=""/>
								</p>
								<p id="container" >
									<label for="prenom">Prenom</label>
									<input type="text" name="prenom" id="prenom" value=""/>
								</p>
								<p id="container" >
									<label for="dateNaissance">Date de naissance</label>
									<input type="text" class="datepicker" name="dateNaissance" id="dateNaissance" value=""/>
								</p>
								
								<p id="container" >
									Super Admin<input type="checkbox" class="checkbox" name="superAdmin" id="superAdmin" value="1"/>
								</p>
								</fieldset>
								<fieldset>
								<p id="container" >
									<label for="adresse">Adresse</label>
									<input type="text" name="adresse" id="adresse" value=""/>
									<label for="codePostal">Code postal</label>
									<input type="text" name="codePostal" id="codePostal" value=""/>
									<label for="ville">Ville</label>
									<input type="text" name="ville" id="ville" value=""/>
								</p>
								<p id="container" >
									<label for="telFixe">Tel fixe</label>
									<input type="text" name="telFixe" id="telFixe" value=""/>
								</p>
								<p id="container" >
									<label for="telPortable">Tel portable</label>
									<input type="text" name="telPortable" id="telPortable" value=""/>
								</p>
								<p id="container" >
									<label for="photo">Fichier photo</label>
									<input type="file" class="file" name="photo" id="photo" accept="image/*" />
									<!-- <img id="visuPhoto" style="width: 55px; height: 65px; cursor: pointer;" />-->
								</p>
								</fieldset>
								<p class="submit"><button type="submit">Enregistrer</button></p>
								
								
							</form>
						</div>
						<!-- End Main Slide Item -->

						<div class="cl">&nbsp;</div>


					</div>
				</div>

				<!-- End Widget -->
			</div>
		</div>
	</div>
	<!-- End Heading -->

	<!-- Main -->
	<div id="main">
		<div class="shell">
			<div id="sidebar">

			</div>
			<div id="content">

			</div>
		</div>
	</div>
	<!-- End Main -->

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