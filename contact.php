<?php
ob_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="iso-8859-15" />
	<meta name="keywords" content="mots-clés" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#message").dialog({
				autoOpen: false,
				height: 200,
				width: 350,
				modal: true,
				title: "Message",
				buttons: {
					OK: function() {
						$(this).dialog( "close" );
					},
					Annuler: function() {
						$(this).dialog( "close" );
					}
				}
			});
		});
	</script>	
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<!-- Header -->
	<?php
	  include("head.php");
	?>
	<!-- End Header -->

	<!-- Navigation Haut-->
	<?php
	  include("menuHaut.php");
	?>
	<!-- End Navigation -->

	<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">

				<!-- Sub nav ->
				<div id="side-nav">
					<ul>
					    <li><div class="link"><a href="ActionAccueil.php">Accueil</a></div></li>
					</ul>
				</div>
				<!-- End Sub nav -->

				<!-- Widget -->
				<div id="heading-box">
					<div id="heading-box-cnt">
						<div class="cl">&nbsp;</div>


						<div class="featured-main-joueur">
						<div id="message">
							<?php
							if (isset($_SESSION['retour'])) {
								if (isset($_SESSION['messageOK'])) {
									echo "<h4>Votre message a bien été envoyé ! Nous vous répondrons dans les plus bref délais.</h4><br>";
									echo $_SESSION['messageOK'];
								}
								if (isset($_SESSION['messageKO'])) {
									$civilite = $_SESSION['civilite'];
									$nom = $_SESSION['nom'];
									$prenom = $_SESSION['prenom'];
									$email = $_SESSION['email'];
									$objet = $_SESSION['objet'];
									$message = $_SESSION['message'];
									echo "Une erreur est intervenue pendant l'envoi de votre message. Merci de vérifier tous les champs du formulaire.";
								}
							} else {
								//unset($_SESSION['messageOK']);
								//unset($_SESSION['messageKO']);
							}
							unset($_SESSION['retour']);
							?>
						</div>
							<form id="form1" action="EnvoyerMessage.php" method="post">
								<input type="hidden" name="origine" name="origine" value="contact"/>
								<fieldset><legend>Formulaire de contact</legend>
									<p class="first">
										<label for="civilite">Civilité</label>
										<!-- <input type="text" name="civilite" id="civilite" size="30" />-->
										<select name="civilite" id="civilite" >
										  <option value="M" <?php if (isset($_SESSION['messageKO']) && $civilite == "M") { echo "selected"; } ?>>Mr</option>
										  <option value="MME" <?php if (isset($_SESSION['messageKO']) && $civilite == "MME") { echo "selected"; } ?>>Mme</option>
										</select>
									</p>
									<p>
										<label for="name">Nom</label>
										<input type="text" name="nom" id="nom" size="30" <?php if (isset($_SESSION['messageKO'])) { echo "value='$nom'"; } ?>/>
									</p>
									<p>
										<label for="prenom">Prénom</label>
										<input type="text" name="prenom" id="prenom" size="30"<?php if (isset($_SESSION['messageKO'])) { echo "value='$prenom'"; } ?> />
									</p>
									<p>
										<label for="email">Email</label>
										<input type="text" name="email" id="email" size="30" <?php if (isset($_SESSION['messageKO'])) { echo "value='$email'"; } ?>/>
									</p>
									<p>
										<label for="objet">Objet</label>
										<!--<input type="text" name="objet" id="objet" size="30" />-->
										<select name="objet" id="objet" >
										  <option value="Question" <?php if (isset($_SESSION['messageKO']) && objet == "Question") { echo "selected"; } ?>>Question</option>
										  <option value="Inscription" <?php if (isset($_SESSION['messageKO']) && $objet == "Inscription") { echo "selected"; } ?>>Inscription</option>
										  <option value="Match amical" <?php if (isset($_SESSION['messageKO']) && $objet == "Match amical") { echo "selected"; } ?>>Match amical</option>
										  <option value="Partenariat" <?php if (isset($_SESSION['messageKO']) && $objet == "Partenariat") { echo "selected"; } ?>>Partenariat</option>
										</select>
									</p>
									
									<p><div class="g-recaptcha" data-sitekey="6LeDJikTAAAAAKF_QM6eq4rkUFHVHyem88svQtUc"></div></p>
									
								</fieldset>
								<fieldset>
									<p>
										<label for="message">Message</label>
										<textarea name="message" id="message" cols="30" rows="15"><?php if (isset($_SESSION['messageKO'])) { echo "$message"; } ?></textarea>
									</p>
								</fieldset>

								<p class="submit"><button type="submit">Envoyer</button></p>

							</form>

						</div>
						<div class="featured-main-joueur-bas">

						</div>
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

</body>
</html>
<?php
ob_end_flush();
?>