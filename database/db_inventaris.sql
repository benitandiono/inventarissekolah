-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Bulan Mei 2026 pada 07.31
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
(1233, 'default', 'deleted', 'App\\Models\\Customer', 'deleted', 50, 'App\\Models\\User', 3, '{\"old\":{\"id\":50,\"customer\":\"YAKOBUS YANTO, S.S\",\"alamat\":\"Guru\",\"user_id\":1,\"created_at\":\"2026-03-13T10:59:46.000000Z\",\"updated_at\":\"2026-03-13T10:59:46.000000Z\"}}', NULL, '2026-05-19 03:15:14', '2026-05-19 03:15:14'),
(1234, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 165, 'App\\Models\\User', 3, '{\"attributes\":{\"nama_aset\":\"Papan interaktif (Interactive Flat Panel)\",\"jumlah\":1,\"kondisi\":\"Helyadi Beni Tandiono \\u2014 Tendik\",\"lokasi\":\"Ruangan Pertemuan\"}}', NULL, '2026-05-19 03:16:15', '2026-05-19 03:16:15'),
(1235, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 166, 'App\\Models\\User', 3, '{\"attributes\":{\"nama_aset\":\"Laptop Zyrex\",\"jumlah\":1,\"kondisi\":\"Helyadi Beni Tandiono \\u2014 Tendik\",\"lokasi\":\"Ruangan Operator-Tata Usaha\"}}', NULL, '2026-05-19 03:19:02', '2026-05-19 03:19:02'),
(1236, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 167, 'App\\Models\\User', 3, '{\"attributes\":{\"nama_aset\":\"Kipas Angin\",\"jumlah\":1,\"kondisi\":\"Helyadi Beni Tandiono \\u2014 Tendik\",\"lokasi\":\"Ruangan Operator-Tata Usaha\"}}', NULL, '2026-05-19 03:20:38', '2026-05-19 03:20:38'),
(1237, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 168, 'App\\Models\\User', 3, '{\"attributes\":{\"nama_aset\":\"Printer Brother DCP-T310\",\"jumlah\":1,\"kondisi\":\"Helyadi Beni Tandiono \\u2014 Tendik\",\"lokasi\":\"Ruangan Operator-Tata Usaha\"}}', NULL, '2026-05-19 03:21:50', '2026-05-19 03:21:50'),
(1238, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 169, 'App\\Models\\User', 3, '{\"attributes\":{\"nama_aset\":\"Laptop Asus Vivobook\",\"jumlah\":1,\"kondisi\":\"Helyadi Beni Tandiono \\u2014 Tendik\",\"lokasi\":\"Ruangan Operator-Tata Usaha\"}}', NULL, '2026-05-19 06:17:47', '2026-05-19 06:17:47'),
(1239, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 170, 'App\\Models\\User', 3, '{\"attributes\":{\"nama_aset\":\"Laptop HP\",\"jumlah\":1,\"kondisi\":\"MARIA ULFAH, S.M \\u2014 Guru\",\"lokasi\":\"Ruangan Tata Usaha\"}}', NULL, '2026-05-19 06:19:09', '2026-05-19 06:19:09'),
(1240, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 171, 'App\\Models\\User', 3, '{\"attributes\":{\"nama_aset\":\"Lemari Berkas\",\"jumlah\":5,\"kondisi\":\"MARIA ULFAH, S.M \\u2014 Guru\",\"lokasi\":\"Ruangan Tata Usaha\"}}', NULL, '2026-05-19 06:21:36', '2026-05-19 06:21:36'),
(1241, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 172, 'App\\Models\\User', 3, '{\"attributes\":{\"nama_aset\":\"Lemari Piala\",\"jumlah\":1,\"kondisi\":\"DAUD GUNAWAN, S.E \\u2014 Guru\",\"lokasi\":\"Ruangan Kepala Sekolah\"}}', NULL, '2026-05-19 06:23:10', '2026-05-19 06:23:10'),
(1242, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 173, 'App\\Models\\User', 3, '{\"attributes\":{\"nama_aset\":\"Kursi Kerja\",\"jumlah\":1,\"kondisi\":\"DAUD GUNAWAN, S.E \\u2014 Guru\",\"lokasi\":\"Ruangan Kepala Sekolah\"}}', NULL, '2026-05-19 06:24:08', '2026-05-19 06:24:08'),
(1243, 'aset', 'aset created', 'App\\Models\\Aset', 'created', 174, 'App\\Models\\User', 3, '{\"attributes\":{\"nama_aset\":\"Meja Kerja\",\"jumlah\":1,\"kondisi\":\"DAUD GUNAWAN, S.E \\u2014 Guru\",\"lokasi\":\"Ruangan Kepala Sekolah\"}}', NULL, '2026-05-19 06:24:34', '2026-05-19 06:24:34'),
(1244, 'aset', 'aset updated', 'App\\Models\\Aset', 'updated', 165, 'App\\Models\\User', 3, '{\"attributes\":{\"kondisi\":\"RITA SURYANI,S.Pd \\u2014 Guru\"},\"old\":{\"kondisi\":\"Helyadi Beni Tandiono \\u2014 Tendik\"}}', NULL, '2026-05-19 06:27:18', '2026-05-19 06:27:18'),
(1245, 'default', 'created', 'App\\Models\\Barang', 'created', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":114,\"created_at\":\"2026-05-19T06:57:05.000000Z\",\"updated_at\":\"2026-05-19T06:57:05.000000Z\",\"kode_barang\":\"BRG-39483\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"deskripsi\":\"Amplop Putih Polos-Paperline\",\"gambar\":\"gambar-barang\\/47d6c9b3-743b-4279-ac29-427f5dced769.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 06:57:05', '2026-05-19 06:57:05'),
(1246, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T06:57:44.000000Z\",\"stok_minimum\":1},\"old\":{\"updated_at\":\"2026-05-19T06:57:05.000000Z\",\"stok_minimum\":5}}', NULL, '2026-05-19 06:57:44', '2026-05-19 06:57:44'),
(1247, 'default', 'created', 'App\\Models\\Barang', 'created', 115, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":115,\"created_at\":\"2026-05-19T06:58:41.000000Z\",\"updated_at\":\"2026-05-19T06:58:41.000000Z\",\"kode_barang\":\"BRG-78409\",\"nama_barang\":\"Baterai-Eveready\",\"deskripsi\":\"Baterai-Eveready Kecil\",\"gambar\":\"gambar-barang\\/c8395ac6-dc0b-41a2-869b-39a35b31f3da.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 06:58:41', '2026-05-19 06:58:41'),
(1248, 'default', 'created', 'App\\Models\\Barang', 'created', 116, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":116,\"created_at\":\"2026-05-19T06:59:28.000000Z\",\"updated_at\":\"2026-05-19T06:59:28.000000Z\",\"kode_barang\":\"BRG-02735\",\"nama_barang\":\"Tinta Spidol-Refill Ink\",\"deskripsi\":\"Tinta Spidol-Refill Ink\",\"gambar\":\"gambar-barang\\/2028376f-05cc-474d-94dc-d37fbbd9acb2.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 06:59:28', '2026-05-19 06:59:28'),
(1249, 'default', 'created', 'App\\Models\\Barang', 'created', 117, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":117,\"created_at\":\"2026-05-19T07:00:34.000000Z\",\"updated_at\":\"2026-05-19T07:00:34.000000Z\",\"kode_barang\":\"BRG-63713\",\"nama_barang\":\"Amplo Putih Polos Panjang-Paperline\",\"deskripsi\":\"Amplo Putih Polos Panjang-Paperline\",\"gambar\":\"gambar-barang\\/ffd312c7-cf1d-48bf-931a-efbfbc9850b2.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:00:34', '2026-05-19 07:00:34'),
(1250, 'default', 'created', 'App\\Models\\Barang', 'created', 118, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":118,\"created_at\":\"2026-05-19T07:01:53.000000Z\",\"updated_at\":\"2026-05-19T07:01:53.000000Z\",\"kode_barang\":\"BRG-97221\",\"nama_barang\":\"Amplop Putih Polos Panjang-Merpati\",\"deskripsi\":\"Amplop Putih Polos Panjang-Merpati\",\"gambar\":\"gambar-barang\\/af929184-d74e-446e-8e9a-87f6d4187516.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:01:53', '2026-05-19 07:01:53'),
(1251, 'default', 'created', 'App\\Models\\Barang', 'created', 119, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":119,\"created_at\":\"2026-05-19T07:03:25.000000Z\",\"updated_at\":\"2026-05-19T07:03:25.000000Z\",\"kode_barang\":\"BRG-98058\",\"nama_barang\":\"Lakban Hitam 2 Inc\",\"deskripsi\":\"Lakban Hitam 2 Inc\",\"gambar\":\"gambar-barang\\/5b872491-4da3-4663-8995-ad05657cf44c.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":36}}', NULL, '2026-05-19 07:03:25', '2026-05-19 07:03:25'),
(1252, 'default', 'created', 'App\\Models\\Barang', 'created', 120, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":120,\"created_at\":\"2026-05-19T07:04:27.000000Z\",\"updated_at\":\"2026-05-19T07:04:27.000000Z\",\"kode_barang\":\"BRG-40493\",\"nama_barang\":\"Lakban Hitam 1 Inch\",\"deskripsi\":\"Lakban Hitam 1 Inch\",\"gambar\":\"gambar-barang\\/15fbf8c9-0f8e-4766-bc28-7dbb3f78eda4.jpeg\",\"stok_minimum\":3,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":36}}', NULL, '2026-05-19 07:04:27', '2026-05-19 07:04:27'),
(1253, 'default', 'created', 'App\\Models\\Barang', 'created', 121, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":121,\"created_at\":\"2026-05-19T07:06:28.000000Z\",\"updated_at\":\"2026-05-19T07:06:28.000000Z\",\"kode_barang\":\"BRG-36158\",\"nama_barang\":\"Lakban Bening 1 Inch\",\"deskripsi\":\"Lakban Bening 1 Inch\",\"gambar\":\"gambar-barang\\/b409135f-5506-41ef-92bf-212d63bea756.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":36}}', NULL, '2026-05-19 07:06:28', '2026-05-19 07:06:28'),
(1254, 'default', 'created', 'App\\Models\\Barang', 'created', 122, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":122,\"created_at\":\"2026-05-19T07:07:39.000000Z\",\"updated_at\":\"2026-05-19T07:07:39.000000Z\",\"kode_barang\":\"BRG-62713\",\"nama_barang\":\"Double Tape 1 Inch\",\"deskripsi\":\"Double Tape 1 Inch\",\"gambar\":\"gambar-barang\\/8c3230e7-6b34-4233-a201-06f258a122c6.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":36}}', NULL, '2026-05-19 07:07:39', '2026-05-19 07:07:39'),
(1255, 'default', 'created', 'App\\Models\\Barang', 'created', 123, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":123,\"created_at\":\"2026-05-19T07:08:43.000000Z\",\"updated_at\":\"2026-05-19T07:08:43.000000Z\",\"kode_barang\":\"BRG-04332\",\"nama_barang\":\"Pena Tizo\",\"deskripsi\":\"Pena Tizo\",\"gambar\":\"gambar-barang\\/9cd6e15b-a659-4664-8690-01a1509aafb0.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:08:43', '2026-05-19 07:08:43'),
(1256, 'default', 'created', 'App\\Models\\Barang', 'created', 124, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":124,\"created_at\":\"2026-05-19T07:09:32.000000Z\",\"updated_at\":\"2026-05-19T07:09:32.000000Z\",\"kode_barang\":\"BRG-39801\",\"nama_barang\":\"Pena Kenko\",\"deskripsi\":\"Pena Kenko\",\"gambar\":\"gambar-barang\\/bc6c447c-2d69-4c60-b02f-960fdb3d38eb.jpeg\",\"stok_minimum\":0,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:09:32', '2026-05-19 07:09:32'),
(1257, 'default', 'created', 'App\\Models\\Barang', 'created', 125, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":125,\"created_at\":\"2026-05-19T07:10:11.000000Z\",\"updated_at\":\"2026-05-19T07:10:11.000000Z\",\"kode_barang\":\"BRG-36327\",\"nama_barang\":\"Clips Kenko\",\"deskripsi\":\"Clips Kenko\",\"gambar\":\"gambar-barang\\/18226651-f889-4b30-b307-640d9e79e338.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:10:11', '2026-05-19 07:10:11'),
(1258, 'default', 'created', 'App\\Models\\Barang', 'created', 126, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":126,\"created_at\":\"2026-05-19T07:12:26.000000Z\",\"updated_at\":\"2026-05-19T07:12:26.000000Z\",\"kode_barang\":\"BRG-72026\",\"nama_barang\":\"Hekter Kangaro_HS-10Y\",\"deskripsi\":\"Hekter Kangaro_HS-10Y\",\"gambar\":\"gambar-barang\\/924b9c0a-0964-4163-b486-ea7bf2054488.jpeg\",\"stok_minimum\":5,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":31}}', NULL, '2026-05-19 07:12:26', '2026-05-19 07:12:26'),
(1259, 'default', 'created', 'App\\Models\\Barang', 'created', 127, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":127,\"created_at\":\"2026-05-19T07:13:04.000000Z\",\"updated_at\":\"2026-05-19T07:13:04.000000Z\",\"kode_barang\":\"BRG-94204\",\"nama_barang\":\"Kalkulator-Joyko\",\"deskripsi\":\"Kalkulator-Joyko\",\"gambar\":\"gambar-barang\\/88d722a4-e0ce-47a7-b19b-11ba8b82d337.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":31}}', NULL, '2026-05-19 07:13:04', '2026-05-19 07:13:04'),
(1260, 'default', 'created', 'App\\Models\\Barang', 'created', 128, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":128,\"created_at\":\"2026-05-19T07:13:56.000000Z\",\"updated_at\":\"2026-05-19T07:13:56.000000Z\",\"kode_barang\":\"BRG-48027\",\"nama_barang\":\"Spidol Hitam\",\"deskripsi\":\"Spidol Hitam\",\"gambar\":\"gambar-barang\\/2c780f0e-a441-4b95-96d6-2782f3bc22bc.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:13:56', '2026-05-19 07:13:56'),
(1261, 'default', 'created', 'App\\Models\\Barang', 'created', 129, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":129,\"created_at\":\"2026-05-19T07:14:51.000000Z\",\"updated_at\":\"2026-05-19T07:14:51.000000Z\",\"kode_barang\":\"BRG-14499\",\"nama_barang\":\"Clips\\/Penjepit-Joyko\",\"deskripsi\":\"Clips\\/Penjepit-Joyko\",\"gambar\":\"gambar-barang\\/254aded5-3aab-49d1-add0-d90ad032d0af.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:14:51', '2026-05-19 07:14:51'),
(1262, 'default', 'created', 'App\\Models\\Barang', 'created', 130, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":130,\"created_at\":\"2026-05-19T07:15:55.000000Z\",\"updated_at\":\"2026-05-19T07:15:55.000000Z\",\"kode_barang\":\"BRG-42248\",\"nama_barang\":\"Penghapus Papan Tulis\",\"deskripsi\":\"Penghapus Papan Tulis\",\"gambar\":\"gambar-barang\\/8b9ee8d4-207c-4cd4-9c10-4e2ee32c4e7b.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":45}}', NULL, '2026-05-19 07:15:55', '2026-05-19 07:15:55'),
(1263, 'default', 'created', 'App\\Models\\Barang', 'created', 131, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":131,\"created_at\":\"2026-05-19T07:16:33.000000Z\",\"updated_at\":\"2026-05-19T07:16:33.000000Z\",\"kode_barang\":\"BRG-57005\",\"nama_barang\":\"Gunting\",\"deskripsi\":\"Gunting\",\"gambar\":\"gambar-barang\\/09a6e204-2bdd-4e47-ab9e-ca4f461ce3c2.jpeg\",\"stok_minimum\":3,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":31}}', NULL, '2026-05-19 07:16:33', '2026-05-19 07:16:33'),
(1264, 'default', 'created', 'App\\Models\\Barang', 'created', 132, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":132,\"created_at\":\"2026-05-19T07:17:19.000000Z\",\"updated_at\":\"2026-05-19T07:17:19.000000Z\",\"kode_barang\":\"BRG-05636\",\"nama_barang\":\"Kertas HVS-Natural\",\"deskripsi\":\"Kertas HVS-Natural\",\"gambar\":\"gambar-barang\\/e7354350-1c7f-4295-ba4d-1c80b8f90da6.jpeg\",\"stok_minimum\":3,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":34}}', NULL, '2026-05-19 07:17:19', '2026-05-19 07:17:19'),
(1265, 'default', 'created', 'App\\Models\\Barang', 'created', 133, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":133,\"created_at\":\"2026-05-19T07:19:18.000000Z\",\"updated_at\":\"2026-05-19T07:19:18.000000Z\",\"kode_barang\":\"BRG-52401\",\"nama_barang\":\"Refill Ink Printer-Kuning\",\"deskripsi\":\"Isi tinta printer brother-warna kuning\",\"gambar\":\"gambar-barang\\/fb800817-753f-42b7-ae7c-7ebb8479f531.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:19:18', '2026-05-19 07:19:18'),
(1266, 'default', 'created', 'App\\Models\\Barang', 'created', 134, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":134,\"created_at\":\"2026-05-19T07:20:41.000000Z\",\"updated_at\":\"2026-05-19T07:20:41.000000Z\",\"kode_barang\":\"BRG-99088\",\"nama_barang\":\"Refill Ink Printer-Cyan\",\"deskripsi\":\"Isi Tinta Printer Brother warna Cyan\",\"gambar\":\"gambar-barang\\/7ba05d7d-984e-4c46-bd31-6e66c9db35f2.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:20:41', '2026-05-19 07:20:41'),
(1267, 'default', 'created', 'App\\Models\\Barang', 'created', 135, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":135,\"created_at\":\"2026-05-19T07:21:21.000000Z\",\"updated_at\":\"2026-05-19T07:21:21.000000Z\",\"kode_barang\":\"BRG-09137\",\"nama_barang\":\"Refill Ink Printer-Hitam\",\"deskripsi\":\"Isi Tinta Printer Brother Warna Hitam\",\"gambar\":\"gambar-barang\\/3e490d1a-12de-4995-9726-6fede73775aa.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:21:21', '2026-05-19 07:21:21'),
(1268, 'default', 'created', 'App\\Models\\Barang', 'created', 136, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":136,\"created_at\":\"2026-05-19T07:22:26.000000Z\",\"updated_at\":\"2026-05-19T07:22:26.000000Z\",\"kode_barang\":\"BRG-69619\",\"nama_barang\":\"Refill Ink Printer-Magenta\",\"deskripsi\":\"Isi Tinta Printer Brother warna Magenta\",\"gambar\":\"gambar-barang\\/18ed979e-c594-4e48-aabb-c9610f872af3.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:22:26', '2026-05-19 07:22:26'),
(1269, 'default', 'created', 'App\\Models\\Barang', 'created', 137, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":137,\"created_at\":\"2026-05-19T07:23:47.000000Z\",\"updated_at\":\"2026-05-19T07:23:47.000000Z\",\"kode_barang\":\"BRG-11154\",\"nama_barang\":\"Pembolong Kertas-SunWell\",\"deskripsi\":\"Pembolong Kertas\",\"gambar\":\"gambar-barang\\/2671888e-4b65-4fcc-a10b-3139f4c9cc67.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":31}}', NULL, '2026-05-19 07:23:47', '2026-05-19 07:23:47'),
(1270, 'default', 'created', 'App\\Models\\Barang', 'created', 138, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":138,\"created_at\":\"2026-05-19T07:24:34.000000Z\",\"updated_at\":\"2026-05-19T07:24:34.000000Z\",\"kode_barang\":\"BRG-48869\",\"nama_barang\":\"Pembolong Kertas-Joyko\",\"deskripsi\":\"Pembolong Kertas\",\"gambar\":\"gambar-barang\\/3c78db16-a971-4f09-9b06-9f5ccefa6a0b.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":31}}', NULL, '2026-05-19 07:24:34', '2026-05-19 07:24:34'),
(1271, 'default', 'created', 'App\\Models\\Barang', 'created', 139, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":139,\"created_at\":\"2026-05-19T07:25:15.000000Z\",\"updated_at\":\"2026-05-19T07:25:15.000000Z\",\"kode_barang\":\"BRG-69394\",\"nama_barang\":\"Tissu Nice\",\"deskripsi\":\"Tissu Merek Nice\",\"gambar\":\"gambar-barang\\/3a2dc59f-fb9a-4167-a820-0b05cbc6edfc.jpeg\",\"stok_minimum\":0,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":31}}', NULL, '2026-05-19 07:25:15', '2026-05-19 07:25:15'),
(1272, 'default', 'created', 'App\\Models\\Barang', 'created', 140, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":140,\"created_at\":\"2026-05-19T07:28:06.000000Z\",\"updated_at\":\"2026-05-19T07:28:06.000000Z\",\"kode_barang\":\"BRG-27248\",\"nama_barang\":\"Refill Ink Printer Epson-Hitam\",\"deskripsi\":\"Refill Ink Printer Epson-Hitam\",\"gambar\":\"gambar-barang\\/fbe02e4e-4080-4386-9f62-6ab7540e8245.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:28:06', '2026-05-19 07:28:06'),
(1273, 'default', 'created', 'App\\Models\\Barang', 'created', 141, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":141,\"created_at\":\"2026-05-19T07:28:36.000000Z\",\"updated_at\":\"2026-05-19T07:28:36.000000Z\",\"kode_barang\":\"BRG-18344\",\"nama_barang\":\"Refill Ink Printer Epson-Kuning\",\"deskripsi\":\"Refill Ink Printer Epson-Kuning\",\"gambar\":\"gambar-barang\\/5fc5c9b4-39cf-4425-abee-c18b0c228919.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:28:36', '2026-05-19 07:28:36'),
(1274, 'default', 'created', 'App\\Models\\Barang', 'created', 142, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":142,\"created_at\":\"2026-05-19T07:29:19.000000Z\",\"updated_at\":\"2026-05-19T07:29:19.000000Z\",\"kode_barang\":\"BRG-71316\",\"nama_barang\":\"Refill Ink Printer Epson-Cyan\",\"deskripsi\":\"Refill Ink Printer Epson-Cyan\",\"gambar\":\"gambar-barang\\/20a9b821-8a0b-4544-9195-d32e121104f9.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:29:19', '2026-05-19 07:29:19'),
(1275, 'default', 'created', 'App\\Models\\Barang', 'created', 143, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":143,\"created_at\":\"2026-05-19T07:30:41.000000Z\",\"updated_at\":\"2026-05-19T07:30:41.000000Z\",\"kode_barang\":\"BRG-58074\",\"nama_barang\":\"Refill Ink Printer Epson-Magenta\",\"deskripsi\":\"Refill Ink Printer Epson-Magenta\",\"gambar\":\"gambar-barang\\/ac0c209a-9572-44b0-a5d1-c4c7f36614e6.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:30:41', '2026-05-19 07:30:41'),
(1276, 'default', 'created', 'App\\Models\\Barang', 'created', 144, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":144,\"created_at\":\"2026-05-19T07:31:38.000000Z\",\"updated_at\":\"2026-05-19T07:31:38.000000Z\",\"kode_barang\":\"BRG-63935\",\"nama_barang\":\"Bola Lampu 40 W-Visalux\",\"deskripsi\":\"Bola Lampu 40 W-Visalux\",\"gambar\":\"gambar-barang\\/7d981c1f-8a5b-4fc4-868f-9f2c61a6125a.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:31:38', '2026-05-19 07:31:38'),
(1277, 'default', 'created', 'App\\Models\\Barang', 'created', 145, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":145,\"created_at\":\"2026-05-19T07:32:44.000000Z\",\"updated_at\":\"2026-05-19T07:32:44.000000Z\",\"kode_barang\":\"BRG-87543\",\"nama_barang\":\"Bola Lampu 60 W-Visalux\",\"deskripsi\":\"Bola Lampu 60 W-Visalux\",\"gambar\":\"gambar-barang\\/Bola Lampu.jpeg\",\"stok_minimum\":0,\"stok\":0,\"user_id\":3,\"jenis_id\":51,\"satuan_id\":31}}', NULL, '2026-05-19 07:32:44', '2026-05-19 07:32:44'),
(1278, 'default', 'updated', 'App\\Models\\Barang', 'updated', 144, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T07:33:27.000000Z\",\"jenis_id\":61,\"satuan_id\":31},\"old\":{\"updated_at\":\"2026-05-19T07:31:38.000000Z\",\"jenis_id\":51,\"satuan_id\":35}}', NULL, '2026-05-19 07:33:27', '2026-05-19 07:33:27'),
(1279, 'default', 'updated', 'App\\Models\\Barang', 'updated', 139, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T07:34:07.000000Z\",\"stok_minimum\":1,\"jenis_id\":53},\"old\":{\"updated_at\":\"2026-05-19T07:25:15.000000Z\",\"stok_minimum\":0,\"jenis_id\":51}}', NULL, '2026-05-19 07:34:07', '2026-05-19 07:34:07'),
(1280, 'default', 'created', 'App\\Models\\Barang', 'created', 146, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":146,\"created_at\":\"2026-05-19T07:35:36.000000Z\",\"updated_at\":\"2026-05-19T07:35:36.000000Z\",\"kode_barang\":\"BRG-48710\",\"nama_barang\":\"Stella 50 ML\",\"deskripsi\":\"Pewangi Ruangan-Stella 50 ML\",\"gambar\":\"gambar-barang\\/Stella.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":53,\"satuan_id\":31}}', NULL, '2026-05-19 07:35:36', '2026-05-19 07:35:36'),
(1281, 'default', 'created', 'App\\Models\\Barang', 'created', 147, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":147,\"created_at\":\"2026-05-19T07:46:10.000000Z\",\"updated_at\":\"2026-05-19T07:46:10.000000Z\",\"kode_barang\":\"BRG-05415\",\"nama_barang\":\"Sabun Cuci Tangan-Clenso\",\"deskripsi\":\"Sabun Cuci Tangan-Clenso\",\"gambar\":\"gambar-barang\\/104ecc12-3e82-4b2d-a2c6-f132b25e686a.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":53,\"satuan_id\":31}}', NULL, '2026-05-19 07:46:10', '2026-05-19 07:46:10'),
(1282, 'default', 'created', 'App\\Models\\Barang', 'created', 148, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":148,\"created_at\":\"2026-05-19T07:48:07.000000Z\",\"updated_at\":\"2026-05-19T07:48:07.000000Z\",\"kode_barang\":\"BRG-63212\",\"nama_barang\":\"Sabun Pel Lantai SOS\",\"deskripsi\":\"Sabun Pel Lantai SOS\",\"gambar\":\"gambar-barang\\/50924c80-b179-4ce3-ae0b-b8ccb5f5da4f.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":53,\"satuan_id\":33}}', NULL, '2026-05-19 07:48:07', '2026-05-19 07:48:07'),
(1283, 'default', 'updated', 'App\\Models\\Barang', 'updated', 147, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T07:48:23.000000Z\",\"satuan_id\":33},\"old\":{\"updated_at\":\"2026-05-19T07:46:10.000000Z\",\"satuan_id\":31}}', NULL, '2026-05-19 07:48:23', '2026-05-19 07:48:23'),
(1284, 'default', 'created', 'App\\Models\\Barang', 'created', 149, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":149,\"created_at\":\"2026-05-19T07:55:30.000000Z\",\"updated_at\":\"2026-05-19T07:55:30.000000Z\",\"kode_barang\":\"BRG-73486\",\"nama_barang\":\"Pembersih Lantai Toilet-Three M\",\"deskripsi\":\"Pembersih Lantai Toilet-Three M\",\"gambar\":\"gambar-barang\\/3f5b532b-9141-42a2-a8c1-cb47b82beaf7.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":53,\"satuan_id\":33}}', NULL, '2026-05-19 07:55:30', '2026-05-19 07:55:30'),
(1285, 'default', 'created', 'App\\Models\\Barang', 'created', 150, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":150,\"created_at\":\"2026-05-19T07:56:13.000000Z\",\"updated_at\":\"2026-05-19T07:56:13.000000Z\",\"kode_barang\":\"BRG-86654\",\"nama_barang\":\"Pembersih Lantai Toilet-Starlight\",\"deskripsi\":\"Pembersih Lantai Toilet-Starlight\",\"gambar\":\"gambar-barang\\/1b167a1f-9964-4e42-af97-c163dcfc0a4a.jpeg\",\"stok_minimum\":1,\"stok\":0,\"user_id\":3,\"jenis_id\":53,\"satuan_id\":33}}', NULL, '2026-05-19 07:56:13', '2026-05-19 07:56:13'),
(1286, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 119, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":119,\"kode_transaksi\":\"TRX-IN-2026-5-19-0065\",\"tanggal_masuk\":\"2026-01-01\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"jumlah_masuk\":5,\"supplier_id\":40,\"user_id\":3,\"created_at\":\"2026-05-19T07:59:26.000000Z\",\"updated_at\":\"2026-05-19T07:59:26.000000Z\"}}', NULL, '2026-05-19 07:59:26', '2026-05-19 07:59:26'),
(1287, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T07:59:26.000000Z\",\"stok\":5},\"old\":{\"updated_at\":\"2026-05-19T06:57:44.000000Z\",\"stok\":0}}', NULL, '2026-05-19 07:59:26', '2026-05-19 07:59:26'),
(1288, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:03:56.000000Z\",\"stok_minimum\":5,\"satuan_id\":31},\"old\":{\"updated_at\":\"2026-05-19T07:59:26.000000Z\",\"stok_minimum\":1,\"satuan_id\":35}}', NULL, '2026-05-19 08:03:56', '2026-05-19 08:03:56'),
(1289, 'default', 'created', 'App\\Models\\Satuan', 'created', 59, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":59,\"created_at\":\"2026-05-19T08:05:01.000000Z\",\"updated_at\":\"2026-05-19T08:05:01.000000Z\",\"satuan\":\"Lembar\",\"user_id\":3}}', NULL, '2026-05-19 08:05:01', '2026-05-19 08:05:01'),
(1290, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:05:23.000000Z\",\"satuan_id\":59},\"old\":{\"updated_at\":\"2026-05-19T08:03:56.000000Z\",\"satuan_id\":31}}', NULL, '2026-05-19 08:05:23', '2026-05-19 08:05:23'),
(1291, 'default', 'deleted', 'App\\Models\\BarangMasuk', 'deleted', 119, 'App\\Models\\User', 3, '{\"old\":{\"id\":119,\"kode_transaksi\":\"TRX-IN-2026-5-19-0065\",\"tanggal_masuk\":\"2026-01-01\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"jumlah_masuk\":5,\"supplier_id\":40,\"user_id\":3,\"created_at\":\"2026-05-19T07:59:26.000000Z\",\"updated_at\":\"2026-05-19T07:59:26.000000Z\"}}', NULL, '2026-05-19 08:06:26', '2026-05-19 08:06:26'),
(1292, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:06:26.000000Z\",\"stok\":0},\"old\":{\"updated_at\":\"2026-05-19T08:05:23.000000Z\",\"stok\":5}}', NULL, '2026-05-19 08:06:26', '2026-05-19 08:06:26'),
(1293, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 120, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":120,\"kode_transaksi\":\"TRX-IN-2026-5-19-4315\",\"tanggal_masuk\":\"2026-01-01\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"jumlah_masuk\":500,\"supplier_id\":32,\"user_id\":3,\"created_at\":\"2026-05-19T08:07:07.000000Z\",\"updated_at\":\"2026-05-19T08:07:07.000000Z\"}}', NULL, '2026-05-19 08:07:07', '2026-05-19 08:07:07'),
(1294, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:07:07.000000Z\",\"stok\":500},\"old\":{\"updated_at\":\"2026-05-19T08:06:26.000000Z\",\"stok\":0}}', NULL, '2026-05-19 08:07:07', '2026-05-19 08:07:07'),
(1295, 'default', 'deleted', 'App\\Models\\BarangMasuk', 'deleted', 120, 'App\\Models\\User', 3, '{\"old\":{\"id\":120,\"kode_transaksi\":\"TRX-IN-2026-5-19-4315\",\"tanggal_masuk\":\"2026-01-01\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"jumlah_masuk\":500,\"supplier_id\":32,\"user_id\":3,\"created_at\":\"2026-05-19T08:07:07.000000Z\",\"updated_at\":\"2026-05-19T08:07:07.000000Z\"}}', NULL, '2026-05-19 08:26:52', '2026-05-19 08:26:52'),
(1296, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:26:52.000000Z\",\"stok\":0},\"old\":{\"updated_at\":\"2026-05-19T08:07:07.000000Z\",\"stok\":500}}', NULL, '2026-05-19 08:26:52', '2026-05-19 08:26:52'),
(1297, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:27:38.000000Z\",\"satuan_id\":35},\"old\":{\"updated_at\":\"2026-05-19T08:26:52.000000Z\",\"satuan_id\":59}}', NULL, '2026-05-19 08:27:38', '2026-05-19 08:27:38'),
(1298, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 121, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":121,\"kode_transaksi\":\"TRX-IN-2026-5-19-3377\",\"tanggal_masuk\":\"2026-06-01\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"jumlah_masuk\":5,\"supplier_id\":32,\"user_id\":3,\"created_at\":\"2026-05-19T08:27:58.000000Z\",\"updated_at\":\"2026-05-19T08:27:58.000000Z\"}}', NULL, '2026-05-19 08:27:58', '2026-05-19 08:27:58'),
(1299, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:27:58.000000Z\",\"stok\":5},\"old\":{\"updated_at\":\"2026-05-19T08:27:38.000000Z\",\"stok\":0}}', NULL, '2026-05-19 08:27:58', '2026-05-19 08:27:58'),
(1300, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 122, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":122,\"kode_transaksi\":\"TRX-IN-2026-5-19-8446\",\"tanggal_masuk\":\"2026-06-01\",\"nama_barang\":\"Baterai-Eveready\",\"jumlah_masuk\":1,\"supplier_id\":32,\"user_id\":3,\"created_at\":\"2026-05-19T08:37:07.000000Z\",\"updated_at\":\"2026-05-19T08:37:07.000000Z\"}}', NULL, '2026-05-19 08:37:07', '2026-05-19 08:37:07'),
(1301, 'default', 'updated', 'App\\Models\\Barang', 'updated', 115, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:37:07.000000Z\",\"stok\":1},\"old\":{\"updated_at\":\"2026-05-19T06:58:41.000000Z\",\"stok\":0}}', NULL, '2026-05-19 08:37:07', '2026-05-19 08:37:07'),
(1302, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 123, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":123,\"kode_transaksi\":\"TRX-IN-2026-5-19-0333\",\"tanggal_masuk\":\"2026-05-19\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"jumlah_masuk\":5,\"supplier_id\":32,\"user_id\":3,\"created_at\":\"2026-05-19T08:38:06.000000Z\",\"updated_at\":\"2026-05-19T08:38:06.000000Z\"}}', NULL, '2026-05-19 08:38:06', '2026-05-19 08:38:06'),
(1303, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:38:06.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-05-19T08:27:58.000000Z\",\"stok\":5}}', NULL, '2026-05-19 08:38:06', '2026-05-19 08:38:06'),
(1304, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 79, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":79,\"kode_transaksi\":\"TRX-OUT-2026-05-19-2960\",\"tanggal_keluar\":\"2026-05-19\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"jumlah_keluar\":3,\"customer_id\":31,\"user_id\":3,\"created_at\":\"2026-05-19T08:38:22.000000Z\",\"updated_at\":\"2026-05-19T08:38:22.000000Z\"}}', NULL, '2026-05-19 08:38:22', '2026-05-19 08:38:22'),
(1305, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:38:22.000000Z\",\"stok\":7},\"old\":{\"updated_at\":\"2026-05-19T08:38:06.000000Z\",\"stok\":10}}', NULL, '2026-05-19 08:38:22', '2026-05-19 08:38:22'),
(1306, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 80, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":80,\"kode_transaksi\":\"TRX-OUT-2026-05-19-8509\",\"tanggal_keluar\":\"2026-05-19\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"jumlah_keluar\":1,\"customer_id\":31,\"user_id\":3,\"created_at\":\"2026-05-19T08:40:33.000000Z\",\"updated_at\":\"2026-05-19T08:40:33.000000Z\"}}', NULL, '2026-05-19 08:40:33', '2026-05-19 08:40:33'),
(1307, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-19T08:40:33.000000Z\",\"stok\":6},\"old\":{\"updated_at\":\"2026-05-19T08:38:22.000000Z\",\"stok\":7}}', NULL, '2026-05-19 08:40:33', '2026-05-19 08:40:33'),
(1318, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 124, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":124,\"kode_transaksi\":\"TRX-IN-2026-5-20-0901\",\"tanggal_masuk\":\"2026-01-01\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"jumlah_masuk\":10,\"supplier_id\":32,\"user_id\":3,\"created_at\":\"2026-05-20T06:09:27.000000Z\",\"updated_at\":\"2026-05-20T06:09:27.000000Z\"}}', NULL, '2026-05-20 06:09:27', '2026-05-20 06:09:27'),
(1319, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:09:27.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-05-20T06:07:08.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:09:27', '2026-05-20 06:09:27'),
(1320, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:09:58.000000Z\",\"stok_minimum\":1},\"old\":{\"updated_at\":\"2026-05-20T06:09:27.000000Z\",\"stok_minimum\":5}}', NULL, '2026-05-20 06:09:58', '2026-05-20 06:09:58'),
(1321, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 125, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":125,\"kode_transaksi\":\"TRX-IN-2026-5-20-9978\",\"tanggal_masuk\":\"2026-01-01\",\"nama_barang\":\"Baterai-Eveready\",\"jumlah_masuk\":20,\"supplier_id\":32,\"user_id\":3,\"created_at\":\"2026-05-20T06:10:59.000000Z\",\"updated_at\":\"2026-05-20T06:10:59.000000Z\"}}', NULL, '2026-05-20 06:11:00', '2026-05-20 06:11:00'),
(1322, 'default', 'updated', 'App\\Models\\Barang', 'updated', 115, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:11:00.000000Z\",\"stok\":20},\"old\":{\"updated_at\":\"2026-05-20T06:03:32.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:11:00', '2026-05-20 06:11:00'),
(1323, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 126, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":126,\"kode_transaksi\":\"TRX-IN-2026-5-20-2782\",\"tanggal_masuk\":\"2026-01-01\",\"nama_barang\":\"Tinta Spidol-Refill Ink\",\"jumlah_masuk\":15,\"supplier_id\":37,\"user_id\":3,\"created_at\":\"2026-05-20T06:12:28.000000Z\",\"updated_at\":\"2026-05-20T06:12:28.000000Z\"}}', NULL, '2026-05-20 06:12:28', '2026-05-20 06:12:28'),
(1324, 'default', 'updated', 'App\\Models\\Barang', 'updated', 116, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:12:28.000000Z\",\"stok\":15},\"old\":{\"updated_at\":\"2026-05-19T06:59:28.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:12:28', '2026-05-20 06:12:28'),
(1325, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 127, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":127,\"kode_transaksi\":\"TRX-IN-2026-5-20-3808\",\"tanggal_masuk\":\"2026-01-07\",\"nama_barang\":\"Amplo Putih Polos Panjang-Paperline\",\"jumlah_masuk\":20,\"supplier_id\":38,\"user_id\":3,\"created_at\":\"2026-05-20T06:12:54.000000Z\",\"updated_at\":\"2026-05-20T06:12:54.000000Z\"}}', NULL, '2026-05-20 06:12:54', '2026-05-20 06:12:54'),
(1326, 'default', 'updated', 'App\\Models\\Barang', 'updated', 117, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:12:54.000000Z\",\"stok\":20},\"old\":{\"updated_at\":\"2026-05-19T07:00:34.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:12:54', '2026-05-20 06:12:54'),
(1327, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 128, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":128,\"kode_transaksi\":\"TRX-IN-2026-5-20-6078\",\"tanggal_masuk\":\"2026-02-10\",\"nama_barang\":\"Amplop Putih Polos Panjang-Merpati\",\"jumlah_masuk\":10,\"supplier_id\":40,\"user_id\":3,\"created_at\":\"2026-05-20T06:13:42.000000Z\",\"updated_at\":\"2026-05-20T06:13:42.000000Z\"}}', NULL, '2026-05-20 06:13:42', '2026-05-20 06:13:42'),
(1328, 'default', 'updated', 'App\\Models\\Barang', 'updated', 118, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:13:42.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-05-19T07:01:53.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:13:42', '2026-05-20 06:13:42'),
(1329, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 129, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":129,\"kode_transaksi\":\"TRX-IN-2026-5-20-6467\",\"tanggal_masuk\":\"2026-03-25\",\"nama_barang\":\"Lakban Hitam 2 Inc\",\"jumlah_masuk\":20,\"supplier_id\":41,\"user_id\":3,\"created_at\":\"2026-05-20T06:14:02.000000Z\",\"updated_at\":\"2026-05-20T06:14:02.000000Z\"}}', NULL, '2026-05-20 06:14:02', '2026-05-20 06:14:02'),
(1330, 'default', 'updated', 'App\\Models\\Barang', 'updated', 119, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:14:02.000000Z\",\"stok\":20},\"old\":{\"updated_at\":\"2026-05-19T07:03:25.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:14:02', '2026-05-20 06:14:02'),
(1331, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 130, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":130,\"kode_transaksi\":\"TRX-IN-2026-5-20-3699\",\"tanggal_masuk\":\"2026-04-01\",\"nama_barang\":\"Double Tape 1 Inch\",\"jumlah_masuk\":10,\"supplier_id\":41,\"user_id\":3,\"created_at\":\"2026-05-20T06:15:19.000000Z\",\"updated_at\":\"2026-05-20T06:15:19.000000Z\"}}', NULL, '2026-05-20 06:15:19', '2026-05-20 06:15:19'),
(1332, 'default', 'updated', 'App\\Models\\Barang', 'updated', 122, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:15:19.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-05-19T07:07:39.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:15:19', '2026-05-20 06:15:19'),
(1333, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 131, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":131,\"kode_transaksi\":\"TRX-IN-2026-5-20-2582\",\"tanggal_masuk\":\"2026-04-01\",\"nama_barang\":\"Pembolong Kertas-SunWell\",\"jumlah_masuk\":10,\"supplier_id\":43,\"user_id\":3,\"created_at\":\"2026-05-20T06:15:54.000000Z\",\"updated_at\":\"2026-05-20T06:15:54.000000Z\"}}', NULL, '2026-05-20 06:15:54', '2026-05-20 06:15:54'),
(1334, 'default', 'updated', 'App\\Models\\Barang', 'updated', 137, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:15:54.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-05-19T07:23:47.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:15:54', '2026-05-20 06:15:54'),
(1335, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 132, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":132,\"kode_transaksi\":\"TRX-IN-2026-5-20-4503\",\"tanggal_masuk\":\"2026-05-01\",\"nama_barang\":\"Kertas HVS-Natural\",\"jumlah_masuk\":25,\"supplier_id\":40,\"user_id\":3,\"created_at\":\"2026-05-20T06:17:14.000000Z\",\"updated_at\":\"2026-05-20T06:17:14.000000Z\"}}', NULL, '2026-05-20 06:17:14', '2026-05-20 06:17:14'),
(1336, 'default', 'updated', 'App\\Models\\Barang', 'updated', 132, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:17:14.000000Z\",\"stok\":25},\"old\":{\"updated_at\":\"2026-05-19T07:17:19.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:17:14', '2026-05-20 06:17:14'),
(1337, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 133, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":133,\"kode_transaksi\":\"TRX-IN-2026-5-20-1619\",\"tanggal_masuk\":\"2025-01-30\",\"nama_barang\":\"Kalkulator-Joyko\",\"jumlah_masuk\":15,\"supplier_id\":32,\"user_id\":3,\"created_at\":\"2026-05-20T06:18:22.000000Z\",\"updated_at\":\"2026-05-20T06:18:22.000000Z\"}}', NULL, '2026-05-20 06:18:22', '2026-05-20 06:18:22'),
(1338, 'default', 'updated', 'App\\Models\\Barang', 'updated', 127, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:18:22.000000Z\",\"stok\":15},\"old\":{\"updated_at\":\"2026-05-19T07:13:04.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:18:22', '2026-05-20 06:18:22'),
(1339, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 134, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":134,\"kode_transaksi\":\"TRX-IN-2026-5-20-3134\",\"tanggal_masuk\":\"2025-01-30\",\"nama_barang\":\"Spidol Hitam\",\"jumlah_masuk\":15,\"supplier_id\":32,\"user_id\":3,\"created_at\":\"2026-05-20T06:18:42.000000Z\",\"updated_at\":\"2026-05-20T06:18:42.000000Z\"}}', NULL, '2026-05-20 06:18:42', '2026-05-20 06:18:42'),
(1340, 'default', 'updated', 'App\\Models\\Barang', 'updated', 128, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:18:42.000000Z\",\"stok\":15},\"old\":{\"updated_at\":\"2026-05-19T07:13:56.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:18:42', '2026-05-20 06:18:42'),
(1341, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 135, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":135,\"kode_transaksi\":\"TRX-IN-2026-5-20-0831\",\"tanggal_masuk\":\"2025-03-26\",\"nama_barang\":\"Pembersih Lantai Toilet-Starlight\",\"jumlah_masuk\":10,\"supplier_id\":32,\"user_id\":3,\"created_at\":\"2026-05-20T06:19:00.000000Z\",\"updated_at\":\"2026-05-20T06:19:00.000000Z\"}}', NULL, '2026-05-20 06:19:00', '2026-05-20 06:19:00'),
(1342, 'default', 'updated', 'App\\Models\\Barang', 'updated', 150, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:19:00.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-05-19T07:56:13.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:19:00', '2026-05-20 06:19:00'),
(1343, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 136, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":136,\"kode_transaksi\":\"TRX-IN-2026-5-20-5604\",\"tanggal_masuk\":\"2025-03-26\",\"nama_barang\":\"Pembersih Lantai Toilet-Three M\",\"jumlah_masuk\":5,\"supplier_id\":35,\"user_id\":3,\"created_at\":\"2026-05-20T06:19:20.000000Z\",\"updated_at\":\"2026-05-20T06:19:20.000000Z\"}}', NULL, '2026-05-20 06:19:20', '2026-05-20 06:19:20'),
(1344, 'default', 'updated', 'App\\Models\\Barang', 'updated', 149, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:19:20.000000Z\",\"stok\":5},\"old\":{\"updated_at\":\"2026-05-19T07:55:30.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:19:20', '2026-05-20 06:19:20'),
(1345, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 137, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":137,\"kode_transaksi\":\"TRX-IN-2026-5-20-6489\",\"tanggal_masuk\":\"2025-03-26\",\"nama_barang\":\"Sabun Pel Lantai SOS\",\"jumlah_masuk\":17,\"supplier_id\":36,\"user_id\":3,\"created_at\":\"2026-05-20T06:19:37.000000Z\",\"updated_at\":\"2026-05-20T06:19:37.000000Z\"}}', NULL, '2026-05-20 06:19:37', '2026-05-20 06:19:37'),
(1346, 'default', 'updated', 'App\\Models\\Barang', 'updated', 148, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:19:37.000000Z\",\"stok\":17},\"old\":{\"updated_at\":\"2026-05-19T07:48:07.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:19:37', '2026-05-20 06:19:37'),
(1347, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 138, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":138,\"kode_transaksi\":\"TRX-IN-2026-5-20-8488\",\"tanggal_masuk\":\"2025-03-26\",\"nama_barang\":\"Bola Lampu 60 W-Visalux\",\"jumlah_masuk\":25,\"supplier_id\":36,\"user_id\":3,\"created_at\":\"2026-05-20T06:19:54.000000Z\",\"updated_at\":\"2026-05-20T06:19:54.000000Z\"}}', NULL, '2026-05-20 06:19:54', '2026-05-20 06:19:54'),
(1348, 'default', 'updated', 'App\\Models\\Barang', 'updated', 145, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:19:54.000000Z\",\"stok\":25},\"old\":{\"updated_at\":\"2026-05-19T07:32:44.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:19:54', '2026-05-20 06:19:54'),
(1349, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 139, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":139,\"kode_transaksi\":\"TRX-IN-2026-5-20-7267\",\"tanggal_masuk\":\"2025-06-19\",\"nama_barang\":\"Bola Lampu 40 W-Visalux\",\"jumlah_masuk\":21,\"supplier_id\":42,\"user_id\":3,\"created_at\":\"2026-05-20T06:20:12.000000Z\",\"updated_at\":\"2026-05-20T06:20:12.000000Z\"}}', NULL, '2026-05-20 06:20:12', '2026-05-20 06:20:12'),
(1350, 'default', 'updated', 'App\\Models\\Barang', 'updated', 144, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:20:12.000000Z\",\"stok\":21},\"old\":{\"updated_at\":\"2026-05-19T07:33:27.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:20:12', '2026-05-20 06:20:12'),
(1351, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 140, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":140,\"kode_transaksi\":\"TRX-IN-2026-5-20-0485\",\"tanggal_masuk\":\"2025-07-31\",\"nama_barang\":\"Refill Ink Printer Epson-Magenta\",\"jumlah_masuk\":23,\"supplier_id\":42,\"user_id\":3,\"created_at\":\"2026-05-20T06:20:32.000000Z\",\"updated_at\":\"2026-05-20T06:20:32.000000Z\"}}', NULL, '2026-05-20 06:20:32', '2026-05-20 06:20:32'),
(1352, 'default', 'updated', 'App\\Models\\Barang', 'updated', 143, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:20:32.000000Z\",\"stok\":23},\"old\":{\"updated_at\":\"2026-05-19T07:30:41.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:20:32', '2026-05-20 06:20:32'),
(1353, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 141, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":141,\"kode_transaksi\":\"TRX-IN-2026-5-20-6682\",\"tanggal_masuk\":\"2025-08-25\",\"nama_barang\":\"Refill Ink Printer Epson-Kuning\",\"jumlah_masuk\":22,\"supplier_id\":40,\"user_id\":3,\"created_at\":\"2026-05-20T06:20:49.000000Z\",\"updated_at\":\"2026-05-20T06:20:49.000000Z\"}}', NULL, '2026-05-20 06:20:49', '2026-05-20 06:20:49'),
(1354, 'default', 'updated', 'App\\Models\\Barang', 'updated', 141, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:20:49.000000Z\",\"stok\":22},\"old\":{\"updated_at\":\"2026-05-19T07:28:36.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:20:49', '2026-05-20 06:20:49'),
(1355, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 142, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":142,\"kode_transaksi\":\"TRX-IN-2026-5-20-9504\",\"tanggal_masuk\":\"2025-02-26\",\"nama_barang\":\"Pena Tizo\",\"jumlah_masuk\":12,\"supplier_id\":40,\"user_id\":3,\"created_at\":\"2026-05-20T06:22:43.000000Z\",\"updated_at\":\"2026-05-20T06:22:43.000000Z\"}}', NULL, '2026-05-20 06:22:43', '2026-05-20 06:22:43'),
(1356, 'default', 'updated', 'App\\Models\\Barang', 'updated', 123, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:22:43.000000Z\",\"stok\":12},\"old\":{\"updated_at\":\"2026-05-19T07:08:43.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:22:43', '2026-05-20 06:22:43'),
(1357, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 143, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":143,\"kode_transaksi\":\"TRX-IN-2026-5-20-2957\",\"tanggal_masuk\":\"2025-04-30\",\"nama_barang\":\"Lakban Hitam 2 Inc\",\"jumlah_masuk\":14,\"supplier_id\":34,\"user_id\":3,\"created_at\":\"2026-05-20T06:24:03.000000Z\",\"updated_at\":\"2026-05-20T06:24:03.000000Z\"}}', NULL, '2026-05-20 06:24:03', '2026-05-20 06:24:03'),
(1358, 'default', 'updated', 'App\\Models\\Barang', 'updated', 119, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:24:03.000000Z\",\"stok\":34},\"old\":{\"updated_at\":\"2026-05-20T06:14:02.000000Z\",\"stok\":20}}', NULL, '2026-05-20 06:24:03', '2026-05-20 06:24:03'),
(1359, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 144, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":144,\"kode_transaksi\":\"TRX-IN-2026-5-20-5591\",\"tanggal_masuk\":\"2025-05-12\",\"nama_barang\":\"Clips Kenko\",\"jumlah_masuk\":21,\"supplier_id\":33,\"user_id\":3,\"created_at\":\"2026-05-20T06:24:40.000000Z\",\"updated_at\":\"2026-05-20T06:24:40.000000Z\"}}', NULL, '2026-05-20 06:24:40', '2026-05-20 06:24:40'),
(1360, 'default', 'updated', 'App\\Models\\Barang', 'updated', 125, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:24:40.000000Z\",\"stok\":21},\"old\":{\"updated_at\":\"2026-05-19T07:10:11.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:24:40', '2026-05-20 06:24:40'),
(1361, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 145, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":145,\"kode_transaksi\":\"TRX-IN-2026-5-20-1680\",\"tanggal_masuk\":\"2025-09-08\",\"nama_barang\":\"Gunting\",\"jumlah_masuk\":20,\"supplier_id\":35,\"user_id\":3,\"created_at\":\"2026-05-20T06:25:38.000000Z\",\"updated_at\":\"2026-05-20T06:25:38.000000Z\"}}', NULL, '2026-05-20 06:25:38', '2026-05-20 06:25:38'),
(1362, 'default', 'updated', 'App\\Models\\Barang', 'updated', 131, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:25:38.000000Z\",\"stok\":20},\"old\":{\"updated_at\":\"2026-05-19T07:16:33.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:25:38', '2026-05-20 06:25:38'),
(1363, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 146, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":146,\"kode_transaksi\":\"TRX-IN-2026-5-20-1212\",\"tanggal_masuk\":\"2025-10-26\",\"nama_barang\":\"Hekter Kangaro_HS-10Y\",\"jumlah_masuk\":25,\"supplier_id\":44,\"user_id\":3,\"created_at\":\"2026-05-20T06:26:21.000000Z\",\"updated_at\":\"2026-05-20T06:26:21.000000Z\"}}', NULL, '2026-05-20 06:26:21', '2026-05-20 06:26:21');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1364, 'default', 'updated', 'App\\Models\\Barang', 'updated', 126, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:26:21.000000Z\",\"stok\":25},\"old\":{\"updated_at\":\"2026-05-19T07:12:26.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:26:21', '2026-05-20 06:26:21'),
(1365, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 147, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":147,\"kode_transaksi\":\"TRX-IN-2026-5-20-2628\",\"tanggal_masuk\":\"2025-11-01\",\"nama_barang\":\"Refill Ink Printer-Kuning\",\"jumlah_masuk\":16,\"supplier_id\":37,\"user_id\":3,\"created_at\":\"2026-05-20T06:27:04.000000Z\",\"updated_at\":\"2026-05-20T06:27:04.000000Z\"}}', NULL, '2026-05-20 06:27:04', '2026-05-20 06:27:04'),
(1366, 'default', 'updated', 'App\\Models\\Barang', 'updated', 133, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:27:04.000000Z\",\"stok\":16},\"old\":{\"updated_at\":\"2026-05-19T07:19:18.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:27:04', '2026-05-20 06:27:04'),
(1367, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 148, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":148,\"kode_transaksi\":\"TRX-IN-2026-5-20-0677\",\"tanggal_masuk\":\"2025-12-17\",\"nama_barang\":\"Lakban Bening 1 Inch\",\"jumlah_masuk\":17,\"supplier_id\":47,\"user_id\":3,\"created_at\":\"2026-05-20T06:27:47.000000Z\",\"updated_at\":\"2026-05-20T06:27:47.000000Z\"}}', NULL, '2026-05-20 06:27:47', '2026-05-20 06:27:47'),
(1368, 'default', 'updated', 'App\\Models\\Barang', 'updated', 121, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:27:47.000000Z\",\"stok\":17},\"old\":{\"updated_at\":\"2026-05-19T07:06:28.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:27:47', '2026-05-20 06:27:47'),
(1369, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 149, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":149,\"kode_transaksi\":\"TRX-IN-2026-5-20-2972\",\"tanggal_masuk\":\"2024-01-10\",\"nama_barang\":\"Sabun Cuci Tangan-Clenso\",\"jumlah_masuk\":13,\"supplier_id\":36,\"user_id\":3,\"created_at\":\"2026-05-20T06:30:18.000000Z\",\"updated_at\":\"2026-05-20T06:30:18.000000Z\"}}', NULL, '2026-05-20 06:30:18', '2026-05-20 06:30:18'),
(1370, 'default', 'updated', 'App\\Models\\Barang', 'updated', 147, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:30:18.000000Z\",\"stok\":13},\"old\":{\"updated_at\":\"2026-05-19T07:48:23.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:30:18', '2026-05-20 06:30:18'),
(1371, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 150, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":150,\"kode_transaksi\":\"TRX-IN-2026-5-20-2986\",\"tanggal_masuk\":\"2024-02-21\",\"nama_barang\":\"Stella 50 ML\",\"jumlah_masuk\":12,\"supplier_id\":38,\"user_id\":3,\"created_at\":\"2026-05-20T06:30:35.000000Z\",\"updated_at\":\"2026-05-20T06:30:35.000000Z\"}}', NULL, '2026-05-20 06:30:35', '2026-05-20 06:30:35'),
(1372, 'default', 'updated', 'App\\Models\\Barang', 'updated', 146, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:30:35.000000Z\",\"stok\":12},\"old\":{\"updated_at\":\"2026-05-19T07:35:36.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:30:35', '2026-05-20 06:30:35'),
(1373, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 151, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":151,\"kode_transaksi\":\"TRX-IN-2026-5-20-4845\",\"tanggal_masuk\":\"2024-02-21\",\"nama_barang\":\"Refill Ink Printer Epson-Cyan\",\"jumlah_masuk\":19,\"supplier_id\":44,\"user_id\":3,\"created_at\":\"2026-05-20T06:31:03.000000Z\",\"updated_at\":\"2026-05-20T06:31:03.000000Z\"}}', NULL, '2026-05-20 06:31:03', '2026-05-20 06:31:03'),
(1374, 'default', 'updated', 'App\\Models\\Barang', 'updated', 142, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:31:03.000000Z\",\"stok\":19},\"old\":{\"updated_at\":\"2026-05-19T07:29:19.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:31:03', '2026-05-20 06:31:03'),
(1375, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 152, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":152,\"kode_transaksi\":\"TRX-IN-2026-5-20-2114\",\"tanggal_masuk\":\"2024-02-21\",\"nama_barang\":\"Refill Ink Printer Epson-Hitam\",\"jumlah_masuk\":27,\"supplier_id\":43,\"user_id\":3,\"created_at\":\"2026-05-20T06:31:20.000000Z\",\"updated_at\":\"2026-05-20T06:31:20.000000Z\"}}', NULL, '2026-05-20 06:31:20', '2026-05-20 06:31:20'),
(1376, 'default', 'updated', 'App\\Models\\Barang', 'updated', 140, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:31:20.000000Z\",\"stok\":27},\"old\":{\"updated_at\":\"2026-05-19T07:28:06.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:31:20', '2026-05-20 06:31:20'),
(1377, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 153, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":153,\"kode_transaksi\":\"TRX-IN-2026-5-20-9068\",\"tanggal_masuk\":\"2024-02-21\",\"nama_barang\":\"Tissu Nice\",\"jumlah_masuk\":25,\"supplier_id\":43,\"user_id\":3,\"created_at\":\"2026-05-20T06:31:34.000000Z\",\"updated_at\":\"2026-05-20T06:31:34.000000Z\"}}', NULL, '2026-05-20 06:31:34', '2026-05-20 06:31:34'),
(1378, 'default', 'updated', 'App\\Models\\Barang', 'updated', 139, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:31:34.000000Z\",\"stok\":25},\"old\":{\"updated_at\":\"2026-05-19T07:34:07.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:31:34', '2026-05-20 06:31:34'),
(1379, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 154, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":154,\"kode_transaksi\":\"TRX-IN-2026-5-20-0054\",\"tanggal_masuk\":\"2024-06-08\",\"nama_barang\":\"Pembolong Kertas-Joyko\",\"jumlah_masuk\":14,\"supplier_id\":47,\"user_id\":3,\"created_at\":\"2026-05-20T06:31:58.000000Z\",\"updated_at\":\"2026-05-20T06:31:58.000000Z\"}}', NULL, '2026-05-20 06:31:58', '2026-05-20 06:31:58'),
(1380, 'default', 'updated', 'App\\Models\\Barang', 'updated', 138, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:31:58.000000Z\",\"stok\":14},\"old\":{\"updated_at\":\"2026-05-19T07:24:34.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:31:58', '2026-05-20 06:31:58'),
(1381, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 155, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":155,\"kode_transaksi\":\"TRX-IN-2026-5-20-4320\",\"tanggal_masuk\":\"2024-06-08\",\"nama_barang\":\"Refill Ink Printer-Magenta\",\"jumlah_masuk\":14,\"supplier_id\":41,\"user_id\":3,\"created_at\":\"2026-05-20T06:32:21.000000Z\",\"updated_at\":\"2026-05-20T06:32:21.000000Z\"}}', NULL, '2026-05-20 06:32:21', '2026-05-20 06:32:21'),
(1382, 'default', 'updated', 'App\\Models\\Barang', 'updated', 136, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:32:21.000000Z\",\"stok\":14},\"old\":{\"updated_at\":\"2026-05-19T07:22:26.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:32:21', '2026-05-20 06:32:21'),
(1383, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 156, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":156,\"kode_transaksi\":\"TRX-IN-2026-5-20-1541\",\"tanggal_masuk\":\"2024-08-15\",\"nama_barang\":\"Refill Ink Printer-Hitam\",\"jumlah_masuk\":11,\"supplier_id\":44,\"user_id\":3,\"created_at\":\"2026-05-20T06:32:38.000000Z\",\"updated_at\":\"2026-05-20T06:32:38.000000Z\"}}', NULL, '2026-05-20 06:32:38', '2026-05-20 06:32:38'),
(1384, 'default', 'updated', 'App\\Models\\Barang', 'updated', 135, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:32:38.000000Z\",\"stok\":11},\"old\":{\"updated_at\":\"2026-05-19T07:21:21.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:32:38', '2026-05-20 06:32:38'),
(1385, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 157, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":157,\"kode_transaksi\":\"TRX-IN-2026-5-20-9831\",\"tanggal_masuk\":\"2024-09-05\",\"nama_barang\":\"Refill Ink Printer-Cyan\",\"jumlah_masuk\":12,\"supplier_id\":38,\"user_id\":3,\"created_at\":\"2026-05-20T06:32:54.000000Z\",\"updated_at\":\"2026-05-20T06:32:54.000000Z\"}}', NULL, '2026-05-20 06:32:54', '2026-05-20 06:32:54'),
(1386, 'default', 'updated', 'App\\Models\\Barang', 'updated', 134, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:32:54.000000Z\",\"stok\":12},\"old\":{\"updated_at\":\"2026-05-19T07:20:41.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:32:54', '2026-05-20 06:32:54'),
(1387, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 158, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":158,\"kode_transaksi\":\"TRX-IN-2026-5-20-9346\",\"tanggal_masuk\":\"2024-10-23\",\"nama_barang\":\"Penghapus Papan Tulis\",\"jumlah_masuk\":17,\"supplier_id\":39,\"user_id\":3,\"created_at\":\"2026-05-20T06:33:25.000000Z\",\"updated_at\":\"2026-05-20T06:33:25.000000Z\"}}', NULL, '2026-05-20 06:33:25', '2026-05-20 06:33:25'),
(1388, 'default', 'updated', 'App\\Models\\Barang', 'updated', 130, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:33:25.000000Z\",\"stok\":17},\"old\":{\"updated_at\":\"2026-05-19T07:15:55.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:33:25', '2026-05-20 06:33:25'),
(1389, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 159, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":159,\"kode_transaksi\":\"TRX-IN-2026-5-20-4563\",\"tanggal_masuk\":\"2024-11-08\",\"nama_barang\":\"Clips\\/Penjepit-Joyko\",\"jumlah_masuk\":28,\"supplier_id\":37,\"user_id\":3,\"created_at\":\"2026-05-20T06:33:48.000000Z\",\"updated_at\":\"2026-05-20T06:33:48.000000Z\"}}', NULL, '2026-05-20 06:33:48', '2026-05-20 06:33:48'),
(1390, 'default', 'updated', 'App\\Models\\Barang', 'updated', 129, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:33:48.000000Z\",\"stok\":28},\"old\":{\"updated_at\":\"2026-05-19T07:14:51.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:33:48', '2026-05-20 06:33:48'),
(1391, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 160, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":160,\"kode_transaksi\":\"TRX-IN-2026-5-20-4846\",\"tanggal_masuk\":\"2024-12-31\",\"nama_barang\":\"Pena Kenko\",\"jumlah_masuk\":23,\"supplier_id\":41,\"user_id\":3,\"created_at\":\"2026-05-20T06:34:23.000000Z\",\"updated_at\":\"2026-05-20T06:34:23.000000Z\"}}', NULL, '2026-05-20 06:34:23', '2026-05-20 06:34:23'),
(1392, 'default', 'updated', 'App\\Models\\Barang', 'updated', 124, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:34:23.000000Z\",\"stok\":23},\"old\":{\"updated_at\":\"2026-05-19T07:09:32.000000Z\",\"stok\":0}}', NULL, '2026-05-20 06:34:23', '2026-05-20 06:34:23'),
(1393, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 81, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":81,\"kode_transaksi\":\"TRX-OUT-2026-05-20-8909\",\"tanggal_keluar\":\"2024-01-31\",\"nama_barang\":\"Amplop Putih Polos-Paperline\",\"jumlah_keluar\":3,\"customer_id\":37,\"user_id\":3,\"created_at\":\"2026-05-20T06:36:47.000000Z\",\"updated_at\":\"2026-05-20T06:36:47.000000Z\"}}', NULL, '2026-05-20 06:36:47', '2026-05-20 06:36:47'),
(1394, 'default', 'updated', 'App\\Models\\Barang', 'updated', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:36:47.000000Z\",\"stok\":7},\"old\":{\"updated_at\":\"2026-05-20T06:09:58.000000Z\",\"stok\":10}}', NULL, '2026-05-20 06:36:47', '2026-05-20 06:36:47'),
(1395, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 82, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":82,\"kode_transaksi\":\"TRX-OUT-2026-05-20-4998\",\"tanggal_keluar\":\"2024-01-31\",\"nama_barang\":\"Baterai-Eveready\",\"jumlah_keluar\":7,\"customer_id\":38,\"user_id\":3,\"created_at\":\"2026-05-20T06:37:05.000000Z\",\"updated_at\":\"2026-05-20T06:37:05.000000Z\"}}', NULL, '2026-05-20 06:37:05', '2026-05-20 06:37:05'),
(1396, 'default', 'updated', 'App\\Models\\Barang', 'updated', 115, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:37:05.000000Z\",\"stok\":13},\"old\":{\"updated_at\":\"2026-05-20T06:11:00.000000Z\",\"stok\":20}}', NULL, '2026-05-20 06:37:05', '2026-05-20 06:37:05'),
(1397, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 83, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":83,\"kode_transaksi\":\"TRX-OUT-2026-05-20-9162\",\"tanggal_keluar\":\"2024-02-01\",\"nama_barang\":\"Tinta Spidol-Refill Ink\",\"jumlah_keluar\":5,\"customer_id\":38,\"user_id\":3,\"created_at\":\"2026-05-20T06:37:29.000000Z\",\"updated_at\":\"2026-05-20T06:37:29.000000Z\"}}', NULL, '2026-05-20 06:37:29', '2026-05-20 06:37:29'),
(1398, 'default', 'updated', 'App\\Models\\Barang', 'updated', 116, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:37:29.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-05-20T06:12:28.000000Z\",\"stok\":15}}', NULL, '2026-05-20 06:37:29', '2026-05-20 06:37:29'),
(1399, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 84, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":84,\"kode_transaksi\":\"TRX-OUT-2026-05-20-8278\",\"tanggal_keluar\":\"2024-03-30\",\"nama_barang\":\"Amplo Putih Polos Panjang-Paperline\",\"jumlah_keluar\":3,\"customer_id\":48,\"user_id\":3,\"created_at\":\"2026-05-20T06:37:47.000000Z\",\"updated_at\":\"2026-05-20T06:37:47.000000Z\"}}', NULL, '2026-05-20 06:37:47', '2026-05-20 06:37:47'),
(1400, 'default', 'updated', 'App\\Models\\Barang', 'updated', 117, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T06:37:47.000000Z\",\"stok\":17},\"old\":{\"updated_at\":\"2026-05-20T06:12:54.000000Z\",\"stok\":20}}', NULL, '2026-05-20 06:37:47', '2026-05-20 06:37:47'),
(1401, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 161, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":161,\"kode_transaksi\":\"TRX-IN-2026-5-20-2089\",\"tanggal_masuk\":\"2024-04-24\",\"nama_barang\":\"Amplo Putih Polos Panjang-Paperline\",\"jumlah_masuk\":16,\"supplier_id\":35,\"user_id\":3,\"created_at\":\"2026-05-20T07:02:47.000000Z\",\"updated_at\":\"2026-05-20T07:02:47.000000Z\"}}', NULL, '2026-05-20 07:02:47', '2026-05-20 07:02:47'),
(1402, 'default', 'updated', 'App\\Models\\Barang', 'updated', 117, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:02:47.000000Z\",\"stok\":33},\"old\":{\"updated_at\":\"2026-05-20T06:37:47.000000Z\",\"stok\":17}}', NULL, '2026-05-20 07:02:47', '2026-05-20 07:02:47'),
(1403, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 162, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":162,\"kode_transaksi\":\"TRX-IN-2026-5-20-4373\",\"tanggal_masuk\":\"2024-05-29\",\"nama_barang\":\"Kalkulator-Joyko\",\"jumlah_masuk\":15,\"supplier_id\":38,\"user_id\":3,\"created_at\":\"2026-05-20T07:03:50.000000Z\",\"updated_at\":\"2026-05-20T07:03:50.000000Z\"}}', NULL, '2026-05-20 07:03:50', '2026-05-20 07:03:50'),
(1404, 'default', 'updated', 'App\\Models\\Barang', 'updated', 127, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:03:50.000000Z\",\"stok\":30},\"old\":{\"updated_at\":\"2026-05-20T06:18:22.000000Z\",\"stok\":15}}', NULL, '2026-05-20 07:03:50', '2026-05-20 07:03:50'),
(1405, 'default', 'created', 'App\\Models\\BarangMasuk', 'created', 163, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":163,\"kode_transaksi\":\"TRX-IN-2026-5-20-4586\",\"tanggal_masuk\":\"2024-07-01\",\"nama_barang\":\"Refill Ink Printer-Kuning\",\"jumlah_masuk\":20,\"supplier_id\":43,\"user_id\":3,\"created_at\":\"2026-05-20T07:04:50.000000Z\",\"updated_at\":\"2026-05-20T07:04:50.000000Z\"}}', NULL, '2026-05-20 07:04:50', '2026-05-20 07:04:50'),
(1406, 'default', 'updated', 'App\\Models\\Barang', 'updated', 133, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:04:50.000000Z\",\"stok\":36},\"old\":{\"updated_at\":\"2026-05-20T06:27:04.000000Z\",\"stok\":16}}', NULL, '2026-05-20 07:04:50', '2026-05-20 07:04:50'),
(1407, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 85, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":85,\"kode_transaksi\":\"TRX-OUT-2026-05-20-8825\",\"tanggal_keluar\":\"2024-04-30\",\"nama_barang\":\"Refill Ink Printer Epson-Cyan\",\"jumlah_keluar\":5,\"customer_id\":41,\"user_id\":3,\"created_at\":\"2026-05-20T07:08:10.000000Z\",\"updated_at\":\"2026-05-20T07:08:10.000000Z\"}}', NULL, '2026-05-20 07:08:10', '2026-05-20 07:08:10'),
(1408, 'default', 'updated', 'App\\Models\\Barang', 'updated', 142, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:08:10.000000Z\",\"stok\":14},\"old\":{\"updated_at\":\"2026-05-20T06:31:03.000000Z\",\"stok\":19}}', NULL, '2026-05-20 07:08:10', '2026-05-20 07:08:10'),
(1409, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 86, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":86,\"kode_transaksi\":\"TRX-OUT-2026-05-20-1968\",\"tanggal_keluar\":\"2024-05-15\",\"nama_barang\":\"Pembersih Lantai Toilet-Starlight\",\"jumlah_keluar\":2,\"customer_id\":52,\"user_id\":3,\"created_at\":\"2026-05-20T07:08:38.000000Z\",\"updated_at\":\"2026-05-20T07:08:38.000000Z\"}}', NULL, '2026-05-20 07:08:38', '2026-05-20 07:08:38'),
(1410, 'default', 'updated', 'App\\Models\\Barang', 'updated', 150, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:08:38.000000Z\",\"stok\":8},\"old\":{\"updated_at\":\"2026-05-20T06:19:00.000000Z\",\"stok\":10}}', NULL, '2026-05-20 07:08:38', '2026-05-20 07:08:38'),
(1411, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 87, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":87,\"kode_transaksi\":\"TRX-OUT-2026-05-20-9569\",\"tanggal_keluar\":\"2024-06-05\",\"nama_barang\":\"Refill Ink Printer Epson-Magenta\",\"jumlah_keluar\":5,\"customer_id\":42,\"user_id\":3,\"created_at\":\"2026-05-20T07:09:07.000000Z\",\"updated_at\":\"2026-05-20T07:09:07.000000Z\"}}', NULL, '2026-05-20 07:09:07', '2026-05-20 07:09:07'),
(1412, 'default', 'updated', 'App\\Models\\Barang', 'updated', 143, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:09:07.000000Z\",\"stok\":18},\"old\":{\"updated_at\":\"2026-05-20T06:20:32.000000Z\",\"stok\":23}}', NULL, '2026-05-20 07:09:07', '2026-05-20 07:09:07'),
(1413, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 88, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":88,\"kode_transaksi\":\"TRX-OUT-2026-05-20-1118\",\"tanggal_keluar\":\"2024-07-24\",\"nama_barang\":\"Hekter Kangaro_HS-10Y\",\"jumlah_keluar\":7,\"customer_id\":43,\"user_id\":3,\"created_at\":\"2026-05-20T07:10:19.000000Z\",\"updated_at\":\"2026-05-20T07:10:19.000000Z\"}}', NULL, '2026-05-20 07:10:19', '2026-05-20 07:10:19'),
(1414, 'default', 'updated', 'App\\Models\\Barang', 'updated', 126, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:10:19.000000Z\",\"stok\":18},\"old\":{\"updated_at\":\"2026-05-20T06:26:21.000000Z\",\"stok\":25}}', NULL, '2026-05-20 07:10:19', '2026-05-20 07:10:19'),
(1415, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 89, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":89,\"kode_transaksi\":\"TRX-OUT-2026-05-20-7412\",\"tanggal_keluar\":\"2024-08-28\",\"nama_barang\":\"Penghapus Papan Tulis\",\"jumlah_keluar\":4,\"customer_id\":42,\"user_id\":3,\"created_at\":\"2026-05-20T07:10:35.000000Z\",\"updated_at\":\"2026-05-20T07:10:35.000000Z\"}}', NULL, '2026-05-20 07:10:35', '2026-05-20 07:10:35'),
(1416, 'default', 'updated', 'App\\Models\\Barang', 'updated', 130, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:10:35.000000Z\",\"stok\":13},\"old\":{\"updated_at\":\"2026-05-20T06:33:25.000000Z\",\"stok\":17}}', NULL, '2026-05-20 07:10:35', '2026-05-20 07:10:35'),
(1417, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 90, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":90,\"kode_transaksi\":\"TRX-OUT-2026-05-20-0086\",\"tanggal_keluar\":\"2024-09-08\",\"nama_barang\":\"Gunting\",\"jumlah_keluar\":7,\"customer_id\":40,\"user_id\":3,\"created_at\":\"2026-05-20T07:10:53.000000Z\",\"updated_at\":\"2026-05-20T07:10:53.000000Z\"}}', NULL, '2026-05-20 07:10:53', '2026-05-20 07:10:53'),
(1418, 'default', 'updated', 'App\\Models\\Barang', 'updated', 131, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:10:53.000000Z\",\"stok\":13},\"old\":{\"updated_at\":\"2026-05-20T06:25:38.000000Z\",\"stok\":20}}', NULL, '2026-05-20 07:10:53', '2026-05-20 07:10:53'),
(1419, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 91, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":91,\"kode_transaksi\":\"TRX-OUT-2026-05-20-5407\",\"tanggal_keluar\":\"2024-10-30\",\"nama_barang\":\"Refill Ink Printer-Hitam\",\"jumlah_keluar\":3,\"customer_id\":37,\"user_id\":3,\"created_at\":\"2026-05-20T07:11:48.000000Z\",\"updated_at\":\"2026-05-20T07:11:48.000000Z\"}}', NULL, '2026-05-20 07:11:48', '2026-05-20 07:11:48'),
(1420, 'default', 'updated', 'App\\Models\\Barang', 'updated', 135, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:11:48.000000Z\",\"stok\":8},\"old\":{\"updated_at\":\"2026-05-20T06:32:38.000000Z\",\"stok\":11}}', NULL, '2026-05-20 07:11:48', '2026-05-20 07:11:48'),
(1421, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 92, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":92,\"kode_transaksi\":\"TRX-OUT-2026-05-20-4315\",\"tanggal_keluar\":\"2024-11-14\",\"nama_barang\":\"Refill Ink Printer-Kuning\",\"jumlah_keluar\":9,\"customer_id\":36,\"user_id\":3,\"created_at\":\"2026-05-20T07:12:09.000000Z\",\"updated_at\":\"2026-05-20T07:12:09.000000Z\"}}', NULL, '2026-05-20 07:12:09', '2026-05-20 07:12:09'),
(1422, 'default', 'updated', 'App\\Models\\Barang', 'updated', 133, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:12:09.000000Z\",\"stok\":27},\"old\":{\"updated_at\":\"2026-05-20T07:04:50.000000Z\",\"stok\":36}}', NULL, '2026-05-20 07:12:09', '2026-05-20 07:12:09'),
(1423, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 93, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":93,\"kode_transaksi\":\"TRX-OUT-2026-05-20-7025\",\"tanggal_keluar\":\"2024-12-31\",\"nama_barang\":\"Refill Ink Printer-Hitam\",\"jumlah_keluar\":3,\"customer_id\":35,\"user_id\":3,\"created_at\":\"2026-05-20T07:12:28.000000Z\",\"updated_at\":\"2026-05-20T07:12:28.000000Z\"}}', NULL, '2026-05-20 07:12:28', '2026-05-20 07:12:28'),
(1424, 'default', 'updated', 'App\\Models\\Barang', 'updated', 135, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:12:28.000000Z\",\"stok\":5},\"old\":{\"updated_at\":\"2026-05-20T07:11:48.000000Z\",\"stok\":8}}', NULL, '2026-05-20 07:12:28', '2026-05-20 07:12:28'),
(1425, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 94, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":94,\"kode_transaksi\":\"TRX-OUT-2026-05-20-5847\",\"tanggal_keluar\":\"2025-01-30\",\"nama_barang\":\"Lakban Hitam 2 Inc\",\"jumlah_keluar\":7,\"customer_id\":44,\"user_id\":3,\"created_at\":\"2026-05-20T07:15:19.000000Z\",\"updated_at\":\"2026-05-20T07:15:19.000000Z\"}}', NULL, '2026-05-20 07:15:19', '2026-05-20 07:15:19'),
(1426, 'default', 'updated', 'App\\Models\\Barang', 'updated', 119, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:15:19.000000Z\",\"stok\":27},\"old\":{\"updated_at\":\"2026-05-20T06:24:03.000000Z\",\"stok\":34}}', NULL, '2026-05-20 07:15:19', '2026-05-20 07:15:19'),
(1427, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 95, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":95,\"kode_transaksi\":\"TRX-OUT-2026-05-20-5231\",\"tanggal_keluar\":\"2025-02-20\",\"nama_barang\":\"Lakban Bening 1 Inch\",\"jumlah_keluar\":2,\"customer_id\":39,\"user_id\":3,\"created_at\":\"2026-05-20T07:15:39.000000Z\",\"updated_at\":\"2026-05-20T07:15:39.000000Z\"}}', NULL, '2026-05-20 07:15:39', '2026-05-20 07:15:39'),
(1428, 'default', 'updated', 'App\\Models\\Barang', 'updated', 121, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:15:39.000000Z\",\"stok\":15},\"old\":{\"updated_at\":\"2026-05-20T06:27:47.000000Z\",\"stok\":17}}', NULL, '2026-05-20 07:15:39', '2026-05-20 07:15:39'),
(1429, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 96, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":96,\"kode_transaksi\":\"TRX-OUT-2026-05-20-6648\",\"tanggal_keluar\":\"2025-03-12\",\"nama_barang\":\"Clips Kenko\",\"jumlah_keluar\":4,\"customer_id\":34,\"user_id\":3,\"created_at\":\"2026-05-20T07:15:59.000000Z\",\"updated_at\":\"2026-05-20T07:15:59.000000Z\"}}', NULL, '2026-05-20 07:15:59', '2026-05-20 07:15:59'),
(1430, 'default', 'updated', 'App\\Models\\Barang', 'updated', 125, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:15:59.000000Z\",\"stok\":17},\"old\":{\"updated_at\":\"2026-05-20T06:24:40.000000Z\",\"stok\":21}}', NULL, '2026-05-20 07:15:59', '2026-05-20 07:15:59'),
(1431, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 97, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":97,\"kode_transaksi\":\"TRX-OUT-2026-05-20-7416\",\"tanggal_keluar\":\"2025-04-30\",\"nama_barang\":\"Double Tape 1 Inch\",\"jumlah_keluar\":2,\"customer_id\":32,\"user_id\":3,\"created_at\":\"2026-05-20T07:16:18.000000Z\",\"updated_at\":\"2026-05-20T07:16:18.000000Z\"}}', NULL, '2026-05-20 07:16:18', '2026-05-20 07:16:18'),
(1432, 'default', 'updated', 'App\\Models\\Barang', 'updated', 122, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:16:18.000000Z\",\"stok\":8},\"old\":{\"updated_at\":\"2026-05-20T06:15:19.000000Z\",\"stok\":10}}', NULL, '2026-05-20 07:16:18', '2026-05-20 07:16:18'),
(1433, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 98, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":98,\"kode_transaksi\":\"TRX-OUT-2026-05-20-7143\",\"tanggal_keluar\":\"2025-04-30\",\"nama_barang\":\"Spidol Hitam\",\"jumlah_keluar\":7,\"customer_id\":46,\"user_id\":3,\"created_at\":\"2026-05-20T07:16:36.000000Z\",\"updated_at\":\"2026-05-20T07:16:36.000000Z\"}}', NULL, '2026-05-20 07:16:36', '2026-05-20 07:16:36'),
(1434, 'default', 'updated', 'App\\Models\\Barang', 'updated', 128, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:16:36.000000Z\",\"stok\":8},\"old\":{\"updated_at\":\"2026-05-20T06:18:42.000000Z\",\"stok\":15}}', NULL, '2026-05-20 07:16:36', '2026-05-20 07:16:36'),
(1435, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 99, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":99,\"kode_transaksi\":\"TRX-OUT-2026-05-20-9260\",\"tanggal_keluar\":\"2025-04-30\",\"nama_barang\":\"Pembolong Kertas-SunWell\",\"jumlah_keluar\":5,\"customer_id\":46,\"user_id\":3,\"created_at\":\"2026-05-20T07:16:48.000000Z\",\"updated_at\":\"2026-05-20T07:16:48.000000Z\"}}', NULL, '2026-05-20 07:16:48', '2026-05-20 07:16:48'),
(1436, 'default', 'updated', 'App\\Models\\Barang', 'updated', 137, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:16:48.000000Z\",\"stok\":5},\"old\":{\"updated_at\":\"2026-05-20T06:15:54.000000Z\",\"stok\":10}}', NULL, '2026-05-20 07:16:48', '2026-05-20 07:16:48'),
(1437, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 102, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":102,\"kode_transaksi\":\"TRX-OUT-2026-05-20-5084\",\"tanggal_keluar\":\"2025-05-30\",\"nama_barang\":\"Tissu Nice\",\"jumlah_keluar\":5,\"customer_id\":45,\"user_id\":3,\"created_at\":\"2026-05-20T07:17:40.000000Z\",\"updated_at\":\"2026-05-20T07:17:40.000000Z\"}}', NULL, '2026-05-20 07:17:40', '2026-05-20 07:17:40'),
(1438, 'default', 'updated', 'App\\Models\\Barang', 'updated', 139, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:17:40.000000Z\",\"stok\":20},\"old\":{\"updated_at\":\"2026-05-20T06:31:34.000000Z\",\"stok\":25}}', NULL, '2026-05-20 07:17:40', '2026-05-20 07:17:40'),
(1439, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 103, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":103,\"kode_transaksi\":\"TRX-OUT-2026-05-20-4615\",\"tanggal_keluar\":\"2025-06-12\",\"nama_barang\":\"Tissu Nice\",\"jumlah_keluar\":1,\"customer_id\":45,\"user_id\":3,\"created_at\":\"2026-05-20T07:17:54.000000Z\",\"updated_at\":\"2026-05-20T07:17:54.000000Z\"}}', NULL, '2026-05-20 07:17:54', '2026-05-20 07:17:54'),
(1440, 'default', 'updated', 'App\\Models\\Barang', 'updated', 139, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:17:54.000000Z\",\"stok\":19},\"old\":{\"updated_at\":\"2026-05-20T07:17:40.000000Z\",\"stok\":20}}', NULL, '2026-05-20 07:17:54', '2026-05-20 07:17:54'),
(1441, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 104, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":104,\"kode_transaksi\":\"TRX-OUT-2026-05-20-8470\",\"tanggal_keluar\":\"2025-07-10\",\"nama_barang\":\"Tissu Nice\",\"jumlah_keluar\":2,\"customer_id\":44,\"user_id\":3,\"created_at\":\"2026-05-20T07:18:07.000000Z\",\"updated_at\":\"2026-05-20T07:18:07.000000Z\"}}', NULL, '2026-05-20 07:18:07', '2026-05-20 07:18:07'),
(1442, 'default', 'updated', 'App\\Models\\Barang', 'updated', 139, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:18:07.000000Z\",\"stok\":17},\"old\":{\"updated_at\":\"2026-05-20T07:17:54.000000Z\",\"stok\":19}}', NULL, '2026-05-20 07:18:07', '2026-05-20 07:18:07'),
(1443, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 105, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":105,\"kode_transaksi\":\"TRX-OUT-2026-05-20-1052\",\"tanggal_keluar\":\"2025-08-30\",\"nama_barang\":\"Refill Ink Printer Epson-Magenta\",\"jumlah_keluar\":5,\"customer_id\":44,\"user_id\":3,\"created_at\":\"2026-05-20T07:18:21.000000Z\",\"updated_at\":\"2026-05-20T07:18:21.000000Z\"}}', NULL, '2026-05-20 07:18:21', '2026-05-20 07:18:21'),
(1444, 'default', 'updated', 'App\\Models\\Barang', 'updated', 143, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:18:21.000000Z\",\"stok\":13},\"old\":{\"updated_at\":\"2026-05-20T07:09:07.000000Z\",\"stok\":18}}', NULL, '2026-05-20 07:18:21', '2026-05-20 07:18:21'),
(1445, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 106, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":106,\"kode_transaksi\":\"TRX-OUT-2026-05-20-6244\",\"tanggal_keluar\":\"2025-09-22\",\"nama_barang\":\"Refill Ink Printer Epson-Cyan\",\"jumlah_keluar\":3,\"customer_id\":52,\"user_id\":3,\"created_at\":\"2026-05-20T07:18:36.000000Z\",\"updated_at\":\"2026-05-20T07:18:36.000000Z\"}}', NULL, '2026-05-20 07:18:36', '2026-05-20 07:18:36'),
(1446, 'default', 'updated', 'App\\Models\\Barang', 'updated', 142, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:18:36.000000Z\",\"stok\":11},\"old\":{\"updated_at\":\"2026-05-20T07:08:10.000000Z\",\"stok\":14}}', NULL, '2026-05-20 07:18:36', '2026-05-20 07:18:36'),
(1447, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 107, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":107,\"kode_transaksi\":\"TRX-OUT-2026-05-20-9654\",\"tanggal_keluar\":\"2025-10-24\",\"nama_barang\":\"Refill Ink Printer Epson-Kuning\",\"jumlah_keluar\":7,\"customer_id\":51,\"user_id\":3,\"created_at\":\"2026-05-20T07:18:53.000000Z\",\"updated_at\":\"2026-05-20T07:18:53.000000Z\"}}', NULL, '2026-05-20 07:18:53', '2026-05-20 07:18:53'),
(1448, 'default', 'updated', 'App\\Models\\Barang', 'updated', 141, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:18:53.000000Z\",\"stok\":15},\"old\":{\"updated_at\":\"2026-05-20T06:20:49.000000Z\",\"stok\":22}}', NULL, '2026-05-20 07:18:53', '2026-05-20 07:18:53'),
(1449, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 108, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":108,\"kode_transaksi\":\"TRX-OUT-2026-05-20-2208\",\"tanggal_keluar\":\"2025-11-27\",\"nama_barang\":\"Refill Ink Printer Epson-Cyan\",\"jumlah_keluar\":1,\"customer_id\":51,\"user_id\":3,\"created_at\":\"2026-05-20T07:19:09.000000Z\",\"updated_at\":\"2026-05-20T07:19:09.000000Z\"}}', NULL, '2026-05-20 07:19:09', '2026-05-20 07:19:09'),
(1450, 'default', 'updated', 'App\\Models\\Barang', 'updated', 142, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:19:09.000000Z\",\"stok\":10},\"old\":{\"updated_at\":\"2026-05-20T07:18:36.000000Z\",\"stok\":11}}', NULL, '2026-05-20 07:19:09', '2026-05-20 07:19:09'),
(1451, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 109, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":109,\"kode_transaksi\":\"TRX-OUT-2026-05-20-9528\",\"tanggal_keluar\":\"2025-12-27\",\"nama_barang\":\"Sabun Pel Lantai SOS\",\"jumlah_keluar\":3,\"customer_id\":45,\"user_id\":3,\"created_at\":\"2026-05-20T07:19:29.000000Z\",\"updated_at\":\"2026-05-20T07:19:29.000000Z\"}}', NULL, '2026-05-20 07:19:29', '2026-05-20 07:19:29'),
(1452, 'default', 'updated', 'App\\Models\\Barang', 'updated', 148, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:19:29.000000Z\",\"stok\":14},\"old\":{\"updated_at\":\"2026-05-20T06:19:37.000000Z\",\"stok\":17}}', NULL, '2026-05-20 07:19:29', '2026-05-20 07:19:29'),
(1453, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 110, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":110,\"kode_transaksi\":\"TRX-OUT-2026-05-20-1802\",\"tanggal_keluar\":\"2026-05-04\",\"nama_barang\":\"Sabun Pel Lantai SOS\",\"jumlah_keluar\":1,\"customer_id\":45,\"user_id\":3,\"created_at\":\"2026-05-20T07:25:26.000000Z\",\"updated_at\":\"2026-05-20T07:25:26.000000Z\"}}', NULL, '2026-05-20 07:25:26', '2026-05-20 07:25:26'),
(1454, 'default', 'updated', 'App\\Models\\Barang', 'updated', 148, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:25:26.000000Z\",\"stok\":13},\"old\":{\"updated_at\":\"2026-05-20T07:19:29.000000Z\",\"stok\":14}}', NULL, '2026-05-20 07:25:26', '2026-05-20 07:25:26'),
(1455, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 111, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":111,\"kode_transaksi\":\"TRX-OUT-2026-05-20-6045\",\"tanggal_keluar\":\"2026-05-04\",\"nama_barang\":\"Baterai-Eveready\",\"jumlah_keluar\":1,\"customer_id\":35,\"user_id\":3,\"created_at\":\"2026-05-20T07:26:02.000000Z\",\"updated_at\":\"2026-05-20T07:26:02.000000Z\"}}', NULL, '2026-05-20 07:26:02', '2026-05-20 07:26:02'),
(1456, 'default', 'updated', 'App\\Models\\Barang', 'updated', 115, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:26:02.000000Z\",\"stok\":12},\"old\":{\"updated_at\":\"2026-05-20T06:37:05.000000Z\",\"stok\":13}}', NULL, '2026-05-20 07:26:02', '2026-05-20 07:26:02'),
(1457, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 112, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":112,\"kode_transaksi\":\"TRX-OUT-2026-05-20-8285\",\"tanggal_keluar\":\"2026-01-28\",\"nama_barang\":\"Tinta Spidol-Refill Ink\",\"jumlah_keluar\":1,\"customer_id\":31,\"user_id\":3,\"created_at\":\"2026-05-20T07:27:02.000000Z\",\"updated_at\":\"2026-05-20T07:27:02.000000Z\"}}', NULL, '2026-05-20 07:27:02', '2026-05-20 07:27:02'),
(1458, 'default', 'updated', 'App\\Models\\Barang', 'updated', 116, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:27:02.000000Z\",\"stok\":9},\"old\":{\"updated_at\":\"2026-05-20T06:37:29.000000Z\",\"stok\":10}}', NULL, '2026-05-20 07:27:02', '2026-05-20 07:27:02'),
(1459, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 113, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":113,\"kode_transaksi\":\"TRX-OUT-2026-05-20-1564\",\"tanggal_keluar\":\"2026-02-25\",\"nama_barang\":\"Amplo Putih Polos Panjang-Paperline\",\"jumlah_keluar\":7,\"customer_id\":33,\"user_id\":3,\"created_at\":\"2026-05-20T07:27:16.000000Z\",\"updated_at\":\"2026-05-20T07:27:16.000000Z\"}}', NULL, '2026-05-20 07:27:16', '2026-05-20 07:27:16'),
(1460, 'default', 'updated', 'App\\Models\\Barang', 'updated', 117, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:27:16.000000Z\",\"stok\":26},\"old\":{\"updated_at\":\"2026-05-20T07:02:47.000000Z\",\"stok\":33}}', NULL, '2026-05-20 07:27:16', '2026-05-20 07:27:16'),
(1461, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 114, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":114,\"kode_transaksi\":\"TRX-OUT-2026-05-20-4372\",\"tanggal_keluar\":\"2026-03-28\",\"nama_barang\":\"Amplo Putih Polos Panjang-Paperline\",\"jumlah_keluar\":5,\"customer_id\":36,\"user_id\":3,\"created_at\":\"2026-05-20T07:27:33.000000Z\",\"updated_at\":\"2026-05-20T07:27:33.000000Z\"}}', NULL, '2026-05-20 07:27:33', '2026-05-20 07:27:33'),
(1462, 'default', 'updated', 'App\\Models\\Barang', 'updated', 117, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:27:33.000000Z\",\"stok\":21},\"old\":{\"updated_at\":\"2026-05-20T07:27:16.000000Z\",\"stok\":26}}', NULL, '2026-05-20 07:27:33', '2026-05-20 07:27:33'),
(1463, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 115, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":115,\"kode_transaksi\":\"TRX-OUT-2026-05-20-8376\",\"tanggal_keluar\":\"2026-04-30\",\"nama_barang\":\"Lakban Bening 1 Inch\",\"jumlah_keluar\":4,\"customer_id\":39,\"user_id\":3,\"created_at\":\"2026-05-20T07:27:51.000000Z\",\"updated_at\":\"2026-05-20T07:27:51.000000Z\"}}', NULL, '2026-05-20 07:27:51', '2026-05-20 07:27:51'),
(1464, 'default', 'updated', 'App\\Models\\Barang', 'updated', 121, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:27:51.000000Z\",\"stok\":11},\"old\":{\"updated_at\":\"2026-05-20T07:15:39.000000Z\",\"stok\":15}}', NULL, '2026-05-20 07:27:51', '2026-05-20 07:27:51'),
(1465, 'default', 'created', 'App\\Models\\BarangKeluar', 'created', 116, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":116,\"kode_transaksi\":\"TRX-OUT-2026-05-20-0755\",\"tanggal_keluar\":\"2026-05-12\",\"nama_barang\":\"Gunting\",\"jumlah_keluar\":1,\"customer_id\":44,\"user_id\":3,\"created_at\":\"2026-05-20T07:28:07.000000Z\",\"updated_at\":\"2026-05-20T07:28:07.000000Z\"}}', NULL, '2026-05-20 07:28:07', '2026-05-20 07:28:07'),
(1466, 'default', 'updated', 'App\\Models\\Barang', 'updated', 131, 'App\\Models\\User', 3, '{\"attributes\":{\"updated_at\":\"2026-05-20T07:28:07.000000Z\",\"stok\":12},\"old\":{\"updated_at\":\"2026-05-20T07:10:53.000000Z\",\"stok\":13}}', NULL, '2026-05-20 07:28:07', '2026-05-20 07:28:07');

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
(165, 'aset/4TNjHip16srRkMC0tLVmM0JHPzJrZDDhzqUPlCxB.jpg', 'Papan interaktif (Interactive Flat Panel)', 1, 'RITA SURYANI,S.Pd — Guru', 'Ruangan Pertemuan', '2026-05-19 03:16:15', '2026-05-19 06:27:18'),
(166, 'aset/VGpFa7WgiO56JDpfpFNMpf67OPq07eAYm7sLzDsq.jpg', 'Laptop Zyrex', 1, 'Helyadi Beni Tandiono — Tendik', 'Ruangan Operator-Tata Usaha', '2026-05-19 03:19:02', '2026-05-19 03:19:02'),
(167, 'aset/QQE46n4L2ZZQA5tOR0ffA3fPbCdM8HfuWKm35Fvu.jpg', 'Kipas Angin', 1, 'Helyadi Beni Tandiono — Tendik', 'Ruangan Operator-Tata Usaha', '2026-05-19 03:20:38', '2026-05-19 03:20:38'),
(168, 'aset/P4UD6t28jN0A9YTUdTsABaUZ1tvrZjPw73JdadIg.jpg', 'Printer Brother DCP-T310', 1, 'Helyadi Beni Tandiono — Tendik', 'Ruangan Operator-Tata Usaha', '2026-05-19 03:21:50', '2026-05-19 03:21:50'),
(169, 'aset/gpBIzfA5TygZvIEJeVVYmNhxcwd0iQawmDci4bzh.jpg', 'Laptop Asus Vivobook', 1, 'Helyadi Beni Tandiono — Tendik', 'Ruangan Operator-Tata Usaha', '2026-05-19 06:17:46', '2026-05-19 06:17:46'),
(170, 'aset/tXxycTh1AuS2YneNDc369pwgMNosJWOB4RvFOzpj.jpg', 'Laptop HP', 1, 'MARIA ULFAH, S.M — Guru', 'Ruangan Tata Usaha', '2026-05-19 06:19:09', '2026-05-19 06:19:09'),
(171, 'aset/mTAUwbe4wfyASdGqmF4d0TzY3buL1ridbjyDwSs8.jpg', 'Lemari Berkas', 5, 'MARIA ULFAH, S.M — Guru', 'Ruangan Tata Usaha', '2026-05-19 06:21:36', '2026-05-19 06:22:27'),
(172, 'aset/5EA5NEzxhmqVow8HOz05x8VBElepbJWJ3FeZoced.jpg', 'Lemari Piala', 1, 'DAUD GUNAWAN, S.E — Guru', 'Ruangan Kepala Sekolah', '2026-05-19 06:23:10', '2026-05-19 06:23:10'),
(173, 'aset/VxytuR40NUJ44cbHJvE0X6vcgf4AL8bNFufEhjyf.jpg', 'Kursi Kerja', 1, 'DAUD GUNAWAN, S.E — Guru', 'Ruangan Kepala Sekolah', '2026-05-19 06:24:08', '2026-05-19 06:24:08'),
(174, 'aset/4aAGYeGQXqao80GijmdLNKOgYS7r5DNTx57Zv7mz.jpg', 'Meja Kerja', 1, 'DAUD GUNAWAN, S.E — Guru', 'Ruangan Kepala Sekolah', '2026-05-19 06:24:34', '2026-05-19 06:24:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_deletion_logs`
--

CREATE TABLE `aset_deletion_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL DEFAULT '0',
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_hapus` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` bigint UNSIGNED NOT NULL,
  `deleted_by_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at_log` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_riwayat_hapus`
--

CREATE TABLE `aset_riwayat_hapus` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL DEFAULT '0',
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_hapus` text COLLATE utf8mb4_unicode_ci,
  `dihapus_oleh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_hapus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(114, '2026-05-19 06:57:05', '2026-05-20 06:36:47', 'BRG-39483', 'Amplop Putih Polos-Paperline', 'Amplop Putih Polos-Paperline', 'gambar-barang/47d6c9b3-743b-4279-ac29-427f5dced769.jpeg', 1, 7, 3, 51, 35),
(115, '2026-05-19 06:58:41', '2026-05-20 07:26:02', 'BRG-78409', 'Baterai-Eveready', 'Baterai-Eveready Kecil', 'gambar-barang/c8395ac6-dc0b-41a2-869b-39a35b31f3da.jpeg', 1, 12, 3, 51, 35),
(116, '2026-05-19 06:59:28', '2026-05-20 07:27:02', 'BRG-02735', 'Tinta Spidol-Refill Ink', 'Tinta Spidol-Refill Ink', 'gambar-barang/2028376f-05cc-474d-94dc-d37fbbd9acb2.jpeg', 1, 9, 3, 51, 35),
(117, '2026-05-19 07:00:34', '2026-05-20 07:27:33', 'BRG-63713', 'Amplo Putih Polos Panjang-Paperline', 'Amplo Putih Polos Panjang-Paperline', 'gambar-barang/ffd312c7-cf1d-48bf-931a-efbfbc9850b2.jpeg', 1, 21, 3, 51, 35),
(118, '2026-05-19 07:01:53', '2026-05-20 06:13:42', 'BRG-97221', 'Amplop Putih Polos Panjang-Merpati', 'Amplop Putih Polos Panjang-Merpati', 'gambar-barang/af929184-d74e-446e-8e9a-87f6d4187516.jpeg', 1, 10, 3, 51, 35),
(119, '2026-05-19 07:03:25', '2026-05-20 07:15:19', 'BRG-98058', 'Lakban Hitam 2 Inc', 'Lakban Hitam 2 Inc', 'gambar-barang/5b872491-4da3-4663-8995-ad05657cf44c.jpeg', 1, 27, 3, 51, 36),
(120, '2026-05-19 07:04:27', '2026-05-19 07:04:27', 'BRG-40493', 'Lakban Hitam 1 Inch', 'Lakban Hitam 1 Inch', 'gambar-barang/15fbf8c9-0f8e-4766-bc28-7dbb3f78eda4.jpeg', 3, 0, 3, 51, 36),
(121, '2026-05-19 07:06:28', '2026-05-20 07:27:51', 'BRG-36158', 'Lakban Bening 1 Inch', 'Lakban Bening 1 Inch', 'gambar-barang/b409135f-5506-41ef-92bf-212d63bea756.jpeg', 1, 11, 3, 51, 36),
(122, '2026-05-19 07:07:39', '2026-05-20 07:16:18', 'BRG-62713', 'Double Tape 1 Inch', 'Double Tape 1 Inch', 'gambar-barang/8c3230e7-6b34-4233-a201-06f258a122c6.jpeg', 1, 8, 3, 51, 36),
(123, '2026-05-19 07:08:43', '2026-05-20 06:22:43', 'BRG-04332', 'Pena Tizo', 'Pena Tizo', 'gambar-barang/9cd6e15b-a659-4664-8690-01a1509aafb0.jpeg', 1, 12, 3, 51, 35),
(124, '2026-05-19 07:09:32', '2026-05-20 06:34:23', 'BRG-39801', 'Pena Kenko', 'Pena Kenko', 'gambar-barang/bc6c447c-2d69-4c60-b02f-960fdb3d38eb.jpeg', 0, 23, 3, 51, 35),
(125, '2026-05-19 07:10:11', '2026-05-20 07:15:59', 'BRG-36327', 'Clips Kenko', 'Clips Kenko', 'gambar-barang/18226651-f889-4b30-b307-640d9e79e338.jpeg', 1, 17, 3, 51, 35),
(126, '2026-05-19 07:12:26', '2026-05-20 07:10:19', 'BRG-72026', 'Hekter Kangaro_HS-10Y', 'Hekter Kangaro_HS-10Y', 'gambar-barang/924b9c0a-0964-4163-b486-ea7bf2054488.jpeg', 5, 18, 3, 51, 31),
(127, '2026-05-19 07:13:04', '2026-05-20 07:03:50', 'BRG-94204', 'Kalkulator-Joyko', 'Kalkulator-Joyko', 'gambar-barang/88d722a4-e0ce-47a7-b19b-11ba8b82d337.jpeg', 1, 30, 3, 51, 31),
(128, '2026-05-19 07:13:56', '2026-05-20 07:16:36', 'BRG-48027', 'Spidol Hitam', 'Spidol Hitam', 'gambar-barang/2c780f0e-a441-4b95-96d6-2782f3bc22bc.jpeg', 1, 8, 3, 51, 35),
(129, '2026-05-19 07:14:51', '2026-05-20 06:33:48', 'BRG-14499', 'Clips/Penjepit-Joyko', 'Clips/Penjepit-Joyko', 'gambar-barang/254aded5-3aab-49d1-add0-d90ad032d0af.jpeg', 1, 28, 3, 51, 35),
(130, '2026-05-19 07:15:55', '2026-05-20 07:10:35', 'BRG-42248', 'Penghapus Papan Tulis', 'Penghapus Papan Tulis', 'gambar-barang/8b9ee8d4-207c-4cd4-9c10-4e2ee32c4e7b.jpeg', 1, 13, 3, 51, 45),
(131, '2026-05-19 07:16:33', '2026-05-20 07:28:07', 'BRG-57005', 'Gunting', 'Gunting', 'gambar-barang/09a6e204-2bdd-4e47-ab9e-ca4f461ce3c2.jpeg', 3, 12, 3, 51, 31),
(132, '2026-05-19 07:17:19', '2026-05-20 06:17:14', 'BRG-05636', 'Kertas HVS-Natural', 'Kertas HVS-Natural', 'gambar-barang/e7354350-1c7f-4295-ba4d-1c80b8f90da6.jpeg', 3, 25, 3, 51, 34),
(133, '2026-05-19 07:19:18', '2026-05-20 07:12:09', 'BRG-52401', 'Refill Ink Printer-Kuning', 'Isi tinta printer brother-warna kuning', 'gambar-barang/fb800817-753f-42b7-ae7c-7ebb8479f531.jpeg', 1, 27, 3, 51, 35),
(134, '2026-05-19 07:20:41', '2026-05-20 06:32:54', 'BRG-99088', 'Refill Ink Printer-Cyan', 'Isi Tinta Printer Brother warna Cyan', 'gambar-barang/7ba05d7d-984e-4c46-bd31-6e66c9db35f2.jpeg', 1, 12, 3, 51, 35),
(135, '2026-05-19 07:21:21', '2026-05-20 07:12:28', 'BRG-09137', 'Refill Ink Printer-Hitam', 'Isi Tinta Printer Brother Warna Hitam', 'gambar-barang/3e490d1a-12de-4995-9726-6fede73775aa.jpeg', 1, 5, 3, 51, 35),
(136, '2026-05-19 07:22:26', '2026-05-20 06:32:21', 'BRG-69619', 'Refill Ink Printer-Magenta', 'Isi Tinta Printer Brother warna Magenta', 'gambar-barang/18ed979e-c594-4e48-aabb-c9610f872af3.jpeg', 1, 14, 3, 51, 35),
(137, '2026-05-19 07:23:47', '2026-05-20 07:16:48', 'BRG-11154', 'Pembolong Kertas-SunWell', 'Pembolong Kertas', 'gambar-barang/2671888e-4b65-4fcc-a10b-3139f4c9cc67.jpeg', 1, 5, 3, 51, 31),
(138, '2026-05-19 07:24:34', '2026-05-20 06:31:58', 'BRG-48869', 'Pembolong Kertas-Joyko', 'Pembolong Kertas', 'gambar-barang/3c78db16-a971-4f09-9b06-9f5ccefa6a0b.jpeg', 1, 14, 3, 51, 31),
(139, '2026-05-19 07:25:15', '2026-05-20 07:18:07', 'BRG-69394', 'Tissu Nice', 'Tissu Merek Nice', 'gambar-barang/3a2dc59f-fb9a-4167-a820-0b05cbc6edfc.jpeg', 1, 17, 3, 53, 31),
(140, '2026-05-19 07:28:06', '2026-05-20 06:31:20', 'BRG-27248', 'Refill Ink Printer Epson-Hitam', 'Refill Ink Printer Epson-Hitam', 'gambar-barang/fbe02e4e-4080-4386-9f62-6ab7540e8245.jpeg', 1, 27, 3, 51, 35),
(141, '2026-05-19 07:28:36', '2026-05-20 07:18:53', 'BRG-18344', 'Refill Ink Printer Epson-Kuning', 'Refill Ink Printer Epson-Kuning', 'gambar-barang/5fc5c9b4-39cf-4425-abee-c18b0c228919.jpeg', 1, 15, 3, 51, 35),
(142, '2026-05-19 07:29:19', '2026-05-20 07:19:09', 'BRG-71316', 'Refill Ink Printer Epson-Cyan', 'Refill Ink Printer Epson-Cyan', 'gambar-barang/20a9b821-8a0b-4544-9195-d32e121104f9.jpeg', 1, 10, 3, 51, 35),
(143, '2026-05-19 07:30:41', '2026-05-20 07:18:21', 'BRG-58074', 'Refill Ink Printer Epson-Magenta', 'Refill Ink Printer Epson-Magenta', 'gambar-barang/ac0c209a-9572-44b0-a5d1-c4c7f36614e6.jpeg', 1, 13, 3, 51, 35),
(144, '2026-05-19 07:31:38', '2026-05-20 06:20:12', 'BRG-63935', 'Bola Lampu 40 W-Visalux', 'Bola Lampu 40 W-Visalux', 'gambar-barang/7d981c1f-8a5b-4fc4-868f-9f2c61a6125a.jpeg', 1, 21, 3, 61, 31),
(145, '2026-05-19 07:32:44', '2026-05-20 06:19:54', 'BRG-87543', 'Bola Lampu 60 W-Visalux', 'Bola Lampu 60 W-Visalux', 'gambar-barang/Bola Lampu.jpeg', 0, 25, 3, 51, 31),
(146, '2026-05-19 07:35:36', '2026-05-20 06:30:35', 'BRG-48710', 'Stella 50 ML', 'Pewangi Ruangan-Stella 50 ML', 'gambar-barang/Stella.jpeg', 1, 12, 3, 53, 31),
(147, '2026-05-19 07:46:10', '2026-05-20 06:30:18', 'BRG-05415', 'Sabun Cuci Tangan-Clenso', 'Sabun Cuci Tangan-Clenso', 'gambar-barang/104ecc12-3e82-4b2d-a2c6-f132b25e686a.jpeg', 1, 13, 3, 53, 33),
(148, '2026-05-19 07:48:07', '2026-05-20 07:25:26', 'BRG-63212', 'Sabun Pel Lantai SOS', 'Sabun Pel Lantai SOS', 'gambar-barang/50924c80-b179-4ce3-ae0b-b8ccb5f5da4f.jpeg', 1, 13, 3, 53, 33),
(149, '2026-05-19 07:55:30', '2026-05-20 06:19:20', 'BRG-73486', 'Pembersih Lantai Toilet-Three M', 'Pembersih Lantai Toilet-Three M', 'gambar-barang/3f5b532b-9141-42a2-a8c1-cb47b82beaf7.jpeg', 1, 5, 3, 53, 33),
(150, '2026-05-19 07:56:13', '2026-05-20 07:08:38', 'BRG-86654', 'Pembersih Lantai Toilet-Starlight', 'Pembersih Lantai Toilet-Starlight', 'gambar-barang/1b167a1f-9964-4e42-af97-c163dcfc0a4a.jpeg', 1, 8, 3, 53, 33);

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
(81, 'TRX-OUT-2026-05-20-8909', '2024-01-31', 'Amplop Putih Polos-Paperline', 3, 37, 3, '2026-05-20 06:36:47', '2026-05-20 06:36:47'),
(82, 'TRX-OUT-2026-05-20-4998', '2024-01-31', 'Baterai-Eveready', 7, 38, 3, '2026-05-20 06:37:05', '2026-05-20 06:37:05'),
(83, 'TRX-OUT-2026-05-20-9162', '2024-02-01', 'Tinta Spidol-Refill Ink', 5, 38, 3, '2026-05-20 06:37:29', '2026-05-20 06:37:29'),
(84, 'TRX-OUT-2026-05-20-8278', '2024-03-30', 'Amplo Putih Polos Panjang-Paperline', 3, 48, 3, '2026-05-20 06:37:47', '2026-05-20 06:37:47'),
(85, 'TRX-OUT-2026-05-20-8825', '2024-04-30', 'Refill Ink Printer Epson-Cyan', 5, 41, 3, '2026-05-20 07:08:10', '2026-05-20 07:08:10'),
(86, 'TRX-OUT-2026-05-20-1968', '2024-05-15', 'Pembersih Lantai Toilet-Starlight', 2, 52, 3, '2026-05-20 07:08:38', '2026-05-20 07:08:38'),
(87, 'TRX-OUT-2026-05-20-9569', '2024-06-05', 'Refill Ink Printer Epson-Magenta', 5, 42, 3, '2026-05-20 07:09:07', '2026-05-20 07:09:07'),
(88, 'TRX-OUT-2026-05-20-1118', '2024-07-24', 'Hekter Kangaro_HS-10Y', 7, 43, 3, '2026-05-20 07:10:19', '2026-05-20 07:10:19'),
(89, 'TRX-OUT-2026-05-20-7412', '2024-08-28', 'Penghapus Papan Tulis', 4, 42, 3, '2026-05-20 07:10:35', '2026-05-20 07:10:35'),
(90, 'TRX-OUT-2026-05-20-0086', '2024-09-08', 'Gunting', 7, 40, 3, '2026-05-20 07:10:53', '2026-05-20 07:10:53'),
(91, 'TRX-OUT-2026-05-20-5407', '2024-10-30', 'Refill Ink Printer-Hitam', 3, 37, 3, '2026-05-20 07:11:48', '2026-05-20 07:11:48'),
(92, 'TRX-OUT-2026-05-20-4315', '2024-11-14', 'Refill Ink Printer-Kuning', 9, 36, 3, '2026-05-20 07:12:09', '2026-05-20 07:12:09'),
(93, 'TRX-OUT-2026-05-20-7025', '2024-12-31', 'Refill Ink Printer-Hitam', 3, 35, 3, '2026-05-20 07:12:28', '2026-05-20 07:12:28'),
(94, 'TRX-OUT-2026-05-20-5847', '2025-01-30', 'Lakban Hitam 2 Inc', 7, 44, 3, '2026-05-20 07:15:19', '2026-05-20 07:15:19'),
(95, 'TRX-OUT-2026-05-20-5231', '2025-02-20', 'Lakban Bening 1 Inch', 2, 39, 3, '2026-05-20 07:15:39', '2026-05-20 07:15:39'),
(96, 'TRX-OUT-2026-05-20-6648', '2025-03-12', 'Clips Kenko', 4, 34, 3, '2026-05-20 07:15:59', '2026-05-20 07:15:59'),
(97, 'TRX-OUT-2026-05-20-7416', '2025-04-30', 'Double Tape 1 Inch', 2, 32, 3, '2026-05-20 07:16:18', '2026-05-20 07:16:18'),
(98, 'TRX-OUT-2026-05-20-7143', '2025-04-30', 'Spidol Hitam', 7, 46, 3, '2026-05-20 07:16:36', '2026-05-20 07:16:36'),
(99, 'TRX-OUT-2026-05-20-9260', '2025-04-30', 'Pembolong Kertas-SunWell', 5, 46, 3, '2026-05-20 07:16:48', '2026-05-20 07:16:48'),
(102, 'TRX-OUT-2026-05-20-5084', '2025-05-30', 'Tissu Nice', 5, 45, 3, '2026-05-20 07:17:40', '2026-05-20 07:17:40'),
(103, 'TRX-OUT-2026-05-20-4615', '2025-06-12', 'Tissu Nice', 1, 45, 3, '2026-05-20 07:17:54', '2026-05-20 07:17:54'),
(104, 'TRX-OUT-2026-05-20-8470', '2025-07-10', 'Tissu Nice', 2, 44, 3, '2026-05-20 07:18:07', '2026-05-20 07:18:07'),
(105, 'TRX-OUT-2026-05-20-1052', '2025-08-30', 'Refill Ink Printer Epson-Magenta', 5, 44, 3, '2026-05-20 07:18:21', '2026-05-20 07:18:21'),
(106, 'TRX-OUT-2026-05-20-6244', '2025-09-22', 'Refill Ink Printer Epson-Cyan', 3, 52, 3, '2026-05-20 07:18:36', '2026-05-20 07:18:36'),
(107, 'TRX-OUT-2026-05-20-9654', '2025-10-24', 'Refill Ink Printer Epson-Kuning', 7, 51, 3, '2026-05-20 07:18:53', '2026-05-20 07:18:53'),
(108, 'TRX-OUT-2026-05-20-2208', '2025-11-27', 'Refill Ink Printer Epson-Cyan', 1, 51, 3, '2026-05-20 07:19:09', '2026-05-20 07:19:09'),
(109, 'TRX-OUT-2026-05-20-9528', '2025-12-27', 'Sabun Pel Lantai SOS', 3, 45, 3, '2026-05-20 07:19:29', '2026-05-20 07:19:29'),
(110, 'TRX-OUT-2026-05-20-1802', '2026-05-04', 'Sabun Pel Lantai SOS', 1, 45, 3, '2026-05-20 07:25:26', '2026-05-20 07:25:26'),
(111, 'TRX-OUT-2026-05-20-6045', '2026-05-04', 'Baterai-Eveready', 1, 35, 3, '2026-05-20 07:26:02', '2026-05-20 07:26:02'),
(112, 'TRX-OUT-2026-05-20-8285', '2026-01-28', 'Tinta Spidol-Refill Ink', 1, 31, 3, '2026-05-20 07:27:02', '2026-05-20 07:27:02'),
(113, 'TRX-OUT-2026-05-20-1564', '2026-02-25', 'Amplo Putih Polos Panjang-Paperline', 7, 33, 3, '2026-05-20 07:27:16', '2026-05-20 07:27:16'),
(114, 'TRX-OUT-2026-05-20-4372', '2026-03-28', 'Amplo Putih Polos Panjang-Paperline', 5, 36, 3, '2026-05-20 07:27:33', '2026-05-20 07:27:33'),
(115, 'TRX-OUT-2026-05-20-8376', '2026-04-30', 'Lakban Bening 1 Inch', 4, 39, 3, '2026-05-20 07:27:51', '2026-05-20 07:27:51'),
(116, 'TRX-OUT-2026-05-20-0755', '2026-05-12', 'Gunting', 1, 44, 3, '2026-05-20 07:28:07', '2026-05-20 07:28:07');

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
(124, 'TRX-IN-2026-5-20-0901', '2026-01-01', 'Amplop Putih Polos-Paperline', 10, 32, 3, '2026-05-20 06:09:27', '2026-05-20 06:09:27'),
(125, 'TRX-IN-2026-5-20-9978', '2026-01-01', 'Baterai-Eveready', 20, 32, 3, '2026-05-20 06:10:59', '2026-05-20 06:10:59'),
(126, 'TRX-IN-2026-5-20-2782', '2026-01-01', 'Tinta Spidol-Refill Ink', 15, 37, 3, '2026-05-20 06:12:28', '2026-05-20 06:12:28'),
(127, 'TRX-IN-2026-5-20-3808', '2026-01-07', 'Amplo Putih Polos Panjang-Paperline', 20, 38, 3, '2026-05-20 06:12:54', '2026-05-20 06:12:54'),
(128, 'TRX-IN-2026-5-20-6078', '2026-02-10', 'Amplop Putih Polos Panjang-Merpati', 10, 40, 3, '2026-05-20 06:13:42', '2026-05-20 06:13:42'),
(129, 'TRX-IN-2026-5-20-6467', '2026-03-25', 'Lakban Hitam 2 Inc', 20, 41, 3, '2026-05-20 06:14:02', '2026-05-20 06:14:02'),
(130, 'TRX-IN-2026-5-20-3699', '2026-04-01', 'Double Tape 1 Inch', 10, 41, 3, '2026-05-20 06:15:19', '2026-05-20 06:15:19'),
(131, 'TRX-IN-2026-5-20-2582', '2026-04-01', 'Pembolong Kertas-SunWell', 10, 43, 3, '2026-05-20 06:15:54', '2026-05-20 06:15:54'),
(132, 'TRX-IN-2026-5-20-4503', '2026-05-01', 'Kertas HVS-Natural', 25, 40, 3, '2026-05-20 06:17:14', '2026-05-20 06:17:14'),
(133, 'TRX-IN-2026-5-20-1619', '2025-01-30', 'Kalkulator-Joyko', 15, 32, 3, '2026-05-20 06:18:22', '2026-05-20 06:18:22'),
(134, 'TRX-IN-2026-5-20-3134', '2025-01-30', 'Spidol Hitam', 15, 32, 3, '2026-05-20 06:18:42', '2026-05-20 06:18:42'),
(135, 'TRX-IN-2026-5-20-0831', '2025-03-26', 'Pembersih Lantai Toilet-Starlight', 10, 32, 3, '2026-05-20 06:19:00', '2026-05-20 06:19:00'),
(136, 'TRX-IN-2026-5-20-5604', '2025-03-26', 'Pembersih Lantai Toilet-Three M', 5, 35, 3, '2026-05-20 06:19:20', '2026-05-20 06:19:20'),
(137, 'TRX-IN-2026-5-20-6489', '2025-03-26', 'Sabun Pel Lantai SOS', 17, 36, 3, '2026-05-20 06:19:37', '2026-05-20 06:19:37'),
(138, 'TRX-IN-2026-5-20-8488', '2025-03-26', 'Bola Lampu 60 W-Visalux', 25, 36, 3, '2026-05-20 06:19:54', '2026-05-20 06:19:54'),
(139, 'TRX-IN-2026-5-20-7267', '2025-06-19', 'Bola Lampu 40 W-Visalux', 21, 42, 3, '2026-05-20 06:20:12', '2026-05-20 06:20:12'),
(140, 'TRX-IN-2026-5-20-0485', '2025-07-31', 'Refill Ink Printer Epson-Magenta', 23, 42, 3, '2026-05-20 06:20:32', '2026-05-20 06:20:32'),
(141, 'TRX-IN-2026-5-20-6682', '2025-08-25', 'Refill Ink Printer Epson-Kuning', 22, 40, 3, '2026-05-20 06:20:49', '2026-05-20 06:20:49'),
(142, 'TRX-IN-2026-5-20-9504', '2025-02-26', 'Pena Tizo', 12, 40, 3, '2026-05-20 06:22:43', '2026-05-20 06:22:43'),
(143, 'TRX-IN-2026-5-20-2957', '2025-04-30', 'Lakban Hitam 2 Inc', 14, 34, 3, '2026-05-20 06:24:03', '2026-05-20 06:24:03'),
(144, 'TRX-IN-2026-5-20-5591', '2025-05-12', 'Clips Kenko', 21, 33, 3, '2026-05-20 06:24:40', '2026-05-20 06:24:40'),
(145, 'TRX-IN-2026-5-20-1680', '2025-09-08', 'Gunting', 20, 35, 3, '2026-05-20 06:25:38', '2026-05-20 06:25:38'),
(146, 'TRX-IN-2026-5-20-1212', '2025-10-26', 'Hekter Kangaro_HS-10Y', 25, 44, 3, '2026-05-20 06:26:21', '2026-05-20 06:26:21'),
(147, 'TRX-IN-2026-5-20-2628', '2025-11-01', 'Refill Ink Printer-Kuning', 16, 37, 3, '2026-05-20 06:27:04', '2026-05-20 06:27:04'),
(148, 'TRX-IN-2026-5-20-0677', '2025-12-17', 'Lakban Bening 1 Inch', 17, 47, 3, '2026-05-20 06:27:47', '2026-05-20 06:27:47'),
(149, 'TRX-IN-2026-5-20-2972', '2024-01-10', 'Sabun Cuci Tangan-Clenso', 13, 36, 3, '2026-05-20 06:30:18', '2026-05-20 06:30:18'),
(150, 'TRX-IN-2026-5-20-2986', '2024-02-21', 'Stella 50 ML', 12, 38, 3, '2026-05-20 06:30:35', '2026-05-20 06:30:35'),
(151, 'TRX-IN-2026-5-20-4845', '2024-02-21', 'Refill Ink Printer Epson-Cyan', 19, 44, 3, '2026-05-20 06:31:03', '2026-05-20 06:31:03'),
(152, 'TRX-IN-2026-5-20-2114', '2024-02-21', 'Refill Ink Printer Epson-Hitam', 27, 43, 3, '2026-05-20 06:31:20', '2026-05-20 06:31:20'),
(153, 'TRX-IN-2026-5-20-9068', '2024-02-21', 'Tissu Nice', 25, 43, 3, '2026-05-20 06:31:34', '2026-05-20 06:31:34'),
(154, 'TRX-IN-2026-5-20-0054', '2024-06-08', 'Pembolong Kertas-Joyko', 14, 47, 3, '2026-05-20 06:31:58', '2026-05-20 06:31:58'),
(155, 'TRX-IN-2026-5-20-4320', '2024-06-08', 'Refill Ink Printer-Magenta', 14, 41, 3, '2026-05-20 06:32:21', '2026-05-20 06:32:21'),
(156, 'TRX-IN-2026-5-20-1541', '2024-08-15', 'Refill Ink Printer-Hitam', 11, 44, 3, '2026-05-20 06:32:38', '2026-05-20 06:32:38'),
(157, 'TRX-IN-2026-5-20-9831', '2024-09-05', 'Refill Ink Printer-Cyan', 12, 38, 3, '2026-05-20 06:32:54', '2026-05-20 06:32:54'),
(158, 'TRX-IN-2026-5-20-9346', '2024-10-23', 'Penghapus Papan Tulis', 17, 39, 3, '2026-05-20 06:33:25', '2026-05-20 06:33:25'),
(159, 'TRX-IN-2026-5-20-4563', '2024-11-08', 'Clips/Penjepit-Joyko', 28, 37, 3, '2026-05-20 06:33:48', '2026-05-20 06:33:48'),
(160, 'TRX-IN-2026-5-20-4846', '2024-12-31', 'Pena Kenko', 23, 41, 3, '2026-05-20 06:34:23', '2026-05-20 06:34:23'),
(161, 'TRX-IN-2026-5-20-2089', '2024-04-24', 'Amplo Putih Polos Panjang-Paperline', 16, 35, 3, '2026-05-20 07:02:47', '2026-05-20 07:02:47'),
(162, 'TRX-IN-2026-5-20-4373', '2024-05-29', 'Kalkulator-Joyko', 15, 38, 3, '2026-05-20 07:03:50', '2026-05-20 07:03:50'),
(163, 'TRX-IN-2026-5-20-4586', '2024-07-01', 'Refill Ink Printer-Kuning', 20, 43, 3, '2026-05-20 07:04:50', '2026-05-20 07:04:50');

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
(31, 'ANGLING LARAS PRIHARTANTI', 'Tendik', 1, '2026-03-13 10:53:38', '2026-03-13 10:53:38'),
(32, 'DAUD GUNAWAN, S.E', 'Guru', 1, '2026-03-13 10:54:00', '2026-05-15 12:31:04'),
(33, 'DAYYU BUNGA NUR AISYAH, S.M', 'Guru', 1, '2026-03-13 10:54:17', '2026-03-13 10:54:17'),
(34, 'DIANA KARLINA, S.Pd', 'Guru', 1, '2026-03-13 10:54:37', '2026-03-13 10:54:37'),
(35, 'DINA JULIANI,S.Ap', 'Guru', 1, '2026-03-13 10:54:55', '2026-03-13 10:54:55'),
(36, 'ERNI YANA, S.Pd', 'Guru', 1, '2026-03-13 10:55:12', '2026-03-13 10:55:12'),
(37, 'LISBETH EVADESY PARDEDE, S.Pd', 'Guru', 1, '2026-03-13 10:55:27', '2026-03-13 10:55:27'),
(38, 'MARIA ULFAH, S.M', 'Guru', 1, '2026-03-13 10:55:42', '2026-03-13 10:55:42'),
(39, 'MAYANG WAHYUNI, S.si', 'Guru', 1, '2026-03-13 10:55:57', '2026-03-13 10:55:57'),
(40, 'MAYLIN,S.Ak', 'Guru', 1, '2026-03-13 10:56:14', '2026-03-13 10:56:14'),
(41, 'NUR ARIFAH, S.Kom', 'Guru', 1, '2026-03-13 10:56:31', '2026-03-13 10:56:31'),
(42, 'PUJI RAHAYU, S.Pd.B', 'Guru', 1, '2026-03-13 10:57:30', '2026-03-13 10:57:30'),
(43, 'RAJA RUDIANTO', 'Tendik', 1, '2026-03-13 10:57:45', '2026-03-13 10:57:45'),
(44, 'RATNA HARDIANTI, S.Pd', 'Guru', 1, '2026-03-13 10:58:02', '2026-03-13 10:58:02'),
(45, 'RENITA SAOGO', 'Tendik', 1, '2026-03-13 10:58:22', '2026-03-13 10:58:22'),
(46, 'RINI RAHMADHANI, S.Pd.,Jas', 'Guru', 1, '2026-03-13 10:58:37', '2026-03-13 10:58:37'),
(47, 'RITA SURYANI,S.Pd', 'Guru', 1, '2026-03-13 10:58:52', '2026-03-13 10:58:52'),
(48, 'SUCI RAHMADHANI,SE', 'Guru', 1, '2026-03-13 10:59:07', '2026-03-13 10:59:07'),
(49, 'YAKOBUS YANTO, S.S', 'Guru', 1, '2026-03-13 10:59:27', '2026-03-13 10:59:27'),
(51, 'Rinawati Samosir', 'Guru', 1, '2026-03-13 11:02:46', '2026-03-13 11:02:46'),
(52, 'Nur Asniarty,S.H', 'Guru', 1, '2026-03-13 11:03:41', '2026-03-13 11:03:41'),
(53, 'Helyadi Beni Tandiono', 'Tendik', 1, '2026-05-09 06:36:44', '2026-05-09 06:36:44');

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
(51, 'Alat Tulis Kantor', 1, '2026-03-03 06:55:16', '2026-03-03 06:55:16'),
(52, 'Peralatan Olahraga', 1, '2026-03-03 06:55:39', '2026-03-03 06:55:39'),
(53, 'Peralatan Kebersihan', 1, '2026-03-03 06:55:55', '2026-03-03 06:55:55'),
(54, 'Peralatan Multimedia', 1, '2026-03-03 06:56:10', '2026-03-03 06:56:10'),
(55, 'Peralatan Jaringan & IT', 1, '2026-03-03 06:56:30', '2026-03-03 06:56:30'),
(56, 'Peralatan Keamanan', 1, '2026-03-03 06:56:48', '2026-03-03 06:56:48'),
(57, 'Perabotan', 1, '2026-03-05 14:59:34', '2026-03-05 14:59:34'),
(61, 'Elektronik', 1, '2026-05-09 00:07:28', '2026-05-09 00:07:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(24, '2026_02_12_183634_add_avatar_to_users_table', 10),
(25, '2026_02_15_204549_create_settings_table', 11),
(26, '2026_02_15_213727_add_logo_to_global_settings', 12),
(27, '2026_02_28_223456_create_jobs_table', 12),
(28, '2026_03_04_add_kepsek_waka_to_settings_table', 12),
(29, '2026_03_13_093159_create_aset_deletion_logs_table', 13),
(30, '2025_03_13__create_aset_riwayat_hapus_table', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$LoH3qXcYNUTgpbo5D7dGGea8./HRjvVhnvx9N1l2wSsIBWeC7W4Fy', '2026-03-21 13:57:59'),
('helyadibeni@gmail.com', '$2y$10$C5y2i3kbUWPVY7N02L6TwenfQwswvpqg72mfsEy1Pgl4HMISwl6Te', '2026-03-21 14:18:23');

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
(1, 'superadmin', 'Superadmin memiliki kendali penuh pada aplikasi termasuk manajemen User', '2025-05-30 06:09:55', '2026-05-10 13:19:52'),
(2, 'kepala sekolah', 'Kepala Sekolah memilki akses ke menu Dashboard-Aset Sekolah [read only]-Stok Barang-Barang Masuk-Barang Keluar-Aktivitas User', '2025-05-30 06:09:55', '2026-03-04 12:09:00'),
(3, 'admin', 'Admin memilki akses ke menu Dashboard-Aset Sekolah-Data Barang-Relasi-Transaksi-Laporan', '2025-05-30 06:09:55', '2026-03-04 12:09:47');

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
(31, '2026-02-12 02:35:00', '2026-04-16 14:02:51', 'Buah', 1),
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
(53, '2026-02-13 07:53:42', '2026-02-13 07:53:42', 'Meter Kubik (m³)', 1),
(57, '2026-03-14 14:01:19', '2026-03-14 14:01:19', 'Botol', 1),
(58, '2026-05-09 00:17:33', '2026-05-09 00:17:33', 'Kilo', 1),
(59, '2026-05-19 08:05:01', '2026-05-19 08:05:01', 'Lembar', 3);

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

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lVbFS8dNbsLP28MMN3tQqPXM2cObw2pb5koCGkez', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDN4ME9zSUg2emRYR2t0NU5LWVNEQkg1TzhXeG1MbEt0Wko0YmNmSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1773417549),
('N9qIviLhg4aDfijyXqKDp8FrS44wFNe6JwA2LOaS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic0V2ME1IUmltNkZKSXdyTTZHRlRJZ0Z0Q2xnRkZjamxaZ1pLN3N0byI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2F1dGgtY2hlY2siO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjtzOjU6InJvdXRlIjtzOjU6ImxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1773417552),
('Xeppmar4dJAH9K4Z1duAphgZLrBVVB5sBWxYNV5S', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjhjVDJaZkdrZDV3SVE2UTJpOUJmM2lpS0JOUjJNU1RodVplU3kxdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1773465849);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SISTEM INFORMASI INVENTARIS',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kepsek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_kepsek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_waka` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nuptk_waka` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `nama_instansi`, `logo`, `nama_kepsek`, `nip_kepsek`, `nama_waka`, `nuptk_waka`, `created_at`, `updated_at`) VALUES
(1, 'SMKS VIDYA SASANA', '1771252644_logo-sekolah111.png', 'Daud Gunawan,S.E', '12345678910', 'Rita Suryani,S.Pd', '12345678910', '2026-02-15 13:58:33', '2026-05-10 13:58:49');

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
(32, 'Toko Bali', 'Tg.Balai Karimun', 1, '2026-03-03 08:39:55', '2026-03-03 08:39:55'),
(33, 'Bali Bangunan', 'Tg.Balai Karimun', 1, '2026-03-03 08:40:09', '2026-05-09 06:26:20'),
(34, 'Salam Sukse', 'Tg.Balai Karimun', 1, '2026-03-03 08:40:33', '2026-03-03 08:40:33'),
(35, 'Indo Bali', 'Tg.Balai Karimun', 1, '2026-03-03 08:40:52', '2026-03-03 08:40:52'),
(36, 'Wen Mart', 'Tg.Balai Karimun', 1, '2026-03-03 08:41:04', '2026-03-03 08:41:04'),
(37, 'Digital Printing', 'Tg.Balai Karimun', 1, '2026-03-03 08:41:42', '2026-03-03 08:41:42'),
(38, 'Apple Print', 'Tg.Balai Karimun', 1, '2026-03-03 08:42:34', '2026-03-03 08:42:34'),
(39, 'Sumber Tani', 'Tg.Balai Karimun', 1, '2026-03-03 08:42:46', '2026-03-03 08:42:46'),
(40, 'Station Komputer Jaya', 'Tg.Balai Karimun', 1, '2026-03-03 08:43:33', '2026-03-03 08:43:33'),
(41, 'Kharisma', 'Tg.Balai Karimun', 1, '2026-03-03 08:44:03', '2026-03-03 08:44:03'),
(42, 'Mitra Bangunan', 'Tg.Balai Karimun', 1, '2026-03-03 08:44:40', '2026-03-03 08:44:40'),
(43, 'Goginway', 'Tg.Balai Karimun', 1, '2026-03-03 08:45:16', '2026-03-03 08:45:16'),
(44, 'Ekaria', 'Tg.Balai Karimun', 1, '2026-03-08 10:34:31', '2026-03-08 10:34:31'),
(46, 'Toko Kue', 'Tanjung Balai Karimun', 1, '2026-03-14 10:02:49', '2026-03-14 10:15:54'),
(47, 'CV Maju Bersama', 'CV Maju Bersama', 1, '2026-05-09 06:16:21', '2026-05-09 06:16:21');

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
(1, 'Administrator', 'superadmin@gmail.com', NULL, '$2y$10$NyVuj9Oj7zsgJijqISwiMer7bXmvs13mmt3h3ikR3MX5xvwmxLEtW', '1778420998.png', NULL, 1, '9erQ0n84AImNEPP1GdfYZ0WBpsldhqP3PBiOFKMWXpUOoKEqHgmOB4CyC76D', NULL, '2025-05-30 06:09:55', '2026-05-20 06:01:37'),
(2, 'Daud Gunawan,S.E.', 'kepalasekolah@gmail.com', NULL, '$2y$10$Cb4FMEq8snVclfGK07LvEe9ihBOWgYUccjsY3Q7viQt3PinnYbmme', '1771345190.png', NULL, 2, 'xShnJrv5Tcutrd4CFf5H14Yo8mYxzrpWhyPUvgVfx0SStYUlJHJ93sZZP53N', NULL, '2025-05-30 06:09:55', '2026-05-19 06:52:10'),
(3, 'Rita Suryani, S.Pd.', 'admin@gmail.com', NULL, '$2y$10$1WXXpqTEAM4XFrSsthHyU.HLxskJD4PQn4JVQYSavNL5J8G0tVuXq', '1771605748.png', NULL, 3, 'IhXjoMLVgroEgBlYDdDKAKiIqGctFddaSkQ1lPW6ON3c1ZgxqKC1WAwcYVx4', NULL, '2025-05-30 06:09:55', '2026-05-20 07:31:13');

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
-- Indeks untuk tabel `aset_deletion_logs`
--
ALTER TABLE `aset_deletion_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aset_deletion_logs_deleted_by_foreign` (`deleted_by`);

--
-- Indeks untuk tabel `aset_riwayat_hapus`
--
ALTER TABLE `aset_riwayat_hapus`
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
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1467;

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `asets`
--
ALTER TABLE `asets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT untuk tabel `aset_deletion_logs`
--
ALTER TABLE `aset_deletion_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aset_riwayat_hapus`
--
ALTER TABLE `aset_riwayat_hapus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT untuk tabel `barang_keluars`
--
ALTER TABLE `barang_keluars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aset_deletion_logs`
--
ALTER TABLE `aset_deletion_logs`
  ADD CONSTRAINT `aset_deletion_logs_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
