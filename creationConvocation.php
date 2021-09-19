<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
require_once("config/config.php");

	//session_start();


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>
	<meta charset="windows-1252">
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">
	
	<link href="css/caroussel3D.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery/jquery.min.js" ></script>
	<script type="text/javascript" src="js/util.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
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

	$convocation = $_SESSION['convocation'];
	$debut = $_SESSION['debut'];
	$fin = $_SESSION['fin'];
	$categorieSelectionnee = $_SESSION['categorieSelectionnee'];
	
	$listeJoueursCategorie = $_SESSION['listeJoueursCategorie'];
	
	?>
	<?php
	  include("head.php");
	?>
	<!-- End Navigation -->
	
	<div class="my-3">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	        	<form id="formRetour" action="ActionRencontre.php" method="post">
					<input type="hidden" name="methode" id="methode" value="retour"/>
					<!-- R�cup des filtres pr�c�dents -->
					<input type="hidden" name="categorie" id="categorie" value="<?php echo $categorieSelectionnee; ?>"/>
					<input type="hidden" name="debut" id="debut" value="<?php echo $debut; ?>"/>
					<input type="hidden" name="fin" id="fin" value="<?php echo $fin; ?>"/>
				</form>
						
	        	<form id="" action="EnregistrerConvocation.php" method="post">
	        		<input type="hidden" name="methode" id="methode" value="create"/>
					<input type="hidden" name="finSaisie" id="finSaisie" value="0"/>
					<input type="hidden" name="categorie" id="categorie" value="<?php echo $categorieSelectionnee; ?>"/>
					<input type="hidden" name="debut" id="debut" value="<?php echo $debut; ?>"/>
					<input type="hidden" name="fin" id="fin" value="<?php echo $fin; ?>"/>
					<input type="hidden" name="rencontre" id="rencontre" value="<?php echo $convocation->getRencontre()->getId(); ?>" />
	        		<h3 class="mx-5 pb-3">Convocations</h3>
			        
			        <div class="form-group row mx-5">
			        	<div class="col-sm-12">
						<?php 
							echo "<b>Comp�tition</b> : ".$convocation->getRencontre()->getLibellecompetition()."<br>";
							echo "<b>Date</b> : ".date_format(new DateTime($convocation->getRencontre()->getJour()), 'd/m/Y')."<br>";
							echo "<b>Match</b> : ".$convocation->getRencontre()->getEquipeDom()."-".$convocation->getRencontre()->getEquipeExt();
						?>
						</div>
					</div>
							
			        <div class="form-group row mx-5">
			        	<label class="col-sm-2 col-form-label" for="heureRDV">Heure du RDV</label>
			        	<div class="col-sm-2">
			        		<input class="form-control w-100 form-control-md" type="time" id="heureRDV" name="heureRDV" value="<?php echo ($convocation->getRencontre()->getHeureRDV()!='' ? $convocation->getRencontre()->getHeureRDV() : ''); ?>" required/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-2 col-form-label" for="lieuRDV">Lieu du RDV</label>
			        	<div class="col-sm-10">
			        		<input class="form-control w-100 form-control-md" type="text" id="lieuRDV" name="lieuRDV" value="<?php echo ($convocation->getRencontre()->getLieuRDV()!='' ? $convocation->getRencontre()->getLieuRDV() : ''); ?>" required/>
			        	</div>
			        </div>
			        
			        <div class="form-group row mx-5">
			        	<label class="col-sm-2 col-form-label" for="commentaireRDV">Commentaire</label>
			        	<div class="col-sm-10">
			        		<textarea name="commentaireRDV" id="commentaireRDV" cols="10" rows="10" style="width: 100%; height: 100px;"><?php echo (($convocation->getRencontre()->getCommentaireRDV()!='' && !is_null($convocation->getRencontre()->getCommentaireRDV())) ? $convocation->getRencontre()->getCommentaireRDV() : ''); ?></textarea>
			        	</div>
			        </div>
	        		
	        		<div class="form-group row mx-5">
	        			<label class="col-sm-2 col-form-label" for="nomJoueur1">S�lectionnez les joueurs<br>(maintenez CTRL enfonc� pour s�lectionner plusieurs joueurs)</label>
	        			<div class="col-sm-10">
			              <select class="form-control w-100 form-control-md" name="nomJoueur[]" id="nomJoueur" multiple style="height: 200px;">
							<?php foreach($listeJoueursCategorie as $joueurCat) { 
								$selected = in_array( $joueurCat->getId(), $convocation->getListeJoueurs() ) ? ' selected' : '';
								?>
								<option value="<?php echo $joueurCat->getId();?>" <?php echo $selected;?> ><?php echo $joueurCat->getNom()." ".$joueurCat->getPrenom(); ?></option>
							<?php } ?>
						  </select>
			            </div>
			        </div>
					
					<div class="form-group row mx-5">
		              <div class="col-sm-12 text-right">
		                <button id="enregistrer" class="btn btn-primary btn-lg active" style="width: auto;" value="Enregistrer et continuer la saisie">Enregistrer et continuer la saisie</button>
		                <button id="terminer" class="btn btn-primary btn-lg active" style="width: auto;" value="Terminer">Terminer la saisie</button>
		                <button id="reset" class="btn btn-primary btn-lg active" style="width: auto;" value="Annuler">Annuler</button>
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