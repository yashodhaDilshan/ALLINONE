-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2022 at 03:57 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allinone`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CId` int(11) NOT NULL AUTO_INCREMENT,
  `CName` varchar(100) NOT NULL,
  `Cdescription` varchar(200) NOT NULL,
  PRIMARY KEY (`CId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CId`, `CName`, `Cdescription`) VALUES
(1, 'Vehicle', 'Add Vehicle are includes'),
(2, 'Computers', 'Add Computers are includes');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PaymentID` int(10) NOT NULL AUTO_INCREMENT,
  `PID` int(10) NOT NULL,
  `Quentity` int(10) NOT NULL,
  `Total` int(50) NOT NULL,
  `Card_Holder_Name` varchar(50) NOT NULL,
  `Cart_Number` varchar(16) NOT NULL,
  `Cart_Expire_Date` varchar(10) NOT NULL,
  `Cart_CVV` varchar(10) NOT NULL,
  `UID` int(10) NOT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `UID` (`UID`),
  KEY `PID` (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `PID`, `Quentity`, `Total`, `Card_Holder_Name`, `Cart_Number`, `Cart_Expire_Date`, `Cart_CVV`, `UID`) VALUES
(28, 71, 1, 250000, 'akila', '4353453453453453', '12', '123', 13);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `PId` int(11) NOT NULL AUTO_INCREMENT,
  `PName` varchar(20) NOT NULL,
  `Tell_no` varchar(10) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Price` int(20) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `SubCategory_Id` int(11) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `Uid` int(11) NOT NULL,
  `order_type` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `AccountNo` varchar(20) NOT NULL,
  PRIMARY KEY (`PId`),
  KEY `Uid` (`Uid`),
  KEY `SubCategory_Id` (`SubCategory_Id`),
  KEY `Category_Id` (`Category_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PId`, `PName`, `Tell_no`, `Description`, `Price`, `Category_Id`, `SubCategory_Id`, `Type`, `image`, `Uid`, `order_type`, `Quantity`, `AccountNo`) VALUES
