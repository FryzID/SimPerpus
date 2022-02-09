-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2022 pada 08.55
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simperpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin_utama', '1', 1644221221);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1643941608, 1643941608),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1643963724, 1643963724),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1644220779, 1644220779),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/default/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/default/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/menu/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/menu/create', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/menu/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/menu/update', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/menu/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/permission/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/permission/create', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/permission/get-users', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/permission/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/permission/update', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/permission/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/role/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/role/assign', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/role/create', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/role/delete', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/role/get-users', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/role/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/role/remove', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/role/update', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/role/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/route/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/route/assign', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/route/create', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/route/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/route/remove', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/rule/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/rule/create', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/rule/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/rule/update', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/rule/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/activate', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/delete', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/login', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/logout', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/signup', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/admin/user/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/buku/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/buku/create', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/buku/delete', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/buku/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/buku/update', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/buku/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/debug/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/debug/default/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/debug/default/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/debug/default/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/debug/user/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/gii/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/gii/default/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/gii/default/action', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/gii/default/diff', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/gii/default/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/gii/default/preview', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/gii/default/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/peminjaman/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/peminjaman/create', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/peminjaman/delete', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/peminjaman/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/peminjaman/update', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/peminjaman/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/rak/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/rak/create', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/rak/delete', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/rak/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/rak/update', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/rak/view', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/site/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/site/about', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/site/captcha', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/site/contact', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/site/error', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/site/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/site/login', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/site/logout', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/admin/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/admin/assignments', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/admin/block', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/admin/confirm', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/admin/create', 2, NULL, NULL, NULL, 1643940629, 1643940629),
('/user/admin/delete', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/admin/index', 2, NULL, NULL, NULL, 1643940613, 1643940613),
('/user/admin/info', 2, NULL, NULL, NULL, 1643940629, 1643940629),
('/user/admin/resend-password', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/admin/switch', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/admin/update', 2, NULL, NULL, NULL, 1643940611, 1643940611),
('/user/admin/update-profile', 2, NULL, NULL, NULL, 1643940629, 1643940629),
('/user/profile/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/profile/index', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/profile/show', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/recovery/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/recovery/request', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/recovery/reset', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/registration/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/registration/confirm', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/registration/connect', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/registration/register', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/registration/resend', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/security/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/security/auth', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/security/login', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/security/logout', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/settings/*', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/settings/account', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/settings/confirm', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/settings/delete', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/settings/disconnect', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/settings/networks', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('/user/settings/profile', 2, NULL, NULL, NULL, 1643940630, 1643940630),
('Admin_utama', 1, NULL, NULL, NULL, 1643939077, 1644221188),
('Pustakawan', 1, NULL, NULL, NULL, 1644220704, 1644220968),
('User', 1, NULL, NULL, NULL, 1644220821, 1644220958);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin_utama', '/*'),
('Admin_utama', '/admin/*'),
('Admin_utama', '/admin/assignment/*'),
('Admin_utama', '/admin/assignment/assign'),
('Admin_utama', '/admin/assignment/index'),
('Admin_utama', '/admin/assignment/revoke'),
('Admin_utama', '/admin/assignment/view'),
('Admin_utama', '/admin/default/*'),
('Admin_utama', '/admin/default/index'),
('Admin_utama', '/admin/menu/*'),
('Admin_utama', '/admin/menu/create'),
('Admin_utama', '/admin/menu/delete'),
('Admin_utama', '/admin/menu/index'),
('Admin_utama', '/admin/menu/update'),
('Admin_utama', '/admin/menu/view'),
('Admin_utama', '/admin/permission/*'),
('Admin_utama', '/admin/permission/assign'),
('Admin_utama', '/admin/permission/create'),
('Admin_utama', '/admin/permission/delete'),
('Admin_utama', '/admin/permission/get-users'),
('Admin_utama', '/admin/permission/index'),
('Admin_utama', '/admin/permission/remove'),
('Admin_utama', '/admin/permission/update'),
('Admin_utama', '/admin/permission/view'),
('Admin_utama', '/admin/role/*'),
('Admin_utama', '/admin/role/assign'),
('Admin_utama', '/admin/role/create'),
('Admin_utama', '/admin/role/delete'),
('Admin_utama', '/admin/role/get-users'),
('Admin_utama', '/admin/role/index'),
('Admin_utama', '/admin/role/remove'),
('Admin_utama', '/admin/role/update'),
('Admin_utama', '/admin/role/view'),
('Admin_utama', '/admin/route/*'),
('Admin_utama', '/admin/route/assign'),
('Admin_utama', '/admin/route/create'),
('Admin_utama', '/admin/route/index'),
('Admin_utama', '/admin/route/refresh'),
('Admin_utama', '/admin/route/remove'),
('Admin_utama', '/admin/rule/*'),
('Admin_utama', '/admin/rule/create'),
('Admin_utama', '/admin/rule/delete'),
('Admin_utama', '/admin/rule/index'),
('Admin_utama', '/admin/rule/update'),
('Admin_utama', '/admin/rule/view'),
('Admin_utama', '/admin/user/*'),
('Admin_utama', '/admin/user/activate'),
('Admin_utama', '/admin/user/change-password'),
('Admin_utama', '/admin/user/delete'),
('Admin_utama', '/admin/user/index'),
('Admin_utama', '/admin/user/login'),
('Admin_utama', '/admin/user/logout'),
('Admin_utama', '/admin/user/request-password-reset'),
('Admin_utama', '/admin/user/reset-password'),
('Admin_utama', '/admin/user/signup'),
('Admin_utama', '/admin/user/view'),
('Admin_utama', '/buku/*'),
('Admin_utama', '/buku/create'),
('Admin_utama', '/buku/delete'),
('Admin_utama', '/buku/index'),
('Admin_utama', '/buku/update'),
('Admin_utama', '/buku/view'),
('Admin_utama', '/debug/*'),
('Admin_utama', '/debug/default/*'),
('Admin_utama', '/debug/default/db-explain'),
('Admin_utama', '/debug/default/download-mail'),
('Admin_utama', '/debug/default/index'),
('Admin_utama', '/debug/default/toolbar'),
('Admin_utama', '/debug/default/view'),
('Admin_utama', '/debug/user/*'),
('Admin_utama', '/debug/user/reset-identity'),
('Admin_utama', '/debug/user/set-identity'),
('Admin_utama', '/gii/*'),
('Admin_utama', '/gii/default/*'),
('Admin_utama', '/gii/default/action'),
('Admin_utama', '/gii/default/diff'),
('Admin_utama', '/gii/default/index'),
('Admin_utama', '/gii/default/preview'),
('Admin_utama', '/gii/default/view'),
('Admin_utama', '/peminjaman/*'),
('Admin_utama', '/peminjaman/create'),
('Admin_utama', '/peminjaman/delete'),
('Admin_utama', '/peminjaman/index'),
('Admin_utama', '/peminjaman/update'),
('Admin_utama', '/peminjaman/view'),
('Admin_utama', '/rak/*'),
('Admin_utama', '/rak/create'),
('Admin_utama', '/rak/delete'),
('Admin_utama', '/rak/index'),
('Admin_utama', '/rak/update'),
('Admin_utama', '/rak/view'),
('Admin_utama', '/site/*'),
('Admin_utama', '/site/about'),
('Admin_utama', '/site/captcha'),
('Admin_utama', '/site/contact'),
('Admin_utama', '/site/error'),
('Admin_utama', '/site/index'),
('Admin_utama', '/site/login'),
('Admin_utama', '/site/logout'),
('Admin_utama', '/user/*'),
('Admin_utama', '/user/admin/*'),
('Admin_utama', '/user/admin/assignments'),
('Admin_utama', '/user/admin/block'),
('Admin_utama', '/user/admin/confirm'),
('Admin_utama', '/user/admin/create'),
('Admin_utama', '/user/admin/delete'),
('Admin_utama', '/user/admin/index'),
('Admin_utama', '/user/admin/info'),
('Admin_utama', '/user/admin/resend-password'),
('Admin_utama', '/user/admin/switch'),
('Admin_utama', '/user/admin/update'),
('Admin_utama', '/user/admin/update-profile'),
('Admin_utama', '/user/profile/*'),
('Admin_utama', '/user/profile/index'),
('Admin_utama', '/user/profile/show'),
('Admin_utama', '/user/recovery/*'),
('Admin_utama', '/user/recovery/request'),
('Admin_utama', '/user/recovery/reset'),
('Admin_utama', '/user/registration/*'),
('Admin_utama', '/user/registration/confirm'),
('Admin_utama', '/user/registration/connect'),
('Admin_utama', '/user/registration/register'),
('Admin_utama', '/user/registration/resend'),
('Admin_utama', '/user/security/*'),
('Admin_utama', '/user/security/auth'),
('Admin_utama', '/user/security/login'),
('Admin_utama', '/user/security/logout'),
('Admin_utama', '/user/settings/*'),
('Admin_utama', '/user/settings/account'),
('Admin_utama', '/user/settings/confirm'),
('Admin_utama', '/user/settings/delete'),
('Admin_utama', '/user/settings/disconnect'),
('Admin_utama', '/user/settings/networks'),
('Admin_utama', '/user/settings/profile'),
('Pustakawan', '/buku/*'),
('Pustakawan', '/buku/create'),
('Pustakawan', '/buku/delete'),
('Pustakawan', '/buku/index'),
('Pustakawan', '/buku/update'),
('Pustakawan', '/buku/view'),
('Pustakawan', '/peminjaman/*'),
('Pustakawan', '/peminjaman/create'),
('Pustakawan', '/peminjaman/delete'),
('Pustakawan', '/peminjaman/index'),
('Pustakawan', '/peminjaman/update'),
('Pustakawan', '/peminjaman/view'),
('Pustakawan', '/rak/*'),
('Pustakawan', '/rak/create'),
('Pustakawan', '/rak/delete'),
('Pustakawan', '/rak/index'),
('Pustakawan', '/rak/update'),
('Pustakawan', '/rak/view'),
('Pustakawan', '/site/*'),
('Pustakawan', '/site/about'),
('Pustakawan', '/site/captcha'),
('Pustakawan', '/site/contact'),
('Pustakawan', '/site/error'),
('Pustakawan', '/site/index'),
('Pustakawan', '/site/login'),
('Pustakawan', '/site/logout'),
('Pustakawan', '/user/admin/confirm'),
('Pustakawan', '/user/admin/index'),
('Pustakawan', '/user/admin/info'),
('Pustakawan', '/user/registration/*'),
('Pustakawan', '/user/registration/confirm'),
('Pustakawan', '/user/registration/connect'),
('Pustakawan', '/user/registration/register'),
('Pustakawan', '/user/registration/resend'),
('Pustakawan', '/user/security/*'),
('Pustakawan', '/user/security/auth'),
('Pustakawan', '/user/security/login'),
('Pustakawan', '/user/security/logout'),
('User', '/buku/index'),
('User', '/buku/view'),
('User', '/peminjaman/index'),
('User', '/peminjaman/view'),
('User', '/rak/index'),
('User', '/rak/view'),
('User', '/site/*'),
('User', '/site/about'),
('User', '/site/captcha'),
('User', '/site/contact'),
('User', '/site/error'),
('User', '/site/index'),
('User', '/site/login'),
('User', '/site/logout'),
('User', '/user/profile/*'),
('User', '/user/profile/index'),
('User', '/user/profile/show'),
('User', '/user/recovery/request'),
('User', '/user/security/login'),
('User', '/user/security/logout');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(45) NOT NULL,
  `gambar_buku` varchar(65) NOT NULL,
  `pengarang` varchar(45) NOT NULL,
  `penerbit` varchar(45) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `id_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `gambar_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `id_rak`) VALUES
(1, 'Bintang', '', 'Sutrisno', '', 2022, 1),
(2, 'LOOP', '', 'Kiko', 'Jamjung', 1977, 1),
(3, 'Bintang', '', 'Sumanto', 'Jamjung', 1977, 1),
(4, 'Bintang', 'gambar.jpg', 'Sumanto', 'Jamjung', 1977, 1),
(5, 'LOOP', 'gambar.jpg', 'Sutrisno', 'sa', 2012, 1),
(6, 'Bintang', 'gambar.jpg', 'Kiko', 'sa', 2013, 1),
(28, 'Bintang', '.jpg', 'Sutrisno', 'Jamjung', 1986, 1),
(35, 'Pelangi', 'JWfWl5jzv533.jpg', 'sa', 'sa', 1987, 1),
(37, 'Kola', 'HOIYGnjw6w0y.jpg', 'Kiko', 'sa', 1987, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1643595668),
('m140209_132017_init', 1643766655),
('m140403_174025_create_account_table', 1643766655),
('m140504_113157_update_tables', 1643766656),
('m140504_130429_create_token_table', 1643766656),
('m140506_102106_rbac_init', 1643772315),
('m140602_111327_create_menu_table', 1644286139),
('m140830_171933_fix_ip_field', 1643766656),
('m140830_172703_change_account_table_name', 1643766656),
('m141222_110026_update_ip_field', 1643766656),
('m141222_135246_alter_username_length', 1643766656),
('m150614_103145_update_social_account_table', 1643766656),
('m150623_212711_fix_username_notnull', 1643766657),
('m151218_234654_add_timezone_to_profile', 1643766657),
('m160312_050000_create_user', 1644286139),
('m160929_103127_add_last_login_at_to_user_table', 1643766657),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1643772316),
('m180523_151638_rbac_updates_indexes_without_prefix', 1643772316),
('m200409_110543_rbac_update_mssql_trigger', 1643772316);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_rak`, `id_buku`, `id_admin`, `tanggal_peminjaman`) VALUES
(1, 0, 1, 1, '0000-00-00'),
(2, 0, 1, 1, '0000-00-00'),
(3, 0, 1, 1, '2022-02-04'),
(4, 0, 1, 1, '2022-02-04'),
(5, 0, 1, 2, '2022-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id` int(11) NOT NULL,
  `nama_rak` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id`, `nama_rak`) VALUES
(1, '1A'),
(2, '1B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'q5aelwoO6qLrBXHMYZ1rd7mkHO4VyaNY', 1643767124, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$fTCiic7GxMWdXMyWCNvJhuAxfVDnHBSBgnbTrn333aRCv7oxXW8dG', '3nWeaOzrAe17WOJEA2NMn98qhAbDTr34', 1643767335, NULL, NULL, '::1', 1643767124, 1643767124, 0, 1644289678),
(2, 'user', 'user123@gmail.com', '$2y$10$bFmObGmDx3sraatMXAlD/OtEAH63QQDcnOgblCWwiLP8cY7qLaxXq', '9sebypdCtpFq2CAGHSeJgShfJnFqaTE6', 1643875916, NULL, NULL, '::1', 1643875916, 1643875916, 0, NULL),
(3, 'fauzi', 'fauzi@gmail.com', '$2y$10$kxUCVd39U8vOU9yMrOFliedbcO7KWjjU6ytuxPKqkHynCJIhmRJ1a', 'c_SuKw60y72jQ0VYnpnF_bkOoZR5Mu-1', 1643875949, NULL, NULL, '::1', 1643875949, 1643875949, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indeks untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indeks untuk tabel `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_ibfk_1` (`id_rak`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_ibfk_1` (`id_buku`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
