-- désactivation de la saison précédente
update saison set etat=0 where id=4;
-- création de la nouvelle saison
INSERT INTO `saison` (`id`, `LIBELLE`, `ETAT`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES (5, '2018 / 2019', 1, 'TSUTTER', CURRENT_TIMESTAMP);

-- mise à jour des années de naissance des catégories
update categorie set annee_debut=annee_debut+1, annee_fin=annee_fin+1, auteur_maj='TSUTTER', derniere_maj=CURRENT_TIMESTAMP;
update sous_categorie set annee=annee+1, auteur_maj='TSUTTER', derniere_maj=CURRENT_TIMESTAMP;

-- création des compétitions
INSERT INTO `competition` (`id`, `LIBELLE`, `TYPE_COMPETITION`, `CATEGORIE`, `DIVISION`, `SAISON`, `EQUIPE`, `ACTIF`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(120, 'REGIONAL 3 GROUPE F', 1, 9, 8, 5, 1, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(121, 'D2 GROUPE E', 1, 9, 11, 5, 2, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(122, 'D3 GROUPE I', 1, 9, 12, 5, 19, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(123, 'COUPE DE FRANCE', 2, 9, 0, 5, 1, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(124, 'COUPE DE LORRAINE', 2, 9, 0, 5, 1, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(125, 'COUPE DE MOSELLE', 4, 9, 0, 5, 2, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(126, 'COUPE DES EQUIPES RESERVES', 5, 9, 0, 5, 19, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(127, 'U13 PROMOTION GROUPE H', 11, 4, 26, 5, 4, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(128, 'U15 MOSELLE GROUPE E', 10, 5, 23, 5, 3, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(129, 'U17 MOSELLE GROUPE C', 33, 6, 19, 5, 20, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(130, 'COUPE DE LORRAINE', 31, 6, 0, 5, 20, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(131, 'COUPE DE LORRAINE', 6, 5, 0, 5, 3, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(132, 'COUPE DE MOSELLE', 32, 6, 0, 5, 20, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(133, 'COUPE DE MOSELLE', 7, 5, 0, 5, 3, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(134, 'COUPE DES RéSERVES', 26, 5, 0, 5, 24, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(135, 'PLATEAU', 12, 3, 29, 5, 14, 1, 'TSUTTER', CURRENT_TIMESTAMP),
(136, 'PLATEAU', 12, 3, 29, 5, 15, 1, 'TSUTTER', CURRENT_TIMESTAMP);

-- on passe toutes les rencontres de la saison passée au statut "effectué"
update rencontre set statut = 1 where competition < 120 and statut = 0 ;

-- Championnat Sénior A - Régional 3 Lorraine Groupe F
INSERT INTO `rencontre` (`COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(120, '2018-08-26', 'ESAP METZ', 'ST JULIEN', 1, 2, 1, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2018-09-01', 'ST JULIEN', 'UCKANGE 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2018-09-08', 'ST JULIEN', 'AS CLOUANGE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2018-09-23', 'SC MARLY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2018-10-06', 'ST JULIEN', 'US FROIDCUL', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2018-10-21', 'ES GANDRANGE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2018-11-03', 'ST JULIEN', 'ASPST THIONVILLE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2018-11-11', 'FC HAGONDANGE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2018-11-24', 'ST JULIEN', 'FC HETTANGE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2018-12-02', 'KOENIGSMACKER', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2018-12-15', 'ST JULIEN', 'CEP KEDANGE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-02-23', 'ST JULIEN', 'ESAP METZ', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-03-03', 'UCKANGE 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-03-17', 'CLOUANGE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-03-23', 'ST JULIEN', 'SC MARLY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-04-07', 'US FROIDCUL', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-04-13', 'ST JULIEN', 'ES GANDRANGE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-04-28', 'ASPST THIONVILLE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-05-04', 'ST JULIEN', 'FC HAGONDANGE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-05-12', 'FC HETTANGE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-05-26', 'ST JULIEN', 'KOENIGSMACKER', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(120, '2019-06-02', 'CEP KEDANGE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP);

-- Championnat Sénior B - D2 Groupe E
INSERT INTO `rencontre` (`COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(121, '2018-09-02', 'AMIS DE MONTIGNY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2018-09-09', 'ST JULIEN', 'SC MOULINS LES METZ', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2018-09-23', 'SC MARLY 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2018-09-30', 'ST JULIEN', 'CSJ AUGNY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2018-10-07', 'FC NOVEANT 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2018-10-14', 'UL PLANTIERES 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2018-10-21', 'ST JULIEN', 'ES METZ 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2018-11-04', 'AS MONTIGNY 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2018-11-11', 'ST JULIEN', 'AJ METZ BOCANDE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2019-03-10', 'SC MOULINS LES METZ', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2019-03-17', 'ST JULIEN', 'SC MARLY 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2019-03-24', 'CSJ AUGNY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2019-04-07', 'ST JULIEN', 'FC NOVEANT 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2019-04-14', 'ST JULIEN', 'UL PLANTIERES 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2019-04-28', 'ES METZ 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2019-05-12', 'ST JULIEN', 'AS MONTIGNY 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2019-05-26', 'AJ METZ BOCANDE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(121, '2019-06-02', 'ST JULIEN', 'AMIS DE MONTIGNY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP);

-- Championnat Sénior C - D3 Groupe I
INSERT INTO `rencontre` (`COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(122, '2018-09-02', 'ST JULIEN', 'AS GRAVELOTTE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2018-09-09', 'US BAN ST MARTIN 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2018-09-30', 'ST JULIEN', 'AS HAUCONCOURT 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2018-10-07', 'ST JULIEN', 'METZ CONQUISTADORS 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2018-10-14', 'ST JULIEN', 'RS LA MAXE 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2018-10-21', 'FC DEVANT LES PONTS 3', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2018-11-04', 'ST JULIEN', 'AS MONTIGNY 3', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2018-11-11', 'METZ ST CHRISTOPHE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2019-03-10', 'ST JULIEN', 'US BAN ST MARTIN 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2019-03-24', 'AS HAUCONCOURT 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2019-04-07', 'METZ CONQUISTADORS 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2019-04-14', 'RS LA MAXE 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2019-04-28', 'ST JULIEN', 'FC DEVANT LES PONTS 3', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2019-05-12', 'AS MONTIGNY 3', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2019-05-26', 'ST JULIEN', 'METZ ST CHRISTOPHE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2019-06-02', 'AS GRAVELOTTE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2018-09-23', 'ST JULIEN', 'EXEMPT', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(122, '2019-03-17', 'EXEMPT', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP);



INSERT INTO 'equipe' (id, libelle, categorie, auteur_maj, derniere_maj) VALUES
(25, 7, 'U19 A', 'TSUTTER', CURRENT_TIMESTAMP);

INSERT INTO 'type_competition' (id, libelle, categorie, auteur_maj, derniere_maj) VALUES
(40, 'COUPE DE LORRAINE', 7, 'TSUTTER', CURRENT_TIMESTAMP),
(41, 'COUPE DE MOSELLE', 7, 'TSUTTER', CURRENT_TIMESTAMP),
(42, 'CHAMPIONNAT', 7, 'TSUTTER', CURRENT_TIMESTAMP),
(43, 'AMICAL', 7, 'TSUTTER', CURRENT_TIMESTAMP),
(44, 'TOURNOI', 7, 'TSUTTER', CURRENT_TIMESTAMP),
(45, 'AUTRE', 7, 'TSUTTER', CURRENT_TIMESTAMP);

INSERT INTO `competition` (`id`, `LIBELLE`, `TYPE_COMPETITION`, `CATEGORIE`, `DIVISION`, `SAISON`, `EQUIPE`, `ACTIF`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(137, 'U19 MOSELLE GROUPE C', 42, 7, 16, 5, 25, 1, 'TSUTTER', CURRENT_TIMESTAMP);


-- Championnat U19 - Moselle Groupe C
INSERT INTO `rencontre` (`COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(137, '2018-09-15', 'ES WOIPPY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(137, '2018-09-29', 'ST JULIEN', 'ES METZ', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(137, '2018-10-06', 'SC MARLY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(137, '2018-10-27', 'DELME SOLGNE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(137, '2018-11-03', 'ST JULIEN', 'ES WOIPPY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(137, '2018-11-10', 'ES METZ', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(137, '2018-11-24', 'ST JULIEN', 'SC MARLY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(137, '2018-12-01', 'EXEMPT', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(137, '2018-12-08', 'ST JULIEN', 'DELME-SOLGNE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(137, '2018-10-20', 'ST JULIEN', 'EXEMPT', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP);

-- Championnat U17 - Moselle Groupe C
INSERT INTO `rencontre` (`COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(129, '2018-10-13', 'ES WOIPPY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(129, '2018-09-15', 'ST JULIEN', 'FC TREMERY 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(129, '2018-09-29', 'FC DEVANT LES PONTS', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(129, '2018-10-06', 'ST JULIEN', 'ROSSELANGE VITRY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(129, '2018-10-20', 'FC MONDELANGE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(129, '2018-11-03', 'RS AMANVILLERS', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(129, '2018-11-10', 'ST JULIEN', 'FC LORRY PLAPPEVILLE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(129, '2018-11-24', 'AS TALANGE', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(129, '2018-12-01', 'ST JULIEN', 'EXEMPT', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP);

-- Championnat U15 - Moselle Groupe E
INSERT INTO `rencontre` (`COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(128, '2018-09-15', 'ST JULIEN', 'ES METZ 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(128, '2018-09-29', 'US BAN ST MARTIN', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(128, '2018-10-06', 'ST JULIEN', 'ES BECHY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(128, '2018-10-20', 'FC DEVANT LES PONTS', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(128, '2018-11-03', 'ST JULIEN', 'ARS LAQUENEXY', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(128, '2018-11-11', 'JA REMILLY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(128, '2018-11-24', 'ST JULIEN', 'FC LORRY PLAPPEVILLE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(128, '2018-12-02', 'FC NOVEANT', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP);

-- Championnat U13 - Promotion Groupe C
INSERT INTO `rencontre` (`COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(127, '2018-10-13', 'FC WOIPPY', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(127, '2018-09-15', 'ST JULIEN', 'UL PLANTIERES 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(127, '2018-09-29', 'RETONFEY NOISEVILLE MONTOIS', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(127, '2018-10-06', 'ST JULIEN', 'MOULINS LES METZ 2', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(127, '2018-10-20', 'US CHATEL', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(127, '2018-11-10', 'ST JULIEN', 'FC LORRY PLAPPEVILLE', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP),
(127, '2018-11-17', 'AS MONTIGNY 2', 'ST JULIEN', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP);

-- Coupe de France - 3e tour
INSERT INTO `rencontre` (`COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(123, '2018-09-15', 'ST JULIEN', 'ASC SAULXURES', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP);

-- Coupe des réserves
INSERT INTO `rencontre` (`COMPETITION`, `JOUR`, `EQUIPE_DOM`, `EQUIPE_EXT`, `SCORE_DOM`, `SCORE_EXT`, `STATUT`, `HEURE_RDV`, `LIEU_RDV`, `COMMENTAIRE_RDV`, `HEURE_MATCH`, `AUTEUR_MAJ`, `DERNIERE_MAJ`) VALUES
(126, '2018-09-16', 'ST JULIEN', 'FC TREMERY 3', 0, 0, 0, '00:00:00', '', '', '00:00:00', 'TSUTTER', CURRENT_TIMESTAMP);

