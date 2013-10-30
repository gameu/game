/*
MySQL Data Transfer
Source Host: 210.38.243.7
Source Database: game
Target Host: 210.38.243.7
Target Database: game
Date: 2013/10/1 14:43:11
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL auto_increment,
  `user` varchar(20) collate utf8_unicode_ci NOT NULL,
  `pwd` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) NOT NULL auto_increment,
  `a_title` varchar(60) collate utf8_unicode_ci NOT NULL,
  `about_src` varchar(100) collate utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `type` int(2) NOT NULL COMMENT '1:厂商新闻，2厂商产品信息',
  `is_slide` int(1) NOT NULL COMMENT '是否是幻灯片新闻',
  `is_key` int(1) NOT NULL COMMENT '幻灯片新闻序号',
  `m_id` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(10) NOT NULL auto_increment,
  `c_name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `post` varchar(30) collate utf8_unicode_ci NOT NULL,
  `c_qq` varchar(15) collate utf8_unicode_ci NOT NULL,
  `c_tel` varchar(15) collate utf8_unicode_ci NOT NULL,
  `c_show` int(1) NOT NULL default '0' COMMENT '否是前台展示',
  `p_id` int(10) NOT NULL COMMENT '厂商ID',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for friend_link
-- ----------------------------
DROP TABLE IF EXISTS `friend_link`;
CREATE TABLE `friend_link` (
  `id` int(10) NOT NULL auto_increment,
  `f_title` varchar(60) collate utf8_unicode_ci NOT NULL,
  `f_link` varchar(70) collate utf8_unicode_ci NOT NULL,
  `type` int(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for games
-- ----------------------------
DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `id` int(10) NOT NULL auto_increment,
  `m_id` int(10) NOT NULL COMMENT 'menufactory id',
  `name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `about_src` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for manufacturer
-- ----------------------------
DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE `manufacturer` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(40) collate utf8_unicode_ci NOT NULL,
  `user` varchar(40) collate utf8_unicode_ci NOT NULL,
  `initial` varchar(1) collate utf8_unicode_ci NOT NULL COMMENT '首字母',
  `name_pin` varchar(100) collate utf8_unicode_ci NOT NULL COMMENT '拼音',
  `examine` int(2) NOT NULL default '0',
  `mid` int(10) NOT NULL default '0' COMMENT '厂商ID,代表其实第几个被审核通过',
  `pwd` varchar(30) collate utf8_unicode_ci NOT NULL default 'xianshannan123456789',
  `code` varchar(30) collate utf8_unicode_ci NOT NULL default 'sdfddfffdf0054adf96644adfd' COMMENT '证码验',
  `short` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '简称',
  `url` varchar(200) collate utf8_unicode_ci NOT NULL COMMENT '网址',
  `belong` varchar(20) collate utf8_unicode_ci NOT NULL default '中国',
  `tel` varchar(30) collate utf8_unicode_ci default NULL,
  `zip_code` varchar(20) collate utf8_unicode_ci default NULL COMMENT '邮政编码',
  `fax` varchar(20) collate utf8_unicode_ci default NULL COMMENT '传真',
  `mail` varchar(25) collate utf8_unicode_ci default NULL COMMENT '传真',
  `article_num` varchar(25) collate utf8_unicode_ci default NULL COMMENT '文网文号',
  `article_d_thumb` varchar(40) collate utf8_unicode_ci default NULL COMMENT '文网文号',
  `icp` varchar(25) collate utf8_unicode_ci default NULL COMMENT 'ICP许可证号',
  `icp_d_thumb` varchar(40) collate utf8_unicode_ci default NULL COMMENT 'ICP许可证号',
  `address` varchar(40) collate utf8_unicode_ci NOT NULL,
  `f_time` date NOT NULL COMMENT '成立时间',
  `ismarket` int(11) NOT NULL default '0' COMMENT '否是上市',
  `net_vote` int(10) NOT NULL default '0' COMMENT '网友投票',
  `business` varchar(254) collate utf8_unicode_ci NOT NULL COMMENT '主营业务',
  `about_src` text collate utf8_unicode_ci NOT NULL COMMENT '公司简介',
  `logo_thumb` varchar(40) collate utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=519 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for platform
-- ----------------------------
DROP TABLE IF EXISTS `platform`;
CREATE TABLE `platform` (
  `id` int(10) NOT NULL auto_increment,
  `p_name` varchar(60) collate utf8_unicode_ci NOT NULL,
  `p_short` varchar(40) collate utf8_unicode_ci NOT NULL,
  `p_address` varchar(110) collate utf8_unicode_ci NOT NULL COMMENT '平台地址',
  `p_r_address` varchar(110) collate utf8_unicode_ci NOT NULL COMMENT '平台册注地址',
  `p_examine` int(1) NOT NULL default '0' COMMENT '审核状态',
  `p_logo_thumb` varchar(70) collate utf8_unicode_ci NOT NULL,
  `m_id` int(10) NOT NULL COMMENT '平台地址',
  `created` date NOT NULL COMMENT '平台地址',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for show
-- ----------------------------
DROP TABLE IF EXISTS `show`;
CREATE TABLE `show` (
  `id` int(10) NOT NULL auto_increment,
  `title1` varchar(60) collate utf8_unicode_ci default NULL,
  `title2` varchar(60) collate utf8_unicode_ci default NULL,
  `title3` varchar(60) collate utf8_unicode_ci default NULL,
  `title4` varchar(60) collate utf8_unicode_ci default NULL,
  `title5` varchar(60) collate utf8_unicode_ci default NULL,
  `src1_thumb` varchar(60) collate utf8_unicode_ci NOT NULL,
  `src2_thumb` varchar(60) collate utf8_unicode_ci NOT NULL,
  `src3_thumb` varchar(60) collate utf8_unicode_ci NOT NULL,
  `src4_thumb` varchar(60) collate utf8_unicode_ci NOT NULL,
  `src5_thumb` varchar(60) collate utf8_unicode_ci NOT NULL,
  `link1` varchar(100) collate utf8_unicode_ci NOT NULL,
  `link2` varchar(100) collate utf8_unicode_ci NOT NULL,
  `link3` varchar(100) collate utf8_unicode_ci NOT NULL,
  `link4` varchar(100) collate utf8_unicode_ci NOT NULL,
  `link5` varchar(100) collate utf8_unicode_ci NOT NULL,
  `b_time1` date NOT NULL,
  `b_time2` date NOT NULL,
  `b_time3` date NOT NULL,
  `b_time4` date NOT NULL,
  `b_time5` date NOT NULL,
  `e_time1` date NOT NULL,
  `e_time2` date NOT NULL,
  `e_time3` date NOT NULL,
  `e_time4` date NOT NULL,
  `e_time5` date NOT NULL,
  `created` datetime NOT NULL,
  `type` varchar(5) collate utf8_unicode_ci NOT NULL COMMENT '网站图片幻灯片类型,1为厂商',
  `a_id` int(5) default '0' COMMENT '0：外链，其他为内部文章',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'nan111111');
INSERT INTO `articles` VALUES ('16', '17173独家探营《神雕》韩国开发团队KRG', '20130324_11319.html', '2013-03-24 11:44:57', '1', '0', '0', '0');
INSERT INTO `articles` VALUES ('17', '《神雕》韩国开发团队KRG', '20130324_26177.html', '2013-03-24 11:54:24', '1', '0', '0', '0');
INSERT INTO `articles` VALUES ('18', '4884独家探营《神雕》韩国开发团队KRG', '20130324_2022.html', '2013-03-24 11:55:11', '1', '0', '0', '0');
INSERT INTO `articles` VALUES ('19', '17173独家探营', '20130324_7320.html', '2013-03-24 11:57:40', '2', '0', '0', '59');
INSERT INTO `articles` VALUES ('20', '韩国开发团队KRG', '20130324_24584.html', '2013-03-24 12:01:17', '2', '0', '0', '59');
INSERT INTO `articles` VALUES ('1', 'at6esrse', '20130410_9144.html', '0000-00-00 00:00:00', '1', '1', '0', '0');
INSERT INTO `articles` VALUES ('45', 'at6esrse', '20130410_32628.html', '2013-04-10 06:44:26', '1', '1', '0', '0');
INSERT INTO `articles` VALUES ('52', 'fsfs', '20130410_12145.html', '2013-04-10 11:43:01', '1', '0', '0', '0');
INSERT INTO `articles` VALUES ('53', 'tesr', '20130410_25145.html', '2013-04-10 11:44:41', '1', '0', '0', '0');
INSERT INTO `articles` VALUES ('51', 'sdfsdf', '20130410_4359.html', '2013-04-10 11:38:07', '1', '0', '0', '0');
INSERT INTO `articles` VALUES ('54', '各厂商财报 腾讯称希望代理剑灵', '20130410_24702.html', '2013-04-10 11:46:09', '1', '0', '1', '0');
INSERT INTO `contact` VALUES ('65', '冼善南', '经理', '364557832', '15019363426', '1', '56');
INSERT INTO `contact` VALUES ('44', 'dgdg', 'dgdgz', '1212122', '12212', '0', '34');
INSERT INTO `contact` VALUES ('54', '000', '0', '000', '00', '1', '34');
INSERT INTO `contact` VALUES ('56', '冼善南', '经理', '364557832', '15019363426', '1', '33');
INSERT INTO `contact` VALUES ('62', '冼善南', '经理', '364557832', '15019363426', '1', '53');
INSERT INTO `contact` VALUES ('66', 'sfd', 'sdf', '4456464', '454', '1', '57');
INSERT INTO `friend_link` VALUES ('1', 'sfsdfs', 'fsdfsfsdf', null);
INSERT INTO `friend_link` VALUES ('2', 'sdfsfsdfsf', 'sfsdfsfsfdsdf', null);
INSERT INTO `friend_link` VALUES ('3', '百度一下', 'http://www.baidu.com/', null);
INSERT INTO `manufacturer` VALUES ('59', '115', 'newft', '0', '115', '1', '1', '123', 'dwda', '1150', 'http://weibo.com/ajaxlogin.php?framelogin=1&callback=parent.sinaSSOController.feedBackUrlCallBack', '中国', '455545', '5454545', '545454', 'xianshannan@163.com', '放松放松放松放松放松放松', '', '02545454', '', '广东省茂名市', '2013-03-23', '1', '0', '游戏开发 游戏运营', 'sdfsfsfsfsdffxfv', 'upload/thumbs/20130408_16621.png', '2013-04-08');
INSERT INTO `manufacturer` VALUES ('513', 'test', 'nan', 't', 'test', '1', '3', '123', 'oeup', 'test', 'http://weibo.com/', '中国', null, null, null, 'xianshannan@163.com', null, null, null, null, '', '0000-00-00', '0', '0', '', '', '', '2013-04-08');
INSERT INTO `manufacturer` VALUES ('510', 'test', 'nan', 't', 'test', '1', '2', '123', 'qqft', 'test', 'http://weibo.com/', '中国', null, null, null, 'xianshannan@163.com', null, null, null, null, '', '0000-00-00', '0', '0', '', '', '', '0000-00-00');
INSERT INTO `manufacturer` VALUES ('517', '', '', '', '', '1', '4', 'xianshannan123456789', 'sdfddfffdf0054adf96644adfd', '', '', '中国', null, null, null, null, null, null, null, null, '', '0000-00-00', '0', '0', '', '', '', '0000-00-00');
INSERT INTO `manufacturer` VALUES ('518', '', '', '', '', '1', '5', 'xianshannan123456789', 'sdfddfffdf0054adf96644adfd', '', '', '中国', null, null, null, null, null, null, null, null, '', '0000-00-00', '0', '0', '', '', '', '0000-00-00');
INSERT INTO `platform` VALUES ('33', '英雄联盟', 'test', 'dsfdsf', 'sfsdf', '1', 'upload/thumbs/20130323_1015.jpg', '59', '2013-04-08');
INSERT INTO `platform` VALUES ('34', '六伏天科技有限公司', '的发顺丰', 'http://weibo.com/', 'http://weibo.com/', '1', 'upload/thumbs/20130323_8804.jpg', '59', '2013-04-08');
INSERT INTO `platform` VALUES ('56', '4884', '4884', '/', '', '1', '', '513', '2013-04-08');
INSERT INTO `platform` VALUES ('53', 'test', 'test', '', '', '1', 'upload/thumbs/20130323_8804.jpg', '510', '0000-00-00');
INSERT INTO `platform` VALUES ('57', 'sfsfd', '', '', '', '1', '', '516', '2013-09-16');
INSERT INTO `show` VALUES ('2', 'at6esrse', 'xvxvxvxvcxcvdffd', 'at6esrse', 'vcxvxcvxcvxcv', 'yrdy', 'upload/thumbs/20130410_30604.png', 'upload/thumbs/20130410_10719.png', 'upload/thumbs/20130410_20822.png', 'upload/thumbs/20130322_5621.jpg', 'upload/thumbs/20130410_5620.png', '1', 'http://www.baidu.com', '0', 'www.baidu.cohttp://m', 'http://www.baidu.com', '2013-04-10', '2013-04-03', '2013-04-10', '0000-00-00', '2013-04-10', '2013-04-30', '2013-04-04', '2013-04-27', '0000-00-00', '2013-04-30', '2013-04-10 14:40:57', '1', null);
