# Host: localhost  (Version: 5.5.24)
# Date: 2017-05-31 00:03:26
# Generator: MySQL-Front 5.3  (Build 4.269)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "category2"
#

CREATE TABLE `category2` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `classname` varchar(30) NOT NULL,
  `orderby` tinyint(4) NOT NULL DEFAULT '50',
  `pid` smallint(6) NOT NULL DEFAULT '0' COMMENT '父id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

#
# Data for table "category2"
#

INSERT INTO `category2` VALUES (1,'新闻资讯',50,0),(2,'PHP培训',50,0),(3,'国内新闻',50,1),(4,'国际新闻',50,1),(5,'北京新闻',50,3),(6,'上海新闻',50,3),(7,'PHP基础',50,2),(8,'PHP就业',50,2),(9,'HTML',50,7),(10,'CSS',50,7),(11,'JavaScript',50,7),(12,'Bootstrap',49,7),(13,'PHP核心技术',50,8),(14,'PHP典型技术',50,8),(15,'MySQL基础',45,8),(17,'日本新闻',50,4),(18,'美国新闻',50,4),(19,'OOP技术',50,8),(20,'娱乐新闻',50,5),(21,'军事新闻',47,5),(22,'论坛技术',50,8),(23,'MVC框架基础',48,8),(24,'jQuery',50,7),(25,'',50,0),(26,'',50,0);
