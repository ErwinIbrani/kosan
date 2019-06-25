-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2019 at 10:21 AM
-- Server version: 5.7.21
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosan`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '10', 1557925448),
('User', '11', 1557978922),
('User', '8', 1557977638),
('User', '9', 1557975053);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/cron-job/*', 2, NULL, NULL, NULL, 1557974180, 1557974180),
('/cron-job/index', 2, NULL, NULL, NULL, 1557974180, 1557974180),
('/pembayaran/*', 2, NULL, NULL, NULL, 1557975197, 1557975197),
('/pembayaran/index', 2, NULL, NULL, NULL, 1557926153, 1557926153),
('/pembayaran/konfirmasi', 2, NULL, NULL, NULL, 1557927699, 1557927699),
('/dashboard/*', 2, NULL, NULL, NULL, 1557152493, 1557152493),
('/dashboard/index', 2, NULL, NULL, NULL, 1557152493, 1557152493),
('/dashboard/search', 2, NULL, NULL, NULL, 1557975206, 1557975206),
('/gridview/*', 2, NULL, NULL, NULL, 1557152456, 1557152456),
('/gridview/export/*', 2, NULL, NULL, NULL, 1557152454, 1557152454),
('/gridview/export/download', 2, NULL, NULL, NULL, 1557152450, 1557152450),
('/keluar-kosan/*', 2, NULL, NULL, NULL, 1559211068, 1559211068),
('/keluar-kosan/keluar-kosan', 2, NULL, NULL, NULL, 1559211068, 1559211068),
('/kosan/*', 2, NULL, NULL, NULL, 1557235486, 1557235486),
('/kosan/create', 2, NULL, NULL, NULL, 1557235486, 1557235486),
('/kosan/delete', 2, NULL, NULL, NULL, 1557235486, 1557235486),
('/kosan/index', 2, NULL, NULL, NULL, 1557235486, 1557235486),
('/kosan/pilih', 2, NULL, NULL, NULL, 1557975192, 1557975192),
('/kosan/update', 2, NULL, NULL, NULL, 1557235486, 1557235486),
('/kosan/view', 2, NULL, NULL, NULL, 1557235486, 1557235486),
('/landing-page/*', 2, NULL, NULL, NULL, 1557152498, 1557152498),
('/landing-page/index', 2, NULL, NULL, NULL, 1557152498, 1557152498),
('/pengaduan-admin/*', 2, NULL, NULL, NULL, 1557972565, 1557972565),
('/pengaduan-admin/delete', 2, NULL, NULL, NULL, 1557972929, 1557972929),
('/pengaduan-admin/index', 2, NULL, NULL, NULL, 1557972565, 1557972565),
('/pengaduan-admin/update', 2, NULL, NULL, NULL, 1557972929, 1557972929),
('/pengaduan-admin/view', 2, NULL, NULL, NULL, 1557975166, 1557975166),
('/pengaduan/*', 2, NULL, NULL, NULL, 1557975163, 1557975163),
('/pengaduan/create', 2, NULL, NULL, NULL, 1557975163, 1557975163),
('/pengaduan/delete', 2, NULL, NULL, NULL, 1557975163, 1557975163),
('/pengaduan/index', 2, NULL, NULL, NULL, 1557975163, 1557975163),
('/pengaduan/update', 2, NULL, NULL, NULL, 1557975163, 1557975163),
('/pengaduan/view', 2, NULL, NULL, NULL, 1557975163, 1557975163),
('/rbac/*', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/assignment/*', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/assignment/assign', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/assignment/index', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/assignment/revoke', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/assignment/view', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/default/*', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/default/index', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/menu/*', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/menu/create', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/menu/delete', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/menu/index', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/menu/update', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/menu/view', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/permission/*', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/permission/assign', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/permission/create', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/permission/delete', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/permission/index', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/permission/remove', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/permission/update', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/permission/view', 2, NULL, NULL, NULL, 1557152478, 1557152478),
('/rbac/role/*', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/role/assign', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/role/create', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/role/delete', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/role/index', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/role/remove', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/role/update', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/role/view', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/route/*', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/route/assign', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/route/create', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/route/index', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/route/refresh', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/route/remove', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/rule/*', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/rule/create', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/rule/delete', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/rule/index', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/rule/update', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/rule/view', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/*', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/activate', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/change-password', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/delete', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/index', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/login', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/logout', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/request-password-reset', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/reset-password', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/signup', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/rbac/user/view', 2, NULL, NULL, NULL, 1557152479, 1557152479),
('/site/*', 2, NULL, NULL, NULL, 1557152498, 1557152498),
('/site/image', 2, NULL, NULL, NULL, 1557152498, 1557152498),
('/site/index', 2, NULL, NULL, NULL, 1557152498, 1557152498),
('/user-kosan/*', 2, NULL, NULL, NULL, 1557975187, 1557975187),
('/user-kosan/bayar', 2, NULL, NULL, NULL, 1557975187, 1557975187),
('/user-kosan/create', 2, NULL, NULL, NULL, 1557975187, 1557975187),
('/user-kosan/delete', 2, NULL, NULL, NULL, 1557975187, 1557975187),
('/user-kosan/index', 2, NULL, NULL, NULL, 1557975187, 1557975187),
('/user-kosan/keluar-kosan', 2, NULL, NULL, NULL, 1557977326, 1557977326),
('/user-kosan/update', 2, NULL, NULL, NULL, 1557975187, 1557975187),
('/user-kosan/view', 2, NULL, NULL, NULL, 1557975187, 1557975187),
('/user/*', 2, NULL, NULL, NULL, 1557235832, 1557235832),
('/user/create', 2, NULL, NULL, NULL, 1557235832, 1557235832),
('/user/delete', 2, NULL, NULL, NULL, 1557235832, 1557235832),
('/user/index', 2, NULL, NULL, NULL, 1557235832, 1557235832),
('/user/update', 2, NULL, NULL, NULL, 1557235832, 1557235832),
('/user/view', 2, NULL, NULL, NULL, 1557235832, 1557235832),
('Admin', 1, 'Role Admin Tingkat Atas', NULL, NULL, 1557152527, 1557152527),
('User', 1, 'User yang nyewa kosan', NULL, NULL, 1557975023, 1557975023);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', '/cron-job/*'),
('Admin', '/cron-job/index'),
('Admin', '/pembayaran/*'),
('Admin', '/pembayaran/index'),
('Admin', '/pembayaran/konfirmasi'),
('User', '/dashboard/*'),
('User', '/dashboard/index'),
('User', '/dashboard/search'),
('Admin', '/gridview/*'),
('User', '/gridview/*'),
('Admin', '/gridview/export/*'),
('User', '/gridview/export/*'),
('Admin', '/gridview/export/download'),
('User', '/gridview/export/download'),
('User', '/keluar-kosan/*'),
('User', '/keluar-kosan/keluar-kosan'),
('Admin', '/kosan/*'),
('Admin', '/kosan/create'),
('Admin', '/kosan/delete'),
('Admin', '/kosan/index'),
('User', '/kosan/pilih'),
('Admin', '/kosan/update'),
('Admin', '/kosan/view'),
('Admin', '/pengaduan-admin/*'),
('Admin', '/pengaduan-admin/delete'),
('Admin', '/pengaduan-admin/index'),
('Admin', '/pengaduan-admin/update'),
('Admin', '/pengaduan-admin/view'),
('User', '/pengaduan/*'),
('User', '/pengaduan/create'),
('User', '/pengaduan/delete'),
('User', '/pengaduan/index'),
('User', '/pengaduan/update'),
('User', '/pengaduan/view'),
('Admin', '/rbac/*'),
('Admin', '/rbac/assignment/*'),
('Admin', '/rbac/assignment/assign'),
('Admin', '/rbac/assignment/index'),
('Admin', '/rbac/assignment/revoke'),
('Admin', '/rbac/assignment/view'),
('Admin', '/rbac/default/*'),
('Admin', '/rbac/default/index'),
('Admin', '/rbac/menu/*'),
('Admin', '/rbac/menu/create'),
('Admin', '/rbac/menu/delete'),
('Admin', '/rbac/menu/index'),
('Admin', '/rbac/menu/update'),
('Admin', '/rbac/menu/view'),
('Admin', '/rbac/permission/*'),
('Admin', '/rbac/permission/assign'),
('Admin', '/rbac/permission/create'),
('Admin', '/rbac/permission/delete'),
('Admin', '/rbac/permission/index'),
('Admin', '/rbac/permission/remove'),
('Admin', '/rbac/permission/update'),
('Admin', '/rbac/permission/view'),
('Admin', '/rbac/role/*'),
('Admin', '/rbac/role/assign'),
('Admin', '/rbac/role/create'),
('Admin', '/rbac/role/delete'),
('Admin', '/rbac/role/index'),
('Admin', '/rbac/role/remove'),
('Admin', '/rbac/role/update'),
('Admin', '/rbac/role/view'),
('Admin', '/rbac/route/*'),
('Admin', '/rbac/route/assign'),
('Admin', '/rbac/route/create'),
('Admin', '/rbac/route/index'),
('Admin', '/rbac/route/refresh'),
('Admin', '/rbac/route/remove'),
('Admin', '/rbac/rule/*'),
('Admin', '/rbac/rule/create'),
('Admin', '/rbac/rule/delete'),
('Admin', '/rbac/rule/index'),
('Admin', '/rbac/rule/update'),
('Admin', '/rbac/rule/view'),
('Admin', '/rbac/user/*'),
('Admin', '/rbac/user/activate'),
('Admin', '/rbac/user/change-password'),
('Admin', '/rbac/user/delete'),
('Admin', '/rbac/user/index'),
('Admin', '/rbac/user/login'),
('Admin', '/rbac/user/logout'),
('Admin', '/rbac/user/request-password-reset'),
('Admin', '/rbac/user/reset-password'),
('Admin', '/rbac/user/signup'),
('Admin', '/rbac/user/view'),
('Admin', '/site/*'),
('Admin', '/site/image'),
('Admin', '/site/index'),
('Admin', '/user-kosan/*'),
('User', '/user-kosan/*'),
('User', '/user-kosan/bayar'),
('Admin', '/user-kosan/create'),
('Admin', '/user-kosan/delete'),
('Admin', '/user-kosan/index'),
('User', '/user-kosan/keluar-kosan'),
('Admin', '/user-kosan/update'),
('Admin', '/user-kosan/view'),
('Admin', '/user/*'),
('Admin', '/user/create'),
('Admin', '/user/delete'),
('Admin', '/user/index'),
('Admin', '/user/update'),
('Admin', '/user/view');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cron_job`
--

