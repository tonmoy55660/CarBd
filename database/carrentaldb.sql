-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 02:42 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `blog` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `cus_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `blog`, `date`, `cus_id`, `name`) VALUES
(1, 'a', 'b', '20-Jul-2019', 643873, 'shakil'),
(2, 'Nissan Plugs in for Formula E Electric Car Racing', 'At the seasons last race in Red Hook, Brooklyn the first Japanese manufacturers team to compete takes third place on the podium', '20-Jul-2019', 643873, 'shakil');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `date` varchar(20) NOT NULL,
  `cus_name` varchar(20) NOT NULL,
  `cus_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`comment_id`, `blog_id`, `comment`, `date`, `cus_name`, `cus_id`) VALUES
(1, 2, 'Next year, BMW and Mercedes-Benz join the fray', '20-Jul-2019', 'shakil', 643873);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` varchar(20) NOT NULL,
  `car_id` int(20) NOT NULL,
  `pick_date` varchar(20) NOT NULL,
  `return_date` varchar(20) NOT NULL,
  `class` varchar(50) NOT NULL,
  `total_day` int(5) NOT NULL,
  `total_bill` int(20) NOT NULL,
  `price` float(10,2) NOT NULL,
  `pickup_location` varchar(20) NOT NULL,
  `booking_date` varchar(20) NOT NULL,
  `advance_payment` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `isCancel` int(2) NOT NULL DEFAULT '0',
  `cus_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `car_id`, `pick_date`, `return_date`, `class`, `total_day`, `total_bill`, `price`, `pickup_location`, `booking_date`, `advance_payment`, `payment_status`, `isCancel`, `cus_id`) VALUES
('175082', 41668, '11/15/2019', '11/15/2019', 'Compact', 1, 2500, 2500.00, 'Azimpur', '11/14/2019', '2500', '', 0, 327591),
('835523', 41668, '11/19/2019', '11/20/2019', 'Compact', 2, 5000, 2500.00, 'Mohammodpur', '11/14/2019', '5000', 'VALID', 1, 327591);

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `car_id` int(20) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `car_details` varchar(1000) NOT NULL,
  `class` varchar(20) NOT NULL,
  `fuel` varchar(20) NOT NULL,
  `door` varchar(20) NOT NULL,
  `gearbox` varchar(20) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `driver_phone` varchar(15) NOT NULL,
  `img1` varchar(250) NOT NULL,
  `renter_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`car_id`, `car_name`, `price`, `car_details`, `class`, `fuel`, `door`, `gearbox`, `driver_name`, `driver_phone`, `img1`, `renter_id`) VALUES
(41132, 'BMW', 2600.00, 'jhklkl', 'Compact', 'Petrol', '1', 'Automatic', 'Motaleb', '016813', '', 15432),
(41668, 'Toyota', 2500.00, 'back camera Options- Excellent Air Conditioner,Push Start, Sun Roof, Cruise Control,DVD player, Back Camera Navigation, Projection Head light,Fog Light, Leather Interior, Power steering, Disk Brake, Power windows & mirror, 4abs, Air bag, Center , Tempered glass, Alloy Wheels, All power, All papers are up to date.', 'Compact', 'Petrol', '1', 'Automatic', 'Mikel', '0123654789', 'b3.jpg', 15432),
(52163, 'BMW', 2600.00, 'jhklkl', 'Compact', 'Petrol', '1', 'Automatic', 'Motaleb', '0168135656', '20191115124726_images.jfif', 15432),
(162925, 'sssssss', 22222.00, 'ssssssssss', 'Compact', 'Petrol', '1', 'Automatic', 'ssssss', '22222222', '20191115125014_74528633_573350316804838_4614012039570915328_n.jpg', 15432),
(342453, 'rger', 23333.00, '22fd', 'Compact', 'Petrol', '1', 'Automatic', 'df', '11111', '20191115124805_images.jfif', 15432),
(493795, 'BMW', 2600.00, 'jhklkl', 'Compact', 'Petrol', '1', 'Automatic', 'Motaleb', '0168135656', '20191115124700_images.jfif', 15432);

-- --------------------------------------------------------

--
-- Table structure for table `renter_details`
--

CREATE TABLE `renter_details` (
  `renter_id` int(20) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `tin` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAccepted` int(5) NOT NULL DEFAULT '0',
  `role` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renter_details`
--

INSERT INTO `renter_details` (`renter_id`, `company_name`, `tin`, `name`, `email`, `phone`, `password`, `isAccepted`, `role`) VALUES
(441915, 'Ta', '123456', 'tanveer', 'tanveershuvos@gmail.com', '01683182337', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sale_car_details`
--

