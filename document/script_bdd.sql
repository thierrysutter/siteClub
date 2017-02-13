DROP DATABASE IF EXISTS SITE;
CREATE DATABASE SITE CHARACTER SET 'utf8';

USE SITE;

DROP TABLE IF EXISTS SAISON;
CREATE TABLE SAISON (
    ID INTEGER(11) NOT NULL AUTO_INCREMENT,
    LIBELLE VARCHAR(100) NOT NULL,
    ETAT SMALLINT(6) NOT NULL,
	AUTEUR_MAJ VARCHAR(25) NOT NULL,
	DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
) ENGINE=INNODB
AUTO_INCREMENT=1
DEFAULT CHARSET='utf8'
COLLATE='utf8_general_ci'
;

DROP TABLE IF EXISTS CATEGORIE;
CREATE TABLE CATEGORIE (
    ID INTEGER(11) NOT NULL AUTO_INCREMENT,
    LIBELLE VARCHAR(100) NOT NULL,
    ANNEE_DEBUT SMALLINT(6) NOT NULL,
	ANNEE_FIN SMALLINT(6) NOT NULL,
	AUTEUR_MAJ VARCHAR(25) NOT NULL,
	DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
) ENGINE=INNODB
AUTO_INCREMENT=1
DEFAULT CHARSET='utf8'
COLLATE='utf8_general_ci'
;

DROP TABLE IF EXISTS DIVISION;
CREATE TABLE DIVISION (
    ID INTEGER(11) NOT NULL AUTO_INCREMENT,
    LIBELLE VARCHAR(100) NOT NULL,
    CATEGORIE SMALLINT(6) NOT NULL,
	AUTEUR_MAJ VARCHAR(25) NOT NULL,
	DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
) ENGINE=INNODB
AUTO_INCREMENT=1
DEFAULT CHARSET='utf8'
COLLATE='utf8_general_ci'
;

DROP TABLE IF EXISTS FONCTION;
CREATE TABLE FONCTION (
    ID INTEGER(11) NOT NULL AUTO_INCREMENT,
    LIBELLE VARCHAR(100) NOT NULL,
	AUTEUR_MAJ VARCHAR(25) NOT NULL,
	DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
) ENGINE=INNODB
AUTO_INCREMENT=1
DEFAULT CHARSET='utf8'
COLLATE='utf8_general_ci'
;

DROP TABLE IF EXISTS POSTE;
CREATE TABLE POSTE (
    ID INTEGER(11) NOT NULL AUTO_INCREMENT,
    LIBELLE VARCHAR(100) NOT NULL,
	AUTEUR_MAJ VARCHAR(25) NOT NULL,
	DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
) ENGINE=INNODB
AUTO_INCREMENT=1
DEFAULT CHARSET='utf8'
COLLATE='utf8_general_ci'
;

DROP TABLE IF EXISTS MEMBRE;
CREATE TABLE MEMBRE (
    LOGIN VARCHAR(25) NOT NULL,
    PASSWORD VARCHAR(64) NOT NULL,
    ACTIF SMALLINT(6) NOT NULL,
    NB_ECHEC SMALLINT(6) NOT NULL,
    PWD_USAGE_UNIQUE SMALLINT(6) NOT NULL,
    DATE_EXPIRATION DATE NOT NULL,
	EMAIL VARCHAR(100) NOT NULL,
	DERNIERE_CONNEXION DATETIME NOT NULL ,
	DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (LOGIN)
) ENGINE=INNODB
DEFAULT CHARSET='utf8'
COLLATE='utf8_general_ci'
;

DROP TABLE IF EXISTS MENU;
CREATE TABLE MENU (
    ID INTEGER(11) NOT NULL AUTO_INCREMENT,
    LIBELLE VARCHAR(100) NOT NULL,
    URL TEXT NOT NULL,
    ICONE VARCHAR(100) NOT NULL,
    ORDRE SMALLINT(6) NOT NULL,
    ACTIF SMALLINT(6) NOT NULL,
	AUTEUR_MAJ VARCHAR(25) NOT NULL,
	DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
) ENGINE=INNODB
AUTO_INCREMENT=1
DEFAULT CHARSET='utf8'
COLLATE='utf8_general_ci'
;

