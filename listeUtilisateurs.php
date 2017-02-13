<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
require_once("config/config.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
	<meta name="keywords" content="mots-clés" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/table-sorting.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tableATrier').dataTable({
				"bPaging":   false,
				"bLengthChange": false,
				"bInfo":     false,
		        "bFilter":     false,
		        "bPaginate":   false,
		        "bAutoWidth": false,
		        "bSort": true,
		        "oLanguage": {
					"sSearch": "Filtrer ",
					"sZeroRecords": "Aucun enregistrement disponible."
				},
				"aaSorting": [ [0,'asc'], [1,'asc'], [2,'asc'], [3,'asc']],
		        "aoColumns": [ null, null, null, null,{ "sSortable": false }]
			});

			$("#ajoutUtilisateur").click(function(){
				document.location = "creationUtilisateur.php";
			});

			$(".fiche").click(function(){
				$userLogin = $(this).prop('id').split('_')[1];
				document.location = "RechercherUtilisateur.php?userLogin="+$userLogin;
			});

			$(".activation").click(function(){
				$userLogin = $(this).prop('id').split('_')[1];
				document.location = "ActiverUtilisateur.php?userLogin="+$userLogin;
			});

			$(".annulation").click(function(){
				$userLogin = $(this).prop('id').split('_')[1];
				document.location = "AnnulerUtilisateur.php?userLogin="+$userLogin;
			});

			$(".suppression").click(function(){
				$userLogin = $(this).prop('id').split('_')[1];
				document.location = "SupprimerUtilisateur.php?userLogin="+$userLogin;
			});

			$(".email").click(function(){
				$( "#emailDialog" ).dialog("open");
			});

			$("#emailDialog").dialog({
	  			autoOpen: false,
	  			height: 425,
	  			width: 705,
	  			modal: true,
	  			title: "Envoi d'un message",
	  			buttons: {
	  				Envoyer: envoyer,
	  				Annuler: function() {
	  					$(this).dialog( "close" );
	  				}
	  			}
			});

			function envoyer() {
				$.post("EnvoyerMessage.php", // url
					{origine: "organigramme", civilite: $("#civilite").val(), nom:$("#nom").val(), prenom: $("#prenom").val(), email: $("#email").val(), objet: $("#objet").val(), message: $("#contenu").val(), captcha: $("#captcha").val(), destinataire: $("#destinataire").val()}, //paramètres à passer
					function(data) {
						// fonction au retour de l'appel
						alert(data);
					}
				);
				$("#emailDialog").dialog( "close" );
			}
		});
	</script>
