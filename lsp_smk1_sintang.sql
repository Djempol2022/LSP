-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2023 at 02:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp_smk1_sintang`
--

-- --------------------------------------------------------

--
-- Table structure for table `asesi_uji_kompetensi`
--

CREATE TABLE `asesi_uji_kompetensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_uji_kompetensi_id` bigint(20) UNSIGNED NOT NULL,
  `user_asesi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asesor_uji_kompetensi`
--

CREATE TABLE `asesor_uji_kompetensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_uji_kompetensi_id` bigint(20) UNSIGNED NOT NULL,
  `user_asesor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asesor_uji_kompetensi`
--

INSERT INTO `asesor_uji_kompetensi` (`id`, `jadwal_uji_kompetensi_id`, `user_asesor_id`, `created_at`, `updated_at`) VALUES
(35, 52, 38, '2019-11-29 12:52:00', '2019-11-29 12:52:00'),
(37, 54, 36, '2023-01-24 21:30:32', '2023-01-24 21:30:32'),
(38, 55, 36, '2023-01-24 21:30:40', '2023-01-24 21:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_persyaratan`
--

CREATE TABLE `hasil_persyaratan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanda_tangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institusi`
--

CREATE TABLE `institusi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `alamat_institusi` text NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `nomor_hp_institusi` varchar(255) NOT NULL,
  `email_institusi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institusi`
--

INSERT INTO `institusi` (`id`, `nama_institusi`, `alamat_institusi`, `kode_pos`, `nomor_hp_institusi`, `email_institusi`, `created_at`, `updated_at`) VALUES
(1, 'SMK NEGERI 1 SINTANG', 'Jl.', '3433', '2123453453', 'institusi@gmail.com', '2023-01-02 19:23:14', '2023-01-02 19:23:14'),
(2, 'SMK NEGERI 2 SINTANG', 'Jl.', '3433', '2123453453', 'institusi@gmail.com', '2023-01-02 19:23:14', '2023-01-02 19:23:14'),
(3, 'SMK NEGERI 3 PONTIANAK', 'Jl.', '3433', '2123453453', 'institusi@gmail.com', '2023-01-02 19:23:14', '2023-01-02 19:23:14'),
(4, 'SMK NEGERI 1 SINTANG', 'Jl.', '3433', '2123453453', 'institusi@gmail.com', '2023-01-02 19:25:14', '2023-01-02 19:25:14'),
(5, 'SMK NEGERI 2 SINTANG', 'Jl.', '3433', '2123453453', 'institusi@gmail.com', '2023-01-02 19:25:14', '2023-01-02 19:25:14'),
(6, 'SMK NEGERI 3 PONTIANAK', 'Jl.', '3433', '2123453453', 'institusi@gmail.com', '2023-01-02 19:25:14', '2023-01-02 19:25:14'),
(7, 'SMK NEGERI 1 SINTANG', 'Jl.', '3433', '2123453453', 'institusi@gmail.com', '2023-01-02 19:26:37', '2023-01-02 19:26:37'),
(8, 'SMK NEGERI 2 SINTANG', 'Jl.', '3433', '2123453453', 'institusi@gmail.com', '2023-01-02 19:26:38', '2023-01-02 19:26:38'),
(9, 'SMK NEGERI 3 PONTIANAK', 'Jl.', '3433', '2123453453', 'institusi@gmail.com', '2023-01-02 19:26:38', '2023-01-02 19:26:38'),
(12, 'qwe', 'qw', '123123', '123123', '123@gmail.com', '2023-01-19 00:26:18', '2023-01-19 00:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_uji_kompetensi`
--

CREATE TABLE `jadwal_uji_kompetensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `muk_id` bigint(20) UNSIGNED NOT NULL,
  `sesi` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp(),
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `total_waktu` text DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `jenis_tes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_uji_kompetensi`
--

INSERT INTO `jadwal_uji_kompetensi` (`id`, `muk_id`, `sesi`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `total_waktu`, `kelas`, `tempat`, `jenis_tes`, `created_at`, `updated_at`) VALUES
(52, 31, NULL, '2019-11-29 19:52:00', NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-29 12:52:00', '2019-11-29 12:52:00'),
(54, 28, NULL, '2023-01-25 04:30:32', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-24 21:30:32', '2023-01-24 21:30:32'),
(55, 30, NULL, '2023-01-25 04:30:40', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-24 21:30:40', '2023-01-24 21:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_asesi`
--