DROP TABLE IF EXISTS SPONSOR;
CREATE TABLE SPONSOR (
  ID INTEGER(11) NOT NULL AUTO_INCREMENT,
  NOM VARCHAR(100) NOT NULL,
  URL TEXT NOT NULL,
  VIGNETTE VARCHAR(100) NOT NULL,
  ADRESSE VARCHAR(100) default null,
  CP VARCHAR(10) default null,
  VILLE VARCHAR(100) default null,
  TEL VARCHAR(12) default null,
  FAX VARCHAR(12) default null,
  EMAIL VARCHAR(100) default null,
  AUTEUR_MAJ VARCHAR(25) NOT NULL,
  DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (ID)
) ENGINE=INNODB 
AUTO_INCREMENT=1 
DEFAULT CHARSET='utf8' 
COLLATE='utf8_general_ci'
;

DROP TABLE IF EXISTS ARTICLE;
CREATE TABLE ARTICLE (
  ID INTEGER(11) NOT NULL AUTO_INCREMENT,
  TITRE VARCHAR(100) NOT NULL,
  TEXTE TEXT NOT NULL,
  PHOTO VARCHAR(100) NOT NULL,
  LIEN VARCHAR(100) NOT NULL,
  STATUT SMALLINT(6) NOT NULL,
  DATE_PARUTION DATETIME NOT NULL,
  AUTEUR VARCHAR(25) NOT NULL,
  DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (ID)
) ENGINE=INNODB
AUTO_INCREMENT=1 
DEFAULT CHARSET='utf8' 
COLLATE='utf8_general_ci'
;

DROP TABLE IF EXISTS COMPETITION;
CREATE TABLE COMPETITION (
  ID INTEGER(11) NOT NULL AUTO_INCREMENT,
  LIBELLE VARCHAR(100) NOT NULL,
  CATEGORIE SMALLINT(6) NOT NULL,
  DIVISION SMALLINT(6) NOT NULL,
  SAISON SMALLINT(6) NOT NULL,
  AUTEUR_MAJ VARCHAR(25) NOT NULL,
  DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (ID)
) ENGINE=INNODB
AUTO_INCREMENT=1 
DEFAULT CHARSET='utf8' 
COLLATE='utf8_general_ci'
;

DROP TABLE IF EXISTS RENCONTRE;
CREATE TABLE RENCONTRE (
  ID INTEGER(11) NOT NULL AUTO_INCREMENT,
  COMPETITION SMALLINT(6) NOT NULL,
  JOUR DATE NOT NULL,
  EQUIPE_DOM VARCHAR(50) NOT NULL,
  EQUIPE_EXT VARCHAR(50) NOT NULL,
  SCORE_DOM SMALLINT(6) NOT NULL,
  SCORE_EXT SMALLINT(6) NOT NULL,
  STATUT SMALLINT(6) NOT NULL DEFAULT 0,
  AUTEUR_MAJ VARCHAR(25) NOT NULL,
  DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (ID)
) ENGINE=INNODB
AUTO_INCREMENT=1 
DEFAULT CHARSET='utf8' 
COLLATE='utf8_general_ci'
;

-- dernier match joué
SELECT rencontre.*
FROM `rencontre` , (select max(id) as id, competition from rencontre where statut=1 group by competition) tmp
WHERE tmp.id=rencontre.id and tmp.competition=rencontre.competition;

-- prochain match
SELECT rencontre.*
FROM `rencontre` , (select min(id) as id, competition from rencontre where statut=0 group by competition) tmp
WHERE tmp.id=rencontre.id and tmp.competition=rencontre.competition;

DROP TABLE IF EXISTS INDIVIDU;
CREATE TABLE INDIVIDU (
  ID INTEGER(11) NOT NULL AUTO_INCREMENT,
  NOM VARCHAR(50) NOT NULL,
  PRENOM VARCHAR(50) NOT NULL,
  AGE INTEGER(11) ,
  DATE_NAISSANCE DATETIME ,
  FONCTION INTEGER(11),
  CATEGORIE INTEGER(11),
  POSTE INTEGER(11),
  TAILLE INTEGER(11),
  POIDS INTEGER(11),
  MEILLEUR_PIED VARCHAR(1),
  NUMERO_LICENCE INTEGER(11),
  AUTEUR_MAJ VARCHAR(25) NOT NULL,
  DERNIERE_MAJ TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (ID)
) ENGINE=INNODB
AUTO_INCREMENT=1 
DEFAULT CHARSET='utf8' 
COLLATE='utf8_general_ci'
;

