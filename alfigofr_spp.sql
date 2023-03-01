-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2023 pada 02.00
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfigofr_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_data`
--

CREATE TABLE `student_data` (
  `student_id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `nisn` char(40) NOT NULL,
  `nis` char(40) NOT NULL,
  `class_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone` char(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `spp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `student_data`
--

INSERT INTO `student_data` (`student_id`, `users_id`, `nisn`, `nis`, `class_id`, `address`, `phone`, `name`, `spp_id`) VALUES
(2, NULL, '1234567890', '123456', 1, 'Tokyo', '081292389150', 'Nana Mizuki', 2),
(3, NULL, '1029384756', '643211', 10, 'Osaka', '083193369236', 'Yuri Tsunematsu', 2),
(4, NULL, '918273645', '535216', 17, 'Yokohama', '083186861394', 'Yuriko Yoshitaka', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_class`
--

CREATE TABLE `tb_class` (
  `class_id` int(11) NOT NULL,
  `class` enum('10','11','12') NOT NULL,
  `major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_class`
--

INSERT INTO `tb_class` (`class_id`, `class`, `major`) VALUES
(1, '10', 'Software Engineering 1'),
(2, '10', 'Software Engineering 2'),
(3, '11', 'Software Engineering 1'),
(4, '11', 'Software Engineering 2'),
(5, '12', 'Software Engineering 1'),
(7, '10', 'Computer Network Engineering 1'),
(8, '10', 'Computer Network Engineering 2'),
(9, '10', 'Computer Network Engineering 3'),
(10, '11', 'Computer Network Engineering 1'),
(11, '11', 'Computer Network Engineering 2'),
(12, '11', 'Computer Network Engineering 3'),
(13, '10', 'Multimedia 1'),
(14, '10', 'Multimedia 2'),
(15, '11', 'Multimedia 1'),
(16, '11', 'Multimedia 2'),
(17, '12', 'Multimedia 1'),
(18, '12', 'Computer Network Engineering 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `year`, `amount`) VALUES
(2, 2023, 115000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `paid_date` date NOT NULL,
  `pay_month` varchar(12) NOT NULL,
  `pay_year` varchar(4) NOT NULL,
  `spp_id` int(11) NOT NULL,
  `pay_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaction`
--

INSERT INTO `tb_transaction` (`id_transaction`, `id_employee`, `nisn`, `paid_date`, `pay_month`, `pay_year`, `spp_id`, `pay_amount`) VALUES
(1, 1, '1234567890', '2023-02-26', 'January', '2023', 2, 115000),
(2, 1, '1234567890', '2023-02-27', 'February', '2023', 2, 115000),
(3, 1, '1234567890', '2023-03-01', 'March', '2023', 2, 115000),
(4, 1, '1234567890', '2023-03-01', 'April', '2023', 2, 115000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Employee','Student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `name`, `username`, `email_address`, `password`, `level`) VALUES
(1, 'Admin SPP', 'admin', 'admin@spp.com', '$2y$10$2zSOwjgM9T5w8jiNGNdKSOjxIsdwfvFwVO9iSVflrnjoMlJ05xFmW', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`student_id`);

--
-- Indeks untuk tabel `tb_class`
--
ALTER TABLE `tb_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indeks untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indeks untuk tabel `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `student_data`
--
ALTER TABLE `student_data`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_transaction`
--
ALTER TABLE `tb_transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
