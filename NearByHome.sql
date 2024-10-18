-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2024 at 07:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `NearByHome` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `NearByHome`;




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `NearByHome`
--

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `address_id` varchar(40) NOT NULL,
  `user_id` varchar(40) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`address_id`, `user_id`, `province`, `district`, `zip_code`, `phone_number`, `address`) VALUES
('5172b890aaca4970b26f49d459d5525f', '123', 'malabe ', 'malabe', '123443', '4324234324', 'thisd jui kadjf');

-- --------------------------------------------------------

--
-- Table structure for table `Liked`
--

CREATE TABLE `Liked` (
  `like_id` varchar(40) NOT NULL,
  `user_id` varchar(40) DEFAULT NULL,
  `product_id` varchar(40) DEFAULT NULL,
  `status` varchar(10) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Liked`
--

INSERT INTO `Liked` (`like_id`, `user_id`, `product_id`, `status`) VALUES
('0b1d9ade3dd04e19be18a071869a0ce9', '123', 'fsdfsdfdsfdsfasdweerdsf', 'liked'),
('0c118459f6524f788c6e0d46060ad881', '123', '8j-9k0l-1m2n3o4p5q6r', 'liked'),
('0db59e234fa94ac9b17c7e4404601030', '123', '-66y67z-68a69b70c71d', 'liked'),
('400bbff63cad451a9d790ae47f781462', '123', '-81n82o-83p84q85r86s', 'liked'),
('636381bac22548888f7504d951a7510c', '123', '-74g7cfff77j78k79l', 'liked'),
('694fb45adba14b9f87a2ffdca1b9c3f9', '123', '-02i03j-04k05l06m07n', 'liked'),
('b59730a636a34b509d0da8d0865edfd1', '123', '8h-9i0j-1k2l3m4n5o6r', 'liked'),
('b6cb0da0e1e24c41854e8e371276fe6f', '123', '-00g01h-02i03j04k05l', 'liked'),
('c72a0c45b4c34692816a5a9625c504dd', '123', '6h-7i8j-9k0l1m2n3o4p', 'liked'),
('ca68c560141f4a20a1534afe2856d2b2', '123', '-82o83p-84q85r86s87t', 'liked'),
('e44ae67831624c0db03a8bc8c62fe5fa', '123', '6p-7q8r-9s0t1u2v3w4x', 'liked'),
('f22937aed106483ea619ea7b61f4ed8b', '123', '-01h02i-03j04k05l06m', 'liked');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` varchar(40) NOT NULL,
  `user_id` varchar(40) DEFAULT NULL,
  `product_id` varchar(40) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` enum('Pending','Shipped','Delivered','Cancelled') NOT NULL DEFAULT 'Pending',
  `oder_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `quntity` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`order_id`, `user_id`, `product_id`, `total`, `price`, `status`, `oder_date`, `quntity`) VALUES
