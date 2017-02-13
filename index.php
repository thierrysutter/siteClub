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
	<!-- Google Analytics Content Experiment code ->
<script>function utmx_section(){}function utmx(){}(function(){var
k='97619152-0',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>
<-- End of Google Analytics Content Experiment code -->
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

	<!--<style type="text/css">
	body {
		background-color: #000;
		text-align: right;
		font-family: "Amaranth", "Lucida Grande", Tahoma, Arial, sans-serif;
	}

	.anim {
		margin: 20px auto;
		text-align: center;
	}

	.logo{
		width:1%;
		height:1%;
		opacity:0.3;
		/*border:2px solid black;*/
	}

	@keyframes zoomInPhoto{
		0% {width:1%; height:1%; opacity:0.3;}
		/*50% {width:50%; height:50%; opacity:0.7}
		100% {width:70%; height:70%; opacity:1;}*/
		50% {width:10%; height:10%; opacity:0.6}
		100% {width:20%; height:20%; opacity:1}
	}

	@-moz-keyframes zoomInPhoto{
		0% {width:1%; height:1%; opacity:0.3;}
		/*50% {width:50%; height:50%; opacity:0.7}
		100% {width:70%; height:70%; opacity:1;}*/
		50% {width:10%; height:10%; opacity:0.6}
		100% {width:20%; height:20%; opacity:1}
	}

	@-webkit-keyframes zoomInPhoto{
		0% {width:1%; height:1%; opacity:0.3;}
		/*50% {width:50%; height:50%; opacity:0.7}
		100% {width:70%; height:70%; opacity:1;}*/
		50% {width:10%; height:10%; opacity:0.6}
		100% {width:20%; height:20%; opacity:1}
	}

	@-o-keyframes zoomInPhoto{
		0% {width:1%; height:1%; opacity:0.3;}
		/*50% {width:50%; height:50%; opacity:0.7}
		100% {width:70%; height:70%; opacity:1;}*/
		50% {width:10%; height:10%; opacity:0.6}
		100% {width:20%; height:20%; opacity:1}
	}
	/*enlever :hover pour que ça se fasse automatiquement*/
	.logo{
		animation: zoomInPhoto 4s 1 linear;
		-moz-animation: zoomInPhoto 4s 1 linear;
		-webkit-animation: zoomInPhoto 4s 1 linear;
		-o-animation: zoomInPhoto 4s 1 linear;
		width:20%;
		height:20%;
		opacity:1;
		cursor:pointer;

	}

	@-webkit-keyframes effetsTexte {
		from { opacity:0.1; color: #000;}
	    50%  { opacity:0.5; color: #888;}
	    to   { opacity:1.0; color: #fff;}
	}
	@-moz-keyframes effetsTexte {
		from { opacity:0.1; color: #000;}
	    50%  { opacity:0.5; color: #888;}
	    to   { opacity:1.0; color: #fff;}
	}
	@-ms-keyframes effetsTexte {
		from { opacity:0.1; color: #000;}
	    50%  { opacity:0.5; color: #888;}
	    to   { opacity:1.0; color: #fff;}
	}
	@-o-keyframes effetsTexte {
		from { opacity:0.1; color: #000;}
	    50%  { opacity:0.5; color: #888;}
	    to   { opacity:1.0; color: #fff;}
	}
	@keyframes effetsTexte {
		from { opacity:0.1; color: #000;}
	    50%  { opacity:0.5; color: #888;}
	    to   { opacity:1.0; color: #fff;}
	}
	p.titre {
		/*font-size: 2em;*/
		font-size: 40px;
		font-weight: bold;
		color: #000;
		opacity:0.1;
	}
	p.titre {
		-webkit-animation: effetsTexte 4s linear 0.5s;
		-moz-animation: effetsTexte 4s linear 0.5s;
		-ms-animation: effetsTexte 4s linear 0.5s;
		-o-animation: effetsTexte 4s linear 0.5s;
		animation: effetsTexte 4s linear 0.5s;
		-webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        -ms-animation-fill-mode: forwards;
        -o-animation-fill-mode: forwards;
        animation-fill-mode: forwards;

	}

	p.info {
		font-size: 30px;
		font-weight: normal;
	}
	p.info {
		-webkit-animation: effetsTexte 1s linear 4s;
		-moz-animation: effetsTexte 1s linear 4s;
		-ms-animation: effetsTexte 1s linear 4s;
		-o-animation: effetsTexte 1s linear 4s;
		animation: effetsTexte 1s linear 4s;
		-webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        -ms-animation-fill-mode: forwards;
        -o-animation-fill-mode: forwards;
        animation-fill-mode: forwards;

	}

	a {
		text-decoration: none;
		color: #fff;
		font-size: 18px;
	}
	</style>-->

</head>
<body>

<?php include_once("analyticstracking.php"); ?>
<a href="ActionAccueil.php">Accéder directement au site</a>

<div class="anim">
<p class="titre">Site officiel de l'Association Sportive de Saint-Julien-lès-Metz</p>
<img class="logo" src="images/logo.svg" alt="" onerror="this.removeAttribute('onerror'); this.src='images/logo.png'" onclick="document.location='ActionAccueil.php'" />
<p class="info">Cliquez sur l'image pour accéder au site</p>
</div>

</body>
</html>
<?php
ob_end_flush();
?>