</head>
<body>
	<!-- Header -->
	<?php
	  include("head.php");
	?>
	<!-- End Header -->

	<!-- Navigation Haut-->
	<?php

	session_start();

	$listeUtilisateurs = $_SESSION['listeUtilisateurs'];
	$user = null;
	if (isset($_SESSION['session_started'])) {
		$user = $_SESSION['user'];
	  	if (!empty($user)) {
	  		/* Navigation Haut */
	  		include("menuAdmin.php");
	  		/* End Navigation */
	  	} else {
	  		//header("Location: ActionAccueil.php");
  			header("Location: Deconnexion.php");
	  	}
	} else {
		//header("Location: ActionAccueil.php");
  		header("Location: Deconnexion.php");
	}
	?>
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav -->
				<div id="side-nav">
					<!-- <ul>
						<li><div class="link"><a href="ChangementMotDePasse.php">Modifier mot de passe</a></div></li>
					</ul>-->
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>
						<!-- Main Slide Item -->
						<div class="featured-main-joueur">
							<div class="CSSTableGenerator" style="text-align: center; max-height: 235px; overflow: auto;">
								<table id="tableATrier">
									<thead>
									<tr>
										<th>Nom<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th >Email<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th>Expire le<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th>Dernière connexion<br><img src="images/sort-asc.png" style="border: 0;"/><img src="images/sort-desc.png" style="border: 0;"/></th>
										<th>Liens</th>
									</tr>
									</thead>
									<?php foreach($listeUtilisateurs as $utilisateur) { ?>
									<tr class="centre">
										<td><?php echo $utilisateur->getPrenom()." ".$utilisateur->getNom();?></td>
										<td class="email" style="cursor: pointer; text-decoration: underline;" title="Cliquer pour envoyer un mail"><?php echo $utilisateur->getEmail();?></td>
										<td><?php echo date_format(new DateTime($utilisateur->getDateExpiration()), 'd/m/Y');?></td>
										<td><?php echo date_format(new DateTime($utilisateur->getDateDerniereConnexion()), 'd/m/Y H:i:s');?></td>
										<td>
											<!-- <img id="mail_<?php echo $utilisateur->getLogin();?>" src="images/mail16.png" style="border: 0;cursor: pointer;"/> -->
											<img class="fiche" id="fiche_<?php echo $utilisateur->getLogin();?>" src="images/modify16.png" style="border: 0;cursor: pointer;" title="Modifier"/>
											<?php if ($utilisateur->getActif() == 0) {?>
											<img class="activation" id="activ_<?php echo $utilisateur->getLogin();?>" src="images/valid16.png" style="border: 0;cursor: pointer;" title="Activer"/>
											<?php } else {?>
											<img class="annulation" id="annul_<?php echo $utilisateur->getLogin();?>" src="images/annul16.png" style="border: 0;cursor: pointer;" title="Annuler"/>
											<?php } ?>
											<img class="suppression" id="suppr_<?php echo $utilisateur->getLogin();?>" src="images/trash16.png" style="border: 0;cursor: pointer;" title="Supprimer"/>
											<!-- <img class="reinit" id="reinit_<?php echo $utilisateur->getLogin();?>" src="images/cadenas16.png" style="width: 16px; height: 16px;border: 0;cursor: pointer;" title="Reinitialiser le mdp"/> -->
										</td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>

						<div class="featured-main-joueur-bas" style="padding-top: 4px;text-align: center;width: 100%; height: 280px;">
							<input type="text" id="ajoutUtilisateur" class="bouton" value="Ajouter un utilisateur"/>
						</div>
						<!-- End Main Slide Item -->

						<div class="cl">&nbsp;</div>


					</div>
				</div>

				<!-- End Widget -->
			</div>
		</div>
	</div>
	<!-- End Heading -->

	<!-- Main -->
	<div id="main">
		<div class="shell">
			<div id="sidebar">

			</div>
			<div id="content">

			</div>
		</div>
	</div>
	<!-- End Main -->

	<!-- Bandeau sponsors -->
	<?php
	  include("bandeau_sponsors.php");
	?>
	<!-- End bandeau sponsors -->

	<!-- Footer -->
	<?php
	  include("footer.php");
	?>
	<!-- End Footer -->

	<div id="emailDialog">
		<form id="form1" action="EnvoyerMessage.php" method="post">
			<div id="erreurFiltre"></div><!-- div qui contiendra les éventuels messages d'erreur -->
			<div id="messageFiltre"></div><!-- div qui contiendra le message de retour -->
			<div>
			<div style="width: 50%;float: left;">
				<input type="hidden" id="destinataire" name="destinataire" value=""/>
				<fieldset><legend>légende</legend>
				<p><label for="civilite">Civilit&eacute;</label></p>
				<p>
					<select name="civilite" id="civilite" >
					  <option value="M" <?php if (isset($_SESSION['messageKO']) && $civilite == "M") { echo "selected"; } ?>>Mr</option>
					  <option value="MME" <?php if (isset($_SESSION['messageKO']) && $civilite == "MME") { echo "selected"; } ?>>Mme</option>
					</select>
				</p>

				<p><label for="nom">Nom</label></p>
				<p>
					<input type="text" name="nom" id="nom" <?php if (isset($_SESSION['messageKO'])) { echo "value='$nom'"; } ?> required="required"/>
				</p>

				<p><label for="prenom">Prénom</label></p>
				<p>
					<input type="text" name="prenom" id="prenom" <?php if (isset($_SESSION['messageKO'])) { echo "value='$prenom'"; } ?> required="required"/>
				</p>

				<p><label for="email">Email</label></p>
				<p>
					<input type="text" name="email" id="email" <?php if (isset($_SESSION['messageKO'])) { echo "value='$email'"; } ?> required="required"/>
				</p>

				<p><label for="objet">Objet</label></p>
				<p>
					<input type="text" name="objet" id="objet" value="Question" readonly="readonly"/>
				</p>
				</fieldset>
			</div>
			<div style="width: 50%; float: right;">
				<fieldset>
				<p><label for="captcha">Combien font 1+3</label></p>
				<p>
					<input type="text" name="captcha" id="captcha" required="required"/>
				</p>
				<p><label for="contenu">Message</label></p>
				<p>
					<textarea name="contenu" id="contenu" cols="30" rows="15" required="required"><?php if (isset($_SESSION['messageKO'])) { echo "$message"; } ?></textarea>
				</p>
				</fieldset>
			</div>
			</div>
			<!--<p class="submit"><button type="submit">Envoyer</button></p>-->

		</form>
	</div>

</body>
</html>
<?php
ob_end_flush();
?>