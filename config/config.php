<?php
//Fichier de configuration pour acc�s � la base de donn�es

//Database settings:


/* PROD
 $db_host="tsutter.assaintjulienlesmetz.com"; //Adresse du serveur
 $db_login="tsutter"; //Login sur la bdd
 $db_password="lxyr4kb5"; //Mot de passe de la bdd
 $db_name="tsutter"; //Nom de la bdd � utiliser
 */
/* TEST local */
$db_host="localhost"; // Host name
$db_login="root"; // Mysql username
$db_password=""; // Mysql password
$db_name="tsutter"; // Database name

//Administration:
$adm_login=""; //Votre login administrateur
$adm_pass=""; //Votre mot de passe administrateur
$adm_email="thierry.sutter@assaintjulienlesmetz.com"; //Votre adresse e-mail

//Permettre le tag [IMG] [/IMG](VERSION 1.11 seulement)
$allowimgtag="all"; //admin : seulement l'administrateur et le moderateur - all : tout le monde.

//Ne modifiez cette ligne que si on vous le demande :)
$old=error_reporting(4);
?>