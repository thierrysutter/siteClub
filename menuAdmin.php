<?php
//ob_start();
?>


<script>
$(document).ready( function () {
	$("#user").click(function(){
		$.ajax({ // fonction permettant de faire de l'ajax
		   type: "POST", // methode de transmission des données au fichier php
		   url: "Deconnexion.php", // url du fichier php
		   success: function(msg){ // si l'appel a bien fonctionné
				document.location = "ActionAccueil.php";
		   }
		});
		return false; // permet de rester sur la même page à la soumission du formulaire
	});
});
</script>


<div id="navigation">
<div class="menu">
	<div class="cl">&nbsp;</div>
	<ul>

		<?php
		$user = null;
		if (isset($_SESSION['user'])) {
			$user = $_SESSION['user'];
		}


		if ($user!=null && !$user->isPwdUsageUnique()) {?>
			<li><a href="ActionAccueil.php">Accueil</a></li>

		<?php if ($user->isSuperAdmin() == 1) { ?>
		<li><a href="ActionUtilisateur.php">Utilisateurs</a></li>
		<li><a href="ActionCompetition.php">Competitions</a></li> <!--  TODO  -->
		<li><a href="ActionDivision.php">Divisions</a></li>
		<li><a href="ActionEquipe.php">Equipes</a></li>
		<?php } ?>
		<li><a href="ActionMembre.php">Licenciés</a></li>
		<li><a href="ActionRencontre.php">Matchs</a></li>
		<li><a href="ActionResultat.php">Résultats</a></li>
		<li><a href="ActionArticle.php">Articles</a></li>
		<?php if ($user->isSuperAdmin() == 1) { ?>
		<li><a href="ActionPartenaire.php">Partenaires</a></li>
		<?php } ?>
		<!-- <li><a href="ActionPhoto.php">Photos</a></li>
		<li><a href="ActionVideo.php">Videos</a></li>-->
		<li><a href="ActionProfil.php" style="vertical-align: middle;"><?php echo $user->getNom()."<br>".$user->getPrenom();?></a></li>
	    <?php } ?>
	    <li ><a href="ActionChangementMotDePasse.php"><img id="cadenas" src="images/cadenas16.png" alt="Changer mot de passe" title="Changer mot de passe" style="width: 16px; height: 16px; vertical-align: middle;"/></a></li>
		<li ><a href=""><img id="user" src="images/exit16.png" alt="Deconnexion" title="Deconnexion" style="width: 16px; height: 16px; vertical-align: middle;"/></a></li>

	</ul>
	<div class="cl">&nbsp;</div>
</div>
</div>

<?php
//ob_end_flush();
?>