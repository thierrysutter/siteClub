-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Client :  tsutter.sql-pro.online.net
-- Généré le :  Mer 13 Septembre 2017 à 17:44
-- Version du serveur :  5.5.53-0ubuntu0.14.04.1dargor1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tsutter`
--
CREATE DATABASE IF NOT EXISTS `tsutter` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `tsutter`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `TITRE` varchar(100) NOT NULL,
  `TEXTE` text NOT NULL,
  `PHOTO` varchar(100) NOT NULL,
  `VIDEO` varchar(100) NOT NULL,
  `LIEN` varchar(100) NOT NULL,
  `STATUT` smallint(6) NOT NULL,
  `DATE_PARUTION` datetime NOT NULL,
  `AUTEUR` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `TITRE`, `TEXTE`, `PHOTO`, `VIDEO`, `LIEN`, `STATUT`, `DATE_PARUTION`, `AUTEUR`, `DERNIERE_MAJ`) VALUES
(1, 'Tournoi à Besançon pour les U13', 'Les jeunes U13 du club en tournoi à Besançon pendant le xeek end de la Pentecote.\r\nOn a passé un super week-end\r\n\r\n\r\nEt les U11 souhaiteraient en faire autant pour 2015', '', '', '', 0, '2014-10-04 14:45:00', 'TSUTTER', '2015-05-05 16:06:19'),
(2, 'Coupe de Moselle', 'Les séniors A finaliste de la coupe de Moselle 2014. L\'équipe B s\'est quant à elle inclinée en 1/2 finale de la coupe des équipes réserves.', '', '', '', 0, '2014-10-04 14:45:30', 'TSUTTER', '2015-05-05 16:06:21'),
(3, 'Séniors B', 'Les séniors B montent en 2ème division de district.', '', '', '', 0, '2014-10-04 14:46:00', 'TSUTTER', '2015-05-05 16:06:23'),
(4, 'Montée en PHR', 'Après leur victoire contre le CO Metz ce dimanche en championnat, l\\\'équipe première du club est assurée de retrouvez la promotion d\\\'honneur régionale la saison prochaine.\r\nBravo à tous les joueurs et au staff pour leur travail qui a payé cette saison.	', 'monteePHR.jpg', '', '', 0, '2014-10-04 14:46:30', 'TSUTTER', '2015-05-05 16:06:25'),
(5, 'Inscriptions 2014/2015', 'Pour tous renseignements, contactez nous au 03 87 37 04 34 ou remplissez ce <a href="#">formulaire</a>.', 'featured-side-3.jpg', '', '', 0, '2014-10-04 14:47:00', 'TSUTTER', '2015-05-05 16:06:27'),
(6, 'Bilan de la saison 2013/2014', 'Le bilan du club est très bon en cette fin de saison avec la montée des 2 équipes séniors dont l\'équipe A qui retrouve la PHR (Ligue) comme espéré en début de saison.', 'featured-side-2.jpg', '', '', 0, '2014-10-04 14:47:30', 'TSUTTER', '2015-05-05 16:06:31'),
(7, 'Fête du foot 2014', 'Comme chaque année, le club a organisé sa fête du football.', 'choucroute.gif', '', '', 1, '2014-10-04 14:48:00', 'TSUTTER', '2015-10-14 19:51:14'),
(8, 'Reprise saison 2014/2015', 'Le premier entrainement de la nouvelle saison a eu lieu le dimanche 27/07/2014.', 'travaux_stade.jpg', '', '', 1, '2014-10-04 14:48:30', 'TSUTTER', '2015-10-14 19:51:14'),
(9, 'Reprise section jeunes', 'Les jeunes joueurs de l\'école de foot (U6 à U13) ont repris le chemin des entrainements depuis la fin du mois d\'août.', 'repriseJeunes2014.jpg', '', '', 1, '2014-10-04 14:49:00', 'TSUTTER', '2015-10-14 19:51:14'),
(13, 'Challenge U11 - 13/12/2014 1er tour', 'Nous avons participé au premier tour de challenge U11 à Trémery. Cela n\\\'a pas été facile de jouer en salle, mais nous nous sommes battus en finissant 4ème sur 8 et nous pouvons être content de nos joueurs. Nous attendons avec impatience le 2ème tour.', 'u11TournoiSalle.jpg', '', '', 1, '2014-12-17 17:00:30', 'LSUTTER', '2015-02-04 16:47:01'),
(16, 'Recherche famille d\'accueil pour notre tournoi international 2015', 'Nous recherchons pour notre prochain tournoi des familles d\'accueil pour l\'hébergement de jeunes joueurs (U11 et U13) pour la nuit du samedi 25 avril et éventuellement la nuit du 24. Les enfants seront pris en charge par les familles le samedi en fin d\'aprés-midi jusqu\'au lundi matin en début de matinée (rentrée scolaire). L\' AS Saint Julien Les Metz vous remercie d\'avance de votre participation à cette demande.\r\n\r\ncontact: Thierry SUTTER au 06 32 98 78 73 ou sutter.thierry@gmail.com\r\n', 'ermont2014.jpg', '', '', 0, '2015-01-06 14:35:38', 'FGASTRINI', '2015-10-06 15:16:58'),
(18, 'Ouverture du site', 'C\'est avec plaisir que nous vous accueillons sur notre nouveau site internet.Après plusieurs semaines de développement, nous sommes heureux de pouvoir vous présenter la vitrine de notre association sportive. Ce site a été pensé pour nos licenciés, nos partenaires mais aussi pour les fans de football amateur. Il permettra d\'accompagner notre essor commun et de vous faire suivre l\'actualité du club, les résultats de nos équipes, nos projets futurs, etc...N\'hésitez pas à nous transmettre vos remarques par le biais du formulaire de contact.En espérant que vous apprécierez ce nouveau design, nous vous souhaitons une bonne découverte du site.', 'ecran1.png', '', '', 1, '2015-02-06 17:36:13', 'TSUTTER', '2015-02-16 10:25:42'),
(19, 'WALYGATOR 2015', 'Mes valeureux guerriers sont tombés en demi-finale du tournoi du FC METZ\r\nJe les remercie de leurs combats.\r\nEn photo mes combattants et le gardien de Metz Anthony MFA', '20150209_133738.jpg', '', '', 1, '2015-02-09 15:38:13', 'EPETOT', '2015-10-14 19:46:27'),
(20, 'les U13 en salle', 'Après un parcours correct en futsal et 2 tournois mitigés à Boulay et Châtel, on termine la salle pour cet hiver avec une belle 4ème place au tournoi de Rémilly.', 'CAM00711.jpg', '', '', 1, '2015-02-18 12:18:45', 'FGASTRINI', '2015-10-13 19:26:42'),
(21, 'Un club bulgare à St Julien !!', 'Pour la première fois depuis le lancement de notre tournoi U11/U13, nous allons accueillir un club bulgare lors la prochaine édition qui aura lieu le 26 avril prochain. Il s\'agit du Botev Vratsa, club de 2ème division en Bulgarie. Ils arriveront le vendredi 24 Avril en Moselle pour un week-end sous le signe du football mais une visite culturelle de la ville de Metz est également au programme. Le samedi 25 avril, ils disputeront des rencontres amicales sur nos installations contre nos équipes ainsi que contre le club de région parisienne AS Ermont, vainqueur du trophée du fair-play et demi finaliste de notre tournoi en 2014.\r\nEt enfin, ils tenteront de remporter le challenge remis en jeu tout au long de la journée du dimanche 26 Avril.\r\n\r\nNous vous attendons nombreux pour venir les encourager ainsi que tous les autres enfants qui participeront à cette grande fête !', 'Botev Vratza 9.jpg', '', '', 1, '2015-03-17 09:30:52', 'TSUTTER', '2015-10-13 19:26:42'),
(22, 'Tournoi international - 26 Avril 2015', 'Le tournoi approche à grand pas. La composition des groupes est maintenant connue. Vous pouvez retrouver le tirage au sort complet et le programme de la phase de poule sur le site dédié à cette 12ème édition <a href="http://tournoi.assaintjulienlesmetz.com" target="_new">http://tournoi.assaintjulienlesmetz.com</a>', 'coupes3.jpg', '', '', 1, '2015-04-11 12:34:26', 'TSUTTER', '2015-10-13 19:26:42'),
(23, 'Blog de nos amis du Templiers Nandrins', 'Un petit bonjour de Belgique et de Templiers-Nandrin...Voici un petit article sur notre séjour passé chez vous.Encore...\r\n\r\nhttps://www.facebook.com/AsStJulien/posts/1166167693410265', 'TempliersNandrins2015.jpg', '', '', 1, '2015-05-01 17:55:07', 'FGASTRINI', '2015-10-13 19:26:42'),
(24, 'Recrutement 2015/2016', 'Le club recherche pour la saison 2015/2016 des joueurs séniors motivés, ambitieux, de niveau Ligue.\r\n\r\nLe club recherche également : \r\n- des éducateurs pour prendre en charge l\'équipe réserve qui évoluera au niveau district\r\n- des joueurs et joueuses toutes catégories jeunes U5 à U19, désirant rejoindre\r\nnotre école de football\r\n- des arbitres ou candidats arbitres\r\n- des éducateurs toutes catégories( possibilité de passer les diplômes d\'éducateur)\r\n\r\n\r\nContact: M Melzer au 06 80 43 04 41', 'recrutement.png', '', '', 1, '2015-05-27 15:39:03', 'TSUTTER', '2015-10-13 19:26:42'),
(25, 'Saison 2015-2016', 'La reprise des entrainements pour les séniors au ra lieu le 15 juillet.', 'reprisefoot.jpg', '', '', 1, '2015-06-25 11:03:03', 'TSUTTER', '2015-10-13 19:26:42'),
(26, 'Besançon 2015 en u11 u13', 'Désolé pour le retard des photos.\r\nJe remercie tous le monde pour ce très beau week end', 'DSC_2876.jpg', '', '', 1, '2015-06-30 15:34:22', 'EPETOT', '2015-10-13 19:26:42'),
(27, 'suite Besançon', 'u 13', 'DSC_3104.jpg', '', '', 1, '2015-06-30 15:36:04', 'EPETOT', '2015-10-13 19:26:42'),
(28, 'suite suite Besançon', 'tous le groupe dans le Doubs', 'DSC_3138.jpg', '', '', 1, '2015-06-30 15:36:38', 'EPETOT', '2015-10-13 19:26:42'),
(29, 'suite suite suite Besançon', 'tous les joueurs', 'DSC_3121.jpg', '', '', 1, '2015-06-30 15:42:03', 'EPETOT', '2015-10-13 19:26:42'),
(30, 'Team Goal Expert', 'Notre partenaire Team Goal Expert tournera un film promotionnel sur nos installations les 5 et 12 septembre 2015 de 8h30 à 12h00.', 'teamGoalExpert2.png', '', '', 1, '2015-09-03 09:49:38', 'TSUTTER', '2015-10-13 19:26:42'),
(31, 'Programme du weekend', 'COUPE DE FRANCE POULE L (LORRAINE)Dimanche 13 septembre 2015 - 15H00Saulxures A.S.C. - Saint Julien 1MOSELLE U13 EXCELLENCE GROUPE ESamedi 12 septembre 2015 - 15H15St Julien Metz - St Avold En 3MOSELLE U13 PROMOTION GROUPE HSamedi 12 septembre 2015 - 15H15St Julien Metz 2 - Lorry Plappeville FcMOSELLE U17 GROUPE CSamedi 12 septembre 2015 - 16H30St Julien Metz - Talange AsCHAMP.EQUIPES RESERVES SENIORS GROUPE UNIQUEDimanche 13 septembre 2015 - 10H00St Julien Metz 3 - Ars S/ Moselle As 2MOSELLE U15 GROUPE EDimanche 13 septembre 2015 - 10H15Ban St Martin Us - St Julien MetzCOUPE MOSELLE SENIORS 15/16 GROUPE UNIQUEDimanche 13 septembre 2015 - 15H00St Julien Metz 2 - Metz ConquistadoresSans oublier la 2e journée de tournage du film de notre partenaire Team Goal Expert le 12 septembre à partir de 8h30', 'agendaWeekEnd.jpg', '', '', 1, '2015-09-09 14:46:44', 'TSUTTER', '2015-10-13 19:26:42'),
(32, 'U15  2015-16', 'Voici les premières photos de nos U15', 'IMG_0124.JPG', '', '', 1, '2015-09-15 15:00:22', 'EPETOT', '2015-10-13 19:28:05'),
(33, 'U15', 'En compagnie de notre coach principal Franco', 'IMG_0128.JPG', '', '', 1, '2015-09-15 15:02:04', 'EPETOT', '2015-10-13 19:25:34'),
(34, 'Les U15 pour la deuxième journée du championnat et leurs entraineurs', '', 'IMG_0131.JPG', '', '', 1, '2015-09-22 14:21:22', 'EPETOT', '2015-10-13 19:25:37'),
(37, 'SECOND PLATEAU U9', 'De gauche à droite et de haut en bas : Gauthier, Gaëtan, Sacha, Louis, Robby, Nils, Helyas, Livio et Mathis.', 'U9_3_oct_2015.jpg', '', '', 0, '2015-10-08 18:37:41', 'RERNESTI', '2016-12-05 10:37:27'),
(38, '3EME PLATEAU U9', 'Debout : Gaëtan, Gauthier, Corentin, Sacha et Robby.\r\nAccroupis : Helyas, Louis, Fantine, Mathis et Livio.', 'U9_10_oct_2015.JPG', '', '', 0, '2015-10-10 21:10:57', 'RERNESTI', '2016-12-05 10:37:38'),
(39, '4EME PLATEAU U9', 'De gauche à droite et de haut en bas : Gauthier, Corentin, Sacha, Mathis, Robby, Gaëtan, Helyas, Fantine, Livio et Hassan.', 'U9_17_oct_2015.JPG', '', '', 0, '2015-10-17 16:13:36', 'RERNESTI', '2016-12-05 10:37:47'),
(40, 'DONNONS UN NOM à NOTRE TOURNOI INTERNATIONAL !', 'Le 24 avril 2016, aura lieu la 13 ème édition du tournoi international de l\'AS Saint Julien pour les catégories de jeunes U11 et U13. 32 équipes de joueurs âgés de 10 à 13 ans se rencontreront pour tenter de remporter le trophée.\r\n\r\nNous souhaitons donner enfin un nom à ce tournoi et c\'est pourquoi nous souhaitons vous mettre à contribution pour trouver celui-ci. \r\n\r\nNous attendons donc vos idées et vos propositions de nom pour ce tournoi international par mail à cette adresse concours@assaintjulienlesmetz.com ou sur notre page facebook!\r\n\r\nA partager sans modération ....', 'tournoi.jpg', '', '', 0, '2015-10-17 18:23:14', 'TSUTTER', '2015-10-17 17:02:35'),
(41, 'Donnons un nom à notre tournoi international !', 'Le 24 avril 2016, aura lieu la 13 ème édition du tournoi international de l\'AS Saint Julien pour les catégories de jeunes U11 et U13. 32 équipes de joueurs âgés de 10 à 13 ans se rencontreront pour tenter de remporter le trophée.\r\n\r\nNous souhaitons donner enfin un nom à ce tournoi et c\'est pourquoi nous souhaitons vous mettre à contribution pour trouver celui-ci. \r\n\r\nNous attendons donc vos idées et vos propositions de nom pour ce tournoi international par mail à cette adresse concours@assaintjulienlesmetz.com ou sur notre page facebook!\r\n\r\nA partager sans modération ....', 'DSC_0264.JPG', '', '', 1, '2015-10-17 19:02:31', 'TSUTTER', '2015-10-17 17:02:31'),
(42, 'Second Plateau U8', 'Debout de gauche à droite : Ryad, Noham, Thibaut, Nathan, Léo, Anthony et Bo. Accroupi : Ethan.', 'U8_3_oct_2015.jpg', '', '', 0, '2015-11-03 22:07:05', 'RERNESTI', '2016-12-05 10:37:54'),
(43, '4ème Plateau U8', 'De gauche à droite : Léo, Ethan, Ryad, Anthony, Thibaut, Noham, Florian.', 'U8_17_oct_2015.jpg', '', '', 0, '2015-11-04 21:14:49', 'RERNESTI', '2016-12-05 10:38:00'),
(44, '5EME PLATEAU U9', 'Debout de gauche à droite : André, Louis, Mathis, Helyas, Livio, Corentin et Robby. Accroupis : Gaëtan, Gauthier, Nils, Sacha et Fantine.', 'U9_7_nov_2015.jpg', '', '', 0, '2015-11-07 21:32:33', 'RERNESTI', '2016-12-05 10:38:06'),
(45, '6EME PLATEAU U9', 'Debout : André, Ethan, Gaëtan, Gauthier, Louis et Robby.\r\nAccroupis : Helyas, Livio, Nils, Corentin et Sacha.', 'U9_14_nov_2015.JPG', '', '', 0, '2015-11-15 15:59:07', 'RERNESTI', '2016-12-05 10:38:39'),
(46, 'Plateau U11', 'De gauche à droite (haut) : Hugo, Brennan, Stéphan, Melvin, Selim.\r\nDe gauche à droite (bas) : Dimitri, Dorian, Ethan, Victor', 'u11.jpg', '', '', 0, '2015-11-19 21:25:16', 'RERNESTI', '2016-12-05 10:38:15'),
(47, '7EME PLATEAU U9', 'Gaëtan, Sacha, Corentin, Mathis, Livio, Hassan, Robby, Nils, Louis, Helyas et Gauthier.', 'U9_21_nov_15.jpg', '', '', 0, '2015-11-22 22:10:44', 'RERNESTI', '2016-12-05 10:38:51'),
(48, 'Belle après-midi pour les U11', 'Bravo à l\'équipe pour ces victoires 3-2 contre APM4 (alors que menée 2-0) et 2-0 contre Lorry-Plappeville : Victor, Brennan, Hugo, Emircan, Melvyn, Stéphan, Augustin, Téhiva, Dorian, Aaron et Nolan. ', 'u11.jpg', '', '', 0, '2015-11-28 19:09:54', 'RERNESTI', '2016-12-05 10:39:00'),
(52, '1er tournoi Futsal Ennery', 'Helyas, Livio, Bo, Nils, Mathis et Robby', 'Futsal1.jpg', '', '', 0, '2015-12-15 14:50:23', 'RERNESTI', '2016-12-05 10:37:06'),
(53, '8EME PLATEAU U8', 'Jean-Claude et Frank encadrent les U8 : Ethan, Bo, Anthony et Thibaut debout, Léo, Noham et Ryad accroupis.', 'U8_9_dec_2015.jpg', '', '', 0, '2015-12-15 14:55:06', 'TSUTTER', '2015-12-29 10:51:55'),
(54, '8ème plateau U8', 'Jean-Claude et Frank encadrent les U8 : Ethan, Bo, Anthony et Thibaut debout, Léo, Noham et Ryad accroupis.', 'U8_7_dec_2015.jpg', '', '', 1, '2015-12-29 11:46:13', 'TSUTTER', '2015-12-29 10:51:50'),
(55, 'test', 'essai article u15', 'Winter Leaves.jpg', '', '', 0, '2015-12-29 13:18:58', 'TESTU15', '2015-12-29 12:25:22'),
(56, 'BONNE ANNEE 2016', 'L\'AS Saint Julien Les Metz présente à tous, dirigeants, joueurs, parents, éducateurs, supporters, visiteurs de ce site, ses meilleurs voeux pour l\'année 2016.\r\n\r\nQue cette année soit pour vous source de bonheur, de joie, de prospérité et de réussite dans votre vie familiale, professionnelle et sportive.\r\n\r\nNous souhaitons à toutes nos équipes de concrétiser leurs objectifs quels qu\'ils soient.', 'bonneAnnee.jpg', '', '', 1, '2016-01-06 14:04:00', 'TSUTTER', '2016-01-06 13:04:38'),
(59, 'les U15 au bowling', 'Très bon moment passé au bowling pour fêter l\'arbre de noël en compagnie des licenciés du club. Bravo à Eren et au coach pour leurs victoires. Val ne fais pas la tête ce n\'est que partie remise !', 'P1010004.JPG', '', '', 0, '2016-01-08 16:47:58', 'FGASTRINI', '2016-01-08 15:55:07'),
(60, 'les U15 au bowling bis', 'Très bon moment passé au bowling pour fêter l\'arbre de noël en compagnie des licenciés du club. Bravo à Eren, Maël et...au coach Franco pour leurs victoires. Val ne fais pas la tête ce n\'est que partie remise !', 'P1010004.JPG', '', '', 1, '2016-01-08 17:05:37', 'FGASTRINI', '2016-01-08 22:07:43'),
(61, 'les U15 au bowling', 'Très bon moment passé au bowling pour fêter l\'arbre de noël en compagnie des licenciés du club. Bravo à Eren, Maël et ...au coach franco pour leurs victoires. Val ne fais pas la tête ce n\'est que partie remise !', 'P1010002.JPG', '', '', 1, '2016-01-08 17:10:56', 'FGASTRINI', '2016-01-08 16:30:51'),
(62, '', '', 'P1010004.JPG', '', '', 0, '2016-01-08 17:25:33', 'FGASTRINI', '2016-01-08 16:26:07'),
(63, '', '', 'P1010006.JPG', '', '', 0, '2016-01-08 17:27:22', 'FGASTRINI', '2016-01-08 16:30:46'),
(64, '', '', 'P1010004.JPG', '', '', 0, '2016-01-08 17:30:18', 'FGASTRINI', '2016-01-08 16:30:48'),
(65, 'Les Guerriers U15', 'Après un début de championnat un peu timide, nos joueurs ont bossé, progressé, et pris conscience de leurs possibilités pour finir tels des guerriers et accrocher une superbe 3ème place au classement qui nous donne la possibilité de jouer la phase A sur la 2ème partie de saison. Un grand BRAVO à eux.      Franco', 'P1010457.JPG', '', '', 1, '2016-01-08 18:00:49', 'FGASTRINI', '2016-01-08 17:00:49'),
(66, 'Rencontre U9 amicale contre Montigny 5/12/2015', 'Les parents ayant aidé à l\'organisation de ce tournoi amical posent avec les U9 presque au complet !', 'amical5dec15.jpg', '', '', 0, '2016-01-10 20:59:32', 'RERNESTI', '2016-12-05 10:36:55'),
(67, 'Repas au centre socio culturel le 12 mars 2016', 'L’AS SAINT JULIEN LES METZ a le plaisir de vous convier à son repas qui se déroulera le samedi 12 mars 2016 à partir de 20h au centre socio-culturel de St Julien Les Metz.', 'repas12mars2016.jpg', '', '', 1, '2016-02-25 11:05:12', 'TSUTTER', '2016-02-25 10:05:12'),
(68, 'Tournoi International U11/U13', 'Notre traditionnel tournoi U11/U13 approche à grand pas ! \r\nA 50 jours de la date, les préparatifs sont en cours pour accueillir les 32 équipes qui s\'affronteront pour remporter cette 13ème édition. Cette année encore, nous pourrons compter sur les équipes de l\'AS Ermont, des belges de Templiers Nandrins, l\'APM Metz, et bien d\'autres. Retrouvez très prochainement la liste complète des participants ainsi que le tirage au sort des groupes sur le site du tournoi : <a href="tournoi.assaintjulienlesmetz.com">tournoi.assaintjulienlesmetz.com</a>', 'couvertureJ50.jpg', '', '', 1, '2016-03-03 13:43:52', 'TSUTTER', '2016-04-05 11:48:16'),
(69, 'Remise générale', 'Toutes les renconres du district mosellan de ce week end sont annulées à l\'exception du challenge U11.\r\n\r\nLa rencontre de PHR de notre équipe séniors A est elle aussi présumé reporté.', 'remisegenerale.png', '', '', 1, '2016-03-04 16:16:48', 'TSUTTER', '2016-03-04 15:16:48'),
(70, 'RENCONTRE U8-U9-U10-U11', 'Les joueurs rassemblés ce 5 mars au club en compagnie de leurs coachs juste avant le tournoi. Un grand bravo à nos jeunes pousses !', '5mars2016.jpg', '', '', 0, '2016-03-05 23:07:27', 'RERNESTI', '2016-12-05 10:36:44'),
(71, 'Réunion d\'information', 'Une réunion a lieu ce soir à 19h au club house du stade pour l\'organisation du 13ème tournoi U11 U13 du club. La réunion a pour but de faire un point sur l\'avancement de l\'organisation et recencer les personnes souhaitant nous aider dans différentes tâches relatives à cette organisation (famille d\'accueil pour les jeunes joueurs de la région parisienne, arbitrage, montage des stands, sécurité, etc ...)', 'affiche2016.png', '', '', 1, '2016-03-14 14:44:55', 'TSUTTER', '2016-03-14 13:44:55'),
(72, '9EME PLATEAU U8 et U9', '', '12mars2016.jpg', '', '', 0, '2016-03-18 15:33:35', 'RERNESTI', '2016-12-05 10:36:36'),
(73, 'Tournoi International 2016', 'Retrouvez nous dans quelques jours pour le tirage au sort des groupes du 13ème tournoi international U11/U13 du club...\r\nPour patienter voici la liste définitive des participants :\r\nCatégorie U11\r\nAS ST JULIEN\r\nRS AMANVILLERS\r\nAPM METZ\r\nAS ERMONT (95)\r\nTEMPLIERS NANDRINS (Bel.)\r\nFC THIONVILLE 1\r\nFC THIONVILLE 2\r\nES COURCELLES / NIED\r\nSENART MOISSY (77)\r\nMONTIGNY LES METZ\r\nUS CHATEL\r\nCO METZ BELLECROIX\r\nBFC BAR LE DUC (55)\r\nCSO BLENOD (54)\r\nLANEUVEVILLE DEVANT NANCY (54)\r\nSC MARLY\r\n\r\nCatégorie U13\r\nAS ST JULIEN\r\nRC SARREGUEMINES\r\nFTM LIVERDUN (54)\r\nAPM METZ (Vainqueur 2015)\r\nAS ERMONT (95)\r\nTEMPLIERS NANDRINS 1 (Bel.)\r\nTEMPLIERS NANDRINS 2 (Bel.)\r\nFC THIONVILLE \r\nES COURCELLES / NIED\r\nMONTIGNY LES METZ\r\nCSO BLENOD (54)\r\nBFC BAR LE DUC (55)\r\nFC DEVANT LES PONTS\r\nLANEUVEVILLE DEVANT NANCY (54)\r\nCO METZ BELLECROIX\r\nUS CHATEL', 'affiche2016.png', '', '', 1, '2016-03-23 17:49:42', 'TSUTTER', '2016-04-05 11:47:58'),
(74, 'Zoom sur les participants à notre 13ème tournoi international', '1/18 : APM Metz\r\n \r\nL\'APM Metz fait partie des clubs qui participe à notre tournoi depuis sa création en 2004. \r\nNotre voisin messin est le club qui compte le plus grand nombre de victoire en finale de notre tournoi avec 1 victoire pour les U11 en 2012 et 4 victoires pour les U13 en 2007, 2010, 2014, 2015. \r\n\r\nPhoto : équipe U11 2015/2016', 'apmmetz-u11.jpg', '', '', 0, '2016-04-06 11:35:24', 'TSUTTER', '2016-04-06 09:49:24'),
(75, 'Zoom sur les participants à notre 13ème tournoi international', '1/18 : APM Metz\r\n \r\nL\'APM Metz fait partie des clubs qui participe à notre tournoi depuis sa création en 2004. \r\nNotre voisin messin est le club qui compte le plus grand nombre de victoire en finale de notre tournoi avec 1 victoire pour les U11 en 2012 et 4 victoires pour les U13 en 2007, 2010, 2014, 2015. \r\n\r\nPhotos : \r\n	équipe U11 2015/2016\r\n	équipe U13 2015/2016', 'apmmetz-u11.jpg', '', '', 1, '2016-04-06 11:50:04', 'TSUTTER', '2016-04-06 09:50:04'),
(76, 'Zoom sur les participants à notre 13ème tournoi international', '2/18 : AS Ermont\r\n \r\nL\'AS Ermont est un club de football du Val d\'Oise (95). Cette année sera leur 3ème participation consécutive au tournoi avec l\'objectif de remporter leur 1ère victoire en Lorraine. \r\n\r\nPour découvrir un peu mieux ce club rendez vous sur leur site <a href="http://www.asermont.fr/">http://www.asermont.fr/</a>\r\n\r\nPhotos : \r\n	équipe U11 2015/2016\r\n	équipe U13 2015/2016', 'ermont-u11.jpg', '', '', 1, '2016-04-07 08:54:36', 'TSUTTER', '2016-04-07 06:54:36'),
(77, 'Zoom sur les participants à notre 13ème tournoi international', '3/18 : Première participation pour le BFC Bar Le Duc, club de la Meuse.\r\nPour découvrir un peu mieux ce club rendez vous sur leur site http://www.bar-foot-club.com/ \r\n\r\nPhotos : équipe U13 2015/2016', 'barlleduc-u13.jpg', '', '', 1, '2016-04-08 08:51:37', 'TSUTTER', '2016-04-08 06:51:37'),
(78, 'Zoom sur les participants à notre 13ème tournoi international', '4/18 : L\'ES Courcelles Sur Nied paricipe pour la 2ème fois au tournoi. En 2015, les U13 se sont hissés en finale contre l\'APM Metz. Après une très belle partie malgré la fatigue accumulée au long de la journée, ces 2 équipes nous avaient offert une très belle finale.\r\nhttps://www.facebook.com/escn57/\r\nPhotos : \r\néquipe U11 2015/2016\r\néquipe U13 2015/2016', 'escn-u13.jpg', '', '', 1, '2016-04-10 11:10:55', 'TSUTTER', '2016-04-10 09:10:55'),
(79, 'Zoom sur les participants à notre 13ème tournoi international', '5/18 : Le Thionville Football Club est un club lorrain et français de football fondé en 1905 et évoluant en Division d’Honneur Régionale (D7).\r\nLe club est basé à Thionville, ville de 40.863 habitants située dans le département de la Moselle et la région Lorraine.\r\nLe Thionville FC a été professionnel et a évolué en Division 2 lors des saisons 1979-1980 et 1980-1981.\r\nIl compta dans ses rangs, en 1943, le futur champion du monde 1954 Fritz Walter.\r\nLa génération 2003 du Thionville FC est devenue vice-championne d’Europe en 2015.\r\nhttp://www.thionvillefc.eu/historique.html\r\nPhotos : \r\néquipes U11 2015/2016\r\néquipe U13 2015/2016', 'fcthionville-u11-2.jpg.JPG', '', '', 1, '2016-04-10 11:19:34', 'TSUTTER', '2016-04-11 07:04:01'),
(80, 'Zoom sur les participants à notre 13ème tournoi international', '6/18 : FTM Liverdun\r\n\r\nPhotos :\r\néquipe U13 2015/2016', 'ftm-liverdun-u13.jpg', '', '', 1, '2016-04-11 13:53:18', 'TSUTTER', '2016-04-11 11:53:18'),
(81, 'Zoom sur les participants à notre 13ème tournoi international', '7/18 : Sénart Moissy\r\n\r\nhttp://www.senartmoissy.fr/\r\n\r\nPhotos :\r\néquipe U11 2015/2016', 'senart.jpg', '', '', 1, '2016-04-11 13:55:01', 'TSUTTER', '2016-04-12 07:40:34'),
(82, 'Zoom sur les participants à notre 13ème tournoi international', '8/18 : Les Templiers Nandrins est un club belge de la banlieue de Liège. Nous avons découvert ce club il y a 3 ans maintenant. Ils apportent leur bonne humeur et leur fairplay sur notre stade pendant 2 jours ce qui leur a valu d\'être récompensé plusieurs fois par le trophée du fairplay décerné par les organisateurs du tournoi.\r\n\r\nhttp://www.templiers-nandrin.be/\r\n\r\nPhotos :\r\néquipe U11 2015/2016\r\néquipe U12 2015/2016\r\néquipe U13 2015/2016', 'templiers-u11-min.jpg', '', '', 1, '2016-04-11 13:59:10', 'TSUTTER', '2016-04-13 08:02:05'),
(83, '1er tour Coupe de France 2016/2017', 'Le tirage au sort du 1er tour de la coupe de France édition 2016/2017 a eu lieu. L\'AS Saint Julien affrontera le voisin de l\'ESAP Metz au stade des Hauts de Blémont le jeudi 5 Mai à 15h00.', '1erTourCoupeDeFrance.jpg', '', '', 1, '2016-04-20 13:42:36', 'TSUTTER', '2016-04-20 11:42:36'),
(84, 'Tournoi International U11/U13', 'L\'AS St Julien Les Metz remercie tous les participants à notre tournoi.\r\nUn grand bravo à tous vos joueurs, éducateurs et parents qui ont bravé le froid, la pluie et même la grêle.\r\n\r\nU11 :\r\n	Vainqueur: Templiers Nandrins (Belgique)\r\n	Finaliste: CSO Blénod\r\n	Fairplay: Creutzwald\r\n\r\nU13 :\r\n	Vainqueur: Bar Le Duc\r\n	Finaliste: CSO Blénod\r\n	Fairplay: Templiers Nandrins\r\n\r\nMeilleur gardien : Creutzwald U11\r\n\r\nJe vous donne d\'ores et déjà rendez vous en 2017 pour la 17ème édition.', 'templiers-u11-min.jpg', '', '', 1, '2016-04-26 11:07:33', 'TSUTTER', '2016-04-26 09:07:33'),
(85, 'Au programme de ce weekend', 'PROMOTION D HONNEUR REGIONAL GROUPE C\r\nDimanche 01 mai 2016 - 15H00\r\nLigny En Barrois Us - St Julien Metz\r\n \r\nMOSELLE U13 EXCELLENCE GROUPE C\r\nSamedi 30 avril 2016 - 15H15\r\nSt Julien Metz - Moyeuvre Ul\r\n \r\nMOSELLE U13 PROMOTION GROUPE F\r\nSamedi 30 avril 2016 - 15H15\r\nSt Julien Metz As 2 - Metz Es 4\r\n \r\nMOSELLE U17 NIVEAU B GROUPE E\r\nSamedi 30 avril 2016 - 16H30\r\nTremery Fc 2 - St Julien Metz\r\n \r\nMOSELLE U15 NIVEAU A GROUPE B\r\nSamedi 30 avril 2016 - 16H30\r\nMetz Es - St Julien Metz\r\n \r\nSENIORS TROISIEME DIVISION GROUPE H MATIN\r\nDimanche 01 mai 2016 - 10H00\r\nSt Julien Metz 2 - Malroy As 2\r\n \r\nSENIORS QUATRIEME DIVISION GROUPE H MATIN\r\nDimanche 01 mai 2016 - 10H00\r\nVantoux 2 - St Julien Metz 3 	\r\n\r\nEn savoir plus sur http://moselle.fff.fr/competitions/php/club/club_agenda.php?cl_no=7796#PSyTzIdZOxGpsLCc.99', 'llf.png', '', '', 1, '2016-04-28 09:33:21', 'TSUTTER', '2016-04-28 07:33:21'),
(86, 'PLATEAU U8', 'Les deux équipes U8 de St Julien lors du plateau organisé au Ban St Martin le 30 avril 2016', 'U830avril2016.jpg', '', '', 0, '2016-05-01 22:10:00', 'RERNESTI', '2016-12-05 10:36:22'),
(87, 'PLATEAU U9', 'Les deux équipes U9 lors du plateau du 30 avril organisé à Plappeville.', '30avril2016.jpg', '', '', 0, '2016-05-01 22:12:01', 'RERNESTI', '2016-12-05 10:36:17'),
(88, 'Tournoi U8', 'L\'équipe des U8 de St Julien au tournoi de Moulins jeudi 5 mai.', 'U85mai2016.jpg', '', '', 0, '2016-05-08 22:18:25', 'RERNESTI', '2016-12-05 10:36:13'),
(89, 'Tournoi U9', 'L\'équipe des U9 de St Julien au tournoi international de Dombasle le 5 mai 2016.', 'U9Dombasle.JPG', '', '', 0, '2016-05-08 22:19:26', 'RERNESTI', '2016-12-05 10:36:06'),
(90, 'PLATEAU U9', 'Les deux équipes U9 lors du plateau du 7 mai organisé à l\'ES Metz.', '7mai2016.JPG', '', '', 0, '2016-05-08 22:25:14', 'RERNESTI', '2016-12-05 10:36:01'),
(91, 'Résultats du weeke end', 'Les résultats du club\r\n \r\n1er TOUR COUPE DE FRANCE 2016 - 2017\r\nJeudi 05 mai 2016 - 15H00\r\nMetz Esap - St Julien Metz : 2 - 5	\r\n\r\nPROMOTION D HONNEUR REGIONAL GROUPE C\r\nSamedi 07 mai 2016 - 20H00\r\nSt Julien Metz - Marly Sc : 2 - 0	\r\n\r\nVictoire très importante pour l\'équipe A en vue du maintien en PHR\r\n \r\nSENIORS TROISIEME DIVISION GROUPE H MATIN\r\nDimanche 08 mai 2016 - 10H00\r\nLa Maxe Rs 2 - St Julien Metz 2 : 1 - 11\r\n \r\nSENIORS QUATRIEME DIVISION GROUPE H MATIN\r\nDimanche 08 mai 2016 - 10H00\r\nSt Julien Metz 3 - La Maxe Rs 3 : 3 - 0	(Forfait)\r\n\r\nVictoire qui permet à l\'équipe C d\'être championne de son groupe et valide la montée en 3ème Division !\r\n\r\nMOSELLE U17 NIVEAU B GROUPE E\r\nJeudi 05 mai 2016 - 15H30\r\nSt Julien Metz - Les Coteaux As : 4 - 5	\r\n \r\nMOSELLE U17 NIVEAU B GROUPE E\r\nSamedi 07 mai 2016 - 17H30\r\nMetz Esap 2 - St Julien Metz : 0 - 2\r\n \r\nMOSELLE U15 NIVEAU A GROUPE B\r\nJeudi 05 mai 2016 - 10H15\r\nMaizieres Es - St Julien Metz : 4 - 2\r\n \r\nMOSELLE U15 NIVEAU A GROUPE B\r\nSamedi 07 mai 2016 - 15H15\r\nSt Julien Metz - Amanvillers Rs : 1 - 5	\r\n \r\nMOSELLE U13 EXCELLENCE GROUPE C\r\nJeudi 05 mai 2016 - 14H00\r\nSt Julien Metz - Amanvillers Rs : 1 - 5	\r\n \r\nMOSELLE U13 EXCELLENCE GROUPE C\r\nSamedi 07 mai 2016 - 15H00\r\nBan St Martin Us - St Julien Metz : 2 - 3	\r\n\r\nLes U13 remontent à la 3ème place à égalité de points avec Chatel à la 2ème place grâce au goal average.\r\n \r\nMOSELLE U13 PROMOTION GROUPE F\r\nJeudi 05 mai 2016 - 14H00\r\nSt Julien Metz As 2 - Amanvillers Rs 2 : 0 - 3	\r\n \r\nMOSELLE U13 PROMOTION GROUPE F\r\nSamedi 07 mai 2016 - 15H15\r\nLorry Plappeville Fc - St Julien Metz As 2 : 3 - 3	\r\n\r\nEn savoir plus sur http://moselle.fff.fr/competitions/php/club/club_resultat.php?cl_no=7796#oPcV4VA0cuVsWXsv.99', 'llf.png', '', '', 1, '2016-05-09 18:15:45', 'TSUTTER', '2016-05-09 16:15:45'),
(92, 'Programme du weeke end', 'PROMOTION D HONNEUR REGIONAL GROUPE C<br> \r\nDimanche 22 mai 2016 - 15H00<br> \r\nBar Le Duc Fc 2 - St Julien Metz \r\n<br>\r\n<br>\r\nMOSELLE U15 NIVEAU A GROUPE B<br>\r\nSamedi 21 mai 2016 - 15H15<br>\r\nTalange As - St Julien Metz\r\n<br><br>\r\nMOSELLE U13 EXCELLENCE GROUPE C<br>\r\nSamedi 21 mai 2016 - 15H15<br>\r\nSt Julien Metz - Chatel Us\r\n<br><br>\r\nMOSELLE U13 PROMOTION GROUPE F<br>\r\nSamedi 21 mai 2016 - 15H15<br>\r\nSt Julien Metz As 2 - Chatel Us 2\r\n<br><br>\r\nMOSELLE U17 NIVEAU B GROUPE E<br>\r\nSamedi 21 mai 2016 - 17H00<br>\r\nBan St Martin Us - St Julien Metz\r\n<br><br>\r\nSENIORS TROISIEME DIVISION GROUPE H \r\nMATIN<br>\r\nDimanche 22 mai 2016 - 10H00<br>\r\nSt Julien Metz 2 - Pierrevillers Fc 2\r\n<br><br>\r\nSENIORS QUATRIEME DIVISION GROUPE H MATIN<br>\r\nDimanche 22 mai 2016 - 10H00<br>\r\nArgancy Us 2 - St Julien Metz 3\r\n<br><br>\r\nEn savoir plus sur <a href="http://moselle.fff.fr/competitions/php/club/club_agenda.php?cl_no=7796#45X6KWvwsgfepz3P.99">District mosellan</a>', 'agenda.jpg', '', '', 1, '2016-05-11 14:19:24', 'TSUTTER', '2016-05-11 12:24:56'),
(93, 'Les U13 termine 4e notre tournoi européen', 'éliminé en demi finale par le vainqueur du tournoi, nos u13 ont réalisé un beau parcours lors de cette édition', 'DSC_0258-min.JPG', '', '', 1, '2016-05-18 11:40:10', 'TSUTTER', '2016-05-18 13:17:15'),
(94, 'Tournoi U8-U9 à Marange 14 mai 2016', '', '14maiMarange.JPG', '', '', 0, '2016-05-15 00:17:59', 'RERNESTI', '2016-12-05 10:35:50'),
(95, '1er Tournoi des Amis', '\r\nA l\'occasion de sa traditionnelle fête du foot, notre club organisera le 25 Juin prochain son 1er tournoi des amis.\r\n\r\nCe tournoi est exclusivement réservé aux bénévoles, entraineurs, parents, épouses, compagnes, frères et sœurs, amies, amis, etc. Aucune équipe extérieure ne sera acceptée.\r\n\r\nUne équipe sera composée de 7 joueurs dont 1 gardien + 3 remplaçants au maximum.\r\n \r\nLes inscriptions sont ouvertes par mail à benji.v@outlook.com , contact@tge376.com et saintjulienlesmetz.foot@orange.fr\r\n \r\nMesdames, messieurs, chaussez vos crampons et commencez les entrainements pour faire en sorte que cette journée soit une des plus belles pour terminer la saison', 'tournoisixte.jpg', '', '', 0, '2016-05-24 15:15:56', 'TSUTTER', '2016-09-16 12:36:26'),
(96, 'Agenda du 28 et 29 mai 2016', 'PROMOTION D HONNEUR REGIONAL GROUPE C\r\nDimanche 29 mai 2016 - 15H00\r\nSt Julien Metz - Noveant F.C.\r\n \r\nMOSELLE U9\r\nSamedi 28 mai 2016 - 14H00\r\nRassemeblement à St Julien\r\n\r\nMOSELLE U13 EXCELLENCE GROUPE C\r\nSamedi 28 mai 2016 - 15H15\r\nSte Marie Chenes As - St Julien Metz\r\n \r\nMOSELLE U17 NIVEAU B GROUPE E\r\nSamedi 28 mai 2016 - 17H00\r\nLes Coteaux As - St Julien Metz\r\n \r\nMOSELLE U15 NIVEAU A GROUPE B\r\nSamedi 28 mai 2016 - 17H30\r\nSt Julien Metz - Devant Ponts Fc\r\n \r\nSENIORS TROISIEME DIVISION GROUPE H MATIN\r\nDimanche 29 mai 2016 - 08H30\r\nHauconcourt As 2 - St Julien Metz 2\r\n \r\nSENIORS QUATRIEME DIVISION GROUPE H MATIN\r\nDimanche 29 mai 2016 - 08H30\r\nRetonfey Noiss Mon 2 - St Julien Metz 3', 'agenda4.jpg', '', '', 1, '2016-05-28 08:52:34', 'TSUTTER', '2016-05-28 06:52:34'),
(97, 'Saison 2016/2017 - Recrutement', 'L\'AS Saint Julien recherche des arbitres (débutants ou confirmés), des éducateurs et des joueurs motivés afin de renforcer ses effectifs en vue de la saison prochaine.\r\n\r\nRenseignements au : 03 87 37 04 34 ou par mail à saintjulienlesmetz.foot@orange.fr', 'visuel_recrutement.jpg', '', '', 1, '2016-06-01 16:53:33', 'TSUTTER', '2016-06-01 14:53:33'),
(98, '1er Rassemblement U6 U7 U8 U9', 'Rendez vous ce dimanche 12 juin à partir de 10h pour notre 1er rassemblement réservé aux joueurs des catégories U6 U7 U8 et U9. 38 équipes seront présentes.\r\n<br><br>\r\nRestauration, buvette et animation sur place.\r\n<br><br>\r\nVenez nombreux encourager les futures stars du football !\r\n\r\n<br><br>\r\n\r\nAS ST JULIEN<br>\r\nAS VOLSTROFF<br>\r\nST JEAN ROHRBACH<br>\r\nAS FLORANGE<br>\r\nRC NILVANGE<br>\r\nBECHY<br>\r\nASNL FEMININES<br>\r\nES CREHANGE FAULQUEMONT<br>\r\nELAN KOBHEEN<br>\r\nJS AUDUN LE TICHE<br>\r\nCLOUANGE<br>\r\nFC SARREGUEMINES<br>\r\nFC CREUTZBERG FORBACH<br>\r\nRS MAGNY<br>\r\nUS CHATEL<br>\r\nFC PANGE<br>\r\nSC TERVILLE<br>\r\nES LANEUVEVILLE DEVANT NANCY<br>\r\nFC THIONVILLE', 'affiche-min.jpg', '', '', 1, '2016-06-07 16:37:53', 'TSUTTER', '2016-06-07 14:41:45'),
(99, 'Devient arbitre de football !', 'Le club recherche des arbitres débutants ou confirmés pour la saison 2016/2017. La formation pour les débutants sera financée par le club.<br/>Pour toutes informations, veuillez contacter le secrétariat du club au 03 87 37 04 34.', 'devenirarbitre.jpg', '', '', 1, '2016-09-23 12:15:10', 'TSUTTER', '2016-09-23 14:20:25'),
(100, 'Agenda', 'Dimanche 4 Septembre<br><br>\r\nES Gandrange - Séniors A à 15h<br>\r\nSéniors B - Montigny Les Metz B à 15h<br>\r\nSéniors C - Montigny Les Metz C à 10h<br>', 'agenda.jpg', '', '', 0, '2016-09-02 17:43:58', 'TSUTTER', '2016-09-16 12:36:06'),
(101, 'Association Rafaël Lorraine', 'Un centre d’essais de véhicules Ford sera installé sur le parking du Kinépolis de Saint-Julien-Les-Metz demain de 9h à 18h. Le but est le suivant :<br/>\r\n<br/>\r\n1 essai routier gratuit = 20€ versé par Ford à l’association.<br/>\r\n<br/>\r\nPlus nous serons nombreux, plus nous pourrons aider l’association à réaliser les rêves des enfants malades. Toute l’AS Saint-Julien-Les-Metz est donc invitée à nous rendre visite ce samedi et réaliser un essai de 10min au profit de l’association. (Aucune réservation obligatoire)<br/>\r\n<br/>\r\n<br/>\r\n<a href="http://www.dg8-57.com/evenement/427/19-actualites.htm">En savoir plus</a>', 'ford.jpg', '', '', 1, '2016-09-16 14:12:30', 'TSUTTER', '2016-09-16 12:12:30'),
(102, 'Soirée couscous', 'Soirée dansante le 15 octobre 2016 au centre socio culturel de Saint Julien Lès Metz avec DJ et tombola\r\n\r\nInscriptions au 03 87 37 04 34\r\n\r\n', 'SoireeCouscous.png', '', '', 1, '2016-09-16 17:46:40', 'TSUTTER', '2016-09-16 15:46:40'),
(103, 'PLATEAU U11 SAMEDI 24 SEPTEMBRE', 'L\'ensemble des joueurs U11 de l\'AS St Julien a participé au premier plateau U11 &#224; domicile. Accroupis : Gaëtan, Mathis, Livio, Gauthier, Sacha, Helyas, Maë et Jade. Debout : Robby, Nathan, Victor, Tehiva, Dimitri, Nils, Corentin, Fantine, Melvyn et Jörg.', '20160924U11.jpg', '', '', 1, '2016-09-25 21:46:48', 'RERNESTI', '2016-09-25 19:46:48'),
(105, 'photos u15', 'quelques photos de la catégorie u15 avec leurs plus beaux sourires !!', 'CAM01370.jpg', '', '', 0, '2016-11-13 11:10:45', 'FGASTRINI', '2016-11-13 10:15:07'),
(106, 'photos u15', 'Quelques photos de la catégorie u15. Et avec leurs plus beaux sourires !! ', 'P1010014.JPG', '', '', 1, '2016-11-14 17:31:25', 'FGASTRINI', '2016-11-14 16:32:11'),
(107, 'PLATEAU U11', 'Nos deux équipes U11 juste avant le plateau du samedi 3 décembre 2016 : Debout : Philippe, Furkan, Melvyn, Tehiva, Théo, Diana, Alain et Nathan. Accroupis : Fatih, Mathis, Nils, Gauthier, Helyas, Gaëtan, Livio, Sami et Sacha.', 'CHATEL.jpg', '', '', 1, '2016-12-05 11:35:26', 'RERNESTI', '2016-12-05 10:35:26'),
(108, 'DERNIER RENDEZ VOUS 2016', 'Les U8-U9 et les U10-U11 se sont retrouvés ce samedi au club pour une ultime rencontre. Par un temps clément, ils se sont bien amusés. Bonnes f&#234;tes &#224; toutes et &#224; tous !', 'DECEMBRE.JPG', '', '', 1, '2016-12-17 18:16:16', 'RERNESTI', '2016-12-17 17:16:16'),
(109, 'FETE DE NOEL AU BOWLING', 'Les U11 se sont retrouvés au bowling de St Julien l&#232;s Metz pour f&#234;ter le Noël du club. Pendant deux heures, ils ont échangé le ballon de football contre une boule plus dure et plus lourde ! Bonnes f&#234;tes &#224; toutes et &#224; tous !', 'BOWLING.jpg', '', '', 1, '2016-12-19 22:41:53', 'RERNESTI', '2016-12-19 21:41:53'),
(110, 'Joyeux Nöel', 'Fête de Noël du club au KineBowl de Saint Julien Les Metz pour tous les licenciés du club ', 'IMG_0865.jpg', '', '', 1, '2016-12-27 13:33:14', 'TSUTTER', '2016-12-27 12:33:14');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL,
  `ANNEE_DEBUT` smallint(6) NOT NULL,
  `ANNEE_FIN` smallint(6) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `LIBELLE`, `ANNEE_DEBUT`, `ANNEE_FIN`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'U7', 2009, 2010, 'TSUTTER', '2015-08-17 13:19:02'),
(2, 'U9', 2007, 2008, 'TSUTTER', '2015-08-17 13:19:02'),
(3, 'U11', 2005, 2006, 'TSUTTER', '2015-08-17 13:19:02'),
(4, 'U13', 2003, 2004, 'TSUTTER', '2015-08-17 13:19:02'),
(5, 'U15', 2001, 2002, 'TSUTTER', '2015-08-17 13:19:02'),
(6, 'U17', 1999, 2000, 'TSUTTER', '2015-08-17 13:19:02'),
(7, 'U19', 1997, 1998, 'TSUTTER', '2015-08-17 13:19:02'),
(8, 'U20', 1996, 1996, 'TSUTTER', '2015-08-17 13:19:02'),
(9, 'SENIOR', 1981, 1995, 'TSUTTER', '2015-08-17 13:19:02'),
(10, 'VETERAN', 1902, 1980, 'TSUTTER', '2015-08-17 13:19:02');

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

DROP TABLE IF EXISTS `competition`;
CREATE TABLE `competition` (
  `id` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL,
  `TYPE_COMPETITION` smallint(6) NOT NULL,
  `CATEGORIE` smallint(6) NOT NULL,
  `DIVISION` smallint(6) NOT NULL,
  `SAISON` smallint(6) NOT NULL,
  `EQUIPE` int(11) NOT NULL,
  `ACTIF` int(11) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competition`
