-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2016 at 05:49 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beachgld`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roll` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `roll`) VALUES
(1, 'manager', '1d0258c2440a8d19e716292b231e3190', 'Manager'),
(2, 'topik', '48c78db2dbea27286f9da14712baabf0', 'Kain'),
(3, 'putra', '5e0c5a0bf82decdd43b2150b622c66c5', 'Jahit'),
(4, 'jaya', 'ce9689abdeab50b5bee3b56c7aadee27', 'Perint'),
(5, 'abul', '1c3368c0c9381843c2a29f42420eb63e', 'Packing'),
(6, 'om', 'd58da82289939d8c4ec4f40689c2847e', 'Direktur');

-- --------------------------------------------------------

--
-- Table structure for table `bag_jahit`
--

CREATE TABLE IF NOT EXISTS `bag_jahit` (
  `Nama_Perusahaan` varchar(25) NOT NULL,
  `Id_Barang` varchar(25) NOT NULL,
  `No_Nota` varchar(25) NOT NULL,
  `Tgl_Inputjahitproduksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bag_jahit`
--

INSERT INTO `bag_jahit` (`Nama_Perusahaan`, `Id_Barang`, `No_Nota`, `Tgl_Inputjahitproduksi`) VALUES
('Tampan Taylor', 'BRG004', '123', '2016-03-24 19:59:45'),
('Tampan Taylor', 'BRG005', '123', '2016-03-24 20:02:08'),
('Sweet Collection', 'BRG009', '123', '2016-03-25 20:12:44'),
('Sweet Collection', 'BRG010', '123', '2016-03-25 20:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `bag_kain`
--

CREATE TABLE IF NOT EXISTS `bag_kain` (
  `Nama_Perusahaan` varchar(25) DEFAULT NULL,
  `Id_Barang` varchar(25) NOT NULL,
  `No_Nota` varchar(25) NOT NULL,
  `Tgl_Inputkainproduksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bag_kain`
--

INSERT INTO `bag_kain` (`Nama_Perusahaan`, `Id_Barang`, `No_Nota`, `Tgl_Inputkainproduksi`) VALUES
('Warna Jaya', 'BRG004', '76857', '2016-03-23 05:48:14'),
('Warna Jaya', 'BRG005', '658787', '2016-03-23 05:48:26'),
('Warna Jaya', 'BRG009', '123', '2016-03-25 20:08:13'),
('Warna Jaya', 'BRG010', '123', '2016-03-25 20:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `bag_print`
--

CREATE TABLE IF NOT EXISTS `bag_print` (
  `Nama_Perusahaan` varchar(25) DEFAULT NULL,
  `Id_Barang` varchar(25) NOT NULL,
  `No_Nota` varchar(25) NOT NULL,
  `Tgl_Inputprintproduksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bag_print`
--

INSERT INTO `bag_print` (`Nama_Perusahaan`, `Id_Barang`, `No_Nota`, `Tgl_Inputprintproduksi`) VALUES
('Multibatik', 'BRG004', '123', '2016-03-24 16:29:44'),
('Multibatik', 'BRG005', '123', '2016-03-24 16:33:14'),
('Multibatik', 'BRG009', '123', '2016-03-25 20:10:14'),
('Multibatik', 'BRG010', '123', '2016-03-25 20:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `Id_Barang` varchar(25) NOT NULL,
  `Nama_Barang` varchar(25) NOT NULL,
  `Kain` varchar(25) NOT NULL,
  `Print` varchar(25) NOT NULL,
  `Warna` varchar(25) NOT NULL,
  `Body` int(11) NOT NULL,
  `Lace` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Harga_Kain` int(11) NOT NULL,
  `Harga_Print` int(11) NOT NULL,
  `Harga_Jahit` int(11) NOT NULL,
  `Panjang_Kain` int(10) NOT NULL,
  `Aksesoris` int(10) NOT NULL,
  `Status_Kain` varchar(10) NOT NULL DEFAULT 'Belum',
  `Status_Print` varchar(10) NOT NULL DEFAULT 'Belum',
  `Status_Jahit` varchar(10) NOT NULL DEFAULT 'Belum',
  `Id_Pesanan` varchar(25) NOT NULL,
  `No_Box` int(10) NOT NULL,
  `Tgl_Inputhargakain` datetime NOT NULL,
  `Tgl_Inputhargaprint` datetime NOT NULL,
  `Tgl_Inputhargajahit` datetime NOT NULL,
  `Status_Notif` int(2) NOT NULL DEFAULT '1',
  `Tgl_Inputbox` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`Id_Barang`, `Nama_Barang`, `Kain`, `Print`, `Warna`, `Body`, `Lace`, `Jumlah`, `Harga_Kain`, `Harga_Print`, `Harga_Jahit`, `Panjang_Kain`, `Aksesoris`, `Status_Kain`, `Status_Print`, `Status_Jahit`, `Id_Pesanan`, `No_Box`, `Tgl_Inputhargakain`, `Tgl_Inputhargaprint`, `Tgl_Inputhargajahit`, `Status_Notif`, `Tgl_Inputbox`) VALUES
('BRG004', 'Almafti Kaftan', 'Voil', 'Nalu Border', 'White Evening', 4, 0, 20, 200000, 260000, 200000, 20, 100000, 'Sudah', 'Sudah', 'Sudah', 'PSN003', 1, '2016-03-23 02:04:48', '2016-03-23 02:23:14', '2016-03-23 02:47:31', 10, '2016-03-24 21:18:21'),
('BRG005', 'Positano Tunic', 'Voil', 'Nalu Border', 'Black', 3, 0, 4, 60000, 60000, 40000, 4, 20000, 'Sudah', 'Sudah', 'Sudah', 'PSN003', 1, '2016-03-23 02:06:24', '2016-03-23 02:23:28', '2016-03-23 02:48:14', 10, '0000-00-00 00:00:00'),
('BRG006', 'Chloe Drop Waist Tunic', 'Voil', 'Nalu Border', 'White Black', 9, 0, 9, 90000, 90000, 90000, 9, 45000, 'Belum', 'Belum', 'Belum', 'PSN004', 0, '2016-03-25 19:21:16', '2016-03-25 19:26:51', '2016-03-25 19:52:08', 5, '0000-00-00 00:00:00'),
('BRG007', 'Whole Drop Waist Tunic', 'Voil', 'Nail Stripe', 'White Evening', 3, 0, 42, 500000, 750000, 420000, 50, 210000, 'Belum', 'Belum', 'Belum', 'PSN004', 0, '2016-03-25 19:25:10', '2016-03-25 19:38:49', '2016-03-25 19:52:40', 5, '0000-00-00 00:00:00'),
('BRG008', 'Chloe Drop Waist', 'Voil', 'Polos', 'White', 3, 0, 10, 100000, 150000, 200000, 10, 50000, 'Belum', 'Belum', 'Belum', 'PSN004', 0, '2016-03-25 19:25:29', '2016-03-25 19:39:06', '2016-03-25 19:54:12', 5, '0000-00-00 00:00:00'),
('BRG009', 'Frangipani Kimono ', 'Voil', 'Polos', 'White', 2, 0, 4, 4000, 520000, 60000, 4, 20000, 'Sudah', 'Sudah', 'Sudah', 'PSN005', 1, '2016-03-25 19:26:00', '2016-03-25 19:40:00', '2016-03-25 19:54:26', 10, '2016-03-25 20:14:50'),
('BRG010', 'Grace Ruffle Front Blousa', 'Voil', 'Polos', 'White', 4, 0, 4, 40000, 60000, 40000, 4, 0, 'Sudah', 'Sudah', 'Sudah', 'PSN005', 1, '2016-03-25 19:26:28', '2016-03-25 19:40:12', '2016-03-25 20:04:31', 10, '2016-03-25 21:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `packinglist`
--

CREATE TABLE IF NOT EXISTS `packinglist` (
  `Kd_Packinglist` varchar(25) NOT NULL,
  `Tgl_Packing` datetime NOT NULL,
  `Status_Pack` varchar(10) NOT NULL DEFAULT 'Belum',
  `Status_Kirim` varchar(10) NOT NULL DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packinglist`
--

INSERT INTO `packinglist` (`Kd_Packinglist`, `Tgl_Packing`, `Status_Pack`, `Status_Kirim`) VALUES
('PCK003', '2016-03-25 16:47:14', 'Sudah', 'Sudah'),
('PCK004', '0000-00-00 00:00:00', 'Belum', 'Belum'),
('PCK005', '2016-03-25 21:22:02', 'Sudah', 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE IF NOT EXISTS `pemesan` (
  `Id_Pemesan` varchar(25) NOT NULL,
  `Nama_Pemesan` varchar(25) NOT NULL,
  `Alamat` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Telepon` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`Id_Pemesan`, `Nama_Pemesan`, `Alamat`, `Email`, `Telepon`) VALUES
('PEL001', 'Taufiq ', 'Bandung', 'taufiqmaulanaa@gmail.com', 812345679),
('PEL002', 'Bizari', 'Bandung', 'taufiqmaulanaa@gmail.com', 2147483647),
('PEL003', 'Panji', 'Jakarta', 'taufiqmaulanaa@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `Id_Pesanan` varchar(25) NOT NULL,
  `Tgl_Pesanan` varchar(100) NOT NULL,
  `Id_Pemesan` varchar(25) NOT NULL,
  `Status` varchar(25) NOT NULL DEFAULT 'Belum Produksi',
  `DP` int(11) NOT NULL,
  `Total_Harga` int(11) NOT NULL,
  `Kd_Packinglist` varchar(25) NOT NULL,
  `Laporan` varchar(25) NOT NULL DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`Id_Pesanan`, `Tgl_Pesanan`, `Id_Pemesan`, `Status`, `DP`, `Total_Harga`, `Kd_Packinglist`, `Laporan`) VALUES
('PSN003', '1 Januari 2016', 'PEL002', 'Produksi', 949400, 0, 'PCK003', 'Sudah'),
('PSN004', '3 Februari 2016', 'PEL001', 'Belum Produksi', 0, 0, 'PCK004', 'Sudah'),
('PSN005', '10 Maret 2017', 'PEL003', 'Produksi', 751440, 1502880, 'PCK005', 'Sudah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`Id_Barang`);

--
-- Indexes for table `packinglist`
--
ALTER TABLE `packinglist`
  ADD PRIMARY KEY (`Kd_Packinglist`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`Id_Pemesan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`Id_Pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
