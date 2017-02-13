<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans RechercherArticle.php", Logger::GRAN_MONTH);

ob_start();
session_start();
$user = null;
if (isset($_SESSION['session_started'])) {
	// une session est ouverte, on récupère le login de l'utilisateur connecté
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	} else {
		// redirection vers la page d'accueil avec deconnexion pour + de sécurité
		header("Location: ActionAccueil.php");
	}
} else {
  // redirection vers la page d'accueil avec deconnexion pour + de sécurité
  header("Location: ActionAccueil.php");
}
require_once("config/config.php");

try {
	unset($_SESSION['messageKO']);
	unset($_SESSION['messageOK']);
	unset($_SESSION['article']);


	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	$mode = $_GET['mode'];
	$idArticle = $_GET['id'];
	$manager = new ManagerArticle($connexionBdd->getPDO());
	$article = $manager->trouverParId($idArticle);
	$_SESSION['article'] = $article;
	$_SESSION['modifArticle'] = ($mode=="modif" ? 1 : 0);

	if ($mode == "popup") {
		$reponse = array('titre' =>  ($article->getTitre()), 'photo' => $article->getPhoto(), 'texte' => ($article->getTexte()));
		echo json_encode($reponse);
	} else if ($mode == "modif"){
		header("Location: modificationArticle.php");
	} else if ($mode == "visu"){
		header("Location: modificationArticle.php");
	}

} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>