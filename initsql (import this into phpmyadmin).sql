-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 08:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notable`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`, `fname`, `lname`, `mail`, `dob`, `gender`) VALUES
('anmol', 'Simba111', 'Anmol', 'Srinivas', 'anmolsrinivas@yahoo.com', '1997-02-13', 'M'),
('dakshmehta', 'ABCDefgh1234', 'Daksh', 'Mehta', 'daksh95@gmail.com', '1997-02-27', 'm'),
('vibhasgoel', 'Vibhas@1234', 'Vibhas', 'Goel', 'vibhas.goel@gmail.com', '1996-07-03', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `username`, `title`, `content`) VALUES
(1, 'anmol', 'My First Note', 'This is just some sample text'),
(3, 'dakshady', 'A new note', '<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut leo tempor, lobortis orci id, laoreet lectus. Aliquam ut semper massa, vel luctus orci. Donec dui dolor, faucibus sodales tortor quis, tincidunt convallis nibh. Quisque blandit luctus augue, vel tempor massa tempor vitae. Suspendisse ut est imperdiet, aliquam odio vitae, feugiat tellus. Suspendisse neque nunc, mattis id nibh vel, egestas facilisis justo. In nec mi ut nulla commodo tincidunt nec in purus. Quisque et vestibulum ex.</span>'),
(5, 'vibhasgoel', 'My First Note', 'Hey everybody this is my first <b>note</b>.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
