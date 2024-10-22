-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.8-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table sppsekolah1.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `namalengkap` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sppsekolah1.admin: ~2 rows (lebih kurang)
INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
	(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ananda');

-- membuang struktur untuk table sppsekolah1.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `idsiswa` int(10) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) DEFAULT NULL,
  `namasiswa` varchar(40) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `tahunajaran` varchar(10) DEFAULT NULL,
  `biaya` int(20) DEFAULT NULL,
  PRIMARY KEY (`idsiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sppsekolah1.siswa: ~10 rows (lebih kurang)
INSERT INTO `siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `tahunajaran`, `biaya`) VALUES
	(23, '202310001', 'Hanggara P A', 'X RPL', '2023/2024', 250000),
	(24, '202310002', 'Meyki Ardiansyah', 'X TKJ', '2023/2024', 250000),
	(25, '202310003', 'Chandra Wijaya', 'XI RPL', '2023/2024', 250000),
	(26, '202310004', 'Dedi Marlin Hidayat', 'X TKR', '2023/2024', 250000),
	(27, '202310005', 'Novian Sandi Putra', 'XII RPL', '2023/2024', 250000),
	(28, '202310006', 'Rina Puspita Sari', 'XI KC', '2023/2024', 250000),
	(29, '202310007', 'Jeki Sanjaka', 'XI TKR', '2023/2024', 250000),
	(30, '202310008', 'Andry Al-febri', 'XII TKR', '2023/2024', 250000),
	(31, '202310009', 'Atang Al-Farizi', 'X TKJ', '2023/2024', 250000),
	(33, '202310010', 'Ananda Nathasya', 'XI KC', '2023/2024', 250000);

