/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : devtest

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2017-07-29 14:00:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `group_user`
-- ----------------------------
DROP TABLE IF EXISTS `group_user`;
CREATE TABLE `group_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `num_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of group_user
-- ----------------------------
INSERT INTO `group_user` VALUES ('1', 'GROUP A', '2017-07-29 11:12:51', null);
INSERT INTO `group_user` VALUES ('2', 'GROUP B', '2017-07-29 11:13:13', null);

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ic` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `join_date` datetime NOT NULL,
  `group` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ic`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'sandi', 'm', '2017-07-29 11:08:47', '1', null, null);
INSERT INTO `user` VALUES ('2', 'hansen', 'm', '2017-07-29 11:09:23', '1', null, null);
