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

 Date: 20/12/2021 14:44:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for profile_team
-- ----------------------------
DROP TABLE IF EXISTS `profile_team`;
CREATE TABLE `profile_team`  (
  `id_profile_team` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `tgl_bergabung` date NULL DEFAULT NULL,
  `jenis_kelamin` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '1=ya, 2=tidak',
  `jenis_profile` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '3' COMMENT '1=direksi, 2=manajemen, 3=staff&karyawan',
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `riwayat_pendidikan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pengalaman_profesional` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_profile_team`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile_team
-- ----------------------------
INSERT INTO `profile_team` VALUES ('61bff364614d5', 'pengunjung1 pengunjung1', '1273817', 'pengunjung1@mail.com', 'Bandung', '2021-12-20', '2021-12-20', '1', '1', 'asdasd', 'asasd', 'asdsad', '2021-12-20 10:07:16', '2021-12-20 10:07:16');

SET FOREIGN_KEY_CHECKS = 1;
