-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Mai 2017 la 13:46
-- Versiune server: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `documents`
--

CREATE TABLE `documents` (
  `id_doc` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `mesage` text NOT NULL,
  `extensie` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `documents`
--

INSERT INTO `documents` (`id_doc`, `title`, `owner`, `category`, `registration_date`, `mesage`, `extensie`) VALUES
(17, 'Cipozaur', 'cip', 'ALL', '2017-05-11', 'GRAPH', 'txt'),
(18, 'sadfsa', 'doc', 'safasf', '2017-05-11', ' safas', 'ppt');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `user_role` varchar(24) NOT NULL,
  `date_registred` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`userID`, `full_name`, `name`, `password`, `email`, `phone`, `user_role`, `date_registred`) VALUES
(30, 'Nicu Ciorascu', 'Niku', 'e632729ce86a79f68508dcf4ba634950', 'niku@yahoo.com', '0742-855-9878', 'User', '2017-05-11'),
(29, 'Mircea', 'cip', '289dff07669d7a23de0ef88d2f7129e7', 'cip@sd.com', '0745-885-4125', 'User', '2017-05-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
