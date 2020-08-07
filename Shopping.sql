-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 05:37 PM
-- Server version: 5.6.21
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `Category_id` int(10) NOT NULL,
  `Category` varchar(45) NOT NULL,
  `Description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Category_id`, `Category`, `Description`) VALUES
(1, 'Electronic', 'Cell Phone'),
(2, 'Electronic', 'Laptop'),
(3, 'Electronic', 'Monitor'),
(4, 'Electronic', 'Earphone'),
(9, 'Electronic', 'Other'),
(11, 'Book', 'Textbook'),
(12, 'Book', ' Novel'),
(13, 'Book', 'Magazine'),
(19, 'Book', 'Other'),
(21, 'Furniture', 'Lamp'),
(22, 'Furniture', 'Desk'),
(23, 'Furniture', 'Chair'),
(24, 'Furniture', 'Sofa'),
(29, 'Furniture', 'Other'),
(31, 'Clothes', 'T-shirt'),
(32, 'Clothes', 'Pants');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `Account_number` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zipcode` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`Account_number`, `password`, `firstName`, `lastName`, `email`, `phone`, `address`, `city`, `state`, `zipcode`) VALUES
('admin', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('andy12012', 'Andyfu8423', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Bob123', '123456', 'Bob', 'Lin', 'Bob123@gmail.com', '3213212345', '1233 Palm Bay Road', 'Lanm', 'MO', 31342),
('ccheng2019', 'ccheng2019', 'Chris', 'Cheng', 'ccheng2019@my.fit.edu', '3214021293', '1931 Cleveland ST Ne', 'Palm Bay', 'FL', 32905),
('Chris1234', 'wang222', 'Chris', 'Wang', 'cwang2019@my.fit.edu', '3214234823', '2312 Melbran ST', 'Orlando', 'FL', 34290),
('John123', '2345', 'John', 'Wang', 'John123@gmail.com', '3241234567', '3213 Malaba St', 'Lincond', 'MD', 63424),
('s8604561', '123456', 'Andy', 'Yang', 's8604561@gmail.com', '3214054978', '1931 lamb Road', 'Orlando', 'FL', 32323),
('test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('test1', '12345', 'Test', 'T', 'test@admin.com', '123456788', '123 main st', 'Melbourne', 'FL', 32901),
('wan123', 'yang222', 'Wan', 'Lin', 'Wan123@gmail.com', '3214934852', '2314 Main St', 'Orlando', 'FL', 32315),
('wyang2019', '123456', 'Wan Yu', 'Yang', 'wyang2019@gmail.com', '3214054921', '1931 cleveland st ne', 'Palm Bay', 'FL', 32905);

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetail`
--

