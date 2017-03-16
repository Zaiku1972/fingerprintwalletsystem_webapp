-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2016 at 04:45 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hexa`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ip_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`, `posted_by`, `date`, `time`, `ip_address`) VALUES
(1, 'hi', 'hi', 'hello', '', '0000-00-00', '00:00:00', ''),
(2, 'Hi 1', 'hi-1', 'stud cops news', '', '0000-00-00', '00:00:00', ''),
(3, 'helo', 'helo', 'hello', '', '0000-00-00', '00:00:00', ''),
(4, 'Hello', 'hello', '<p>Hello</p>\r\n', '', '0000-00-00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `trans_id` varchar(20) NOT NULL,
  `trans_type` int(11) NOT NULL,
  `f_phone_no` varchar(10) NOT NULL,
  `acc_bal_rem` int(11) NOT NULL,
  `ven_id` varchar(4) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `amount` int(11) NOT NULL,
  `phone_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`trans_id`, `trans_type`, `f_phone_no`, `acc_bal_rem`, `ven_id`, `date`, `time`, `amount`, `phone_no`) VALUES
('1001000002', 1, '9810431939', 2147483647, '1001', '2016-04-18', '08:13:16', 50, '2147483647'),
('1001000003', 1, '9810431939', 2147483647, '1001', '2016-04-18', '08:40:59', 50, '2147483647'),
('1001000004', 1, '9810431939', 2147483647, '1001', '2016-04-18', '08:44:07', 50, '2147483647'),
('1001000005', 1, '9810431939', 2147483647, '1001', '2016-04-18', '08:46:06', 50, '2147483647'),
('1001000006', 1, '9810431939', 2147483647, '1001', '2016-04-18', '08:46:19', 50, '2147483647'),
('1001000007', 1, '9810431939', 150, '1001', '2016-04-18', '08:48:15', 50, '2147483647'),
('1001000008', 1, '9810431939', 100, '1001', '2016-04-23', '08:51:29', 50, '2147483647'),
('1001000009', 1, '9810431939', 50, '1001', '2016-04-25', '12:35:56', 50, '2147483647'),
('1001000010', 1, '9810431939', 0, '1001', '2016-04-25', '12:36:12', 50, '2147483647'),
('1001000016', 1, '9810431939', -50, '1001', '2016-04-30', '12:20:40', 50, '9810431938'),
('1001000017', 1, '9810431935', -100, '1001', '2016-04-30', '12:20:50', 50, '9810431938'),
('1001000018', 1, '9810431939', -200, '1001', '2016-04-30', '12:31:01', 50, '9810431938'),
('1001000019', 1, '9810431938', -300, '1001', '2016-04-30', '12:31:17', 100, '9810431938'),
('1001000020', 1, '9810431939', -300, '1001', '2016-04-30', '12:44:06', 100, '9810431938'),
('1001000021', 1, '9810431939', -400, '1001', '2016-04-30', '12:44:21', 100, '9810431938'),
('1001000022', 1, '9810431939', -500, '1001', '2016-04-30', '12:44:36', 100, '9810431938'),
('1001000023', 1, '9810431939', 400, '1001', '2016-04-30', '12:46:49', 100, '9810431938'),
('1001000024', 1, '9810431939', 200, '1001', '2016-04-30', '12:48:24', 100, '9810431938'),
('1001000025\r\n', 1, '9810431938', 100, '1001', '2016-06-14', '05:03:57', 100, '7023065645'),
('1001000026\r\n', 1, '9810431938', 350, '1001', '2016-06-14', '02:32:08', 50, '7023065645'),
('1001000027\r\n', 1, '9810431938', 50, '1001', '2016-06-14', '02:36:10', 100, '7023065645'),
('1001000028\r\n', 1, '9810431938', 800, '1001', '2016-06-14', '02:39:05', 200, '7023065645'),
('1001000029\r\n', 1, '9810431938', 198, '1001', '2016-06-14', '02:42:10', 200, '7023065645'),
('1001000030', 1, '9810431938', 48, '1001', '2016-06-14', '03:02:25', 50, '7023065645'),
('1001000031', 1, '9810431938', 8, '1001', '2016-06-14', '03:02:33', 40, '7023065645'),
('1001000032', 1, '9810431938', 3, '1001', '2016-06-14', '03:02:54', 5, '7023065645'),
('1001000033', 1, '9810431938', 1, '1001', '2016-06-14', '03:04:34', 2, '7023065645'),
('1001000034', 1, '9810431938', 900, '1001', '2016-06-16', '02:17:21', 100, '7023065645'),
('1001000035', 1, '9810431938', 800, '1001', '2016-06-16', '02:17:28', 100, '7023065645'),
('1001000036', 1, '9810431938', 600, '1001', '2016-06-16', '06:38:26', 200, '7023065645'),
('1001000037', 1, '9810431938', 500, '1001', '2016-06-16', '06:40:32', 100, '7023065645'),
('1001000038', 1, '9810431938', 400, '1001', '2016-06-16', '07:16:51', 100, '7790844803'),
('1001000040', 1, '9810431938', 30, '1001', '2016-06-17', '02:27:26', 20, '7023065645'),
('1001000041', 1, '9810431938', 20, '1001', '2016-06-17', '02:29:07', 10, '7023065645'),
('1001000042', 1, '9810431938', 10, '1001', '2016-06-17', '02:32:13', 10, '7023065645');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_new` int(11) NOT NULL,
  `u_level` int(11) NOT NULL,
  `acc_bal` int(11) NOT NULL,
  `profile_link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `phone_no`, `email`, `password`, `is_new`, `u_level`, `acc_bal`, `profile_link`) VALUES
('Daimian', '1212121212', 'lsriram.arvind@st.niituniversity.in', '!5!?zwwsi8', 1, 1, 0, ''),
('Winchester', '7023065645', 's@gmail.com', 'password', 1, 2, 10, 'https://hexaprofile.blob.core.windows.net/mycontainer/7023065645.jpg'),
('karthik', '7790844803', 'kr@kr.com', 'password', 1, 1, 400, ''),
('Sriram', '9810431937', 'sr@sr2.com', 'password', 1, 1, 0, ''),
('changed', '9810431938', 'sr@sr.com', 'password', 1, 1, 3087, ''),
('Arvind', '9810431939', 'sr@sr1.com', 'password', 1, 1, 1750, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `trans_id` (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`phone_no`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
