-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 09:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `a_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `a_password`) VALUES
(1, 'salatd0852@gmail.com', 'cc63b964d2462e71c9248f50460fa8c2');

-- --------------------------------------------------------

--
-- Table structure for table `business_type`
--

CREATE TABLE `business_type` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_type`
--

INSERT INTO `business_type` (`id`, `name`) VALUES
(1, 'Business Volume'),
(2, 'Business to Distribution'),
(3, 'Franchise');

-- --------------------------------------------------------

--
-- Table structure for table `catalouge`
--

CREATE TABLE `catalouge` (
  `id` int(11) NOT NULL,
  `catalouge_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalouge`
--

INSERT INTO `catalouge` (`id`, `catalouge_name`, `image`, `u_id`, `c_id`) VALUES
(6, 'test', '62b42be6382771.77249927.png', 17, 10);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `image`) VALUES
(9, 'Electronics and Appliances', '62a85238391de7.29392231.png'),
(10, 'Health', '62ad643c9befc2.23701631.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `contact`, `email`, `address`, `description`) VALUES
(1, '+919825183134', 'salatd0852@gmail.com', '1734 Stonecoal Road', 'Description');

-- --------------------------------------------------------

--
-- Table structure for table `direct_inquiry`
--

CREATE TABLE `direct_inquiry` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `direct_inquiry`
--

INSERT INTO `direct_inquiry` (`id`, `email`, `contact`, `description`) VALUES
(2, 'salatd0852@gmail.com', '9825183134', 'zdgk;'),
(3, 'salatd0852@gmail.com', '9825183134', 'xfdlfx'),
(4, 'salatd0852@gmail.com', '9825183134', 'xfhkl'),
(5, '', '', 'dgklxbklx');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `isPrimary` tinyint(1) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `isPrimary`, `image`) VALUES
(41, 25, 1, '62a9e2d44185e7.56573240.png'),
(42, 25, 0, '62a9e2d441f083.51850228.png'),
(43, 26, 1, '62a9e321421a10.15854044.png'),
(44, 26, 0, '62a9e321425f12.98892242.png'),
(45, 27, 1, '62a9e321421a10.15854044.png'),
(46, 28, 1, '62ad7d301b5e87.38852987.jpg'),
(47, 28, 0, '62ad7d30256f26.69356134.jpeg'),
(48, 29, 1, '62ad7edf220e61.78857086.jpg'),
(49, 29, 0, '62ad7edf224ee5.83759194.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `email`, `product_id`, `contact`, `description`) VALUES
(3, 'salatd0852@gmail.com', 25, '9825183134', 'Demo Inquiry');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`) VALUES
(1, 'Vadodara'),
(2, 'New Delhi'),
(3, 'Mumbai'),
(8, 'Goa');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `o_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `otp` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photoshoot`
--

CREATE TABLE `photoshoot` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `photoshoot_name` varchar(100) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photoshoot`
--

INSERT INTO `photoshoot` (`id`, `image`, `product_id`, `photoshoot_name`, `c_id`) VALUES
(2, '62b42782b7abc7.24693223.png', 25, 'test', 9),
(4, '62b571682d59c9.64605042.png', 25, 'test', 9);

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `name`, `content`) VALUES
(1, 'Privacy Policy', 'Content'),
(2, 'Terms and Conditions', 'Content');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_type` int(11) NOT NULL,
  `seller_type` int(11) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_sub_category` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_desc` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `business_type`, `seller_type`, `product_category`, `product_sub_category`, `location`, `product_name`, `product_price`, `product_desc`, `product_quantity`, `product_date`, `status`) VALUES
(25, 12, 1, 6, 9, 7, 3, 'Demo Product Product Name Goes Here', 10000, '<p>Enter Your Thread Here.</p>', 10, '2022-06-15 19:17:00', 1),
(26, 12, 1, 4, 9, 8, 1, 'Demo Product 2 Product 2 Name Goes Here', 12999, '<p>Enter Your Thread Here.</p>', 10, '2022-06-15 19:18:17', 1),
(27, 12, 1, 6, 9, 8, 1, 'Demo Product 1 Product 1 Name Goes Here', 12999, '<p>Enter Your Thread Here.</p>', 10, '2022-06-15 19:18:17', 1),
(28, 17, 3, 1, 10, 9, 2, 'Demo Product Health', 1222, '<p>Enter Your Thread Here.</p>', 11, '2022-06-18 12:52:24', 1),
(29, 12, 1, 4, 10, 9, 8, 'Demo Product Health 2', 4545, '<p>Enter Your Thread Here.</p>', 4634, '2022-06-18 12:59:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pwd_reset`
--