CREATE TABLE `OrderDetail` (
  `OrderId` int(10) NOT NULL,
  `Account_number` varchar(45) NOT NULL,
  `Product_id` int(10) NOT NULL,
  `Amount` int(5) NOT NULL,
  `Shipping_address` varchar(255) NOT NULL,
  `Shipping_city` varchar(50) NOT NULL,
  `Shipping_state` varchar(50) NOT NULL,
  `Shipping_zipcode` int(5) NOT NULL,
  `OrderDate` date NOT NULL,
  `DeliveryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `OrderDetail`
--

INSERT INTO `OrderDetail` (`OrderId`, `Account_number`, `Product_id`, `Amount`, `Shipping_address`, `Shipping_city`, `Shipping_state`, `Shipping_zipcode`, `OrderDate`, `DeliveryDate`) VALUES
(8, 'Chris1234', 7, 1, '2312 MELBRAN ST', 'ORLANDO', 'FL', 34290, '2020-06-23', '2020-06-29'),
(9, 's8604561', 12, 2, '1931 LAMB ROAD', 'ORLANDO', 'FL', 32323, '2020-06-24', '2020-07-04'),
(10, 'wan123', 8, 1, '2314 MAIN ST', 'ORLANDO', 'FL', 32315, '2020-06-28', '2020-07-08'),
(11, 'wan123', 11, 3, '2314 MAIN ST', 'ORLANDO', 'FL', 32315, '2020-06-28', '2020-07-08'),
(13, 'ccheng2019', 12, 1, '1931 CLEVELAND ST NE', 'PALM BAY', 'FL', 32905, '2020-06-28', '2020-07-08'),
(14, 's8604561', 7, 1, '1931 LAMB ROAD', 'ORLANDO', 'FL', 32323, '2020-06-30', '2020-07-10'),
(16, 'ccheng2019', 9, 1, '1931 CLEVELAND ST NE', 'PALM BAY', 'FL', 32905, '2020-07-02', '2020-07-12'),
(17, 'ccheng2019', 7, 1, '1931 CLEVELAND ST NE', 'PALM BAY', 'FL', 32905, '2020-07-02', '2020-07-12'),
(18, 's8604561', 12, 1, '1931 LAMB ROAD', 'ORLANDO', 'FL', 32323, '2020-07-07', '2020-07-17'),
(24, 'ccheng2019', 7, 1, '1931 CLEVELAND ST NE', 'PALM BAY', 'FL', 32905, '2020-07-17', '2020-07-27'),
(25, 'ccheng2019', 10, 2, '1931 CLEVELAND ST NE', 'PALM BAY', 'FL', 32905, '2020-07-17', '2020-07-27'),
(26, 'John123', 23, 1, '3213 MALABA ST', 'LINCOND', 'MD', 63424, '2020-07-25', '2020-08-04'),
(27, 'John123', 21, 1, '3213 MALABA ST', 'LINCOND', 'GA', 63424, '2020-07-25', '2020-08-04'),
(28, 'ccheng2019', 8, 1, '1931 CLEVELAND ST NE', 'PALM BAY', 'FL', 32905, '2020-07-26', '2020-08-05'),
(29, 'John123', 9, 1, '3213 MALABA ST', 'LINCOND', 'MD', 63424, '2020-07-26', '2020-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `Product_id` int(10) NOT NULL,
  `Product_name` varchar(127) NOT NULL,
  `Product_description` varchar(999) NOT NULL,
  `Product_price` decimal(10,2) NOT NULL,
  `Product_amount` int(5) NOT NULL,
  `Category_id` int(10) NOT NULL,
  `Product_status` int(1) NOT NULL,
  `account_number` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`Product_id`, `Product_name`, `Product_description`, `Product_price`, `Product_amount`, `Category_id`, `Product_status`, `account_number`) VALUES
(7, 'Iphone11', 'New/ 64GB/ White/ ', '640.00', 0, 1, 0, 'andy12012'),
(8, 'Collection Black Opal File Desk ', 'Condition:Used SIX drawers/ L/W/H:62/24/30\r\nMaterial:Wood', '500.00', 0, 22, 0, 's8604561'),
(9, 'Java How to Program, Early Objects by Harvey Deitel and Paul Deitel ', 'ISBN: 9780134743356Condition: Like New: A book that looks new but has been read. Cover has no visible wear, and the dust jacket (if applicable) is included for hard covers. No missing or damaged pages, no creases or tears, and no underlining/highlighting of text or writing in the margins. May be very minimal identifying marks on the inside cover. Very minimal wear and tear. See the sellers listing for full details and description of any imperfections', '55.20', 1, 11, 1, 'wan123'),
(10, 'EVANGELION UT (SHORT-SLEEVE GRAPHIC T-SHIRT)(M)', 'o celebrate the release of ', '12.33', 6, 31, 1, 'wan123'),
(11, 'Operating System Concepts - Hardcover By Silberschatz, Abraham', 'Condition: Very Good: A book that does not look new and has been read but is in excellent condition. No obvious damage to the cover, with the dust jacket (if applicable) included for hard covers. No missing or damaged pages, no creases or tears, and no underlining/highlighting of text or writing in the margins. May be very minimal identifying marks on the inside cover. Very minimal wear and tear. See the seller’s listing for full details and description of any imperfections.\r\nISBN: 9781118112731', '21.00', 2, 11, 1, 'Chris1234'),
(12, 'Cycle Sport Magazine 1999 (9) Issues', 'Very Good: A book that does not look new and has been read but is in excellent condition. No obvious damage to the cover, with the dust jacket (if applicable) included for hard covers. No missing or damaged pages, no creases or tears, and no underlining/highlighting of text or writing in the margins. May be very minimal identifying marks on the inside cover. Very minimal wear and tear. See the sellerï¿½s listing for full details and description of any imperfections', '22.23', 1, 13, 1, 'wan123'),
(13, 'sofa set living room used', '\r\nCondition:	\r\nUsed: An item that has been used previously. The item may have some signs of cosmetic wear, but is fully operational and functions as intended. This item may be a floor model or store return that has been used. See the seller’s listing for full details and description of any imperfections\r\nMaterial:	Fabric\r\nColor:	Gray', '480.00', 1, 24, 1, 'Chris1234'),
(14, '24 Inch monitor', '\r\nCondition:	\r\nUsed: An item that has been used previously. The item may have some signs of cosmetic wear, but is fully operational and functions as intended. This item may be a floor model or store return that has been used. See the seller’s listing for full details and description of any imperfections. ', '29.88', 1, 3, 1, 'andy12012'),
(15, 'Acer Chromebook Spin 11 Intel Celeron N3350 1.10GHz 4GB Ram 32GB Flash Chrome OS', 'this item is Manufacturer Refurbished. It has been professionally restored by an Acer approved vendor and comes with a 90 day manufacturer warranty. Units are usually cosmetically indistinguishable from New products, but some may show signs of light use. Functionally, these units are equivalent to New. Manufacturer Refurbished units may be shipped in non-retail packaging.ï¿½', '189.45', 3, 2, 1, 'wan123'),
(21, 'HeadPhone', 'Used/ EXCELLENT CONDITION. Fully Functional. Authentic Beats POWERBEATS PRO coming with Accessories and Warranty.', '129.99', 0, 4, 0, 'ccheng2019'),
(22, 'Ergonomic Black Height Adjustable Standing Desk Sit Stand Elevating Riser Desk ', 'Used. An item that has been used previously. The item may have some signs of cosmetic wear, but is fully operational and functions as intended. This item may be a floor model or store return that has been used. See the sellerâ€™s listing for full details and description of any imperfections.  Item Height Lowest 7', '109.99', 1, 22, 1, 'ccheng2019'),
(23, 'Honeywell HT-900 TurboForce Air Circulator Fan Black', 'Small Fan for Table or Floor:The Honeywell Turbo Force Air Circulator Fan has 3 speeds & a 90 degree pivoting head. This quiet fan is compact enough for on a table or wall mount & powerful enough to help provide comfortable cooling in small-medium rooms.', '14.92', 4, 9, 1, 's8604561'),
(24, 'Contemporary modern velvet sleeper futon sofa mid century L shape couch black ', ' Condition:	 Used: An item that has been used previously. The item may have some signs of cosmetic wear, but is fully operational and functions as intended. This item may be a floor model or store return that has been used. See the sellerâ€™s listing for full details and description of any imperfections.', '266.67', 1, 24, 1, 's8604561'),
(28, 'Apple Macbook 13 White Unibody 2009 2.26GHz 4GB 250GB OS X 10.13. High Sierra', 'Used: An item that has been used previously. The item may have some signs of cosmetic wear, but is fully operational and functions as intended. This item may be a floor model or store return that has been used. See the sellerâ€™s listing for full details and description of any imperfections. ', '200.00', 1, 2, 1, 's8604561'),
(29, 'AmazonBasics HL-002566 Mid-Back Office Chair - Black', 'Functions as intended. Does not appear to have been used. (2) arms (1) seat (1) back (1) hardware set (1) hydraulic stand (5) wheels (1) base (1) lever. Opened manufacturer packaging. Color: Black PLEASE SEE PHOTOS FOR WHAT IS INCLUDED. Please do NOT ASSUME an item is included if it is not in the photo', '80.45', 1, 23, 1, 'John123'),
(30, 'Samsung 28 U28E590D 4K (3840x2160) resolution UHD Computer Monitor - free ship', 'All product is used. Equipment is NOT refurbished. Each unit comes with 30 day warranty, Pictures are of actual equipment. Items will have scratches, nicks, small dents associated with rental equipment, We will ship 3-5 days after order is placed. We are a rental company based in Buffalo Grove, IL. We sell off excess rental equipment when customers are done with it. We stand behind all our product', '130.22', 1, 3, 1, 'John123');

-- --------------------------------------------------------

--
-- Table structure for table `Product_Photo`
--

CREATE TABLE `Product_Photo` (
  `Photo_id` int(10) NOT NULL,
  `Product_id` int(10) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `keyPhoto` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product_Photo`
--

INSERT INTO `Product_Photo` (`Photo_id`, `Product_id`, `Path`, `keyPhoto`) VALUES
(15, 8, '8-1', 1),
(16, 8, '8-2', 0),
(17, 8, '8-3', 0),
(18, 8, '8-4', 0),
(19, 8, '8-5', 0),
(20, 9, '9-1', 1),
(21, 9, '9-2', 0),
(22, 9, '9-3', 0),
(23, 10, '10-1', 1),
(24, 10, '10-2', 0),
(27, 11, '11-1', 1),
(28, 12, '12-1', 1),
(29, 12, '12-2', 0),
(30, 12, '12-3', 0),
(31, 12, '12-4', 0),
(32, 13, '13-1', 1),
(33, 13, '13-2', 0),
(34, 13, '13-3', 0),
(35, 14, '14-1', 1),
(36, 14, '14-2', 0),
(37, 14, '14-3', 0),
(38, 15, '15-1', 1),
(39, 15, '15-2', 0),
(40, 15, '15-3', 0),
(41, 15, '15-4', 0),
(42, 15, '15-5', 0),
(49, 21, '202006290347190', 1),
(50, 21, '202006290347191', 0),
(51, 21, '202006290347192', 0),
(52, 21, '202006290347193', 0),
(53, 21, '202006290347194', 0),
(54, 22, '202006290357110', 1),
(55, 22, '202006290357111', 0),
(56, 22, '202006290357112', 0),
(57, 22, '202006290357113', 0),
(58, 22, '202006290357114', 0),
(59, 22, '202006290357115', 0),
(60, 23, '202007070231140', 1),
(61, 23, '202007070231141', 0),
(62, 23, '202007070231142', 0),
(63, 23, '202007070231143', 0),
(64, 23, '202007070231144', 0),
(65, 23, '202007070231145', 0),
(66, 24, '202007102013140', 1),
(67, 24, '202007102013141', 0),
(83, 28, '202007130110280', 1),
(84, 28, '202007130110281', 0),
(85, 28, '202007130110282', 0),
(86, 28, '202007130110283', 0),
(87, 28, '202007130110284', 0),
(88, 7, '7-1.png', 1),
(89, 29, '202007252027210', 1),
(90, 29, '202007252027211', 0),
(91, 29, '202007252027212', 0),
(92, 29, '202007252027213', 0),
(93, 29, '202007252027214', 0),
(94, 29, '202007252027215', 0),
(95, 29, '202007252027216', 0),
(96, 29, '202007252027217', 0),
(97, 30, '202007260237300', 1),
(98, 30, '202007260237301', 0),
(99, 30, '202007260237302', 0),
(100, 30, '202007260237303', 0),
(101, 30, '202007260237304', 0),
(102, 30, '202007260237305', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`Account_number`),
  ADD UNIQUE KEY `Account_number` (`Account_number`);

--
-- Indexes for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `account_number` (`Account_number`),
  ADD KEY `product_id` (`Product_id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `ProductOwner` (`account_number`),
  ADD KEY `Product_type` (`Category_id`);

--
-- Indexes for table `Product_Photo`
--
ALTER TABLE `Product_Photo`
  ADD PRIMARY KEY (`Photo_id`),
  ADD KEY `Connect_Photo` (`Product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `Category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  MODIFY `OrderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `Product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `Product_Photo`
--
ALTER TABLE `Product_Photo`
  MODIFY `Photo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD CONSTRAINT `account_number` FOREIGN KEY (`Account_number`) REFERENCES `Customer` (`Account_number`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`Product_id`) REFERENCES `Product` (`Product_id`);

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `ProductOwner` FOREIGN KEY (`account_number`) REFERENCES `Customer` (`Account_number`),
  ADD CONSTRAINT `Product_type` FOREIGN KEY (`Category_id`) REFERENCES `Category` (`Category_id`);

--
-- Constraints for table `Product_Photo`
--
ALTER TABLE `Product_Photo`
  ADD CONSTRAINT `Connect_Photo` FOREIGN KEY (`Product_id`) REFERENCES `Product` (`Product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
