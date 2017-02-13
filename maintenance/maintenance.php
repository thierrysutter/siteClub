<?php

// On indique aux robots que c'est une page de maintenance
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
// On leur dit de repasser dans 10 minutes
header('Retry-After: 600');


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Site en maintenance</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
        
        <style type="text/css" media="screen">@import url(http://fonts.googleapis.com/css?family=Parisienne);</style>
		<link href='http://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet' type='text/css'>
		<style type="text/css">
			body {
				background-color: #000;
				text-align: center;
				font-family: "Amaranth", "Lucida Grande", Tahoma, Arial, sans-serif;
				/*margin-top: 10vh;
				font-size: 2em;
				font-weight: bold;
				color: #fff;*/
			}
			
			/*.logo {
			    background : url("images/logo.png") no-repeat ;
			    text-align: center;
			}*/
			
	/*body {
		background-color: #000;
		text-align: right;
		font-family: "Amaranth", "Lucida Grande", Tahoma, Arial, sans-serif;
	}*/

	.anim {
		margin:150px auto;
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
		font-size: 20px;
	}
	</style>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    </head>
    <body>
    <div class="anim">
		<p class="titre">Site officiel de l'Association Sportive de Saint-Julien-lès-Metz</p>
		<p class="info">Maintenance en cours. Merci de reessayer dans quelques minutes.</p>
	</div>
    
    
	<!--<div class="anim">
		<p class="titre"><h1>Site officiel de l'Association Sportive de Saint-Julien-lès-Metz</h1></p>
		<p class="info"><h2>Ce site est temporairement indisponible pour une maintenance.</h2></p>
		<p class="info"><h5>Merci de réessayer plus tard.<br />Veuillez nous excuser du dérangement occasionné.</h5></h5></p>
		
		<div id="logo" class="logo" width="100px" height="200px">&nbsp;</div>
	</div>
	-->
	
	<div id="countdown">
	</div>
	</body>

</html>