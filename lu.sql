/*
Navicat MySQL Data Transfer

Source Server         : luhix
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lu

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-28 18:40:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tp_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `pword` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属角色id',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', null);
INSERT INTO `tp_admin` VALUES ('2', 'test', '21232f297a57a5a743894a0e4a801fc3', '1', null);
INSERT INTO `tp_admin` VALUES ('3', 'jianglibin', 'e10adc3949ba59abbe56e057f20f883e', '4', null);
INSERT INTO `tp_admin` VALUES ('4', 'test1', 'e10adc3949ba59abbe56e057f20f883e', '4', '1481183995');

-- ----------------------------
-- Table structure for `tp_menu`
-- ----------------------------
DROP TABLE IF EXISTS `tp_menu`;
CREATE TABLE `tp_menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父类id',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `controller` varchar(30) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(30) NOT NULL DEFAULT '' COMMENT '方法',
  `url` varchar(50) NOT NULL DEFAULT '' COMMENT '控制器与方法url,如 c/a,b/d',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '菜单显示状态: 0不显示,1显示',
  `power` tinyint(1) unsigned DEFAULT '1' COMMENT '是否启用, 0关闭,1开启',
  `step` tinyint(3) unsigned DEFAULT '0' COMMENT '排序权重,0-255, 越小菜单越靠前',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

-- ----------------------------
-- Records of tp_menu
-- ----------------------------
INSERT INTO `tp_menu` VALUES ('1', '0', '权限管理', '', '', '/', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('2', '1', '菜单管理', 'Menu', 'index', 'Menu/index', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('3', '1', '角色管理', 'Role', 'index', 'Role/index', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('4', '0', '后台人员管理', '', '', '/', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('5', '4', '后台人员列表', 'Admin', 'index', 'Admin/index', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('6', '2', '添加菜单', 'Menu', 'add', 'Menu/add', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('9', '5', '后台用户添加', 'Admin', 'add', 'Admin/add', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('15', '2', '添加子菜单', 'Menu', 'addChild', 'Menu/addChild', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('16', '2', '删除菜单', 'Menu', 'del', 'Menu/del', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('17', '2', '编辑菜单', 'Menu', 'edit', 'Menu/edit', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('18', '3', '配置权限', 'Role', 'privilegeEdit', 'Role/privilegeEdit', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('21', '3', '添加角色', 'Role', 'add', 'Role/add', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('22', '3', '删除角色', 'Role', 'del', 'Role/del', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('23', '3', '编辑角色', 'Role', 'edit', 'Role/edit', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('25', '5', '后台人员编辑', 'Admin', 'edit', 'Admin/edit', '1', '1', '0');
INSERT INTO `tp_menu` VALUES ('26', '5', '后台人员删除', 'Admin', 'del', 'Admin/del', '1', '1', '0');

-- ----------------------------
-- Table structure for `tp_role`
-- ----------------------------
DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE `tp_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rname` varchar(20) NOT NULL DEFAULT '' COMMENT '角色名称',
  `status` int(10) DEFAULT '0',
  `address` char(30) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='角色菜单表';

-- ----------------------------
-- Records of tp_role
-- ----------------------------
INSERT INTO `tp_role` VALUES ('4', 'sdm', '0', null);
INSERT INTO `tp_role` VALUES ('5', 'ddddm', '0', '0');
INSERT INTO `tp_role` VALUES ('6', 'sa', '1', null);
INSERT INTO `tp_role` VALUES ('7', 'xx', '0', 'd');

-- ----------------------------
-- Table structure for `tp_role_menu`
-- ----------------------------
DROP TABLE IF EXISTS `tp_role_menu`;
CREATE TABLE `tp_role_menu` (
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `menu_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '菜单id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色菜单对应表';

-- ----------------------------
-- Records of tp_role_menu
-- ----------------------------
INSERT INTO `tp_role_menu` VALUES ('3', '1');
INSERT INTO `tp_role_menu` VALUES ('3', '2');
INSERT INTO `tp_role_menu` VALUES ('3', '6');
INSERT INTO `tp_role_menu` VALUES ('3', '3');
INSERT INTO `tp_role_menu` VALUES ('3', '4');
INSERT INTO `tp_role_menu` VALUES ('3', '5');
INSERT INTO `tp_role_menu` VALUES ('3', '9');
INSERT INTO `tp_role_menu` VALUES ('4', '1');
INSERT INTO `tp_role_menu` VALUES ('4', '3');
INSERT INTO `tp_role_menu` VALUES ('4', '23');
INSERT INTO `tp_role_menu` VALUES ('4', '22');
INSERT INTO `tp_role_menu` VALUES ('4', '21');
INSERT INTO `tp_role_menu` VALUES ('4', '18');
INSERT INTO `tp_role_menu` VALUES ('4', '2');
INSERT INTO `tp_role_menu` VALUES ('4', '17');
INSERT INTO `tp_role_menu` VALUES ('4', '16');
INSERT INTO `tp_role_menu` VALUES ('4', '15');
INSERT INTO `tp_role_menu` VALUES ('4', '6');
