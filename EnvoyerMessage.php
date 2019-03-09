<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramï¿½tre passï¿½.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelï¿½e dï¿½s qu'on instanciera une classe non dï¿½clarï¿½e.

$logger = new Logger('logs/');
ob_start();
session_start();

require_once("config/config.php");

require 'recaptchalib.php';
$siteKey = "6LeDJikTAAAAAKF_QM6eq4rkUFHVHyem88svQtUc"; // votre clé publique
$secret = "6LeDJikTAAAAABUEEpcrpF0pMsJNJ3b1nYcSHeLX"; // votre clé privée

// on vide les message en session
unset($_SESSION['messageOK']);
unset($_SESSION['messageKO']);

// S'il y des donnï¿½es de postï¿½es
if ($_SERVER['REQUEST_METHOD']=='POST') {

	// (1) Code PHP pour traiter l'envoi de l'email
	
	$nombreErreur = 0; // Variable qui compte le nombre d'erreur
	// Définit toutes les erreurs possibles
	if (!isset($_POST['nom'])) {
		$nombreErreur++;
		$erreur8 = '<p>Il y a un problème avec la variable "nom".</p>';
	} else {
		if (empty($_POST['nom'])) {
			$nombreErreur++;
			$erreur9 = '<p>Vous avez oublié de renseigner votre nom.</p>';
		}
	}
	
	if (!isset($_POST['prenom'])) {
		$nombreErreur++;
		$erreur10 = '<p>Il y a un problï¿½me avec la variable "prenom".</p>';
	} else {
		if (empty($_POST['prenom'])) {
			$nombreErreur++;
			$erreur11 = '<p>Vous avez oubliï¿½ de renseigner votre prï¿½nom.</p>';
		}
	}
	
	
	if (!isset($_POST['email'])) { // Si la variable "email" du formulaire n'existe pas (il y a un problï¿½me)
		$nombreErreur++; // On incrï¿½mente la variable qui compte les erreurs
		$erreur1 = '<p>Il y a un problï¿½me avec la variable "email".</p>';
	} else { // Sinon, cela signifie que la variable existe (c'est normal)
		if (empty($_POST['email'])) { // Si la variable est vide
			$nombreErreur++; // On incrï¿½mente la variable qui compte les erreurs
			$erreur2 = '<p>Vous avez oubliï¿½ de donner votre email.</p>';
		} else {
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$nombreErreur++; // On incrï¿½mente la variable qui compte les erreurs
				$erreur3 = '<p>Cet email ne ressemble pas un email.</p>';
			}
		}
	}
	
// 	if (!isset($_POST['objet'])) {
// 		$nombreErreur++;
// 		$erreur12 = '<p>Il y a un problï¿½me avec la variable "objet".</p>';
// 	} else {
// 		if (empty($_POST['objet'])) {
// 			$nombreErreur++;
// 			$erreur13 = '<p>Vous avez oubliï¿½ de renseigner un objet.</p>';
// 		}
// 	}
	
	if (!isset($_POST['message'])) {
		$nombreErreur++;
		$erreur4 = '<p>Il y a un problème avec la variable "message".</p>';
	} else {
		if (empty($_POST['message'])) {
			$nombreErreur++;
			$erreur5 = '<p>Vous avez oublié de donner un message.</p>';
		}
	} // (3) Ici, il sera possible d'ajouter plus tard un code pour vï¿½rifier un captcha anti-spam.
	
// 	if (!isset($_POST['captcha'])) {
// 		$nombreErreur++;
// 		$erreur6 = '<p>Il y a un problï¿½me avec la variable "captcha".</p>';
// 	} else {
// 		if ($_POST['captcha']!=4) {
// 			// Vï¿½rifier que le rï¿½sultat de l'ï¿½quation est ï¿½gal ï¿½ 4
// 			$nombreErreur++;
// 			$erreur7 = '<p>Dï¿½solï¿½, le captcha anti-spam est erronï¿½.</p>';
// 		}
// 	}

