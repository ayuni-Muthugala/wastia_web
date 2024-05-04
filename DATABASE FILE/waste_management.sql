-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3399
-- Generation Time: May 04, 2024 at 05:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waste_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'CAC29D7A34687EB14B37068EE4708E7B', 'admin@mail.com', '', '2022-05-27 13:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(5, 5, 'Colombo Waste Management Center', 'colombo@wastemanagement.lk', '+94 11 1234567', 'www.colombowastemanagement.lk', '8am', '5pm', 'Mon-Sat', 'No. 123, Galle Road, Colombo 03, Sri Lanka', '65db704b00acb.jpg', '2024-02-25 16:52:27'),
(6, 6, 'Kandy Clean Environment Services', 'kandy@cleanenvironmentservices.lk', '+94 81 7654321', 'www.kandycleanenvironmentservices.lk', '7am', '4pm', 'Mon-Fri', ' 456, Peradeniya Road, Kandy, Sri Lanka', '65db7095daf24.jpg', '2024-02-25 16:53:41'),
(7, 7, ' Galle Eco Waste Solutions', 'galle@ecowastesolutions.lk', '+94 91 9876543', 'www.galleecowastesolutions.lk', '9am', '6pm', 'Mon-Sat', '789, Matara Road, Galle, Sri Lanka', '65db70b89f68e.jpg', '2024-02-25 16:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `d_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `vnumber` varchar(222) NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`d_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `vnumber`, `status`, `date`) VALUES
(7, 'hello', 'hello', 'hello', 'hellow@gmail.com', '0711757988', '23b431acfeb41e15d466d75de822307c', 'hello', 1, '2024-02-24 13:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(18, 5, 'Paper', 'Includes newspapers, magazines, office paper, cardboard, and other paper-based materials.', '10.00', '65db89dd1aab9.jpg'),
(19, 6, ' Plastic Bottles and Containers', 'Includes plastic bottles, jars, containers, and packaging materials made from PET, HDPE, LDPE, and other recyclable plastics.', '25.00', '65db8a3c4405e.jpg'),
(20, 7, 'Glass', 'Includes glass bottles, jars, and other glass containers.', '20.00', '65db8a51903e3.jpg'),
(21, 5, 'Metal Cans', 'Includes aluminum cans, steel cans, and tin cans used for packaging food and beverages.', '15.00', '65db8b45cfc23.jpg'),
(22, 5, 'Unknown', 'Unknown Waste Item', '0.00', '663658f79f793.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recycle_category`
--

CREATE TABLE `recycle_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recycle_category`
--

INSERT INTO `recycle_category` (`c_id`, `c_name`, `date`) VALUES
(5, 'Recyclable Waste', '2024-02-25 16:46:20'),
(6, 'Electronic Waste (E-Waste)', '2024-02-25 16:46:32'),
(7, 'Hazardous Waste', '2024-02-25 16:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'none', '2022-05-01 05:17:49'),
(2, 3, 'in process', 'none', '2022-05-27 11:01:30'),
(3, 2, 'closed', 'thank you for your order!', '2022-05-27 11:11:41'),
(4, 3, 'closed', 'none', '2022-05-27 11:42:35'),
(5, 4, 'in process', 'none', '2022-05-27 11:42:55'),
(6, 1, 'rejected', 'none', '2022-05-27 11:43:26'),
(7, 7, 'in process', 'none', '2022-05-27 13:03:24'),
(8, 8, 'in process', 'none', '2022-05-27 13:03:38'),
(9, 9, 'rejected', 'thank you', '2022-05-27 13:03:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2022-05-27 13:04:33'),
(11, 8, 'closed', 'thanks ', '2022-05-27 13:05:24'),
(12, 5, 'closed', 'none', '2022-05-27 13:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(7, 'srilankauser123', ' Priya', 'Silva', 'hello@mail.com', '+94 77 123 4567', '25b08697759e84653edff1030e8c1546', ' 123, Galle Road, Colombo 03, Sri Lanka', 1, '2024-02-25 19:47:34'),
(8, 'sluser456', 'Sanjeewa', 'Perera', 'sanjeewa.perera@mail.com', '+94 76 234 5678', '0aac43318de70a17faf86b4a5dc6667c', '456, Kandy Road, Kandy, Sri Lanka', 1, '2024-02-25 19:48:30'),
(9, 'lankanuser789', 'Nuwan', 'Bandara', 'nuwan.bandara@mail.com', '+94 71 345 6789', 'b624050c1dad43818c6e3f7762f2df79', '789, Negombo Road, Negombo, Sri Lanka', 1, '2024-02-25 19:49:04'),
(10, 'slcustomer101', 'Chamari', 'Jayawardena', 'slcustomer@mail.com', '+94 76 456 7890', 'bfb2489633a71c65be85b5025282b361', '101, Main Street, Galle, Sri Lanka', 1, '2024-02-25 19:51:24'),
(11, 'srlkuser2022', 'Tharindu', 'Fernando', 'tharindu.fernando@mail.com', '+94 70 567 8901', 'eea7b7f79aff96efd4e3444297d73bf6', '2022, Beach Road, Matara, Sri Lanka', 1, '2024-02-25 19:51:58'),
(12, 'smd', 'smd', 'thira', 's.m.d.thiranjaya@gmail.com', '0711757988', '25d55ad283aa400af464c76d713c07ad', 'Hammalawa R/D,Dandagamuwa,kuliyapitiya', 1, '2024-05-04 04:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(1, 4, 'Paper', 2, '6.00', 'rejected', '2024-02-25 19:38:33'),
(2, 4, 'Plastic Bottles and Containers', 1, '7.00', 'closed', '2024-02-25 19:38:43'),
(3, 5, 'Metal Cans', 1, '23.00', 'closed', '2024-02-25 19:38:53'),
(4, 5, 'Glass', 1, '5.00', 'in process', '2024-02-25 19:39:02'),
(5, 5, 'Metal Cans', 1, '10.00', 'closed', '2024-02-25 19:39:10'),
(7, 6, 'Paper', 1, '14.00', 'closed', '2024-05-27 13:04:33'),
(8, 6, 'Plastic Bottles and Containers', 1, '36.00', 'closed', '2024-02-25 19:39:52'),
(9, 6, 'Glass', 1, '8.00', 'rejected', '2024-02-25 19:40:00'),
(10, 12, 'Metal Cans', 2, '15.00', NULL, '2024-05-04 04:06:09'),
(11, 12, 'Paper', 2, '10.00', NULL, '2024-05-04 04:06:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `recycle_category`
--
ALTER TABLE `recycle_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `recycle_category`
--
ALTER TABLE `recycle_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
