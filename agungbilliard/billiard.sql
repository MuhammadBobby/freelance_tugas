-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dbbilliard
CREATE DATABASE IF NOT EXISTS `dbbilliard` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbbilliard`;

-- Dumping structure for table dbbilliard.tbl_meja
CREATE TABLE IF NOT EXISTS `tbl_meja` (
  `id_meja` int(11) NOT NULL AUTO_INCREMENT,
  `nama_meja` varchar(50) DEFAULT NULL,
  `status_meja` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dbbilliard.tbl_meja: ~4 rows (approximately)
INSERT INTO `tbl_meja` (`id_meja`, `nama_meja`, `status_meja`) VALUES
	(1, 'Meja 1', NULL),
	(2, 'Meja 2', NULL),
	(3, 'Meja 3', NULL),
	(4, 'Meja 4', NULL);

-- Dumping structure for table dbbilliard.tbl_pelanggan
CREATE TABLE IF NOT EXISTS `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `alamat_pelanggan` varchar(255) DEFAULT NULL,
  `telepon_pelanggan` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dbbilliard.tbl_pelanggan: ~2 rows (approximately)
INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`) VALUES
	(1, 'Agung', 'Johor', '082249581195'),
	(2, 'Agung', 'Johor', '082249581195');

-- Dumping structure for table dbbilliard.tbl_petugas
CREATE TABLE IF NOT EXISTS `tbl_petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dbbilliard.tbl_petugas: ~3 rows (approximately)
INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`) VALUES
	(1, 'Adrian'),
	(2, 'Haikal'),
	(3, 'Aldi'),
	(4, 'Alif');

-- Dumping structure for table dbbilliard.tbl_transaksi
CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_meja` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `waktu_mulai` date DEFAULT NULL,
  `waktu_selesai` date DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `status_pembayaran` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_meja` (`id_meja`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_petugas` (`id_petugas`),
  CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `tbl_meja` (`id_meja`),
  CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`),
  CONSTRAINT `tbl_transaksi_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table dbbilliard.tbl_transaksi: ~2 rows (approximately)
INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_meja`, `id_pelanggan`, `id_petugas`, `waktu_mulai`, `waktu_selesai`, `total_harga`, `status_pembayaran`) VALUES
	(9, 1, 1, NULL, '2023-12-12', '2023-12-12', 100000.00, 'Lunas'),
	(10, 1, 1, NULL, '2023-12-12', '2023-12-12', 100000.00, 'Lunas');

-- Dumping structure for table dbbilliard.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `email` varchar(50) NOT NULL,
  `passwordd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbbilliard.tbl_user: ~15 rows (approximately)
INSERT INTO `tbl_user` (`email`, `passwordd`) VALUES
	('ad@gmail.com', '$2y$10$wkTgYGsMJUBZ7e4zHuHOteemgjngQ4VlPTiO0PPxJc2'),
	('admin@gmail.com', '$2y$10$.Qys73BG3vjjeTm.eivHm.krlDV8TsJhC/v7QIk5NOb'),
	('admin@gmail.com', '$2y$10$sJrNx1A/vLaa0qvg/avETOHiLhV1X26DFPiInfV07Zw'),
	('min@gmail.com', '$2y$10$VIKUY1kJOKNBtlxvko37/eqZVGbGUEAQLTclqhl64h9'),
	('min@gmail.com', '$2y$10$SyE5PWFtZWuSmxb0Jg2p/.gIvgJ8u7umNd7ljV8mHwp'),
	('min@gmail.com', '$2y$10$cKPJBwmgjeX.o5kdUGT5guFHueXIJ9h.EcHFR18Pqy7'),
	('admin@gmail.com', '$2y$10$MFxcxvweaGtulpbl.3vlhukZ6IvHdq86.K6F7qNElRy'),
	('admin@gmail.com', '$2y$10$q13zZD7ukUD2bv.vWxrNuO88CzQvudZ2ojAhe/8BZ8v'),
	('ini@gmail.com', '$2y$10$7wRCPnN1bQzlG/WAE1tibe/22bqU/gGc5mYL9ilOKMW'),
	('ini@gmail.com', '$2y$10$XIYll1SI.8TcLkdAnuFTlOQqqvL4WPI0cygLNWvVAzx'),
	('admin@gmail.com', '$2y$10$oTNoWcF9ZDdsy4Sx0I1vGek6ayRGbWyHn7VndQyH/ni'),
	('agunggg@gmail.com', '$2y$10$dlV/TYHIajSnpENASvSnDulCcfIKynlLKAseceV9nfB'),
	('agunggg@gmail.com', '$2y$10$uNmM7h9EUQQQF3IZgnNzDOyNQkOF2NbA7/LVA/PGZ1a'),
	('sp@gmail.com', '$2y$10$DvFKsIIgwZhpVVJfX1k.u.QRYl9nnjVcIf6lOXkA36s'),
	('sp@gmail.com', '$2y$10$jUB2.LYfCpQMyQL3ljTmUut9q/atBD5qGBDYumRNikk');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