// 	if(isset($_POST['g-recaptcha-response'])){
// 		$captcha=$_POST['g-recaptcha-response'];
// 	}
// 	if(!$captcha){
// 		echo '<h2>Please check the the captcha form.</h2>';
// 		exit;
// 	}
// 	$secretKey = "6LeDJikTAAAAABUEEpcrpF0pMsJNJ3b1nYcSHeLX";
// 	$ip = $_SERVER['REMOTE_ADDR'];
// 	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
// 	$responseKeys = json_decode($response,true);
// 	if(intval($responseKeys["success"]) !== 1) {
// 		echo '<h2>You are spammer ! Get the fuck out</h2>';
// 	} else {
// 		echo '<h2>Thanks for posting comment.</h2>';
// 	}
	
	$reCaptcha = new ReCaptcha($secret);
	if(isset($_POST["g-recaptcha-response"])) {
		$resp = $reCaptcha->verifyResponse(
				$_SERVER["REMOTE_ADDR"],
				$_POST["g-recaptcha-response"]
				);
		if ($resp != null && $resp->success) {echo "CAPTCHA OK";}
		else {echo "CAPTCHA incorrect";}
	}
	
	
	//$civilite = htmlentities($_POST['civilite']); // htmlentities() convertit des caractï¿½res "spï¿½ciaux" en ï¿½quivalent HTML
	$nom = htmlentities($_POST['nom']);
	$prenom = htmlentities($_POST['prenom']);
	$email = htmlentities($_POST['email']);
	//$objet = htmlentities($_POST['objet']);
	$message = htmlentities($_POST['message']);
	//$destinataire = htmlentities($_POST['destinataire']);
	$destinataire = $adm_email;
	
	$origine = htmlentities($_POST['origine']);
	
	if ($nombreErreur==0) { // S'il n'y a pas d'erreur
		// Ici il faut ajouter tout le code pour envoyer l'email.
		// Dans le code prï¿½sentï¿½ au chapitre prï¿½cï¿½dent, cela signifie au code entre les commentaires (1) et (2).
		// Rï¿½cupï¿½ration des variables et sï¿½curisation des donnï¿½es
		
		// Variables concernant l'email
		if ($destinataire == null) {
			$destinataire = 'sutter.thierry@gmail.com'; // Adresse email du webmaster (ï¿½ personnaliser)
		}

		//$sujet = 'Titre du message'; // Titre de l'email
		$contenu = '<html><head><title>Titre du message</title></head><body>';
		$contenu .= '<p>Bonjour, vous avez reçu un message de'.$prenom.' '.$nom.'</p>';
		$contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
		$contenu .= '<p><strong>Message</strong>:<br/><br/>'.$message.'</p>';
		$contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)
		
		// Pour envoyer un email HTML, l'en-tï¿½te Content-type doit ï¿½tre dï¿½fini
		$boundary = "-----=".md5(rand());
		$headers = 'MIME-Version: 1.0'."\r\n";
		//$headers .= "Content-Type: multipart/alternative; charset=iso-8859-15"."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-15'."\r\n";
		$headers .= "From: \"".$email."\"<".$email.">"."\r\n";
		$headers .= "Reply-to: \"".$email."\" <".$email.">"."\r\n";
		
		
		// Envoyer l'email
		if ($objet== null) {
			$objet = "Formulaire de contact";
		}
		mail($destinataire, $objet, $contenu, $headers); // Fonction principale qui envoi l'email
		
		// (2) Fin du code pour traiter l'envoi de l'email
		
		$messageOK="<h2>Message envoyé !</h2>";
		$_SESSION['messageOK'] = $messageOK;
	} else { // S'il y a un moins une erreur
		$messageKO = '<div style="border:1px solid #ff0000; padding:5px;">';
		$messageKO = $messageKO.'<p style="color:#ff0000;">Désolé, il y a eu '.$nombreErreur.' erreur(s). Voici le détail des erreurs:</p>';
		if (isset($erreur8)) $messageKO = $messageKO.'<p>'.$erreur8.'</p>';
		if (isset($erreur9)) $messageKO = $messageKO.'<p>'.$erreur9.'</p>';
		if (isset($erreur10)) $messageKO = $messageKO.'<p>'.$erreur10.'</p>';
		if (isset($erreur11)) $messageKO = $messageKO.'<p>'.$erreur11.'</p>';
		if (isset($erreur12)) $messageKO = $messageKO.$messageKO = $messageKO.'<p>'.$erreur12.'</p>';
		if (isset($erreur13)) $messageKO = $messageKO.'<p>'.$erreur13.'</p>';
		
		if (isset($erreur1)) $messageKO = $messageKO.'<p>'.$erreur1.'</p>';
		if (isset($erreur2)) $messageKO = $messageKO.'<p>'.$erreur2.'</p>';
		if (isset($erreur3)) $messageKO = $messageKO.'<p>'.$erreur3.'</p>';
		if (isset($erreur4)) $messageKO = $messageKO.'<p>'.$erreur4.'</p>';
		if (isset($erreur5)) $messageKO = $messageKO.'<p>'.$erreur5.'</p>';
		// (4) Ici, il sera possible d'ajouter un code d'erreur supplï¿½mentaire si un captcha anti-spam est erronï¿½.
		if (isset($erreur6)) $messageKO = $messageKO.'<p>'.$erreur6.'</p>';
		if (isset($erreur7)) $messageKO = $messageKO.'<p>'.$erreur7.'</p>';
		$messageKO = $messageKO.'</div>';
		
		$_SESSION['nom'] = $nom;
		$_SESSION['prenom'] = $prenom;
		//$_SESSION['civilite'] = $civilite;
		$_SESSION['email'] = $email;
		//$_SESSION['objet'] = $objet;
		$_SESSION['message'] = $message;
		$_SESSION['messageKO'] = $messageKO;
	}
	$_SESSION['retour']=1;
	
	if ($origine != "contact") {
		echo "Message envoyé !";
	} else {
		header("Location: contact.php");
	}
}