('322f6e9c5cd94c6ba50dde061d28c0c8', '123', '-01h02i-03j04k05l06m', 402.00, 70.00, 'Pending', '2024-10-18 18:08:51', 4),
('0dfd96da288d45149e79eb3944097f7c', '123', '-75h76i-77j78k79l80m', 208.50, 65.00, 'Shipped', '2024-10-18 18:09:12', 1),
('4f9eef85428f41d79bdb916d0c949058', '123', '-73f74g-75h76i77j78k', 555.00, 150.00, 'Cancelled', '2024-10-18 18:09:35', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `product_id` varchar(40) NOT NULL,
  `user_id` varchar(40) DEFAULT NULL,
  `category` enum('Electronics','Fashion','Home Garden','Mobile Phones','Laptops','Cameras','Men''s Clothing','Women''s Clothing','Shoes','Furniture') NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `conditio` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imageUrl` varchar(500) NOT NULL DEFAULT 'https://b2861582.smushcdn.com/2861582/wp-content/uploads/2023/02/splash-01-605-v1.png?lossy=2&strip=1&webp=1',
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`product_id`, `user_id`, `category`, `title`, `description`, `price`, `stock`, `conditio`, `created_at`, `imageUrl`, `discount`) VALUES
('-00g01h-02i03j04k05l', '123', 'Men\'s Clothing', 'Men\'s Suit Jacket', 'Classic suit jacket for formal events.', 150.00, 12, 'New', '2024-10-16 04:31:15', 'init/initimage/img15.webp', 10),
('-01h02i-03j04k05l06m', '123', 'Women\'s Clothing', 'Summer Dress', 'Lightweight summer dress with floral patterns.', 70.00, 25, 'New', '2024-10-16 04:31:15', 'init/initimage/img21.jpeg', 10),
('-02i03j-04k05l06m07n', '123', 'Shoes', 'Running Shoes', 'High-performance running shoes for athletes.', 90.00, 18, 'New', '2024-10-16 04:31:15', 'init/initimage/img22.webp', 10),
('-03j04k-05l06m07n08o', '123', 'Furniture', 'Coffee Table', 'Elegant coffee table with a glass top.', 100.00, 15, 'New', '2024-10-16 04:31:15', 'init/initimage/img32.jpg', 10),
('-04k05l-06m07n08o09p', '123', 'Electronics', 'Noise-Canceling Headphones', 'Headphones with active noise-canceling technology.', 130.00, 20, 'New', '2024-10-16 04:31:15', 'init/initimage/img47.jpg', 10),
('-55w56x-57y58z59a60b', '123', 'Electronics', 'Portable Power Bank', 'High-capacity power bank for all devices.', 29.00, 60, 'New', '2024-10-16 04:31:15', 'init/initimage/img3.jpeg', 10),
('-65x66y-67z68a69b70c', '123', 'Fashion', 'Leather Wallet', 'Genuine leather wallet with multiple compartments.', 49.00, 45, 'New', '2024-10-16 04:31:15', 'init/initimage/img49.webp', 10),
('-66y67z-68a69b70c71d', '123', 'Home Garden', 'Ceramic Vase', 'Handcrafted ceramic vase with a modern design.', 35.00, 30, 'New', '2024-10-16 04:31:15', 'init/initimage/img39.jpg', 10),
('-68a69b-70c71d72e73f', '123', 'Laptops', 'Laptop Sleeve', 'Protective laptop sleeve with waterproof fabric.', 39.00, 18, 'New', '2024-10-16 04:31:15', 'init/initimage/img27.jpg', 10),
('-69b70c-71d72e73f74g', '123', 'Cameras', 'DSLR Camera Bag', 'Compact and durable camera bag with multiple pockets.', 65.00, 22, 'New', '2024-10-16 04:31:15', 'init/initimage/img11.jpeg', 10),
('-70c71d-72e73f74g75h', '123', 'Men\'s Clothing', 'Men\'s Polo Shirt', 'Comfortable and stylish polo shirt for casual wear.', 25.00, 35, 'New', '2024-10-16 04:31:15', 'init/initimage/img45.jpeg', 10),
('-71d72e-73f74g75h76i', '123', 'Women\'s Clothing', 'Women\'s Winter Coat', 'Warm and stylish coat for the winter season.', 120.00, 15, 'New', '2024-10-16 04:31:15', 'init/initimage/img17.jpg', 10),
('-72e73f-74g75h76i77j', '123', 'Shoes', 'Hiking Boots', 'Durable and comfortable boots for outdoor activities.', 85.00, 28, 'New', '2024-10-16 04:31:15', 'init/initimage/img26.jpeg', 10),
('-73f74g-75h76i77j78k', '123', 'Furniture', 'Adjustable Office Chair', 'Ergonomic office chair with adjustable height and back support.', 150.00, 12, 'New', '2024-10-16 04:31:15', 'init/initimage/img36.jpg', 10),
('-74g7cfff77j78k79l', '123', 'Electronics', 'Smart Light Bulbs', 'Wi-Fi enabled light bulbs with color-changing features.', 45.00, 50, 'New', '2024-10-16 04:31:15', 'init/initimage/img2.jpeg', 10),
('-75h76i-77j78k79l80m', '123', 'Fashion', 'Sunglasses', 'UV protection sunglasses with polarized lenses.', 65.00, 40, 'New', '2024-10-16 04:31:15', 'init/initimage/img50.jpg', 10),
('-76i77j-78k79l80m81n', '123', 'Home Garden', 'Outdoor Patio Set', 'Durable and stylish patio set for outdoor lounging.', 250.00, 8, 'New', '2024-10-16 04:31:15', 'init/initimage/img38.jpg', 10),
('-77j78k-79l80m81n82o', '123', 'Mobile Phones', 'Screen Protector', 'Tempered glass screen protector for smartphones.', 15.00, 100, 'New', '2024-10-16 04:31:15', 'init/initimage/img6.jpeg', 10),
('-79l80m-81n82o83p84q', '123', 'Cameras', 'Camera Lens Cleaner Kit', 'Complete kit for cleaning camera lenses.', 20.00, 65, 'New', '2024-10-16 04:31:15', 'init/initimage/img14.jpg', 10),
('-80m81n-82o83p84q85r', '123', 'Men\'s Clothing', 'Men\'s Chino Pants', 'Casual chino pants with a slim fit.', 45.00, 50, 'New', '2024-10-16 04:31:15', 'init/initimage/img44.webp', 10),
('-81n82o-83p84q85r86s', '123', 'Women\'s Clothing', 'Women\'s Handbag', 'Elegant handbag with multiple compartments.', 75.00, 20, 'New', '2024-10-16 04:31:15', 'init/initimage/img20.jpg', 10),
('-82o83p-84q85r86s87t', '123', 'Shoes', 'Casual Sneakers', 'Comfortable sneakers for everyday wear.', 55.00, 50, 'New', '2024-10-16 04:31:15', 'init/initimage/img25.webp', 10),
('-83p84q-85r86s87t88u', '123', 'Furniture', 'Modern Bookshelf', 'Sleek and stylish bookshelf with ample storage space.', 130.00, 10, 'New', '2024-10-16 04:31:15', 'init/initimage/img35.webp', 10),
('-84q85r-86s87t88u89v', '123', 'Electronics', 'Smartwatch', 'Feature-rich smartwatch with fitness tracking.', 199.00, 15, 'New', '2024-10-16 04:31:15', 'init/initimage/img4.jpeg', 10),
('-85r86s-87t88u89v90w', '123', 'Fashion', 'Designer Belt', 'Stylish belt with high-quality buckle.', 60.00, 25, 'New', '2024-10-16 04:31:15', 'init/initimage/img51.jpg', 10),
('-86s87t-88u89v90w91x', '123', 'Home Garden', 'Garden Tools Set', 'Complete set of essential garden tools.', 85.00, 35, 'New', '2024-10-16 04:31:15', 'init/initimage/img42.jpeg', 10),
('-87t88u-89v90w91x92y', '123', 'Mobile Phones', 'Phone Charger', 'Fast-charging phone charger with multiple connectors.', 25.00, 60, 'New', '2024-10-16 04:31:15', 'init/initimage/img9.avif', 10),
('-88u89v-90w91x92y93z', '123', 'Laptops', 'Laptop Bag', 'Spacious laptop bag with ergonomic shoulder straps.', 55.00, 25, 'New', '2024-10-16 04:31:15', 'init/initimage/img31.jpeg', 10),
('-89v90w-91x92y93z94a', '123', 'Cameras', 'Camera Battery', 'Rechargeable battery for digital cameras.', 30.00, 40, 'New', '2024-10-16 04:31:15', 'init/initimage/img13.webp', 10),
('-90w91x-92y93z94a95b', '123', 'Men\'s Clothing', 'Men\'s Dress Shirt', 'Elegant dress shirt suitable for formal occasions.', 50.00, 22, 'New', '2024-10-16 04:31:15', 'init/initimage/img43.jpeg', 10),
('-91x92y-93z94a95b96c', '123', 'Women\'s Clothing', 'Women\'s Sunglasses', 'Trendy sunglasses with UV protection.', 40.00, 30, 'New', '2024-10-16 04:31:15', 'init/initimage/img19.jpeg', 10),
('-92y93z-94a95b96c97d', '123', 'Shoes', 'Formal Loafers', 'Stylish loafers suitable for formal events.', 75.00, 20, 'New', '2024-10-16 04:31:15', 'init/initimage/img23.jpg', 10),
('-93z94a-95b96c97d98e', '123', 'Furniture', 'Dining Table Set', 'Elegant dining table set with six chairs.', 300.00, 6, 'New', '2024-10-16 04:31:15', 'init/initimage/img34.webp', 10),
('-94a95b-96c97d98e99f', '123', 'Electronics', 'Bluetooth Speaker', 'Portable Bluetooth speaker with high-quality sound.', 80.00, 25, 'New', '2024-10-16 04:31:15', 'init/initimage/img46.jpg', 10),
('-95b96c-97d98e99f001', '123', 'Fashion', 'Wristwatch', 'Elegant wristwatch with a leather strap.', 120.00, 18, 'New', '2024-10-16 04:31:15', 'init/initimage/img52.jpeg ', 10),
('-96c97d-98e99f00g01h', '123', 'Home Garden', 'Patio Umbrella', 'Large patio umbrella with UV protection.', 85.00, 20, 'New', '2024-10-16 04:31:15', 'init/initimage/img40.jpg', 10),
('-97d98e-99f00g01h02i', '123', 'Mobile Phones', 'Phone Case', 'Durable phone case with shock absorption.', 20.00, 55, 'New', '2024-10-16 04:31:15', 'init/initimage/img7.webp', 10),
('-98e99f-00g01h02i03j', '123', 'Laptops', 'Laptop Cooling Pad', 'Cooling pad for laptops with adjustable fans.', 40.00, 35, 'New', '2024-10-16 04:31:15', 'init/initimage/img30.jpeg', 10),
('-99f00g-01h02i03j04k', '123', 'Cameras', 'Camera Tripod', 'Adjustable tripod for stable camera shots.', 45.00, 25, 'New', '2024-10-16 04:31:15', 'init/initimage/img12.jpg', 10),
('0j-1k2l-3m4n5o6p7q8r', '123', 'Home Garden', 'Modern Floor Lamp', 'Bright and energy-efficient lighting.', 85.00, 10, 'New', '2024-10-16 04:31:15', 'init/initimage/img40.jpg', 10),
('1k-2l3m-4n5o6p7q8r9s', '123', 'Mobile Phones', 'Smartphone Protective Case', 'Durable case with shock absorption.', 19.00, 50, 'New', '2024-10-16 04:31:15', 'init/initimage/img5.jpeg', 10),
('2l-3m4n-5o6p7q8r9s0t', '123', 'Laptops', 'Laptop Cooling Pad', 'Keeps your laptop cool during intensive use.', 45.00, 25, 'New', '2024-10-16 04:31:15', 'init/initimage/img28.jpg', 10),
('3m-4n5o-6p7q8r9s0t1u', '123', 'Cameras', 'Digital Camera Tripod', 'Lightweight and portable tripod.', 55.00, 18, 'New', '2024-10-16 04:31:15', 'init/initimage/img10.jpg', 10),
('4n-5o6p-7q8r9s0t1u2v', '123', 'Men\'s Clothing', 'Men\'s Denim Jacket', 'Classic fit denim jacket with button closure.', 65.00, 30, 'New', '2024-10-16 04:31:15', 'init/initimage/img16.jpg', 10),
('5o-6p7q-8r9s0t1u2v3w', '123', 'Women\'s Clothing', 'Women\'s Summer Dress', 'Lightweight and breathable fabric.', 35.00, 40, 'New', '2024-10-16 04:31:15', 'init/initimage/img18.webp', 10),
('6h-7i8j-9k0l1m2n3o4p', '123', 'Fashion', 'Leather Wallet', 'Genuine leather wallet with multiple compartments.', 45.00, 40, 'New', '2024-10-16 04:31:15', 'init/initimage/img53.webp', 10),
('6p-7q8r-9s0t1u2v3w4x', '123', 'Shoes', 'Running Shoes', 'Comfortable running shoes with great support.', 70.00, 22, 'New', '2024-10-16 04:31:15', 'init/initimage/img24.jpg', 10),
('7i-8j9k-0l1m2n3o4p5q', '123', 'Home Garden', 'Outdoor Lantern', 'Durable lantern suitable for outdoor use.', 60.00, 25, 'New', '2024-10-16 04:31:15', 'init/initimage/img41.webp', 10),
('7q-8r9s-0t1u2v3w4x5y', '123', 'Furniture', 'Wooden Coffee Table', 'Stylish and sturdy coffee table.', 95.00, 8, 'New', '2024-10-16 04:31:15', 'init/initimage/img37.jpeg', 10),
('8h-9i0j-1k2l3m4n5o6r', '123', 'Electronics', 'Wireless Bluetooth Speaker', 'High-quality sound with deep bass.', 75.00, 15, 'New', '2024-10-16 04:31:15', 'init/initimage/img1.webp', 10),
('8j-9k0l-1m2n3o4p5q6r', '123', 'Mobile Phones', 'Wireless Earbuds', 'Compact wireless earbuds with excellent sound quality.', 90.00, 30, 'New', '2024-10-16 04:31:15', 'init/initimage/img8.avif', 10),
('9i-0j1k-2l3m4n5o6p7q', '123', 'Fashion', 'Men\'s Casual Watch', 'Stylish wristwatch with leather band.', 120.00, 20, 'New', '2024-10-16 04:31:15', 'init/initimage/img48.jpg', 10),
('fsdfsdfdsfdsfasdweerdsf', '123', 'Laptops', 'Laptop Stand', 'Adjustable stand for laptops with cooling features.', 29.00, 40, 'New', '2024-10-16 04:31:15', 'init/initimage/img29.webp', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `review_id` varchar(40) NOT NULL,
  `product_id` varchar(40) DEFAULT NULL,
  `user_id` varchar(40) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `uname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`review_id`, `product_id`, `user_id`, `rating`, `comment`, `review_date`, `uname`) VALUES
