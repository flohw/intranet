-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 20 Décembre 2011 à 17:39
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
TRUNCATE `notes`;
TRUNCATE `documents_stages`;
TRUNCATE `stages`;
TRUNCATE `evenements_personnes`;
TRUNCATE `evenements`;
TRUNCATE `type_evenements`;
TRUNCATE `absences`;
TRUNCATE `messages`;
TRUNCATE `documents`;
TRUNCATE `modules_type_modules`;
TRUNCATE `modules_personnes`;
TRUNCATE `personnes`;
TRUNCATE `statuts`;
TRUNCATE `type_modules`;
TRUNCATE `modules`;
TRUNCATE `libelle_modules`;
TRUNCATE `groupes`;
TRUNCATE `semestres`;
TRUNCATE `departements`;
-- Base de données: `intranet`
--

-- Contenu de la table `departements`

INSERT INTO `departements` VALUES(1, 'Informatique', 300);
INSERT INTO `departements` VALUES(2, 'Carrières juridique', 200);

-- Contenu de la table `semestres`

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

-- Contenu de la table `groupes`

INSERT INTO `groupes` VALUES(1, 'A1', 15, 1);
INSERT INTO `groupes` VALUES(2, 'A2', 15, 1);
INSERT INTO `groupes` VALUES(3, 'B1', 15, 1);
INSERT INTO `groupes` VALUES(4, 'B2', 15, 1);
INSERT INTO `groupes` VALUES(5, 'C1', 15, 1);
INSERT INTO `groupes` VALUES(6, 'C2', 15, 1);
INSERT INTO `groupes` VALUES(7, 'D1', 15, 1);
INSERT INTO `groupes` VALUES(8, 'D2', 15, 1);

INSERT INTO `groupes` VALUES(9, 'A1', 15, 2);
INSERT INTO `groupes` VALUES(10, 'A2', 15, 2);
INSERT INTO `groupes` VALUES(11, 'B1', 15, 2);
INSERT INTO `groupes` VALUES(12, 'B2', 15, 2);
INSERT INTO `groupes` VALUES(13, 'C1', 15, 2);
INSERT INTO `groupes` VALUES(14, 'C2', 15, 2);
INSERT INTO `groupes` VALUES(15, 'D1', 15, 2);
INSERT INTO `groupes` VALUES(16, 'D2', 15, 2);

INSERT INTO `groupes` VALUES(17, 'Administrateurs', 15, 1);
INSERT INTO `groupes` VALUES(18, 'Enseignants', 15, 1);

-- Contenu de la table `libelle_modules`

INSERT INTO `libelle_modules` VALUES(1, 'Algorithmique et programmation');
INSERT INTO `libelle_modules` VALUES(2, 'Architectures, systèmes et réseaux');
INSERT INTO `libelle_modules` VALUES(3, 'Outils et modèles du génie logiciel');
INSERT INTO `libelle_modules` VALUES(4, 'Mathématiques');
INSERT INTO `libelle_modules` VALUES(5, 'Expression et communication');
INSERT INTO `libelle_modules` VALUES(6, 'Economie et gestion des organisations');
INSERT INTO `libelle_modules` VALUES(7, 'Informatique');
INSERT INTO `libelle_modules` VALUES(8, 'Connaissances et compétences complémentaires');

-- Contenu de la table `modules`

