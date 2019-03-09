<?php
ob_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="ISO-8859-1">
	<meta http-equiv="Cache-Control" content="max-age=600" />
	<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/club.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</head>
<body class="w-75 mx-auto bg-light">
	<!-- Navigation Haut-->
	<?php
	  include("menuHaut.php");
	?>
	<!-- End Navigation -->
	
  	<?php
	  include("head.php");
	?>

	<?php
	try {
		session_start();
		if (isset($_SESSION['listePalmares']))
			$listePalmares = $_SESSION['listePalmares'];
	
		if (isset($_SESSION['listeReglements']))
			$listeReglements = $_SESSION['listeReglements'];
	} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
		echo "N� : ".$error->getCode()."<br />";
		die ("Erreur : ".$error->getMessage()."<br />");
	}
	?>
	
  	<div class="py-0">
	    <div class="container">
	      <div class="row mx-auto">
	        <div class="col-md-12 ">
	          <ul class="nav nav-pills nav-justified" role="tablist">
	            <li class="nav-item">
	              <a data-toggle="pill" href="#presentation" class="active nav-link" role="tab"> <i class="fa fa-book"></i>&nbsp;Pr�sentation</a>
	            </li>
	            <li class="nav-item">
	              <a data-toggle="pill" href="#palmares" class="nav-link" role="tab"><i class="fa fa-history"></i>&nbsp;Palmar�s</a>
	            </li>
	            <li class="nav-item">
	              <a data-toggle="pill" href="#organigramme" class="nav-link" role="tab"><i class="fa fa-user"></i>&nbsp;Organigramme</a>
	            </li>
	            <li class="nav-item">
	              <a data-toggle="pill" href="#reglement" class="nav-link" role="tab"><i class="fa fa-bars"></i>&nbsp;R�glement int�rieur</a>
	            </li>
	            <li class="nav-item">
	              <a data-toggle="pill" href="#installation" class="nav-link" role="tab"><i class="fa fa-photo"></i>&nbsp;Installations</a>
	            </li>
	          </ul>
	        </div>
	      </div>
	      <div class="row mx-auto">
		      <div class="col-md-12 ">
				<div class="tab-content">
				  <div id="presentation" class="tab-pane fade show active" role="tabpanel">
				    <div class="py-5">
					    <div class="container">
					      <div class="row">
					        <div class="col-md-3">
					          <img class="img-fluid d-block mb-4 w-100 img-thumbnail" src="images/dessin.png"> </div>
					        <div class="col-md-9">
					          <h3 class="text-primary pt-3">Ligue Lorraine > District Mosellan</h3>
					          <p class="">N� Affiliation FFF: 521781</p>
					          <p style="font-size: 14px; padding-top: 0px;">
								Stade de Grimont<br>
								Boucle de la bergerie<br>57070 Saint-Julien-L�s-Metz<br>
								T�l/Fax: 03 87 37 04 34<br>
								Email: saintjulienlesmetz.as@moselle.lgef.fr
							  </p>
							  <p id="presentationClub" style="text-align: justify;">Le club a �t� cr�� vers 1935. Nous avons peu de traces de cette �poque mis � part une photo de 1936 photo "ici". 
							  	A partir de 1946, le club �volue son les couleurs de la manufacture lorraine de tabac, en grenat, en ce jusqu'au d�but des ann�es 60. 
							  	En 1965, le club prend un nouveau d�part, pour compter plus de 300 licenci�s en 2010, r�partis 8 cat�gories d'�ge allant des d�butants (6 ans) � v�t�rans (+35 ans). 9 arbitres officient pour le compte du club. Le club obtient le label "Qualit� Argent" du district mosellan pour les ann�es 2007 � 2010, r�compensant ainsi le travail de tous les �ducateurs b�n�voles du club. 
							  	Cette ann�e l�, nous avons �galement obtenu les Al�rions d'Or r�compensant le club class� premier au challenge de la promotion de l'arbitrage en Lorraine. 
							  	Depuis 2007, le club organise un tournoi international pour les U11 et U13 r�unissant plus de 30 �quipes, soit environ 1000 personnes (joueurs, �ducateurs, arbitres, spectateurs et b�n�voles) � accueillir sur nos installations du stade de Grimont.
							  </p>
					        </div>
					      </div>
					    </div>
					  </div>
				  </div>
				  <div id="palmares" class="tab-pane fade" role="tabpanel">
				    <?php include("historique.php"); ?>
				  </div>
				  <div id="organigramme" class="tab-pane fade" role="tabpanel">
				  	<?php include("organigramme.php"); ?>
				  </div>
				  <div id="reglement" class="tab-pane fade" role="tabpanel">
				    <?php include("reglement.php"); ?>
				  </div>
				  <div id="installation" class="tab-pane fade" role="tabpanel">
				    <?php include("stade.php"); ?>
				  </div>
				</div>
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

	<div id="dialogModification" style="display: none;">
		<div class="popup-featured-side"><div class="popup-featured-side-item"><div class="cl"></div>
	    <div ><textarea rows="20" cols="80" id="textePopup"></textarea></div>
	    <div class="cl"></div>
		</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			

			$("#modif").click(function(){
				$texte = $("#presentationClub").html();
				$("#textePopup").val($texte);
				$("#dialogModification").dialog({
		  			height: 425,
		  			width: 705,
		  			modal: true,
		  			title: "Pr�sentation du club",
		  			buttons: {
		  				Fermer: function() {
		  					$(this).dialog( "close" );
		  				},
		  				Enregistrer: function() {
							enregistrerPresentation();
		  					$(this).dialog( "close" );
		  				}
		  			}
		  		});
			});
		});

		function enregistrerPresentation() {
			$("#presentationClub").html($("#textePopup").val());
			$.ajax({ // fonction permettant de faire de l'ajax
			   type: "POST", // methode de transmission des donn�es au fichier php
			   url: "EnregistrerContenu.php", // url du fichier php
			   data: {texte : $("#textePopup").val(), zone : "presentation"}, // donn�es � transmettre
			   dataType: 'json', // JSON
			   success: function(){
				   // si l'appel a bien fonctionn�
				   alert("Modification enregistr�e");
			   },
			   error: function(){
				   // on affiche un message d'erreur dans le span pr�vu � cet effet

			   }
			});
		}
	</script>

	
</body>
</html>
<?php
ob_end_flush();
?>