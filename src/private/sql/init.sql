/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : minishop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-14 22:58:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for coins_bought
-- ----------------------------
DROP TABLE IF EXISTS `coins_bought`;
CREATE TABLE `coins_bought` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `coins_template_id` int(11) NOT NULL,
  `users_orders_template_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_coins_bought_coins_template1_idx` (`coins_template_id`),
  KEY `fk_coins_bought_users_orders_template1_idx` (`users_orders_template_id`),
  CONSTRAINT `fk_coins_bought_coins_template1` FOREIGN KEY (`coins_template_id`) REFERENCES `coins_template` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coins_bought_users_orders_template1` FOREIGN KEY (`users_orders_template_id`) REFERENCES `users_orders_template` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coins_bought
-- ----------------------------

-- ----------------------------
-- Table structure for coins_categories_template
-- ----------------------------
DROP TABLE IF EXISTS `coins_categories_template`;
CREATE TABLE `coins_categories_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coins_categories_template
-- ----------------------------

-- ----------------------------
-- Table structure for coins_template
-- ----------------------------
DROP TABLE IF EXISTS `coins_template`;
CREATE TABLE `coins_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` double(19,4) NOT NULL,
  `stock` double(19,0) NOT NULL DEFAULT '0',
  `name` varchar(45) NOT NULL,
  `volume_24h` double(19,0) DEFAULT NULL,
  `percent_change_1h` double(19,0) DEFAULT NULL,
  `percent_change_24h` double(19,0) DEFAULT NULL,
  `percent_change_7d` double(19,0) DEFAULT NULL,
  `market_cap` double(19,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coins_template
-- ----------------------------

-- ----------------------------
-- Table structure for coins_template_has_coins_categories_template
-- ----------------------------
DROP TABLE IF EXISTS `coins_template_has_coins_categories_template`;
CREATE TABLE `coins_template_has_coins_categories_template` (
  `coins_template_id` int(11) NOT NULL,
  `coins_categories_template_id` int(11) NOT NULL,
  PRIMARY KEY (`coins_template_id`,`coins_categories_template_id`),
  KEY `fk_coins_template_has_coins_categories_template_coins_categ_idx` (`coins_categories_template_id`),
  KEY `fk_coins_template_has_coins_categories_template_coins_templ_idx` (`coins_template_id`),
  CONSTRAINT `fk_coins_template_has_coins_categories_template_coins_categor1` FOREIGN KEY (`coins_categories_template_id`) REFERENCES `coins_categories_template` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coins_template_has_coins_categories_template_coins_template` FOREIGN KEY (`coins_template_id`) REFERENCES `coins_template` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coins_template_has_coins_categories_template
-- ----------------------------

-- ----------------------------
-- Table structure for users_orders_template
-- ----------------------------
DROP TABLE IF EXISTS `users_orders_template`;
CREATE TABLE `users_orders_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_paid` decimal(19,4) NOT NULL,
  `paid_date` datetime NOT NULL,
  `users_template_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_orders_template_users_template1_idx` (`users_template_id`),
  CONSTRAINT `fk_users_orders_template_users_template1` FOREIGN KEY (`users_template_id`) REFERENCES `users_template` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_orders_template
-- ----------------------------

-- ----------------------------
-- Table structure for users_template
-- ----------------------------
DROP TABLE IF EXISTS `users_template`;
CREATE TABLE `users_template` (
  `username` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `right` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_template
-- ----------------------------
INSERT INTO `users_template` VALUES ('test', 'test@test.test', 'ecaa0daba01d6023babd9363c1dcecb7974db9aef53d778da542e705c082b428', '4', '3');