/*S1*/
INSERT INTO `modules` VALUES(1, 'AP1', 'Initiation à l''algorithmique', 20, 200, 1, 1);
INSERT INTO `modules` VALUES(2, 'AP2', 'Algorithmique et structures de données statiques', 20, 200, 1, 1);
INSERT INTO `modules` VALUES(3, 'ASR1', 'Comprendre et utiliser un système d''exploitation et un réseau', 20, 30, 2, 1);
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
INSERT INTO `modules` VALUES(24, 'AP6', 'Développement et réutilisation Objet', 30, 200, 1, 3);
INSERT INTO `modules` VALUES(25, 'C-INF1', 'Projet de développement et réutilisation objet', 20, 100, 1, 3);
INSERT INTO `modules` VALUES(26, 'ASR4', 'Réseaux TCP/IP sur Ethernet', 20, 150, 2, 3);
INSERT INTO `modules` VALUES(27, 'ASR5', 'Système d\'exploitation - fonctionnement du noyau', 32, 180, 2, 3);
INSERT INTO `modules` VALUES(28, 'C-INF2', 'Système d\'exploitation - programmation concurrente', 32, 180, 2, 3);
INSERT INTO `modules` VALUES(29, 'OMGL3-1', 'Conception des systèmes orientés objets', 50, 210, 3, 3);
INSERT INTO `modules` VALUES(30, 'OMGL3-2', 'Projet conception de systèmes orientés objets', 30, 110, 3, 3);
INSERT INTO `modules` VALUES(31, 'MAT5', 'Algèbre linéaire', 24, 120, 4, 3);
INSERT INTO `modules` VALUES(32, 'EC3', 'Préparation à l\'insertion professionnelle', 10, 50, 5, 3);
INSERT INTO `modules` VALUES(33, 'EC4', 'Culture et société - initiation', 10, 50, 5, 3);
INSERT INTO `modules` VALUES(34, 'LAN3', 'Anglais de communication - niveau 2', 10, 50, 5, 3);
INSERT INTO `modules` VALUES(35, 'LAN4', 'Anglais de spécialité - approfondissement', 10, 50, 5, 3);
INSERT INTO `modules` VALUES(36, 'EGO5', 'Gestion de projets de SI', 25, 120, 6, 3);
INSERT INTO `modules` VALUES(37, 'EGO6', 'Gestion des SI', 20, 150, 6, 3);


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

-- Contenu de la table `type_modules`

INSERT INTO `type_modules` VALUES(1, 'Cours', 120, 1);
INSERT INTO `type_modules` VALUES(2, 'TD', 30, 1);
INSERT INTO `type_modules` VALUES(3, 'TP', 15, 1);
INSERT INTO `type_modules` VALUES(4, 'Projet', 6, 1);

-- Contenu de la table `statuts`

INSERT INTO `statuts` VALUES(10, 'Eleve');
INSERT INTO `statuts` VALUES(20, 'Enseignant');
INSERT INTO `statuts` VALUES(30, 'Administrateur');

-- Contenu de la table `personnes`

/*BASE*/

INSERT INTO `personnes` VALUES(1, 'ADMIN', 'Administrateur', 'administrateur', '2008-11-12', '0101010101', 'admin@admin.ad', 30, 1, 6, '8055d7dc075c825fe6511bb16cd78fc94a7d8d66', 'admin', '2011-12-20 17:00:49'); /*mdp : admin*/

INSERT INTO `personnes` VALUES(2, 'ELEVE', 'Eleve', 'aze', '1981-01-01', '0101010101', 'eleve@eleve.el', 10, 1, 1, '2429035a4c60f2b59a9ea9c0658a0c08cf5c90a8', 'eleve', '2011-12-20 16:46:56'); /*mdp : eleve*/

INSERT INTO `personnes` VALUES(3, 'PROF', 'Prof', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'prof@prof.pro', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'prof', '2011-12-20 16:35:30'); /*mdp : prof*/

/*ADMIN*/

INSERT INTO `personnes` VALUES(4, 'VASSOILE', 'Marc', '10 rue du Lac Grenoble 38000', '1980-04-12', '0664531627', 'vassoile.marc@iut2.fr', 30, 1, 17, 'ba282cee005c8d1e72ae796aadf82c8fc3a92226', 'vassoim', '2010-12-20 15:00:00'); /*mdp : vassoilm2*/

/*ELEVES*/

INSERT INTO `personnes` VALUES(5, 'PARRENO', 'Florian', '654 route de chantecler 38070 Saint Quentin Fallavier', '1991-08-12', '0678931627', 'parreno.florian@iut2.fr', 10, 1, 1, '8ab1235a988641d8aac200155d4dde0999ff6318', 'parrenof', '2010-12-20 15:00:00'); /*mdp : florian*/

INSERT INTO `personnes` VALUES(6, 'PAULI', 'Marie', '8 Allée des fleurs 38000 Grenoble', '1992-02-15', '0678934567', 'pauli.marie@iut2.fr', 10, 1, 1, '072b5a53c998070e5395dba1375c6b991699f978', 'paulim', '2010-12-20 15:00:00'); /*mdp : mushisama*/

