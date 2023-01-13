-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2023 at 10:39 AM
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
(9, 'SMK NEGERI 3 PONTIANAK', 'Jl.', '3433', '2123453453', 'institusi@gmail.com', '2023-01-02 19:26:38', '2023-01-02 19:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_uji_kompetensi`
--

CREATE TABLE `jadwal_uji_kompetensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `muk_id` bigint(20) UNSIGNED NOT NULL,
  `sesi` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `total_waktu` text NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `jenis_tes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_uji_kompetensi`
--

INSERT INTO `jadwal_uji_kompetensi` (`id`, `muk_id`, `sesi`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `total_waktu`, `kelas`, `tempat`, `jenis_tes`, `created_at`, `updated_at`) VALUES
(18, 5, 'Sa', '2023-01-17 17:00:00', '09:57:00', '11:57:00', '120', 'rwere', 'adas', 1, '2023-01-11 00:30:45', '2023-01-11 00:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Multimedia', '2023-01-02 19:26:38', '2023-01-02 19:26:38'),
(52, 'Teknik Komputer & Jaringan', '2023-01-07 20:20:44', '2019-11-29 09:38:56'),
(53, 'Mekatronika', '2023-01-07 20:22:24', '2019-11-29 09:39:23'),
(55, 'Arsitektur', '2023-01-07 21:41:50', '2019-11-29 09:39:57'),
(56, 'Rekayasa Perangkat Lunak', '2019-11-29 09:40:10', '2019-11-29 09:40:27'),
(57, 'Jaringan Dasar', '2019-11-29 10:07:03', '2019-11-29 10:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan_pemohon`
--

CREATE TABLE `kelengkapan_pemohon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_mata_pelajaran_kompetensi` text NOT NULL,
  `sertifikat_prakerin` text NOT NULL,
  `nilai_raport` text NOT NULL,
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
(23, '2019_11_29_174051_create_kualifikasi_pendidikan_table', 7);

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
(2, 'Materi 1 Uji TKJ', 52, '2019-11-29 10:34:30', '2019-11-29 10:34:30'),
(3, 'Materi 2 Uji TKJ', 52, '2019-11-29 10:34:39', '2019-11-29 10:34:39'),
(4, 'Materi 1 Uji Multimedia', 1, '2019-11-29 10:34:57', '2019-11-29 10:34:57'),
(5, 'Materi 2 Uji Multimedia', 1, '2019-11-29 10:35:07', '2019-11-29 10:35:07');

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
  `alamat_institusi` text NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `nomor_hp_institusi` varchar(255) NOT NULL,
  `email_institusi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `judul_skema_sertifikasi` text NOT NULL,
  `nomor_skema_sertifikasi` varchar(255) NOT NULL,
  `tujuan_asesmen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `sertifikasi_id` bigint(20) UNSIGNED NOT NULL,
  `kode_unit` varchar(255) NOT NULL,
  `judul_unit` text NOT NULL,
  `jenis_standar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_kompetensi_isi`
--

CREATE TABLE `unit_kompetensi_isi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_kompetensi_sub_id` bigint(20) UNSIGNED NOT NULL,
  `judul_unit_kompetensi_isi` text NOT NULL,
  `status` int(11) NOT NULL,
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
  `bukti_relevan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `institusi_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
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
(5, 'admin', 'admin@gmail.com', 1, 1, '$2y$10$2wzwxukB/Fw42O1Ov2EBVOe8Ss7Gq6zNjL6SvcgBXM9MygjJDQOi2', 1, NULL, NULL, '2023-01-10 01:29:21', '2023-01-10 01:29:21'),
(6, 'werew', 'werwr@gmail.com', 3, 55, 'dfgdfg', 4, NULL, NULL, '2023-01-10 01:29:21', '2019-11-29 09:51:00'),
(7, 'asesor', 'asesor@gmail.com', 1, 1, '$2y$10$AdLyMs0LP1/.d0IqcwdLj.gcswdf67cHtBYxD9IPP3gJvIyr2mQMS', 3, NULL, NULL, '2023-01-10 01:29:21', '2023-01-10 01:29:21'),
(8, 'asesi', 'asesi@gmail.com', 1, 1, '$2y$10$stKsntlBWXNUWeCJ2HiGvevOARb/ooZ9IIVKbsYsm8Y0bLuQ8I/Lm', 4, NULL, NULL, '2023-01-10 01:29:21', '2023-01-10 01:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `users_detail`
--

CREATE TABLE `users_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `ktp_nik_paspor` text NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` text NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `kebangsaan` varchar(255) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `kualifikasi_pendidikan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
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
  ADD KEY `unit_kompetensi_sertifikasi_id_foreign` (`sertifikasi_id`);

--
-- Indexes for table `unit_kompetensi_isi`
--
ALTER TABLE `unit_kompetensi_isi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_kompetensi_isi_unit_kompetensi_sub_id_foreign` (`unit_kompetensi_sub_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jadwal_uji_kompetensi`
--
ALTER TABLE `jadwal_uji_kompetensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `kelengkapan_pemohon`
--
ALTER TABLE `kelengkapan_pemohon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kualifikasi_pendidikan`
--
ALTER TABLE `kualifikasi_pendidikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `muk`
--
ALTER TABLE `muk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_kompetensi_isi`
--
ALTER TABLE `unit_kompetensi_isi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_kompetensi_sub`
--
ALTER TABLE `unit_kompetensi_sub`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_detail`
--
ALTER TABLE `users_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  ADD CONSTRAINT `sertifikasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD CONSTRAINT `umpan_balik_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  ADD CONSTRAINT `unit_kompetensi_sertifikasi_id_foreign` FOREIGN KEY (`sertifikasi_id`) REFERENCES `sertifikasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_kompetensi_isi`
--
ALTER TABLE `unit_kompetensi_isi`
  ADD CONSTRAINT `unit_kompetensi_isi_unit_kompetensi_sub_id_foreign` FOREIGN KEY (`unit_kompetensi_sub_id`) REFERENCES `unit_kompetensi_sub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
