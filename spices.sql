-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 11:00 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spices`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `bid` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `primary_business` varchar(255) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`bid`, `customer_id`, `company_name`, `primary_business`, `company_address`, `product`) VALUES
(2, 'PSB01aadi', '', 'buyer', '', 'jkhbkju'),
(3, 'PSB01chhotu', '', 'buyer', '', 'spices'),
(4, 'PSB01anshu', '', 'Buyer', '', 'Turmeric'),
(5, 'PSB01hhhhhdh', 'h', 'Buyer', 'h', 'fghdrh'),
(6, 'PSB01sangita', 'hjgjnghjg', 'Buyer', 'fghgnghf', 'sdajhbjkholijl'),
(7, 'PSB01chhotupathak', 'hjgjnghjg', 'Buyer', 'jhbiyhhho', 'gv8yy89'),
(8, 'PSB01Gungun', 'xcfvfgdb', 'Buyer', 'hggj', 'turmeric,ginger'),
(9, 'PSB01Abhinav', 'Spices', 'Seller', 'Delhi', 'turmeric,ginger'),
(10, 'PSB01tanu', 'comp', 'Seller', 'bangla ghat', 'turmeric,ginger'),
(11, 'PSB01admin', 'ghjhgfjf', 'admin', 'comp', 'all'),
(12, 'PSB01admin1', '', '', '', ''),
(13, 'PSB01akp', 'ashjhgd', 'buyer', 'chivgg', 'ginger');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `skype_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `customer_id`, `name`, `country`, `skype_id`, `email`, `contact`, `website`, `address`) VALUES
(4, 'PSB01aadi', '', '', '', 'aadi@gmail.com', 9789896879, '', 'mnbjkkjo'),
(5, 'PSB01chhotu', '', '', '', 'pathakji508@gmail.com', 9384794835, '', 'CHINI MILL, BUXAR'),
(6, 'PSB01anshu', '', '', '', 'anshu@gmail.com', 987909809, '', 'xcvkjnolk'),
(7, 'PSB01jaiho', 'tgrrt', 'thh', 'tgrg', 'ffsergfs@gmail.com', 4564564566, 'ghdbhtjh', 'yhthhj'),
(8, 'PSB01hhhhhdh', 'hhh', 'h', 'fgf', 'fgfgh@gmail.com', 678, 'h', 'h'),
(9, 'PSB01sangita', 'Sangita Kumari', 'India', 'Sangita Kumari', 'sangita@gmail.com', 58678678, 'ahhhok', 'CHINI MILL, BUXAR'),
(10, 'PSB01chhotupathak', 'Chhotu ', 'ybuyh89', 'y8y9hu', 'anushkapandey878@gmail.com', 9798998766, 'ygv8y89', 'ygjojiui'),
(11, 'PSB01Gungun', 'Gungun Pathak', 'India', 'dbkjkijd', 'gungun@gmail.com', 9798789879, 'ahhhok', 'gbbbbbbbbbbbbb'),
(12, 'PSB01Abhinav', 'Abhinav Pathak', 'India', 'ikjhndlij', 'gmvksu@gmail.com', 5675688798, 'bghgjkhjkllj', 'Chini Mill'),
(13, 'PSB01tanu', 'Tanu', 'India', 'kjhdfjho', 'abc@gmail.com', 9572012129, 'fgxgfbx', 'MOH-CHINIMILL,POST-GAJADHARGANJ, WARD-34'),
(14, 'PSB01admin', 'Admin', 'India', 'fgbf', 'admin@gmail.com', 8797807808, 'fdhfgjfj', 'MOH-CHINIMILL,POST-GAJADHARGANJ, WARD-34'),
(15, 'PSB01admin1', 'akp', '123', 'asdffffff', 'jhjh@gmail.com', 0, '', ''),
(16, 'PSB01akp', 'AK Pathak', 'india', 'jhgkjh', 'akp@gmail.com', 8098798, 'iuikjhkj', 'chyiuu');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `customer_id`, `username`, `email`, `password`, `reg_date`, `status`) VALUES
(13, 'PSB01aadi', 'aadi', 'aadi@gmail.com', 'aadi@123', '2021-05-05', 'Inactive'),
(14, 'PSB01chhotu', 'chhotu', 'pathakji508@gmail.com', 'chhotuA123', '2021-05-11', 'Active'),
(15, 'PSB01anshu', 'anshu', 'anshu@gmail.com', 'anshu@1234', '2021-05-03', 'Active'),
(16, 'PSB01jaiho', 'jaiho', 'ffsergfs@gmail.com', 'gdrgrg', '2021-05-08', 'Active'),
(17, 'PSB01hhhhhdh', 'hhhhhdh', 'fgfgh@gmail.com', 'fghghfh', '2021-05-08', 'Inactive'),
(18, 'PSB01sangita', 'sangita', 'sangitapathak@gmail.com', 'admin123', '2021-05-09', 'Active'),
(19, 'PSB01chhotupathak', 'chhotupathak', 'anushkapandey878@gmail.com', 'chhotu@123', '2021-05-16', 'Inactive'),
(20, 'PSB01Gungun', 'Gungun', 'gungun@gmail.com', 'gungun@123', '2021-05-18', 'Active'),
(21, 'PSB01Abhinav', 'Abhinav', 'gmvksu@gmail.com', 'dablu@123', '2021-05-19', 'Inactive'),
(22, 'PSB01tanu', 'tanu', 'abc@gmail.com', 'tanu@123', '2021-05-24', 'Inactive'),
(23, 'PSB01admin', 'admin', 'admin@gmail.com', 'admin@123', '2021-05-27', 'Active'),
(24, 'PSB01admin1', 'admin1', 'jhjh@gmail.com', 'admin@123', '0000-00-00', 'Active'),
(25, 'PSB01akp', 'akp', 'akp@gmail.com', 'akp123', '2021-05-31', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `req_id` int(11) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `product` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`req_id`, `customer_id`, `product`, `quantity`, `unit`, `name`, `contact`, `email`, `Status`, `Comments`) VALUES
(1, '', 'turmeric', 10, 'dfjhbkj', 'anshu', 987980909, '', '', ''),
(2, 'PSB01', 'sdajhbjkholijl', 10, 'dfjhbkj', 'Chhotu ', 8787888, 'anushkapandey878@gmail.com', '', ''),
(3, 'PSB01anshu', 'sdajhbjkholijl', 10, 'dfjhbkj', 'Anshu', 9955876878, 'anshu@gmail.com', '', ''),
(4, 'PSB01sangita', 'turmeric', 100, 'kg', 'Sangita Pathak', 7849894044, 'sangitapathak@gmail.com', '', ''),
(6, 'PSB01sangita', 'Ginger', 100, 'kg', 'Sangita Pathak', 8759805556, 'sangitapathak@gmail.com', '', ''),
(7, 'PSB01Gungun', 'turmeric', 74, 'kg', 'Gungun Pathak', 9879489746, 'gungun@gmail.com', 'Active', '-'),
(8, 'PSB01chhotupathak', 'Ginger', 30, 'kg', 'ABHIJEET KUMAR PATHAK', 6786789789, 'anushkapandey878@gmail.com', 'Active', '-'),
(9, 'PSB01chhotupathak', 'turmeric,ginger', 100, 'kg', 'Chhotu ', 9572012129, 'anushkapandey878@gmail.com', 'Active', '-'),
(12, 'PSB01akp', 'turmeric', 10, 'kg', 'Anshu', 9955867077, 'anshu@gmail.com', 'Active', '-');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sid` int(11) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `product_type` varchar(40) NOT NULL,
  `product _name` varchar(40) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `bulk_price` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `quantity` int(9) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `supplier_location` text NOT NULL,
  `location_interested` text NOT NULL,
  `additional_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