(51, 'BMW ', '0332250535', '0 milage', 12000000, 1, 1, 'New', 'image/car3.jpg', 14, 'Details', 1, '123445543'),
(57, 'CORE I9', '0788906745', 'Total Cores 16  # of Performance-cores 8  # of Efficient-cores 8  Total Threads 24', 140000, 2, 6, 'New', 'image/12.png', 14, 'Order', 6, '34455456566'),
(58, 'CORE I7', '0782344556', 'Total Cores 12  # of Performance-cores 8  # of Efficient-cores 4  Total Threads 20', 120000, 2, 6, 'New', 'image/13.png', 14, 'Order', 5, '234435435345'),
(59, 'CORE I5', '0783456556', 'Total Cores 10  # of Performance-cores 6  # of Efficient-cores 4  Total Threads 16', 100000, 2, 6, 'New', 'image/13.png', 14, 'Order', 7, '234564564566'),
(60, 'RYZEN 9', '0673457567', '# of CPU Cores 16 # of Threads 32 Base Clock 3.4GHz Max Boost Clock Up to 4.9GHz Total L2 Cache 8MB', 170000, 2, 6, 'New', 'image/4.png', 14, 'Order', 5, '456557645645'),
(61, 'DDR5 32GB', '0673443454', 'Capacity 32GB (16GBx2) Multi-Channel Kit Dual Channel Kit Tested Speed (XMP) 5600 MT/s', 50000, 2, 7, 'New', 'image/1.png', 14, 'Order', 5, '232335656565'),
(62, 'CORSAIR 32GB', '0895678767', 'Memory Series DOMINATOR RGB DDR5 Memory Type DDR5 PMIC Type OC PMIC Memory Size 32GB (2 x 16GB)', 40000, 2, 7, 'New', 'image/2.png', 14, 'Order', 15, '546756756874'),
(64, 'VENGEANCE 32GB', '0774353453', 'Memory Type DDR4 Memory Size 32GB (2 x 16GB) Tested Latency 18-22-22-42', 45000, 2, 7, 'New', 'image/5.png', 14, 'Order', 5, '567346536456'),
(65, 'PLATINUM 32GB', '0345675675', 'Memory Series DOMINATOR PLATINUM RGB Memory Type DDR4 Memory Size 32GB (2 x 16GB)', 50000, 2, 7, 'New', 'image/6.png', 14, 'Order', 12, '567345345567'),
(66, 'SAMSUNG 980', '0782343434', 'Form Factor M.2 2280 Capacity 1TB Memory Components Samsung V-NAND ', 50000, 2, 8, 'New', 'image/A1.png', 14, 'Order', 7, '345345645645'),
(67, 'ADDLINK S72', '0783456456', 'Capacity 2TB NAND Flash 3D QLC Dimensions 80(L)x22(W)x3.5(Max.H)', 50000, 2, 8, 'New', 'image/A3.png', 14, 'Order', 5, '456456457646'),
(68, 'ADDLINK S92', '0784567656', 'NAND Flash 3D QLC Dimensions 80(L)x22(W)x3.5(Max.H) mm, 8.2g Interface NVMe 1.3 PCIe GEN4x4', 40000, 2, 8, 'New', 'image/A4.png', 14, 'Order', 12, '345457656756'),
(69, 'TOSHIBA X300', '0783456435', 'Capacity 4 TB Interface Serial ATA 3.0 (SATA) Interface Speeds Up to 6 Gb/s', 8000, 2, 8, 'New', 'image/A5.png', 14, 'Order', 20, '456456435645'),
(70, 'Interface SATA', '0784356454', 'Capacity 8TB RPM 7200 RPM Cache 256MB Features', 7000, 2, 8, 'New', 'image/A6.png', 14, 'Order', 23, '243534534534'),
(71, 'MSI RTX 3080TI', '0456756756', 'Model Name GeForce RTXâ„¢ 3080 Ti GAMING TRIO 12G Graphics Processing Unit NVIDIAÂ®', 250000, 2, 9, 'New', 'image/B1.png', 14, 'Order', 6, '456747654675'),
(72, 'ASUS RTX 3080TI', '0783455434', 'Graphic Engine NVIDIAÂ® GeForce RTXâ„¢ 3080 Ti Bus Standard PCI Express 4.0', 350000, 2, 9, 'New', 'image/B2.png', 14, 'Order', 34, '345345345345'),
(73, 'MSI RTX 3070TI', '0784354564', 'Model Name GeForce RTXâ„¢ 3070 Ti SUPRIM 8G Graphics Processing Unit NVIDIAÂ® GeForce RTXâ„¢ 3070 Ti', 180000, 2, 9, 'New', 'image/B3.png', 14, 'Order', 23, '456467567567'),
(74, 'NITRO+ RX 6700', '0784353453', 'GPU AMD Radeonâ„¢ RX 6700 XT Graphics Card 7nm GPU AMD RDNAâ„¢ 2 Architecture', 200000, 2, 9, 'New', 'image/B4.png', 14, 'Order', 34, '345364564564'),
(75, 'PNY RTX 3070TI', '0784564564', 'Product Specifications PNY Part Number VCG3070T8TFXMPB UPC Code 751492647760 CUDA Cores 6144', 140000, 2, 9, 'New', 'image/B6.png', 14, 'Order', 12, '456435464567'),
(76, 'ASUS ROG Z690', '0784535435', 'ntelÂ® Z690 EATX motherboard with 24+1 power stages, Integrated EKÂ® Ultrablock DDR5', 200000, 2, 3, 'New', 'image/M1.png', 14, 'Order', 12, '457675843534'),
(77, 'ROG MAXIMUS Z690', '0674356456', 'Socket LGA1700 for 12th Gen IntelÂ® Coreâ„¢, PentiumÂ® Gold and CeleronÂ® Processors', 230000, 2, 3, 'New', 'image/M2.png', 14, 'Order', 22, '456457784564'),
(78, 'ROG STRIX Z690', '0675436456', 'Ready for 12th Gen IntelÂ® Coreâ„¢, PentiumÂ® Gold and CeleronÂ® processors', 150000, 2, 3, 'New', 'image/M5.png', 14, 'Order', 23, '456456456456'),
(79, 'TUF GAMING Z690', '0784564564', 'IntelÂ® LGA 1700 socket: Ready for 12th Gen Intel Coreâ„¢ processors', 100000, 2, 3, 'New', 'image/M6.png', 14, 'Order', 12, '456465765734'),
(80, 'MSI MAG X570S', '0674356435', 'PROCESSOR Supports AMD Ryzenâ„¢ 5000 Series, 5000 G-Series, 4000 G-Series, 3000 Series, 3000', 170000, 2, 3, 'New', 'image/M99.png', 14, 'Order', 1, '345346456756'),
(81, 'BMW M3', '0764564564', 'this is brand new unregistered car', 11000000, 1, 1, 'New', 'image/car2.jpg', 14, 'Details', 2, '456456456456'),
(82, 'BMW V3', '0784564564', 'this is new unregistered car. you can visit check and can buy', 12000000, 1, 1, 'New', 'image/Car1.jpg', 14, 'Details', 3, '456456456456'),
(83, 'BMW 321', '0673453453', 'year 2007 Engine 200 mileage 20 000', 5600000, 1, 1, 'Used', 'image/car7.jpg', 14, 'Details', 1, '345345345345'),
(84, 'Premio', '0782343453', 'mileage 20000 callme', 6500000, 1, 1, 'Used', 'image/car8.jpg', 14, 'Details', 1, '456456456756'),
(85, 'KDH 22', '0456675675', 'mileage 50 000 ', 2300000, 1, 2, 'Used', 'image/van2.jpg', 15, 'Details', 23, '346457645675'),
(86, 'IZUZU', '0674567656', 'mileage 80000', 900000, 1, 2, 'Used', 'image/van6.jpg', 15, 'Details', 1, '456456456456'),
(87, 'Toyota V3', '0567655434', 'mileage 30000', 1200000, 1, 2, 'Used', 'image/Van9.jpg', 15, 'Details', 1, '435645646546');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

