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
<a href="ActionAccueil.php">Acc�der directement au site</a>

<div class="anim">
<p class="titre">Site officiel de l'Association Sportive de Saint-Julien-l�s-Metz</p>
<img class="logo" src="images/ASSJLMVERT.png" alt="" onerror="this.removeAttribute('onerror'); this.src='images/ASSJLMBLANC.png'" onclick="document.location='ActionAccueil.php'" />
<p class="info">Cliquez sur l'image pour acc�der au site</p>
</div>

<script>
(function(w,d,s,i,n){w[n]=w[n]||{q:[],init:function(o){w[n].initOpts=o;},ready:function(c){w[n].q.push(c);}};
setTimeout(function(j,k){if(!d.getElementById(i)){k=d.getElementsByTagName(s)[0];j=d.createElement(s);j.id=i;
j.src="https://cdn.by.wonderpush.com/sdk/1.1/wonderpush-loader.min.js";k.parentNode.insertBefore(j,k);}},0);
}(window,document,"script","wonderpush-jssdk-loader","WonderPush"));

WonderPush.init({
    webKey: "75693edf678f57c0e05bcfa5eb80c65a1888c7ff7977f99eec1a7461b97237aa",
    optInOptions: {
        // Vous pouvez modifier ou traduire les cha�nes suivantes :
        externalBoxMessage: "Nous aimerions vous envoyer des notifications",
        externalBoxExampleTitle: "Notification exemple",
        externalBoxExampleMessage: "Ceci est un exemple de notification",
        externalBoxDisclaimer: "Vous pouvez vous d�sinscrire � n'importe quel moment.",
        externalBoxProcessingMessage: "Inscription en cours...",
        externalBoxSuccessMessage: "Merci de vous �tre inscrit !",
        externalBoxFailureMessage: "D�sol�, un probl�me est survenu.",
        externalBoxTooLongHint: "Mauvaise connexion ou navigation priv�e ?",
        externalBoxCloseHint: "Fermer",
        modalBoxMessage: "Recevez d�sormais nos news en temps r�el.<br/>Vous pouvez vous d�sinscrire � n'importe quel moment.",
        modalBoxButton: "J'ai compris !"
    }
});
</script>
</body>
</html>
<?php
ob_end_flush();
?>