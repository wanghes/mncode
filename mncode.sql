/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost
 Source Database       : mncode

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : utf-8

 Date: 10/21/2018 23:04:59 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cates`
-- ----------------------------
DROP TABLE IF EXISTS `cates`;
CREATE TABLE `cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(20) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cates`
-- ----------------------------
BEGIN;
INSERT INTO `cates` VALUES ('1', '前端开发', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
