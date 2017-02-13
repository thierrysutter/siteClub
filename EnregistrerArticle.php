<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
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

// connexion avec la base de données
try {
	unset($_SESSION['messageKO']);
	unset($_SESSION['messageOK']);

	// Constantes
	define('TARGET', 'images/article/'); // Repertoire cible
	define('TARGET_VIGNETTE', 'images/article/vignette/'); // Repertoire cible vignette
	define('TARGET_MOYEN', 'images/article/moyen/'); // Repertoire cible vignette
	define('TARGET_TMP', 'images/article/tmp/'); // Repertoire cible
	define('MAX_SIZE', 100000); // Taille max en octets du fichier
	define('WIDTH_MAX', 800); // Largeur max de l'image en pixels
	define('HEIGHT_MAX', 800); // Hauteur max de l'image en pixels
	// Tableaux de donnees
	$tabExt = array('jpg','gif','png','jpeg'); // Extensions autorisees
	$infosImg = array();

	// Variables
	$extension = '';
	$message = '';
	$nomImage = '';
	$upload = False;

	/************************************************************
	 * Creation du repertoire cible si inexistant
	 *************************************************************/
	if( !is_dir(TARGET) ) {
		if( !mkdir(TARGET, 0755) ) {
			exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
		}
	}

	/************************************************************
	* Script d'upload
	*************************************************************/
	if(!empty($_POST)) {
		$methode = $_POST['methode'];

		$titre = $_POST['titre'];
		$texte = $_POST['texte'];

		if ($methode == "create") {
			/*
			$photo = $_FILES['photo']['name'];
			// On verifie si le champ est rempli
			if( !empty($_FILES['photo']['name']) ) {

				// Recuperation de l'extension du fichier
				$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

				// On verifie l'extension du fichier
				if(in_array(strtolower($extension),$tabExt)) {

					// On recupere les dimensions du fichier
					$infosImg = getimagesize($_FILES['photo']['tmp_name']);
					// On verifie le type de l'image
					if($infosImg[2] >= 1 && $infosImg[2] <= 14) {
						// On verifie les dimensions et taille de l'image
						//if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['photo']['tmp_name']) <= MAX_SIZE)) {

							// Parcours du tableau d'erreurs
							if(isset($_FILES['photo']['error']) && UPLOAD_ERR_OK === $_FILES['photo']['error']) {
								// On renomme le fichier
								//$nomImage = md5(uniqid()) .'.'. $extension;
								// Si c'est OK, on teste l'upload
								if(move_uploaded_file($_FILES['photo']['tmp_name'], TARGET.$_FILES['photo']['name'])) {
									move_uploaded_file($_FILES['photo']['tmp_name'], TARGET_MOYEN.$_FILES['photo']['name']);
									move_uploaded_file($_FILES['photo']['tmp_name'], TARGET_VIGNETTE.$_FILES['photo']['name']);
									$message = 'Upload réussi !';
									$upload = True;
								} else {
									// Sinon on affiche une erreur systeme
									$message = 'Problème lors de l\'upload !';
								}
							}
							else {
								$message = 'Une erreur interne a empêché l\'uplaod de l\'image';
							}
					}
					else
					{
					// Sinon erreur sur le type de l'image
					$message = 'Le fichier à uploader n\'est pas une image !';
					}
				}
				else
				{
				// Sinon on affiche une erreur pour l'extension
				$message = 'L\'extension du fichier est incorrecte !';
				}
			}
			else {
				// Sinon on affiche une erreur pour le champ vide
				$message = 'Veuillez remplir le formulaire svp !';
			}*/


			// on parcourt le dossier images/article/tmp
			// s'il est vide, erreur car au moins une photo est obligatoire
			// sinon on copie les fichiers du dossier tmp dans les différents dossiers artciles vignette et moyen
			// on termine en vidant le dossier tmp
			$listePhotos = array();
			$nb_fichier = 0;
			if($dossier = opendir(TARGET_TMP)) {
				while(false !== ($fichier = readdir($dossier))) {
					if($fichier != '.' && $fichier != '..' && $fichier != 'index.php') {
						//echo $fichier."<br>";
						$nb_fichier++; // On incrémente le compteur de 1
						$listePhotos[] = $fichier;

						// on déplace le fichier
						//deplacement du fichier
						$temp = TARGET_TMP.$fichier;
						$dest = TARGET.$fichier;
						$data = copy($temp,$dest);
						$dest_moyen = TARGET_MOYEN.$fichier;
						$data = copy($temp,$dest_moyen);
						$dest_vignette = TARGET_VIGNETTE.$fichier;
						$data = rename($temp,$dest_vignette);

					}
				} // On termine la boucle
				closedir($dossier);
 			} else
				echo 'Le dossier n\' a pas pu être ouvert';

			if ($nb_fichier > 0) {
				// insertion de l'article en base
				$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
				$managerArticle = new ManagerArticle($connexionBdd->getPDO());
				//$managerArticle->ajouterArticle(addslashes($titre), addslashes($texte), $_FILES['photo']['name'], $user->getLogin());
				//$managerArticle->ajouterArticle(($titre), ($texte), $_FILES['photo']['name'], $user->getLogin());
				$managerArticle->ajouterArticle($titre, addslashes($texte), $listePhotos, strtoupper($user->getLogin()));
			}

		} else if ($methode == "modif") {
			$id = $_POST['id'];
			$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
			$managerArticle = new ManagerArticle($connexionBdd->getPDO());
			//$managerArticle->majArticle($id, addslashes($titre), addslashes($texte), $user->getLogin());
			$managerArticle->majArticle($id, $titre, addslashes($texte), strtoupper($user->getLogin()));
		}

	}


	header("Location: ActionArticle.php");

} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>