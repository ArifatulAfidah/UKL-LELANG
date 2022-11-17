-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 03:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `tgl_daftar` text NOT NULL,
  `tgl_exp` text NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_barang` text NOT NULL,
  `status` enum('terbuka','terlelang','tertutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `tgl_daftar`, `tgl_exp`, `harga_awal`, `deskripsi`, `foto_barang`, `status`) VALUES
(6, 'Hp Redmi Note11', '1 november 2022', '5 november 2022', 5000, 'baguss', 'Redmi-Note11.JPG', 'terlelang'),
(7, 'HP Realme-C31', '2 november 2022', '5 November 2022', 300000000, 'keren', 'Realme-C31.JPG', 'terlelang'),
(9, 'OPPO A31', '11-02-22 08:12:59', '11-05-22 08:12:59', 500000, 'hahaha', 'oppo a312.jpg', 'tertutup'),
(10, 'KJD', '9  november 2022', '15 november 2022', 262772272, 'ihacoyy', 'kjdlagi.PNG', '');

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` text NOT NULL,
  `harga_akhir` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('pending','terlelang','kalah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`id`, `id_barang`, `tgl_lelang`, `harga_akhir`, `id_user`, `status`) VALUES
(187, 7, '11-02-22', 300000000, 1, 'terlelang'),
(188, 6, '11-08-22', 50000000, 10, 'kalah'),
(189, 6, '11-09-22', 70000, 1, 'kalah'),
(190, 6, '11-09-22', 1000000000, 10, 'terlelang');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `username`, `password`, `level`) VALUES
(1, 'Arifatul Afidah', 'admin', 'admin', 'admin'),
(359, 'Arifatul', 'petugas', 'petugas', 'petugas'),
(360, 'yaya', 'hihi', 'huhu', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `tlpn` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `tlpn`) VALUES
(1, 'Arifatul Afidah', 'user1', '1234', '12345678'),
(10, 'Arifatul', 'user2', '1234', '12345678'),
(13, 'tultull', 'masyarakat1', 'masyarakat1', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_barang` (`nama_barang`,`harga_awal`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`,`harga_akhir`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
