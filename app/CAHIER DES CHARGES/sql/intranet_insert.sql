-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 20 Décembre 2011 à 17:39
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

INSERT INTO `departements` VALUES(1, 'Informatique', 300);
INSERT INTO `departements` VALUES(2, 'Carrières juridique', 200);



INSERT INTO `semestres` VALUES(1, 'Semestre 1');
INSERT INTO `semestres` VALUES(2, 'Semestre 2');
INSERT INTO `semestres` VALUES(3, 'Semestre 3');
INSERT INTO `semestres` VALUES(4, 'Semestre 4');
INSERT INTO `semestres` VALUES(5, 'Semestre 1d');
INSERT INTO `semestres` VALUES(6, 'Semestre 2d');
INSERT INTO `semestres` VALUES(7, 'Semestre 3d');
INSERT INTO `semestres` VALUES(8, 'Semestre 4d');
INSERT INTO `semestres` VALUES(9, 'Année spéciale');
INSERT INTO `semestres` VALUES(10, 'Licence Pro');



INSERT INTO `groupes` VALUES(1, 'A1', 15, 3);
INSERT INTO `groupes` VALUES(2, 'A2', 15, 3);
INSERT INTO `groupes` VALUES(3, 'B1', 15, 3);
INSERT INTO `groupes` VALUES(4, 'B2', 15, 3);
INSERT INTO `groupes` VALUES(5, 'C1', 15, 3);
INSERT INTO `groupes` VALUES(6, 'C2', 15, 3);
INSERT INTO `groupes` VALUES(7, 'D1', 15, 3);
INSERT INTO `groupes` VALUES(8, 'D2', 15, 3);
INSERT INTO `groupes` VALUES(9, 'Administrateurs', 15, 3);
INSERT INTO `groupes` VALUES(10, 'Enseignants', 15, 3);



INSERT INTO `libelle_modules` VALUES(1, 'Algorithmique et programmation');
INSERT INTO `libelle_modules` VALUES(2, 'Architectures, systèmes et réseaux');
INSERT INTO `libelle_modules` VALUES(3, 'Outils et modèles du génie logiciel');
INSERT INTO `libelle_modules` VALUES(4, 'Mathématiques');
INSERT INTO `libelle_modules` VALUES(5, 'Expression et communication');
INSERT INTO `libelle_modules` VALUES(6, 'Economie et gestion des organisations');
INSERT INTO `libelle_modules` VALUES(7, 'Informatique');
INSERT INTO `libelle_modules` VALUES(8, 'Connaissances et compétences complémentaires');



/*S1*/
INSERT INTO `modules` VALUES(1, 'AP1', 'Initiation à l''algorithmique', 200, 20, 1, 1);
INSERT INTO `modules` VALUES(2, 'AP2', 'Algorithmique et structures de données statiques', 200, 20, 1, 1);
INSERT INTO `modules` VALUES(3, 'ASR1', 'Comprendre et utiliser un système d''exploitation et un réseau', 120, 30, 2, 1);
INSERT INTO `modules` VALUES(4, 'ASR2', 'Architecture - Codages et circuits logiques\r\n\r\n', 56, 900, 2, 1);
INSERT INTO `modules` VALUES(5, 'OMGL1', 'Base de données', 30, 300, 3, 1);
INSERT INTO `modules` VALUES(6, 'MAT1', 'Logique', 20, 120, 4, 1);
INSERT INTO `modules` VALUES(7, 'MAT2', 'Analyse - initiation', 15, 120, 4, 1);
INSERT INTO `modules` VALUES(8, 'EC1', 'Méthodologie du travail intellectuel - initiation', 5, 50, 5, 1);
INSERT INTO `modules` VALUES(9, 'LAN1', 'Anglais de communication - niveau 1', 10, 50, 5, 1);
INSERT INTO `modules` VALUES(10, 'EGO3', 'Environnement économique', 25, 120, 6, 1);
INSERT INTO `modules` VALUES(11, 'EGO4', 'Gestion de l\'entreprise', 20, 150, 6, 1);
INSERT INTO `modules` VALUES(12, 'EGO7', 'Jeu d\'entreprise', 15, 20, 6, 1);

/*S2*/
INSERT INTO `modules` VALUES(13, 'AP3', 'Algorithmique et structures de données dynamiques', 20, 200, 1, 2);
INSERT INTO `modules` VALUES(14, 'AP4', 'Programmation avancée', 20, 200, 1, 2);
INSERT INTO `modules` VALUES(15, 'AP5', 'Intégration des SGBD dans les environnements Web', 10, 210, 1, 2);
INSERT INTO `modules` VALUES(16, 'ASR3', 'Architecture - mémoires et processeurs', 36, 300, 2, 2);
INSERT INTO `modules` VALUES(17, 'OMGL2', 'Techniques complémentaires de production de logiciel', 40, 300, 3, 2);
INSERT INTO `modules` VALUES(18, 'MAT3', 'Probabilités et statistiques', 25, 180, 4, 2);
INSERT INTO `modules` VALUES(19, 'MAT4', 'Arithmétique', 25, 120, 4, 2);
INSERT INTO `modules` VALUES(20, 'EC2', 'Méthodologie du travail intellectuel - approfondissement', 5, 50, 5, 2);
INSERT INTO `modules` VALUES(21, 'LAN2', 'Anglais de spécialité - initiation', 10, 50, 5, 2);
INSERT INTO `modules` VALUES(22, 'EGO1', 'Droit général', 25, 120, 6, 2);
INSERT INTO `modules` VALUES(23, 'EGO2', 'Fonctionnement de l\'entreprise', 20, 150, 6, 2);

/*S3*/
INSERT INTO `modules` VALUES(24, 'AP6', 'Développement et réutilisation Objet', 200, 30, 1, 3);
INSERT INTO `modules` VALUES(25, 'C-INF1', 'Projet de développement et réutilisation objet', 100, 20, 1, 3);
INSERT INTO `modules` VALUES(26, 'ASR4', 'Réseaux TCP/IP sur Ethernet', 150, 20, 2, 3);
INSERT INTO `modules` VALUES(27, 'ASR5', 'Système d\'exploitation - fonctionnement du noyau', 180, 32, 2, 3);
INSERT INTO `modules` VALUES(28, 'C-INF2', 'Système d\'exploitation - programmation concurrente', 210, 30, 2, 3);
INSERT INTO `modules` VALUES(29, 'OMGL3-1', 'Conception des systèmes orientés objets', 210, 50, 3, 3);
INSERT INTO `modules` VALUES(30, 'OMGL3-2', 'Projet conception de systèmes orientés objets', 200, 55, 3, 3);
INSERT INTO `modules` VALUES(31, 'MAT5', 'Algèbre linéaire', 120, 24, 4, 3);
INSERT INTO `modules` VALUES(32, 'EC3', 'Préparation à l\'insertion professionnelle', 50, 10, 5, 3);
INSERT INTO `modules` VALUES(33, 'EC4', 'Culture et société - initiation', 60, 15, 5, 3);
INSERT INTO `modules` VALUES(34, 'LAN3', 'Anglais de communication - niveau 2', 60, 15, 5, 3);
INSERT INTO `modules` VALUES(35, 'LAN4', 'Anglais de spécialité - approfondissement', 55, 20, 5, 3);
INSERT INTO `modules` VALUES(36, 'EGO5', 'Gestion de projets de SI', 120, 25, 6, 3);
INSERT INTO `modules` VALUES(37, 'EGO6', 'Gestion des SI', 150, 20, 6, 3);


/*S4*/
INSERT INTO `modules` VALUES(38, 'C-INF3', 'Réseaux - architecture et ingénierie', 20, 100, 7, 4);
INSERT INTO `modules` VALUES(39, 'C-INF4B', 'Architecture - fonctionnement des unités centrales', 20, 100, 7, 4);
INSERT INTO `modules` VALUES(40, 'C-INF5B', 'Programmation client-serveur avec parallélisme', 20, 100, 7, 4);
INSERT INTO `modules` VALUES(41, 'C-INF4A', 'Modélisation des SI - modélisation métier', 20, 100, 7, 4);
INSERT INTO `modules` VALUES(42, 'C-INF5A', 'BD - notions complémentaires', 20, 100, 7, 4);
INSERT INTO `modules` VALUES(43, 'C-INF5C', 'Computer graphics', 20, 100, 7, 4);

INSERT INTO `modules` VALUES(44, 'C-CCG5A', 'Mathématiques générales 1 - algèbre', 20, 100, 8, 4);
INSERT INTO `modules` VALUES(45, 'C-CCG5B', 'Mathématiques générales 2 - analyse', 20, 100, 8, 4);
INSERT INTO `modules` VALUES(46, 'C-CCG5C', 'Mathématiques générales 2 - graphes ', 20, 100, 8, 4);
INSERT INTO `modules` VALUES(47, 'C-CCG5D', 'Mathématiques et informatique - complexité et algorithmique avancée', 20, 100, 8, 4);
INSERT INTO `modules` VALUES(48, 'C-CCG2', 'Culture et société - approfondissement', 20, 100, 8, 4);
INSERT INTO `modules` VALUES(49, 'C-CCG3', 'Anglais de communication - niveau 3', 20, 100, 8, 4);
INSERT INTO `modules` VALUES(50, 'C-CCG4A', 'Mathématiques financières', 20, 100, 8, 4);
INSERT INTO `modules` VALUES(51, 'C-CCG4B', 'Propriété intellectuelle', 20, 100, 8, 4);
INSERT INTO `modules` VALUES(52, 'C-CCG4C', 'Création d\'entreprise', 20, 100, 8, 4);



INSERT INTO `type_modules` VALUES(1, 'Cours', 120, 1);
INSERT INTO `type_modules` VALUES(2, 'TD', 30, 1);
INSERT INTO `type_modules` VALUES(3, 'TP', 15, 1);
INSERT INTO `type_modules` VALUES(4, 'Projet', 6, 1);



INSERT INTO `statuts` VALUES(10, 'Eleve');
INSERT INTO `statuts` VALUES(20, 'Enseignant');
INSERT INTO `statuts` VALUES(30, 'Administrateur');


-- personnes (id, nom, prenom, adresse, date_naissance, telephone, bureau, email, statut_id, departement_id, groupe_id, 
-- mot_de_passe, login, last_login)
/*INSERT INTO `personnes` VALUES(1, 'ADMIN', 'Administrateur', 'administrateur', '2008-11-12', '0101010101', '', 'admin@admin.ad', 30, 1, 9, '8055d7dc075c825fe6511bb16cd78fc94a7d8d66', 'admin', '2011-12-20 17:00:49'); /*mdp : admin*/

/*INSERT INTO `personnes` VALUES(2, 'ELEVE', 'Eleve', 'aze', '1981-01-01', '0101010101', '', 'eleve@eleve.el', 10, 1, 1, '2429035a4c60f2b59a9ea9c0658a0c08cf5c90a8', 'eleve', '2011-12-20 16:46:56'); /*mdp : eleve*/

/*INSERT INTO `personnes` VALUES(3, 'PROF', 'Prof', '20 place Doyen Gosse', '1981-01-22', '0101010101', '', 'prof@prof.pro', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'prof', '2011-12-20 16:35:30'); mdp : prof*/ 