--

INSERT INTO `competition` (`id`, `LIBELLE`, `TYPE_COMPETITION`, `CATEGORIE`, `DIVISION`, `SAISON`, `EQUIPE`, `ACTIF`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'PHR GROUPE C', 1, 9, 9, 1, 1, 0, 'TSUTTER', '2015-10-14 19:51:30'),
(2, '2EME DIV. GROUPE D', 1, 9, 11, 1, 2, 0, 'TSUTTER', '2015-10-14 19:51:30'),
(3, 'MOSELLE GROUPE F', 10, 5, 23, 1, 3, 0, 'TSUTTER', '2015-10-14 19:51:30'),
(4, 'EXCELLENCE GROUPE D', 11, 4, 26, 1, 4, 0, 'TSUTTER', '2015-10-14 19:51:30'),
(5, 'COUPE DE LORRAINE', 3, 9, 0, 1, 1, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(6, 'COUPE DE MOSELLE', 4, 9, 0, 1, 2, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(7, 'COUPE DE LORRAINE', 6, 5, 0, 1, 3, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(8, 'COUPE DE MOSELLE', 7, 5, 0, 1, 3, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(9, 'COUPE', 8, 4, 0, 1, 4, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(10, 'COUPE', 9, 3, 0, 1, 6, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(11, 'AMICAL', 16, 3, 0, 1, 7, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(12, 'AMICAL', 16, 3, 0, 1, 6, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(13, 'AMICAL', 15, 4, 0, 1, 5, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(14, 'AMICAL', 15, 4, 0, 1, 4, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(15, 'AMICAL', 14, 5, 0, 1, 3, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(16, 'AMICAL', 13, 9, 0, 1, 1, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(17, 'AMICAL', 13, 9, 0, 1, 2, 0, 'TSUTTER', '2015-09-01 12:31:59'),
(18, 'EXCELLENCE GROUPE C', 11, 4, 26, 1, 4, 0, 'TSUTTER', '2015-10-14 19:49:51'),
(19, 'MOSELLE NIVEAU A', 10, 5, 23, 1, 3, 0, 'TSUTTER', '2015-10-14 19:49:51'),
(20, 'PROMOTION GROUPE H', 11, 4, 27, 1, 5, 0, 'TSUTTER', '2015-10-14 19:49:51'),
(21, 'PROMOTION GROUPE ', 11, 4, 27, 1, 17, 0, 'TSUTTER', '2015-10-14 19:49:51'),
(24, 'PRINTEMPS GROUPE A', 11, 3, 29, 1, 14, 0, 'TSUTTER', '2015-10-14 19:49:51'),
(25, 'PRINTEMPS GROUPE F', 11, 3, 29, 1, 15, 0, 'TSUTTER', '2015-10-14 19:49:51'),
(26, 'PRINTEMPS GROUPE G', 11, 3, 29, 1, 13, 0, 'TSUTTER', '2015-10-14 19:49:51'),
(27, 'PHR GROUPE C', 1, 9, 9, 2, 1, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(28, '3EME DIV. GROUPE H', 1, 9, 12, 2, 2, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(29, '4EME DIV. GROUPE H', 1, 9, 13, 2, 19, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(30, 'COUPE DE LORRAINE', 3, 9, 0, 2, 1, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(31, 'COUPE DE MOSELLE', 4, 9, 0, 2, 2, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(32, 'AMICAL', 13, 9, 0, 2, 1, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(33, 'AMICAL', 13, 9, 0, 2, 2, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(34, 'AMICAL', 13, 9, 0, 2, 19, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(35, 'COUPE DES EQUIPES RESERVES', 5, 9, 0, 2, 19, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(36, 'MOSELLE 1ERE PHASE - GROUPE C', 33, 6, 19, 2, 20, 1, 'TSUTTER', '2015-10-14 19:48:16'),
(37, 'MOSELLE 1ERE PHASE - GROUPE D', 10, 5, 23, 2, 3, 1, 'TSUTTER', '2015-10-14 19:48:39'),
(38, 'EXCELLENCE 1ERE PHASE - GROUPE E', 11, 4, 26, 2, 4, 1, 'TSUTTER', '2015-10-14 19:48:55'),
(39, 'COUPE', 8, 4, 0, 2, 4, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(40, 'AMICAL', 15, 4, 0, 2, 4, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(41, 'COUPE DE LORRAINE', 6, 5, 0, 2, 3, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(42, 'COUPE DE MOSELLE', 7, 5, 0, 2, 3, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(43, 'AMICAL', 14, 5, 0, 2, 3, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(44, 'AMICAL', 34, 6, 0, 2, 20, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(45, 'COUPE DE MOSELLE', 32, 6, 0, 2, 20, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(46, 'COUPE DE LORRAINE', 31, 6, 0, 2, 20, 1, 'TSUTTER', '2015-10-14 19:51:30'),
(47, 'COUPE DE FRANCE', 2, 9, 0, 2, 1, 1, 'TSUTTER', '2015-10-01 13:30:54'),
(48, 'PROMOTION 1ERE PHASE - GROUPE H', 11, 4, 27, 2, 5, 1, 'TSUTTER', '2015-10-14 19:49:15'),
(49, 'PLATEAU', 38, 2, 0, 2, 18, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(50, 'PLATEAU', 38, 2, 0, 2, 9, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(51, 'PLATEAU', 38, 2, 0, 2, 22, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(52, 'PLATEAU', 38, 2, 0, 2, 23, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(53, 'AMICAL', 17, 2, 0, 2, 18, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(54, 'AMICAL', 17, 2, 0, 2, 9, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(55, 'AMICAL', 17, 2, 0, 2, 22, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(56, 'AMICAL', 17, 2, 0, 2, 23, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(57, 'TOURNOI', 23, 2, 0, 2, 18, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(58, 'TOURNOI', 23, 2, 0, 2, 9, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(59, 'TOURNOI', 23, 2, 0, 2, 22, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(60, 'TOURNOI', 23, 2, 0, 2, 23, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(61, 'PLATEAU', 39, 1, 0, 2, 10, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(62, 'PLATEAU', 39, 1, 0, 2, 11, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(63, 'AMICAL', 18, 1, 0, 2, 10, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(64, 'AMICAL', 18, 1, 0, 2, 11, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(65, 'TOURNOI', 24, 1, 0, 2, 10, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(66, 'TOURNOI', 24, 1, 0, 2, 11, 1, 'TSUTTER', '2015-10-14 19:49:51'),
(67, 'AMICAL', 16, 3, 0, 2, 14, 1, 'TSUTTER', '2016-01-04 19:08:24'),
(68, 'AMICAL', 16, 3, 0, 2, 15, 1, 'TSUTTER', '2016-01-04 19:09:00'),
(69, 'CHAMPIONNAT', 12, 3, 29, 2, 14, 1, 'TSUTTER', '2016-01-06 19:24:18'),
(70, 'CHAMPIONNAT', 12, 3, 29, 2, 15, 1, 'TSUTTER', '2016-01-06 19:24:34'),
(71, 'EXCELLENCE 2EME PHASE - GR. C', 11, 4, 26, 2, 4, 1, 'TSUTTER', '2016-02-21 15:25:08'),
(72, 'PROMOTION 2EME PHASE - GR. F', 11, 4, 27, 2, 5, 1, 'TSUTTER', '2016-02-21 15:25:19'),
(73, 'MOSELLE 2EME PHASE NIV. A GR. B', 10, 5, 23, 2, 3, 1, 'TSUTTER', '2016-02-21 15:24:57'),
(74, 'MOSELLE 2EME PHASE NIV. B GR. E', 33, 6, 19, 2, 20, 1, 'TSUTTER', '2016-02-21 15:24:19'),
(75, 'PHR GROUPE C', 1, 9, 9, 3, 1, 1, 'TSUTTER', '2016-08-22 13:19:23'),
(76, 'D2 GROUPE E', 1, 9, 11, 3, 2, 1, 'TSUTTER', '2016-08-22 13:20:05'),
(77, 'D3 GROUPE H', 1, 9, 12, 3, 19, 1, 'TSUTTER', '2016-08-22 13:21:04'),
(78, 'COUPE DE FRANCE', 2, 9, 0, 3, 1, 1, 'TSUTTER', '2016-08-22 13:23:15'),
(79, 'COUPE DE LORRAINE', 2, 9, 0, 3, 1, 1, 'TSUTTER', '2016-08-22 13:23:30'),
(80, 'COUPE DE MOSELLE', 4, 9, 0, 3, 2, 1, 'TSUTTER', '2016-08-22 13:23:41'),
(81, 'COUPE DES EQUIPES RESERVES', 5, 9, 0, 3, 19, 1, 'TSUTTER', '2016-08-22 13:24:02'),
(82, 'U13 EXCELLENCE GROUPE E', 11, 4, 26, 3, 4, 1, 'TSUTTER', '2016-09-08 12:57:14'),
(83, 'U15 MOSELLE GROUPE F', 10, 5, 23, 3, 3, 1, 'TSUTTER', '2016-09-08 12:57:54'),
(84, 'U15 MOSELLE GROUPE E', 10, 5, 23, 3, 24, 1, 'TSUTTER', '2016-09-08 12:58:39'),
(85, 'U17 MOSELLE GROUPE D', 33, 6, 19, 3, 20, 1, 'TSUTTER', '2016-09-08 12:59:05'),
(86, 'COUPE DE LORRAINE', 31, 6, 0, 3, 20, 1, 'TSUTTER', '2016-09-19 11:13:30'),
(87, 'COUPE DE LORRAINE', 6, 5, 0, 3, 3, 1, 'TSUTTER', '2016-09-19 11:13:50'),
(88, 'COUPE DE MOSELLE', 32, 6, 0, 3, 20, 1, 'TSUTTER', '2016-09-19 11:14:01'),
(89, 'COUPE DE MOSELLE', 7, 5, 0, 3, 3, 1, 'TSUTTER', '2016-09-19 11:14:12'),
(90, 'COUPE DES RéSERVES', 26, 5, 0, 3, 24, 1, 'TSUTTER', '2016-09-19 11:14:30'),
(91, 'PLATEAU', 12, 3, 29, 3, 14, 1, 'TSUTTER', '2016-10-13 14:29:47'),
(92, 'PLATEAU', 12, 3, 29, 3, 15, 1, 'TSUTTER', '2016-10-13 14:55:40');

-- --------------------------------------------------------

--
-- Structure de la table `compte_rendu`
--

DROP TABLE IF EXISTS `compte_rendu`;
CREATE TABLE `compte_rendu` (
  `RENCONTRE` int(11) NOT NULL,
  `TEXTE` text NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compte_rendu`
--

INSERT INTO `compte_rendu` (`RENCONTRE`, `TEXTE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(138, 'test', 'TSUTTER', '2015-09-02 13:13:59'),
(141, '', 'TSUTTER', '2015-10-24 17:57:44'),
(187, 'Forfait gÃ©nÃ©ral de l\'Ã©quipe ESAP 3', 'TSUTTER', '2016-03-17 09:55:05'),
(199, 'match reportÃ©\n', 'AISSADI', '2015-09-10 11:18:29'),
(208, 'Très bon match de nos jeunes. Des phases de jeu très intéressantes proposées, de l\'abnégation dans l\'effort sont venues ponctuer un score somme toute logique. Même si un peu plus d\'audace et de confiance auraient pu nous mener à l\'ouverture du score. A signaler également l\'excellent travail de Yoann dans les buts, qui a contribué à garder nos cages inviolés. Et bravo aux spectateurs pour leurs encouragements.\r\nFranco', 'FGASTRINI', '2015-11-12 07:55:30'),
(210, '', 'TSUTTER', '2015-10-06 18:09:57'),
(211, 'BRAVO ! Ã§a y est 1Ã¨re victoire en championnat de nos champions. Et quelle victoire, amplement mÃ©ritÃ©e aprÃ¨s un match de haute qualitÃ©. MalgrÃ© l\'ouverture du score de Devant-les-ponts en seconde pÃ©riode, les joueurs se sont encore plus accrochÃ©s et sont restÃ©s dans la partie surtout aprÃ¨s le pÃ©nalty concÃ©dÃ© quelques minutes aprÃ¨s ce but et superbement dÃ©tournÃ© par Loris dans un grand jour ce samedi. La belle Ã©galisation de Ryan motivait d\'autant plus nos joueurs qui trouvaient la faille en fin de match par Alexis aprÃ¨s un Ã©niÃ¨me dÃ©bordement de Thomas cÃ´tÃ© gauche. Une victoire qui fait du bien au moral de nos joueurs, pas vernis en rÃ©sultats depuis le dÃ©but de saison. L\'accueil rÃ©servÃ© par les parents et spectateurs Ã  l\'issue du match a Ã©tÃ© exceptionnel tout comme le comportement de ces mÃªmes parents qui n\'ont cessÃ© d\'encourager tous les joueurs du dÃ©but Ã   la fin. Un grand merci Ã  tous et bravo les jeunes.\nFranco', 'TSUTTER', '2015-10-14 19:55:27'),
(212, 'essai saisie', 'TESTU15', '2015-10-24 18:13:01'),
(213, 'Défaite rageante et sévère. Nos occasions de la 1ère mi-temps auraient dû nous permettre de mener au score à la mi-temps mais 2 pénaltys en 5 min pour mains involontaires sont venus nous sanctionner même si Yoann a superbement détourné le second. La seconde période a été plus compliquée, et un peu de fatigue ne nous a pas permis de réitérer notre très bonne prestation de la 1ère mi-temps. Des choses intéressantes ont néanmoins été vues, et c\'est ce que l\'on retiendra en priorité.\r\nFranco', 'FGASTRINI', '2015-11-12 12:50:54'),
(215, 'Nouvelle victoire de nos champions. Victoire amplement mÃ©ritÃ©e. L\'Ã©quipe a dÃ©livrÃ© une superbe prestation malgrÃ© le changement de positionnement de certains, dÃ» Ã  quelques absences. Suite Ã  un dÃ©but de match compliquÃ© qui a vu l\'adversaire nous priver de ballon, un contre assassin nous a permis d\'ouvrir le score de fort belle maniÃ¨re. L\'Ã©galisation de Woippy ne nous a pas perturbÃ©s dans notre plan mis en place. La concentration et l\'abnÃ©gation de tous ont contribuÃ© Ã  cette victoire malgrÃ© les 2 derniers buts encaissÃ©s qui nous ont fait souffrir quelque peu en fin de match. Les buteurs du jour se nomment Marien, Hugo et Romain. Les encouragements des parents supporters ont Ã©galement Ã©tÃ© apprÃ©ciÃ©s de tous. \nFranco', 'FGASTRINI', '2015-11-22 14:42:15'),
(216, 'Une nouvelle victoire est venue ponctuÃ©e la 1Ã¨re partie de championnat. L\'ouverture du score de l\'adversaire nous a permis de rÃ©cupÃ©rer les bonnes intentions que l\'on avait oubliÃ©es aux vestiaires pour le dÃ©but de la rencontre. Le match proposÃ© par les jeunes a Ã©tÃ© de trÃ¨s bonne qualitÃ© ensuite et le groupe a bien gÃ©rÃ© la rencontre lors de laquelle de trÃ¨s bonnes phases de jeu ont Ã©tÃ© vues. Les buteurs du jour se nomment Marien, Alexis, Alex, Hugo et Adrien.\n\nFranco', 'FGASTRINI', '2015-11-30 15:22:38'),
(228, '', 'TSUTTER', '2015-10-06 18:09:42'),
(233, '', 'TSUTTER', '2015-11-15 15:01:24'),
(247, 'Peltre 3-2 stjulien \n   \nTAB', 'AISSADI', '2015-10-22 11:35:43'),
(249, '', 'TSUTTER', '2015-10-24 17:56:38'),
(261, '2Ã¨me victoire de nos champions dans ce groupe. Victoire amplement mÃ©ritÃ©e tant nos jeunes ont dominÃ© la rencontre sans malheureusement alourdir le score malgrÃ© nos occasions franches. Mais bon le principal est lÃ  et cette victoire vient rÃ©compenser le bon travail du groupe. Bravo Ã  nos buteurs du jour Maxime, MaÃ«l et Marien. J\'M le M. Dommage que Malcolm n\'y ait pas mis du sien !  \r\nFranco\r\nFranco', 'TSUTTER', '2015-11-15 14:50:24'),
(292, 'Victoire par forfait, l\'Ã©quipe de la GAB ne s\'Ã©tant mÃªme pas dÃ©placÃ©e. Un match de substitution a Ã©tÃ© organisÃ© en remplacement contre les papas de joueurs accompagnÃ©s de Fab (prestation mitigÃ©Ã©)  et Julien (assez moyen car en reprise) et Ã©paulÃ©s par Alexandre, romain et les 2 valentin. Victoire des jeunes U15 contre une Ã©quipe sans organisation notoire (dont je faisais partie !).    \nFranco', 'FGASTRINI', '2016-03-12 18:20:32'),
(293, 'Notre ouverture du score par Marien dÃ¨s l\'entame de la rencontre a motivÃ© l\'Ã©quipe, qui a fait preuve d\'une combativitÃ© exemplaire pendant 60 min. Puis la fatigue des uns et autres a nÃ©cessitÃ© des changements qui ont dÃ©stabilisÃ© l\'organisation de l\'Ã©quipe. La fin de match a Ã©tÃ© difficile avec 3 buts encaissÃ©s dans les 10 derniÃ¨res minutes. La prestation de l\'Ã©quipe est trÃ¨s encourageante surtout face Ã  un des tÃ©nors du groupe. Bravo Ã  Montigny pour sa victoire et bravo Ã  nos jeunes pour leur esprit de combativitÃ©. La base est intÃ©ressante pour notre progression. ', 'FGASTRINI', '2016-03-20 15:28:08'),
(294, 'Entame de match trop passive durant les 20 premiÃ¨res minutes oÃ¹ on a regardÃ© jouÃ© l\'adversaire et encaissÃ© 2 buts. AprÃ¨s notre rÃ©duction du score par Thomas, on a bien terminÃ© la 1Ã¨re mi-temps. L\'entame de la seconde mi-temps a Ã©tÃ© intÃ©ressante et l\'on a siÃ©gÃ© devant le but adversaire pendant 25 minutes sans pouvoir obtenir une Ã©galisation tant mÃ©ritÃ©e. A force de pousser en vain, sur un contre adverse, c\'est un ancien de la maison qui est venu nous scier les pattes. La prestation globale est encourageante pour notre apprentissage Ã  ce niveau exception faite du dÃ©but de rencontre. Au boulot ! ', 'FGASTRINI', '2016-04-04 09:53:39'),
(296, 'Excellente prestation de nos jeunes, la concentration et l\'implication de chacun ont contribuÃ© Ã  une rencontre pleine et aboutie. Avec un peu de rÃ©ussite la victoire aurait pu nous sourire mais les montants (Ã  3 reprises) en ont dÃ©cidÃ© autrement. Mais 1 fois ce mÃªme montant est venu supplÃ©er notre gardien Loris auteur d\'un gros match Ã  l\'image de tous. Somme toute, le nul reflÃ¨te bien la physionomie de la rencontre. ', 'FGASTRINI', '2016-05-01 20:26:31'),
(299, 'Ã§a y est c\'Ã©tait le dernier match de championnat pour nos jeunes u15. Et quel match ! L\'Ã©quipe a jouÃ© ensemble, exerÃ§ant un pressing de tous les instants, chacun se sacrifiant pour son partenaire en difficultÃ©, des phases de jeu incroyables, un gardien en Ã©tat de grÃ¢ce(sauf sur le but encaissÃ© !), mais de loin la meilleure prestation de l\'Ã©quipe sur la saison. Il faut dire que les encouragements incessants des nombreux supporters ont aidÃ© nos jeunes joueurs. Le fait que certains joueurs de devant les ponts en viennent aux mains aprÃ¨s le coup de sifflet final envers nos jeunes prouve bien que le 2Ã¨me du classement n\'a pas digÃ©rÃ© notre prestation. Bravo Ã  tous !', 'FGASTRINI', '2016-05-29 12:21:30'),
(315, 'Nous pouvons avoir des regrets sur cette rencontre. Notre prestation dans le jeu a Ã©tÃ© correcte mis Ã  part au dÃ©but de seconde pÃ©riode un relÃ¢chement de 15 min pendant lequel nous encaissons 3 buts. Notre rÃ©action a Ã©tÃ© trop brÃ¨ve et notre fin de match intÃ©ressante. Il nous a manquÃ© un peu d\'expÃ©rience dans certaines situations pour obtenir un rÃ©sultat positif qui Ã©tait largement dans nos cordes. Que Ã§a nous serve de leÃ§on pour progresser encore.', 'FGASTRINI', '2016-05-05 12:35:31'),
(387, 'Superbe prestation de l\'Ã©quipe qui a su imposer son jeu et enfin jouer relÃ¢chÃ©e surtout aprÃ¨s l\'ouverture du score rapide de Thomas. Le 2Ã¨me but Å“uvre d\'Alexis d\'un superbe coup de canon nous a donnÃ© une avance bien mÃ©ritÃ©e Ã  la mi-temps. Un quadruplÃ© de Marien et un but d\'Adrien sont venus rÃ©compenser l\'application des jeunes tout au long du match. Merci aux parents-acteurs sans lesquels la rencontre n\'aurait pu avoir lieu ainsi qu\'aux parents-supporters fort nombreux pour ce 1er match Ã  domicile. ', 'FGASTRINI', '2016-09-18 07:05:15'),
(390, 'Une fois le diesel en route, Tim Saad et Ryan ont scellÃ© une victoire mÃ©ritÃ©e. ', 'FGASTRINI', '2016-10-23 10:52:17'),
(411, 'Victoire aux tab le score Ã©tait de 4-4 Ã  l\'issue du temps rÃ©glementaire. Sans rÃ©ussir Ã  ouvrir le score aprÃ¨s 2 belles opportunitÃ©s, on a Ã©tÃ© puni sur la 1Ã¨re offensive adverse. L\'Ã©galisation de Marien n\'a pas empÃªcher nos erreurs dÃ©fensives qui ont permis Ã  courcelles sur nied de mener 3-1 Ã  la pause. On est revenu avec une meilleure organisation et plus d\'envie en 2nde pÃ©riode ce qui nous a permis de ne rien lÃ¢cher et d\'Ã©galiser en toute fin de match suite Ã  un superbe coup-franc de Malcolm qui est venu complÃ©ter le hat-trick de Marien. \nSuite Ã  une sÃ©ance de tirs au buts digne d\'une finale de coupe du monde (france-italie 2006 pour les (bons) souvenirs, les jeunes ont rÃ©ussi Ã  se qualifier pour le second tour.\nBRAVO', 'FGASTRINI', '2016-09-25 12:36:23'),
(425, 'Match plein de l\'ensemble de l\'Ã©quipe. Prestation intÃ©ressante de tous mÃªme dans des postes inhabituels pour certains. Un doublÃ© de Marien et un but de Thomas ont rÃ©compensÃ© les efforts des uns et des autres et sont venus ponctuÃ©s de beaux mouvements dans le jeu. Le but subit l\'a Ã©tÃ© en toute fin de rencontre. Bravo Ã  tous et merci aux parents-supporters.', 'FGASTRINI', '2016-11-05 23:04:53');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

DROP TABLE IF EXISTS `contenu`;
CREATE TABLE `contenu` (
  `ZONE` varchar(50) NOT NULL,
  `TEXTE` varchar(2000) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contenu`
--

INSERT INTO `contenu` (`ZONE`, `TEXTE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
('PRESENTATION', 'Le club a été créé vers 1935. Nous avons peu de traces de cette époque mis à part une photo de 1936 photo "ici". A partir de 1946, le club évolue son les couleurs de la manufacture lorraine de tabac, en grenat, en ce jusqu\'au début des années 60. En 1965, le club prend un nouveau départ, pour compter plus de 300 licenciés en 2010, répartis 8 catégories d\'âge allant des débutants (6 ans) à vétérans (+35 ans). 9 arbitres officient pour le compte du club. Le club obtient le label "Qualité Argent" du district mosellan pour les années 2007 à 2010, récompensant ainsi le travail de tous les éducateurs bénévoles du club. Cette année là, nous avons également obtenu les Alérions d\'Or récompensant le club classé premier au challenge de la promotion de l\'arbitrage en Lorraine. Depuis 2007, le club organise un tournoi international pour les U11 et U13 réunissant plus de 30 équipes, soit environ 1000 personnes (joueurs, éducateurs, arbitres, spectateurs et bénévoles) à accueillir sur nos installations du stade de Grimont.', 'TSUTTER', '2015-04-02 13:31:58');

-- --------------------------------------------------------

--
-- Structure de la table `convocation`
--

DROP TABLE IF EXISTS `convocation`;
CREATE TABLE `convocation` (
  `RENCONTRE` int(11) NOT NULL,
  `JOUEUR` int(11) NOT NULL,
  `AUTEUR_MAJ` varchar(25) CHARACTER SET utf8 NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `convocation`
--

INSERT INTO `convocation` (`RENCONTRE`, `JOUEUR`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(202, 19, 'AISSADI', '2015-10-09 10:39:08'),
(202, 20, 'AISSADI', '2015-10-09 10:39:08'),
(202, 320, 'AISSADI', '2015-10-09 10:39:08'),
(210, 77, 'FGASTRINI', '2015-10-07 18:59:13'),
(210, 79, 'FGASTRINI', '2015-10-07 18:59:13'),
(211, 67, 'FGASTRINI', '2015-10-09 20:49:30'),
(211, 70, 'FGASTRINI', '2015-10-09 20:49:30'),
(211, 71, 'FGASTRINI', '2015-10-09 20:49:30'),
(211, 73, 'FGASTRINI', '2015-10-09 20:49:30'),
(211, 76, 'FGASTRINI', '2015-10-09 20:49:30'),
(211, 77, 'FGASTRINI', '2015-10-09 20:49:30'),
(211, 87, 'FGASTRINI', '2015-10-09 20:49:30'),
(211, 89, 'FGASTRINI', '2015-10-09 20:49:30'),
(211, 91, 'FGASTRINI', '2015-10-09 20:49:30'),
(211, 92, 'FGASTRINI', '2015-10-09 20:49:30'),
(213, 65, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 67, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 70, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 71, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 74, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 76, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 87, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 89, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 91, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 92, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 342, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 350, 'FGASTRINI', '2015-11-09 16:37:24'),
(213, 351, 'FGASTRINI', '2015-11-09 16:37:24'),
(215, 59, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 60, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 62, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 65, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 70, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 71, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 74, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 76, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 87, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 89, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 91, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 92, 'FGASTRINI', '2015-11-20 21:31:23'),
(215, 342, 'FGASTRINI', '2015-11-20 21:31:23'),
(216, 59, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 60, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 65, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 67, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 70, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 71, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 73, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 74, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 88, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 91, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 92, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 350, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 352, 'FGASTRINI', '2015-11-27 21:51:34'),
(216, 353, 'FGASTRINI', '2015-11-27 21:51:34'),
(249, 60, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 70, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 76, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 77, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 87, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 88, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 89, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 91, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 92, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 342, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 350, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 351, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 352, 'FGASTRINI', '2015-10-16 20:29:06'),
(249, 353, 'FGASTRINI', '2015-10-16 20:29:06'),
(254, 188, 'RERNESTI', '2015-11-04 20:42:29'),
(254, 192, 'RERNESTI', '2015-11-04 20:42:29'),
(254, 200, 'RERNESTI', '2015-11-04 20:42:29'),
(254, 209, 'RERNESTI', '2015-11-04 20:42:29'),
(254, 211, 'RERNESTI', '2015-11-04 20:42:29'),
(254, 337, 'RERNESTI', '2015-11-04 20:42:29'),
(254, 338, 'RERNESTI', '2015-11-04 20:42:29'),
(254, 339, 'RERNESTI', '2015-11-04 20:42:29'),
(254, 340, 'RERNESTI', '2015-11-04 20:42:29'),
(254, 361, 'RERNESTI', '2015-11-04 20:42:29'),
(256, 180, 'RERNESTI', '2015-11-04 20:43:07'),
(256, 186, 'RERNESTI', '2015-11-04 20:43:07'),
(256, 210, 'RERNESTI', '2015-11-04 20:43:07'),
(256, 213, 'RERNESTI', '2015-11-04 20:43:07'),
(256, 222, 'RERNESTI', '2015-11-04 20:43:07'),
(256, 229, 'RERNESTI', '2015-11-04 20:43:07'),
(256, 356, 'RERNESTI', '2015-11-04 20:43:07'),
(256, 357, 'RERNESTI', '2015-11-04 20:43:07'),
(256, 358, 'RERNESTI', '2015-11-04 20:43:07'),
(256, 359, 'RERNESTI', '2015-11-04 20:43:07'),
(256, 360, 'RERNESTI', '2015-11-04 20:43:07'),
(258, 188, 'RERNESTI', '2015-11-15 13:48:11'),
(258, 192, 'RERNESTI', '2015-11-15 13:48:11'),
(258, 200, 'RERNESTI', '2015-11-15 13:48:11'),
(258, 209, 'RERNESTI', '2015-11-15 13:48:11'),
(258, 211, 'RERNESTI', '2015-11-15 13:48:11'),
(258, 337, 'RERNESTI', '2015-11-15 13:48:11'),
(258, 338, 'RERNESTI', '2015-11-15 13:48:11'),
(258, 339, 'RERNESTI', '2015-11-15 13:48:11'),
(258, 340, 'RERNESTI', '2015-11-15 13:48:11'),
(258, 361, 'RERNESTI', '2015-11-15 13:48:11'),
(259, 180, 'RERNESTI', '2015-11-15 13:46:41'),
(259, 186, 'RERNESTI', '2015-11-15 13:46:41'),
(259, 210, 'RERNESTI', '2015-11-15 13:46:41'),
(259, 213, 'RERNESTI', '2015-11-15 13:46:41'),
(259, 222, 'RERNESTI', '2015-11-15 13:46:41'),
(259, 229, 'RERNESTI', '2015-11-15 13:46:41'),
(259, 356, 'RERNESTI', '2015-11-15 13:46:41'),
(259, 357, 'RERNESTI', '2015-11-15 13:46:41'),
(259, 358, 'RERNESTI', '2015-11-15 13:46:41'),
(259, 359, 'RERNESTI', '2015-11-15 13:46:41'),
(259, 360, 'RERNESTI', '2015-11-15 13:46:41'),
(292, 59, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 60, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 62, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 65, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 70, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 71, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 76, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 87, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 88, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 89, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 92, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 342, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 350, 'FGASTRINI', '2016-03-11 21:59:18'),
(292, 353, 'FGASTRINI', '2016-03-11 21:59:18'),
(293, 59, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 60, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 62, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 65, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 70, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 71, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 76, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 77, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 87, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 88, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 89, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 92, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 342, 'FGASTRINI', '2016-03-19 09:42:18'),
(293, 351, 'FGASTRINI', '2016-03-19 09:42:18'),
(299, 59, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 60, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 62, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 65, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 71, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 76, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 77, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 87, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 88, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 92, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 342, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 350, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 351, 'FGASTRINI', '2016-05-27 19:52:33'),
(299, 353, 'FGASTRINI', '2016-05-27 19:52:33'),
(311, 188, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 192, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 200, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 209, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 211, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 337, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 338, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 339, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 340, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 361, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 364, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 365, 'RERNESTI', '2016-03-14 22:40:18'),
(311, 366, 'RERNESTI', '2016-03-14 22:40:18'),
(312, 180, 'RERNESTI', '2016-03-14 22:41:09'),
(312, 186, 'RERNESTI', '2016-03-14 22:41:09'),
(312, 210, 'RERNESTI', '2016-03-14 22:41:09'),
(312, 213, 'RERNESTI', '2016-03-14 22:41:09'),
(312, 222, 'RERNESTI', '2016-03-14 22:41:09'),
(312, 356, 'RERNESTI', '2016-03-14 22:41:09'),
(312, 357, 'RERNESTI', '2016-03-14 22:41:09'),
(312, 358, 'RERNESTI', '2016-03-14 22:41:09'),
(312, 359, 'RERNESTI', '2016-03-14 22:41:09'),
(312, 360, 'RERNESTI', '2016-03-14 22:41:09'),
(313, 59, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 60, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 62, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 65, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 67, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 70, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 71, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 74, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 87, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 88, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 92, 'FGASTRINI', '2016-03-24 13:53:04'),
(313, 352, 'FGASTRINI', '2016-03-24 13:53:04'),
(391, 59, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 60, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 62, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 64, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 65, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 71, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 73, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 87, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 88, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 92, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 350, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 412, 'FGASTRINI', '2016-11-11 20:26:44'),
(391, 413, 'FGASTRINI', '2016-11-11 20:26:44'),
(404, 20, 'AISSADI', '2016-10-01 13:07:05'),
(404, 25, 'AISSADI', '2016-10-01 13:07:05'),
(404, 27, 'AISSADI', '2016-10-01 13:07:05'),
(404, 30, 'AISSADI', '2016-10-01 13:07:05'),
(404, 346, 'AISSADI', '2016-10-01 13:07:05'),
(404, 347, 'AISSADI', '2016-10-01 13:07:05'),
(404, 372, 'AISSADI', '2016-10-01 13:07:05'),
(404, 373, 'AISSADI', '2016-10-01 13:07:05'),
(404, 374, 'AISSADI', '2016-10-01 13:07:05'),
(404, 376, 'AISSADI', '2016-10-01 13:07:05'),
(404, 377, 'AISSADI', '2016-10-01 13:07:05'),
(404, 380, 'AISSADI', '2016-10-01 13:07:05'),
(419, 59, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 60, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 63, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 64, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 65, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 71, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 77, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 87, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 89, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 92, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 350, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 353, 'FGASTRINI', '2016-10-14 20:29:09'),
(419, 413, 'FGASTRINI', '2016-10-14 20:29:09');

-- --------------------------------------------------------

--
-- Structure de la table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL,
  `CATEGORIE` smallint(6) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `division`
--

INSERT INTO `division` (`id`, `LIBELLE`, `CATEGORIE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'LIGUE 1', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(2, 'LIGUE 2', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(3, 'NATIONAL', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(4, 'CFA', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(5, 'CFA 2', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(6, 'DIVISION HONNEUR', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(7, 'DIVISION HONNEUR REGIONAL', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(8, 'PROMOTION HONNEUR', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(9, 'PROMOTION HONNEUR REGIONAL', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(10, '1ERE DIVISION', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(11, '2EME DIVISION', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(12, '3EME DIVISION', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(13, '4EME DIVISION', 9, 'TSUTTER', '2015-10-14 19:56:44'),
(14, 'DIVISION HONNEUR', 7, 'TSUTTER', '2015-10-14 19:56:44'),
(15, 'HONNEUR REGIONAL', 7, 'TSUTTER', '2015-10-14 19:56:44'),
(16, 'MOSELLE', 7, 'TSUTTER', '2015-10-14 19:56:44'),
(17, 'DIVISION HONNEUR', 6, 'TSUTTER', '2015-10-14 19:56:44'),
(18, 'HONNEUR REGIONAL', 6, 'TSUTTER', '2015-10-14 19:56:44'),
(19, 'MOSELLE', 6, 'TSUTTER', '2015-10-14 19:56:44'),
(20, 'DIVISION HONNEUR', 5, 'TSUTTER', '2015-10-14 19:56:44'),
(21, 'HONNEUR REGIONAL', 5, 'TSUTTER', '2015-10-14 19:56:44'),
(22, 'PROMOTION HONNEUR', 5, 'TSUTTER', '2015-10-14 19:56:44'),
(23, 'MOSELLE', 5, 'TSUTTER', '2015-10-14 19:56:44'),
(24, 'HONNEUR', 4, 'TSUTTER', '2015-10-14 19:56:44'),
(25, 'HONNEUR REGIONAL', 4, 'TSUTTER', '2015-10-14 19:56:44'),
(26, 'EXCELLENCE', 4, 'TSUTTER', '2015-10-14 19:56:44'),
(27, 'PROMOTION', 4, 'TSUTTER', '2015-10-14 19:56:44'),
(28, 'INTERREGIONAL', 5, 'TSUTTER', '2015-10-14 19:56:44'),
(29, 'MOSELLE', 3, 'TSUTTER', '2015-03-17 13:57:58');

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

DROP TABLE IF EXISTS `entrainement`;
CREATE TABLE `entrainement` (
  `ID` int(11) NOT NULL,
  `CATEGORIE` int(11) NOT NULL,
  `JOUR` varchar(10) NOT NULL,
  `HEURE_DEBUT` time DEFAULT NULL,
  `HEURE_FIN` time DEFAULT NULL,
  `LIEU` varchar(50) DEFAULT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entrainement`
--

INSERT INTO `entrainement` (`ID`, `CATEGORIE`, `JOUR`, `HEURE_DEBUT`, `HEURE_FIN`, `LIEU`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 1, 'mercredi', '14:30:00', '00:00:00', 'Stade de Grimont', 'TSUTTER', '2015-10-14 19:58:58'),
(2, 2, 'mardi', '16:30:00', '17:30:00', 'Stade de Grimont', 'TSUTTER', '2015-10-14 19:58:58'),
(3, 3, 'mercredi', '17:30:00', '00:00:00', 'Stade de Grimont', 'TSUTTER', '2015-10-14 19:58:58'),
(4, 3, 'vendredi', '17:30:00', '00:00:00', 'Stade de Grimont', 'TSUTTER', '2015-10-14 19:58:58'),
(5, 4, 'mercredi', '17:30:00', '00:00:00', 'Stade de Grimont', 'TSUTTER', '2015-10-14 19:58:58'),
(6, 4, 'vendredi', '17:30:00', '19:00:00', 'Stade de Grimont', 'TSUTTER', '2016-08-22 15:57:10'),
(7, 5, 'mercredi', '18:00:00', '00:00:00', 'Stade de Grimont', 'TSUTTER', '2015-10-14 19:58:58'),
(8, 5, 'vendredi', '18:00:00', '00:00:00', 'Stade de Grimont', 'TSUTTER', '2015-10-14 19:58:58'),
(9, 2, 'mercredi', '15:30:00', '16:30:00', 'Stade de Grimont', 'TSUTTER', '2015-10-14 19:58:58'),
(10, 2, 'vendredi', '16:30:00', '17:30:00', 'Stade de Grimont', 'TSUTTER', '2015-10-14 19:58:58'),
(11, 6, 'mardi', '18:30:00', '20:00:00', 'STADE DE GRIMONT', 'TSUTTER', '2016-08-22 15:57:36'),
(12, 6, 'jeudi', '18:30:00', '20:00:00', 'STADE DE GRIMONT', 'TSUTTER', '2016-08-22 15:58:06');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `CATEGORIE` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL,
  `ENTRAINEUR` int(11) DEFAULT NULL,
  `ADJOINT` int(11) DEFAULT NULL,
  `DELEGUE` int(11) DEFAULT NULL,
  `LIEN_CLASSEMENT` varchar(200) DEFAULT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`id`, `CATEGORIE`, `LIBELLE`, `ENTRAINEUR`, `ADJOINT`, `DELEGUE`, `LIEN_CLASSEMENT`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 9, 'SENIOR A', NULL, NULL, NULL, 'http://lorraine.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=327455&ph_no=1&gp_no=3', 'TSUTTER', '2016-09-09 14:38:12'),
(2, 9, 'SENIOR B', NULL, NULL, NULL, 'http://moselle.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=327537&ph_no=1&gp_no=5', 'TSUTTER', '2016-09-09 14:38:25'),
(3, 5, 'U15 A', NULL, NULL, NULL, 'http://moselle.fff.fr/competitions/php/club/club_classement_deta.php?sa_no=2016&cp_no=327543&ph_no=1&gp_no=6&cl_no=7796&eq_no=5', 'TSUTTER', '2016-09-09 14:43:16'),
(4, 4, 'U13 A', NULL, NULL, NULL, 'http://moselle.fff.fr/competitions/php/club/club_classement_deta.php?sa_no=2016&cp_no=333084&ph_no=1&gp_no=5&cl_no=7796&eq_no=6', 'TSUTTER', '2016-09-09 14:43:00'),
(5, 4, 'U13 B', NULL, NULL, NULL, 'https://www.fff.fr/la-vie-des-clubs/7796/page-classement/competition-316711/phase-1/groupe-8', 'TSUTTER', '2016-02-22 12:26:54'),
(9, 2, 'U9 B', NULL, NULL, NULL, NULL, 'TSUTTER', '2015-10-14 19:59:35'),
(10, 1, 'U7 A', NULL, NULL, NULL, NULL, 'TSUTTER', '2015-10-14 19:59:35'),
(11, 1, 'U7 B', NULL, NULL, NULL, NULL, 'TSUTTER', '2015-10-14 19:59:35'),
(14, 3, 'U 11 A', NULL, NULL, NULL, '', 'LSUTTER', '2015-03-03 20:31:59'),
(15, 3, 'U 11 B', NULL, NULL, NULL, '', 'LSUTTER', '2015-03-03 20:32:20'),
(18, 2, 'U9 A', NULL, NULL, NULL, '', 'LSUTTER', '2015-03-03 20:34:58'),
(19, 9, 'SENIOR C', NULL, NULL, NULL, 'http://moselle.fff.fr/competitions/php/championnat/championnat_classement.php?sa_no=2016&cp_no=332629&ph_no=1&gp_no=8', 'TSUTTER', '2016-09-09 14:42:44'),
(20, 6, 'U17 A', NULL, NULL, NULL, 'http://moselle.fff.fr/competitions/php/club/club_classement_deta.php?sa_no=2016&cp_no=327542&ph_no=1&gp_no=4&cl_no=7796&eq_no=4', 'TSUTTER', '2016-09-09 14:43:40'),
(22, 2, 'U9 C', NULL, NULL, NULL, '', 'TSUTTER', '2015-10-13 19:39:17'),
(23, 2, 'U9 D', NULL, NULL, NULL, '', 'TSUTTER', '2015-10-13 19:39:49'),
(24, 5, 'U15 B', NULL, NULL, NULL, 'http://moselle.fff.fr/competitions/php/club/club_classement_deta.php?sa_no=2016&cp_no=327543&ph_no=1&gp_no=5&cl_no=7796&eq_no=7', 'TSUTTER', '2016-09-09 14:43:28');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE `evenement` (
  `ID` int(11) NOT NULL,
  `TITRE` varchar(100) NOT NULL,
  `TEXTE` text NOT NULL,
  `PHOTO` varchar(100) DEFAULT NULL,
  `LIEN` varchar(100) DEFAULT NULL,
  `DEBUT` date NOT NULL,
  `FIN` date DEFAULT NULL,
  `LIEU` varchar(100) NOT NULL,
  `STATUT` smallint(6) NOT NULL,
  `DOCUMENT` varchar(100) DEFAULT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`ID`, `TITRE`, `TEXTE`, `PHOTO`, `LIEN`, `DEBUT`, `FIN`, `LIEU`, `STATUT`, `DOCUMENT`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'Tournoi International U11 & U13', 'Le 12ème édition du tournoi international Lori\'s Sports, réservé aux catégories U11 et U13, aura lieu le dimanche 26 avril 2015.<br/>Au total, ce sont 32 équipes venant de Belgique, du Luxembourg, de région parisiene, et de tous l\'est de la France qui se disputeront le trophée sur nos intallations.<br/>En 2014, en partenariat avec la station Europe 1, nous avons récompensé les équipes de l\' AS Ermont (95) en U13 et des Templiers Nandrins (Belgique) en U11 pour leur fair-play tout au long du week end.<br/>En U11, l\'équipe de Jarville a remporté le trophée. En U13, ce sont les jeunes joueurs de l\'APM Metz qui l\'ont emporté en finale.<br/><br/>Le tirage au sort des groupes  est disponible à cette adresse: tournoi.assaintjulienlesmetz.com<br/>', 'images/article/afficheTournoiBulgarieHollande.jpg', 'tournoi.assaintjulienlesmetz.com', '2015-04-26', '2015-04-26', 'Stade de Grimont', 1, NULL, 'TSUTTER', '2016-02-22 14:14:08'),
(2, 'Tournoi International U11 & U13', '13e édition', 'images/article/AfficheTournoiVignette.jpg', 'tournoi.assaintjulienlesmetz.com', '2016-04-24', '2016-04-24', 'Stade de Grimont', 0, NULL, 'TSUTTER', '2016-02-22 14:14:11'),
(3, 'Couscous à volonté', 'Réservez votre soirée du 15 Octobre !<br/>\r\nL\'AS St Julien organise une soirée dansante avec son DJ', 'images/article/SoireeCouscous.png', NULL, '2016-10-15', '2016-10-15', 'Centre socio culturel', 1, NULL, 'TSUTTER', '2016-09-28 11:25:03');

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE `fonction` (
  `id` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`id`, `LIBELLE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'PRESIDENT', 'TSUTTER', '2015-10-14 20:00:17'),
(2, 'VICE PRESIDENT', 'TSUTTER', '2015-10-14 20:00:17'),
(3, 'TRESORIER', 'TSUTTER', '2015-10-14 20:00:17'),
(4, 'INTENDANT', 'TSUTTER', '2015-10-14 20:00:17'),
(5, 'SECRETAIRE', 'TSUTTER', '2015-10-14 20:00:17'),
(6, 'MANAGER GENERAL', 'TSUTTER', '2015-10-14 20:00:17'),
(7, 'RESPONSABLE ECOLE DE FOOT', 'TSUTTER', '2015-10-14 20:00:17'),
(8, 'REFERENT ARBITRE', 'TSUTTER', '2015-10-14 20:00:17'),
(9, 'ARBITRE', 'TSUTTER', '2015-10-14 20:00:17'),
(10, 'EDUCATEUR', 'TSUTTER', '2015-10-14 20:00:17'),
(11, 'DIRIGEANT', 'TSUTTER', '2015-10-14 20:00:17'),
(12, 'JOUEUR', 'TSUTTER', '2015-10-14 20:00:17');

-- --------------------------------------------------------

--
-- Structure de la table `individu`
--

DROP TABLE IF EXISTS `individu`;
CREATE TABLE `individu` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `AGE` int(11) DEFAULT NULL,
  `DATE_NAISSANCE` datetime DEFAULT NULL,
  `FONCTION` int(11) DEFAULT NULL,
  `CATEGORIE` int(11) DEFAULT NULL,
  `POSTE` int(11) DEFAULT NULL,
  `TAILLE` int(11) DEFAULT NULL,
  `POIDS` int(11) DEFAULT NULL,
  `MEILLEUR_PIED` varchar(1) DEFAULT NULL,
  `NUMERO_LICENCE` int(11) DEFAULT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `individu`
--

INSERT INTO `individu` (`ID`, `NOM`, `PRENOM`, `AGE`, `DATE_NAISSANCE`, `FONCTION`, `CATEGORIE`, `POSTE`, `TAILLE`, `POIDS`, `MEILLEUR_PIED`, `NUMERO_LICENCE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'TAIBI', 'FABRICE', NULL, NULL, 10, 9, NULL, NULL, NULL, NULL, NULL, 'ADMIN', '2014-10-27 14:36:09'),
(2, 'DEZALIS', 'YVES', NULL, NULL, 11, 9, NULL, NULL, NULL, NULL, NULL, 'ADMIN', '2014-10-27 14:36:09'),
(3, 'VILLIGER', 'BENJAMIN', 34, NULL, 12, 9, 4, NULL, NULL, 'D', NULL, 'ADMIN', '2014-10-27 14:37:27'),
(4, 'VILLANI', 'QUENTIN', NULL, NULL, 12, 9, 8, NULL, NULL, 'D', NULL, 'ADMIN', '2014-10-27 14:37:27');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `AGE` int(11) DEFAULT NULL,
  `DATE_NAISSANCE` date DEFAULT NULL,
  `FONCTION` int(11) DEFAULT NULL,
  `CATEGORIE` int(11) DEFAULT NULL,
  `SOUS_CATEGORIE` int(11) NOT NULL,
  `POSTE` int(11) DEFAULT NULL,
  `TAILLE` int(11) DEFAULT NULL,
  `POIDS` int(11) DEFAULT NULL,
  `MEILLEUR_PIED` varchar(1) DEFAULT NULL,
  `NUMERO_LICENCE` varchar(10) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHOTO` varchar(100) DEFAULT NULL,
  `VIDEO` varchar(100) DEFAULT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `NOM`, `PRENOM`, `AGE`, `DATE_NAISSANCE`, `FONCTION`, `CATEGORIE`, `SOUS_CATEGORIE`, `POSTE`, `TAILLE`, `POIDS`, `MEILLEUR_PIED`, `NUMERO_LICENCE`, `EMAIL`, `PHOTO`, `VIDEO`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'TAIBI', 'FABRICE', 38, '1976-03-05', 6, 0, 0, 1, NULL, NULL, NULL, '1539577105', '', 'images/photo/TAIBI FABRICE.jpg', NULL, 'TSUTTER', '2015-12-30 16:26:58'),
(2, 'DEZALIS', 'YVES', 57, '1957-09-03', 4, 9, 0, 1, NULL, NULL, NULL, '1505628303', '', 'images/photo/DEZALIS YVES.jpg', NULL, 'TSUTTER', '2015-12-30 16:26:44'),
(3, 'VILLIGER', 'BENJAMIN', 34, '1980-10-10', 12, 10, 0, 1, NULL, NULL, 'D', '1591098578', NULL, 'images/photo/VILLIGER BENJAMIN.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(4, 'VILLANI', 'QUENTIN', 26, '1988-07-12', 12, 9, 0, 8, 0, 0, 'D', '1565621795', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:38:40'),
(5, 'MELZER', 'MICHELINE', 62, '1952-09-23', 5, NULL, 0, NULL, NULL, NULL, NULL, '2544500033', 'contact@melzer.fr', 'images/photo/MELZER MICHELINE.bmp', 'videos/presentation/MELZER.mp4', 'TSUTTER', '2015-10-14 20:01:32'),
(6, 'SUTTER', 'LAURENT', 54, '1958-02-20', 10, 4, 0, NULL, NULL, NULL, NULL, '1519504667', 'laurent.sutter@neuf.fr', 'images/photo/SUTTER LAURENT.bmp', 'videos/presentation/SUTTER.mp4', 'TSUTTER', '2015-09-02 15:16:43'),
(7, 'PIGEOT', 'BERNARD', 68, '1946-07-18', 1, NULL, 0, NULL, NULL, NULL, NULL, '1500043291', 'b.pigeot57@gmail.com', 'images/photo/PIGEOT BERNARD.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(8, 'MEUNIER', 'MICHEL', 66, '1948-08-05', 2, NULL, 0, NULL, NULL, NULL, NULL, '1580025005', NULL, 'images/photo/MEUNIER MICHEL.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(9, 'MILTGEN', 'ANDRE', 69, '1945-07-04', 3, NULL, 0, NULL, NULL, NULL, NULL, '1599561148', NULL, 'images/photo/MILTGEN ANDRE.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(11, 'GASTRINI', 'FRANCO', 42, '1972-11-25', 10, 5, 0, NULL, NULL, NULL, NULL, '2545014956', 'franco.g@numericable.fr', 'images/photo/GASTRINI FRANCO.bmp', NULL, 'TSUTTER', '2015-09-02 15:16:43'),
(12, 'ISSADI', 'ALAIN', 53, '1961-10-09', 10, 6, 0, NULL, NULL, NULL, NULL, '1525627175', 'alain.issadi@hotmail.fr', NULL, NULL, 'AISSADI', '2016-09-27 12:36:29'),
(20, 'MITHOUARD', 'LUCAS', 14, '2000-06-29', 12, 6, 12, 6, 0, 0, '', '2544090023', '', NULL, NULL, 'AISSADI', '2016-10-17 12:44:45'),
(25, 'PERRUCCIO', 'HUGO', 14, '2000-01-31', 12, 6, 12, 3, 0, 0, 'G', '2545014145', '', NULL, NULL, 'AISSADI', '2016-09-18 12:38:54'),
(27, 'PERRUCCIO', 'MATTEO', 14, '2000-01-31', 12, 6, 12, 6, 0, 0, 'd', '2545014166', '', NULL, NULL, 'AISSADI', '2016-09-09 12:38:36'),
(30, 'TOPIC', 'NICOLAS', 14, '2000-11-05', 12, 6, 12, 2, 0, 0, '', '2544062242', '', NULL, NULL, 'AISSADI', '2016-10-17 12:50:03'),
(32, 'GASTRINI', 'STEPHANIE', 37, '1977-06-24', 11, NULL, 0, NULL, NULL, NULL, NULL, '2547443294', NULL, 'images/photo/GASTRINI STEPHANIE.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(33, 'RODARI', 'LAURENCE', 54, '1960-08-31', 11, NULL, 0, NULL, NULL, NULL, NULL, '1525629929', NULL, 'images/photo/RODARI LAURENCE.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(34, 'BARRECA', 'PAUL', 61, '1953-05-22', 11, 9, 0, NULL, NULL, NULL, NULL, '1580153626', '', 'images/photo/BARRECA PAUL.bmp', NULL, 'TSUTTER', '2015-09-03 06:20:41'),
(35, 'CHARBONNIER', 'GEOFFREY', 26, '1988-05-19', 8, 9, 0, NULL, NULL, NULL, NULL, '2543862986', '', 'images/photo/CHARBONNIER GEOFFREY.bmp', NULL, 'TSUTTER', '2015-09-03 19:51:26'),
(36, 'DA SILVA', 'FRANK', 35, '1979-02-18', 10, 2, 0, NULL, NULL, NULL, NULL, '1052116841', 'virginie.frank1308@free.fr', NULL, NULL, 'RERNESTI', '2015-11-05 09:24:35'),
(38, 'DELLINGER', 'JOEL', 63, '1961-06-24', 11, 4, 0, NULL, NULL, NULL, NULL, '2547173618', '', 'images/photo/DELLINGER JOEL.bmp', NULL, 'TSUTTER', '2015-09-03 06:20:55'),
(42, 'MENICONI', 'ENZO', 69, '1945-04-04', 11, NULL, 0, NULL, NULL, NULL, NULL, '1595611854', NULL, 'images/photo/MENICONI ENZO.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(45, 'OBRINGER', 'LOIC', 17, '1997-06-11', 11, 4, 0, NULL, NULL, NULL, NULL, '2543974365', '', 'images/photo/OBRINGER LOIC.bmp', NULL, 'TSUTTER', '2015-09-03 06:21:17'),
(46, 'OBRINGER', 'STEPHANE', 43, '1971-09-22', 11, NULL, 0, NULL, NULL, NULL, NULL, '2546015636', NULL, 'images/photo/OBRINGER STEPHANE.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(48, 'ROMERA', 'FRANCK', 41, '1973-02-07', 11, NULL, 0, NULL, NULL, NULL, NULL, '1590530581', NULL, 'images/photo/ROMERA FRANCK.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(51, 'ZEAU', 'PATRICK', 41, '1963-09-22', 11, 4, 0, NULL, NULL, NULL, NULL, '1525628737', '', 'images/photo/ZEAU PATRICK.bmp', NULL, 'TSUTTER', '2015-09-03 19:55:07'),
(59, 'BESCH', 'MARIEN', 12, '2002-11-11', 12, 5, 10, NULL, NULL, NULL, NULL, '2545391086', NULL, 'images/photo/BESCH MARIEN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(60, 'BIVEN', 'MALCOLM', 12, '2002-09-27', 12, 5, 10, NULL, NULL, NULL, NULL, '2547368149', NULL, 'images/photo/BIVEN MALCOLM.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(62, 'CHARLES', 'ROMAIN', 12, '2002-10-24', 12, 5, 10, NULL, NULL, NULL, NULL, '2545073817', NULL, 'images/photo/CHARLES ROMAIN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(63, 'DAVER', 'JEREMY', 11, '2003-11-13', 12, 5, 9, NULL, NULL, NULL, NULL, '2547194675', NULL, 'images/photo/DAVER JEREMY.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(64, 'DELLINGER', 'SEBASTIEN', 11, '2003-09-27', 12, 5, 9, NULL, NULL, NULL, NULL, '2545844568', NULL, 'images/photo/DELLINGER SEBASTIEN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(65, 'DIEMER', 'TIMOTE', 12, '2002-01-03', 12, 5, 10, NULL, NULL, NULL, NULL, '2545093806', NULL, 'images/photo/DIEMER TIMOTE.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(69, 'FRANZETTI', 'TIMOTEE', 11, '2003-11-20', 12, 5, 9, NULL, NULL, NULL, NULL, '2546262891', NULL, 'images/photo/FRANZETTI TIMOTEE.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(71, 'GASTRINI', 'LORIS', 12, '2002-07-22', 12, 5, 10, 0, 0, 0, '', '2544984616', '', NULL, NULL, 'FGASTRINI', '2016-10-11 18:22:31'),
(72, 'HADBOUN', 'NOAM', 11, '2003-11-11', 12, 5, 9, NULL, NULL, NULL, NULL, '2545558920', NULL, 'images/photo/HADBOUN NOAM.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(73, 'HADBOUN', 'SAMI', 12, '2002-05-05', 12, 5, 10, NULL, NULL, NULL, NULL, '2545527372', NULL, 'images/photo/HADBOUN SAMI.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(74, 'HAMZAOUI', 'HICHAM', 12, '2002-04-14', 12, 5, 10, NULL, NULL, NULL, NULL, '2546986627', NULL, 'images/photo/HAMZAOUI HICHAM.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(76, 'HENNEQUIN', 'THOMAS', 12, '2002-02-28', 12, 5, 10, NULL, NULL, NULL, NULL, '2545949375', NULL, 'images/photo/HENNEQUIN THOMAS.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(77, 'IBO', 'YOANN', 12, '2002-03-02', 12, 5, 10, NULL, NULL, NULL, NULL, '2547018728', NULL, 'images/photo/IBO YOANN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(83, 'MILLAN', 'LUCA', 11, '2003-11-01', 12, 5, 9, NULL, NULL, NULL, NULL, '2545688710', NULL, 'images/photo/MILLAN LUCA.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(84, 'MOREL', 'VALENTIN', 11, '2003-06-27', 12, 5, 9, NULL, NULL, NULL, NULL, '2545591307', NULL, 'images/photo/MOREL VALENTIN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(87, 'PETOT', 'ALEXANDRE', 12, '2002-07-13', 12, 5, 10, NULL, NULL, NULL, NULL, '2545017219', NULL, 'images/photo/PETOT ALEXANDRE.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(88, 'PONCHON', 'MAXIME', 12, '2002-01-20', 12, 5, 10, NULL, NULL, NULL, NULL, '2545837545', NULL, 'images/photo/PONCHON MAXIME.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(89, 'RAZANADRASAMY', 'RYAN', 12, '2002-07-05', 12, 5, 10, NULL, NULL, NULL, NULL, '2545110943', NULL, 'images/photo/RAZANADRASAMY RYAN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(92, 'SESTITO', 'HUGO', 12, '2002-12-26', 12, 5, 10, NULL, NULL, NULL, NULL, '2546338396', NULL, 'images/photo/SESTITO HUGO.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(164, 'ALIOUCHE', 'YANIS', 10, '2004-12-03', 12, 4, 8, NULL, NULL, NULL, NULL, '2546458723', NULL, 'images/photo/ALIOUCHE YANIS.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(166, 'ARSLAN', 'EMIRCAN', 9, '2005-03-30', 12, 4, 7, NULL, NULL, NULL, NULL, '2546066967', NULL, 'images/photo/ARSLAN EMIRCAN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(167, 'BEKOUASSA', 'ADEL', 5, '2009-05-07', 12, 2, 3, NULL, NULL, NULL, NULL, '2547259968', NULL, 'images/photo/BEKOUASSA ADEL.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(169, 'BIVEN', 'BRENNAN', 9, '2005-02-03', 12, 4, 7, NULL, NULL, NULL, NULL, '2547368217', NULL, 'images/photo/BIVEN BRENNAN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(172, 'CAM', 'DIREN', 10, '2004-12-18', 12, 4, 8, NULL, NULL, NULL, NULL, '2546824815', NULL, 'images/photo/CAM DIREN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(178, 'COLIN', 'VICTOR', 8, '2006-10-05', 12, 3, 6, NULL, NULL, NULL, NULL, '2547238446', NULL, 'images/photo/COLIN VICTOR.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(180, 'DA SILVA', 'ETHAN', 6, '2008-08-13', 12, 2, 4, NULL, NULL, NULL, NULL, '2547000305', NULL, 'images/photo/DA SILVA ETHAN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(182, 'DUTASTA', 'AUGUSTIN', 9, '2005-06-04', 12, 4, 7, NULL, NULL, NULL, NULL, '2546582897', NULL, 'images/photo/DUTASTA AUGUSTIN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(186, 'GALAT', 'DAVID', 6, '2008-05-04', 12, 2, 4, 0, 0, 0, '', '2547443375', 'anatole.metz@gmail.com', NULL, NULL, 'RERNESTI', '2016-09-09 12:38:36'),
(191, 'HAMZAOUI', 'AMINE', 10, '2004-12-15', 12, 4, 8, NULL, NULL, NULL, NULL, '2546986606', NULL, 'images/photo/HAMZAOUI AMINE.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(192, 'HERZOG', 'CORENTIN', 7, '2007-09-24', 12, 3, 5, 0, 0, 0, '', '2547083554', 'laurent.herzog@numericable.fr', NULL, NULL, 'RERNESTI', '2016-09-09 12:38:36'),
(195, 'HOTTON', 'MICHEL', 5, '2009-05-30', 12, 2, 3, NULL, NULL, NULL, NULL, '2547238383', NULL, 'images/photo/HOTTON MICHEL.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(196, 'KILINC', 'FURKAN', 10, '2004-12-07', 12, 4, 8, NULL, NULL, NULL, NULL, '2546746626', NULL, 'images/photo/KILINC FURKAN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(200, 'LORRAIN', 'MATHIS', 7, '2007-11-03', 12, 3, 5, 0, 0, 0, '', '2546976707', 'juju.math57@orange.fr', NULL, NULL, 'RERNESTI', '2016-09-09 12:38:36'),
(203, 'MAURICE', 'TOM', 10, '2004-12-28', 12, 4, 8, NULL, NULL, NULL, NULL, '2546708434', NULL, 'images/photo/MAURICE TOM.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(206, 'MONKA', 'ENZO', 10, '2004-11-29', 12, 4, 8, NULL, NULL, NULL, NULL, '2546962204', NULL, 'images/photo/MONKA ENZO.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(210, 'PALAZZO', 'ANTHONY', 6, '2008-05-23', 12, 2, 4, 0, 0, 0, '', '2547000183', 'ludmilla.palazzo@gmail.com', NULL, NULL, 'RERNESTI', '2016-09-09 12:38:36'),
(211, 'PARISOT', 'GAUTHIER', 7, '2007-09-01', 12, 3, 5, 0, 0, 0, '', '2547393176', 'celine.sebastien.parisot@gmail.com', NULL, NULL, 'RERNESTI', '2016-09-09 12:38:36'),
(213, 'POUGET', 'LEO', 6, '2008-04-30', 12, 2, 4, 0, 0, 0, '', '2547346417', 'mhelpo73@gmail.com', NULL, NULL, 'RERNESTI', '2016-09-09 12:38:36'),
(214, 'PRIN', 'TEHIVA', 8, '2006-08-08', 12, 3, 6, NULL, NULL, NULL, NULL, '2547392636', NULL, 'images/photo/PRIN TEHIVA.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(215, 'RAZANADRASAMY', 'AARON', 9, '2005-11-08', 12, 4, 7, NULL, NULL, NULL, NULL, '2546314678', NULL, 'images/photo/RAZANADRASAMY AARON.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(223, 'SERSOUB', 'SELIM', 9, '2005-03-21', 12, 4, 7, NULL, NULL, NULL, NULL, '2546490545', NULL, 'images/photo/SERSOUB SELIM.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(227, 'STOCKER', 'HUGO', 9, '2005-12-13', 12, 4, 7, NULL, NULL, NULL, NULL, '2547239603', NULL, 'images/photo/STOCKER HUGO.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(229, 'THIRIET', 'TOM', 6, '2008-05-12', 12, 2, 4, 0, 0, 0, '', '2547430944', 'christophe.thiriet2@wanadoo.fr', NULL, NULL, 'RERNESTI', '2016-09-09 12:38:36'),
(230, 'VIMEUX', 'NOLAN', 5, '2009-07-19', 12, 2, 3, NULL, NULL, NULL, NULL, '2547457061', NULL, 'images/photo/VIMEUX NOLAN.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(231, 'ATTAS', 'THIBAUT', 24, '1990-12-10', 12, 9, 0, 2, 0, 0, '', '1595614545', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:24:16'),
(232, 'BASEOTTO', 'GREGOIRE', 25, '1989-05-15', 12, 9, 0, 5, 0, 0, '', '1555622934', '', 'images/photo/BASEOTTO GREGOIRE.jpg', NULL, 'GCHARBONNIER', '2015-12-13 16:37:04'),
(233, 'BECK', 'ARNAUD', 28, '1986-01-03', 12, 9, 0, 6, 0, 0, '', '1529556044', '', 'images/photo/BECK ARNAUD.jpg', NULL, 'GCHARBONNIER', '2015-12-13 16:41:21'),
(234, 'BELHADJ', 'KHALED', 19, '1995-02-06', 12, 9, 0, 8, 0, 0, '', '2545462799', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:24:59'),
(235, 'BENAMAR', 'FAYCAL', 27, '1987-09-22', 12, 9, 0, 2, 0, 0, '', '1585624914', '', 'images/photo/BENAMAR FAYCAL.jpg', NULL, 'GCHARBONNIER', '2015-12-13 16:40:15'),
(236, 'BITTI', 'JAMEL', 31, '1983-07-04', 12, 9, 0, 8, 0, 0, '', '1545625450', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:25:19'),
(237, 'BOUR', 'FLORIAN', 22, '1992-06-13', 12, 9, 0, 1, NULL, NULL, NULL, '1585620833', NULL, 'images/photo/BOUR FLORIAN.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(238, 'CHAILLAN', 'MAXIME', 25, '1989-01-21', 12, 9, 0, 4, 0, 0, '', '1565616906', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:25:48'),
(239, 'CHARBONNIER', 'GEOFFREY', 26, '1988-05-19', 12, 9, 0, 1, NULL, NULL, NULL, '2543862986', NULL, 'images/photo/CHARBONNIER GEOFFREY.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(242, 'DELLA SCAFFA', 'NICOLAS', 23, '1991-01-29', 12, 9, 0, 3, 0, 0, '', '1575619880', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:26:52'),
(243, 'DEZALIS', 'SEBASTIEN', 25, '1989-02-28', 12, 9, 0, 2, 0, 0, '', '1595613235', '', 'images/photo/DEZALIS SEBASTIEN.jpg', NULL, 'GCHARBONNIER', '2015-12-13 16:37:04'),
(244, 'DI GUISEPPE', 'BENITO', 57, '1957-02-17', 12, 10, 0, 1, NULL, NULL, NULL, '2545896296', NULL, 'images/photo/DI GUISEPPE BENITO.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(246, 'FATHOLLAHZADEH', 'NAVID', 25, '1989-01-14', 12, 9, 0, 3, 0, 0, '', '1565615494', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:27:42'),
(247, 'GARCIA', 'MARC', 49, '1965-02-13', 12, 10, 0, 1, NULL, NULL, NULL, '1539559228', NULL, 'images/photo/GARCIA MARC.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(249, 'ISSADI', 'THOMAS', 24, '1990-07-11', 12, 9, 0, 1, NULL, NULL, NULL, '1585617074', NULL, 'images/photo/ISSADI THOMAS.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(250, 'JOSEPH', 'ALEXANDRE', 28, '1986-12-30', 12, 9, 0, 4, 0, 0, '', '1529554525', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:28:11'),
(251, 'KERNER', 'NICOLAS', 24, '1990-04-22', 12, 9, 0, 6, 0, 0, '', '1565621504', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:28:27'),
(252, 'KIEFER', 'MATHIEU', 22, '1992-04-25', 12, 9, 0, 2, 0, 0, '', '1585624519', '', 'images/photo/KIEFER MATHIEU.jpg', NULL, 'GCHARBONNIER', '2015-12-13 16:37:04'),
(253, 'LAUVAUX', 'MATTHIEU', 24, '1990-04-27', 12, 9, 0, 1, NULL, NULL, NULL, '2545905505', NULL, 'images/photo/LAUVAUX MATTHIEU.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(256, 'LEGRIS', 'JEAN PHILIPPE', 21, '1993-05-27', 12, 9, 0, 1, NULL, NULL, NULL, '2547259660', NULL, 'images/photo/LEGRIS JEAN PHILIPPE.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(257, 'LUSNIA', 'JEREMY', 29, '1985-07-08', 12, 9, 0, 5, 0, 0, '', '1529556882', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:29:18'),
(258, 'LY', 'MINH', 42, '1972-09-04', 12, 10, 0, 3, 0, 0, '', '1590529262', '', 'images/photo/LY MINH.jpg', NULL, 'GCHARBONNIER', '2015-12-13 16:37:04'),
(259, 'MILLAN', 'FREDERIC', 39, '1975-08-13', 12, 10, 0, 1, NULL, NULL, NULL, '1539571604', NULL, 'images/photo/MILLAN FREDDY.jpg', NULL, 'TSUTTER', '2015-12-13 16:37:04'),
(262, 'OSWALD', 'SENY', 20, '1994-01-25', 12, 9, 0, 5, 0, 0, '', '2543221772', '', NULL, NULL, 'GCHARBONNIER', '2015-10-08 16:35:09'),
(264, 'PAUK', 'ADRIEN', 26, '1988-11-15', 12, 9, 0, 1, NULL, NULL, NULL, '1565623665', NULL, 'images/photo/PAUK ADRIEN.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(266, 'PIERRE', 'JONATHAN', 25, '1989-04-16', 12, 9, 0, 1, NULL, NULL, NULL, '1585620838', NULL, 'images/photo/PIERRE JONATHAN.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(267, 'PIERROT', 'JULIEN', 24, '1990-01-03', 12, 9, 0, 1, NULL, NULL, NULL, '1515616825', NULL, 'images/photo/PIERROT JULIEN JEAN GUSTAVE.jpg', NULL, 'TSUTTER', '2015-12-13 16:43:01'),
(268, 'POSTORINO', 'PIERRE', 29, '1985-09-09', 12, 9, 0, 1, NULL, NULL, NULL, '1519514063', NULL, 'images/photo/POSTORINO PIETRO.jpg', NULL, 'TSUTTER', '2015-12-13 16:38:27'),
(269, 'RAJICIC', 'KEVIN', 30, '1984-01-29', 12, 9, 0, 1, NULL, NULL, NULL, '1539562719', NULL, 'images/photo/RAJICIC KEVIN.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(270, 'RASO', 'JULIEN', 29, '1985-06-07', 12, 9, 0, 1, NULL, NULL, NULL, '1545616759', NULL, 'images/photo/RASO JULIEN.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(271, 'RODRIGUEZ DURIEZ', 'FLORIAN', 23, '1991-02-14', 12, 9, 0, 1, NULL, NULL, NULL, '1575618653', NULL, 'images/photo/RODRIGUEZ DURIEZ FLORIAN.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(273, 'SCHOUN', 'ARNAUD', 25, '1989-09-14', 12, 9, 0, 1, NULL, NULL, NULL, '1555622012', NULL, 'images/photo/SCHOUN ARNAUD.jpg', NULL, 'TSUTTER', '2015-12-13 16:38:27'),
(274, 'SIMONIN', 'PIERRE', 20, '1994-08-31', 12, 9, 0, 1, NULL, NULL, NULL, '1505636438', NULL, 'images/photo/SIMONIN PIERRE.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(275, 'SINGLIS', 'JOHAN', 23, '1991-09-04', 12, 9, 0, 1, NULL, NULL, NULL, '1505632573', NULL, 'images/photo/SINGLIS JOHAN.jpg', NULL, 'TSUTTER', '2015-12-13 16:38:27'),
(276, 'TAIBI', 'FABRICE', 38, '1976-03-05', 12, 10, 0, 1, NULL, NULL, NULL, '1539577105', NULL, 'images/photo/TAIBI FABRICE.jpg', NULL, 'TSUTTER', '2015-12-13 16:38:27'),
(277, 'JANKOWSKI', 'JEAN PHILIPPE', 18, '1996-02-07', 12, 9, 0, 1, NULL, NULL, NULL, '1525624805', NULL, 'images/photo/JANKOWSKI JEAN PHILIPPE.bmp', NULL, 'TSUTTER', '2016-09-09 12:38:36'),
(278, 'FALETIC', 'PIERRE', 47, '1967-09-12', 12, 10, 0, 1, NULL, NULL, NULL, '1539558108', NULL, 'images/photo/FALETIC PIERRE.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(279, 'FENDLER', 'DANIEL', 61, '1953-10-07', 12, 10, 0, 1, NULL, NULL, NULL, '1529551765', NULL, 'images/photo/FENDLER DANIEL.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(280, 'MERLOT', 'ERIC', 48, '1966-09-03', 12, 10, 0, 1, NULL, NULL, NULL, '1539559226', NULL, 'images/photo/MERLOT ERIC.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(281, 'RIZZA', 'ARCANGELO', 53, '1961-08-08', 12, 10, 0, 1, NULL, NULL, NULL, '1529547298', NULL, 'images/photo/RIZZA ARCANGELO.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(282, 'SCHAEFFER', 'LAURENT', 52, '1962-02-22', 12, 10, 0, 1, NULL, NULL, NULL, '1529532332', NULL, 'images/photo/SCHAEFFER LAURENT.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(283, 'WIRTZ', 'CLAUDE', 55, '1959-12-19', 12, 10, 0, 1, NULL, NULL, NULL, '1519501937', NULL, 'images/photo/WIRTZ CLAUDE.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(284, 'BRIER', 'XAVIER', 44, '1970-10-22', 9, NULL, 0, NULL, NULL, NULL, NULL, '1545610679', NULL, 'images/photo/BRIER XAVIER.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(285, 'CORNET', 'DAVID', 35, '1979-08-27', 9, NULL, 0, NULL, NULL, NULL, NULL, '2544326874', NULL, 'images/photo/CORNET DAVID.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(286, 'ETIENNE', 'ALEXANDRE', 23, '1991-07-28', 9, NULL, 0, NULL, NULL, NULL, NULL, '1575611986', NULL, 'images/photo/ETIENNE ALEXANDRE.bmp', NULL, 'TSUTTER', '2015-10-14 20:01:32'),
(291, 'PETOT', 'ERIC', NULL, '0000-00-00', 10, 5, 0, NULL, NULL, NULL, NULL, '', 'eripetot@numericable.fr ', 'images/photo/PETOT ERIC.bmp', NULL, 'TSUTTER', '2015-09-02 15:16:43'),
(292, 'MILLAN', 'FRED', NULL, '1975-08-13', 7, 0, 0, NULL, NULL, NULL, NULL, '1539571604', '', 'images/photo/MILLAN FRED.bmp', NULL, 'TSUTTER', '2015-09-03 06:22:09'),
(294, 'SPINELLI', 'ALLAN', NULL, '0000-00-00', 0, 6, 0, NULL, NULL, NULL, NULL, '', '', 'images/photo/SPINELLI ALLAN.bmp', NULL, 'AISSADI', '2015-09-02 15:16:43'),
(297, 'BOURY', 'STEPHANE', NULL, '1973-09-22', 10, 9, 0, NULL, NULL, NULL, NULL, '1529532427', '', 'images/photo/', NULL, 'TSUTTER', '2015-09-03 08:54:09'),
(299, 'NICA', 'MARCO', NULL, '1973-11-12', 10, 0, 0, NULL, NULL, NULL, NULL, '1539581315', '', NULL, NULL, 'TSUTTER', '2016-09-09 14:28:46'),
(300, 'VILLIGER', 'BENJAMIN', NULL, '1980-10-17', 10, 9, 0, NULL, NULL, NULL, NULL, '1591098578', '', 'images/photo/', NULL, 'TSUTTER', '2015-09-03 08:57:44'),
(302, 'STEIN', 'ALAIN', NULL, '0000-00-00', 11, 0, 0, NULL, NULL, NULL, NULL, '', '', 'images/photo/', NULL, 'TSUTTER', '2015-09-03 06:32:59'),
(303, 'MATOS', 'SEBASTIEN', NULL, '0000-00-00', 11, 9, 0, NULL, NULL, NULL, NULL, '', '', 'images/photo/', NULL, 'TSUTTER', '2015-09-03 06:33:22'),
(304, 'HAMZAOUI', 'MALIKA', NULL, '0000-00-00', 11, 0, 0, NULL, NULL, NULL, NULL, '', '', 'images/photo/', NULL, 'TSUTTER', '2015-09-03 06:33:47'),
(306, 'BELKHIR', 'SEMIR', NULL, '0000-00-00', 11, 0, 0, NULL, NULL, NULL, NULL, '', '', 'images/photo/', NULL, 'TSUTTER', '2015-09-03 06:35:09'),
(307, 'NICA', 'MARCO (TEAM GOAL EXPERT)', NULL, '1973-11-12', 10, 6, 0, NULL, NULL, NULL, NULL, '1539581315', '', NULL, NULL, 'AISSADI', '2016-09-27 12:36:50'),
(308, 'ANDREANI', 'CAROLE', NULL, '0000-00-00', 10, 1, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'TSUTTER', '2015-09-03 19:52:40'),
(310, 'SPINELLI', 'ALLAN', NULL, '0000-00-00', 0, 6, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'AISSADI', '2015-09-04 10:42:19'),
(312, 'SPINELI', 'RAYAN', NULL, '0000-00-00', 0, 6, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'AISSADI', '2015-09-09 08:43:15'),
(313, 'SPINELLI', 'RAYAN', NULL, '2001-07-28', 0, 5, 10, NULL, NULL, NULL, NULL, '', '', '', NULL, 'AISSADI', '2015-10-13 19:56:46'),
(314, 'SPINELLI', 'RAYAN', NULL, '2001-07-21', 0, 5, 10, NULL, NULL, NULL, NULL, '', '', '', NULL, 'AISSADI', '2015-10-13 19:56:46'),
(315, 'SPINELLI', 'RAYAN', NULL, '2001-07-21', 0, 5, 10, NULL, NULL, NULL, NULL, '', '', '', NULL, 'AISSADI', '2015-10-13 19:56:46'),
(316, 'SPINELLI', 'RAYAN', NULL, '0000-00-00', 12, 6, 0, 6, 0, 0, '', '2545204076', '', NULL, NULL, 'AISSADI', '2016-10-17 12:46:53'),
(317, 'BENTZ', 'LUCAS', NULL, '0000-00-00', 0, 6, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'AISSADI', '2015-09-15 12:18:52'),
(318, 'GOETZ', 'ANTON', NULL, '0000-00-00', 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'AISSADI', '2015-09-15 12:19:50'),
(319, 'GOETZ', 'ANTON', NULL, '0000-00-00', 0, 6, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'AISSADI', '2015-09-15 12:20:56'),
(323, 'ABEL', 'QUENTIN', NULL, '2001-03-26', 12, 6, 0, 6, 0, 0, '', '2547660950', '', NULL, NULL, 'AISSADI', '2016-10-17 12:40:45'),
(329, 'TLEMCANI', 'BADR', NULL, '0000-00-00', 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'LSUTTER', '2015-10-06 19:40:42'),
(330, 'TLEMCANI', 'SAAD', NULL, '0000-00-00', 0, 4, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'LSUTTER', '2015-10-06 19:41:22'),
(331, 'TLEMCANI', 'BADR', NULL, '2003-12-15', 0, 4, 8, NULL, NULL, NULL, NULL, '', '', '', NULL, 'LSUTTER', '2015-10-13 19:54:57'),
(332, 'TLEMCANI', 'BADR', NULL, '2003-12-15', 0, 4, 8, NULL, NULL, NULL, NULL, '', '', '', NULL, 'LSUTTER', '2015-10-13 19:54:57'),
(333, 'TLEMCANI', 'BADR', NULL, '0000-00-00', 0, 4, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'LSUTTER', '2015-10-07 19:39:29'),
(334, 'ERNESTI', 'LIVIO', NULL, '0000-00-00', 0, 2, 0, NULL, NULL, NULL, NULL, '2547665268', '', '', NULL, 'RERNESTI', '2015-10-08 16:26:31'),
(335, 'E', 'LIVIO', NULL, '0000-00-00', 0, 2, 0, NULL, NULL, NULL, NULL, '2547665268', '', '', NULL, 'RERNESTI', '2015-10-08 16:27:20'),
(341, 'TLEMCANI', 'BADR', NULL, '0000-00-00', 0, 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'LSUTTER', '2015-10-08 19:03:18'),
(342, 'ARSLAN', 'EREN', NULL, '2002-03-27', 12, 5, 10, 0, 0, 0, '', '2545017185', '', NULL, NULL, 'FGASTRINI', '2016-10-11 18:37:11'),
(343, 'TLEMCANI', 'BADR', NULL, '0000-00-00', 0, 4, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'LSUTTER', '2015-10-11 18:33:52'),
(344, 'ERNESTI', 'ROBBY', NULL, '0000-00-00', 10, 3, 0, NULL, NULL, NULL, NULL, '2547683944', 'roberto.ernesti@wanadoo.fr', NULL, NULL, 'TSUTTER', '2016-09-09 14:29:10'),
(345, 'MIKITA', 'MICKAEL', NULL, '0000-00-00', 12, 6, 0, 2, 0, 0, '', '2544393209', '', NULL, NULL, 'AISSADI', '2016-10-17 12:44:27'),
(346, 'BLAUDEZ', 'PAUL', NULL, '2000-01-04', 12, 6, 0, 6, 0, 0, '', '2544984611', '', NULL, NULL, 'AISSADI', '2016-10-17 12:40:52'),
(347, 'PATEUX', 'NICHOLAS', NULL, '2001-05-12', 12, 6, 0, 4, 0, 0, '', '2547275382', '', NULL, NULL, 'AISSADI', '2016-09-27 12:31:02'),
(350, 'BUTTAZZONI', 'ALEXIS', NULL, '2002-04-17', 12, 5, 10, 0, 0, 0, '', '2546568199', '', NULL, NULL, 'FGASTRINI', '2016-10-11 18:37:55'),
(351, 'COLIN', 'VALENTIN', NULL, '2002-04-09', 12, 5, 10, 0, 0, 0, '', '2545873242', '', NULL, NULL, 'FGASTRINI', '2016-10-11 18:38:21'),
(353, 'MERCIER', 'VALENTIN', NULL, '2002-03-13', 12, 5, 10, 0, 0, 0, '', '2544602092', '', NULL, NULL, 'FGASTRINI', '2016-10-11 18:39:46'),
(356, 'RAKOTONDRAMARO', 'THIBAUT', NULL, '0000-00-00', 12, 2, 0, 0, 0, 0, '', '2547562323', 'nicothib85@yahoo.fr', NULL, NULL, 'RERNESTI', '2015-11-05 09:33:49'),
(357, 'NESTLER', 'BO', NULL, '0000-00-00', 12, 2, 0, 0, 0, 0, '', '', 'nestlerp@gmx.de', NULL, NULL, 'RERNESTI', '2015-11-05 09:31:58'),
(358, 'MECHOUB', 'FLORIAN', NULL, '0000-00-00', 12, 2, 0, 0, 0, 0, '', '', 'b_c57@hotmail.fr', NULL, NULL, 'RERNESTI', '2015-11-05 09:30:15'),
(363, 'PREVOST', 'JEAN-CLAUDE', NULL, '0000-00-00', 11, 2, 0, NULL, NULL, NULL, NULL, '2547747296', '', '', NULL, 'RERNESTI', '2015-11-12 10:31:15'),
(366, 'GOLOMBIEWSKI', 'FANTINE', NULL, '2007-10-29', 12, 3, 5, 0, 0, 0, '', '2546574898', 'golombiewski.jp@hotmail.fr', '', NULL, 'RERNESTI', '2016-09-09 12:38:36'),
(367, 'PIERROT', 'JULIEN', NULL, '0000-00-00', 10, 0, 0, NULL, NULL, NULL, NULL, '', '', NULL, NULL, 'TSUTTER', '2016-09-09 14:29:20'),
(368, 'STEIN', 'ALAIN', NULL, '0000-00-00', 11, 3, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'RERNESTI', '2016-03-14 22:36:18'),
(369, 'OBRINGER', 'LOIC', NULL, '0000-00-00', 10, 4, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'TSUTTER', '2016-09-09 14:36:55'),
(370, 'TAIBI', 'FABRICE', NULL, '0000-00-00', 10, 9, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'TSUTTER', '2016-09-09 14:37:37'),
(371, 'NICA', 'BAPTISTE', NULL, '2000-07-22', 12, 6, 0, 7, 0, 0, '', '2544142521', '', NULL, NULL, 'AISSADI', '2016-10-17 12:45:11'),
(372, 'FEROYAN', 'DJEMALI', NULL, '2000-03-11', 12, 6, 0, 4, 0, 0, '', '2546149508', '', NULL, NULL, 'AISSADI', '2016-10-17 12:41:59'),
(373, 'DJAMMAL', 'HADI', NULL, '0000-00-00', 12, 6, 0, 1, 0, 0, '', '2544406062', '', NULL, NULL, 'AISSADI', '2016-10-17 12:50:20'),
(374, 'KERDOUNE', 'MAËL', NULL, '2001-10-23', 12, 6, 0, 2, 0, 0, '', '2545003355', '', NULL, NULL, 'AISSADI', '2016-09-27 12:30:00'),
(376, 'FARRUGIA', 'NOE', NULL, '2000-07-02', 12, 6, 0, 8, 0, 0, '', '2543939068', '', NULL, NULL, 'AISSADI', '2016-10-17 12:41:44'),
(377, 'GENEVAUX', 'JULES', NULL, '2000-06-10', 12, 6, 0, 4, 0, 0, '', '2544479437', '', NULL, NULL, 'AISSADI', '2016-09-27 12:27:49'),
(378, 'SAENEN', 'MAXENCE', NULL, '2001-04-12', 12, 6, 0, 8, 0, 0, '', '2544398491', '', NULL, NULL, 'AISSADI', '2016-10-17 12:44:55'),
(380, 'GORSE', 'BASILE', NULL, '2000-01-21', 12, 6, 0, 2, 0, 0, '', '2544460064', '', '', NULL, 'AISSADI', '2016-09-18 12:44:55'),
(382, 'CREUSAT', 'SACHA', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '2547036085', '', '', NULL, 'RERNESTI', '2016-09-22 20:57:26'),
(383, 'ERNESTI', 'LIVIO', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '2547665268', '', '', NULL, 'RERNESTI', '2016-09-22 20:58:03'),
(384, 'MEMEDOVSKI', 'GAETAN', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '2547652895', '', '', NULL, 'RERNESTI', '2016-09-22 20:58:58'),
(385, 'NESTLER', 'NILS', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '2546819628', '', '', NULL, 'RERNESTI', '2016-09-22 20:59:36'),
(386, 'PRIETO', 'HELYAS', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '2547653125', '', '', NULL, 'RERNESTI', '2016-09-22 21:00:17'),
(387, 'BAYDAR', 'MELVYN', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '2547280648', '', '', NULL, 'RERNESTI', '2016-09-22 21:01:06'),
(388, 'TAMISIER', 'DIMITRI', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '2547625610', '', '', NULL, 'RERNESTI', '2016-09-22 21:01:41'),
(389, 'MASSARO', 'NATHAN', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '', '', '', NULL, 'RERNESTI', '2016-09-22 21:02:22'),
(391, 'VU ANTON', 'MAE', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '2548054955', '', NULL, NULL, 'RERNESTI', '2016-10-13 14:28:02'),
(392, 'TAFFOU', 'SAMI', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '', '', '', NULL, 'RERNESTI', '2016-09-22 21:03:45'),
(393, 'BARROIS', 'JEAN-CHARLES', NULL, '1943-12-27', 10, 6, 0, NULL, NULL, NULL, NULL, '2545080289', '', NULL, NULL, 'AISSADI', '2016-09-27 12:36:17'),
(394, 'SOLIS', 'EDOUARD', NULL, '0000-00-00', 12, 6, 0, 7, 0, 0, '', '2544597955', '', NULL, NULL, 'AISSADI', '2016-10-17 12:46:02'),
(395, 'P', 'PABLO', NULL, '0000-00-00', 12, 6, 0, 6, 0, 0, '', '', '', '', NULL, 'AISSADI', '2016-10-07 13:26:41'),
(397, 'LINGUEHELT', 'LUCAS', NULL, '0000-00-00', 12, 6, 0, 1, 0, 0, '', '2544284971', '', NULL, NULL, 'AISSADI', '2016-10-17 12:43:29'),
(398, 'TEXEIRA', 'THEO', NULL, '0000-00-00', 12, 6, 0, 2, 0, 0, '', '2544427491', '', NULL, NULL, 'AISSADI', '2016-10-17 12:47:29'),
(400, 'BRETTSCHNEIDER', 'PAUL', NULL, '2003-03-18', 12, 5, 0, 0, 0, 0, '', '2545640798', '', '', NULL, 'FGASTRINI', '2016-10-11 18:24:32'),
(401, 'CAPITAINE', 'MATTHIEU', NULL, '2003-08-19', 12, 5, 0, 0, 0, 0, '', '', '', '', NULL, 'FGASTRINI', '2016-10-11 18:25:53'),
(402, 'CONREAUX', 'QUENTIN', NULL, '2003-03-03', 12, 5, 0, 0, 0, 0, '', '2547050701', '', NULL, NULL, 'FGASTRINI', '2016-10-11 18:27:28'),
(403, 'DIBERNARDI', 'MILANO', NULL, '2003-08-10', 12, 5, 0, 0, 0, 0, '', '2547708873', '', '', NULL, 'FGASTRINI', '2016-10-11 18:28:41'),
(404, 'FATELA', 'LOUIS', NULL, '2003-01-31', 12, 5, 0, 0, 0, 0, '', '2546036329', '', '', NULL, 'FGASTRINI', '2016-10-11 18:30:37'),
(405, 'LAGARDE', 'NATHAN', NULL, '2003-12-04', 12, 5, 0, 0, 0, 0, '', '2547746885', '', '', NULL, 'FGASTRINI', '2016-10-11 18:31:59'),
(406, 'ROMAIN', 'HUGO', NULL, '2003-12-24', 12, 5, 0, 1, 0, 0, '', '2545498459', '', '', NULL, 'FGASTRINI', '2016-10-11 18:33:09'),
(407, 'RRECAJ', 'AJVAZ', NULL, '2003-04-03', 12, 5, 0, 0, 0, 0, '', '2546980348', '', '', NULL, 'FGASTRINI', '2016-10-11 18:34:11'),
(408, 'SINNIG', 'THOMAS', NULL, '2003-08-27', 12, 5, 0, 0, 0, 0, '', '', '', '', NULL, 'FGASTRINI', '2016-10-11 18:34:49'),
(409, 'TLEMCANI', 'BADR', NULL, '2003-12-15', 12, 5, 0, 0, 0, 0, '', '2546196927', '', '', NULL, 'FGASTRINI', '2016-10-11 18:35:34'),
(410, 'TLEMCANI', 'SAAD', NULL, '2003-02-20', 12, 5, 0, 0, 0, 0, '', '2546196923', '', '', NULL, 'FGASTRINI', '2016-10-11 18:36:21'),
(411, 'VACCARELLA', 'THOMAS', NULL, '2003-12-03', 12, 5, 0, 0, 0, 0, '', '', '', '', NULL, 'FGASTRINI', '2016-10-11 18:36:55'),
(412, 'PANIZZI', 'AXEL', NULL, '2002-01-27', 12, 5, 0, 0, 0, 0, '', '', '', '', NULL, 'FGASTRINI', '2016-10-11 18:40:38'),
(413, 'TUFEKOVIC-RUZZA', 'ADRIEN', NULL, '2002-04-14', 12, 5, 0, 0, 0, 0, '', '', '', '', NULL, 'FGASTRINI', '2016-10-11 18:42:10'),
(414, 'GERARD', 'PHILIPPE', NULL, '0000-00-00', 11, 3, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, 'RERNESTI', '2016-10-13 14:28:36'),
(415, 'LUCIANI', 'THEO', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '', '', '', NULL, 'RERNESTI', '2016-10-13 14:29:39'),
(416, 'ADZIZ', 'FURKAN', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '', '', '', NULL, 'RERNESTI', '2016-10-13 14:30:05'),
(417, 'KIRAC', 'FATIH', NULL, '0000-00-00', 12, 3, 0, 0, 0, 0, '', '', '', '', NULL, 'RERNESTI', '2016-10-13 14:30:27'),
(418, 'HOERNER', 'LO&#207;C', NULL, '2006-04-12', 12, 3, 0, 0, 0, 0, '', '', '', '', NULL, 'RERNESTI', '2016-12-17 18:54:21');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL,
  `URL` text NOT NULL,
  `ICONE` varchar(100) NOT NULL,
  `ORDRE` smallint(6) NOT NULL,
  `ACTIF` smallint(6) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `LIBELLE`, `URL`, `ICONE`, `ORDRE`, `ACTIF`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'ACCUEIL', 'ActionAccueil.php', '', 1, 1, 'TSUTTER', '2015-10-14 20:02:03'),
(2, 'CLUB', 'ActionClub.php', '', 2, 1, 'TSUTTER', '2015-10-14 20:02:03'),
(3, 'SENIORS', 'ActionJoueurs.php', '', 3, 1, 'TSUTTER', '2015-10-14 20:02:03'),
(4, 'ECOLE DE FOOT', 'ActionEcoleDeFoot.php', '', 4, 1, 'TSUTTER', '2015-10-14 20:02:03'),
(5, 'AGENDA', 'ActionAgenda.php', '', 5, 1, 'TSUTTER', '2015-10-14 20:02:03'),
(6, 'EVENEMENTS', 'ActionEvenement.php', '', 7, 1, 'TSUTTER', '2015-10-14 20:02:03'),
(7, 'PARTENAIRES', 'ActionSponsor.php', '', 8, 1, 'TSUTTER', '2015-10-14 20:02:03'),
(8, 'CONTACT', 'contact.php', '', 9, 1, 'TSUTTER', '2015-10-14 20:02:03'),
(9, 'PRESSE', 'presse.php', '', 10, 0, 'TSUTTER', '2015-10-14 20:02:03'),
(10, 'VIDEOS', 'videos.php', '', 11, 0, 'TSUTTER', '2015-10-14 20:02:03'),
(11, 'BOUTIQUE', 'boutique.php', '', 12, 0, 'TSUTTER', '2015-10-14 20:02:03'),
(12, 'CONNEXION', 'administration.php', '', 13, 0, 'TSUTTER', '2015-10-14 20:02:03'),
(13, 'CONVOCATIONS', 'ActionAfficherConvocations.php', '', 6, 0, 'TSUTTER', '2015-10-06 16:55:14');

-- --------------------------------------------------------

--
-- Structure de la table `palmares`
--

DROP TABLE IF EXISTS `palmares`;
CREATE TABLE `palmares` (
  `ID` int(11) NOT NULL,
  `ANNEE` varchar(4) NOT NULL,
  `TEXTE` varchar(500) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `palmares`
--

INSERT INTO `palmares` (`ID`, `ANNEE`, `TEXTE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, '1967', 'Champion de 3ème division de district séniors', 'TSUTTER', '2015-10-14 20:02:16'),
(2, '1973', 'Champion de 2ème division de district séniors', 'TSUTTER', '2015-10-14 20:02:16'),
(3, '1980', 'Champion de PPD séniors', 'TSUTTER', '2015-10-14 20:02:16'),
(4, '1986', 'Vainqueur de la coupe nationale FSCF vétérans +35 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(5, '1987', 'Vainqueur de la coupe nationale FSCF vétérans +35 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(6, '1988', 'Vainqueur de la coupe nationale FSCF vétérans +35 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(7, '1988', 'Finaliste régional de la coupe national des poussins', 'TSUTTER', '2015-10-14 20:02:16'),
(8, '1989', 'Finaliste régional de la coupe national des poussins', 'TSUTTER', '2015-10-14 20:02:16'),
(9, '1996', 'Vainqueur de la coupe de Moselle minimes', 'TSUTTER', '2015-10-14 20:02:16'),
(10, '2002', 'Vainqueur de la coupe de Moselle 13 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(11, '2002', 'Champion excellence 13 ans, montée au niveau ligue', 'TSUTTER', '2015-10-14 20:02:16'),
(12, '2002', 'Vainqueur du challenge du fair play 13 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(13, '2002', '1er au challenge de l\'offensive 13 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(14, '2003', 'Champion PPD séniors', 'TSUTTER', '2015-10-14 20:02:16'),
(15, '2003', 'Champion vétérans', 'TSUTTER', '2015-10-14 20:02:16'),
(16, '2003', 'Vainqueur de la coupe de Moselle vétérans', 'TSUTTER', '2015-10-14 20:02:16'),
(17, '2003', 'Vainqueur de la coupe nationale FSCF vétérans +45 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(18, '2005', '1er au challenge de l\'offensive régional 17 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(19, '2005', '2ème au challenge de l\'offensive national 17 ans (Finale à Clairefontaine)', 'TSUTTER', '2015-10-14 20:02:16'),
(20, '2006', 'Vainqueur de la coupe nationale FSCF vétérans +50 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(21, '2006', 'Finaliste départemental de la coupe national des benjamins', 'TSUTTER', '2015-10-14 20:02:16'),
(22, '2006', 'Finaliste départemental du championnat Honneur des benjamins', 'TSUTTER', '2015-10-14 20:02:16'),
(23, '2007', 'Champion PPD séniors', 'TSUTTER', '2015-10-14 20:02:16'),
(24, '2007', 'Vainqueur de la coupe de Moselle 18 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(25, '2007', 'Vainqueur de la coupe nationale FSCF vétérans +45 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(26, '2007', 'Finaliste départemental de la coupe national des benjamins (9ème place)', 'TSUTTER', '2015-10-14 20:02:16'),
(27, '2007', 'Finaliste départemental du championnat Honneur des benjamins (4ème place)', 'TSUTTER', '2015-10-14 20:02:16'),
(28, '2007', 'Finaliste régional de la coupe nationale des benjamins', 'TSUTTER', '2015-10-14 20:02:16'),
(29, '2007', 'Finaliste régional du championnat Honneur des benjamins', 'TSUTTER', '2015-10-14 20:02:16'),
(30, '2008', 'Vainqueur de la coupe de Moselle 18 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(31, '2008', 'Champion 1ère division de district séniors, montée au niveau ligue', 'TSUTTER', '2015-10-14 20:02:16'),
(32, '2008', 'Finaliste départemental et régional futsal 13 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(33, '2009', '2ème en championnat régional PHR séniors, montée en Promotion d\'Honneur grâce au fair play', 'TSUTTER', '2015-10-14 20:02:16'),
(34, '2010', 'Champion de district en U17', 'TSUTTER', '2015-10-14 20:02:16'),
(35, '2010', 'Vainqueur de la coupe de Moselle U17', 'TSUTTER', '2015-10-14 20:02:16'),
(36, '2010', 'Vainqueur de la coupe nationale FSCF vétérans +50 ans', 'TSUTTER', '2015-10-14 20:02:16'),
(37, '2011', 'Champion de district en U19', 'TSUTTER', '2015-10-14 20:02:16'),
(38, '2014', 'Champion 1ère division de district séniors, montée au niveau ligue', 'TSUTTER', '2015-10-14 20:02:16'),
(39, '2014', 'Champion 3ème division de district séniors (équipe 2)', 'TSUTTER', '2015-10-14 20:02:16'),
(40, '2014', 'Finaliste de la coupe de Moselle séniors', 'TSUTTER', '2015-10-14 20:02:16'),
(41, '2014', 'Finaliste de la coupe de Moselle des équipes réserves séniors', 'TSUTTER', '2015-10-14 20:02:16');

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

DROP TABLE IF EXISTS `parcours`;
CREATE TABLE `parcours` (
  `id` int(11) NOT NULL,
  `MEMBRE` int(11) NOT NULL,
  `CLUB` varchar(100) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`id`, `MEMBRE`, `CLUB`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 5, 'AS ST JULIEN', 'ADMIN', '2014-11-17 15:13:40'),
(2, 1, 'ES METZ', 'ADMIN', '2014-11-17 15:14:08'),
(3, 1, 'AS ST JULIEN', 'ADMIN', '2014-11-17 15:14:08');

-- --------------------------------------------------------

--
-- Structure de la table `photo_article`
--

DROP TABLE IF EXISTS `photo_article`;
CREATE TABLE `photo_article` (
  `ARTICLE` int(11) NOT NULL,
  `PHOTO` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `photo_article`
--

INSERT INTO `photo_article` (`ARTICLE`, `PHOTO`) VALUES
(4, 'monteePHR.jpg'),
(5, 'featured-side-3.jpg'),
(6, 'featured-side-2.jpg'),
(7, 'choucroute.gif'),
(8, 'travaux_stade.jpg'),
(9, 'repriseJeunes2014.jpg'),
(13, 'u11TournoiSalle.jpg'),
(16, 'ermont2014.jpg'),
(18, 'ecran1.png'),
(19, '20150209_133738.jpg'),
(20, 'CAM00711.jpg'),
(21, 'Botev Vratza 9.jpg'),
(22, 'coupes3.jpg'),
(23, 'TempliersNandrins2015.jpg'),
(24, 'recrutement.png'),
(25, 'reprisefoot.jpg'),
(26, 'DSC_2876.jpg'),
(27, 'DSC_3104.jpg'),
(28, 'DSC_3138.jpg'),
(29, 'DSC_3121.jpg'),
(30, 'teamGoalExpert2.png'),
(31, 'agendaWeekEnd.jpg'),
(32, 'IMG_0124.JPG'),
(33, 'IMG_0128.JPG'),
(34, 'IMG_0131.JPG'),
(37, 'U9_3_oct_2015.jpg'),
(38, 'U9_10_oct_2015.JPG'),
(39, 'U9_17_oct_2015.JPG'),
(40, 'tournoi.jpg'),
(41, 'DSC_0073.JPG'),
(41, 'DSC_0252.JPG'),
(41, 'DSC_0264.JPG'),
(41, 'DSC_0306.JPG'),
(41, 'tournoi.jpg'),
(42, 'U8_3_oct_2015.jpg'),
(43, 'U8_17_oct_2015.jpg'),
(44, 'U9_7_nov_2015.jpg'),
(45, 'U9_14_nov_2015.JPG'),
(46, 'u11.jpg'),
(47, 'U9_21_nov_15.jpg'),
(48, 'u11.jpg'),
(49, 'U8_5_déc_2015.jpg'),
(50, 'U8_5_déc_2015.jpg'),
(51, 'U8_7_déc_2015.jpg'),
(52, 'Futsal1.jpg'),
(53, 'U8_9_déc_2015.jpg'),
(54, 'U8_7_déc_2015.jpg'),
(55, 'Winter Leaves.jpg'),
(56, 'bonneAnnee.jpg'),
(57, 'agendaWeekEnd.jpg'),
(58, 'agendaWeekEnd.jpg'),
(59, 'P1010004.JPG'),
(59, 'P1010005.JPG'),
(59, 'P1010006.JPG'),
(59, 'P1010007.JPG'),
(59, 'P1010008.JPG'),
(59, 'P1010013.JPG'),
(59, 'P1010014.JPG'),
(59, 'P1010016.JPG'),
(60, 'P1010002.JPG'),
(60, 'P1010004.JPG'),
(60, 'P1010005.JPG'),
(60, 'P1010006.JPG'),
(60, 'P1010007.JPG'),
(60, 'P1010008.JPG'),
(61, 'P1010002.JPG'),
(62, 'P1010002.JPG'),
(62, 'P1010004.JPG'),
(62, 'P1010005.JPG'),
(62, 'P1010006.JPG'),
(62, 'P1010007.JPG'),
(62, 'P1010008.JPG'),
(63, 'P1010002.JPG'),
(63, 'P1010005.JPG'),
(63, 'P1010006.JPG'),
(63, 'P1010007.JPG'),
(63, 'P1010008.JPG'),
(64, 'P1010002.JPG'),
(64, 'P1010004.JPG'),
(64, 'P1010005.JPG'),
(64, 'P1010006.JPG'),
(64, 'P1010007.JPG'),
(64, 'P1010008.JPG'),
(65, 'CAM00936.jpg'),
(65, 'CAM00942.jpg'),
(65, 'CAM00957.jpg'),
(65, 'IMG_0141.JPG'),
(65, 'P1010457.JPG'),
(65, 'P1010461.JPG'),
(66, 'amical5dec15.jpg'),
(67, 'repas12mars2016.jpg'),
(68, 'couvertureJ50.jpg'),
(69, 'remisegenerale.png'),
(70, '5mars2016.jpg'),
(71, 'affiche2016.png'),
(72, '12mars2016.jpg'),
(73, 'affiche2016.png'),
(73, 'belgique.png'),
(73, 'bulgarie.png'),
(74, 'apmmetz-u11.jpg'),
(75, 'apmmetz-u11.jpg'),
(75, 'apmmetz-u13.jpg'),
(76, 'ermont-u11.jpg'),
(76, 'ermont-u13.png'),
(77, 'barlleduc-u13.jpg'),
(78, 'escn-u11.jpg'),
(78, 'escn-u13.jpg'),
(79, 'fcthionville-u11-1-min.jpg'),
(79, 'fcthionville-u11-1.jpg.JPG'),
(79, 'fcthionville-u11-2.jpg'),
(79, 'fcthionville-u11-2.jpg.JPG'),
(79, 'fcthionville-u13-min.jpg'),
(80, 'ftm-liverdun-u13.jpg'),
(81, 'senart.jpg'),
(82, 'templiers-u11-min.jpg'),
(82, 'templiers-u12-min.jpg'),
(82, 'templiers-u13-min.jpg'),
(83, '1erTourCoupeDeFrance.jpg'),
(84, 'barlleduc-u13.jpg'),
(84, 'templiers-u11-min.jpg'),
(85, 'llf.png'),
(86, 'U830avril2016.jpg'),
(87, '30avril2016.jpg'),
(88, 'U85mai2016.jpg'),
(89, 'U9Dombasle.JPG'),
(90, '7mai2016.JPG'),
(91, 'llf.png'),
(92, 'agenda.jpg'),
(93, 'DSC_0258-min.JPG'),
(94, '14maiMarange.JPG'),
(95, 'tournoisixte.jpg'),
(96, 'agenda4.jpg'),
(97, 'visuel_recrutement.jpg'),
(98, 'affiche-min.jpg'),
(99, 'devenirarbitre.jpg'),
(100, 'agenda.jpg'),
(101, 'ford.jpg'),
(102, 'SoireeCouscous.png'),
(103, '20160924U11.jpg'),
(104, 'pic01.jpg'),
(104, 'pics01.jpg'),
(105, 'CAM01338.jpg'),
(105, 'CAM01346.jpg'),
(105, 'CAM01367.jpg'),
(105, 'CAM01370.jpg'),
(105, 'P1010014.JPG'),
(106, 'CAM01339.jpg'),
(106, 'CAM01346.jpg'),
(106, 'CAM01366.jpg'),
(106, 'P1010014.JPG'),
(107, 'CHATEL.jpg'),
(108, 'DECEMBRE.JPG'),
(109, 'BOWLING.jpg'),
(110, 'IMG_0862.jpg'),
(110, 'IMG_0863.jpg'),
(110, 'IMG_0865.jpg'),
(110, 'IMG_0866.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

DROP TABLE IF EXISTS `poste`;
CREATE TABLE `poste` (
  `id` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `poste`
--

INSERT INTO `poste` (`id`, `LIBELLE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'GARDIEN', 'TSUTTER', '2015-10-14 20:03:23'),
(2, 'DEFENSEUR LATERAL', 'TSUTTER', '2015-10-14 20:03:23'),
(3, 'DEFENSEUR CENTRAL', 'TSUTTER', '2015-10-14 20:03:23'),
(4, 'MILIEU DEFENSIF', 'TSUTTER', '2015-10-14 20:03:23'),
(5, 'MILIEU LATERAL', 'TSUTTER', '2015-10-14 20:03:23'),
(6, 'MILIEU OFFENSIF', 'TSUTTER', '2015-10-14 20:03:23'),
(7, 'AILIER', 'TSUTTER', '2015-10-14 20:03:23'),
(8, 'AVANT CENTRE', 'TSUTTER', '2015-10-14 20:03:23');

-- --------------------------------------------------------

--
-- Structure de la table `reglement`
--

DROP TABLE IF EXISTS `reglement`;
CREATE TABLE `reglement` (
  `ID` int(11) NOT NULL,
  `TITRE` varchar(50) NOT NULL,
  `TEXTE` varchar(500) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reglement`
--

INSERT INTO `reglement` (`ID`, `TITRE`, `TEXTE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'Article 1', 'Tout affilié de l\'AS Saint Julien Les Metz, membre ou licencié, s\'engage à respecter dans son intégralité le présent règlement, les statuts du club, la charte ainsi que le règlement de fonctionnement et doit adhérer aux projets du club. ', 'TSUTTER', '2015-10-14 20:03:45'),
(2, 'Article 2', 'Selon les statuts du club, les membres du bureau gérent les actions sous l\'autorité du président et en concertation avec les membres du comité. ', 'TSUTTER', '2015-10-14 20:03:45'),
(3, 'Article 3', 'Tout joueur, dirigeant, délégué, entraineur ou arbitre de l\'AS Saint Julien Les Metz doit être en possession d\'une licence signée et validée par avis médical. Cette licence doit être intégralement payée pour les joueurs. Tout manquement à cet article entrainera une interdction d\'entrée sur les terrains et la pratique du football en compétition. ', 'TSUTTER', '2015-10-14 20:03:45'),
(4, 'Article 4', 'Tout licencié ou membre se doit de respecter les infrastructures du club, le matériel mis à disposition, les instances dirigeantes du club ainsi que le corps arbitral. ', 'TSUTTER', '2015-10-14 20:03:45'),
(5, 'Article 5', 'Tout membre de l\'association se doit de respecter les règles du fair-play à l\'égard des autres memmbres et de l\'ensemble des visiteurs (joueurs, arbitres, spectateurs, etc...). ', 'TSUTTER', '2015-10-14 20:03:45'),
(6, 'Article 6', 'Tout joueur doit être présent aux entrainements et honorer les convocations aux matchs. En cas d\'empêchement, il doit avertir son entraineur le plus rapidement possible. Tout joueur absent ou en retard à l\'entrainement sans raison valable donnée à l\'entraineur est passible d\'une sanction. ', 'TSUTTER', '2015-10-14 20:03:45'),
(7, 'Article 7', 'Tout entraineur doit s\'assurer que les joueurs mineurs sous sa responsabilité au départ du club voyagent à l\'exterieur en toute sécurité. En cas de doute, il a la possibilité de retarder le départ, voire d\'annuler le déplacement. ', 'TSUTTER', '2015-10-14 20:03:45'),
(8, 'Article 8', 'Tout joueur se doit de s\'informer de la suffisance des moyens de locomotion en cas de déplacement. Pour les joueurs mineurs, les parents ne doivent pas déposer leur enfant sans savor avec qui et comment celui-ci va se rendre à l\'extérieur du club. ', 'TSUTTER', '2015-10-14 20:03:45'),
(9, 'Article 9', 'Tout joueur de moins de 13 ans doit être accompagné d\'un parent ou tuteur jusqu\'à sa prise en charge par un membre dirigeant ou un éducateur. De même, tout joueur de moins de 13 ans ne peut quitter l\'enceinte du club sans être accompagnê d\'un parent, d\'un tuteur, d\'une personne mandatée. Jusqu\'à son départ le joueur de moins de 13 ans reste sous la responsabilité de son éducateur. ', 'TSUTTER', '2015-10-14 20:03:45'),
(10, 'Article 10', 'Tout joueurde moins de 18 ans reste sous la responsabilité de son éducateur jusqu\'à se sortie de I\'enceinte du club. Il sera donc soumis à son autorité. ', 'TSUTTER', '2015-10-14 20:03:45'),
(11, 'Article 11', ' Tout entraîneur et tout joueur s\'engage à honorer les couleurs du club (Short et chaussettes aux couleurs du club étant le minimum). ', 'TSUTTER', '2015-10-14 20:03:45'),
(12, 'Article 12', 'Le présent règlement est susceptible d\'être modifié par décision des membres du bureau et du président. En cas de modification, un avenant sera remis aux membres du club pour priàe de connaissance et signature. ', 'TSUTTER', '2015-10-14 20:03:45'),
(13, 'Article 13', 'L\'introduction et ou la consommation de substances classées stupêfiantes sera suivie d\'une sanction pouvant aller jusqu\'à l\'exclusion. ', 'TSUTTER', '2015-10-14 20:03:45'),
(14, 'Article 14', 'Tout manquement sera passible d\'une convocation en conseil de discipline (dont le règlement peut être consulté au secrêtariat du club). En cas d\'amende, le membre responsable devra assumer les conÀéquences financières pour le club. ', 'TSUTTER', '2015-10-14 20:03:45');

-- --------------------------------------------------------

--
-- Structure de la table `rencontre`
--

DROP TABLE IF EXISTS `rencontre`;
CREATE TABLE `rencontre` (
  `id` int(11) NOT NULL,
  `COMPETITION` smallint(6) NOT NULL,
  `JOUR` date NOT NULL,
  `EQUIPE_DOM` varchar(50) NOT NULL,
  `EQUIPE_EXT` varchar(50) NOT NULL,
  `SCORE_DOM` smallint(6) NOT NULL,
  `SCORE_EXT` smallint(6) NOT NULL,
  `STATUT` smallint(6) NOT NULL DEFAULT '0',
  `HEURE_RDV` time NOT NULL,
  `LIEU_RDV` varchar(50) NOT NULL,
  `COMMENTAIRE_RDV` varchar(500) NOT NULL,
  `HEURE_MATCH` time NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rencontre`
--

INSERT INTO `rencontre` (`id`, `COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 1, '2014-08-31', 'ST JULIEN', 'ES WOIPPY', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(2, 1, '2014-09-07', 'LAXOU SAPINIERE', 'ST JULIEN', 0, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(3, 1, '2014-09-21', 'ST JULIEN', 'ST MIHIEL', 0, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(4, 1, '2014-10-05', 'DELME SOLGNE', 'ST JULIEN', 1, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(5, 1, '2014-10-19', 'ST JULIEN', 'VELAINES', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(6, 1, '2014-10-26', 'ST JULIEN', 'VILLEY ST ETIENNE', 0, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(7, 1, '2014-11-02', 'NEUVES MAISONS 2', 'ST JULIEN', 2, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(8, 1, '2014-11-09', 'ST JULIEN', 'TRONVILLE', 1, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(9, 1, '2014-11-23', 'HANNONVILLE', 'ST JULIEN', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TEST', '2015-10-14 20:04:54'),
(10, 1, '2014-11-30', 'ST JULIEN', 'RICHARDMENIL', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TEST', '2015-10-14 20:04:54'),
(11, 1, '2015-02-08', 'DEVANT LES PONTS', 'ST JULIEN', 0, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(12, 1, '2015-02-22', 'ST JULIEN', 'LAXOU SAPINIERE', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(13, 1, '2015-03-22', 'ST MIHIEL', 'ST JULIEN', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(15, 1, '2015-03-15', 'VELAINES', 'ST JULIEN', 4, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(16, 1, '2015-03-29', 'VILLEY ST ETIENNE', 'ST JULIEN', 1, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(17, 1, '2015-04-12', 'ST JULIEN', 'NEUVES MAISONS 2', 5, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(18, 1, '2015-04-26', 'TRONVILLE', 'ST JULIEN', 4, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(19, 1, '2015-05-03', 'ST JULIEN', 'HANNONVILLE', 1, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(20, 1, '2015-05-10', 'RICHARMENIL', 'ST JULIEN', 1, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(21, 1, '2015-05-17', 'ST JULIEN', 'DEVANT LES PONTS', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(22, 1, '2015-05-31', 'ES WOIPPY', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(23, 2, '2014-08-31', 'DEVANT LES  PONTS 2', 'ST JULIEN 2', 5, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(24, 2, '2014-09-07', 'ST JULIEN 2', 'LA MAXE', 1, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(25, 2, '2014-09-21', 'MOULINS LES METZ', 'ST JULIEN 2', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(26, 2, '2014-10-05', 'ST JULIEN 2', 'VIGY', 4, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(27, 2, '2014-10-19', 'LES COTEAUX', 'ST JULIEN 2', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'AMIN', '2014-11-10 11:18:28'),
(28, 2, '2014-10-26', 'CO METZ 2', 'ST JULIEN 2', 1, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(29, 2, '2014-11-02', 'ST JULIEN 2', 'PIERREVILLERS', 2, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(30, 2, '2014-11-09', 'CUVRY', 'ST JULIEN 2', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(31, 2, '2014-11-23', 'ST JULIEN 2', 'ES MAIZIERES 2', 6, 0, 1, '00:00:00', '', '', '00:00:00', 'TEST', '2015-10-14 20:04:54'),
(32, 2, '2015-03-08', 'LA MAXE', 'ST JULIEN 2', 1, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(33, 2, '2015-03-15', 'ST JULIEN 2', 'MOULINS LES METZ', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(34, 2, '2015-03-29', 'VIGY', 'ST JULIEN 2', 4, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(35, 2, '2015-04-12', 'ST JULIEN 2', 'LES COTEAUX', 4, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(36, 2, '2015-04-26', 'ST JULIEN 2', 'CO METZ 2', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(37, 2, '2015-05-03', 'PIERREVILLERS', 'ST JULIEN 2', 3, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(38, 2, '2015-05-10', 'ST JULIEN 2', 'CUVRY', 0, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(39, 2, '2015-05-17', 'ES MAIZIERES 2', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(40, 2, '2015-05-31', 'ST JULIEN 2', 'DEVANT LES PONTS 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(41, 3, '2014-09-14', 'MOULINS LES METZ', 'ST JULIEN', 6, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(42, 3, '2014-09-20', 'ST JULIEN', 'MARLY 2', 6, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(43, 3, '2014-09-24', 'BAN ST MARTIN', 'ST JULIEN', 1, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(44, 3, '2014-10-11', 'NOVEANT', 'ST JULIEN', 3, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(45, 3, '2014-10-25', 'ST JULIEN', 'ES WOIPPY', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(46, 3, '2014-11-11', 'MONTIGNY LES METZ', 'ST JULIEN', 2, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(47, 3, '2014-11-15', 'ST JULIEN', 'PLANTIERES 2', 10, 0, 1, '00:00:00', '', '', '00:00:00', 'TEST', '2015-10-14 20:04:54'),
(48, 3, '2014-11-23', 'PELTRE', 'ST JULIEN', 1, 4, 1, '00:00:00', '', '', '00:00:00', 'TEST', '2015-10-14 20:04:54'),
(49, 3, '2014-11-29', 'ST JULIEN', 'ES METZ 2', 6, 1, 1, '00:00:00', '', '', '00:00:00', 'TEST', '2015-10-14 20:04:54'),
(50, 4, '2014-09-13', 'ST JULIEN', 'APM 3', 5, 6, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(51, 4, '2014-09-20', 'BECHY', 'ST JULIEN', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(52, 4, '2014-09-27', 'ST JULIEN', 'COURCELLES / NIED 2', 11, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(53, 4, '2014-10-11', 'ST JULIEN', 'MOULINS LES METZ', 2, 6, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(54, 4, '2014-11-08', 'ESAP', 'ST JULIEN', 8, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(55, 4, '2014-11-15', 'ST JULIEN', 'ES WOIPPY', 1, 3, 1, '00:00:00', '', '', '00:00:00', 'TEST', '2015-10-14 20:04:54'),
(56, 4, '2014-11-22', 'MONTIGNY LES METZ 2', 'ST JULIEN', 1, 3, 1, '00:00:00', '', '', '00:00:00', 'TEST', '2015-10-14 20:04:54'),
(59, 10, '2015-01-10', 'CHATEL', 'ST JULIEN', 1, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(62, 18, '2015-03-07', 'MARLY', 'ST JULIEN', 6, 3, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-10-14 20:04:54'),
(63, 18, '2015-03-14', 'ST JULIEN', 'BECHY', 3, 3, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-10-14 20:04:54'),
(64, 18, '2015-04-25', 'APM METZ 3', 'ST JULIEN', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-10-14 20:04:54'),
(65, 18, '2015-03-28', 'ST JULIEN', 'LA GRANGE AUX BOIS', 2, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(66, 18, '2015-04-11', 'CHATEL', 'ST JULIEN', 1, 3, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-10-14 20:04:54'),
(67, 18, '2015-05-02', 'ST JULIEN', 'MOULINS LES METZ', 5, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(68, 18, '2015-05-09', 'ST JULIEN', 'MAGNY 3', 4, 2, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-10-14 20:04:54'),
(69, 18, '2105-05-16', 'DELME SOLGNE', 'ST JULIEN', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-10-14 20:04:54'),
(70, 18, '2015-05-30', 'ST JULIEN', 'DEVANT LES PONTS 2', 3, 1, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-10-14 20:04:54'),
(71, 19, '2015-03-07', 'ST JULIEN', 'AMNEVILLE 3', 0, 8, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(72, 19, '2015-03-14', 'MARANGE', 'ST JULIEN', 7, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(73, 19, '2015-03-21', 'ST JULIEN', 'MOULINS LES METZ', 2, 6, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(74, 19, '2015-03-28', 'DEVANT LES PONTS', 'ST JULIEN', 6, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(75, 19, '2015-04-11', 'ST JULIEN', 'AMANVILLERS', 4, 1, 1, '00:00:00', '', '', '00:00:00', 'AISSADI', '2015-10-14 20:04:54'),
(76, 19, '2015-05-03', 'MONTIGNY LES METZ', 'ST JULIEN', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(77, 19, '2015-05-09', 'TALANGE', 'ST JULIEN', 14, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(78, 19, '2015-05-16', 'ST JULIEN', 'ES WOIPPY', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(79, 19, '2015-05-31', 'ENNERY', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(80, 20, '2015-03-07', 'FLETRANGE', 'ST JULIEN 2', 5, 5, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(81, 20, '2015-03-14', 'ST JULIEN 2', 'COURCELLES CHAUSSY', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(82, 20, '2015-03-21', 'TETING SUR NIED', 'ST JULIEN 2', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(83, 20, '2015-03-28', 'ST JULIEN 2', 'GRANGE AUX BOIS 2', 2, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(84, 20, '2015-04-11', 'METZ ESAP 3', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(85, 20, '2015-05-02', 'ST JULIEN 2', 'COURCELLES SUR NIED 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(86, 20, '2015-05-09', 'ST JULIEN 2', 'ARS LAQUENEXY 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(87, 20, '2015-05-16', 'MONTIGNY LES METZ 2', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(88, 20, '2015-05-30', 'ST JULIEN 2', 'REMILLY', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(89, 24, '2015-03-14', 'MAGNY', 'ST JULIEN', 1, 0, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(90, 24, '2015-03-14', 'ES WOIPPY', 'ST JULIEN', 7, 0, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(91, 24, '2015-03-21', 'ST JULIEN', 'DEVANT LES PONTS', 0, 4, 1, '00:00:00', '', '', '00:00:00', 'EPETOT', '2015-10-14 20:04:54'),
(92, 24, '2015-03-21', 'ST JULIEN', 'PLANTIERES', 0, 3, 1, '00:00:00', '', '', '00:00:00', 'EPETOT', '2015-10-14 20:04:54'),
(93, 24, '2015-03-28', 'AMNEVILLE', 'ST JULIEN', 8, 0, 1, '00:00:00', '', '', '00:00:00', 'EPETOT', '2015-10-14 20:04:54'),
(94, 24, '2015-03-28', 'TREMERY', 'ST JULIEN', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'EPETOT', '2015-10-14 20:04:54'),
(95, 24, '2015-04-11', 'MARLY', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(96, 24, '2015-04-11', 'ES WOIPPY', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(97, 24, '2015-05-09', 'FC METZ 2', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(98, 24, '2015-05-09', 'AMNEVILLE', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(99, 24, '2015-05-16', 'ST JULIEN', 'FC METZ', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(100, 24, '2015-05-16', 'ST JULIEN', 'DEVANT LES PONTS', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(101, 24, '2015-05-23', 'APM METZ', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(102, 24, '2015-05-23', 'TREMERY', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(103, 24, '2015-05-30', 'FC METZ 2', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(104, 24, '2015-05-30', 'MONTIGNY', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(105, 25, '2015-03-14', 'HAGONDANGE 2', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(106, 25, '2015-03-14', 'MARANGE 2', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(107, 25, '2015-03-21', 'VIGY 2', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(108, 25, '2015-03-21', 'LA MAXE', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(109, 25, '2015-03-28', 'AMANVILLERS 2', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(110, 25, '2015-03-28', 'ARGANCY-ENNERY', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(111, 25, '2015-04-11', 'ST JULIEN 2', 'PIERREVILLERS', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(112, 25, '2015-04-11', 'ST JULIEN 2', 'MARANGE 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(113, 25, '2015-05-09', 'ST JULIEN 2', 'EXEMPT', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(114, 25, '2015-05-09', 'ST JULIEN 2', 'PIERREVILLERS', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(115, 25, '2015-05-16', 'FC WOIPPY 2', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(116, 25, '2015-05-16', 'LA MAXE', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(117, 25, '2015-05-23', 'ST JULIEN 2', 'TREMERY 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(118, 25, '2015-05-23', 'ST JULIEN 2', 'LES COTEAUX', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(119, 25, '2015-05-30', 'EXEMPT', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(120, 25, '2015-05-30', 'VIGY 2', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(121, 26, '2015-03-14', 'ST JULIEN 3', 'PANGE', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(122, 26, '2015-03-14', 'ST JULIEN 3', 'BECHY REMILLY', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(123, 26, '2015-03-21', 'DELME SOLGNE 2', 'ST JULIEN 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(124, 26, '2015-03-21', 'ES MAIZIERES 4', 'ST JULIEN 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(125, 26, '2015-03-28', 'ST JULIEN 3', 'MAGNY 4', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(126, 26, '2015-03-28', 'ST JULIEN 3', 'CUVRY', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(127, 26, '2015-04-11', 'VIGY 3', 'ST JULIEN 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(128, 26, '2015-04-11', 'PANGE 2', 'ST JULIEN 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(129, 26, '2015-05-09', 'COURCELLES CHAUSSY', 'ST JULIEN 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(130, 26, '2015-05-09', 'MAGNY 4', 'ST JULIEN 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(131, 26, '2015-05-16', 'RETONFEY', 'ST JULIEN 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(132, 26, '2015-05-16', 'DELME SOLGNE 2', 'ST JULIEN 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(133, 26, '2015-05-23', 'COURCELLES CHAUSSY', 'ST JULIEN 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(134, 26, '2015-05-23', 'PANGE 2', 'ST JULIEN 3', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(135, 26, '2015-05-30', 'CUVRY', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(136, 26, '2015-05-30', 'NOVEANT 2', 'ST JULIEN 2', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-08-17 13:30:37'),
(137, 27, '2015-08-29', 'ST JULIEN', 'CHATEL', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(138, 27, '2015-09-06', 'LAXOU SAPINIERE', 'ST JULIEN', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(139, 27, '2015-09-19', 'ST JULIEN', 'TRONVILLE', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(140, 27, '2015-10-04', 'PAGNY SUR MOSELLE 2', 'ST JULIEN', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'FTAIBI', '2015-10-14 20:04:54'),
(141, 27, '2015-10-17', 'ST JULIEN', 'DELME SOLGNE', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-24 17:51:15'),
(142, 27, '2015-10-25', 'RICHARD.FLA.MERE.MES', 'ST JULIEN', 1, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-04 08:06:52'),
(143, 27, '2015-10-31', 'ST JULIEN', 'ES WOIPPY', 0, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-04 08:07:07'),
(144, 27, '2015-11-07', 'ST JULIEN', 'LIGNY EN BARROIS', 4, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-12 07:51:46'),
(145, 27, '2015-11-22', 'MARLY', 'ST JULIEN', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-12-13 16:45:22'),
(146, 27, '2015-11-28', 'ST JULIEN', 'BAR LE DUC 2', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-12-13 16:45:55'),
(147, 27, '2015-12-13', 'NOVEANT', 'ST JULIEN', 1, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-12-13 16:46:33'),
(148, 27, '2016-02-27', 'ST JULIEN', 'LAXOU SAPINIERE', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-28 15:34:11'),
(149, 27, '2016-03-13', 'TRONVILLE', 'ST JULIEN', 1, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-17 09:52:22'),
(150, 27, '2016-03-19', 'ST JULIEN', 'PAGNY SUR MOSELLE 2', 1, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-21 10:32:19'),
(151, 27, '2016-04-03', 'DELME SOLGNE', 'ST JULIEN', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:11:27'),
(152, 27, '2016-04-09', 'ST JULIEN', 'RICHARD.FLA.MERE.MES', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:12:05'),
(153, 27, '2016-04-17', 'ES WOIPPY', 'ST JULIEN', 1, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:12:25'),
(154, 27, '2016-05-01', 'LIGNY EN BARROIS', 'ST JULIEN', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-03 09:17:02'),
(155, 27, '2016-05-07', 'ST JULIEN', 'MARLY', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-09 16:16:36'),
(156, 27, '2016-05-22', 'BAR LE DUC 2', 'ST JULIEN', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-28 06:49:21'),
(157, 27, '2016-05-29', 'ST JULIEN', 'NOVEANT', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-06-02 09:35:46'),
(158, 27, '2016-06-05', 'CHATEL', 'ST JULIEN', 2, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-06-07 14:16:56'),
(159, 28, '2015-08-30', 'ST JULIEN', 'HAUCONCOURT 2', 6, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(160, 29, '2015-08-30', 'ST JULIEN', 'RETONFEY NOISS MON 2', 5, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(161, 28, '2015-09-06', 'LES COTEAUX 2', 'ST JULIEN', 1, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(162, 28, '2015-09-20', 'ST JULIEN', 'METZ BLD EUROPE', 7, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(163, 28, '2015-10-04', 'ST JULIEN', 'HAUT PLATEAU MESSIN', 9, 1, 1, '00:00:00', '', '', '00:00:00', 'FTAIBI', '2015-10-14 20:04:54'),
(164, 28, '2015-10-18', 'DEVANT LES PONTS 3', 'ST JULIEN', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-24 17:51:15'),
(165, 28, '2015-10-25', 'ST JULIEN', 'METZ AMIS D.M.', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-04 08:06:52'),
(166, 28, '2015-11-08', 'MALROY 2', 'ST JULIEN', 0, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-12 07:51:46'),
(167, 28, '2015-11-22', 'ST JULIEN', 'LA MAXE 2', 7, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-12-13 16:45:22'),
(168, 28, '2015-11-29', 'PIERREVILLERS 2', 'ST JULIEN', 0, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-12-13 16:45:55'),
(169, 28, '2016-04-10', 'ST JULIEN', 'LES COTEAUX 2', 5, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:12:05'),
(170, 28, '2016-03-13', 'METZ BLD EUROPE', 'ST JULIEN', 2, 8, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-17 09:52:22'),
(171, 28, '2016-03-20', 'HAUT PLATEAU MESSIN', 'ST JULIEN', 1, 6, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-21 10:32:19'),
(172, 28, '2016-04-03', 'ST JULIEN', 'DEVANT LES PONTS 3', 5, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:11:27'),
(173, 28, '2016-04-17', '	METZ AMIS D.M.', 'ST JULIEN', 4, 7, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:12:25'),
(174, 28, '2016-05-01', 'ST JULIEN', 'MALROY 2', 7, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-03 09:17:02'),
(175, 28, '2016-05-08', 'LA MAXE 2', 'ST JULIEN', 1, 11, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-09 16:16:36'),
(176, 28, '2016-05-22', 'ST JULIEN', 'PIERREVILLERS 2', 7, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-28 06:49:21'),
(177, 28, '2016-05-29', 'HAUCONCOURT 2', 'ST JULIEN', 1, 9, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-06-02 09:35:46'),
(178, 29, '2015-09-06', 'ST JULIEN', 'COURCELLES CHAUSSY 2', 8, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(179, 29, '2015-09-20', 'METZ ESAP 3', 'ST JULIEN', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(180, 29, '2015-10-04', 'METZ CONQUISTADORES', 'ST JULIEN', 0, 1, 1, '00:00:00', '', '', '00:00:00', 'FTAIBI', '2015-10-14 20:04:54'),
(181, 29, '2015-10-18', 'ST JULIEN', 'EXEMPT', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-24 17:51:15'),
(182, 29, '2015-10-25', 'MONTOY FLANVILLE', 'ST JULIEN', 1, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-04 08:06:52'),
(183, 29, '2015-11-08', 'ST JULIEN', 'VANTOUX 2', 6, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-12 07:51:46'),
(184, 29, '2015-11-22', 'LA MAXE 3', 'ST JULIEN', 2, 7, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-12-13 16:45:22'),
(185, 29, '2015-11-29', 'ST JULIEN', 'ARGANCY 2', 3, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-12-13 16:45:55'),
(186, 29, '2016-04-10', 'COURCELLES CHAUSSY 2', 'ST JULIEN', 1, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:12:05'),
(187, 29, '2016-03-13', 'ST JULIEN', 'METZ ESAP 3', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-17 09:52:22'),
(188, 29, '2016-03-20', 'ST JULIEN', 'METZ CONQUISTADORES', 2, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-21 10:32:19'),
(189, 29, '2016-04-03', 'EXEMPT', 'ST JULIEN', 0, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:11:27'),
(190, 29, '2016-04-17', 'ST JULIEN', 'MONTOY FLANVILLE', 7, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:12:25'),
(191, 29, '2016-05-01', 'VANTOUX 2', 'ST JULIEN', 0, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-03 09:17:02'),
(192, 29, '2016-05-08', 'ST JULIEN', 'LA MAXE 3', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-09 16:16:36'),
(193, 29, '2016-05-22', 'ARGANCY 2', 'ST JULIEN', 3, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-28 06:49:21'),
(194, 29, '2016-05-29', 'RETONFEY NOISS MON 2', 'ST JULIEN', 2, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-06-02 09:35:46'),
(195, 31, '2015-09-13', 'ST JULIEN', 'METZ CONQUISTADORES', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(196, 35, '2015-09-13', 'ST JULIEN', 'ARS SUR MOSELLE 2', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(197, 43, '2015-09-02', 'ST JULIEN', 'MAGNY', 5, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(198, 47, '2015-09-13', 'SAULXURES A.S.C.', 'ST JULIEN', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(199, 36, '2015-12-31', 'ST JULIEN', 'TALANGE', 4, 7, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-20 19:33:34'),
(200, 36, '2015-09-19', 'MARANGE', 'ST JULIEN', 6, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(201, 36, '2015-10-03', 'ST JULIEN', 'APM METZ 2', 0, 14, 1, '00:00:00', '', '', '00:00:00', 'AISSADI', '2015-10-14 20:04:54'),
(202, 36, '2015-10-10', 'ST JULIEN', 'BAN ST MARTIN', 0, 4, 1, '00:00:00', '', '', '00:00:00', 'AISSADI', '2015-10-14 20:04:54'),
(203, 36, '2015-10-24', 'EXEMPT', 'ST JULIEN', 0, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-24 17:52:42'),
(204, 36, '2015-11-11', 'ST JULIEN', 'FC WOIPPY', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-12 07:51:46'),
(205, 36, '2015-11-14', 'ESAP', 'ST JULIEN', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-20 19:32:48'),
(206, 36, '2015-11-21', 'ST JULIEN', 'TREMERY 2', 1, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-20 19:33:09'),
(207, 36, '2015-11-28', 'LES COTEAUX', 'ST JULIEN', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-20 19:33:20'),
(208, 37, '2015-11-08', 'BAN ST MARTIN', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '10:15:00', 'TSUTTER', '2015-11-12 07:54:48'),
(209, 37, '2015-09-19', 'ST JULIEN', 'AMANVILLERS', 0, 7, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(210, 37, '2015-10-04', 'CO METZ', 'ST JULIEN', 6, 5, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-10-14 20:04:54'),
(211, 37, '2015-10-10', 'DEVANT LES PONTS 2', 'ST JULIEN', 1, 2, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-10-14 20:04:54'),
(212, 37, '2015-10-24', 'ST JULIEN', 'EXEMPT', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-24 17:52:42'),
(213, 37, '2015-11-11', 'ES METZ', 'ST JULIEN', 5, 2, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-11-12 12:17:49'),
(215, 37, '2015-11-22', 'FC WOIPPY', 'ST JULIEN', 3, 5, 1, '09:00:00', 'WOIPPY ', '', '00:00:00', 'FGASTRINI', '2015-11-22 14:42:19'),
(216, 37, '2015-11-28', 'ST JULIEN', 'ESAP 2', 6, 1, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-11-30 15:22:40'),
(226, 38, '2015-09-12', 'ST JULIEN', 'ST AVOLD 3', 2, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(227, 38, '2015-09-19', 'ANZELING', 'ST JULIEN', 9, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(228, 38, '2015-10-03', 'ST JULIEN', 'PORCELETTE', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(229, 38, '2015-10-10', 'VOLMERANGE BOULAY', 'ST JULIEN', 0, 2, 1, '13:00:00', 'ST JULIEN', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(230, 38, '2015-11-07', 'ST JULIEN', 'CREUTZWALD 2', 4, 6, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-12 07:51:46'),
(231, 38, '2015-11-14', 'ST JULIEN', 'ESAP 2', 3, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-20 19:32:48'),
(232, 38, '2015-11-21', 'L\'HOPITAL', 'ST JULIEN', 3, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-20 19:33:54'),
(233, 48, '2015-11-11', 'ST JULIEN', 'LORRY PLAPEVILLE', 6, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-12 07:52:31'),
(234, 48, '2015-09-19', 'FC WOIPPY 2', 'ST JULIEN', 0, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(235, 48, '2015-10-03', 'ST JULIEN', 'STE MARIE CHENES 2', 0, 11, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(236, 48, '2015-10-10', 'BAN ST MARTIN 2', 'ST JULIEN', 10, 3, 1, '00:00:00', '', '', '00:00:00', 'LSUTTER', '2015-10-14 20:04:54'),
(237, 48, '2015-11-07', 'ST JULIEN', 'CHATEL', 0, 19, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-11-12 07:51:46'),
(238, 48, '2015-11-14', 'ST JULIEN', 'HAUT PLATEAU MESSIN', 1, 7, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-20 19:32:48'),
(239, 48, '2015-11-21', 'LES COTEAUX', 'ST JULIEN', 2, 6, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-20 19:34:19'),
(240, 30, '2015-09-27', 'ST JULIEN', 'ARS LAQUENEXY', 3, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(241, 41, '2015-09-26', 'TALANGE', 'ST JULIEN', 10, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(242, 35, '2015-09-27', 'MOULINS LES METZ 2', 'ST JULIEN', 0, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-14 20:04:54'),
(244, 30, '2015-10-10', 'ST JULIEN', 'FC DIEUZE', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-24 17:52:02'),
(245, 31, '2015-10-11', 'ST JULIEN', 'GRAVELOTTE', 4, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2015-10-24 17:52:02'),
(246, 35, '2015-10-11', 'ST JULIEN', 'SCY CHAZELLES 2', 6, 1, 1, '09:00:00', 'ST JULIEN', '', '10:00:00', 'TSUTTER', '2015-10-24 17:52:02'),
(247, 45, '2015-10-17', 'PELTRE', 'ST JULIEN', 3, 2, 1, '14:30:00', 'ST JULIEN', '', '00:00:00', 'TSUTTER', '2015-10-24 17:51:15'),
(249, 42, '2015-10-17', 'ST JULIEN', 'ES MAIZIERES', 1, 4, 1, '14:45:00', 'STADE ST JULIEN', '', '00:00:00', 'FGASTRINI', '2015-10-18 20:45:46'),
(252, 36, '2015-10-31', 'ST JULIEN', 'TALANGE AS', 4, 7, 1, '13:30:00', 'ST JULIEN', '', '00:00:00', 'TSUTTER', '2015-11-04 08:06:52'),
(253, 37, '2015-11-08', 'LE BAN ST MARTIN', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-11-09 16:52:31'),
(261, 37, '2015-11-14', 'ST JULIEN', 'LORRY-PLAPEVILLE', 3, 1, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2015-11-14 20:49:28'),
(265, 34, '2016-02-25', 'ST JULIEN', 'VANTOUX', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-28 15:38:38'),
(266, 34, '2016-02-07', 'ST JULIEN', 'ROMBAS C', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-21 18:18:08'),
(267, 34, '2016-02-28', 'MARLY C', 'ST JULIEN', 0, 6, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-28 15:38:55'),
(268, 34, '2016-01-21', 'ST JULIEN', 'ES METZ C', 4, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-21 18:12:31'),
(269, 34, '2016-02-21', 'ST JULIEN', 'RETONFEY', 4, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-21 18:18:24'),
(270, 34, '2016-02-02', 'ST JULIEN', 'BOUZONVILLE', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-02-21 18:17:19'),
(272, 43, '2016-02-06', 'ST JULIEN', 'MONTIGNY LES METZ', 1, 9, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-02-06 23:22:03'),
(273, 71, '2016-05-04', 'ST JULIEN', 'RS AMANVILLERS', 1, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-09 16:16:36'),
(274, 72, '2016-05-04', 'ST JULIEN', 'RS AMANVILLERS 2', 0, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-09 16:16:36'),
(275, 71, '2016-04-02', 'RS MAIZIERES', 'ST JULIEN', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:11:27'),
(276, 71, '2016-03-12', 'ES WOIPPY', 'ST JULIEN', 3, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-17 09:54:26'),
(277, 71, '2016-04-16', 'ST JULIEN', 'DEVANT LES PONTS 2', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:14:15'),
(278, 71, '2016-04-23', 'AS TALANGE', 'ST JULIEN', 3, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:14:39'),
(279, 71, '2016-04-30', 'ST JULIEN', 'UL MOYEUVRE', 1, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-03 09:17:02'),
(280, 71, '2016-05-07', 'US BAN ST MARTIN', 'ST JULIEN', 2, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-09 16:16:58'),
(281, 71, '2016-05-21', 'ST JULIEN', 'US CHATEL', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-28 06:49:21'),
(282, 71, '2016-05-28', 'STE MARIE AUX CHENES', 'ST JULIEN', 12, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-06-02 09:35:46'),
(283, 72, '2016-03-19', 'FC WOIPPY 2', 'ST JULIEN', 4, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-19 18:00:38'),
(284, 72, '2016-03-12', 'ES WOIPPY 2', 'ST JULIEN', 6, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-17 09:54:26'),
(285, 72, '2016-04-16', 'DEVANT LES PONTS 3', 'ST JULIEN', 12, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:14:15'),
(286, 72, '2016-04-23', 'METZ CO', 'ST JULIEN', 17, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-03 09:17:32'),
(287, 72, '2016-04-30', 'ST JULIEN', 'ES METZ 4', 5, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-03 09:17:40'),
(288, 72, '2016-05-07', 'LORRY PLAPEVILLE', 'ST JULIEN', 3, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-09 16:16:58'),
(289, 72, '2016-05-21', 'ST JULIEN', 'US CHATEL 2', 6, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-28 06:49:21'),
(290, 72, '2016-06-04', 'US BAN ST MARTIN 2', 'ST JULIEN', 0, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-06-07 14:16:56'),
(292, 73, '2016-03-12', 'ST JULIEN', 'METZ GRANGE AUX BOIS', 3, 0, 1, '14:00:00', 'STADE ST JULIEN', '', '00:00:00', 'FGASTRINI', '2016-03-12 18:20:37'),
(293, 73, '2016-03-20', 'AS MONTIGNY LES METZ', 'ST JULIEN', 5, 1, 1, '00:00:09', 'STADE KUNTZIG MONTIGNY', '', '00:00:00', 'FGASTRINI', '2016-03-20 15:28:10'),
(294, 73, '2016-04-02', 'ST JULIEN', 'RS MAGNY 3', 1, 4, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-04-04 09:53:42'),
(295, 73, '2016-04-23', 'ST JULIEN', 'JSO ENNERY', 0, 7, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:12:43'),
(296, 73, '2016-04-30', 'ES METZ', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-05-01 20:26:34'),
(297, 73, '2016-05-07', 'ST JULIEN', 'RS AMANVILLERS', 1, 5, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-05-08 20:02:40'),
(298, 73, '2016-05-21', 'AS TALANGE', 'ST JULIEN', 7, 1, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-05-27 11:36:04'),
(299, 73, '2016-05-28', 'ST JULIEN', 'DEVANT LES PONTS', 1, 1, 1, '16:15:00', 'ST JULIEN', '', '00:00:00', 'FGASTRINI', '2016-05-29 12:21:33'),
(300, 74, '2016-04-09', 'ST JULIEN', 'LES COTEAUX', 5, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:11:27'),
(301, 74, '2016-03-12', 'AS TALANGE', 'ST JULIEN', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-17 09:54:26'),
(302, 74, '2016-03-19', 'ST JULIEN', 'FC TREMERY 2', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-03-21 10:32:19'),
(303, 74, '2016-04-02', 'METZ ESAP 2', 'ST JULIEN', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'AISSADI', '2016-04-13 08:53:55'),
(304, 74, '2016-04-16', 'ST JULIEN', 'US BAN ST MARTIN', 5, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:12:05'),
(305, 74, '2016-04-23', 'ST JULIEN', 'AS TALANGE', 0, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-04-26 09:12:25'),
(306, 74, '2016-04-30', 'FC TREMERY 2', 'ST JULIEN', 3, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-03 09:17:02'),
(307, 74, '2016-05-07', 'ST JULIEN', 'METZ ESAP 2', 2, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-09 16:16:36'),
(308, 74, '2016-05-21', 'US BAN ST MARTIN', 'ST JULIEN', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-28 06:49:21'),
(309, 74, '2016-05-28', 'LES COTEAUX', 'ST JULIEN', 3, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-28 17:51:59'),
(310, 43, '2016-02-27', 'ST JULIEN', 'MONDELANGE', 2, 4, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-02-28 12:41:31'),
(314, 47, '2016-05-05', 'ESAP METZ', 'ST JULIEN', 2, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-05-09 16:16:36'),
(315, 73, '2016-05-05', 'MAIZIERES LES METZ', 'ST JULIEN', 4, 2, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-05-05 12:35:34'),
(316, 78, '2016-08-21', 'BAN ST MARTIN', 'ST JULIEN', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 13:24:59'),
(317, 75, '2016-08-27', 'ST JULIEN', 'SC MARLY', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-29 14:30:26'),
(318, 75, '2016-09-04', 'ES GANDRANGE', 'ST JULIEN', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-08 12:46:48'),
(319, 75, '2016-09-17', 'ST JULIEN', 'FC NOVEANT', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-19 11:08:06'),
(320, 75, '2016-10-02', 'LAXOU SAPINIERE', 'ST JULIEN', 4, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-05 09:12:33'),
(321, 75, '2016-10-15', 'ST JULIEN', 'FC MONDELANGE', 0, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-17 09:51:15'),
(322, 75, '2016-10-23', 'US VANDOEUVRE B', 'ST JULIEN', 4, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-23 16:27:33'),
(323, 75, '2016-10-29', 'ST JULIEN', 'AS VARANG ST NICOLAS', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 13:33:58'),
(324, 75, '2016-11-05', 'ST JULIEN', 'UL ROMBAS B', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 13:34:19'),
(325, 75, '2016-11-20', 'AS GRAND COURONNE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 13:37:33'),
(326, 75, '2016-11-26', 'ST JULIEN', 'US CHATEL', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 13:38:56'),
(327, 75, '2016-12-11', 'USAG UCKANGE B', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 13:39:26'),
(328, 75, '2017-02-18', 'ST JULIEN', 'ES GANDRANGE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:13:01'),
(329, 75, '2017-02-26', 'FC NOVEANT', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:13:22'),
(330, 75, '2017-03-11', 'ST JULIEN', 'LAXOU SAPINIERE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:13:54'),
(331, 75, '2017-03-19', 'FC MONDELANGE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:18:41'),
(332, 75, '2017-03-25', 'ST JULIEN', 'US VANDOEUVRE B', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:19:01'),
(333, 75, '2017-04-09', 'AS VARANG ST NICOLAS', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:20:32'),
(334, 75, '2017-04-23', 'UL ROMBAS B', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:20:55'),
(335, 75, '2017-04-29', 'ST JULIEN', 'AS GRAND COURONNE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:21:21'),
(336, 75, '2017-05-14', 'US CHATEL', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:21:40'),
(337, 75, '2017-05-21', 'ST JULIEN', 'USAG UCKANGE B', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:22:10'),
(338, 75, '2017-05-28', 'SC MARLY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:22:30'),
(339, 80, '2016-08-28', 'AS GORZE', 'ST JULIEN', 2, 3, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-29 14:30:26'),
(340, 76, '2016-09-04', 'ST JULIEN', 'AS MONTIGNY LES METZ B', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-08 12:46:48'),
(341, 76, '2016-09-18', 'SC MARLY B', 'ST JULIEN', 4, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-19 11:08:06'),
(342, 76, '2016-10-02', 'ST JULIEN', 'RETONFEY NOISEVILLE MON', 4, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-05 09:12:33'),
(343, 76, '2016-10-16', 'CSJ AUGNY', 'ST JULIEN', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-17 09:51:15'),
(344, 76, '2016-10-23', 'ST JULIEN', 'FC NOVEANT B', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-23 16:27:33'),
(345, 76, '2016-10-30', 'ST JULIEN', 'UL PLANTIERES B', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:32:02'),
(346, 76, '2016-11-06', 'COURCELLES CHAUSSY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:38:44'),
(347, 76, '2016-11-20', 'ST JULIEN', 'ES WOIPPY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:39:08'),
(348, 76, '2016-11-27', 'AS PELTRE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:39:27'),
(349, 76, '2017-03-05', 'ST JULIEN', 'SC MARLY B', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:39:52'),
(350, 76, '2017-03-12', 'RETONFEY NOISEVILLE MON', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:41:34'),
(351, 76, '2017-03-19', 'ST JULIEN', 'CSJ AUGNY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:41:53'),
(352, 76, '2017-04-02', 'FC NOVEANT B', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:42:19'),
(353, 76, '2017-04-09', 'UL PLANTIERES B', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:53:41'),
(354, 76, '2017-04-23', 'ST JULIEN', 'COURCELLES CHAUSSY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:52:56'),
(355, 76, '2017-05-07', 'ES WOIPPY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:53:32'),
(356, 76, '2017-05-21', 'ST JULIEN', 'AS PELTRE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:54:07'),
(357, 76, '2017-05-28', 'AS MONTIGNY LES METZ B', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 14:54:26'),
(358, 77, '2016-09-04', 'ST JULIEN', 'AS MONTIGNY LES METZ C', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-08 12:46:48'),
(359, 77, '2016-09-18', 'RS LA MAXE B', 'ST JULIEN', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-19 11:08:06'),
(360, 77, '2016-10-02', 'ST JULIEN', 'FC DEVANT LES PONTS C', 4, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-05 09:12:33'),
(361, 77, '2016-10-16', 'UL PLANTIERES C', 'ST JULIEN', 1, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-17 09:51:15'),
(362, 77, '2016-10-23', 'ST JULIEN', 'EXEMPT', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-23 16:27:33'),
(363, 77, '2016-10-30', 'METZ SAGE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:27:05'),
(364, 77, '2016-11-06', 'ST JULIEN', 'VANTOUX', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:27:32'),
(365, 77, '2016-11-20', 'METZ CONQUISTADORES', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:27:53'),
(366, 77, '2016-11-27', 'ST JULIEN', 'METZ ST CHRISTOPHE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:28:14'),
(367, 77, '2017-03-05', 'ST JULIEN', 'RS MAXE B', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:28:49'),
(368, 77, '2017-03-12', 'FC DEVANT LES PONTS C', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:30:43'),
(369, 77, '2017-03-19', 'ST JULIEN', 'UL PLANTIERES C', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:31:55'),
(370, 77, '2017-04-02', 'EXEMPT', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:32:13'),
(371, 77, '2017-04-09', 'ST JULIEN', 'METZ SAGE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:32:29'),
(372, 77, '2017-04-23', 'VANTOUX', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:33:15'),
(373, 77, '2017-05-07', 'ST JULIEN', 'METZ CONQUISTADORES', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:33:41'),
(374, 77, '2017-05-21', 'METZ ST CHRISTOPHE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:37:35'),
(375, 77, '2017-05-28', 'AS MONTIGNY LES METZ C', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-08-22 15:38:02'),
(376, 79, '2016-09-11', 'FC FLEURY', 'ST JULIEN', 0, 4, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-12 14:27:54'),
(377, 81, '2016-09-11', 'LS VANTOUX B', 'ST JULIEN', 1, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-12 14:27:54'),
(378, 83, '2016-09-11', 'FC WOIPPY', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-12 14:27:54'),
(379, 85, '2016-09-10', 'ST JULIEN', 'AS MONTIGNY LES METZ', 8, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-12 14:28:32'),
(380, 82, '2016-09-28', 'ES METZ', 'ST JULIEN', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-30 07:31:34'),
(381, 82, '2016-09-17', 'ST JULIEN', 'METZ ESAP 2', 2, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-19 11:08:06'),
(382, 82, '2016-10-01', 'FC PORCELETTE', 'ST JULIEN', 16, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-05 09:12:33'),
(383, 82, '2016-10-08', 'ST JULIEN', 'LONGEVILLE ST AVOLD', 3, 9, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-09 17:46:13'),
(384, 82, '2016-11-05', 'ST JULIEN', 'CREUTZWALD 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-08 13:27:22'),
(385, 82, '2016-11-12', 'ARS LAQUENEXY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-08 13:27:48'),
(386, 82, '2016-11-19', 'ST JULIEN', 'CA BOULAY 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-08 13:28:15'),
(387, 83, '2016-09-17', 'ST JULIEN', 'FC NOVEANT', 7, 1, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-09-18 06:42:56'),
(388, 83, '2016-10-02', 'FC DEVANT LES PONTS', 'ST JULIEN', 6, 1, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-10-03 18:04:49'),
(389, 83, '2016-10-08', 'ST JULIEN', 'UL PLANTIERES 2', 7, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-09 17:46:13'),
(390, 83, '2016-10-22', 'US CHATEL', 'ST JULIEN', 1, 5, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-10-23 10:52:20'),
(391, 83, '2016-11-12', 'ST JULIEN', 'AS MONTIGNY LES METZ', 3, 4, 1, '14:00:00', 'ST JULIEN', '', '00:00:00', 'FGASTRINI', '2016-11-12 19:09:00'),
(392, 83, '2016-11-20', 'METZ ESAP 2', 'ST JULIEN', 0, 8, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-11-21 20:19:55'),
(394, 84, '2016-12-24', 'ST JULIEN', 'ES METZ', 2, 11, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-12-12 21:03:22'),
(395, 84, '2016-09-18', 'AS STE MARIE AUX CHENES', 'ST JULIEN', 5, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-19 11:08:06'),
(397, 84, '2016-10-08', 'FC DEVANT LES PONTS 2', 'ST JULIEN', 5, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-09 11:22:03'),
(398, 84, '2016-10-22', 'ST JULIEN', 'VERNY LOUVIGNY CUVRY ', 0, 5, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-23 16:27:33'),
(399, 84, '2016-11-12', 'ST JULIEN', 'US BAN ST MARTIN', 0, 6, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-11-12 19:09:33'),
(400, 84, '2016-11-20', 'CO METZ', 'ST JULIEN', 0, 3, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-11-12 19:09:44'),
(401, 84, '2016-11-26', 'ST JULIEN', 'RS AMANVILLERS', 3, 2, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-11-27 21:27:25'),
(402, 84, '2016-10-29', 'EXEMPT', 'ST JULIEN', 0, 3, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-11-12 19:09:24'),
(403, 85, '2016-09-17', 'SC MARLY', 'ST JULIEN', 3, 3, 1, '00:00:00', '', '', '00:00:00', 'AISSADI', '2016-09-18 12:30:47'),
(404, 85, '2016-10-01', 'ST JULIEN', 'FC NOVEANT', 4, 2, 1, '00:00:00', '', '', '00:00:00', 'AISSADI', '2016-10-01 19:00:32'),
(405, 85, '2016-10-22', 'ST JULIEN', 'METZ APM 2', 2, 6, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-23 16:27:33'),
(406, 85, '2016-11-12', 'UL PLANTIERES 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-08 15:12:01'),
(407, 85, '2016-11-19', 'ST JULIEN', 'AS PELTRE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-08 15:12:23'),
(408, 85, '2016-11-26', 'FC WOIPPY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-08 15:12:41'),
(409, 85, '2016-10-29', 'ST JULIEN', 'ES METZ', 0, 1, 1, '00:00:00', '', '', '00:00:00', 'AISSADI', '2016-11-09 13:12:59'),
(410, 86, '2016-09-24', 'VIC SUR SEILLE', 'ST JULIEN', 1, 11, 1, '00:00:00', '', '', '00:00:00', 'AISSADI', '2016-09-25 07:49:30'),
(411, 87, '2016-09-24', 'ST JULIEN', 'ES COURCELLES SUR NIED', 5, 4, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-09-25 12:36:28'),
(412, 79, '2016-09-25', 'AS LES COTEAUX', 'ST JULIEN', 0, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-26 07:32:12'),
(413, 81, '2016-09-25', 'ST JULIEN', 'MARIEULLES VEZON B', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-09-26 07:32:12'),
(414, 84, '2016-10-01', 'ST JULIEN', 'ES WOIPPY', 1, 8, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-10-01 17:33:07'),
(415, 85, '2016-10-11', 'ST JULIEN', 'US BAN ST MARTIN', 3, 3, 1, '15:00:00', 'STADE DE GRIMONT', '', '00:00:00', 'TSUTTER', '2016-10-13 08:26:59'),
(416, 79, '2016-10-09', 'FC WOIPPY', 'ST JULIEN', 0, 0, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-09 17:46:13'),
(417, 80, '2016-10-09', 'ST JULIEN', 'PIERREVILLERS', 2, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-09 17:46:13'),
(418, 81, '2016-10-09', 'ST JULIEN', 'SC MARLY C', 3, 1, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-09 11:22:03'),
(419, 87, '2016-10-15', 'ST JULIEN', 'ES MARANGE', 0, 13, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-10-16 09:06:38'),
(420, 86, '2016-10-15', 'FC WOIPPY', 'ST JULIEN', 1, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', '2016-10-17 09:51:15'),
(421, 90, '2016-10-15', 'ST JULIEN', 'USAG UCKANGE 2', 0, 9, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-10-16 09:06:51'),
(425, 89, '2016-11-05', 'ST JULIEN', 'LONGEVILLE LES ST AVOLD', 3, 1, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-11-05 23:05:03'),
(426, 83, '2016-11-26', 'ST JULIEN', 'ES METZ 2', 8, 0, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2016-11-27 21:27:25'),
(427, 83, '2017-03-18', 'FEMININES FC METZ', 'ST JULIEN', 3, 0, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2017-03-19 08:18:58'),
(428, 83, '2017-03-25', 'ST JULIEN', 'ES METZ 2', 7, 3, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2017-03-30 19:36:44'),
(429, 83, '2017-03-31', 'VERNY-LOUVIGNY', 'ST JULIEN', 1, 0, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2017-04-20 19:30:49');
INSERT INTO `rencontre` (`id`, `COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(430, 83, '2017-04-22', 'ST JULIEN', 'CHATEL ST GERMAIN', 1, 4, 1, '00:00:00', '', '', '00:00:00', 'FGASTRINI', '2017-04-26 13:50:23');

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

DROP TABLE IF EXISTS `saison`;
CREATE TABLE `saison` (
  `id` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL,
  `ETAT` smallint(6) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `saison`
--

INSERT INTO `saison` (`id`, `LIBELLE`, `ETAT`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, '2014 / 2015', 0, 'TSUTTER', '2016-08-22 15:38:38'),
(2, '2015 / 2016', 0, 'TSUTTER', '2016-08-22 15:38:34'),
(3, '2016 / 2017', 1, 'TSUTTER', '2016-08-22 13:22:37');

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

DROP TABLE IF EXISTS `sous_categorie`;
CREATE TABLE `sous_categorie` (
  `ID` int(11) NOT NULL,
  `CATEGORIE` int(11) NOT NULL,
  `LIBELLE` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ANNEE` smallint(6) NOT NULL,
  `AUTEUR_MAJ` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`ID`, `CATEGORIE`, `LIBELLE`, `ANNEE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 1, 'U6', 2010, 'TSUTTER', '2015-10-13 19:47:36'),
(2, 1, 'U7', 2009, 'TSUTTER', '2015-10-13 19:47:36'),
(3, 2, 'U8', 2008, 'TSUTTER', '2015-10-13 19:48:03'),
(4, 2, 'U9', 2007, 'TSUTTER', '2015-10-13 19:48:03'),
(5, 3, 'U10', 2006, 'TSUTTER', '2015-10-13 19:48:32'),
(6, 3, 'U11', 2005, 'TSUTTER', '2015-10-13 19:48:32'),
(7, 4, 'U12', 2004, 'TSUTTER', '2015-10-13 19:48:53'),
(8, 4, 'U13', 2003, 'TSUTTER', '2015-10-13 19:48:53'),
(9, 5, 'U14', 2002, 'TSUTTER', '2015-10-13 19:49:13'),
(10, 5, 'U15', 2001, 'TSUTTER', '2015-10-13 19:49:13'),
(11, 6, 'U16', 2000, 'TSUTTER', '2015-10-13 19:49:38'),
(12, 6, 'U17', 1999, 'TSUTTER', '2015-10-13 19:49:38'),
(13, 7, 'U18', 1998, 'TSUTTER', '2015-10-13 19:50:00'),
(14, 7, 'U19', 1997, 'TSUTTER', '2015-10-13 19:50:00');

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL,
  `NOM` varchar(100) NOT NULL,
  `URL` text NOT NULL,
  `VIGNETTE` varchar(100) NOT NULL,
  `ADRESSE` varchar(100) DEFAULT NULL,
  `CP` varchar(10) DEFAULT NULL,
  `VILLE` varchar(100) DEFAULT NULL,
  `TEL` varchar(12) DEFAULT NULL,
  `FAX` varchar(12) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  `MESSAGE` text,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sponsor`
--

INSERT INTO `sponsor` (`id`, `NOM`, `URL`, `VIGNETTE`, `ADRESSE`, `CP`, `VILLE`, `TEL`, `FAX`, `EMAIL`, `DESCRIPTION`, `MESSAGE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'Kinepolis Saint Julien Les Metz', 'http://kinepolis.fr/splash?destination=cinemas/kinepolis-st-julien-les-metz', 'kinepolis.jpg', '10 AVENUE PAUL LANGEVIN', '57070', 'SAINT JULIEN LES METZ', '0387758450', '0387758456', '', 'Ouvert en 1995, avec 14 salles et 4014 fauteuils, le premier multiplexe Kinepolis apparu en France, totalement rénové, propose à ses spectateurs un large choix de cinémas ...', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(2, 'Credit Mutuel', 'https://www.creditmutuel.fr/', 'creditMutuel.jpg', '28 RUE JEAN BURGER', '57070', 'SAINT JULIEN LES METZ', '0820000130', '0387761683', '05004@creditmutuel.fr', 'Banque en ligne', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(3, 'Placards MAGE', 'http://www.placardsmage.fr/', 'mage_2014.jpg', 'LA BELLE FONTAINE', '57155', 'MARLY', '0387664207', '0387663904', '', 'fabrication et pose de vos placards et meubles sur mesures', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(4, 'Groupe Salmon', 'http://www.groupe-salmon.fr/', 'salmon.jpg', '28 AVENUE DE THIONVILLE', '57140', 'METZ WOIPPY', '0387325261', '0387310374', 'salmon@groupe-salmon.fr', 'rénovation de bâtiment public ou privé, construction de bâtiment neuf, isolation, bardage...', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(5, 'Lori\'s Sports', 'http://www.lori-s.fr/', 'lorissports.jpg', '38 ROUTE DE PLAPEVILLE', '57050', 'LE BAN SAINT MARTIN', '0387301031', '', 'loris4@wanadoo.fr', 'Magasin de sport, produits pour entreprise, flocage, broderie, sérigraphie, trophées, ...', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(7, 'Super U', 'http://www.magasins-u.com/superu-saintjulienlesmetz', 'superU.jpg', 'RUE FRANCOIS SIMON', '57070', 'SAINT JULIEN LES METZ', '0387762302', '', '', 'Supermarché, hypermarché, promotions, jeux, développement photo numérique : tous vos contenus préférés vous attendent sur le site de votre magasin...', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(9, 'Ligue Lorraine de Football', 'http://lorraine.fff.fr', 'llf.png', '1 RUE DE LA GRANDE DOUVE', '54250', 'CHAMPIGNEULLES', '0383918002', '0383901824', 'secretariat@lorraine.fff.fr', 'Site officiel de la ligue lorraine de foot', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(10, 'District Mosellan de Football', 'http://moselle.fff.fr', 'dmf.gif', '49 RUE DU GENERAL METMAN', '57070', 'METZ', '0387755311', '0387363140', 'secretariat@moselle.fff.fr', 'Site officiel du district mosellan de foot', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(11, 'Ville de Saint Julien Lès Metz', 'http://mairie-stjulienlesmetz.fr/', 'ville.jpg', '108 RUE GENERAL DIOU', '57070', 'SAINT JULIEN LES METZ', '0387740717', '0387754038', 'mairie.st-julien@wanadoo.fr', 'Site officiel de la mairie', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(12, 'Poivre & Sel Restaurant', 'http://www.restaurant-poivre-et-sel.fr/', 'poivre&sel.jpg', '130 RUE GENERAL DIOU', '57070', 'SAINT JULIEN LES METZ', '0387368043', NULL, NULL, 'Le restaurant Au Poivre et Sel vous accueille à Saint Julien les Metz dans le département de la Moselle.', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(15, 'INOTECH', 'www.inotech-clotures.com/', 'inotech.png', '1 BOUCLE DE LA BERGERIE', '57070', 'SAINT JULIEN LES METZ', '0387768416', '0387359746', 'inotech_snc@bbox.fr', 'Réalisation de clôtures', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(16, 'IMAGIN COMMUNICATION', 'http://www.imagincommunication.fr/', 'imaginCommunication.jpg', '4 RUE PRINCIPALE', '57070', 'VANY', '0387777610', NULL, NULL, 'création et conception de vos supports de communication grâce à une gamme complète et parfaitement adaptée à votre métier', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(17, 'ETS CHIAPPA', '', '', '2 ALLEE DES MESANGES BP 7', '57640', 'VIGY', '0387779213', '0387301684', 'etabchiappa@wanadoo.fr', 'Distribution de boissons', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(18, 'NAU', '', 'nauAutoEcole.jpg', 'FORT MOSELLE 19 RUE DE PARIS', '57000', 'METZ', '0387302539', '0387302539', NULL, 'Ecole de conduite - auto, cyclo, remorque', NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(19, 'MIL PROPRETE', '', 'milProprete.jpg', '5 LES HAMEAUX DE LA GRANGE', '57155', 'MARLY', '0661791641', NULL, 'isabelle_goncalves@live.fr', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(20, 'Team Goal Expert', 'http://www.tge376.com/', 'teamGoalExpert2.png', '5 RUE EMILE GENTIL', '57070', 'METZ', '06 81 09 29 ', '', 'contact@tge376.com', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(21, 'RUN+', 'https://www.facebook.com/pages/Run-Plus/1063112637038901', 'runplus.jpg', '7 RUE DU STADE', '57050', 'LONGEVILLE LES METZ', '0387551914', '', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(22, 'Mac Donald\'s', 'www.mcdonalds.fr/saint_julien_les_metz&#8206;', 'mcdonalds.gif', 'RUE PAUL LANGEVIN', '57070', 'SAINT JULIEN LES METZ', '0387740200', '', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(23, 'saint eve toiture', '', 'noimage.png', '27 RUE PRINCIPALE', '57420', 'LIEHON', '0387574303', '', 'saint-eve.yoann@hotmail.fr', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(24, 'attis proprete', '', 'attisproprete.jpg', '10 RUE ROBERT PARISOT', '57000', 'METZ', '0637447308', '', 'stephane@attisproprete.fr', NULL, NULL, '', '2015-10-14 20:08:18'),
(25, 'green environement', '', 'noimage.png', '', '', '', '0387691219', '', 'eric.luxembourger@laposte.net', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(26, 'TEN VOORDE', '', 'noimage.png', '85A RUE DU GENERAL DIOU', '57070', 'SAINT JULIEN LES METZ', '0387369403', '', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(27, 'envol 360', 'www.envol360.fr', 'envol360.png', '16 RUE DES CLOYS', '75018', 'PARIS', '0682023838', '', 'sebastien.lhote@envol360.fr', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(28, 'M.G.R.', '', 'noimage.png', '', '', '', '', '', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(29, 'Cote cave chiappa', '', 'noimage.png', '2 ALLEE DES MESANGES', '', 'VIGY', '', '', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(30, 'wiedemann jasalu', 'www.wiedemann-jasalu.fr', 'jasalu.jpg', '53 RUE DU GENERAL METMAN ', '57070', 'METZ', '0387741683', '0387769345', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(31, 'come electricite generale', '', 'noimage.png', '11 RUE DES POTIERS D\'ETAIN', '57070', 'METZ', '0387752550', '0387783908', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(32, 'coeur de cannelle', '', 'noimage.png', '', '57070', 'METZ', '', '', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(33, 'keep cool', '', 'keepcool.jpg', 'KINEPOLIS', '57070', 'SAINT JULIEN LES METZ', '', '', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(34, 'SOMEGIM', '', 'somegim.jpg', '', '', '', '', '', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(35, 'axa assurances', '', 'axa.jpg', '', '', '', '', '', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18'),
(36, 'arte marbre', '', 'artemarbreselles.jpg', '', '', '', '', '', '', NULL, NULL, 'TSUTTER', '2015-10-14 20:08:18');

-- --------------------------------------------------------

--
-- Structure de la table `type_competition`
--

DROP TABLE IF EXISTS `type_competition`;
CREATE TABLE `type_competition` (
  `ID` int(11) NOT NULL,
  `LIBELLE` varchar(100) NOT NULL,
  `CATEGORIE` smallint(6) NOT NULL,
  `AUTEUR_MAJ` varchar(25) NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_competition`
--

INSERT INTO `type_competition` (`ID`, `LIBELLE`, `CATEGORIE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'CHAMPIONNAT', 9, 'TSUTTER', '2015-10-14 20:08:45'),
(2, 'COUPE DE FRANCE', 9, 'TSUTTER', '2015-10-14 20:08:45'),
(3, 'COUPE DE LORRAINE', 9, 'TSUTTER', '2015-10-14 20:08:45'),
(4, 'COUPE DE MOSELLE', 9, 'TSUTTER', '2015-10-14 20:08:45'),
(5, 'COUPE DES RESERVES', 9, 'TSUTTER', '2015-10-14 20:08:45'),
(6, 'COUPE DE LORRAINE', 5, 'TSUTTER', '2015-10-14 20:08:45'),
(7, 'COUPE DE MOSELLE', 5, 'TSUTTER', '2015-10-14 20:08:45'),
(8, 'COUPE NATIONALE', 4, 'TSUTTER', '2015-10-14 20:08:45'),
(9, 'COUPE NATIONALE', 3, 'TSUTTER', '2015-10-14 20:08:45'),
(10, 'CHAMPIONNAT', 5, 'TSUTTER', '2015-10-14 20:08:45'),
(11, 'CHAMPIONNAT', 4, 'TSUTTER', '2015-10-14 20:08:45'),
(12, 'CHAMPIONNAT', 3, 'TSUTTER', '2015-10-14 20:08:45'),
(13, 'AMICAL', 9, 'TSUTTER', '2015-10-14 20:08:45'),
(14, 'AMICAL', 5, 'TSUTTER', '2015-10-14 20:08:45'),
(15, 'AMICAL', 4, 'TSUTTER', '2015-10-14 20:08:45'),
(16, 'AMICAL', 3, 'TSUTTER', '2015-10-14 20:08:45'),
(17, 'AMICAL', 2, 'TSUTTER', '2015-10-14 20:08:45'),
(18, 'AMICAL', 1, 'TSUTTER', '2015-10-14 20:08:45'),
(19, 'TOURNOI', 9, 'TSUTTER', '2015-10-14 20:08:45'),
(20, 'TOURNOI', 5, 'TSUTTER', '2015-10-14 20:08:45'),
(21, 'TOURNOI', 4, 'TSUTTER', '2015-10-14 20:08:45'),
(22, 'TOURNOI', 3, 'TSUTTER', '2015-10-14 20:08:45'),
(23, 'TOURNOI', 2, 'TSUTTER', '2015-10-14 20:08:45'),
(24, 'TOURNOI', 1, 'TSUTTER', '2015-10-14 20:08:45'),
(25, 'AUTRE', 9, 'TSUTTER', '2015-10-14 20:08:45'),
(26, 'AUTRE', 5, 'TSUTTER', '2015-10-14 20:08:45'),
(27, 'AUTRE', 4, 'TSUTTER', '2015-10-14 20:08:45'),
(28, 'AUTRE', 3, 'TSUTTER', '2015-10-14 20:08:45'),
(29, 'AUTRE', 2, 'TSUTTER', '2015-10-14 20:08:45'),
(30, 'AUTRE', 1, 'TSUTTER', '2015-10-14 20:08:45'),
(31, 'COUPE DE LORRAINE', 6, 'TSUTTER', '2015-09-01 12:19:38'),
(32, 'COUPE DE MOSELLE', 6, 'TSUTTER', '2015-09-01 12:19:38'),
(33, 'CHAMPIONNAT', 6, 'TSUTTER', '2015-09-01 12:19:38'),
(34, 'AMICAL', 6, 'TSUTTER', '2015-09-01 12:19:38'),
(35, 'TOURNOI', 6, 'TSUTTER', '2015-09-01 12:19:38'),
(36, 'AUTRE', 6, 'TSUTTER', '2015-09-01 12:19:38'),
(38, 'PLATEAU', 2, 'TSUTTER', '2015-10-14 20:08:45'),
(39, 'PLATEAU', 1, 'TSUTTER', '2015-10-14 20:08:45');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `LOGIN` varchar(25) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `ACTIF` smallint(6) NOT NULL,
  `NB_ECHEC` smallint(6) NOT NULL,
  `PWD_USAGE_UNIQUE` smallint(6) NOT NULL,
  `DATE_EXPIRATION` date NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `SEXE` varchar(1) NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `ADRESSE` varchar(100) NOT NULL,
  `CODE_POSTAL` varchar(10) NOT NULL,
  `VILLE` varchar(100) NOT NULL,
  `PAYS` varchar(50) NOT NULL,
  `TEL_FIXE` varchar(12) NOT NULL,
  `TEL_PORTABLE` varchar(12) NOT NULL,
  `PHOTO` varchar(100) NOT NULL,
  `SUPER_ADMIN` smallint(6) NOT NULL,
  `CATEGORIE` int(11) NOT NULL DEFAULT '-1',
  `DERNIERE_CONNEXION` datetime NOT NULL,
  `DERNIERE_MAJ` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`LOGIN`, `PASSWORD`, `ACTIF`, `NB_ECHEC`, `PWD_USAGE_UNIQUE`, `DATE_EXPIRATION`, `EMAIL`, `NOM`, `PRENOM`, `SEXE`, `DATE_NAISSANCE`, `ADRESSE`, `CODE_POSTAL`, `VILLE`, `PAYS`, `TEL_FIXE`, `TEL_PORTABLE`, `PHOTO`, `SUPER_ADMIN`, `CATEGORIE`, `DERNIERE_CONNEXION`, `DERNIERE_MAJ`) VALUES
('aissadi', 'eb9512d8149684a621bf8bd30933bd8c657c6dd9e307874b81e6dec93b17453f', 1, 0, 0, '2999-01-01', 'alain.issadi@hotmail.fr', 'ISSADI', 'ALAIN', '', '1961-10-09', '3, RUE FRANCOIS SIMON 57070 SAINT JULIEN LES METZ', '57070', 'ST JULIEN-LES-METZ', '', '0387763852', '0630437424', 'images/photo/', 0, 6, '2017-06-14 14:16:39', '2017-06-14 12:16:39'),
('bpigeot', 'b6377b2d04e3dd0c615d0cdde128ec69a4ed0232a407ad847a237c1f7013ed6f', 1, 0, 0, '2999-01-01', 'b.pigeot57@gmail.com ', 'PIGEOT', 'BERNARD', '', '1946-07-18', '39 RUE JEAN BURGER', '57070', 'SAINT JULIEN LES METZ', '', '+33387761818', '+33681536586', 'images/photo/', 0, -1, '2015-03-08 03:53:29', '2015-03-08 02:53:29'),
('bvilliger', 'f8a372606fa2cf5954d340941cd24a57ae2501e589c96047bc4b9299d516936d', 1, 0, 0, '2999-01-01', 'benji.v@outlook.com', 'VILLIGER', 'BENJAMIN', '', '1980-10-17', '', '', '', '', '', '06 67 94 05 ', 'images/photo/', 0, -1, '2015-09-02 14:30:55', '2015-09-02 12:32:25'),
('epetot', '7ad78e2560c28ce1e6665dfb37a1bdd6a631a385c021c00f2cae7498ebcd4db4', 1, 0, 0, '2999-01-01', 'eripetot@numericable.fr ', 'PETOT', 'ERIC', '', '2069-11-25', '', 'ST JULIEN ', '', '', '', '0630022985', 'images/photo/', 0, 5, '2016-09-20 15:04:20', '2016-09-20 13:18:09'),
('fgastrini', '81ab46391ec1ff5bd31cbdf2aa50a651688648994e26f4a96ce534b7f3d67408', 1, 0, 0, '2999-01-01', 'franco.g@numericable.fr ', 'GASTRINI', 'FRANCO', '', '1972-11-25', '11 RUE DE VILLERS L\'ORME', '57070', 'ST JULIEN LES METZ', '', '', '0662412521', 'images/photo/', 0, 5, '2017-04-26 15:49:46', '2017-04-26 13:49:46'),
('fmillan', 'b4a7e6b475e81c73e00934c0241c7032d275208be18dc380a1b7501e19d19312', 1, 0, 1, '2999-01-01', '', 'MILLAN', 'FRED', '', '0000-00-00', '', '', '', '', '', '', 'images/photo/', 0, -1, '0000-00-00 00:00:00', '2015-10-05 13:52:14'),
('ftaibi', '8cf217cdfe89a7a4b9693ab912a1ba56af38832656648e087834b0803bd2e38f', 1, 0, 0, '2999-01-01', 'brizio.t@gmail.com ', 'TAIBI', 'FABRICE', '', '1976-03-05', '', '', '', '', '', '', 'images/photo/', 0, -1, '2015-10-04 17:09:17', '2015-10-05 13:52:17'),
('gcharbonnier', '4da41d2fbe314fbd3811f788dd79e0bc7ccfa104de6efab4122473bad0d57ad6', 1, 0, 0, '2999-01-01', 'paris_geo_5@hotmail.com', 'CHARBONNIER', 'GEOFFREY', '', '1988-05-19', '', '', '', '', '', '0678694003', 'images/photo/', 0, -1, '2015-10-08 18:18:47', '2015-10-08 16:19:59'),
('jcbarrois', '114b0da73ff54b3d82cec109826afa9a7ccd780ca6bcaa96c9a3b16fcbb67f69', 1, 0, 0, '2999-01-01', 'barrois.jeancharles@orange.fr', 'BARROIS', 'JEAN-CHARLES', '', '1943-12-27', '12, RUE DES GERANIUMS', '57070', 'METZ', '', '', '0631028403', 'images/photo/', 0, -1, '2016-09-22 15:00:20', '2016-09-22 13:01:59'),
('lsutter', 'a23f590c95033c43a02ae623e1e1bf3dbce206e61a442e4a43087a7cc0667842', 1, 0, 0, '2999-01-01', 'laurent.sutter@neuf.fr', 'SUTTER', 'LAURENT', '', '1958-02-20', '8 PASSAGE DU SABLON', '57000', 'METZ', '', '0387691065', '0622453348 ', 'images/photo/', 0, 4, '2015-10-12 18:46:10', '2015-10-12 16:46:10'),
('mmelzer', 'd79f1f6983560ed02b4b77429e23cd439fcc5b0192c6a966d6477ca5999416fc', 1, 0, 0, '2999-01-01', 'contact@melzer.fr ', 'MELZER', 'MICHELINE', '', '0000-00-00', '', '', '', '', '', '0680430441', 'images/photo/', 0, -1, '2015-03-27 16:30:03', '2015-03-27 15:30:22'),
('mnica', '17046d2b31dae16453c40af6fbed09b7ae1c9b840744b8411feabfd80e9a22d2', 1, 0, 1, '2999-01-01', '', 'NICA', 'MARCO', '', '1973-11-12', '', '', '', '', '', '', 'images/photo/', 0, -1, '0000-00-00 00:00:00', '2015-09-07 11:38:00'),
('rernesti', '412c0776f6d966067451f4f9cc01774e2d6e4ba20cd87d4af6a02ca52fde5196', 1, 0, 0, '2999-01-01', 'roberto.ernesti@wanadoo.fr', '', 'ROBBY', '', '0000-00-00', '7 IMPASSE BILLOTTE', '57070', 'SAINT JULIEN LES METZ', '', '0387780059', '0630056025', 'images/photo/', 0, 2, '2016-12-19 22:37:44', '2016-12-19 21:37:44'),
('sboury', '5e4adb10bc1382e6a21db3d6d22bca7be9fb2dc6f032c052e99a74db7e7549a4', 0, 0, 1, '2999-01-01', '', 'BOURY', 'STEPHANE', '', '1973-09-22', '', '', '', '', '', '', 'images/photo/', 0, -1, '0000-00-00 00:00:00', '2016-09-08 15:39:14'),
('sschweitzer', '3011c4801854ef39e81ca159df5c616ad40abbaa0aaa825ea2ecfd63ae955da4', 0, 0, 0, '2999-01-01', 'ssr603@gmail.com', 'SCHWEITZER', 'SéBASTIEN', '', '1976-03-06', '', '', '', '', '', '', 'images/photo/', 0, 3, '2015-11-28 18:52:51', '2016-03-06 17:09:48'),
('testu15', 'f835f0bdc34cf34020399acca3c1d9862a545c37deffbabd9d4aa5133869ab04', 0, 0, 0, '2999-01-01', '', 'TESTU15', '', '', '0000-00-00', '', '', '', '', '', '', 'images/photo/', 0, 5, '2015-12-29 13:18:05', '2016-03-06 17:09:58'),
('tsutter', '4f186b1ec6f4ecdcc8735e2bbf9c53e3b99e0bbd23cbb37b9aa8e2b5c4c5aafd', 1, 0, 0, '2999-12-31', 'sutter.thierry@gmail.com', 'SUTTER', 'THIERRY', 'M', '1981-07-15', '3 SENTIER DES FAUVETTES', '57155', 'MARLY', 'FRANCE', '0983757816', '0632988973', '', 1, -1, '2016-12-27 13:29:19', '2016-12-27 12:29:19'),
('wcolte', 'fe70ab0530a8e47c458b5a3bc76f557a4bfa8d6bf9d7583dcbdd825813aa8909', 0, 0, 0, '2999-01-01', '', 'COLTE', 'WILLIAM', '', '1980-10-16', '', '', '', '', '', '', 'images/photo/', 0, -1, '2015-10-05 11:52:14', '2016-08-23 13:10:47'),
('wdymant', '23ebae648382e266890e2eee4e408e314d8af14ad5288ce99aa0d7cdfd5b4991', 0, 0, 0, '2999-01-01', '', 'DYMANT', 'WILLIAM', '', '0000-00-00', '', '', '', '', '', '', 'images/photo/', 0, -1, '2015-10-16 18:40:43', '2016-08-23 13:10:43'),
('ydezalis', '52698be42b9e57f92b875866a2a59eb3b6d6e213215f447cd86106949f9f0f1b', 1, 0, 1, '2999-01-01', 'yves.dezalis@wanadoo.fr', 'DEZALIS', 'YVES', '', '1957-09-03', '', '', '', '', '', '', 'images/photo/', 0, -1, '0000-00-00 00:00:00', '2015-10-17 17:04:17');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte_rendu`
--
ALTER TABLE `compte_rendu`
  ADD PRIMARY KEY (`RENCONTRE`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`ZONE`);

--
-- Index pour la table `convocation`
--
ALTER TABLE `convocation`
  ADD PRIMARY KEY (`RENCONTRE`,`JOUEUR`);

--
-- Index pour la table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entrainement`
--
ALTER TABLE `entrainement`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `individu`
--
ALTER TABLE `individu`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `palmares`
--
ALTER TABLE `palmares`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photo_article`
--
ALTER TABLE `photo_article`
  ADD PRIMARY KEY (`ARTICLE`,`PHOTO`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reglement`
--
ALTER TABLE `reglement`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `rencontre`
--
ALTER TABLE `rencontre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_competition`
--
ALTER TABLE `type_competition`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`LOGIN`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT pour la table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `entrainement`
--
ALTER TABLE `entrainement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `individu`
--
ALTER TABLE `individu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `palmares`
--
ALTER TABLE `palmares`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `reglement`
--
ALTER TABLE `reglement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `rencontre`
--
ALTER TABLE `rencontre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;
--
-- AUTO_INCREMENT pour la table `saison`
--
ALTER TABLE `saison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `type_competition`
--
ALTER TABLE `type_competition`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
