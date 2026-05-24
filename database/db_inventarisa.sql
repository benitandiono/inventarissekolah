-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Feb 2026 pada 07.57
-- Versi server: 8.0.30
-- Versi PHP: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint UNSIGNED NOT NULL,
  `log_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `batch_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(186, 'default', 'created', 'App\\Models\\Jenis', 'created', 30, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":30,\"jenis_barang\":\"Pengharum Ruangan\",\"user_id\":1,\"created_at\":\"2026-02-12T02:33:32.000000Z\",\"updated_at\":\"2026-02-12T02:33:32.000000Z\"}}', NULL, '2026-02-12 02:33:32', '2026-02-12 02:33:32'),
(187, 'default', 'created', 'App\\Models\\Satuan', 'created', 31, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":31,\"created_at\":\"2026-02-12T02:35:00.000000Z\",\"updated_at\":\"2026-02-12T02:35:00.000000Z\",\"satuan\":\"Pieces \\/ Buah\",\"user_id\":1}}', NULL, '2026-02-12 02:35:00', '2026-02-12 02:35:00'),
(188, 'default', 'created', 'App\\Models\\Barang', 'created', 44, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":44,\"created_at\":\"2026-02-12T02:36:28.000000Z\",\"updated_at\":\"2026-02-12T02:36:28.000000Z\",\"kode_barang\":\"BRG-76841\",\"nama_barang\":\"Stella\",\"deskripsi\":\"Stella\\/Pengahaurm Ruangan\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 09.32.10.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":30,\"satuan_id\":31}}', NULL, '2026-02-12 02:36:28', '2026-02-12 02:36:28'),
(189, 'default', 'created', 'App\\Models\\Jenis', 'created', 31, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":31,\"jenis_barang\":\"Barang Habis Pakai\",\"user_id\":1,\"created_at\":\"2026-02-12T02:38:38.000000Z\",\"updated_at\":\"2026-02-12T02:38:38.000000Z\"}}', NULL, '2026-02-12 02:38:38', '2026-02-12 02:38:38'),
(190, 'default', 'created', 'App\\Models\\Barang', 'created', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":45,\"created_at\":\"2026-02-12T02:39:08.000000Z\",\"updated_at\":\"2026-02-12T02:39:08.000000Z\",\"kode_barang\":\"BRG-26980\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"deskripsi\":\"Tissu\\/Merk Nice\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 09.32.10.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":31}}', NULL, '2026-02-12 02:39:08', '2026-02-12 02:39:08'),
(191, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T02:39:22.000000Z\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 09.32.10 (1).jpeg\"},\"old\":{\"updated_at\":\"2026-02-12T02:39:08.000000Z\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 09.32.10.jpeg\"}}', NULL, '2026-02-12 02:39:22', '2026-02-12 02:39:22'),
(192, 'default', 'created', 'App\\Models\\Barang', 'created', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":46,\"created_at\":\"2026-02-12T02:40:25.000000Z\",\"updated_at\":\"2026-02-12T02:40:25.000000Z\",\"kode_barang\":\"BRG-07818\",\"nama_barang\":\"Plastik Sampah\\/Kresek\",\"deskripsi\":\"Plastik Sampah\\/Kresek\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 09.32.11.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":31}}', NULL, '2026-02-12 02:40:25', '2026-02-12 02:40:25'),
(193, 'default', 'created', 'App\\Models\\Satuan', 'created', 32, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":32,\"created_at\":\"2026-02-12T02:43:04.000000Z\",\"updated_at\":\"2026-02-12T02:43:04.000000Z\",\"satuan\":\"Tabung\",\"user_id\":1}}', NULL, '2026-02-12 02:43:04', '2026-02-12 02:43:04'),
(194, 'default', 'created', 'App\\Models\\Barang', 'created', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":47,\"created_at\":\"2026-02-12T02:44:31.000000Z\",\"updated_at\":\"2026-02-12T02:44:31.000000Z\",\"kode_barang\":\"BRG-22096\",\"nama_barang\":\"Gas Elpiji 5 Kg\",\"deskripsi\":\"Gas Elpiji 5 Kg\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 09.32.11 (1).jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":32}}', NULL, '2026-02-12 02:44:31', '2026-02-12 02:44:31'),
(195, 'default', 'created', 'App\\Models\\Barang', 'created', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":48,\"created_at\":\"2026-02-12T02:46:50.000000Z\",\"updated_at\":\"2026-02-12T02:46:50.000000Z\",\"kode_barang\":\"BRG-64132\",\"nama_barang\":\"Stella\",\"deskripsi\":\"Stella\\/Pengaharum Ruangan\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 09.32.10.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":30,\"satuan_id\":31}}', NULL, '2026-02-12 02:46:50', '2026-02-12 02:46:50'),
(196, 'default', 'created', 'App\\Models\\Satuan', 'created', 33, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":33,\"created_at\":\"2026-02-12T02:50:41.000000Z\",\"updated_at\":\"2026-02-12T02:50:41.000000Z\",\"satuan\":\"Jerigen\",\"user_id\":1}}', NULL, '2026-02-12 02:50:41', '2026-02-12 02:50:41'),
(197, 'default', 'created', 'App\\Models\\Barang', 'created', 49, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":49,\"created_at\":\"2026-02-12T02:51:15.000000Z\",\"updated_at\":\"2026-02-12T02:51:15.000000Z\",\"kode_barang\":\"BRG-43878\",\"nama_barang\":\"SOS\\/Clenso\",\"deskripsi\":\"SOS\\/Clenso\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 09.32.11 (2).jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":30,\"satuan_id\":33}}', NULL, '2026-02-12 02:51:15', '2026-02-12 02:51:15'),
(198, 'default', 'created', 'App\\Models\\Jenis', 'created', 32, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":32,\"jenis_barang\":\"Alat Tulis Kantor\",\"user_id\":1,\"created_at\":\"2026-02-12T02:54:14.000000Z\",\"updated_at\":\"2026-02-12T02:54:14.000000Z\"}}', NULL, '2026-02-12 02:54:14', '2026-02-12 02:54:14'),
(199, 'default', 'created', 'App\\Models\\Satuan', 'created', 34, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":34,\"created_at\":\"2026-02-12T02:54:27.000000Z\",\"updated_at\":\"2026-02-12T02:54:27.000000Z\",\"satuan\":\"RIM\",\"user_id\":1}}', NULL, '2026-02-12 02:54:27', '2026-02-12 02:54:27'),
(200, 'default', 'created', 'App\\Models\\Barang', 'created', 50, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":50,\"created_at\":\"2026-02-12T02:55:08.000000Z\",\"updated_at\":\"2026-02-12T02:55:08.000000Z\",\"kode_barang\":\"BRG-48863\",\"nama_barang\":\"Kertas HVS\",\"deskripsi\":\"Kertas HVS A4\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 09.53.02.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":32,\"satuan_id\":34}}', NULL, '2026-02-12 02:55:08', '2026-02-12 02:55:08'),
(201, 'default', 'created', 'App\\Models\\Satuan', 'created', 35, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":35,\"created_at\":\"2026-02-12T02:57:57.000000Z\",\"updated_at\":\"2026-02-12T02:57:57.000000Z\",\"satuan\":\"Kotak\",\"user_id\":1}}', NULL, '2026-02-12 02:57:57', '2026-02-12 02:57:57'),
(202, 'default', 'created', 'App\\Models\\Barang', 'created', 51, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":51,\"created_at\":\"2026-02-12T02:58:35.000000Z\",\"updated_at\":\"2026-02-12T02:58:35.000000Z\",\"kode_barang\":\"BRG-59145\",\"nama_barang\":\"Pena\",\"deskripsi\":\"Pena Kenko\",\"gambar\":\"gambar-barang\\/download.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":32,\"satuan_id\":35}}', NULL, '2026-02-12 02:58:35', '2026-02-12 02:58:35'),
(203, 'default', 'created', 'App\\Models\\Barang', 'created', 52, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":52,\"created_at\":\"2026-02-12T03:07:25.000000Z\",\"updated_at\":\"2026-02-12T03:07:25.000000Z\",\"kode_barang\":\"BRG-89623\",\"nama_barang\":\"Yoeker\\/Trigonal Clips\",\"deskripsi\":\"Yoeker\\/Trigonal Clips\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 10.06.13.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":32,\"satuan_id\":35}}', NULL, '2026-02-12 03:07:25', '2026-02-12 03:07:25'),
(204, 'default', 'created', 'App\\Models\\Satuan', 'created', 36, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":36,\"created_at\":\"2026-02-12T03:08:52.000000Z\",\"updated_at\":\"2026-02-12T03:08:52.000000Z\",\"satuan\":\"ROLL\",\"user_id\":1}}', NULL, '2026-02-12 03:08:52', '2026-02-12 03:08:52'),
(205, 'default', 'created', 'App\\Models\\Barang', 'created', 53, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":53,\"created_at\":\"2026-02-12T03:09:25.000000Z\",\"updated_at\":\"2026-02-12T03:09:25.000000Z\",\"kode_barang\":\"BRG-25113\",\"nama_barang\":\"Lakban\",\"deskripsi\":\"Lakban Hitam\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 10.06.14.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":36}}', NULL, '2026-02-12 03:09:25', '2026-02-12 03:09:25'),
(206, 'default', 'created', 'App\\Models\\Barang', 'created', 54, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":54,\"created_at\":\"2026-02-12T03:10:16.000000Z\",\"updated_at\":\"2026-02-12T03:10:16.000000Z\",\"kode_barang\":\"BRG-92202\",\"nama_barang\":\"Paperline\\/Amplop\",\"deskripsi\":\"Paperline\\/Amplop\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 10.06.15.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":31}}', NULL, '2026-02-12 03:10:16', '2026-02-12 03:10:16'),
(207, 'default', 'created', 'App\\Models\\Barang', 'created', 55, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":55,\"created_at\":\"2026-02-12T04:08:53.000000Z\",\"updated_at\":\"2026-02-12T04:08:53.000000Z\",\"kode_barang\":\"BRG-01981\",\"nama_barang\":\"Refil Ink\",\"deskripsi\":\"Refil Ink\\/Isi Tinta\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 10.06.16.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":31}}', NULL, '2026-02-12 04:08:53', '2026-02-12 04:08:53'),
(208, 'default', 'created', 'App\\Models\\Barang', 'created', 56, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":56,\"created_at\":\"2026-02-12T04:10:05.000000Z\",\"updated_at\":\"2026-02-12T04:10:05.000000Z\",\"kode_barang\":\"BRG-05700\",\"nama_barang\":\"Snowman\\/Boardmarker\",\"deskripsi\":\"Snowman\\/Boardmarker ( Spidol )\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 10.06.17.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":35}}', NULL, '2026-02-12 04:10:05', '2026-02-12 04:10:05'),
(209, 'default', 'created', 'App\\Models\\Barang', 'created', 57, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":57,\"created_at\":\"2026-02-12T04:15:57.000000Z\",\"updated_at\":\"2026-02-12T04:15:57.000000Z\",\"kode_barang\":\"BRG-34794\",\"nama_barang\":\"Glue Stick\",\"deskripsi\":\"Glue Stick\\/Lem Kertas\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 11.14.44.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":32,\"satuan_id\":31}}', NULL, '2026-02-12 04:15:57', '2026-02-12 04:15:57'),
(210, 'default', 'created', 'App\\Models\\Barang', 'created', 58, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":58,\"created_at\":\"2026-02-12T04:16:57.000000Z\",\"updated_at\":\"2026-02-12T04:16:57.000000Z\",\"kode_barang\":\"BRG-73998\",\"nama_barang\":\"Binder Clips\",\"deskripsi\":\"Binder Clips\\/Penjepit Kertas\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 11.14.44 (1).jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":32,\"satuan_id\":35}}', NULL, '2026-02-12 04:16:57', '2026-02-12 04:16:57'),
(211, 'default', 'created', 'App\\Models\\Barang', 'created', 59, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":59,\"created_at\":\"2026-02-12T04:17:51.000000Z\",\"updated_at\":\"2026-02-12T04:17:51.000000Z\",\"kode_barang\":\"BRG-30804\",\"nama_barang\":\"Eveready\\/Batre\",\"deskripsi\":\"Eveready\\/Batre\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 11.14.45.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":31}}', NULL, '2026-02-12 04:17:51', '2026-02-12 04:17:51'),
(212, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 55, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk HP\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Tata Usaha\\/Laras\"}}', NULL, '2026-02-12 04:26:22', '2026-02-12 04:26:22'),
(213, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 56, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop HP Merk HP\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Tata Usaha\\/Maria\"}}', NULL, '2026-02-12 04:27:39', '2026-02-12 04:27:39'),
(214, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 57, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk HP\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Ruang Humas\\/ Nur Arifah\"}}', NULL, '2026-02-12 04:28:26', '2026-02-12 04:28:26'),
(215, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 58, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk HP\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Ruang Kurikulum\\/Lisbeth Evadesy Pardede\"}}', NULL, '2026-02-12 04:29:23', '2026-02-12 04:29:23'),
(216, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 59, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk HP\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Ruang Sapras\\/Rita Suryani\"}}', NULL, '2026-02-12 04:30:10', '2026-02-12 04:30:10'),
(217, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 60, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk  HP\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Kesiswaan\\/Rini Ramadhani\"}}', NULL, '2026-02-12 04:30:45', '2026-02-12 04:30:45'),
(218, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 61, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk Zyrex\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Tata Usaha\\/Operator Dapodik\"}}', NULL, '2026-02-12 04:31:50', '2026-02-12 04:31:50'),
(219, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 62, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Printer Merk Brother DCP-T310\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Tata Usaha\\/Operator Dapodik\"}}', NULL, '2026-02-12 04:32:42', '2026-02-12 04:32:42'),
(220, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 63, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Asus Vivobook\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Tata Usaha\\/Operator Dapodik\"}}', NULL, '2026-02-12 04:33:17', '2026-02-12 04:33:17'),
(221, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 60, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk  HP A1\"},\"old\":{\"nama_aset\":\"Laptop Merk  HP\"}}', NULL, '2026-02-12 04:39:56', '2026-02-12 04:39:56'),
(222, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 59, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk HP A2\"},\"old\":{\"nama_aset\":\"Laptop Merk HP\"}}', NULL, '2026-02-12 04:40:05', '2026-02-12 04:40:05'),
(223, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 58, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk HP A3\"},\"old\":{\"nama_aset\":\"Laptop Merk HP\"}}', NULL, '2026-02-12 04:40:18', '2026-02-12 04:40:18'),
(224, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 57, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk HP A4\"},\"old\":{\"nama_aset\":\"Laptop Merk HP\"}}', NULL, '2026-02-12 04:40:29', '2026-02-12 04:40:29'),
(225, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 56, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop HP Merk HP A5\"},\"old\":{\"nama_aset\":\"Laptop HP Merk HP\"}}', NULL, '2026-02-12 04:40:39', '2026-02-12 04:40:39'),
(226, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 55, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Laptop Merk HP A6\"},\"old\":{\"nama_aset\":\"Laptop Merk HP\"}}', NULL, '2026-02-12 04:40:55', '2026-02-12 04:40:55'),
(227, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 63, 'App\\Models\\User', 1, '{\"attributes\":{\"jumlah\":2},\"old\":{\"jumlah\":1}}', NULL, '2026-02-12 04:42:21', '2026-02-12 04:42:21'),
(228, 'default', 'created', 'App\\Models\\Supplier', 'created', 23, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":23,\"supplier\":\"CV Maju Bersama\",\"alamat\":\"Saya\",\"user_id\":1,\"created_at\":\"2026-02-12T05:35:03.000000Z\",\"updated_at\":\"2026-02-12T05:35:03.000000Z\"}}', NULL, '2026-02-12 05:35:03', '2026-02-12 05:35:03'),
(229, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 44, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":44,\"kode_transaksi\":\"TRX-IN-2026-2-12-5232\",\"tanggal_masuk\":\"2026-02-12\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_masuk\":1,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-12T05:35:18.000000Z\",\"updated_at\":\"2026-02-12T05:35:18.000000Z\"}}', NULL, '2026-02-12 05:35:18', '2026-02-12 05:35:18'),
(230, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T05:35:18.000000Z\",\"stok\":1},\"old\":{\"updated_at\":\"2026-02-12T02:39:22.000000Z\",\"stok\":0}}', NULL, '2026-02-12 05:35:18', '2026-02-12 05:35:18'),
(231, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":45,\"kode_transaksi\":\"TRX-IN-2026-2-12-9643\",\"tanggal_masuk\":\"2026-02-12\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_masuk\":2,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-12T05:42:59.000000Z\",\"updated_at\":\"2026-02-12T05:42:59.000000Z\"}}', NULL, '2026-02-12 05:42:59', '2026-02-12 05:42:59'),
(232, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T05:42:59.000000Z\",\"stok\":3},\"old\":{\"updated_at\":\"2026-02-12T05:35:18.000000Z\",\"stok\":1}}', NULL, '2026-02-12 05:42:59', '2026-02-12 05:42:59'),
(233, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 63, 'App\\Models\\User', 1, '{\"attributes\":{\"jumlah\":1},\"old\":{\"jumlah\":2}}', NULL, '2026-02-12 05:54:13', '2026-02-12 05:54:13'),
(234, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 63, 'App\\Models\\User', 1, '{\"attributes\":{\"jumlah\":2},\"old\":{\"jumlah\":1}}', NULL, '2026-02-12 07:42:08', '2026-02-12 07:42:08'),
(235, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 64, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"aa\",\"jumlah\":3,\"kondisi\":\"Baik\",\"lokasi\":\"we\"}}', NULL, '2026-02-12 07:42:27', '2026-02-12 07:42:27'),
(236, 'aset', 'aset deleted', 'App\\Models\\Aset', 'deleted', 64, 'App\\Models\\User', 1, '{\"old\":{\"nama_aset\":\"aa\",\"jumlah\":3,\"kondisi\":\"Baik\",\"lokasi\":\"we\"}}', NULL, '2026-02-12 07:42:59', '2026-02-12 07:42:59'),
(237, 'default', 'created', 'App\\Models\\Jenis', 'created', 33, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":33,\"jenis_barang\":\"Alat Tulis\",\"user_id\":1,\"created_at\":\"2026-02-12T07:43:13.000000Z\",\"updated_at\":\"2026-02-12T07:43:13.000000Z\"}}', NULL, '2026-02-12 07:43:13', '2026-02-12 07:43:13'),
(238, 'default', 'deleted', 'App\\Models\\Jenis', 'deleted', 33, 'App\\Models\\User', 1, '{\"old\":{\"id\":33,\"jenis_barang\":\"Alat Tulis\",\"user_id\":1,\"created_at\":\"2026-02-12T07:43:13.000000Z\",\"updated_at\":\"2026-02-12T07:43:13.000000Z\"}}', NULL, '2026-02-12 07:43:18', '2026-02-12 07:43:18'),
(239, 'default', 'created', 'App\\Models\\Satuan', 'created', 37, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":37,\"created_at\":\"2026-02-12T07:43:31.000000Z\",\"updated_at\":\"2026-02-12T07:43:31.000000Z\",\"satuan\":\"UNITT\",\"user_id\":1}}', NULL, '2026-02-12 07:43:31', '2026-02-12 07:43:31'),
(240, 'default', 'updated', 'App\\Models\\Satuan', 'updated', 37, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T07:43:41.000000Z\",\"satuan\":\"UNIT\"},\"old\":{\"updated_at\":\"2026-02-12T07:43:31.000000Z\",\"satuan\":\"UNITT\"}}', NULL, '2026-02-12 07:43:41', '2026-02-12 07:43:41'),
(241, 'default', 'deleted', 'App\\Models\\Satuan', 'deleted', 37, 'App\\Models\\User', 1, '{\"old\":{\"id\":37,\"created_at\":\"2026-02-12T07:43:31.000000Z\",\"updated_at\":\"2026-02-12T07:43:41.000000Z\",\"satuan\":\"UNIT\",\"user_id\":1}}', NULL, '2026-02-12 07:43:45', '2026-02-12 07:43:45'),
(242, 'default', 'created', 'App\\Models\\Barang', 'created', 60, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":60,\"created_at\":\"2026-02-12T07:44:15.000000Z\",\"updated_at\":\"2026-02-12T07:44:15.000000Z\",\"kode_barang\":\"BRG-15434\",\"nama_barang\":\"LAPTOP C\",\"deskripsi\":\"er\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 11.25.09 (2).jpeg\",\"stok_minimum\":2,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":33}}', NULL, '2026-02-12 07:44:15', '2026-02-12 07:44:15'),
(243, 'default', 'updated', 'App\\Models\\Barang', 'updated', 60, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T07:44:36.000000Z\",\"deskripsi\":\"we\"},\"old\":{\"updated_at\":\"2026-02-12T07:44:15.000000Z\",\"deskripsi\":\"er\"}}', NULL, '2026-02-12 07:44:36', '2026-02-12 07:44:36'),
(244, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 60, 'App\\Models\\User', 1, '{\"old\":{\"id\":60,\"created_at\":\"2026-02-12T07:44:15.000000Z\",\"updated_at\":\"2026-02-12T07:44:36.000000Z\",\"kode_barang\":\"BRG-15434\",\"nama_barang\":\"LAPTOP C\",\"deskripsi\":\"we\",\"gambar\":\"gambar-barang\\/WhatsApp Image 2026-02-12 at 11.25.09 (2).jpeg\",\"stok_minimum\":2,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":33}}', NULL, '2026-02-12 07:44:45', '2026-02-12 07:44:45'),
(245, 'default', 'created', 'App\\Models\\Customer', 'created', 21, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":21,\"customer\":\"Beni\",\"alamat\":\"Tendik\",\"user_id\":1,\"created_at\":\"2026-02-12T08:04:05.000000Z\",\"updated_at\":\"2026-02-12T08:04:05.000000Z\"}}', NULL, '2026-02-12 08:04:05', '2026-02-12 08:04:05'),
(246, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 20, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":20,\"kode_transaksi\":\"TRX-OUT-2026-2-12-9945\",\"tanggal_keluar\":\"2026-02-12\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_keluar\":1,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-12T08:04:20.000000Z\",\"updated_at\":\"2026-02-12T08:04:20.000000Z\"}}', NULL, '2026-02-12 08:04:20', '2026-02-12 08:04:20'),
(247, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T08:04:20.000000Z\",\"stok\":2},\"old\":{\"updated_at\":\"2026-02-12T05:42:59.000000Z\",\"stok\":3}}', NULL, '2026-02-12 08:04:20', '2026-02-12 08:04:20'),
(248, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 65, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Testing\",\"jumlah\":1,\"kondisi\":\"Rusak Berat\",\"lokasi\":\"s\"}}', NULL, '2026-02-12 15:42:35', '2026-02-12 15:42:35'),
(249, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 65, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Oke bisa\"},\"old\":{\"nama_aset\":\"Testing\"}}', NULL, '2026-02-12 15:42:46', '2026-02-12 15:42:46'),
(250, 'aset', 'aset deleted', 'App\\Models\\Aset', 'deleted', 65, 'App\\Models\\User', 1, '{\"old\":{\"nama_aset\":\"Oke bisa\",\"jumlah\":1,\"kondisi\":\"Rusak Berat\",\"lokasi\":\"s\"}}', NULL, '2026-02-12 15:43:05', '2026-02-12 15:43:05'),
(251, 'default', 'created', 'App\\Models\\Jenis', 'created', 34, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":34,\"jenis_barang\":\"a\",\"user_id\":1,\"created_at\":\"2026-02-12T15:45:49.000000Z\",\"updated_at\":\"2026-02-12T15:45:49.000000Z\"}}', NULL, '2026-02-12 15:45:49', '2026-02-12 15:45:49'),
(252, 'default', 'updated', 'App\\Models\\Jenis', 'updated', 34, 'App\\Models\\User', 1, '{\"attributes\":{\"jenis_barang\":\"QQ\",\"updated_at\":\"2026-02-12T15:45:56.000000Z\"},\"old\":{\"jenis_barang\":\"a\",\"updated_at\":\"2026-02-12T15:45:49.000000Z\"}}', NULL, '2026-02-12 15:45:56', '2026-02-12 15:45:56'),
(253, 'default', 'deleted', 'App\\Models\\Jenis', 'deleted', 34, 'App\\Models\\User', 1, '{\"old\":{\"id\":34,\"jenis_barang\":\"QQ\",\"user_id\":1,\"created_at\":\"2026-02-12T15:45:49.000000Z\",\"updated_at\":\"2026-02-12T15:45:56.000000Z\"}}', NULL, '2026-02-12 15:45:59', '2026-02-12 15:45:59'),
(254, 'default', 'created', 'App\\Models\\Satuan', 'created', 38, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":38,\"created_at\":\"2026-02-12T15:46:11.000000Z\",\"updated_at\":\"2026-02-12T15:46:11.000000Z\",\"satuan\":\"AA\",\"user_id\":1}}', NULL, '2026-02-12 15:46:11', '2026-02-12 15:46:11'),
(255, 'default', 'updated', 'App\\Models\\Satuan', 'updated', 38, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T15:46:19.000000Z\",\"satuan\":\"AAA\"},\"old\":{\"updated_at\":\"2026-02-12T15:46:11.000000Z\",\"satuan\":\"AA\"}}', NULL, '2026-02-12 15:46:19', '2026-02-12 15:46:19'),
(256, 'default', 'deleted', 'App\\Models\\Satuan', 'deleted', 38, 'App\\Models\\User', 1, '{\"old\":{\"id\":38,\"created_at\":\"2026-02-12T15:46:11.000000Z\",\"updated_at\":\"2026-02-12T15:46:19.000000Z\",\"satuan\":\"AAA\",\"user_id\":1}}', NULL, '2026-02-12 15:46:22', '2026-02-12 15:46:22'),
(257, 'default', 'created', 'App\\Models\\Barang', 'created', 61, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":61,\"created_at\":\"2026-02-12T15:46:45.000000Z\",\"updated_at\":\"2026-02-12T15:46:45.000000Z\",\"kode_barang\":\"BRG-93498\",\"nama_barang\":\"SS\",\"deskripsi\":\"S\",\"gambar\":\"gambar-barang\\/17411730827480.jpg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":1,\"jenis_id\":30,\"satuan_id\":32}}', NULL, '2026-02-12 15:46:45', '2026-02-12 15:46:45'),
(258, 'default', 'updated', 'App\\Models\\Barang', 'updated', 61, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T15:47:13.000000Z\",\"nama_barang\":\"DD\"},\"old\":{\"updated_at\":\"2026-02-12T15:46:45.000000Z\",\"nama_barang\":\"SS\"}}', NULL, '2026-02-12 15:47:13', '2026-02-12 15:47:13'),
(259, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 61, 'App\\Models\\User', 1, '{\"old\":{\"id\":61,\"created_at\":\"2026-02-12T15:46:45.000000Z\",\"updated_at\":\"2026-02-12T15:47:13.000000Z\",\"kode_barang\":\"BRG-93498\",\"nama_barang\":\"DD\",\"deskripsi\":\"S\",\"gambar\":\"gambar-barang\\/17411730827480.jpg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":1,\"jenis_id\":30,\"satuan_id\":32}}', NULL, '2026-02-12 15:47:17', '2026-02-12 15:47:17'),
(260, 'default', 'created', 'App\\Models\\Supplier', 'created', 24, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":24,\"supplier\":\"DF\",\"alamat\":\"SD\",\"user_id\":1,\"created_at\":\"2026-02-12T15:47:30.000000Z\",\"updated_at\":\"2026-02-12T15:47:30.000000Z\"}}', NULL, '2026-02-12 15:47:30', '2026-02-12 15:47:30'),
(261, 'default', 'updated', 'App\\Models\\Supplier', 'updated', 24, 'App\\Models\\User', 1, '{\"attributes\":{\"alamat\":\"12\",\"updated_at\":\"2026-02-12T15:47:39.000000Z\"},\"old\":{\"alamat\":\"SD\",\"updated_at\":\"2026-02-12T15:47:30.000000Z\"}}', NULL, '2026-02-12 15:47:39', '2026-02-12 15:47:39'),
(262, 'default', 'deleted', 'App\\Models\\Supplier', 'deleted', 24, 'App\\Models\\User', 1, '{\"old\":{\"id\":24,\"supplier\":\"DF\",\"alamat\":\"12\",\"user_id\":1,\"created_at\":\"2026-02-12T15:47:30.000000Z\",\"updated_at\":\"2026-02-12T15:47:39.000000Z\"}}', NULL, '2026-02-12 15:47:44', '2026-02-12 15:47:44'),
(263, 'default', 'created', 'App\\Models\\Customer', 'created', 22, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":22,\"customer\":\"ASS\",\"alamat\":\"SSS\",\"user_id\":1,\"created_at\":\"2026-02-12T15:47:58.000000Z\",\"updated_at\":\"2026-02-12T15:47:58.000000Z\"}}', NULL, '2026-02-12 15:47:58', '2026-02-12 15:47:58'),
(264, 'default', 'updated', 'App\\Models\\Customer', 'updated', 22, 'App\\Models\\User', 1, '{\"attributes\":{\"alamat\":\"AS\",\"updated_at\":\"2026-02-12T15:48:04.000000Z\"},\"old\":{\"alamat\":\"SSS\",\"updated_at\":\"2026-02-12T15:47:58.000000Z\"}}', NULL, '2026-02-12 15:48:04', '2026-02-12 15:48:04'),
(265, 'default', 'deleted', 'App\\Models\\Customer', 'deleted', 22, 'App\\Models\\User', 1, '{\"old\":{\"id\":22,\"customer\":\"ASS\",\"alamat\":\"AS\",\"user_id\":1,\"created_at\":\"2026-02-12T15:47:58.000000Z\",\"updated_at\":\"2026-02-12T15:48:04.000000Z\"}}', NULL, '2026-02-12 15:48:08', '2026-02-12 15:48:08'),
(266, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":46,\"kode_transaksi\":\"TRX-IN-2026-2-12-7583\",\"tanggal_masuk\":\"2026-02-12\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_masuk\":1,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-12T15:48:22.000000Z\",\"updated_at\":\"2026-02-12T15:48:22.000000Z\"}}', NULL, '2026-02-12 15:48:22', '2026-02-12 15:48:22'),
(267, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T15:48:22.000000Z\",\"stok\":3},\"old\":{\"updated_at\":\"2026-02-12T08:04:20.000000Z\",\"stok\":2}}', NULL, '2026-02-12 15:48:22', '2026-02-12 15:48:22'),
(268, 'default', 'deleted', 'App\\Models\\BarangMasuk', 'deleted', 46, 'App\\Models\\User', 1, '{\"old\":{\"id\":46,\"kode_transaksi\":\"TRX-IN-2026-2-12-7583\",\"tanggal_masuk\":\"2026-02-12\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_masuk\":1,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-12T15:48:22.000000Z\",\"updated_at\":\"2026-02-12T15:48:22.000000Z\"}}', NULL, '2026-02-12 15:48:30', '2026-02-12 15:48:30'),
(269, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T15:48:30.000000Z\",\"stok\":2},\"old\":{\"updated_at\":\"2026-02-12T15:48:22.000000Z\",\"stok\":3}}', NULL, '2026-02-12 15:48:30', '2026-02-12 15:48:30'),
(270, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 21, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":21,\"kode_transaksi\":\"TRX-OUT-2026-2-12-3153\",\"tanggal_keluar\":\"2026-02-12\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_keluar\":1,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-12T15:48:58.000000Z\",\"updated_at\":\"2026-02-12T15:48:58.000000Z\"}}', NULL, '2026-02-12 15:48:58', '2026-02-12 15:48:58'),
(271, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T15:48:58.000000Z\",\"stok\":1},\"old\":{\"updated_at\":\"2026-02-12T15:48:30.000000Z\",\"stok\":2}}', NULL, '2026-02-12 15:48:58', '2026-02-12 15:48:58'),
(272, 'default', 'deleted', 'App\\Models\\BarangKeluar', 'deleted', 21, 'App\\Models\\User', 1, '{\"old\":{\"id\":21,\"kode_transaksi\":\"TRX-OUT-2026-2-12-3153\",\"tanggal_keluar\":\"2026-02-12\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_keluar\":1,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-12T15:48:58.000000Z\",\"updated_at\":\"2026-02-12T15:48:58.000000Z\"}}', NULL, '2026-02-12 15:49:01', '2026-02-12 15:49:01'),
(273, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-12T15:49:01.000000Z\",\"stok\":2},\"old\":{\"updated_at\":\"2026-02-12T15:48:58.000000Z\",\"stok\":1}}', NULL, '2026-02-12 15:49:01', '2026-02-12 15:49:01'),
(274, 'default', 'updated', 'App\\Models\\Satuan', 'updated', 31, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T03:35:35.000000Z\",\"satuan\":\"Pieces \\/ Buah z\"},\"old\":{\"updated_at\":\"2026-02-12T02:35:00.000000Z\",\"satuan\":\"Pieces \\/ Buah\"}}', NULL, '2026-02-13 03:35:36', '2026-02-13 03:35:36'),
(275, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 66, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Proyektor\\/Infocus\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Ruang Sapras\\/Ritas Suryani\"}}', NULL, '2026-02-13 04:45:19', '2026-02-13 04:45:19'),
(276, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 67, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"SmartTV\\/IFP Panel\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Ruang Rapat\\/Ops\"}}', NULL, '2026-02-13 04:46:59', '2026-02-13 04:46:59'),
(277, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 68, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Kipas Angin\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Ruang Rapat\"}}', NULL, '2026-02-13 04:48:14', '2026-02-13 04:48:14'),
(278, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":47,\"kode_transaksi\":\"TRX-IN-2026-2-13-1480\",\"tanggal_masuk\":\"2025-01-13\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_masuk\":8,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:50:29.000000Z\",\"updated_at\":\"2026-02-13T04:50:29.000000Z\"}}', NULL, '2026-02-13 04:50:29', '2026-02-13 04:50:29'),
(279, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:50:29.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-02-12T15:49:01.000000Z\",\"stok\":2}}', NULL, '2026-02-13 04:50:29', '2026-02-13 04:50:29'),
(280, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":48,\"kode_transaksi\":\"TRX-IN-2026-2-13-2220\",\"tanggal_masuk\":\"2025-02-13\",\"nama_barang\":\"Plastik Sampah\\/Kresek\",\"jumlah_masuk\":10,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:51:03.000000Z\",\"updated_at\":\"2026-02-13T04:51:03.000000Z\"}}', NULL, '2026-02-13 04:51:03', '2026-02-13 04:51:03'),
(281, 'default', 'updated', 'App\\Models\\Barang', 'updated', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:51:03.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-02-12T02:40:25.000000Z\",\"stok\":0}}', NULL, '2026-02-13 04:51:03', '2026-02-13 04:51:03'),
(282, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 49, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":49,\"kode_transaksi\":\"TRX-IN-2026-2-13-1462\",\"tanggal_masuk\":\"2025-03-13\",\"nama_barang\":\"Gas Elpiji 5 Kg\",\"jumlah_masuk\":10,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:51:16.000000Z\",\"updated_at\":\"2026-02-13T04:51:16.000000Z\"}}', NULL, '2026-02-13 04:51:16', '2026-02-13 04:51:16'),
(283, 'default', 'updated', 'App\\Models\\Barang', 'updated', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:51:16.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-02-12T02:44:31.000000Z\",\"stok\":0}}', NULL, '2026-02-13 04:51:16', '2026-02-13 04:51:16'),
(284, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 50, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":50,\"kode_transaksi\":\"TRX-IN-2026-2-13-8358\",\"tanggal_masuk\":\"2025-04-13\",\"nama_barang\":\"Stella\",\"jumlah_masuk\":10,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:51:33.000000Z\",\"updated_at\":\"2026-02-13T04:51:33.000000Z\"}}', NULL, '2026-02-13 04:51:33', '2026-02-13 04:51:33'),
(285, 'default', 'updated', 'App\\Models\\Barang', 'updated', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:51:33.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-02-12T02:46:50.000000Z\",\"stok\":0}}', NULL, '2026-02-13 04:51:33', '2026-02-13 04:51:33'),
(286, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 51, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":51,\"kode_transaksi\":\"TRX-IN-2026-2-13-8728\",\"tanggal_masuk\":\"2025-05-13\",\"nama_barang\":\"null\",\"jumlah_masuk\":10,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:51:45.000000Z\",\"updated_at\":\"2026-02-13T04:51:45.000000Z\"}}', NULL, '2026-02-13 04:51:45', '2026-02-13 04:51:45'),
(287, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 52, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":52,\"kode_transaksi\":\"TRX-IN-2026-2-13-5580\",\"tanggal_masuk\":\"2025-06-13\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_masuk\":5,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:53:13.000000Z\",\"updated_at\":\"2026-02-13T04:53:13.000000Z\"}}', NULL, '2026-02-13 04:53:13', '2026-02-13 04:53:13'),
(288, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:53:13.000000Z\",\"stok\":15},\"old\":{\"updated_at\":\"2026-02-13T04:50:29.000000Z\",\"stok\":10}}', NULL, '2026-02-13 04:53:13', '2026-02-13 04:53:13'),
(289, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 53, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":53,\"kode_transaksi\":\"TRX-IN-2026-2-13-3171\",\"tanggal_masuk\":\"2025-07-13\",\"nama_barang\":\"Plastik Sampah\\/Kresek\",\"jumlah_masuk\":5,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:53:24.000000Z\",\"updated_at\":\"2026-02-13T04:53:24.000000Z\"}}', NULL, '2026-02-13 04:53:24', '2026-02-13 04:53:24'),
(290, 'default', 'updated', 'App\\Models\\Barang', 'updated', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:53:24.000000Z\",\"stok\":15},\"old\":{\"updated_at\":\"2026-02-13T04:51:03.000000Z\",\"stok\":10}}', NULL, '2026-02-13 04:53:24', '2026-02-13 04:53:24'),
(291, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 54, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":54,\"kode_transaksi\":\"TRX-IN-2026-2-13-3399\",\"tanggal_masuk\":\"2025-08-13\",\"nama_barang\":\"Gas Elpiji 5 Kg\",\"jumlah_masuk\":5,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:53:36.000000Z\",\"updated_at\":\"2026-02-13T04:53:36.000000Z\"}}', NULL, '2026-02-13 04:53:36', '2026-02-13 04:53:36'),
(292, 'default', 'updated', 'App\\Models\\Barang', 'updated', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:53:36.000000Z\",\"stok\":15},\"old\":{\"updated_at\":\"2026-02-13T04:51:16.000000Z\",\"stok\":10}}', NULL, '2026-02-13 04:53:36', '2026-02-13 04:53:36'),
(293, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 55, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":55,\"kode_transaksi\":\"TRX-IN-2026-2-13-7607\",\"tanggal_masuk\":\"2025-09-13\",\"nama_barang\":\"Stella\",\"jumlah_masuk\":5,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:53:48.000000Z\",\"updated_at\":\"2026-02-13T04:53:48.000000Z\"}}', NULL, '2026-02-13 04:53:48', '2026-02-13 04:53:48'),
(294, 'default', 'updated', 'App\\Models\\Barang', 'updated', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:53:48.000000Z\",\"stok\":15},\"old\":{\"updated_at\":\"2026-02-13T04:51:33.000000Z\",\"stok\":10}}', NULL, '2026-02-13 04:53:48', '2026-02-13 04:53:48'),
(295, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 56, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":56,\"kode_transaksi\":\"TRX-IN-2026-2-13-6902\",\"tanggal_masuk\":\"2025-10-13\",\"nama_barang\":\"Gas Elpiji 5 Kg\",\"jumlah_masuk\":5,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:54:00.000000Z\",\"updated_at\":\"2026-02-13T04:54:00.000000Z\"}}', NULL, '2026-02-13 04:54:00', '2026-02-13 04:54:00'),
(296, 'default', 'updated', 'App\\Models\\Barang', 'updated', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:54:00.000000Z\",\"stok\":20},\"old\":{\"updated_at\":\"2026-02-13T04:53:36.000000Z\",\"stok\":15}}', NULL, '2026-02-13 04:54:00', '2026-02-13 04:54:00'),
(297, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 57, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":57,\"kode_transaksi\":\"TRX-IN-2026-2-13-6745\",\"tanggal_masuk\":\"2025-11-13\",\"nama_barang\":\"Plastik Sampah\\/Kresek\",\"jumlah_masuk\":5,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:54:12.000000Z\",\"updated_at\":\"2026-02-13T04:54:12.000000Z\"}}', NULL, '2026-02-13 04:54:12', '2026-02-13 04:54:12'),
(298, 'default', 'updated', 'App\\Models\\Barang', 'updated', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:54:12.000000Z\",\"stok\":20},\"old\":{\"updated_at\":\"2026-02-13T04:53:24.000000Z\",\"stok\":15}}', NULL, '2026-02-13 04:54:12', '2026-02-13 04:54:12'),
(299, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 58, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":58,\"kode_transaksi\":\"TRX-IN-2026-2-13-7008\",\"tanggal_masuk\":\"2025-12-13\",\"nama_barang\":\"Plastik Sampah\\/Kresek\",\"jumlah_masuk\":5,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:54:24.000000Z\",\"updated_at\":\"2026-02-13T04:54:24.000000Z\"}}', NULL, '2026-02-13 04:54:24', '2026-02-13 04:54:24'),
(300, 'default', 'updated', 'App\\Models\\Barang', 'updated', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:54:25.000000Z\",\"stok\":25},\"old\":{\"updated_at\":\"2026-02-13T04:54:12.000000Z\",\"stok\":20}}', NULL, '2026-02-13 04:54:25', '2026-02-13 04:54:25'),
(301, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 59, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":59,\"kode_transaksi\":\"TRX-IN-2026-2-13-3316\",\"tanggal_masuk\":\"2026-01-13\",\"nama_barang\":\"Gas Elpiji 5 Kg\",\"jumlah_masuk\":5,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T04:54:40.000000Z\",\"updated_at\":\"2026-02-13T04:54:40.000000Z\"}}', NULL, '2026-02-13 04:54:40', '2026-02-13 04:54:40'),
(302, 'default', 'updated', 'App\\Models\\Barang', 'updated', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:54:40.000000Z\",\"stok\":25},\"old\":{\"updated_at\":\"2026-02-13T04:54:00.000000Z\",\"stok\":20}}', NULL, '2026-02-13 04:54:40', '2026-02-13 04:54:40'),
(303, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 22, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":22,\"kode_transaksi\":\"TRX-OUT-2026-2-13-6402\",\"tanggal_keluar\":\"2025-01-13\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_keluar\":5,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:55:23.000000Z\",\"updated_at\":\"2026-02-13T04:55:23.000000Z\"}}', NULL, '2026-02-13 04:55:23', '2026-02-13 04:55:23'),
(304, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:55:23.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-02-13T04:53:13.000000Z\",\"stok\":15}}', NULL, '2026-02-13 04:55:23', '2026-02-13 04:55:23'),
(305, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 23, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":23,\"kode_transaksi\":\"TRX-OUT-2026-2-13-6206\",\"tanggal_keluar\":\"2025-02-13\",\"nama_barang\":\"Plastik Sampah\\/Kresek\",\"jumlah_keluar\":5,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:55:35.000000Z\",\"updated_at\":\"2026-02-13T04:55:35.000000Z\"}}', NULL, '2026-02-13 04:55:35', '2026-02-13 04:55:35'),
(306, 'default', 'updated', 'App\\Models\\Barang', 'updated', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:55:35.000000Z\",\"stok\":20},\"old\":{\"updated_at\":\"2026-02-13T04:54:25.000000Z\",\"stok\":25}}', NULL, '2026-02-13 04:55:35', '2026-02-13 04:55:35'),
(307, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 24, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":24,\"kode_transaksi\":\"TRX-OUT-2026-2-13-1929\",\"tanggal_keluar\":\"2025-03-13\",\"nama_barang\":\"Stella\",\"jumlah_keluar\":5,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:55:46.000000Z\",\"updated_at\":\"2026-02-13T04:55:46.000000Z\"}}', NULL, '2026-02-13 04:55:46', '2026-02-13 04:55:46'),
(308, 'default', 'updated', 'App\\Models\\Barang', 'updated', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:55:46.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-02-13T04:53:48.000000Z\",\"stok\":15}}', NULL, '2026-02-13 04:55:46', '2026-02-13 04:55:46'),
(309, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 25, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":25,\"kode_transaksi\":\"TRX-OUT-2026-2-13-4208\",\"tanggal_keluar\":\"2025-04-13\",\"nama_barang\":\"Stella\",\"jumlah_keluar\":2,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:55:56.000000Z\",\"updated_at\":\"2026-02-13T04:55:56.000000Z\"}}', NULL, '2026-02-13 04:55:57', '2026-02-13 04:55:57'),
(310, 'default', 'updated', 'App\\Models\\Barang', 'updated', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:55:57.000000Z\",\"stok\":8},\"old\":{\"updated_at\":\"2026-02-13T04:55:46.000000Z\",\"stok\":10}}', NULL, '2026-02-13 04:55:57', '2026-02-13 04:55:57'),
(311, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 26, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":26,\"kode_transaksi\":\"TRX-OUT-2026-2-13-8330\",\"tanggal_keluar\":\"2025-05-13\",\"nama_barang\":\"Gas Elpiji 5 Kg\",\"jumlah_keluar\":5,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:56:09.000000Z\",\"updated_at\":\"2026-02-13T04:56:09.000000Z\"}}', NULL, '2026-02-13 04:56:09', '2026-02-13 04:56:09'),
(312, 'default', 'updated', 'App\\Models\\Barang', 'updated', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:56:09.000000Z\",\"stok\":20},\"old\":{\"updated_at\":\"2026-02-13T04:54:40.000000Z\",\"stok\":25}}', NULL, '2026-02-13 04:56:09', '2026-02-13 04:56:09'),
(313, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 27, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":27,\"kode_transaksi\":\"TRX-OUT-2026-2-13-1342\",\"tanggal_keluar\":\"2025-06-13\",\"nama_barang\":\"Plastik Sampah\\/Kresek\",\"jumlah_keluar\":4,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:56:20.000000Z\",\"updated_at\":\"2026-02-13T04:56:20.000000Z\"}}', NULL, '2026-02-13 04:56:20', '2026-02-13 04:56:20'),
(314, 'default', 'updated', 'App\\Models\\Barang', 'updated', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:56:20.000000Z\",\"stok\":16},\"old\":{\"updated_at\":\"2026-02-13T04:55:35.000000Z\",\"stok\":20}}', NULL, '2026-02-13 04:56:20', '2026-02-13 04:56:20'),
(315, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 28, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":28,\"kode_transaksi\":\"TRX-OUT-2026-2-13-3473\",\"tanggal_keluar\":\"2025-07-13\",\"nama_barang\":\"Stella\",\"jumlah_keluar\":2,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:56:30.000000Z\",\"updated_at\":\"2026-02-13T04:56:30.000000Z\"}}', NULL, '2026-02-13 04:56:31', '2026-02-13 04:56:31'),
(316, 'default', 'updated', 'App\\Models\\Barang', 'updated', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:56:31.000000Z\",\"stok\":6},\"old\":{\"updated_at\":\"2026-02-13T04:55:57.000000Z\",\"stok\":8}}', NULL, '2026-02-13 04:56:31', '2026-02-13 04:56:31'),
(317, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 29, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":29,\"kode_transaksi\":\"TRX-OUT-2026-2-13-3136\",\"tanggal_keluar\":\"2025-08-13\",\"nama_barang\":\"Plastik Sampah\\/Kresek\",\"jumlah_keluar\":6,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:56:41.000000Z\",\"updated_at\":\"2026-02-13T04:56:41.000000Z\"}}', NULL, '2026-02-13 04:56:41', '2026-02-13 04:56:41'),
(318, 'default', 'updated', 'App\\Models\\Barang', 'updated', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:56:41.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-02-13T04:56:20.000000Z\",\"stok\":16}}', NULL, '2026-02-13 04:56:41', '2026-02-13 04:56:41'),
(319, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 30, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":30,\"kode_transaksi\":\"TRX-OUT-2026-2-13-8603\",\"tanggal_keluar\":\"2025-09-13\",\"nama_barang\":\"Plastik Sampah\\/Kresek\",\"jumlah_keluar\":5,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:56:53.000000Z\",\"updated_at\":\"2026-02-13T04:56:53.000000Z\"}}', NULL, '2026-02-13 04:56:53', '2026-02-13 04:56:53'),
(320, 'default', 'updated', 'App\\Models\\Barang', 'updated', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:56:53.000000Z\",\"stok\":5},\"old\":{\"updated_at\":\"2026-02-13T04:56:41.000000Z\",\"stok\":10}}', NULL, '2026-02-13 04:56:53', '2026-02-13 04:56:53'),
(321, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 31, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":31,\"kode_transaksi\":\"TRX-OUT-2026-2-13-6113\",\"tanggal_keluar\":\"2025-10-13\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_keluar\":6,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:57:04.000000Z\",\"updated_at\":\"2026-02-13T04:57:04.000000Z\"}}', NULL, '2026-02-13 04:57:04', '2026-02-13 04:57:04'),
(322, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:57:04.000000Z\",\"stok\":4},\"old\":{\"updated_at\":\"2026-02-13T04:55:23.000000Z\",\"stok\":10}}', NULL, '2026-02-13 04:57:04', '2026-02-13 04:57:04'),
(323, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 32, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":32,\"kode_transaksi\":\"TRX-OUT-2026-2-13-4389\",\"tanggal_keluar\":\"2025-11-13\",\"nama_barang\":\"Gas Elpiji 5 Kg\",\"jumlah_keluar\":5,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:57:17.000000Z\",\"updated_at\":\"2026-02-13T04:57:17.000000Z\"}}', NULL, '2026-02-13 04:57:17', '2026-02-13 04:57:17'),
(324, 'default', 'updated', 'App\\Models\\Barang', 'updated', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:57:17.000000Z\",\"stok\":15},\"old\":{\"updated_at\":\"2026-02-13T04:56:09.000000Z\",\"stok\":20}}', NULL, '2026-02-13 04:57:17', '2026-02-13 04:57:17'),
(325, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 33, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":33,\"kode_transaksi\":\"TRX-OUT-2026-2-13-9532\",\"tanggal_keluar\":\"2025-12-13\",\"nama_barang\":\"Gas Elpiji 5 Kg\",\"jumlah_keluar\":5,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:57:35.000000Z\",\"updated_at\":\"2026-02-13T04:57:35.000000Z\"}}', NULL, '2026-02-13 04:57:35', '2026-02-13 04:57:35');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(326, 'default', 'updated', 'App\\Models\\Barang', 'updated', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:57:35.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-02-13T04:57:17.000000Z\",\"stok\":15}}', NULL, '2026-02-13 04:57:35', '2026-02-13 04:57:35'),
(327, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 34, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":34,\"kode_transaksi\":\"TRX-OUT-2026-2-13-2382\",\"tanggal_keluar\":\"2026-01-13\",\"nama_barang\":\"Gas Elpiji 5 Kg\",\"jumlah_keluar\":7,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T04:57:52.000000Z\",\"updated_at\":\"2026-02-13T04:57:52.000000Z\"}}', NULL, '2026-02-13 04:57:52', '2026-02-13 04:57:52'),
(328, 'default', 'updated', 'App\\Models\\Barang', 'updated', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T04:57:52.000000Z\",\"stok\":3},\"old\":{\"updated_at\":\"2026-02-13T04:57:35.000000Z\",\"stok\":10}}', NULL, '2026-02-13 04:57:52', '2026-02-13 04:57:52'),
(329, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 69, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Meja\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Ruangan 1\"}}', NULL, '2026-02-13 05:00:46', '2026-02-13 05:00:46'),
(330, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 70, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Kursi\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Ruangan 2\"}}', NULL, '2026-02-13 05:01:23', '2026-02-13 05:01:23'),
(331, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 71, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Mouse\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Labkom\"}}', NULL, '2026-02-13 05:01:48', '2026-02-13 05:01:48'),
(332, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 70, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"Kursi r\"},\"old\":{\"nama_aset\":\"Kursi\"}}', NULL, '2026-02-13 07:25:10', '2026-02-13 07:25:10'),
(333, 'aset', 'aset deleted', 'App\\Models\\Aset', 'deleted', 70, 'App\\Models\\User', 1, '{\"old\":{\"nama_aset\":\"Kursi r\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Ruangan 2\"}}', NULL, '2026-02-13 07:25:17', '2026-02-13 07:25:17'),
(334, 'aset', 'aset deleted', 'App\\Models\\Aset', 'deleted', 71, 'App\\Models\\User', 1, '{\"old\":{\"nama_aset\":\"Mouse\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"Labkom\"}}', NULL, '2026-02-13 07:25:27', '2026-02-13 07:25:27'),
(335, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 72, 'App\\Models\\User', 1, '{\"attributes\":{\"nama_aset\":\"a\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"ww\"}}', NULL, '2026-02-13 07:25:49', '2026-02-13 07:25:49'),
(336, 'aset', 'aset deleted', 'App\\Models\\Aset', 'deleted', 72, 'App\\Models\\User', 1, '{\"old\":{\"nama_aset\":\"a\",\"jumlah\":1,\"kondisi\":\"Baik\",\"lokasi\":\"ww\"}}', NULL, '2026-02-13 07:25:53', '2026-02-13 07:25:53'),
(337, 'default', 'created', 'App\\Models\\Jenis', 'created', 35, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":35,\"jenis_barang\":\"q\",\"user_id\":1,\"created_at\":\"2026-02-13T07:27:07.000000Z\",\"updated_at\":\"2026-02-13T07:27:07.000000Z\"}}', NULL, '2026-02-13 07:27:07', '2026-02-13 07:27:07'),
(338, 'default', 'updated', 'App\\Models\\Jenis', 'updated', 35, 'App\\Models\\User', 1, '{\"attributes\":{\"jenis_barang\":\"1\",\"updated_at\":\"2026-02-13T07:27:14.000000Z\"},\"old\":{\"jenis_barang\":\"q\",\"updated_at\":\"2026-02-13T07:27:07.000000Z\"}}', NULL, '2026-02-13 07:27:14', '2026-02-13 07:27:14'),
(339, 'default', 'deleted', 'App\\Models\\Jenis', 'deleted', 35, 'App\\Models\\User', 1, '{\"old\":{\"id\":35,\"jenis_barang\":\"1\",\"user_id\":1,\"created_at\":\"2026-02-13T07:27:07.000000Z\",\"updated_at\":\"2026-02-13T07:27:14.000000Z\"}}', NULL, '2026-02-13 07:27:22', '2026-02-13 07:27:22'),
(340, 'default', 'updated', 'App\\Models\\Satuan', 'updated', 31, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T07:27:41.000000Z\",\"satuan\":\"Pieces \\/ Buah\"},\"old\":{\"updated_at\":\"2026-02-13T03:35:35.000000Z\",\"satuan\":\"Pieces \\/ Buah z\"}}', NULL, '2026-02-13 07:27:41', '2026-02-13 07:27:41'),
(341, 'default', 'created', 'App\\Models\\Satuan', 'created', 39, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":39,\"created_at\":\"2026-02-13T07:27:48.000000Z\",\"updated_at\":\"2026-02-13T07:27:48.000000Z\",\"satuan\":\"ww\",\"user_id\":1}}', NULL, '2026-02-13 07:27:48', '2026-02-13 07:27:48'),
(342, 'default', 'deleted', 'App\\Models\\Satuan', 'deleted', 39, 'App\\Models\\User', 1, '{\"old\":{\"id\":39,\"created_at\":\"2026-02-13T07:27:48.000000Z\",\"updated_at\":\"2026-02-13T07:27:48.000000Z\",\"satuan\":\"ww\",\"user_id\":1}}', NULL, '2026-02-13 07:27:53', '2026-02-13 07:27:53'),
(343, 'default', 'created', 'App\\Models\\Barang', 'created', 62, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":62,\"created_at\":\"2026-02-13T07:28:31.000000Z\",\"updated_at\":\"2026-02-13T07:28:31.000000Z\",\"kode_barang\":\"BRG-56967\",\"nama_barang\":\"Printer\",\"deskripsi\":\"2\",\"gambar\":\"gambar-barang\\/download (3).jpeg\",\"stok_minimum\":2,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":31}}', NULL, '2026-02-13 07:28:31', '2026-02-13 07:28:31'),
(344, 'default', 'updated', 'App\\Models\\Barang', 'updated', 62, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T07:28:49.000000Z\",\"nama_barang\":\"Printer vv\"},\"old\":{\"updated_at\":\"2026-02-13T07:28:31.000000Z\",\"nama_barang\":\"Printer\"}}', NULL, '2026-02-13 07:28:49', '2026-02-13 07:28:49'),
(345, 'default', 'deleted', 'App\\Models\\Barang', 'deleted', 62, 'App\\Models\\User', 1, '{\"old\":{\"id\":62,\"created_at\":\"2026-02-13T07:28:31.000000Z\",\"updated_at\":\"2026-02-13T07:28:49.000000Z\",\"kode_barang\":\"BRG-56967\",\"nama_barang\":\"Printer vv\",\"deskripsi\":\"2\",\"gambar\":\"gambar-barang\\/download (3).jpeg\",\"stok_minimum\":2,\"stok\":0,\"user_id\":1,\"jenis_id\":31,\"satuan_id\":31}}', NULL, '2026-02-13 07:28:54', '2026-02-13 07:28:54'),
(346, 'default', 'created', 'App\\Models\\Supplier', 'created', 25, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":25,\"supplier\":\"we\",\"alamat\":\"we\",\"user_id\":1,\"created_at\":\"2026-02-13T07:29:13.000000Z\",\"updated_at\":\"2026-02-13T07:29:13.000000Z\"}}', NULL, '2026-02-13 07:29:13', '2026-02-13 07:29:13'),
(347, 'default', 'updated', 'App\\Models\\Supplier', 'updated', 25, 'App\\Models\\User', 1, '{\"attributes\":{\"supplier\":\"qq\",\"updated_at\":\"2026-02-13T07:29:25.000000Z\"},\"old\":{\"supplier\":\"we\",\"updated_at\":\"2026-02-13T07:29:13.000000Z\"}}', NULL, '2026-02-13 07:29:26', '2026-02-13 07:29:26'),
(348, 'default', 'deleted', 'App\\Models\\Supplier', 'deleted', 25, 'App\\Models\\User', 1, '{\"old\":{\"id\":25,\"supplier\":\"qq\",\"alamat\":\"we\",\"user_id\":1,\"created_at\":\"2026-02-13T07:29:13.000000Z\",\"updated_at\":\"2026-02-13T07:29:25.000000Z\"}}', NULL, '2026-02-13 07:29:31', '2026-02-13 07:29:31'),
(349, 'default', 'created', 'App\\Models\\Customer', 'created', 23, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":23,\"customer\":\"re\",\"alamat\":\"re\",\"user_id\":1,\"created_at\":\"2026-02-13T07:29:44.000000Z\",\"updated_at\":\"2026-02-13T07:29:44.000000Z\"}}', NULL, '2026-02-13 07:29:44', '2026-02-13 07:29:44'),
(350, 'default', 'updated', 'App\\Models\\Customer', 'updated', 23, 'App\\Models\\User', 1, '{\"attributes\":{\"customer\":\"Nama Guru & Tendik\",\"updated_at\":\"2026-02-13T07:29:55.000000Z\"},\"old\":{\"customer\":\"re\",\"updated_at\":\"2026-02-13T07:29:44.000000Z\"}}', NULL, '2026-02-13 07:29:55', '2026-02-13 07:29:55'),
(351, 'default', 'deleted', 'App\\Models\\Customer', 'deleted', 23, 'App\\Models\\User', 1, '{\"old\":{\"id\":23,\"customer\":\"Nama Guru & Tendik\",\"alamat\":\"re\",\"user_id\":1,\"created_at\":\"2026-02-13T07:29:44.000000Z\",\"updated_at\":\"2026-02-13T07:29:55.000000Z\"}}', NULL, '2026-02-13 07:29:59', '2026-02-13 07:29:59'),
(352, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 60, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":60,\"kode_transaksi\":\"TRX-IN-2026-2-13-9803\",\"tanggal_masuk\":\"2026-12-13\",\"nama_barang\":\"Stella\",\"jumlah_masuk\":3,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T07:30:54.000000Z\",\"updated_at\":\"2026-02-13T07:30:54.000000Z\"}}', NULL, '2026-02-13 07:30:54', '2026-02-13 07:30:54'),
(353, 'default', 'updated', 'App\\Models\\Barang', 'updated', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T07:30:54.000000Z\",\"stok\":9},\"old\":{\"updated_at\":\"2026-02-13T04:56:31.000000Z\",\"stok\":6}}', NULL, '2026-02-13 07:30:54', '2026-02-13 07:30:54'),
(354, 'default', 'deleted', 'App\\Models\\BarangMasuk', 'deleted', 60, 'App\\Models\\User', 1, '{\"old\":{\"id\":60,\"kode_transaksi\":\"TRX-IN-2026-2-13-9803\",\"tanggal_masuk\":\"2026-12-13\",\"nama_barang\":\"Stella\",\"jumlah_masuk\":3,\"supplier_id\":23,\"user_id\":1,\"created_at\":\"2026-02-13T07:30:54.000000Z\",\"updated_at\":\"2026-02-13T07:30:54.000000Z\"}}', NULL, '2026-02-13 07:31:25', '2026-02-13 07:31:25'),
(355, 'default', 'updated', 'App\\Models\\Barang', 'updated', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T07:31:25.000000Z\",\"stok\":6},\"old\":{\"updated_at\":\"2026-02-13T07:30:54.000000Z\",\"stok\":9}}', NULL, '2026-02-13 07:31:25', '2026-02-13 07:31:25'),
(356, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 35, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":35,\"kode_transaksi\":\"TRX-OUT-2026-2-13-9632\",\"tanggal_keluar\":\"2026-02-13\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_keluar\":1,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T07:31:57.000000Z\",\"updated_at\":\"2026-02-13T07:31:57.000000Z\"}}', NULL, '2026-02-13 07:31:57', '2026-02-13 07:31:57'),
(357, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T07:31:57.000000Z\",\"stok\":3},\"old\":{\"updated_at\":\"2026-02-13T04:57:04.000000Z\",\"stok\":4}}', NULL, '2026-02-13 07:31:57', '2026-02-13 07:31:57'),
(358, 'default', 'deleted', 'App\\Models\\BarangKeluar', 'deleted', 35, 'App\\Models\\User', 1, '{\"old\":{\"id\":35,\"kode_transaksi\":\"TRX-OUT-2026-2-13-9632\",\"tanggal_keluar\":\"2026-02-13\",\"nama_barang\":\"Tissu\\/Merk Nice\",\"jumlah_keluar\":1,\"customer_id\":21,\"user_id\":1,\"created_at\":\"2026-02-13T07:31:57.000000Z\",\"updated_at\":\"2026-02-13T07:31:57.000000Z\"}}', NULL, '2026-02-13 07:32:05', '2026-02-13 07:32:05'),
(359, 'default', 'updated', 'App\\Models\\Barang', 'updated', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T07:32:05.000000Z\",\"stok\":4},\"old\":{\"updated_at\":\"2026-02-13T07:31:57.000000Z\",\"stok\":3}}', NULL, '2026-02-13 07:32:05', '2026-02-13 07:32:05'),
(360, 'default', 'created', 'App\\Models\\Jenis', 'created', 36, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":36,\"jenis_barang\":\"Barang Elektronik\",\"user_id\":1,\"created_at\":\"2026-02-13T07:42:42.000000Z\",\"updated_at\":\"2026-02-13T07:42:42.000000Z\"}}', NULL, '2026-02-13 07:42:42', '2026-02-13 07:42:42'),
(361, 'default', 'created', 'App\\Models\\Jenis', 'created', 37, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":37,\"jenis_barang\":\"Perabot \\/ Furniture\",\"user_id\":1,\"created_at\":\"2026-02-13T07:43:08.000000Z\",\"updated_at\":\"2026-02-13T07:43:08.000000Z\"}}', NULL, '2026-02-13 07:43:08', '2026-02-13 07:43:08'),
(362, 'default', 'updated', 'App\\Models\\Jenis', 'updated', 32, 'App\\Models\\User', 1, '{\"attributes\":{\"jenis_barang\":\"Alat Tulis Kantor (ATK)\",\"updated_at\":\"2026-02-13T07:45:51.000000Z\"},\"old\":{\"jenis_barang\":\"Alat Tulis Kantor\",\"updated_at\":\"2026-02-12T02:54:14.000000Z\"}}', NULL, '2026-02-13 07:45:51', '2026-02-13 07:45:51'),
(363, 'default', 'created', 'App\\Models\\Jenis', 'created', 38, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":38,\"jenis_barang\":\"Peralatan & Perlengkapan\",\"user_id\":1,\"created_at\":\"2026-02-13T07:46:04.000000Z\",\"updated_at\":\"2026-02-13T07:46:04.000000Z\"}}', NULL, '2026-02-13 07:46:04', '2026-02-13 07:46:04'),
(364, 'default', 'created', 'App\\Models\\Jenis', 'created', 39, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":39,\"jenis_barang\":\"Perlengkapan Kebersihan\",\"user_id\":1,\"created_at\":\"2026-02-13T07:46:15.000000Z\",\"updated_at\":\"2026-02-13T07:46:15.000000Z\"}}', NULL, '2026-02-13 07:46:15', '2026-02-13 07:46:15'),
(365, 'default', 'created', 'App\\Models\\Jenis', 'created', 40, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":40,\"jenis_barang\":\"Barang Pembelajaran (Sekolah)\",\"user_id\":1,\"created_at\":\"2026-02-13T07:46:34.000000Z\",\"updated_at\":\"2026-02-13T07:46:34.000000Z\"}}', NULL, '2026-02-13 07:46:34', '2026-02-13 07:46:34'),
(366, 'default', 'created', 'App\\Models\\Jenis', 'created', 41, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":41,\"jenis_barang\":\"Kendaraan & Aksesoris\",\"user_id\":1,\"created_at\":\"2026-02-13T07:46:45.000000Z\",\"updated_at\":\"2026-02-13T07:46:45.000000Z\"}}', NULL, '2026-02-13 07:46:45', '2026-02-13 07:46:45'),
(367, 'default', 'created', 'App\\Models\\Jenis', 'created', 42, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":42,\"jenis_barang\":\"Barang Inventaris Tetap\",\"user_id\":1,\"created_at\":\"2026-02-13T07:46:56.000000Z\",\"updated_at\":\"2026-02-13T07:46:56.000000Z\"}}', NULL, '2026-02-13 07:46:56', '2026-02-13 07:46:56'),
(368, 'default', 'updated', 'App\\Models\\Jenis', 'updated', 36, 'App\\Models\\User', 1, '{\"attributes\":{\"jenis_barang\":\"Elektronik & IT\",\"updated_at\":\"2026-02-13T07:47:53.000000Z\"},\"old\":{\"jenis_barang\":\"Barang Elektronik\",\"updated_at\":\"2026-02-13T07:42:42.000000Z\"}}', NULL, '2026-02-13 07:47:53', '2026-02-13 07:47:53'),
(369, 'default', 'created', 'App\\Models\\Jenis', 'created', 43, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":43,\"jenis_barang\":\"Peralatan Laboratorium\",\"user_id\":1,\"created_at\":\"2026-02-13T07:48:24.000000Z\",\"updated_at\":\"2026-02-13T07:48:24.000000Z\"}}', NULL, '2026-02-13 07:48:24', '2026-02-13 07:48:24'),
(370, 'default', 'updated', 'App\\Models\\Jenis', 'updated', 40, 'App\\Models\\User', 1, '{\"attributes\":{\"jenis_barang\":\"Perlengkapan Pembelajaran\",\"updated_at\":\"2026-02-13T07:48:40.000000Z\"},\"old\":{\"jenis_barang\":\"Barang Pembelajaran (Sekolah)\",\"updated_at\":\"2026-02-13T07:46:34.000000Z\"}}', NULL, '2026-02-13 07:48:40', '2026-02-13 07:48:40'),
(371, 'default', 'created', 'App\\Models\\Jenis', 'created', 44, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":44,\"jenis_barang\":\"Peralatan Umum & Maintenance\",\"user_id\":1,\"created_at\":\"2026-02-13T07:49:00.000000Z\",\"updated_at\":\"2026-02-13T07:49:00.000000Z\"}}', NULL, '2026-02-13 07:49:00', '2026-02-13 07:49:00'),
(372, 'default', 'created', 'App\\Models\\Jenis', 'created', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":45,\"jenis_barang\":\"Aset Tetap\",\"user_id\":1,\"created_at\":\"2026-02-13T07:49:15.000000Z\",\"updated_at\":\"2026-02-13T07:49:15.000000Z\"}}', NULL, '2026-02-13 07:49:15', '2026-02-13 07:49:15'),
(373, 'default', 'created', 'App\\Models\\Jenis', 'created', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":46,\"jenis_barang\":\"Perlengkapan Kantin & UKS\",\"user_id\":1,\"created_at\":\"2026-02-13T07:49:27.000000Z\",\"updated_at\":\"2026-02-13T07:49:27.000000Z\"}}', NULL, '2026-02-13 07:49:27', '2026-02-13 07:49:27'),
(374, 'default', 'created', 'App\\Models\\Satuan', 'created', 40, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":40,\"created_at\":\"2026-02-13T07:50:46.000000Z\",\"updated_at\":\"2026-02-13T07:50:46.000000Z\",\"satuan\":\"Unit\",\"user_id\":1}}', NULL, '2026-02-13 07:50:46', '2026-02-13 07:50:46'),
(375, 'default', 'created', 'App\\Models\\Satuan', 'created', 41, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":41,\"created_at\":\"2026-02-13T07:51:01.000000Z\",\"updated_at\":\"2026-02-13T07:51:01.000000Z\",\"satuan\":\"Set\",\"user_id\":1}}', NULL, '2026-02-13 07:51:01', '2026-02-13 07:51:01'),
(376, 'default', 'created', 'App\\Models\\Satuan', 'created', 42, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":42,\"created_at\":\"2026-02-13T07:51:11.000000Z\",\"updated_at\":\"2026-02-13T07:51:11.000000Z\",\"satuan\":\"Paket\",\"user_id\":1}}', NULL, '2026-02-13 07:51:11', '2026-02-13 07:51:11'),
(377, 'default', 'created', 'App\\Models\\Satuan', 'created', 43, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":43,\"created_at\":\"2026-02-13T07:51:20.000000Z\",\"updated_at\":\"2026-02-13T07:51:20.000000Z\",\"satuan\":\"Pasang\",\"user_id\":1}}', NULL, '2026-02-13 07:51:20', '2026-02-13 07:51:20'),
(378, 'default', 'updated', 'App\\Models\\Satuan', 'updated', 31, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T07:51:42.000000Z\",\"satuan\":\"Buah\"},\"old\":{\"updated_at\":\"2026-02-13T07:27:41.000000Z\",\"satuan\":\"Pieces \\/ Buah\"}}', NULL, '2026-02-13 07:51:42', '2026-02-13 07:51:42'),
(379, 'default', 'created', 'App\\Models\\Satuan', 'created', 44, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":44,\"created_at\":\"2026-02-13T07:51:47.000000Z\",\"updated_at\":\"2026-02-13T07:51:47.000000Z\",\"satuan\":\"Box\",\"user_id\":1}}', NULL, '2026-02-13 07:51:47', '2026-02-13 07:51:47'),
(380, 'default', 'created', 'App\\Models\\Satuan', 'created', 45, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":45,\"created_at\":\"2026-02-13T07:51:57.000000Z\",\"updated_at\":\"2026-02-13T07:51:57.000000Z\",\"satuan\":\"Pcs\",\"user_id\":1}}', NULL, '2026-02-13 07:51:57', '2026-02-13 07:51:57'),
(381, 'default', 'created', 'App\\Models\\Satuan', 'created', 46, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":46,\"created_at\":\"2026-02-13T07:52:05.000000Z\",\"updated_at\":\"2026-02-13T07:52:05.000000Z\",\"satuan\":\"Pak\",\"user_id\":1}}', NULL, '2026-02-13 07:52:05', '2026-02-13 07:52:05'),
(382, 'default', 'created', 'App\\Models\\Satuan', 'created', 47, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":47,\"created_at\":\"2026-02-13T07:52:14.000000Z\",\"updated_at\":\"2026-02-13T07:52:14.000000Z\",\"satuan\":\"Lusin\",\"user_id\":1}}', NULL, '2026-02-13 07:52:14', '2026-02-13 07:52:14'),
(383, 'default', 'updated', 'App\\Models\\Satuan', 'updated', 34, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_at\":\"2026-02-13T07:52:25.000000Z\",\"satuan\":\"Rim\"},\"old\":{\"updated_at\":\"2026-02-12T02:54:27.000000Z\",\"satuan\":\"RIM\"}}', NULL, '2026-02-13 07:52:25', '2026-02-13 07:52:25'),
(384, 'default', 'created', 'App\\Models\\Satuan', 'created', 48, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":48,\"created_at\":\"2026-02-13T07:52:50.000000Z\",\"updated_at\":\"2026-02-13T07:52:50.000000Z\",\"satuan\":\"Liter\",\"user_id\":1}}', NULL, '2026-02-13 07:52:50', '2026-02-13 07:52:50'),
(385, 'default', 'created', 'App\\Models\\Satuan', 'created', 49, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":49,\"created_at\":\"2026-02-13T07:52:59.000000Z\",\"updated_at\":\"2026-02-13T07:52:59.000000Z\",\"satuan\":\"Mililiter\",\"user_id\":1}}', NULL, '2026-02-13 07:52:59', '2026-02-13 07:52:59'),
(386, 'default', 'created', 'App\\Models\\Satuan', 'created', 50, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":50,\"created_at\":\"2026-02-13T07:53:07.000000Z\",\"updated_at\":\"2026-02-13T07:53:07.000000Z\",\"satuan\":\"Gram\",\"user_id\":1}}', NULL, '2026-02-13 07:53:07', '2026-02-13 07:53:07'),
(387, 'default', 'created', 'App\\Models\\Satuan', 'created', 51, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":51,\"created_at\":\"2026-02-13T07:53:15.000000Z\",\"updated_at\":\"2026-02-13T07:53:15.000000Z\",\"satuan\":\"Kilogram\",\"user_id\":1}}', NULL, '2026-02-13 07:53:15', '2026-02-13 07:53:15'),
(388, 'default', 'created', 'App\\Models\\Satuan', 'created', 52, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":52,\"created_at\":\"2026-02-13T07:53:32.000000Z\",\"updated_at\":\"2026-02-13T07:53:32.000000Z\",\"satuan\":\"Meter Persegi (m\\u00b2)\",\"user_id\":1}}', NULL, '2026-02-13 07:53:32', '2026-02-13 07:53:32'),
(389, 'default', 'created', 'App\\Models\\Satuan', 'created', 53, 'App\\Models\\User', 1, '{\"attributes\":{\"id\":53,\"created_at\":\"2026-02-13T07:53:42.000000Z\",\"updated_at\":\"2026-02-13T07:53:42.000000Z\",\"satuan\":\"Meter Kubik (m\\u00b3)\",\"user_id\":1}}', NULL, '2026-02-13 07:53:42', '2026-02-13 07:53:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset`
--

CREATE TABLE `aset` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `asets`
--

CREATE TABLE `asets` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_aset` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `kondisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `asets`
--

INSERT INTO `asets` (`id`, `gambar`, `nama_aset`, `jumlah`, `kondisi`, `lokasi`, `created_at`, `updated_at`) VALUES
(55, 'aset/PAIAmTSjst7RzOeCvWTqeFWeA51RgUkx2SwROi8D.jpg', 'Laptop Merk HP A6', 1, 'Baik', 'Tata Usaha/Laras', '2026-02-12 04:26:22', '2026-02-12 04:40:55'),
(56, 'aset/64Y58OZ49cKCfsd2blp4H6L620qcqZ7nFkl4mqHP.jpg', 'Laptop HP Merk HP A5', 1, 'Baik', 'Tata Usaha/Maria', '2026-02-12 04:27:39', '2026-02-12 04:40:39'),
(57, 'aset/cSMeTOtQ538SdqlZohjxSSRf28LhXcTSpZhV3OeO.jpg', 'Laptop Merk HP A4', 1, 'Baik', 'Ruang Humas/ Nur Arifah', '2026-02-12 04:28:26', '2026-02-12 04:40:29'),
(58, 'aset/UR0soSLuQ4IyVCs4waCCp0apmiJ7wGlKTOb6JAlH.jpg', 'Laptop Merk HP A3', 1, 'Baik', 'Ruang Kurikulum/Lisbeth Evadesy Pardede', '2026-02-12 04:29:23', '2026-02-12 04:40:18'),
(59, 'aset/Cpbbu4oyqp551F1EbAxlgSOZNEFY0RjWSMbWdmQb.jpg', 'Laptop Merk HP A2', 1, 'Baik', 'Ruang Sapras/Rita Suryani', '2026-02-12 04:30:10', '2026-02-12 04:40:05'),
(60, 'aset/7p8y9mx9C4RoWaM4S30xGgFNgbCQjtTyOGXlY1fF.jpg', 'Laptop Merk  HP A1', 1, 'Baik', 'Kesiswaan/Rini Ramadhani', '2026-02-12 04:30:45', '2026-02-12 04:39:56'),
(61, 'aset/3OEE6IbVoXuL0Jas80A2TDLNLI3xgxVZjBZavYQ0.jpg', 'Laptop Merk Zyrex', 1, 'Baik', 'Tata Usaha/Operator Dapodik', '2026-02-12 04:31:50', '2026-02-12 04:31:50'),
(62, 'aset/64jMmV9wQpqyOQ84xQpEJDYAl3w55oFu2BBWvlhX.jpg', 'Printer Merk Brother DCP-T310', 1, 'Baik', 'Tata Usaha/Operator Dapodik', '2026-02-12 04:32:42', '2026-02-12 04:32:42'),
(63, 'aset/NYDvmRAJYsREGKXbD0RifK9fuBw3f2y5S2pzL4aZ.jpg', 'Laptop Asus Vivobook', 2, 'Baik', 'Tata Usaha/Operator Dapodik', '2026-02-12 04:33:17', '2026-02-12 07:42:08'),
(66, 'aset/Id9bzB2akjbiWnu0EFsJsYtlYecq7aXDLTcUbdEG.jpg', 'Proyektor/Infocus', 1, 'Baik', 'Ruang Sapras/Ritas Suryani', '2026-02-13 04:45:19', '2026-02-13 04:45:19'),
(67, 'aset/EwclGVV97BKmTaW5KPBdilw7rB9eVyqHDP5mLP95.jpg', 'SmartTV/IFP Panel', 1, 'Baik', 'Ruang Rapat/Ops', '2026-02-13 04:46:59', '2026-02-13 04:46:59'),
(68, 'aset/bULWp25Uzg1yxtxskCq3TAs3bMGXE5RuBGxGvBQw.jpg', 'Kipas Angin', 1, 'Baik', 'Ruang Rapat', '2026-02-13 04:48:14', '2026-02-13 04:48:14'),
(69, 'aset/PZvFVcqKnPrjWr8K4ENp2aTNCJNUePNAqvRtLZhI.jpg', 'Meja', 1, 'Baik', 'Ruangan 1', '2026-02-13 05:00:46', '2026-02-13 05:00:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_minimum` int NOT NULL,
  `stok` int DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `jenis_id` bigint UNSIGNED NOT NULL,
  `satuan_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `created_at`, `updated_at`, `kode_barang`, `nama_barang`, `deskripsi`, `gambar`, `stok_minimum`, `stok`, `user_id`, `jenis_id`, `satuan_id`) VALUES
(45, '2026-02-12 02:39:08', '2026-02-13 07:32:05', 'BRG-26980', 'Tissu/Merk Nice', 'Tissu/Merk Nice', 'gambar-barang/WhatsApp Image 2026-02-12 at 09.32.10 (1).jpeg', 5, 4, 1, 31, 31),
(46, '2026-02-12 02:40:25', '2026-02-13 04:56:53', 'BRG-07818', 'Plastik Sampah/Kresek', 'Plastik Sampah/Kresek', 'gambar-barang/WhatsApp Image 2026-02-12 at 09.32.11.jpeg', 5, 5, 1, 31, 31),
(47, '2026-02-12 02:44:31', '2026-02-13 04:57:52', 'BRG-22096', 'Gas Elpiji 5 Kg', 'Gas Elpiji 5 Kg', 'gambar-barang/WhatsApp Image 2026-02-12 at 09.32.11 (1).jpeg', 5, 3, 1, 31, 32),
(48, '2026-02-12 02:46:50', '2026-02-13 07:31:25', 'BRG-64132', 'Stella', 'Stella/Pengaharum Ruangan', 'gambar-barang/WhatsApp Image 2026-02-12 at 09.32.10.jpeg', 5, 6, 1, 30, 31),
(49, '2026-02-12 02:51:15', '2026-02-12 02:51:15', 'BRG-43878', 'SOS/Clenso', 'SOS/Clenso', 'gambar-barang/WhatsApp Image 2026-02-12 at 09.32.11 (2).jpeg', 5, 0, 1, 30, 33),
(50, '2026-02-12 02:55:08', '2026-02-12 02:55:08', 'BRG-48863', 'Kertas HVS', 'Kertas HVS A4', 'gambar-barang/WhatsApp Image 2026-02-12 at 09.53.02.jpeg', 5, 0, 1, 32, 34),
(51, '2026-02-12 02:58:35', '2026-02-12 02:58:35', 'BRG-59145', 'Pena', 'Pena Kenko', 'gambar-barang/download.jpeg', 5, 0, 1, 32, 35),
(52, '2026-02-12 03:07:25', '2026-02-12 03:07:25', 'BRG-89623', 'Yoeker/Trigonal Clips', 'Yoeker/Trigonal Clips', 'gambar-barang/WhatsApp Image 2026-02-12 at 10.06.13.jpeg', 5, 0, 1, 32, 35),
(53, '2026-02-12 03:09:25', '2026-02-12 03:09:25', 'BRG-25113', 'Lakban', 'Lakban Hitam', 'gambar-barang/WhatsApp Image 2026-02-12 at 10.06.14.jpeg', 5, 0, 1, 31, 36),
(54, '2026-02-12 03:10:16', '2026-02-12 03:10:16', 'BRG-92202', 'Paperline/Amplop', 'Paperline/Amplop', 'gambar-barang/WhatsApp Image 2026-02-12 at 10.06.15.jpeg', 5, 0, 1, 31, 31),
(55, '2026-02-12 04:08:53', '2026-02-12 04:08:53', 'BRG-01981', 'Refil Ink', 'Refil Ink/Isi Tinta', 'gambar-barang/WhatsApp Image 2026-02-12 at 10.06.16.jpeg', 5, 0, 1, 31, 31),
(56, '2026-02-12 04:10:05', '2026-02-12 04:10:05', 'BRG-05700', 'Snowman/Boardmarker', 'Snowman/Boardmarker ( Spidol )', 'gambar-barang/WhatsApp Image 2026-02-12 at 10.06.17.jpeg', 5, 0, 1, 31, 35),
(57, '2026-02-12 04:15:57', '2026-02-12 04:15:57', 'BRG-34794', 'Glue Stick', 'Glue Stick/Lem Kertas', 'gambar-barang/WhatsApp Image 2026-02-12 at 11.14.44.jpeg', 5, 0, 1, 32, 31),
(58, '2026-02-12 04:16:57', '2026-02-12 04:16:57', 'BRG-73998', 'Binder Clips', 'Binder Clips/Penjepit Kertas', 'gambar-barang/WhatsApp Image 2026-02-12 at 11.14.44 (1).jpeg', 5, 0, 1, 32, 35),
(59, '2026-02-12 04:17:51', '2026-02-12 04:17:51', 'BRG-30804', 'Eveready/Batre', 'Eveready/Batre', 'gambar-barang/WhatsApp Image 2026-02-12 at 11.14.45.jpeg', 5, 0, 1, 31, 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluars`
--

CREATE TABLE `barang_keluars` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_keluar` int NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_keluars`
--

INSERT INTO `barang_keluars` (`id`, `kode_transaksi`, `tanggal_keluar`, `nama_barang`, `jumlah_keluar`, `customer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(20, 'TRX-OUT-2026-2-12-9945', '2026-02-12', 'Tissu/Merk Nice', 1, 21, 1, '2026-02-12 08:04:20', '2026-02-12 08:04:20'),
(22, 'TRX-OUT-2026-2-13-6402', '2025-01-13', 'Tissu/Merk Nice', 5, 21, 1, '2026-02-13 04:55:23', '2026-02-13 04:55:23'),
(23, 'TRX-OUT-2026-2-13-6206', '2025-02-13', 'Plastik Sampah/Kresek', 5, 21, 1, '2026-02-13 04:55:35', '2026-02-13 04:55:35'),
(24, 'TRX-OUT-2026-2-13-1929', '2025-03-13', 'Stella', 5, 21, 1, '2026-02-13 04:55:46', '2026-02-13 04:55:46'),
(25, 'TRX-OUT-2026-2-13-4208', '2025-04-13', 'Stella', 2, 21, 1, '2026-02-13 04:55:56', '2026-02-13 04:55:56'),
(26, 'TRX-OUT-2026-2-13-8330', '2025-05-13', 'Gas Elpiji 5 Kg', 5, 21, 1, '2026-02-13 04:56:09', '2026-02-13 04:56:09'),
(27, 'TRX-OUT-2026-2-13-1342', '2025-06-13', 'Plastik Sampah/Kresek', 4, 21, 1, '2026-02-13 04:56:20', '2026-02-13 04:56:20'),
(28, 'TRX-OUT-2026-2-13-3473', '2025-07-13', 'Stella', 2, 21, 1, '2026-02-13 04:56:30', '2026-02-13 04:56:30'),
(29, 'TRX-OUT-2026-2-13-3136', '2025-08-13', 'Plastik Sampah/Kresek', 6, 21, 1, '2026-02-13 04:56:41', '2026-02-13 04:56:41'),
(30, 'TRX-OUT-2026-2-13-8603', '2025-09-13', 'Plastik Sampah/Kresek', 5, 21, 1, '2026-02-13 04:56:53', '2026-02-13 04:56:53'),
(31, 'TRX-OUT-2026-2-13-6113', '2025-10-13', 'Tissu/Merk Nice', 6, 21, 1, '2026-02-13 04:57:04', '2026-02-13 04:57:04'),
(32, 'TRX-OUT-2026-2-13-4389', '2025-11-13', 'Gas Elpiji 5 Kg', 5, 21, 1, '2026-02-13 04:57:17', '2026-02-13 04:57:17'),
(33, 'TRX-OUT-2026-2-13-9532', '2025-12-13', 'Gas Elpiji 5 Kg', 5, 21, 1, '2026-02-13 04:57:35', '2026-02-13 04:57:35'),
(34, 'TRX-OUT-2026-2-13-2382', '2026-01-13', 'Gas Elpiji 5 Kg', 7, 21, 1, '2026-02-13 04:57:52', '2026-02-13 04:57:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuks`
--

CREATE TABLE `barang_masuks` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_masuk` int NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_masuks`
--

INSERT INTO `barang_masuks` (`id`, `kode_transaksi`, `tanggal_masuk`, `nama_barang`, `jumlah_masuk`, `supplier_id`, `user_id`, `created_at`, `updated_at`) VALUES
(44, 'TRX-IN-2026-2-12-5232', '2026-02-12', 'Tissu/Merk Nice', 1, 23, 1, '2026-02-12 05:35:18', '2026-02-12 05:35:18'),
(45, 'TRX-IN-2026-2-12-9643', '2026-02-12', 'Tissu/Merk Nice', 2, 23, 1, '2026-02-12 05:42:59', '2026-02-12 05:42:59'),
(47, 'TRX-IN-2026-2-13-1480', '2025-01-13', 'Tissu/Merk Nice', 8, 23, 1, '2026-02-13 04:50:29', '2026-02-13 04:50:29'),
(48, 'TRX-IN-2026-2-13-2220', '2025-02-13', 'Plastik Sampah/Kresek', 10, 23, 1, '2026-02-13 04:51:03', '2026-02-13 04:51:03'),
(49, 'TRX-IN-2026-2-13-1462', '2025-03-13', 'Gas Elpiji 5 Kg', 10, 23, 1, '2026-02-13 04:51:16', '2026-02-13 04:51:16'),
(50, 'TRX-IN-2026-2-13-8358', '2025-04-13', 'Stella', 10, 23, 1, '2026-02-13 04:51:33', '2026-02-13 04:51:33'),
(51, 'TRX-IN-2026-2-13-8728', '2025-05-13', 'null', 10, 23, 1, '2026-02-13 04:51:45', '2026-02-13 04:51:45'),
(52, 'TRX-IN-2026-2-13-5580', '2025-06-13', 'Tissu/Merk Nice', 5, 23, 1, '2026-02-13 04:53:13', '2026-02-13 04:53:13'),
(53, 'TRX-IN-2026-2-13-3171', '2025-07-13', 'Plastik Sampah/Kresek', 5, 23, 1, '2026-02-13 04:53:24', '2026-02-13 04:53:24'),
(54, 'TRX-IN-2026-2-13-3399', '2025-08-13', 'Gas Elpiji 5 Kg', 5, 23, 1, '2026-02-13 04:53:36', '2026-02-13 04:53:36'),
(55, 'TRX-IN-2026-2-13-7607', '2025-09-13', 'Stella', 5, 23, 1, '2026-02-13 04:53:48', '2026-02-13 04:53:48'),
(56, 'TRX-IN-2026-2-13-6902', '2025-10-13', 'Gas Elpiji 5 Kg', 5, 23, 1, '2026-02-13 04:54:00', '2026-02-13 04:54:00'),
(57, 'TRX-IN-2026-2-13-6745', '2025-11-13', 'Plastik Sampah/Kresek', 5, 23, 1, '2026-02-13 04:54:12', '2026-02-13 04:54:12'),
(58, 'TRX-IN-2026-2-13-7008', '2025-12-13', 'Plastik Sampah/Kresek', 5, 23, 1, '2026-02-13 04:54:24', '2026-02-13 04:54:24'),
(59, 'TRX-IN-2026-2-13-3316', '2026-01-13', 'Gas Elpiji 5 Kg', 5, 23, 1, '2026-02-13 04:54:40', '2026-02-13 04:54:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `customer`, `alamat`, `user_id`, `created_at`, `updated_at`) VALUES
(21, 'Beni', 'Tendik', 1, '2026-02-12 08:04:05', '2026-02-12 08:04:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `jenis_barang`, `user_id`, `created_at`, `updated_at`) VALUES
(30, 'Pengharum Ruangan', 1, '2026-02-12 02:33:32', '2026-02-12 02:33:32'),
(31, 'Barang Habis Pakai', 1, '2026-02-12 02:38:38', '2026-02-12 02:38:38'),
(32, 'Alat Tulis Kantor (ATK)', 1, '2026-02-12 02:54:14', '2026-02-13 07:45:51'),
(36, 'Elektronik & IT', 1, '2026-02-13 07:42:42', '2026-02-13 07:47:53'),
(37, 'Perabot / Furniture', 1, '2026-02-13 07:43:08', '2026-02-13 07:43:08'),
(38, 'Peralatan & Perlengkapan', 1, '2026-02-13 07:46:04', '2026-02-13 07:46:04'),
(39, 'Perlengkapan Kebersihan', 1, '2026-02-13 07:46:15', '2026-02-13 07:46:15'),
(40, 'Perlengkapan Pembelajaran', 1, '2026-02-13 07:46:34', '2026-02-13 07:48:40'),
(41, 'Kendaraan & Aksesoris', 1, '2026-02-13 07:46:45', '2026-02-13 07:46:45'),
(42, 'Barang Inventaris Tetap', 1, '2026-02-13 07:46:56', '2026-02-13 07:46:56'),
(43, 'Peralatan Laboratorium', 1, '2026-02-13 07:48:24', '2026-02-13 07:48:24'),
(44, 'Peralatan Umum & Maintenance', 1, '2026-02-13 07:49:00', '2026-02-13 07:49:00'),
(45, 'Aset Tetap', 1, '2026-02-13 07:49:15', '2026-02-13 07:49:15'),
(46, 'Perlengkapan Kantin & UKS', 1, '2026-02-13 07:49:27', '2026-02-13 07:49:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_30_113736_create_barangs_table', 1),
(6, '2023_05_08_012945_create_jenis_table', 1),
(7, '2023_05_12_002014_create_satuans_table', 1),
(8, '2023_05_12_232201_create_suppliers_table', 1),
(9, '2023_05_13_003355_create_customers_table', 1),
(10, '2023_05_13_013458_create_barang_masuks_table', 1),
(11, '2023_05_17_135554_create_barang_keluars_table', 1),
(12, '2023_05_28_095805_create_roles_table', 1),
(13, '2023_05_30_124154_create_activity_log_table', 1),
(14, '2023_05_30_124155_add_event_column_to_activity_log_table', 1),
(15, '2023_05_30_124156_add_batch_uuid_column_to_activity_log_table', 1),
(16, '2025_12_20_114312_create_aset_table', 2),
(17, '2025_12_23_150519_create_asets_table', 3),
(18, '2025_12_28_113206_add_session_token_to_users_table', 4),
(19, '2026_01_10_150228_add_session_id_to_users_table', 5),
(20, '2026_01_10_170144_create_sessions_table', 6),
(21, '2026_01_10_171310_add_password_changed_at_to_users_table', 7),
(22, '2026_01_10_173313_add_force_logout_at_to_users_table', 8),
(23, '2026_02_01_152748_create_cache_table', 9),
(24, '2026_02_12_183634_add_avatar_to_users_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Superadmin memiliki kendali penuh pada aplikasi termasuk manajemen User', '2025-05-30 06:09:55', '2026-02-10 00:46:03'),
(2, 'kepala sekolah', 'Kepala gudang memilki akses untuk mengelola dan mencetak laporan stok, barang masuk, dan barang keluar', '2025-05-30 06:09:55', '2026-01-03 07:21:34'),
(3, 'admin', 'Admin gudang memilki akses untuk mengelola stok,  barang masuk, barang keluar dan laporannya', '2025-05-30 06:09:55', '2026-01-03 07:47:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuans`
--

CREATE TABLE `satuans` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `satuans`
--

INSERT INTO `satuans` (`id`, `created_at`, `updated_at`, `satuan`, `user_id`) VALUES
(31, '2026-02-12 02:35:00', '2026-02-13 07:51:42', 'Buah', 1),
(32, '2026-02-12 02:43:04', '2026-02-12 02:43:04', 'Tabung', 1),
(33, '2026-02-12 02:50:41', '2026-02-12 02:50:41', 'Jerigen', 1),
(34, '2026-02-12 02:54:27', '2026-02-13 07:52:25', 'Rim', 1),
(35, '2026-02-12 02:57:57', '2026-02-12 02:57:57', 'Kotak', 1),
(36, '2026-02-12 03:08:52', '2026-02-12 03:08:52', 'ROLL', 1),
(40, '2026-02-13 07:50:46', '2026-02-13 07:50:46', 'Unit', 1),
(41, '2026-02-13 07:51:01', '2026-02-13 07:51:01', 'Set', 1),
(42, '2026-02-13 07:51:11', '2026-02-13 07:51:11', 'Paket', 1),
(43, '2026-02-13 07:51:20', '2026-02-13 07:51:20', 'Pasang', 1),
(44, '2026-02-13 07:51:47', '2026-02-13 07:51:47', 'Box', 1),
(45, '2026-02-13 07:51:57', '2026-02-13 07:51:57', 'Pcs', 1),
(46, '2026-02-13 07:52:05', '2026-02-13 07:52:05', 'Pak', 1),
(47, '2026-02-13 07:52:14', '2026-02-13 07:52:14', 'Lusin', 1),
(48, '2026-02-13 07:52:50', '2026-02-13 07:52:50', 'Liter', 1),
(49, '2026-02-13 07:52:59', '2026-02-13 07:52:59', 'Mililiter', 1),
(50, '2026-02-13 07:53:07', '2026-02-13 07:53:07', 'Gram', 1),
(51, '2026-02-13 07:53:15', '2026-02-13 07:53:15', 'Kilogram', 1),
(52, '2026-02-13 07:53:32', '2026-02-13 07:53:32', 'Meter Persegi (m²)', 1),
(53, '2026-02-13 07:53:42', '2026-02-13 07:53:42', 'Meter Kubik (m³)', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier`, `alamat`, `user_id`, `created_at`, `updated_at`) VALUES
(23, 'CV Maju Bersama', 'Saya', 1, '2026-02-12 05:35:03', '2026-02-12 05:35:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `password_changed_at`, `role_id`, `remember_token`, `session_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$10$o735mOVo/lEnMkFn/UY/8eNBA9PJuD8b8T9N73Dsmva5evRzX1hwC', '1770953798.png', NULL, 1, '82m6hnoczKONaILMfrAy0Av2iGuCymX2V1naOKOSBtIbd0ATpHFOU7XDHYfS', NULL, '2025-05-30 06:09:55', '2026-02-13 07:54:50'),
(2, 'Kepala Sekolah', 'kepalasekolah@gmail.com', NULL, '$2y$10$97x/jzDtK1vQ8gNgtQOJhOt6mzQiU01QQR5wmZYgdsX1ZgM49stIW', '1770909400.jpg', NULL, 2, 'Vlp6nwaiSHiBJOFYeQ1Pq4RHZUaFGq556Ti1fBorVsHssvhuy0oMAujBzUaw', NULL, '2025-05-30 06:09:55', '2026-02-12 15:18:49'),
(3, 'Admin', 'admin@gmail.com', NULL, '$2y$10$WP1ZkoCoQT/3vpbcthZyKuV5LMXXDocLiqjeCNOPyaBt1q9CWXovq', '1770963550.png', NULL, 3, NULL, NULL, '2025-05-30 06:09:55', '2026-02-13 07:15:27');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indeks untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `asets`
--
ALTER TABLE `asets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barangs_kode_barang_unique` (`kode_barang`);

--
-- Indeks untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barang_keluars_kode_transaksi_unique` (`kode_transaksi`);

--
-- Indeks untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barang_masuks_kode_transaksi_unique` (`kode_transaksi`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `asets`
--
ALTER TABLE `asets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
