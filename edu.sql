/*
Navicat MySQL Data Transfer

Source Server         : learn
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : edu

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-10-06 22:56:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `think_access`
-- ----------------------------
DROP TABLE IF EXISTS `think_access`;
CREATE TABLE `think_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_access
-- ----------------------------
INSERT INTO `think_access` VALUES ('1', '1', '1', null, '0');
INSERT INTO `think_access` VALUES ('1', '2', '2', null, '1');
INSERT INTO `think_access` VALUES ('1', '5', '3', null, '2');
INSERT INTO `think_access` VALUES ('1', '6', '3', null, '2');
INSERT INTO `think_access` VALUES ('1', '7', '3', null, '2');
INSERT INTO `think_access` VALUES ('1', '3', '2', null, '1');
INSERT INTO `think_access` VALUES ('1', '8', '3', null, '3');
INSERT INTO `think_access` VALUES ('1', '9', '3', null, '4');

-- ----------------------------
-- Table structure for `think_grade`
-- ----------------------------
DROP TABLE IF EXISTS `think_grade`;
CREATE TABLE `think_grade` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '班级名称',
  `length` varchar(20) NOT NULL DEFAULT '' COMMENT '学制',
  `price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '学费',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1-启用 0-未启用',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1-允许删除  0-不允许',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_grade
-- ----------------------------
INSERT INTO `think_grade` VALUES ('1', 'PHP开发工程师就业班', '6个月', '19800', '1', '1502242191', '0000-00-00 00:00:00', '0', '1');
INSERT INTO `think_grade` VALUES ('2', '前端开发工程师提高班', '3个月', '6767', '1', '1502242191', '0000-00-00 00:00:00', '0', '1');
INSERT INTO `think_grade` VALUES ('3', 'WEB开发全栈工程师班', '6个月', '28800', '1', '1502242191', '0000-00-00 00:00:00', '0', '1');
INSERT INTO `think_grade` VALUES ('4', 'Java开发工程师提升班', '一年半', '3500', '1', '1502257693', '0000-00-00 00:00:00', '0', '1');
INSERT INTO `think_grade` VALUES ('5', '平面设计高薪就业班', '6个月', '9800', '1', '1502334559', '0000-00-00 00:00:00', '0', '1');

-- ----------------------------
-- Table structure for `think_node`
-- ----------------------------
DROP TABLE IF EXISTS `think_node`;
CREATE TABLE `think_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_node
-- ----------------------------
INSERT INTO `think_node` VALUES ('1', 'Index', null, '1', null, null, '0', '1');
INSERT INTO `think_node` VALUES ('2', 'Base', null, '1', null, null, '1', '2');
INSERT INTO `think_node` VALUES ('3', 'Indexs', null, '1', null, null, '1', '2');
INSERT INTO `think_node` VALUES ('4', 'Student', null, '1', null, null, '1', '2');
INSERT INTO `think_node` VALUES ('5', '_initialize', null, '1', null, null, '2', '3');
INSERT INTO `think_node` VALUES ('6', 'isLogin', null, '1', null, null, '2', '3');
INSERT INTO `think_node` VALUES ('7', 'alreadyLogin', null, '1', null, null, '2', '3');
INSERT INTO `think_node` VALUES ('8', 'index', null, '1', null, null, '3', '3');
INSERT INTO `think_node` VALUES ('9', 'index', null, '1', null, null, '4', '3');

-- ----------------------------
-- Table structure for `think_role`
-- ----------------------------
DROP TABLE IF EXISTS `think_role`;
CREATE TABLE `think_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_role
-- ----------------------------
INSERT INTO `think_role` VALUES ('1', '管理员', null, '1', null);
INSERT INTO `think_role` VALUES ('2', '客服', null, '1', null);

-- ----------------------------
-- Table structure for `think_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `think_role_user`;
CREATE TABLE `think_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_role_user
-- ----------------------------
INSERT INTO `think_role_user` VALUES ('1', '1');
INSERT INTO `think_role_user` VALUES ('2', '2');

-- ----------------------------
-- Table structure for `think_student`
-- ----------------------------
DROP TABLE IF EXISTS `think_student`;
CREATE TABLE `think_student` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(50) DEFAULT NULL COMMENT '姓名',
  `sex` tinyint(4) DEFAULT NULL COMMENT '性别',
  `age` tinyint(4) unsigned DEFAULT NULL COMMENT '年龄',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `status` int(11) DEFAULT NULL COMMENT '当前状态',
  `start_time` int(11) DEFAULT NULL COMMENT '入学时间',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间',
  `is_delete` int(11) DEFAULT NULL COMMENT '允许删除',
  `grade_id` int(11) DEFAULT NULL COMMENT '关联外键',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_student
-- ----------------------------
INSERT INTO `think_student` VALUES ('1', '杨过', '0', '67', '18966557788', 'yangguo@php.cn', '1', '1494345600', '1502326725', '1502343973', null, '1', '3');
INSERT INTO `think_student` VALUES ('2', '小龙女', '0', '33', '13509897765', 'xiaolongnv@php.cn', '1', '1502326725', '1502326725', '1502343973', null, '1', '1');
INSERT INTO `think_student` VALUES ('3', '尹志平', '1', '38', '17765336278', 'yizhiping@php.cn', '1', '1502326725', '1502326725', '1502343973', null, '1', '3');
INSERT INTO `think_student` VALUES ('4', '老顽童', '1', '89', '15677281923', 'laowantong@php.cn', '1', '1502326725', '1502326725', '1502343973', null, '1', '2');
INSERT INTO `think_student` VALUES ('5', '洪七公', '1', '78', '13389776234', 'hongqigong@php.cn', '1', '1502326725', '1502326725', '1502343973', null, '1', '2');
INSERT INTO `think_student` VALUES ('6', '郭靖', '0', '26', '15766338726', 'guojin@php.cn', '1', '1502294400', '1502326725', '1502343973', null, '1', '1');
INSERT INTO `think_student` VALUES ('7', '黄蓉', '0', '46', '18976227182', 'huangrong@php.cn', '0', '1502326725', '1502326725', '1502343973', null, '1', '1');
INSERT INTO `think_student` VALUES ('8', '杨康', '1', '45', '13287009834', 'yangkang@php.cn', '0', '1502326725', '1502326725', '1502343973', null, '1', '3');
INSERT INTO `think_student` VALUES ('9', '欧阳克', '1', '37', '13908772343', 'ouyangke@php.cn', '0', '1502326725', '1502326725', '1502343973', null, '1', '2');
INSERT INTO `think_student` VALUES ('10', '张无忌', '1', '28', '15387298273', 'zhangwuji@php.cn', '1', '1502326725', '1502326725', '1502343973', null, '1', '2');
INSERT INTO `think_student` VALUES ('11', '赵敏', '0', '26', '13987372937', 'zhaoming@php.cn', '1', '1502326725', '1502326725', '1502343973', null, '1', '3');
INSERT INTO `think_student` VALUES ('12', '宋青书', '0', '22', '15806554328', 'songqinshu@php.cn', '1', '1494864000', '1502327784', '1502343973', null, '1', '2');
INSERT INTO `think_student` VALUES ('13', '周芷若', '1', '20', '18977665544', 'zhouzhiruo@php.cn', '1', '1501948800', '1502343910', '1502343931', null, null, '5');

-- ----------------------------
-- Table structure for `think_user`
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `role` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '角色',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0禁用 1 启用',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `delete_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间',
  `login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登陆时间',
  `login_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除 1-是  0-否',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_user
-- ----------------------------
INSERT INTO `think_user` VALUES ('2', 'jim232', '', 'jim@qq.com', '0', '1', '1507300003', '2017-10-06 22:54:32', '0', '1506789200', '0', '0');
INSERT INTO `think_user` VALUES ('1', 'admin', '123456', 'admin@qq.com', '0', '1', '1507303075', '2017-10-06 23:27:27', '0', '0', '0', '0');
INSERT INTO `think_user` VALUES ('13', 'owen2', '123456', 'owen@qq.com', '0', '1', '1507302539', '2017-10-06 23:29:55', '0', '0', '0', '0');
INSERT INTO `think_user` VALUES ('14', 'peter2', '', 'peter@qq.com', '0', '1', '1507303075', '2017-10-06 23:42:26', '0', '0', '0', '0');
