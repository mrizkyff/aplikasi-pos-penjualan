-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 07:25 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_penjualanbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `harga_jual` varchar(100) NOT NULL,
  `stok_awal` varchar(15) NOT NULL,
  `stok_terjual` varchar(15) NOT NULL,
  `stok_sisa` int(11) NOT NULL,
  `tanggal` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `harga_jual`, `stok_awal`, `stok_terjual`, `stok_sisa`, `tanggal`) VALUES
('B0001', 'Sabun', 'buah', '1000', '2000', '100', '4', 96, '24-10-2015'),
('B0002', 'Shampo', 'buah', '500', '1000', '200', '5', 195, '24-10-2015'),
('B0003', 'Buku Tulis', 'pack', '8000', '10000', '100', '14', 86, '25-10-2015'),
('B0004', 'Pasta Gigi', 'pack', '5000', '6000', '100', '100', 0, '25-10-2015');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_terjual`
--

CREATE TABLE IF NOT EXISTS `tb_barang_terjual` (
`no` int(11) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_satuan` varchar(50) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `harga_akhir` varchar(50) NOT NULL,
  `no_nota` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_terjual`
--

INSERT INTO `tb_barang_terjual` (`no`, `kode_barang`, `nama_barang`, `harga_satuan`, `jumlah_jual`, `harga_akhir`, `no_nota`) VALUES
(22, 'B0001', 'Sabun', '2000', 4, '8000', 151024001),
(23, 'B0002', 'Shampo', '1000', 3, '3000', 151024001),
(28, 'B0003', 'Buku Tulis', '10000', 4, '40000', 151024002),
(29, 'B0004', 'Pasta Gigi', '6000', 100, '600000', 190617003),
(30, 'B0003', 'Buku Tulis', '10000', 10, '100000', 190618004),
(31, 'B0002', 'Shampo', '1000', 2, '2000', 190618004);

--
-- Triggers `tb_barang_terjual`
--
DELIMITER //
CREATE TRIGGER `editstok_penjualandihapus` AFTER DELETE ON `tb_barang_terjual`
 FOR EACH ROW BEGIN
	UPDATE tb_barang set stok_terjual = stok_terjual - OLD.jumlah_jual, stok_sisa = stok_sisa + OLD.jumlah_jual WHERE kode_barang = OLD.kode_barang;
    END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `penjualan` AFTER INSERT ON `tb_barang_terjual`
 FOR EACH ROW BEGIN  
    Update tb_barang set stok_sisa = stok_sisa - NEW.jumlah_jual, stok_terjual = stok_terjual+NEW.jumlah_jual where kode_barang = NEW.kode_barang;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE IF NOT EXISTS `tb_penjualan` (
  `no_nota` int(11) NOT NULL,
  `tgl_jual` varchar(15) NOT NULL,
  `pelanggan` varchar(100) NOT NULL,
  `kasir` varchar(100) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `diskon_persen` int(11) NOT NULL,
  `diskon_total` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`no_nota`, `tgl_jual`, `pelanggan`, `kasir`, `sub_total`, `diskon_persen`, `diskon_total`, `total_harga`) VALUES
(151024001, '24-10-2015', 'Firda', 'Mohammad Nur Fawaiq', 11000, 0, 0, 11000),
(151024002, '25-10-2015', 'Mohammad', 'Mohammad Nur Fawaiq', 40000, 0, 0, 40000),
(190617003, '17-06-2019', 'ian', '', 600000, 50, 300000, 300000),
(190618004, '18-06-2019', 'ian', '', 102000, 0, 0, 102000);

--
-- Triggers `tb_penjualan`
--
DELIMITER //
CREATE TRIGGER `hapus_penjualan` AFTER DELETE ON `tb_penjualan`
 FOR EACH ROW BEGIN
	delete from tb_barang_terjual WHERE no_nota = OLD.no_nota;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
`kode_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` longtext NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `keterangan` longtext NOT NULL,
  `level` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kode_user`, `username`, `password`, `pass`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `no_telepon`, `keterangan`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Mohammad Nur Fawaiq', 'Laki-laki', 'Jl. Panunggulan 17B Pati Jawa Tengah', '085786447406', 'Pemilik Toserba Fawaiq', 'admin'),
(2, 'fawaiq', '8fa670c249a1d31c75d711f1284f419b', 'fawaiq', 'Fawaiq', 'Laki-laki', 'Desa Gajahmati', '085786447xxx', 'Kerja pagi', 'kasir'),
(7, 'nur', 'b55178b011bfb206965f2638d0f87047', 'nur', 'Nur', 'Perempuan', 'Pati, Jateng', '089681488xxx', 'Kerja malam', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
 ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_barang_terjual`
--
ALTER TABLE `tb_barang_terjual`
 ADD PRIMARY KEY (`no`), ADD KEY `kode_barang` (`kode_barang`), ADD KEY `no` (`no`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
 ADD PRIMARY KEY (`no_nota`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
 ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang_terjual`
--
ALTER TABLE `tb_barang_terjual`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
