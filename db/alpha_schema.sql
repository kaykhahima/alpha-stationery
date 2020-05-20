-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 10:55 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alpha_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productQuantity` varchar(255) NOT NULL,
  `buyingPrice` varchar(255) NOT NULL,
  `sellingPrice` varchar(255) NOT NULL,
  `dateCreated` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productQuantity`, `buyingPrice`, `sellingPrice`, `dateCreated`) VALUES
(28, 'Vesi Ya Maua', '0', '30000', '35000', '16/04/2020'),
(27, 'Counter Qr2 Ndefu', '23', '2000', '2500', '01/04/2020'),
(25, 'Peni', '28', '250', '300', '02/04/2020'),
(17, 'Kalamuu', '0', '500', '700', '01/04/2020'),
(26, 'Notebook', '35', '700', '2000', '01/04/2020'),
(29, 'Majaladio', '50', '200', '300', '18/04/2020'),
(30, 'Calendars', '50', '450', '500', '23/04/2020'),
(31, 'Eraser', '195', '150', '300', '23/04/2020'),
(32, 'Pencils', '250', '250', '300', '23/04/2020'),
(33, 'Sharpeners', '100', '300', '400', '23/04/2020'),
(34, 'Sticky Notes - BG', '20', '500', '1000', '23/04/2020'),
(35, 'White Boards', '10', '1200', '1500', '23/04/2020'),
(36, 'Marker Pen', '300', '800', '1000', '23/04/2020'),
(37, 'Sticky Notes - Sm', '40', '200', '300', '23/04/2020'),
(38, 'Stapler', '46', '2200', '3000', '23/04/2020'),
(39, 'Staples', '400', '400', '500', '23/04/2020'),
(40, 'Paper Clips', '34', '70', '100', '23/04/2020'),
(41, 'Highlighter', '500', '400', '500', '23/04/2020'),
(42, 'Glue', '20', '500', '700', '23/04/2020'),
(43, 'Lamination - ID', '1000', '30', '50', '23/04/2020'),
(44, 'Binding', '9998', '200', '300', '23/04/2020'),
(45, 'Rim Paper', '30', '10000', '12000', '23/04/2020'),
(46, 'Stamp', '30', '500', '700', '23/04/2020'),
(47, 'Envelope - A4', '198', '150', '200', '23/04/2020'),
(48, 'Envelope - A3', '18', '200', '300', '23/04/2020'),
(49, 'Envelope - Sm', '23', '75', '100', '23/04/2020');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(255) NOT NULL,
  `productID` int(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantitySold` int(255) NOT NULL,
  `priceEach` varchar(255) NOT NULL,
  `discount` int(255) NOT NULL,
  `totalAmount` varchar(255) NOT NULL,
  `dateAdded` varchar(255) NOT NULL,
  `dateTimeAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `productID`, `productName`, `quantitySold`, `priceEach`, `discount`, `totalAmount`, `dateAdded`, `dateTimeAdded`) VALUES
(22, 17, 'Kalamu', 1, '700', 0, '700', '03/04/2020', '2020-04-03 15:46:42'),
(39, 25, 'Peni', 1, '300', 0, '300', '16/05/2020', '2020-04-16 20:43:13'),
(40, 27, 'Counter Qr2 Ndefu', 1, '2500', 0, '2500', '17/01/2020', '2020-04-16 22:25:57'),
(43, 25, 'Peni', 20, '300', 0, '6000', '17/02/2020', '2020-04-17 15:16:14'),
(42, 27, 'Counter Qr2 Ndefu', 4, '2500', 0, '10000', '17/04/2020', '2020-04-17 14:27:48'),
(38, 17, 'Kalamuu', 16, '700', 0, '11200', '16/03/2020', '2020-04-16 20:30:20'),
(37, 17, 'Kalamuu', 5, '700', 0, '3500', '16/05/2020', '2020-04-16 20:29:54'),
(36, 25, 'Peni', 1, '300', 0, '300', '16/11/2020', '2020-04-16 20:18:45'),
(26, 27, 'Counter Qr2 Ndefu', 4, '2500', 0, '10000', '06/09/2020', '2020-04-06 19:13:11'),
(35, 27, 'Counter Qr2 Ndefu', 1, '2500', 0, '2500', '16/12/2020', '2020-04-16 20:18:34'),
(30, 28, 'Vesi Ya Maua', 1, '35000', 0, '35000', '16/04/2020', '2020-04-16 18:38:58'),
(23, 25, 'Peni', 5, '300', 0, '1500', '03/10/2020', '2020-04-03 15:46:48'),
(44, 28, 'Vesi Ya Maua', 5, '35000', 0, '175000', '17/10/2020', '2020-04-17 19:43:09'),
(25, 26, 'Notebook', 1, '2000', 0, '2000', '03/04/2020', '2020-04-03 15:47:01'),
(45, 28, 'Vesi Ya Maua', 1, '35000', 0, '35000', '17/06/2020', '2020-04-17 20:25:08'),
(46, 29, 'Majaladio', 2, '300', 0, '600', '18/04/2020', '2020-04-17 21:47:14'),
(47, 38, 'Stapler', 1, '3000', 0, '3000', '23/04/2020', '2020-04-23 13:33:13'),
(48, 38, 'Stapler', 3, '3000', 0, '9000', '23/08/2020', '2020-04-23 13:34:12'),
(49, 17, 'Kalamuu', 6, '700', 0, '4200', '23/07/2020', '2020-04-23 13:57:59'),
(50, 47, 'Envelope - A4', 1, '200', 0, '200', '23/04/2020', '2020-04-23 14:01:25'),
(51, 47, 'Envelope - A4', 1, '200', 0, '200', '23/11/2020', '2020-04-23 14:01:43'),
(52, 44, 'Binding', 1, '300', 0, '300', '23/04/2020', '2020-04-23 14:03:32'),
(53, 44, 'Binding', 1, '300', 0, '300', '23/02/2020', '2020-04-23 14:03:40'),
(54, 48, 'Envelope - A3', 2, '300', 0, '600', '23/04/2020', '2020-04-23 14:03:58'),
(55, 31, 'Eraser', 5, '300', 0, '1500', '24/04/2020', '2020-04-24 18:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `trashID` int(11) NOT NULL,
  `productID` int(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productQuantity` varchar(255) NOT NULL,
  `buyingPrice` varchar(255) NOT NULL,
  `sellingPrice` varchar(255) NOT NULL,
  `dateDeleted` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'jane', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`trashID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `trashID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
