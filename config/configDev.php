<?php 
//Fichier de configuration pour accès à la base de données

//Database settings:


/* TEST local */
$db_host="localhost"; // Host name 
$db_login="root"; // Mysql username 
$db_password=""; // Mysql password 
$db_name="site"; // Database name 

//Administration:
$adm_login=""; //Votre login administrateur
$adm_pass=""; //Votre mot de passe administrateur
$adm_email="tsutter@assaintjulienlesmetz.com"; //Votre adresse e-mail

//Permettre le tag [IMG] [/IMG](VERSION 1.11 seulement)
$allowimgtag="all"; //admin : seulement l'administrateur et le moderateur - all : tout le monde.

//Ne modifiez cette ligne que si on vous le demande :)
$old=error_reporting(4);
?>