/*ADMIN*/

INSERT INTO `personnes` VALUES(4, 'VASSOILE', 'Marc', '10 rue du Lac Grenoble 38000', '1980-04-12', '0664531627', '', 'vassoile.marc@iut2.fr', 30, 1, 9, '04de5acc21acb7a741465f1d203f38a5c2697123', 'vassoim', '2012-01-24 20:00:00'); /*mdp : administrateur*/
/*ELEVES*/

INSERT INTO `personnes` VALUES(5, 'PARRENO', 'Florian', '654 route de chantecler 38070 Saint Quentin Fallavier', '1991-08-12', '0678931627', '', 'parreno.florian@iut2.fr', 10, 1, 1, '2429035a4c60f2b59a9ea9c0658a0c08cf5c90a8', 'parrenof', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(6, 'PAULI', 'Marie', '8 Allée des fleurs 38000 Grenoble', '1992-02-15', '0678934567', '', 'pauli.marie@iut2.fr', 10, 1, 3, '072b5a53c998070e5395dba1375c6b991699f978', 'paulim', '2012-01-24 20:00:00'); /*mdp : mushisama*/

INSERT INTO `personnes` VALUES(7, 'LANDRISCINA', 'Dorian', '39 rue Vaugauthier 38590 Sillans', '1992-11-25', '0675628627', '', 'landriscina.dorian@iut2.fr', 10, 1, 1, '22d8dd753c9dd5147623bdf0834ed8ad097639d4', 'landrisd', '2012-01-24 20:00:00'); /*mdp : dodoletombeur*/

INSERT INTO `personnes` VALUES(8, 'MISTRI', 'Aurelie', '90 rue du dauphiné 38000 Grenoble', '1992-01-28', '0789901627', '', 'mistri.aurelie@iut2.fr', 10, 1, 1, 'cc8b85a78285e4fbca442ef02644a06f4ea5010b', 'mistria', '2012-01-24 20:00:00'); /*mdp : fautfairequoi*/

INSERT INTO `personnes` VALUES(9, 'MONNIER', 'Alexandra', '5 rue du platane Saint Martin D\'Hères', '1992-08-29', '0623097654', '', 'alexandra.monnier@iut2.fr', 10, 1, 3, '50d68802aae0791bad09451d61cc39d2356fe3fe', 'monnieal', '2012-01-24 20:00:00'); /*mdp : alexlabikeuse*/

INSERT INTO `personnes` VALUES(10, 'MARTINEZ', 'Pierre Julien', '66 rue du vercors 38000 Grenoble', '1992-08-18', '0673786534', '', 'martinez.pierrejulien@iut2.fr', 10, 1, 1, '54c87bffe256effed7c3c7ee7bc7680e8b64b33b', 'mapierre', '2012-01-24 20:00:00'); /*mdp : legendpj*/

INSERT INTO `personnes` VALUES(11, 'LOUVETON', 'Joffrey', '38 rue Général Férrié', '1991-11-03', '0637345692', '', 'hello@joff.me', 10, 1, 1, '821c212bc5dcb219afea62be602c08c7754c1f2a', 'louvetoj', '2012-01-24 20:00:00');  /*mdp : jojobpm*/

INSERT INTO `personnes` VALUES(38, 'MALLARONI-CONSENTINO', 'Hugo', '1 rue de la resistance', '1992-01-20', '0657463524', '', 'mallaroni.hugo@iut2.upmf-grenoble.fr ', 10, 1, 1, '11994b0f821efbed3e4aeb9df97b3759ec529f2b', 'mallaroh', '2012-01-24 20:00:00'); /*mdp : hugosecretaire*/

INSERT INTO `personnes` VALUES(39, 'DOMINGUEZ', 'Jp', 'Tatooine', '1992-02-20', '0678787877', '', 'hazkaal@gmail.com', 10, 1, 2, '8c76002fe114060cfda2abc178d2574789daa208', 'dominjp', '2012-01-24 20:00:00'); /*mdp : <trololo8le8piju>*/

INSERT INTO `personnes` VALUES(41, 'DAGNIAUX', 'Quentin', '326A Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-03-10', '', '0686497105', 'darkideo@gmail.com', 10, 1, 6, '', 'dagniauq', '2012-01-24 20:00:00'); /*mdp : dagniauxq*/

INSERT INTO `personnes` VALUES(48, 'HUBERT', 'Pierre', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'hubertpi@gmail.com', 10, 1, 1, '', 'hubertpi', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(49, 'POSSYLKINE', 'Anton', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'anton@gmail.com', 10, 1, 1, '', 'possylka', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(50, 'ROHAUT', 'Ludovic', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'ludo@gmail.com', 10, 1, 1, '', 'rohautl', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(51, 'SALINAS', 'Cedric', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'ced@gmail.com', 10, 1, 1, '', 'salinasc', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(52, 'SZPIEG', 'Loic', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'loic@gmail.com', 10, 1, 1, '', 'szpiegl', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(53, 'AKLI', 'Sofiane', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'so@gmail.com', 10, 1, 2, '', 'aklis', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(54, 'ARRAIS', 'Mathieu', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'mat@gmail.com', 10, 1, 2, '', 'arraism', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(55, 'BERAUDO', 'Valentin', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'val@gmail.com', 10, 1, 2, '', 'beraudov', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(56, 'CALABRO', 'Anthony', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'cala@gmail.com', 10, 1, 2, '', 'calabroa', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(57, 'DESLANDES', 'Titouan', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'tit@gmail.com', 10, 1, 2, '', 'deslandesti', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(58, 'ESPIE-CAULLET', 'Jonathan', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'jon@gmail.com', 10, 1, 2, '', 'espiecaulj', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(59, 'GAILLARD', 'Jeremy', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'jere@gmail.com', 10, 1, 2, '', 'gaillardj', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(60, 'GENON-CATALOT', 'Bertrand', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'ber@gmail.com', 10, 1, 2, '', 'genoncatab', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(61, 'GOURHAND', 'Maeva', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'maeva@gmail.com', 10, 1, 2, '', 'gourhandm', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(62, 'GUILBAUD', 'Benoit', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'ben@gmail.com', 10, 1, 2, '', 'guilbaudb', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(63, 'GIRARD', 'Sylvain', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sylv@gmail.com', 10, 1, 2, '', 'girards', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(64, 'BERTHIER-DELACOUR', 'Joachim', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'joa@gmail.com', 10, 1, 3, '', 'berthierj', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(65, 'HIMMICH', 'Samir', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 3, '', 'himmichs', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(66, 'LAFOREST', 'Yann', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'yann@gmail.com', 10, 1, 3, '', 'laforesty', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(67, 'LENNOZ-GRATIN', 'Sidi', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 3, '', 'lennozgs', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(68, 'MAHIKIAN', 'Nicolas', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 3, '', 'mahikian', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(69, 'PACALET', 'Xavier', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 3, '', 'pacalex', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(70, 'PIPARD', 'Fabien', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 3, '', 'pipardf', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(71, 'PLANCHER', 'Nans', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 3, '', 'planchen', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(72, 'RIBES', 'Gael', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 3, '', 'ribesg', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(73, 'SALIMI', 'Alexandre', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 3, '', 'salimia', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(74, 'BOUVIER', 'Julien', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'bouvierj', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(75, 'CELCE', 'Thibaud', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'celceth', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(76, 'CRUMIERE', 'Vivien', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'crumierv', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(77, 'DE LAUZUN', 'Maxime', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'delauzum', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(78, 'DESPREZ', 'Jerome', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'desprej', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(79, 'DONZELLE', 'Thomas', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'donzellt', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(80, 'EYNARD', 'Edouard', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'eynarde', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(81, 'GALAVIELLE', 'Jonathan', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'galavielj', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(82, 'GINOUX', 'Pierre-Henri', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'ginouxp', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(83, 'SENSIER', 'Antoine', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'sensiera', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(84, 'SERVIERE', 'Vincent', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'sam@gmail.com', 10, 1, 4, '', 'servierv', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(85, 'LAFAY', 'Julie', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'ju@gmail.com', 10, 1, 5, '', 'lafayj', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(86, 'MOREL', 'Gabriel', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'gab@gmail.com', 10, 1, 7, '', 'morelg', '2012-01-24 20:00:00'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(87, 'BRIOT', 'Julien', '326B Résidence Condillac 1251 Rue des Universités 38400 St Martin D\'Hères', '1992-04-10', '', '0686447105', 'julien@gmail.com', 10, 1, 8, '', 'briotj', '2012-01-24 20:00:00'); /*mdp : eleve*/


/*PROFS*/

INSERT INTO `personnes` VALUES(12, 'BELKHATIR', 'Noureddine', '20 route de l\'IUT', '1981-01-22', '0101010101', '101', 'belkhatir.nourredine@iut2.fr', 20, 1, 10, '97ab7b75e32207c0c1bc8f044a788d403f67c562', 'nourbel', '2012-01-24 20:00:00'); /*mdp : chefdep*/

INSERT INTO `personnes` VALUES(13, 'BLANCHON', 'Hervé', '20 route de l\'IUT', '1981-01-22', '0101010101', '105', 'blanchon.herve@iut2.fr', 20, 1, 10, 'fc5e9c8431b89f5a839ca264c466dc3f43ea60bf', 'blanchonh', '2012-01-24 20:00:00'); /*mdp : vecteur*/

INSERT INTO `personnes` VALUES(14, 'BLANCO-LAINE', 'Gaëlle', '20 route de l\'IUT', '1981-01-22', '0101010101', '106', 'blancolaine.gaelle@iut2.fr', 20, 1, 10, '715d9bf5e707a2122eba3039baa0ec35ff079406', 'blancog', '2012-01-24 20:00:00'); /*mdp : chefdeprojet*/

INSERT INTO `personnes` VALUES(15, 'BONNAUD', 'Laurent', '20 place Doyen Gosse', '1981-01-22', '0101010101', '116', 'bonnaud.laurent@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'bonnaudl', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(16, 'BRUNET-MANQUAT', 'Francis', '20 place Doyen Gosse', '1981-01-22', '0101010101', '112', 'brunetmanquat.francis@iut2.fr', 20, 1, 10, '2f78d97e823488d90523aa898a4ab5ec31bf535a', 'brunetmf', '2012-01-24 20:00:00'); /*mdp : macintosh*/

INSERT INTO `personnes` VALUES(17, 'CARAVEL ', 'Marie-Claude', '20 place Doyen Gosse', '1981-01-22', '0101010101', '106', 'caravel.marieclaude@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'caravel', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(18, 'CHASTEL', 'Frédéric', '20 place Doyen Gosse', '1981-01-22', '0101010101', '320F', 'chastel.frederic@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'chastelf', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(19, 'CHEVALLET', 'Jean-Pierre', '20 place Doyen Gosse', '1981-01-22', '0101010101', '117', 'chevallet.jeanpierre@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'jpchevallet', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(20, 'COAT', 'Françoise', '20 place Doyen Gosse', '1981-01-22', '0101010101', '108', 'coat.francoise@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'coatfr', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(21, 'COLLOMBET', 'Caryn', '20 place Doyen Gosse', '1981-01-22', '0101010101', '', 'collombet.caryn@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'colloc', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(22, 'CORSET', 'Franck', '20 place Doyen Gosse', '1981-01-22', '0101010101', '105', 'corset.franck@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'corsetf', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(23, 'CULET', 'Annie', '20 place Doyen Gosse', '1981-01-22', '0101010101', '114', 'culet.annie@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'culeta', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(24, 'FONTENAS', 'Eric', '20 place Doyen Gosse', '1981-01-22', '0101010101', '111', 'fontenas.eric@iut2.fr', 20, 1, 10, 'c1e646a25bb84936e1240b783743433c56e9a7b0', 'fontenae', '2012-01-24 20:00:00'); /*mdp : matrice*/

INSERT INTO `personnes` VALUES(25, 'GATUMEL', 'Mathieu', '20 place Doyen Gosse', '1981-01-22', '0101010101', '117', 'gatumel.mathieu@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'gatumelm', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(26, 'GEROT', 'Cédric', '20 place Doyen Gosse', '1981-01-22', '0101010101', '113', 'gerot.cedric@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'gerotc', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(27, 'GOULIAN', 'Jérôme', '20 place Doyen Gosse', '1981-01-22', '0101010101', '112', 'goulian.jerome@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'goulianj', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(28, 'HAMON', 'Agnès', '20 place Doyen Gosse', '1981-01-22', '0101010101', '106', 'hamon.agnes@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'hamona', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(29, 'JOYCE', 'Laura', '20 place Doyen Gosse', '1981-01-22', '0101010101', '117', 'joyce.laura@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'joycel', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(30, 'LAURILLAU', 'Yann', '20 place Doyen Gosse', '1981-01-22', '0101010101', '107', 'laurillau.yann@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'laurilly', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(31, 'LEJEUNE', 'Anne', '20 place Doyen Gosse', '1981-01-22', '0101010101', '114', 'lejeune.anne@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'lejeuna', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(32, 'MARTIN', 'Philippe', '20 place Doyen Gosse', '1981-01-22', '0101010101', '112', 'martin.philippe@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'martinp', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(33, 'MONTANVERT', 'Annick', '20 place Doyen Gosse', '1981-01-22', '0101010101', '107', 'montanvert.annick@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'montana', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(34, 'PESTY', 'Sylvie', '20 place Doyen Gosse', '1981-01-22', '0101010101', '106', 'pesty.sylvie@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'pestys', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(35, 'RACAULT', 'Laëtitia', '20 place Doyen Gosse', '1981-01-22', '0101010101', '111', 'racault.laeticia@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'racaultl', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(36, 'ROISIN', 'Cécile', '20 place Doyen Gosse', '1981-01-22', '0101010101', '105', 'roisin.cecile@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'roisinc', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(37, 'SIMONET', 'Ana', '20 place Doyen Gosse', '1981-01-22', '0101010101', '117', 'simonet.ana@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'simona', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(40, 'FRONT', 'Agnès', '6 rue de la Jouvence 38000 Grenoble', '1971-12-20', '0654632788', '108', 'front.agnes@iut2.fr', 20, 1, 10, '4fe11351445d96fa63c0f7c55a5f7dd93283e434', 'fronta', '2001-12-11 00:00:00'); /*mdp : profomglmac*/

INSERT INTO `personnes` VALUES(42, 'BERTOLINO', 'Pascal', '20 place Doyen Gosse', '1981-01-22', '0101010101', '116', 'bertolino.pascal@iut2.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'bertolip', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(43, 'DUPUY-CHESSA', 'Sophie', '20 place Doyen Gosse', '1981-01-22', '0101010101', '117', 'Sophie.Dupuy-Chessa@iut2.upmf-grenoble.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'dupuycs', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(44, 'KOENIG', 'Anne-Cécile', '20 place Doyen Gosse', '1981-01-22', '0101010101', '320F', 'Anne-Cécile.Koenig@iut2.upmf-grenoble.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'koenigac', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(45, 'MAIGNAN', 'Aude', '20 place Doyen Gosse', '1981-01-22', '0101010101', '111', 'maignan.aude@iut2.upmf-grenoble.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'maignana', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(46, 'BOUZNIF', 'Marwane', '20 place Doyen Gosse', '1981-01-22', '0101010101', '', 'bouznif.marwane@iut2.upmf-grenoble.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'bouznifm', '2012-01-24 20:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(47, 'PEROTTO', 'Anne-Lise', '20 place Doyen Gosse', '1981-01-22', '0101010101', '', 'perrotto.anne-lise@iut2.upmf-grenoble.fr', 20, 1, 10, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'perrottoal', '2012-01-24 20:00:00'); /*mdp : prof*/



INSERT INTO `modules_personnes` (`id`, `module_id`, `personne_id`) VALUES
(1, 1, 12),
(2, 1, 13),
(3, 1, 31),
(4, 1, 19),
(5, 2, 12),
(6, 2, 13),
(7, 2, 19),
(8, 2, 31),
(9, 3, 15),
(11, 3, 33),
(12, 4, 33),
(13, 4, 15),
(14, 4, 30),
(16, 4, 26),
(17, 5, 35),
(18, 5, 40),
(19, 6, 22),
(20, 6, 24),
(21, 7, 22),
(22, 7, 28),
(23, 8, 18),
(24, 9, 29),
(25, 9, 21),
(27, 11, 17),
(28, 10, 25),
(29, 12, 20),
(30, 13, 12),
(31, 13, 13),
(32, 13, 27),
(33, 14, 31),
(34, 14, 13),
(35, 14, 32),
(36, 15, 34),
(37, 15, 19),
(38, 16, 30),
(39, 16, 33),
(40, 17, 23),
(41, 17, 37),
(42, 17, 40),
(43, 17, 27),
(44, 18, 28),
(45, 18, 24),
(46, 19, 22),
(47, 19, 19),
(48, 20, 18),
(49, 21, 29),
(50, 21, 21),
(51, 22, 14),
(52, 23, 25),
(53, 24, 12),
(54, 24, 13),
(55, 24, 32),
(56, 25, 32),
(57, 25, 13),
(58, 26, 36),
(59, 4, 36),
(60, 26, 33),
(61, 27, 26),
(62, 28, 26),
(64, 26, 15),
(65, 29, 37),
(66, 29, 23),
(67, 30, 23),
(68, 30, 16),
(70, 25, 16),
(71, 25, 27),
(72, 30, 27),
(73, 30, 37),
(74, 31, 24),
(75, 31, 22),
(76, 32, 18),
(77, 33, 18),
(78, 34, 21),
(79, 35, 21),
(80, 34, 29),
(81, 35, 29),
(82, 37, 20),
(83, 36, 14),
(84, 27, 15),
(85, 28, 15),
(86, 29, 27),
(87, 29, 46),
(88, 30, 46),
(89, 34, 47),
(90, 35, 47),
(91, 26, 30);




INSERT INTO `modules_type_modules` VALUES(1, 1, 1);
INSERT INTO `modules_type_modules` VALUES(2, 1, 2);
INSERT INTO `modules_type_modules` VALUES(3, 1, 3);

INSERT INTO `modules_type_modules` VALUES(4, 2, 1);
INSERT INTO `modules_type_modules` VALUES(5, 2, 2);
INSERT INTO `modules_type_modules` VALUES(6, 2, 3);

INSERT INTO `modules_type_modules` VALUES(7, 3, 1);
INSERT INTO `modules_type_modules` VALUES(8, 3, 2);
INSERT INTO `modules_type_modules` VALUES(9, 3, 3);

INSERT INTO `modules_type_modules` VALUES(10, 4, 1);
INSERT INTO `modules_type_modules` VALUES(11, 4, 2);
INSERT INTO `modules_type_modules` VALUES(12, 4, 3);

INSERT INTO `modules_type_modules` VALUES(13, 5, 1);
INSERT INTO `modules_type_modules` VALUES(14, 5, 2);
INSERT INTO `modules_type_modules` VALUES(15, 5, 3);

INSERT INTO `modules_type_modules` VALUES(16, 6, 1);
INSERT INTO `modules_type_modules` VALUES(17, 6, 2);
INSERT INTO `modules_type_modules` VALUES(18, 6, 3);

INSERT INTO `modules_type_modules` VALUES(19, 7, 1);
INSERT INTO `modules_type_modules` VALUES(20, 7, 2);
INSERT INTO `modules_type_modules` VALUES(21, 7, 3);

INSERT INTO `modules_type_modules` VALUES(22, 8, 1);
INSERT INTO `modules_type_modules` VALUES(23, 8, 2);
INSERT INTO `modules_type_modules` VALUES(24, 8, 3);

INSERT INTO `modules_type_modules` VALUES(25, 9, 1);
INSERT INTO `modules_type_modules` VALUES(26, 9, 2);
INSERT INTO `modules_type_modules` VALUES(27, 9, 3);

INSERT INTO `modules_type_modules` VALUES(28, 10, 1);
INSERT INTO `modules_type_modules` VALUES(29, 10, 2);
INSERT INTO `modules_type_modules` VALUES(30, 10, 3);

INSERT INTO `modules_type_modules` VALUES(31, 11, 1);
INSERT INTO `modules_type_modules` VALUES(32, 11, 2);
INSERT INTO `modules_type_modules` VALUES(33, 11, 3);

INSERT INTO `modules_type_modules` VALUES(34, 12, 1);
INSERT INTO `modules_type_modules` VALUES(35, 12, 2);
INSERT INTO `modules_type_modules` VALUES(36, 12, 3);

INSERT INTO `modules_type_modules` VALUES(37, 13, 1);
INSERT INTO `modules_type_modules` VALUES(38, 13, 2);
INSERT INTO `modules_type_modules` VALUES(39, 13, 3);
INSERT INTO `modules_type_modules` VALUES(40, 13, 4);

INSERT INTO `modules_type_modules` VALUES(41, 14, 1);
INSERT INTO `modules_type_modules` VALUES(42, 14, 2);
INSERT INTO `modules_type_modules` VALUES(43, 14, 3);

INSERT INTO `modules_type_modules` VALUES(44, 15, 1);
INSERT INTO `modules_type_modules` VALUES(45, 15, 2);
INSERT INTO `modules_type_modules` VALUES(46, 15, 3);
INSERT INTO `modules_type_modules` VALUES(47, 15, 4);

INSERT INTO `modules_type_modules` VALUES(48, 16, 1);
INSERT INTO `modules_type_modules` VALUES(49, 16, 2);
INSERT INTO `modules_type_modules` VALUES(50, 16, 3);

INSERT INTO `modules_type_modules` VALUES(51, 17, 1);
INSERT INTO `modules_type_modules` VALUES(52, 17, 2);
INSERT INTO `modules_type_modules` VALUES(53, 17, 3);
INSERT INTO `modules_type_modules` VALUES(54, 17, 4);

INSERT INTO `modules_type_modules` VALUES(55, 18, 1);
INSERT INTO `modules_type_modules` VALUES(56, 18, 2);
INSERT INTO `modules_type_modules` VALUES(57, 18, 3);

INSERT INTO `modules_type_modules` VALUES(58, 19, 1);
INSERT INTO `modules_type_modules` VALUES(59, 19, 2);
INSERT INTO `modules_type_modules` VALUES(60, 19, 3);

INSERT INTO `modules_type_modules` VALUES(61, 20, 1);
INSERT INTO `modules_type_modules` VALUES(62, 20, 2);
INSERT INTO `modules_type_modules` VALUES(63, 20, 3);

INSERT INTO `modules_type_modules` VALUES(64, 21, 1);
INSERT INTO `modules_type_modules` VALUES(65, 21, 2);
INSERT INTO `modules_type_modules` VALUES(66, 21, 3);

INSERT INTO `modules_type_modules` VALUES(67, 22, 1);
INSERT INTO `modules_type_modules` VALUES(68, 22, 2);
INSERT INTO `modules_type_modules` VALUES(69, 22, 3);

INSERT INTO `modules_type_modules` VALUES(70, 23, 1);
INSERT INTO `modules_type_modules` VALUES(71, 23, 2);
INSERT INTO `modules_type_modules` VALUES(72, 23, 3);

INSERT INTO `modules_type_modules` VALUES(73, 24, 1);
INSERT INTO `modules_type_modules` VALUES(74, 24, 2);
INSERT INTO `modules_type_modules` VALUES(75, 24, 3);

INSERT INTO `modules_type_modules` VALUES(76, 25, 1);
INSERT INTO `modules_type_modules` VALUES(77, 25, 2);
INSERT INTO `modules_type_modules` VALUES(78, 25, 3);
INSERT INTO `modules_type_modules` VALUES(79, 25, 4);

INSERT INTO `modules_type_modules` VALUES(80, 26, 1);
INSERT INTO `modules_type_modules` VALUES(81, 26, 2);
INSERT INTO `modules_type_modules` VALUES(82, 26, 3);

INSERT INTO `modules_type_modules` VALUES(83, 27, 1);
INSERT INTO `modules_type_modules` VALUES(84, 27, 2);
INSERT INTO `modules_type_modules` VALUES(85, 27, 3);

INSERT INTO `modules_type_modules` VALUES(86, 28, 1);
INSERT INTO `modules_type_modules` VALUES(87, 28, 2);
INSERT INTO `modules_type_modules` VALUES(88, 28, 3);

INSERT INTO `modules_type_modules` VALUES(89, 29, 1);
INSERT INTO `modules_type_modules` VALUES(90, 29, 2);
INSERT INTO `modules_type_modules` VALUES(91, 29, 3);

INSERT INTO `modules_type_modules` VALUES(92, 30, 1);
INSERT INTO `modules_type_modules` VALUES(93, 30, 2);
INSERT INTO `modules_type_modules` VALUES(94, 30, 3);
INSERT INTO `modules_type_modules` VALUES(95, 30, 4); 

INSERT INTO `modules_type_modules` VALUES(96, 31, 1);
INSERT INTO `modules_type_modules` VALUES(97, 31, 2);
INSERT INTO `modules_type_modules` VALUES(98, 31, 3);

INSERT INTO `modules_type_modules` VALUES(99, 32, 1);
INSERT INTO `modules_type_modules` VALUES(100, 32, 2);
INSERT INTO `modules_type_modules` VALUES(101, 32, 3);

INSERT INTO `modules_type_modules` VALUES(102, 33, 1);
INSERT INTO `modules_type_modules` VALUES(103, 33, 2);
INSERT INTO `modules_type_modules` VALUES(104, 33, 3);

INSERT INTO `modules_type_modules` VALUES(105, 34, 1);
INSERT INTO `modules_type_modules` VALUES(106, 34, 2);
INSERT INTO `modules_type_modules` VALUES(107, 34, 3);

INSERT INTO `modules_type_modules` VALUES(108, 35, 1);
INSERT INTO `modules_type_modules` VALUES(109, 35, 2);
INSERT INTO `modules_type_modules` VALUES(110, 35, 3);

INSERT INTO `modules_type_modules` VALUES(111, 36, 1);
INSERT INTO `modules_type_modules` VALUES(112, 36, 2);
INSERT INTO `modules_type_modules` VALUES(113, 36, 3);

INSERT INTO `modules_type_modules` VALUES(114, 37, 1);
INSERT INTO `modules_type_modules` VALUES(115, 37, 2);
INSERT INTO `modules_type_modules` VALUES(116, 37, 3);
INSERT INTO `modules_type_modules` VALUES(117, 37, 3);



INSERT INTO `type_evenements` VALUES(1, 'Réunion');
INSERT INTO `type_evenements` VALUES(2, 'Convocation');
INSERT INTO `type_evenements` VALUES(3, 'Soirée');


-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id`, `titre`, `date_debut`, `date_fin`, `type_evenement_id`, `personne_id`, `description`) VALUES
(4, 'Demonstration projet tuteuré', '2012-01-27 10:30:00', '2012-01-27 11:00:00', 2, 24, 'Convocation pour la démonstration du projet tuteuré.'),
(5, 'Semaine projet tuteuré', '2012-01-23 15:40:00', '2012-01-27 11:30:00', 1, 14, 'Semaine consacrée au projet tuteuré.'),
(6, 'RDV projet tuteuré', '2012-01-24 10:00:00', '2012-01-24 11:00:00', 1, 16, 'Réunion pour une mise au point concernant le projet tuteuré.'),
(7, 'Soirée Professeurs', '2012-01-28 22:45:00', '2012-01-29 05:00:00', 3, 16, 'Soirée conviviale entre professeurs, ambiance bon-enfant !!');

--
-- Contenu de la table `evenements_personnes`
--

INSERT INTO `evenements_personnes` (`id`, `evenement_id`, `personne_id`) VALUES
(5, 4, 5),
(6, 4, 6),
(7, 4, 7),
(8, 4, 8),
(9, 4, 9),
(10, 4, 10),
(11, 4, 16),
(12, 4, 24),
(13, 5, 5),
(14, 5, 7),
(15, 5, 8),
(16, 5, 10),
(17, 5, 11),
(18, 5, 38),
(19, 5, 48),
(20, 5, 49),
(21, 5, 50),
(22, 5, 51),
(23, 5, 52),
(24, 5, 39),
(25, 5, 53),
(26, 5, 54),
(27, 5, 55),
(28, 5, 56),
(29, 5, 57),
(30, 5, 58),
(31, 5, 59),
(32, 5, 60),
(33, 5, 61),
(34, 5, 62),
(35, 5, 63),
(36, 5, 6),
(37, 5, 9),
(38, 5, 64),
(39, 5, 65),
(40, 5, 66),
(41, 5, 67),
(42, 5, 68),
(43, 5, 69),
(44, 5, 70),
(45, 5, 71),
(46, 5, 72),
(47, 5, 73),
(48, 5, 74),
(49, 5, 75),
(50, 5, 76),
(51, 5, 77),
(52, 5, 78),
(53, 5, 79),
(54, 5, 80),
(55, 5, 81),
(56, 5, 82),
(57, 5, 83),
(58, 5, 84),
(59, 5, 85),
(60, 5, 41),
(61, 5, 86),
(62, 5, 87),
(63, 5, 12),
(64, 5, 13),
(65, 5, 14),
(66, 5, 15),
(67, 5, 16),
(68, 5, 17),
(69, 5, 18),
(70, 5, 19),
(71, 5, 20),
(72, 5, 21),
(73, 5, 22),
(74, 5, 23),
(75, 5, 24),
(76, 5, 25),
(77, 5, 26),
(78, 5, 27),
(79, 5, 28),
(80, 5, 29),
(81, 5, 30),
(82, 5, 31),
(83, 5, 32),
(84, 5, 33),
(85, 5, 34),
(86, 5, 35),
(87, 5, 36),
(88, 5, 37),
(89, 5, 40),
(90, 5, 42),
(91, 5, 43),
(92, 5, 44),
(93, 5, 45),
(94, 5, 46),
(95, 5, 47),
(96, 6, 5),
(97, 6, 6),
(98, 6, 7),
(99, 6, 8),
(100, 6, 9),
(101, 6, 10),
(102, 6, 16),
(103, 7, 12),
(104, 7, 13),
(105, 7, 14),
(106, 7, 15),
(107, 7, 16),
(108, 7, 17),
(109, 7, 18),
(110, 7, 19),
(111, 7, 20),
(112, 7, 21),
(113, 7, 22),
(114, 7, 23),
(115, 7, 24),
(116, 7, 25),
(117, 7, 26),
(118, 7, 27),
(119, 7, 28),
(120, 7, 29),
(121, 7, 30),
(122, 7, 31),
(123, 7, 32),
(124, 7, 33),
(125, 7, 34),
(126, 7, 35),
(127, 7, 36),
(128, 7, 37),
(129, 7, 40),
(130, 7, 42),
(131, 7, 43),
(132, 7, 44),
(133, 7, 45),
(134, 7, 46),
(135, 7, 47);



INSERT INTO `stages` (`id`, `entreprise`, `ville`, `description`, `dispo`, `departements_id`, `date_ajout`, `document`) VALUES
(1, 'Areva', 'Val de Marne', 'Areva est un groupe industriel français spécialisé dans les métiers du nucléaire. Cette entreprise est présente au niveau international avec un réseau commercial dans 100 pays et une présence industrielle dans 43 pays.', 1, 1, '2012-01-24 14:04:38', 'Areva-Val-de-Marne-1.pdf'),
(2, 'Atos', 'Paris', 'Atos est le premier acteur européen dans les SSII et l''un des dix plus grands au niveau mondial3 et le leader en France du paiement sécurisé en ligne pour les entreprises.', 0, 1, '2012-01-24 14:06:41', 'Atos-Paris-2.pdf'),
(3, 'Orange', 'Hauts de Seine', 'Orange poursuit sa croissance et dans le cadre de notre expansion nationale, nous recherchons: Développeur informatique reporting H/F', 1, 1, '2012-01-24 14:07:06', 'Orange-Hauts-de-Seine-3.pdf'),
(4, 'Cloud Solutions', 'Austin (Etats-Unis)', 'Cloud Solutions, LLC  helps organizations and companies understand, evaluate, test, configure, and implement cloud solutions.', 1, 1, '2012-01-24 14:07:23', 'Cloud-Solutions-Austin-Etats-Unis-4.pdf'),
(5, 'Innovacs', 'Grenoble', 'Innovacs, (Innovation, Connaissances et Société) est une structure fédérative de recherche (SFR) née dans le cadre de Grenoble Université de l''Innovation. Elle regroupe l''ensemble des acteurs du site grenoblois souhaitant travailler sur les questions relatives à l''Innovation, autour de trois grands enjeux sociétaux de référence issus de l''Opération Campus : Planète durable, l''Information et la Santé.', 1, 1, '2012-01-24 14:07:43', 'Innovacs-Grenoble-5.pdf');




-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `nom`, `personne_id`, `module_id`, `type_mime`, `date_ajout`) VALUES
(1, 'cours01.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:46'),
(2, 'cours02.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:46'),
(3, 'cours03.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:47'),
(4, 'cours04.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:47'),
(5, 'cours05.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:48'),
(6, 'cours06.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:48'),
(7, 'cours07.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:49'),
(8, 'cours08.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:49'),
(9, 'Interpreteur-etape1.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:50'),
(10, 'Interpreteur-etape2.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:50'),
(11, 'Interpreteur-etape3et4.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:51'),
(12, 'Interpreteur-Extensions.pdf', 13, 24, 'application/pdf', '2012-01-24 13:00:51'),
(13, 'tp01.pdf', 13, 24, 'application/pdf', '2012-01-24 13:01:29'),
(14, 'tp02.pdf', 13, 24, 'application/pdf', '2012-01-24 13:01:30'),
(15, 'tp03.pdf', 13, 24, 'application/pdf', '2012-01-24 13:01:30'),
(16, 'tp03-suite.pdf', 13, 24, 'application/pdf', '2012-01-24 13:01:31'),
(17, 'tp04.pdf', 13, 24, 'application/pdf', '2012-01-24 13:01:31'),
(18, 'tp04-suite.pdf', 13, 24, 'application/pdf', '2012-01-24 13:01:32'),
(19, 'tp05.pdf', 13, 24, 'application/pdf', '2012-01-24 13:01:32'),
(20, 'tp06(1).pdf', 13, 24, 'application/pdf', '2012-01-24 13:01:33'),
(21, 'tp06-grille-évaluation.ods', 13, 24, 'application/vnd.oasis.opendocument.spreadsheet', '2012-01-24 13:01:33'),
(22, 'tp06-svn(4).pdf', 13, 24, 'application/pdf', '2012-01-24 13:01:34'),
(34, 'cours00.pdf', 15, 27, 'application/pdf', '2012-01-24 13:04:36'),
(35, 'cours01.pdf', 15, 27, 'application/pdf', '2012-01-24 13:04:36'),
(36, 'cours02.pdf', 15, 27, 'application/pdf', '2012-01-24 13:04:37'),
(37, 'cours03.pdf', 15, 27, 'application/pdf', '2012-01-24 13:04:37'),
(38, 'cours04.pdf', 15, 27, 'application/pdf', '2012-01-24 13:04:38'),
(39, 'cours05.pdf', 15, 27, 'application/pdf', '2012-01-24 13:04:38'),
(40, 'cours01.pdf', 15, 28, 'application/pdf', '2012-01-24 13:05:06'),
(41, 'cours02.pdf', 15, 28, 'application/pdf', '2012-01-24 13:05:06'),
(42, 'cours03.pdf', 15, 28, 'application/pdf', '2012-01-24 13:05:07'),
(43, 'cours04.pdf', 15, 28, 'application/pdf', '2012-01-24 13:05:07'),
(44, 'Cahier des charges.pdf', 14, 36, 'application/pdf', '2012-01-24 13:06:45'),
(45, 'Collignon_Schopfel_Cahier_des_Charges.pdf', 14, 36, 'application/pdf', '2012-01-24 13:06:45'),
(46, 'Gestion de projet de système d’information.pdf', 14, 36, 'application/pdf', '2012-01-24 13:07:14'),
(50, 'CM  chap 1 - Les SI - 1 par page .pdf', 20, 37, 'application/pdf', '2012-01-24 13:08:25'),
(51, 'CM  chap 2 - Les 4 dimensions des SI - 1 par page.pdf', 20, 37, 'application/pdf', '2012-01-24 13:08:26'),
(52, 'CM  chap 3 - Les SI en entreprise - 1 par page.pdf', 20, 37, 'application/pdf', '2012-01-24 13:08:26'),
(57, 'Bezier.jpg', 24, 31, 'image/jpeg', '2012-01-24 13:10:18'),
(58, 'cours-alg-lineaire etudiant.pdf', 24, 31, 'application/pdf', '2012-01-24 13:10:19'),
(59, 'grec.jpg', 24, 31, 'image/jpeg', '2012-01-24 13:10:19'),
(60, 'Traçage segment et cercle.pdf', 24, 31, 'application/pdf', '2012-01-24 13:10:20'),
(61, 'docVP.pdf', 23, 29, 'application/pdf', '2012-01-24 13:11:17'),
(62, 'Traduction_LC_Java.pdf', 23, 29, 'application/pdf', '2012-01-24 13:11:18'),
(63, 'UML.pdf', 23, 29, 'application/pdf', '2012-01-24 13:11:18'),
(65, 'Projet-Gervosou S3D-10-11.pdf', 23, 30, 'application/pdf', '2012-01-24 13:11:46'),
(66, '2010-2011asr4-16octobre.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46'),
(67, '2010-2011asr4-16octobreCorr.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46'),
(68, 'asr4-ethernet.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46'),
(69, 'asr4-intro.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46'),
(70, 'asr4-ip.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46'),
(71, 'asr4-tcp.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46'),
(72, 'asr4-td.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46'),
(73, 'asr4-vlan.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46'),
(74, 'planningASR4.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46'),
(75, '2009-2010asr4-12octobre.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46'),
(76, '2009-2010asr4-12octobre-corr.pdf', 30, 26, 'application/pdf', '2012-01-24 13:00:46');



INSERT INTO `pages_statiques` (`id`, `titre`, `contenu`) VALUES
(1, 'Règlement', 'Vous trouverez ici les documents concernant le règlement en vigueur à l\'IUT 2 de Grenoble. Merci de le lire attentivement.'),
(2, 'Documents officiels', 'Tous ces documents pourront vous être utiles pour votre scolarité.'),
(3, 'Trucs et astuces', 'Vous trouverez ici certains trucs et certaines astuces vont facilitant la vie ou vous aidant dans votre scolarité.'),
(4, 'Universités', 'Tout ce qui concerne l\'université, l\'UPMF ainsi que d\'autres universités de la région Grenobloise.'),
(5, 'Poursuites à l\'étranger', 'Vous pourrez vous tenir informé des poursuites à l\'étranger qui vous attendent.'),
(6, 'Offres d\'emploi', 'L\'IUT vous fait part des quelques offres d\'emploi.'),
(7, 'Poursuites d\'études', 'Dans cette catégorie, vous trouverez toutes les informations concdernant vos poursuites d\' études.'),
(8, 'Oedig', 'Organisation Etudiante du Départment Informatique de Grenoble.'),
(9, 'Sport', 'Toutes les informations relatives au Sport se trouvent ici.');



INSERT INTO `messages` (`id`, `titre`, `date_envoi`, `fichier`, `personne_id`, `destinataire_id`, `supprime_dest`, `supprime_exp`, `lu_dest`, `lu_exp`) VALUES
(2, 'Push !!!', '2012-01-24 13:28:18', 'message_4f1eb1f2ddfcc.xml', 9, 7, 0, 0, 1, 0),
(3, 'Etudes à l''étranger', '2012-01-24 13:31:17', 'message_4f1eb2a5da21c.xml', 7, 29, 0, 0, 1, 0),
(4, 'Soirée de samedi', '2012-01-24 13:32:41', 'message_4f1eb2f9efef8.xml', 16, 32, 0, 0, 0, 1),
(5, 'Ajout de documents', '2012-01-24 13:33:39', 'message_4f1eb333c8b6f.xml', 29, 4, 0, 0, 1, 0),
(6, 'Cours d\'ASR', '2012-01-24 13:35:28', 'message_4f1eb3a08a9c4.xml', 7, 30, 0, 0, 0, 1),
(7, 'RDV projet tuteuré', '2012-01-24 14:43:48', 'message_4f1ec3a4b2e3f.xml', 10, 16, 0, 0, 1, 1);



INSERT INTO `absences` (`id`, `date`, `justification`, `personne_id`) VALUES
(1, '2012-01-09 08:31:00', '', 82),
(2, '2012-01-12 13:00:00', 'medecin', 84),
(3, '2012-01-06 13:00:00', '', 68),
(4, '2012-01-04 16:30:00', 'conduite', 83),
(5, '2011-12-14 10:00:00', '', 78);


INSERT INTO `documents_stages` (`id`, `nom`, `personne_id`, `categorie`, `date_ajout`, `type_mime`) VALUES
(4, 'Guide-Redaction-Rapport-DUT-11-12.pdf', 30, 'stages-utiles', '2012-01-24 13:52:36', 'application/pdf'),
(5, '2A-AS-GD-Reunion-Stage-11-12.pdf', 30, 'stages-utiles', '2012-01-24 13:52:36', 'application/pdf'),
(6, 'CO-Fiche_de_presentation-11-12.pdf', 30, 'stages-utiles', '2012-01-24 13:52:37', 'application/pdf'),
(7, 'Entreprises-10-11.pdf', 30, 'stages-offres', '2012-01-24 13:52:55', 'application/pdf'),
(8, 'Liste-Entreprises-09-10.pdf', 30, 'stages-offres', '2012-01-24 13:52:55', 'application/pdf'),
(9, 'Calendrier PT1A 2011.pdf', 30, 'PT1A', '2012-01-24 13:53:11', 'application/pdf'),
(10, 'Document Etudiant PT1A 2011.pdf', 30, 'PT1A', '2012-01-24 13:53:11', 'application/pdf'),
(11, 'Fiche type évaluation PT1A.pdf', 30, 'PT1A', '2012-01-24 13:53:12', 'application/pdf'),
(12, 'Notes  PT1A s1+s2d 2011.pdf', 30, 'PT1A', '2012-01-24 13:53:12', 'application/pdf'),
(13, 'Pages_De_Présentation.doc', 30, 'PT1A', '2012-01-24 13:53:13', 'application/msword'),
(14, 'Calendrier PT2A 2011 s4.pdf', 30, 'PT2A', '2012-01-24 13:53:26', 'application/pdf'),
(15, 'Calendrier PT2A 2011 s4D.pdf', 30, 'PT2A', '2012-01-24 13:53:26', 'application/pdf'),
(16, 'Document Etudiant PT2A 2011-2012.pdf', 30, 'PT2A', '2012-01-24 13:53:26', 'application/pdf'),
(17, 'Fiche 1 sujet étudiant 2011.pdf', 30, 'PT2A', '2012-01-24 13:53:27', 'application/pdf'),
(18, 'Fiche 2 prepa soutenance 2011.doc', 30, 'PT2A', '2012-01-24 13:53:27', 'application/msword'),
(19, 'GROUPE PT2A s3 sept 2011.pdf', 30, 'PT2A', '2012-01-24 13:53:28', 'application/pdf'),
(20, 'Pages_De_Présentation.doc', 30, 'PT2A', '2012-01-24 13:53:28', 'application/msword'),
(21, 'planning soutenance janv 2012.xls', 30, 'PT2A', '2012-01-24 13:53:29', 'application/vnd.ms-excel'),
(22, 'Note Etudiants PPP 2012.pdf', 30, 'PPP', '2012-01-24 13:53:49', 'application/pdf'),
(23, 'PromoPrec_Intratek.pdf', 30, 'PPP', '2012-01-24 13:53:50', 'application/pdf'),
(24, 'AnnuaireDiplomes2004.pdf', 30, 'PPP', '2012-01-24 13:54:19', 'application/pdf'),
(25, 'Diplômés2005.pdf', 30, 'PPP', '2012-01-24 13:54:20', 'application/pdf'),
(26, 'GrilleAnalyse.pdf', 30, 'PPP', '2012-01-24 13:54:20', 'application/pdf'),
(27, 'dec 2007 - janv 2008 062.jpg', 30, 'posters', '2012-01-24 13:54:33', 'image/jpeg'),
(28, 'dec 2007 - janv 2008 063.jpg', 30, 'posters', '2012-01-24 13:54:34', 'image/jpeg'),
(29, 'dec 2007 - janv 2008 065.jpg', 30, 'posters', '2012-01-24 13:54:35', 'image/jpeg'),
(30, 'dec 2007 - janv 2008 066.jpg', 30, 'posters', '2012-01-24 13:54:35', 'image/jpeg'),
(31, 'dec 2007 - janv 2008 067.jpg', 30, 'posters', '2012-01-24 13:54:36', 'image/jpeg'),
(32, 'dec 2007 - janv 2008 068.jpg', 30, 'posters', '2012-01-24 13:54:37', 'image/jpeg'),
(33, 'dec 2007 - janv 2008 070.jpg', 30, 'posters', '2012-01-24 13:54:37', 'image/jpeg'),
(34, 'dec 2007 - janv 2008 071.jpg', 30, 'posters', '2012-01-24 13:54:38', 'image/jpeg'),
(35, 'dec 2007 - janv 2008 073.jpg', 30, 'posters', '2012-01-24 13:54:39', 'image/jpeg');



INSERT INTO `documents_statiques` (`id`, `nom`, `type_mime`) VALUES
(1, 'ADIL 16-11-11.doc', 'application/msword'),
(2, 'BRL INGENIERIE  13 décembre 2011.doc', 'application/msword'),
(3, 'Ds2jl Informatique 22-11-11.doc', 'application/msword'),
(4, 'KERCIA Développeur Web Technologies Open Source.doc', 'application/msword'),
(5, 'MGPARTNERS 13 décembre 2011.doc', 'application/msword'),
(6, 'STE COGNIZANT 29-11-11.doc', 'application/msword'),
(7, 'ModulesMESSI-MIAM-SIMO-2011-2012-3.pdf', 'application/pdf'),
(8, 'RDE-LicPro-MESSI -sept 11.pdf', 'application/pdf'),
(9, 'RDE-LicPro-MIAM -sept 11.pdf', 'application/pdf'),
(10, 'RDE-LicPro-SIMO -sept 11.pdf', 'application/pdf'),
(11, 'Reglement des Etudes-DUT-07-08.doc', 'application/msword'),
(12, 'TAB MCC 2011-2012 - MESSI.pdf', 'application/pdf'),
(13, 'Arrete-lp-1999.pdf', 'application/pdf'),
(14, 'PPN DUT INFO CNESER 19 07 05.pdf', 'application/pdf'),
(15, '00_infos_etudiants.doc', 'application/msword'),
(16, 'ComeToOxfordBrookesIUT2.pdf', 'application/pdf'),
(17, 'UCAS_notes.doc', 'application/msword'),
(18, 'ProgDUTinfo2pages.pdf', 'application/pdf'),
(19, 'Promotion2010.pdf', 'application/pdf'),
(20, 'Stands Forum PE.pdf', 'application/pdf'),
(21, 'TRAITEMENT DES ADMISSIONS SUR PASSERELLE.pdf', 'application/pdf'),
(22, 'CirculaireACDI.pdf', 'application/pdf'),
(23, 'DevenirEtudiants2008.pdf', 'application/pdf'),
(24, 'EtudesPromo2009.pdf', 'application/pdf'),
(25, 'PrésentationsAmphi.pdf', 'application/pdf'),
(26, 'Procédure de gestion des dossiers de candidature_2012.pdf', 'application/pdf'),
(27, 'trucsEtAstucesMachinesLinux.pdf', 'application/pdf'),
(33, 'asr_systeme_03.gif', 'image/gif'),
(34, 'asr_systeme_04.gif', 'image/gif'),
(35, 'asr_systeme_05.gif', 'image/gif'),
(36, 'asr_systeme_01.gif', 'image/gif'),
(37, 'asr_systeme_02.gif', 'image/gif'),
(38, 'droit_01.gif', 'image/gif'),
(39, 'droit_02.gif', 'image/gif'),
(40, 'droit_03.gif', 'image/gif'),
(41, 'droit_04.gif', 'image/gif'),
(42, 'mat_01.gif', 'image/gif'),
(43, 'mat_02.gif', 'image/gif'),
(44, 'omgl_30_01.gif', 'image/gif'),
(45, 'omgl_30_02.gif', 'image/gif'),
(46, 'omgl_30_03.gif', 'image/gif'),
(47, 'charte_info_2009-2010.pdf', 'application/pdf'),
(48, 'installationPortablesLP.pdf', 'application/pdf'),
(49, 'ADIL 16-11-11.doc', 'application/msword'),
(50, 'BRL INGENIERIE  13 décembre 2011.doc', 'application/msword'),
(51, 'Ds2jl Informatique 22-11-11.doc', 'application/msword'),
(52, 'KERCIA Développeur Web Technologies Open Source.doc', 'application/msword'),
(53, 'MGPARTNERS 13 décembre 2011.doc', 'application/msword'),
(54, 'STE COGNIZANT 29-11-11.doc', 'application/msword'),
(55, 'Procédure de gestion des dossiers de candidature_2012.pdf', 'application/pdf'),
(56, 'ProgDUTinfo2pages.pdf', 'application/pdf'),
(57, 'Promotion2010.pdf', 'application/pdf'),
(58, 'Stands Forum PE.pdf', 'application/pdf'),
(59, 'TRAITEMENT DES ADMISSIONS SUR PASSERELLE.pdf', 'application/pdf'),
(60, 'CirculaireACDI.pdf', 'application/pdf'),
(61, 'DevenirEtudiants2008.pdf', 'application/pdf'),
(62, 'EtudesPromo2009.pdf', 'application/pdf'),
(63, 'PrésentationsAmphi.pdf', 'application/pdf'),
(64, 'ComeToOxfordBrookesIUT2.pdf', 'application/pdf'),
(65, 'UCAS_notes.doc', 'application/msword'),
(66, '00_infos_etudiants.doc', 'application/msword'),
(67, 'Arrete-lp-1999.pdf', 'application/pdf'),
(68, 'PPN DUT INFO CNESER 19 07 05.pdf', 'application/pdf'),
(69, 'ModulesMESSI-MIAM-SIMO-2011-2012-3.pdf', 'application/pdf'),
(70, 'RDE-LicPro-MESSI -sept 11.pdf', 'application/pdf'),
(71, 'RDE-LicPro-MIAM -sept 11.pdf', 'application/pdf'),
(72, 'RDE-LicPro-SIMO -sept 11.pdf', 'application/pdf'),
(73, 'Reglement des Etudes-DUT-07-08.doc', 'application/msword'),
(74, 'TAB MCC 2011-2012 - MESSI.pdf', 'application/pdf'),
(75, 'rentréeLP2011.pdf', 'application/pdf'),
(76, 'rentréeRN2011.pdf', 'application/pdf'),
(77, 'rentreeS1d.pdf', 'application/pdf'),
(78, 'livret09-10.pdf', 'application/pdf'),
(79, 'livret2011-2012 AS.pdf', 'application/pdf'),
(80, 'Livret_Accueil_etudiant_LP_11-12.pdf', 'application/pdf'),
(81, 'trucsEtAstucesMachinesLinux.pdf', 'application/pdf'),
(82, 'installationPortablesLP.pdf', 'application/pdf'),
(83, 'charte_info_2009-2010.pdf', 'application/pdf'),
(84, 'asr_systeme_01.gif', 'image/gif'),
(85, 'asr_systeme_02.gif', 'image/gif'),
(86, 'asr_systeme_03.gif', 'image/gif'),
(87, 'asr_systeme_04.gif', 'image/gif'),
(88, 'asr_systeme_05.gif', 'image/gif'),
(89, 'droit_01.gif', 'image/gif'),
(90, 'droit_02.gif', 'image/gif'),
(91, 'droit_03.gif', 'image/gif'),
(92, 'droit_04.gif', 'image/gif'),
(93, 'maths_mars_01.gif', 'image/gif'),
(94, 'maths_mars_02.gif', 'image/gif'),
(95, 'omgl_50_01.gif', 'image/gif'),
(96, 'omgl_50_02.gif', 'image/gif'),
(97, 'omgl_50_03.gif', 'image/gif'),
(98, 'omgl_50_04.gif', 'image/gif'),
(99, 'omgl_50_05.gif', 'image/gif'),
(100, 'omgl_50_06.gif', 'image/gif'),
(101, 'omgl_50_07.gif', 'image/gif'),
(102, 'omgl_50_08.gif', 'image/gif'),
(103, 'omgl_50_09.gif', 'image/gif'),
(104, 'omgl_50_10.gif', 'image/gif'),
(105, 'omgl_50_11.gif', 'image/gif'),
(106, 'omgl_50_12.gif', 'image/gif');

--
-- Dumping data for table `pages_statiques_documents_statiques`
--

INSERT INTO `pages_statiques_documents_statiques` (`id`, `pages_statique_id`, `documents_statique_id`) VALUES
(1, 6, 49),
(2, 6, 50),
(3, 6, 51),
(4, 6, 52),
(5, 6, 53),
(6, 6, 54),
(7, 7, 55),
(8, 7, 56),
(9, 7, 57),
(10, 7, 58),
(11, 7, 59),
(12, 7, 60),
(13, 7, 61),
(14, 7, 62),
(15, 7, 63),
(16, 5, 64),
(17, 5, 65),
(18, 5, 66),
(19, 2, 67),
(20, 2, 68),
(21, 1, 69),
(22, 1, 70),
(23, 1, 71),
(24, 1, 72),
(25, 1, 73),
(26, 1, 74),
(27, 2, 75),
(28, 2, 76),
(29, 2, 77),
(30, 2, 78),
(31, 2, 79),
(32, 2, 80),
(33, 3, 81),
(34, 3, 82),
(35, 2, 83),
(36, 8, 84),
(37, 8, 85),
(38, 8, 86),
(39, 8, 87),
(40, 8, 88),
(41, 8, 89),
(42, 8, 90),
(43, 8, 91),
(44, 8, 92),
(45, 8, 93),
(46, 8, 94),
(47, 8, 95),
(48, 8, 96),
(49, 8, 97),
(50, 8, 98),
(51, 8, 99),
(52, 8, 100),
(53, 8, 101),
(54, 8, 102),
(55, 8, 103),
(56, 8, 104),
(57, 8, 105),
(58, 8, 106);

INSERT INTO `notes` (`id`, `personne_id`, `type_module_id`, `module_id`, `note`, `coefficient`) VALUES
(1, 48, 1, 30, 11, 15),
(2, 7, 1, 30, 15, 15),
(3, 11, 1, 30, 10, 15),
(4, 38, 1, 30, 4, 15),
(5, 10, 1, 30, 16, 15),
(6, 8, 1, 30, 12, 15),
(7, 5, 1, 30, 18, 15),
(8, 49, 1, 30, 2, 15),
(9, 50, 1, 30, 11, 15),
(10, 51, 1, 30, 1, 15),
(11, 52, 1, 30, 17, 15),
(12, 48, 1, 24, 12, 15),
(13, 7, 1, 24, 13, 15),
(14, 11, 1, 24, 10, 15),
(15, 38, 1, 24, 12, 15),
(16, 10, 1, 24, 14, 15),
(17, 8, 1, 24, 15, 15),
(18, 5, 1, 24, 10, 15),
(19, 49, 1, 24, 11, 15),
(20, 50, 1, 24, 12, 15),
(21, 51, 1, 24, 10, 15),
(22, 52, 1, 24, 11, 15),
(23, 48, 2, 24, 12, 5),
(24, 7, 2, 24, 13, 5),
(25, 11, 2, 24, 14, 5),
(26, 38, 2, 24, 15, 5),
(27, 10, 2, 24, 10, 5),
(28, 8, 2, 24, 4, 5),
(29, 5, 2, 24, 10, 5),
(30, 49, 2, 24, 15, 5),
(31, 50, 2, 24, 14, 5),
(32, 51, 2, 24, 10, 5),
(33, 52, 2, 24, 15, 5),
(34, 48, 3, 24, 12, 12),
(35, 7, 3, 24, 15, 12),
(36, 11, 3, 24, 14, 12),
(37, 38, 3, 24, 15, 12),
(38, 10, 3, 24, 16, 12),
(39, 8, 3, 24, 10, 12),
(40, 5, 3, 24, 12, 12),
(41, 49, 3, 24, 14, 12),
(42, 50, 3, 24, 10, 12),
(43, 51, 3, 24, 10, 12),
(44, 52, 3, 24, 10, 12),
(45, 48, 1, 25, 12, 13),
(46, 7, 1, 25, 14, 13),
(47, 11, 1, 25, 10, 13),
(48, 38, 1, 25, 11, 13),
(49, 10, 1, 25, 12, 13),
(50, 8, 1, 25, 11, 13),
(51, 5, 1, 25, 12, 13),
(52, 49, 1, 25, 11, 13),
(53, 50, 1, 25, 10, 13),
(54, 51, 1, 25, 12, 13),
(55, 52, 1, 25, 14, 13),
(56, 48, 2, 25, 15, 6),
(57, 7, 2, 25, 10, 6),
(58, 11, 2, 25, 12, 6),
(59, 38, 2, 25, 12, 6),
(60, 10, 2, 25, 12, 6),
(61, 8, 2, 25, 12, 6),
(62, 5, 2, 25, 13, 6),
(63, 49, 2, 25, 14, 6),
(64, 50, 2, 25, 10, 6),
(65, 51, 2, 25, 12, 6),
(66, 52, 2, 25, 12, 6),
(67, 48, 3, 25, 12, 14),
(68, 7, 3, 25, 12, 14),
(69, 11, 3, 25, 10, 14),
(70, 38, 3, 25, 11, 14),
(71, 10, 3, 25, 16, 14),
(72, 8, 3, 25, 12, 14),
(73, 5, 3, 25, 18, 14),
(74, 49, 3, 25, 10, 14),
(75, 50, 3, 25, 10, 14),
(76, 51, 3, 25, 10, 14),
(77, 52, 3, 25, 10, 14),
(78, 48, 4, 25, 10, 16),
(79, 7, 4, 25, 18, 16),
(80, 11, 4, 25, 10, 16),
(81, 38, 4, 25, 10, 16),
(82, 10, 4, 25, 19, 16),
(83, 8, 4, 25, 10, 16),
(84, 5, 4, 25, 19, 16),
(85, 49, 4, 25, 10, 16),
(86, 50, 4, 25, 10, 16),
(87, 51, 4, 25, 10, 16),
(88, 52, 4, 25, 18, 16),
(89, 48, 1, 26, 12, 9),
(90, 7, 1, 26, 18, 9),
(91, 11, 1, 26, 12, 9),
(92, 38, 1, 26, 12, 9),
(93, 10, 1, 26, 12, 9),
(94, 8, 1, 26, 12, 9),
(95, 5, 1, 26, 12, 9),
(96, 49, 1, 26, 12, 9),
(97, 50, 1, 26, 12, 9),
(98, 51, 1, 26, 12, 9),
(99, 52, 1, 26, 12, 9),
(100, 48, 2, 26, 12, 8),
(101, 7, 2, 26, 12, 8),
(102, 11, 2, 26, 13, 8),
(103, 38, 2, 26, 10, 8),
(104, 10, 2, 26, 10, 8),
(105, 8, 2, 26, 14, 8),
(106, 5, 2, 26, 12, 8),
(107, 49, 2, 26, 11, 8),
(108, 50, 2, 26, 10, 8),
(109, 51, 2, 26, 11, 8),
(110, 52, 2, 26, 11, 8),
(111, 48, 3, 26, 12, 13),
(112, 7, 3, 26, 17, 13),
(113, 11, 3, 26, 14, 13),
(114, 38, 3, 26, 12, 13),
(115, 10, 3, 26, 14, 13),
(116, 8, 3, 26, 18, 13),
(117, 5, 3, 26, 10, 13),
(118, 49, 3, 26, 11, 13),
(119, 50, 3, 26, 11, 13),
(120, 51, 3, 26, 11, 13),
(121, 52, 3, 26, 11, 13),
(122, 48, 1, 27, 13, 11),
(123, 7, 1, 27, 13, 11),
(124, 11, 1, 27, 13, 11),
(125, 38, 1, 27, 13, 11),
(126, 10, 1, 27, 13, 11),
(127, 8, 1, 27, 13, 11),
(128, 5, 1, 27, 13, 11),
(129, 49, 1, 27, 13, 11),
(130, 50, 1, 27, 13, 11),
(131, 51, 1, 27, 13, 11),
(132, 52, 1, 27, 13, 11),
(133, 48, 1, 28, 12, 12),
(134, 7, 1, 28, 12, 12),
(135, 11, 1, 28, 12, 12),
(136, 38, 1, 28, 12, 12),
(137, 10, 1, 28, 12, 12),
(138, 8, 1, 28, 12, 12),
(139, 5, 1, 28, 12, 12),
(140, 49, 1, 28, 12, 12),
(141, 50, 1, 28, 12, 12),
(142, 51, 1, 28, 1, 12),
(143, 52, 1, 28, 2, 12),
(144, 48, 2, 27, 14, 17),
(145, 7, 2, 27, 14, 17),
(146, 11, 2, 27, 14, 17),
(147, 38, 2, 27, 14, 17),
(148, 10, 2, 27, 14, 17),
(149, 8, 2, 27, 14, 17),
(150, 5, 2, 27, 14, 17),
(151, 49, 2, 27, 14, 17),
(152, 50, 2, 27, 14, 17),
(153, 51, 2, 27, 14, 17),
(154, 52, 2, 27, 14, 17),
(155, 48, 3, 27, 12, 12),
(156, 7, 3, 27, 14, 12),
(157, 11, 3, 27, 14, 12),
(158, 38, 3, 27, 14, 12),
(159, 10, 3, 27, 14, 12),
(160, 8, 3, 27, 14, 12),
(161, 5, 3, 27, 14, 12),
(162, 49, 3, 27, 14, 12),
(163, 50, 3, 27, 14, 12),
(164, 51, 3, 27, 14, 12),
(165, 52, 3, 27, 14, 12),
(166, 48, 2, 28, 12, 8),
(167, 7, 2, 28, 8, 8),
(168, 11, 2, 28, 10, 8),
(169, 38, 2, 28, 14, 8),
(170, 10, 2, 28, 14, 8),
(171, 8, 2, 28, 14, 8),
(172, 5, 2, 28, 14, 8),
(173, 49, 2, 28, 15, 8),
(174, 50, 2, 28, 15, 8),
(175, 51, 2, 28, 15, 8),
(176, 52, 2, 28, 15, 8),
(177, 48, 3, 28, 20, 18),
(178, 7, 3, 28, 19, 18),
(179, 11, 3, 28, 19, 18),
(180, 38, 3, 28, 19, 18),
(181, 10, 3, 28, 19, 18),
(182, 8, 3, 28, 19, 18),
(183, 5, 3, 28, 19, 18),
(184, 49, 3, 28, 19, 18),
(185, 50, 3, 28, 19, 18),
(186, 51, 3, 28, 19, 18),
(187, 52, 3, 28, 19, 18),
(188, 48, 1, 29, 12, 20),
(189, 7, 1, 29, 14, 20),
(190, 11, 1, 29, 13, 20),
(191, 38, 1, 29, 13, 20),
(192, 10, 1, 29, 13, 20),
(193, 8, 1, 29, 13, 20),
(194, 5, 1, 29, 13, 20),
(195, 49, 1, 29, 13, 20),
(196, 50, 1, 29, 13, 20),
(197, 51, 1, 29, 13, 20),
(198, 52, 1, 29, 13, 20),
(199, 48, 2, 29, 11, 19),
(200, 7, 2, 29, 11, 19),
(201, 11, 2, 29, 12, 19),
(202, 38, 2, 29, 12, 19),
(203, 10, 2, 29, 12, 19),
(204, 8, 2, 29, 12, 19),
(205, 5, 2, 29, 12, 19),
(206, 49, 2, 29, 12, 19),
(207, 50, 2, 29, 12, 19),
(208, 51, 2, 29, 12, 19),
(209, 52, 2, 29, 12, 19),
(210, 48, 3, 29, 12, 18),
(211, 7, 3, 29, 12, 18),
(212, 11, 3, 29, 10, 18),
(213, 38, 3, 29, 10, 18),
(214, 10, 3, 29, 10, 18),
(215, 8, 3, 29, 10, 18),
(216, 5, 3, 29, 10, 18),
(217, 49, 3, 29, 10, 18),
(218, 50, 3, 29, 10, 18),
(219, 51, 3, 29, 10, 18),
(220, 52, 3, 29, 10, 18),
(221, 48, 2, 30, 12, 17),
(222, 7, 2, 30, 13, 17),
(223, 11, 2, 30, 10, 17),
(224, 38, 2, 30, 10, 17),
(225, 10, 2, 30, 11, 17),
(226, 8, 2, 30, 11, 17),
(227, 5, 2, 30, 11, 17),
(228, 49, 2, 30, 11, 17),
(229, 50, 2, 30, 11, 17),
(230, 51, 2, 30, 11, 17),
(231, 52, 2, 30, 11, 17),
(232, 48, 3, 30, 12, 16),
(233, 7, 3, 30, 14, 16),
(234, 11, 3, 30, 10, 16),
(235, 38, 3, 30, 10, 16),
(236, 10, 3, 30, 10, 16),
(237, 8, 3, 30, 12, 16),
(238, 5, 3, 30, 12, 16),
(239, 49, 3, 30, 12, 16),
(240, 50, 3, 30, 12, 16),
(241, 51, 3, 30, 12, 16),
(242, 52, 3, 30, 12, 16),
(243, 48, 4, 30, 17, 22),
(244, 7, 4, 30, 17, 22),
(245, 11, 4, 30, 15, 22),
(246, 38, 4, 30, 15, 22),
(247, 10, 4, 30, 15, 22),
(248, 8, 4, 30, 15, 22),
(249, 5, 4, 30, 15, 22),
(250, 49, 4, 30, 15, 22),
(251, 50, 4, 30, 15, 22),
(252, 51, 4, 30, 15, 22),
(253, 52, 4, 30, 15, 22),
(254, 48, 1, 31, 11, 20),
(255, 7, 1, 31, 17, 20),
(256, 11, 1, 31, 14, 20),
(257, 38, 1, 31, 15, 20),
(258, 10, 1, 31, 14, 20),
(259, 8, 1, 31, 10, 20),
(260, 5, 1, 31, 11, 20),
(261, 49, 1, 31, 12, 20),
(262, 50, 1, 31, 12, 20),
(263, 51, 1, 31, 10, 20),
(264, 52, 1, 31, 11, 20),
(265, 48, 2, 31, 12, 21),
(266, 7, 2, 31, 15, 21),
(267, 11, 2, 31, 14, 21),
(268, 38, 2, 31, 12, 21),
(269, 10, 2, 31, 13, 21),
(270, 8, 2, 31, 14, 21),
(271, 5, 2, 31, 10, 21),
(272, 49, 2, 31, 11, 21),
(273, 50, 2, 31, 13, 21),
(274, 51, 2, 31, 11, 21),
(275, 52, 2, 31, 10, 21),
(276, 48, 3, 31, 12, 23),
(277, 7, 3, 31, 16, 23),
(278, 11, 3, 31, 14, 23),
(279, 38, 3, 31, 10, 23),
(280, 10, 3, 31, 12, 23),
(281, 8, 3, 31, 12, 23),
(282, 5, 3, 31, 10, 23),
(283, 49, 3, 31, 15, 23),
(284, 50, 3, 31, 17, 23),
(285, 51, 3, 31, 14, 23),
(286, 52, 3, 31, 10, 23),
(287, 48, 1, 32, 12, 10),
(288, 7, 1, 32, 10, 10),
(289, 11, 1, 32, 12, 10),
(290, 38, 1, 32, 10, 10),
(291, 10, 1, 32, 10, 10),
(292, 8, 1, 32, 12, 10),
(293, 5, 1, 32, 9, 10),
(294, 49, 1, 32, 8, 10),
(295, 50, 1, 32, 7, 10),
(296, 51, 1, 32, 6, 10),
(297, 52, 1, 32, 5, 10),
(298, 48, 1, 33, 10, 10),
(299, 7, 1, 33, 14, 10),
(300, 11, 1, 33, 10, 10),
(301, 38, 1, 33, 10, 10),
(302, 10, 1, 33, 11, 10),
(303, 8, 1, 33, 12, 10),
(304, 5, 1, 33, 11, 10),
(305, 49, 1, 33, 11, 10),
(306, 50, 1, 33, 10, 10),
(307, 51, 1, 33, 10, 10),
(308, 52, 1, 33, 10, 10),
(309, 48, 2, 32, 11, 10),
(310, 7, 2, 32, 13, 10),
(311, 11, 2, 32, 10, 10),
(312, 38, 2, 32, 14, 10),
(313, 10, 2, 32, 11, 10),
(314, 8, 2, 32, 10, 10),
(315, 5, 2, 32, 10, 10),
(316, 49, 2, 32, 11, 10),
(317, 50, 2, 32, 12, 10),
(318, 51, 2, 32, 11, 10),
(319, 52, 2, 32, 10, 10),
(320, 48, 2, 33, 11, 10),
(321, 7, 2, 33, 13, 10),
(322, 11, 2, 33, 10, 10),
(323, 38, 2, 33, 12, 10),
(324, 10, 2, 33, 11, 10),
(325, 8, 2, 33, 12, 10),
(326, 5, 2, 33, 12, 10),
(327, 49, 2, 33, 10, 10),
(328, 50, 2, 33, 9, 10),
(329, 51, 2, 33, 8, 10),
(330, 52, 2, 33, 7, 10),
(331, 48, 3, 32, 12, 11),
(332, 7, 3, 32, 11, 11),
(333, 11, 3, 32, 11, 11),
(334, 38, 3, 32, 10, 11),
(335, 10, 3, 32, 12, 11),
(336, 8, 3, 32, 9, 11),
(337, 5, 3, 32, 4, 11),
(338, 49, 3, 32, 10, 11),
(339, 50, 3, 32, 11, 11),
(340, 51, 3, 32, 11, 11),
(341, 52, 3, 32, 11, 11),
(342, 48, 3, 33, 12, 11),
(343, 7, 3, 33, 9, 11),
(344, 11, 3, 33, 10, 11),
(345, 38, 3, 33, 11, 11),
(346, 10, 3, 33, 10, 11),
(347, 8, 3, 33, 11, 11),
(348, 5, 3, 33, 12, 11),
(349, 49, 3, 33, 11, 11),
(350, 50, 3, 33, 10, 11),
(351, 51, 3, 33, 12, 11),
(352, 52, 3, 33, 10, 11),
(353, 48, 1, 34, 10, 7),
(354, 7, 1, 34, 12, 7),
(355, 11, 1, 34, 10, 7),
(356, 38, 1, 34, 11, 7),
(357, 10, 1, 34, 12, 7),
(358, 8, 1, 34, 14, 7),
(359, 5, 1, 34, 10, 7),
(360, 49, 1, 34, 9, 7),
(361, 50, 1, 34, 8, 7),
(362, 51, 1, 34, 12, 7),
(363, 52, 1, 34, 11, 7),
(364, 48, 1, 35, 10, 8),
(365, 7, 1, 35, 10, 8),
(366, 11, 1, 35, 10, 8),
(367, 38, 1, 35, 10, 8),
(368, 10, 1, 35, 10, 8),
(369, 8, 1, 35, 10, 8),
(370, 5, 1, 35, 10, 8),
(371, 49, 1, 35, 10, 8),
(372, 50, 1, 35, 10, 8),
(373, 51, 1, 35, 10, 8),
(374, 52, 1, 35, 10, 8),
(375, 48, 2, 34, 11, 7),
(376, 7, 2, 34, 11, 7),
(377, 11, 2, 34, 11, 7),
(378, 38, 2, 34, 11, 7),
(379, 10, 2, 34, 11, 7),
(380, 8, 2, 34, 11, 7),
(381, 5, 2, 34, 11, 7),
(382, 49, 2, 34, 11, 7),
(383, 50, 2, 34, 11, 7),
(384, 51, 2, 34, 11, 7),
(385, 52, 2, 34, 11, 7),
(386, 48, 2, 35, 14, 9),
(387, 7, 2, 35, 15, 9),
(388, 11, 2, 35, 14, 9),
(389, 38, 2, 35, 14, 9),
(390, 10, 2, 35, 12, 9),
(391, 8, 2, 35, 10, 9),
(392, 5, 2, 35, 12, 9),
(393, 49, 2, 35, 12, 9),
(394, 50, 2, 35, 12, 9),
(395, 51, 2, 35, 10, 9),
(396, 52, 2, 35, 11, 9),
(397, 48, 3, 34, 12, 6),
(398, 7, 3, 34, 13, 6),
(399, 11, 3, 34, 12, 6),
(400, 38, 3, 34, 10, 6),
(401, 10, 3, 34, 11, 6),
(402, 8, 3, 34, 12, 6),
(403, 5, 3, 34, 14, 6),
(404, 49, 3, 34, 10, 6),
(405, 50, 3, 34, 10, 6),
(406, 51, 3, 34, 14, 6),
(407, 52, 3, 34, 12, 6),
(408, 48, 3, 35, 12, 4),
(409, 7, 3, 35, 12, 4),
(410, 11, 3, 35, 12, 4),
(411, 38, 3, 35, 12, 4),
(412, 10, 3, 35, 12, 4),
(413, 8, 3, 35, 12, 4),
(414, 5, 3, 35, 12, 4),
(415, 49, 3, 35, 12, 4),
(416, 50, 3, 35, 12, 4),
(417, 51, 3, 35, 12, 4),
(418, 52, 3, 35, 12, 4),
(419, 48, 1, 36, 12, 14),
(420, 7, 1, 36, 7, 14),
(421, 11, 1, 36, 10, 14),
(422, 38, 1, 36, 12, 14),
(423, 10, 1, 36, 11, 14),
(424, 8, 1, 36, 5, 14),
(425, 5, 1, 36, 6, 14),
(426, 49, 1, 36, 0, 14),
(427, 50, 1, 36, 2, 14),
(428, 51, 1, 36, 0, 14),
(429, 52, 1, 36, 7, 14),
(430, 48, 2, 36, 17, 18),
(431, 7, 2, 36, 17, 18),
(432, 11, 2, 36, 14, 18),
(433, 38, 2, 36, 15, 18),
(434, 10, 2, 36, 16, 18),
(435, 8, 2, 36, 14, 18),
(436, 5, 2, 36, 15, 18),
(437, 49, 2, 36, 10, 18),
(438, 50, 2, 36, 11, 18),
(439, 51, 2, 36, 17, 18),
(440, 52, 2, 36, 15, 18),
(441, 48, 3, 36, 12, 15),
(442, 7, 3, 36, 12, 15),
(443, 11, 3, 36, 12, 15),
(444, 38, 3, 36, 11, 15),
(445, 10, 3, 36, 10, 15),
(446, 8, 3, 36, 11, 15),
(447, 5, 3, 36, 10, 15),
(448, 49, 3, 36, 7, 15),
(449, 50, 3, 36, 18, 15),
(450, 51, 3, 36, 14, 15),
(451, 52, 3, 36, 11, 15),
(452, 48, 1, 37, 10, 12),
(453, 7, 1, 37, 15, 12),
(454, 11, 1, 37, 11, 12),
(455, 38, 1, 37, 10, 12),
(456, 10, 1, 37, 12, 12),
(457, 8, 1, 37, 14, 12),
(458, 5, 1, 37, 15, 12),
(459, 49, 1, 37, 11, 12),
(460, 50, 1, 37, 12, 12),
(461, 51, 1, 37, 10, 12),
(462, 52, 1, 37, 10, 12),
(463, 48, 2, 37, 14, 11),
(464, 7, 2, 37, 12, 11),
(465, 11, 2, 37, 14, 11),
(466, 38, 2, 37, 12, 11),
(467, 10, 2, 37, 11, 11),
(468, 8, 2, 37, 10, 11),
(469, 5, 2, 37, 12, 11),
(470, 49, 2, 37, 13, 11),
(471, 50, 2, 37, 14, 11),
(472, 51, 2, 37, 15, 11),
(473, 52, 2, 37, 14, 11),
(474, 48, 3, 37, 14, 12),
(475, 7, 3, 37, 18, 12),
(476, 11, 3, 37, 10, 12),
(477, 38, 3, 37, 12, 12),
(478, 10, 3, 37, 14, 12),
(479, 8, 3, 37, 13, 12),
(480, 5, 3, 37, 11, 12),
(481, 49, 3, 37, 11, 12),
(482, 50, 3, 37, 11, 12),
(483, 51, 3, 37, 12, 12),
(484, 52, 3, 37, 11, 12);
