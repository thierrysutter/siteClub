<!DOCTYPE html>  
<html lang="fr">  
	<head>  
    <meta charset="windows-1252">
	  <title>Prochainement...</title> 
	  
	  <!-- include -->
		<link rel="stylesheet" href="../style.css" />	
		<link rel="icon" href="favicon.ico">
				
		<!-- Our CSS stylesheet file -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
    <link rel="stylesheet" href="assets/countdown/jquery.countdown.css" />
    
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- JavaScript includes -->
			<script src="js/jquery/jquery.min.js"></script>
			<script src="assets/countdown/jquery.countdown.js"></script>
			<script src="assets/js/script.js"></script>
			
			
			
			
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
		margin: 150px auto;
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
		50% {width:7%; height:7%; opacity:0.6}
		100% {width:15%; height:15%; opacity:1}
	}

	@-moz-keyframes zoomInPhoto{
		0% {width:1%; height:1%; opacity:0.3;}
		/*50% {width:50%; height:50%; opacity:0.7}
		100% {width:70%; height:70%; opacity:1;}*/
		50% {width:7%; height:7%; opacity:0.6}
		100% {width:15%; height:15%; opacity:1}
	}

	@-webkit-keyframes zoomInPhoto{
		0% {width:1%; height:1%; opacity:0.3;}
		/*50% {width:50%; height:50%; opacity:0.7}
		100% {width:70%; height:70%; opacity:1;}*/
		50% {width:7%; height:7%; opacity:0.6}
		100% {width:15%; height:15%; opacity:1}
	}

	@-o-keyframes zoomInPhoto{
		0% {width:1%; height:1%; opacity:0.3;}
		/*50% {width:50%; height:50%; opacity:0.7}
		100% {width:70%; height:70%; opacity:1;}*/
		50% {width:7%; height:7%; opacity:0.6}
		100% {width:15%; height:15%; opacity:1}
	}
	/*enlever :hover pour que �a se fasse automatiquement*/
	.logo{
		animation: zoomInPhoto 4s linear 1;
		-moz-animation: zoomInPhoto 4s linear 1;
		-webkit-animation: zoomInPhoto 4s linear 1;
		-o-animation: zoomInPhoto 4s linear 1;
		width:15%;
		height:15%;
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
	p.intro {
		-webkit-animation: effetsTexte 1s linear 5s;
		-moz-animation: effetsTexte 1s linear 5s;
		-ms-animation: effetsTexte 1s linear 5s;
		-o-animation: effetsTexte 1s linear 5s;
		animation: effetsTexte 1s linear 5s;
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
		<p class="titre">Site officiel de l'Association Sportive de Saint-Julien-l&egrave;s-Metz</p>
		<p class="info">Prochainement .....</p>
		</div>
		
		<div class="center">
			<div id="countdown"></div>
			<p class="info intro" id="note"></p>
		</div>
		
		<div><img class="logo" src="images/logo.svg" alt="" onerror="this.removeAttribute('onerror'); this.src='images/logo.png'" style="width: 15%;height: 15%;"/></div>	
  </body>  
</html>  