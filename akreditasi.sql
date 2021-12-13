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

 Date: 13/12/2021 11:52:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for akreditasi
-- ----------------------------
DROP TABLE IF EXISTS `akreditasi`;
CREATE TABLE `akreditasi`  (
  `id_akreditasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_akreditasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_akreditasi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of akreditasi
-- ----------------------------
INSERT INTO `akreditasi` VALUES ('61b6cda7aa5bd', 'akreditasi 1', '2021-12-13 11:35:51', '2021-12-13 11:35:51');
INSERT INTO `akreditasi` VALUES ('61b6ce14d6870', 'akreditasi 2', '2021-12-13 11:37:40', '2021-12-13 11:37:40');
INSERT INTO `akreditasi` VALUES ('61b6ce2c16532', 'akreditasi 3', '2021-12-13 11:38:04', '2021-12-13 11:38:04');
INSERT INTO `akreditasi` VALUES ('61b6ce3b8d049', 'akreditasi 4', '2021-12-13 11:38:19', '2021-12-13 11:38:19');
INSERT INTO `akreditasi` VALUES ('61b6ce4b3f8c9', 'akreditasi 5', '2021-12-13 11:38:35', '2021-12-13 11:38:35');
INSERT INTO `akreditasi` VALUES ('61b6ce584818d', 'akreditasi 6', '2021-12-13 11:38:48', '2021-12-13 11:38:48');

SET FOREIGN_KEY_CHECKS = 1;
