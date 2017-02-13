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
	<meta charset="ISO-8859-1">
	<meta name="keywords" content="mots-clés" />
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

	  		$("#parcours").click(function(){
	  			$.ajax({ // fonction permettant de faire de l'ajax
					   type: "POST", // methode de transmission des données au fichier php
					   url: "AfficherPopupParcours.php", // url du fichier php
					   data: {id : $("#id").val(), mode : "popup"}, // données à transmettre
					   //dataType: 'json', // JSON
					   success: function(parcours){ // si l'appel a bien fonctionné
						   /*$("#imageArticlePopup").prop("src", article.photo);
						   $("#texteArticlePopup").html(article.texte);*/
						   $("#texteParcours").html(parcours);
						   $("#dialogParcours").dialog({
					  			height: 200,
					  			width: 200,
					  			modal: true,
					  			title: "Clubs précédents",
					  			buttons: {
					  				/*Ajouter: function() {
					  					$(this).dialog( "close" );
					  				},*/
					  				Fermer: function() {
					  					$(this).dialog( "close" );
					  				}
					  			}
					  		});
							
					   },
					   error: function(){
						   // on affiche un message d'erreur dans le span prévu à cet effet
					   }
					});
			});

	  		$("#reset").click(function(){
	  			$("#formRetour").submit();
		  	});
	  		
			$("#visuPhoto").click(function(){
				$("#photo").click();
			});

			$("#photo").change(function(){
				// une fois le fichier choisi, afficher la photo dans son cadre pour visu
				if (document.getElementById("photo").files[0] != null && document.getElementById("photo").files[0] != "undefined") {
			        $("#annulImage").css("display","");
			        var oFReader = new FileReader();
			        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

			        oFReader.onload = function (oFREvent) {
			            document.getElementById("visuPhoto").src = oFREvent.target.result;
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
	$listeCategories = $_SESSION['listeCategories'];
	$listeFonctions = $_SESSION['listeFonctions'];
	$listePostes = $_SESSION['listePostes'];
	$membre = $_SESSION['membre'];
	?>
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
				<ul>
					<li><div style="text-align: center;"><img id="visuPhoto" src="<?php echo ($membre->getPhoto() != null && $membre->getPhoto() != '' ? $membre->getPhoto() : 'images/silhouette.jpeg');?>" style="width: 150px; height: 200px; cursor: pointer;vertical-align: middle;" title="Cliquez pour ajouter une photo" /></div></li>
					<li><div id="aide" style="text-align: center; font-style: italic; display:<?php echo ($membre->getPhoto() != null && $membre->getPhoto() != '' ? '' : 'none');?>;">Cliquez pour modifier la photo</div></li>
				</ul>
				</div>
				<!-- End Sub nav -->
				<div style="display:<?php echo ($membre->getPhoto() != null && $membre->getPhoto() != '' ? '' : 'none');?>;"><img id="annulImage" src="images/annul16.png" style="cursor: pointer;width: 12px; height: 12px;" title="Supprimer l'image"></div>
				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<!-- Main Slide Item -->
						<div class="featured-main-joueur">
							<form id="formRetour" action="ActionMembre.php" method="post">
								<input type="hidden" name="methode" id="methode" value="retour"/>
								<!-- Récup des filtres précédents -->
								<input type="hidden" name="filtreCategorie" id="filtreCategorie" value="<?php echo $_GET['filtreCategorie'];?>"/>
								<input type="hidden" name="filtreFonction" id="filtreFonction" value="<?php echo $_GET['filtreFonction'];?>"/>
								<input type="hidden" name="filtrePoste" id="filtrePoste" value="<?php echo $_GET['filtrePoste'];?>"/>
								<input type="hidden" name="filtreNom" id="filtreNom" value="<?php echo ($_GET['filtreNom']!='' ? $_GET['filtreNom'] : '');?>"/>
								
							</form>
							
							<form id="form1" action="EnregistrerMembre.php" method="post" enctype="multipart/form-data">
								<input type="hidden" name="methode" id="methode" value="modif"/>
								<input type="hidden" name="id" id="id" value="<?php echo $membre->getId();?>"/>
								<input type="hidden" name="fonction" id="fonction" value="<?php echo $membre->getFonction();?>"/>
								<input type="hidden" name="filtreCategorie" id="filtreCategorie" value="<?php echo $_GET['filtreCategorie'];?>"/>
								<input type="hidden" name="filtreFonction" id="filtreFonction" value="<?php echo $_GET['filtreFonction'];?>"/>
								<input type="hidden" name="filtrePoste" id="filtrePoste" value="<?php echo $_GET['filtrePoste'];?>"/>
								<input type="hidden" name="filtreNom" id="filtreNom" value="<?php echo ($_GET['filtreNom']!='' ? $_GET['filtreNom'] : '');?>"/>
								<input type="file" class="file" name="photo" id="photo" accept="image/*" style="display: none;"/>
								<fieldset><legend>Modification d'un membre du club</legend>
								<p class="first" id="container" >
									<label for="nom">Nom</label>
									<input type="text" name="nom" id="nom" value="<?php echo $membre->getNom();?>"/>
								</p>
								<p id="container" >
									<label for="prenom">Prénom</label>
									<input type="text" name="prenom" id="prenom" value="<?php echo $membre->getPrenom();?>"/>
								</p>
								<p id="container" >
									<label for="categorie">Catégorie</label>
									<select name="categorie" id="categorie">
									<option label="" value=""></option>
									<?php foreach($listeCategories as $categorie) {?>
									<option label="" value="<?php echo $categorie->getId();?>"  <?php echo ($categorie->getId() == $membre->getCategorie() ? "selected" : "") ; ?>><?php echo $categorie->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<?php 
								if ($membre->getFonction() != 12) {?>
								<p id="container" >
									<label for="fonction">Fonction</label>
									<select name="fonction" id="fonction">
									<option label="" value=""></option>
									<?php foreach($listeFonctions as $fonction) {?>
									<option label="" value="<?php echo $fonction->getId();?>" <?php echo ($fonction->getId() == $membre->getFonction() ? "selected" : "") ; ?>><?php echo $fonction->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<?php } ?>
								<?php 
								if ($membre->getFonction() == 12) {?>
								<p id="container" >
									<label for="poste">Poste</label>
									<select name="poste" id="poste">
									<option label="" value=""></option>
									<?php foreach($listePostes as $poste) {?>
									<option label="" value="<?php echo $poste->getId();?>" <?php echo (($poste->getId() == $membre->getPoste()) ? "selected" : "") ; ?>><?php echo $poste->getLibelle(); ?></option>
									<?php } ?>
									</select>
								</p>
								<?php } ?>
								<p id="container" >
									<label for="dateNaissance">Date de naissance</label>
									<input type="text" class="datepicker" name="dateNaissance" id="dateNaissance" value="<?php echo date_format(new DateTime($membre->getDateNaissance()), 'd/m/Y');?>"/>
								</p>
								
								<p id="container" >
									<label for="dateNaissance"><img src="images/tri_plus48.png" id="parcours" name="parcours" style="cursor: pointer; width: 16px; height: 16px; vertical-align: middle;"/>Clubs précédents</label>
								</p>
								
								</fieldset>
								<fieldset>
								<p id="container" >
									<label for="email">Email</label>
									<input type="text" name="email" id="email" value="<?php echo $membre->getEmail();?>"/>
								</p>
								<p id="container" >
									<label for="numLicence">N° licence</label>
									<input type="text" name="numLicence" id="numLicence" value="<?php echo $membre->getNumeroLicence();?>"/>
								</p>
								<?php if ($membre->getFonction() == 12) {?>
								<p id="container" >
									<label for="taille">Taille</label>
									<input type="text" name="taille" id="taille" value="<?php echo $membre->getTaille()>0 ? $membre->getTaille() : "";?>"/>
								</p>
								<p id="container" >
									<label for="poids">Poids</label>
									<input type="text" name="poids" id="poids" value="<?php echo $membre->getPoids()>0 ? $membre->getPoids() : "";?>"/>
								</p>
								<p id="container" >
									<label for="meilleurPied">Meilleur pied</label>
									<input type="text" name="meilleurPied" id="meilleurPied" value="<?php echo $membre->getMeilleurPied();?>"/>
								</p>
								<?php } ?>
								</fieldset>
								<!-- <p class="submit"><button type="submit" id="submit" value="Enregistrer">Enregistrer</button></p>
								<p class="submit"><button type="reset" id="reset" value="Annuler">Annuler</button></p>-->
								<p class="" style="float: right; padding: 0; margin: 0 26px 0 25px; width: 314px;">
									<button type="submit" style="width: 107px; height:25px; line-height:25px; " value="Enregistrer">Enregistrer</button>
									<button type="reset" id="reset" style="width: 107px; height:25px; line-height:25px; " value="Annuler">Annuler</button>
								</p>
								
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

	<div id="dialogParcours" style="display: none;">
		
			    <p id="texteParcours"></p>

		</div>
	</div>

</body>
</html>
<?php
ob_end_flush();
?>