-- REQUETE STAFF SENIORS
SELECT individu.id, individu.nom, individu.prenom, individu.age, individu.date_naissance as dateNaissance, fonction.libelle as libelleFonction, individu.numero_licence as numeroLicence
FROM individu, fonction
WHERE CATEGORIE=9 AND FONCTION in (10, 11)
AND fonction.ID=individu.FONCTION
;

-- REQUETE JOUEURS SENIORS
SELECT individu.id, individu.nom, individu.prenom, individu.age, individu.date_naissance as dateNaissance, poste.libelle as libellePoste, individu.numero_licence as numeroLicence, individu.taille, individu.poids, individu.meilleur_pied as meilleurPied
FROM individu, poste
WHERE CATEGORIE=9 AND FONCTION in (12)
AND poste.ID=individu.POSTE
;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`ID`, `TITRE`, `TEXTE`, `PHOTO`, `LIEN`, `STATUT`, `DATE_PARUTION`, `AUTEUR`, `DERNIERE_MAJ`) VALUES
(1, 'Tournoi à Besançon pour les U13', 'Les jeunes U13 du club en tournoi à Besançon pendant le xeek end de la Pentecote.', '', '', 1, '2014-10-04 14:45:00', 'ADMIN', '2014-10-04 12:46:16'),
(2, 'Coupe de Moselle', 'Les séniors A finaliste de la coupe de Moselle 2014. L''équipe B s''est quant à elle inclinée en 1/2 finale de la coupe des équipes réserves.', '', '', 1, '2014-10-04 14:45:30', 'ADMIN', '2014-10-04 12:46:16'),
(3, 'Séniors B', 'Les séniors B montent en 2ème division de district.', '', '', 1, '2014-10-04 14:46:00', 'ADMIN', '2014-10-04 12:47:49'),
(4, 'Montée en PHR', 'Les séniors A retrouvent niveau Promotion d''Honneur Régionale après une très belle saison.', 'images/monteePHR.jpg', '', 1, '2014-10-04 14:46:30', 'ADMIN', '2014-10-04 12:47:49'),
(5, 'Inscriptions 2014/2015', 'Pour tous renseignements, contactez nous au 03 87 37 04 34 ou remplissez ce <a href="#">formulaire</a>.', 'images/featured-side-3.jpg', '', 1, '2014-10-04 14:47:00', 'ADMIN', '2014-10-04 12:49:25'),
(6, 'Bilan de la saison 2013/2014', 'Le bilan du club est très bon en cette fin de saison avec la montée des 2 équipes séniors dont l''équipe A qui retrouve la PHR (Ligue) comme espéré en début de saison.', 'images/featured-side-2.jpg', '', 1, '2014-10-04 14:47:30', 'ADMIN', '2014-10-04 12:49:25'),
(7, 'Fête du foot 2014', 'Comme chaque année, le club a organisé sa fête du football.', 'images/choucroute.gif', '', 1, '2014-10-04 14:48:00', 'ADMIN', '2014-10-04 12:50:41'),
(8, 'Reprise saison 2014/2015', 'Le premier entrainement de la nouvelle saison a eu lieu le dimanche 27/07/2014.', 'images/travaux_stade.jpg', '', 1, '2014-10-04 14:48:30', 'ADMIN', '2014-10-04 12:50:41'),
(9, 'Reprise section jeunes', 'Les jeunes joueurs de l''école de foot (U6 à U13) ont repris le chemin des entrainements depuis la fin du mois d''août.', 'images/repriseJeunes2014.jpg', '', 1, '2014-10-04 14:49:00', 'ADMIN', '2014-10-04 12:51:27');

