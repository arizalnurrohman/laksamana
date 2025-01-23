-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 10:58 PM
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
  `parent_id` varchar(36) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_kategori_ppks_sub`
--

INSERT INTO `laksa_ms_kategori_ppks_sub` (`id`, `kategori_id`, `sub_kategori_ppks`, `parent_id`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
('00280bc9-2f1a-452b-2d61-2a9b89e27fd7', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang dieksploitasi secara ekonomi', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('00505551-5658-82b1-855e-306902da3178', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dalam kondisi kritis yang membutuhkan akses ke layanan kesehatan', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('044ff0e9-439e-124e-8ef8-202485b34bd5', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Kejahatan Seksual', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('13157c96-d3f6-429f-864e-7edcab14b468', 'b1895989-f137-4421-83bc-59206516da7f', 'Ragam Penyandang Disabilitas', NULL, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('13462ab7-5874-4fad-b131-e07e75c4ff72', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'asd', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 5, '2025-01-23 06:38:57', '2025-01-23 06:39:03', '2025-01-23 06:39:03'),
('1a482f35-6bf4-18da-0a2d-fe5ba1dc757b', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Perdagangan', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('25fe3af7-841a-7dbd-833e-43cd00e773f7', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Kekerasan Fisik', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('2867514a-9631-4f5e-66ac-2c39720f3f1d', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Jaringan Terorisme', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('2bc64477-9b2b-263a-88b7-e456d8d3707b', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Perlakuan Salah', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('2cbb13f2-016e-4cbc-4aca-c04c681d2e7f', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Penjualan', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('3c11bd19-0685-47c3-837c-f0e631f05fce', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Yang lain:', '5332d470-4c5d-4df2-98d5-45b60805c978', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('3c77ed14-604b-7313-5afe-914a4274632c', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Penyandang Disabilitas', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('3f519a01-5eee-7e7a-a64f-ab6095bca4e8', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Yang Menjadi Korban penyalahgunaan narkotika, alkohol,psikotoprika,dan zat adiktif lainnya', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('44e0d44d-c96e-4afa-9caf-0395c12d0c7a', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Diversi', '5332d470-4c5d-4df2-98d5-45b60805c978', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('4aebdf03-5293-4724-a3d8-f9f2fca857d9', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'No. Putusan Pengadilan', NULL, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('4eb28eab-7561-5e7e-42a5-c3ac2bfc114d', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Penculikan', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('5332d470-4c5d-4df2-98d5-45b60805c978', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Jenis Rujukan', NULL, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('62ca4c60-5969-0123-66cc-4f71220460ae', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dalam situasi darurat', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('8caad3d7-f8b7-4c01-8c95-4f2f973a4539', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Pelaku', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('8e381881-7053-7ac7-7234-9aaeb0767883', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dengan perilaku sosial menyimpang', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('8ec2abaf-6011-3f17-910b-01e8b13a0dfa', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dengan HIV/AIDS', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('90d1388a-2fe5-0d7d-100c-57bb59112fb3', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dari kelompok minoritas dan terisolasi', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('90f783ce-4070-8aa8-701b-25c10b9b6fb1', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang dieksploitasi secara seksual', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('928718ec-6054-4bb7-8b84-7b1feda36b28', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Korban', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 4, '2025-01-23 06:51:27', '2025-01-23 06:51:33', '2025-01-23 06:51:33'),
('95be8e45-0158-a37b-a47b-4aabb7011377', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang berhadapan dengan hukum', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('999c6d0f-821e-48c7-2485-1bdc0c3d6da6', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak yang menjadi korban pornogra', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('9fbf8270-808f-4899-9030-cd8e821f5663', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Pencurian', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('a46a35ed-441c-1350-2476-dd1577fb8d66', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak dengan kasus perundungan (anak korban perundungan, anak pelaku perundungan, dan anak saksi peru', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('a9c1a2fc-dc31-4206-a875-c40a54dbbdac', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Pelecehan/Pencabulan', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ac538596-d6db-4831-b992-e2a7f3315fbe', 'b1895989-f137-4421-83bc-59206516da7f', 'Ragam Disabilitas Fisik', NULL, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ae69c3df-365f-435b-9586-5caeb077a07b', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'asda', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 5, '2025-01-23 07:06:47', '2025-01-23 07:06:50', '2025-01-23 07:06:50'),
('bdb5fc88-e430-47f1-9ba4-cea2cac40244', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Ragam ABH', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('be9a2343-0021-43a7-9c54-46cd1d3832c1', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Hasil Putusan Pengadilan', '5332d470-4c5d-4df2-98d5-45b60805c978', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('bfa75352-310b-4ed7-aeb9-23a28c656143', '1dd96457-c226-4f42-a25b-693c9139823c', 'x', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('c69af842-2173-2229-90d3-3012747ea0ac', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Yatim, Piatu, Yatim Piatu (YAPI)', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('cfa0d589-5395-4fdd-b8f6-ed9532fdfd45', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'asda', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 4, '2025-01-23 06:38:52', '2025-01-23 06:39:07', '2025-01-23 06:39:07'),
('d62b1a10-86be-77d7-5bba-1c179ab20716', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Yang Menjadi Korban stigmatisasi dari pelabelan terkait dengan kondisi orangtuanya', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('d7c8f643-5ec6-42fb-a3ea-8c5c787ad1b5', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Korban', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('d87128fc-6a4b-4233-a4a0-472c59095c19', '1dd96457-c226-4f42-a25b-693c9139823c', 'Ragam Anak (AMPK)', NULL, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('dc744d90-42a5-47dc-8f57-282675396dde', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Rujukan Dinas Sosial/Masyarakat', '5332d470-4c5d-4df2-98d5-45b60805c978', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('e13f6055-45d9-9e98-85f5-d334093a747f', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Penelantaran', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('e34af134-cceb-4500-87bf-87d4ea98d6e8', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Tambah daa', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 4, '2025-01-23 06:59:10', '2025-01-23 07:06:57', '2025-01-23 07:06:57'),
('e4b07705-7562-4fa5-b77f-3338802a9645', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Persetubuhan', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ea22e5d0-256f-40c7-9644-d7ec4b0f2d17', '1dd96457-c226-4f42-a25b-693c9139823c', 'Anak Korban Kekerasan Psikis', 'd87128fc-6a4b-4233-a4a0-472c59095c19', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ebc5f1dd-4e2b-4fe2-97be-477291a311dd', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Informasi Kasus', NULL, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('f6d77f80-a4e6-45c4-98cc-86c7dab890dd', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'ABH Saksi', 'bdb5fc88-e430-47f1-9ba4-cea2cac40244', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('f8ce7f6c-e831-4aec-8563-028184567416', '0ab3ef47-e2b3-45e5-896b-7bd037eb0916', 'Trafficking', 'ebc5f1dd-4e2b-4fe2-97be-477291a311dd', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
('ff3bf176-f14f-415d-8d2f-a8d87d70d5f8', '6747b004-ea92-4976-a49c-d8cd2aa4a97a', 'Ragam Kelompok Rentan', NULL, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

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
-- Table structure for table `laksa_ms_pasien`
--

CREATE TABLE `laksa_ms_pasien` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_pasien`
--

