-- MySQL Script generated by MySQL Workbench
-- Fri Apr  2 16:13:04 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Appareil de Test`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Appareil de Test` (
  `idAppareil` INT NOT NULL,
  `` VARCHAR(45) NULL,
  PRIMARY KEY (`idAppareil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Forum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Forum` (
  `idForum` INT NOT NULL,
  `Sujet` VARCHAR(45) NOT NULL,
  `Réponse` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idForum`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Gestionnaire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Gestionnaire` (
  `Identifiant` INT NOT NULL,
  `Nom` VARCHAR(45) NOT NULL,
  `E-mail` VARCHAR(45) NOT NULL,
  `Mot de passe` VARCHAR(45) NOT NULL,
  `Téléphone` INT NOT NULL,
  `Adresse` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Identifiant`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Utilisateur` (
  `idUtilisateur` INT NOT NULL,
  `Nom` VARCHAR(45) NOT NULL,
  `Prénom` VARCHAR(45) NOT NULL,
  `Sexe` VARCHAR(45) NOT NULL,
  `Date de naissance` DATE NOT NULL,
  `Adresse` VARCHAR(45) NOT NULL,
  `E-mail` VARCHAR(45) NOT NULL,
  `Mot de passe` VARCHAR(45) NOT NULL,
  `Téléphone` VARCHAR(45) NOT NULL,
  `Forum_idForum` INT NOT NULL,
  `Gestionnaire_Identifiant` INT NOT NULL,
  PRIMARY KEY (`idUtilisateur`, `Forum_idForum`, `Gestionnaire_Identifiant`),
  INDEX `fk_Utilisateur_Forum1_idx` (`Forum_idForum` ASC),
  INDEX `fk_Utilisateur_Gestionnaire1_idx` (`Gestionnaire_Identifiant` ASC),
  CONSTRAINT `fk_Utilisateur_Forum1`
    FOREIGN KEY (`Forum_idForum`)
    REFERENCES `mydb`.`Forum` (`idForum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Utilisateur_Gestionnaire1`
    FOREIGN KEY (`Gestionnaire_Identifiant`)
    REFERENCES `mydb`.`Gestionnaire` (`Identifiant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Administrateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Administrateur` (
  `idAdministrateur` INT NOT NULL,
  `Informations de contact` VARCHAR(45) NOT NULL,
  `Adresse` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAdministrateur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Appareil de test`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Appareil de test` (
  `idRéférence` INT NOT NULL,
  `Numéro de version` VARCHAR(45) NOT NULL,
  `Résultat_idRésultat1` INT NOT NULL,
  PRIMARY KEY (`idRéférence`, `Résultat_idRésultat1`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`test`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`test` (
  `idtest` INT NOT NULL,
  `Type de test` VARCHAR(45) NOT NULL,
  `Date` DATE NOT NULL,
  `Heure` VARCHAR(45) NULL,
  PRIMARY KEY (`idtest`),
  UNIQUE INDEX `Heure_UNIQUE` (`Heure` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Résultat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Résultat` (
  `idRésultat` INT NOT NULL,
  `Score` INT NOT NULL,
  `Appareil de test_idRéférence` INT NOT NULL,
  `Appareil de test_Résultat_idRésultat1` INT NOT NULL,
  `test_idtest` INT NOT NULL,
  `Utilisateur_idUtilisateur` INT NOT NULL,
  PRIMARY KEY (`idRésultat`, `Appareil de test_idRéférence`, `Appareil de test_Résultat_idRésultat1`, `test_idtest`, `Utilisateur_idUtilisateur`),
  INDEX `fk_Résultat_Appareil de test1_idx` (`Appareil de test_idRéférence` ASC, `Appareil de test_Résultat_idRésultat1` ASC),
  INDEX `fk_Résultat_test1_idx` (`test_idtest` ASC) ,
  INDEX `fk_Résultat_Utilisateur1_idx` (`Utilisateur_idUtilisateur` ASC),
  CONSTRAINT `fk_Résultat_Appareil de test1`
    FOREIGN KEY (`Appareil de test_idRéférence` , `Appareil de test_Résultat_idRésultat1`)
    REFERENCES `mydb`.`Appareil de test` (`idRéférence` , `Résultat_idRésultat1`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Résultat_test1`
    FOREIGN KEY (`test_idtest`)
    REFERENCES `mydb`.`test` (`idtest`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Résultat_Utilisateur1`
    FOREIGN KEY (`Utilisateur_idUtilisateur`)
    REFERENCES `mydb`.`Utilisateur` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FAQ`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FAQ` (
  `idFAQ` INT NOT NULL,
  `Question` VARCHAR(45) NOT NULL,
  `Réponse` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idFAQ`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Capteur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Capteur` (
  `idCapteur` INT NOT NULL,
  `Type de capteur` VARCHAR(45) NOT NULL,
  `test_idtest` INT NOT NULL,
  `Appareil de test_idRéférence` INT NOT NULL,
  `Appareil de test_Résultat_idRésultat1` INT NOT NULL,
  PRIMARY KEY (`idCapteur`, `test_idtest`, `Appareil de test_idRéférence`, `Appareil de test_Résultat_idRésultat1`),
  INDEX `fk_Capteur_test1_idx` (`test_idtest` ASC),
  INDEX `fk_Capteur_Appareil de test1_idx` (`Appareil de test_idRéférence` ASC, `Appareil de test_Résultat_idRésultat1` ASC),
  CONSTRAINT `fk_Capteur_test1`
    FOREIGN KEY (`test_idtest`)
    REFERENCES `mydb`.`test` (`idtest`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Capteur_Appareil de test1`
    FOREIGN KEY (`Appareil de test_idRéférence` , `Appareil de test_Résultat_idRésultat1`)
    REFERENCES `mydb`.`Appareil de test` (`idRéférence` , `Résultat_idRésultat1`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