INSERT INTO `personnes` VALUES(7, 'LANDRISCINA', 'Dorian', '12 chemin des vignes', '1992-11-25', '0675628627', 'landriscina.dorian@iut2.fr', 10, 1, 1, '22d8dd753c9dd5147623bdf0834ed8ad097639d4', 'landrisd', '2010-12-20 15:00:00'); /*mdp : dodoletombeur*/

INSERT INTO `personnes` VALUES(8, 'MISTRI', 'Aurelie', '90 rue du dauphiné 38000 Grenoble', '1992-01-28', '0789901627', 'mistri.aurelie@iut2.fr', 10, 1, 1, 'cc8b85a78285e4fbca442ef02644a06f4ea5010b', 'mistria', '2010-12-20 15:00:00'); /*mdp : fautfairequoi*/

INSERT INTO `personnes` VALUES(9, 'MONNIER', 'Alexandra', '5 rue du platane Saint Martin D\'Hères', '1992-08-29', '0623097654', 'alexandra.monnier@iut2.fr', 10, 1, 1, '50d68802aae0791bad09451d61cc39d2356fe3fe', 'monnieal', '2010-12-20 15:00:00'); /*mdp : alexlabikeuse*/

INSERT INTO `personnes` VALUES(10, 'MARTINEZ', 'Pierre Julien', '66 rue du vercors 38000 Grenoble', '1992-08-18', '0673786534', 'martinez.pierrejulien@iut2.fr', 10, 1, 1, '54c87bffe256effed7c3c7ee7bc7680e8b64b33b', 'mapierre', '2010-12-20 15:00:00'); /*mdp : legendpj*/

INSERT INTO `personnes` VALUES(11, 'LOUVETON', 'Joffrey', '38 rue Général Férrié', '1991-11-03', '0637345692', 'hello@joff.me', 10, 1, 1, '821c212bc5dcb219afea62be602c08c7754c1f2a', 'louvetoj', '2010-12-20 15:00:00');  /*mdp : jojobpm*/

INSERT INTO `personnes` VALUES(38, 'MALLARONI-CONSENTINO', 'Hugo', '1 rue de la resistance', '1992-01-20', '0657463524', 'mallaroni.hugo@iut2.upmf-grenoble.fr ', 10, 1, 1, '11994b0f821efbed3e4aeb9df97b3759ec529f2b', 'mallaroh', '2010-12-20 15:00:00'); /*mdp : hugosecretaire*/

INSERT INTO `personnes` VALUES(39, 'DOMINGUEZ', 'Jp', 'Tatooine', '1992-02-20', '0678787877', 'hazkaal@gmail.com', 10, 1, 2, '8c76002fe114060cfda2abc178d2574789daa208', 'dominjp', '2010-12-20 15:00:00'); /*mdp : <trololo8le8piju>*/

/*PROFS*/

INSERT INTO `personnes` VALUES(12, 'BELKHATIR', 'Noureddine', '20 route de l\'IUT', '1981-01-22', '0101010101', 'belkhatir.nourredine@iut2.fr', 20, 1, 18, '97ab7b75e32207c0c1bc8f044a788d403f67c562', 'nourbel', '2010-12-01 15:00:00'); /*mdp : chefdep*/

INSERT INTO `personnes` VALUES(13, 'BLANCHON', 'Hervé', '20 route de l\'IUT', '1981-01-22', '0101010101', 'blanchon.herve@iut2.fr', 20, 1, 18, 'fc5e9c8431b89f5a839ca264c466dc3f43ea60bf', 'blanchonh', '2010-12-01 15:00:00'); /*mdp : vecteur*/

INSERT INTO `personnes` VALUES(14, 'BLANCO-LAINE', 'Gaëlle', '20 route de l\'IUT', '1981-01-22', '0101010101', 'blancolaine.gaelle@iut2.fr', 20, 1, 18, '715d9bf5e707a2122eba3039baa0ec35ff079406', 'blancog', '2010-12-01 15:00:00'); /*mdp : chefdeprojet*/

