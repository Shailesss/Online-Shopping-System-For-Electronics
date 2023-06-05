-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2023 at 07:14 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `total` int NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `transaction_method` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transaction_id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`email`, `id`, `quantity`, `price`, `total`, `order_date`, `delivery_date`, `transaction_method`, `transaction_id`, `status`) VALUES
('shailesh@gmail.com', 2, 1, 5000, 5000, '2023-04-13', '2023-04-18', 'Cash On Delivery', 'TRNSID7857', 'delivered'),
('shailesh@gmail.com', 5, 5, 20000, 100000, '2023-04-14', '2023-04-19', 'Card Payment', 'TRNSID8314', 'delivered'),
('ketan@gmail.com', 3, 1, 20000, 20000, '2023-04-13', '2023-04-18', 'Card Payment', 'TRNSID7430', 'cancel'),
('shailesh@gmail.com', 2, 1, 5000, 5000, '2023-05-22', '2023-05-26', 'Cash On Delivery', 'TRNSID4677', 'in-process'),
('abhiram@gmail.com', 8, 3, 200, 600, '2023-04-14', '2023-04-19', 'Card Payment', 'TRNSID4065', 'delivered'),
('shailesh@gmail.com', 5, 5, 20000, 100000, '2023-04-14', '2023-04-19', 'Cash On Delivery', 'TRNSID9180', 'delivered'),
('prachi@gmail.com', 9, 1, 2000, 2000, '2023-04-14', '2023-04-19', 'Cash On Delivery', 'TRNSID5144', 'in-process'),
('prachi@gmail.com', 1, 1, 1000, 1000, '2023-04-14', '2023-04-19', 'Cash On Delivery', 'TRNSID6856', 'cancel'),
('prachi@gmail.com', 8, 1, 200, 200, '2023-04-14', '2023-04-19', 'UPI', 'TRNSID7163', 'delivered'),
('shailesh@gmail.com', 1, 1, 1000, 1000, '2023-04-14', '2023-04-19', 'Cash On Delivery', 'TRNSID9180', 'delivered'),
('shailesh@gmail.com', 4, 1, 10000, 10000, '2023-04-18', '2023-04-23', 'Cash On Delivery', 'TRNSID5208', 'in-process'),
('shailesh@gmail.com', 5, 1, 15000, 15000, '2023-04-18', '2023-04-23', 'Cash On Delivery', 'TRNSID9794', 'cancel'),
('shailesh@gmail.com', 3, 2, 80000, 40000, '2023-04-18', '2023-04-23', 'Cash On Delivery', 'TRNSID8126', 'in-process'),
('shailesh@gmail.com', 1, 1, 1000, 1000, '2023-04-18', '2023-04-23', 'Cash On Delivery', 'TRNSID3342', 'cancel'),
('shailesh@gmail.com', 5, 1, 15000, 15000, '2023-04-18', '2023-04-23', 'Cash On Delivery', 'TRNSID3342', 'cancel'),
('shailesh@gmail.com', 6, 3, 2000, 6000, '2023-04-18', '2023-04-23', 'Cash On Delivery', 'TRNSID1696', 'delivered'),
('shailesh@gmail.com', 6, 1, 2000, 2000, '2023-05-22', '2023-05-26', 'Cash On Delivery', 'TRNSID8203', 'in-process'),
('prachi@gmail.com', 3, 2, 80000, 40000, '2023-05-22', '2023-05-26', 'EMI', 'TRNSID5442', 'in-process'),
('prachi@gmail.com', 1, 1, 1000, 1000, '2023-05-22', '2023-05-26', 'EMI', 'TRNSID5442', 'in-process'),
('ndb@gmail.com', 1, 1, 1000, 1000, '2023-05-22', '2023-05-27', 'Cash On Delivery', 'TRNSID5849', 'in-process'),
('shailesh@gmail.com', 2, 1, 5000, 5000, '2023-05-31', '2023-06-05', 'Card Payment', 'TRNSID7985', 'in-process');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `first_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile_number` bigint NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pincode` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`first_name`, `last_name`, `mobile_number`, `email`, `password`, `address`, `city`, `state`, `pincode`) VALUES
('Pranav', 'Raje', 8806564294, 'pranav@gmail.com', '9e1135ff4157f14358c7c94c79aad47d', '', '', '', ''),
('Shailesh', 'Mestry', 7972382320, 'shailesh@gmail.com', 'f899139df5e1059396431415e770c6dd', 'Asha Apartment, Indiranagar, Chinchwad', 'Pune', 'Maharashtra', '411033'),
('Dhawal', 'Wani', 9422076443, 'dhawal@gmail.com', 'aa3fd34d71c92453a6988d5c63ea05cf', 'Shashwat Apartment, Premlok Park, Chinchwad', 'Pune', 'Maharashtra', '411033'),
('Harsha', 'Ranawade', 9639639630, 'harsha@gmail.com', '226280c5dd9b1bd4e67c72ff2c94bf1b', 'P - Town', 'Pune', 'Maharashtra', '411033'),
('Rashmika', 'Mandanna', 7537537530, 'rashmika@gmail.com', '8ed18e934ce625f95c7e32e5865908b0', 'Lovely-Heart Society, Premlok Park', 'Chinchwad', 'Maharashtra ', '411033'),
('Prachi', 'Dhiwar', 9373641348, 'prachi@gmail.com', '35cefbb0e86d4b7b1411a43e2f2ffc25', 'Sadanand Residency, Indiranagar, Chinchwad, near Mahadev Temple ', 'Pune', 'Maharashtra ', '411033'),
('Rutuja', 'More', 8805571002, 'rutuja@gmail.com', 'c271e652ab1502cb7817815faa4e8fe4', '', '', '', ''),
('Akanksha', 'Jodh', 9423429293, 'akanksha@gmail.com', '6a7579a42a10ecebb93cedbc79be85ca', '', '', '', ''),
('Abhiram', 'Nair', 7972331525, 'abhiram@gmail.com', '97d4d1108d306a25e70b102f5cfe7efd', 'QueensTown Apartment, Ravet ', 'Pune', 'Maharashtra', '411033'),
('Aman', 'Vishwakarma', 9765172838, 'aman.vishwakarma@gmail.com', 'ccda1683d8c97f8f2dff2ea7d649b42c', '', '', '', ''),
('Anand', 'Desai', 9380351069, 'anand@gmail.com', '8bda8e915e629a9fd1bbca44f8099c81', '', '', '', ''),
('Aniket', 'Bhosure', 8857099708, 'aniket@gmail.com', '9dbbae8b0159030ac238af0985c3ad65', '', '', '', ''),
('Anmol', 'Kulkarni', 8830481347, 'anmol@gmail.com', '6b974b8d0a6b6053d93553eb5e09ca57', '', '', '', ''),
('Arjun', 'Ghorpade', 9637828858, 'arjun.gorpade@gmail.com', '7626d28b710e7f9e98d9dfbe9bf0d123', '', '', '', ''),
('Manas', 'Tendulkar ', 9130121416, 'manastendulkar10@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'qwert', 'pune', 'Maharashtra ', '41057'),
('Yvette Black', 'Katell Quinn', 7972382320, 'kekunavu@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '', '', ''),
('Ketan', 'Mestry', 7777777777, 'ketan@gmailcom', 'cfcd208495d565ef66e7dff9f98764da', '', '', '', ''),
('Shailesh', 'Mestry', 7972382320, 'ketan@gmail.com', 'f899139df5e1059396431415e770c6dd', 'Flat No.3, B Wing, Asha Apartment, Indiranagar Chinchwad', 'Pune', 'Maharashtra', '411033'),
('Shailesh1', 'Mestry', 7972382320, 'shaileshmestry2020@gmail.com', 'f899139df5e1059396431415e770c6dd', '', '', '', ''),
('Shailesh', 'Mestry', 7972382320, 'shaileshmestry@gmail.com', 'cfcd208495d565ef66e7dff9f98764da', '', '', '', ''),
('11', '11', 7972382320, 'shail@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', '', '', '', ''),
('Dinesh', 'Chavan', 8888888888, 'dinesh@gmail.com', 'f899139df5e1059396431415e770c6dd', '', '', '', ''),
('Shailesh Mukund', 'Mestry', 8423684236, 'ganu@mail.com', 'cfcd208495d565ef66e7dff9f98764da', '', '', '', ''),
('g', 'Mestry', 7972382320, '096@gmail.com', 'f899139df5e1059396431415e770c6dd', '', '', '', ''),
('Alfonso Aguilar', 'Lev Ramos', 7972382320, 'dafupep@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '', '', ''),
('ndb', 'ndb', 7777777777, 'ndb@gmail.com', 'e4010cdc95d04c94900802abd1aaefd9', 'ndb', 'ndb', 'ndb', '411033');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `message_date` date NOT NULL,
  `subject` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `message_body` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `reply` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `email`, `message_date`, `subject`, `message_body`, `reply`) VALUES
(1, 'abhiram@gmail.com', '2023-04-14', 'Received damaged product', 'I ordered Trimmer but found package was broke already.', 'in process'),
(2, 'harsha@gmail.com', '2023-05-22', 'Received defected product', 'Ordered fridge but it was broken at bottom', 'in process'),
(3, 'prachi@gmail.com', '2023-05-22', 'Return product', 'I am unhappy with product. I want to return it', 'in process');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `transaction_id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_date` date NOT NULL,
  `total_price` int NOT NULL,
  `transaction_method` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`email`, `transaction_id`, `payment_date`, `total_price`, `transaction_method`) VALUES
('shailesh@gmail.com', 'TRNSID8314', '2023-04-14', 40000, 'Card Payment'),
('shailesh@gmail.com', 'TRNSID8314', '2023-04-14', 60000, 'Card Payment'),
('abhiram@gmail.com', 'TRNSID4065', '2023-04-14', 1500, 'Card Payment'),
('abhiram@gmail.com', 'TRNSID4065', '2023-04-14', 600, 'Card Payment'),
('prachi@gmail.com', 'TRNSID7163', '2023-04-14', 200, 'UPI'),
('shailesh@gmail.com', 'TRNSID9180', '2023-04-14', 100000, 'Cash On Delivery'),
('shailesh@gmail.com', 'TRNSID9180', '2023-04-14', 1000, 'Cash On Delivery'),
('shailesh@gmail.com', 'TRNSID7857', '2023-04-13', 5000, 'Cash On Delivery'),
('shailesh@gmail.com', 'TRNSID1696', '2023-04-18', 6000, 'Cash On Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `product_category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `product_stock` int NOT NULL,
  `image1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `image2` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `image3` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_category`, `price`, `product_stock`, `image1`, `image2`, `image3`) VALUES
