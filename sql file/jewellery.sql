-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 03:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewellery`
--
CREATE DATABASE jewellery;
USE jewellery;
DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCustomerDetails` (IN `customerId` VARCHAR(20))   BEGIN
    SELECT * FROM Customer WHERE CID = customerId;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` varchar(10) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `full_name`, `address`, `phone_no`, `email`) VALUES
('C01', 'Rahul Kumar', '123, Main Street, Kolkata', 9876543210, 'rahul@example.com'),
('C02', 'Priya Sharma', '456, MG Road, Mumbai', 8765432109, 'priya@example.com'),
('C03', 'Amit Patel', '789, Gandhi Nagar, Delhi', 7654321098, 'amit@example.com'),
('C04', 'Pooja Gupta', '321, Park Avenue, Bangalore', 6543210987, 'pooja@example.com'),
('C05', 'Rajesh Singh', '654, Brigade Road, Chennai', 5432109876, 'rajesh@example.com'),
('C06', 'Sneha Mishra', '987, Civil Lines, Hyderabad', 4321098765, 'sneha@example.com'),
('C07', 'Kunal Reddy', '210, Jubilee Hills, Hyderabad', 3210987654, 'kunal@example.com'),
('C08', 'Deepak Verma', '543, MG Road, Pune', 2109876543, 'deepak@example.com'),
('C09', 'Ananya Desai', '876, Koregaon Park, Pune', 1098765432, 'ananya@example.com'),
('C10', 'Aryan Khanna', '109, Connaught Place, Delhi', 987654321, 'aryan@example.com'),
('C11', 'Neha Gupta', '432, Whitefield, Bangalore', 9876543210, 'neha@example.com'),
('C12', 'Sachin Sharma', '765, BTM Layout, Bangalore', 8765432109, 'sachin@example.com'),
('C13', 'Shreya Singh', '098, Anna Nagar, Chennai', 7654321098, 'shreya@example.com'),
('C14', 'Varun Reddy', '321, Gachibowli, Hyderabad', 6543210987, 'varun@example.com'),
('C15', 'Ishaan Patel', '654, Nungambakkam, Chennai', 5432109876, 'ishaan@example.com'),
('C16', 'Mehak Kapoor', '987, Banjara Hills, Hyderabad', 4321098765, 'mehak@example.com'),
('C17', 'Arjun Gupta', '210, Sadashivnagar, Bangalore', 3210987654, 'arjun@example.com'),
('C18', 'Niharika Sharma', '543, Malleshwaram, Bangalore', 2109876543, 'niharika@example.com'),
('C19', 'Yuvraj Singh', '876, Begumpet, Hyderabad', 1098765432, 'yuvraj@example.com'),
('C20', 'Tanvi Verma', '109, HSR Layout, Bangalore', 987654321, 'tanvi@example.com'),
('C21', 'Kabir Joshi', '432, Bandra, Mumbai', 9876543210, 'kabir@example.com'),
('C22', 'Ishita Mehta', '765, Worli, Mumbai', 8765432109, 'ishita@example.com'),
('C23', 'Rishi Kapoor', '098, Colaba, Mumbai', 7654321098, 'rishi@example.com'),
('C24', 'Aarav Gupta', '321, Andheri, Mumbai', 6543210987, 'aarav@example.com'),
('C25', 'Trisha Singh', '654, Juhu, Mumbai', 5432109876, 'trisha@example.com'),
('C26', 'Kriti Sharma', '987, Thane, Mumbai', 4321098765, 'kriti@example.com'),
('C27', 'Karan Patel', '210, Powai, Mumbai', 3210987654, 'karan@example.com'),
('C28', 'Aarohi Desai', '543, Vashi, Mumbai', 2109876543, 'aarohi@example.com'),
('C29', 'Rohit Khanna', '876, Panvel, Mumbai', 1098765432, 'rohit@example.com'),
('C30', 'Ishani Reddy', '109, Gurgaon, Delhi', 987654321, 'ishani@example.com'),
('C31', 'Aarav Kumar', '432, Noida, Delhi', 9876543210, 'aarav@example.com'),
('C32', 'Ritika Sharma', '765, Ghaziabad, Delhi', 8765432109, 'ritika@example.com'),
('C33', 'Aryan Singh', '098, Faridabad, Delhi', 7654321098, 'aryan@example.com'),
('C34', 'Naina Verma', '321, Meerut, Delhi', 6543210987, 'naina@example.com'),
('C35', 'Vivan Kapoor', '654, Sonipat, Delhi', 5432109876, 'vivan@example.com'),
('C36', 'Dia Gupta', '987, Agra, Delhi', 4321098765, 'dia@example.com'),
('C37', 'Aditi Singh', '210, Chandigarh, Delhi', 3210987654, 'aditi@example.com'),
('C38', 'Rehan Sharma', '543, Ludhiana, Delhi', 2109876543, 'rehan@example.com'),
('C39', 'Aisha Patel', '876, Amritsar, Delhi', 1098765432, 'aisha@example.com'),
('C40', 'Kabir Kumar', '109, Jaipur, Delhi', 987654321, 'kabir@example.com'),
('C41', 'Isha Singh', '432, Udaipur, Delhi', 9876543210, 'isha@example.com'),
('C42', 'Anushka Verma', '765, Jodhpur, Delhi', 8765432109, 'anushka@example.com'),
('C43', 'Shaurya Gupta', '098, Kota, Delhi', 7654321098, 'shaurya@example.com'),
('C44', 'Sanya Sharma', '321, Ajmer, Delhi', 6543210987, 'sanya@example.com'),
('C45', 'Arnav Singh', '654, Bikaner, Delhi', 5432109876, 'arnav@example.com'),
('C46', 'Vanya Patel', '987, Alwar, Delhi', 4321098765, 'vanya@example.com'),
('C47', 'Aahana Kumar', '210, Bharatpur, Delhi', 3210987654, 'aahana@example.com'),
('C48', 'Samar Verma', '543, Bhilwara, Delhi', 2109876543, 'samar@example.com'),
('C49', 'Jiya Singh', '876, Chittorgarh, Delhi', 1098765432, 'jiya@example.com'),
('C50', 'Anaya Sharma', '109, Jaisalmer, Delhi', 987654321, 'anaya@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `cust_prod`
--

CREATE TABLE `cust_prod` (
  `CID` varchar(10) NOT NULL,
  `PID` varchar(10) NOT NULL,
  `TID` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_prod`
