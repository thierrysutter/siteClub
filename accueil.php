<?php ob_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>

	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="football, association, sport, article, moselle, lorraine, metz, france, fff, district, mosellan, saint julien les metz" />
    <meta name="description" content="page d'accueil du site officiel de l'AS Saint Julien Les Metz" />
	<title>AS SAINT JULIEN LES METZ</title>
	
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/blueimp-gallery.min.css" type="text/css" media="all"/>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">-->
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">
  
	

	

	
</head>
<body class="w-75 mx-auto bg-light">
	<!-- Navigation Haut-->
	<?php
	  include("menuHaut.php");
	?>
  	<?php
	  include("head.php");
	?>
	<!-- End Navigation -->
	<?php
	session_start();
	
	$listeArticles = array();
	$listeDernier = array();
	$listeProchain = array();
	
	if (isset($_SESSION['listeArticles'])) {
		$listeArticles = $_SESSION['listeArticles'];
	}
	
	if (isset($_SESSION['listeDernier'])) {
		$listeDernier = $_SESSION['listeDernier'];
	}
	
	if (isset($_SESSION['listeProchain'])) {
		$listeProchain = $_SESSION['listeProchain'];
	}
	
	$user = null;
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	}
	?>
	
	<div class="row text-center text-white opaque-overlay bg-dark py-0">
		<div class="col-md-6 p-4 col-12 col-sm-6 col-lg-6 col-xl-6 mx-auto">
		Lancement de la boutique du club !
		<br/><br/>
		Retrouvez tous les articles disponibles en téléchargeant le <a href="/document/BoutiqueASSJ.pdf" target="_blank">bon de commande</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mx-auto">
		<div class="py-3">
				<span class="text-center"><h5><b>Interview de Cyril Lahure, gardien de l'équipe Séniors R2</b></h5></span>
			</div>
			<div class="py-2">
				<h6>Bonjour Cyril. Comment vas tu ?</h6>
				<span><b>Cyril</b> : Ça va bien merci.</span>
			</div>
			<div class="py-2">
				<h6>Peux tu nous parler de ton parcours et de ton arrivée à St Julien ?</h6>
				<span><b>Cyril</b> : Je vais commencer mon parcours en seniors. J'ai passé 6 ans dans mon club de coeur le Haut du Lièvre avec lequel nous avons gagné une coupe de Lorraine.
				Ensuite je suis parti à Neuves-Maisons en DH puis j'ai arrêté un an  suite à une grosse blessure au genou.
				J'ai ensuite joué deux ans au Luxembourg avant de revenir en France.
				A l'origine je devais rester a l’AS Les Coteaux mais Nico Testard (Ndlr : le directeur sportif de St Julien) est venu me parler d’un nouveau challenge et je me suis dis pourquoi pas, surtout à mon âge.
				</span>
			</div>
			<div class="py-2">
				<h6>Comment s est passée l'adaptation ?</h6>
				<span><b>Cyril</b> : Assez simple et rapide. Le groupe est assez homogène avec tout genre de coéquipiers, différentes cultures de jeu mais le tout dans une bonne ambiance. On rit autant qu'on travaille, on se dit les choses, on progresse.
				Le niveau du club est intéressant, on manque peut être un peu d’expérience à ce niveau, mais on veut s'inscrire dans la durée et montrer que l'on doit compter avec nous.
				</span>
			</div>
			<div class="py-2">
				<h6>Avez tu déjà eu des entraînements spécifiques gardiens avant ton arrivée à St Julien?</h6>
				<span><b>Cyril</b> : Oui beaucoup de spécifiques au lux. Il n’y a pas d’âge pour pouvoir progresser donc ces séances proposées par Jeff sont très importantes.
				</span>
			</div>
			<div class="py-2">
				<h6>Que penses tu du staff ?</h6>
				<span><b>Cyril</b> : Un bon staff, bien entouré, accompagné d'Yves le dirigeant à tout faire omniprésent,
				Fouz, l'entraîneur adjoint expérimenté, qui nous aide et essaye de nous faire progresser.
				Quant à Fab, c'est un entraîneur avec un grand coeur, ouvert à la discussion,  qui est sérieux dans le travail sans se prendre au sérieux.
				</span>
			</div>
			<div class="py-2">
				<h6>Comment vois tu ton avenir ?</h6>
				<span><b>Cyril</b> : Mon avenir je ne peux pas le dire. Je suis plus prêt de la fin de ma carrière que jamais. Mais tant que le club et surtout mon corps acceptent de continuer, je resterai le plus longtemps possible (même si la concurrence devient de plus en plus jeune) Mais bon même un vieux comme moi ne se laisse pas faire face à des jeunes talentueux. Il faut leur montrer c’est qui le patron (MDR)</span>
			</div>
			<div class="py-2">
				<h6>Que penses tu de ta première partie de saison?</h6>
				<span><b>Cyril</b> : Nous (l’équipe) avons fait une très grosse 1ere partie de saison. Maintenant il nous reste à confirmer et à ne pas décevoir les spectateurs et le club. </span>
			</div>
			<div class="py-5">
				<h6>Merci Cyril</h6>
			</div>
		</div>
	</div>
	
	<div class="row py-3 bg-light">
		<div class="col-12 text-center">
			<!-- <div id="ytplayer"></div> -->

			<div id="ytplayer" class="youtube_player" 
				videoID="5z1AndtkkRo" 
				width="640" height="360" theme="dark" 
				rel="1" controls="1" 
				showinfo="1" autoplay="0" 
				mute="0">
			</div>
		</div>
	</div>
	
	
	<div class="text-center text-white opaque-overlay bg-dark py-0">
	    <div class="container">
	        <div class="row">
	        <div class="col-md-6 p-4 col-12 col-sm-6 col-lg-6 col-xl-6 mx-auto">
	          <h2 class="my-3">R&eacute;sultats</h2>
	          <ul class="text-left">
	          <?php if (!empty($listeDernier)) { ?>
				<?php foreach($listeDernier as $dernier) { ?>
				<li class="py-1">
					<?php 
					echo date_format(new DateTime($dernier->getJour()), 'd/m/Y')." - ";
					echo $dernier->getEquipe()." - ".$dernier->getLibelleCompetition()."<br/>";
					?>
					<b><?php echo $dernier->getEquipeDom(); ?> - <?php echo $dernier->getEquipeExt(); ?> : <?php echo $dernier->getScoreDom(); ?> - <?php echo $dernier->getScoreExt();?></b>
					<?php
					if ($dernier->getCompteRendu()!=null) {
				    ?><img class="cr" id="cr_<?php echo $dernier->getId();?>" src="images/compteRendu16.png" title="Voir le compte rendu du match" style="cursor: pointer; border=0; width: 12px; height: 12px;" /><?php
				    }
				    ?>
				</li>
				<?php } } else {?>
				<li class="">Aucuns r&eacute;sultats &agrave; afficher</li>
				<?php } ?>
	          
	          </ul>
	        </div>
	        <div class="col-md-6 p-4 col-12 col-sm-6 col-lg-6 col-xl-6 mx-auto">
	          <h2 class="my-3">Agenda</h2>
	          <ul class="text-left">
	          <?php if (!empty($listeProchain)) { ?>
				<?php foreach($listeProchain as $prochain) { ?>
				<li class="py-1">
					<?php 
					echo date_format(new DateTime($prochain->getJour()), 'd/m/Y')." - ";
					echo $prochain->getEquipe()." - ".$prochain->getLibelleCompetition()."<br/>"
					?>
					<b><?php echo $prochain->getEquipeDom(); ?> - <?php echo $prochain->getEquipeExt(); ?></b>
					<?php
					if ($prochain->getCompteRendu()!=null) {
						?><img class="cr" id="cr_<?php echo $prochain->getId();?>" src="images/compteRendu16.png" title="Voir le compte rendu du match" style="cursor: pointer; border=0; width: 12px; height: 12px;" /><?php
				    }
				    ?>
				</li>
				<?php } } else {?>
				<li class="">Aucunes rencontres &agrave; afficher</li>
				<?php } ?>
	          </ul>
	        </div>
	      </div>
	    </div>
	</div>
	
	<?php
	  if (!empty($listeArticles)) {
	?>
	<div class="py-5 bg-light">
	    <div class="container">
	    <?php for ($i=0; $i<9; $i++) {
	    	$article = $listeArticles[$i];
	    	
	    	if ($i % 3 == 0) {echo "<div class=\"row\">";}
			?>
			<div class="col-md-4 my-3">
			<?php if ($article->getPhoto() != '') {?>
			<img class="img-fluid d-block mb-4" src="images/article/vignette/<?php echo $article->getPhoto(); ?>" style="max-width: 250px; max-height: 300px;">
			<?php } else { ?>
			<img class="img-fluid d-block mb-4" src="images/ASSJLMVERT.png" style="max-width: 250px; max-height: 300px;">
			<?php } ?>
			<h5><b><?php echo (strlen($article->getTitre()) > 24 ? substr($article->getTitre(), 0, 24) : $article->getTitre()); ?></b></h5>
			<p class="mt-1">
			<?php 
			if (strlen($article->getTexte()) > 250)
				echo substr($article->getTexte(), 0, 250)." ...";
			else
				echo $article->getTexte();
			?>
			</p>
			</div>
			<?php 
			if ($i % 3 == 2) {echo "</div>";}
	    }
		?>
	    </div>
	</div>
	<?php
	  }
	?>
	
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
	    <!-- <a class="left" href="#"><img id="imageArticlePopup" style="width: 438px; height: 310px;" alt="" src=""></img></a> -->
	    <p id="texteCompteRenduPopup"></p>
	    <div class="cl"></div>
		</div>
		</div>
	</div>

	<div id="dialogArticle" style="display: none;">
	 	<div class="popup-featured-side">
			<div class="popup-featured-side-item">
 				<div class="cl"></div>
 				<div class="single-item" id="containerPhoto" data-slick='{}'>
				</div>
				<p id="texteArticlePopup" style="float: left;"></p>
				<div class="cl"></div>
			</div>
		</div>
	</div>