CREATE TABLE `pwd_reset` (
  `reset_id` int(7) NOT NULL,
  `reset_link_token` text NOT NULL,
  `exp_date` datetime NOT NULL,
  `reset_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwd_reset`
--

INSERT INTO `pwd_reset` (`reset_id`, `reset_link_token`, `exp_date`, `reset_email`) VALUES
(37, '25f26cd9d5333b11e8ee26aece779b842082', '2022-06-25 08:27:20', 'salatd0852@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `seller_type`
--

CREATE TABLE `seller_type` (
  `id` int(11) NOT NULL,
  `seller_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_type`
--

INSERT INTO `seller_type` (`id`, `seller_type`) VALUES
(1, 'Doesn\'t Exist'),
(2, 'Supplier'),
(4, 'Wholesaler'),
(5, 'Exporter'),
(6, 'manufacturer');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category_name`, `image`) VALUES
(7, 9, 'Mobile', '62a8526233e971.74152075.png'),
(8, 9, 'Laptop', '62a9e5f3dde032.80329432.png'),
(9, 10, 'Medicine', '62ad7d0b82be70.14328013.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `business_type` int(11) NOT NULL,
  `u_contact` varchar(13) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_password` varchar(50) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `business_type`, `u_contact`, `u_email`, `u_password`, `register_date`, `image`) VALUES
(12, 'Sagar Private Limited', 1, '9825183134', 'salatd0852@gmail.com', 'cc63b964d2462e71c9248f50460fa8c2', '2022-06-15 13:47:36', '62a9c7731b9b43.80430139.png'),
(13, 'Krunal Private Limited', 1, '9825183134', '1234@gmail.com', 'cc63b964d2462e71c9248f50460fa8c2', '2022-06-15 13:47:36', '62a9c7731b9b43.80430139.png'),
(14, 'Shabnam Private Limited', 1, '9825183134', '1234@gmail.com', 'cc63b964d2462e71c9248f50460fa8c2', '2022-06-15 13:47:36', '62a9c7731b9b43.80430139.png'),
(15, 'Dhruvit Private Limited', 1, '9825183134', '1234@gmail.com', 'cc63b964d2462e71c9248f50460fa8c2', '2022-06-15 13:47:36', '62a9c7731b9b43.80430139.png'),
(16, 'Dhruvit Private Limited', 1, '9825183134', '1234@gmail.com', 'cc63b964d2462e71c9248f50460fa8c2', '2022-06-15 13:47:36', '62a9c7731b9b43.80430139.png'),
(17, 'Dhruvit Private Limited', 3, '9825183134', '12345@gmail.com', 'cc63b964d2462e71c9248f50460fa8c2', '2022-06-15 13:47:36', '62a9c7731b9b43.80430139.png'),
(18, 'DHRUVIT DINESH SALAT', 1, '9825183134', 'allinoneguruji3@gmail.com', 'cc63b964d2462e71c9248f50460fa8c2', '2022-06-19 21:05:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `video_content`
--

CREATE TABLE `video_content` (
  `id` int(11) NOT NULL,
  `video_url` text NOT NULL,
  `video_name` text NOT NULL,
  `video_view_url` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_content`
--

INSERT INTO `video_content` (`id`, `video_url`, `video_name`, `video_view_url`, `product_id`, `c_id`) VALUES
(4, 'https://www.youtube.com/embed/IWyQkRF6BwU', 'Build Your Own Channel', 'https://www.youtube.com/watch/?v=IWyQkRF6BwU', 25, 9),
(5, 'https://www.youtube.com/embed/IWyQkRF6BwU', 'Build Your Own Channel', 'https://www.youtube.com/watch/?v=IWyQkRF6BwU', 25, 9),
(6, 'https://www.youtube.com/embed/IWyQkRF6BwU', 'Build Your Own Channel', 'https://www.youtube.com/watch/?v=IWyQkRF6BwU', 25, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_type`
--
ALTER TABLE `business_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalouge`
--
ALTER TABLE `catalouge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direct_inquiry`
--
ALTER TABLE `direct_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image` (`product_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `photoshoot`
--
ALTER TABLE `photoshoot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`product_category`),
  ADD KEY `sub_category` (`product_sub_category`),
  ADD KEY `location` (`location`),
  ADD KEY `user` (`user_id`),
  ADD KEY `seller_type` (`seller_type`),
  ADD KEY `business_type` (`business_type`);

--
-- Indexes for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `seller_type`
--
ALTER TABLE `seller_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_ibfk_1` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `business_type` (`business_type`);

--
-- Indexes for table `video_content`
--
ALTER TABLE `video_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `c_id` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_type`
--
ALTER TABLE `business_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catalouge`
--
ALTER TABLE `catalouge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `direct_inquiry`
--
ALTER TABLE `direct_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `photoshoot`
--
ALTER TABLE `photoshoot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  MODIFY `reset_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `seller_type`
--
ALTER TABLE `seller_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `video_content`
--
ALTER TABLE `video_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `image` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photoshoot`
--
ALTER TABLE `photoshoot`
  ADD CONSTRAINT `photoshoot_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category` FOREIGN KEY (`product_category`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `location` FOREIGN KEY (`location`) REFERENCES `location` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`business_type`) REFERENCES `business_type` (`id`),
  ADD CONSTRAINT `seller_type` FOREIGN KEY (`seller_type`) REFERENCES `seller_type` (`id`),
  ADD CONSTRAINT `sub_category` FOREIGN KEY (`product_sub_category`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`business_type`) REFERENCES `business_type` (`id`);

--
-- Constraints for table `video_content`
--
ALTER TABLE `video_content`
  ADD CONSTRAINT `video_content_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `video_content_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