('5a94517784c8448bbbc54d5a93ebd174', '-01h02i-03j04k05l06m', NULL, 4, 'atfdfsadfdx', '2024-10-16 04:33:38', '123'),
('16114ffb36f24f6c8275ae31c12cd5a9', '-01h02i-03j04k05l06m', '123', 4, 'regdsdffs', '2024-10-16 05:05:32', 'sanam');

-- --------------------------------------------------------

--
-- Table structure for table `SystemFeedback`
--

CREATE TABLE `SystemFeedback` (
  `feedback_id` varchar(40) NOT NULL,
  `user_id` varchar(40) DEFAULT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SystemFeedback`
--

INSERT INTO `SystemFeedback` (`feedback_id`, `user_id`, `comment`) VALUES
('0f7b092e19b644eaa281743d2a4a53d1', '123', 'this '),
('07c77f239bac463bb8af3333e4542a7c', '123', 'nice'),
('064b06007e284a2da052d86a1e541656', '123', 'this is good for new user\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `email`, `password_hash`, `name`, `role`) VALUES
('123', 'shrestha288@gmail.com', '$2y$10$.ms3UaDXeOeixTLAgmuNRexr2hyeVdpT7sibbnQZ8sw1Istx9Vokm', 'sanam', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Liked`
--
ALTER TABLE `Liked`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `orders_ibfk_2` (`product_id`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `SystemFeedback`
--
ALTER TABLE `SystemFeedback`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Liked`
--
ALTER TABLE `Liked`
  ADD CONSTRAINT `liked_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `liked_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `SystemFeedback`
--
ALTER TABLE `SystemFeedback`
  ADD CONSTRAINT `systemfeedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
