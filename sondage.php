<?php
?>
<h2>Sondage</h2>
<!--
<script type="text/javascript" src="http://www.lasonde.fr/wp-content/plugins/lasonde/LSD_core/js/lasonde_sondages_min.js"></script>
<script type="text/javascript">
lsd_sondage_5127 = {
"bloc_name":"LSD_sondages_6651_9450512547100894",
"sd_id": "5127",
"css_id": "348",
"tween":"0"
};
LSD_init_conteneur(lsd_sondage_5127);
</script>
-->
<div id="sondage" >
<?php
	$titre = 'sondage'; // = nom du fichier dans lequel est stocké les votes
	$question = 'Tournoi de sixte séniors en 2014 ?'; //  La question ici
	$reponse[1] = 'Et comment !'; // Premier choix de réponse
	$reponse[2] = 'Non merci'; // Deuxième choix de réponse
    /*$reponse[3] = 'Refonte de mon site'; // Les autres choix de réponse sont facultative.
    $reponse[4] = 'Mise à nivaux';
	$reponse[5] = 'Curiosité';
	$reponse[6] = 'Préparer mon avenir';*/

	$nb_max_votes = 1; // 0 si illimité
     // MODIFICATION DU SONDAGE
     $choix = count($reponse);
     if (isset($_GET['vote']))
     {
     $resultats = fopen("$titre.txt", "r+");
     $vote = $_GET['vote'];
     for ($numero = 1; $numero <= $choix; $numero ++)
     {
     $ligne[$numero] = (int) fgets($resultats);
     if ($numero == $vote)
     {
     $ligne[$numero] ++;
     }
     if (isset($donnees_votes))
     {
     $donnees_votes = $donnees_votes . "\n" . $ligne[$numero];
     $nb_votes += $ligne[$numero]; // comptage du nombre de votes
     }
     else
     {
     $donnees_votes = $ligne[$numero];
     $nb_votes = (int) $ligne[$numero];
     }
     }
     fseek ($resultats, 0);
     if($nb_votes<=$nb_max_votes OR $nb_max_votes==1)
     fputs ($resultats, $donnees_votes); // écriture des données

     fclose($resultats);
     }
     // Lecture du sondage
     $resultats = fopen("$titre.txt", "r");

     $numero = 1;
     while ($numero <= $choix) // attribution d'un nombre pour chaque vote à l'array $resultat[]
     {
     $resultat[$numero] = fgets($resultats);
     if ($resultat[$numero] == NULL) // on remplace les lignes vides du fichier txt par 0
     {
     $resultat[$numero] = 1;
     }
     $numero ++;
     }

     $total_votes = 0; // calcul du total des votes
     foreach($resultat as $nb_resultat) $total_votes += $nb_resultat;
     if ($total_votes == 0) // éviter la division par 0
     {
     $total_votes = 1;
     }
     $numero = 1;
     while ($numero <= $choix) // transformation du nombre de vote en pourcentages
     {
     $pourcentage[$numero] = $resultat[$numero] / $total_votes * 100;
     $numero ++;
     }

     $long_max_bloc = 120; // longueur maximale du curseur pour un vote en pixels

     // affichage des barres et du nombre de votes
     $numero = 1;
     echo ('<div class="titresondage" >'. $question . '</div><br /><form action=""> ');
     while ($numero <= $choix)
     {
     echo ('<div class="choix"><label><input type="radio" name="vote" value="' . $numero . '" />'. $reponse[$numero] .'</label>
     <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/bg-red.jpg" height="10" width="' . $pourcentage[$numero] / 100 * $long_max_bloc . '"
     alt="'.round($pourcentage[$numero]).'%" />&nbsp;&nbsp;<span style="font-size:70%;"><strong>' . $resultat[$numero] . ' votes</strong></span></div>');

     // echo ($pourcentage[$numero] . '%');
     $numero ++;
     }
     echo ('<div><br /><input type="submit" class="submit" value="" />');
     echo ('</div></form>');
     fclose($resultats);
?>
</div>