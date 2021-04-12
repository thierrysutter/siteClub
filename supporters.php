<?php
ob_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>
	<meta charset="iso-8859-15" />
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

		});
	</script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
					<ul>
					    <li><div class="link"><a href="index.php">Accueil</a></div></li>
					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>

						<!-- Main Slide Item -->
						<div class="featured-main">
							<a href="#"><img src="css/images/travaux_stade.jpg" width="438px" height="310px" alt="" /></a>
							<div class="featured-main-details">
								<div class="featured-main-details-cnt">
									<h4><a href="#">R�novation du terrain d'honneur</a></h4>
									<p>Les travaux du nouveau terrain synth�tique ont d�but� il y a quelques jours et dureront jusqu'� la fin du mois. Un synth�tique de derni�re g�n�ration remplacera l'ancien tapis.</p>
								</div>
							</div>
						</div>
						<!-- End Main Slide Item -->

						<div class="featured-side">

							<!-- Slide Item 1 -->
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<a href="#" class="left"><img src="css/images/choucroute.gif" width="60px" height="60px" alt="" /></a>
								<h4><a href="#">Soir�e choucroute</a></h4>
								<p>Le club organise une soir�e "choucroute" le 20 Octobre 2013. Renseignements au 03  87 37 04 34.</p>
								<div class="cl">&nbsp;</div>
							</div>
							<!-- End Slide Item 1 -->

							<!-- Slide Item 2 -->
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<a href="#" class="left"><img src="css/images/featured-side-2.jpg" width="60px" height="60px" alt="" /></a>
								<h4><a href="#">Nouvelle saison</a></h4>
								<p>La saison 2013/2014 reprend avec pour objectif la mont�e des S�niors au niveau Ligue.</p>
								<div class="cl">&nbsp;</div>
							</div>
							<!-- End Slide Item 2 -->

							<!-- Slide Item 3 -->
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<a href="#" class="left"><img src="css/images/featured-side-3.jpg" width="60px" height="60px" alt="" /></a>
								<h4><a href="#">Inscriptions 2013/2014</a></h4>
								<p>Pour tous renseignements, contactez nous au 03 87 37 04 34 ou remplissez ce <a href="#">formulaire</a>.</p>
								<div class="cl">&nbsp;</div>
							</div>
							<!-- End Slide Item 3 -->

							<!-- Slide Item 4 -->
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<a href="#" class="left"><img src="css/images/featured-side-4.jpg" width="60px" height="60px" alt="" /></a>
								<h4><a href="#">F�te du foot</a></h4>
								<p>Comme chaque ann�e, le club a organis� sa f�te du football.</p>
								<div class="cl">&nbsp;</div>
							</div>
							<!-- End Slide Item 4 -->
						</div>
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

			<!--<div class="cl">&nbsp;</div>
			<div id="sidebar">
				<h2>Derni�res nouvelles</h2>
				<ul>
				    <li>
				    	<small class="date">28/09/2013 : U13 Excellence Groupe C</small>
				    	<p>St Julien - Moulins Les Metz : 2 - 1</p>
				    </li>
				    <li>
				    	<small class="date">29/09/2013 : Coupe des r�serves</small>
				    	<p>Fl�trange 2 - St Julien 2 : 0 - 4</p>
				    </li>
				    <li>
				    	<small class="date">29/09/2013 : V�t�rans Groupe A</small>
				    	<p>St Julien - ES Woippy : 0 - 4</p>
				    </li>
				    <li>
				    	<small class="date">22/09/2013 : S�niors 1�re division Groupe C</small>
				    	<p>St Julien - Rombas 2 : 2 - 0</p>
				    </li>
				    <li>
				    	<small class="date">22/09/2013 : S�niors 3�me division Groupe I</small>
				    	<p>Metz ACLI - St Julien 2 : 1 - 1</p>
				    </li>
				    <li>
				    	<small class="date">21/09/2013 : U13 Excellence Groupe C</small>
				    	<p>Les Coteaux - St Julien : non jou�</p>
				    </li>
				</ul>
				<a href="#" class="archives">Archives</a>
				<br/>
			</div>-->

			<!--<div id="content">
				<div class="cl">&nbsp;</div>

				<div class="grey-box">
					<h3><a href="#">Champions de moselle U17</a></h3>
					<a href="#"><img src="css/images/U17Champions.jpg" width="205px" height="101px" alt="" /></a>
					<p>
						<span>Nos jeunes U17 ont remport� la finale de la coupe de Moselle 2010 face � Hagondange sur le score de 5 � 0.</span>
						<a href="#" class="button">Lire la suite</a>
					 </p>
				</div>
				<div class="grey-box">
					<h3><a href="#">Mont�e en PHR</a></h3>
					<a href="#"><img src="css/images/monteePHR.jpg" width="205px" height="101px" alt="" /></a>
					<p>
						<span>Les s�niors acc�dent pour la premi�re fois au niveau Promotion d'Honneur R�gionale apr�s une tr�s belle saison.</span>
						<a href="#" class="button">Lire la suite</a>
					 </p>
				</div>
				<div class="grey-box last">
					<h3><a href="#">Mont�e en PH</a></h3>
					<a href="#"><img src="css/images/monteePHR2.jpg" width="205px" height="101px" alt="" /></a>
					<p>
						<span>Nouvelle mont�e pour les s�niors !</span>
						<a href="#" class="button">Lire la suite</a>
					 </p>
				</div>
				<div class="grey-box">
					<h3><a href="#">U13 saison 2005/2006 </a></h3>
					<a href="#"><img src="css/images/U13_2006.jpg" width="205px" height="101px" alt="" /></a>
					<p>
						<span>Belle fin de saison pour nos U13 qui se sont qualifi�s pour les finales d�partementales du championnat Honneur.</span>
						<a href="#" class="button">Lire la suite</a>
					 </p>
				</div>
				<div class="grey-box last">
					<h3><a href="#">Tournoi du FC Woippy 2005.</a></h3>
					<a href="#"><img src="css/images/benjamins2005_1annee.jpg" width="205px" height="101px" alt="" /></a>
					<p>
						<span>Les benjamins 1�re ann�e ont remport� le tournoi organis� par le FC Woippy au stade du Patis.<br/><br/></span>
						<a href="#" class="button">Lire la suite</a>
					 </p>
				</div>

				<div class="cl">&nbsp;</div>
				<div class="video-box">
					<div class="cl">&nbsp;</div>
					<h2 class="left">Vid�os</h2>
					<a href="#" class="button">Plus...</a>
					<div class="cl">&nbsp;</div>
					<div class="video-item-box">
						<a href="#" class="left"><img src="css/images/marly.jpg" width="85px" height="47px" alt="" /></a>
						<p>Marly - AS St Julien</p>
						<a href="http://www.dailymotion.com/video/x783w7_marly-as-saint-julien-les-metz_sport" target="new" class="watch-now">Voir la vid�o</a>
						<!-- <video width="180" height="101" controls  poster="http://www.dailymotion.com/video/x783w7_marly-as-saint-julien-les-metz_sport">
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
						<a href="http://www.dailymotion.com/video/x7hxcy_devant-les-ponts-saint-julien-les-m_sport" target="new" class="watch-now">Voir la vid�o</a>
					</div>
					<div class="video-item-box">
						<a href="#" class="left"><img src="css/images/faitplay.jpg" width="85px" height="47px" alt="" /></a>
						<p>Journ�e du fairplay</p>
						<a href="http://www.dailymotion.com/video/x784g5_esprit-sportif_sport" target="new" class="watch-now">Voir la vid�o</a>
					</div>
					<div class="video-item-box second">
						<a href="#" class="left"><img src="css/images/footA5.jpg" width="85px" height="47px" alt="" /></a>
						<p>Tournoi foot � 5</p>
						<a href="http://www.dailymotion.com/video/x7zkgy_foot-a-5-organise-par-l-as-saint-ju_sport" target="new" class="watch-now">Voir la vid�o</a>
					</div>
					<div class="cl">&nbsp;</div>
				</div>

			</div>
			<div class="cl">&nbsp;</div>
			-->
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