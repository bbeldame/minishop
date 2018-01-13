DROP SCHEMA IF EXISTS `minishop` ;

-- -----------------------------------------------------
-- Schema minishop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `minishop` DEFAULT CHARACTER SET utf8 ;
USE `minishop` ;

-- -----------------------------------------------------
-- Table `minishop`.`users_template`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minishop`.`users_template` ;

CREATE TABLE IF NOT EXISTS `minishop`.`users_template` (
  `username` VARCHAR(16) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `minishop`.`coins_template`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minishop`.`coins_template` ;

CREATE TABLE IF NOT EXISTS `minishop`.`coins_template` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `price` DECIMAL(19,4) NOT NULL,
  `stock` INT NOT NULL DEFAULT 0,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `minishop`.`coins_categories_template`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minishop`.`coins_categories_template` ;

CREATE TABLE IF NOT EXISTS `minishop`.`coins_categories_template` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `minishop`.`coins_template_has_coins_categories_template`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minishop`.`coins_template_has_coins_categories_template` ;

CREATE TABLE IF NOT EXISTS `minishop`.`coins_template_has_coins_categories_template` (
  `coins_template_id` INT NOT NULL,
  `coins_categories_template_id` INT NOT NULL,
  PRIMARY KEY (`coins_template_id`, `coins_categories_template_id`),
  INDEX `fk_coins_template_has_coins_categories_template_coins_categ_idx` (`coins_categories_template_id` ASC),
  INDEX `fk_coins_template_has_coins_categories_template_coins_templ_idx` (`coins_template_id` ASC),
  CONSTRAINT `fk_coins_template_has_coins_categories_template_coins_template`
    FOREIGN KEY (`coins_template_id`)
    REFERENCES `minishop`.`coins_template` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_coins_template_has_coins_categories_template_coins_categor1`
    FOREIGN KEY (`coins_categories_template_id`)
    REFERENCES `minishop`.`coins_categories_template` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `minishop`.`users_orders_template`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minishop`.`users_orders_template` ;

CREATE TABLE IF NOT EXISTS `minishop`.`users_orders_template` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total_paid` DECIMAL(19,4) NOT NULL,
  `paid_date` DATETIME NOT NULL,
  `users_template_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_orders_template_users_template1_idx` (`users_template_id` ASC),
  CONSTRAINT `fk_users_orders_template_users_template1`
    FOREIGN KEY (`users_template_id`)
    REFERENCES `minishop`.`users_template` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `minishop`.`coins_bought`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minishop`.`coins_bought` ;

CREATE TABLE IF NOT EXISTS `minishop`.`coins_bought` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantity` INT NOT NULL,
  `coins_template_id` INT NOT NULL,
  `users_orders_template_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_coins_bought_coins_template1_idx` (`coins_template_id` ASC),
  INDEX `fk_coins_bought_users_orders_template1_idx` (`users_orders_template_id` ASC),
  CONSTRAINT `fk_coins_bought_coins_template1`
    FOREIGN KEY (`coins_template_id`)
    REFERENCES `minishop`.`coins_template` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_coins_bought_users_orders_template1`
    FOREIGN KEY (`users_orders_template_id`)
    REFERENCES `minishop`.`users_orders_template` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