DROP TABLE IF EXISTS `sub`;
CREATE TABLE IF NOT EXISTS `sub` (
  `SId` int(10) NOT NULL AUTO_INCREMENT,
  `SubName` varchar(20) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Oreder_type` varchar(30) NOT NULL,
  PRIMARY KEY (`SId`),
  KEY `Cid` (`Cid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`SId`, `SubName`, `Cid`, `Oreder_type`) VALUES
(1, 'Car', 1, 'Details'),
(2, 'Van', 1, 'Details'),
(3, 'Motherboard', 2, 'Order'),
(5, 'Motorcycles', 1, 'Details'),
(6, 'Processors', 2, 'Order'),
(7, 'Ram', 2, 'Order'),
(8, 'Hard', 2, 'Order'),
(9, 'Graphic Cards', 2, 'Order');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Uid` int(11) NOT NULL AUTO_INCREMENT,
  `UName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Te_No` text NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Image` varchar(200) NOT NULL,
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Uid`, `UName`, `Email`, `Te_No`, `Type`, `Password`, `Image`) VALUES
(13, 'akila', 'akila@gmail.com', '0785674523', 'User', 'akila1122', 'image/p-7.png'),
(14, 'yash', 'yash@gmail.com', '0784565767', 'Admin', 'yash1122', 'image/p-7.png'),
(15, 'ramitha', 'ramitha@gmail.com', '0786785645', 'User', 'ramitha1122', 'image/p-7.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `product` (`PId`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `users` (`Uid`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Uid`) REFERENCES `users` (`Uid`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`SubCategory_Id`) REFERENCES `sub` (`SId`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`Category_Id`) REFERENCES `category` (`CId`);

--
-- Constraints for table `sub`
--
ALTER TABLE `sub`
  ADD CONSTRAINT `sub_ibfk_1` FOREIGN KEY (`Cid`) REFERENCES `category` (`CId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
