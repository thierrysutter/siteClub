<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans AfficherPopupParcours.php", Logger::GRAN_MONTH);

ob_start();
session_start();

require_once("config/config.php");

try {
	$idMembre = $_POST['id'];
	
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	$manager = new ManagerParcours($connexionBdd->getPDO());
	
	
	$parcours = $manager->trouverParcoursParId($idMembre);
	$texte = "<ul>";
	foreach ($parcours as $club) {
		$texte .= "<li>".$club->getClub()."</li>";
	}
	$texte .= "</ul>";
	echo $texte;
	/*$reponse = array('titre' =>  utf8_encode($article->getTitre()), 'photo' => $article->getPhoto(), 'texte' => utf8_encode($article->getTexte()));
		echo json_encode($reponse);*/
} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>