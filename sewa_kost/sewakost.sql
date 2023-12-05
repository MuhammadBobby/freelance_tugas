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
-- Database: `sewakost`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar_kost`
--

CREATE TABLE `kamar_kost` (
  `id_kamar` int(11) NOT NULL,
  `harga_sewa` int(11) DEFAULT NULL,
  `fasilitas` varchar(225) DEFAULT NULL,
  `status` enum('tersedia','disewa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar_kost`
--

INSERT INTO `kamar_kost` (`id_kamar`, `harga_sewa`, `fasilitas`, `status`) VALUES
(1, 600000, 'kamar mandi dan dapur', 'tersedia'),
(2, 600000, 'kamar mandi dan dapur', 'disewa');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_transaksi` int(11) NOT NULL,
  `id_penyewa` varchar(20) DEFAULT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `desk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_transaksi`, `id_penyewa`, `id_kamar`, `tanggal_pembayaran`, `jumlah_bayar`, `desk`) VALUES
(3, '1234575432', 1, '2023-12-01', 600000, 'Pesanan Telah Dikonfirmasi'),
(5, '12094556870004', 2, '2023-12-01', 600000, 'Pesanan Telah Dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `nik` varchar(15) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `kode_sewa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`nik`, `nama`, `alamat`, `no_hp`, `kode_sewa`) VALUES
('12094556870004', 'Admin', 'Medan', '086578654567', '123'),
('123456789', 'Admin2', 'Medan', '4125235235235', 'admin2'),
('1234575432', 'Rent', 'Jl.Gagak Hitam No.25, Pekan Baru, Riau', '+6282345547810', 'rent1');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_penyewa` varchar(15) DEFAULT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_penyewa`, `id_kamar`, `tanggal_pembayaran`, `jumlah_bayar`) VALUES
(3, '1234575432', 1, '2023-12-01', 600000),
(5, '12094556870004', 2, '2023-12-01', 600000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar_kost`
--
ALTER TABLE `kamar_kost`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK3` (`id_penyewa`),
  ADD KEY `FK4` (`id_kamar`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`nik`) USING BTREE;

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK_transaksi_penyewa` (`id_penyewa`),
  ADD KEY `FK_transaksi_kamar_kost` (`id_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK4` FOREIGN KEY (`id_kamar`) REFERENCES `kamar_kost` (`id_kamar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_transaksi_kamar_kost` FOREIGN KEY (`id_kamar`) REFERENCES `kamar_kost` (`id_kamar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_transaksi_penyewa` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