CREATE TABLE `cron_job` (
  `id_cron_job` int(11) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `limit` int(11) DEFAULT NULL,
  `offset` int(11) DEFAULT NULL,
  `running` smallint(6) UNSIGNED NOT NULL,
  `success` smallint(6) UNSIGNED NOT NULL,
  `started_at` int(11) UNSIGNED DEFAULT NULL,
  `ended_at` int(11) UNSIGNED DEFAULT NULL,
  `last_execution_time` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cron_job`
--

INSERT INTO `cron_job` (`id_cron_job`, `controller`, `action`, `limit`, `offset`, `running`, `success`, `started_at`, `ended_at`, `last_execution_time`) VALUES
(1, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557841887, 1557841888, 0.0550029),
(2, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557842068, 1557843847, 0.070004),
(3, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557843890, 1557844121, 0.0510032),
(4, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557844159, 1557844160, 0.0930049),
(5, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557844179, 1557844179, 0.0990059),
(6, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557844212, 1557844212, 0.073004),
(7, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557844230, 1557844536, 0.0800052),
(8, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557844734, 1557845168, 0.0360019),
(9, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557845299, 1557886029, 0.0170012),
(10, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557886092, 1557886095, 3.78422),
(11, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557886290, 1557886293, 2.49914),
(12, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557886441, 1557886444, 3.4442),
(13, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557979885, 1557979885, 0.0680039),
(14, 'pemberitahuan', 'index', 0, 0, 0, 1, 1557979958, 1557979963, 5.50331),
(15, 'pemberitahuan', 'before', 0, 0, 0, 1, 1559211430, 1559211430, 0.0710042),
(16, 'pemberitahuan', 'warning', 0, 0, 0, 1, 1559211452, 1559211452, 0.0660038),
(17, 'pemberitahuan', 'tujuh-hari', 0, 0, 0, 1, 1559211528, 1559211528, 0.0530031),
(18, 'pemberitahuan', 'hari-ini', 0, 0, 0, 1, 1559211537, 1559211537, 0.047003),
(19, 'pemberitahuan', 'tujuh-hari', 0, 0, 1, 0, 1559211643, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kosan_id` int(11) NOT NULL,
  `komplain` text NOT NULL,
  `gambar_komplain` text NOT NULL,
  `status` enum('Diperbaiki','Belum Diperbaiki') NOT NULL,
  `tanggal_komplain` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kosan`
--

CREATE TABLE `kosan` (
  `id` int(11) NOT NULL,
  `nama_kosan` varchar(200) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `harga_perbulan` decimal(12,2) NOT NULL,
  `alamat_kosan` text NOT NULL,
  `pasilitas` text NOT NULL,
  `jenis_kosan` enum('Pria','Wanita','Campur') NOT NULL,
  `status` varchar(100) DEFAULT 'Tersedia',
  `gambar_kosan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kosan`
--

INSERT INTO `kosan` (`id`, `nama_kosan`, `jumlah_kamar`, `harga_perbulan`, `alamat_kosan`, `pasilitas`, `jenis_kosan`, `status`, `gambar_kosan`) VALUES
(2, 'Kosan Ibu Dia', 32, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(3, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(4, 'Kosan Ibu Dia', 33, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(5, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(6, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(7, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(8, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(9, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(10, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(11, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(12, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(13, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(14, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(15, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(16, 'Kosan Ibu Dia', 33, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(17, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(18, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(19, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(20, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(21, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(22, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(23, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(24, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(25, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(26, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(27, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(28, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(29, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(30, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(31, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png'),
(32, 'Kosan Ibu Dia', 34, '100000.00', 'Jl. Raya', 'AC', 'Pria', 'Tersedia', '31fff5a615114521b4fc56d6d04ab056eed513a6.png'),
(33, 'Kosan Kamu', 13, '130000.00', 'Jl. Dipatikukur', 'AC, WC, WIFI', 'Campur', 'Tersedia', 'ec517688265cf7968bc243e8a154f9f2aab8a862.png');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1556848765),
('m140506_102106_rbac_init', 1556848773),
('m150927_060316_cronjob_init', 1557841264),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1556848773),
('m180523_151638_rbac_updates_indexes_without_prefix', 1556848774);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kosan_id` int(11) NOT NULL,
  `jenis_pengaduan` varchar(255) NOT NULL,
  `keterangan_pengadu` text NOT NULL,
  `foto` text,
  `status` enum('Diperbaiki','Belum Diperbaiki') NOT NULL DEFAULT 'Belum Diperbaiki',
  `keterangan_teknisi` text,
  `tanggal_laporan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `user_id`, `kosan_id`, `jenis_pengaduan`, `keterangan_pengadu`, `foto`, `status`, `keterangan_teknisi`, `tanggal_laporan`) VALUES
(3, 11, 3, 'dwd', 'dswds', '0edf87bd3ece6415a398f4396e0843c6f0d45f26.png', 'Belum Diperbaiki', NULL, '2019-05-16 10:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` smallint(10) NOT NULL,
  `alamat` text NOT NULL,
  `poto_ktp` text,
  `tanggal_daftar` datetime NOT NULL,
  `status_kost` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `username`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `no_telepon`, `auth_key`, `password_hash`, `email`, `status`, `alamat`, `poto_ktp`, `tanggal_daftar`, `status_kost`) VALUES
