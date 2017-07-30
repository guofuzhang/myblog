# Host: localhost  (Version: 5.5.24)
# Date: 2017-05-31 00:03:57
# Generator: MySQL-Front 5.3  (Build 4.269)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "links"
#

CREATE TABLE `links` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `domain` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `orderby` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "links"
#

INSERT INTO `links` VALUES (1,'传智播客','http://www.itcast.cn',50),(2,'百度搜索','http://www.baidu.com',50),(3,'新浪资讯','http://www.sina.com.cn',50),(4,'凤凰资讯','http://www.ifeng.com',50),(5,'京东商城','http://www.jd.com',50),(6,'中央电视台','http://www.cctv.com',50),(8,'优酷视频','http://www.youku.com/',50);
