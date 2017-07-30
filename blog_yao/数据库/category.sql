/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2017-05-31 00:02:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `classname` varchar(30) NOT NULL COMMENT '分类名称',
  `orderby` tinyint(4) NOT NULL DEFAULT '50' COMMENT '排序',
  `pid` smallint(6) NOT NULL DEFAULT '0' COMMENT '父id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'HTML标注语言', '50', '0');
INSERT INTO `category` VALUES ('2', 'CSS层叠样式表', '50', '0');
INSERT INTO `category` VALUES ('3', 'JavaScript客户端语言', '50', '0');
INSERT INTO `category` VALUES ('4', 'Apache服务器配置', '50', '0');
INSERT INTO `category` VALUES ('5', 'PHP入门基础', '50', '0');
INSERT INTO `category` VALUES ('6', 'MySQL数据库', '50', '0');
INSERT INTO `category` VALUES ('7', 'PHP典型应用', '50', '0');
INSERT INTO `category` VALUES ('8', '面向对象编程', '50', '0');
INSERT INTO `category` VALUES ('9', 'MVC框架基础', '50', '0');
INSERT INTO `category` VALUES ('10', 'PDO数据库对象', '50', '0');
INSERT INTO `category` VALUES ('11', 'Smarty模板引擎', '50', '0');