(10, 'admin kosan', 'admin_kosan', 'Laki-laki', '2019-05-15', 'Bandung', '085645366455', 'Q_FYQ2-jQSXIzPbFvmZl_-dP5hPFbP96', '$2y$13$kQQM0GnbOVN6HYDzjnydyum0Evtje9y6htS0bZFSjpP4biVreVspK', 'admin@gmail.com', 10, 'Jl. Dipatiukur', 'bf1c3179deab701e87821a40a1e74c4bb0c2ee45.png', '2019-05-15 20:02:57', 0),
(11, 'Erwin Situmorang', 'erwin', 'Laki-laki', '2019-05-15', 'Bandung Barat', '098364544633', 'AYx5o-jalPKdfgIrwCMY9-bl-wPYQxLx', '$2y$13$45v8CirUYklAnNaMq8NcVuN60m17wtXeZj0c4wOM/s6fdplkA49fq', 'erwinlocalhost90@gmail.com', 10, 'Jl. Raya Batu Nunggal', 'b932d5479326e256ad0a0d845c4fc093a09f82f9.png', '2019-05-16 10:40:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_kosan`
--

CREATE TABLE `user_kosan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kosan_id` int(11) NOT NULL,
  `tgl_masuk_kos` date NOT NULL,
  `tgl_berakhir_kos` date NOT NULL,
  `status` enum('Tetap','Keluar') NOT NULL DEFAULT 'Tetap',
  `status_konfirmasi` enum('Dikonfirmasi','Belum Dikonfirmasi') NOT NULL DEFAULT 'Belum Dikonfirmasi',
  `status_bayar` enum('Dibayar','Belum Dibayar') NOT NULL DEFAULT 'Belum Dibayar',
  `periode_kosan` int(11) NOT NULL DEFAULT '1',
  `bukti_pembayaran` text,
  `status_cron_job` enum('Dieksekusi','Belum Dieksekusi') NOT NULL DEFAULT 'Dieksekusi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_kosan`
--

INSERT INTO `user_kosan` (`id`, `user_id`, `kosan_id`, `tgl_masuk_kos`, `tgl_berakhir_kos`, `status`, `status_konfirmasi`, `status_bayar`, `periode_kosan`, `bukti_pembayaran`, `status_cron_job`) VALUES
(8, 11, 2, '2019-05-01', '2019-06-01', 'Tetap', 'Belum Dikonfirmasi', 'Dibayar', 1, 'e21ffc4a204d5a9cfb1f9ee7ca7feab5cf307d1b.jpg', 'Dieksekusi'),
(9, 11, 2, '2019-06-01', '2019-05-23', 'Tetap', 'Belum Dikonfirmasi', 'Belum Dibayar', 2, NULL, 'Dieksekusi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `cron_job`
--
ALTER TABLE `cron_job`
  ADD PRIMARY KEY (`id_cron_job`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kosan_id` (`kosan_id`);

--
-- Indexes for table `kosan`
--
ALTER TABLE `kosan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_pengadu` (`user_id`),
  ADD KEY `kosan_pengadu` (`kosan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_kosan`
--
ALTER TABLE `user_kosan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `kosan` (`kosan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cron_job`
--
ALTER TABLE `cron_job`
  MODIFY `id_cron_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kosan`
--
ALTER TABLE `kosan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_kosan`
--
ALTER TABLE `user_kosan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komplain`
--
ALTER TABLE `komplain`
  ADD CONSTRAINT `kosan_id` FOREIGN KEY (`kosan_id`) REFERENCES `kosan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `kosan_pengadu` FOREIGN KEY (`kosan_id`) REFERENCES `kosan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_pengadu` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_kosan`
--
ALTER TABLE `user_kosan`
  ADD CONSTRAINT `kosan` FOREIGN KEY (`kosan_id`) REFERENCES `kosan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
