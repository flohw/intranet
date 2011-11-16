SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `intranet` ;
CREATE SCHEMA IF NOT EXISTS `intranet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `intranet` ;

-- -----------------------------------------------------
-- Table `intranet`.`departements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`departements` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`departements` (
  `id` INT NOT NULL ,
  `nom` VARCHAR(60) NOT NULL ,
  `nb_max_eleves` INT NOT NULL ,
  `slug` VARCHAR(60) NOT NULL ,
  `abreviation` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nom_UNIQUE` (`nom` ASC) ,
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC) ,
  UNIQUE INDEX `abreviation_UNIQUE` (`abreviation` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`semestres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`semestres` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`semestres` (
  `id` INT NOT NULL ,
  `nom` VARCHAR(5) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`groupes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`groupes` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`groupes` (
  `id` INT NOT NULL ,
  `nom` VARCHAR(45) NOT NULL ,
  `nb_max_eleves` INT NOT NULL ,
  `semestre_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nom_UNIQUE` (`nom` ASC) ,
  INDEX `fk_groupes_semestres1` (`semestre_id` ASC) ,
  CONSTRAINT `fk_groupes_semestres1`
    FOREIGN KEY (`semestre_id` )
    REFERENCES `intranet`.`semestres` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'classes (A1, A2, B1, B2…)' ;


-- -----------------------------------------------------
-- Table `intranet`.`libelle_modules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`libelle_modules` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`libelle_modules` (
  `id` INT NOT NULL ,
  `nom` VARCHAR(70) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`modules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`modules` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`modules` (
  `id` INT NOT NULL ,
  `abreviation` VARCHAR(45) NOT NULL ,
  `description` TEXT NOT NULL ,
  `coefficient` INT NOT NULL ,
  `volume_horaire` INT NOT NULL ,
  `libelle_module_id` INT NOT NULL ,
  `semestre_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_modules_libelle_modules1` (`libelle_module_id` ASC) ,
  INDEX `fk_modules_semestres1` (`semestre_id` ASC) ,
  CONSTRAINT `fk_modules_libelle_modules1`
    FOREIGN KEY (`libelle_module_id` )
    REFERENCES `intranet`.`libelle_modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modules_semestres1`
    FOREIGN KEY (`semestre_id` )
    REFERENCES `intranet`.`semestres` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'AP1, AP2, ASR-4, ...' ;


-- -----------------------------------------------------
-- Table `intranet`.`type_modules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`type_modules` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`type_modules` (
  `id` INT NOT NULL ,
  `nom` VARCHAR(45) NOT NULL ,
  `nb_max_eleves` INT NOT NULL ,
  `departement_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nom_UNIQUE` (`nom` ASC) ,
  INDEX `fk_type_modules_departements` (`departement_id` ASC) ,
  CONSTRAINT `fk_type_modules_departements`
    FOREIGN KEY (`departement_id` )
    REFERENCES `intranet`.`departements` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'Td, Tp, cours magistral, partiel' ;


-- -----------------------------------------------------
-- Table `intranet`.`statuts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`statuts` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`statuts` (
  `id` INT NOT NULL ,
  `nom` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB, 
COMMENT = 'Auteur => peut créer/modifier dans les dossiers où il a les ' /* comment truncated */ ;


-- -----------------------------------------------------
-- Table `intranet`.`personnes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`personnes` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`personnes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(80) NOT NULL ,
  `prenom` VARCHAR(80) NOT NULL ,
  `adresse` TEXT NOT NULL ,
  `date_naissance` DATETIME NULL ,
  `telephone` VARCHAR(10) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `statut_id` INT NOT NULL ,
  `departement_id` INT NOT NULL ,
  `groupe_id` INT NOT NULL ,
  `mot_de_passe` VARCHAR(255) NOT NULL ,
  `login` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_professeurs_statuts1` (`statut_id` ASC) ,
  INDEX `fk_professeurs_departements1` (`departement_id` ASC) ,
  INDEX `fk_professeurs_groupes1` (`groupe_id` ASC) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  CONSTRAINT `fk_professeurs_statuts1`
    FOREIGN KEY (`statut_id` )
    REFERENCES `intranet`.`statuts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professeurs_departements1`
    FOREIGN KEY (`departement_id` )
    REFERENCES `intranet`.`departements` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professeurs_groupes1`
    FOREIGN KEY (`groupe_id` )
    REFERENCES `intranet`.`groupes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'celle la' ;


-- -----------------------------------------------------
-- Table `intranet`.`modules_personnes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`modules_personnes` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`modules_personnes` (
  `id` VARCHAR(45) NOT NULL ,
  `module_id` INT NOT NULL ,
  `personne_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_modules_has_professeurs_professeurs1` (`personne_id` ASC) ,
  INDEX `fk_modules_has_professeurs_modules1` (`module_id` ASC) ,
  CONSTRAINT `fk_modules_has_professeurs_modules1`
    FOREIGN KEY (`module_id` )
    REFERENCES `intranet`.`modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modules_has_professeurs_professeurs1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`modules_type_modules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`modules_type_modules` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`modules_type_modules` (
  `id` INT NOT NULL ,
  `module_id` INT NOT NULL ,
  `type_module_id` INT NOT NULL ,
  `cours_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_modules_has_type_modules_type_modules1` (`type_module_id` ASC) ,
  INDEX `fk_modules_has_type_modules_modules1` (`module_id` ASC) ,
  CONSTRAINT `fk_modules_has_type_modules_modules1`
    FOREIGN KEY (`module_id` )
    REFERENCES `intranet`.`modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modules_has_type_modules_type_modules1`
    FOREIGN KEY (`type_module_id` )
    REFERENCES `intranet`.`type_modules` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`dossiers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`dossiers` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`dossiers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(255) NOT NULL ,
  `slug` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`documents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`documents` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`documents` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(45) NOT NULL ,
  `slug` VARCHAR(45) NOT NULL ,
  `personne_id` INT NOT NULL ,
  `dossier_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_documents_professeurs1` (`personne_id` ASC) ,
  INDEX `fk_documents_dossiers1` (`dossier_id` ASC) ,
  CONSTRAINT `fk_documents_professeurs1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_documents_dossiers1`
    FOREIGN KEY (`dossier_id` )
    REFERENCES `intranet`.`dossiers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`messages` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`messages` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titre` VARCHAR(80) NOT NULL ,
  `date_envoi` DATETIME NOT NULL ,
  `fichier` VARCHAR(100) NOT NULL ,
  `personne_id` INT NOT NULL COMMENT 'expéditeur' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `fichier_UNIQUE` (`fichier` ASC) ,
  INDEX `fk_messages_personnes1` (`personne_id` ASC) ,
  CONSTRAINT `fk_messages_personnes1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`messages_personnes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`messages_personnes` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`messages_personnes` (
  `id` VARCHAR(45) NOT NULL ,
  `message_id` INT NOT NULL ,
  `personne_id` INT NOT NULL ,
  `lu` TINYINT(1)  NOT NULL DEFAULT false ,
  INDEX `fk_messages_has_personnes_personnes1` (`personne_id` ASC) ,
  INDEX `fk_messages_has_personnes_messages1` (`message_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_messages_has_personnes_messages1`
    FOREIGN KEY (`message_id` )
    REFERENCES `intranet`.`messages` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_has_personnes_personnes1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'boite de réception' ;


-- -----------------------------------------------------
-- Table `intranet`.`abscences`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`abscences` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`abscences` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `date` DATETIME NOT NULL ,
  `justification` VARCHAR(255) NOT NULL ,
  `personne_id` INT(255) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_abscences_personnes1` (`personne_id` ASC) ,
  CONSTRAINT `fk_abscences_personnes1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`type_evenements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`type_evenements` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`type_evenements` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`evenements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`evenements` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`evenements` (
  `id` INT NOT NULL ,
  `titre` VARCHAR(255) NOT NULL ,
  `date_debut` DATETIME NOT NULL ,
  `date_fin` DATETIME NOT NULL ,
  `type_evenement_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_evenements_type_evenements1` (`type_evenement_id` ASC) ,
  CONSTRAINT `fk_evenements_type_evenements1`
    FOREIGN KEY (`type_evenement_id` )
    REFERENCES `intranet`.`type_evenements` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `intranet`.`evenements_personnes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `intranet`.`evenements_personnes` ;

CREATE  TABLE IF NOT EXISTS `intranet`.`evenements_personnes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `evenement_id` INT NOT NULL ,
  `personne_id` INT NOT NULL ,
  `lu` TINYINT(1)  NOT NULL DEFAULT false ,
  INDEX `fk_evenements_has_personnes_personnes1` (`personne_id` ASC) ,
  INDEX `fk_evenements_has_personnes_evenements1` (`evenement_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_evenements_has_personnes_evenements1`
    FOREIGN KEY (`evenement_id` )
    REFERENCES `intranet`.`evenements` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evenements_has_personnes_personnes1`
    FOREIGN KEY (`personne_id` )
    REFERENCES `intranet`.`personnes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `intranet`.`statuts`
-- -----------------------------------------------------
START TRANSACTION;
USE `intranet`;
INSERT INTO `intranet`.`statuts` (`id`, `nom`) VALUES (1, 'Lecteur');
INSERT INTO `intranet`.`statuts` (`id`, `nom`) VALUES (10, 'Auteur');
INSERT INTO `intranet`.`statuts` (`id`, `nom`) VALUES (20, 'Modérateur');
INSERT INTO `intranet`.`statuts` (`id`, `nom`) VALUES (30, 'Administrateur');

COMMIT;

-- -----------------------------------------------------
-- Data for table `intranet`.`type_evenements`
-- -----------------------------------------------------
START TRANSACTION;
USE `intranet`;
INSERT INTO `intranet`.`type_evenements` (`id`, `nom`) VALUES (1, 'Réunion');
INSERT INTO `intranet`.`type_evenements` (`id`, `nom`) VALUES (2, 'Convocation');
INSERT INTO `intranet`.`type_evenements` (`id`, `nom`) VALUES (3, 'Soirée');

COMMIT;