CREATE TABLE `jawaban_asesi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_asesi_id` bigint(20) UNSIGNED NOT NULL,
  `soal_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_soal`
--

CREATE TABLE `jenis_soal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `jenis_soal` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_soal`
--

INSERT INTO `jenis_soal` (`id`, `slug`, `jenis_soal`, `created_at`, `updated_at`) VALUES
(1, 'pilihan-ganda', 'Pilihan Ganda', NULL, NULL),
(2, 'essay', 'Essay', NULL, NULL),
(3, 'wawancara', 'Wawancara', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `slug`, `jurusan`, `created_at`, `updated_at`) VALUES
(66, 'multimedia', 'Multimedia', '2023-01-19 00:28:51', '2023-01-19 19:42:32'),
(67, 'arsitektur', 'Arsitektur', '2023-01-19 00:28:59', '2023-01-19 19:42:37'),
(68, 'teknik-komputer-dan-jaringan', 'Teknik Komputer dan Jaringan', '2023-01-19 00:29:11', '2023-01-19 19:42:40'),
(69, 'teknik-mesin', 'Teknik Mesin', '2023-01-19 00:29:18', '2023-01-19 19:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `kebangsaan`
--

CREATE TABLE `kebangsaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kebangsaan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan_pemohon`
--

CREATE TABLE `kelengkapan_pemohon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kartu_keluarga` text DEFAULT NULL,
  `kartu_pelajar` text DEFAULT NULL,
  `sertifikat_prakerin` text DEFAULT NULL,
  `nilai_raport` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kualifikasi_pendidikan`
--

CREATE TABLE `kualifikasi_pendidikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kualifikasi_pendidikan`
--

INSERT INTO `kualifikasi_pendidikan` (`id`, `pendidikan`, `created_at`, `updated_at`) VALUES
(2, 'SMK', '2023-01-15 19:12:35', '2023-01-15 19:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_01_03_131532_create_institusi_table', 1),
(5, '2023_01_03_131533_create_jurusan_table', 1),
(6, '2023_01_03_132042_create_role_table', 1),
(7, '2023_01_03_132144_create_users_table', 1),
(8, '2023_01_03_132300_create_users_detail_table', 1),
(9, '2023_01_03_133740_create_sertifikasi_table', 1),
(10, '2023_01_03_134145_create_unit_kompetensi_table', 1),
(11, '2023_01_03_134319_create_unit_kompetensi_sub_table', 1),
(12, '2023_01_03_134548_create_unit_kompetensi_isi_table', 1),
(13, '2023_01_03_134803_create_kelengkapan_pemohon_table', 1),
(14, '2023_01_03_134814_create_hasil_persyaratan_table', 1),
(15, '2023_01_03_135107_create_umpan_balik_table', 1),
(16, '2023_01_03_140952_create_pekerjaan_table', 1),
(17, '2023_01_07_184116_create_muk_table', 2),
(18, '2023_01_07_184149_create_jadwal_uji_kompetensi_table', 2),
(19, '2019_11_29_170454_add_jurusan_id_table', 3),
(20, '2023_02_29_170454_add_jurusan_id_table', 4),
(21, '2019_11_29_171041_create_muk_table', 5),
(22, '2019_11_29_170134_create_kualifikasi_pendidikan_table', 6),
(23, '2019_11_29_174051_create_kualifikasi_pendidikan_table', 7),
(24, '2023_01_11_031907_create_detail_uji_kompetensi_table', 8),
(25, '2023_01_11_110945_create_detail_jadwal_uji_kompetensi', 9),
(26, '2023_01_29_164429_create_peninjau_uji_kompetensi_table', 10),
(27, '2023_02_29_164325_create_asesi_uji_kompetensi_table', 10),
(28, '2023_02_29_164401_create_asesor_uji_kompetensi_table', 10),
(29, '2023_01_03_131535_create_kebangsaan_table', 11),
(30, '2023_01_16_022551_create_pekerjaan_table', 12),
(31, '2022_01_03_134803_create_kelengkapan_pemohon_table', 13),
(32, '2023_01_17_042648_add_ttd_asesi_admin_tanggal_table', 14),
(33, '2019_11_29_165303_create_tanda_tangan_table', 15),
(34, '2019_11_29_164011_create_skema_sertifikasi_table', 16),
(35, '2023_01_18_041215_add_nomor_urut_table', 16),
(36, '2023_01_19_080543_add_skema_sertifikasi_id_table', 17),
(37, '2023_01_19_092258_drop_sertifikasi_id_table', 18),
(38, '2023_01_20_023805_add_slug_jurusan_table', 19),
(39, '2019_11_29_165136_create_unit_kompetensi_isi_2_table', 20),
(40, '2019_11_29_164332_create_jenis_soal_table', 21),
(41, '2023_01_25_093822_create_soal_table', 22),
(42, '2023_01_25_093941_create_jawaban_asesi_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `muk`
--

CREATE TABLE `muk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `muk` text DEFAULT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `muk`
--

INSERT INTO `muk` (`id`, `muk`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(28, 'Jaringan Dasar', 68, '2019-11-29 11:20:38', '2019-11-29 11:20:38'),
(29, 'Mikrotik', 68, '2019-11-29 11:20:49', '2019-11-29 11:20:49'),
(30, 'Perakitan PC', 68, '2019-11-29 11:21:14', '2019-11-29 11:21:14'),
(31, 'Video Editor Dasar', 66, '2019-11-29 11:21:42', '2019-11-29 11:21:42'),
(32, 'Desain Struktur Bangunan', 67, '2019-11-29 11:22:27', '2019-11-29 11:22:27'),
(33, 'AutoCAD Dasar', 67, '2019-11-29 11:22:53', '2019-11-29 11:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pekerjaan` varchar(255) DEFAULT NULL,
  `alamat_pekerjaan` text DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `nomor_hp_pekerjaan` varchar(255) DEFAULT NULL,
  `email_pekerjaan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peninjau_uji_kompetensi`
--

CREATE TABLE `peninjau_uji_kompetensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_uji_kompetensi_id` bigint(20) UNSIGNED NOT NULL,
  `user_peninjau_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peninjau_uji_kompetensi`
--

INSERT INTO `peninjau_uji_kompetensi` (`id`, `jadwal_uji_kompetensi_id`, `user_peninjau_id`, `created_at`, `updated_at`) VALUES
(32, 52, 40, '2019-11-29 12:52:00', '2019-11-29 12:52:00'),
(34, 54, 41, '2023-01-24 21:30:32', '2023-01-24 21:30:32'),
(35, 55, 41, '2023-01-24 21:30:40', '2023-01-24 21:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-01-02 19:18:59', '2023-01-02 19:18:59'),
(2, 'peninjau', '2023-01-02 19:18:59', '2023-01-02 19:18:59'),
(3, 'asesor', '2023-01-02 19:18:59', '2023-01-02 19:18:59'),
(4, 'asesi', '2023-01-02 19:18:59', '2023-01-02 19:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi`
--

CREATE TABLE `sertifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tujuan_asesi` varchar(255) NOT NULL,
  `ttd_asesi` text DEFAULT NULL,
  `nomor_urut` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sertifikasi`
--

INSERT INTO `sertifikasi` (`id`, `user_id`, `tujuan_asesi`, `ttd_asesi`, `nomor_urut`, `created_at`, `updated_at`) VALUES
(4, 33, 'Sertifikasi', NULL, '45', NULL, '2019-11-29 10:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `skema_sertifikasi`
--

CREATE TABLE `skema_sertifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul_skema_sertifikasi` text DEFAULT NULL,
  `nomor_skema_sertifikasi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skema_sertifikasi`
--

INSERT INTO `skema_sertifikasi` (`id`, `jurusan_id`, `judul_skema_sertifikasi`, `nomor_skema_sertifikasi`, `created_at`, `updated_at`) VALUES
(7, 66, 'Masukkan Judul Skema Sertifikasi', 'Masukkan Nomor Skema Sertifikasi', '2023-01-19 00:28:51', '2023-01-19 00:55:37'),
(8, 67, NULL, NULL, '2023-01-19 00:28:59', '2023-01-19 00:28:59'),
(9, 68, NULL, NULL, '2023-01-19 00:29:11', '2023-01-19 00:29:11'),
(10, 69, NULL, NULL, '2023-01-19 00:29:19', '2023-01-19 00:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_uji_kompetensi_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` text DEFAULT NULL,
  `pilihan` varchar(255) DEFAULT NULL,
  `jawaban` int(11) DEFAULT NULL,
  `acc` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tanda_tangan`
--

CREATE TABLE `tanda_tangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sertifikasi_id` bigint(20) UNSIGNED NOT NULL,
  `nama_admin` varchar(255) DEFAULT NULL,
  `no_reg` varchar(255) DEFAULT NULL,
  `ttd_admin` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanda_tangan`
--

INSERT INTO `tanda_tangan` (`id`, `sertifikasi_id`, `nama_admin`, `no_reg`, `ttd_admin`, `tanggal`, `catatan`, `created_at`, `updated_at`) VALUES
(2, 4, 'Admin', '2343124234', 'data:image/png;base64,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', '2019-11-29', 'qweqe', '2019-11-29 10:12:49', '2019-11-29 10:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `umpan_balik`
--

CREATE TABLE `umpan_balik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanda_tangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_kompetensi`
--

CREATE TABLE `unit_kompetensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skema_sertifikasi_id` bigint(20) UNSIGNED NOT NULL,
  `kode_unit` varchar(255) NOT NULL,
  `judul_unit` text NOT NULL,
  `jenis_standar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_kompetensi`
--

INSERT INTO `unit_kompetensi` (`id`, `skema_sertifikasi_id`, `kode_unit`, `judul_unit`, `jenis_standar`, `created_at`, `updated_at`) VALUES
(20, 7, 'wer', 'wersdfsdfsf', 'werwerwerw', '2023-01-19 02:56:17', '2023-01-19 02:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kompetensi_isi`
--

CREATE TABLE `unit_kompetensi_isi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_kompetensi_sub_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul_unit_kompetensi_isi` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_kompetensi_isi`
--

INSERT INTO `unit_kompetensi_isi` (`id`, `unit_kompetensi_sub_id`, `judul_unit_kompetensi_isi`, `status`, `created_at`, `updated_at`) VALUES
(57, 146, NULL, NULL, NULL, '2019-11-29 09:57:29'),
(58, 146, 'Isi 2 Persyaratan fungsi yang akurat, komplit dan sesuai prioritas diidentifikasi sesuai keperluan dengan referensi semua tipe media.', NULL, NULL, '2019-11-29 09:47:37'),
(59, 146, 'Isi 3 Elemen 1', NULL, NULL, NULL),
(60, 146, 'Isi 4 Elemen 1', NULL, NULL, NULL),
(61, 147, 'Persyaratan fungsi yang akurat, komplit dan sesuai prioritas diidentifikasi sesuai keperluan dengan referensi semua tipe media.', NULL, NULL, '2019-11-29 09:53:34'),
(62, 147, 'Isi 2 Elemen 2', NULL, NULL, NULL),
(63, 147, 'Isi 3 Elemen 2', NULL, NULL, NULL),
(65, 146, 'SASLHAS', NULL, NULL, NULL),
(66, 146, 'SASLHASdasdasddsd', NULL, NULL, NULL),
(67, 146, 'asdas', NULL, NULL, NULL),
(68, 146, 'dasd', NULL, NULL, NULL),
(69, 146, 'asdasdasd', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit_kompetensi_isi_2`
--

CREATE TABLE `unit_kompetensi_isi_2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_kompetensi_isi_id` bigint(20) UNSIGNED NOT NULL,
  `judul_unit_kompetensi_isi_2` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_kompetensi_sub`
--

CREATE TABLE `unit_kompetensi_sub` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_kompetensi_id` bigint(20) UNSIGNED NOT NULL,
  `judul_unit_kompetensi_sub` text NOT NULL,
  `bukti_relevan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_kompetensi_sub`
--

INSERT INTO `unit_kompetensi_sub` (`id`, `unit_kompetensi_id`, `judul_unit_kompetensi_sub`, `bukti_relevan`, `created_at`, `updated_at`) VALUES
(146, 20, 'Elemen 1 Editable', NULL, NULL, '2019-11-29 10:05:14'),
(147, 20, 'Elemen 2 Editable', NULL, NULL, '2019-11-29 10:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `institusi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jurusan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `institusi_id`, `jurusan_id`, `password`, `role_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(27, 'admin', 'admin@gmail.com', NULL, NULL, '$2y$10$cjyZ9VrWAp2ekFhumCBW5ut5vrEJtt.jNdLLhBeyDBSZXiaVjS59e', 1, NULL, NULL, '2023-01-18 23:42:12', '2023-01-18 23:42:12'),
(33, 'asesi1', 'asesi1@gmail.com', 1, 66, '$2y$10$Vd4kkYpi1ahLW2k1jobD3eIubLiNXIp8QnBTm9hFuEW7.b3mP5W7i', 4, NULL, NULL, '2023-01-19 00:34:09', '2023-01-19 00:34:09'),
(34, 'asesi2', 'asesi2@gmail.com', 1, 66, '$2y$10$8x0BtWIXxh4W3I6c8SB8JuWlyJHwBm2GITnSss/Hfe5kyWh4z4R1a', 4, NULL, NULL, '2023-01-19 00:34:09', '2023-01-19 00:34:09'),
(35, 'asesi3', 'asesi3@gmail.com', 1, 66, '$2y$10$56sbVTYIbS/iUtj/LR7.DOL2tWEkbv4jsKVH6wA6l/npGb7r64Aci', 4, NULL, NULL, '2023-01-19 00:34:09', '2023-01-19 00:34:09'),
(36, 'asesor1', 'asesor1@gmail.com', NULL, 66, '$2y$10$9bLEbWx8ZtMn.d99uCke0e3XMTmwO5FvDt6eMgxnhjkk5BdPvW9ZS', 3, NULL, NULL, '2019-11-29 10:51:02', '2019-11-29 10:51:02'),
(37, 'asesor2', 'asesor2@gmail.com', NULL, NULL, '$2y$10$CTdTO82.EyPVQSV5t8G3kOn1kBeGlfRxGxYw9HlzxwkUOSN2asDuq', 3, NULL, NULL, '2019-11-29 10:51:02', '2019-11-29 10:51:02'),
(38, 'asesor3', 'asesor3@gmail.com', NULL, NULL, '$2y$10$OHHwER9RZgyXDJfKZG.xleemc9377n6ZxSczNbscuqKCUdU5kOdl6', 3, NULL, NULL, '2019-11-29 10:51:02', '2019-11-29 10:51:02'),
(39, 'peninjau1', 'peninjau1@gmail.com', NULL, NULL, '$2y$10$fZvHe1V1F7pJfVsQV7D1VeJoaA1sMAfsBnqdhsRcuFhjKrzm2BK3q', 2, NULL, NULL, '2019-11-29 10:51:02', '2019-11-29 10:51:02'),
(40, 'peninjau2', 'peninjau2@gmail.com', NULL, NULL, '$2y$10$8swn/Zv7W6cC2dM32v6MdO160yY8K25ZRgo8h6sLoiJ43v7wUuIpO', 2, NULL, NULL, '2019-11-29 10:51:02', '2019-11-29 10:51:02'),
(41, 'peninjau3', 'peninjau3@gmail.com', NULL, NULL, '$2y$10$jX9g3ZYXKjWhJ4QgDyStjuXGAqJwP2Wi81b3cHjYPhBdBJzs2o5tW', 2, NULL, NULL, '2019-11-29 10:51:02', '2019-11-29 10:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `users_detail`
--

CREATE TABLE `users_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ktp_nik_paspor` text DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` text DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `kebangsaan` varchar(255) DEFAULT NULL,
  `alamat_rumah` text DEFAULT NULL,
  `nomor_hp` varchar(255) DEFAULT NULL,
  `kualifikasi_pendidikan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asesi_uji_kompetensi`
--
ALTER TABLE `asesi_uji_kompetensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asesi_uji_kompetensi_jadwal_uji_kompetensi_id_foreign` (`jadwal_uji_kompetensi_id`),
  ADD KEY `asesi_uji_kompetensi_user_asesi_id_foreign` (`user_asesi_id`);

--
-- Indexes for table `asesor_uji_kompetensi`
--
ALTER TABLE `asesor_uji_kompetensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asesor_uji_kompetensi_jadwal_uji_kompetensi_id_foreign` (`jadwal_uji_kompetensi_id`),
  ADD KEY `asesor_uji_kompetensi_user_asesor_id_foreign` (`user_asesor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasil_persyaratan`
--
ALTER TABLE `hasil_persyaratan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_persyaratan_user_id_foreign` (`user_id`);

--
-- Indexes for table `institusi`
--
ALTER TABLE `institusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_uji_kompetensi`
--
ALTER TABLE `jadwal_uji_kompetensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_uji_kompetensi_muk_id_foreign` (`muk_id`);

--
-- Indexes for table `jawaban_asesi`
--
ALTER TABLE `jawaban_asesi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawaban_asesi_user_asesi_id_foreign` (`user_asesi_id`),
  ADD KEY `jawaban_asesi_soal_id_foreign` (`soal_id`);

--
-- Indexes for table `jenis_soal`
--
ALTER TABLE `jenis_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebangsaan`
--
ALTER TABLE `kebangsaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelengkapan_pemohon`
--
ALTER TABLE `kelengkapan_pemohon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelengkapan_pemohon_user_id_foreign` (`user_id`);

--
-- Indexes for table `kualifikasi_pendidikan`
--
ALTER TABLE `kualifikasi_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muk`
--
ALTER TABLE `muk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `muk_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pekerjaan_user_id_foreign` (`user_id`);

--
-- Indexes for table `peninjau_uji_kompetensi`
--
ALTER TABLE `peninjau_uji_kompetensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peninjau_uji_kompetensi_jadwal_uji_kompetensi_id_foreign` (`jadwal_uji_kompetensi_id`),
  ADD KEY `peninjau_uji_kompetensi_user_peninjau_id_foreign` (`user_peninjau_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sertifikasi_user_id_foreign` (`user_id`);

--
-- Indexes for table `skema_sertifikasi`
--
ALTER TABLE `skema_sertifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skema_sertifikasi_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_jadwal_uji_kompetensi_id_foreign` (`jadwal_uji_kompetensi_id`);

--
-- Indexes for table `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanda_tangan_seritikasi_id_foreign` (`sertifikasi_id`);

--
-- Indexes for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `umpan_balik_user_id_foreign` (`user_id`);

--
-- Indexes for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_kompetensi_skema_sertifikasi_id_foreign` (`skema_sertifikasi_id`);

--
-- Indexes for table `unit_kompetensi_isi`
--
ALTER TABLE `unit_kompetensi_isi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_kompetensi_isi_unit_kompetensi_sub_id_foreign` (`unit_kompetensi_sub_id`);

--
-- Indexes for table `unit_kompetensi_isi_2`
--
ALTER TABLE `unit_kompetensi_isi_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_kompetensi_isi_2_unit_kompetensi_isi_id_foreign` (`unit_kompetensi_isi_id`);

--
-- Indexes for table `unit_kompetensi_sub`
--
ALTER TABLE `unit_kompetensi_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_kompetensi_sub_unit_kompetensi_id_foreign` (`unit_kompetensi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_institusi_id_foreign` (`institusi_id`),
  ADD KEY `users_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_detail_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asesi_uji_kompetensi`
--
ALTER TABLE `asesi_uji_kompetensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `asesor_uji_kompetensi`
--
ALTER TABLE `asesor_uji_kompetensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_persyaratan`
--
ALTER TABLE `hasil_persyaratan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institusi`
--
ALTER TABLE `institusi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jadwal_uji_kompetensi`
--
ALTER TABLE `jadwal_uji_kompetensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `jawaban_asesi`
--
ALTER TABLE `jawaban_asesi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_soal`
--
ALTER TABLE `jenis_soal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `kebangsaan`
--
ALTER TABLE `kebangsaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelengkapan_pemohon`
--
ALTER TABLE `kelengkapan_pemohon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kualifikasi_pendidikan`
--
ALTER TABLE `kualifikasi_pendidikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `muk`
--
ALTER TABLE `muk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peninjau_uji_kompetensi`
--
ALTER TABLE `peninjau_uji_kompetensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skema_sertifikasi`
--
ALTER TABLE `skema_sertifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit_kompetensi_isi`
--
ALTER TABLE `unit_kompetensi_isi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `unit_kompetensi_isi_2`
--
ALTER TABLE `unit_kompetensi_isi_2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_kompetensi_sub`
--
ALTER TABLE `unit_kompetensi_sub`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users_detail`
--
ALTER TABLE `users_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asesi_uji_kompetensi`
--
ALTER TABLE `asesi_uji_kompetensi`
  ADD CONSTRAINT `asesi_uji_kompetensi_jadwal_uji_kompetensi_id_foreign` FOREIGN KEY (`jadwal_uji_kompetensi_id`) REFERENCES `jadwal_uji_kompetensi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asesi_uji_kompetensi_user_asesi_id_foreign` FOREIGN KEY (`user_asesi_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `asesor_uji_kompetensi`
--
ALTER TABLE `asesor_uji_kompetensi`
  ADD CONSTRAINT `asesor_uji_kompetensi_jadwal_uji_kompetensi_id_foreign` FOREIGN KEY (`jadwal_uji_kompetensi_id`) REFERENCES `jadwal_uji_kompetensi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asesor_uji_kompetensi_user_asesor_id_foreign` FOREIGN KEY (`user_asesor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hasil_persyaratan`
--
ALTER TABLE `hasil_persyaratan`
  ADD CONSTRAINT `hasil_persyaratan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_uji_kompetensi`
--
ALTER TABLE `jadwal_uji_kompetensi`
  ADD CONSTRAINT `jadwal_uji_kompetensi_muk_id_foreign` FOREIGN KEY (`muk_id`) REFERENCES `muk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jawaban_asesi`
--
ALTER TABLE `jawaban_asesi`
  ADD CONSTRAINT `jawaban_asesi_soal_id_foreign` FOREIGN KEY (`soal_id`) REFERENCES `soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_asesi_user_asesi_id_foreign` FOREIGN KEY (`user_asesi_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelengkapan_pemohon`
--
ALTER TABLE `kelengkapan_pemohon`
  ADD CONSTRAINT `kelengkapan_pemohon_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `muk`
--
ALTER TABLE `muk`
  ADD CONSTRAINT `muk_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peninjau_uji_kompetensi`
--
ALTER TABLE `peninjau_uji_kompetensi`
  ADD CONSTRAINT `peninjau_uji_kompetensi_jadwal_uji_kompetensi_id_foreign` FOREIGN KEY (`jadwal_uji_kompetensi_id`) REFERENCES `jadwal_uji_kompetensi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peninjau_uji_kompetensi_user_peninjau_id_foreign` FOREIGN KEY (`user_peninjau_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD CONSTRAINT `sertifikasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skema_sertifikasi`
--
ALTER TABLE `skema_sertifikasi`
  ADD CONSTRAINT `skema_sertifikasi_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_jadwal_uji_kompetensi_id_foreign` FOREIGN KEY (`jadwal_uji_kompetensi_id`) REFERENCES `jadwal_uji_kompetensi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  ADD CONSTRAINT `tanda_tangan_seritikasi_id_foreign` FOREIGN KEY (`sertifikasi_id`) REFERENCES `sertifikasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD CONSTRAINT `umpan_balik_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  ADD CONSTRAINT `unit_kompetensi_skema_sertifikasi_id_foreign` FOREIGN KEY (`skema_sertifikasi_id`) REFERENCES `skema_sertifikasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_kompetensi_isi`
--
ALTER TABLE `unit_kompetensi_isi`
  ADD CONSTRAINT `unit_kompetensi_isi_unit_kompetensi_sub_id_foreign` FOREIGN KEY (`unit_kompetensi_sub_id`) REFERENCES `unit_kompetensi_sub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_kompetensi_isi_2`
--
ALTER TABLE `unit_kompetensi_isi_2`
  ADD CONSTRAINT `unit_kompetensi_isi_2_unit_kompetensi_isi_id_foreign` FOREIGN KEY (`unit_kompetensi_isi_id`) REFERENCES `unit_kompetensi_isi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_kompetensi_sub`
--
ALTER TABLE `unit_kompetensi_sub`
  ADD CONSTRAINT `unit_kompetensi_sub_unit_kompetensi_id_foreign` FOREIGN KEY (`unit_kompetensi_id`) REFERENCES `unit_kompetensi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_institusi_id_foreign` FOREIGN KEY (`institusi_id`) REFERENCES `institusi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD CONSTRAINT `users_detail_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
