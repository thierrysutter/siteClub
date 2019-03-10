<?php
$listeSponsors = array();
try {
	// connexion avec la base de donnÃ©es
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	
	$manager = new ManagerSponsor($connexionBdd->getPDO());
	
	$listeSponsors = $manager->getList();
	
} catch (PDOException $error) { //Le catch est chargé d'intercepter une éventuelle erreur
	echo "NÂ° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}

if (!empty($listeSponsors)) {
?>
	<link rel="stylesheet" type="text/css" href="css/slick.css"/>

	<div class="py-2 bg-dark ">
		<div class="container-fluid">
			<div class="row">
		        <div class="col-md-12">
		      		<h2 class="text-center mb-5 text-white">Nos partenaires</h2>
		      	</div>
	      	</div>
			<div class="row carouselSlick">
			  <?php foreach($listeSponsors as $sponsor) { 
		      ?>
		      <div class="col-xs-12 col-sm-12 col-md-6" style="margin:0 0 0 200px;">
			      <a href="<?php echo $sponsor->getURL(); ?>" target="_blank">
			      	<img class="img-fluid" src="images/sponsor/vignette/<?php echo $sponsor->getVignette(); ?>" style="background-color: white; ">
			      </a>
		      </div>
		      <?php } ?>
				
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="js/slick.min.js"></script>
	<script>
		$(document).ready(function(){
		  $('.carouselSlick').slick({
			  arrows: false,
	          //centerMode: true,
			  //centerPadding: '40px',
			  variableWidth: true,
			  infinite: true,
			  slidesToShow: 2,
			  slidesToScroll: 1,
			  autoplay: true,
			  autoplaySpeed: 3000,
			  responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			    	  slidesToShow: 2,
			          slidesToScroll: 1,
			          infinite: true,
			          //dots: true
			      }
			    },
			    {
			      breakpoint: 768,
			      settings: {
				      slidesToShow: 1,
			          slidesToScroll: 1
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
				      slidesToShow: 1,
			          slidesToScroll: 1
			      }
			    }
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
			  ]
		  });
		});
	</script>

<?php } ?>

