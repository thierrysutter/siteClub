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
	<div class="py-5 bg-dark">
	    <div class="container-fluid">
	      <div class="row">
	        <div class="col-md-12">
	          <h1 class="text-center mb-5 text-white">Nos partenaires</h1>
	          <div class="row ">
		      <?php for ($i=6; $i<12; $i++) { 
		      	$sponsor = $listeSponsors[$i];
		      ?>
		        <div class="p-5 col-md-4 col-6 text-center">
		          <a href="<?php echo $sponsor->getURL(); ?>" target="_blank">
		            <img src="images/sponsor/vignette/<?php echo $sponsor->getVignette(); ?>" class="img-fluid" style="text-align: center; max-width: 450px; max-height: 150px;" > </a>
		            </div>
		      <?php } ?>
			    </div>
			</div>
		</div>
		</div>
	</div>

	<?php /*<div class="py-5 bg-dark">
		<div class="container-fluid text-center ">
		    <h2 class="text-center mb-5 text-white">Nos partenaires</h2>
		    <div class="row mx-auto my-auto">
		        <div id="recipeCarousel" class="carousel slide " data-ride="carousel">
		            <div class="carousel-inner" role="listbox">
		            <?php 
		            $i=0;
		            	foreach($listeSponsors as $sponsor)	{
		            	?>
		            	<div class="carousel-item <?php echo $i==0 ? 'active' : '';?>">
		                    <img class="d-block col-4 img-fluid" src="images/sponsor/vignette/<?php echo $sponsor->getVignette(); ?>" style="flex: 0 !important;">
		                </div>
		            <?php
		            $i++;
		            } ?> 
		            </div>
		            <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
		                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		                <span class="sr-only">Précédent</span>
		            </a>
		            <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
		                <span class="carousel-control-next-icon" aria-hidden="true"></span>
		                <span class="sr-only">Suivant</span>
		            </a>
		        </div>
		    </div>
		</div>
	</div>
	*/?>
	
	<script>
	$('#recipeCarousel').carousel({
		  interval: 2500
		})

		$('.carousel .carousel-item').each(function(){
		    var next = $(this).next();
		    if (!next.length) {
		    next = $(this).siblings(':first');
		    }
		    next.children(':first-child').clone().appendTo($(this));
		    
		    for (var i=0;i<4;i++) {
		        next=next.next();
		        if (!next.length) {
		        	next = $(this).siblings(':first');
		      	}
		        
		        next.children(':first-child').clone().appendTo($(this));
		      }
		});

	
	</script>

<?php } ?>