--

INSERT INTO `cust_prod` (`CID`, `PID`, `TID`, `quantity`) VALUES
('C01', 'P01', 'T01', 10),
('C02', 'P02', 'T02', 5),
('C03', 'P03', 'T03', 8),
('C04', 'P04', 'T04', 3),
('C05', 'P05', 'T05', 12),
('C06', 'P06', 'T06', 7),
('C07', 'P07', 'T07', 2),
('C08', 'P08', 'T08', 9),
('C09', 'P09', 'T09', 6),
('C10', 'P10', 'T10', 11),
('C11', 'P11', 'T11', 4),
('C12', 'P12', 'T12', 15),
('C13', 'P13', 'T13', 20),
('C14', 'P14', 'T14', 18),
('C15', 'P15', 'T15', 13),
('C16', 'P16', 'T16', 7),
('C17', 'P17', 'T17', 9),
('C18', 'P18', 'T18', 6),
('C19', 'P19', 'T19', 3),
('C20', 'P20', 'T20', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OID` varchar(10) NOT NULL,
  `PID` varchar(10) NOT NULL,
  `SID` varchar(10) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `received` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OID`, `PID`, `SID`, `Quantity`, `price`, `received`) VALUES
('OID01', 'P01', 'S01', 5, 550000, 0),
('OID02', 'P02', 'S02', 4, 256000, 0),
('OID03', 'P03', 'S03', 3, 576000, 0),
('OID04', 'P04', 'S04', 6, 1296000, 0),
('OID05', 'P05', 'S05', 7, 224000, 0),
('OID06', 'P06', 'S06', 2, 360000, 0),
('OID07', 'P07', 'S07', 5, 280000, 0),
('OID08', 'P08', 'S08', 4, 288000, 0),
('OID09', 'P09', 'S09', 3, 540000, 0),
('OID10', 'P10', 'S10', 6, 828000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payID` varchar(10) NOT NULL,
  `SID` varchar(10) NOT NULL,
  `pdate` date NOT NULL,
  `pamount` float NOT NULL,
  `pmethod` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payID`, `SID`, `pdate`, `pamount`, `pmethod`) VALUES
