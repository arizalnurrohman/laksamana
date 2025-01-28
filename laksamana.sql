-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2025 at 02:41 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_agama`
--

CREATE TABLE `laksa_ms_agama` (
  `id` varchar(36) NOT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_agama`
--

INSERT INTO `laksa_ms_agama` (`id`, `agama`, `created_at`, `updated_at`, `deleted_at`) VALUES
('41875d16-08f2-24cc-a568-a17c69655427', 'Protestan', NULL, NULL, NULL),
('5312618b-0fdd-0928-4d01-7940d10a96cf', 'Hindu', NULL, NULL, NULL),
('598529ef-424a-9c21-6821-b2a8d7b807e8', 'Khonghucu', NULL, NULL, NULL),
('a1859a74-915c-418a-1aa2-3f52064339d4', 'Buddha', NULL, NULL, NULL),
('ba6af749-0ecc-5ea9-a048-efc40f2b158f', 'Katolik', NULL, NULL, NULL),
('c4091389-34eb-7f56-1b6d-b1934f0115c9', 'Islam', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_aspek`
--

CREATE TABLE `laksa_ms_aspek` (
  `id` varchar(36) NOT NULL,
  `aspek` varchar(36) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_aspek`
--

INSERT INTO `laksa_ms_aspek` (`id`, `aspek`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('e7ce00ea-dcbb-11ef-beef-244bfebc0c45', 'Aspek Kedisiplinan', 1, NULL, NULL, NULL),
('e7ce0997-dcbb-11ef-beef-244bfebc0c45', 'Aspek Ketekunan', 2, NULL, NULL, NULL),
('e7ce12f6-dcbb-11ef-beef-244bfebc0c45', 'Aspek Kreatifiitas/Inisiatif', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_form_assessment`
--

CREATE TABLE `laksa_ms_form_assessment` (
  `id` varchar(36) NOT NULL,
  `assessment` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_form_assessment`
--

INSERT INTO `laksa_ms_form_assessment` (`id`, `assessment`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Permasalahan, Potensi dan Rencana Intervensi PPKS', 3, '2025-01-25 11:22:07', '2025-01-25 11:22:07', NULL),
('5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Kondisi Sosial Ekonomi', 1, '2025-01-25 11:21:09', '2025-01-25 11:21:09', NULL),
('c1652da7-be7d-4626-99e3-953d1c4f0441', 'Kondisi Tempat Tinggal', 2, '2025-01-25 11:21:23', '2025-01-25 11:21:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_form_assessment_sub`
--

CREATE TABLE `laksa_ms_form_assessment_sub` (
  `id` varchar(36) NOT NULL,
  `form_assessment_id` varchar(36) DEFAULT NULL,
  `sub_kategori_assessment` varchar(100) DEFAULT NULL,
  `variable_form` varchar(100) DEFAULT NULL,
  `type_form` enum('text','combo','file') DEFAULT NULL,
  `parent_id` varchar(36) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_form_assessment_sub`
--

INSERT INTO `laksa_ms_form_assessment_sub` (`id`, `form_assessment_id`, `sub_kategori_assessment`, `variable_form`, `type_form`, `parent_id`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('01bcd2a9-bb91-4706-bc54-0b09db32075c', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Bukan Listrik', '', NULL, '27b8abeb-0a2c-479e-97de-47cef748b821', 1, '2025-01-25 11:56:35', '2025-01-25 11:56:35', NULL),
('02a41d1b-f707-4ef0-9fac-ddb55e7d9dd6', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Atap Tempat Tinggal', '', NULL, NULL, 12, '2025-01-25 11:53:55', '2025-01-25 11:53:55', NULL),
('036ad43a-ddf0-4484-9b62-ce46559fbb22', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Kayu', '', NULL, 'a96973ca-c11b-426a-a282-09c311a7acd8', 3, '2025-01-25 11:55:01', '2025-01-25 11:55:01', NULL),
('0955632e-887f-4495-8103-a0135c78cca1', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Keluarga Besar', '', NULL, 'c6d802db-7744-4f47-a77b-e3bbed749573', 3, '2025-01-25 11:52:47', '2025-01-25 11:52:47', NULL),
('0a1cf00d-73c6-4cfd-9a23-96799118678e', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'PDAM', '', NULL, 'af277a47-fd2d-4df5-a4f3-0a0d7278a7a1', 1, '2025-01-25 11:57:29', '2025-01-25 11:57:29', NULL),
('0cfda96a-81cc-46ef-b890-f12812e48502', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Lainnya..', '', NULL, '1f1dddd9-46e2-4835-810b-84edb24a20be', 3, '2025-01-25 11:53:35', '2025-01-25 11:53:35', NULL),
('0f46a9cb-759a-4da9-b021-7aa75af605ee', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Jika Milik Sendiri; Bukti Kepemilikan Tanah', '', NULL, NULL, 8, '2025-01-25 11:51:40', '2025-01-25 11:51:40', NULL),
('10833193-067f-4d62-ac23-b4a7847585ce', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Batu Bata', '', NULL, '5819ae17-81f5-4a6d-bdf3-a801625d36f0', 5, '2025-01-25 11:55:44', '2025-01-25 11:55:44', NULL),
('1f1dddd9-46e2-4835-810b-84edb24a20be', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Kondisi Bangunan', '', NULL, NULL, 11, '2025-01-25 11:53:15', '2025-01-25 11:53:15', NULL),
('1f3d613e-1c7b-4204-9f88-4d6b70e4da8e', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Komponen Layanan yang dibutuhkan', NULL, NULL, NULL, 22, '2025-01-26 23:31:29', '2025-01-26 23:31:29', NULL),
('2203926d-bfb1-4578-9e69-855a576284c7', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'rrrr', NULL, NULL, '3e77e2ad-8b0a-45db-8fc7-d900754ee4d4', 3, '2025-01-27 06:54:48', '2025-01-27 06:55:02', '2025-01-27 06:55:02'),
('27b8abeb-0a2c-479e-97de-47cef748b821', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Sumber Penerangan', '', NULL, NULL, 16, '2025-01-25 11:56:25', '2025-01-25 11:56:25', NULL),
('2a180465-ba8b-46eb-afd1-d6be4c006c3d', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Keluarga Inti', '', NULL, 'c6d802db-7744-4f47-a77b-e3bbed749573', 2, '2025-01-25 11:52:40', '2025-01-25 11:52:40', NULL),
('2acf8af7-f819-47b5-a20f-43c66fa96430', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Luas Tempat Tinggal', '', NULL, NULL, 10, '2025-01-25 11:53:06', '2025-01-25 11:53:06', NULL),
('2fc0d49d-a3dc-492c-ade0-003be463d7db', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Tidak', '', NULL, '3e77e2ad-8b0a-45db-8fc7-d900754ee4d4', 2, '2025-01-25 11:43:17', '2025-01-25 11:43:17', NULL),
('3597f24d-d400-4621-965d-0c0b542239f0', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Pernah Khawatir Tidak Makan', '', NULL, '9193af48-e2c5-437e-9761-8ae97a1942ac', 2, '2025-01-25 11:50:00', '2025-01-25 11:50:00', NULL),
('3839e487-9756-4fb6-af41-ccf1e576cfa9', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Sewa', '', NULL, 'bbdff4e5-7f77-438b-9284-f4f893ee0a6d', 2, '2025-01-25 11:50:50', '2025-01-25 11:50:50', NULL),
('3e100749-03bf-4fb5-9df3-7c031d584259', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Permasalahan (Gambaran Kasus)', 't', 'text', NULL, 18, '2025-01-26 23:30:01', '2025-01-26 23:30:01', NULL),
('3e77e2ad-8b0a-45db-8fc7-d900754ee4d4', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Apakah Kepala Keluarga Bekerja', '', NULL, NULL, 1, '2025-01-25 11:38:15', '2025-01-25 11:38:15', NULL),
('409c30c1-5519-4e65-8546-ccba4d8721f0', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Sendiri', '', NULL, 'c6d802db-7744-4f47-a77b-e3bbed749573', 1, '2025-01-25 11:52:32', '2025-01-25 11:52:32', NULL),
('426a6b66-6080-4024-9f07-2d391224bad7', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Tidak', '', NULL, '9193af48-e2c5-437e-9761-8ae97a1942ac', 1, '2025-01-25 11:49:50', '2025-01-25 11:49:50', NULL),
('442d1ff5-c16e-477f-bf24-a18b60b9667f', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Tidak', '', NULL, '6f2b0d95-bcb0-4c17-beee-e342f14831a8', 2, '2025-01-25 11:56:14', '2025-01-25 11:56:14', NULL),
('4bcf53a2-91f3-40c0-ab2a-501387d59690', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Pernah Tidak Makan', '', NULL, '9193af48-e2c5-437e-9761-8ae97a1942ac', 3, '2025-01-25 11:50:06', '2025-01-25 11:50:06', NULL),
('4f148bc1-172b-432b-8d95-e3ad32a18a0d', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Pengeluaran Per Bulan', '', NULL, NULL, 6, '2025-01-25 11:50:20', '2025-01-25 11:50:20', NULL),
('4f473223-5adc-4020-9ad5-d44572141299', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Lainnya..', '', NULL, '27b8abeb-0a2c-479e-97de-47cef748b821', 4, '2025-01-25 11:57:04', '2025-01-25 11:57:04', NULL),
('5272f3bc-40de-44e0-84fd-302c572447be', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Pelatihan Vokasional Pembinaan kewirausahan', NULL, NULL, '1f3d613e-1c7b-4204-9f88-4d6b70e4da8e', 5, '2025-01-26 23:32:55', '2025-01-26 23:32:55', NULL),
('533a7f65-df54-4d1b-892d-f17ff86ae355', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Pemenuhan Kebutuhan Hidup Layak', NULL, NULL, '1f3d613e-1c7b-4204-9f88-4d6b70e4da8e', 1, '2025-01-26 23:31:40', '2025-01-26 23:31:45', NULL),
('53951976-0c3e-4fed-878d-873494ab51a8', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Girik', '', NULL, '0f46a9cb-759a-4da9-b021-7aa75af605ee', 3, '2025-01-25 11:52:07', '2025-01-25 11:52:07', NULL),
('5819ae17-81f5-4a6d-bdf3-a801625d36f0', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Dinding Tempat Tinggal', '', NULL, NULL, 14, '2025-01-25 11:55:14', '2025-01-25 11:55:14', NULL),
('5a6af5f4-2dc8-432a-b9e3-6ad8e6eb4e5d', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Pelayanan yang Pernah Diterima', 't', 'text', NULL, 19, '2025-01-26 23:30:11', '2025-01-26 23:30:11', NULL),
('5e5113ad-446b-423e-a0c7-5403a72d62e7', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Asbes', '', NULL, '02a41d1b-f707-4ef0-9fac-ddb55e7d9dd6', 3, '2025-01-25 11:54:11', '2025-01-25 11:54:11', NULL),
('5fca3050-bf4a-4a96-9b79-5008f3dee976', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Lainnya..', '', NULL, 'af277a47-fd2d-4df5-a4f3-0a0d7278a7a1', 4, '2025-01-25 11:57:39', '2025-01-25 11:57:39', NULL),
('6229b866-d240-4555-9132-055ef485af43', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Telantar/Menggelandang', '', NULL, 'bbdff4e5-7f77-438b-9284-f4f893ee0a6d', 5, '2025-01-25 11:51:15', '2025-01-25 11:51:15', NULL),
('685027f2-1c29-4849-abf3-f79f975b1e9e', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Kawat', '', NULL, '5819ae17-81f5-4a6d-bdf3-a801625d36f0', 4, '2025-01-25 11:55:37', '2025-01-25 11:55:37', NULL),
('6ca4ec67-d562-4080-8e0a-7c40b740c07f', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Permanen', '', NULL, '1f1dddd9-46e2-4835-810b-84edb24a20be', 1, '2025-01-25 11:53:23', '2025-01-25 11:53:23', NULL),
('6ce471c9-39d1-4e05-af98-224e327c3e7b', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Menumpang', '', NULL, 'bbdff4e5-7f77-438b-9284-f4f893ee0a6d', 3, '2025-01-25 11:50:56', '2025-01-25 11:50:56', NULL),
('6f2b0d95-bcb0-4c17-beee-e342f14831a8', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Apakah Memiliki Jamban / MCK ?', '', NULL, NULL, 15, '2025-01-25 11:56:04', '2025-01-25 11:56:04', NULL),
('6fb763e6-8982-4696-85fc-f5678df989cd', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Lembaga', '', NULL, 'bbdff4e5-7f77-438b-9284-f4f893ee0a6d', 4, '2025-01-25 11:51:01', '2025-01-25 11:51:01', NULL),
('76c4e1d6-110e-423d-a8fe-aa887112d9f3', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Jumlah Tanggungan (Orang dalam Rumah)', '', NULL, NULL, 4, '2025-01-25 11:49:23', '2025-01-25 11:49:23', NULL),
('79dd9f1f-96be-4ace-88b5-19e46950a8e6', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Seng', '', NULL, '02a41d1b-f707-4ef0-9fac-ddb55e7d9dd6', 1, '2025-01-25 11:54:03', '2025-01-25 11:54:03', NULL),
('7cddc3d7-5200-430b-9bc1-eca515513f50', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Kayu', '', NULL, '5819ae17-81f5-4a6d-bdf3-a801625d36f0', 1, '2025-01-25 11:55:22', '2025-01-25 11:55:22', NULL),
('7eb2f19f-ed89-4c31-b404-d9d1e7eda49d', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Ubin', '', NULL, 'a96973ca-c11b-426a-a282-09c311a7acd8', 2, '2025-01-25 11:54:58', '2025-01-25 11:54:58', NULL),
('7ec16323-46b2-401a-ab73-7204d161af84', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Listrik 900 VA', '', NULL, '27b8abeb-0a2c-479e-97de-47cef748b821', 3, '2025-01-25 11:57:00', '2025-01-25 11:57:00', NULL),
('846875c7-8f9b-4b37-a661-3cc0eaa3105f', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Listrik 450 VA', '', NULL, '27b8abeb-0a2c-479e-97de-47cef748b821', 2, '2025-01-25 11:56:48', '2025-01-25 11:56:48', NULL),
('8dfd17da-ab23-405f-b5c5-9c8361b318bb', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Mata Air', '', NULL, 'af277a47-fd2d-4df5-a4f3-0a0d7278a7a1', 2, '2025-01-25 11:57:33', '2025-01-25 11:57:33', NULL),
('8f4b906b-6b40-406a-bffd-821f5851c1dc', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Milik Sendiri', '', NULL, 'bbdff4e5-7f77-438b-9284-f4f893ee0a6d', 1, '2025-01-25 11:50:45', '2025-01-25 11:50:45', NULL),
('9193af48-e2c5-437e-9761-8ae97a1942ac', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Apakah Pernah tidak makan dalam sehari ?', '', NULL, NULL, 5, '2025-01-25 11:49:42', '2025-01-25 11:49:42', NULL),
('945fd0fd-3d30-4306-b605-a0f714078aba', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Pihak yang terlibat dalam rencana Intervensi', NULL, NULL, NULL, 23, '2025-01-26 23:34:08', '2025-01-26 23:34:08', NULL),
('9a561d85-0dfb-4f56-aaef-ebca20e58bfd', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Dukungan Aksesibilitas', NULL, NULL, '1f3d613e-1c7b-4204-9f88-4d6b70e4da8e', 7, '2025-01-26 23:33:15', '2025-01-26 23:33:15', NULL),
('9b9ab6e7-520f-4488-9f9d-1dc5f4e5e24b', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Bambu', '', NULL, '5819ae17-81f5-4a6d-bdf3-a801625d36f0', 2, '2025-01-25 11:55:30', '2025-01-25 11:55:30', NULL),
('a01d6da8-a517-4dde-81c4-091e93978a92', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Potensi Sumber (Organisasi, Lingkungan Pendidikan, Ekonomi, Keagamaan, Alam)', 't', 'text', NULL, 21, '2025-01-26 23:31:17', '2025-01-26 23:31:17', NULL),
('a1bfa52b-cd11-43cf-81a4-ae91821b42f3', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Seng', '', NULL, '5819ae17-81f5-4a6d-bdf3-a801625d36f0', 3, '2025-01-25 11:55:34', '2025-01-25 11:55:34', NULL),
('a6ffb578-1e02-4561-8050-9357f15cebdd', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Dukungan Keluarga', NULL, NULL, '1f3d613e-1c7b-4204-9f88-4d6b70e4da8e', 3, '2025-01-26 23:32:16', '2025-01-26 23:32:16', NULL),
('a8a843fb-3a5e-4e83-a6f8-7c1c175621af', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Bantuan dan Asistensi Sosial', NULL, NULL, '1f3d613e-1c7b-4204-9f88-4d6b70e4da8e', 6, '2025-01-26 23:33:06', '2025-01-26 23:33:06', NULL),
('a96973ca-c11b-426a-a282-09c311a7acd8', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Lantai Tempat Tinggal', '', NULL, NULL, 13, '2025-01-25 11:54:29', '2025-01-25 11:54:29', NULL),
('af277a47-fd2d-4df5-a4f3-0a0d7278a7a1', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Sumber Air Bersih', '', NULL, NULL, 17, '2025-01-25 11:57:18', '2025-01-25 11:57:18', NULL),
('b65b1a88-0102-4b91-b735-b4ea0ccc6595', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Lainnya..', '', NULL, '0f46a9cb-759a-4da9-b021-7aa75af605ee', 4, '2025-01-25 11:52:14', '2025-01-25 11:52:14', NULL),
('b80a7047-0bdb-4b86-b1c1-32399523ebb4', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Potensi Diri (Minat Bakat, Keterampilan, Motivasi, hasil test IQ)', 't', 'text', NULL, 20, '2025-01-26 23:30:38', '2025-01-26 23:30:38', NULL),
('b8aa3dcd-9532-43ba-80a5-40fe291e635c', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Pengeluaran Bulanan', '', NULL, NULL, 3, '2025-01-25 11:49:08', '2025-01-25 11:49:08', NULL),
('bbdff4e5-7f77-438b-9284-f4f893ee0a6d', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Tempat Tinggal Saat Ini', '', NULL, NULL, 7, '2025-01-25 11:50:37', '2025-01-25 11:50:37', NULL),
('c0a383b1-529a-49a5-93fe-627ffa94c984', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Sertifikat Hak Milik', '', NULL, '0f46a9cb-759a-4da9-b021-7aa75af605ee', 1, '2025-01-25 11:51:49', '2025-01-25 11:51:49', NULL),
('c6d802db-7744-4f47-a77b-e3bbed749573', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Tinggal Bersama', '', NULL, NULL, 9, '2025-01-25 11:52:25', '2025-01-25 11:52:25', NULL),
('ccb122d6-84ac-499c-bf69-4b64bc0c7465', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Tanah', '', NULL, 'a96973ca-c11b-426a-a282-09c311a7acd8', 1, '2025-01-25 11:54:53', '2025-01-25 11:54:53', NULL),
('cdc0d3d4-94d3-42a3-b320-4c502e0daf5e', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Lainnya..', '', NULL, 'c6d802db-7744-4f47-a77b-e3bbed749573', 4, '2025-01-25 11:52:53', '2025-01-25 11:52:53', NULL),
('cfe928cb-160c-4ae8-ada3-0e5daba69bb8', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Terapi (Fisik, Psikososial, Mental Spiritual)', NULL, NULL, '1f3d613e-1c7b-4204-9f88-4d6b70e4da8e', 4, '2025-01-26 23:32:38', '2025-01-26 23:32:38', NULL),
('d57f5aae-6731-4e0e-ba3b-d971d67243df', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Semi Permanen', '', NULL, '1f1dddd9-46e2-4835-810b-84edb24a20be', 2, '2025-01-25 11:53:31', '2025-01-25 11:53:31', NULL),
('d7fa2ca4-70f6-48c0-a897-6c0b11d2e7d4', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Ya', '', NULL, '6f2b0d95-bcb0-4c17-beee-e342f14831a8', 1, '2025-01-25 11:56:11', '2025-01-25 11:56:11', NULL),
('e28d1155-2eea-436d-9eb2-0d2f9a266885', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'x', '', NULL, '3e77e2ad-8b0a-45db-8fc7-d900754ee4d4', 3, '2025-01-25 11:44:04', '2025-01-25 11:47:39', '2025-01-25 11:47:39'),
('e427beee-addc-46ff-b0bc-a4b91df3c1eb', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Hak Guna Bangunan', '', NULL, '0f46a9cb-759a-4da9-b021-7aa75af605ee', 2, '2025-01-25 11:51:58', '2025-01-25 11:51:58', NULL),
('e9f2cb6c-c27f-400d-a0f3-79f92f148194', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'Perawatan dan Pengasuh Sosial', NULL, NULL, '1f3d613e-1c7b-4204-9f88-4d6b70e4da8e', 2, '2025-01-26 23:31:58', '2025-01-26 23:32:08', NULL),
('efbb6799-d5ad-417a-8ac9-25ad595c05bb', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Sumur', '', NULL, 'af277a47-fd2d-4df5-a4f3-0a0d7278a7a1', 3, '2025-01-25 11:57:36', '2025-01-25 11:57:36', NULL),
('f5fc6238-7d51-4a26-bdbf-b2829acb3b89', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Pekerjaan', '', NULL, NULL, 2, '2025-01-25 11:48:21', '2025-01-25 11:48:21', NULL),
('f68d74fd-4c92-410c-b612-a8bbb605d3bf', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'Ya', '', NULL, '3e77e2ad-8b0a-45db-8fc7-d900754ee4d4', 1, '2025-01-25 11:43:07', '2025-01-25 11:43:07', NULL),
('f6a02dbc-b0a6-4fbd-a3d6-bef88fa0d4a6', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Genteng', '', NULL, '02a41d1b-f707-4ef0-9fac-ddb55e7d9dd6', 2, '2025-01-25 11:54:07', '2025-01-25 11:54:07', NULL),
('fdfb0c25-e991-4328-ae7d-71e7d751708b', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'Lainnya..', '', NULL, '02a41d1b-f707-4ef0-9fac-ddb55e7d9dd6', 4, '2025-01-25 11:54:17', '2025-01-25 11:54:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_gedung`
--

CREATE TABLE `laksa_ms_gedung` (
  `id` varchar(36) NOT NULL,
  `nama_gedung` varchar(100) DEFAULT NULL,
  `status_gedung` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `jumlah_kamar` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `laksa_ms_gedung`
--

INSERT INTO `laksa_ms_gedung` (`id`, `nama_gedung`, `status_gedung`, `jumlah_kamar`, `created_at`, `updated_at`, `deleted_at`) VALUES
('2abcfad0-d43f-4166-9675-0fbc2b5d7c4a', 'Asrama Pangeran Diponegoro', 'Aktif', 10, '2025-01-26 08:00:50', '2025-01-26 08:00:50', NULL),
('36ec805e-3a34-496b-a9c1-5db36038e3f3', 'Asrama Sultan Syarif Kasim II', 'Aktif', 4, '2025-01-26 08:00:33', '2025-01-26 08:00:33', NULL),
('455628ff-363c-4059-84ba-86a001f306f5', 'Posyandu Lansia', 'Aktif', 5, '2025-01-26 08:00:56', '2025-01-26 08:00:56', NULL),
('45e6a6f2-fd88-4bed-9fe6-8e2f07f8e74b', 'Asrama Kartini', 'Aktif', 5, '2025-01-26 08:00:45', '2025-01-26 08:00:45', NULL),
('7387f09a-c1f4-494b-9bc0-b215a0d12eee', 'Asrama Cut Nyak Dien', 'Aktif', 4, '2025-01-26 08:00:39', '2025-01-26 08:10:52', NULL),
('870fb519-16d6-46c5-9d68-d2f43652dfca', 'Asrama Dewi Sartika', 'Aktif', 4, '2025-01-26 08:00:26', '2025-01-26 08:00:26', NULL),
('a2342c26-e35f-417d-b8ad-09f7bbaa1983', NULL, 'Aktif', 4, '2025-01-26 07:52:43', '2025-01-26 07:57:10', '2025-01-26 07:57:10'),
('ace70e18-e091-4caa-a8a0-449bd4c80953', NULL, 'Aktif', 4, '2025-01-26 07:52:07', '2025-01-26 07:57:12', '2025-01-26 07:57:12'),
('d997a070-8183-4adc-a0ec-1f9ff24eb18c', 'asdas', 'Tidak Aktif', 4, '2025-01-27 15:26:03', '2025-01-27 15:26:15', '2025-01-27 15:26:15'),
('e6aebf41-d336-4729-8419-24531df2fda0', 'Asrama Sultan Hasanuddin', 'Aktif', 7, '2025-01-26 08:00:20', '2025-01-26 08:00:20', NULL),
('e8aea951-2c25-4275-baec-140f9d3f93d1', 'Asrama Robert Wolter Monginsidi', 'Aktif', 4, '2025-01-26 07:55:00', '2025-01-26 07:55:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_jenis_bantuan`
--

CREATE TABLE `laksa_ms_jenis_bantuan` (
  `id` varchar(36) NOT NULL,
  `jenis_bantuan` varchar(100) NOT NULL,
  `sort` int(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_jenis_bantuan`
--

INSERT INTO `laksa_ms_jenis_bantuan` (`id`, `jenis_bantuan`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9e3ad9c7-dc53-11ef-9f06-244bfebc0c45', 'Belum Menerima Bantuan', 1, NULL, NULL, NULL),
('a82745de-dc53-11ef-9f06-244bfebc0c45', 'PKH', 2, NULL, NULL, NULL),
('a82754c1-dc53-11ef-9f06-244bfebc0c45', 'Sembako', 3, NULL, NULL, NULL),
('af8263a0-dc53-11ef-9f06-244bfebc0c45', 'KIS PBI-JK', 4, NULL, NULL, NULL),
('af827721-dc53-11ef-9f06-244bfebc0c45', 'KIP', 5, NULL, NULL, NULL),
('b81a5c20-dc53-11ef-9f06-244bfebc0c45', 'Prokus', 6, NULL, NULL, NULL),
('b81a629f-dc53-11ef-9f06-244bfebc0c45', 'Lainnya:', 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_jenis_rujukan`
--

CREATE TABLE `laksa_ms_jenis_rujukan` (
  `id` varchar(36) NOT NULL,
  `jenis_rujukan` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_kabupaten_kota`
--

CREATE TABLE `laksa_ms_kabupaten_kota` (
  `id` varchar(36) NOT NULL,
  `provinsi_id` varchar(36) DEFAULT NULL,
  `kemendagri_id` varchar(36) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_kabupaten_kota`
--

INSERT INTO `laksa_ms_kabupaten_kota` (`id`, `provinsi_id`, `kemendagri_id`, `kabupaten_kota`, `created_at`, `updated_at`, `deleted_at`) VALUES
('3ff28fba-6b12-a4f1-680d-5f17fe422b53', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.72', 'Kota Dumai', NULL, NULL, NULL),
('46cc22d6-7259-63db-a540-7bf0905784cc', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.03', 'Kabupaten Bengkalis', NULL, NULL, NULL),
('5c4a63f1-2ae4-0630-482b-74a72cf071e9', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.08', 'Kabupaten Siak', NULL, NULL, NULL),
('7e97d60f-82d7-49f0-a359-4efb5fe3147f', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.04', 'Kabupaten Indragiri Hilir', NULL, NULL, NULL),
('9605ae84-5977-7c09-4e48-609ccdb5a5ad', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.07', 'Kabupaten Rokan Hilir', NULL, NULL, NULL),
('9bacc4bf-443e-8e47-373e-26a042069ecc', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.02', 'Kabupaten Indragiri Hulu', NULL, NULL, NULL),
('9e842512-2cc3-216f-1a52-c3672c293e20', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.05', 'Kabupaten Pelalawan', NULL, NULL, NULL),
('9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.01', 'Kabupaten Kampar', NULL, NULL, NULL),
('b7d47f01-15ac-8493-a774-6bb16a347a42', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.71', 'Kota Pekanbaru', NULL, NULL, NULL),
('c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.06', 'Kabupaten Rokan Hulu', NULL, NULL, NULL),
('daf4dded-7c0f-8bb8-8940-115c42f27351', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.09', 'Kabupaten Kuantan Singingi', NULL, NULL, NULL),
('dcd6779e-3433-7752-86d1-ddeafa391495', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14.10', 'Kabupaten Kepulauan Meranti', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_kategori_ppks`
--

CREATE TABLE `laksa_ms_kategori_ppks` (
  `id` varchar(36) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_kategori_ppks`
--

INSERT INTO `laksa_ms_kategori_ppks` (`id`, `kategori`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH', 1, '2025-01-17 01:21:56', '2025-01-17 01:25:37', NULL),
('1dd96457-c226-4f42-a25b-693c9139823c', 'Anak', 2, '2025-01-17 01:25:47', '2025-01-22 19:11:10', NULL),
('46779588-8e13-4fa9-815e-be6d7780b4b4', 'Korban Bencana', 8, '2025-01-17 01:26:34', '2025-01-17 01:26:34', NULL),
('6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Kelompok Rentan', 4, '2025-01-17 01:26:03', '2025-01-17 01:26:03', NULL),
('6f041a34-b60d-4297-a4c7-41575efcf3e7', 'ODHA', 6, '2025-01-17 01:26:16', '2025-01-17 01:26:16', NULL),
('7e345ffe-5305-4075-a95b-995682b0954f', 'xx', 10, '2025-01-22 19:11:37', '2025-01-22 19:12:29', '2025-01-22 19:12:29'),
('b0dfec43-ccc7-4ef6-99ff-391fc2a1c494', 'Lanjut Usia', 3, '2025-01-17 01:25:54', '2025-01-17 01:25:54', NULL),
('b1895989-f137-4421-83bc-59206516da7f', 'Penyandang Disabilitas', 7, '2025-01-17 01:26:24', '2025-01-17 01:26:24', NULL),
('ce9e55eb-eee7-4cf5-8b32-c27253ba4213', 'NAPZA', 5, '2025-01-17 01:26:09', '2025-01-17 01:26:09', NULL),
('f80c9646-2757-43de-9e49-1c914d30e09c', 'xxxxx', 9, '2025-01-22 19:11:16', '2025-01-22 19:12:32', '2025-01-22 19:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_kategori_ppks_sub`
--

CREATE TABLE `laksa_ms_kategori_ppks_sub` (
  `id` varchar(36) NOT NULL,
  `kategori_id` varchar(36) DEFAULT NULL,
  `sub_kategori_ppks` varchar(100) DEFAULT NULL,
  `variable_form` varchar(100) DEFAULT NULL,
  `parent_id` varchar(36) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_kategori_ppks_sub`
--

INSERT INTO `laksa_ms_kategori_ppks_sub` (`id`, `kategori_id`, `sub_kategori_ppks`, `variable_form`, `parent_id`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('00280bc9-2f1a-452b-2d61-2a9b89e27fd7', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang dieksploitasi secara ekonomi', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('00505551-5658-82b1-855e-306902da3178', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dalam kondisi kritis yang membutuhkan akses ke layanan kesehatan', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('044ff0e9-439e-124e-8ef8-202485b34bd5', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Kejahatan Seksual', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('05e80288-ebc1-4feb-93e1-31310813f6d0', '6f041a34-b60d-4297-a4c7-41575efcf3e7', 'Wali Pengampu/Pendamping', NULL, '4d64e789-ebcb-49d6-bf05-011731b1d827', 3, '2025-01-26 17:17:12', '2025-01-26 17:17:12', NULL),
('09a698cb-3ce0-4c70-a346-8363cbd8bf49', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Rungu, Wicara, Netra & Fisik', NULL, '252cef00-bd8e-40b8-9f9d-c03e567fb23f', 7, '2025-01-24 18:36:14', '2025-01-24 18:36:14', NULL),
('13157c96-d3f6-429f-864e-7edcab14b468', 'b1895989-f137-4421-83bc-59206516da7f', 'Ragam Penyandang Disabilitas', 'ragam_peyandang_disabilitas', NULL, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('13462ab7-5874-4fad-b131-e07e75c4ff72', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'asd', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 5, '2025-01-22 23:38:57', '2025-01-22 23:39:03', '2025-01-22 23:39:03'),
('1790b96b-aeb3-426e-866a-67a5054a91d4', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Korban trafficking', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 7, '2025-01-24 18:05:06', '2025-01-24 18:05:06', NULL),
('18724c8c-ed46-423a-a511-2b2c298cedad', 'b1895989-f137-4421-83bc-59206516da7f', 'Lambat Belajar/Speed Delay', NULL, '90826db6-4e07-4cc2-9626-a3b4d57de472', 1, '2025-01-24 18:34:22', '2025-01-24 18:34:22', NULL),
('1a482f35-6bf4-18da-0a2d-fe5ba1dc757b', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Perdagangan', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('1fab36bc-6616-46df-bab7-a31a02e75e04', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Multi', NULL, '252cef00-bd8e-40b8-9f9d-c03e567fb23f', 2, '2025-01-24 18:35:53', '2025-01-24 18:35:53', NULL),
('22c50880-c062-4985-89b6-f5642feb28bf', 'ce9e55eb-eee7-4cf5-8b32-c27253ba4213', 'PPKS', NULL, 'b5ec59dc-4b12-47d3-ad71-c909fd7f96f5', 1, '2025-01-26 17:17:50', '2025-01-26 17:17:50', NULL),
('252cef00-bd8e-40b8-9f9d-c03e567fb23f', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Ganda/Multi', 'disabilitas_ganda', 'c06be19e-bc3d-4835-8c8d-c2aba213952c', 13, '2025-01-24 18:34:00', '2025-01-24 18:34:00', NULL),
('25fe3af7-841a-7dbd-833e-43cd00e773f7', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Kekerasan Fisik', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('2867514a-9631-4f5e-66ac-2c39720f3f1d', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Jaringan Terorisme', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('2b6eadb9-c194-41f3-a9a0-6b4c3e19c5f4', 'b1895989-f137-4421-83bc-59206516da7f', 'Skizofrenia', NULL, 'a03fa345-ecce-4709-9592-0890eccef005', 1, '2025-01-24 18:34:39', '2025-01-24 18:34:39', NULL),
('2bc64477-9b2b-263a-88b7-e456d8d3707b', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Perlakuan Salah', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('2cbb13f2-016e-4cbc-4aca-c04c681d2e7f', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Penjualan', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('2e410c4b-d2f2-45f2-aa83-92cb8ea82521', 'b1895989-f137-4421-83bc-59206516da7f', 'Amputasi, Lumpuh Layu/Kaku', NULL, 'ac538596-d6db-4831-b992-e2a7f3315fbe', 1, '2025-01-24 18:23:46', '2025-01-24 18:23:46', NULL),
('33d8f160-d67e-4828-9830-d8378f4e2744', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Netra & Fisik', NULL, '252cef00-bd8e-40b8-9f9d-c03e567fb23f', 3, '2025-01-24 18:35:57', '2025-01-24 18:35:57', NULL),
('368b1b1d-c123-452e-89b6-37018b8b3340', 'b1895989-f137-4421-83bc-59206516da7f', 'Hiperaktif/ADHD/ADD', NULL, 'a03fa345-ecce-4709-9592-0890eccef005', 7, '2025-01-24 18:35:02', '2025-01-24 18:35:02', NULL),
('36d2ff59-68f4-4ffd-a081-33da9baae7aa', '46779588-8e13-4fa9-815e-be6d7780b4b4', 'Orang Tua', '', '68695951-ba9d-4a51-a4b7-11313c8a4fd4', 2, '2025-01-24 18:03:44', '2025-01-24 18:03:44', NULL),
('377f7714-38ce-48a9-baff-fe9576e36458', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Fisik', NULL, '13157c96-d3f6-429f-864e-7edcab14b468', 1, '2025-01-24 18:23:21', '2025-01-24 18:23:21', NULL),
('37aa74ff-0bbf-4be8-ab7c-7544dc8bcd7f', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Mental', NULL, '13157c96-d3f6-429f-864e-7edcab14b468', 3, '2025-01-24 18:23:28', '2025-01-24 18:23:28', NULL),
('3c11bd19-0685-47c3-837c-f0e631f05fce', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Yang lain:', '', '5332d470-4c5d-4df2-98d5-45b60805c978', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('3c77ed14-604b-7313-5afe-914a4274632c', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Penyandang Disabilitas', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('3e8bb6f2-56ab-445b-a995-bc3397c4967c', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Perempuan orang dengan rawan sosial ekonomi', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 10, '2025-01-24 18:05:20', '2025-01-24 18:05:20', NULL),
('3f519a01-5eee-7e7a-a64f-ab6095bca4e8', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Yang Menjadi Korban penyalahgunaan narkotika, alkohol,psikotoprika,dan zat adiktif lainnya', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('448375a4-29cb-4ea9-a1d9-208611082989', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Sensorik', NULL, '13157c96-d3f6-429f-864e-7edcab14b468', 4, '2025-01-24 18:23:32', '2025-01-24 18:23:32', NULL),
('44e0d44d-c96e-4afa-9caf-0395c12d0c7a', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Diversi', '', '5332d470-4c5d-4df2-98d5-45b60805c978', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('4aebdf03-5293-4724-a3d8-f9f2fca857d9', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'No. Putusan Pengadilan', 'no_putusan_pengadilan', NULL, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('4b3c443e-8310-46d9-b39d-5e3f97617d7f', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Rungu & Fisik', NULL, '252cef00-bd8e-40b8-9f9d-c03e567fb23f', 4, '2025-01-24 18:36:01', '2025-01-24 18:36:01', NULL),
('4b5aaf59-4284-4b7c-a227-68f4294423d7', 'b1895989-f137-4421-83bc-59206516da7f', 'Dwarfisme (Kerdil)', NULL, 'ac538596-d6db-4831-b992-e2a7f3315fbe', 5, '2025-01-24 18:24:04', '2025-01-24 18:24:10', NULL),
('4bd3ee2c-88be-4989-803d-5b63a16fa0f9', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Intelektual', NULL, '13157c96-d3f6-429f-864e-7edcab14b468', 2, '2025-01-24 18:23:25', '2025-01-24 18:23:25', NULL),
('4d64e789-ebcb-49d6-bf05-011731b1d827', '6f041a34-b60d-4297-a4c7-41575efcf3e7', 'Penerima ATENSI', 'penerima_atensi', NULL, 10, '2025-01-26 17:16:56', '2025-01-26 17:16:56', NULL),
('4eb28eab-7561-5e7e-42a5-c3ac2bfc114d', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Penculikan', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('5332d470-4c5d-4df2-98d5-45b60805c978', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Jenis Rujukan', 'jenis_rujukan', NULL, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('5516efcf-1571-40bc-9f9e-f39c3148ee81', 'b0dfec43-ccc7-4ef6-99ff-391fc2a1c494', 'Penerima ATENSI', 'penerima_atensi', NULL, 12, '2025-01-26 17:18:35', '2025-01-26 17:18:35', NULL),
('5d7628a4-e240-4d65-9348-a9a027dbb312', '46779588-8e13-4fa9-815e-be6d7780b4b4', 'Wali Pengampu/Pendamping', '', '68695951-ba9d-4a51-a4b7-11313c8a4fd4', 3, '2025-01-24 18:03:48', '2025-01-24 18:03:48', NULL),
('60c1ca3d-bb8d-40df-8580-e8c66b1934d4', 'b1895989-f137-4421-83bc-59206516da7f', 'Grahita', NULL, '90826db6-4e07-4cc2-9626-a3b4d57de472', 2, '2025-01-24 18:34:26', '2025-01-24 18:34:26', NULL),
('62ca4c60-5969-0123-66cc-4f71220460ae', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dalam situasi darurat', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('64e7cf37-c573-48d1-8b0d-ef57e65eaa88', 'b1895989-f137-4421-83bc-59206516da7f', 'Bipolar Disorder', NULL, 'a03fa345-ecce-4709-9592-0890eccef005', 2, '2025-01-24 18:34:43', '2025-01-24 18:34:43', NULL),
('664ce91c-2acb-4af0-8f69-22c9a0e6ebd7', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Wicara & Fisik', NULL, '252cef00-bd8e-40b8-9f9d-c03e567fb23f', 5, '2025-01-24 18:36:05', '2025-01-24 18:36:05', NULL),
('67d316a1-ea29-433b-98b0-6741dcde985c', 'b0dfec43-ccc7-4ef6-99ff-391fc2a1c494', 'Orang Tua', NULL, '5516efcf-1571-40bc-9f9e-f39c3148ee81', 2, '2025-01-26 17:18:42', '2025-01-26 17:18:42', NULL),
('68695951-ba9d-4a51-a4b7-11313c8a4fd4', '46779588-8e13-4fa9-815e-be6d7780b4b4', 'Penerima ATENSI', 'penerima_atensi', NULL, 9, '2025-01-24 18:03:28', '2025-01-24 18:03:28', NULL),
('6e3449f5-b555-4158-83fb-f00ffac0807e', '46779588-8e13-4fa9-815e-be6d7780b4b4', 'Yang lain:', '', '68695951-ba9d-4a51-a4b7-11313c8a4fd4', 4, '2025-01-24 18:03:54', '2025-01-24 18:03:54', NULL),
('712c8a80-3ae8-4e9a-afbf-0d8c7343f65f', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Berat', NULL, '252cef00-bd8e-40b8-9f9d-c03e567fb23f', 1, '2025-01-24 18:35:49', '2025-01-24 18:35:49', NULL),
('770a696b-ec3f-4f08-b939-bd0b3f7c3b14', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Rungu', NULL, 'b3249f25-3495-4f77-9689-9c79a9cff945', 2, '2025-01-24 18:35:20', '2025-01-24 18:35:39', NULL),
('78f32395-56a4-420b-a28d-e5bee3aadcc5', 'b1895989-f137-4421-83bc-59206516da7f', 'Gangguan Kepribadian', NULL, 'a03fa345-ecce-4709-9592-0890eccef005', 5, '2025-01-24 18:34:56', '2025-01-24 18:34:56', NULL),
('7d9d8247-af67-4afc-b7bd-bc9ca510c974', '6f041a34-b60d-4297-a4c7-41575efcf3e7', 'Orang Tua', NULL, '4d64e789-ebcb-49d6-bf05-011731b1d827', 2, '2025-01-26 17:17:10', '2025-01-26 17:17:10', NULL),
('7e00bf27-3e50-4e01-8ee6-2c5d7b29af6f', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Wicara', NULL, 'b3249f25-3495-4f77-9689-9c79a9cff945', 3, '2025-01-24 18:35:24', '2025-01-24 18:35:24', NULL),
('82537df4-33d2-465a-bac6-e002fa285a32', '46779588-8e13-4fa9-815e-be6d7780b4b4', 'PPKS', '', '68695951-ba9d-4a51-a4b7-11313c8a4fd4', 1, '2025-01-24 18:03:40', '2025-01-24 18:03:40', NULL),
('83286448-f902-4a7a-8a15-03c9ae419d6e', 'b1895989-f137-4421-83bc-59206516da7f', 'Depresi', NULL, 'a03fa345-ecce-4709-9592-0890eccef005', 3, '2025-01-24 18:34:47', '2025-01-24 18:34:47', NULL),
('89ced754-c913-479a-8d8a-672af85d9743', 'ce9e55eb-eee7-4cf5-8b32-c27253ba4213', 'Yang lain:', NULL, 'b5ec59dc-4b12-47d3-ad71-c909fd7f96f5', 4, '2025-01-26 17:17:59', '2025-01-26 17:17:59', NULL),
('8caad3d7-f8b7-4c01-8c95-4f2f973a4539', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Pelaku', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('8e381881-7053-7ac7-7234-9aaeb0767883', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dengan perilaku sosial menyimpang', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('8e6f2cb5-d3f8-4a6c-8a4f-da2059b264b8', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Bekas Warga Binaan Lembaga Pemasyarakatan (BWBLP)', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 6, '2025-01-24 18:04:57', '2025-01-24 18:04:57', NULL),
('8ec2abaf-6011-3f17-910b-01e8b13a0dfa', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dengan HIV/AIDS', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('90826db6-4e07-4cc2-9626-a3b4d57de472', 'b1895989-f137-4421-83bc-59206516da7f', 'Ragam Disabilitas Intelektual', 'ragam_disabilitas_intelektual', '4bd3ee2c-88be-4989-803d-5b63a16fa0f9', 10, '2025-01-24 18:33:41', '2025-01-24 18:33:41', NULL),
('90d1388a-2fe5-0d7d-100c-57bb59112fb3', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dari kelompok minoritas dan terisolasi', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('90f783ce-4070-8aa8-701b-25c10b9b6fb1', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang dieksploitasi secara seksual', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('915f53f3-3e75-4651-896b-b99a41c3afbf', 'ce9e55eb-eee7-4cf5-8b32-c27253ba4213', 'Wali Pengampu/Pendamping', NULL, 'b5ec59dc-4b12-47d3-ad71-c909fd7f96f5', 3, '2025-01-26 17:17:57', '2025-01-26 17:17:57', NULL),
('928718ec-6054-4bb7-8b84-7b1feda36b28', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Korban', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 4, '2025-01-22 23:51:27', '2025-01-22 23:51:33', '2025-01-22 23:51:33'),
('95be8e45-0158-a37b-a47b-4aabb7011377', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang berhadapan dengan hukum', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('999c6d0f-821e-48c7-2485-1bdc0c3d6da6', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang menjadi korban pornogra', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('9fbf8270-808f-4899-9030-cd8e821f5663', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Pencurian', '', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('a03fa345-ecce-4709-9592-0890eccef005', 'b1895989-f137-4421-83bc-59206516da7f', 'Ragam Disabilitas Mental', 'ragam_disabilitas_mental', '37aa74ff-0bbf-4be8-ab7c-7544dc8bcd7f', 11, '2025-01-24 18:33:48', '2025-01-24 18:33:48', NULL),
('a05abcf9-a6a0-4c1d-973f-f2fe3d632ace', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Orang dalam kondisi kritis yang membutuhkan akses ke layanan kesehatan', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 11, '2025-01-24 18:05:24', '2025-01-24 18:05:24', NULL),
('a1efe3df-9f62-41cf-af82-664bd444d65d', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Rungu, Wicara & Fisik', NULL, '252cef00-bd8e-40b8-9f9d-c03e567fb23f', 6, '2025-01-24 18:36:09', '2025-01-24 18:36:09', NULL),
('a2e2db57-bd0c-4de2-8fb4-dd24c04b55be', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Kelompok Minoritas', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 5, '2025-01-24 18:04:53', '2025-01-24 18:04:53', NULL),
('a3d7eeef-64e7-4325-9454-6b8b553a755f', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Korban tindak kekerasan', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 8, '2025-01-24 18:05:12', '2025-01-24 18:05:12', NULL),
('a46a35ed-441c-1350-2476-dd1577fb8d66', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dengan kasus perundungan (anak korban perundungan, anak pelaku perundungan, dan anak saksi peru', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('a9c1a2fc-dc31-4206-a875-c40a54dbbdac', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Pelecehan/Pencabulan', '', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('aa0037a1-886e-45df-b63a-9e30c48a858a', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Netra', NULL, 'b3249f25-3495-4f77-9689-9c79a9cff945', 1, '2025-01-24 18:35:12', '2025-01-24 18:35:12', NULL),
('abab52c9-daa9-445a-b7df-a49c84925134', 'b1895989-f137-4421-83bc-59206516da7f', 'Yang lain:', NULL, '252cef00-bd8e-40b8-9f9d-c03e567fb23f', 8, '2025-01-24 18:36:18', '2025-01-24 18:36:18', NULL),
('ac538596-d6db-4831-b992-e2a7f3315fbe', 'b1895989-f137-4421-83bc-59206516da7f', 'Ragam Disabilitas Fisik', 'ragam_disabilitas_fisik', '377f7714-38ce-48a9-baff-fe9576e36458', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ae4d6a4c-9e14-4003-a7e7-81cb1ae2cf0b', 'b0dfec43-ccc7-4ef6-99ff-391fc2a1c494', 'PPKS', NULL, '5516efcf-1571-40bc-9f9e-f39c3148ee81', 1, '2025-01-26 17:18:40', '2025-01-26 17:18:40', NULL),
('ae69c3df-365f-435b-9586-5caeb077a07b', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'asda', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 5, '2025-01-23 00:06:47', '2025-01-23 00:06:50', '2025-01-23 00:06:50'),
('b0f6cf7d-cca9-4c4d-9d2c-d0132eb0b9ac', 'b1895989-f137-4421-83bc-59206516da7f', 'Anxietas', NULL, 'a03fa345-ecce-4709-9592-0890eccef005', 4, '2025-01-24 18:34:52', '2025-01-24 18:34:52', NULL),
('b22a315a-be98-4789-b758-f4b3961be18d', 'ce9e55eb-eee7-4cf5-8b32-c27253ba4213', 'Orang Tua', NULL, 'b5ec59dc-4b12-47d3-ad71-c909fd7f96f5', 2, '2025-01-26 17:17:54', '2025-01-26 17:17:54', NULL),
('b3249f25-3495-4f77-9689-9c79a9cff945', 'b1895989-f137-4421-83bc-59206516da7f', 'Ragam Disabilitas Sensorik', 'ragam_disabilitas_sensorik', '448375a4-29cb-4ea9-a1d9-208611082989', 12, '2025-01-24 18:33:54', '2025-01-24 18:33:54', NULL),
('b5ec59dc-4b12-47d3-ad71-c909fd7f96f5', 'ce9e55eb-eee7-4cf5-8b32-c27253ba4213', 'Penerima ATENSI', 'penerima_atensi', NULL, 11, '2025-01-26 17:17:41', '2025-01-26 17:17:41', NULL),
('b6f0127d-57ed-4814-ad11-94bf98a99f22', 'b1895989-f137-4421-83bc-59206516da7f', 'Autis', NULL, 'a03fa345-ecce-4709-9592-0890eccef005', 6, '2025-01-24 18:34:59', '2025-01-24 18:34:59', NULL),
('b75d84a4-3423-4eba-8df0-d4a9f270a6af', 'b0dfec43-ccc7-4ef6-99ff-391fc2a1c494', 'Yang lain:', NULL, '5516efcf-1571-40bc-9f9e-f39c3148ee81', 4, '2025-01-26 17:18:48', '2025-01-26 17:18:48', NULL),
('bd688d53-bee6-472c-b955-7fe0f8afb703', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Pemulung', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 4, '2025-01-24 18:04:49', '2025-01-24 18:04:49', NULL),
('bdb5fc88-e430-47f1-9ba4-cea2cac40244', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Ragam ABH', 'ragam_abh', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('be9a2343-0021-43a7-9c54-46cd1d3832c1', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Hasil Putusan Pengadilan', '', '5332d470-4c5d-4df2-98d5-45b60805c978', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('c06be19e-bc3d-4835-8c8d-c2aba213952c', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Multi/Ganda', NULL, '13157c96-d3f6-429f-864e-7edcab14b468', 5, '2025-01-24 18:23:36', '2025-01-24 18:23:36', NULL),
('c69af842-2173-2229-90d3-3012747ea0ac', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Yatim, Piatu, Yatim Piatu (YAPI)', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('cbdddf3f-f8c6-46c7-949f-4460adc6dfe9', '6f041a34-b60d-4297-a4c7-41575efcf3e7', 'PPKS', NULL, '4d64e789-ebcb-49d6-bf05-011731b1d827', 1, '2025-01-26 17:17:07', '2025-01-26 17:17:07', NULL),
('cd824197-494b-4e9f-accf-e08c98717c80', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Gelandangan', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 2, '2025-01-24 18:04:43', '2025-01-24 18:04:43', NULL),
('cfa0d589-5395-4fdd-b8f6-ed9532fdfd45', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'asda', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 4, '2025-01-22 23:38:52', '2025-01-22 23:39:07', '2025-01-22 23:39:07'),
('d28c6b26-0de2-45a5-929c-938a35d2234a', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Pekerja Migran Indonesia Bermasalah (PMIB)', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 9, '2025-01-24 18:05:16', '2025-01-24 18:05:16', NULL),
('d60d7c1c-545a-4cec-8d31-a59d6b2086cc', 'b1895989-f137-4421-83bc-59206516da7f', 'Paraplegi, Cerebral Palsy', NULL, 'ac538596-d6db-4831-b992-e2a7f3315fbe', 2, '2025-01-24 18:23:50', '2025-01-24 18:23:50', NULL),
('d62b1a10-86be-77d7-5bba-1c179ab20716', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Yang Menjadi Korban stigmatisasi dari pelabelan terkait dengan kondisi orangtuanya', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('d7c8f643-5ec6-42fb-a3ea-8c5c787ad1b5', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Korban', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('d87128fc-6a4b-4233-a4a0-472c59095c19', '1dd96457-c226-4f42-a25b-693c9139823c', 'Ragam Anak (AMPK)', 'ragam_anak', NULL, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('dc744d90-42a5-47dc-8f57-282675396dde', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Rujukan Dinas Sosial/Masyarakat', '', '5332d470-4c5d-4df2-98d5-45b60805c978', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('dc8ce479-8a9a-449d-826d-4389f74151f2', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Pengemis', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 3, '2025-01-24 18:04:46', '2025-01-24 18:04:46', NULL),
('de9f2d08-04b4-4cb8-aab4-9cf259afc322', '6f041a34-b60d-4297-a4c7-41575efcf3e7', 'Yang lain:', NULL, '4d64e789-ebcb-49d6-bf05-011731b1d827', 4, '2025-01-26 17:17:15', '2025-01-26 17:17:15', NULL),
('deaf1500-a06a-451b-af3e-20117dca7c07', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Rungu & Wicara', NULL, 'b3249f25-3495-4f77-9689-9c79a9cff945', 4, '2025-01-24 18:35:28', '2025-01-24 18:35:28', NULL),
('e13f6055-45d9-9e98-85f5-d334093a747f', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Penelantaran', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('e19d792d-6f59-484e-b035-e28ba5922f1d', 'b0dfec43-ccc7-4ef6-99ff-391fc2a1c494', 'Wali Pengampu/Pendamping', NULL, '5516efcf-1571-40bc-9f9e-f39c3148ee81', 3, '2025-01-26 17:18:45', '2025-01-26 17:18:45', NULL),
('e34af134-cceb-4500-87bf-87d4ea98d6e8', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Tambah daa', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 4, '2025-01-22 23:59:10', '2025-01-23 00:06:57', '2025-01-23 00:06:57'),
('e4b07705-7562-4fa5-b77f-3338802a9645', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Persetubuhan', '', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ea22e5d0-256f-40c7-9644-d7ec4b0f2d17', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Kekerasan Psikis', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ebc5f1dd-4e2b-4fe2-97be-477291a311dd', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Informasi Kasus', 'informasi_kasus', NULL, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ed88b932-99ff-4ae6-92d3-74de28a790df', 'b1895989-f137-4421-83bc-59206516da7f', 'Down Syndrome', NULL, '90826db6-4e07-4cc2-9626-a3b4d57de472', 3, '2025-01-24 18:34:31', '2025-01-24 18:34:31', NULL),
('f1b0a013-0496-45b6-81a7-74ffdea2586d', 'b1895989-f137-4421-83bc-59206516da7f', 'Akibat Stroke', NULL, 'ac538596-d6db-4831-b992-e2a7f3315fbe', 3, '2025-01-24 18:23:55', '2025-01-24 18:23:55', NULL),
('f4618157-927a-4264-8c60-369af6bc1b19', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Tuna Susila', '', 'ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', 1, '2025-01-24 18:04:39', '2025-01-24 18:04:39', NULL),
('f6d77f80-a4e6-45c4-98cc-86c7dab890dd', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Saksi', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('f8ce7f6c-e831-4aec-8563-028184567416', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Trafficking', '', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('fa462593-a806-441f-8b43-27ac5044fa84', 'b1895989-f137-4421-83bc-59206516da7f', 'Akibat Kusta', NULL, 'ac538596-d6db-4831-b992-e2a7f3315fbe', 4, '2025-01-24 18:23:58', '2025-01-24 18:23:58', NULL),
('fe570363-ffc1-4ece-b573-e9d2e3311e6e', 'b1895989-f137-4421-83bc-59206516da7f', 'Disabilitas Netra, Rungu, & Wicara', NULL, 'b3249f25-3495-4f77-9689-9c79a9cff945', 5, '2025-01-24 18:35:33', '2025-01-24 18:35:33', NULL),
('ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Ragam Kelompok Rentan', 'ragam_kelompok_rentan', NULL, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_kategori_ppks_sub_old`
--

CREATE TABLE `laksa_ms_kategori_ppks_sub_old` (
  `id` varchar(36) NOT NULL,
  `kategori_id` varchar(36) DEFAULT NULL,
  `sub_kategori_ppks` varchar(100) DEFAULT NULL,
  `variable_form` varchar(100) DEFAULT NULL,
  `parent_id` varchar(36) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_kategori_ppks_sub_old`
--

INSERT INTO `laksa_ms_kategori_ppks_sub_old` (`id`, `kategori_id`, `sub_kategori_ppks`, `variable_form`, `parent_id`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('00280bc9-2f1a-452b-2d61-2a9b89e27fd7', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang dieksploitasi secara ekonomi', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('00505551-5658-82b1-855e-306902da3178', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dalam kondisi kritis yang membutuhkan akses ke layanan kesehatan', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('044ff0e9-439e-124e-8ef8-202485b34bd5', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Kejahatan Seksual', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('13157c96-d3f6-429f-864e-7edcab14b468', 'b1895989-f137-4421-83bc-59206516da7f', 'Ragam Penyandang Disabilitas', '', NULL, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('13462ab7-5874-4fad-b131-e07e75c4ff72', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'asd', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 5, '2025-01-23 06:38:57', '2025-01-23 06:39:03', '2025-01-23 06:39:03'),
('1a482f35-6bf4-18da-0a2d-fe5ba1dc757b', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Perdagangan', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('25fe3af7-841a-7dbd-833e-43cd00e773f7', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Kekerasan Fisik', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('2867514a-9631-4f5e-66ac-2c39720f3f1d', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Jaringan Terorisme', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('2bc64477-9b2b-263a-88b7-e456d8d3707b', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Perlakuan Salah', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('2cbb13f2-016e-4cbc-4aca-c04c681d2e7f', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Penjualan', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('3c11bd19-0685-47c3-837c-f0e631f05fce', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Yang lain:', '', '5332d470-4c5d-4df2-98d5-45b60805c978', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('3c77ed14-604b-7313-5afe-914a4274632c', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Penyandang Disabilitas', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('3f519a01-5eee-7e7a-a64f-ab6095bca4e8', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Yang Menjadi Korban penyalahgunaan narkotika, alkohol,psikotoprika,dan zat adiktif lainnya', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('44e0d44d-c96e-4afa-9caf-0395c12d0c7a', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Diversi', '', '5332d470-4c5d-4df2-98d5-45b60805c978', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('4aebdf03-5293-4724-a3d8-f9f2fca857d9', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'No. Putusan Pengadilan', '', NULL, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('4eb28eab-7561-5e7e-42a5-c3ac2bfc114d', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Penculikan', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('5332d470-4c5d-4df2-98d5-45b60805c978', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Jenis Rujukan', '', NULL, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('62ca4c60-5969-0123-66cc-4f71220460ae', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dalam situasi darurat', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('8caad3d7-f8b7-4c01-8c95-4f2f973a4539', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Pelaku', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('8e381881-7053-7ac7-7234-9aaeb0767883', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dengan perilaku sosial menyimpang', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('8ec2abaf-6011-3f17-910b-01e8b13a0dfa', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dengan HIV/AIDS', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('90d1388a-2fe5-0d7d-100c-57bb59112fb3', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dari kelompok minoritas dan terisolasi', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('90f783ce-4070-8aa8-701b-25c10b9b6fb1', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang dieksploitasi secara seksual', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('928718ec-6054-4bb7-8b84-7b1feda36b28', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Korban', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 4, '2025-01-23 06:51:27', '2025-01-23 06:51:33', '2025-01-23 06:51:33'),
('95be8e45-0158-a37b-a47b-4aabb7011377', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang berhadapan dengan hukum', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('999c6d0f-821e-48c7-2485-1bdc0c3d6da6', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang menjadi korban pornogra', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('9fbf8270-808f-4899-9030-cd8e821f5663', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Pencurian', '', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('a46a35ed-441c-1350-2476-dd1577fb8d66', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dengan kasus perundungan (anak korban perundungan, anak pelaku perundungan, dan anak saksi peru', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('a9c1a2fc-dc31-4206-a875-c40a54dbbdac', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Pelecehan/Pencabulan', '', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ac538596-d6db-4831-b992-e2a7f3315fbe', 'b1895989-f137-4421-83bc-59206516da7f', 'Ragam Disabilitas Fisik', '', NULL, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ae69c3df-365f-435b-9586-5caeb077a07b', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'asda', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 5, '2025-01-23 07:06:47', '2025-01-23 07:06:50', '2025-01-23 07:06:50'),
('bdb5fc88-e430-47f1-9ba4-cea2cac40244', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Ragam ABH', '', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('be9a2343-0021-43a7-9c54-46cd1d3832c1', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Hasil Putusan Pengadilan', '', '5332d470-4c5d-4df2-98d5-45b60805c978', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('bfa75352-310b-4ed7-aeb9-23a28c656143', '1dd96457-c226-4f42-a25b-693c9139823c', 'x', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('c69af842-2173-2229-90d3-3012747ea0ac', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Yatim, Piatu, Yatim Piatu (YAPI)', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('cfa0d589-5395-4fdd-b8f6-ed9532fdfd45', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'asda', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 4, '2025-01-23 06:38:52', '2025-01-23 06:39:07', '2025-01-23 06:39:07'),
('d62b1a10-86be-77d7-5bba-1c179ab20716', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Yang Menjadi Korban stigmatisasi dari pelabelan terkait dengan kondisi orangtuanya', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('d7c8f643-5ec6-42fb-a3ea-8c5c787ad1b5', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Korban', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('d87128fc-6a4b-4233-a4a0-472c59095c19', '1dd96457-c226-4f42-a25b-693c9139823c', 'Ragam Anak (AMPK)', '', NULL, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('dc744d90-42a5-47dc-8f57-282675396dde', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Rujukan Dinas Sosial/Masyarakat', '', '5332d470-4c5d-4df2-98d5-45b60805c978', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('e13f6055-45d9-9e98-85f5-d334093a747f', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Penelantaran', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('e34af134-cceb-4500-87bf-87d4ea98d6e8', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Tambah daa', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 4, '2025-01-23 06:59:10', '2025-01-23 07:06:57', '2025-01-23 07:06:57'),
('e4b07705-7562-4fa5-b77f-3338802a9645', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Persetubuhan', '', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ea22e5d0-256f-40c7-9644-d7ec4b0f2d17', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Kekerasan Psikis', '', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ebc5f1dd-4e2b-4fe2-97be-477291a311dd', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Informasi Kasus', '', NULL, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('f6d77f80-a4e6-45c4-98cc-86c7dab890dd', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Saksi', '', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('f8ce7f6c-e831-4aec-8563-028184567416', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Trafficking', '', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Ragam Kelompok Rentan', '', NULL, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_kecamatan`
--

CREATE TABLE `laksa_ms_kecamatan` (
  `id` varchar(36) NOT NULL,
  `kabupaten_kota_id` varchar(36) DEFAULT NULL,
  `kemendagri_id` varchar(36) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_kecamatan`
--

INSERT INTO `laksa_ms_kecamatan` (`id`, `kabupaten_kota_id`, `kemendagri_id`, `kecamatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
('016d05df-06b4-3c39-4916-2543ef774113', '3ff28fba-6b12-a4f1-680d-5f17fe422b53', '14.72.07', 'Dumai Selatan', NULL, NULL, NULL),
('02f18a3c-5e1a-8081-934f-b7e926f69f4b', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.12', 'Kabun', NULL, NULL, NULL),
('030679a2-7053-7859-3cab-93c44e9e2863', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.03', 'Minas', NULL, NULL, NULL),
('037ef12f-83af-2732-5062-5bf63b177f18', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.10', 'Logas Tanah Darat', NULL, NULL, NULL),
('0477dfc3-4b6f-3102-3727-9f01c9629d1a', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.06', 'Gaung Anak Serka', NULL, NULL, NULL),
('0491f23e-5a50-2471-1aa7-19819ab894e0', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.09', 'Teluk Meranti', NULL, NULL, NULL),
('05153c7c-a50f-0f35-0a72-7f3a6b1245da', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.04', 'Pangkalan Lesung', NULL, NULL, NULL),
('083f0e2a-87f1-114c-88ce-3ba9f5367c6f', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.16', 'Pendalian IV Koto', NULL, NULL, NULL),
('08c15957-66a4-2a44-1e5a-993ffb691d44', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.18', 'Balai Jaya', NULL, NULL, NULL),
('08ea4954-3895-50d1-673e-7e10be1b4e12', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.05', 'Sungai Mandau', NULL, NULL, NULL),
('0c7ddc77-1a92-5506-355b-d1859ee04c17', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.08', 'Bunga Raya', NULL, NULL, NULL),
('0c88a329-28c6-6a91-28d6-7b6a58a02801', 'dcd6779e-3433-7752-86d1-ddeafa391495', '14.10.09', 'Rangsang Pesisir', NULL, NULL, NULL),
('0ce5768a-060b-5b45-44a2-4ca5485f8652', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.05', 'Senapelan', NULL, NULL, NULL),
('1000693b-98d1-3868-45eb-93cd286f5da9', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.11', 'Sungai Lala', NULL, NULL, NULL),
('108f772a-7e6d-4530-0f9a-9e5a84a707d1', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.07', 'Mandah', NULL, NULL, NULL),
('13120c76-416c-6d39-6b0c-b7e30b5e3152', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.14', 'Pekaitan', NULL, NULL, NULL),
('13e2205d-084c-3e29-69e0-df63a30265c3', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.19', 'Kampar Kiri Tengah', NULL, NULL, NULL),
('156086d7-6497-3992-1300-405daa122923', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.15', 'Bangkinang', NULL, NULL, NULL),
('1574a648-89df-9c8a-a10f-5c6b5d9b3548', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.01', 'Rengat', NULL, NULL, NULL),
('161f4e14-0f72-9388-2bcd-25bee5705ab2', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.02', 'Bangko', NULL, NULL, NULL),
('174a8e20-9a2a-1bf3-5383-8df8892a68d1', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.09', 'Lirik', NULL, NULL, NULL),
('179d02af-82bb-14e6-92a1-188632eb6f6b', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.06', 'Dayun', NULL, NULL, NULL),
('19ecd6b4-2c8c-8e46-72ef-cfed166b81b6', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.04', 'Tambusai', NULL, NULL, NULL),
('1c9243fd-a340-213e-9b6d-537d765c6744', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.13', 'Mempura', NULL, NULL, NULL),
('1e3cf99d-8d9c-7d01-8d88-3720be94140c', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.02', 'Rokan IV Koto', NULL, NULL, NULL),
('20770cda-1c01-0ca5-1b22-c398eba97a7b', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.16', 'Tanjung Medan', NULL, NULL, NULL),
('211a463e-5906-85c1-8ee2-3337b5bb557c', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.10', 'Kuala Kampar', NULL, NULL, NULL),
('23711022-5d02-018c-02dd-5caaf4d94c41', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.02', 'Enok', NULL, NULL, NULL),
('23ce82e0-6a72-2c70-0fa2-98ccf06e874f', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.21', 'Koto Kampar Hulu', NULL, NULL, NULL),
('2675bdb3-793a-04aa-4451-57a119b27c2a', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.10', 'Tanah Merah', NULL, NULL, NULL),
('2950a8b8-615d-0f38-8afc-9106faaa6ae8', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.08', 'Batang Gangsal', NULL, NULL, NULL),
('2b43d48f-09d0-39ea-0f40-3a2501ca0cfa', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.10', 'Kuala Cenaku', NULL, NULL, NULL),
('2d970043-1846-5c78-1a6c-59dd10c32b36', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.11', 'Rupat Utara', NULL, NULL, NULL),
('2e5834b7-3fb2-0683-2c91-42a0bd713312', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.17', 'Kampa', NULL, NULL, NULL),
('30238960-67a0-8e26-74dc-6347d73b0617', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.12', 'Hulu Kuantan', NULL, NULL, NULL),
('306f8c23-2be2-5fa7-1c0f-ba51e66e9ac5', 'dcd6779e-3433-7752-86d1-ddeafa391495', '14.10.01', 'Tebing Tinggi', NULL, NULL, NULL),
('30e7e6a3-3c8a-6868-7dcc-228002304363', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.02', 'Sungai Apit', NULL, NULL, NULL),
('31b5dc89-0a8e-1f12-6956-f20d34bc1129', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.03', 'Tanah Putih', NULL, NULL, NULL),
('34a19409-69b0-2533-20e1-1088574d7460', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.20', 'Gunung Sahilan', NULL, NULL, NULL),
('37d7272e-0d40-363e-1a55-d9f63ac91df0', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.10', 'Bangko Pusako', NULL, NULL, NULL),
('3acd568d-3198-8168-2781-f42e314b8c41', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.04', 'XIII Koto Kampar', NULL, NULL, NULL),
('3bedb730-0ea5-120f-5975-5b65991938dd', '3ff28fba-6b12-a4f1-680d-5f17fe422b53', '14.72.05', 'Medang Kampai', NULL, NULL, NULL),
('3c9531dc-7193-917d-9e6e-3c4a2c792eb9', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.12', 'Siak Kecil', NULL, NULL, NULL),
('3d22b93f-355d-1e96-529f-b27e6fba793d', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.20', 'Sungai Batang', NULL, NULL, NULL),
('3eb3fe43-9e80-3728-395c-027f4ad917e1', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.10', 'Tenayan Raya', NULL, NULL, NULL),
('407f3da6-0094-7377-47a1-8cacfe4c51fa', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.01', 'Bengkalis', NULL, NULL, NULL),
('40ba65b4-340e-a53a-5453-0bc45fdb8cea', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.13', 'Pinggir', NULL, NULL, NULL),
('4151350c-626a-6f82-440f-5eaeab834b14', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.08', 'Bunut', NULL, NULL, NULL),
('430c014d-517b-56b1-7976-099f48702e26', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.04', 'Rimba Melintang', NULL, NULL, NULL),
('43219355-8f09-205a-0819-14e3bf8485aa', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.07', 'Kampar Kiri', NULL, NULL, NULL),
('44b1bac1-171a-1dbf-7d0f-9098c50d7692', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.13', 'Rakit Kulim', NULL, NULL, NULL),
('45c75fa2-0921-6385-8ac2-28d5ad8c01a8', 'dcd6779e-3433-7752-86d1-ddeafa391495', '14.10.06', 'Pulau Merbau', NULL, NULL, NULL),
('46d2d88d-8158-a41e-a0af-948a95de3bbd', 'dcd6779e-3433-7752-86d1-ddeafa391495', '14.10.05', 'Merbau', NULL, NULL, NULL),
('473c71bc-457a-3d86-1fd8-6ea2e6863dfa', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.09', 'Mandau', NULL, NULL, NULL),
('4bf69f10-6964-931b-8b5b-646173ec7622', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.18', 'Kampar Utara', NULL, NULL, NULL),
('4dfbff04-3408-6e00-3769-b59dc0c00bef', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.01', 'Reteh', NULL, NULL, NULL),
('504de46d-2ec5-2fae-5b26-e187331b9d5e', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.06', 'Rumbai Barat', NULL, NULL, NULL),
('50e80f05-2cc0-54f8-8f41-fbe0615b9b76', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.08', 'Rambah Hilir', NULL, NULL, NULL),
('52767b32-5b54-4852-a098-8d478558a6ae', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.12', 'Tapung Hulu', NULL, NULL, NULL),
('5280a4c2-6d6b-56d0-2005-d6a5066857b9', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.10', 'Bangun Purba', NULL, NULL, NULL),
('528654da-8f62-0892-83d2-cde17105328c', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.14', 'Pagaran Tapah Darussalam', NULL, NULL, NULL),
('53714cf3-9a46-5027-8d8f-6f6d41824213', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.12', 'Sabak Auh', NULL, NULL, NULL),
('54e91419-82ce-40aa-572b-2fcc1a8092e9', 'dcd6779e-3433-7752-86d1-ddeafa391495', '14.10.02', 'Rangsang Barat', NULL, NULL, NULL),
('578d4328-11ef-2cc7-7de0-7b977ea25bf8', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.02', 'Pangkalan Kerinci', NULL, NULL, NULL),
('5882b89c-a67e-6a97-114c-473570843546', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.14', 'Rumbio Jaya', NULL, NULL, NULL),
('5a45068c-7d19-624f-40db-0ee8d8537f96', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.15', 'Pelangiran', NULL, NULL, NULL),
('5a4904c8-948a-4295-0db6-c5ed17b219aa', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.09', 'Marpoyan Damai', NULL, NULL, NULL),
('5a8e6f9b-55d0-3f24-a4f6-13241dec1024', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.01', 'Siak', NULL, NULL, NULL),
('5c9f65a8-4ab8-9d20-6487-6ccf5a507c90', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.07', 'Kerinci Kanan', NULL, NULL, NULL),
('60d5d604-6d61-a315-4765-f17e09619329', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.07', 'Bukit Raya', NULL, NULL, NULL),
('6223529d-4697-44c1-408c-c52b34404c7b', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.03', 'Kuala Indragiri', NULL, NULL, NULL),
('62b5e22c-a1b4-541d-a7c2-920a057e3b4a', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.11', 'Batang Tuaka', NULL, NULL, NULL),
('6655a0e2-7506-54fd-2791-3b770bb7586c', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.03', 'Tambang', NULL, NULL, NULL),
('6679d7ba-4878-6874-72b4-4fb9b62fa123', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.11', 'Tapung Hilir', NULL, NULL, NULL),
('673643ce-7a16-a5d2-0363-0244c799266c', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.06', 'Pasir Limau Kapas', NULL, NULL, NULL),
('67d33c4c-a50a-2ab3-9208-45042474178d', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.05', 'Peranap', NULL, NULL, NULL),
('69ad19cb-2b6b-9ae7-4398-169b9b5104f1', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.14', 'Kemuning', NULL, NULL, NULL),
('6d60fe81-a26f-6315-45af-826d705d946a', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.13', 'Kuantan Hilir Seberang', NULL, NULL, NULL),
('6dfa6465-061f-854f-7179-7cbf125267c4', '3ff28fba-6b12-a4f1-680d-5f17fe422b53', '14.72.02', 'Dumai Timur', NULL, NULL, NULL),
('6f657292-3cd3-23e4-91ef-fb0723aa9f54', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.04', 'Lima Puluh', NULL, NULL, NULL),
('71081505-8c30-a427-9e6a-0da85de59eb8', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.05', 'Bagan Sinembah', NULL, NULL, NULL),
('710fa39e-0da7-33d1-4f68-6a7f52b57d86', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.12', 'Rumbai', NULL, NULL, NULL),
('71787643-8c52-87f2-109b-dcd8686e927b', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.03', 'Singingi', NULL, NULL, NULL),
('72ae024d-58e3-68ae-2e33-5815dc3a7a8c', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.07', 'Batang Cenaku', NULL, NULL, NULL),
('76987c91-03ea-1b46-4158-09deda3e2ea5', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.03', 'Bukit Batu', NULL, NULL, NULL),
('7ba235c3-0d38-3966-7e73-baa972691c5b', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.01', 'Bangkinang Kota', NULL, NULL, NULL),
('7c1f2bea-4f3d-9f0b-18ab-8175e47e828f', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.16', 'Perhentian Raja', NULL, NULL, NULL),
('7ea882fe-466a-4c8e-264b-6b4b184a082e', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.01', 'Sukajadi', NULL, NULL, NULL),
('7fda265c-5ce3-6e6b-638f-6dbce5730068', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.09', 'Tambusai Utara', NULL, NULL, NULL),
('80bc70ed-0c85-56a7-5429-942131565d50', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.11', 'Simpang Kanan', NULL, NULL, NULL),
('80e2d346-6dc5-36cd-09f0-75ab6a006f21', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.06', 'Siak Hulu', NULL, NULL, NULL),
('81d79422-318c-5751-0d33-e3e8611f9172', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.09', 'Kampar Kiri Hulu', NULL, NULL, NULL),
('82039f5f-72f5-09fb-0776-8cba636269a8', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.10', 'Tapung', NULL, NULL, NULL),
('840e0fec-9999-04de-77c5-83d6c4ca267c', 'dcd6779e-3433-7752-86d1-ddeafa391495', '14.10.03', 'Rangsang', NULL, NULL, NULL),
('875b177c-12dd-6d98-9a76-7d5e216c6c35', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.01', 'Ujung Batu', NULL, NULL, NULL),
('8a1bf7c7-02db-46d0-9f67-d16319594fd9', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.15', 'Kubu Babussalam', NULL, NULL, NULL),
('8a8ecc2c-4a56-801c-8219-f9edb0711c68', '3ff28fba-6b12-a4f1-680d-5f17fe422b53', '14.72.06', 'Dumai Kota', NULL, NULL, NULL),
('8b390060-813b-7b74-594a-eed1a17c9083', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.16', 'Bathin Solapan', NULL, NULL, NULL),
('8c1c1289-21ad-020d-755d-924666f592fa', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.12', 'Lubuk Batu Jaya', NULL, NULL, NULL),
('8e5c489b-92a4-18ab-2408-a85cc3f146fb', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.08', 'Singingi Hilir', NULL, NULL, NULL),
('8ecbb3bc-2594-7c3b-614b-b5c276cc5552', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.14', 'Sentajo Raya', NULL, NULL, NULL),
('91ce0271-9e1f-a35f-9bdb-f6c6b8554dcd', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.01', 'Kubu', NULL, NULL, NULL),
('93e3aa88-90b0-5cb0-8905-334d97d116ae', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.13', 'Tuah Madani', NULL, NULL, NULL),
('94ac9f4e-a2ee-8c2c-a0a1-f539b9c453d3', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.11', 'Lubuk Dalam', NULL, NULL, NULL),
('95a329b7-81e4-6fc3-99f9-dbe7a33773f0', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.15', 'Kepenuhan Hulu', NULL, NULL, NULL),
('9bffe5ae-a010-a6c0-2831-601115638152', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.01', 'Kuantan Mudik', NULL, NULL, NULL),
('9d279036-4538-5183-37e0-e765364ca5ae', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.03', 'Sail', NULL, NULL, NULL),
('9db54551-0682-2456-805b-5b73e1634e16', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.18', 'Concong', NULL, NULL, NULL),
('9e36e295-0587-1e00-4fda-7b5396f656fc', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.17', 'Bagan Sinembah Raya', NULL, NULL, NULL),
('9e4f1598-4bb7-37e9-910d-3ecea14d98f9', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.06', 'Seberida', NULL, NULL, NULL),
('a218abbe-2a9b-7240-12f9-e196838e318d', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.04', 'Tembilahan', NULL, NULL, NULL),
('a259fe4d-a4d4-86a4-6086-434f53934ca8', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.04', 'Pasir Penyu', NULL, NULL, NULL),
('a4b90edc-08f6-013e-7a05-1bdb02652400', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.15', 'Rumbai Timur', NULL, NULL, NULL),
('a534a852-7428-0360-81f5-5f5a13fb0701', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.05', 'Kuok', NULL, NULL, NULL),
('a582b748-3f26-5425-35fe-d84ec3160f8c', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.06', 'Benai', NULL, NULL, NULL),
('a9bbcd4b-892a-543c-0304-191aebf57cbc', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.05', 'Cerenti', NULL, NULL, NULL),
('ac47aa9e-8055-6e27-12d7-b290d9451ed6', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.07', 'Rambah Samo', NULL, NULL, NULL),
('acac100f-11e7-80e7-69c5-227f35576ac3', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.04', 'Tualang', NULL, NULL, NULL),
('b070cf84-a3e2-12e8-0ea7-9399d8a12414', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.09', 'Pangean', NULL, NULL, NULL),
('b6051472-3d2a-1043-1907-9e5c990d8d3f', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.13', 'Tembilahan Hulu', NULL, NULL, NULL),
('b60c4611-72bf-74ea-060f-540f54ea5f8b', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.02', 'Rengat Barat', NULL, NULL, NULL),
('b7a5c970-76ae-0947-5f81-3c29e62c24dd', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.02', 'Pekanbaru Kota', NULL, NULL, NULL),
('b91f258f-981d-7ba4-3a4b-04abdf6b7bbb', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.12', 'Bandar Petalangan', NULL, NULL, NULL),
('b9e6934d-2bf1-9f74-8794-75e5cc452cfa', '3ff28fba-6b12-a4f1-680d-5f17fe422b53', '14.72.04', 'Sungai Sembilan', NULL, NULL, NULL),
('bbcf754e-52eb-3d3b-84bc-f40fbda90655', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.08', 'Kateman', NULL, NULL, NULL),
('bbe51e5f-0fde-6437-7c8e-0c5b4f261417', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.02', 'Bantan', NULL, NULL, NULL),
('bd692952-73da-6822-48cb-54cd6887524a', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.06', 'Pelalawan', NULL, NULL, NULL),
('bf377cd5-311b-7cd3-986e-f78e0d874179', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.11', 'Inuman', NULL, NULL, NULL),
('c1d89080-437c-5050-8286-9ed363e46030', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.10', 'Kandis', NULL, NULL, NULL),
('c30c7a2c-7a4b-045c-1c20-8860c1bba6fc', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.12', 'Gaung', NULL, NULL, NULL),
('c3d20a42-3455-0479-92ad-ab5f80cda601', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.05', 'Tempuling', NULL, NULL, NULL),
('c40097aa-6aeb-6bab-2525-1269ec1c4f4b', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.14', 'Kulim', NULL, NULL, NULL),
('c59ddf7c-6f42-85a5-9023-ec838a55419f', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.13', 'Bonai Darussalam', NULL, NULL, NULL),
('c62d5f52-5c88-a4c4-1ad5-d825709d6288', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.09', 'Koto Gasip', NULL, NULL, NULL),
('c78f89e3-2845-832b-8f8a-f36eaa9c8eab', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.07', 'Sinaboi', NULL, NULL, NULL),
('c880534b-9c24-5fd6-7aad-c7298cb84524', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.17', 'Pulau Burung', NULL, NULL, NULL),
('c88b0b45-0aec-000e-03f4-926f27d0359d', 'dcd6779e-3433-7752-86d1-ddeafa391495', '14.10.07', 'Tebing Tinggi Timur', NULL, NULL, NULL),
('c8ef9284-557d-8bf6-0f56-69cdcb943a6b', 'dcd6779e-3433-7752-86d1-ddeafa391495', '14.10.04', 'Tebing Tinggi Barat', NULL, NULL, NULL),
('ca4e7529-22e1-1473-368d-8b3edac06873', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.19', 'Kempas', NULL, NULL, NULL),
('cefdfdf5-0cd4-327f-174f-d973737f73b5', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.03', 'Rambah', NULL, NULL, NULL),
('cf014ce6-304c-0471-83d5-7b2265338613', '3ff28fba-6b12-a4f1-680d-5f17fe422b53', '14.72.01', 'Dumai Barat', NULL, NULL, NULL),
('d02ccc60-14c1-3a3f-795f-94b189886d2b', 'dcd6779e-3433-7752-86d1-ddeafa391495', '14.10.08', 'Tasik Putri Puyu', NULL, NULL, NULL),
('d0d02b43-809f-9605-4105-505ea38c6edc', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.08', 'Kampar Kiri Hilir', NULL, NULL, NULL),
('d3bfec28-4ba6-96d2-2c70-0c6dfe827863', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.08', 'Binawidya', NULL, NULL, NULL),
('d3f5d3db-490d-96d4-5bfa-48f61cc619ad', '5c4a63f1-2ae4-0630-482b-74a72cf071e9', '14.08.14', 'Pusako', NULL, NULL, NULL),
('d40b95ca-632e-25de-920a-117f80718b8f', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.07', 'Gunung Toar', NULL, NULL, NULL),
('d54ff9f9-77f8-71b4-1c34-4f067f59a5f7', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.13', 'Salo', NULL, NULL, NULL),
('d59a0c74-9790-545b-4124-0ca5fb2b3ad2', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.01', 'Ukui', NULL, NULL, NULL),
('d7c84796-6e05-656f-3deb-f58416ba63ec', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.15', 'Pucuk Rantau', NULL, NULL, NULL),
('d7d779cf-0de6-08b8-0e1d-7c41310c759f', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.03', 'Kelayang', NULL, NULL, NULL),
('d88261f9-7575-18bb-9a2b-efcf99a03f7b', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.09', 'Keritang', NULL, NULL, NULL),
('d9a58601-41d2-2431-2f85-b8f428e72202', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.08', 'Pujud', NULL, NULL, NULL),
('da067f5d-5d53-8e2f-0498-fd869e2989ac', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.13', 'Rantau Kopar', NULL, NULL, NULL),
('db09a308-9ca0-62fa-7ebc-b54fe3a77ee9', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.10', 'Rupat', NULL, NULL, NULL),
('db976b65-8e1a-27e3-5543-83afbf029cce', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '14.71.11', 'Payung Sekaki', NULL, NULL, NULL),
('defb2c32-a6ce-7fae-9326-754965d055c5', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.15', 'Talang Muandau', NULL, NULL, NULL),
('e09d829f-a6e8-1410-490e-dfff44c910ad', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.09', 'Tanah Putih Tanjung Melawan', NULL, NULL, NULL),
('e45a08d1-0547-5eef-920f-9176306e8f3b', '3ff28fba-6b12-a4f1-680d-5f17fe422b53', '14.72.03', 'Bukit Kapur', NULL, NULL, NULL),
('e574e02e-797d-5a6d-52c6-770bee0c93e5', '46cc22d6-7259-63db-a540-7bf0905784cc', '14.03.14', 'Bandar Laksamana', NULL, NULL, NULL),
('e9654cf2-80a5-8b9b-0d8a-f5087eee5599', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.04', 'Kuantan Hilir', NULL, NULL, NULL),
('eb493d53-1148-4f1d-748f-3e42ea593fbf', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.11', 'Tandun', NULL, NULL, NULL),
('ed10bdff-24ac-4526-2060-a15b88eb6480', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.05', 'Langgam', NULL, NULL, NULL),
('edc916ad-68ca-099e-5d1a-eae9facc9a8b', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.06', 'Kunto Darussalam', NULL, NULL, NULL),
('ee0d0e72-a2a1-22c4-6c8f-5d9e8fa3a207', '9605ae84-5977-7c09-4e48-609ccdb5a5ad', '14.07.12', 'Batu Hampar', NULL, NULL, NULL),
('f17d75a8-091b-771c-8e3b-401a13260307', '9bacc4bf-443e-8e47-373e-26a042069ecc', '14.02.14', 'Batang Peranap', NULL, NULL, NULL),
('f544ce61-0eec-a667-099b-cf50f8948db4', 'c8f855c5-5b12-2e0d-6ba3-df16f8a054b2', '14.06.05', 'Kepenuhan', NULL, NULL, NULL),
('f64aa420-12e9-0e2c-4199-ed6eb93d6cf5', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.11', 'Bandar Sei Kijang', NULL, NULL, NULL),
('f767d30b-7997-9096-345a-3e1468926e9c', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.07', 'Kerumutan', NULL, NULL, NULL),
('f9539a5a-5def-8c94-3dbb-5f8443ae4dc0', '7e97d60f-82d7-49f0-a359-4efb5fe3147f', '14.04.16', 'Teluk Belengkong', NULL, NULL, NULL),
('fd8f8b61-0770-4e31-260d-0772aa565645', '9e842512-2cc3-216f-1a52-c3672c293e20', '14.05.03', 'Pangkalan Kuras', NULL, NULL, NULL),
('ff5f790f-2b46-5825-64cb-60040f089a68', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '14.01.02', 'Kampar', NULL, NULL, NULL),
('ffc0b27e-0058-36f6-724c-7830eecf71ff', 'daf4dded-7c0f-8bb8-8940-115c42f27351', '14.09.02', 'Kuantan Tengah', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_komponen_intervensi`
--

CREATE TABLE `laksa_ms_komponen_intervensi` (
  `id` varchar(36) NOT NULL,
  `komponen` varchar(100) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_komponen_intervensi`
--

INSERT INTO `laksa_ms_komponen_intervensi` (`id`, `komponen`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('b99b69db-dcbb-11ef-beef-244bfebc0c45', 'Ibadah', 1, NULL, NULL, NULL),
('c576f9ea-dcbb-11ef-beef-244bfebc0c45', 'Piket Asrama', 2, NULL, NULL, NULL),
('cbacfe57-dcbb-11ef-beef-244bfebc0c45', 'Morning Meeting', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_pegawai`
--

CREATE TABLE `laksa_ms_pegawai` (
  `id` varchar(36) NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_pegawai`
--

INSERT INTO `laksa_ms_pegawai` (`id`, `nip`, `nama`, `jk`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', '1', 'ari', 'Laki-laki', NULL, NULL, NULL),
('2', '2', 'aisha', 'Perempuan', NULL, NULL, NULL),
('3', '3', 'alesha', 'Perempuan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_pendidikan`
--

CREATE TABLE `laksa_ms_pendidikan` (
  `id` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `pendidikan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `teks` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `level` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `laksa_ms_pendidikan`
--

INSERT INTO `laksa_ms_pendidikan` (`id`, `pendidikan`, `teks`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
('225436e4-0b16-4479-3db4-b8f6202b5db6', 'SLTA', 'SLTA', 7, NULL, NULL, NULL),
('56c193ce-5057-a6d6-a447-3c08a35d00cc', 'SLB', '', 5, NULL, NULL, NULL),
('6063251e-680a-2496-495a-e25c3b5a3cd0', 'PENDIDIKAN PROFESI', '', 14, NULL, NULL, NULL),
('68fd8878-8502-19bd-7121-2147f5e7776d', 'D - II', 'D - II', 9, NULL, NULL, NULL),
('7ff7a10d-265b-790c-9454-ca35b1cd0195', 'BELUM SEKOLAH', '-Belum Sekolah-', 2, NULL, NULL, NULL),
('86ef19a5-37ff-a513-57be-de60bae15bab', 'TK', 'TK', 3, NULL, NULL, NULL),
('8bec8433-099b-9aaf-50c6-951eff24531e', 'DOKTOR', 'S-3', 16, NULL, NULL, NULL),
('9204eac5-8209-18ba-6e75-f1ca9f1d1020', 'D - IV', 'D - IV', 12, NULL, NULL, NULL),
('ae71db46-2eb8-1085-8a49-3f0547641f01', '-Tidak Sekolah-', '', 1, NULL, NULL, NULL),
('aee9efe6-3f21-7b9c-81d4-b987d0936df3', 'SARJANA', 'S - 1', 11, NULL, NULL, NULL),
('be936978-20d6-571f-2a25-b037d1648a50', 'D - I', 'D - I', 8, NULL, NULL, NULL),
('c31d1245-26cd-6681-8455-3aa4dc2f95e7', 'SD', 'SD', 4, NULL, NULL, NULL),
('c4ffb948-20cb-9915-81f0-03e1659a90ae', 'AKTA IV', '', 13, NULL, NULL, NULL),
('f38bc278-3c38-6d7d-92fc-a63b39823f82', 'PASCA SARJANA', 'S - 2', 15, NULL, NULL, NULL),
('fca3a7f1-918f-16b2-64a0-7eb35ac84735', 'SARJANA MUDA / D-III', 'D - III', 10, NULL, NULL, NULL),
('fe610597-2931-751d-2077-3d70e2051157', 'SMP', 'SMP', 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_pengampu`
--

CREATE TABLE `laksa_ms_pengampu` (
  `id` varchar(36) NOT NULL,
  `nama_pengampu` varchar(100) DEFAULT NULL,
  `hubungan_dengan_ppks` varbinary(100) DEFAULT NULL,
  `tmp_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `agama_id` varchar(36) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nokk` varchar(16) DEFAULT NULL,
  `sudah_ada_dtks` enum('Belum','Sudah') DEFAULT NULL,
  `bantuan_saat_ini` varchar(255) DEFAULT NULL,
  `pendidikan_id` varchar(36) DEFAULT NULL,
  `status_kawin` enum('Belum Kawin','Kawin','Cerai Hidup','Cerai Mati') DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `pengeluaran_perbulan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_pengampu`
--

INSERT INTO `laksa_ms_pengampu` (`id`, `nama_pengampu`, `hubungan_dengan_ppks`, `tmp_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama_id`, `nik`, `nokk`, `sudah_ada_dtks`, `bantuan_saat_ini`, `pendidikan_id`, `status_kawin`, `pekerjaan`, `pengeluaran_perbulan`, `created_at`, `updated_at`, `deleted_at`) VALUES
('84f6aac5-2dbd-4fe4-bec0-71ef78879c03', 'koko', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('cbd58e02-dc3f-11ef-9f06-244bfebc0c45', 'lala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_persyaratan`
--

CREATE TABLE `laksa_ms_persyaratan` (
  `id` varchar(36) NOT NULL,
  `persyaratan` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_persyaratan`
--

INSERT INTO `laksa_ms_persyaratan` (`id`, `persyaratan`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('125a8923-0ef3-4590-89db-1227f60068a7', 'Persyaratan 345', 5, '2025-01-22 02:30:21', '2025-01-22 02:30:21', NULL),
('47a82cf3-460a-4308-8f30-df13773a8813', 'Persyaratan 34', 4, '2025-01-22 02:30:17', '2025-01-22 02:30:17', NULL),
('895c042a-1adf-4602-8d00-55c86aa0c1f2', 'Persyaratan 2', 2, '2025-01-22 02:29:08', '2025-01-22 02:29:08', NULL),
('8b9dc95d-ef60-4159-ae11-fe323879b1fd', 'sdasd', 6, '2025-01-23 07:09:49', '2025-01-23 07:09:59', '2025-01-23 07:09:59'),
('8eaf0942-6320-4927-a149-89e56aff9d92', 'persyaratan 2 edit 2', 3, '2025-01-22 01:46:14', '2025-01-22 02:27:35', '2025-01-22 02:27:35'),
('9a4af102-d964-4e5f-a2a6-1b602c25de61', 'Persyaratan 3 3', 3, '2025-01-22 02:30:00', '2025-01-22 02:30:29', NULL),
('d9b90edb-1c48-4615-a115-1e03b78629cc', 'satu edit ed', 1, '2025-01-16 01:13:46', '2025-01-23 07:09:56', NULL),
('ec26aaf4-a2e8-4208-8427-52375e6fead1', 'ABH', 2, '2025-01-17 01:18:24', '2025-01-22 02:28:59', '2025-01-22 02:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_petugas`
--

CREATE TABLE `laksa_ms_petugas` (
  `id` varchar(36) NOT NULL,
  `pegawai_id` varchar(36) DEFAULT NULL,
  `kabupaten_kota_id` varchar(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_petugas`
--

INSERT INTO `laksa_ms_petugas` (`id`, `pegawai_id`, `kabupaten_kota_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', '1', NULL, NULL, NULL, NULL),
('2', '2', NULL, NULL, NULL, NULL),
('3', '3', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_ppks`
--

CREATE TABLE `laksa_ms_ppks` (
  `id` varchar(36) NOT NULL,
  `nama_depan` varchar(100) DEFAULT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nokk` varchar(16) DEFAULT NULL,
  `tmp_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `provinsi_id` varchar(36) DEFAULT NULL,
  `kota_id` varchar(36) DEFAULT NULL,
  `kecamatan_id` varchar(36) DEFAULT NULL,
  `kelurahan_desa_id` varchar(36) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `domisili_alamat` char(1) DEFAULT NULL,
  `domisili` varchar(255) DEFAULT NULL,
  `agama_id` varchar(36) DEFAULT NULL,
  `pendidikan_id` varchar(36) DEFAULT NULL,
  `up_foto` varchar(100) DEFAULT NULL,
  `up_kk` varchar(100) DEFAULT NULL,
  `up_akte_lahir` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_ppks`
--

INSERT INTO `laksa_ms_ppks` (`id`, `nama_depan`, `nama_belakang`, `nik`, `nokk`, `tmp_lahir`, `tgl_lahir`, `provinsi_id`, `kota_id`, `kecamatan_id`, `kelurahan_desa_id`, `alamat`, `domisili_alamat`, `domisili`, `agama_id`, `pendidikan_id`, `up_foto`, `up_kk`, `up_akte_lahir`, `created_at`, `updated_at`, `deleted_at`) VALUES
('079bef48-704c-4526-9fa0-9669a2f4bc04', 'ariew', 'zal', '123123', '2312312', 'qweqweq', '2025-01-23', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '08ea4954-3895-50d1-673e-7e10be1b4e12', 'qweqwe', 'qwe', '1', 'qwe', '41875d16-08f2-24cc-a568-a17c69655427', '56c193ce-5057-a6d6-a447-3c08a35d00cc', NULL, NULL, NULL, '2025-01-23 08:29:44', '2025-01-23 15:06:21', '2025-01-23 15:06:21'),
('2f068203-d88f-11ef-8650-244bfebc0c45', 'Arizal', 'Nur Rohman', '1471031302900022', '1471031302900111', 'Wonogiri', '1990-02-13', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '93e3aa88-90b0-5cb0-8905-334d97d116ae', 'xxxx', 'jalan brotoseno perum widya perdana lestari blok A.10', NULL, NULL, 'c4091389-34eb-7f56-1b6d-b1934f0115c9', 'fca3a7f1-918f-16b2-64a0-7eb35ac84735', 'uploads/foto/5TaYmNUYLOFwfbyEbpuQ28yvmTvPNlBDCISl90VP.jpg', 'uploads/kk/uXnTBZLe2NpVuVR0t9v55QuRqHgUVyyRljw8BzEa.pdf', 'uploads/akte/7c1IF7ETbQG2lIhxwQynVLENq3t0FVMHr6dfVyLh.pdf', '2025-01-22 07:02:28', '2025-01-25 19:39:59', NULL),
('3ff3d400-7322-4f8f-9df0-e984f8950ea1', 'Tono', 'bin Tini', '123', '123', 'qweqweq', '2025-01-24', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', '9f7a51c4-9b97-03cd-7e8a-dcb574c33731', '1574a648-89df-9c8a-a10f-5c6b5d9b3548', 'asda', 'asd', '1', 'asd', '41875d16-08f2-24cc-a568-a17c69655427', 'c31d1245-26cd-6681-8455-3aa4dc2f95e7', 'uploads/foto/dR8eQkZ8wHPyB4Yk5VOEFtT4dhCMmDrr0kdPPfpr.png', 'uploads/kk/nBZyAHZBUmKRRqaTkcAQLDTqqqWeivwP9uezNq1h.jpg', 'uploads/akte/MSewrIHdrPuNZlUoH4FStBn8zqivdBkdJTu0TjmW.jpg', '2025-01-23 20:58:56', '2025-01-27 08:22:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_provinsi`
--

CREATE TABLE `laksa_ms_provinsi` (
  `id` varchar(36) NOT NULL,
  `kemendagri_id` varchar(36) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_provinsi`
--

INSERT INTO `laksa_ms_provinsi` (`id`, `kemendagri_id`, `provinsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
('75955ed2-4e91-8bfd-47f3-ad69be7212a6', '14', 'Provinsi Riau', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_status`
--

CREATE TABLE `laksa_ms_status` (
  `id` varchar(36) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `jenis_layanan` enum('residensial','non-residensial','','') NOT NULL,
  `sort` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_status`
--

INSERT INTO `laksa_ms_status` (`id`, `status`, `jenis_layanan`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1ba4b694-db8b-11ef-9f06-244bfebc0c45', 'Dokumen Serah Terima Selesai di Generate', 'residensial', 6, NULL, NULL, NULL),
('23ac51ea-db8b-11ef-9f06-244bfebc0c45', 'Menunggu Proses Assessment', 'residensial', 7, NULL, NULL, NULL),
('2ae4ad34-db8b-11ef-9f06-244bfebc0c45', 'Proses Assessment Selesai', 'residensial', 8, NULL, NULL, NULL),
('3cdad447-db8b-11ef-9f06-244bfebc0c45', 'Menunggu Proses Penentuan Layanan', 'residensial', 9, NULL, NULL, NULL),
('462ce22c-db8b-11ef-9f06-244bfebc0c45', 'Tahap Rehabilitasi', 'residensial', 10, NULL, NULL, NULL),
('56bd1150-db8b-11ef-9f06-244bfebc0c45', 'Evaluasi Laporan Perkembangan', 'residensial', 11, NULL, NULL, NULL),
('651a521f-db8b-11ef-9f06-244bfebc0c45', 'Proses Terminasi', 'residensial', 12, NULL, NULL, NULL),
('7078dbc5-db8a-11ef-9f06-244bfebc0c45', 'Menunggu Persetujuan Kepala', 'residensial', 4, NULL, NULL, NULL),
('7918fc82-db8a-11ef-9f06-244bfebc0c45', 'Kepala Menyetujui Usulan Residensial', 'residensial', 5, NULL, NULL, NULL),
('a961e7f6-db89-11ef-9f06-244bfebc0c45', 'Draft - Usulan Residensial', 'residensial', 1, NULL, NULL, NULL),
('b4a5adb3-db89-11ef-9f06-244bfebc0c45', 'Draft - Usulan Non Residensial', 'non-residensial', 0, NULL, NULL, NULL),
('b995d70b-db89-11ef-9f06-244bfebc0c45', 'Input - Residensial', 'residensial', 2, NULL, NULL, NULL),
('be10c279-db89-11ef-9f06-244bfebc0c45', 'Proses - Residensial', 'residensial', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_sumber_rujukan`
--

CREATE TABLE `laksa_ms_sumber_rujukan` (
  `id` varchar(36) NOT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `prioritas` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_sumber_rujukan`
--

INSERT INTO `laksa_ms_sumber_rujukan` (`id`, `sumber`, `prioritas`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', 'sumber 1', 1, NULL, NULL, NULL),
('2', 'sumber 2', 2, NULL, NULL, NULL),
('3', 'sumber 3', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_tr_assessment`
--

CREATE TABLE `laksa_tr_assessment` (
  `id` varchar(36) NOT NULL,
  `residensial_id` varchar(36) DEFAULT NULL,
  `petugas_id` varchar(36) DEFAULT NULL,
  `tgl_assessment` date DEFAULT NULL,
  `satuan_kerja` varchar(100) DEFAULT NULL,
  `bantuan_id` varchar(36) DEFAULT NULL,
  `assessment_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`assessment_json`)),
  `uraian_komponen_layanan` text DEFAULT NULL,
  `intervensi_komponen_yang_diberikan` varchar(36) DEFAULT NULL,
  `intervensi_uraian_komponen_layanan` text DEFAULT NULL,
  `intervensi_waktu_pemebrian_layanan` date DEFAULT NULL,
  `intervensi_pihak_yang_terlibat` varchar(255) DEFAULT NULL,
  `rencana_intervensi_lanjutan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`rencana_intervensi_lanjutan`)),
  `rekomendasi_catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `laksa_tr_assessment`
--

INSERT INTO `laksa_tr_assessment` (`id`, `residensial_id`, `petugas_id`, `tgl_assessment`, `satuan_kerja`, `bantuan_id`, `assessment_json`, `uraian_komponen_layanan`, `intervensi_komponen_yang_diberikan`, `intervensi_uraian_komponen_layanan`, `intervensi_waktu_pemebrian_layanan`, `intervensi_pihak_yang_terlibat`, `rencana_intervensi_lanjutan`, `rekomendasi_catatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
('864a32e0-eaae-40f1-877e-4749cab08f72', 'a8deb65a-ca8a-430b-88de-094f6f179d33', NULL, '2025-01-27', '123', '123', '{\"5ccf3c56-a2aa-42e6-b4dc-b4147807b32f\":{\"3e77e2ad-8b0a-45db-8fc7-d900754ee4d4\":\"f68d74fd-4c92-410c-b612-a8bbb605d3bf\",\"f5fc6238-7d51-4a26-bdbf-b2829acb3b89\":\"asd\",\"b8aa3dcd-9532-43ba-80a5-40fe291e635c\":\"12312\",\"76c4e1d6-110e-423d-a8fe-aa887112d9f3\":\"123123\",\"9193af48-e2c5-437e-9761-8ae97a1942ac\":\"426a6b66-6080-4024-9f07-2d391224bad7\",\"4f148bc1-172b-432b-8d95-e3ad32a18a0d\":\"123123\"},\"c1652da7-be7d-4626-99e3-953d1c4f0441\":{\"bbdff4e5-7f77-438b-9284-f4f893ee0a6d\":\"8f4b906b-6b40-406a-bffd-821f5851c1dc\",\"0f46a9cb-759a-4da9-b021-7aa75af605ee\":\"e427beee-addc-46ff-b0bc-a4b91df3c1eb\",\"c6d802db-7744-4f47-a77b-e3bbed749573\":\"2a180465-ba8b-46eb-afd1-d6be4c006c3d\",\"2acf8af7-f819-47b5-a20f-43c66fa96430\":\"1231\",\"1f1dddd9-46e2-4835-810b-84edb24a20be\":\"6ca4ec67-d562-4080-8e0a-7c40b740c07f\",\"02a41d1b-f707-4ef0-9fac-ddb55e7d9dd6\":\"f6a02dbc-b0a6-4fbd-a3d6-bef88fa0d4a6\",\"a96973ca-c11b-426a-a282-09c311a7acd8\":\"ccb122d6-84ac-499c-bf69-4b64bc0c7465\",\"5819ae17-81f5-4a6d-bdf3-a801625d36f0\":\"9b9ab6e7-520f-4488-9f9d-1dc5f4e5e24b\",\"6f2b0d95-bcb0-4c17-beee-e342f14831a8\":\"d7fa2ca4-70f6-48c0-a897-6c0b11d2e7d4\",\"27b8abeb-0a2c-479e-97de-47cef748b821\":\"01bcd2a9-bb91-4706-bc54-0b09db32075c\",\"af277a47-fd2d-4df5-a4f3-0a0d7278a7a1\":\"8dfd17da-ab23-405f-b5c5-9c8361b318bb\"},\"3f911a94-79a7-4afd-8e2d-b959feaa31d7\":{\"1f3d613e-1c7b-4204-9f88-4d6b70e4da8e\":\"533a7f65-df54-4d1b-892d-f17ff86ae355\",\"945fd0fd-3d30-4306-b605-a0f714078aba\":\"qweqweqwe\",\"3e100749-03bf-4fb5-9df3-7c031d584259\":{},\"5a6af5f4-2dc8-432a-b9e3-6ad8e6eb4e5d\":{},\"b80a7047-0bdb-4b86-b1c1-32399523ebb4\":{},\"a01d6da8-a517-4dde-81c4-091e93978a92\":{}}}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('a1a12817-c929-456a-85e9-084e5f3ac64d', 'fc57c9b2-6628-4aeb-bf49-ffee3164f15b', NULL, '2025-01-27', '123', '123', '{\"5ccf3c56-a2aa-42e6-b4dc-b4147807b32f\":{\"3e77e2ad-8b0a-45db-8fc7-d900754ee4d4\":\"f68d74fd-4c92-410c-b612-a8bbb605d3bf\",\"f5fc6238-7d51-4a26-bdbf-b2829acb3b89\":\"qeqwe\",\"b8aa3dcd-9532-43ba-80a5-40fe291e635c\":\"1231231\",\"76c4e1d6-110e-423d-a8fe-aa887112d9f3\":\"2\",\"9193af48-e2c5-437e-9761-8ae97a1942ac\":\"426a6b66-6080-4024-9f07-2d391224bad7\",\"4f148bc1-172b-432b-8d95-e3ad32a18a0d\":\"232323\"},\"c1652da7-be7d-4626-99e3-953d1c4f0441\":{\"bbdff4e5-7f77-438b-9284-f4f893ee0a6d\":\"8f4b906b-6b40-406a-bffd-821f5851c1dc\",\"0f46a9cb-759a-4da9-b021-7aa75af605ee\":\"c0a383b1-529a-49a5-93fe-627ffa94c984\",\"c6d802db-7744-4f47-a77b-e3bbed749573\":\"409c30c1-5519-4e65-8546-ccba4d8721f0\",\"2acf8af7-f819-47b5-a20f-43c66fa96430\":\"222\",\"1f1dddd9-46e2-4835-810b-84edb24a20be\":\"6ca4ec67-d562-4080-8e0a-7c40b740c07f\",\"02a41d1b-f707-4ef0-9fac-ddb55e7d9dd6\":\"79dd9f1f-96be-4ace-88b5-19e46950a8e6\",\"a96973ca-c11b-426a-a282-09c311a7acd8\":\"ccb122d6-84ac-499c-bf69-4b64bc0c7465\",\"5819ae17-81f5-4a6d-bdf3-a801625d36f0\":\"7cddc3d7-5200-430b-9bc1-eca515513f50\",\"6f2b0d95-bcb0-4c17-beee-e342f14831a8\":\"d7fa2ca4-70f6-48c0-a897-6c0b11d2e7d4\",\"27b8abeb-0a2c-479e-97de-47cef748b821\":\"01bcd2a9-bb91-4706-bc54-0b09db32075c\",\"af277a47-fd2d-4df5-a4f3-0a0d7278a7a1\":\"0a1cf00d-73c6-4cfd-9a23-96799118678e\"},\"3f911a94-79a7-4afd-8e2d-b959feaa31d7\":{\"3e100749-03bf-4fb5-9df3-7c031d584259\":\"qwewqe\",\"5a6af5f4-2dc8-432a-b9e3-6ad8e6eb4e5d\":\"qweqweq\",\"b80a7047-0bdb-4b86-b1c1-32399523ebb4\":\"qweqw\",\"a01d6da8-a517-4dde-81c4-091e93978a92\":\"qweqwe\",\"1f3d613e-1c7b-4204-9f88-4d6b70e4da8e\":\"5272f3bc-40de-44e0-84fd-302c572447be\",\"945fd0fd-3d30-4306-b605-a0f714078aba\":\"qweqwe\"}}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('e316fa82-1f21-4f38-84e2-5f73a3aa8e0e', '721f2ce9-5fa1-4d6b-b67d-5fe00eaf345b', NULL, '2025-01-27', '123', '123', '{\"5ccf3c56-a2aa-42e6-b4dc-b4147807b32f\":{\"3e77e2ad-8b0a-45db-8fc7-d900754ee4d4\":null,\"f5fc6238-7d51-4a26-bdbf-b2829acb3b89\":null,\"b8aa3dcd-9532-43ba-80a5-40fe291e635c\":null,\"76c4e1d6-110e-423d-a8fe-aa887112d9f3\":null,\"9193af48-e2c5-437e-9761-8ae97a1942ac\":null,\"4f148bc1-172b-432b-8d95-e3ad32a18a0d\":null},\"c1652da7-be7d-4626-99e3-953d1c4f0441\":{\"bbdff4e5-7f77-438b-9284-f4f893ee0a6d\":null,\"0f46a9cb-759a-4da9-b021-7aa75af605ee\":null,\"c6d802db-7744-4f47-a77b-e3bbed749573\":null,\"2acf8af7-f819-47b5-a20f-43c66fa96430\":null,\"1f1dddd9-46e2-4835-810b-84edb24a20be\":null,\"02a41d1b-f707-4ef0-9fac-ddb55e7d9dd6\":null,\"a96973ca-c11b-426a-a282-09c311a7acd8\":null,\"5819ae17-81f5-4a6d-bdf3-a801625d36f0\":null,\"6f2b0d95-bcb0-4c17-beee-e342f14831a8\":null,\"27b8abeb-0a2c-479e-97de-47cef748b821\":null,\"af277a47-fd2d-4df5-a4f3-0a0d7278a7a1\":null},\"3f911a94-79a7-4afd-8e2d-b959feaa31d7\":{\"3e100749-03bf-4fb5-9df3-7c031d584259\":null,\"5a6af5f4-2dc8-432a-b9e3-6ad8e6eb4e5d\":null,\"b80a7047-0bdb-4b86-b1c1-32399523ebb4\":null,\"a01d6da8-a517-4dde-81c4-091e93978a92\":null,\"1f3d613e-1c7b-4204-9f88-4d6b70e4da8e\":null,\"945fd0fd-3d30-4306-b605-a0f714078aba\":null}}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-27 07:03:16', '2025-01-27 07:03:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_tr_assessment_value`
--

CREATE TABLE `laksa_tr_assessment_value` (
  `id` varchar(36) NOT NULL,
  `form_assessment_id` varchar(36) DEFAULT NULL,
  `form_assessment_sub_id` varchar(36) DEFAULT NULL,
  `assessment_id` varchar(36) DEFAULT NULL,
  `assessment_value` varchar(100) DEFAULT NULL,
  `assessment_type` enum('text','combo','file','radio','textarea') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_tr_assessment_value`
--

INSERT INTO `laksa_tr_assessment_value` (`id`, `form_assessment_id`, `form_assessment_sub_id`, `assessment_id`, `assessment_value`, `assessment_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
('099ab72f-cfa8-4b07-8fa2-2a171d5dca50', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'af277a47-fd2d-4df5-a4f3-0a0d7278a7a1', '864a32e0-eaae-40f1-877e-4749cab08f72', '8dfd17da-ab23-405f-b5c5-9c8361b318bb', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('0a99cf84-a71b-4447-a554-29905dcb60ad', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', '3e77e2ad-8b0a-45db-8fc7-d900754ee4d4', 'a1a12817-c929-456a-85e9-084e5f3ac64d', 'f68d74fd-4c92-410c-b612-a8bbb605d3bf', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('0bf49ddf-bf8d-4bb5-b636-2862bf7421d9', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', '1f3d613e-1c7b-4204-9f88-4d6b70e4da8e', '864a32e0-eaae-40f1-877e-4749cab08f72', '533a7f65-df54-4d1b-892d-f17ff86ae355', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('0fafbe25-0bc5-4229-be7a-4b21a7f36bc0', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', '76c4e1d6-110e-423d-a8fe-aa887112d9f3', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '2', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('137bf466-953f-4482-9900-f3e3b3d1c5bd', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', '3e100749-03bf-4fb5-9df3-7c031d584259', 'a1a12817-c929-456a-85e9-084e5f3ac64d', 'qwewqe', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('212dd387-3ca8-462e-8f5d-c8f8f5fb9284', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', '9193af48-e2c5-437e-9761-8ae97a1942ac', '864a32e0-eaae-40f1-877e-4749cab08f72', '426a6b66-6080-4024-9f07-2d391224bad7', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('227bcb8e-f59a-4a83-b8eb-f40a807827da', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', '1f3d613e-1c7b-4204-9f88-4d6b70e4da8e', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '5272f3bc-40de-44e0-84fd-302c572447be', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('234eb5f0-1bf6-45d2-9d57-89b86c0562cb', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', '945fd0fd-3d30-4306-b605-a0f714078aba', '864a32e0-eaae-40f1-877e-4749cab08f72', 'qweqweqwe', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('2cd09b94-7476-425a-acb3-4c16602e8fac', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '2acf8af7-f819-47b5-a20f-43c66fa96430', '864a32e0-eaae-40f1-877e-4749cab08f72', '1231', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('2e23e247-c9af-4d41-9800-a9dda3eb70ab', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', '4f148bc1-172b-432b-8d95-e3ad32a18a0d', '864a32e0-eaae-40f1-877e-4749cab08f72', '123123', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('33f3c289-1528-43fb-b099-a0a8571e6689', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'a01d6da8-a517-4dde-81c4-091e93978a92', '864a32e0-eaae-40f1-877e-4749cab08f72', 'uploads/assessment/rVcpshQ6bF7sKPDeCn2u01fCcMdWK6pShIgkWRRN.jpg', 'file', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('35cd69ff-52fe-433d-a105-0e9069ab8a5a', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'bbdff4e5-7f77-438b-9284-f4f893ee0a6d', '864a32e0-eaae-40f1-877e-4749cab08f72', '8f4b906b-6b40-406a-bffd-821f5851c1dc', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('458ff97b-76c3-4f2e-aa54-311bdc51ce82', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '02a41d1b-f707-4ef0-9fac-ddb55e7d9dd6', '864a32e0-eaae-40f1-877e-4749cab08f72', 'f6a02dbc-b0a6-4fbd-a3d6-bef88fa0d4a6', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('45cf0a27-b763-4edf-864f-539871a59fce', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '2acf8af7-f819-47b5-a20f-43c66fa96430', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '222', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('4a9cd01d-f62f-48d5-af83-8fa1b7a5126f', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '6f2b0d95-bcb0-4c17-beee-e342f14831a8', 'a1a12817-c929-456a-85e9-084e5f3ac64d', 'd7fa2ca4-70f6-48c0-a897-6c0b11d2e7d4', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('4e18069d-3550-466d-aaf6-55e9a0bc9fcc', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '27b8abeb-0a2c-479e-97de-47cef748b821', '864a32e0-eaae-40f1-877e-4749cab08f72', '01bcd2a9-bb91-4706-bc54-0b09db32075c', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('4fac645e-be1c-43d5-9d98-b6422326cc5d', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', '5a6af5f4-2dc8-432a-b9e3-6ad8e6eb4e5d', '864a32e0-eaae-40f1-877e-4749cab08f72', 'uploads/assessment/en2alAcGp8sjFiYXmwx9Wkrt1dlo7PMvxtmosoBA.jpg', 'file', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('5b781a8c-0015-4c57-9bea-7571c75d72d2', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '5819ae17-81f5-4a6d-bdf3-a801625d36f0', '864a32e0-eaae-40f1-877e-4749cab08f72', '9b9ab6e7-520f-4488-9f9d-1dc5f4e5e24b', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('6da93f31-04d1-40eb-a650-614aa0d513a4', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '6f2b0d95-bcb0-4c17-beee-e342f14831a8', '864a32e0-eaae-40f1-877e-4749cab08f72', 'd7fa2ca4-70f6-48c0-a897-6c0b11d2e7d4', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('6ddf9aad-c1c8-476d-a53c-56778ce407a7', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'b80a7047-0bdb-4b86-b1c1-32399523ebb4', '864a32e0-eaae-40f1-877e-4749cab08f72', 'uploads/assessment/YbG9BPzaJFcOamNy3Blpg7onOJhw630QS1D5VFu8.jpg', 'file', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('7254de7a-62d8-4218-8cfd-2d1fedbf04b9', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'b8aa3dcd-9532-43ba-80a5-40fe291e635c', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '1231231', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('73ad6eae-035e-457f-ad3a-35a0ba12f178', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '0f46a9cb-759a-4da9-b021-7aa75af605ee', 'a1a12817-c929-456a-85e9-084e5f3ac64d', 'c0a383b1-529a-49a5-93fe-627ffa94c984', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('76fa2267-678d-46b0-84f4-f15b838162b9', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'f5fc6238-7d51-4a26-bdbf-b2829acb3b89', 'a1a12817-c929-456a-85e9-084e5f3ac64d', 'qeqwe', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('85c49700-18be-4450-8bdb-2f7c290a1189', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', '5a6af5f4-2dc8-432a-b9e3-6ad8e6eb4e5d', 'a1a12817-c929-456a-85e9-084e5f3ac64d', 'qweqweq', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('88dc4b2a-eb27-476f-b355-87fdae980a41', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'bbdff4e5-7f77-438b-9284-f4f893ee0a6d', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '8f4b906b-6b40-406a-bffd-821f5851c1dc', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('89bb2d29-ff6c-4b65-a89f-0f2454b85c02', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '0f46a9cb-759a-4da9-b021-7aa75af605ee', '864a32e0-eaae-40f1-877e-4749cab08f72', 'e427beee-addc-46ff-b0bc-a4b91df3c1eb', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('8cc5d7d1-babb-4bbf-9c9a-a60712f11fa5', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'c6d802db-7744-4f47-a77b-e3bbed749573', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '409c30c1-5519-4e65-8546-ccba4d8721f0', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('8f2a4a94-ab95-4ba6-b907-3ff74114b294', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'a96973ca-c11b-426a-a282-09c311a7acd8', 'a1a12817-c929-456a-85e9-084e5f3ac64d', 'ccb122d6-84ac-499c-bf69-4b64bc0c7465', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('9a43f61f-13c1-4db8-a79e-fae2e5a37402', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'f5fc6238-7d51-4a26-bdbf-b2829acb3b89', '864a32e0-eaae-40f1-877e-4749cab08f72', 'asd', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('a5b02183-1af7-4e44-814a-2ff54a724d0b', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', '3e77e2ad-8b0a-45db-8fc7-d900754ee4d4', '864a32e0-eaae-40f1-877e-4749cab08f72', 'f68d74fd-4c92-410c-b612-a8bbb605d3bf', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('a90aa75e-0973-4a2a-8bd2-71fb117f40ac', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '1f1dddd9-46e2-4835-810b-84edb24a20be', '864a32e0-eaae-40f1-877e-4749cab08f72', '6ca4ec67-d562-4080-8e0a-7c40b740c07f', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('aa47ea60-8f38-4967-9719-3cd124e6cd85', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '5819ae17-81f5-4a6d-bdf3-a801625d36f0', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '7cddc3d7-5200-430b-9bc1-eca515513f50', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('aca6f972-d227-430c-a827-5c10b3d7c847', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'c6d802db-7744-4f47-a77b-e3bbed749573', '864a32e0-eaae-40f1-877e-4749cab08f72', '2a180465-ba8b-46eb-afd1-d6be4c006c3d', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('be7bd72d-f2e0-4fb8-901a-7317633fa32d', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'af277a47-fd2d-4df5-a4f3-0a0d7278a7a1', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '0a1cf00d-73c6-4cfd-9a23-96799118678e', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('bec882a7-102a-4809-887b-a9bd0d88f17e', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', 'b8aa3dcd-9532-43ba-80a5-40fe291e635c', '864a32e0-eaae-40f1-877e-4749cab08f72', '12312', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('c3e6482d-4a94-44ec-ab62-9b626d6a2d21', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', '9193af48-e2c5-437e-9761-8ae97a1942ac', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '426a6b66-6080-4024-9f07-2d391224bad7', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('cb57d603-a7c3-455e-8699-b267fb73af30', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '1f1dddd9-46e2-4835-810b-84edb24a20be', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '6ca4ec67-d562-4080-8e0a-7c40b740c07f', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('cd74d045-f02b-4b49-a917-4916efe6a682', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', '4f148bc1-172b-432b-8d95-e3ad32a18a0d', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '232323', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('d7cbad0b-baa9-45c1-96ee-20a035f70f21', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', '3e100749-03bf-4fb5-9df3-7c031d584259', '864a32e0-eaae-40f1-877e-4749cab08f72', 'uploads/assessment/IhlNgGaAiANziQZdUB83uFURKhrCWj5QJlvuiGe8.jpg', 'file', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('daf46f51-8e9d-44b2-8267-a1c2f1cbc67a', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'b80a7047-0bdb-4b86-b1c1-32399523ebb4', 'a1a12817-c929-456a-85e9-084e5f3ac64d', 'qweqw', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('ded147a3-8c7a-4132-813c-3d3a78959c83', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '27b8abeb-0a2c-479e-97de-47cef748b821', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '01bcd2a9-bb91-4706-bc54-0b09db32075c', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('e606012b-14fe-4eb5-9ab0-295cd9b9a6d0', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', '945fd0fd-3d30-4306-b605-a0f714078aba', 'a1a12817-c929-456a-85e9-084e5f3ac64d', 'qweqwe', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('ebde3169-535a-4d71-853b-7102bab37150', 'c1652da7-be7d-4626-99e3-953d1c4f0441', '02a41d1b-f707-4ef0-9fac-ddb55e7d9dd6', 'a1a12817-c929-456a-85e9-084e5f3ac64d', '79dd9f1f-96be-4ace-88b5-19e46950a8e6', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('f8430aaa-0a70-4cf9-8288-20a8c2a204a5', 'c1652da7-be7d-4626-99e3-953d1c4f0441', 'a96973ca-c11b-426a-a282-09c311a7acd8', '864a32e0-eaae-40f1-877e-4749cab08f72', 'ccb122d6-84ac-499c-bf69-4b64bc0c7465', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL),
('fbd52ccb-1aa1-4a2d-8d55-109a52483b17', '3f911a94-79a7-4afd-8e2d-b959feaa31d7', 'a01d6da8-a517-4dde-81c4-091e93978a92', 'a1a12817-c929-456a-85e9-084e5f3ac64d', 'qweqwe', 'text', '2025-01-27 06:31:16', '2025-01-27 06:31:16', NULL),
('fd16a55e-adcd-4046-8915-ef5740d20b37', '5ccf3c56-a2aa-42e6-b4dc-b4147807b32f', '76c4e1d6-110e-423d-a8fe-aa887112d9f3', '864a32e0-eaae-40f1-877e-4749cab08f72', '123123', 'text', '2025-01-27 03:06:57', '2025-01-27 03:06:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_tr_non_residensial`
--

CREATE TABLE `laksa_tr_non_residensial` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laksa_tr_rehabilitasi`
--

CREATE TABLE `laksa_tr_rehabilitasi` (
  `id` varchar(36) NOT NULL,
  `residensial_id` varchar(36) DEFAULT NULL,
  `petugas_id` varchar(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_tr_rehabilitasi`
--

INSERT INTO `laksa_tr_rehabilitasi` (`id`, `residensial_id`, `petugas_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0cb2708d-dcbc-11ef-beef-244bfebc0c45', '721f2ce9-5fa1-4d6b-b67d-5fe00eaf345b', '1', '2025-01-08 15:02:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_tr_rehabilitasi_perkembangan`
--

CREATE TABLE `laksa_tr_rehabilitasi_perkembangan` (
  `id` varchar(36) NOT NULL,
  `rehabilitasi_id` varchar(36) DEFAULT NULL,
  `tgl_perkembangan` date DEFAULT NULL,
  `foto_perkembangan` varchar(100) DEFAULT NULL,
  `file_perkembangan` varchar(100) DEFAULT NULL,
  `catatan_perkembangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_tr_rehabilitasi_perkembangan`
--

INSERT INTO `laksa_tr_rehabilitasi_perkembangan` (`id`, `rehabilitasi_id`, `tgl_perkembangan`, `foto_perkembangan`, `file_perkembangan`, `catatan_perkembangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
('14f5cff3-dcbc-11ef-beef-244bfebc0c44', '0cb2708d-dcbc-11ef-beef-244bfebc0c45', '2025-01-27', NULL, NULL, NULL, NULL, NULL, NULL),
('14f5cff3-dcbc-11ef-beef-244bfebc0c45', '0cb2708d-dcbc-11ef-beef-244bfebc0c45', '2025-01-27', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_tr_rehabilitasi_perkembangan_nilai`
--

CREATE TABLE `laksa_tr_rehabilitasi_perkembangan_nilai` (
  `id` varchar(36) NOT NULL,
  `rehabilitasi_perkembangan_id` varchar(36) DEFAULT NULL,
  `komponen_id` varchar(36) DEFAULT NULL,
  `aspek_id` varchar(36) DEFAULT NULL,
  `komponen_aspek_nilai` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_tr_rehabilitasi_perkembangan_nilai`
--

INSERT INTO `laksa_tr_rehabilitasi_perkembangan_nilai` (`id`, `rehabilitasi_perkembangan_id`, `komponen_id`, `aspek_id`, `komponen_aspek_nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
('33cd632b-dcbc-11ef-beef-244bfebc0c45', '14f5cff3-dcbc-11ef-beef-244bfebc0c45', 'b99b69db-dcbb-11ef-beef-244bfebc0c45', 'e7ce00ea-dcbb-11ef-beef-244bfebc0c45', 1, NULL, NULL, NULL),
('33cd7624-dcbc-11ef-beef-244bfebc0c45', '14f5cff3-dcbc-11ef-beef-244bfebc0c45', 'b99b69db-dcbb-11ef-beef-244bfebc0c45', 'e7ce0997-dcbb-11ef-beef-244bfebc0c45', 2, NULL, NULL, NULL),
('33cd85cb-dcbc-11ef-beef-244bfebc0c45', '14f5cff3-dcbc-11ef-beef-244bfebc0c45', 'b99b69db-dcbb-11ef-beef-244bfebc0c45', 'e7ce12f6-dcbb-11ef-beef-244bfebc0c45', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_tr_residensial`
--

CREATE TABLE `laksa_tr_residensial` (
  `id` varchar(36) NOT NULL,
  `petugas_id` varchar(36) DEFAULT NULL,
  `jenis_layanan` enum('Residensial','Non Residensial') DEFAULT NULL,
  `tgl_penerimaan` datetime DEFAULT NULL,
  `sumber_id` varchar(36) DEFAULT NULL,
  `pasien_id` varchar(36) DEFAULT NULL,
  `kategori_ppks_id` varchar(36) DEFAULT NULL,
  `kategori_ppks_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `masa_layanan` int(11) DEFAULT NULL,
  `rencana_tgl_terminasi` date DEFAULT NULL,
  `pengampu_id` varchar(36) DEFAULT NULL,
  `status_id` varchar(36) DEFAULT 'draft',
  `gedung_id` varchar(36) DEFAULT NULL,
  `up_dokumen_rujukan` varchar(100) DEFAULT NULL,
  `ragam_abh` varchar(36) DEFAULT NULL,
  `informasi_kasus` varchar(36) DEFAULT NULL,
  `jenis_rujukan` varchar(36) DEFAULT NULL,
  `no_putusan_pengadilan` varchar(100) DEFAULT NULL,
  `ragam_anak` varchar(36) DEFAULT NULL,
  `ragam_kelompok_rentan` varchar(36) DEFAULT NULL,
  `ragam_penyandang_disabilitas` varchar(36) DEFAULT NULL,
  `ragam_disabilitas_fisik` varchar(36) DEFAULT NULL,
  `ragam_disabilitas_intelektual` varchar(36) DEFAULT NULL,
  `ragam_disabilitas_mental` varchar(36) DEFAULT NULL,
  `ragam_disabilitas_sensorik` varchar(36) DEFAULT NULL,
  `disabilitas_ganda_multi` varchar(36) DEFAULT NULL,
  `penerima_atensi` varchar(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_tr_residensial`
--

INSERT INTO `laksa_tr_residensial` (`id`, `petugas_id`, `jenis_layanan`, `tgl_penerimaan`, `sumber_id`, `pasien_id`, `kategori_ppks_id`, `kategori_ppks_json`, `masa_layanan`, `rencana_tgl_terminasi`, `pengampu_id`, `status_id`, `gedung_id`, `up_dokumen_rujukan`, `ragam_abh`, `informasi_kasus`, `jenis_rujukan`, `no_putusan_pengadilan`, `ragam_anak`, `ragam_kelompok_rentan`, `ragam_penyandang_disabilitas`, `ragam_disabilitas_fisik`, `ragam_disabilitas_intelektual`, `ragam_disabilitas_mental`, `ragam_disabilitas_sensorik`, `disabilitas_ganda_multi`, `penerima_atensi`, `created_at`, `updated_at`, `deleted_at`) VALUES
('721f2ce9-5fa1-4d6b-b67d-5fe00eaf345b', '1', 'Residensial', '2025-01-04 00:00:00', '2', '3ff3d400-7322-4f8f-9df0-e984f8950ea1', '1dd96457-c226-4f42-a25b-693c9139823c', '{\"d87128fc-6a4b-4233-a4a0-472c59095c19\":\"2bc64477-9b2b-263a-88b7-e456d8d3707b\"}', 33, '2025-01-03', '84f6aac5-2dbd-4fe4-bec0-71ef78879c03', 'b995d70b-db89-11ef-9f06-244bfebc0c45', '2abcfad0-d43f-4166-9675-0fbc2b5d7c4a', 'uploads/dokumen_rujukan/LSodu3Tbvk6XIF2cuD724IGsvt7QFdetML7ngCgu.pdf', NULL, NULL, NULL, NULL, '2bc64477-9b2b-263a-88b7-e456d8d3707b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-27 06:53:40', '2025-01-27 08:42:51', NULL),
('a8deb65a-ca8a-430b-88de-094f6f179d33', '1', 'Residensial', '2025-01-15 00:00:00', '1', '2f068203-d88f-11ef-8650-244bfebc0c45', 'b1895989-f137-4421-83bc-59206516da7f', '{\"13157c96-d3f6-429f-864e-7edcab14b468\":{\"90826db6-4e07-4cc2-9626-a3b4d57de472\":\"60c1ca3d-bb8d-40df-8580-e8c66b1934d4\"}}', 44, '2025-01-30', '84f6aac5-2dbd-4fe4-bec0-71ef78879c03', '3cdad447-db8b-11ef-9f06-244bfebc0c45', '2abcfad0-d43f-4166-9675-0fbc2b5d7c4a', 'uploads/dokumen_rujukan/znHVuLJPvPwlLZRta2oQbw6IxD9a9OJJtq2u63ph.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '60c1ca3d-bb8d-40df-8580-e8c66b1934d4', NULL, NULL, NULL, NULL, '2025-01-27 03:05:32', '2025-01-27 03:31:28', NULL),
('fc57c9b2-6628-4aeb-bf49-ffee3164f15b', '1', 'Residensial', '2025-01-08 00:00:00', '1', '2f068203-d88f-11ef-8650-244bfebc0c45', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', '{\"bdb5fc88-e430-47f1-9ba4-cea2cac40244\":\"d7c8f643-5ec6-42fb-a3ea-8c5c787ad1b5\",\"ebc5f1dd-4e2b-4fe2-97be-477291a311dd\":\"e4b07705-7562-4fa5-b77f-3338802a9645\",\"5332d470-4c5d-4df2-98d5-45b60805c978\":\"be9a2343-0021-43a7-9c54-46cd1d3832c1\",\"4aebdf03-5293-4724-a3d8-f9f2fca857d9\":\"1231231\"}', 33, '2025-01-15', '84f6aac5-2dbd-4fe4-bec0-71ef78879c03', '3cdad447-db8b-11ef-9f06-244bfebc0c45', '2abcfad0-d43f-4166-9675-0fbc2b5d7c4a', 'uploads/dokumen_rujukan/uM8Wzjw9oUTqs0jvFPQszD6NGsJUUv3Dy1fQkCzy.pdf', 'd7c8f643-5ec6-42fb-a3ea-8c5c787ad1b5', 'e4b07705-7562-4fa5-b77f-3338802a9645', 'be9a2343-0021-43a7-9c54-46cd1d3832c1', '1231231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-27 06:25:14', '2025-01-27 06:31:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_tr_status`
--

CREATE TABLE `laksa_tr_status` (
  `id` varchar(36) NOT NULL,
  `jenis_layanan` enum('residensial','non-residensial') DEFAULT NULL,
  `layanan_id` varchar(36) DEFAULT NULL,
  `status_id` varchar(36) DEFAULT NULL,
  `user_id` varchar(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parent_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `menu` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icon` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `access` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sort` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `menu`, `description`, `icon`, `url`, `access`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Form Assessement', 'desc', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" class=\"icon-20\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\"><path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z\" fill=\"currentColor\"></path></svg>', 'form-assessement', 'formassessement', 5, NULL, NULL, NULL),
('09073338-96aa-42a9-88df-b607a460b562', NULL, 'Non Residensial', 'desc', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\">\r\n                                        <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M7.33049 2.00049H16.6695C20.0705 2.00049 21.9905 3.92949 22.0005 7.33049V16.6705C22.0005 20.0705 20.0705 22.0005 16.6695 22.0005H7.33049C3.92949 22.0005 2.00049 20.0705 2.00049 16.6705V7.33049C2.00049 3.92949 3.92949 2.00049 7.33049 2.00049ZM12.0495 17.8605C12.4805 17.8605 12.8395 17.5405 12.8795 17.1105V6.92049C12.9195 6.61049 12.7705 6.29949 12.5005 6.13049C12.2195 5.96049 11.8795 5.96049 11.6105 6.13049C11.3395 6.29949 11.1905 6.61049 11.2195 6.92049V17.1105C11.2705 17.5405 11.6295 17.8605 12.0495 17.8605ZM16.6505 17.8605C17.0705 17.8605 17.4295 17.5405 17.4805 17.1105V13.8305C17.5095 13.5095 17.3605 13.2105 17.0895 13.0405C16.8205 12.8705 16.4805 12.8705 16.2005 13.0405C15.9295 13.2105 15.7805 13.5095 15.8205 13.8305V17.1105C15.8605 17.5405 16.2195 17.8605 16.6505 17.8605ZM8.21949 17.1105C8.17949 17.5405 7.82049 17.8605 7.38949 17.8605C6.95949 17.8605 6.59949 17.5405 6.56049 17.1105V10.2005C6.53049 9.88949 6.67949 9.58049 6.95049 9.41049C7.21949 9.24049 7.56049 9.24049 7.83049 9.41049C8.09949 9.58049 8.25049 9.88949 8.21949 10.2005V17.1105Z\" fill=\"currentColor\" />\r\n                                      </svg>', 'non-residensial', 'nonresidensial', 2, '2025-01-12 01:10:15', '2025-01-12 01:10:15', NULL),
('26118ee8-49f6-4967-b7a0-28226a21b844', NULL, 'Rehabilitasi', 'desc', '<svg fill=\"#666\" height=\"20px\" width=\"20px\" version=\"1.1\" id=\"Layer_1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" viewBox=\"0 0 461.724 461.724\" xml:space=\"preserve\" stroke=\"#666\">\r\n<g id=\"SVGRepo_bgCarrier\" stroke-width=\"0\"/>\r\n<g id=\"SVGRepo_tracerCarrier\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n<g id=\"SVGRepo_iconCarrier\"> <g> <g> <g> <path d=\"M93.746,60.483c-1.26,3.609-1.953,7.484-1.953,11.523c0,19.304,15.649,34.953,34.953,34.953s34.953-15.649,34.953-34.953 c0-4.039-0.693-7.914-1.953-11.523c-6.765-2.557-17.188-7.03-33-7.03C110.962,53.453,100.51,57.927,93.746,60.483z\"/> <path d=\"M95.351,49.187c10.116-3.823,20.756-5.734,31.395-5.734c10.64,0,21.279,1.911,31.395,5.734 c4.664-12.343,9.328-24.687,13.993-37.03c0.364-0.964,0.321-2.035-0.117-2.967s-1.235-1.648-2.209-1.983 C155.857,2.402,141.302,0,126.746,0C112.19,0,97.635,2.402,83.684,7.206c-0.974,0.335-1.772,1.05-2.21,1.983 c-0.438,0.933-0.48,2.003-0.116,2.967C86.022,24.5,90.687,36.843,95.351,49.187z M115.996,17.425h5.75v-5.75h10v5.75h5.75v10 h-5.75v5.75h-10v-5.75h-5.75V17.425z\"/> <path d=\"M412.888,327.555h-8.75V302.16c0-2.451-1.987-4.439-4.439-4.439h-0.657c1.669-1.176,2.762-3.115,2.762-5.312 c0-3.59-2.91-6.5-6.5-6.5h-17c-3.59,0-6.5,2.91-6.5,6.5c0,2.197,1.093,4.135,2.762,5.312h-0.656 c-2.451,0-4.439,1.987-4.439,4.439v25.395h-9.375V292.16c0-2.451-1.987-4.439-4.439-4.439h-5.395v-37.873 c0-2.451-1.987-4.439-4.439-4.439h-6.121c-2.452,0-4.439,1.987-4.439,4.439v37.873h-5.395c-2.451,0-4.439,1.987-4.439,4.439 v35.395h-9.292V282.16c0-2.451-1.987-4.439-4.439-4.439h-0.657c1.669-1.176,2.762-3.115,2.762-5.312c0-3.59-2.91-6.5-6.5-6.5h-17 c-3.59,0-6.5,2.91-6.5,6.5c0,2.197,1.093,4.135,2.762,5.312h-0.656c-2.451,0-4.439,1.987-4.439,4.439v45.395h-13.583v-45 c0-5.523-4.478-10-10-10h-17.55c-0.017-0.045-0.028-0.091-0.046-0.137c-0.331-0.845-33.271-84.897-45.335-120.005 c-7.825-22.769-20.945-34.313-38.995-34.313c-25.363,0-33.117,0-58.434,0c-18.052,0-31.171,11.545-38.994,34.314 c-5.278,15.357-13.215,37.545-18.691,52.771c-3.881,10.795,3.94,22.264,15.426,22.566c0.332,0.009,57.628,1.522,57.961,1.522 c9.107-0.001,16.608-7.262,16.851-16.421c0.245-9.311-7.103-17.058-16.415-17.303l-34.222-0.902 c1.456-4.086,2.82-7.93,4.093-11.531l0.164,0.004l16.396,0.432l3.477-24.351c0.347-2.427,2.595-4.113,5.022-3.767l50.609,7.226 c2.427,0.347,4.113,2.595,3.767,5.022l-8.93,62.544c-0.346,2.427-2.595,4.113-5.022,3.767l-14.965-2.137 c-5.57,5.962-13.381,9.261-21.583,9.042l-39.441-1.04l-13.195,68.129c-0.532,2.746,0.192,5.585,1.971,7.743 s4.43,3.418,7.227,3.418c3.628,0,7.998,0,12.869,0v122.335c0,11.177,9.062,20.238,20.238,20.238 c11.177,0,20.238-9.061,20.238-20.238V319.15c2.909,0,5.828,0,8.737,0v122.335c0,11.177,9.061,20.238,20.238,20.238 s20.238-9.061,20.238-20.238V319.15c4.872,0,9.242,0,12.868,0c2.799,0,5.451-1.251,7.231-3.411c1.78-2.16,2.5-5.002,1.967-7.75 c-26.145-134.99-23.053-118.223-24.024-126.162c14.541,39.835,38.094,99.941,39.257,102.906c3.4,8.67,13.184,12.945,21.857,9.544 c1.174-0.46,2.258-1.046,3.263-1.721h13.878v45v114.168c0,5.523,4.478,10,10,10c5.522,0,10-4.477,10-10v-30.647h135v30.647 c0,5.523,4.478,10,10,10c5.522,0,10-4.477,10-10V337.555C422.888,332.032,418.411,327.555,412.888,327.555z\"/> </g> </g> </g> </g>\r\n</svg>', 'rehabilitasi', 'rehabilitasi', 8, '2025-01-27 03:24:04', '2025-01-27 03:24:04', NULL),
('26943d26-2903-4bc3-9076-d759ca061c5c', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Persyaratan', 'desc', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" class=\"icon-20\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\"><path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z\" fill=\"currentColor\"></path></svg>', 'persyaratan', 'persyaratan', 4, '2025-01-15 21:15:30', '2025-01-15 21:15:30', NULL),
('2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', NULL, 'Data Master', 'descrip data master', '<svg width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                        <path d=\"M7 8H4C2.9 8 2 7.1 2 6V4C2 2.9 2.9 2 4 2H7C8.1 2 9 2.9 9 4V6C9 7.1 8.1 8 7 8Z\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M20.8 7H17.2C16.54 7 16 6.45999 16 5.79999V4.20001C16 3.54001 16.54 3 17.2 3H20.8C21.46 3 22 3.54001 22 4.20001V5.79999C22 6.45999 21.46 7 20.8 7Z\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M20.8 14.5H17.2C16.54 14.5 16 13.96 16 13.3V11.7C16 11.04 16.54 10.5 17.2 10.5H20.8C21.46 10.5 22 11.04 22 11.7V13.3C22 13.96 21.46 14.5 20.8 14.5Z\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M9 5H16\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M12.5 5V18C12.5 19.1 13.4 20 14.5 20H16\" fill=\"white\"/>\r\n                                        <path d=\"M12.5 5V18C12.5 19.1 13.4 20 14.5 20H16\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M12.5 12.5H16\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M20.8 22H17.2C16.54 22 16 21.46 16 20.8V19.2C16 18.54 16.54 18 17.2 18H20.8C21.46 18 22 18.54 22 19.2V20.8C22 21.46 21.46 22 20.8 22Z\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        </svg>', '#', 'datamaster', 8, '2025-01-12 02:46:19', NULL, NULL),
('36267512-8a78-42a4-b432-edb473d729ea', NULL, 'Residensial', 'keterangan Residensial', '<svg width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" class=\"icon-20\" height=\"20\"><path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M19.761 12.001C19.761 12.8145 20.429 13.4764 21.25 13.4764C21.664 13.4764 22 13.8093 22 14.2195V16.8958C22 19.159 20.142 21 17.858 21H6.143C3.859 21 2 19.159 2 16.8958V14.2195C2 13.8093 2.336 13.4764 2.75 13.4764C3.572 13.4764 4.24 12.8145 4.24 12.001C4.24 11.2083 3.599 10.6118 2.75 10.6118C2.551 10.6118 2.361 10.5335 2.22 10.3938C2.079 10.2541 2 10.0648 2 9.86866L2.002 7.10514C2.002 4.84201 3.86 3 6.144 3H17.856C20.14 3 21.999 4.84201 21.999 7.10514L22 9.78245C22 9.97864 21.921 10.1689 21.781 10.3076C21.64 10.4473 21.45 10.5256 21.25 10.5256C20.429 10.5256 19.761 11.1875 19.761 12.001ZM14.252 12.648L15.431 11.5105C15.636 11.3143 15.707 11.025 15.618 10.7575C15.53 10.4899 15.3 10.2997 15.022 10.261L13.393 10.0252L12.664 8.5627C12.539 8.31102 12.285 8.15446 12.002 8.15347H12C11.718 8.15347 11.464 8.31003 11.337 8.56171L10.608 10.0252L8.982 10.26C8.701 10.2997 8.471 10.4899 8.382 10.7575C8.294 11.025 8.365 11.3143 8.569 11.5105L9.748 12.648L9.47 14.2562C9.422 14.5336 9.535 14.8091 9.765 14.9746C9.895 15.0667 10.046 15.1143 10.199 15.1143C10.316 15.1143 10.434 15.0855 10.542 15.0291L12 14.2701L13.455 15.0271C13.707 15.1608 14.006 15.14 14.235 14.9736C14.466 14.8091 14.579 14.5336 14.531 14.2562L14.252 12.648Z\" fill=\"currentColor\"></path></svg>', 'residensial', 'residensial', 1, '2025-01-12 02:35:54', NULL, NULL),
('3a13cd66-29d4-476e-8398-3fbecbf038df', NULL, 'Konfigurasi', 'konf desc', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\">\r\n                                        <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M20.4023 13.58C20.76 13.77 21.036 14.07 21.2301 14.37C21.6083 14.99 21.5776 15.75 21.2097 16.42L20.4943 17.62C20.1162 18.26 19.411 18.66 18.6855 18.66C18.3278 18.66 17.9292 18.56 17.6022 18.36C17.3365 18.19 17.0299 18.13 16.7029 18.13C15.6911 18.13 14.8429 18.96 14.8122 19.95C14.8122 21.1 13.872 22 12.6968 22H11.3069C10.1215 22 9.18125 21.1 9.18125 19.95C9.16081 18.96 8.31259 18.13 7.30085 18.13C6.96361 18.13 6.65702 18.19 6.40153 18.36C6.0745 18.56 5.66572 18.66 5.31825 18.66C4.58245 18.66 3.87729 18.26 3.49917 17.62L2.79402 16.42C2.4159 15.77 2.39546 14.99 2.77358 14.37C2.93709 14.07 3.24368 13.77 3.59115 13.58C3.87729 13.44 4.06125 13.21 4.23498 12.94C4.74596 12.08 4.43937 10.95 3.57071 10.44C2.55897 9.87 2.23194 8.6 2.81446 7.61L3.49917 6.43C4.09191 5.44 5.35913 5.09 6.38109 5.67C7.27019 6.15 8.425 5.83 8.9462 4.98C9.10972 4.7 9.20169 4.4 9.18125 4.1C9.16081 3.71 9.27323 3.34 9.4674 3.04C9.84553 2.42 10.5302 2.02 11.2763 2H12.7172C13.4735 2 14.1582 2.42 14.5363 3.04C14.7203 3.34 14.8429 3.71 14.8122 4.1C14.7918 4.4 14.8838 4.7 15.0473 4.98C15.5685 5.83 16.7233 6.15 17.6226 5.67C18.6344 5.09 19.9118 5.44 20.4943 6.43L21.179 7.61C21.7718 8.6 21.4447 9.87 20.4228 10.44C19.5541 10.95 19.2475 12.08 19.7687 12.94C19.9322 13.21 20.1162 13.44 20.4023 13.58ZM9.10972 12.01C9.10972 13.58 10.4076 14.83 12.0121 14.83C13.6165 14.83 14.8838 13.58 14.8838 12.01C14.8838 10.44 13.6165 9.18 12.0121 9.18C10.4076 9.18 9.10972 10.44 9.10972 12.01Z\" fill=\"currentColor\" />\r\n                                      </svg>', '#', 'konfigurasi', 9, '2025-01-12 07:02:58', NULL, NULL),
('42c50614-5602-4b72-b48c-479a25eaf001', NULL, 'Laporan', 'desc laporan', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">\r\n    <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M8.92574 16.39H14.3119C14.7178 16.39 15.0545 16.05 15.0545 15.64C15.0545 15.23 14.7178 14.9 14.3119 14.9H8.92574C8.5198 14.9 8.18317 15.23 8.18317 15.64C8.18317 16.05 8.5198 16.39 8.92574 16.39ZM12.2723 9.9H8.92574C8.5198 9.9 8.18317 10.24 8.18317 10.65C8.18317 11.06 8.5198 11.39 8.92574 11.39H12.2723C12.6782 11.39 13.0149 11.06 13.0149 10.65C13.0149 10.24 12.6782 9.9 12.2723 9.9ZM19.3381 9.02561C19.5708 9.02292 19.8242 9.02 20.0545 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5099 22 16.0545 22H8.17327C5.59901 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.5 2 7.96535 2H13.2525C13.5099 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.203 9.01 17.0149 9.02C17.4381 9.02 17.8112 9.02316 18.1377 9.02593C18.3917 9.02809 18.6175 9.03 18.8168 9.03C18.9578 9.03 19.1405 9.02789 19.3381 9.02561ZM19.6111 7.566C18.7972 7.569 17.8378 7.566 17.1477 7.559C16.0527 7.559 15.1507 6.648 15.1507 5.542V2.906C15.1507 2.475 15.6685 2.261 15.9646 2.572C16.5004 3.13476 17.2368 3.90834 17.9699 4.67837C18.7009 5.44632 19.4286 6.21074 19.9507 6.759C20.2398 7.062 20.0279 7.565 19.6111 7.566Z\" fill=\"currentColor\" />\r\n  </svg>', 'laporan', 'laporan', 10, '2025-01-12 02:59:24', '2025-01-12 02:59:24', NULL),
('671424b8-096d-4389-8f34-8141f1ac85a3', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Pengampu', 'desc', '<svg width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n    <path d=\"M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z\" fill=\"currentColor\"></path>\n    <path opacity=\"0.4\" d=\"M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z\" fill=\"currentColor\"></path>\n    <path opacity=\"0.4\" d=\"M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z\" fill=\"currentColor\"></path>\n    <path d=\"M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z\" fill=\"currentColor\"></path>\n    <path opacity=\"0.4\" d=\"M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z\" fill=\"currentColor\"></path>\n    <path d=\"M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z\" fill=\"currentColor\"></path>\n  </svg>', 'pengampu', 'pengampu', 6, '2025-01-26 16:41:27', '2025-01-26 16:41:27', NULL),
('732e5455-380d-4b20-9d80-0657782c2fcd', NULL, 'Persetujuan Kepala', 'desc', '<svg height=\"20px\" width=\"20px\" version=\"1.1\" id=\"Capa_1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" \n	 viewBox=\"0 0 211.931 211.931\" xml:space=\"preserve\">\n<path d=\"M145.49,199.781H4c-2.209,0-4-1.791-4-4V16.149c0-2.209,1.791-4,4-4h141.49c2.209,0,4,1.791,4,4v43.488l39.477-39.477\n	c1.563-1.562,4.095-1.562,5.657,0l16.136,16.136c1.562,1.563,1.562,4.095,0,5.657l-61.27,61.269v92.559\n	C149.49,197.99,147.699,199.781,145.49,199.781z M8,191.781h133.49v-80.547l-19.313,19.314c-0.514,0.514-1.159,0.878-1.865,1.054\n	l-21.464,5.329c-0.319,0.079-0.643,0.118-0.964,0.118c-0.004,0-0.007,0-0.011,0c-1.048,0-2.069-0.412-2.829-1.171\n	c-0.992-0.992-1.392-2.431-1.054-3.792l5.329-21.464c0.175-0.706,0.54-1.35,1.054-1.865l41.118-41.117V20.149H8V191.781z\n	 M106.826,113.626l-3.459,13.937l13.927-3.458l84.98-84.98l-10.479-10.479L148.491,71.95c-0.055,0.063-0.113,0.125-0.172,0.184\n	L106.826,113.626z M120.084,178.152H25.106c-2.209,0-4-1.791-4-4s1.791-4,4-4h94.978c2.209,0,4,1.791,4,4\n	S122.293,178.152,120.084,178.152z M120.084,155.434H25.106c-2.209,0-4-1.791-4-4s1.791-4,4-4h94.978c2.209,0,4,1.791,4,4\n	S122.293,155.434,120.084,155.434z M83.888,109.997H25.106c-2.209,0-4-1.791-4-4s1.791-4,4-4h58.782c2.209,0,4,1.791,4,4\n	S86.097,109.997,83.888,109.997z M104.555,87.278H25.106c-2.209,0-4-1.791-4-4s1.791-4,4-4h79.449c2.209,0,4,1.791,4,4\n	S106.764,87.278,104.555,87.278z M120.084,41.842H25.106c-2.209,0-4-1.791-4-4s1.791-4,4-4h94.978c2.209,0,4,1.791,4,4\n	S122.293,41.842,120.084,41.842z\"/>\n</svg>', 'persetujuan-kepala', 'persetujuankepala', 5, '2025-01-26 02:49:13', '2025-01-26 02:49:13', NULL),
('743c06c5-123e-41e1-9b54-2a9ddaed4506', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Komponen Perkembangan', 'desc', '<svg width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path opacity=\"0.4\" d=\"M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z\" fill=\"currentColor\"></path>\r\n                                                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z\" fill=\"currentColor\"></path>\r\n                                              </svg>', 'komponen-intervensi', 'komponenintervensi', 2, '2025-01-12 00:58:40', '2025-01-12 00:58:40', NULL),
('7ca9b226-45cb-475d-8a52-0cb192f46cd2', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Gedung Asrama', 'desc', '<svg width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n<path d=\"M14 21.0001V15.0001H10V21.0001M19 9.77818V16.2001C19 17.8802 19 18.7203 18.673 19.362C18.3854 19.9265 17.9265 20.3855 17.362 20.6731C16.7202 21.0001 15.8802 21.0001 14.2 21.0001H9.8C8.11984 21.0001 7.27976 21.0001 6.63803 20.6731C6.07354 20.3855 5.6146 19.9265 5.32698 19.362C5 18.7203 5 17.8802 5 16.2001V9.77753M21 12.0001L15.5668 5.96405C14.3311 4.59129 13.7133 3.9049 12.9856 3.65151C12.3466 3.42894 11.651 3.42899 11.0119 3.65165C10.2843 3.90516 9.66661 4.59163 8.43114 5.96458L3 12.0001\" stroke=\"#000000\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n</svg>', 'gedung-asrama', 'gedung_asrama', 7, '2025-01-25 20:43:56', '2025-01-25 20:43:56', NULL),
('87c3cbf6-0d9f-4c74-9b12-3d772f603272', '3a13cd66-29d4-476e-8398-3fbecbf038df', 'Permission', 'desc', '<svg width=\"20\" class=\"icon-20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\"\r\n                                                xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path opacity=\"0.4\"\r\n                                                    d=\"M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                                <path\r\n                                                    d=\"M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                                <path\r\n                                                    d=\"M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                                <path\r\n                                                    d=\"M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                            </svg>', 'permission', 'permission', 4, '2025-01-12 00:57:53', '2025-01-12 00:57:53', NULL),
('a6cf6e26-e1ea-4271-9fce-82961f3b5ca7', '3a13cd66-29d4-476e-8398-3fbecbf038df', 'Menu', 'menu desc', '<svg width=\"20\" class=\"icon-20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\"\r\n                                                xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path\r\n                                                    d=\"M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                            </svg>', 'menu', 'menu', 2, '2025-01-12 07:15:49', NULL, NULL),
('acf5f180-8c43-4795-ad3e-7b32c1307afc', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Kategori PPKS', 'desc', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 20 20\">\r\n    <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M7.33049 2.00049H16.6695C20.0705 2.00049 21.9905 3.92949 22.0005 7.33049V16.6705C22.0005 20.0705 20.0705 22.0005 16.6695 22.0005H7.33049C3.92949 22.0005 2.00049 20.0705 2.00049 16.6705V7.33049C2.00049 3.92949 3.92949 2.00049 7.33049 2.00049ZM12.0495 17.8605C12.4805 17.8605 12.8395 17.5405 12.8795 17.1105V6.92049C12.9195 6.61049 12.7705 6.29949 12.5005 6.13049C12.2195 5.96049 11.8795 5.96049 11.6105 6.13049C11.3395 6.29949 11.1905 6.61049 11.2195 6.92049V17.1105C11.2705 17.5405 11.6295 17.8605 12.0495 17.8605ZM16.6505 17.8605C17.0705 17.8605 17.4295 17.5405 17.4805 17.1105V13.8305C17.5095 13.5095 17.3605 13.2105 17.0895 13.0405C16.8205 12.8705 16.4805 12.8705 16.2005 13.0405C15.9295 13.2105 15.7805 13.5095 15.8205 13.8305V17.1105C15.8605 17.5405 16.2195 17.8605 16.6505 17.8605ZM8.21949 17.1105C8.17949 17.5405 7.82049 17.8605 7.38949 17.8605C6.95949 17.8605 6.59949 17.5405 6.56049 17.1105V10.2005C6.53049 9.88949 6.67949 9.58049 6.95049 9.41049C7.21949 9.24049 7.56049 9.24049 7.83049 9.41049C8.09949 9.58049 8.25049 9.88949 8.21949 10.2005V17.1105Z\" fill=\"currentColor\" />', 'kategori-kkps', 'kategorikkps', 6, '2025-01-12 01:02:19', '2025-01-12 01:02:19', NULL),
('c7a72709-ae65-492e-aebe-17083963f400', NULL, 'PPKS', 'Pemerlu Pelayanan Kesejahteraan Sosial', '<svg width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M15.8 21C15.8 21.3866 16.1134 21.7 16.5 21.7C16.8866 21.7 17.2 21.3866 17.2 21H15.8ZM4.8 21C4.8 21.3866 5.1134 21.7 5.5 21.7C5.8866 21.7 6.2 21.3866 6.2 21H4.8ZM6.2 18C6.2 17.6134 5.8866 17.3 5.5 17.3C5.1134 17.3 4.8 17.6134 4.8 18H6.2ZM12.3 21C12.3 21.3866 12.6134 21.7 13 21.7C13.3866 21.7 13.7 21.3866 13.7 21H12.3ZM13.7 18C13.7 17.6134 13.3866 17.3 13 17.3C12.6134 17.3 12.3 17.6134 12.3 18H13.7ZM11.7429 11.3125L11.3499 10.7333L11.3499 10.7333L11.7429 11.3125ZM16.2429 11.3125L15.8499 10.7333L15.8499 10.7333L16.2429 11.3125ZM3.2 21V19.5H1.8V21H3.2ZM8 14.7H11V13.3H8V14.7ZM15.8 19.5V21H17.2V19.5H15.8ZM11 14.7C13.651 14.7 15.8 16.849 15.8 19.5H17.2C17.2 16.0758 14.4242 13.3 11 13.3V14.7ZM3.2 19.5C3.2 16.849 5.34903 14.7 8 14.7V13.3C4.57583 13.3 1.8 16.0758 1.8 19.5H3.2ZM11 14.7H15.5V13.3H11V14.7ZM20.3 19.5V21H21.7V19.5H20.3ZM15.5 14.7C18.151 14.7 20.3 16.849 20.3 19.5H21.7C21.7 16.0758 18.9242 13.3 15.5 13.3V14.7ZM6.2 21V18H4.8V21H6.2ZM13.7 21V18H12.3V21H13.7ZM9.5 11.3C7.67746 11.3 6.2 9.82255 6.2 8.00001H4.8C4.8 10.5958 6.90426 12.7 9.5 12.7V11.3ZM6.2 8.00001C6.2 6.17746 7.67746 4.7 9.5 4.7V3.3C6.90426 3.3 4.8 5.40427 4.8 8.00001H6.2ZM9.5 4.7C11.3225 4.7 12.8 6.17746 12.8 8.00001H14.2C14.2 5.40427 12.0957 3.3 9.5 3.3V4.7ZM12.8 8.00001C12.8 9.13616 12.2264 10.1386 11.3499 10.7333L12.1358 11.8918C13.3801 11.0477 14.2 9.61973 14.2 8.00001H12.8ZM11.3499 10.7333C10.8225 11.091 10.1867 11.3 9.5 11.3V12.7C10.4757 12.7 11.3839 12.4019 12.1358 11.8918L11.3499 10.7333ZM14 4.7C15.8225 4.7 17.3 6.17746 17.3 8.00001H18.7C18.7 5.40427 16.5957 3.3 14 3.3V4.7ZM17.3 8.00001C17.3 9.13616 16.7264 10.1386 15.8499 10.7333L16.6358 11.8918C17.8801 11.0477 18.7 9.61973 18.7 8.00001H17.3ZM15.8499 10.7333C15.3225 11.091 14.6867 11.3 14 11.3V12.7C14.9757 12.7 15.8839 12.4019 16.6358 11.8918L15.8499 10.7333ZM11.9378 5.42349C12.5029 4.97049 13.2189 4.7 14 4.7V3.3C12.8892 3.3 11.8667 3.68622 11.0622 4.33114L11.9378 5.42349ZM14 11.3C13.3133 11.3 12.6775 11.091 12.1501 10.7333L11.3642 11.8918C12.1161 12.4019 13.0243 12.7 14 12.7V11.3Z\" fill=\"#000000\"/></svg>', 'pasien', 'pasien', 3, '2025-01-12 01:08:49', '2025-01-12 01:08:49', NULL),
('c99c4fd3-5f04-4ef6-8816-38318f650e67', '3a13cd66-29d4-476e-8398-3fbecbf038df', 'Data Pengguna', 'desc', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\">\n                                                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.294 7.29105C17.294 10.2281 14.9391 12.5831 12 12.5831C9.0619 12.5831 6.70601 10.2281 6.70601 7.29105C6.70601 4.35402 9.0619 2 12 2C14.9391 2 17.294 4.35402 17.294 7.29105ZM12 22C7.66237 22 4 21.295 4 18.575C4 15.8539 7.68538 15.1739 12 15.1739C16.3386 15.1739 20 15.8789 20 18.599C20 21.32 16.3146 22 12 22Z\" fill=\"currentColor\" />\n                                              </svg>', 'pengguna', 'pengguna', 2, '2025-01-12 00:54:01', '2025-01-12 00:54:01', NULL),
('e198201a-f571-46c0-af86-d60876285041', '3a13cd66-29d4-476e-8398-3fbecbf038df', 'Data Akses<br>Pengguna', 'desc', '<svg width=\"20\" class=\"icon-20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\"\r\n                                                xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path\r\n                                                    d=\"M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                            </svg>', 'data-akses-pengguna', 'dataaksespengguna', 3, '2025-01-12 00:55:09', '2025-01-12 00:55:09', NULL),
('e7c6d36b-0b6e-45e5-afec-7ea29f18dcdf', NULL, 'Assessment', 'desc', '<svg fill=\"#000000\" width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"m11.997 1.771h-.001c-5.647 0-10.226 4.578-10.226 10.226s4.578 10.226 10.226 10.226c5.647 0 10.226-4.578 10.226-10.226 0-5.647-4.578-10.225-10.225-10.226zm.198 2.252c.801 0 1.45.649 1.45 1.45s-.649 1.45-1.45 1.45-1.45-.649-1.45-1.45c0-.801.649-1.45 1.45-1.45zm5.307 3.668c-.087.117-.216.199-.364.223h-.003l-3.445.53c-.03.002-.056.017-.074.038-.018.022.343 4.274.343 4.274l1.958 5.337c.055.104.087.226.087.357 0 .295-.165.551-.407.681l-.004.002c-.074.033-.161.053-.253.053-.001 0-.001 0-.002 0-.33-.016-.608-.224-.728-.513l-.002-.006s-2.508-5.691-2.522-5.734c-.016-.047-.06-.081-.112-.081-.048 0-.088.031-.103.074v.001c-.014.041-2.522 5.734-2.522 5.734-.121.294-.399.501-.727.518h-.002c-.001 0-.001 0-.002 0-.091 0-.178-.019-.256-.054l.004.002c-.176-.08-.308-.229-.364-.411l-.001-.005c-.025-.078-.04-.168-.04-.261 0-.133.029-.258.082-.371l-.002.005s1.91-5.165 1.911-5.174l.355-4.363c0-.003 0-.006 0-.01 0-.054-.04-.099-.092-.107h-.001l-3.36-.52c-.271-.043-.475-.275-.475-.554 0-.31.251-.561.561-.561.03 0 .06.002.089.007h-.003l3.223.498h3.421c.007.002.015.003.024.003s.016-.001.024-.003h-.001l3.244-.497c.024-.004.052-.006.08-.006.28 0 .513.203.56.47v.003c.004.026.007.057.007.088 0 .124-.04.238-.109.33l.001-.002z\"/><path d=\"m12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12c0-6.627-5.373-12-12-12zm0 22.975c-.001 0-.003 0-.004 0-6.064 0-10.979-4.916-10.979-10.979s4.916-10.979 10.979-10.979c6.064 0 10.979 4.916 10.979 10.979v.004c-.002 6.061-4.915 10.973-10.975 10.975z\"/></svg>', 'assessement', 'assessement', 4, '2025-01-12 01:07:36', '2025-01-12 01:07:36', NULL),
('e8de949f-0364-418a-9462-c6fb69cd9a37', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Data Wilayah', 'desc', '<i class=\"icon\">\r\n                                            <svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" class=\"icon-20\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\"><path d=\"M21.4354 2.58198C20.9352 2.0686 20.1949 1.87734 19.5046 2.07866L3.408 6.75952C2.6797 6.96186 2.16349 7.54269 2.02443 8.28055C1.88237 9.0315 2.37858 9.98479 3.02684 10.3834L8.0599 13.4768C8.57611 13.7939 9.24238 13.7144 9.66956 13.2835L15.4329 7.4843C15.723 7.18231 16.2032 7.18231 16.4934 7.4843C16.7835 7.77623 16.7835 8.24935 16.4934 8.55134L10.72 14.3516C10.2918 14.7814 10.2118 15.4508 10.5269 15.9702L13.6022 21.0538C13.9623 21.6577 14.5826 22 15.2628 22C15.3429 22 15.4329 22 15.513 21.9899C16.2933 21.8893 16.9135 21.3558 17.1436 20.6008L21.9156 4.52479C22.1257 3.84028 21.9356 3.09537 21.4354 2.58198Z\" fill=\"currentColor\"></path></svg>\r\n                                        </i>', 'data-wilayah', 'datawilayah', 3, '2025-01-12 02:48:46', NULL, NULL),
('f109e8d8-796c-4bcb-922e-01ed5f6d7040', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Status', 'status', '<svg class=\"icon-20\" width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">                                    <path d=\"M15.7161 16.2234H8.49609\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>                                    <path d=\"M15.7161 12.0369H8.49609\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>                                    <path d=\"M11.2521 7.86011H8.49707\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>                                    <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>                                </svg>', 'status-usulan', 'status_usulan', 6, '2025-01-25 19:56:03', '2025-01-25 19:56:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_11_002601_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-01-11 16:43:21', '2025-01-11 16:43:21'),
(2, 'koordinator', 'web', '2025-01-11 16:53:30', '2025-01-11 16:53:30'),
(3, 'anggota', 'web', '2025-01-11 16:53:30', '2025-01-11 16:53:30'),
(4, 'kepala', 'web', '2025-01-11 16:53:30', '2025-01-11 16:53:30'),
(5, 'assessment', 'web', '2025-01-11 16:53:30', '2025-01-11 16:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_agama`
--
ALTER TABLE `laksa_ms_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_aspek`
--
ALTER TABLE `laksa_ms_aspek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_form_assessment`
--
ALTER TABLE `laksa_ms_form_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_form_assessment_sub`
--
ALTER TABLE `laksa_ms_form_assessment_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_gedung`
--
ALTER TABLE `laksa_ms_gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_jenis_bantuan`
--
ALTER TABLE `laksa_ms_jenis_bantuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_jenis_rujukan`
--
ALTER TABLE `laksa_ms_jenis_rujukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_kabupaten_kota`
--
ALTER TABLE `laksa_ms_kabupaten_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_kategori_ppks`
--
ALTER TABLE `laksa_ms_kategori_ppks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_kategori_ppks_sub`
--
ALTER TABLE `laksa_ms_kategori_ppks_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_kategori_ppks_sub_old`
--
ALTER TABLE `laksa_ms_kategori_ppks_sub_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_kecamatan`
--
ALTER TABLE `laksa_ms_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_komponen_intervensi`
--
ALTER TABLE `laksa_ms_komponen_intervensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_pegawai`
--
ALTER TABLE `laksa_ms_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_pendidikan`
--
ALTER TABLE `laksa_ms_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_pengampu`
--
ALTER TABLE `laksa_ms_pengampu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_persyaratan`
--
ALTER TABLE `laksa_ms_persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_petugas`
--
ALTER TABLE `laksa_ms_petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_ppks`
--
ALTER TABLE `laksa_ms_ppks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_provinsi`
--
ALTER TABLE `laksa_ms_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_status`
--
ALTER TABLE `laksa_ms_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_sumber_rujukan`
--
ALTER TABLE `laksa_ms_sumber_rujukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_tr_assessment`
--
ALTER TABLE `laksa_tr_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_tr_assessment_value`
--
ALTER TABLE `laksa_tr_assessment_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_tr_non_residensial`
--
ALTER TABLE `laksa_tr_non_residensial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_tr_rehabilitasi`
--
ALTER TABLE `laksa_tr_rehabilitasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_tr_rehabilitasi_perkembangan`
--
ALTER TABLE `laksa_tr_rehabilitasi_perkembangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_tr_rehabilitasi_perkembangan_nilai`
--
ALTER TABLE `laksa_tr_rehabilitasi_perkembangan_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_tr_residensial`
--
ALTER TABLE `laksa_tr_residensial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_tr_status`
--
ALTER TABLE `laksa_tr_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