CREATE TABLE `sale_car_details` (
  `car_id` int(20) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `car_details` varchar(1000) NOT NULL,
  `class` varchar(20) NOT NULL,
  `fuel` varchar(20) NOT NULL,
  `door` varchar(20) NOT NULL,
  `gearbox` varchar(20) NOT NULL,
  `kilo` int(50) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `img1` varchar(250) NOT NULL,
  `isSold` int(5) NOT NULL DEFAULT '0',
  `seller_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_car_details`
--

INSERT INTO `sale_car_details` (`car_id`, `car_name`, `price`, `car_details`, `class`, `fuel`, `door`, `gearbox`, `kilo`, `reg_date`, `img1`, `isSold`, `seller_id`) VALUES
(665389, 'Prado Land Cruiser', 3000000.00, 'back camera Options- Excellent Air Conditioner,Push Start, Sun Roof, Cruise Control,DVD player, Back Camera Navigation, Projection Head light,Fog Light, Leather Interior, Power steering, Disk Brake, Power windows & mirror, 4abs, Air bag, Center , Tempered glass, Alloy Wheels, All power, All papers are up to date.', 'Compact', 'Petrol', '1', 'Automatic', 2344, '2019-07-08', 'b2.jpg', 0, 327591),
(849349, 'ds', 2222222.00, 'dddddd', 'Supermini', 'Diesel', '3', 'Manual', 222222, '2019-11-14', '20191114104520_about-img.jpg', 1, 327591);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_record`
--

CREATE TABLE `transaction_record` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `transaction_date` varchar(50) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `booking_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_record`
--

INSERT INTO `transaction_record` (`id`, `status`, `transaction_date`, `transaction_id`, `amount`, `booking_id`) VALUES
(1, 'VALID', '2019-11-12 19:00:22', 'SSLCZ_TEST_5dcaaff3c1874', '750.00', '412821'),
(2, 'VALID', '2019-11-12 19:13:06', 'SSLCZ_TEST_5dcab2efbf7aa', '750.00', '924414'),
(3, 'VALID', '2019-11-12 19:35:19', 'SSLCZ_TEST_5dcab8256801e', '1500.00', '588747'),
(4, 'VALID', '2019-11-12 19:37:21', 'SSLCZ_TEST_5dcab89f38bc8', '750.00', '247715'),
(5, 'VALID', '2019-11-12 19:47:15', 'SSLCZ_TEST_5dcabaf0a48e8', '750.00', '708797'),
(6, 'VALID', '2019-11-12 19:48:07', 'SSLCZ_TEST_5dcabb2548cf8', '750.00', '663268'),
(7, 'VALID', '2019-11-12 19:51:02', 'SSLCZ_TEST_5dcabbd3e69cd', '750.00', '783829'),
(8, 'VALID', '2019-11-12 19:52:20', 'SSLCZ_TEST_5dcabc222dc45', '1500.00', '648794'),
(9, 'VALID', '2019-11-12 19:54:16', 'SSLCZ_TEST_5dcabc941c9e1', '1500.00', '208256'),
(10, 'VALID', '2019-11-12 19:55:28', 'SSLCZ_TEST_5dcabcdd60a5d', '750.00', '461650'),
(11, 'VALID', '2019-11-12 19:57:13', 'SSLCZ_TEST_5dcabd4697372', '750.00', '998408'),
(12, 'VALID', '2019-11-12 20:00:02', 'SSLCZ_TEST_5dcabdee73424', '1500.00', '624844'),
(13, 'VALID', '2019-11-12 20:01:18', 'SSLCZ_TEST_5dcabe3b896de', '1500.00', '266609'),
(14, 'VALID', '2019-11-12 20:22:58', 'SSLCZ_TEST_5dcac34fd55f5', '750.00', '666508'),
(15, 'VALID', '2019-11-12 20:27:26', 'SSLCZ_TEST_5dcac45bb7531', '1500.00', '855815'),
(16, 'VALID', '2019-11-12 20:31:17', 'SSLCZ_TEST_5dcac5438fdf5', '750.00', '325094'),
(17, 'VALID', '2019-11-14 12:08:28', 'SSLCZ_TEST_5dccf26a0a816', '750.00', '175082'),
(18, 'VALID', '2019-11-14 13:00:50', 'SSLCZ_TEST_5dccfeaf939e1', '1500.00', '835523');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(255) NOT NULL,
  `cus_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `cus_id`, `name`, `email`, `phone`, `address`, `password`) VALUES
(1, 327591, 'tanveer', 'tanveershuvos@gmail.com', '01683182337', 'Dhaka', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `renter_details`
--
ALTER TABLE `renter_details`
  ADD PRIMARY KEY (`renter_id`);

--
-- Indexes for table `sale_car_details`
--
ALTER TABLE `sale_car_details`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `transaction_record`
--
ALTER TABLE `transaction_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaction_record`
--
ALTER TABLE `transaction_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
