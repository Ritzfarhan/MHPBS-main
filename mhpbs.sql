-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 02:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhpbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(70) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `hotel_id` varchar(10) NOT NULL,
  `vkey` varchar(45) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `reset_token` varchar(45) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `hotel_id`, `vkey`, `verified`, `reset_token`, `createdate`, `image_admin`) VALUES
(21, 'Muhammad', 'asjdasdjassadpsd', 'akmaru', '157371779ca0177bed7fa7f156eb2a6d', 'fzxmarch9@gmail.com', '0172058924', 'A19DW0589', 'fa96f789c2e1ee2019547ea2d978af97', 1, '', '2021-10-22 02:23:18', '1520364581_hqdefault (2).png'),
(22, 'RITZFARHAN', 'ROSLI', 'ritzfarhan', '2fd69cfbb3c7404b8604bd85e3cfa6f5', 'ritzfarhan@gmail.com', '1234567', '654321', 'ae3a82e5c6a931a06913eafa88f73c3f', 1, '', '2023-07-11 09:00:30', 'matt.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `paymentID` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `roomtype` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `paymentID`, `lastname`, `email`, `phone`, `checkin`, `checkout`, `roomtype`, `status`) VALUES
(265253, 'TP191232055512317060723', 'ROSLI', 'ritzfarhan@gmail.com', '654321', '2023-07-06', '2023-07-07', 'Palace Suite', 2),
(20779054, 'TP191229247400717060723', 'Bin Mohamad Nizam', 'muhammad.akmal2001@graduate.utm.my', '172837763', '2023-07-06', '2023-07-07', 'Deluxe', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `name` varchar(45) NOT NULL,
  `room_number` bigint(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`name`, `room_number`, `price`, `status`) VALUES
('Palace Suite', 123, 1000, 0),
('Deluxe Guest Room', 172, 500, 0),
('Deluxe Guest Room', 309, 450, 0),
('Executive Deluxe Guest Room', 555, 555, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`name`) VALUES
('Executive Suite'),
('Palace Suite'),
('Executive Deluxe Guest Room'),
('Deluxe Guest Room');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ic` int(11) NOT NULL,
  `firstname` varchar(70) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(256) NOT NULL,
  `vkey` varchar(45) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `reset_token` varchar(45) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_customer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ic`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `address`, `vkey`, `verified`, `reset_token`, `createdate`, `image_customer`) VALUES
(50, 0, 'Muhammad AAA', 'JABBA ', 'Farouk', '55a58099a7af541bc67e9833fe9c24f8', 'fzxmarch9@gmail.com', '01328977651', '', '4c3826cd896e975c0535608936b5cb46', 1, '', '2021-10-22 02:25:57', '1141570.png'),
(55, 654321, 'RITZFARHAN', 'ROSLI', 'ritzfarhan', '34d76647dddc73dc9f6c656a7c0d2d4a', 'ritzfarhan@gmail.com', '0149643089', 'ampang', 'a7f6073578f380a794c507b9db84149d', 1, '', '2023-07-11 09:35:38', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20779055;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