INSERT INTO `laksa_ms_pasien` (`id`, `nama_depan`, `nama_belakang`, `nik`, `nokk`, `tmp_lahir`, `tgl_lahir`, `provinsi_id`, `kota_id`, `kecamatan_id`, `kelurahan_desa_id`, `alamat`, `domisili_alamat`, `domisili`, `agama_id`, `pendidikan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('079bef48-704c-4526-9fa0-9669a2f4bc04', 'ariew', 'zal', '123123', '2312312', 'qweqweq', '2025-01-23', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '08ea4954-3895-50d1-673e-7e10be1b4e12', 'qweqwe', 'qwe', '1', 'qwe', '41875d16-08f2-24cc-a568-a17c69655427', '56c193ce-5057-a6d6-a447-3c08a35d00cc', '2025-01-23 08:29:44', '2025-01-23 08:29:44', NULL),
('2f068203-d88f-11ef-8650-244bfebc0c45', 'Arizal', 'Nur Rohman', '1471031302900022', '1471031302900111', 'Wonogiri', '1990-02-13', '75955ed2-4e91-8bfd-47f3-ad69be7212a6', 'b7d47f01-15ac-8493-a774-6bb16a347a42', '93e3aa88-90b0-5cb0-8905-334d97d116ae', NULL, 'jalan brotoseno perum widya perdana lestari blok A.10', 'y', NULL, 'c4091389-34eb-7f56-1b6d-b1934f0115c9', 'fca3a7f1-918f-16b2-64a0-7eb35ac84735', '2025-01-22 07:02:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laksa_ms_pegawai`
--

CREATE TABLE `laksa_ms_pegawai` (
  `id` varchar(36) NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_pegawai`
--

INSERT INTO `laksa_ms_pegawai` (`id`, `nip`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', '1', 'ari', NULL, NULL, NULL),
('2', '2', 'aisha', NULL, NULL, NULL),
('3', '3', 'alesha', NULL, NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laksa_ms_petugas`
--

INSERT INTO `laksa_ms_petugas` (`id`, `pegawai_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', '1', NULL, NULL, NULL),
('2', '2', NULL, NULL, NULL),
('3', '3', NULL, NULL, NULL);

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
-- Table structure for table `laksa_ms_residensial`
--

CREATE TABLE `laksa_ms_residensial` (
  `id` varchar(36) NOT NULL,
  `petugas_id` varchar(36) DEFAULT NULL,
  `tgl_penerimaan` datetime DEFAULT NULL,
  `sumber_id` varchar(36) DEFAULT NULL,
  `pasien_id` varchar(36) DEFAULT NULL,
  `kategori_ppks_id` varchar(36) DEFAULT NULL,
  `masa_layanan` int(11) DEFAULT NULL,
  `rencana_tgl_terminasi` date DEFAULT NULL,
  `pengampu_id` varchar(36) DEFAULT NULL,
  `status` enum('draft','proses','selesai') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('26943d26-2903-4bc3-9076-d759ca061c5c', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Persyaratan', 'desc', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" class=\"icon-20\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\"><path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z\" fill=\"currentColor\"></path></svg>', 'persyaratan', 'persyaratan', 4, '2025-01-15 21:15:30', '2025-01-15 21:15:30', NULL),
('2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', NULL, 'Data Master', 'descrip data master', '<svg width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                        <path d=\"M7 8H4C2.9 8 2 7.1 2 6V4C2 2.9 2.9 2 4 2H7C8.1 2 9 2.9 9 4V6C9 7.1 8.1 8 7 8Z\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M20.8 7H17.2C16.54 7 16 6.45999 16 5.79999V4.20001C16 3.54001 16.54 3 17.2 3H20.8C21.46 3 22 3.54001 22 4.20001V5.79999C22 6.45999 21.46 7 20.8 7Z\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M20.8 14.5H17.2C16.54 14.5 16 13.96 16 13.3V11.7C16 11.04 16.54 10.5 17.2 10.5H20.8C21.46 10.5 22 11.04 22 11.7V13.3C22 13.96 21.46 14.5 20.8 14.5Z\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M9 5H16\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M12.5 5V18C12.5 19.1 13.4 20 14.5 20H16\" fill=\"white\"/>\r\n                                        <path d=\"M12.5 5V18C12.5 19.1 13.4 20 14.5 20H16\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M12.5 12.5H16\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-miterlimit=\"10\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M20.8 22H17.2C16.54 22 16 21.46 16 20.8V19.2C16 18.54 16.54 18 17.2 18H20.8C21.46 18 22 18.54 22 19.2V20.8C22 21.46 21.46 22 20.8 22Z\" stroke=\"#292D32\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        </svg>', '#', 'datamaster', 8, '2025-01-12 02:46:19', NULL, NULL),
('36267512-8a78-42a4-b432-edb473d729ea', NULL, 'Residensial', 'keterangan Residensial', '<svg width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" class=\"icon-20\" height=\"20\"><path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M19.761 12.001C19.761 12.8145 20.429 13.4764 21.25 13.4764C21.664 13.4764 22 13.8093 22 14.2195V16.8958C22 19.159 20.142 21 17.858 21H6.143C3.859 21 2 19.159 2 16.8958V14.2195C2 13.8093 2.336 13.4764 2.75 13.4764C3.572 13.4764 4.24 12.8145 4.24 12.001C4.24 11.2083 3.599 10.6118 2.75 10.6118C2.551 10.6118 2.361 10.5335 2.22 10.3938C2.079 10.2541 2 10.0648 2 9.86866L2.002 7.10514C2.002 4.84201 3.86 3 6.144 3H17.856C20.14 3 21.999 4.84201 21.999 7.10514L22 9.78245C22 9.97864 21.921 10.1689 21.781 10.3076C21.64 10.4473 21.45 10.5256 21.25 10.5256C20.429 10.5256 19.761 11.1875 19.761 12.001ZM14.252 12.648L15.431 11.5105C15.636 11.3143 15.707 11.025 15.618 10.7575C15.53 10.4899 15.3 10.2997 15.022 10.261L13.393 10.0252L12.664 8.5627C12.539 8.31102 12.285 8.15446 12.002 8.15347H12C11.718 8.15347 11.464 8.31003 11.337 8.56171L10.608 10.0252L8.982 10.26C8.701 10.2997 8.471 10.4899 8.382 10.7575C8.294 11.025 8.365 11.3143 8.569 11.5105L9.748 12.648L9.47 14.2562C9.422 14.5336 9.535 14.8091 9.765 14.9746C9.895 15.0667 10.046 15.1143 10.199 15.1143C10.316 15.1143 10.434 15.0855 10.542 15.0291L12 14.2701L13.455 15.0271C13.707 15.1608 14.006 15.14 14.235 14.9736C14.466 14.8091 14.579 14.5336 14.531 14.2562L14.252 12.648Z\" fill=\"currentColor\"></path></svg>', 'residensial', 'residensial', 1, '2025-01-12 02:35:54', NULL, NULL),
('3a13cd66-29d4-476e-8398-3fbecbf038df', NULL, 'Konfigurasi', 'konf desc', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\">\r\n                                        <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M20.4023 13.58C20.76 13.77 21.036 14.07 21.2301 14.37C21.6083 14.99 21.5776 15.75 21.2097 16.42L20.4943 17.62C20.1162 18.26 19.411 18.66 18.6855 18.66C18.3278 18.66 17.9292 18.56 17.6022 18.36C17.3365 18.19 17.0299 18.13 16.7029 18.13C15.6911 18.13 14.8429 18.96 14.8122 19.95C14.8122 21.1 13.872 22 12.6968 22H11.3069C10.1215 22 9.18125 21.1 9.18125 19.95C9.16081 18.96 8.31259 18.13 7.30085 18.13C6.96361 18.13 6.65702 18.19 6.40153 18.36C6.0745 18.56 5.66572 18.66 5.31825 18.66C4.58245 18.66 3.87729 18.26 3.49917 17.62L2.79402 16.42C2.4159 15.77 2.39546 14.99 2.77358 14.37C2.93709 14.07 3.24368 13.77 3.59115 13.58C3.87729 13.44 4.06125 13.21 4.23498 12.94C4.74596 12.08 4.43937 10.95 3.57071 10.44C2.55897 9.87 2.23194 8.6 2.81446 7.61L3.49917 6.43C4.09191 5.44 5.35913 5.09 6.38109 5.67C7.27019 6.15 8.425 5.83 8.9462 4.98C9.10972 4.7 9.20169 4.4 9.18125 4.1C9.16081 3.71 9.27323 3.34 9.4674 3.04C9.84553 2.42 10.5302 2.02 11.2763 2H12.7172C13.4735 2 14.1582 2.42 14.5363 3.04C14.7203 3.34 14.8429 3.71 14.8122 4.1C14.7918 4.4 14.8838 4.7 15.0473 4.98C15.5685 5.83 16.7233 6.15 17.6226 5.67C18.6344 5.09 19.9118 5.44 20.4943 6.43L21.179 7.61C21.7718 8.6 21.4447 9.87 20.4228 10.44C19.5541 10.95 19.2475 12.08 19.7687 12.94C19.9322 13.21 20.1162 13.44 20.4023 13.58ZM9.10972 12.01C9.10972 13.58 10.4076 14.83 12.0121 14.83C13.6165 14.83 14.8838 13.58 14.8838 12.01C14.8838 10.44 13.6165 9.18 12.0121 9.18C10.4076 9.18 9.10972 10.44 9.10972 12.01Z\" fill=\"currentColor\" />\r\n                                      </svg>', '#', 'konfigurasi', 9, '2025-01-12 07:02:58', NULL, NULL),
('42c50614-5602-4b72-b48c-479a25eaf001', NULL, 'Laporan', 'desc laporan', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">\r\n    <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M8.92574 16.39H14.3119C14.7178 16.39 15.0545 16.05 15.0545 15.64C15.0545 15.23 14.7178 14.9 14.3119 14.9H8.92574C8.5198 14.9 8.18317 15.23 8.18317 15.64C8.18317 16.05 8.5198 16.39 8.92574 16.39ZM12.2723 9.9H8.92574C8.5198 9.9 8.18317 10.24 8.18317 10.65C8.18317 11.06 8.5198 11.39 8.92574 11.39H12.2723C12.6782 11.39 13.0149 11.06 13.0149 10.65C13.0149 10.24 12.6782 9.9 12.2723 9.9ZM19.3381 9.02561C19.5708 9.02292 19.8242 9.02 20.0545 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5099 22 16.0545 22H8.17327C5.59901 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.5 2 7.96535 2H13.2525C13.5099 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.203 9.01 17.0149 9.02C17.4381 9.02 17.8112 9.02316 18.1377 9.02593C18.3917 9.02809 18.6175 9.03 18.8168 9.03C18.9578 9.03 19.1405 9.02789 19.3381 9.02561ZM19.6111 7.566C18.7972 7.569 17.8378 7.566 17.1477 7.559C16.0527 7.559 15.1507 6.648 15.1507 5.542V2.906C15.1507 2.475 15.6685 2.261 15.9646 2.572C16.5004 3.13476 17.2368 3.90834 17.9699 4.67837C18.7009 5.44632 19.4286 6.21074 19.9507 6.759C20.2398 7.062 20.0279 7.565 19.6111 7.566Z\" fill=\"currentColor\" />\r\n  </svg>', 'laporan', 'laporan', 10, '2025-01-12 02:59:24', '2025-01-12 02:59:24', NULL),
('743c06c5-123e-41e1-9b54-2a9ddaed4506', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Komponen Intervensi', 'desc', '<svg width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path opacity=\"0.4\" d=\"M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z\" fill=\"currentColor\"></path>\r\n                                                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z\" fill=\"currentColor\"></path>\r\n                                              </svg>', 'komponen-intervensi', 'komponenintervensi', 2, '2025-01-12 00:58:40', '2025-01-12 00:58:40', NULL),
('87c3cbf6-0d9f-4c74-9b12-3d772f603272', '3a13cd66-29d4-476e-8398-3fbecbf038df', 'Permission', 'desc', '<svg width=\"20\" class=\"icon-20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\"\r\n                                                xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path opacity=\"0.4\"\r\n                                                    d=\"M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                                <path\r\n                                                    d=\"M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                                <path\r\n                                                    d=\"M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                                <path\r\n                                                    d=\"M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                            </svg>', 'permission', 'permission', 4, '2025-01-12 00:57:53', '2025-01-12 00:57:53', NULL),
('a6cf6e26-e1ea-4271-9fce-82961f3b5ca7', '3a13cd66-29d4-476e-8398-3fbecbf038df', 'Menu', 'menu desc', '<svg width=\"20\" class=\"icon-20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\"\r\n                                                xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path\r\n                                                    d=\"M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                            </svg>', 'menu', 'menu', 2, '2025-01-12 07:15:49', NULL, NULL),
('acf5f180-8c43-4795-ad3e-7b32c1307afc', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Kategori PPKS', 'desc', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 20 20\">\r\n    <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M7.33049 2.00049H16.6695C20.0705 2.00049 21.9905 3.92949 22.0005 7.33049V16.6705C22.0005 20.0705 20.0705 22.0005 16.6695 22.0005H7.33049C3.92949 22.0005 2.00049 20.0705 2.00049 16.6705V7.33049C2.00049 3.92949 3.92949 2.00049 7.33049 2.00049ZM12.0495 17.8605C12.4805 17.8605 12.8395 17.5405 12.8795 17.1105V6.92049C12.9195 6.61049 12.7705 6.29949 12.5005 6.13049C12.2195 5.96049 11.8795 5.96049 11.6105 6.13049C11.3395 6.29949 11.1905 6.61049 11.2195 6.92049V17.1105C11.2705 17.5405 11.6295 17.8605 12.0495 17.8605ZM16.6505 17.8605C17.0705 17.8605 17.4295 17.5405 17.4805 17.1105V13.8305C17.5095 13.5095 17.3605 13.2105 17.0895 13.0405C16.8205 12.8705 16.4805 12.8705 16.2005 13.0405C15.9295 13.2105 15.7805 13.5095 15.8205 13.8305V17.1105C15.8605 17.5405 16.2195 17.8605 16.6505 17.8605ZM8.21949 17.1105C8.17949 17.5405 7.82049 17.8605 7.38949 17.8605C6.95949 17.8605 6.59949 17.5405 6.56049 17.1105V10.2005C6.53049 9.88949 6.67949 9.58049 6.95049 9.41049C7.21949 9.24049 7.56049 9.24049 7.83049 9.41049C8.09949 9.58049 8.25049 9.88949 8.21949 10.2005V17.1105Z\" fill=\"currentColor\" />', 'kategori-kkps', 'kategorikkps', 6, '2025-01-12 01:02:19', '2025-01-12 01:02:19', NULL),
('c7a72709-ae65-492e-aebe-17083963f400', NULL, 'Pasien', 'desc', '<svg width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M15.8 21C15.8 21.3866 16.1134 21.7 16.5 21.7C16.8866 21.7 17.2 21.3866 17.2 21H15.8ZM4.8 21C4.8 21.3866 5.1134 21.7 5.5 21.7C5.8866 21.7 6.2 21.3866 6.2 21H4.8ZM6.2 18C6.2 17.6134 5.8866 17.3 5.5 17.3C5.1134 17.3 4.8 17.6134 4.8 18H6.2ZM12.3 21C12.3 21.3866 12.6134 21.7 13 21.7C13.3866 21.7 13.7 21.3866 13.7 21H12.3ZM13.7 18C13.7 17.6134 13.3866 17.3 13 17.3C12.6134 17.3 12.3 17.6134 12.3 18H13.7ZM11.7429 11.3125L11.3499 10.7333L11.3499 10.7333L11.7429 11.3125ZM16.2429 11.3125L15.8499 10.7333L15.8499 10.7333L16.2429 11.3125ZM3.2 21V19.5H1.8V21H3.2ZM8 14.7H11V13.3H8V14.7ZM15.8 19.5V21H17.2V19.5H15.8ZM11 14.7C13.651 14.7 15.8 16.849 15.8 19.5H17.2C17.2 16.0758 14.4242 13.3 11 13.3V14.7ZM3.2 19.5C3.2 16.849 5.34903 14.7 8 14.7V13.3C4.57583 13.3 1.8 16.0758 1.8 19.5H3.2ZM11 14.7H15.5V13.3H11V14.7ZM20.3 19.5V21H21.7V19.5H20.3ZM15.5 14.7C18.151 14.7 20.3 16.849 20.3 19.5H21.7C21.7 16.0758 18.9242 13.3 15.5 13.3V14.7ZM6.2 21V18H4.8V21H6.2ZM13.7 21V18H12.3V21H13.7ZM9.5 11.3C7.67746 11.3 6.2 9.82255 6.2 8.00001H4.8C4.8 10.5958 6.90426 12.7 9.5 12.7V11.3ZM6.2 8.00001C6.2 6.17746 7.67746 4.7 9.5 4.7V3.3C6.90426 3.3 4.8 5.40427 4.8 8.00001H6.2ZM9.5 4.7C11.3225 4.7 12.8 6.17746 12.8 8.00001H14.2C14.2 5.40427 12.0957 3.3 9.5 3.3V4.7ZM12.8 8.00001C12.8 9.13616 12.2264 10.1386 11.3499 10.7333L12.1358 11.8918C13.3801 11.0477 14.2 9.61973 14.2 8.00001H12.8ZM11.3499 10.7333C10.8225 11.091 10.1867 11.3 9.5 11.3V12.7C10.4757 12.7 11.3839 12.4019 12.1358 11.8918L11.3499 10.7333ZM14 4.7C15.8225 4.7 17.3 6.17746 17.3 8.00001H18.7C18.7 5.40427 16.5957 3.3 14 3.3V4.7ZM17.3 8.00001C17.3 9.13616 16.7264 10.1386 15.8499 10.7333L16.6358 11.8918C17.8801 11.0477 18.7 9.61973 18.7 8.00001H17.3ZM15.8499 10.7333C15.3225 11.091 14.6867 11.3 14 11.3V12.7C14.9757 12.7 15.8839 12.4019 16.6358 11.8918L15.8499 10.7333ZM11.9378 5.42349C12.5029 4.97049 13.2189 4.7 14 4.7V3.3C12.8892 3.3 11.8667 3.68622 11.0622 4.33114L11.9378 5.42349ZM14 11.3C13.3133 11.3 12.6775 11.091 12.1501 10.7333L11.3642 11.8918C12.1161 12.4019 13.0243 12.7 14 12.7V11.3Z\" fill=\"#000000\"/></svg>', 'pasien', 'pasien', 3, '2025-01-12 01:08:49', '2025-01-12 01:08:49', NULL),
('c99c4fd3-5f04-4ef6-8816-38318f650e67', '3a13cd66-29d4-476e-8398-3fbecbf038df', 'Data Pengguna', 'desc', '<svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\">\n                                                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.294 7.29105C17.294 10.2281 14.9391 12.5831 12 12.5831C9.0619 12.5831 6.70601 10.2281 6.70601 7.29105C6.70601 4.35402 9.0619 2 12 2C14.9391 2 17.294 4.35402 17.294 7.29105ZM12 22C7.66237 22 4 21.295 4 18.575C4 15.8539 7.68538 15.1739 12 15.1739C16.3386 15.1739 20 15.8789 20 18.599C20 21.32 16.3146 22 12 22Z\" fill=\"currentColor\" />\n                                              </svg>', 'pengguna', 'pengguna', 2, '2025-01-12 00:54:01', '2025-01-12 00:54:01', NULL),
('e198201a-f571-46c0-af86-d60876285041', '3a13cd66-29d4-476e-8398-3fbecbf038df', 'Data Akses<br>Pengguna', 'desc', '<svg width=\"20\" class=\"icon-20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\"\r\n                                                xmlns=\"http://www.w3.org/2000/svg\">\r\n                                                <path\r\n                                                    d=\"M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z\"\r\n                                                    fill=\"currentColor\"></path>\r\n                                            </svg>', 'data-akses-pengguna', 'dataaksespengguna', 3, '2025-01-12 00:55:09', '2025-01-12 00:55:09', NULL),
('e7c6d36b-0b6e-45e5-afec-7ea29f18dcdf', NULL, 'Assessment', 'desc', '<svg fill=\"#000000\" width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"m11.997 1.771h-.001c-5.647 0-10.226 4.578-10.226 10.226s4.578 10.226 10.226 10.226c5.647 0 10.226-4.578 10.226-10.226 0-5.647-4.578-10.225-10.225-10.226zm.198 2.252c.801 0 1.45.649 1.45 1.45s-.649 1.45-1.45 1.45-1.45-.649-1.45-1.45c0-.801.649-1.45 1.45-1.45zm5.307 3.668c-.087.117-.216.199-.364.223h-.003l-3.445.53c-.03.002-.056.017-.074.038-.018.022.343 4.274.343 4.274l1.958 5.337c.055.104.087.226.087.357 0 .295-.165.551-.407.681l-.004.002c-.074.033-.161.053-.253.053-.001 0-.001 0-.002 0-.33-.016-.608-.224-.728-.513l-.002-.006s-2.508-5.691-2.522-5.734c-.016-.047-.06-.081-.112-.081-.048 0-.088.031-.103.074v.001c-.014.041-2.522 5.734-2.522 5.734-.121.294-.399.501-.727.518h-.002c-.001 0-.001 0-.002 0-.091 0-.178-.019-.256-.054l.004.002c-.176-.08-.308-.229-.364-.411l-.001-.005c-.025-.078-.04-.168-.04-.261 0-.133.029-.258.082-.371l-.002.005s1.91-5.165 1.911-5.174l.355-4.363c0-.003 0-.006 0-.01 0-.054-.04-.099-.092-.107h-.001l-3.36-.52c-.271-.043-.475-.275-.475-.554 0-.31.251-.561.561-.561.03 0 .06.002.089.007h-.003l3.223.498h3.421c.007.002.015.003.024.003s.016-.001.024-.003h-.001l3.244-.497c.024-.004.052-.006.08-.006.28 0 .513.203.56.47v.003c.004.026.007.057.007.088 0 .124-.04.238-.109.33l.001-.002z\"/><path d=\"m12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12c0-6.627-5.373-12-12-12zm0 22.975c-.001 0-.003 0-.004 0-6.064 0-10.979-4.916-10.979-10.979s4.916-10.979 10.979-10.979c6.064 0 10.979 4.916 10.979 10.979v.004c-.002 6.061-4.915 10.973-10.975 10.975z\"/></svg>', 'assessement', 'assessement', 4, '2025-01-12 01:07:36', '2025-01-12 01:07:36', NULL),
('e8de949f-0364-418a-9462-c6fb69cd9a37', '2d87fa58-a82b-4e24-a8c5-7fd7377b16b8', 'Data Wilayah', 'desc', '<i class=\"icon\">\r\n                                            <svg fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" class=\"icon-20\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\"><path d=\"M21.4354 2.58198C20.9352 2.0686 20.1949 1.87734 19.5046 2.07866L3.408 6.75952C2.6797 6.96186 2.16349 7.54269 2.02443 8.28055C1.88237 9.0315 2.37858 9.98479 3.02684 10.3834L8.0599 13.4768C8.57611 13.7939 9.24238 13.7144 9.66956 13.2835L15.4329 7.4843C15.723 7.18231 16.2032 7.18231 16.4934 7.4843C16.7835 7.77623 16.7835 8.24935 16.4934 8.55134L10.72 14.3516C10.2918 14.7814 10.2118 15.4508 10.5269 15.9702L13.6022 21.0538C13.9623 21.6577 14.5826 22 15.2628 22C15.3429 22 15.4329 22 15.513 21.9899C16.2933 21.8893 16.9135 21.3558 17.1436 20.6008L21.9156 4.52479C22.1257 3.84028 21.9356 3.09537 21.4354 2.58198Z\" fill=\"currentColor\"></path></svg>\r\n                                        </i>', 'data-wilayah', 'datawilayah', 3, '2025-01-12 02:48:46', NULL, NULL),
('fbea6e50-2edf-4751-adf1-cfb0fc5972cb', NULL, 'Asrama', 'desc', '<svg width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                        <path d=\"M22 22L2 22\" stroke=\"#1C274C\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>\r\n                                        <path d=\"M2 11L6.06296 7.74968M22 11L13.8741 4.49931C12.7784 3.62279 11.2216 3.62279 10.1259 4.49931L9.34398 5.12486\" stroke=\"#1C274C\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>\r\n                                        <path d=\"M15.5 5.5V3.5C15.5 3.22386 15.7239 3 16 3H18.5C18.7761 3 19 3.22386 19 3.5V8.5\" stroke=\"#1C274C\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>\r\n                                        <path d=\"M4 22V9.5\" stroke=\"#1C274C\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>\r\n                                        <path d=\"M20 9.5V13.5M20 22V17.5\" stroke=\"#1C274C\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>\r\n                                        <path d=\"M15 22V17C15 15.5858 15 14.8787 14.5607 14.4393C14.1213 14 13.4142 14 12 14C10.5858 14 9.87868 14 9.43934 14.4393M9 22V17\" stroke=\"#1C274C\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>\r\n                                        <path d=\"M14 9.5C14 10.6046 13.1046 11.5 12 11.5C10.8954 11.5 10 10.6046 10 9.5C10 8.39543 10.8954 7.5 12 7.5C13.1046 7.5 14 8.39543 14 9.5Z\" stroke=\"#1C274C\" stroke-width=\"1.5\"/>\r\n                                        </svg>', 'asrama', 'asrama', 5, '2025-01-12 01:04:33', '2025-01-12 01:04:33', NULL);

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
-- Indexes for table `laksa_ms_kecamatan`
--
ALTER TABLE `laksa_ms_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_pasien`
--
ALTER TABLE `laksa_ms_pasien`
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
-- Indexes for table `laksa_ms_provinsi`
--
ALTER TABLE `laksa_ms_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_residensial`
--
ALTER TABLE `laksa_ms_residensial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laksa_ms_sumber_rujukan`
--
ALTER TABLE `laksa_ms_sumber_rujukan`
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