-- --------------------------------------------------------

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`ID`, `LIBELLE`, `ANNEE_DEBUT`, `ANNEE_FIN`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'U7', 2008, 2009, 'ADMIN', '2014-10-04 11:50:25'),
(2, 'U9', 2006, 2007, 'ADMIN', '2014-10-04 11:50:25'),
(3, 'U11', 2004, 2005, 'ADMIN', '2014-10-04 11:51:02'),
(4, 'U13', 2002, 2003, 'ADMIN', '2014-10-04 11:51:02'),
(5, 'U15', 2000, 2001, 'ADMIN', '2014-10-04 11:51:43'),
(6, 'U17', 1998, 1999, 'ADMIN', '2014-10-04 11:51:43'),
(7, 'U19', 1996, 1997, 'ADMIN', '2014-10-04 11:52:20'),
(8, 'U20', 1995, 1995, 'ADMIN', '2014-10-04 11:52:20'),
(9, 'SENIOR', 1980, 1994, 'ADMIN', '2014-10-04 11:55:49'),
(10, 'VETERAN', 1901, 1979, 'ADMIN', '2014-10-04 11:57:14');

-- --------------------------------------------------------

--
-- Contenu de la table `competition`
--

INSERT INTO `competition` (`ID`, `LIBELLE`, `CATEGORIE`, `DIVISION`, `SAISON`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'PHR GROUPE C', 9, 9, 1, 'ADMIN', '2014-10-04 15:43:59'),
(2, '2EME DIV. GROUPE D', 9, 11, 1, 'ADMIN', '2014-10-04 15:43:59'),
(3, 'U15 MOSELLE GROUPE F', 5, 23, 1, 'ADMIN', '2014-10-04 15:50:26'),
(4, 'U13 EXCELLENCE GROUPE D', 4, 26, 1, 'ADMIN', '2014-10-04 15:50:26');

-- --------------------------------------------------------

--
-- Contenu de la table `division`
--

INSERT INTO `division` (`ID`, `LIBELLE`, `CATEGORIE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'LIGUE 1', 9, 'ADMIN', '2014-10-04 12:59:22'),
(2, 'LIGUE 2', 9, 'ADMIN', '2014-10-04 12:59:22'),
(3, 'NATIONAL', 9, 'ADMIN', '2014-10-04 12:59:45'),
(4, 'CFA', 9, 'ADMIN', '2014-10-04 12:59:45'),
(5, 'CFA 2', 9, 'ADMIN', '2014-10-04 13:00:06'),
(6, 'DIVISION HONNEUR', 9, 'ADMIN', '2014-10-04 13:00:06'),
(7, 'DIVISION HONNEUR REGIONAL', 9, 'ADMIN', '2014-10-04 13:00:28'),
(8, 'PROMOTION HONNEUR', 9, 'ADMIN', '2014-10-04 13:00:28'),
(9, 'PROMOTION HONNEUR REGIONAL', 9, 'ADMIN', '2014-10-04 13:00:54'),
(10, '1ERE DIVISION', 9, 'ADMIN', '2014-10-04 13:08:27'),
(11, '2EME DIVISION', 9, 'ADMIN', '2014-10-04 13:08:27'),
(12, '3EME DIVISION', 9, 'ADMIN', '2014-10-04 13:08:27'),
(13, '4EME DIVISION', 9, 'ADMIN', '2014-10-04 13:08:27'),
(14, 'DIVISION HONNEUR', 7, 'ADMIN', '2014-10-04 13:03:23'),
(15, 'HONNEUR REGIONAL', 7, 'ADMIN', '2014-10-04 13:03:23'),
(16, 'MOSELLE', 7, 'ADMIN', '2014-10-04 13:04:17'),
(17, 'DIVISION HONNEUR', 6, 'ADMIN', '2014-10-04 13:04:17'),
(18, 'HONNEUR REGIONAL', 6, 'ADMIN', '2014-10-04 13:04:45'),
(19, 'MOSELLE', 6, 'ADMIN', '2014-10-04 13:04:45'),
(20, 'DIVISION HONNEUR', 5, 'ADMIN', '2014-10-04 13:05:13'),
(21, 'HONNEUR REGIONAL', 5, 'ADMIN', '2014-10-04 13:05:13'),
(22, 'PROMOTION HONNEUR', 5, 'ADMIN', '2014-10-04 13:05:39'),
(23, 'MOSELLE', 5, 'ADMIN', '2014-10-04 13:05:39'),
(24, 'HONNEUR', 4, 'ADMIN', '2014-10-04 13:06:33'),
(25, 'HONNEUR REGIONAL', 4, 'ADMIN', '2014-10-04 13:06:33'),
(26, 'EXCELLENCE', 4, 'ADMIN', '2014-10-04 13:06:47'),
(27, 'PROMOTION', 4, 'ADMIN', '2014-10-04 13:06:47'),
(28, 'INTERREGIONAL', 5, 'ADMIN', '2014-10-04 13:07:34');

-- --------------------------------------------------------

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`ID`, `LIBELLE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'PRESIDENT', 'ADMIN', '2014-10-04 13:11:46'),
(2, 'VICE PRESIDENT', 'ADMIN', '2014-10-04 13:11:46'),
(3, 'TRESORIER', 'ADMIN', '2014-10-04 13:11:46'),
(4, 'INTENDANT', 'ADMIN', '2014-10-04 13:11:46'),
(5, 'SECRETAIRE', 'ADMIN', '2014-10-04 13:11:46'),
(6, 'MANAGER GENERAL', 'ADMIN', '2014-10-04 13:11:46'),
(7, 'MANAGER GEENRAL JEUNES', 'ADMIN', '2014-10-04 13:11:46'),
(8, 'REFERENT ARBITRE', 'ADMIN', '2014-10-04 13:11:46'),
(9, 'ARBITRE', 'ADMIN', '2014-10-04 13:11:46'),
(10, 'EDUCATEUR', 'ADMIN', '2014-10-04 13:11:46'),
(11, 'DIRIGEANT', 'ADMIN', '2014-10-04 13:12:16'),
(12, 'JOUEUR', 'ADMIN', '2014-10-04 13:12:16');

