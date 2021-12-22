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

 Date: 22/12/2021 10:32:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori_pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi_singkat_pekerjaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `no_spk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_spk` date NULL DEFAULT NULL,
  `waktu_pekerjaan` date NULL DEFAULT NULL,
  `tahun_buku` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_galeri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES ('61b2f6577661b', 'Benecol', 'https://www.kalbe.co.id/products/ArtMID/456/ArticleID/428/NUTRIVE-BENECOL', 'Benecol', '1', 'Pengadaan Barang', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia eveniet quo dolore officiis accusantium deserunt laboriosam doloribus in facere perferendis, vitae enim, officia ipsam consequatur architecto sit dolorem dolor cupiditate.', 'SPK/2021/12/20', '2021-12-20', '2021-12-20', '2021', NULL, '2021-12-10 13:40:23', '2021-12-10 13:40:23');
INSERT INTO `pelanggan` VALUES ('61b2f669567ba', 'SGD', 'https://www.sgd-pharma.com/', 'SGD Pharma', '1', 'Pengadaan Barang', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia eveniet quo dolore officiis accusantium deserunt laboriosam doloribus in facere perferendis, vitae enim, officia ipsam consequatur architecto sit dolorem dolor cupiditate.', 'SPK/2021/12/20', '2021-12-20', '2021-12-20', '2021', NULL, '2021-12-10 13:40:41', '2021-12-10 13:40:41');
INSERT INTO `pelanggan` VALUES ('61c03f98aaf5d', 'Catalent', 'https://www.catalent.com/', 'Catalent', '1', 'Pengadaan Barang', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla repellendus adipisci facilis eveniet quidem quam repellat consequuntur earum excepturi eaque hic recusandae cumque doloribus, quos ipsam aperiam aut quibusdam laudantium.', 'SPK/2021/12/20', '2021-12-20', '2021-12-20', '2021', NULL, '2021-12-20 15:32:24', '2021-12-20 15:32:24');

SET FOREIGN_KEY_CHECKS = 1;
