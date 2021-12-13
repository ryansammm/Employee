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

 Date: 13/12/2021 12:22:55
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
  `header` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1' COMMENT '1=ya, 2=tidak',
  `footer` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1' COMMENT '1=ya, 2=tidak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cms_menu`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cms_menu
-- ----------------------------
INSERT INTO `cms_menu` VALUES ('61b2eefa89c57', 'Beranda', '2', 1, '/', '1', NULL, '2', '0', '1', '2', '2021-12-10 13:08:58', '2021-12-10 13:08:58');
INSERT INTO `cms_menu` VALUES ('61b2ef0da906c', 'Berita', '2', 2, '/news', '1', NULL, '2', '0', '1', '2', '2021-12-10 13:09:17', '2021-12-10 13:09:17');
INSERT INTO `cms_menu` VALUES ('61b2ef20da664', 'Produk', '2', 3, '/product', '1', NULL, '2', '0', '1', '2', '2021-12-10 13:09:36', '2021-12-10 13:09:36');
INSERT INTO `cms_menu` VALUES ('61b2ef36dbc7d', 'Layanan', '2', 4, '/service', '1', NULL, '2', '0', '1', '2', '2021-12-10 13:09:58', '2021-12-10 13:09:58');
INSERT INTO `cms_menu` VALUES ('61b2ef8cd52de', 'Galeri', '2', 5, '/gallery', '1', NULL, '2', '0', '1', '2', '2021-12-10 13:11:24', '2021-12-10 13:11:24');
INSERT INTO `cms_menu` VALUES ('61b2efd520dd4', 'Klien', '2', 6, '/customer', '1', NULL, '2', '0', '1', '2', '2021-12-10 13:12:37', '2021-12-10 13:12:37');
INSERT INTO `cms_menu` VALUES ('61b2efe55d417', 'Kontak', '2', 7, '/contact', '1', NULL, '2', '0', '1', '2', '2021-12-10 13:12:53', '2021-12-10 13:12:53');
INSERT INTO `cms_menu` VALUES ('61b2eff90feb5', 'Tentang Kami', '2', 8, '/about', '1', NULL, '2', '0', '1', '1', '2021-12-10 13:13:13', '2021-12-10 13:13:13');
INSERT INTO `cms_menu` VALUES ('61b6d4bf25c41', 'Ketentuan & Kebijakan Privasi', '2', 9, '/ketentuan', '1', NULL, '2', '0', '2', '1', '2021-12-13 12:06:07', '2021-12-13 12:06:07');
INSERT INTO `cms_menu` VALUES ('61b6d4f92678e', 'Panduan Komunitas', '2', 10, '/panduan', '1', NULL, '2', '0', '2', '1', '2021-12-13 12:07:05', '2021-12-13 12:07:05');
INSERT INTO `cms_menu` VALUES ('61b6d5145a4b8', 'Pedoman Media Siber', '2', 11, '/pedoman', '1', NULL, '2', '0', '2', '1', '2021-12-13 12:07:32', '2021-12-13 12:07:32');

SET FOREIGN_KEY_CHECKS = 1;
