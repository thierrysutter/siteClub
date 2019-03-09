<?php
//ob_start();
?>


<script>
$(document).ready( function () {
	$("#userr").click(function(){
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

<nav class="navbar navbar-expand-md fixed-top w-75 mx-auto navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="ActionAccueil.php">Accueil</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto w-100">
        	<?php
			$user = null;
			if (isset($_SESSION['user'])) {
				$user = $_SESSION['user'];
			}
			if ($user!=null && !$user->isPwdUsageUnique()) {?>
<!-- 			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionAccueil.php">Accueil</a></li> -->
        	
        	<?php if ($user->isSuperAdmin() == 1) { ?>
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionUtilisateur.php">Utilisateurs</a></li>
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionCompetition.php">Competitions</a></li> <!--  TODO  -->
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionDivision.php">Divisions</a></li>
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionEquipe.php">Equipes</a></li>
			<?php } ?>
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionMembre.php">Licenciés</a></li>
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionRencontre.php">Matchs</a></li>
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionResultat.php">Résultats</a></li>
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionArticle.php">Articles</a></li>
			<?php if ($user->isSuperAdmin() == 1) { ?>
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionPartenaire.php">Partenaires</a></li>
			<?php } ?>
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionProfil.php"><?php echo $user->getNom()." ".$user->getPrenom();?></a></li>
			<?php } ?>
			<li class="nav-item text-capitalize"><a class="nav-link" href="ActionChangementMotDePasse.php"><img id="cadenas" src="images/cadenas16.png" alt="Changer mot de passe" title="Changer mot de passe" style="width: 16px; height: 16px; vertical-align: middle;"/></a></li>
			<li class="nav-item text-capitalize"><a class="nav-link" href=""><img id="userr" src="images/exit16.png" alt="Deconnexion" title="Deconnexion" style="width: 16px; height: 16px; vertical-align: middle;"/></a></li>
        </ul>
      </div>
    </div>
</nav>

<?php
//ob_end_flush();
?>