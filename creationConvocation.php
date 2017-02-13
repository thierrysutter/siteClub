<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
require_once("config/config.php");

	//session_start();


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="iso-8859-15" />
	<meta name="keywords" content="mots-clés" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

	<link href="css/caroussel3D.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery/jquery.min.js" ></script>
	<script type="text/javascript" src="js/util.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#reset").click(function(){
	  			$("#formRetour").submit();
		  	});

			$("#terminer").click(function(){
				$("#finSaisie").val(1);
	  			$("#form1").submit();
		  	});

			$("#enregistrer").click(function(){
				$("#finSaisie").val(0);
	  			$("#form1").submit();
		  	});


			$('#nomJoueur').on('change', function() {
			    if (this.selectedOptions.length <= 14) {
			        $(this).find(':selected').addClass('selected');
			        $(this).find(':not(:selected)').removeClass('selected');
			    } else {
			        $(this).find(':selected:not(.selected)').prop('selected', false);
			        alert("Nombre de joueurs maximum atteint");
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

	$convocation = $_SESSION['convocation'];
	$debut = $_SESSION['debut'];
	$fin = $_SESSION['fin'];
	$categorieSelectionnee = $_SESSION['categorieSelectionnee'];
	
	$listeJoueursCategorie = $_SESSION['listeJoueursCategorie'];
	
	?>
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav" style="width: 225px;">
					<ul style="width: 225px;padding-left: 5px">
						<li style="width: 225px;">
							<div>
								<?php 
									echo $convocation->getRencontre()->getLibellecompetition()."<br>";
									echo date_format(new DateTime($convocation->getRencontre()->getJour()), 'd/m/Y')."<br>";
									echo $convocation->getRencontre()->getEquipeDom()."-".$convocation->getRencontre()->getEquipeExt();
								?>
							</div>
						</li>
					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<form id="formRetour" action="ActionRencontre.php" method="post">
							<input type="hidden" name="methode" id="methode" value="retour"/>
							<!-- Récup des filtres précédents -->
							<input type="hidden" name="categorie" id="categorie" value="<?php echo $categorieSelectionnee; ?>"/>
							<input type="hidden" name="debut" id="debut" value="<?php echo $debut; ?>"/>
							<input type="hidden" name="fin" id="fin" value="<?php echo $fin; ?>"/>
						</form>
						
						<form id="form1" action="EnregistrerConvocation.php" method="post">
						<div class="featured-main-joueur" ">
							<fieldset><legend></legend>
							<p class="first" id="container" >
								<?php 
								//echo $convocation->getRencontre()->getLibellecompetition()." - ".date_format(new DateTime($convocation->getRencontre()->getJour()), 'd/m/Y')."<br>";
								//echo $convocation->getRencontre()->getEquipeDom()."-".$convocation->getRencontre()->getEquipeExt()."<br>";
								?>
								<input type="hidden" name="methode" id="methode" value="create"/>
								<input type="hidden" name="finSaisie" id="finSaisie" value="0"/>
								<input type="hidden" name="categorie" id="categorie" value="<?php echo $categorieSelectionnee; ?>"/>
								<input type="hidden" name="debut" id="debut" value="<?php echo $debut; ?>"/>
								<input type="hidden" name="fin" id="fin" value="<?php echo $fin; ?>"/>
								<input type="hidden" name="rencontre" id="rencontre" value="<?php echo $convocation->getRencontre()->getId(); ?>" />
							</p>
							<p id="container" ><label for="heureRDV" style="">Heure du rendez-vous</label><input type="time" name="heureRDV" id="heureRDV" style="width: auto;" value="<?php echo ($convocation->getRencontre()->getHeureRDV()!='' ? $convocation->getRencontre()->getHeureRDV() : ''); ?>"/></p>
							<p id="container" ><label for="lieuRDV" style="">Lieu du rendez-vous</label><input type="text" name="lieuRDV" id="lieuRDV" size="10" style="width: 250px;" value="<?php echo ($convocation->getRencontre()->getLieuRDV()!='' ? $convocation->getRencontre()->getLieuRDV() : ''); ?>"/></p>
							<p id="container" ><label for="commentaireRDV" style="">Commentaires</label><textarea name="commentaireRDV" id="commentaireRDV" cols="10" rows="10" style="width: 250px; height: 100px;"><?php echo (($convocation->getRencontre()->getCommentaireRDV()!='' && !is_null($convocation->getRencontre()->getCommentaireRDV())) ? $convocation->getRencontre()->getCommentaireRDV() : ''); ?></textarea></p>
							</fieldset>
							
							<fieldset>
								<p id="container" >
								<label for="nomJoueur1" style="">Sélectionnez les joueurs<br>(maintenez CTRL enfoncé pour sélectionner plusieurs joueurs)</label>
								<select name="nomJoueur[]" id="nomJoueur" style="width: 314px;height: 200px;" multiple>
									<?php foreach($listeJoueursCategorie as $joueurCat) { 
										$selected = in_array( $joueurCat->getId(), $convocation->getListeJoueurs() ) ? ' selected' : '';
										?>
										<option value="<?php echo $joueurCat->getId();?>" <?php echo $selected;?> ><?php echo $joueurCat->getNom()." ".$joueurCat->getPrenom(); ?></option>
									<?php } ?>
								</select>
								</p>
							</fieldset>
							</div>
							<div class="featured-main-joueur-bas" style="padding-top: 10px;text-align: center;width: 100%; height: 280px;">
								<div class="bouton" id="enregistrer" type="" style="width: auto; height:25px; line-height:25px; " value="Enregistrer">Enregistrer et continuer la saisie</div>
								<div class="bouton" id="terminer" type="" style="width: auto; height:25px; line-height:25px; " value="Terminer">Terminer la saisie</div>
								<div class="bouton" id="reset" type="" style="width: auto; height:25px; line-height:25px; " value="Annuler">Annuler</div>
							</div>
							</form>
						
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
			<div class="cl">&nbsp;</div>
			<div id="sidebar">

			</div>
			<div id="content">

			</div>
			<div class="cl">&nbsp;</div>
		</div>
	</div>

	<!-- End Main -->

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