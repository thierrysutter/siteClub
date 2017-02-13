<?php ob_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="ISO-8859-1">
	<meta http-equiv="Cache-Control" content="max-age=600" />
	<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="football, association, sport, article, moselle, lorraine, metz, france" />
    <meta name="description" content="page d'accueil du site officiel de l'AS Saint Julien Les Metz" />
	<title>AS SAINT JULIEN LES METZ</title>

	<script type="text/javascript" src="js/jquery/jquery.min.js" ></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js" ></script>
	<script type="text/javascript" src="js/slick.js" ></script>
	<script type="text/javascript" src="js/scripts.js" ></script>

	<script src="js/blueimp-gallery.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){

			$titre="";
	        /*$("#dialogArticle2").dialog({
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
		  	});*/

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
			        type: "POST", // methode de transmission des données au fichier php
				   	url: "AfficherPopupArticle2.php", // url du fichier php
				   	data: {id : $(this).attr("id").split('_')[1], mode : "popup"}, // données à transmettre
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

			/*$(".lienArticle2").click(function(){
				// Load demo images from flickr:
			    $.ajax({
			        type: "POST", // methode de transmission des données au fichier php
				   	url: "AfficherPopupArticle.php", // url du fichier php
				   	data: {id : $(this).attr("id").split('_')[1], mode : "popup"}, // données à transmettre
				   	dataType: 'json' // JSON
			    }).success(function (result) {
			        var carouselLinks = [],
			            linksContainer = $('#links'),
			            baseUrl;
		            $titre = result.titre;
		            $("#dialogArticle2").dialog('option', 'title', result.titre);
		            $("#texteArticlePopup2").html(result.texte);
			        $.each(result.photos, function (index, photo) {
			        	baseUrl = 'images/article/';

			        	$('<a/>')
		                .append($('<img>').prop('src', baseUrl + photo))
		                .prop('href', baseUrl + photo)
		                .prop('title', '')
		                .attr('data-gallery', '')
		                .appendTo(linksContainer);

			        	carouselLinks.push({
			                href: baseUrl + photo,
			                title: ''
			            });

			        	$( "#dialogArticle2" ).dialog("open");
			        });

			        // Initialize the Gallery as image carousel:
			        blueimp.Gallery(carouselLinks, {
			            container: '#blueimp-image-carousel',
			            carousel: true
			        });

			    }).error(function(result){

				    alert(result);

			    	$titre = "Erreur";
		            $("#dialogArticle").dialog('option', 'title', $titre);
		            $("#texteArticlePopup").html("Erreur");
		            $( "#dialogArticle" ).dialog("open");
				});
			});*/

			/*$(".lienArticle").click(function(){
				var template = '<a class="left" href="#">'+
									'<img style="max-width: 398px; max-height: 298px;"/>'+
								'</a>';

				var template2 = '<div class="multiple-items"></div>';

				var template3 = '<div><img style="max-width: 438px; max-height:310px;"/></div>';

				$.ajax({ // fonction permettant de faire de l'ajax
					type: "POST", // methode de transmission des données au fichier php
				   	url: "AfficherPopupArticle.php", // url du fichier php
				   	data: {id : $(this).attr("id").split('_')[1], mode : "popup"}, // données à transmettre
				   	dataType: 'json', // JSON
				   	success: function(article){ // si l'appel a bien fonctionné
					   	$("#containerPhoto").html("");
					   	$nbPhotos = article.length - 1;
						$width = 438 / $nbPhotos;
						$height = 310 / $nbPhotos;

					   for($i=1; $i<=$nbPhotos; $i++) {
						   var image = $(template);
						   image.children()[0].id = "imageArticlePopup"+article[$i];
						   image.children()[0].src = "images/article/"+article[$i];
						   image.children()[0].style.width = $width;
						   image.children()[0].style.height = $height;
						   image.appendTo($("#containerPhoto"));
						}

						//$("#imageArticlePopup").prop("src", "images/article/"+article[0].photo);
					   	$("#texteArticlePopup").html(article[0].texte);
					   	$("#dialogArticle").dialog({
						   	height: 425,
				  			width: 705,
				  			modal: true,
				  			title: article[0].titre,
				  			buttons: {
				  				Fermer: function() {
				  					$(this).dialog( "close" );
				  				}
				  			}
				  		});

				   },
				   error: function(){
					   // on affiche un message d'erreur dans le span prévu à cet effet
					    $("#containerPhoto").html("Erreur lors de l'action");
					   	$("#dialogArticle").dialog({
						   	height: 425,
				  			width: 705,
				  			modal: true,
				  			title: 'Erreur',
				  			buttons: {
				  				Fermer: function() {
				  					$(this).dialog( "close" );
				  				}
				  			}
				  		});
				   }
				});
			});*/

			$(".modifArticle").click(function(){
				$idArticle = $(this).prop('id');
				document.location = "RechercherArticle.php?id="+$idArticle;
			});

			$(".cr").click(function(){
				$.ajax({ // fonction permettant de faire de l'ajax
				   type: "POST", // methode de transmission des données au fichier php
				   url: "AfficherPopupCompteRendu.php", // url du fichier php
				   data: {id : $(this).prop('id').split('_')[1], mode : "popup"}, // données à transmettre
				   dataType: 'json', // JSON
				   success: function(compteRendu){ // si l'appel a bien fonctionné
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
					   // on affiche un message d'erreur dans le span prévu à cet effet

				   }
				});
			});
		});
	</script>

	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>

	<link rel="stylesheet" href="css/blueimp-gallery.min.css" type="text/css" media="all"/>

