
<!-- Heading -->
<div id="heading">
<div class="shell">
<div id="heading-cnt">

<!-- Sub nav -->
<div id="side-nav">
<form id="form1" name="form1" action="ActionEcoleDeFoot.php" method="post">
<input type="hidden" name="categorie" id="categorie" value="<?php echo $categorie;?>" />
</form>
<!-- <ul>
<li id="lienU7" class="active"><div class="link"><a href="#">U7</a></div></li>
<li id="lienU9"><div class="link"><a href="#">U9</a></div></li>
<li id="lienU11"><div class="link"><a href="#">U11</a></div></li>
<li id="lienU13"><div class="link"><a href="#">U13</a></div></li>
<li id="lienU15"><div class="link"><a href="#">U15</a></div></li>
<li id="lienU17"><div class="link"><a href="#">U17</a></div></li>
</ul>-->
</div>
<!-- End Sub nav -->

<div id="heading-box">
<div id="heading-box-cnt">
<div class="cl">&nbsp;</div>

<!-- Main Slide Item -->
<div class="featured-main">
<a href="#"><img src="./images/article/repriseJeunes2014.jpg" width="438px" height="310px" alt="" /></a>
<div class="featured-main-details">
<!--<div class="featured-main-details-cnt">
<h4><a href="#">Reprise section jeunes</a></h4>
<p>Les jeunes joueurs de l'école de foot (U6 à U13) ont repris le chemin des entrainements depuis la fin du mois d'août.</p>
</div>-->
</div>
</div>
<!-- End Main Slide Item -->

<div class="featured-side">

<!-- Slide Item 1 -->
<div class="featured-side-item">
<div class="cl">&nbsp;</div>
<!--<a href="#" class="left"><img src="css/images/travaux_stade.jpg" width="60px" height="60px" alt="" /></a>-->
<h4><a href="#">Infos catégorie</a></h4>
<?php
try {
	if ($cat != null) {
		echo "<p>Joueurs né(e)s en ".$cat->getAnneeDebut()." et ".$cat->getAnneeFin()."</p>";
	}
} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
?>
								<div class="cl">&nbsp;</div>
							</div>
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<h4><a href="#">Entrainements</a></h4>
								<?php
								try {
									$listeEntrainements = $cat->getEntrainements();
									
									if (!empty($listeEntrainements)) {
										foreach($listeEntrainements as $entrainement) {
											echo "<p>".$entrainement->getJour()." à ".$entrainement->getHeureDebut()." / ".$entrainement->getLieu()."</p>";
										}
									}
								} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
									echo "N° : ".$error->getCode()."<br />";
									die ("Erreur : ".$error->getMessage()."<br />");
								}
								?>
								<div class="cl">&nbsp;</div>
							</div>
							<!-- End Slide Item 1 -->

							<!-- Slide Item 2 -->
							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<!--<a href="#" class="left"><img src="css/images/featured-side-2.jpg" width="60px" height="60px" alt="" /></a>-->
								<h4><a href="#">Educateurs</a></h4>
								<?php
								try {
									if (!empty($listeStaffs)) {
										foreach($listeStaffs as $staff) {
											echo "<p>".$staff->getNom()." ".$staff->getPrenom()."</p>";
										}
									}
								} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
									echo "N° : ".$error->getCode()."<br />";
									die ("Erreur : ".$error->getMessage()."<br />");
								}
								?>
								<div class="cl">&nbsp;</div>
							</div>
							<!-- End Slide Item 2 -->

							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<h4><a href="#">Derniers résultats</a></h4>
								<?php if (!empty($listeDernier)) {
									foreach ($listeDernier as $dernier) {
										echo "<p>".date_format(new DateTime($dernier->getJour()), 'd/m/Y').": ".$dernier->getEquipeDom()." - ".$dernier->getEquipeExt()." : ".$dernier->getScoreDom()." - ".$dernier->getScoreExt()."&nbsp;".($dernier->getCompteRendu()!=null && $dernier->getCompteRendu()!="" ? "<img class=\"CR\" id=\"".$dernier->getId()."\" src=\"images/compteRendu16.png\" style=\"vertical-align: middle;\" />" : "")."</p>";
									}
								}?>

								<div class="cl">&nbsp;</div>
							</div>

							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<h4><a href="#">Prochaines rencontres</a></h4>
								<?php if (!empty($listeProchain)) {
									foreach ($listeProchain as $prochain) {
										echo "<p>".date_format(new DateTime($prochain->getJour()), 'd/m/Y').": ".$prochain->getEquipeDom()." - ".$prochain->getEquipeExt()."</p>";
									}
								}?>
								<div class="cl">&nbsp;</div>
							</div>

							<div class="featured-side-item">
								<div class="cl">&nbsp;</div>
								<h4><a href="#">Classements</a></h4>
								<?php if (!empty($listeEquipes)) {
										foreach ($listeEquipes as $equipe) {
											echo "<p style=\"cursor: pointer;\" onclick=\"window.open('".$equipe->getLienClassement()."','_new')\">".$equipe->getLibelle()."</p>";
										}
									}?>
								<div class="cl">&nbsp;</div>
							</div>

						</div>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
				<!-- End Widget -->

			</div>
		</div>
	</div>
	<!-- End Heading -->