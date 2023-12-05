-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 11:45 AM
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
-- Database: `sewamobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(1, 'Toyota'),
(2, 'Honda'),
(4, 'Daihatsu');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `plat_nomor` char(10) NOT NULL,
  `id_merk` int(11) DEFAULT NULL,
  `nama_mobil` varchar(50) DEFAULT NULL,
  `tahun_produksi` year(4) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`plat_nomor`, `id_merk`, `nama_mobil`, `tahun_produksi`, `harga`) VALUES
('BK 1 SU', 1, 'Land Cruiser', '2019', 10000000),
('BK 123 SW', 4, 'XENIA', '2017', 100000),
('BK 1993 WT', 1, 'HAICE', '2013', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `nik` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `kode_unik` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`nik`, `nama_pelanggan`, `alamat`, `no_hp`, `kode_unik`) VALUES
('12092212321230004', 'Jhon Doe Smith', 'Medan', '082367549908', 'jhon1'),
('22091020230003', 'Rent', 'Medan', '082367549908', 'rent123');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_transaksi` int(11) NOT NULL,
  `pelanggan` varchar(20) DEFAULT NULL,
  `plat_mobil` char(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `desk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id_transaksi`, `pelanggan`, `plat_mobil`, `tanggal`, `lama`, `total_bayar`, `desk`) VALUES
(3, '12092212321230004', 'BK 123 SW', '2023-11-30', 2, 200000, 'Pesanan Telah Dikonfirmasi'),
(4, '12092212321230004', 'BK 1 SU', '2023-11-29', 1, 10000000, 'Pesanan Telah Dikonfirmasi'),
(6, '22091020230003', 'BK 1993 WT', '2023-11-30', 1, 150000, 'Pesanan Telah Dikonfirmasi'),
(8, '12092212321230004', 'BK 1993 WT', '2023-12-01', 1, 150000, 'Pesanan Telah Dikonfirmasi'),
(9, '22091020230003', 'BK 1 SU', '2023-11-30', 1, 10000000, 'Pesanan Telah Dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `pelanggan` varchar(20) DEFAULT NULL,
  `plat_mobil` char(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `pelanggan`, `plat_mobil`, `tanggal`, `lama`, `total_bayar`) VALUES
(1, '12092212321230004', 'BK 123 SW', '2023-11-28', 1, 100000),
(3, '12092212321230004', 'BK 123 SW', '2023-11-30', 2, 200000),
(4, '12092212321230004', 'BK 1 SU', '2023-11-29', 1, 10000000),
(6, '22091020230003', 'BK 1993 WT', '2023-11-30', 1, 150000),
(8, '12092212321230004', 'BK 1993 WT', '2023-12-01', 1, 150000),
(9, '22091020230003', 'BK 1 SU', '2023-11-30', 1, 10000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`plat_nomor`),
  ADD KEY `merk` (`id_merk`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352235236;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `merk` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
