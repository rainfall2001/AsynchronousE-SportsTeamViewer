-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 27, 2022 at 08:42 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `322`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `family_name` varchar(20) NOT NULL,
  `given_name` varchar(20) NOT NULL,
  `stats` varchar(20) NOT NULL,
  `notes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `family_name`, `given_name`, `stats`, `notes`) VALUES
(1, 'Cooper', 'Anna', 'Top 10%', 'NZ High School Champ 2021'),
(2, 'Tama', 'Henare', 'Top 20%', 'Runner up NZEsports 2020'),
(3, 'Kotahi', 'Erina', 'n/a', 'new player'),
(4, 'Thompson', 'Eddie', 'Top 20%', '5 tournament wins 2019-2021'),
(5, 'Chen', 'Veejay', 'Top 10%', 'Runner up World Super-E-League 2019'),
(6, 'Samson', 'Loala', 'Top 20%', 'Runner up World Super-E-League 2018'),
(7, 'Davis', 'Cath', 'n/a', 'new player'),
(8, 'Frith', 'Tom', 'n/a', 'new player'),
(9, 'Mackie', 'Allhana', 'Top 20%', '3 tournament wins 2020-2021'),
(10, 'Tui', 'Kaylan', 'n/a', 'new player'),
(11, 'Malone', 'Joey', 'Top 20%', 'NZ High School Champ 2020'),
(12, 'Wiremar', 'Whetu', 'Top 10%', 'World Super-E-League Champ 2021'),
(13, 'Donaldson', 'Tony', 'Top 20%', 'NZ High School runner up 2020'),
(14, 'Ford', 'Lindsay', 'n/a', 'new player'),
(15, 'Mahon', 'Louise', 'Top 10%', 'World Super-E-League Runner up 2021'),
(16, 'Su', 'Jaylan', 'n/a', 'new player'),
(17, 'Patel', 'Venra', 'n/a', 'new player'),
(18, 'Green', 'Simon', 'n/a', 'new player'),
(19, 'Harris', 'Bodie', 'n/a', 'new player');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
