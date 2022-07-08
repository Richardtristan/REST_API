/*
Navicat MySQL Data Transfer

Source Server         : old_xampp
Source Server Version : 50505
Source Host           : localhost:3307
Source Database       : personne

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-07-08 16:58:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for personnes
-- ----------------------------
DROP TABLE IF EXISTS `personnes`;
CREATE TABLE `personnes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of personnes
-- ----------------------------
INSERT INTO `personnes` VALUES ('2', 'Julie', 'Richard');
INSERT INTO `personnes` VALUES ('3', 'Tristan', 'Richard');
INSERT INTO `personnes` VALUES ('4', 'Julie', 'Richard');
INSERT INTO `personnes` VALUES ('5', 'moi', 'rrr');
INSERT INTO `personnes` VALUES ('6', 'moi', 'rrr');
INSERT INTO `personnes` VALUES ('7', 'moi', 'rrr');
INSERT INTO `personnes` VALUES ('8', 'moi', 'test');
INSERT INTO `personnes` VALUES ('9', 'moi', 'test');
