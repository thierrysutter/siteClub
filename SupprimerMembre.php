<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
ob_start();
session_start();
$user = null;
if (isset($_SESSION['session_started'])) {
	// une session est ouverte, on r�cup�re le login de l'utilisateur connect�
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	} else {
		// redirection vers la page d'accueil avec deconnexion pour + de s�curit�
		header("Location: Deconnexion.php");
	}
} else {
  // redirection vers la page d'accueil avec deconnexion pour + de s�curit�
  header("Location: Deconnexion.php");
}

require_once("config/config.php");

// connexion avec la base de donn�es
try {
	unset($_SESSION['messageKO']);
	unset($_SESSION['messageOK']);
	
	$filtreCategorie = isset($_GET['filtreCategorie']) ? $_GET['filtreCategorie'] : -1;
	$filtreNom = isset($_GET['filtreNom']) ? $_GET['filtreNom'] : "";
	$filtreFonction = isset($_GET['filtreFonction']) ? $_GET['filtreFonction'] : -1;
	$filtrePoste = isset($_GET['filtrePoste']) ? $_GET['filtrePoste'] : -1;
	
	$idMembre = $_GET['id'];
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	$managerMembre = new ManagerMembre($connexionBdd->getPDO());
	$managerMembre->supprimerMembre($idMembre);
	
	header("Location: ActionMembre.php?methode=suprression&filtreCategorie=".$filtreCategorie."&filtreFonction=".$filtreFonction."&filtrePoste=".$filtrePoste."&filtreNom=".$filtreNom);

} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>