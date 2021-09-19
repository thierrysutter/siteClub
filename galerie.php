<?php ob_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<?php
	  include("tac.php");
	?>
		<meta charset="windows-1252">
		<meta http-equiv="Cache-Control" content="max-age=600" />
		<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="keywords" content="football, association, sport, article, moselle, lorraine, metz, france" />
	    <meta name="description" content="page d'accueil du site officiel de l'AS Saint Julien Les Metz" />
		<title>AS SAINT JULIEN LES METZ</title>
		
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="css/blueimp-gallery.css">

		<script type="text/javascript" src="js/jquery/jquery.min.js" ></script>
		<script type="text/javascript" src="js/jquery/jquery-ui.min.js" ></script>
		<script src="js/blueimp-gallery.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				document.getElementById('links').onclick = function (event) {
				    event = event || window.event;
				    var target = event.target || event.srcElement,
				        link = target.src ? target.parentNode : target,
				        options = {index: link, event: event},
				        links = this.getElementsByTagName('a');
				    blueimp.Gallery(links, options);
				};
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
		  include("menuHaut.php");
		?>
		<!-- End Navigation -->
		
		
		
		
		
		<!-- Heading -->
		<div id="heading">
			<div class="shell">
				<div id="heading-cnt">
					<!-- Sub nav -->
					<div id="side-nav">
					</div>
					<!-- End Sub nav -->
					<!-- Widget -->
					<div id="heading-box">
						<div id="heading-box-cnt">
							<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
							<div id="blueimp-gallery" class="blueimp-gallery">
							    <div class="slides"></div>
							    <h3 class="title"></h3>
							    <a class="prev">�</a>
							    <a class="next">�</a>
							    <a class="close">�</a>
							    <a class="play-pause"></a>
							    <ol class="indicator"></ol>
							</div>
							
							<div id="links">
							    <a href="images/installation/stade.jpg" title="1">
							        <img src="images/installation/stade.jpg" alt="1" style="width: 40px; height: 40px;">
							    </a>
							    <a href="images/installation/stade_julien.jpg" title="2">
							        <img src="images/installation/stade_julien.jpg" alt="2" style="width: 40px; height: 40px;">
							    </a>
							    <a href="images/installation/stade_julien2.jpg" title="3">
							        <img src="images/installation/stade_julien2.jpg" alt="3" style="width: 40px; height: 40px;">
							    </a>
							</div>
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
		<?php //include("bandeau_sponsors.php"); ?>
		<!-- End bandeau sponsors -->
	
		<!-- Footer -->
		<?php include("footer.php"); ?>
		<!-- End Footer -->
	</body>
</html>