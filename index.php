<?php
ob_start();
session_start();
if (isset($_SESSION['session_started'])) {
	session_unset();
	session_destroy();
	//exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title></title>
	<META HTTP-EQUIV="Expires" CONTENT="Jeu, 31 Dec 2015 23:59:59 GMT" >
	<meta name="Description" content="Phrases pertinentes" />
	<meta name="Keywords" content="Mots pertinent" />
	<meta charset="iso-8859-15" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script async src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

	<style type="text/css" media="screen">@import url(http://fonts.googleapis.com/css?family=Parisienne);</style>
	<link href='http://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/fondu.css" type="text/css" media="all" />

</head>
<body>

<?php include_once("analyticstracking.php"); ?>
<a href="ActionAccueil.php">Accéder directement au site</a>

<div class="anim">
<p class="titre">Site officiel de l'Association Sportive de Saint-Julien-lès-Metz</p>
<img class="logo" src="images/ASSJLMVERT.png" style="background-color: white;" alt="" onerror="this.removeAttribute('onerror'); this.src='images/ASSJLMBLANC.png'" onclick="document.location='ActionAccueil.php'" />
<p class="info">Cliquez sur l'image pour accéder au site</p>
</div>
</body>
</html>
<?php
ob_end_flush();
?>