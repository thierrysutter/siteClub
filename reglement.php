<div class="py-5">
	<p>Tous les adhérents de l'AS SAINT JULIEN LES METZ à quelque titre que ce soit : joueurs, éducateurs, ditigeants, arbitres..., sont tenus de respecter le règlement intérieur du club affiché en permanence au club house du Stade de Grimont (ainsi que sur le site internet du club).</p>
	<br/>
	
	<?php 
		if (!empty($listeReglements)) {
			foreach($listeReglements as $reglement) {
		?>
			<div id="accordion<?php echo $reglement->getId(); ?>" role="tablist" aria-multiselectable="true">
				<div class="card">
				    <div class="card-header" role="tab" id="headingOne<?php echo $reglement->getId(); ?>">
				      <h5 class="mb-0">
				        <a data-toggle="collapse" data-parent="#accordion<?php echo $reglement->getId(); ?>" href="#collapseOne<?php echo $reglement->getId(); ?>" aria-expanded="true" aria-controls="collapseOne">
				          <i class="fa fa-angle-right "></i>&nbsp;<?php echo $reglement->getTitre(); ?>
				        </a>
				      </h5>
				    </div>
				
				    <div id="collapseOne<?php echo $reglement->getId(); ?>" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
				      <div class="card-block">
				        <?php echo $reglement->getTexte(); ?>
				      </div>
				    </div>
				</div>
			</div>
	<?php } } ?>
</div>

<script type="text/javascript">
	$('.collapse').collapse('hide');
	$('#collapseOne1').collapse('show');
</script>