-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 01:50 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `dept` varchar(80) NOT NULL,
  `sem` int(11) NOT NULL,
  `dob` date NOT NULL,
  `uninumber` int(11) NOT NULL,
  `phnum` int(11) NOT NULL,
  `address` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `dept`, `sem`, `dob`, `uninumber`, `phnum`, `address`, `email`, `password`) VALUES
(1, 'ggg', 'dsdfdfg', 0, '0000-00-00', 0, 0, 'yjtyjyj', 'fsdfgsdgjfhjsdfh@gmail.com', 'neethu'),
(2, 'neethu', 'fhhsdhfjhsd33', 0, '0000-00-00', 534566, 54647, '6476756', 'neethu@gmail.com', 'neethu'),
(3, 'neethu', 'cse', 0, '0000-00-00', 0, 2147483647, 'hgfhghghhfh', 'hjdfh@gmail.com', 'neethu'),
(4, 'fijo', 'cse', 5, '0000-00-00', 2147483647, 2147483647, 'dfjshkdfh', 'gffjghjjf@gmail.com', 'nithya'),
(5, 'hjghj', 'hjghj', 557567, '0000-00-00', 56556, 465, 'fbfgnhjh', 'vbnvbnhhm@gmai.com', 'nimmy'),
(6, 'fijo', 'cs', 3, '0000-00-00', 534566, 2147483647, '6476756', 'fijojose90@gmail.com', '1234'),
(7, 'n', 'ece', 5, '0000-00-00', 654368, 2147483647, 'jkdfjkf', 'nimmy@gmail.com', 'nimmy'),
(8, 'toms', 'mech', 7, '0000-00-00', 2147483647, 787900, 'hjjdgfhdgfhd', 'toms@gmail.com', 'toms'),
(9, 'fijo', 'eeeeeee', 4343, '0000-00-00', 2147483647, 645475477, '67567hfhf', 'neet@gmail.com', 'gggg'),
(10, 'jeenyy', 'csg', 5, '0000-00-00', 789898, 555570909, 'sdhdgfhdsfdds', 'jenny@gmail.com', 'jenny1'),
(11, 'kevin', 'hh', 8, '0000-00-00', 7679898, 67, '898ffddfgbfgh', 'kevin@gmail.com', 'kevin'),
(12, 'baby nic', 'lasvo', 5, '0000-00-00', 454363636, 7878867, 'hdghdgh', 'baby@gmail.com', 'baby1'),
(13, 'favio', 'ui', 8, '0000-00-00', 0, 8879898, 'hjkjkj', 'favio@gmail.com', 'favio1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
