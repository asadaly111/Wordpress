-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2019 at 06:56 AM
-- Server version: 10.2.21-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firestorm-ministries-international`
--

-- --------------------------------------------------------

--
-- Table structure for table `firestormm_payments`
--

CREATE TABLE `firestormm_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `PayerID` varchar(255) DEFAULT NULL,
  `TRANSACTIONID` varchar(255) DEFAULT NULL,
  `CORRELATIONID` varchar(255) DEFAULT NULL,
  `type` enum('ontime','recuring') DEFAULT NULL,
  `cycle` varchar(255) DEFAULT NULL,
  `payment_start_date` date DEFAULT NULL,
  `status` enum('inactive','active','expired','paid') DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  `PROFILEID` varchar(255) DEFAULT NULL,
  `payment_end_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firestormm_payments`
--

INSERT INTO `firestormm_payments` (`id`, `user_id`, `token`, `PayerID`, `TRANSACTIONID`, `CORRELATIONID`, `type`, `cycle`, `payment_start_date`, `status`, `data`, `PROFILEID`, `payment_end_date`) VALUES
(1, NULL, NULL, NULL, '15K04755VN706961B', '4c6e2b3fe41df', 'ontime', NULL, NULL, 'active', '{\"first_name\":\"Brynn\",\"last_name\":\"Delgado\",\"email\":\"mehywumix@yahoo.com\",\"number\":\"556\",\"password\":\"Common@123\",\"payment_method\":\"onetime\"}', NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, 'recuring', 'monthly', NULL, 'inactive', '{\"first_name\":\"Callie\",\"last_name\":\"Gardner\",\"email\":\"jeharev@yahoo.com\",\"number\":\"587\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL, 'recuring', 'monthly', NULL, 'inactive', '{\"first_name\":\"Britanni\",\"last_name\":\"Johns\",\"email\":\"rygikyzyp@hotmail.com\",\"number\":\"810\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', NULL, NULL),
(4, 4, NULL, NULL, NULL, NULL, 'recuring', 'monthly', NULL, 'inactive', '{\"first_name\":\"Alice\",\"last_name\":\"Slater\",\"email\":\"tarisa@gmail.com\",\"number\":\"546\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', NULL, NULL),
(5, 5, 'EC-675653739V342540R', 'LD8JPL2FH5VQY', NULL, 'c9df2a79a9d7f', 'recuring', 'monthly', NULL, 'active', '{\"first_name\":\"Rae\",\"last_name\":\"Sawyer\",\"email\":\"qigilomi@hotmail.com\",\"number\":\"787\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', 'I-S81FBKTSKUKJ', NULL),
(6, 6, 'EC-8VL42936C58592136', 'LD8JPL2FH5VQY', NULL, 'a22c7baf69e8e', 'recuring', 'monthly', NULL, 'active', '{\"first_name\":\"Lester\",\"last_name\":\"Mckee\",\"email\":\"pubemuzy@hotmail.com\",\"number\":\"698\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', 'I-FMV8GHDCTTA9', NULL),
(7, 7, 'EC-8C811393GE073021K', 'LD8JPL2FH5VQY', NULL, 'ef7ecffedd382', 'recuring', 'monthly', NULL, 'active', '{\"first_name\":\"Margaret\",\"last_name\":\"Sloan\",\"email\":\"huqewu@hotmail.com\",\"number\":\"529\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', 'I-E15LEJNVCG7Y', NULL),
(8, 8, 'EC-2JJ01871BU784252H', 'LD8JPL2FH5VQY', NULL, '9b14aae2e92d5', 'recuring', 'monthly', NULL, 'active', '{\"first_name\":\"Cherokee\",\"last_name\":\"Lynch\",\"email\":\"donehyh@hotmail.com\",\"number\":\"605\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', 'I-VV8XNJ0G137J', NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(21, 9, 'EC-6JY179220W0031712', 'LD8JPL2FH5VQY', NULL, '7fa1c90d17777', 'recuring', 'monthly', NULL, 'active', '{\"first_name\":\"Shaine\",\"last_name\":\"Beach\",\"email\":\"haniqog@gmail.com\",\"number\":\"638\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', 'I-LHEP8JDYAJ5Y', NULL),
(22, 10, 'EC-5UA083492R2058928', 'LD8JPL2FH5VQY', NULL, 'e0372c1aa35b2', 'recuring', 'monthly', '2019-01-10', 'active', '{\"first_name\":\"Lani\",\"last_name\":\"Goodwin\",\"email\":\"qibose@yahoo.com\",\"number\":\"197\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', 'I-8XBT7EY89M2U', '2019-02-10'),
(23, 11, 'EC-09D019287S323815S', 'LD8JPL2FH5VQY', NULL, '5e3eaa8e9a008', 'recuring', 'monthly', '2019-01-10', 'active', '{\"first_name\":\"Quail\",\"last_name\":\"Mclaughlin\",\"email\":\"macam@hotmail.com\",\"number\":\"433\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', 'I-FR70DWEPNHT2', '2019-02-10'),
(24, 11, 'EC-09D019287S323815S', 'LD8JPL2FH5VQY', NULL, '5e3eaa8e9a008', 'recuring', 'monthly', '2019-01-10', 'active', '{\"first_name\":\"Quail\",\"last_name\":\"Mclaughlin\",\"email\":\"macam@hotmail.com\",\"number\":\"433\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', 'I-FR70DWEPNHT2', '2019-02-10'),
(25, 11, 'EC-09D019287S323815S', 'LD8JPL2FH5VQY', NULL, '5e3eaa8e9a008', 'recuring', 'monthly', '2019-01-10', 'active', '{\"first_name\":\"Quail\",\"last_name\":\"Mclaughlin\",\"email\":\"macam@hotmail.com\",\"number\":\"433\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', 'I-FR70DWEPNHT2', '2019-02-10'),
(26, 12, NULL, NULL, NULL, NULL, 'recuring', 'monthly', NULL, 'inactive', '{\"first_name\":\"Charles\",\"last_name\":\"Smith\",\"email\":\"charlestsmith888@gmail.com\",\"number\":\"111111111111\",\"password\":\"1111111111\",\"payment_method\":\"recuring\"}', NULL, NULL),
(27, 13, 'EC-17556140SH9913908', 'LD8JPL2FH5VQY', NULL, '90631c4a78d78', 'recuring', 'monthly', '2019-01-16', 'active', '{\"first_name\":\"Rafael\",\"last_name\":\"Poole\",\"email\":\"kaxyqy@hotmail.com\",\"number\":\"23432\",\"password\":\"Common@123\",\"payment_method\":\"recuring\"}', 'I-KGJPXXNYU3UL', '2019-02-16'),
(28, 14, 'EC-0CT35750FX668441V', 'LD8JPL2FH5VQY', NULL, '11cc501f45da3', 'recuring', 'monthly', '2019-01-17', 'active', '{\"first_name\":\"charles\",\"last_name\":\"smith\",\"email\":\"charlestsmith8888@gmail.com\",\"number\":\"989888989\",\"password\":\"12345\",\"payment_method\":\"recuring\"}', 'I-8WY21P460KX7', '2019-02-17'),
(29, 15, 'EC-60E11279K8783264U', 'LD8JPL2FH5VQY', NULL, '49fda53089821', 'recuring', 'monthly', '2019-01-17', 'active', '{\"first_name\":\"sam\",\"last_name\":\"wilson\",\"email\":\"sam@sam.com\",\"number\":\"11111\",\"password\":\"12345\",\"payment_method\":\"recuring\"}', 'I-UP8CJKCY44FC', '2019-02-17'),
(30, 16, 'EC-8M753629MJ940943G', 'LD8JPL2FH5VQY', NULL, 'e9de77096b988', 'recuring', 'monthly', '2019-01-17', 'active', '{\"first_name\":\"alex\",\"last_name\":\"wilson\",\"email\":\"alex@alex.com\",\"number\":\"111111\",\"password\":\"12345\",\"payment_method\":\"recuring\"}', 'I-CUXXGNYJLNKR', '2019-02-17'),
(31, 17, 'EC-21Y69047MK554961B', 'LD8JPL2FH5VQY', NULL, '297ba62a863e5', 'recuring', 'monthly', '2019-01-17', 'active', '{\"first_name\":\"Becca\",\"last_name\":\"Card\",\"email\":\"beccacard05@aol.com\",\"number\":\"1234565855\",\"password\":\"eagles\",\"payment_method\":\"recuring\"}', 'I-RM23L3XXCDV8', '2019-02-17'),
(32, 18, 'EC-5VU84019F13883314', 'LD8JPL2FH5VQY', NULL, '80e9872661713', 'recuring', 'monthly', '2019-01-17', 'active', '{\"first_name\":\"Danny\",\"last_name\":\"Fisher\",\"email\":\"danny@danny.com\",\"number\":\"123456789\",\"password\":\"123\",\"payment_method\":\"recuring\"}', 'I-HEVPEB8M0CFE', '2019-02-17'),
(33, NULL, NULL, NULL, '19Y55537JV6448044', 'd0c28ee5167ac', 'ontime', NULL, NULL, 'active', '{\"first_name\":\"Becca\",\"last_name\":\"Card\",\"email\":\"beccacard05@aol.com\",\"number\":\"\",\"password\":\"eagles\",\"payment_method\":\"onetime\"}', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `firestormm_payments`
--
ALTER TABLE `firestormm_payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `firestormm_payments`
--
ALTER TABLE `firestormm_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
