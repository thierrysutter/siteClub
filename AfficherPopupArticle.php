<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entr�e dans AfficherPopupArticle.php", Logger::GRAN_MONTH);

ob_start();
session_start();

require_once("config/config.php");

try {
	$idArticle = $_POST['id'];
	$data = array();

	$data["idArticle"] = $idArticle;

	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	$manager = new ManagerArticle($connexionBdd->getPDO());
	$article = $manager->trouverParId($idArticle);
	$data["titre"]  = ($article->getTitre());
	$data["texte"]  = ($article->getTexte());
	//echo json_encode( $data );
	if ($article != null) {



		if ($article->getListePhotos()!=null && count($article->getListePhotos()) > 0) {
			$data["nbPhotos"] = count($article->getListePhotos());
			foreach ($article->getListePhotos() as $photo) {
				$data["photos"][] = $photo->getPhoto();
			}
		} else {
			$data["photos"][] = "";
		}
		echo json_encode( $data );
	} else {
		echo json_encode( "ERREUR" );
	}

} catch (PDOException $error) { // Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>