-- --------------------------------------------------------

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`LOGIN`, `PASSWORD`, `ACTIF`, `NB_ECHEC`, `PWD_USAGE_UNIQUE`, `DATE_EXPIRATION`, `EMAIL`, `DERNIERE_CONNEXION`, `DERNIERE_MAJ`) VALUES
('test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 1, 0, 0, '2999-12-31', 'sutter.thierry@gmail.com', '2014-10-04 15:28:08', '2014-10-04 13:28:08');

-- --------------------------------------------------------

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`ID`, `LIBELLE`, `URL`, `ICONE`, `ORDRE`, `ACTIF`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'ACCUEIL', 'accueil.php', '', 1, 1, 'ADMIN', '2014-10-04 12:33:48'),
(2, 'CLUB', 'club.php', '', 2, 1, 'ADMIN', '2014-10-04 12:33:48'),
(3, 'EFFECTIFS', 'joueurs&staffs.php', '', 3, 1, 'ADMIN', '2014-10-04 12:34:50'),
(4, 'ECOLE DE FOOT', 'ecoledefoot.php', '', 4, 1, 'ADMIN', '2014-10-04 12:34:50'),
(5, 'AGENDA', 'calendrier.php', '', 5, 1, 'ADMIN', '2014-10-04 12:35:36'),
(6, 'EVENEMENTS', 'evenements.php', '', 6, 1, 'ADMIN', '2014-10-04 12:35:36'),
(7, 'SPONSORS', 'sponsors.php', '', 7, 1, 'ADMIN', '2014-10-04 12:36:17'),
(8, 'CONTACT', 'contact.php', '', 8, 1, 'ADMIN', '2014-10-04 12:36:17'),
(9, 'PRESSE', 'presse.php', '', 9, 0, 'ADMIN', '2014-10-04 12:37:03'),
(10, 'VIDEOS', 'videos.php', '', 10, 0, 'ADMIN', '2014-10-04 12:37:03'),
(11, 'BOUTIQUE', 'boutique.php', '', 11, 0, 'ADMIN', '2014-10-04 12:37:35'),
(12, 'ADMINISTRATION', '', '', 12, 0, 'ADMIN', '2014-10-04 12:39:07');

-- --------------------------------------------------------

--
-- Contenu de la table `poste`
--

