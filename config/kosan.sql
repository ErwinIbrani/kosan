/*
 Navicat Premium Data Transfer

 Source Server         : Mysql5.7.21_Local
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : kosan

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 07/05/2019 22:41:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  INDEX `idx-auth_assignment-user_id`(`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('Admin', '8', 1557152564);

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/dashboard/*', 2, NULL, NULL, NULL, 1557152493, 1557152493);
INSERT INTO `auth_item` VALUES ('/dashboard/index', 2, NULL, NULL, NULL, 1557152493, 1557152493);
INSERT INTO `auth_item` VALUES ('/gridview/*', 2, NULL, NULL, NULL, 1557152456, 1557152456);
INSERT INTO `auth_item` VALUES ('/gridview/export/*', 2, NULL, NULL, NULL, 1557152454, 1557152454);
INSERT INTO `auth_item` VALUES ('/gridview/export/download', 2, NULL, NULL, NULL, 1557152450, 1557152450);
INSERT INTO `auth_item` VALUES ('/kosan/*', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/create', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/delete', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/index', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/update', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/view', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/landing-page/*', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/landing-page/index', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/rbac/*', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/assignment/*', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/assignment/assign', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/assignment/index', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/assignment/revoke', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/assignment/view', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/default/*', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/default/index', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/menu/*', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/menu/create', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/menu/delete', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/menu/index', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/menu/update', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/menu/view', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/permission/*', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/permission/assign', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/permission/create', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/permission/delete', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/permission/index', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/permission/remove', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/permission/update', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/permission/view', 2, NULL, NULL, NULL, 1557152478, 1557152478);
INSERT INTO `auth_item` VALUES ('/rbac/role/*', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/role/assign', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/role/create', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/role/delete', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/role/index', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/role/remove', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/role/update', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/role/view', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/route/*', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/route/assign', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/route/create', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/route/index', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/route/refresh', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/route/remove', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/rule/*', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/rule/create', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/rule/delete', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/rule/index', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/rule/update', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/rule/view', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/*', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/activate', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/change-password', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/delete', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/index', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/login', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/logout', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/request-password-reset', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/reset-password', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/signup', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/rbac/user/view', 2, NULL, NULL, NULL, 1557152479, 1557152479);
INSERT INTO `auth_item` VALUES ('/site/*', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/site/image', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/site/index', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/user/*', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('/user/create', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('/user/delete', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('/user/index', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('/user/update', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('/user/view', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('Admin', 1, 'Role Admin Tingkat Atas', NULL, NULL, 1557152527, 1557152527);

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('Admin', '/dashboard/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/dashboard/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gridview/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gridview/export/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gridview/export/download');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/landing-page/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/landing-page/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/assignment/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/assignment/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/assignment/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/default/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/default/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/menu/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/menu/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/menu/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/menu/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/menu/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/menu/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/assign');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/remove');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/assign');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/remove');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/assign');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/refresh');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/remove');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/activate');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/change-password');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/login');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/logout');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/request-password-reset');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/reset-password');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/signup');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/user/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/image');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user/view');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for komplain
-- ----------------------------
DROP TABLE IF EXISTS `komplain`;
CREATE TABLE `komplain`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kosan_id` int(11) NOT NULL,
  `komplain` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar_komplain` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('Diperbaiki','Belum Diperbaiki') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_komplain` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kosan_id`(`kosan_id`) USING BTREE,
  CONSTRAINT `kosan_id` FOREIGN KEY (`kosan_id`) REFERENCES `kosan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kosan
-- ----------------------------
DROP TABLE IF EXISTS `kosan`;
CREATE TABLE `kosan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kosan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `harga_perbulan` decimal(12, 2) NOT NULL,
  `alamat_kosan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pasilitas` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_kosan` enum('Pria','Wanita','Campur') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Tersedia',
  `gambar_kosan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kosan
-- ----------------------------
INSERT INTO `kosan` VALUES (2, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (3, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1556848765);
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', 1556848773);
INSERT INTO `migration` VALUES ('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1556848773);
INSERT INTO `migration` VALUES ('m180523_151638_rbac_updates_indexes_without_prefix', 1556848774);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telepon` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` smallint(10) NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `poto_ktp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tanggal_daftar` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (8, 'Santi', 'erwin', 'Perempuan', '2019-05-01', 'Bandung', '098564833844', 'WctfhkEgrJD4QFFi_1rJcNTrhQqHHBJf', '$2y$13$KleWkwitzS0x3Px7zUMyReeMaoHZH9g8I/MpQ8ttCxchPaOq8t/Be', 'santi@gmail.com', 10, 'Jl. ajaa', 'aab0504a2939cc1cbd2e79ba6673d305568854bc.png', '2019-05-06 09:19:30');

-- ----------------------------
-- Table structure for user_kosan
-- ----------------------------
DROP TABLE IF EXISTS `user_kosan`;
CREATE TABLE `user_kosan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kosan_id` int(11) NOT NULL,
  `tgl_masuk_kos` date NOT NULL,
  `tgl_berakhir_kos` date NOT NULL,
  `status` enum('Tetap','Keluar') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Tetap',
  `status_bayar` enum('Dibayar','Belum Dibayar') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Dibayar',
  `pemebritahuan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user`(`user_id`) USING BTREE,
  INDEX `kosan`(`kosan_id`) USING BTREE,
  CONSTRAINT `kosan` FOREIGN KEY (`kosan_id`) REFERENCES `kosan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
