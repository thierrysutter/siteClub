<?php ob_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>

	<meta charset="iso-8859-1">
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

	

	
</head>
<body class="w-75 mx-auto bg-light">
<!-- <script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId            : 'your-app-id',
	      autoLogAppEvents : true,
	      xfbml            : true,
	      version          : 'v2.12'
	    });
	  };
	
	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "https://connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>-->

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

	<div class="text-center text-white opaque-overlay bg-dark py-0">
	    <div class="container">	    
	    	<div class="row">
	        	<div class="col-md-6 p-4 col-12 col-sm-6 col-lg-6 col-xl-6 mx-auto">
				Suite aux annonces hier soir du  Président de la République, L'AS Saint Julien les Metz a le regret de vous informer de la suspension dès à present jusqu'à nouvel ordre de toutes ses activités.
				Continuez à nous suivre notre page Facebook, nous vous informerons en temps réel ! <br/><br/>
				Prenez soin de vous et de vos proches et surtout, restez chez vous ! <br/><br/>
				#TousAntiCovid<br/><br/>
				<a href="https://play.google.com/store/apps/details?id=fr.gouv.android.stopcovid" target="_blank"><img src="images/GooglePlay.jpg" alt="PlayStore" /></a>
				<a href="https://apps.apple.com/fr/app/tousanticovid/id1511279125" target="_blank"><img src="images/AppStore.jpg" alt="AppStore" /></a>
				<br/><br/>
				Le comité de l'ASSJ.
				<br/><br/>
				Retrouvez le communiqué de la FFF <a href="https://www.fff.fr/actualites/195365-covid-19-decision-de-la-fff-concernant-les-competitions?themePath=la-fff%2F&fbclid=IwAR0-XS6mXbNIBSBsv5tiYjSKw-szxmNxiVmxhjDDSElUi5sO_pV4skgkqzo" target="_blank">ici</a>
				</div>
			</div>
		</div>
	</div>

	<div class="py-5 bg-light text-center">
	    <div class="container">
	    
	      
	      <div class="row">
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
		</div>
	</div>
	
	<div class="text-center text-white opaque-overlay bg-dark py-0">
	    <div class="container">
	    
	      <!--<div class="row"><div class="col-md-12"><button onclick="myFacebookLogin()">Login with Facebook</button></div></div>-->
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
</html>
<?php
ob_end_flush();
?>