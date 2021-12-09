/*
 Navicat Premium Data Transfer

 Source Server         : mysql_local
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : pancateksindo_web

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 09/12/2021 09:35:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cms_menu
-- ----------------------------
DROP TABLE IF EXISTS `cms_menu`;
CREATE TABLE `cms_menu`  (
  `id_cms_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipe` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1',
  `urutan` int NOT NULL,
  `link_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '#',
  `link_url_opened` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '1=ya, 2=tidak',
  `halaman_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `have_sub` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '1=ya, 2=tidak',
  `parent_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `footer` int NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cms_menu`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cms_menu
-- ----------------------------
INSERT INTO `cms_menu` VALUES ('61b05b55ba041', 'Menu with submenu', NULL, 1, NULL, NULL, NULL, '1', '0', 2, '2021-12-08 14:14:29', '2021-12-08 14:14:29');
INSERT INTO `cms_menu` VALUES ('61b0616276194', 'Sub Menu 1', NULL, 2, NULL, NULL, NULL, '1', '61b05b55ba041', 2, '2021-12-08 14:40:18', '2021-12-08 14:40:18');
INSERT INTO `cms_menu` VALUES ('61b061b062144', 'Sub Sub Menu 1', '2', 3, '/news', '1', NULL, '2', '61b0616276194', 1, '2021-12-08 14:41:36', '2021-12-08 14:41:36');
INSERT INTO `cms_menu` VALUES ('61b078e3749ad', 'Sub Menu 2', '2', 4, '/news', '1', NULL, '2', '61b05b55ba041', 1, '2021-12-08 16:20:35', '2021-12-08 16:20:35');
INSERT INTO `cms_menu` VALUES ('61b079b444671', 'Sub Sub Sub Menu 1', '2', 5, '/news', '1', NULL, '2', '61b061b062144', 2, '2021-12-08 16:24:04', '2021-12-08 16:24:04');

SET FOREIGN_KEY_CHECKS = 1;