INSERT INTO `personnes` VALUES(15, 'BONNAUD', 'Laurent', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'bonnaud.laurent@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'bonnaudl', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(16, 'BRUNET-MANQUAT', 'Francis', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'brunetmanquat.francis@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'brunetmf', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(17, 'CARAVEL ', 'Marie-Claude', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'caravel.marieclaude@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'caravel', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(18, 'CHASTEL', 'Frédéric', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'chastel.frederic@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'chastelf', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(19, 'CHEVALLET', 'Jean-Pierre', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'chevallet.jeanpierre@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'jpchevallet', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(20, 'COAT', 'Françoise', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'coat.francoise@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'coatfr', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(21, 'COLLOMBET', 'Caryn', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'collombet.caryn@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'colloc', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(22, 'CORSET', 'Franck', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'corset.franck@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'corsetf', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(23, 'CULET', 'Annie', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'culet.annie@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'culeta', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(24, 'FONTENAS', 'Eric', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'fontenas.eric@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'fontenae', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(25, 'GATUMEL', 'Mathieu', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'gatumel.mathieu@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'gatumelm', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(26, 'GEROT', 'Cédric', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'gerot.cedric@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'gerotc', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(27, 'GOULIAN', 'Jérôme', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'goulian.jerome@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'goulianj', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(28, 'HAMON', 'Agnès', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'hamon.agnes@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'hamona', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(29, 'JOYCE', 'Laura', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'joyce.laura@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'joycel', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(30, 'LAURILLAU', 'Yann', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'laurillau.yann@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'laurilly', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(31, 'LEJEUNE', 'Anne', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'lejeune.anne@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'lejeuna', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(32, 'MARTIN', 'Philippe', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'martin.philippe@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'martinp', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(33, 'MONTANVERT', 'Annick', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'montanvert.annick@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'montana', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(34, 'PESTY', 'Sylvie', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'pesty.sylvie@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'pestys', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(35, 'RACAULT', 'Laëtitia', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'racault.laeticia@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'racaultl', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(36, 'ROISIN', 'Cécile', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'roisin.cecile@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'roisinc', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(37, 'SIMONET', 'Ana', '20 place Doyen Gosse', '1981-01-22', '0101010101', 'simonet.ana@iut2.fr', 20, 1, 18, 'd38810aae30df0fc35f59778cac5ed708a4533ac', 'simona', '2010-12-01 15:00:00'); /*mdp : prof*/

INSERT INTO `personnes` VALUES(40, 'FRONT', 'Agnès', '6 rue de la Jouvence 38000 Grenoble', '1971-12-20', '0654632788', 'front.agnes@iut2.fr', 20, 1, 18, '4fe11351445d96fa63c0f7c55a5f7dd93283e434', 'fronta', '2001-12-11 00:00:00'); /*mdp : profomglmac*/

-- Contenu de la table `modules_personnes`

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
(82, 36, 20),
(83, 37, 14);

-- Contenu de la table `modules_type_modules`
--

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
INSERT INTO `modules_type_modules` VALUES(95, 30, 4);   /*30 */

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


--
-- Contenu de la table `absences`
--
/*
--INSERT INTO `absences` VALUES(1, '2011-12-18 00:00:00', 'aze', 7);
*/
-- Contenu de la table `type_evenements`
--

INSERT INTO `type_evenements` VALUES(1, 'Réunion');
INSERT INTO `type_evenements` VALUES(2, 'Convocation');
INSERT INTO `type_evenements` VALUES(3, 'Soirée');

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` VALUES(1, 'Noël', '2011-12-25 00:00:00', '2011-12-25 00:00:00', 3);
INSERT INTO `evenements` VALUES(2, 'Nouvelle Année', '2011-12-31 23:59:59', '2012-01-01 23:59:59', 3);
INSERT INTO `evenements` VALUES(3, 'Réunion de Rentrée', '2012-01-03 19:00:00', '2012-01-03 21:00:00', 3);

--
-- Contenu de la table `evenements_personnes`
--
/*
--INSERT INTO `evenements_personnes` VALUES(23, 3, 5);
--INSERT INTO `evenements_personnes` VALUES(24, 3, 9);
--INSERT INTO `evenements_personnes` VALUES(25, 3, 8);
*/
--
--

INSERT INTO `stages` (`id`, `entreprise`, `ville`, `description`, `dispo`, `departements_id`, `date_ajout`) VALUES
(1, 'Apple', 'New-York City', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1, '2011-12-06 14:11:34'),
(2, 'Schneider', 'Grenoble', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1, '2011-12-06 14:12:00'),
(3, 'IUT2', 'Grenoble', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ', 0, 1, '2011-12-06 14:13:13'),
(4, 'Credit agricole', 'Lyon', 'te velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1, '2011-12-06 14:13:35');