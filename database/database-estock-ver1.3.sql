-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2015 at 11:02 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `estock`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `satuan`, `stok`) VALUES
(21, 'Samsung Galaxy Note 3', 'unit', 19),
(20, 'Sony Xperia E Dual', 'unit', 2),
(19, 'Sony Xperia M', 'unit', 10),
(18, 'Sony Xperia ZR', 'unit', 20),
(17, 'Sony Xperia M2', 'unit', 14),
(22, 'Samsung Galaxy Note 10.1', 'unit', 25),
(24, 'Nokia Lumia 920', 'unit', 21),
(25, 'Apple iPhone 4S', 'unit', 11),
(26, 'Apple iPhone 5S', 'unit', 15),
(27, 'BlackBerry Z10', 'unit', 16),
(28, 'BlackBerry Z30', 'unit', 27),
(29, '4G USB MODEM BOLT', 'unit', 47),
(30, '4G MIFI MODEM BOLT', 'unit', 9),
(31, 'Power Bank Philips 7800 mAh', 'unit', 75),
(32, 'Speaker System Z103', 'unit', 25),
(33, 'Speaker System Z110', 'unit', 5),
(34, 'Speaker System Z120', 'unit', 30);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'pcs'),
(2, 'kodi'),
(3, 'lusin'),
(4, 'unit'),
(5, 'pack'),
(6, 'kantong'),
(7, 'kotak'),
(8, 'bungkus'),
(11, 'biji'),
(10, 'lembar');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE IF NOT EXISTS `todo` (
  `todo_id` int(11) NOT NULL AUTO_INCREMENT,
  `todo_name` varchar(100) NOT NULL,
  `mark` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`todo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`todo_id`, `todo_name`, `mark`) VALUES
(17, 'Pesanan Galaxy Note 10.1 ke denpasar, kirim besok pagi', 'no'),
(16, 'tagihan handphone dari distributor samsung, jatuh tempo tgl 05-01-2014', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_transaksi` date NOT NULL,
  `jenis_transaksi` varchar(6) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `jenis_transaksi`, `id_barang`, `jumlah`, `keterangan`) VALUES
(46, '2015-01-02', 'Keluar', 29, 3, ''),
(45, '2015-01-02', 'Keluar', 27, 1, ''),
(44, '2015-01-02', 'Keluar', 17, 1, ''),
(43, '2015-01-02', 'Keluar', 25, 1, ''),
(42, '2015-01-02', 'Masuk', 34, 30, ''),
(41, '2015-01-02', 'Masuk', 33, 5, ''),
(40, '2015-01-02', 'Masuk', 32, 25, ''),
(39, '2015-01-02', 'Masuk', 18, 20, ''),
(38, '2015-01-02', 'Masuk', 17, 15, ''),
(37, '2015-01-02', 'Masuk', 19, 10, ''),
(36, '2015-01-02', 'Masuk', 20, 2, ''),
(35, '2015-01-02', 'Masuk', 21, 19, ''),
(34, '2015-01-02', 'Masuk', 22, 25, ''),
(33, '2015-01-02', 'Masuk', 31, 75, ''),
(32, '2015-01-02', 'Masuk', 24, 21, ''),
(31, '2015-01-02', 'Masuk', 23, 13, ''),
(30, '2015-01-02', 'Masuk', 28, 27, ''),
(29, '2015-01-02', 'Masuk', 27, 17, ''),
(28, '2015-01-02', 'Masuk', 26, 15, ''),
(27, '2015-01-02', 'Masuk', 25, 12, ''),
(26, '2015-01-02', 'Masuk', 29, 50, ''),
(25, '2015-01-02', 'Masuk', 30, 21, ''),
(47, '2015-01-13', 'Keluar', 30, 2, ''),
(48, '2015-01-13', 'Keluar', 30, 1, 'Modal 1000'),
(49, '2015-01-14', 'Masuk', 30, 1, ''),
(50, '2015-01-14', 'Keluar', 30, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`) VALUES
('demo', 'e10adc3949ba59abbe56e057f20f883e', 'demo@mobistastudio.com'),
('mobista', 'e10adc3949ba59abbe56e057f20f883e', 'mobistastudio@gmail.com');