(1, 'Sandisk Pen Drive 128 GB', 'Storage Device', 1000, 30, 'Product_1_A.jpg', 'Product_1_B.jpg', 'Product_1_C.jpg'),
(2, 'Bajaj Hair Dryer 1200watt', 'Grooming', 5000, 29, 'Product_2_A.jpg', 'Product_2_B.jpg', 'Product_2_C.jpg'),
(3, 'Apple Iphone 14', 'Mobile', 80000, 30, 'Product_3_A.jpg', 'Product_3_B.jpg', 'Product_3_C.jpg'),
(4, 'Voltas 5star Inverter AC', 'Air Conditioner', 10000, 30, 'Product_4_A.jpg', 'Product_4_B.jpg', 'Product_4_C.jpg'),
(5, 'Poco M5 Pro', 'Mobile', 15000, 30, 'Product_5_A.jpg', 'Product_5_B.jpg', 'Product_5_C.jpg'),
(6, 'Realme Buds 2', 'Headphone and Earphone', 2000, 27, 'Product_6_A.jpg', 'Product_6_B.jpg', 'Product_6_C.jpg'),
(7, 'Sandicks SD Card 64GB', 'Storage Device', 500, 30, 'Product_7_A.jpg', 'Product_7_B.jpg', 'Product_7_C.jpg'),
(8, 'Usha 1000 Table Fan', 'Fan', 10000, 30, 'Product_8_A.jpg', 'Product_8_B.jpg', 'Product_8_C.jpg'),
(9, 'RedGear Gaming Mouse', 'Computer Accessories ', 1000, 20, 'Product_9_A.jpg', 'Product_9_B.jpg', 'Product_9_C.jpg'),
(10, 'Canon Dslr', 'Camera', 2000, 20, 'Product_10_A.jpg', 'Product_10_B.jpg', 'Product_10_C.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
