-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230520.412835eeb4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 12:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_transaksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `pelembut` tinyint(1) NOT NULL,
  `total` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_transaksi`, `tanggal`, `nama_customer`, `id_paket`, `harga`, `pelembut`, `total`, `pembayaran`, `kembalian`) VALUES
(1, '1', '2023-11-25', 'ilyas', 1, 0, 0, 45000, 1000000, 955000),
(2, '1', '2023-11-25', 'ilyas', 1, 0, 1, 55000, 1000000, 945000),
(3, '01', '2023-11-25', 'ilyasa', 2, 0, 0, 0, 1, 0),
(4, '10', '2023-11-25', 'akui', 1, 0, 0, 45000, 45000, 0),
(5, '10', '2023-11-25', 'akuim', 2, 0, 0, 50000, 45000, 0),
(6, '10', '2023-11-25', 'akuim', 2, 0, 0, 0, 45000, 0),
(7, '0002', '2023-11-25', 't', 3, 0, 0, 65000, 20000, 0),
(8, '00024', '2023-11-25', 'i', 3, 0, 0, 65000, 200000, 0),
(9, '0009', '2023-11-25', 'b', 1, 0, 0, 45000, 400000, 0),
(10, '0009', '2023-11-25', 'b', 1, 0, 0, 0, 400000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
