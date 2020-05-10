<?php 

function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans ActionContact.php", Logger::GRAN_MONTH);

ob_start();
session_start();

require_once("config/config.php");

header("Location: contact.php");

ob_end_flush();
?>