-- membuang struktur untuk table sppsekolah1.spp
CREATE TABLE IF NOT EXISTS `spp` (
  `idspp` int(5) NOT NULL AUTO_INCREMENT,
  `idsiswa` int(10) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `nobayar` varchar(10) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `idadmin` int(5) DEFAULT NULL,
  PRIMARY KEY (`idspp`),
  KEY `fk_admin` (`idadmin`),
  KEY `fk_siswa` (`idsiswa`),
  CONSTRAINT `fk_admin` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON UPDATE CASCADE,
  CONSTRAINT `fk_siswa` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sppsekolah1.spp: ~120 rows (lebih kurang)
INSERT INTO `spp` (`idspp`, `idsiswa`, `jatuhtempo`, `bulan`, `nobayar`, `tglbayar`, `jumlah`, `ket`, `idadmin`) VALUES
	(1, 23, '2023-10-10', 'Oktober  2023', '2312090001', '2023-12-09', 250000, 'LUNAS', 1),
	(2, 23, '2023-11-10', 'November  2023', NULL, NULL, 250000, NULL, NULL),
	(3, 23, '2023-12-10', 'Desember  2023', NULL, NULL, 250000, NULL, NULL),
	(4, 23, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
	(5, 23, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
	(6, 23, '2024-03-10', 'Maret  2024', NULL, NULL, 250000, NULL, NULL),
	(7, 23, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
	(8, 23, '2024-05-10', 'Mei  2024', NULL, NULL, 250000, NULL, NULL),
	(9, 23, '2024-06-10', 'Juni  2024', NULL, NULL, 250000, NULL, NULL),
	(10, 23, '2024-07-10', 'Juli  2024', NULL, NULL, 250000, NULL, NULL),
	(11, 23, '2024-08-10', 'Agustus  2024', NULL, NULL, 250000, NULL, NULL),
	(12, 23, '2024-09-10', 'September  2024', NULL, NULL, 250000, NULL, NULL),
	(13, 24, '2023-10-10', 'Oktober  2023', '2312090002', '2023-12-09', 250000, 'LUNAS', 1),
	(14, 24, '2023-11-10', 'November  2023', NULL, NULL, 250000, NULL, NULL),
	(15, 24, '2023-12-10', 'Desember  2023', NULL, NULL, 250000, NULL, NULL),
	(16, 24, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
	(17, 24, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
	(18, 24, '2024-03-10', 'Maret  2024', NULL, NULL, 250000, NULL, NULL),
	(19, 24, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
	(20, 24, '2024-05-10', 'Mei  2024', NULL, NULL, 250000, NULL, NULL),
	(21, 24, '2024-06-10', 'Juni  2024', NULL, NULL, 250000, NULL, NULL),
	(22, 24, '2024-07-10', 'Juli  2024', NULL, NULL, 250000, NULL, NULL),
	(23, 24, '2024-08-10', 'Agustus  2024', NULL, NULL, 250000, NULL, NULL),
	(24, 24, '2024-09-10', 'September  2024', NULL, NULL, 250000, NULL, NULL),
	(25, 25, '2023-10-10', 'Oktober  2023', NULL, NULL, 250000, NULL, NULL),
	(26, 25, '2023-11-10', 'November  2023', NULL, NULL, 250000, NULL, NULL),
	(27, 25, '2023-12-10', 'Desember  2023', NULL, NULL, 250000, NULL, NULL),
	(28, 25, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
	(29, 25, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
	(30, 25, '2024-03-10', 'Maret  2024', NULL, NULL, 250000, NULL, NULL),
	(31, 25, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
	(32, 25, '2024-05-10', 'Mei  2024', NULL, NULL, 250000, NULL, NULL),
	(33, 25, '2024-06-10', 'Juni  2024', NULL, NULL, 250000, NULL, NULL),
	(34, 25, '2024-07-10', 'Juli  2024', NULL, NULL, 250000, NULL, NULL),
	(35, 25, '2024-08-10', 'Agustus  2024', NULL, NULL, 250000, NULL, NULL),
	(36, 25, '2024-09-10', 'September  2024', NULL, NULL, 250000, NULL, NULL),
	(37, 26, '2023-10-10', 'Oktober  2023', NULL, NULL, 250000, NULL, NULL),
	(38, 26, '2023-11-10', 'November  2023', NULL, NULL, 250000, NULL, NULL),
	(39, 26, '2023-12-10', 'Desember  2023', NULL, NULL, 250000, NULL, NULL),
	(40, 26, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
	(41, 26, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
	(42, 26, '2024-03-10', 'Maret  2024', NULL, NULL, 250000, NULL, NULL),
	(43, 26, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
	(44, 26, '2024-05-10', 'Mei  2024', NULL, NULL, 250000, NULL, NULL),
	(45, 26, '2024-06-10', 'Juni  2024', NULL, NULL, 250000, NULL, NULL),
	(46, 26, '2024-07-10', 'Juli  2024', NULL, NULL, 250000, NULL, NULL),
	(47, 26, '2024-08-10', 'Agustus  2024', NULL, NULL, 250000, NULL, NULL),
	(48, 26, '2024-09-10', 'September  2024', NULL, NULL, 250000, NULL, NULL),
	(49, 27, '2023-10-10', 'Oktober  2023', NULL, NULL, 250000, NULL, NULL),
	(50, 27, '2023-11-10', 'November  2023', NULL, NULL, 250000, NULL, NULL),
	(51, 27, '2023-12-10', 'Desember  2023', NULL, NULL, 250000, NULL, NULL),
	(52, 27, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
	(53, 27, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
	(54, 27, '2024-03-10', 'Maret  2024', NULL, NULL, 250000, NULL, NULL),
	(55, 27, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
	(56, 27, '2024-05-10', 'Mei  2024', NULL, NULL, 250000, NULL, NULL),
	(57, 27, '2024-06-10', 'Juni  2024', NULL, NULL, 250000, NULL, NULL),
	(58, 27, '2024-07-10', 'Juli  2024', NULL, NULL, 250000, NULL, NULL),
	(59, 27, '2024-08-10', 'Agustus  2024', NULL, NULL, 250000, NULL, NULL),
	(60, 27, '2024-09-10', 'September  2024', NULL, NULL, 250000, NULL, NULL),
	(61, 28, '2023-10-10', 'Oktober  2023', NULL, NULL, 250000, NULL, NULL),
	(62, 28, '2023-11-10', 'November  2023', NULL, NULL, 250000, NULL, NULL),
	(63, 28, '2023-12-10', 'Desember  2023', NULL, NULL, 250000, NULL, NULL),
	(64, 28, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
	(65, 28, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
	(66, 28, '2024-03-10', 'Maret  2024', NULL, NULL, 250000, NULL, NULL),
	(67, 28, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
	(68, 28, '2024-05-10', 'Mei  2024', NULL, NULL, 250000, NULL, NULL),
	(69, 28, '2024-06-10', 'Juni  2024', NULL, NULL, 250000, NULL, NULL),
	(70, 28, '2024-07-10', 'Juli  2024', NULL, NULL, 250000, NULL, NULL),
	(71, 28, '2024-08-10', 'Agustus  2024', NULL, NULL, 250000, NULL, NULL),
	(72, 28, '2024-09-10', 'September  2024', NULL, NULL, 250000, NULL, NULL),
	(73, 29, '2023-10-10', 'Oktober  2023', NULL, NULL, 250000, NULL, NULL),
	(74, 29, '2023-11-10', 'November  2023', NULL, NULL, 250000, NULL, NULL),
	(75, 29, '2023-12-10', 'Desember  2023', NULL, NULL, 250000, NULL, NULL),
	(76, 29, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
	(77, 29, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
	(78, 29, '2024-03-10', 'Maret  2024', NULL, NULL, 250000, NULL, NULL),
	(79, 29, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
	(80, 29, '2024-05-10', 'Mei  2024', NULL, NULL, 250000, NULL, NULL),
	(81, 29, '2024-06-10', 'Juni  2024', NULL, NULL, 250000, NULL, NULL),
	(82, 29, '2024-07-10', 'Juli  2024', NULL, NULL, 250000, NULL, NULL),
	(83, 29, '2024-08-10', 'Agustus  2024', NULL, NULL, 250000, NULL, NULL),
	(84, 29, '2024-09-10', 'September  2024', NULL, NULL, 250000, NULL, NULL),
	(85, 30, '2023-10-10', 'Oktober  2023', '2312110001', '2023-12-11', 250000, 'LUNAS', 1),
	(86, 30, '2023-11-10', 'November  2023', NULL, NULL, 250000, NULL, NULL),
	(87, 30, '2023-12-10', 'Desember  2023', NULL, NULL, 250000, NULL, NULL),
	(88, 30, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
	(89, 30, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
	(90, 30, '2024-03-10', 'Maret  2024', NULL, NULL, 250000, NULL, NULL),
	(91, 30, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
	(92, 30, '2024-05-10', 'Mei  2024', NULL, NULL, 250000, NULL, NULL),
	(93, 30, '2024-06-10', 'Juni  2024', NULL, NULL, 250000, NULL, NULL),
	(94, 30, '2024-07-10', 'Juli  2024', NULL, NULL, 250000, NULL, NULL),
	(95, 30, '2024-08-10', 'Agustus  2024', NULL, NULL, 250000, NULL, NULL),
	(96, 30, '2024-09-10', 'September  2024', NULL, NULL, 250000, NULL, NULL),
	(97, 31, '2023-10-10', 'Oktober  2023', NULL, NULL, 250000, NULL, NULL),
	(98, 31, '2023-11-10', 'November  2023', NULL, NULL, 250000, NULL, NULL),
	(99, 31, '2023-12-10', 'Desember  2023', NULL, NULL, 250000, NULL, NULL),
	(100, 31, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
	(101, 31, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
	(102, 31, '2024-03-10', 'Maret  2024', NULL, NULL, 250000, NULL, NULL),
	(103, 31, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
	(104, 31, '2024-05-10', 'Mei  2024', NULL, NULL, 250000, NULL, NULL),
	(105, 31, '2024-06-10', 'Juni  2024', NULL, NULL, 250000, NULL, NULL),
	(106, 31, '2024-07-10', 'Juli  2024', NULL, NULL, 250000, NULL, NULL),
	(107, 31, '2024-08-10', 'Agustus  2024', NULL, NULL, 250000, NULL, NULL),
	(108, 31, '2024-09-10', 'September  2024', NULL, NULL, 250000, NULL, NULL),
	(109, 33, '2023-10-10', 'Oktober  2023', NULL, NULL, 250000, NULL, NULL),
	(110, 33, '2023-11-10', 'November  2023', NULL, NULL, 250000, NULL, NULL),
	(111, 33, '2023-12-10', 'Desember  2023', NULL, NULL, 250000, NULL, NULL),
	(112, 33, '2024-01-10', 'januari  2024', NULL, NULL, 250000, NULL, NULL),
	(113, 33, '2024-02-10', 'Februari  2024', NULL, NULL, 250000, NULL, NULL),
	(114, 33, '2024-03-10', 'Maret  2024', NULL, NULL, 250000, NULL, NULL),
	(115, 33, '2024-04-10', 'April  2024', NULL, NULL, 250000, NULL, NULL),
	(116, 33, '2024-05-10', 'Mei  2024', NULL, NULL, 250000, NULL, NULL),
	(117, 33, '2024-06-10', 'Juni  2024', NULL, NULL, 250000, NULL, NULL),
	(118, 33, '2024-07-10', 'Juli  2024', NULL, NULL, 250000, NULL, NULL),
	(119, 33, '2024-08-10', 'Agustus  2024', NULL, NULL, 250000, NULL, NULL),
	(120, 33, '2024-09-10', 'September  2024', NULL, NULL, 250000, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
