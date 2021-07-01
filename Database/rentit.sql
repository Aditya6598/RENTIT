-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 10:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(2, 'Karena Kapoor', 'karena@gmail.com', 'khan123', 'Kareena.jpg', '077885221', 'India', 'Fashion Designer', ' opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. '),
(5, 'Salman', 'salman@gmail.com', 'salman', 'Salman-2.jpg', '33456693', 'India', 'Actor', '  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical  '),
(0, 'Aditya', 'aditya@gmail.com', 'aditya', '', '09869257738', 'India', 'Web Developer', 'Hello World'),
(0, 'Aditya', 'aditya@gmail.com', 'aditya', '', '09869257738', 'India', 'Web Developer', 'Hello World'),
(6, 'sunit', 'sunit@gmail.com', 'sunit', 'sunit', '000011112', 'India', 'Web developer', 'Hello World'),
(7, 'aditya', 'aditya@gmail.com', 'aditya', 'aditya', '98692', 'India', 'Web Developer ', 'Hello my name is Aditya Narkar ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `day` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Camera', 'A camera is an optical instrument used to capture an image. At their most basic, cameras are sealed boxes (the camera body) with a small hole (the aperture) that allows light in to capture an image on a light-sensitive surface (usually photographic film or a digital sensor).'),
(2, 'House', 'A home appliance, also referred to as a domestic appliance, an electric appliance or a household appliance, is a machine which assists in household functions such as cooking, cleaning and food preservation.'),
(3, 'Furniture', 'Furniture refers to movable objects intended to support various human activities such as seating (e.g., chairs, stools, and sofas), eating (tables), and sleeping (e.g., beds)'),
(4, 'Office', 'A long-term asset account reported on the balance sheet under the heading of property, plant, and equipment. Included in this account would be copiers, computers, printers, fax machines, etc.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(100) NOT NULL,
  `customer_address` int(100) NOT NULL,
  `customer_image` int(100) NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Aditya', 'aditya@gmail.com', 'aditya', 'India', 'MUMBAI', '123456789', 62, 0, 0),
(2, 'Aditya Narkar', 'aditya@gmail.com', 'aditya', 'India', 'MUMBAI', '123465', 6, 0, 0),
(3, 'Sunit Choce', 'sunit@gmail.com', 'sunit', 'India', 'sunit', 'sunit', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `due_amout` int(100) NOT NULL,
  `invoice_no` text NOT NULL,
  `qty` text NOT NULL,
  `day` text NOT NULL,
  `order_date` int(11) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `inovice_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` text NOT NULL,
  `day` text NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES
(1, 1, 1, '2021-04-10 09:39:23', 'Canon 700D ', 'canon7001.jpg', 'canon7002.jpg', 'canon7003.jpg', 45000, '', 0),
(4, 1, 1, '2021-04-10 10:38:40', 'Canon 1300D', 'canon1300D.jpg', 'canon1300d2.jpg', '', 2000, '', 0),
(5, 2, 1, '2021-04-10 11:01:37', 'Nikon D3500', 'Nikon2.jpg', '', '', 20000, '', 0),
(6, 3, 2, '2021-04-10 11:03:57', 'Carrier AC', 'ac_Carrier.jpg', '', '', 8000, '', 0),
(7, 3, 2, '2021-04-10 14:54:46', 'LG Ac', 'ac_LG.jpg', '', '', 9000, '', 0),
(8, 3, 2, '2021-04-10 14:55:32', 'Bajaj ', 'BajajFan1.jpg', '', '', 500, '', 0),
(9, 3, 2, '2021-04-10 14:56:13', 'Orient Fans', 'Orient.jpg', '', '', 950, '', 0),
(10, 6, 4, '2021-04-10 14:57:16', 'Lotus Chairs', 'lotus.jpg', '', '', 200, '', 0),
(11, 6, 3, '2021-04-10 14:58:21', 'Tayyaba', 'tayyaba.jpg', '', '', 1500, '', 0),
(13, 7, 4, '2021-04-10 15:02:08', 'Canon Printer ', 'canon.jpg', '', '', 3000, '', 0),
(14, 7, 4, '2021-04-10 15:02:59', 'HP', 'hp.jpg', '', '', 6000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Canon', 'Canon EOS (Electro-Optical System) is an autofocus single-lens reflex camera (SLR) and mirrorless camera series produced by Canon Inc. Introduced in 1987 with the Canon EOS 650, all EOS cameras used 35 mm film until October 1996 when the EOS IX was released using the new and short-lived APS film.'),
(2, 'Nikon', 'Nikon\'s products include cameras, camera lenses, binoculars, microscopes, ophthalmic lenses, measurement instruments, rifle scopes, spotting scopes, and the steppers used in the photolithography steps of semiconductor fabrication, of which it is the world\'s second largest manufacturer.'),
(3, 'Fans', 'A fan is a powered machine used to create a flow of air. A fan consists of a rotating arrangement of vanes or blades, which act on the air.'),
(4, 'Tv', 'Telegram television (also known as a TV) is a machine with a screen. Televisions receive broadcasting signals and change them into pictures and sound.'),
(5, 'Tables', 'Here are some adjectives for dining-tables: more deal, french-polished, broad deal, such long, comfortable little, deal, nice little, decorative, heavy, past, long, low, public, common.'),
(6, 'Chairs', 'scarlet swivel, austere high-backed, large easy, big easy, favorite easy, comfortable easy, single, straight-backed, deep easy, own high-backed, single straight-backed, squeaky swivel, oversized swivel, conspicuously human, simple straight-backed, swivel, huge easy, capacious stony,'),
(7, 'Printer', 'A printer is a device that accepts text and graphic output from a computer and transfers the information to paper, usually to standard size sheets of paper.'),
(8, 'Projector', 'A projector or image projector is an optical device that projects an image (or moving images) onto a surface, commonly a projection screen.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(225) DEFAULT NULL,
  `slide_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide Number 1', '1.jpg'),
(2, 'Slide Number 2', '2.jpg'),
(3, 'Slider Number 3\r\n', '3.jpg'),
(4, 'Slider Number 4', '4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
