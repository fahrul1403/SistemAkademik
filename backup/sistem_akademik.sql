-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 06:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', NULL, '2024-10-22 05:50:47', '2024-10-22 05:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_matkul` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_akademik` varchar(9) NOT NULL,
  `nilai_angka` float(4,2) NOT NULL,
  `nilai_huruf` enum('A','B','C','D','E','F') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`id`, `id_user`, `id_matkul`, `semester`, `tahun_akademik`, `nilai_angka`, `nilai_huruf`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '1', '1', 2.00, 'B', '2024-10-23 20:25:57', '2024-10-23 20:30:17'),
(3, 2, 8, '7', '11', 2.00, 'A', '2024-10-23 21:12:47', '2024-10-23 21:12:47'),
(4, 2, 8, '5', '2', 2.00, 'A', '2024-10-23 21:50:36', '2024-10-23 21:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `topik` text NOT NULL,
  `tanggal_konsultasi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_matkul` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_akademik` varchar(9) NOT NULL,
  `status` enum('pending','disetujui','ditolak') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `id_user`, `id_matkul`, `semester`, `tahun_akademik`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2', '2', 'pending', '2024-10-23 20:35:13', '2024-10-23 20:40:55'),
(3, 1, 8, '3', '2', 'pending', '2024-10-23 20:41:47', '2024-10-23 20:41:47'),
(4, 2, 2, '7', '1', 'pending', '2024-10-23 21:52:14', '2024-10-23 21:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `aktivitas` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matkuls`
--

CREATE TABLE `matkuls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(100) NOT NULL,
  `matkul` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `smt` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matkuls`
--

INSERT INTO `matkuls` (`id`, `kode`, `matkul`, `sks`, `kategori`, `smt`, `semester`, `id_prodi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MTK101', 'Matematika Dasar', 3, 'Wajib', 1, 'Ganjil', 1, '2024-10-23 08:04:53', '2024-10-23 08:04:53', NULL),
(2, 'FIS101', 'Fisika Dasar', 3, 'Wajib', 1, 'Ganjil', 1, '2024-10-23 08:04:53', '2024-10-23 08:04:53', NULL),
(3, 'BIO101', 'Biologi Umum', 3, 'Wajib', 1, 'Ganjil', 1, '2024-10-23 08:04:53', '2024-10-23 08:04:53', NULL),
(4, 'KIM101', 'Kimia Dasar', 3, 'Wajib', 1, 'Ganjil', 1, '2024-10-23 08:04:53', '2024-10-23 08:04:53', NULL),
(5, 'IPS101', 'Ilmu Pengetahuan Sosial', 3, 'Wajib', 1, 'Ganjil', 1, '2024-10-23 08:04:53', '2024-10-23 08:04:53', NULL),
(6, 'PKN101', 'Pendidikan Kewarganegaraan', 2, 'Wajib', 1, 'Ganjil', 1, '2024-10-23 08:04:53', '2024-10-23 08:04:53', NULL),
(7, 'BAH101', 'Bahasa Indonesia', 2, 'Wajib', 1, 'Ganjil', 1, '2024-10-23 08:04:53', '2024-10-23 08:04:53', NULL),
(8, 'ENG101', 'Bahasa Inggris', 2, 'Wajib', 1, 'Ganjil', 1, '2024-10-23 08:04:53', '2024-10-23 08:04:53', NULL),
(9, 'PEM101', 'Pendidikan Jasmani', 2, 'Wajib', 1, 'Ganjil', 1, '2024-10-23 08:04:53', '2024-10-23 08:04:53', NULL),
(10, 'TIK101', 'Teknologi Informasi dan Komunikasi', 2, 'Pilihan', 1, 'Ganjil', 1, '2024-10-23 08:04:53', '2024-10-23 08:04:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `metode` enum('Email','WhatsApp') NOT NULL,
  `status` enum('Terkirim','Gagal') DEFAULT 'Terkirim',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua_mahasiswa`
--

CREATE TABLE `orang_tua_mahasiswa` (
  `id` int(11) NOT NULL,
  `orang_tua_id` int(11) DEFAULT 0,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orang_tua_mahasiswa`
--

INSERT INTO `orang_tua_mahasiswa` (`id`, `orang_tua_id`, `mahasiswa_id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(4, 0, NULL, '32523', 'coblonkg@gmail.com', '$2y$10$c2uoM533jquVoVz1J5MHeuTFqkiiIs7Mr8Sbg2RLlKogSJT7VX2Fe', '2024-10-28 21:59:56', '2024-10-28 21:59:56'),
(5, 0, 2, 'aha', 'ortu@gmail.com', '$2y$10$42TqL5IAPOB.3.z9VnRIw.fGQtjKttlGEPlq3ccIo98M5BFUzGwwy', '2024-10-28 22:05:37', '2024-10-28 22:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `status` enum('Menunggu','Lunas') DEFAULT 'Menunggu',
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `snap_token` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `user_id`, `jumlah`, `status`, `bukti_pembayaran`, `created_at`, `updated_at`, `snap_token`) VALUES
(11, 1, 1111, 'Lunas', NULL, '2024-10-23 19:58:30', '2024-10-23 20:00:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Menunggu','Lunas') NOT NULL,
  `tanggal_pembayaran` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mahasiswa') DEFAULT 'mahasiswa',
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'userku', 'user@gmail.com', 'user', 'mahasiswa', NULL, '2024-10-21 04:33:25', '2024-10-23 02:17:38'),
(2, 'pengguna1', 'pengguna@gmail.com', '$2y$10$NQW9/WXwnmaCopiRj29QQuMEH5RsKJt.FJ3dVoFkZxLaBwQm4xwUW', 'mahasiswa', NULL, '2024-10-23 02:23:20', '2024-10-23 02:23:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `matkuls`
--
ALTER TABLE `matkuls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orang_tua_mahasiswa`
--
ALTER TABLE `orang_tua_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orang_tua_id` (`orang_tua_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khs`
--
ALTER TABLE `khs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matkuls`
--
ALTER TABLE `matkuls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orang_tua_mahasiswa`
--
ALTER TABLE `orang_tua_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `khs`
--
ALTER TABLE `khs`
  ADD CONSTRAINT `khs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `khs_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `matkuls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `konsultasi_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `matkuls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD CONSTRAINT `status_pembayaran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
