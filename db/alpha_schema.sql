-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 09:52 AM
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
(1, 'Vichongeo ', '113', '140', '200', '22/05/2020'),
(2, 'Vichongeo ', '71', '200', '500', '22/05/2020'),
(3, 'Ufutio', '26', '200', '300', '22/05/2020'),
(5, 'Frame - A5', '5', '', '', '22/05/2020'),
(6, 'Frame - A4', '6', '', '', '22/05/2020'),
(7, 'Visitors Book', '4', '', '6000', '22/05/2020'),
(8, 'Ledger Book', '4', '', '6000', '22/05/2020'),
(9, 'Cash Book', '4', '', '6000', '22/05/2020'),
(10, 'Cash Book', '5', '', '10000', '22/05/2020'),
(11, 'Rim', '8', '', '12000', '22/05/2020'),
(12, 'Box File', '12', '', '4500', '22/05/2020'),
(13, 'Vihesabio', '2', '', '5500', '22/05/2020'),
(14, 'Drawing Board', '6', '', '6000', '22/05/2020'),
(15, 'Soletape', '69', '', '500', '22/05/2020'),
(16, 'Sole Tape', '17', '', '1000', '22/05/2020'),
(17, 'Sole Tape', '32', '', '1500', '22/05/2020'),
(18, 'Masking Tape', '15', '', '1000', '22/05/2020'),
(19, 'Soltape', '2', '', '4500', '22/05/2020'),
(20, 'Soltape', '6', '', '6000', '22/05/2020'),
(21, 'Box File', '5', '', '3500', '22/05/2020'),
(22, 'File Ndogo', '54', '', '500', '22/05/2020'),
(23, 'File La Kaki', '81', '', '500', '22/05/2020'),
(24, 'Clear Bag', '19', '', '500', '22/05/2020'),
(25, 'File ', '47', '', '2500', '22/05/2020'),
(26, 'Bahasha A5', '247', '', '150', '22/05/2020'),
(27, 'Bahasha A4', '292', '', '200', '22/05/2020'),
(28, 'Bahasha A3', '173', '', '300', '22/05/2020'),
(29, 'Bahasha A6', '221', '', '100', '22/05/2020'),
(30, 'Taji Congraduation', '3', '', '6000', '22/05/2020'),
(31, 'Counter Qr4', '25', '', '4500', '22/05/2020'),
(32, 'Counter Qr3', '43', '', '3500', '22/05/2020'),
(33, 'Counter Qr2', '14', '', '2500', '22/05/2020'),
(34, 'Counter Qr1 Ndefu', '52', '', '1500', '22/05/2020'),
(35, 'Counter Qr1 Fupi', '15', '', '1500', '22/05/2020'),
(36, 'Daftari Pg100', '349', '', '600', '22/05/2020'),
(37, 'Daftari Pg200', '124', '', '1200', '22/05/2020'),
(38, 'Flipchart', '4', '', '', '22/05/2020'),
(39, 'Msomi', '87', '', '500', '22/05/2020'),
(40, 'Daftari', '34', '', '300', '22/05/2020'),
(41, 'Daftari Ndogo', '342', '', '200', '22/05/2020'),
(42, 'Review Form1&2', '27', '', '9500', '22/05/2020'),
(43, 'Review Form3&4', '19', '', '12000', '22/05/2020'),
(44, 'Writing Pad', '34', '', '2000', '22/05/2020'),
(45, 'Graph Pad', '36', '', '2000', '22/05/2020'),
(46, 'Manila Sheet', '54', '', '700', '22/05/2020'),
(47, 'Carbon', '370', '', '100', '22/05/2020'),
(48, 'Manila Card', '519', '', '100', '22/05/2020'),
(49, 'No-laminating Sheet', '50', '', '', '22/05/2020'),
(50, 'Rigo Paper', '31', '', '100', '22/05/2020'),
(51, 'Epson Paper', '11', '', '1000', '22/05/2020'),
(52, 'Lamination Sheet', '131', '', '1000', '22/05/2020'),
(53, 'Lamination Sheet Ndogo', '112', '', '500', '22/05/2020'),
(54, 'Transparency', '136', '', '200', '22/05/2020'),
(55, 'Spiral Kubwa', '6', '', '1000', '22/05/2020'),
(56, 'Spiral Ndogo', '8', '', '300', '22/05/2020'),
(57, 'Stakabadhi', '63', '', '500', '22/05/2020'),
(58, 'Hati Ya Malipo', '57', '', '500', '22/05/2020'),
(59, 'Balls', '29', '', '500', '22/05/2020'),
(60, 'Notebook Ndogo', '24', '', '500', '22/05/2020'),
(61, 'Notebook', '11', '', '1000', '22/05/2020'),
(62, 'Correction Pen', '22', '', '1000', '22/05/2020'),
(63, 'Correction Pen', '14', '', '1500', '22/05/2020'),
(64, 'Stamp Pad', '19', '', '2000', '22/05/2020'),
(65, 'Diary', '5', '', '3000', '22/05/2020'),
(66, 'Diary', '3', '', '2500', '22/05/2020'),
(67, 'Diary', '5', '', '2000', '22/05/2020'),
(68, 'Diary', '18', '', '1500', '22/05/2020'),
(69, 'Diary', '4', '', '6000', '22/05/2020'),
(70, 'Notebook', '15', '', '7000', '22/05/2020'),
(71, 'Keyholder Za Chuma', '2', '', '2500', '22/05/2020'),
(72, 'Nailcutter', '23', '', '2000', '22/05/2020'),
(73, 'Mikebe', '14', '', '2000', '24/05/2020'),
(74, 'ID Kitambulisho', '89', '', '1000', '24/05/2020'),
(75, 'ID Tanzania', '11', '', '2000', '24/05/2020'),
(76, 'Petty Cash', '11', '', '500', '24/05/2020'),
(77, 'Mkasi', '13', '', '2000', '24/05/2020'),
(78, 'Mkasi', '8', '', '1500', '24/05/2020'),
(79, 'Mshumaa', '2', '', '10000', '24/05/2020'),
(80, 'Mshumaa', '4', '', '15000', '24/05/2020'),
(81, 'Kadi Za Harusi', '412', '', '500', '24/05/2020'),
(82, 'Kadi Za Harusi', '351', '', '1500', '24/05/2020'),
(83, 'Kofia Za Birthday', '14', '', '3000', '24/05/2020'),
(84, 'Kofia Za Birthday', '32', '', '2000', '24/05/2020'),
(85, 'Kofia Za Birthday', '9', '', '2500', '24/05/2020'),
(86, 'Celebration Birthday Candles', '11', '', '1000', '24/05/2020'),
(87, 'Mishumaa Ya Namba', '46', '', '1000', '24/05/2020'),
(88, 'Miwani Ya Birthday', '46', '', '2000', '24/05/2020'),
(89, 'Mishumaa', '7', '', '2500', '24/05/2020'),
(90, 'Mishumaa Cheche', '26', '', '3000', '24/05/2020'),
(91, 'Mshumaa', '8', '', '3500', '24/05/2020'),
(92, 'Mshumaa Cheche', '33', '', '2500', '24/05/2020'),
(93, 'Mshumaa Cheche', '13', '', '1500', '24/05/2020'),
(94, 'Mshumaa Cheche', '9', '', '2000', '24/05/2020'),
(95, 'Mshumaa Cheche', '40', '', '1000', '24/05/2020'),
(96, 'Mshumaa Cheche', '22', '', '800', '24/05/2020'),
(97, 'Mshumaa Cheche', '14', '', '500', '24/05/2020'),
(98, 'Vikombe Vya Birthday', '69', '', '500', '24/05/2020'),
(99, 'Sahani Za Birthday', '25', '', '500', '24/05/2020'),
(100, 'Kofia Za Birthday', '28', '', '1000', '24/05/2020'),
(101, 'Crown Za Birthday', '23', '', '5000', '24/05/2020'),
(102, 'Rose Candle', '6', '', '3500', '24/05/2020'),
(103, 'Music Candle', '18', '', '3000', '24/05/2020'),
(104, 'Ribbon Za Mapambo Ya Box', '32', '', '500', '24/05/2020'),
(105, 'Disco Light', '1', '', '7000', '24/05/2020'),
(106, 'Taji La Christmas', '1', '', '4000', '24/05/2020'),
(107, 'Christmas Ball', '10', '', '1000', '24/05/2020'),
(108, 'Christmas (kengele)', '5', '', '4000', '24/05/2020'),
(109, 'Christmas Box', '2', '', '2000', '24/05/2020'),
(110, 'Christmas Ball', '1', '', '5000', '24/05/2020'),
(111, 'Kadi Za Christmas', '22', '', '1000', '24/05/2020'),
(112, 'Kadi Za Christmas', '2', '', '1500', '24/05/2020'),
(113, 'Kadi Za Christmas', '8', '', '500', '24/05/2020'),
(114, 'Merry Christmas', '3', '', '2000', '24/05/2020'),
(115, 'Glue Kubwa', '11', '', '7000', '24/05/2020'),
(116, 'Glue Ndogo', '18', '', '1500', '24/05/2020'),
(117, 'Sticky Notes', '11', '', '5500', '24/05/2020'),
(118, 'Sticky Notes', '7', '', '5000', '24/05/2020'),
(119, 'Sticky Notes', '6', '', '1000', '24/05/2020'),
(120, 'Sticky Notes', '4', '', '1500', '24/05/2020'),
(121, 'TRA Rollers Ndogo', '7', '', '2000', '24/05/2020'),
(122, 'TRA Rollers Za Kati', '6', '', '3000', '24/05/2020'),
(123, 'Piano Pen', '61', '', '2000', '24/05/2020'),
(124, 'Cello Pen', '2', '', '500', '24/05/2020'),
(125, 'Nataraj Pen', '167', '', '300', '24/05/2020'),
(126, 'Obama Pen', '255', '', '200', '24/05/2020'),
(127, 'Ball Pen', '66', '', '1000', '24/05/2020'),
(128, 'Staple Pins (kangaroo)', '26', '', '1000', '24/05/2020'),
(129, 'Staple Pins', '1', '', '1500', '24/05/2020'),
(130, 'Staple Pins', '9', '', '500', '24/05/2020'),
(131, 'Office Pins', '32', '', '500', '24/05/2020'),
(132, 'Thumb Tacks', '70', '', '500', '24/05/2020'),
(133, 'Glue Stick', '8', '', '1500', '24/05/2020'),
(134, 'Glue Stick', '10', '', '2500', '24/05/2020'),
(135, 'Gundi Ya Maji', '7', '', '1500', '24/05/2020'),
(136, 'Bubbles', '10', '', '2000', '24/05/2020'),
(137, 'Pen (kuku Malo)', '20', '', '300', '24/05/2020'),
(138, 'Large Capacity Pen', '22', '', '2000', '24/05/2020'),
(139, 'Butterflow Pen', '20', '', '2000', '24/05/2020'),
(140, 'Soft Gel Pen', '11', '', '2000', '24/05/2020'),
(141, 'Jiake Pen', '7', '', '2000', '24/05/2020'),
(142, 'Nataraj Pencil', '92', '', '300', '24/05/2020'),
(143, 'HB Pencil', '22', '', '500', '24/05/2020'),
(144, 'Ruler', '77', '', '500', '24/05/2020'),
(145, 'Ruler', '12', '', '1500', '24/05/2020');

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

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`trashID`, `productID`, `productName`, `productQuantity`, `buyingPrice`, `sellingPrice`, `dateDeleted`) VALUES
(1, 4, 'Frame A5', '12', '', '', '22/05/2020');

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
(1, 'admin', 'admin');

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
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `trashID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
