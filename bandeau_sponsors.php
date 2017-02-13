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


<div id="sponsor">
	<div style="font-size: 18px; padding-bottom: 5px;">NOS PARTENAIRES</div>
	<div class="shell autoplay">
		<?php foreach($listeSponsors as $sponsor) { 
		?>
		<div onclick="window.open('<?php echo $sponsor->getURL(); ?>')"><img src="images/sponsor/vignette/<?php echo $sponsor->getVignette(); ?>" id="<?php echo $sponsor->getNom(); ?>" class="vignetteSponsor" alt="<?php echo $sponsor->getNom(); ?>" title="<?php echo $sponsor->getNom(); ?>" width="50px" height="50px" /></div>
		<?php } ?>
	</div>
</div>

<?php } ?>