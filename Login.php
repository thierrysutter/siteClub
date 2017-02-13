<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans Login.php", Logger::GRAN_MONTH);

ob_start();

session_start();

if (isset($_SESSION['session_started'])) {
	// si une session est déjà ouverte, on la ferme
	session_destroy();

	/*
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}*/
	$_SESSION = array();
}

require_once("config/config.php");

// connexion avec la base de données
try {

	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	
	$login = $_POST[login];
	// hachage du mot de passe
	$password = hash('sha256', $_POST[password]);
	$manager = new ManagerUtilisateur($connexionBdd->getPDO());

	if ($manager->exists($login, $password)) { // login trouvé

		$logger->log('info', 'infos', "Authentification de ".$login.".", Logger::GRAN_MONTH);
		// mise Ã  jour de la date de dernière connexion
		$manager->updateDerniereConnexion($login);
		// Mise en session
		setcookie("login",$login); // genere un cookie contenant le login du utilisateur
		$_SESSION['login'] = $login;
		$_SESSION['session_started'] = "session_started";
		$_SESSION['user'] = $manager->get($login);;
		//header("Location: RechercherComptesUtilisateur.php");
		echo "1";
	} else {
		$logger->log('erreur', 'erreurs', "Erreur lors de l'authentification de ".$login.".", Logger::GRAN_MONTH);
		//echo "Login ou mot de passe incorrect"."<br>";
		$_SESSION['messageKO'] = "Mauvais login ou mot de passe.";
		//header("Location: index.php");
		echo "0";
	}


} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}




?>