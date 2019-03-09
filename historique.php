<div class="py-5">
	<ul>
	<?php 
	if (!empty($listePalmares)) {
		$anneePrec = "";
		$anneeCourante = "";
		foreach($listePalmares as $palmares) {
			$anneeCourante = $palmares->getAnnee();
			
			if ($anneeCourante != $anneePrec) {
				$anneePrec = $anneeCourante;
	?>
		<h3><?php echo $palmares->getAnnee(); ?>:</h3><p><?php echo $palmares->getTexte(); ?></p>
	<?php } else { ?>
		<p><?php echo $palmares->getTexte(); ?></p>
	<?php } ?>
	<?php } } ?>
	</ul>
</div>