</head>
<body>
	<?php include_once("analyticstracking.php"); ?>
	<!-- Header -->
	<?php
	  include("head.php");
	?>
	<!-- End Header -->

	<!-- Navigation Haut-->
	<?php
	  include("menuHaut.php");
	?>
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">
				<!-- Sub nav -->
				<div id="side-nav">
					<?php
					session_start();
					/*$user = $_SESSION['user'];
					if (!empty($user)) {
					  include("menu.php");
					}*/
					?>
					<ul><li><div style="text-align: center;"><img id="blason" width="200px" height="250px" style=" cursor: pointer;vertical-align: middle;" src="images/logo.png" /></div></li></ul>
				</div>

				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>

<?php

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

if (!empty($listeArticles)) {
?>
						<!-- Main Slide Item -->
						<div class="featured-main">
							<a href="#"><img class="lienArticle" id="imageArticle_<?php echo $listeArticles[0]->getId(); ?>" src="images/article/<?php echo $listeArticles[0]->getPhoto(); ?>" width="438px" height="310px" alt="" /></a>
							<div class="featured-main-details">
								<div class="featured-main-details-cnt">
									<h4><a class="lienArticle" id="lienArticle_<?php echo $listeArticles[0]->getId(); ?>" href="#"><?php echo $listeArticles[0]->getTitre()." (".count($listeArticles[0]->getListePhotos())." photos)"; ?></a>
									<?php if ($user != null && strtoupper($user->getLogin()) == strtoupper($listeArticles[0]->getAuteur())) {?>
									&nbsp;<img id="<?php echo $listeArticles[0]->getId(); ?>" class="modifArticle" style="width: 10px; height: 10px;" alt="modifier l'article" src="images/modify16.png">
									<?php } ?>
									</h4>
									<p id="texteArticle_<?php echo $listeArticles[0]->getId(); ?>"><?php
									if (strlen($listeArticles[0]->getTexte()) > 135)
										echo substr($listeArticles[0]->getTexte(), 0, 135)."... <a class='lienArticle' id='suiteArticle_".$listeArticles[0]->getId()."'>Lire la suite</a>";
									else
										echo $listeArticles[0]->getTexte();
									?></p>
								</div>
							</div>
						</div>
						<!-- End Main Slide Item -->

						<div class="featured-side">

						<?php if (count($listeArticles) > 5)
								$cpt = 5;
							  else
								$cpt = count($listeArticles);

							  for ($i=1; $i<$cpt; $i++) {
								$article = $listeArticles[$i];
						?>
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<a href="#" class="left"><img class="lienArticle" id="imageArticle_<?php echo $article->getId(); ?>" src="images/article/vignette/<?php echo $article->getPhoto(); ?>" width="60px" height="60px" alt="" /></a>
								<h4><a class="lienArticle" id="lienArticle_<?php echo $article->getId(); ?>" href="#"><?php echo $article->getTitre(); ?></a>
								<?php if ($user != null && strtoupper($user->getLogin()) == strtoupper($article->getAuteur())) {?>
									&nbsp;<img id="<?php echo $article->getId(); ?>" class="modifArticle" style="cursor: pointer; width: 10px; height: 10px;" alt="modifier l'article" src="images/modify16.png">
									<?php } ?>
								</h4>
								<p id="texteArticle_<?php echo $article->getId(); ?>"><?php if (strlen($article->getTexte()) > 95)
										echo substr($article->getTexte(), 0, 95)."... <a class='lienArticle' id='suiteArticle_".$article->getId()."'>Lire la suite</a>";
									else
										echo $article->getTexte(); ?></p>
								<div class="cl">&nbsp;</div>
							</div>
						<?php } ?>
						</div>
						<div class="cl">&nbsp;</div>

<?php } ?>
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
				<!--<h2>Dernières nouvelles</h2>-->

				<!-- <h2>R&eacute;sultats du 25/08/2014 au 31/08/2014</h2> -->
				<h1>Derniers r&eacute;sultats</h1>
				<ul>
				<?php if (!empty($listeDernier)) { ?>
				<?php foreach($listeDernier as $dernier) { ?>

					<li>
				    	<small class="date"><?php echo date_format(new DateTime($dernier->getJour()), 'd/m/Y'); ?> : <?php echo $dernier->getEquipe()." - ".$dernier->getLibelleCompetition() ?></small>
				    	<p>
				    	<?php echo $dernier->getEquipeDom(); ?> - <?php echo $dernier->getEquipeExt(); ?> : <?php echo $dernier->getScoreDom(); ?> - <?php echo $dernier->getScoreExt();
						if ($dernier->getCompteRendu()!=null) {
				    		?><img class="cr" id="cr_<?php echo $dernier->getId();?>" src="images/compteRendu16.png" title="Voir le compte rendu du match" style="cursor: pointer; border=0; width: 12px; height: 12px;" /><?php
				    	}
				    	?>
				    	</p>
				    </li>
				<?php } } ?>
				</ul>

				<div class="cl">&nbsp;</div>

				<h1>Prochains matchs</h1>
				<ul>
				<?php if (!empty($listeProchain)) { ?>
				<?php foreach($listeProchain as $prochain) { ?>

					<li>
				    	<small class="date"><?php echo date_format(new DateTime($prochain->getJour()), 'd/m/Y'); ?> : <?php echo $prochain->getEquipe()." - ".$prochain->getLibelleCompetition(); ?></small>
				    	<p>
				    	<?php echo $prochain->getEquipeDom(); ?> - <?php echo $prochain->getEquipeExt();
				    	if ($prochain->getCompteRendu()!=null) {
				    		?><img class="cr" id="cr_<?php echo $prochain->getId();?>" src="images/compteRendu16.png" title="Voir le compte rendu du match" style="cursor: pointer; border=0; width: 12px; height: 12px;" /><?php
				    	}
				    	?>
				    	</p>
				    </li>
				<?php } } ?>
				</ul>
			</div>
			<div id="content">
				<div class="cl">&nbsp;</div>

				<!-- Articles plus anciens -->
				<?php if (count($listeArticles) > 5) {
							/*for ($i=5; $i<count($listeArticles); $i++) {*/
							for ($i=5; $i<14; $i++) {
								$article = $listeArticles[$i];
						?>
				<div class="grey-box <?php if ($i % 3 == 1) echo "last"; ?> ">
					<h3><a class="lienArticle" id="lienArticle_<?php echo $article->getId(); ?>" href="#">
					<?php echo (strlen($article->getTitre()) > 24 ? substr($article->getTitre(), 0, 24) : $article->getTitre()); ?>
					</a>
					<?php if ($user != null && strtoupper($user->getLogin()) == strtoupper($article->getAuteur())) {?>
					<img id="<?php echo $article->getId(); ?>" class="modifArticle" style="cursor: pointer; width: 10px; height: 10px;vertical-align: middle;" alt="modifier l'article" src="images/modify16.png">
					<?php } ?>
					</h3>
					<a href="#">
						<?php if ($article->getPhoto() != "" && file_exists("images/article/moyen/".$article->getPhoto())) { ?>
							<img class="lienArticle" id="imageArticle_<?php echo $article->getId(); ?>" src="images/article/moyen/<?php echo $article->getPhoto(); ?>" width="205px" height="129px" max-width="205px" max-height="129px" alt="" style="" />
						<?php } else if ($article->getVideo() != "" && file_exists($article->getVideo())) { ?>
						 <video width="205px" height="101px" controls>
							  <source src="videos/test.mp4" type="video/mp4">
							  <source src="<?php echo $article->getVideo(); ?>" type="video/ogg">
								Your browser does not support the video tag.
						 </video>
						<?php } else {

						}?>
					</a>
					<p>
						<span><?php if (strlen($article->getTexte()) > 90)
										echo substr($article->getTexte(), 0, 90)." ...";
									else
										echo $article->getTexte(); ?></span>
						<a href="#" id="lienArticle_<?php echo $article->getId(); ?>" class="lienArticle button">Lire la suite</a>
					 </p>
				</div>
				<?php } } ?>


				<!-- VIDEOS ->
				<div class="cl">&nbsp;</div>
				<div class="video-box">
					<div class="cl">&nbsp;</div>
					<h2 class="left">Vidéos</h2>
					<a href="#" class="button">Plus...</a>
					<div class="cl">&nbsp;</div>
					<div class="video-item-box">
						<a href="#" class="left"><img src="css/images/marly.jpg" width="85px" height="47px" alt="" /></a>
						<p>Marly - AS St Julien</p>
						<a href="http://www.dailymotion.com/video/x783w7_marly-as-saint-julien-les-metz_sport" target="new" class="watch-now">Voir la vidéo</a>
						<!- <video width="180" height="101" controls  poster="http://www.dailymotion.com/video/x783w7_marly-as-saint-julien-les-metz_sport">
						    <source src="http://www.dailymotion.com/video/x783w7_marly-as-saint-julien-les-metz_sport" type="video/mp4">
						    <source src="http://www.dailymotion.com/video/x783w7_marly-as-saint-julien-les-metz_sport" type="video/ogg">
						    <source src="http://www.dailymotion.com/video/x783w7_marly-as-saint-julien-les-metz_sport" type="video/webm">
						    Your browser does not support the video tag or the file format of this video. <a href="http://www.supportduweb.com/">http://www.supportduweb.com/</a>
						</video>
						 ->
					</div>
					<div class="video-item-box second">
						<a href="#" class="left"><img src="css/images/DLP.jpg" width="85px" height="47px" alt="" /></a>
						<p>Devant Les Ponts - AS St Julien, les tirs aux buts</p>
						<a href="http://www.dailymotion.com/video/x7hxcy_devant-les-ponts-saint-julien-les-m_sport" target="new" class="watch-now">Voir la vidéo</a>
					</div>
					<div class="video-item-box">
						<a href="#" class="left"><img src="css/images/faitplay.jpg" width="85px" height="47px" alt="" /></a>
						<p>Journée du fairplay</p>
						<a href="http://www.dailymotion.com/video/x784g5_esprit-sportif_sport" target="new" class="watch-now">Voir la vidéo</a>
					</div>
					<div class="video-item-box second">
						<a href="#" class="left"><img src="css/images/footA5.jpg" width="85px" height="47px" alt="" /></a>
						<p>Tournoi foot à 5</p>
						<a href="http://www.dailymotion.com/video/x7zkgy_foot-a-5-organise-par-l-as-saint-ju_sport" target="new" class="watch-now">Voir la vidéo</a>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!- FIN VIDEOS -->
			</div>
			<div class="cl">&nbsp;</div>
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

	<div id="dialogCompteRendu" style="display: none;">
		<div class="popup-featured-side"><div class="popup-featured-side-item"><div class="cl"></div>
	    <!-- <a class="left" href="#"><img id="imageArticlePopup" style="width: 438px; height: 310px;" alt="" src=""></img></a> -->
	    <p id="texteCompteRenduPopup"></p>
	    <div class="cl"></div>
		</div>
		</div>
	</div>

	<!--
	<div id="dialogArticle2" style="display: none;">
	 	<-- The Gallery as inline carousel, can be positioned anywhere on the page ->
		<div id="blueimp-image-carousel" class="blueimp-gallery blueimp-gallery-carousel">
		    <div class="slides"></div>
		    <h3 class="title"></h3>
		    <a class="prev">‹</a>
		    <a class="next">›</a>
		    <a class="play-pause"></a>
		</div>
		<div id="texteArticlePopup" style="float: left;"></div>
	</div>
	-->


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
</html>
<?php
ob_end_flush();
?>