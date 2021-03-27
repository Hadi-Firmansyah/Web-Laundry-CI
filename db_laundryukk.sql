-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2021 at 07:10 AM
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
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `name`, `address`, `gender`, `phone`) VALUES
(2, 'By U', 'Depok', 'Male', '1234567890'),
(3, 'Hadi Firmansyah', 'Depok', 'Male', '093242364');

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
(1, 'Juanda Laundry', 'Street H Juanda Depok', '081337706135'),
(2, 'Tipar Laundry', 'Kampung Tipar', '0895123879'),
(24, 'Margonda Laundry', 'Margonda Street', '085157750023');

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
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `total_change` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`id`, `payment_date`, `id_transaction`, `total_price`, `money`, `total_change`, `status`) VALUES
(2, '2021-03-18', 18, 55000, 60000, 5000, 'Selesai'),
(3, '2021-03-19', 20, 50000, 60000, 10000, 'Selesai'),
(4, '2021-03-19', 21, 100000, 100000, 0, 'Selesai'),
(5, '2021-03-19', 22, 55000, 60000, 5000, 'Selesai'),
(6, '2021-03-19', 23, 70000, 70000, 0, 'Selesai'),
(7, '2021-03-26', 24, 40000, 59999, 19999, 'Selesai'),
(8, '2021-03-27', 25, 40000, 50000, 10000, 'Selesai');

--
-- Triggers `tb_payment`
--
DELIMITER $$
CREATE TRIGGER `payment` AFTER INSERT ON `tb_payment` FOR EACH ROW BEGIN
UPDATE tb_transaction SET
status = 'Dibayar'
WHERE id = NEW.id_transaction;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_package` int(11) NOT NULL,
  `price_package` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaction`
--

INSERT INTO `tb_transaction` (`id`, `id_outlet`, `transaction_date`, `id_user`, `id_member`, `id_package`, `price_package`, `quantity`, `notes`, `total_price`, `status`) VALUES
(18, 2, '2021-03-18', 1, 3, 5, 11000, 5, 'Keterangan', 55000, 'Dibayar'),
(20, 2, '2021-03-18', 1, 2, 4, 10000, 5, 'Notes\n', 50000, 'Dibayar'),
(21, 1, '2021-03-19', 1, 3, 4, 10000, 10, 'Notes', 100000, 'Dibayar'),
(22, 2, '2021-03-19', 3, 3, 5, 11000, 5, 'Keterangan', 55000, 'Dibayar'),
(23, 2, '2021-03-19', 3, 3, 4, 10000, 7, '', 70000, 'Dibayar'),
(24, 1, '2021-03-26', 1, 2, 3, 8000, 5, 'hdgf', 40000, 'Dibayar'),
(25, 1, '2021-03-27', 1, 3, 3, 8000, 5, 'jashfhsd', 40000, 'Dibayar');

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
(1, 'Hadi Firmansyah', '23Firman_', 'hadifirmansyah.id@gmail.com', '085157750023', '$2y$10$Ip/BhETs4MZvJJk/3wRK2ecxARUOIBuPgXzADp6NYa/GObY91pl0W', 1, 'Admin', 'RED.png', 'Offline'),
(2, 'Julius Ryan Listianto', 'Julius25', 'Julius25@gmail.com', '1234567890', '$2y$10$ChSAcs73vbWHXesN0ZXeOOMCH3REJbrtBS/Bcfy8FANpzPfozHyVW', 2, 'Cashier', 'GREEN.png', 'Offline'),
(3, 'Burhanudin Dwi Saputra', 'Burhan12', 'Burhanudin12@gmail.com', '1234567890', '$2y$10$2P1o69VLQfQ/PD7HUzuqbOJshyJm73PTF.IHEQ0luXz3vnZz9dGWe', 2, 'Admin', 'RED.png', 'Online'),
(50, 'Julius Ryan Listianto', 'hadi-firmansyah', 'hadifirmansyah.id@gmail.com', '085771364038', '$2y$10$7.EbjKXNxvxYCX8SP54FHOEwgu5kYUPZ6dTbishWeIewDCamVoY0.', 24, 'Owner', 'BLUE1.png', 'Offline'),
(51, 'Piscok', 'ahmad', 'admin@admin.com', '0987654321', '$2y$10$iJCJEvtYYnIhdWVJ0MFFIO7KLMw9svTxyXN8ltB.xoJg4B.uAYsiy', 24, 'Owner', 'PURPLE1.png', 'Offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
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
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaction` (`id_transaction`);

--
-- Indexes for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_package` (`id_package`);

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
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_package`
--
ALTER TABLE `tb_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD CONSTRAINT `tb_payment_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `tb_transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD CONSTRAINT `tb_transaction_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaction_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaction_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaction_ibfk_4` FOREIGN KEY (`id_package`) REFERENCES `tb_package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
