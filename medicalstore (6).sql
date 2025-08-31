-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 11:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcompany`
--

CREATE TABLE `addcompany` (
  `cid` int(11) NOT NULL,
  `auid` varchar(200) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addcompany`
--

INSERT INTO `addcompany` (`cid`, `auid`, `cname`, `email`, `mobile`, `address`, `is_delete`) VALUES
(3, '3', 'Cipla', 'cipla@gmail.com', '764234', 'Indore', 0);

-- --------------------------------------------------------

--
-- Table structure for table `addcustomer`
--

CREATE TABLE `addcustomer` (
  `cuid` int(11) NOT NULL,
  `auid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addcustomer`
--

INSERT INTO `addcustomer` (`cuid`, `auid`, `name`, `email`, `mobile`, `address`, `is_delete`) VALUES
(1, '12', 'Rakesh', 'rakesh@gmail.com', '872984', 'Bhopal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `adddistributor`
--

CREATE TABLE `adddistributor` (
  `did` int(11) NOT NULL,
  `auid` varchar(200) NOT NULL,
  `dcname` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `is_delete` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adddistributor`
--

INSERT INTO `adddistributor` (`did`, `auid`, `dcname`, `name`, `email`, `mobile`, `address`, `is_delete`) VALUES
(1, '1', 'Meher Pvt. Ltd.', 'abhiiii', 'abhi@gmail.com', '6260142466', 'Bhopali', '0'),
(2, '1', 'Deva Pvt. Ltd.', 'dev', 'dev@gmail.com', '2414141123', 'Indore', '0'),
(3, '1', 'Ak Pvt. Ltd.', 'akash', 'akashhh@gmail.com', '2414141', 'Bhopali', '0'),
(8, '1', 'Aj Pvt. Ltd.', 'ajay', 'ajay@gmail.com', '78329424', 'Indor', '0'),
(12, '1', 'Ay Pvt. Ltd.', 'Ayush', 'ayush@gamil.com', '6587976878', 'Bhopal', '0'),
(13, '10', 'Deva Pvt. Ltd.', 'dev', 'dev@gmail.com', '2414141123', 'Indore', '0'),
(14, '10', 'Meher Pvt. Ltd.', 'abhiiii', 'abhi@gmail.com', '6260142466', 'Bhopali', '0'),
(17, '10', 'Aj Pvt. Ltd.', 'ajay', 'ajay@gmail.com', '78329424', 'Indor', '1');

-- --------------------------------------------------------

--
-- Table structure for table `addretailer`
--

CREATE TABLE `addretailer` (
  `rid` int(11) NOT NULL,
  `auid` varchar(200) NOT NULL,
  `rcname` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addretailer`
--

INSERT INTO `addretailer` (`rid`, `auid`, `rcname`, `name`, `email`, `mobile`, `address`, `is_delete`) VALUES
(1, '10', 'Hanuman Pvt Ltd', 'hi', 'hi@gmail.com', '237483246', 'shahdol', 0);

-- --------------------------------------------------------

--
-- Table structure for table `addwholesaler`
--

CREATE TABLE `addwholesaler` (
  `wid` int(11) NOT NULL,
  `auid` varchar(200) NOT NULL,
  `wcname` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addwholesaler`
--

INSERT INTO `addwholesaler` (`wid`, `auid`, `wcname`, `name`, `email`, `mobile`, `address`, `is_delete`) VALUES
(1, '3', 'Ganraj Medico', 'Ganraj', 'ganraj@gmail.com', '72649316', 'Hyderabad', 0),
(3, '12', 'Ganraj Medico', 'Ganraj', 'ganraj@gmail.com', '72649316', 'Hyderabad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `category`) VALUES
(1, 'Tablet'),
(2, 'syrup'),
(3, 'injection');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discountid` int(11) NOT NULL,
  `discount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discountid`, `discount`) VALUES
(1, 5),
(2, 10),
(3, 15),
(4, 20),
(5, 25),
(6, 30),
(7, 35),
(8, 40);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `mid` int(11) NOT NULL,
  `amuid` varchar(200) NOT NULL,
  `medicine_name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `cost_price` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `manudate` varchar(200) NOT NULL,
  `expiry` date NOT NULL,
  `price_distributor` varchar(200) NOT NULL,
  `price_wholesaler` varchar(200) NOT NULL,
  `price_retailer` varchar(200) NOT NULL,
  `mrp` varchar(200) NOT NULL,
  `percentaged` varchar(200) NOT NULL,
  `percentagew` varchar(200) NOT NULL,
  `percentager` varchar(200) NOT NULL,
  `percentagea` varchar(200) NOT NULL,
  `is_delete` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`mid`, `amuid`, `medicine_name`, `category`, `cost_price`, `quantity`, `manudate`, `expiry`, `price_distributor`, `price_wholesaler`, `price_retailer`, `mrp`, `percentaged`, `percentagew`, `percentager`, `percentagea`, `is_delete`) VALUES
(7, '1', 'Paracetamol', 'Tablet', '100', '80000', '2022-03-20', '2022-03-22', '120', '135', '160', '190', '20', '15', '25', '30', '0'),
(9, '1', 'ROKO', 'injection', '15', '54000', '2022-03-20', '2025-10-17', '18.75', '24', '27.75', '33', '25', '35', '25', '35', '0'),
(10, '1', 'Antibiotic Drugs', 'Tablet', '40', '34100', '2022-03-20', '2025-06-11', '48', '54', '66', '76', '20', '15', '30', '25', '0'),
(11, '1', 'Vicodin ', 'Tablet', '50', '90000', '2022-03-21', '2024-06-11', '60', '70', '80', '90', '20', '20', '20', '20', '0'),
(12, '2', 'ROKO', 'injection', '', '4500', '', '2025-10-17', '', '', '', '33', '', '', '', '', '0'),
(13, '2', 'Antibiotic Drugs', 'Tablet', '', '250', '', '2025-06-11', '', '', '', '76', '', '', '', '', '0'),
(14, '3', 'ROKO', 'injection', '', '8900', '', '2025-10-17', '', '', '', '33', '', '', '', '', '0'),
(15, '3', 'Antibiotic Drugs', 'Tablet', '', '3300', '', '2025-06-11', '', '', '', '76', '', '', '', '', '0'),
(16, '10', 'Antibiotic Drugs', 'Tablet', '', '1920', '', '2025-06-11', '', '', '', '76', '', '', '', '', '0'),
(17, '10', 'ROKO', 'injection', '', '880', '', '2025-10-17', '', '', '', '33', '', '', '', '', '0'),
(18, '12', 'Antibiotic Drugs', 'Tablet', '', '515', '', '2025-06-11', '', '', '', '76', '', '', '', '', '0'),
(21, '13', 'Antibiotic Drugs', 'Tablet', '', '25', '', '2025-06-11', '', '', '', '76', '', '', '', '', '0'),
(22, '12', 'ROKO', 'injection', '', '650', '', '2025-10-17', '', '', '', '33', '', '', '', '', '0'),
(26, '1', 'altrazin', 'Tablet', '10', '10000', '2022-03-30', '2024-07-17', '11.5', '13.5', '16', '17.5', '15', '20', '25', '15', '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `soid` int(11) NOT NULL,
  `roid` int(11) NOT NULL,
  `medicine_name` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `d_date` varchar(200) NOT NULL,
  `p_method` varchar(200) NOT NULL,
  `o_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `soid`, `roid`, `medicine_name`, `quantity`, `order_date`, `d_date`, `p_method`, `o_status`) VALUES
(7, 3, 1, 'ROKO', '100', '2022-03-25', '2022-11-12', 'Net banking', 'order recived'),
(9, 3, 1, 'ROKO', '500', '2022-03-26', '2025-06-13', 'Card payment', 'order recived'),
(10, 3, 1, 'Antibiotic Drugs', '200', '2022-03-28', '2022-04-28', 'Card payment', 'order recived'),
(11, 10, 3, 'Antibiotic Drugs', '50', '2022-03-28', '2022-04-28', 'Card payment', 'order recived'),
(12, 10, 2, 'ROKO', '500', '2022-03-28', '2022-04-29', 'Card payment', 'order pending'),
(13, 12, 10, 'ROKO', '50', '2022-03-29', '2022-04-30', 'Net banking', 'order recived'),
(14, 10, 3, 'Antibiotic Drugs', '100', '2022-03-29', '2022-04-30', 'Card payment', 'order recived'),
(15, 12, 10, 'Antibiotic Drugs', '20', '2022-03-29', '2022-04-30', 'Card payment', 'order recived'),
(16, 10, 3, 'ROKO', '100', '2022-03-29', '2022-04-30', 'Card payment', 'order recived'),
(17, 10, 3, 'ROKO', '1000', '2022-03-29', '2022-05-01', 'Net banking', 'order recived'),
(18, 3, 1, 'Antibiotic Drugs', '500', '2022-03-30', '2022-05-01', 'Net banking', 'order recived'),
(19, 10, 3, 'Antibiotic Drugs', '300', '2022-03-30', '2022-05-06', 'Card payment', 'order recived'),
(20, 10, 3, 'ROKO', '200', '2022-03-30', '2022-05-04', 'Net banking', 'order recived'),
(23, 3, 1, 'Antibiotic Drugs', '1000', '2022-03-30', '2022-05-08', 'Card payment', 'order recived'),
(24, 10, 3, 'ROKO', '500', '2022-03-30', '2022-05-08', 'Card payment', 'order recived'),
(25, 12, 10, 'Antibiotic Drugs', '500', '2022-03-30', '2022-05-03', 'Card payment', 'order recived'),
(26, 12, 10, 'ROKO', '600', '2022-03-30', '2022-05-06', 'Card payment', 'order recived'),
(27, 10, 3, 'ROKO', '2000', '2022-03-30', '2022-05-21', 'Net banking', 'order recived'),
(28, 10, 3, 'Antibiotic Drugs', '2000', '2022-03-30', '2022-05-07', 'Net banking', 'order recived'),
(29, 3, 1, 'Antibiotic Drugs', '4000', '2022-03-30', '2022-05-01', 'Net banking', 'order recived'),
(30, 3, 1, 'ROKO', '5000', '2022-03-30', '2022-06-05', 'Net banking', 'order recived'),
(31, 3, 1, 'Antibiotic Drugs', '400', '2022-03-30', '2022-05-01', 'Net banking', 'order send');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `payment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `payment`) VALUES
(1, 'Cash Payment'),
(2, 'Card payment'),
(3, 'Net banking');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `pid` int(11) NOT NULL,
  `salerid` varchar(200) NOT NULL,
  `reciverid` varchar(200) NOT NULL,
  `medicine_name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `expiry` date NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `mrp` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `purchase_price` varchar(200) NOT NULL,
  `p_method` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`pid`, `salerid`, `reciverid`, `medicine_name`, `category`, `expiry`, `date`, `mrp`, `quantity`, `purchase_price`, `p_method`) VALUES
(43, '1', '3', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-26', '76', '1000', '48000', 'Cash Payment'),
(45, '1', '2', 'Vicodin ', 'Tablet', '2024-06-11', '2022-03-26', '90', '100', '6000', 'Cash Payment'),
(46, '1', '3', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-26', '76', '200', '9600', 'Cash Payment'),
(47, '1', '2', 'Vicodin ', 'Tablet', '2024-06-11', '2022-03-26', '90', '50', '3000', 'Cash Payment'),
(51, '1', '3', 'ROKO', 'injection', '2025-10-17', '2022-03-26', '33', '500', '9375', 'Card payment'),
(52, '1', '3', 'ROKO', 'injection', '2025-10-17', '2022-03-26', '33', '100', '1875', 'Net banking'),
(54, '3', '10', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '30', '720', 'Cash Payment'),
(55, '3', '10', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-27', '76', '250', '13500', 'Cash Payment'),
(56, '1', '3', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-27', '76', '500', '24000', 'Cash Payment'),
(57, '1', '3', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-27', '76', '200', '9600', 'Cash Payment'),
(58, '1', '2', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-27', '76', '200', '9600', 'Cash Payment'),
(59, '1', '3', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '1500', '28125', 'Cash Payment'),
(60, '1', '3', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-27', '76', '300', '14400', 'Cash Payment'),
(61, '3', '10', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-27', '76', '50', '2700', 'Cash Payment'),
(62, '1', '3', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '300', '5625', 'Cash Payment'),
(63, '1', '3', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '100', '1875', 'Cash Payment'),
(64, '1', '2', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '100', '1875', 'Cash Payment'),
(65, '1', '2', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '100', '1875', 'Cash Payment'),
(66, '1', '2', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '300', '5625', 'Cash Payment'),
(67, '1', '2', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '200', '3750', 'Cash Payment'),
(68, '1', '2', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '300', '5625', 'Cash Payment'),
(69, '1', '2', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '100', '1875', 'Cash Payment'),
(70, '1', '2', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '100', '1875', 'Cash Payment'),
(71, '1', '3', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '1000', '18750', 'Cash Payment'),
(72, '3', '10', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '2000', '48000', 'Cash Payment'),
(73, '3', '10', 'ROKO', 'injection', '2025-10-17', '2022-03-27', '33', '500', '12000', 'Cash Payment'),
(74, '1', '3', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-28', '76', '200', '9600', 'Card payment'),
(83, '10', '12', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-28', '76', '20', '1320', 'Cash Payment'),
(84, '10', '12', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-28', '76', '30', '1980', 'Cash Payment'),
(88, '3', '10', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-28', '76', '50', '2400', 'Card payment'),
(89, '10', '12', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-28', '76', '60', '3960', 'Cash Payment'),
(90, '12', '13', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-29', '76', '5', '380', 'Cash Payment'),
(91, '3', '10', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-29', '76', '100', '4800', 'Card payment'),
(92, '3', '10', 'ROKO', 'injection', '2025-10-17', '2022-03-29', '33', '100', '1875', 'Card payment'),
(93, '3', '10', 'ROKO', 'injection', '2025-10-17', '2022-03-29', '33', '1000', '18750', 'Net banking'),
(94, '10', '12', 'ROKO', 'injection', '2025-10-17', '2022-03-29', '33', '500', '13875', 'Card payment'),
(95, '10', '12', 'ROKO', 'injection', '2025-10-17', '2022-03-30', '33', '50', '937.5', 'Net banking'),
(96, '10', '12', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '15', '990', 'Net banking'),
(97, '10', '12', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '5', '330', 'Net banking'),
(98, '3', '10', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '100', '5400', 'Cash Payment'),
(99, '3', '10', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '300', '14400', 'Card payment'),
(101, '1', '3', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '500', '24000', 'Net banking'),
(103, '1', '3', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '1000', '48000', 'Card payment'),
(104, '10', '12', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '20', '960', 'Card payment'),
(105, '1', '3', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '4000', '192000', 'Net banking'),
(106, '1', '3', 'ROKO', 'injection', '2025-10-17', '2022-03-30', '33', '5000', '93750', 'Net banking'),
(107, '3', '10', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '2000', '96000', 'Net banking'),
(108, '3', '10', 'ROKO', 'injection', '2025-10-17', '2022-03-30', '33', '200', '3750', 'Net banking'),
(109, '3', '10', 'ROKO', 'injection', '2025-10-17', '2022-03-30', '33', '500', '9375', 'Card payment'),
(110, '3', '10', 'ROKO', 'injection', '2025-10-17', '2022-03-30', '33', '2000', '37500', 'Net banking'),
(111, '10', '12', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '500', '24000', 'Card payment'),
(112, '10', '12', 'ROKO', 'injection', '2025-10-17', '2022-03-30', '33', '600', '11250', 'Card payment'),
(113, '12', '13', 'Antibiotic Drugs', 'Tablet', '2025-06-11', '2022-03-30', '76', '20', '1520', 'Cash Payment'),
(114, '3', '10', 'ROKO', 'injection', '2025-10-17', '2022-03-30', '33', '900', '21600', 'Cash Payment');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` int(11) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `role`) VALUES
(1, 'manufacturer company'),
(2, 'distributor'),
(3, 'wholesaler'),
(4, 'retailer'),
(5, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleid` int(11) NOT NULL,
  `salerid` varchar(200) NOT NULL,
  `reciverid` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `mcategory` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `qty` varchar(200) NOT NULL,
  `mrp` varchar(200) NOT NULL,
  `sale_price` varchar(200) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `payment_type` varchar(200) NOT NULL,
  `payment_status` varchar(200) NOT NULL DEFAULT 'recive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleid`, `salerid`, `reciverid`, `mname`, `mcategory`, `date`, `qty`, `mrp`, `sale_price`, `totalamount`, `payment_type`, `payment_status`) VALUES
(5, '1', '3', 'Antibiotic Drugs', 'Tablet', '2022-03-26', '1000', '76', '48', 48000, 'Cash Payment', 'recive'),
(7, '1', '2', 'Vicodin ', 'Tablet', '2022-03-26', '100', '90', '60', 6000, 'Cash Payment', 'recive'),
(8, '1', '3', 'Antibiotic Drugs', 'Tablet', '2022-03-26', '200', '76', '48', 9600, 'Cash Payment', 'recive'),
(9, '1', '2', 'Vicodin ', 'Tablet', '2022-03-26', '50', '90', '60', 3000, 'Cash Payment', 'refund'),
(10, '1', '3', 'ROKO', 'injection', '2022-03-26', '500', '33', '18.75', 9375, 'Card payment', 'recive'),
(11, '3', '10', 'ROKO', 'injection', '2022-03-27', '30', '33', '24', 720, 'Cash Payment', 'recive'),
(12, '3', '10', 'Antibiotic Drugs', 'Tablet', '2022-03-27', '250', '76', '54', 13500, 'Cash Payment', 'recive'),
(13, '1', '3', 'Antibiotic Drugs', 'Tablet', '2022-03-27', '500', '76', '48', 24000, 'Cash Payment', 'recive'),
(14, '1', '3', 'Antibiotic Drugs', 'Tablet', '2022-03-27', '200', '76', '48', 9600, 'Cash Payment', 'recive'),
(15, '1', '2', 'Antibiotic Drugs', 'Tablet', '2022-03-27', '200', '76', '48', 9600, 'Cash Payment', 'recive'),
(16, '1', '3', 'ROKO', 'injection', '2022-03-27', '1500', '33', '18.75', 28125, 'Cash Payment', 'recive'),
(17, '1', '3', 'Antibiotic Drugs', 'Tablet', '2022-03-27', '300', '76', '48', 14400, 'Cash Payment', 'recive'),
(18, '3', '10', 'Antibiotic Drugs', 'Tablet', '2022-03-27', '50', '76', '54', 2700, 'Cash Payment', 'recive'),
(19, '1', '3', 'ROKO', 'injection', '2022-03-27', '300', '33', '18.75', 5625, 'Cash Payment', 'recive'),
(20, '1', '3', 'ROKO', 'injection', '2022-03-27', '100', '33', '18.75', 1875, 'Cash Payment', 'recive'),
(21, '1', '2', 'ROKO', 'injection', '2022-03-27', '100', '33', '18.75', 1875, 'Cash Payment', 'recive'),
(22, '1', '2', 'ROKO', 'injection', '2022-03-27', '100', '33', '18.75', 1875, 'Cash Payment', 'recive'),
(23, '1', '2', 'ROKO', 'injection', '2022-03-27', '300', '33', '18.75', 5625, 'Cash Payment', 'recive'),
(24, '1', '2', 'ROKO', 'injection', '2022-03-27', '200', '33', '18.75', 3750, 'Cash Payment', 'recive'),
(25, '1', '2', 'ROKO', 'injection', '2022-03-27', '300', '33', '18.75', 5625, 'Cash Payment', 'recive'),
(26, '1', '2', 'ROKO', 'injection', '2022-03-27', '100', '33', '18.75', 1875, 'Cash Payment', 'recive'),
(27, '1', '2', 'ROKO', 'injection', '2022-03-27', '100', '33', '18.75', 1875, 'Cash Payment', 'recive'),
(28, '1', '3', 'ROKO', 'injection', '2022-03-27', '1000', '33', '18.75', 18750, 'Cash Payment', 'refund'),
(29, '3', '10', 'ROKO', 'injection', '2022-03-27', '2000', '33', '24', 48000, 'Cash Payment', 'refund'),
(30, '3', '10', 'ROKO', 'injection', '2022-03-27', '500', '33', '24', 12000, 'Cash Payment', 'refund'),
(31, '1', '3', 'Antibiotic Drugs', 'Tablet', '2022-03-28', '200', '76', '48', 9600, 'Card payment', 'refund'),
(32, '10', '12', 'Antibiotic Drugs', 'Tablet', '2022-03-28', '20', '76', '66', 1320, 'Cash Payment', 'refund'),
(33, '10', '12', 'Antibiotic Drugs', 'Tablet', '2022-03-28', '30', '76', '66', 1980, 'Cash Payment', 'refund'),
(34, '3', '10', 'Antibiotic Drugs', 'Tablet', '2022-03-28', '50', '76', '54', 2700, 'Card payment', 'recive'),
(35, '10', '12', 'Antibiotic Drugs', 'Tablet', '2022-03-28', '60', '76', '66', 3960, 'Cash Payment', 'refund'),
(36, '12', '13', 'Antibiotic Drugs', 'Tablet', '2022-03-29', '5', '76', '76', 380, 'Cash Payment', 'recive'),
(37, '3', '10', 'Antibiotic Drugs', 'Tablet', '2022-03-29', '100', '76', '54', 5400, 'Card payment', 'refund'),
(38, '3', '10', 'ROKO', 'injection', '2022-03-29', '100', '33', '24', 2400, 'Card payment', 'refund'),
(39, '3', '10', 'ROKO', 'injection', '2022-03-29', '1000', '33', '24', 24000, 'Net banking', 'refund'),
(40, '10', '12', 'ROKO', 'injection', '2022-03-29', '500', '33', '27.75', 13875, 'Card payment', 'refund'),
(41, '10', '12', 'ROKO', 'injection', '2022-03-30', '50', '33', '27.75', 1388, 'Net banking', 'recive'),
(44, '10', '12', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '20', '76', '66', 1320, 'Card payment', 'recive'),
(47, '10', '12', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '15', '76', '66', 990, 'Net banking', 'recive'),
(48, '10', '12', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '5', '76', '66', 330, 'Net banking', 'recive'),
(49, '3', '10', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '100', '76', '54', 5400, 'Cash Payment', 'recive'),
(50, '1', '3', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '500', '76', '48', 24000, 'Net banking', 'recive'),
(51, '3', '10', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '300', '76', '54', 16200, 'Card payment', 'recive'),
(54, '1', '3', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '1000', '76', '48', 48000, 'Card payment', 'recive'),
(55, '1', '3', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '4000', '76', '48', 192000, 'Net banking', 'recive'),
(56, '1', '3', 'ROKO', 'injection', '2022-03-30', '5000', '33', '18.75', 93750, 'Net banking', 'recive'),
(57, '3', '10', 'ROKO', 'injection', '2022-03-30', '200', '33', '24', 4800, 'Net banking', 'recive'),
(58, '3', '10', 'ROKO', 'injection', '2022-03-30', '500', '33', '24', 12000, 'Card payment', 'recive'),
(59, '3', '10', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '2000', '76', '54', 108000, 'Net banking', 'recive'),
(60, '3', '10', 'ROKO', 'injection', '2022-03-30', '2000', '33', '24', 48000, 'Net banking', 'refund'),
(61, '10', '12', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '500', '76', '66', 33000, 'Card payment', 'recive'),
(62, '10', '12', 'ROKO', 'injection', '2022-03-30', '600', '33', '27.75', 16650, 'Card payment', 'recive'),
(63, '12', '13', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '20', '76', '76', 1520, 'Cash Payment', 'recive'),
(64, '3', '10', 'ROKO', 'injection', '2022-03-30', '900', '33', '24', 21600, 'Cash Payment', 'refund'),
(65, '1', '3', 'Antibiotic Drugs', 'Tablet', '2022-03-30', '400', '76', '48', 19200, 'Net banking', 'recive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL DEFAULT '123',
  `address` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `mobile`, `email`, `password`, `address`, `img`, `role`) VALUES
(1, 'cipla', '764234', 'cipla@gmail.com', 'cipla', 'Indore', 'img/logo.jpg', '1'),
(2, 'abhiiii', '6260142466', 'abhi@gmail.com', '123', 'Bhopali', '', '2'),
(3, 'dev', '2414141123', 'dev@gmail.com', '123', 'Bhopal\r\n', 'img/20190624_130055.jpg', '2'),
(4, 'akash', '2414141', 'akashhh@gmail.com', '234', 'Bhopali', '', '2'),
(7, 'ajay', '78329424', 'ajay@gmail.com', '123', 'Indor', '', '2'),
(10, 'Ganraj', '72649316', 'ganraj@gmail.com', '123', 'Hyderabad', 'img/images.jpg', '3'),
(11, 'Ayush', '6587976878', 'ayush@gamil.com', '123', 'Bhopal', '', '2'),
(12, 'hi', '237483246', 'hi@gmail.com', '123', 'shahdol', 'img/IMG-20201212-WA0005 (2).jpg', '4'),
(13, 'Rakesh', '872984', 'rakesh@gmail.com', '123', 'Bhopal', '', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcompany`
--
ALTER TABLE `addcompany`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `addcustomer`
--
ALTER TABLE `addcustomer`
  ADD PRIMARY KEY (`cuid`);

--
-- Indexes for table `adddistributor`
--
ALTER TABLE `adddistributor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `addretailer`
--
ALTER TABLE `addretailer`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `addwholesaler`
--
ALTER TABLE `addwholesaler`
  ADD PRIMARY KEY (`wid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discountid`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcompany`
--
ALTER TABLE `addcompany`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `addcustomer`
--
ALTER TABLE `addcustomer`
  MODIFY `cuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adddistributor`
--
ALTER TABLE `adddistributor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `addretailer`
--
ALTER TABLE `addretailer`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addwholesaler`
--
ALTER TABLE `addwholesaler`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discountid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `saleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
