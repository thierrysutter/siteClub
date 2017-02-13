<div id="main">
		<div class="shell">
			<div class="cl">&nbsp;</div>
			<div id="sidebar">

			</div>
			<div id="content">
				<!--<div class="featured-main-bas">-->
					<div class="staff featured-main-bas-item">
						<div class="cl">&nbsp;</div>
						<h1><a href="#">Palmarès</a></h1>
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
							<h4><?php echo $palmares->getAnnee(); ?>:</h4><p><?php echo $palmares->getTexte(); ?></p>
						<?php } else { ?>
							<p><?php echo $palmares->getTexte(); ?></p>
						<?php } ?>
						<?php } } ?>
						</ul>
					</div>
				<!--</div>-->
			</div>
			<div class="cl">&nbsp;</div>
		</div>
	</div>

