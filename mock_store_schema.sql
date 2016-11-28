SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema MockDatabase
-- -----------------------------------------------------
-- For Database Group Project
-- 
-- 

CREATE SCHEMA IF NOT EXISTS `MockDatabase` ;
USE `MockDatabase` ;

-- -----------------------------------------------------
-- Table `MockDatabase`.`Departments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MockDatabase`.`Departments` (
  `DepartmentID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Description` VARCHAR(255) NULL,
  `SupervisorID` INT NULL,
  PRIMARY KEY (`DepartmentID`));

-- -----------------------------------------------------
-- Table `MockDatabase`.`Products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MockDatabase`.`Products` (
  `ProductID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(70) NULL,
  `DepartmentID` INT NULL,
  `InStock` INT NULL,
  `Price` DECIMAL(10,2) NULL,
  `Notes` VARCHAR(255) NULL,
  PRIMARY KEY (`ProductID`),
  CONSTRAINT `DepartmentID`
    FOREIGN KEY (`DepartmentID`)
    REFERENCES `MockDatabase`.`Departments` (`DepartmentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `MockDatabase`.`Customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MockDatabase`.`Customers` (
  `CustomerID` INT NOT NULL AUTO_INCREMENT,
  `FName` VARCHAR(35) NULL,
  `LName` VARCHAR(35) NULL,
  `Notes` VARCHAR(45) NULL,
  PRIMARY KEY (`CustomerID`));


-- -----------------------------------------------------
-- Table `MockDatabase`.`CustomerLogins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MockDatabase`.`CustomerLogins` (
  `Email` VARCHAR(255) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  `CustomerID` INT NOT NULL,
  PRIMARY KEY (`Email`),
  INDEX `CustomerID_idx` (`CustomerID` ASC),
  CONSTRAINT `CustomerID`
    FOREIGN KEY (`CustomerID`)
    REFERENCES `MockDatabase`.`Customers` (`CustomerID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `MockDatabase`.`Orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MockDatabase`.`Orders` (
  `OrderID` INT NOT NULL,
  `DatePurchased` DATETIME NOT NULL,
  `Notes` VARCHAR(255) NULL,
  `Fulfilled` TINYINT(0) NOT NULL,
  PRIMARY KEY (`OrderID`));


-- -----------------------------------------------------
-- Table `MockDatabase`.`OrderDetails`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MockDatabase`.`OrderDetails` (
  `OrderID` INT NOT NULL,
  `ProductID` INT NOT NULL,
  `Quantity` INT NOT NULL,
  `Discount` DECIMAL(5,2) NULL,
  PRIMARY KEY (`OrderID`, `ProductID`),
  INDEX `OrderID_idx` (`OrderID` DESC),
  CONSTRAINT `OrderID`
    FOREIGN KEY (`OrderID`)
    REFERENCES `MockDatabase`.`Orders` (`OrderID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ProductID`
    FOREIGN KEY (`ProductID`)
    REFERENCES `MockDatabase`.`Products` (`ProductID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
