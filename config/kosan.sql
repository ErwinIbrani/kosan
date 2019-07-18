/*
 Navicat Premium Data Transfer

 Source Server         : mysql_local
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : kosan

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 18/07/2019 22:18:58
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
INSERT INTO `auth_assignment` VALUES ('User', '13', 1560955732);
INSERT INTO `auth_assignment` VALUES ('User', '14', 1560957346);
INSERT INTO `auth_assignment` VALUES ('User', '17', 1561299454);
INSERT INTO `auth_assignment` VALUES ('User', '20', NULL);
INSERT INTO `auth_assignment` VALUES ('User', '24', NULL);
INSERT INTO `auth_assignment` VALUES ('User', '26', NULL);
INSERT INTO `auth_assignment` VALUES ('User', '27', NULL);
INSERT INTO `auth_assignment` VALUES ('User', '28', NULL);
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
INSERT INTO `auth_item` VALUES ('/keluar-kosan/*', 2, NULL, NULL, NULL, 1559211068, 1559211068);
INSERT INTO `auth_item` VALUES ('/keluar-kosan/keluar-kosan', 2, NULL, NULL, NULL, 1559211068, 1559211068);
INSERT INTO `auth_item` VALUES ('/kosan/*', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/create', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/delete', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/index', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/pilih', 2, NULL, NULL, NULL, 1557975192, 1557975192);
INSERT INTO `auth_item` VALUES ('/kosan/update', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/kosan/view', 2, NULL, NULL, NULL, 1557235486, 1557235486);
INSERT INTO `auth_item` VALUES ('/landing-page/*', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/landing-page/index', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/pembayaran/*', 2, NULL, NULL, NULL, 1561556585, 1561556585);
INSERT INTO `auth_item` VALUES ('/pembayaran/index', 2, NULL, NULL, NULL, 1561556582, 1561556582);
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
INSERT INTO `auth_item` VALUES ('/sarat-ketentuan/*', 2, NULL, NULL, NULL, 1563462234, 1563462234);
INSERT INTO `auth_item` VALUES ('/sarat-ketentuan/create', 2, NULL, NULL, NULL, 1563462234, 1563462234);
INSERT INTO `auth_item` VALUES ('/sarat-ketentuan/delete', 2, NULL, NULL, NULL, 1563462234, 1563462234);
INSERT INTO `auth_item` VALUES ('/sarat-ketentuan/index', 2, NULL, NULL, NULL, 1563462234, 1563462234);
INSERT INTO `auth_item` VALUES ('/sarat-ketentuan/update', 2, NULL, NULL, NULL, 1563462234, 1563462234);
INSERT INTO `auth_item` VALUES ('/sarat-ketentuan/view', 2, NULL, NULL, NULL, 1563462234, 1563462234);
INSERT INTO `auth_item` VALUES ('/site/*', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/site/image', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/site/index', 2, NULL, NULL, NULL, 1557152498, 1557152498);
INSERT INTO `auth_item` VALUES ('/user-kosan/*', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/bayar', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/create', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/date', 2, NULL, NULL, NULL, 1561556905, 1561556905);
INSERT INTO `auth_item` VALUES ('/user-kosan/delete', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/index', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/keluar-kosan', 2, NULL, NULL, NULL, 1557977326, 1557977326);
INSERT INTO `auth_item` VALUES ('/user-kosan/update', 2, NULL, NULL, NULL, 1557975187, 1557975187);
INSERT INTO `auth_item` VALUES ('/user-kosan/user', 2, NULL, NULL, NULL, 1561556905, 1561556905);
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
INSERT INTO `auth_item_child` VALUES ('User', '/keluar-kosan/*');
INSERT INTO `auth_item_child` VALUES ('User', '/keluar-kosan/keluar-kosan');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/index');
INSERT INTO `auth_item_child` VALUES ('User', '/kosan/pilih');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/kosan/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/pembayaran/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/pembayaran/index');
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
INSERT INTO `auth_item_child` VALUES ('Admin', '/sarat-ketentuan/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/sarat-ketentuan/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/sarat-ketentuan/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/sarat-ketentuan/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/sarat-ketentuan/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/sarat-ketentuan/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/image');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/*');
INSERT INTO `auth_item_child` VALUES ('User', '/user-kosan/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/bayar');
INSERT INTO `auth_item_child` VALUES ('User', '/user-kosan/bayar');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/date');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/index');
INSERT INTO `auth_item_child` VALUES ('User', '/user-kosan/keluar-kosan');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/user-kosan/user');
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `jenis_kosan` enum('Pria','Wanita','Pria dan Wanita') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Tersedia',
  `gambar_kosan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kosan
-- ----------------------------
INSERT INTO `kosan` VALUES (1, 'Kosan Bapa Ajat', 13, 100000.00, 'Nanjung', 'AC', 'Pria dan Wanita', 'Tersedia', '88071900e8fc740c4ac55d27344ec0c07afa994a.jpg');
INSERT INTO `kosan` VALUES (5, 'Kosan Ibu Ilih', 23, 200000.00, 'Jl. Raya', 'AC, Tempat Makan', 'Pria', 'Tersedia', '8078a2517e35a31a113005a97eac4d6df14d9f0f.jpg');
INSERT INTO `kosan` VALUES (6, 'Kosan Hanya', 90, 120000.00, 'Situ', 'Kopi', 'Wanita', 'Tersedia', '8a0bab87d0c137b49b01dcc56067b68b06e344e6.jpg');

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sarat_ketentuan
-- ----------------------------
DROP TABLE IF EXISTS `sarat_ketentuan`;
CREATE TABLE `sarat_ketentuan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `syarat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ketentuan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sarat_ketentuan
-- ----------------------------
INSERT INTO `sarat_ketentuan` VALUES (1, 'I find the Dummy Text Generator plugin to be very useful for this.', 'I find the Dummy Text Generator plugin to be very useful for this. I find the Dummy Text Generator plugin to be very useful for this.  I find the Dummy Text Generator plugin to be very useful for this.I find the Dummy Text Generator plugin to be very useful for this.');

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
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (10, 'admin kosan', 'admin_kosan', 'Laki-laki', '2019-05-15', 'Bandung', '085645366455', 'Q_FYQ2-jQSXIzPbFvmZl_-dP5hPFbP96', '$2y$13$kQQM0GnbOVN6HYDzjnydyum0Evtje9y6htS0bZFSjpP4biVreVspK', 'admin@gmail.com', 10, 'Jl. Dipatiukur', 'bf1c3179deab701e87821a40a1e74c4bb0c2ee45.png', '2019-05-15 20:02:57', 0);
INSERT INTO `user` VALUES (28, 'Erwin Wiguna', 'wiguna', 'Laki-laki', '2019-07-18', 'Jakarta', '0876535444644', 'FJtCytCsVR2JCqxMW9ARLZ0deEyvXFZJ', '$2y$13$U9iu1KzSA5lz5zuLajHYIeHxNKZ1a6H/48F9tloJ8sSfbT/SIXRvW', 'erwin@gmail.com', 10, 'Jl. Raya', 'fa13b38f4d08aa6934718ea19e9388bfd0c3081d.jpg', '2019-07-18 21:24:28', 1);

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
  `jenis_pembayaran` enum('Cash','DP') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Cash',
  `status_cron_job` enum('Dieksekusi','Belum Dieksekusi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Dieksekusi',
  `bayar` decimal(11, 2) NULL DEFAULT NULL,
  `nunggak` decimal(11, 2) NULL DEFAULT NULL,
  `total` decimal(11, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user`(`user_id`) USING BTREE,
  INDEX `kosan`(`kosan_id`) USING BTREE,
  CONSTRAINT `kosan` FOREIGN KEY (`kosan_id`) REFERENCES `kosan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_kosan
-- ----------------------------
INSERT INTO `user_kosan` VALUES (22, 28, 1, '2019-07-18', '2019-08-18', 'Tetap', 'Belum Dikonfirmasi', 'Belum Dibayar', 1, NULL, 'Cash', 'Dieksekusi', 50000.00, -50000.00, 100000.00);

SET FOREIGN_KEY_CHECKS = 1;
