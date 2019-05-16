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

 Date: 16/05/2019 11:15:14
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
INSERT INTO `auth_assignment` VALUES ('Admin', '10', 1557925448);
INSERT INTO `auth_assignment` VALUES ('User', '11', 1557978922);
INSERT INTO `auth_assignment` VALUES ('User', '8', 1557977638);
INSERT INTO `auth_assignment` VALUES ('User', '9', 1557975053);

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
INSERT INTO `auth_item` VALUES ('/cron-job/*', 2, NULL, NULL, NULL, 1557974180, 1557974180);
INSERT INTO `auth_item` VALUES ('/cron-job/index', 2, NULL, NULL, NULL, 1557974180, 1557974180);
INSERT INTO `auth_item` VALUES ('/dashboard-admin/*', 2, NULL, NULL, NULL, 1557975197, 1557975197);
INSERT INTO `auth_item` VALUES ('/dashboard-admin/index', 2, NULL, NULL, NULL, 1557926153, 1557926153);
INSERT INTO `auth_item` VALUES ('/dashboard-admin/konfirmasi', 2, NULL, NULL, NULL, 1557927699, 1557927699);
INSERT INTO `auth_item` VALUES ('/dashboard/*', 2, NULL, NULL, NULL, 1557152493, 1557152493);
INSERT INTO `auth_item` VALUES ('/dashboard/index', 2, NULL, NULL, NULL, 1557152493, 1557152493);
INSERT INTO `auth_item` VALUES ('/dashboard/search', 2, NULL, NULL, NULL, 1557975206, 1557975206);
INSERT INTO `auth_item` VALUES ('/gridview/*', 2, NULL, NULL, NULL, 1557152456, 1557152456);
INSERT INTO `auth_item` VALUES ('/gridview/export/*', 2, NULL, NULL, NULL, 1557152454, 1557152454);
INSERT INTO `auth_item` VALUES ('/gridview/export/download', 2, NULL, NULL, NULL, 1557152450, 1557152450);
INSERT INTO `auth_item` VALUES ('/kosan/*', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/create', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/delete', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/index', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/pilih', 2, NULL, NULL, NULL, 1557975192, 1557975192);
INSERT INTO `auth_item` VALUES ('/kosan/update', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/view', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/landing-page/*', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/landing-page/index', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/pengaduan-admin/*', 2, NULL, NULL, NULL, 1557972565, 1557972565);
INSERT INTO `auth_item` VALUES ('/pengaduan-admin/delete', 2, NULL, NULL, NULL, 1557972929, 1557972929);
INSERT INTO `auth_item` VALUES ('/pengaduan-admin/index', 2, NULL, NULL, NULL, 1557972565, 1557972565);
INSERT INTO `auth_item` VALUES ('/pengaduan-admin/update', 2, NULL, NULL, NULL, 1557972929, 1557972929);
INSERT INTO `auth_item` VALUES ('/pengaduan-admin/view', 2, NULL, NULL, NULL, 1557975166, 1557975166);
INSERT INTO `auth_item` VALUES ('/pengaduan/*', 2, NULL, NULL, NULL, 1557975163, 1557975163);
INSERT INTO `auth_item` VALUES ('/pengaduan/create', 2, NULL, NULL, NULL, 1557975163, 1557975163);
INSERT INTO `auth_item` VALUES ('/pengaduan/delete', 2, NULL, NULL, NULL, 1557975163, 1557975163);
INSERT INTO `auth_item` VALUES ('/pengaduan/index', 2, NULL, NULL, NULL, 1557975163, 1557975163);
INSERT INTO `auth_item` VALUES ('/pengaduan/update', 2, NULL, NULL, NULL, 1557975163, 1557975163);
INSERT INTO `auth_item` VALUES ('/pengaduan/view', 2, NULL, NULL, NULL, 1557975163, 1557975163);
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
INSERT INTO `auth_item` VALUES ('/user-kosan/*', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/bayar', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/create', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/delete', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/index', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/keluar-kosan', 2, NULL, NULL, NULL, 1557977326, 1557977326);
INSERT INTO `auth_item` VALUES ('/user-kosan/update', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/view', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user/*', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('/user/create', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('/user/delete', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('/user/index', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('/user/update', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('/user/view', 2, NULL, NULL, NULL, 1557235832, 1557235832);
INSERT INTO `auth_item` VALUES ('Admin', 1, 'Role Admin Tingkat Atas', NULL, NULL, 1557152527, 1557152527);
INSERT INTO `auth_item` VALUES ('User', 1, 'User yang nyewa kosan', NULL, NULL, 1557975023, 1557975023);

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
INSERT INTO `auth_item_child` VALUES ('Admin', '/cron-job/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/cron-job/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/dashboard-admin/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/dashboard-admin/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/dashboard-admin/konfirmasi');
INSERT INTO `auth_item_child` VALUES ('User', '/dashboard/*');
INSERT INTO `auth_item_child` VALUES ('User', '/dashboard/index');
INSERT INTO `auth_item_child` VALUES ('User', '/dashboard/search');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gridview/*');
INSERT INTO `auth_item_child` VALUES ('User', '/gridview/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gridview/export/*');
INSERT INTO `auth_item_child` VALUES ('User', '/gridview/export/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gridview/export/download');
INSERT INTO `auth_item_child` VALUES ('User', '/gridview/export/download');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/index');
INSERT INTO `auth_item_child` VALUES ('User', '/kosan/pilih');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/pengaduan-admin/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/pengaduan-admin/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/pengaduan-admin/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/pengaduan-admin/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/pengaduan-admin/view');
INSERT INTO `auth_item_child` VALUES ('User', '/pengaduan/*');
INSERT INTO `auth_item_child` VALUES ('User', '/pengaduan/create');
INSERT INTO `auth_item_child` VALUES ('User', '/pengaduan/delete');
INSERT INTO `auth_item_child` VALUES ('User', '/pengaduan/index');
INSERT INTO `auth_item_child` VALUES ('User', '/pengaduan/update');
INSERT INTO `auth_item_child` VALUES ('User', '/pengaduan/view');
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
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/*');
INSERT INTO `auth_item_child` VALUES ('User', '/user-kosan/*');
INSERT INTO `auth_item_child` VALUES ('User', '/user-kosan/bayar');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/index');
INSERT INTO `auth_item_child` VALUES ('User', '/user-kosan/keluar-kosan');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/view');
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
-- Table structure for cron_job
-- ----------------------------
DROP TABLE IF EXISTS `cron_job`;
CREATE TABLE `cron_job`  (
  `id_cron_job` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `limit` int(11) NULL DEFAULT NULL,
  `offset` int(11) NULL DEFAULT NULL,
  `running` smallint(6) UNSIGNED NOT NULL,
  `success` smallint(6) UNSIGNED NOT NULL,
  `started_at` int(11) UNSIGNED NULL DEFAULT NULL,
  `ended_at` int(11) UNSIGNED NULL DEFAULT NULL,
  `last_execution_time` float NULL DEFAULT NULL,
  PRIMARY KEY (`id_cron_job`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cron_job
-- ----------------------------
INSERT INTO `cron_job` VALUES (1, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557841887, 1557841888, 0.0550029);
INSERT INTO `cron_job` VALUES (2, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557842068, 1557843847, 0.070004);
INSERT INTO `cron_job` VALUES (3, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557843890, 1557844121, 0.0510032);
INSERT INTO `cron_job` VALUES (4, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557844159, 1557844160, 0.0930049);
INSERT INTO `cron_job` VALUES (5, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557844179, 1557844179, 0.0990059);
INSERT INTO `cron_job` VALUES (6, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557844212, 1557844212, 0.073004);
INSERT INTO `cron_job` VALUES (7, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557844230, 1557844536, 0.0800052);
INSERT INTO `cron_job` VALUES (8, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557844734, 1557845168, 0.0360019);
INSERT INTO `cron_job` VALUES (9, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557845299, 1557886029, 0.0170012);
INSERT INTO `cron_job` VALUES (10, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557886092, 1557886095, 3.78422);
INSERT INTO `cron_job` VALUES (11, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557886290, 1557886293, 2.49914);
INSERT INTO `cron_job` VALUES (12, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557886441, 1557886444, 3.4442);
INSERT INTO `cron_job` VALUES (13, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557979885, 1557979885, 0.0680039);
INSERT INTO `cron_job` VALUES (14, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557979958, 1557979963, 5.50331);

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
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kosan
-- ----------------------------
INSERT INTO `kosan` VALUES (2, 'Kosan Ibu Dia', 32, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (3, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (4, 'Kosan Ibu Dia', 33, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (5, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (6, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (7, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (8, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (9, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (10, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (11, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (12, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (13, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (14, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (15, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (16, 'Kosan Ibu Dia', 33, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (17, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (18, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (19, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (20, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (21, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (22, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (23, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (24, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (25, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (26, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (27, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (28, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (29, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (30, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (31, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');
INSERT INTO `kosan` VALUES (32, 'Kosan Ibu Dia', 34, 100000.00, 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png');
INSERT INTO `kosan` VALUES (33, 'Kosan Kamu', 13, 130000.00, 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');

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
INSERT INTO `migration` VALUES ('m150927_060316_cronjob_init', 1557841264);
INSERT INTO `migration` VALUES ('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1556848773);
INSERT INTO `migration` VALUES ('m180523_151638_rbac_updates_indexes_without_prefix', 1556848774);

-- ----------------------------
-- Table structure for pengaduan
-- ----------------------------
DROP TABLE IF EXISTS `pengaduan`;
CREATE TABLE `pengaduan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kosan_id` int(11) NOT NULL,
  `jenis_pengaduan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan_pengadu` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` enum('Diperbaiki','Belum Diperbaiki') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Belum Diperbaiki',
  `keterangan_teknisi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tanggal_laporan` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_pengadu`(`user_id`) USING BTREE,
  INDEX `kosan_pengadu`(`kosan_id`) USING BTREE,
  CONSTRAINT `kosan_pengadu` FOREIGN KEY (`kosan_id`) REFERENCES `kosan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_pengadu` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengaduan
-- ----------------------------
INSERT INTO `pengaduan` VALUES (3, 11, 3, 'dwd', 'dswds', '0edf87bd3ece6415a398f4396e0843c6f0d45f26.png', 'Belum Diperbaiki', NULL, '2019-05-16 10:58:31');

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
  `status_kost` smallint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (10, 'admin kosan', 'admin_kosan', 'Laki-laki', '2019-05-15', 'Bandung', '085645366455', 'Q_FYQ2-jQSXIzPbFvmZl_-dP5hPFbP96', '$2y$13$kQQM0GnbOVN6HYDzjnydyum0Evtje9y6htS0bZFSjpP4biVreVspK', 'admin@gmail.com', 10, 'Jl. Dipatiukur', 'bf1c3179deab701e87821a40a1e74c4bb0c2ee45.png', '2019-05-15 20:02:57', 0);
INSERT INTO `user` VALUES (11, 'Erwin Situmorang', 'erwin', 'Laki-laki', '2019-05-15', 'Bandung Barat', '098364544633', 'AYx5o-jalPKdfgIrwCMY9-bl-wPYQxLx', '$2y$13$45v8CirUYklAnNaMq8NcVuN60m17wtXeZj0c4wOM/s6fdplkA49fq', 'erwinlocalhost90@gmail.com', 10, 'Jl. Raya Batu Nunggal', 'b932d5479326e256ad0a0d845c4fc093a09f82f9.png', '2019-05-16 10:40:16', 1);

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
  `status_konfirmasi` enum('Dikonfirmasi','Belum Dikonfirmasi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Belum Dikonfirmasi',
  `status_bayar` enum('Dibayar','Belum Dibayar') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Belum Dibayar',
  `periode_kosan` int(11) NOT NULL DEFAULT 1,
  `bukti_pembayaran` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status_cron_job` enum('Dieksekusi','Belum Dieksekusi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Dieksekusi',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user`(`user_id`) USING BTREE,
  INDEX `kosan`(`kosan_id`) USING BTREE,
  CONSTRAINT `kosan` FOREIGN KEY (`kosan_id`) REFERENCES `kosan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_kosan
-- ----------------------------
INSERT INTO `user_kosan` VALUES (8, 11, 2, '2019-05-01', '2019-06-01', 'Tetap', 'Belum Dikonfirmasi', 'Dibayar', 1, 'e21ffc4a204d5a9cfb1f9ee7ca7feab5cf307d1b.jpg', 'Dieksekusi');
INSERT INTO `user_kosan` VALUES (9, 11, 2, '2019-06-01', '2019-05-16', 'Tetap', 'Belum Dikonfirmasi', 'Belum Dibayar', 2, NULL, 'Dieksekusi');

SET FOREIGN_KEY_CHECKS = 1;
