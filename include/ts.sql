/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : ts

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 03/11/2020 11:34:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `gid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品名字',
  `price_now` float NULL DEFAULT NULL COMMENT '出手价',
  `price_old` float NULL DEFAULT NULL COMMENT '入手价',
  `tag` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '标签',
  `owner_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '发布者id',
  `description` varchar(5000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品描述',
  `preview` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图',
  `type` enum('1','2') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  `remain` int(11) NULL DEFAULT NULL COMMENT '剩余',
  PRIMARY KEY (`gid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES (10, '拼多多砍一刀', 0.5, 20, '砍并夕夕', '2222', '暂无具体描述', '\"./images/NoPreview.png\"', '1', 1);
INSERT INTO `goods` VALUES (9, '砍拼多多两倍反', 0.5, 20, '砍并夕夕', '2222', '暂无具体描述', '\"./ueditor/php/upload/image/20201102/1604323068841224.jpg\"', '1', 1);
INSERT INTO `goods` VALUES (8, '雅诗栏黛澳洲学姐代购', 0.5, 20, '美妆彩妆', '2222', '十九块钱。。278套', '\"./ueditor/php/upload/image/20201102/1604322972852623.jpg\"', '1', 1);
INSERT INTO `goods` VALUES (7, '出8手洗脚盆二成新', 10, 50, '生活用品', '2222', '用过亿次', '\"./ueditor/php/upload/image/20201102/1604322760550157.jpg\"', '1', 1);
INSERT INTO `goods` VALUES (5, '自测练习d', 0.5, 20, '取个快递', '2222', 'ddd', '\"./images/NoPreview.png\"', '1', 1);
INSERT INTO `goods` VALUES (6, '出周六姜子牙', 1, 50, '影票场票', '2222', '去不了了，高价出', '\"./ueditor/php/upload/image/20201102/1604322437776814.jpg\"', '1', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `uid` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `qq` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'qq号',
  `qq_identify` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT 'QQ号是否认证',
  `uid_identify` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT 'uid是否认证',
  `can_post` enum('1','0') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1' COMMENT '是否可以发布商品',
  `nick` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '昵称',
  `credit` int(11) NULL DEFAULT NULL COMMENT '信誉分',
  `privilege` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '权限，区分用户和管理员',
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2222', 'aaa', NULL, '0', '0', '1', '14333@qq.com', NULL, '0');

SET FOREIGN_KEY_CHECKS = 1;