INSERT INTO `poste` (`ID`, `LIBELLE`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'GARDIEN', 'ADMIN', '2014-10-04 13:14:05'),
(2, 'DEFENSEUR LATERAL', 'ADMIN', '2014-10-04 13:14:05'),
(3, 'DEFENSEUR CENTRAL', 'ADMIN', '2014-10-04 13:14:05'),
(4, 'MILIEU DEFENSIF', 'ADMIN', '2014-10-04 13:14:05'),
(5, 'MILIEU LATERAL', 'ADMIN', '2014-10-04 13:14:05'),
(6, 'MILIEU OFFENSIF', 'ADMIN', '2014-10-04 13:14:05'),
(7, 'AILIER', 'ADMIN', '2014-10-04 13:14:05'),
(8, 'AVANT CENTRE', 'ADMIN', '2014-10-04 13:14:05');

-- --------------------------------------------------------

--
-- Contenu de la table `rencontre`
--

INSERT INTO `rencontre` (`ID`, `COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 1, '2014-08-31', 'ST JULIEN', 'ES WOIPPY', 2, 1, 1, 'ADMIN', '2014-10-04 14:54:08'),
(2, 1, '2014-09-07', 'LAXOU SAPINIERE', 'ST JULIEN', 0, 2, 1, 'ADMIN', '2014-10-04 14:54:08'),
(3, 1, '2014-09-21', 'ST JULIEN', 'ST MIHIEL', 0, 1, 1, 'ADMIN', '2014-10-04 14:54:08'),
(4, 1, '2014-10-05', 'DELME SOLGNE', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 14:54:08'),
(5, 1, '2014-10-19', 'ST JULIEN', 'VELAINES', 0, 0, 0, 'ADMIN', '2014-10-04 14:54:08'),
(6, 1, '2014-10-26', 'ST JULIEN', 'VILLEY ST ETIENNE', 0, 0, 0, 'ADMIN', '2014-10-04 14:54:08'),
(7, 1, '2014-11-02', 'NEUVES MAISONS 2', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 14:54:08'),
(8, 1, '2014-11-09', 'ST JULIEN', 'TRONVILLE', 0, 0, 0, 'ADMIN', '2014-10-04 14:54:08'),
(9, 1, '2014-11-23', 'HANNONVILLE', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 14:54:08'),
(10, 1, '2014-11-30', 'ST JULIEN', 'RICHARDMENIL', 0, 0, 0, 'ADMIN', '2014-10-04 14:54:08'),
(11, 1, '2014-12-14', 'DEVANT LES PONTS', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 14:57:30'),
(12, 1, '2015-02-22', 'ST JULIEN', 'LAXOU SAPINIERE', 0, 0, 0, 'ADMIN', '2014-10-04 14:57:30'),
(13, 1, '2015-03-01', 'ST MIHIEL', 'ST JULIEN', 0, 0, 0, 'ADMN', '2014-10-04 14:57:30'),
(14, 1, '2015-03-08', 'ST JULIEN', 'DELME SOLGNE', 0, 0, 0, 'ADMIN', '2014-10-04 14:57:30'),
(15, 1, '2015-03-15', 'VELAINES', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 14:57:30'),
(16, 1, '2015-03-29', 'VILLEY ST ETIENNE', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 14:57:30'),
(17, 1, '2015-04-12', 'ST JULIEN', 'NEUVES MAISONS 2', 0, 0, 0, 'ADMIN', '2014-10-04 14:57:30'),
(18, 1, '2015-04-26', 'TRONVILLE', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 14:57:30'),
(19, 1, '2015-05-03', 'ST JULIEN', 'HANNONVILLE', 0, 0, 0, 'ADMIN', '2014-10-04 14:57:30'),
(20, 1, '2015-05-10', 'RICHARMENIL', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 14:57:30'),
(21, 1, '2015-05-17', 'ST JULIEN', 'DEVANT LES PONTS', 0, 0, 0, 'ADMIN', '2014-10-04 14:58:14'),
(22, 1, '2015-05-31', 'ES WOIPPY', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 14:58:14'),
(23, 2, '2014-08-31', 'DEVANT LES  PONTS 2', 'ST JULIEN 2', 5, 1, 1, 'ADMIN', '2014-10-04 15:04:43'),
(24, 2, '2014-09-07', 'ST JULIEN 2', 'LA MAXE', 1, 5, 1, 'ADMIN', '2014-10-04 15:04:43'),
(25, 2, '2014-09-21', 'MOULINS LES METZ', 'ST JULIEN 2', 2, 2, 1, 'ADMIN', '2014-10-04 15:04:43'),
(26, 2, '2014-10-05', 'ST JULIEN 2', 'VIGY', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(27, 2, '2014-10-19', 'LES COTEAUX', 'ST JULIEN 2', 0, 0, 0, 'AMIN', '2014-10-04 15:04:43'),
(28, 2, '2014-10-26', 'CO METZ 2', 'ST JULIEN 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(29, 2, '2014-11-02', 'ST JULIEN 2', 'PIERREVILLERS', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(30, 2, '2014-11-09', 'CUVRY', 'ST JULIEN 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(31, 2, '2014-11-23', 'ST JULIEN 2', 'ES MAIZIERES 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(32, 2, '2015-08-03', 'LA MAXE', 'ST JULIEN 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(33, 2, '2015-03-15', 'ST JULIEN 2', 'MOULINS LES METZ', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(34, 2, '2015-03-29', 'VIGY', 'ST JULIEN 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(35, 2, '2015-04-12', 'ST JULIEN 2', 'LES COTEAUX', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(36, 2, '2015-04-26', 'ST JULIEN 2', 'CO METZ 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(37, 2, '2015-05-03', 'PIERREVILLERS', 'ST JULIEN 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(38, 2, '2015-05-10', 'ST JULIEN 2', 'CUVRY', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(39, 2, '2015-05-17', 'ES MAIZIERES 2', 'ST JULIEN 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(40, 2, '2015-05-31', 'ST JULIEN 2', 'DEVANT LES PONTS 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:04:43'),
(41, 3, '2014-09-14', 'MOULINS LES METZ', 'ST JULIEN', 6, 1, 1, 'ADMIN', '2014-10-04 15:55:52'),
(42, 3, '2014-09-20', 'ST JULIEN', 'MARLY 2', 6, 1, 1, 'ADMIN', '2014-10-04 15:55:52'),
(43, 3, '2014-09-24', 'BAN ST MARTIN', 'ST JULIEN', 1, 5, 1, 'ADMIN', '2014-10-04 15:55:52'),
(44, 3, '2014-10-11', 'NOVEANT', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 15:55:52'),
(45, 3, '2014-10-25', 'ST JULIEN', 'ES WOIPPY', 0, 0, 0, 'ADMIN', '2014-10-04 15:55:52'),
(46, 3, '2014-11-11', 'MONTIGNY LES METZ', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 15:55:52'),
(47, 3, '2014-11-15', 'ST JULIEN', 'PLANTIERES 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:55:52'),
(48, 3, '2014-11-23', 'PELTRE', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 15:55:52'),
(49, 3, '2014-11-29', 'ST JULIEN', 'ES METZ 2', 0, 0, 0, 'ADMIN', '2014-10-04 15:55:52'),
(50, 4, '2014-09-13', 'ST JULIEN', 'APM 3', 5, 6, 1, 'ADMIN', '2014-10-04 15:58:36'),
(51, 4, '2014-09-20', 'BECHY', 'ST JULIEN', 3, 2, 1, 'ADMIN', '2014-10-04 15:58:36'),
(52, 4, '2014-09-27', 'ST JULIEN', 'COURCELLES / NIED 2', 11, 0, 1, 'ADMIN', '2014-10-04 15:58:36'),
(53, 4, '2014-10-11', 'ST JULIEN', 'MOULINS LES METZ', 0, 0, 0, 'ADMIN', '2014-10-04 15:58:36'),
(54, 4, '2014-11-08', 'ESAP', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 15:58:36'),
(55, 4, '2014-11-15', 'ST JULIEN', 'ES WOIPPY', 0, 0, 0, 'ADMIN', '2014-10-04 15:58:36'),
(56, 4, '2014-11-22', 'MONTIGNY LES METZ 2', 'ST JULIEN', 0, 0, 0, 'ADMIN', '2014-10-04 15:58:36');

-- --------------------------------------------------------

--
-- Contenu de la table `saison`
--

INSERT INTO `saison` (`ID`, `LIBELLE`, `ETAT`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, '2014', 1, 'ADMIN', '2014-10-04 11:47:41'),
(2, '2015', 0, 'ADMIN', '2014-10-04 11:47:41');

-- --------------------------------------------------------

--
-- Contenu de la table `sponsor`
--

INSERT INTO `sponsor` (`ID`, `NOM`, `URL`, `VIGNETTE`, `ADRESSE`, `CP`, `VILLE`, `TEL`, `FAX`, `EMAIL`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(1, 'Kinepolis Saint Julien Les Metz', 'http://kinepolis.fr/splash?destination=cinemas/kinepolis-st-julien-les-metz', 'images/kinepolis.jpg', '10 AVENUE PAUL LANGEVIN', '57070', 'SAINT JULIEN LES METZ', '0387758450', '0387758456', '', 'ADMIN', '2014-10-28 15:50:08'),
(2, 'Credit Mutuel', 'https://www.creditmutuel.fr/', 'images/creditMutuel.jpg', '28 RUE JEAN BURGER', '57070', 'SAINT JULIEN LES METZ', '0820000130', '0387761683', '05004@creditmutuel.fr', 'ADMIN', '2014-10-28 15:40:28'),
(3, 'Placards MAGE', 'http://www.placardsmage.fr/', 'images/mage_2014.jpg', 'LA BELLE FONTAINE', '57155', 'MARLY', '0387664207', '0387663904', '', 'ADMIN', '2014-10-28 15:43:13'),
(4, 'Groupe Salmon', 'http://www.groupe-salmon.fr/', 'images/salmon.jpg', '28 AVENUE DE THIONVILLE', '57140', 'METZ WOIPPY', '0387325261', '0387310374', 'salmon@groupe-salmon.fr', 'ADMIN', '2014-10-28 15:41:55'),
(5, 'Lori''s Sports', 'http://www.lori-s.fr/', 'images/lorissports.jpg', '38 ROUTE DE PLAPEVILLE', '57050', 'LE BAN SAINT MARTIN', '0387301031', '', 'loris4@wanadoo.fr', 'ADMIN', '2014-10-28 15:44:55'),
(6, 'Sport 2000', 'http://www.sport2000.fr/', 'images/sport2000.jpg', '4 RUE DE BOUSSE', '57300', 'MONDELANGE', '0387714630', '0387719445', 'sport2000bureaumondelange@hotmail.fr', 'ADMIN', '2014-10-28 15:48:50'),
(7, 'Super U', 'http://www.magasins-u.com/superu-saintjulienlesmetz', 'images/superU.jpg', 'RUE FRANCOIS SIMON', '57070', 'SAINT JULIEN LES METZ', '0387762302', '', '', 'ADMIN', '2014-10-28 15:46:19'),
(8, 'FÃ©dÃ©ration FranÃ§aise de Football', 'http://www.fff.fr', 'images/fff.jpg', '87 BOULEVARD DE GRENELLE', '75738', 'PARIS CEDEX 15', '0144317300', '0144317373', NULL, 'ADMIN', '2014-10-30 10:23:41'),
(9, 'Ligue Lorraine de Football', 'http://lorraine.fff.fr', 'images/llf.png', '1 RUE DE LA GRANDE DOUVE', '54250', 'CHAMPIGNEULLES', '0383918002', '0383901824', 'secretariat@lorraine.fff.fr', 'ADMIN', '2014-10-30 10:23:41'),
(10, 'District Mosellan de Football', 'http://moselle.fff.fr', 'images/dmf.gif', '49 RUE DU GENERAL METMAN', '57070', 'METZ', '0387755311', '0387363140', 'secretariat@moselle.fff.fr', 'ADMIN', '2014-10-30 12:26:23'),
(11, 'Ville de Saint Julien LÃ¨s Metz', 'http://mairie-stjulienlesmetz.fr/', 'images/ville.jpg', '108 RUE GENERAL DIOU', '57070', 'SAINT JULIEN LES METZ', '0387740717', '0387754038', 'mairie.st-julien@wanadoo.fr', 'ADMIN', '2014-10-30 10:23:41');

