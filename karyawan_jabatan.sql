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

 Date: 20/12/2021 14:44:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for karyawan_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan_jabatan`;
CREATE TABLE `karyawan_jabatan`  (
  `id_karyawan_jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_karyawan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hide` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '2' COMMENT '1=ya, 2=tidak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_karyawan_jabatan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of karyawan_jabatan
-- ----------------------------
INSERT INTO `karyawan_jabatan` VALUES ('61bff6849b198', '61bff364614d5', '61bc3b2d07844', '2', '2021-12-20 10:20:36', '2021-12-20 10:20:36');
INSERT INTO `karyawan_jabatan` VALUES ('61bff684b0efe', '61bff364614d5', '61bc3b56e9bab', '2', '2021-12-20 10:20:36', '2021-12-20 10:20:36');

SET FOREIGN_KEY_CHECKS = 1;
