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
	        </div>
	      </div>
	      <div class="row">
	      <?php for ($i=6; $i<12; $i++) { 
	      	$sponsor = $listeSponsors[$i];
	      ?>
	        <div class="p-0 col-md-2 col-6 text-center">
	          <a href="<?php echo $sponsor->getURL(); ?>" target="_blank">
	            <img src="images/sponsor/<?php echo $sponsor->getVignette(); ?>" class="img-fluid" style="text-align: center; width: 150px; height: 150px;" > </a>
	        </div>
	      <?php } ?>
	      </div>
	    </div>
	</div>

<?php } ?>