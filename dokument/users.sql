-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 12:29 AM
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$AtoRrg4t852LoJ4lJXioIeu/jQvXM.R7KaNqZVmzX1.xOIx21PBWW', NULL, '2025-02-06 16:11:40', '2025-02-06 16:11:40'),
(2, 'Kepala Sentra', 'kepala_sentra@gmail.com', NULL, '$2y$12$c0g5YWRFj9x1KI./jfgboeO9GtpOI2ZPT7I23BrweeB3nUlCpJJZq', NULL, '2025-02-09 00:46:03', '2025-02-09 00:46:03'),
(4, 'abrar', 'abrar@gmail.com', NULL, '$2y$12$pDNw7OGh/hbsv15zo.zebuswGsX1zgYDnvMQSgF924M1I2qOP9Euy', NULL, '2025-02-09 23:24:14', '2025-02-09 23:24:14'),
(6, 'Lisdawati', 'lisdawati@gmail.com', NULL, '$2y$12$earaTYA7ZwIWXR22xt613eGYHTpzcclzHpm6e2irv4VEjiPbegn.e', NULL, '2025-02-09 23:27:11', '2025-02-09 23:27:11'),
(8, 'Pondong Pangayoman', 'pondong@gmail.com', NULL, '$2y$12$Kc1wIO8hy3AlMiX7nCNLuOTeyuZFwyWfD2g/mowz6ZfGKf2aZ7aIe', NULL, '2025-02-11 07:23:16', '2025-02-11 07:23:16'),
(9, 'Suyono', 'suyono@gmail.com', NULL, '$2y$12$QrPbE6YKRoSrzn.HHdCWLOo1OwzHN17JSi.blSjpk7wPFPd9BCMzW', NULL, '2025-02-11 07:24:19', '2025-02-11 07:24:19'),
(10, 'Ekagrata', 'ekagrata@gmail.com', NULL, '$2y$12$RDRBbYzl4CdklMNWoxdXy.XVv4EkHmDIeq6pChzRWbL3EFFpbEvka', NULL, '2025-02-11 07:25:05', '2025-02-11 07:25:05'),
(11, 'Galih Suseno', 'galih@gmail.com', NULL, '$2y$12$DkssxiRWsxXRh1qdORB7l.9d8v3hWZfM2PX/9OFH5bTYLCox/x2h2', NULL, '2025-02-11 08:25:54', '2025-02-11 08:25:54'),
(12, 'Juli Kurniati', 'julikurniati@gmail.com', NULL, '$2y$12$kbsH13hV0kKINuraHD7tpeCNUJQ8r94FVQKhGQMD0Sz6lBDqmLMIC', NULL, '2025-02-11 08:27:07', '2025-02-11 08:27:07'),
(13, 'Rakhmat Ariyanto', 'rakhmat@gmail.com', NULL, '$2y$12$TbRXU1gID6ItGHMpZ9pUauXk818DxNtWfvqG7pSospG7GPzZRDwGG', NULL, '2025-02-11 08:28:11', '2025-02-11 08:28:11'),
(14, 'Tien Septemberiawati Dwi Syah Putri', 'tien@gmail.com', NULL, '$2y$12$Po1gNd6W/vhtImbf.UY.guV7MgSHYLB.1l7LHQWRByiLUDZQ7Vzpe', NULL, '2025-02-11 08:29:03', '2025-02-11 08:29:03'),
(15, 'Tri Cahyadi Achmad', 'tricahyadi@gmail.com', NULL, '$2y$12$G/5P3GqDrDrC7U1KKSOlheY5niQOzBmm8IhMBiU.PSQLRwGtP4wjm', NULL, '2025-02-11 08:29:59', '2025-02-11 08:29:59'),
(16, 'Kasea Tumangger', 'kasea@gmail.com', NULL, '$2y$12$eNd8e0P04eSKadEGUG8Gqe33w53AvdoVEbm5qLfRWw7.hfRuUcDFy', NULL, '2025-02-11 08:31:48', '2025-02-11 08:31:48'),
(17, 'Riang Kasih Zebua', 'riang@gmail.com', NULL, '$2y$12$mPFnUz9.KcAV3wGUS9x56Ov61qtqakDMJC...8Ws4kCgXmPRzWnOO', NULL, '2025-02-11 08:32:38', '2025-02-11 08:32:38'),
(18, 'Reno Putri Sari', 'reno@gmail.com', NULL, '$2y$12$s2CzOrMagpeZNQuH4kh1j.yIsoo5bxDUEgxogvoyBj5Bj8kvEi/ku', NULL, '2025-02-11 08:33:28', '2025-02-11 08:33:28'),
(19, 'Mami Sulfita Nur', 'mami@gmail.com', NULL, '$2y$12$27Vb/L6DJWA9ij.nZuCf.OcA/mwz5XcUXTFOkgT.OpH8a6lCYbal.', NULL, '2025-02-11 08:34:07', '2025-02-11 08:34:07');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