('PAY01', 'S01', '2024-03-17', 7150000, 'Credit Card'),
('PAY02', 'S02', '2024-03-17', 2560000, 'Debit Card'),
('PAY03', 'S03', '2024-03-17', 5760000, 'Net Banking'),
('PAY04', 'S04', '2024-03-17', 12960000, 'Cash'),
('PAY05', 'S05', '2024-03-17', 2240000, 'Credit Card'),
('PAY06', 'S06', '2024-03-17', 3600000, 'Debit Card'),
('PAY07', 'S07', '2024-03-17', 3080000, 'Net Banking'),
('PAY08', 'S08', '2024-03-17', 3240000, 'Cash'),
('PAY09', 'S09', '2024-03-17', 5400000, 'Credit Card'),
('PAY10', 'S10', '2024-03-17', 8970000, 'Debit Card'),
('PAY11', 'S11', '2024-03-17', 1920000, 'Net Banking'),
('PAY12', 'S12', '2024-03-17', 6960000, 'Cash'),
('PAY13', 'S13', '2024-03-17', 6300000, 'Credit Card'),
('PAY14', 'S14', '2024-03-17', 3840000, 'Debit Card'),
('PAY15', 'S15', '2024-03-17', 17325000, 'Net Banking'),
('PAY16', 'S16', '2024-03-17', 7470000, 'Cash'),
('PAY17', 'S17', '2024-03-17', 630000, 'Credit Card'),
('PAY18', 'S18', '2024-03-17', 8160000, 'Debit Card'),
('PAY19', 'S19', '2024-03-17', 2295000, 'Net Banking'),
('PAY20', 'S20', '2024-03-17', 1800000, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` varchar(10) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `ptype` varchar(30) NOT NULL,
  `metal` varchar(30) NOT NULL,
  `weight` decimal(10,1) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `ptype`, `metal`, `weight`, `quantity`, `price`) VALUES
('P01', 'Diamond Ring', 'Ring', 'Gold', 5.0, 10, 110000),
('P02', 'Sapphire Earrings', 'Earrings', 'Silver', 3.0, 15, 64000),
('P03', 'Ruby Necklace', 'Necklace', 'Gold', 8.0, 5, 192000),
('P04', 'Emerald Bracelet', 'Bracelet', 'Platinum', 7.0, 8, 216000),
('P05', 'Amethyst Anklet', 'Anklet', 'Silver', 4.0, 12, 32000),
('P06', 'Topaz Pendant', 'Pendant', 'Gold', 7.0, 7, 144000),
('P07', 'Pearl Ring', 'Ring', 'Silver', 5.0, 20, 56000),
('P08', 'Garnet Earrings', 'Earrings', 'Gold', 3.0, 25, 72000),
('P09', 'Opal Necklace', 'Necklace', 'Silver', 9.0, 3, 180000),
('P10', 'Tanzanite Bracelet', 'Bracelet', 'Gold', 7.0, 10, 138000),
('P11', 'Citrine Anklet', 'Anklet', 'Platinum', 4.0, 15, 96000),
('P12', 'Aquamarine Pendant', 'Pendant', 'Silver', 6.0, 8, 78000),
('P13', 'Ruby Ring', 'Ring', 'Gold', 4.0, 15, 126000),
('P14', 'Emerald Earrings', 'Earrings', 'Platinum', 3.0, 20, 96000),
('P15', 'Sapphire Necklace', 'Necklace', 'Gold', 8.0, 5, 231000),
('P16', 'Diamond Bracelet', 'Bracelet', 'Silver', 8.0, 7, 90000),
('P17', 'Amethyst Anklet', 'Anklet', 'Gold', 4.0, 12, 54000),
('P18', 'Topaz Pendant', 'Pendant', 'Platinum', 5.0, 10, 96000),
('P19', 'Pearl Ring', 'Ring', 'Silver', 5.0, 18, 72000),
('P20', 'Garnet Earrings', 'Earrings', 'Gold', 4.0, 22, 96000),
('P21', 'Opal Necklace', 'Necklace', 'Platinum', 8.0, 4, 240000),
('P22', 'Tanzanite Bracelet', 'Bracelet', 'Silver', 7.0, 9, 138000),
('P23', 'Citrine Anklet', 'Anklet', 'Gold', 5.0, 14, 84000),
('P24', 'Aquamarine Pendant', 'Pendant', 'Silver', 7.0, 6, 96000),
('P25', 'Ruby Ring', 'Ring', 'Gold', 5.0, 20, 140000),
('P26', 'Emerald Earrings', 'Earrings', 'Silver', 3.0, 25, 64000),
('P27', 'Sapphire Necklace', 'Necklace', 'Platinum', 9.0, 6, 267000),
('P28', 'Diamond Bracelet', 'Bracelet', 'Gold', 10.0, 8, 108000),
('P29', 'Amethyst Anklet', 'Anklet', 'Silver', 4.0, 15, 48000),
('P30', 'Topaz Pendant', 'Pendant', 'Gold', 8.0, 10, 180000),
('P31', 'Pearl Ring', 'Ring', 'Platinum', 6.0, 25, 144000),
('P32', 'Garnet Earrings', 'Earrings', 'Silver', 5.0, 30, 96000),
('P33', 'Opal Necklace', 'Necklace', 'Gold', 9.0, 2, 282000),
('P34', 'Tanzanite Bracelet', 'Bracelet', 'Silver', 8.0, 7, 150000),
('P35', 'Citrine Anklet', 'Anklet', 'Platinum', 5.0, 10, 120000),
('P36', 'Aquamarine Pendant', 'Pendant', 'Gold', 6.0, 8, 120000),
('P37', 'Ruby Ring', 'Ring', 'Silver', 5.0, 12, 90000),
('P38', 'Emerald Earrings', 'Earrings', 'Gold', 4.0, 18, 72000),
('P39', 'Sapphire Necklace', 'Necklace', 'Silver', 8.0, 4, 164000),
('P40', 'Diamond Bracelet', 'Bracelet', 'Platinum', 8.0, 5, 225000),
('P41', 'Amethyst Anklet', 'Anklet', 'Gold', 5.0, 10, 70500),
('P42', 'Topaz Pendant', 'Pendant', 'Silver', 8.0, 6, 101000),
('P43', 'Pearl Ring', 'Ring', 'Gold', 6.0, 22, 198000),
('P44', 'Garnet Earrings', 'Earrings', 'Platinum', 5.0, 27, 150000),
('P45', 'Opal Necklace', 'Necklace', 'Silver', 9.0, 3, 135000),
('P46', 'Tanzanite Bracelet', 'Bracelet', 'Gold', 8.0, 8, 166000),
('P47', 'Citrine Anklet', 'Anklet', 'Silver', 5.0, 16, 48000),
('P48', 'Aquamarine Pendant', 'Pendant', 'Platinum', 7.0, 7, 175000),
('P49', 'Ruby Ring', 'Ring', 'Gold', 6.0, 18, 207000),
('P50', 'Emerald Earrings', 'Earrings', 'Silver', 4.0, 23, 82000),
('P51', 'angel anklets', 'anklets', 'silver', 6.4, 1, 5000);

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `record_product_addition` AFTER INSERT ON `products` FOR EACH ROW BEGIN
    INSERT INTO product_addition_log (product_name, addition_date)
    VALUES (NEW.pname, CURDATE());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_addition_log`
--

CREATE TABLE `product_addition_log` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `addition_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_addition_log`
--

INSERT INTO `product_addition_log` (`id`, `product_name`, `addition_date`) VALUES
(1, 'bengali bracelet', '2024-03-11'),
(2, 'Diamond Ring', '2024-03-17'),
(3, 'Sapphire Earrings', '2024-03-17'),
(4, 'Ruby Necklace', '2024-03-17'),
(5, 'Emerald Bracelet', '2024-03-17'),
(6, 'Amethyst Anklet', '2024-03-17'),
(7, 'Topaz Pendant', '2024-03-17'),
(8, 'Pearl Ring', '2024-03-17'),
(9, 'Garnet Earrings', '2024-03-17'),
(10, 'Opal Necklace', '2024-03-17'),
(11, 'Tanzanite Bracelet', '2024-03-17'),
(12, 'Citrine Anklet', '2024-03-17'),
(13, 'Aquamarine Pendant', '2024-03-17'),
(14, 'Ruby Ring', '2024-03-17'),
(15, 'Emerald Earrings', '2024-03-17'),
(16, 'Sapphire Necklace', '2024-03-17'),
(17, 'Diamond Bracelet', '2024-03-17'),
(18, 'Amethyst Anklet', '2024-03-17'),
(19, 'Topaz Pendant', '2024-03-17'),
(20, 'Pearl Ring', '2024-03-17'),
(21, 'Garnet Earrings', '2024-03-17'),
(22, 'Opal Necklace', '2024-03-17'),
(23, 'Tanzanite Bracelet', '2024-03-17'),
(24, 'Citrine Anklet', '2024-03-17'),
(25, 'Aquamarine Pendant', '2024-03-17'),
(26, 'Ruby Ring', '2024-03-17'),
(27, 'Emerald Earrings', '2024-03-17'),
(28, 'Sapphire Necklace', '2024-03-17'),
(29, 'Diamond Bracelet', '2024-03-17'),
(30, 'Amethyst Anklet', '2024-03-17'),
(31, 'Topaz Pendant', '2024-03-17'),
(32, 'Pearl Ring', '2024-03-17'),
(33, 'Garnet Earrings', '2024-03-17'),
(34, 'Opal Necklace', '2024-03-17'),
(35, 'Tanzanite Bracelet', '2024-03-17'),
(36, 'Citrine Anklet', '2024-03-17'),
(37, 'Aquamarine Pendant', '2024-03-17'),
(38, 'Ruby Ring', '2024-03-17'),
(39, 'Emerald Earrings', '2024-03-17'),
(40, 'Sapphire Necklace', '2024-03-17'),
(41, 'Diamond Bracelet', '2024-03-17'),
(42, 'Amethyst Anklet', '2024-03-17'),
(43, 'Topaz Pendant', '2024-03-17'),
(44, 'Pearl Ring', '2024-03-17'),
(45, 'Garnet Earrings', '2024-03-17'),
(46, 'Opal Necklace', '2024-03-17'),
(47, 'Tanzanite Bracelet', '2024-03-17'),
(48, 'Citrine Anklet', '2024-03-17'),
(49, 'Aquamarine Pendant', '2024-03-17'),
(50, 'Ruby Ring', '2024-03-17'),
(51, 'Emerald Earrings', '2024-03-17'),
(52, 'angel anklets', '2024-03-17'),
(102, 'Diamond Ring', '2024-03-17'),
(103, 'Sapphire Earrings', '2024-03-17'),
(104, 'Ruby Necklace', '2024-03-17'),
(105, 'Emerald Bracelet', '2024-03-17'),
(106, 'Amethyst Anklet', '2024-03-17'),
(107, 'Topaz Pendant', '2024-03-17'),
(108, 'Pearl Ring', '2024-03-17'),
(109, 'Garnet Earrings', '2024-03-17'),
(110, 'Opal Necklace', '2024-03-17'),
(111, 'Tanzanite Bracelet', '2024-03-17'),
(112, 'Citrine Anklet', '2024-03-17'),
(113, 'Aquamarine Pendant', '2024-03-17'),
(114, 'Ruby Ring', '2024-03-17'),
(115, 'Emerald Earrings', '2024-03-17'),
(116, 'Sapphire Necklace', '2024-03-17'),
(117, 'Diamond Bracelet', '2024-03-17'),
(118, 'Amethyst Anklet', '2024-03-17'),
(119, 'Topaz Pendant', '2024-03-17'),
(120, 'Pearl Ring', '2024-03-17'),
(121, 'Garnet Earrings', '2024-03-17'),
(122, 'Opal Necklace', '2024-03-17'),
(123, 'Tanzanite Bracelet', '2024-03-17'),
(124, 'Citrine Anklet', '2024-03-17'),
(125, 'Aquamarine Pendant', '2024-03-17'),
(126, 'Ruby Ring', '2024-03-17'),
(127, 'Emerald Earrings', '2024-03-17'),
(128, 'Sapphire Necklace', '2024-03-17'),
(129, 'Diamond Bracelet', '2024-03-17'),
(130, 'Amethyst Anklet', '2024-03-17'),
(131, 'Topaz Pendant', '2024-03-17'),
(132, 'Pearl Ring', '2024-03-17'),
(133, 'Garnet Earrings', '2024-03-17'),
(134, 'Opal Necklace', '2024-03-17'),
(135, 'Tanzanite Bracelet', '2024-03-17'),
(136, 'Citrine Anklet', '2024-03-17'),
(137, 'Aquamarine Pendant', '2024-03-17'),
(138, 'Ruby Ring', '2024-03-17'),
(139, 'Emerald Earrings', '2024-03-17'),
(140, 'Sapphire Necklace', '2024-03-17'),
(141, 'Diamond Bracelet', '2024-03-17'),
(142, 'Amethyst Anklet', '2024-03-17'),
(143, 'Topaz Pendant', '2024-03-17'),
(144, 'Pearl Ring', '2024-03-17'),
(145, 'Garnet Earrings', '2024-03-17'),
(146, 'Opal Necklace', '2024-03-17'),
(147, 'Tanzanite Bracelet', '2024-03-17'),
(148, 'Citrine Anklet', '2024-03-17'),
(149, 'Aquamarine Pendant', '2024-03-17'),
(150, 'Ruby Ring', '2024-03-17'),
(151, 'angel anklets', '2024-03-17'),
(152, 'angel anklets', '2024-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SID` varchar(10) NOT NULL,
  `sname` text NOT NULL,
  `address` text NOT NULL,
  `phone_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SID`, `sname`, `address`, `phone_no`) VALUES
('S01', 'Indian Gems', '123, Jewelers Lane, Mumbai', 9876543210),
('S02', 'Artisan Crafts', '456, Craftsmen Street, Jaipur', 8765432109),
('S03', 'Elegant Jewelry', '789, Gemstone Road, Delhi', 7654321098),
('S04', 'Royal Ornaments', '321, Regal Plaza, Kolkata', 6543210987),
('S05', 'Golden Treasures', '654, Goldsmith Street, Bangalore', 5432109876),
('S06', 'Silver Splendor', '987, Silverware Avenue, Chennai', 4321098765),
('S07', 'Gemstone Creations', '210, Jewelers Circle, Hyderabad', 3210987654),
('S08', 'Sparkle Jewels', '543, Diamond District, Mumbai', 2109876543),
('S09', 'Precious Metals', '876, Gold Street, Kolkata', 1098765432),
('S10', 'Diamond Dreams', '109, Jewelers Park, Jaipur', 1098765421),
('S11', 'Silk Gems', '432, Silk Road, Delhi', 9876543120),
('S12', 'Pearl Palace', '765, Pearl Plaza, Mumbai', 8765342109),
('S13', 'Crystal Crafts', '098, Crystal Avenue, Bangalore', 7654321098),
('S14', 'Sapphire Studios', '321, Sapphire Street, Chennai', 6543210987),
('S15', 'Emerald Emporium', '654, Emerald Lane, Hyderabad', 5432109876),
('S16', 'Opulent Ornaments', '987, Opal Road, Kolkata', 4321098765),
('S17', 'Ruby Jewels', '210, Ruby Avenue, Jaipur', 3210987654),
('S18', 'Platinum Designs', '543, Platinum Plaza, Delhi', 2109876543),
('S19', 'Titanium Trends', '876, Titanium Tower, Mumbai', 1098765432),
('S20', 'Copper Crafts', '109, Copper Circle, Bangalore', 9876543210),
('S21', 'Bronze Beauties', '432, Bronze Street, Chennai', 8765432109),
('S22', 'Alloy Artisans', '765, Alloy Avenue, Hyderabad', 7654321098),
('S23', 'Steel Studios', '098, Steel Road, Kolkata', 6543210987),
('S24', 'Brass Boutique', '321, Brass Lane, Jaipur', 5432109876),
('S25', 'Nickel Nirvana', '654, Nickel Plaza, Delhi', 4321098765),
('S26', 'Tungsten Treasures', '987, Tungsten Tower, Mumbai', 3210987654),
('S27', 'Zinc Zenith', '210, Zinc Circle, Bangalore', 2109876543),
('S28', 'Lead Luxuries', '543, Lead Lane, Chennai', 1098765432),
('S29', 'Palladium Palace', '876, Palladium Plaza, Hyderabad', 9876543210),
('S30', 'Radium Realm', '109, Radium Road, Kolkata', 8765432109),
('S31', 'Bismuth Boutique', '432, Bismuth Street, Jaipur', 7654321098),
('S32', 'Mercury Marvels', '765, Mercury Avenue, Mumbai', 6543210987),
('S33', 'Tin Trends', '098, Tin Tower, Bangalore', 5432109876),
('S34', 'Cadmium Crafts', '321, Cadmium Circle, Chennai', 4321098765),
('S35', 'Gallium Gems', '654, Gallium Plaza, Hyderabad', 3210987654),
('S36', 'Arsenic Artisans', '987, Arsenic Lane, Kolkata', 2109876543),
('S37', 'Iridium Inspirations', '210, Iridium Street, Jaipur', 1098765432),
('S38', 'Lithium Luxe', '543, Lithium Lane, Delhi', 987654321),
('S39', 'Beryllium Beauties', '876, Beryllium Plaza, Mumbai', 9876543210),
('S40', 'Osmium Ornaments', '109, Osmium Circle, Bangalore', 8765432109),
('S41', 'Rhenium Rocks', '432, Rhenium Road, Chennai', 7654321098),
('S42', 'Rhodium Realm', '765, Rhodium Avenue, Hyderabad', 6543210987),
('S43', 'Polonium Palace', '098, Polonium Plaza, Kolkata', 5432109876),
('S44', 'Thallium Trends', '321, Thallium Street, Jaipur', 4321098765),
('S45', 'Tellurium Treasures', '654, Tellurium Lane, Delhi', 3210987654),
('S46', 'Indium Inspirations', '987, Indium Circle, Mumbai', 2109876543),
('S47', 'Germanium Gems', '210, Germanium Plaza, Bangalore', 1098765432),
('S48', 'Antimony Artisans', '543, Antimony Avenue, Chennai', 987654321),
('S49', 'Boron Boutique', '876, Boron Tower, Hyderabad', 9876543210),
('S50', 'Cesium Crafts', '109, Cesium Road, Kolkata', 8765432109);

-- --------------------------------------------------------

--
-- Table structure for table `supp_prod`
--

CREATE TABLE `supp_prod` (
  `SID` varchar(10) NOT NULL,
  `PID` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supp_prod`
--

INSERT INTO `supp_prod` (`SID`, `PID`, `quantity`, `payID`) VALUES
('S01', 'P01', 50, 'PAY01'),
('S02', 'P02', 40, 'PAY02'),
('S03', 'P03', 30, 'PAY03'),
('S04', 'P04', 60, 'PAY04'),
('S05', 'P05', 70, 'PAY05'),
('S06', 'P06', 25, 'PAY06'),
('S07', 'P07', 55, 'PAY07'),
('S08', 'P08', 45, 'PAY08'),
('S09', 'P09', 35, 'PAY09'),
('S10', 'P10', 65, 'PAY10'),
('S11', 'P11', 20, 'PAY11'),
('S12', 'P12', 80, 'PAY12'),
('S13', 'P13', 75, 'PAY13'),
('S14', 'P14', 90, 'PAY14'),
('S15', 'P15', 15, 'PAY15'),
('S16', 'P16', 100, 'PAY16'),
('S17', 'P17', 10, 'PAY17'),
('S18', 'P18', 85, 'PAY18'),
('S19', 'P19', 95, 'PAY19'),
('S20', 'P20', 5, 'PAY20');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TID` varchar(10) NOT NULL,
  `tdate` date NOT NULL,
  `tamount` float NOT NULL,
  `tmethod` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TID`, `tdate`, `tamount`, `tmethod`) VALUES
('T01', '2024-03-17', 1100000, 'Credit Card'),
('T02', '2024-03-17', 960000, 'Debit Card'),
('T03', '2024-03-17', 192000, 'Net Banking'),
('T04', '2024-03-17', 1728000, 'Cash'),
('T05', '2024-03-17', 640000, 'Credit Card'),
('T06', '2024-03-17', 504000, 'Debit Card'),
('T07', '2024-03-17', 1120000, 'Net Banking'),
('T08', '2024-03-17', 1800000, 'Cash'),
('T09', '2024-03-17', 540000, 'Credit Card'),
('T10', '2024-03-17', 1380000, 'Debit Card'),
('T11', '2024-03-17', 864000, 'Net Banking'),
('T12', '2024-03-17', 2250000, 'Cash'),
('T13', '2024-03-17', 2100000, 'Credit Card'),
('T14', '2024-03-17', 1920000, 'Debit Card'),
('T15', '2024-03-17', 1155000, 'Net Banking'),
('T16', '2024-03-17', 630000, 'Cash'),
('T17', '2024-03-17', 1400000, 'Credit Card'),
('T18', '2024-03-17', 960000, 'Debit Card'),
('T19', '2024-03-17', 1640000, 'Net Banking'),
('T20', '2024-03-17', 820000, 'Cash');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `cust_prod`
--
ALTER TABLE `cust_prod`
  ADD PRIMARY KEY (`CID`,`PID`,`TID`),
  ADD KEY `products_ibfk_1` (`PID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payID`,`SID`),
  ADD KEY `supplier_ibfk_2` (`SID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product_addition_log`
--
ALTER TABLE `product_addition_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `supp_prod`
--
ALTER TABLE `supp_prod`
  ADD PRIMARY KEY (`payID`),
  ADD KEY `supplier_ibfk_1` (`SID`),
  ADD KEY `products_ibfk_2` (`PID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_addition_log`
--
ALTER TABLE `product_addition_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cust_prod`
--
ALTER TABLE `cust_prod`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `products` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `supplier_ibfk_2` FOREIGN KEY (`SID`) REFERENCES `supplier` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supp_prod`
--
ALTER TABLE `supp_prod`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `products` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `supplier` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
