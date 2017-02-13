<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans AfficherPopupArticle.php", Logger::GRAN_MONTH);

ob_start();
session_start();

require_once("config/config.php");

try {
	$idArticle = $_POST['id'];

	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	$manager = new ManagerArticle($connexionBdd->getPDO());
	$article = $manager->trouverParId($idArticle);


	/*$reponse = array('titre' =>  utf8_encode($article->getTitre()),
					 'texte' => utf8_encode($article->getTexte())
			);

	$reponse = array(
		array('titre' => utf8_encode($article->getTitre()), 'texte' => utf8_encode($article->getTexte()), 'photo' => utf8_encode($article->getPhoto()))
	);

	foreach ($article->getListePhotos() as $photo) {
		array_push($reponse, $photo->getPhoto());
	}*/

	$data = array();
	$data["titre"]  = utf8_encode($article->getTitre());
	$data["texte"]  = utf8_encode($article->getTexte());
	$data["nbPhotos"] = count($article->getListePhotos());

	foreach ($article->getListePhotos() as $photo) {
		$data["photos"][] = $photo->getPhoto();
	}


	echo json_encode( $data );
} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>