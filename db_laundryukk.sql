-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2021 at 04:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundryukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaction`
--

CREATE TABLE `tb_detail_transaction` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_package` int(11) NOT NULL,
  `qty` double NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id`, `name`, `address`, `gender`, `phone`) VALUES
(2, 'Fikri Ramadhan', 'Depok', 'Male', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`id`, `name`, `address`, `phone`) VALUES
(2, 'Juanda Laundry', 'Street H Juanda Depok', '081337706135'),
(22, 'Tipar Laundry', 'Kampung Tipar', '089512387910');

-- --------------------------------------------------------

--
-- Table structure for table `tb_package`
--

CREATE TABLE `tb_package` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `type` enum('Kilos','Blanket','Bed Cover','T-  Shirt') NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_package`
--

INSERT INTO `tb_package` (`id`, `id_outlet`, `type`, `name`, `price`) VALUES
(3, 1, 'Kilos', 'Good Kilos', 8000),
(4, 2, 'Blanket', 'Good Blanket', 10000),
(5, 2, 'Bed Cover', 'Good Bed Cover', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `pay_date` datetime NOT NULL,
  `discount` double NOT NULL,
  `tax` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `total_change` int(11) NOT NULL,
  `status` enum('Baru','Proses','Selesai','Diambil') NOT NULL,
  `paid` enum('Dibayar','Belum Dibayar') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaction`
--

INSERT INTO `tb_transaction` (`id`, `id_outlet`, `invoice`, `id_member`, `transaction_date`, `pay_date`, `discount`, `tax`, `total_price`, `money`, `total_change`, `status`, `paid`, `id_user`) VALUES
(1, 2, 'Nice', 2, '2021-03-04 16:24:53', '2021-03-05 16:24:53', 1000, 100, 0, 0, 0, 'Baru', 'Belum Dibayar', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('Cashier','Owner','Admin') NOT NULL,
  `image` varchar(1000) NOT NULL,
  `status_log` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `phone`, `password`, `id_outlet`, `role`, `image`, `status_log`) VALUES
(5, 'Hadi Firmansyah', '23firman_', 'hadifirmansyah.id@gmail.com', '085157750023', '123', 2, 'Admin', '', 'Online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaction`
--
ALTER TABLE `tb_detail_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaction_2` (`id_transaction`),
  ADD KEY `id_package_2` (`id_package`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_package`
--
ALTER TABLE `tb_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- Indexes for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet_2` (`id_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaction`
--
ALTER TABLE `tb_detail_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_package`
--
ALTER TABLE `tb_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaction`
--
ALTER TABLE `tb_detail_transaction`
  ADD CONSTRAINT `tb_detail_transaction_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `tb_transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_transaction_ibfk_2` FOREIGN KEY (`id_package`) REFERENCES `tb_package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD CONSTRAINT `tb_transaction_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaction_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaction_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
