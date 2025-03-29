-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 04:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `label`) VALUES
(1, 'System Unit(Standard Build)'),
(2, 'System Unit(Modified Build)'),
(3, 'Mouse'),
(4, 'Keyboard'),
(5, 'Monitor'),
(6, 'Laptop'),
(7, 'RAM'),
(8, 'CPU'),
(9, 'Power Supply Unit'),
(10, 'HDD/SSD'),
(11, 'Motherboard');

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE `file_upload` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_condition`
--

CREATE TABLE `item_condition` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_condition`
--

INSERT INTO `item_condition` (`id`, `label`) VALUES
(1, 'Good'),
(2, 'Damage');

-- --------------------------------------------------------

--
-- Table structure for table `logs_info`
--

CREATE TABLE `logs_info` (
  `log_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `relevant_names` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs_info`
--

INSERT INTO `logs_info` (`log_id`, `quantity`, `relevant_names`, `department`, `date_time`, `contact_number`, `contact_email`, `category_id`, `user_id`, `item_id`) VALUES
(1, 234, 'test', 'test', NULL, '2345', 'sdfgas@gmail.com', 2, 36, 2),
(2, 23, 'test1', 'CITE', 1709062631, '2345', 'sdfsdfas@gmail.com', 3, 36, 3),
(3, 3457, 'test12', 'asdasd', 1709062654, '234573', 'rolengregorio54@gmail.com', 4, 36, 3),
(4, 43, 'test23', 'twesrt', 1709112837, 'test', 'test11@gmail.com', 2, 36, 3),
(5, 38, 'System Admin', 'System Admin', 1709721514, 'System Admin', ' System Admin', 1, 0, 22),
(6, 40, 'System Admin', 'System Admin', 1709721664, 'System Admin', ' System Admin', 1, 36, 23),
(7, 44, 'System Admin', 'System Admin', 1709721890, 'System Admin', ' System Admin', 1, 36, 24),
(8, 6, 'System Admin', 'System Admin', 1709722181, 'System Admin', ' System Admin', 1, 36, 25),
(9, 2, 'System Admin', 'System Admin', 1709722358, 'System Admin', ' System Admin', 1, 36, 26),
(10, 3, 'System Admin', 'System Admin', 1709746546, 'System Admin', ' System Admin', 1, 0, 0),
(11, 2, 'System Admin', 'System Admin', 1709746561, 'System Admin', ' System Admin', 1, 36, 0),
(12, 9090, 'System Admin', 'System Admin', 1709746614, 'System Admin', ' System Admin', 1, 36, 0),
(13, 3, 'System Admin', 'System Admin', 1709746650, 'System Admin', ' System Admin', 1, 0, 0),
(14, 2, 'System Admin', 'System Admin', 1709746962, 'System Admin', ' System Admin', 1, 0, 0),
(15, 5, 'System Admin', 'System Admin', 1709747008, 'System Admin', ' System Admin', 1, 0, 0),
(16, 4, 'System Admin', 'System Admin', 1709747029, 'System Admin', ' System Admin', 1, 0, 0),
(17, 7, 'System Admin', 'System Admin', 1709747131, 'System Admin', ' System Admin', 1, 0, 0),
(18, 5, 'System Admin', 'System Admin', 1709747286, 'System Admin', ' System Admin', 1, 0, 0),
(19, 7, 'System Admin', 'System Admin', 1709747447, 'System Admin', ' System Admin', 1, 36, 0),
(20, 456, 'System Admin', 'System Admin', 1709747472, 'System Admin', ' System Admin', 1, 36, 0),
(21, 8, 'System Admin', 'System Admin', 1709764670, 'System Admin', ' System Admin', 1, 36, 0),
(22, 9, 'System Admin', 'System Admin', 1709798250, 'System Admin', ' System Admin', 1, 36, 0),
(23, 8, 'System Admin', 'System Admin', 1709798493, 'System Admin', ' System Admin', 1, 36, 27),
(24, 10, 'System Admin', 'System Admin', 1709798612, 'System Admin', ' System Admin', 1, 36, 0),
(25, 10, 'System Admin', 'System Admin', 1709801933, 'System Admin', ' System Admin', 1, 36, 0),
(26, 10, 'System Admin', 'System Admin', 1709820439, 'System Admin', ' System Admin', 1, 36, 0),
(27, 27, 'System Admin', 'System Admin', 1709820483, 'System Admin', ' System Admin', 1, 36, 0),
(28, 56, 'System Admin', 'System Admin', 1709820917, 'System Admin', ' System Admin', 1, 36, 0),
(29, 54, 'System Admin', 'System Admin', 2147483647, 'System Admin', ' System Admin', 1, 36, 0),
(30, 10, 'System Admin', 'System Admin', 2147483647, 'System Admin', ' System Admin', 1, 36, 0),
(31, 231, 'System Admin', 'System Admin', 1709821348, 'System Admin', ' System Admin', 1, 36, 1),
(32, 1000, 'System Admin', 'System Admin', 1709821380, 'System Admin', ' System Admin', 1, 36, 3),
(33, 0, 'System Admin', 'System Admin', 0, 'System Admin', ' System Admin', 1, 0, 39),
(34, 0, 'System Admin', 'System Admin', 0, 'System Admin', ' System Admin', 1, 0, 40),
(35, 1, 'System Admin', 'System Admin', 1710400299, 'System Admin', ' System Admin', 1, 36, 44),
(36, 1, 'System Admin', 'System Admin', 1710400603, 'System Admin', ' System Admin', 1, 36, 45),
(37, 1, 'System Admin', 'System Admin', 1710400766, 'System Admin', ' System Admin', 1, 36, 46),
(38, 1, 'System Admin', 'System Admin', 1710401228, 'System Admin', ' System Admin', 1, 36, 47),
(39, 1, 'System Admin', 'System Admin', 2147483647, 'System Admin', 'System Admin', 1, 36, 48),
(40, 1, 'System Admin', 'System Admin', 1710406371, 'System Admin', 'System Admin', 1, 36, 49),
(41, 0, 'System Admin', 'System Admin', 1710431499, 'System Admin', 'System Admin', 1, 36, 51),
(42, 0, 'System Admin', 'System Admin', 1710431590, 'System Admin', 'System Admin', 1, 36, 52),
(43, 1, 'System Admin', 'System Admin', 1710431640, 'System Admin', 'System Admin', 1, 36, 53),
(44, 1, 'System Admin', 'System Admin', 1710508650, 'System Admin', 'System Admin', 1, 36, 54),
(45, 5, 'System Admin', 'System Admin', 1711006123, 'System Admin', ' System Admin', 0, 36, 0),
(46, 63, 'System Admin', 'System Admin', 1711006140, 'System Admin', ' System Admin', 0, 36, 0),
(47, 4, 'System Admin', 'System Admin', 1711006273, 'System Admin', ' System Admin', 0, 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs_info_master`
--

CREATE TABLE `logs_info_master` (
  `log_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `relevant_names` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `date_time` int(11) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs_info_master`
--

INSERT INTO `logs_info_master` (`log_id`, `quantity`, `relevant_names`, `department`, `date_time`, `contact_number`, `contact_email`, `category_id`, `user_id`, `item_id`) VALUES
(1, 5, 'System Admin', 'System Admin', 1710967555, 'System Admin', 'System Admin', 0, 36, 0),
(2, 24, 'System Admin', 'System Admin', 1710967568, 'System Admin', 'System Admin', 0, 36, 0),
(3, 4, 'System Admin', 'System Admin', 1711006316, 'System Admin', ' System Admin', 0, 36, 0),
(4, 34, 'System Admin', 'System Admin', 1711006462, 'System Admin', ' System Admin', 0, 36, 0),
(5, 2, 'System Admin', 'System Admin', 1711007715, 'System Admin', ' System Admin', 0, 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_action_category`
--

CREATE TABLE `log_action_category` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_action_category`
--

INSERT INTO `log_action_category` (`id`, `label`) VALUES
(1, 'Add'),
(2, 'Borrow'),
(3, 'Return'),
(4, 'Dispose');

-- --------------------------------------------------------

--
-- Table structure for table `master_item`
--

CREATE TABLE `master_item` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(255) DEFAULT NULL,
  `quantity_p` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `part_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `part_status` varchar(255) NOT NULL,
  `time_date_added` int(11) DEFAULT NULL,
  `date_update` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_item`
--

INSERT INTO `master_item` (`item_id`, `item_brand`, `quantity_p`, `model`, `part_name`, `description`, `part_status`, `time_date_added`, `date_update`) VALUES
(1, 'Lenovo', 0, 'Legion 5 pro', 'Laptop', '123123', 'good', 2147483647, 1705568485),
(3, 'test', 0, 'test', 'Mouse', '12344', 'good', 2147483647, 1705568485),
(5, 'ASUS', 0, 'ASUS', 'CPU', 'ASUS', 'Damage', 2147483647, 1705568485),
(6, 'MSI1', 0, 'MSI1', 'Mouse', 'test343', 'Good', 2147483647, 1705566228),
(7, '12', 0, '234', 'CPU', 'werqw', 'Damage', 2147483647, 1705568485),
(8, 'test1', 0, 'test1', 'Tool', 'test1', 'Good', 2147483647, 1705568485),
(9, 'test2', 0, 'test2', 'Monitor', 'test2', 'Good', 1705485989, NULL),
(10, 'test3', 0, 'test3', 'Mouse', 'test3', '', 1705486108, NULL),
(11, 'test45', 0, 'test45', 'Mouse', 'test245', '', 1705486199, NULL),
(12, 'test', 0, 'test', 'Keyboard', 'test23', '', 1705486527, NULL),
(13, 'mouse', 0, 'mouse', 'Mouse', 'mouse11', '', 1705487230, 1706518620),
(14, 'keyboard', 0, 'testkeyboard', 'Keyboard', 'keyboard', 'Good', 1705487757, 1706518659),
(15, 'test', 0, 'test', 'Mouse', 'test123', '', 1705500880, NULL),
(16, 'test4', 0, 'test4', 'Mouse', 'test53', '', 1705500941, 1706518811),
(17, 'MSItest', 0, 'MSItest', 'Mouse', '234msitest', '', 1705568298, 1706518852),
(18, 'test2345', 0, 'test4567', 'Test', 'sdfgh', '', 1709625583, 0),
(19, 'dfth', 0, 'ghjmd', 'Keyboard', 'djy56', '', 1709625645, 0),
(20, 'RK', 0, 'RK46', 'Keyboard', '5678341', '', 1709625688, 1709625917),
(22, 'Logitech', 0, 'G305', 'Mouse', 'test', 'Good', 1710346646, 0),
(23, 'test', 0, 'asdfg', 'Mouse', 'adfga', 'Good', 1710346698, 0),
(24, 'test', 0, 'ASUS', 'Mouse', 'sdafg', 'Good', 1710346719, 0),
(25, 'fhjkf', 0, 'fghjdg', 'Mouse', 'dghj', 'Good', 1710346728, 0),
(26, 'asdfgASDF', 0, 'ASDFasdf', 'Mouse', 'asdfgasg', 'Good', 1710346825, 0),
(27, 'Lenovo', 0, 'sdfghsgh', 'Mouse', 'sfghjsfgh', 'Good', 1710346964, NULL),
(28, 'MSI', 2, 'asdf', 'Monitor', 'asdfghsadf', 'Good', 1710349784, NULL),
(29, 'mouse', 5, 'ASUS', 'Mouse', 'dafgsdfg', 'Good', 1710349965, NULL),
(30, 'test', 67, 'test', 'Mouse', 'mouse', 'Good', 1710350265, NULL),
(31, '456', 72, 'w456', 'Laptop', 'sadfg', 'Good', 1710350449, NULL),
(32, 'test', 34, 'ASUS', 'Mouse', 'asdf', 'Good', 1710350595, NULL),
(33, 'Lenovo', 456, 'sdcfg', 'Mouse', 'sdfg', 'Good', 1710351048, NULL),
(34, 'sdfgsdf', 345, 'sdfgh', 'Mouse', 'sfghas', 'Good', 1710351208, NULL),
(35, 'test3', 123, 'test', 'Mouse', 'test453', 'Good', 1710351348, NULL),
(36, 'test', 2345, 'test', 'Mouse', 'test32245', 'Good', 1710351386, NULL),
(37, 'test2', 324, 'test3', 'Mouse', 'test322455', 'Good', 1710351661, NULL),
(38, 'Nvision', 1, 'NVMS1231', 'Monitor', 'IOQNDIOQWDQ', 'Good', 1710352570, NULL),
(39, 'ASUS', 1, 'Team Group', 'RAM', 'test113', 'Good', 1710354506, NULL),
(40, 'sdfg2', 1, 'asedr', 'Mouse', 'sdfqa', 'Good', 1710362085, NULL),
(41, 'sdfasdf', 1, 'sadfasdf', 'CPU', 'SDfasdf', 'Good', 1710363129, NULL),
(42, 'fasdf', 1, 'asdfasdf', 'Mouse', 'asdfasdf', 'Damage', 1710363170, NULL),
(43, 'sdfgsdfg', 1, 'sdfgsdfg', 'Keyboard', 'sdfgsdfgaa', 'Good', 1710364428, NULL),
(44, 'sdfgh', 1, 'sdfh', 'CPU', 'dsfghj', 'Good', 1710400299, NULL),
(45, 'Lenovo', 1, 'mouse', 'Mouse', 'dsfag', 'Good', 1710400603, NULL),
(46, 'dghk', 1, 'ghjm,fj', 'Mouse', 'fhjldgk', 'Good', 1710400766, NULL),
(47, 'fgj,l', 1, 'fhgjk', 'Mouse', 'etyui', 'Good', 1710401228, NULL),
(48, 'sadfgh', 1, 'sdgfhasdfh', 'Mouse', 'asdfhadfh', 'Good', 1710403344, NULL),
(49, 'ASDF', 1, 'ASDF', 'Power Supply Unit', 'ASDGFasdf', 'Good', 1710406371, NULL),
(50, 'gknlffhjk', 1, 'ghjklfhj', 'Laptop', 'ghjkghjk', 'Good', 1710431453, NULL),
(51, 'vbnmc', 1, 'fghjdg', 'Mouse', 'nm,bnm', 'Good', 1710431499, NULL),
(52, 'xfghfg', 1, 'fghdfg', 'Mouse', 'cvbncv', 'Good', 1710431590, NULL),
(53, 'bvcnmc', 1, 'xfgh', 'Mouse', 'fyuty', 'Good', 1710431640, NULL),
(54, 'cvbxzc', 1, 'vbcnm', 'CPU', 'dghjdf', 'Good', 1710508650, NULL),
(55, 'sczvbxcv', 1, 'xcbvncvb', 'Mouse', 'cvbn', 'Good', 1710634605, 1710634605);

-- --------------------------------------------------------

--
-- Table structure for table `msg_posts`
--

CREATE TABLE `msg_posts` (
  `user_id` int(11) NOT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `msg_id` int(11) NOT NULL,
  `msg_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `msg_posts`
--

INSERT INTO `msg_posts` (`user_id`, `msg`, `msg_id`, `msg_date`) VALUES
(28, 'tests', 1, 1706199095),
(28, 'aaaaa', 2, 1706199134),
(28, '', 3, 1706199136),
(28, 'qwdqwdqwd', 4, 1706199138),
(28, 'wwaaw', 5, 1706199159),
(31, 'sdf', 6, 1706199683),
(36, 'sdfga', 7, 1706632056),
(36, 'sfg', 8, 1706632112),
(36, 'dfg', 9, 1706632115),
(36, 'sdfgasdf', 10, 1706632195),
(36, 'asdfgadsfg', 11, 1706632198),
(36, 'dsfsd', 12, 1706708163),
(36, 'sdfg', 13, 1708961316);

-- --------------------------------------------------------

--
-- Table structure for table `tool_item`
--

CREATE TABLE `tool_item` (
  `tool_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `tool_description` varchar(255) NOT NULL,
  `tool_name` varchar(255) NOT NULL,
  `tool_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tool_item`
--

INSERT INTO `tool_item` (`tool_id`, `qty`, `tool_description`, `tool_name`, `tool_status`) VALUES
(1, 308, 'A320M MSI, 8GB DDR4 Ram 3200Mhz, Ryzen 3 2200g, HDD 500GB', 'System Unit(Standard Build)', 'Damage'),
(2, 27, 'B550M DS3H Gigabyte, 16GB DDR4 Ram 3200Mhz, Ryzen 5 5600g, SSD NVME 500GB', 'System Unit(Modified Build)', 'Good'),
(3, 1059, 'asjdjasd', 'ScrewDriver', 'Good'),
(5, 12, 'test', 'test', 'Good'),
(6, 12, 'test', '', 'Good'),
(9, 234, '3sdfgsdfg', '52', 'Damage'),
(10, 4567, 'dhjdhj', 'xcfghdfxgh', 'Damage'),
(11, 35, 'test444', 'test4', 'Damage'),
(12, 6, 'Spoon Test', 'Spoon', 'Good'),
(13, 456, 'Spoon Test', 'Spoon', 'Good'),
(14, 6, 'Spoon Test', 'Spoon', 'Good'),
(15, 6, 'Spoon Test', 'Spoon', 'Good'),
(16, 6, 'Spoon Test', 'Spoon', 'Good'),
(17, 6, 'Spoon Test', 'Spoon', 'Good'),
(19, 6, 'Spoon Test', 'Spoon', 'Good'),
(20, 6, 'Spoon Test', 'Spoon', 'Good'),
(21, 6, 'Spoon Test', 'Spoon', 'Good'),
(22, 38, 'Spoon Test', 'Spoon', 'Good'),
(23, 9090, 'Testing Only', 'Fork', 'Good'),
(24, 44, 'Test', 'Pinggan', 'Damage'),
(25, 16, 'Time Check', 'Clock', 'Good'),
(26, 2, 'TimeCheck2', 'Clock2', 'Good'),
(27, 8, 'hsdfga', 'Tesdt', 'Damage');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transac_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `borrower_name` varchar(255) NOT NULL,
  `department1` varchar(255) NOT NULL,
  `timestamp_borrow` int(11) NOT NULL,
  `timestamp_return` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `transaction_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transac_id`, `item_id`, `user_id`, `borrower_name`, `department1`, `timestamp_borrow`, `timestamp_return`, `status`, `transaction_code`) VALUES
(1, 0, 0, 'test', 'test', 0, 1710965442, 0, 1710965442),
(2, 0, 0, 'test', 'test', 0, 1710965514, 0, 1710965514),
(3, 0, 0, 'test', 'test', 0, 1710965579, 0, 1710965579),
(4, 0, 0, 'fghd', 'fghf', 0, 1710966826, 0, 1710966826),
(5, 0, 0, 'ghjd', 'jkhj', 0, 1710967079, 0, 1710967079),
(6, 0, 0, 'tqerd', 'dhjsdfg', 0, 1710967180, 0, 1710967180),
(7, 0, 0, 'dfgdfg', 'hjkghjk', 0, 1710967408, 0, 1710967408),
(8, 0, 0, 'TEST', 'TEST', 0, 1710967418, 0, 1710967418),
(9, 0, 0, 'DFG', 'HJFGHJ', 0, 1710967555, 0, 1710967555),
(10, 0, 0, 'edrgsdf', 'sdfsdf', 0, 1710967568, 0, 1710967568),
(11, 0, 0, 'sdf', 'sdfg', 1711005707, 0, 0, 1711005707),
(12, 0, 0, 'sdf', 'sdfg', 1711005765, 0, 0, 1711005765),
(13, 0, 0, 'sdf', 'sdfg', 1711005811, 0, 0, 1711005811),
(14, 0, 36, 'sdf', 'sdfg', 1711005852, 0, 0, 1711005852),
(15, 0, 36, 'sdf', 'sdfg', 1711006067, 0, 0, 1711006067),
(16, 0, 36, 'sdf', 'sdfg', 1711006113, 0, 0, 1711006113),
(17, 0, 36, 'sdf', 'sdfg', 1711006123, 0, 0, 1711006123),
(18, 0, 36, '45', '434', 1711006140, 0, 0, 1711006140),
(19, 0, 36, 'dfg', 'dfgs', 1711006273, 0, 0, 1711006273),
(20, 0, 36, 'ghdg', 'sdfsd', 1711006316, 0, 0, 1711006316),
(21, 0, 36, 'gfh', 'dfgh', 1711006462, 0, 0, 1711006462),
(22, 0, 36, 'Rolen', 'CITE', 1711007715, 0, 0, 1711007715);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_type` int(255) DEFAULT NULL,
  `user_status` int(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `registration_date` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `user_status`, `email`, `password`, `registration_date`) VALUES
(29, 3, 1, 'sdfgds@gmail.com', 'sdfgsdfg', 1234),
(30, 2, 1, 'admin@gmail.com', 'admin123', 1234),
(31, 1, 1, 'bsit@gmail.com', 'bsit123', 1234),
(32, 3, 1, 'test1@gmail.com', 'test55', 1705485438),
(33, 3, 1, 'test1232@gmail.com', 'test', 1705520386),
(34, 3, 1, 'testtest@gmail.com', '123123', 1705520438),
(35, 3, 1, 'testestset@gmail.com', '3452345', 1705520536),
(36, 1, 1, 'rolengregorio.54@gmail.com', '3214', 1706512596),
(37, 3, 1, 'testy235@gmail.com', 'test54', 1709624601),
(38, 3, 1, 'zdfgzsdfh@gmail.com', 'DSFgzdhf', 1709624826);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `name_given` varchar(255) DEFAULT NULL,
  `name_middle` varchar(255) DEFAULT NULL,
  `name_family` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `student_id`, `name_given`, `name_middle`, `name_family`) VALUES
(30, '0000-000-000', 'Admin', '_', 'UI'),
(31, '01101101', 'bsit', 'it', 'it'),
(32, 'test11', 'test22', 'test33', 'test44'),
(36, '09-2021-000996', 'Rolen', 'Cabaling', 'Gregorio'),
(37, '35682', 'test45', 'tesdt345', 'test3623'),
(38, '465784586', 'sdfhsfxgj', 'fghsfgj', 'zdfghsfgj');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `label`) VALUES
(1, 'active'),
(2, 'inactive'),
(3, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `label`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Secretary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `item_condition`
--
ALTER TABLE `item_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs_info`
--
ALTER TABLE `logs_info`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `logs_info_master`
--
ALTER TABLE `logs_info_master`
  ADD PRIMARY KEY (`log_id`),
  ADD UNIQUE KEY `log_id` (`log_id`);

--
-- Indexes for table `log_action_category`
--
ALTER TABLE `log_action_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_item`
--
ALTER TABLE `master_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `msg_posts`
--
ALTER TABLE `msg_posts`
  ADD PRIMARY KEY (`msg_id`),
  ADD UNIQUE KEY `msg_id` (`msg_id`),
  ADD KEY `msg_id_2` (`msg_id`);

--
-- Indexes for table `tool_item`
--
ALTER TABLE `tool_item`
  ADD PRIMARY KEY (`tool_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transac_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_status` (`user_status`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs_info`
--
ALTER TABLE `logs_info`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `logs_info_master`
--
ALTER TABLE `logs_info_master`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_item`
--
ALTER TABLE `master_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `msg_posts`
--
ALTER TABLE `msg_posts`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tool_item`
--
ALTER TABLE `tool_item`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