</body>


<script type="text/javascript" src="js/jquery/jquery.min.js" ></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js" ></script>
	<script type="text/javascript" src="js/slick.js" ></script>
	<script type="text/javascript" src="js/scripts.js" ></script>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	<script src="js/blueimp-gallery.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){

			$titre="";

	        $("#dialogArticle").dialog({
	        	autoOpen: false,
	        	height: 500,
		  		width: 800,
		  		modal: true,
		  		title: 'AS SAINT JULIEN LES METZ',
		  		buttons: {
			 			Fermer: function() {
		  				$(this).dialog( "close" );
		  			}
		  		}
		  	});

	        $(".lienArticle").click(function(){
	        	$("#texteArticlePopup").html("");
			  	// Load demo images from flickr:
			    $.ajax({
			        type: "POST", // methode de transmission des donnÃ©es au fichier php
				   	url: "AfficherPopupArticle2.php", // url du fichier php
				   	data: {id : $(this).attr("id").split('_')[1], mode : "popup"}, // donnÃ©es &agrave; transmettre
				   	dataType: 'json' // JSON
			    }).success(function (result) {
			    	$('.single-item').slick('removeSlide', 0, 999, true);

		            $titre = result.titre;
		            $("#dialogArticle").dialog('option', 'title', result.titre);
		            $("#texteArticlePopup").html(result.texte);

		            if (result.photos != null) {
		            	$.each(result.photos, function (index, photo) {
				        	baseUrl = 'images/article/';
				        	$('.single-item').slick('slickAdd',"<div><img src="+baseUrl + photo+" style=\"max-width: 645px; max-height:310px;\"/></div>");
				        	$( "#dialogArticle" ).dialog("open");
				        });
			        } else {
		            	$( "#dialogArticle" ).dialog("open");
		            }
			    }).error(function(){alert("erreur");});
	        });

			$(".modifArticle").click(function(){
				$idArticle = $(this).prop('id');
				document.location = "RechercherArticle.php?id="+$idArticle;
			});

			$(".cr").click(function(){
				$.ajax({ // fonction permettant de faire de l'ajax
				   type: "POST", // methode de transmission des donnÃ©es au fichier php
				   url: "AfficherPopupCompteRendu.php", // url du fichier php
				   data: {id : $(this).prop('id').split('_')[1], mode : "popup"}, // donnÃ©es &agrave; transmettre
				   dataType: 'json', // JSON
				   success: function(compteRendu){ // si l'appel a bien fonctionnÃ©
					   //$("#imageArticlePopup").prop("src", "images/article/"+article.photo);
					   $("#texteCompteRenduPopup").html(compteRendu.texte);

					   $("#dialogCompteRendu").dialog({
				  			height: 425,
				  			width: 705,
				  			modal: true,
				  			title: compteRendu.titre,
				  			buttons: {
				  				Fermer: function() {
				  					$(this).dialog( "close" );
				  				}
				  			}
				  		});

				   },
				   error: function(){
					   // on affiche un message d'erreur dans le span prÃ©vu &agrave; cet effet

				   }
				});
			});
		});
	</script>
	
</html>
<?php
ob_end_flush();
?>