-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 03:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tipes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode_booking` varchar(20) NOT NULL,
  `kode_bayar` varchar(20) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `total_harga` double NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `kode_booking`, `kode_bayar`, `metode_pembayaran`, `nama`, `email`, `telepon`, `total_harga`, `tanggal_pemesanan`, `status`) VALUES
(1, 3, 'BK2E2QB04EUQ', 'VANXWLH0KY3H', 'Virtual Account', 'Pemesan', 'pemesan@tipes', '+6222222222222', 1500000, '2021-06-24', 'Lunas'),
(2, NULL, 'BKZD8FOM6N0D', '337012345', 'Bank Transfer', 'Budi', 'budi@mail', '+6281222223333', 2000000, '2021-06-24', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `harga_kelas`
--

CREATE TABLE `harga_kelas` (
  `id_penerbangan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga_kelas`
--

INSERT INTO `harga_kelas` (`id_penerbangan`, `id_kelas`, `harga`) VALUES
(1, 1, 500000),
(1, 2, 1000000),
(1, 3, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'Economy'),
(2, 'Business'),
(3, 'First Class');

-- --------------------------------------------------------

--
-- Table structure for table `penerbangan`
--

CREATE TABLE `penerbangan` (
  `id_penerbangan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_pesawat` varchar(10) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbangan`
--

INSERT INTO `penerbangan` (`id_penerbangan`, `id_user`, `kode_pesawat`, `asal`, `tujuan`, `tanggal_berangkat`, `waktu_berangkat`, `slot`) VALUES
(1, 2, 'TPS001', 'Jakarta', 'Bandung', '2021-06-24', '10:00:00', 97);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'maskapai'),
(3, 'pemesan');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `id_penerbangan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kode_tiket` varchar(20) NOT NULL,
  `harga` double NOT NULL,
  `nama` varchar(70) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_booking`, `id_penerbangan`, `id_kelas`, `kode_tiket`, `harga`, `nama`, `tanggal_lahir`, `status`) VALUES
(1, 1, 1, 1, 'TKW9WP427KK71', 500000, 'Penumpang 1', '2021-06-24', 'Issued'),
(2, 1, 1, 1, 'TKW9WP427KK72', 500000, 'Penumpang 2', '2021-06-24', 'Issued'),
(3, 1, 1, 1, 'TKW9WP427KK73', 500000, 'Penumpang 3', '2021-06-24', 'Issued'),
(4, 2, 1, 2, 'TKTA54CXE5YG1', 1000000, 'Bapak Budi', '1983-06-14', 'Menunggu Pembayaran'),
(5, 2, 1, 2, 'TKTA54CXE5YG2', 1000000, 'Ibu Budi', '1985-09-25', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(64) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_registrasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `email`, `password`, `nama`, `telepon`, `tanggal_lahir`, `tanggal_registrasi`) VALUES
(1, 1, 'admin@tipes', '$2y$10$50KMe1CGaSWvDG8irFkwGeGmh7YOtO3Rq2FYg7/udSrjNZ5N90cjG', 'Administrator', '+6200000000000', NULL, '2021-06-01'),
(2, 2, 'maskapai@tipes', '$2y$10$ndkZ/8BxnjUPsgKpUk942OfKQIQq4xuDXbBfF2en5kF8fIzcaR/BC', 'Tipes Air', '+6211111111111', NULL, '2021-06-01'),
(3, 3, 'pemesan@tipes', '$2y$10$.aWqYg4WW0Ebli987YWrLOxfuJ9KZN.6bWbVbtGFsgQaQ1QqFrZXm', 'Pemesan', '+6222222222222', '2000-01-01', '2021-06-01'),
(4, 3, 'udin@tipes', '$2y$10$KYMouc8s15AwzHsXdzEQKO2Q8o0xIxWQ2oYuB0HTi6IX2FbX3QY2i', 'Udin', '+6212312341234', '2021-06-23', '2021-06-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `harga_kelas`
--
ALTER TABLE `harga_kelas`
  ADD KEY `id_penerbangan` (`id_penerbangan`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `penerbangan`
--
ALTER TABLE `penerbangan`
  ADD PRIMARY KEY (`id_penerbangan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_booking` (`id_booking`),
  ADD KEY `id_penerbangan` (`id_penerbangan`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penerbangan`
--
ALTER TABLE `penerbangan`
  MODIFY `id_penerbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `harga_kelas`
--
ALTER TABLE `harga_kelas`
  ADD CONSTRAINT `harga_kelas_ibfk_1` FOREIGN KEY (`id_penerbangan`) REFERENCES `penerbangan` (`id_penerbangan`),
  ADD CONSTRAINT `harga_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `penerbangan`
--
ALTER TABLE `penerbangan`
  ADD CONSTRAINT `penerbangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`),
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`id_penerbangan`) REFERENCES `penerbangan` (`id_penerbangan`),
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
