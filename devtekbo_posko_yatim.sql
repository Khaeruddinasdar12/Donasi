-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Apr 2019 pada 21.04
-- Versi server: 10.2.22-MariaDB
-- Versi PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devtekbo_posko_yatim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `foto`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Brian', 'Brian@gmail.com', '082344949505', 'fotoadmin/UCl0voDsCqK1KZriP7TJSDL4R0MSUHLGpw2bEv26.png', NULL, '$2y$10$63YSqfpGzTPjTd4Fat5QguK3H45rTj7VB04IiOLabAAvcopZZFXYG', NULL, '2019-03-14 06:17:04', '2019-03-30 01:44:22'),
(13, 'Sri Rinardi Putra', 'sririnardi@gmail.com', '085255995255', 'fotoadmin/1iCOBkhXplNweD1aW95Qso6esp2f3dE5Wj5aUPve.jpeg', NULL, '$2y$10$TO2jvMW8V05Qk4fCXyxdn.991hzKaikmFtO2DjtPWqbvRj7LoJav.', NULL, '2019-03-30 01:47:39', '2019-04-03 08:51:27'),
(14, 'Lisa', 'lisa@gmail.com', '082344949505', 'fotoadmin/uAHzFXJ7aICp3UVrKsT1EBf2WIobvcGcwDXjE483.png', NULL, '$2y$10$B/JaSV81N8M41mKxOcMCkOazYdau73rskLGa0NNv2KTjBM.mVrBXq', NULL, '2019-03-30 02:35:25', '2019-03-30 02:35:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswas`
--

CREATE TABLE `beasiswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_penerima` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_persemester` int(11) NOT NULL,
  `jumlah_total` int(11) DEFAULT NULL,
  `lama` int(11) NOT NULL,
  `pendidikan` enum('S1','D3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mitra` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kampus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beasiswas`
--

INSERT INTO `beasiswas` (`id`, `nama_penerima`, `deskripsi`, `dokumentasi`, `jumlah_persemester`, `jumlah_total`, `lama`, `pendidikan`, `status`, `id_mitra`, `created_by`, `updated_by`, `created_at`, `updated_at`, `kampus`) VALUES
(10, 'St. Khadijah', 'St. khadijah adalah siswa yang berprestasi dan berhak mendapat bantuan untuk melanjutkan studinya di jenjang perguruan tinggi sesuai cita-citanya. Semoga berkah aamiin.', 'fotobeasiswa/HCzD7PaTHXNjuWEYh0RxjuznpwcEODyTMHXi6QF7.jpeg', 250000, 500000, 6, 'S1', 'active', 6, 13, 'Sri Rinardi Putra', '2019-03-31 05:34:40', '2019-04-03 10:17:44', 'Universitas Hasanuddin'),
(11, 'Muh. Faiz Ramadhan', 'Muh. Faiz Ramadhan adalah anak yang berprestasi sehingga posko yatim memberikan santunan berupa beasiswa kuliah selama 4 tahun di fakultas Ekonomi syariah Unismuh Makassar.', 'fotobeasiswa/BWhiSleeGFLkCvnGWeYPvNzKz2Fa8dUHNN3uy4mp.jpeg', 2500000, 2500000, 7, 'S1', 'active', 5, 13, NULL, '2019-04-03 10:21:20', '2019-04-03 10:21:20', 'Universitas Muhammadiyah Makassar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasis`
--

CREATE TABLE `donasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_by` int(10) UNSIGNED DEFAULT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('sampai','belum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `donasis`
--

INSERT INTO `donasis` (`id`, `nama`, `email`, `nohp`, `confirm_by`, `pekerjaan`, `status`, `jumlah`, `foto`, `created_at`, `updated_at`) VALUES
(21, 'Astridevi', 'devi@gmail.com', '08234459900', NULL, 'SIswa', 'belum', 50000, NULL, '2019-03-30 04:02:59', '2019-03-30 04:02:59'),
(22, 'Astridevi', 'devi@gmail.com', '08234459900', NULL, 'SIswa', 'belum', 50000, NULL, '2019-03-30 04:02:59', '2019-03-30 04:02:59'),
(23, 'Astridevi', 'devi@gmail.com', '08234459900', NULL, 'SIswa', 'belum', 50000, NULL, '2019-03-30 04:05:55', '2019-03-30 04:05:55'),
(24, 'Astridevai', 'devai@gmail.com', '08234459900', NULL, 'SIswa', 'belum', 50000, 'buktiuser/eRe6HE4It9vl14ZzZlfYcWQUaztmruW9NsrEPif4.png', '2019-03-30 04:07:48', '2019-03-31 06:41:49'),
(25, 'Nunung', 'banyal@gmail.com', '08234459900', 14, 'pengusaha', 'sampai', 60000, 'buktiuser/JefKogONQx8EYf7zpjyTCsXTh0SO321XhuxttuKe.png', '2019-03-30 04:14:38', '2019-03-30 04:18:35'),
(26, 'Inka Cristie', 'inka@gmail.com', '082321324322', NULL, 'Pegawai Bri Watampone', 'belum', 250000, NULL, '2019-03-31 06:41:16', '2019-03-31 06:41:16'),
(27, 'Aren Niarti Paginta\'', 'Aren@gmail.com', '082344505076', NULL, 'Dosen', 'belum', 150000, NULL, '2019-04-03 05:19:37', '2019-04-03 05:19:37'),
(28, 'Firman', 'firman@gmail.com', '089676715591', 13, 'Petani', 'sampai', 500000, 'buktiuser/ndPo19FhFT8euaL3XE9yCcGZn92Ubvlt2fw94Ydo.jpeg', '2019-04-03 08:54:34', '2019-04-03 08:59:40'),
(29, 'Sinsing', 'sin@gmail.com', '082345673231', 13, 'Pedagang', 'sampai', 250000, 'buktiuser/CXwo83owgRJpHgEiPJcFMK1QQvgwCPOnnmOQFbZF.jpeg', '2019-04-03 10:22:43', '2019-04-03 10:23:48'),
(30, 'H. Andi Akbar', 'akbar@gmail.com', '089676715591', 13, 'Pengusaha', 'sampai', 10000000, 'buktiuser/3QsaBroGcAVH5d2p5juJTBIRuJikIUIMAoqddBja.png', '2019-04-03 10:38:07', '2019-04-03 10:39:39'),
(31, 'suryani', 'a.surya.a.z@gmail.com', '082196456777', 13, 'dosen', 'sampai', 1000000, 'buktiuser/vdFRphITB7HmaO9B5dbcLYmw33rAGJy43AjU4Qzi.jpeg', '2019-04-03 22:44:51', '2019-04-03 23:07:01'),
(32, 'suryani', 'a.surya.a.z@gmail.com', '082196456777', NULL, 'dosen swasta', 'belum', 1500000, NULL, '2019-04-03 22:52:33', '2019-04-03 22:52:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasiusers`
--

CREATE TABLE `donasiusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('sampai','belum','proses') COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` int(10) UNSIGNED DEFAULT NULL,
  `confirm_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `donasiusers`
--

INSERT INTO `donasiusers` (`id`, `jumlah`, `foto`, `status`, `iduser`, `confirm_by`, `created_at`, `updated_at`) VALUES
(21, 3000000, 'buktidonatur/bUgRRg80uMMttLZcPueTGPmPud4HVVQbIiWjhIZH.png', 'sampai', 7, 5, '2019-03-30 03:00:35', '2019-03-30 04:33:40'),
(22, 150000, 'buktidonatur/h50H4VPXcfye95NBKiQ3kjlBGCPTvfznhSTaRISn.png', 'proses', 8, NULL, '2019-03-30 06:20:50', '2019-03-31 06:44:08'),
(23, 150000, 'buktidonatur/sNzbwymFZo9O4ZxDHO2rZJJ8DEV8TwaZ6vPB0duf.jpeg', 'sampai', 8, 13, '2019-03-30 06:21:23', '2019-03-31 05:16:22'),
(24, 750000, 'buktidonatur/x2NHELl4g97gmFok7x77DDKbpOreqZ2Cek3UAcB4.png', 'sampai', 8, 13, '2019-03-31 06:42:32', '2019-04-03 09:02:24'),
(25, 90000, NULL, 'belum', 8, NULL, '2019-04-03 05:20:15', '2019-04-03 05:20:15'),
(26, 250000, NULL, 'belum', 10, NULL, '2019-04-03 09:13:43', '2019-04-03 09:13:43'),
(27, 5000000, 'buktidonatur/ZnsB1iXg86rzCqbAPhNSNxoFBUswJIU4kSFZKJoz.png', 'sampai', 12, 13, '2019-04-03 09:42:15', '2019-04-03 09:44:25'),
(28, 500000, NULL, 'belum', 15, NULL, '2019-04-03 23:00:31', '2019-04-03 23:00:31'),
(29, 500000, 'buktidonatur/IazlsjxBJaX5Xh1YGxrXqpfVJLhomkbI44F5Dxkh.jpeg', 'sampai', 15, 13, '2019-04-03 23:04:37', '2019-04-03 23:06:31'),
(30, 100000, NULL, 'belum', 16, NULL, '2019-04-03 23:05:34', '2019-04-03 23:05:34'),
(31, 2500000, 'buktidonatur/PTd4EHvGKCQKJqAXkaixmzDkGdc5Vgy4TLgZHPD5.jpeg', 'sampai', 14, 13, '2019-04-03 23:11:31', '2019-04-03 23:14:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiataninfaks`
--

CREATE TABLE `kegiataninfaks` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiataninfaks`
--

INSERT INTO `kegiataninfaks` (`id`, `nama_kegiatan`, `deskripsi`, `jumlah`, `created_by`, `updated_by`, `dokumentasi`, `created_at`, `updated_at`) VALUES
(2, 'Penyaluran Makanan', 'Kegiatan ini di laksanakan pada tanggal 31 maret 2019, bertempat di Makassar. Sebanyak 20 anak yatim telah diberikan makanan gratis oleh pihak posko yatim, dengan rasa bahagia anak-anak menikmati kegiatan ini, karena selain sebagai ajang silaturahmi, juga merupakan hiburan bagi anak-anak telah bertemu dengan orang baru.\r\nKami dari pihak posko yatim insha Allah akan melaksanakan kegiatan sejenis ini secara rutin, mudah-mudahan penuh berkah dan mendapat Ridha Ilahi, aamiin.', 500000, 13, 'Sri Rinardi Putra', 'kegiataninfak/06fwpIxX6n6ZBF4YSIBAZ7W4SzUI8q5dk3lTgvwu.jpeg', '2019-03-31 05:20:31', '2019-04-03 09:57:35'),
(3, 'study tour', 'Kegiatan ini dilakukan pada tanggal 24 Maret 2019 di Tribun Timur Makassar.\r\nStudy Tour merupakan kegiatan yang dilakukan untuk anak yatim dalam mengenal dunia jurnalistik.\r\nkegiatan tersebut diikuti oleh 50 orang anak yatim, dengan total biaya sebesar 500.000 rupiah dengan rincian sebagai berikut :\r\n\r\n1. konsumsi (nasi box) : 5.000 x 55 = 275.000\r\n2. Transportasi (pete-pete) : pulang-pergi = 100.000\r\n3. Uang saku : 2.500/anak x 50 = 125.000', 500000, 13, 'Sri Rinardi Putra', 'kegiataninfak/l64BimSi3fJ9Dr2iEnWOblNCNeIEXb6K2NuHM4jI.jpeg', '2019-04-03 09:26:14', '2019-04-03 09:32:30'),
(4, 'Liburan Ceria', 'Liburan Ceria merupakan kegiatan untuk anak yatim dalam rangka mengisi hari libur.\r\nbiasanya anak-anak yatim akan dibawa ke tempat rekreasi atau budaya/cagar alam.', 1000000, 13, NULL, 'kegiataninfak/NiDEWEy0Wi7yDFe0Jjz3G4xbLmIHJswdIDhPdk7F.jpeg', '2019-04-03 10:06:32', '2019-04-03 10:06:32'),
(5, 'Seminar Motivasi', 'Kegiatan POSKO YATIM Seminar Motivasi\" Membangun Spirit umat untuk Peduli\" yang dirangkaikan dengan pemberian Santunan dan Beasiswa kepada anak yatim dhuafa Dr POSKO YATIM', 2500000, 13, NULL, 'kegiataninfak/DMZHEBx6ou7ms4zbCcp3Nd6Yv6HnPBHuSi2QUcuH.jpeg', '2019-04-03 10:11:19', '2019-04-03 10:11:19'),
(6, 'Berbagi Makan dan Inspirasi', 'setiap pekan, lebih tepatnya hari jumat. posko yatim melakukan kegiatan makan bersama dan berbagi inspirasi kepada anak-anak yatim.\r\ninti kegiatan ini adalah memberikan motivasi kepada anak-anak yatim dan dirangkaikan dengan makan bersama.', 300000, 13, NULL, 'kegiataninfak/vnT00aB1hSxYljGlb4kPAOhxo57dZBJhsNbNOM04.jpeg', '2019-04-03 16:52:35', '2019-04-03 16:52:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_07_134613_create_admins_table', 2),
(4, '2019_03_07_135215_create_admins_table', 3),
(5, '2019_03_11_061051_create_pemberdayaans_table', 4),
(6, '2019_03_11_073559_create__pemberdayaans_table', 5),
(7, '2019_03_11_074155_create__pemberdayaans_table', 6),
(8, '2019_03_11_155101_create_donasis_table', 7),
(9, '2019_03_11_161916_create_donasis_table', 8),
(10, '2019_03_11_163836_create_totaldonasis_table', 9),
(11, '2019_03_12_012304_create_donasis_table', 10),
(12, '2019_03_13_175846_penyesuaiain_users_table', 11),
(13, '2019_03_13_184201_create_penyalurans_create', 12),
(14, '2019_03_14_171005_penyesuaian_table_user', 13),
(15, '2019_03_15_041150_create_validasibayar_table', 14),
(16, '2019_03_15_162157_create_donasiusers_table', 15),
(17, '2019_03_15_162607_create_donasiusers_table', 16),
(18, '2019_03_16_231853_create_penyalurans_table', 17),
(19, '2019_03_17_001206_create_penyalurans_table', 18),
(20, '2019_03_17_094943_create_donasiusers_table', 19),
(21, '2019_03_17_095837_create_donasis_table', 20),
(22, '2019_03_17_101837_create_penyalurans_table', 21),
(23, '2019_03_17_102255_create_penyalurans_table', 22),
(24, '2019_03_17_110526_create_penyalurans_table', 23),
(25, '2019_03_17_130943_create_donasis_table', 24),
(26, '2019_03_18_074854_create_anakyatims_table', 25),
(27, '2019_03_18_075123_create_anakyatims_table', 26),
(28, '2019_03_18_083918_create_anakyatims_table', 27),
(29, '2019_03_18_124638_create_mitras_table', 28),
(30, '2019_03_18_140110_create_mitras_table', 29),
(31, '2019_03_19_104640_create_ukms_table', 30),
(32, '2019_03_19_110155_create_ukms_table', 31),
(33, '2019_03_19_120246_create_beasiswas_table', 32),
(34, '2019_03_19_142425_create_kegiataninfaks_table', 33),
(35, '2019_03_19_181941_create_beasiswas_table', 34),
(36, '2019_03_19_182223_create_beasiswas_table', 35),
(37, '2019_03_19_183607_create_beasiswas_table', 36),
(38, '2019_03_20_051600_create_ukms_table', 37),
(39, '2019_03_20_052229_create_ukms_table', 38),
(40, '2019_03_20_132453_create_donasiusers_table', 39),
(41, '2019_03_22_070839_create_totaldonasis_table', 40),
(42, '2019_03_25_163722_sesuaikan_table_users', 41),
(43, '2019_03_25_182243_pesesuaikan_table_users', 41),
(44, '2019_03_28_044000_penyesuaian_beasiswa', 41);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitras`
--

CREATE TABLE `mitras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mitras`
--

INSERT INTO `mitras` (`id`, `nama`, `alamat`, `email`, `jumlah`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Panti asuhan amirul mukminin', 'Jln. Paccerakkang, Daya', 'amirulmukmininin@gmail.com', 23, 13, NULL, '2019-03-31 05:32:18', '2019-03-31 05:32:18'),
(5, 'Panti Asuhan Al Rozzaq', 'Jl. Puri Raya 8 Kota Makassar', 'rozzaq@gmail.com', 85, 13, NULL, '2019-04-03 10:01:49', '2019-04-03 10:01:49'),
(6, 'Panti Asuhan At Taufiq', 'jl. Borong jambu, Antang. Kota Makassar', 'taufiq@gmail.com', 40, 13, NULL, '2019-04-03 10:17:03', '2019-04-03 10:17:03'),
(7, 'Panti Asuhan Peduli Kasih', 'Jl. Bonto Duri 4 Setapak T/22 A', 'pedulikasih@gmail.com', 54, 13, NULL, '2019-04-03 16:09:40', '2019-04-03 16:09:40'),
(8, 'Panti Asuhan Nurul Ichsan', 'Jl. Batua Raya No.12 A', 'Nurul@gmail.com', 36, 13, NULL, '2019-04-03 16:10:58', '2019-04-03 16:10:58'),
(9, 'Panti Asuhan Abadi', 'Jl. A. Mappaodang I No.32', 'abadi@gmail.com', 25, 13, NULL, '2019-04-03 16:12:57', '2019-04-03 16:12:57'),
(10, 'Panti Asuhan Nur Ilahi', 'Jl. Borong Raya baru Lr 1 Makassar', 'nurilahi@gmail.com', 40, 13, NULL, '2019-04-03 16:15:02', '2019-04-03 16:15:02'),
(11, 'Panti Asuhan Cendekia', 'Belakang Kampus UVRI Antang, Makassar', 'cendekia@gmail.com', 20, 13, NULL, '2019-04-03 16:33:25', '2019-04-03 16:33:25'),
(12, 'Panti Asuhan Ar Rahman (Muhammadiyah)', 'Jl. Serigala Lr. 13 No.2', 'rahman@gmail.com', 52, 13, NULL, '2019-04-03 16:35:07', '2019-04-03 16:35:07'),
(13, 'Panti Asuhan Al Muallaf', 'Jl. Tamalate 3 setapak 41 no. 70', 'muallaf@gmail.com', 61, 13, NULL, '2019-04-03 16:36:29', '2019-04-03 16:36:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `totaldonasis`
--

CREATE TABLE `totaldonasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `total_tersalurkan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `totaldonasis`
--

INSERT INTO `totaldonasis` (`id`, `total`, `total_tersalurkan`, `created_at`, `updated_at`) VALUES
(1, 12910000, 10800000, NULL, '2019-04-03 23:14:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukms`
--

CREATE TABLE `ukms` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_penerima` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_usaha` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_awal` int(11) NOT NULL,
  `jumlah_total` int(11) DEFAULT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ukms`
--

INSERT INTO `ukms` (`id`, `nama_penerima`, `nama_usaha`, `deskripsi`, `jumlah_awal`, `jumlah_total`, `dokumentasi`, `status`, `lama`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 'Mutmainnah', 'Dagang Pop Ice', 'Ibu Mutmainnah diberikan modal untuk membuka usaha rumahan untuk membiayai kebutuhan sehari-harinya. diharapkan selama 3 bulan kedepan, sudah bisa menghasilkan keuntungan untuk keluarganya.', 300000, 300000, 'fotoukm/Lp3UBJeK2V9WAVjvXaI63shrBSbE6fa5N1kfTCEj.jpeg', 'active', 1, 13, NULL, '2019-04-03 10:27:47', '2019-04-03 10:27:47'),
(7, 'Dg. Ramang', 'Tambal Ban', 'Dg. Ramang merupakan ayah dari 3 orang anak. awalnya beliau adalah seorang pemulung hingga akhirnya melalui posko yatim, bapak ramang diberikan modal usaha untuk menjadi seorang tukang tambal ban.', 2000000, 2000000, 'fotoukm/ptmCTe9oXDHaqVFnwuhCogquXHhrd6GTtN8VAjTS.jpeg', 'active', 1, 13, NULL, '2019-04-03 10:42:31', '2019-04-03 10:42:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totaldonasi` int(11) DEFAULT NULL,
  `nohp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `donasi_awal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `totaldonasi`, `nohp`, `foto`, `pekerjaan`, `alamat`, `status`, `deleted_by`, `donasi_awal`) VALUES
(7, 'SUNARY0 MAD ARAB', 'madarab46@gmail.com', NULL, '$2y$10$wwJOMChURC1/Okm/TiE/..PU7GiybzYcY68ptnIL/MhsTA6KrcEWK', 'OuaKCRwHo1tR5EHaS1ht44gwkulhxa8KPe0uV0OyquMWBFlYYozmtNh7bBZq', '2019-03-30 02:59:06', '2019-03-31 06:37:32', 3000000, '085244145554', 'fotouser/tFgXGdrWzRUr2H8BtLvo899GBiy2zfF7oVbW0ZVr.jpeg', 'ADMIN', 'MAKASSAR', 'inactive', 13, 3000000),
(8, 'Astri Devi', 'astridevi@gmail.com', NULL, '$2y$10$9tkQKtIJxOd0gqHO/lyBXecNnAk.ilo7J8OUt04b6NuOfMydlEXEe', 'kwHrEcNMikfpcupcZa2U8FA8lighpUG8ghEZ9E6H86JAeChL4X2T3ZKK7xLF', '2019-03-30 06:18:49', '2019-04-03 09:02:24', 900000, '082344949505', 'fotouser/HzHGelpgz4qohzWNB50Hx3jSJcJzHVALukuhGqZD.jpeg', 'Freelancer', 'Jln. Paccerakkang', 'active', NULL, 90000),
(9, 'Rahmat Hidayat', 'rahmat@gmail.com', NULL, '$2y$10$IvgMOX/9UnZk0uxRyv5LxeLGr0Ng02kCFVEsHqSr82rNFu7gKEn0C', NULL, '2019-04-03 09:06:34', '2019-04-03 10:55:05', NULL, '085241883783', 'fotouser/o6A7yeht3lkcNU7OIIBxn8Ppg4eWsaXM8v2igDQH.jpeg', 'Pegawai Negeri Sipil', 'Maros', 'inactive', 13, 1000000),
(10, 'Ade Pratama', 'ade@gmail.com', NULL, '$2y$10$AVvcTLB8GzMuluKZo48rb.LYwFoJ5JH/XVE5ahN3oRxTMDtGmJEVO', 'LUDY5SgmNUwdcoFzOsYplhOkaFFpOE39horq34Kc05601zzFyDjOvUotSIDk', '2019-04-03 09:12:17', '2019-04-03 09:12:17', NULL, '085241567432', 'fotouser/JKr6tyqYjpQkA0nzRfZIivvsrPtn8gyNBuIQ9NVP.jpeg', 'pengusaha', 'kota Makassar', 'active', NULL, 250000),
(11, 'Johnson', 'joni@gmail.com', NULL, '$2y$10$u9CGEc6O1hbv2MDQs7jzeu8Bc.MnQHuokiqV5x13gi0CypwAQ1Omi', 'M4r1qO9lQ0xuOFJEo9h2tPrcK8Sav5zfsH3RDyNxLgWF7iAwkeVLPV3MOFw3', '2019-04-03 09:30:01', '2019-04-03 10:49:03', NULL, '0823449494055', 'fotouser/nx40lQE7O2u7rfv7c7mlOjv8twWfMDrgnopAhcz2.png', 'siswa', 'Jln. Paccerakkang', 'inactive', NULL, 100000),
(12, 'Muh. Basrah', 'basrah@gmail.com', NULL, '$2y$10$4P1qE1/193RKI9rjYBxXN.Yoj9gwyOaHrGIEMEUeklVAvSz5hlL1K', 'sFmM9R4FQGbpfnIVhBcrk6Zy7iWxIYTGlavXI5hdSoZ4p0DE6iTqaOCj0ZGt', '2019-04-03 09:41:32', '2019-04-03 09:44:25', 5000000, '085241883783', 'fotouser/RvgVZ25VSeZ9qjFQ3cqA6n5m67J8KPquJmaKfhx4.jpeg', 'Petani', 'Kolaka Utara', 'active', NULL, 5000000),
(13, 'Mia', 'mia@gmail.com', NULL, '$2y$10$JOxnwY1G2mxcLsqAHdVd3.rj9isRaXhm/ILnzjZNVl6YyziPa/ZY.', 'atjDNRYWVzrKa29bjlth4fz6EyKU1Zc9GRqjNoOH6d9FGxEmhdUuKwAx7h7l', '2019-04-03 14:32:13', '2019-04-03 14:33:06', NULL, '082344949505', 'fotouser/xGoXCCr0zwknmg7izXjKyPz8SG5T8cFNNkWK9UjX.jpeg', 'Siswa', 'Jln. Paccerakkang', 'inactive', NULL, 150000),
(14, 'suryani', 'a.surya.a.z@gmail.com', NULL, '$2y$10$IwE2mIETKQqdGT5mpU0aBuB0CjVWtXJS9rOzLQo7BYfF6QlyVCVX6', NULL, '2019-04-03 22:42:47', '2019-04-03 23:14:44', 2500000, '082196455555', NULL, 'tenaga pengajar', 'maros', 'active', NULL, 500000),
(15, 'Sri Rinardi Putra', 'rinardi@gmail.com', NULL, '$2y$10$yAhqJ35iNjbCmBgPhD8XjOrw2SxinGSDqXOtfxJB7W3faoAn6QKWG', 'wjT9DB1eckahhuGIKC51RhhjO9TCik9r5ev5zK1By6DIyDUzFDvaJaxLMz4Q', '2019-04-03 22:58:24', '2019-04-03 23:06:31', 500000, '085255995255', 'fotouser/193otDAjGgxM6kgV9CcHiW17E2hKvA5kXIQo8sZQ.jpeg', 'petani', 'makassar', 'active', NULL, 500000),
(16, 'Wana', 'nirwana_math06@yahoo.com', NULL, '$2y$10$iy1EQOkQsQHQu9TIQgclDuiNz4o3ZP1cROEun31ghzqJFptuig0dK', '9CGm8DyknopeXlSoVNTyZRsJ6OYEya2sajGnQIVTLX6oUEcIMTIXjxjuMpwb', '2019-04-03 22:58:40', '2019-04-03 22:58:40', NULL, '085253895910', NULL, 'Dosen', 'Nirwana', 'active', NULL, 100000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `beasiswas`
--
ALTER TABLE `beasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beasiswas_created_by_foreign` (`created_by`),
  ADD KEY `beasiswas_id_mitra_foreign` (`id_mitra`);

--
-- Indeks untuk tabel `donasis`
--
ALTER TABLE `donasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donasis_confirm_by_foreign` (`confirm_by`);

--
-- Indeks untuk tabel `donasiusers`
--
ALTER TABLE `donasiusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donasiusers_iduser_foreign` (`iduser`),
  ADD KEY `donasiusers_confirm_by_foreign` (`confirm_by`);

--
-- Indeks untuk tabel `kegiataninfaks`
--
ALTER TABLE `kegiataninfaks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiataninfaks_created_by_foreign` (`created_by`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitras`
--
ALTER TABLE `mitras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mitras_created_by_foreign` (`created_by`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `totaldonasis`
--
ALTER TABLE `totaldonasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ukms`
--
ALTER TABLE `ukms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ukms_created_by_foreign` (`created_by`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_deleted_by_foreign` (`deleted_by`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `beasiswas`
--
ALTER TABLE `beasiswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `donasis`
--
ALTER TABLE `donasis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `donasiusers`
--
ALTER TABLE `donasiusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `kegiataninfaks`
--
ALTER TABLE `kegiataninfaks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `mitras`
--
ALTER TABLE `mitras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `totaldonasis`
--
ALTER TABLE `totaldonasis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ukms`
--
ALTER TABLE `ukms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beasiswas`
--
ALTER TABLE `beasiswas`
  ADD CONSTRAINT `beasiswas_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `beasiswas_id_mitra_foreign` FOREIGN KEY (`id_mitra`) REFERENCES `mitras` (`id`);

--
-- Ketidakleluasaan untuk tabel `donasis`
--
ALTER TABLE `donasis`
  ADD CONSTRAINT `donasis_confirm_by_foreign` FOREIGN KEY (`confirm_by`) REFERENCES `admins` (`id`);

--
-- Ketidakleluasaan untuk tabel `donasiusers`
--
ALTER TABLE `donasiusers`
  ADD CONSTRAINT `donasiusers_confirm_by_foreign` FOREIGN KEY (`confirm_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `donasiusers_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `kegiataninfaks`
--
ALTER TABLE `kegiataninfaks`
  ADD CONSTRAINT `kegiataninfaks_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Ketidakleluasaan untuk tabel `mitras`
--
ALTER TABLE `mitras`
  ADD CONSTRAINT `mitras_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Ketidakleluasaan untuk tabel `ukms`
--
ALTER TABLE `ukms`
  ADD CONSTRAINT `ukms_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
