<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
require_once("config/config.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>

	<meta charset="ISO-8859-1">
	<meta http-equiv="Cache-Control" content="max-age=600" />
	<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/table-sorting.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
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
					{origine: "organigramme", civilite: $("#civilite").val(), nom:$("#nom").val(), prenom: $("#prenom").val(), email: $("#email").val(), objet: $("#objet").val(), message: $("#contenu").val(), captcha: $("#captcha").val(), destinataire: $("#destinataire").val()}, //param�tres � passer
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
<body class="w-75 mx-auto bg-light">
	<!-- Navigation Haut-->
	<?php
	session_start();
	$user = null;
	if (isset($_SESSION['session_started'])) {
	  	$user = $_SESSION['user'];
	  	if (!empty($user)) {
	  		/* Navigation Haut */
	  		include("menuAdmin.php");
	  		//include("menuHaut.php");
	  		/* End Navigation */
	  	} else {
	  		//header("Location: ActionAccueil.php");
  			header("Location: Deconnexion.php");
	  	}
	  } else {
	  	//header("Location: ActionAccueil.php");
  		header("Location: Deconnexion.php");
	  }
	  
	  $listeUtilisateurs = $_SESSION['listeUtilisateurs'];
	?>
	<?php include("head.php"); ?>
	
	<div class="py-3">
	    <div class="container">
	      <div class="row">
		      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		        <table class="table table-bordered table-striped table-hover table-responsive">
		          <thead class="thead-inverse">
		            <tr>
		              <th>Pr�nom Nom</th>
		              <th>Email</th>
		              <th>Mdp expire le</th>
		              <th>Derni�re connexion le</th>
		              <th>Action</th>
		            </tr>
		          </thead>
		          <tbody>
		          	<?php foreach($listeUtilisateurs as $utilisateur) { ?>
		            <tr>
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
		          </tbody>
		        </table>
		      </div>
	      </div>
	      
	      <div class="row text-center">
		      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		      	<input type="button" id="ajoutUtilisateur" class="btn btn-success btn-lg active" value="Ajouter un utilisateur"/>
		      </div>
	      </div>
	    </div>
	</div>

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
			<div id="erreurFiltre"></div><!-- div qui contiendra les �ventuels messages d'erreur -->
			<div id="messageFiltre"></div><!-- div qui contiendra le message de retour -->
			<div>
			<div style="width: 50%;float: left;">
				<input type="hidden" id="destinataire" name="destinataire" value=""/>
				<fieldset><legend>l�gende</legend>
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

				<p><label for="prenom">Pr�nom</label></p>
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