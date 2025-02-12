-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 03:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laksamana`
--

--
-- Dumping data for table `laksa_ms_pendamping_sosial`
--

INSERT INTO `laksa_ms_pendamping_sosial` (`id`, `user_id`, `nip_nik`, `nama_petugas`, `pangkat_jabatan`, `instansi`, `alamat_kantor`, `pegawai_id`, `kabupaten_kota_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a3bbda16-e8ed-11ef-aff7-244bfebc0c45', 11, '12344567890123456', 'Galih Suseno', NULL, NULL, NULL, NULL, '5c4a63f1-2ae4-0630-482b-74a72cf071e9', NULL, '2025-02-12 07:05:22', NULL),
('ada27f16-e8ed-11ef-aff7-244bfebc0c45', 12, NULL, 'Juli Kurniati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b156fe6d-e8ed-11ef-aff7-244bfebc0c45', 13, NULL, 'Rakhmat Ariyanto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b5fb23b8-e8ed-11ef-aff7-244bfebc0c45', 14, NULL, 'Tien Septemberiawati Dwi Syah Putri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b887a40f-e8ed-11ef-aff7-244bfebc0c45', 15, NULL, 'Tri Cahyadi Achmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('bb85888d-e8ed-11ef-aff7-244bfebc0c45', 16, NULL, 'Kasea Tumangger', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('bdd095c3-e8ed-11ef-aff7-244bfebc0c45', 17, NULL, 'Riang Kasih Zebua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('c1cbf1a9-e8ed-11ef-aff7-244bfebc0c45', 18, NULL, 'Reno Putri Sari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('c52bcf21-e8ed-11ef-aff7-244bfebc0c45', 19, NULL, 'Mami Sulfita Nur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Dumping data for table `laksa_ms_petugas_layanan`
--

INSERT INTO `laksa_ms_petugas_layanan` (`id`, `user_id`, `nip_nik`, `nama_petugas`, `jabatan`, `alamat_kantor`, `telp_kantor`, `no_hp`, `email_petugas`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a562d43d-e94b-11ef-8ef6-244bfebc0c45', 4, NULL, 'abrar', NULL, NULL, NULL, NULL, 'abrar@gmail.com', NULL, NULL, NULL),
('af1e1f88-e94b-11ef-8ef6-244bfebc0c45', 6, NULL, 'Lisdawati', NULL, NULL, NULL, NULL, 'lisdawati@gmail.com', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
