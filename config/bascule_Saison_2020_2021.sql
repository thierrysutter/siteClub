-- désactivation de la saison précédente
update saison set etat=0 where libelle='2019 / 2020';
-- création de la nouvelle saison
INSERT INTO `saison` (`id`, `LIBELLE`, `ETAT`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES (7, '2020 / 2021', 1, 'TSUTTER', CURRENT_TIMESTAMP);

-- mise à jour des années de naissance des catégories
update categorie set annee_debut=annee_debut+2, annee_fin=annee_fin+2, auteur_maj='TSUTTER', derniere_maj=CURRENT_TIMESTAMP;
update sous_categorie set annee=annee+2, auteur_maj='TSUTTER', derniere_maj=CURRENT_TIMESTAMP;

INSERT INTO equipe (id, categorie, libelle, auteur_maj, derniere_maj) VALUES
(28, 9, 'SENIOR FEM', 'TSUTTER', CURRENT_TIMESTAMP);

-- création des compétitions
INSERT INTO `competition` (`id`, `LIBELLE`, `TYPE_COMPETITION`, `CATEGORIE`, `DIVISION`, `SAISON`, `EQUIPE`, `ACTIF`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(152, 'REGIONAL 2 GROUPE D', 1, 9, 7, 7, 1, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(153, 'D2 GROUPE ', 1, 9, 11, 7, 2, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(154, 'D3 GROUPE ', 1, 9, 12, 7, 19, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(155, 'COUPE DE FRANCE', 2, 9, 0, 7, 1, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(156, 'COUPE DE LORRAINE', 2, 9, 0, 7, 1, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(157, 'COUPE DE MOSELLE', 4, 9, 0, 7, 2, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(158, 'COUPE DES EQUIPES RESERVES', 5, 9, 0, 7, 19, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(159, 'D4 GROUPE ', 1, 9, 13, 7, 26, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(160, 'Moselle GROUPE ', 1, 9, 13, 7, 28, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(161, 'U13', 11, 4, 30, 7, 4, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(162, 'U15', 10, 5, 31, 7, 3, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(163, 'U17', 10, 6, 32, 7, 20, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(164, 'U18', 46, 11, 33, 7, 27, 1, 'TSUTTER', CURRENT_TIMESTAMP)
;

-- on passe toutes les rencontres de la saison passée au statut "effectué"
update rencontre set statut = 1, auteur_maj='TSUTTER' where competition < 152 and statut = 0 ;

create table groupe 
(
    ID int(11) not null,
    LIBELLE varchar(100) not null,
    COMPETITION int(11) not null,
    EQUIPE varchar(100) not null,
    AUTEUR varchar(25) NOT NULL,
    DERNIERE_MAJ timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `groupe`
  ADD PRIMARY KEY (`ID`);

insert into groupe (ID, LIBELLE, COMPETITION, EQUIPE, AUTEUR, DERNIERE_MAJ) values 
(1, 'Régionale 2 Groupe D', 152, 'RS AMANVILLERS', 'TSUTTER', CURRENT_TIMESTAMP),
(2, 'Régionale 2 Groupe D', 152, 'CS BLENOD', 'TSUTTER', CURRENT_TIMESTAMP),
(3, 'Régionale 2 Groupe D', 152, 'ES GANDRANGE', 'TSUTTER', CURRENT_TIMESTAMP),
(4, 'Régionale 2 Groupe D', 152, 'RS MAGNY', 'TSUTTER', CURRENT_TIMESTAMP),
(5, 'Régionale 2 Groupe D', 152, 'APM METZ 2', 'TSUTTER', CURRENT_TIMESTAMP),
(6, 'Régionale 2 Groupe D', 152, 'METZ ESAP', 'TSUTTER', CURRENT_TIMESTAMP),
(7, 'Régionale 2 Groupe D', 152, 'ASP THIONVILLE', 'TSUTTER', CURRENT_TIMESTAMP),
(8, 'Régionale 2 Groupe D', 152, 'AS MONTIGNY LES METZ', 'TSUTTER', CURRENT_TIMESTAMP),
(9, 'Régionale 2 Groupe D', 152, 'FC PONT A MOUSSON', 'TSUTTER', CURRENT_TIMESTAMP),
(10, 'Régionale 2 Groupe D', 152, 'AS ST JULIEN LES METZ', 'TSUTTER', CURRENT_TIMESTAMP),
(11, 'Régionale 2 Groupe D', 152, 'USAG UCKANGE', 'TSUTTER', CURRENT_TIMESTAMP),
(12, 'Régionale 2 Groupe D', 152, 'FC YUTZ', 'TSUTTER', CURRENT_TIMESTAMP)
;