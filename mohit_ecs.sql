-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2015 at 10:23 AM
-- Server version: 5.5.42-MariaDB-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mohit_ecs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `last_log_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `last_log_date`) VALUES
(1, 'mohit', 'mohit1', '2012-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

CREATE TABLE IF NOT EXISTS `productmaster` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL COMMENT 'Product Name',
  `price` float DEFAULT NULL COMMENT 'Max. Retail Price',
  `avail` varchar(15) NOT NULL DEFAULT 'IN  STOCK' COMMENT 'Stock Availability',
  `manufacturer` varchar(15) DEFAULT NULL COMMENT 'Manufactured By',
  `model` varchar(50) NOT NULL,
  `catagory` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `date_added` date NOT NULL,
  `quantity` bigint(200) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Product Master' AUTO_INCREMENT=58 ;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`pid`, `product_name`, `price`, `avail`, `manufacturer`, `model`, `catagory`, `details`, `date_added`, `quantity`) VALUES
(1, 'Apple iMac MC814LL', 105013, 'In Stock', 'Apple', 'MC814LL/A', 'computer', ' <ul class="fk-ul-disc">\r\n					<li>27-inch LED-backlit glossy widescreen display</li>\r\n					<li>3.1 GHz Intel Core i5 quad-core processor</li>\r\n	  				<li>1 TB Serial ATA hard drive</li>\r\n                    <li>4GB (two 2GB) of 1333MHz DDR3 memory)</li>\r\n                    <li>AMD Radeon HD 6970M graphics processor</li>\r\n                    <li>8x slot-loading SuperDrive with double-layer DVD support</li>\r\n                    <li>Built-in FaceTime camera for video chatting </li>\r\n                    <li>Wireless-N Wi-Fi wireless networking</li>\r\n                    <li>Gigabit Ethernet wired networking</li>\r\n                    <li>Bluetooth 2.1 + EDR (Enhanced Data Rate</li>\r\n                    <li>Four USB 2.0 ports, one FireWire 800 port</li>\r\n                    <li>Two Thunderbolt ports</li>\r\n	  </ul>', '2012-08-17', 900),
(2, 'Hp z1 Workstation', 109945, 'In Stock', 'HP', 'LP2480zx', 'computer', '<ul class="fk-ul-disc">\r\n					<li>Windows® 7 Professional 64 </li>\r\n					<li>ntel® Core™ i3-2120, 3.33 GHz, 3MB cache, 2 cores, 65W, Intel HD graphics 20000</li>\r\n	  				<li>Four memory slots. Up to 32 GB, DDR3 ECC/ 8 GB DDR3 nECC, 1600MHz</li>\r\n                    <li>Integrated Graphics: Intel HD Graphics 2000, Intel HD Graphics P3000</li>\r\n                    <li>SATA 7200 3.5-in. drives: 250GB, 500GB, 1TB, 2TB</li>\r\n                    <li>2 USB 3.0, 1 IEEE 1394a, Mic, Headphone, 4-in-1 Media Card Reader</li>\r\n                    <li>4 USB 2.0, RJ-45 Gb-LAN, Line-In, Line-Out, Display Port In/Out, SPDIF, Subwoofer</li>\r\n                    <li>DVD +/- RW Super-Multi Slot-Load6 or Blu-ray Writer Slot-Load16</li>\r\n                    <li>4 slots: 1 PCIe x16 full, 3 miniPCIe</li>\r\n                    <li>HD 1080p 2.0 megapixel webcam</li>\r\n                    <li>802.11 a/b/g/n Wireless LAN</li>\r\n                    <li>Warranty - three year</li>\r\n	  </ul>\r\n', '2012-08-22', 90),
(3, 'Dell Inspiron One 2320', 62910, 'In Stock', 'Dell', 'Inspiron One 2320', 'computer', ' <ul class="fk-ul-disc">\r\n					<li>Processor Name:	Core i5 (2nd Generation)</li>\r\n					<li>Processor Brand:	Intel</li>\r\n	  				<li>Processor Frequency:	2.5 GHz</li>\r\n                    <li>Operating System:	Windows 7 Home Premium</li>\r\n                    <li>Cache Memory:	6 MB</li>\r\n                    <li>System Memory:	6 GB DDR3</li>\r\n                    <li>Touchscreen Support:	Yes</li>\r\n                    <li>Display Resolution:	1920 x 1080</li>\r\n                    <li>Dedicated Graphic Memory:	Intel HD Graphics</li>\r\n                    <li>Hard Drive:	1 TB</li>\r\n                    <li>Wireless:	IEEE 802.11b/g/n</li>\r\n                    <li>Warranty - 3 year</li>\r\n	  </ul>\r\n', '2012-08-22', 10),
(4, 'Lenovo Essential C200', 24370, 'In Stock', 'Lenovo', '57-129906', 'computer', '<ul class="fk-ul-disc">\r\n					<li>Atom Dual Core (1st Generation)</li>\r\n					<li>2 GB DDR3 RAM</li>\r\n	  				<li>Genuine Windows 7 Home Premium 64</li>\r\n                    <li>USB Keyboard and Mouse (Black)</li>\r\n                    <li>ATI Mobility Radeon 6310</li>\r\n                    <li>20.0" All in One with integrated camera 1600x900</li>\r\n                    <li>DVD Recordable </li>\r\n                    <li>Broadcom 11b/g/n Wi-Fi wireless</li>\r\n                    <li>6-in-1 Card Reader</li>\r\n                    <li>Integrated 0.3MP Camera</li>\r\n                    <li>TV Tuner - Yes</li>\r\n                    <li>Warranty - One year</li>\r\n	  </ul>\r\n', '2012-08-22', 3),
(5, 'Lenovo ThinkCentre M90z', 50344, 'In Stock', 'Lenovo', 'A71z', 'computer', '<ul class="fk-ul-disc">\r\n					<li>Cache Memory:	3 MB</li>\r\n					<li>Processor Name:	Pentium Dual Core (2nd Generation)</li>\r\n	  				<li>Chipset:	Intel H61</li>\r\n                    <li>Processor Frequency:	2.6 GHz</li>\r\n                    <li>Operating System:	Free DOS</li>\r\n                    <li>Memory Speed:	1333 MT/s</li>\r\n                    <li>System Memory:	2 GB DDR3</li>\r\n                    <li>Display Size:	20 inch LED Display</li>\r\n                    <li>Hard Drive:	500 GB SATA SATA</li>\r\n                    <li>Built-in Microphone:	Yes</li>\r\n                    <li>Ethernet:	Intel Gigabit Ethernet</li>\r\n                    <li>Warranty - 3 year</li>\r\n	  </ul>\r\n', '2012-08-22', 5),
(6, 'Lenovo IdeaCentre', 59899, 'IN  STOCK', 'Lenovo', 'B320', 'computer', '<ul class="fk-ul-disc">\r\n					<li>Cache Memory:	6 MB</li>\r\n					<li>Processor Name:	Core i5 (2nd Generation)</li>\r\n	  				<li>Processor Frequency:	2.5 GHz</li>\r\n                    <li>Operating System:	Windows 7 Home Basic</li>\r\n                    <li>Memory Speed:	1066 MT/s</li>\r\n                    <li>System Memory:	4 GB DDR3</li>\r\n                    <li>Display Size:	21.5 inch LED Display</li>\r\n                    <li>Integrated Graphic Processor:	Intel HD Graphics 2000</li>\r\n                    <li>Hard Drive:	500 GB</li>\r\n                    <li>Drive Type:	DVDRW</li>\r\n                    <li>Wireless:	IEEE 802.11b/g/n</li>\r\n                    <li>3 Year Lenovo Warranty</li>\r\n	  </ul>\r\n', '2012-08-22', 90),
(7, 'Altec Lansing MX6021E', 9450, 'In Stock', 'Altec Lansing', 'MX6021E', 'other product', '<ul class="fk-ul-disc">\r\n					<li>PC multimedia speaker system</li>\r\n					<li>2.1-channel</li>\r\n	  				<li>2 speakers,Subwoofer</li>\r\n                    <li>Controls - Volume,Treble,Power on/off,Bass</li>\r\n                    <li>Headphone jack</li>\r\n                    <li>Response Bandwidth 40 - 20000 Hz</li>\r\n                    <li>Signal-To-Noise Ratio 75 dB </li>\r\n                    <li>Output Level (SPL) 106 dB</li>\r\n                    <li>Audio Amplifier Integrated</li>\r\n                    <li>Connectivity Technology Wired</li>\r\n                    <li>Additional Features Bi-amplified</li>\r\n                    <li>Warranty - One year</li>\r\n	  </ul>\r\n', '2012-08-25', 90),
(8, 'Mad Catz Cyborg R.A.T. 5 Gaming Mouse', 5381, 'In  Stock', 'Mad Catz', 'Cyborg R.A.T. 5', 'other product', '<ul class="lmargin20 fk-ul-disc">\r\n				\r\n                <li>EMI schemes available for HDFC, ICICI, Citibank Bank credit cards only</li>\r\n				<li>Pay in easy 3, 6, 9 or 12 month installments</li>\r\n                <li>9, 12 month schemes are not available for Citibank credit cards</li>\r\n				<li>Available for minimum order value of Rs. 4000</li>\r\n				<li>Flat EMI processing fee will be charged by Flipkart<br/>Rs. 100 for 3 months, Rs. 500 for 6 months, Rs. 1500 for 9 months, Rs. 2500 for 12 months EMI</li>\r\n				\r\n							</ul>', '2012-08-24', 9),
(9, 'Logitech PN 981-000116 Headset', 6924, 'In  Stock', 'Logitech', 'PN 981-000116', 'other product', '<ul class="fk-key-features">\r\n									<li>Wired</li>\r\n									<li>Over-the-ear Headset</li>\r\n									<li>Circumaural</li>\r\n									<li>Closed Headset</li>\r\n									<li>Over-the-head Design</li>\r\n									<li>Uni-directional Microphone</li>\r\n									<li>40 mm Headset Driver Units</li>\r\n									<li>15 mm Microphone Driver Units</li>\r\n									<li>20 Hz - 20000 Hz Headset Frequency Response</li>\r\n							</ul>', '2012-08-24', 890),
(10, 'Apple MB829ZM/A Wireless Mouse', 3890, 'In  Stock', 'Apple', 'MB829ZM/A', 'other product', ' <table cellspacing="0" width="98%" border="0px" bordercolor="#F0F0F0">\r\n        <tbody>\r\n          <tr>\r\n            <td width="40%">Brand: </td>\r\n            <td>Apple</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Buttons: </td>\r\n            <td>2</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Features: </td>\r\n            <td>Multi-touch Mouse, Laser Tracking Engine, Bluetooth-enabled Mac Computer, Wireless Mouse Software Update 1.0</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Interface: </td>\r\n            <td>Wireless</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Model: </td>\r\n            <td>MB829ZM/A</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">OS Supported: </td>\r\n            <td>Mac OS 10.5.8 and Above</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Part Number: </td>\r\n            <td>MB829ZM/A</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Technology: </td>\r\n            <td>Laser</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Warranty: </td>\r\n            <td>1 Year Domestic Offsite Warranty</td>\r\n          </tr>\r\n        </tbody>\r\n      </table>\r\n', '2012-08-25', 890),
(11, 'Case Logic Laptop Backpack', 4995, 'In  Stock', 'Case Logic', 'RBP-117', 'other product', '<table cellspacing="0" width="98%" border="0px" bordercolor="#F0F0F0">\r\n        <tbody>\r\n          <tr>\r\n            <td width="40%">Brand: </td>\r\n            <td>Case Logic</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Model: </td>\r\n            <td>RBP-117</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Type: </td>\r\n            <td>Backpack</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Capacity: </td>\r\n            <td>17.3 inch</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Exterior Dimensions: </td>\r\n            <td>19.7 x 14.6 x 9.3 inch</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Features: </td>\r\n            <td>Water Resistant, Multi-functional Compression Straps, Integrated Pockets, Streamlined Body Plus Top and Bottom grab Handles, Dedicated Slots for Business Cards, Pens, iPod, Smartphone and USB</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Interior Dimensions: </td>\r\n            <td>11.8 x 16.4 x 1.8 inch</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Material: </td>\r\n            <td>Nylon</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Part Number: </td>\r\n            <td>RBP-117</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Warranty: </td>\r\n            <td>25 years replacement warranty</td>\r\n          </tr>\r\n          <tr>\r\n            <td width="40%">Weight: </td>\r\n            <td>0.90 Kg</td>\r\n          </tr>\r\n        </tbody>\r\n      </table>\r\n', '2012-08-25', 890),
(12, 'Apple MacBook Air 11-inch', 67699, 'In  Stock', 'Apple', 'MD223LL/A', 'laptop', ' <table>\r\n                    \r\n                        <tr>\r\n                            <td >Manufacturer</td>\r\n                            <td >Apple Computer</td>\r\n                        </tr>\r\n                    \r\n                        <tr>\r\n                            <td >Brand</td>\r\n                            <td >Apple</td>\r\n                        </tr>\r\n                    \r\n                        <tr>\r\n                            <td >Model Number</td>\r\n                            <td >MC968HN/A</td>\r\n                        </tr>\r\n                    \r\n                        <tr>\r\n                            <td >Colour</td>\r\n                            <td >White</td>\r\n                        </tr>\r\n                    \r\n                        <tr>\r\n                            <td >Item Package Quantity</td>\r\n                            <td >1</td>\r\n                        </tr>\r\n                    \r\n                        <tr>\r\n                            <td >Warranty</td>\r\n                            <td >1 year</td>\r\n                        </tr>\r\n\r\n                    \r\n                </table>', '2012-08-25', 90),
(13, 'Lenovo ThinkPad X Series X220  Laptop', 101230, 'In Stock', 'Lenovo ', '4287-3UQ', 'laptop', 'Processor Core i7 (2nd Generation)<br>\r\nVariant	2620M <br>\r\nChipset	Intel QM67 <br>\r\nBrand	Intel <br>\r\nClock Speed	2.7 GHz With Turbo Boost upto 3.4 GHz<br>\r\nCache	4 MB<br>\r\nExpandable Memory	Upto 8 GB<br>\r\nMemory Slots	2 (Unused Slot - 0)<br>\r\nSystem Memory	4 GB DDR3<br>\r\nUSB Port	3 x USB 2.0<br>\r\nMic In	Yes<br>\r\nRJ45 LAN	Yes<br>\r\nHDMI Port	Yes<br>\r\nVGA Port	Yes<br>\r\nMulti Card Slot	4-in-1 Card Reader', '2012-08-25', 90),
(14, 'Apple MacBook Pro 13.3-Inch Laptop', 4999, 'In Stock', 'Apple', 'MD101LL/A', 'laptop', 'Processor	2.3GHz Intel Core i7-3610QM<br>\r\nMemory	8GB, 1600MHz DDR3<br>\r\nHard drive	256GB SSD<br>\r\nChipset	Intel HM77<br>\r\nGraphics	NVIDIA GeForce GT 650M / Intel HD 4000<br>\r\nOperating system	OS X Lion 10.7.4<br>\r\nDimensions (WD)	14.1 x 9.7 inches<br>\r\nHeight	0.7 inch<br>\r\nScreen size (diagonal)	15.4 inches<br>\r\nSystem weight / Weight with AC adapter	4.6/5.4 pounds<br>\r\nCategory	Midsize<br>', '2012-08-26', 9),
(15, 'Samsung NP900X3A-A04IN Ultrabook', 78975, 'In Stock', 'Samsung ', 'NP900X3A-A04IN', 'laptop', 'Processor	Core i7 (2nd Generation)<br>\r\nVariant	2617M<br>\r\nChipset	Intel HM65 Express Chipset<br>\r\nBrand	Intel<br>\r\nClock Speed	1.5 GHz<br>\r\nCache	4 MB<br>\r\nMemory Slots	2 (Unused Slots 0)<br>\r\nSystem Memory	8 GB DDR3<br>\r\nScreen Size	13.3 Inch<br>\r\nResolution	1366 x 768 Pixel<br>\r\nScreen Type	LED HD Display<br>\r\nWeb Camera	1.3 Megapixel<br>\r\nPointer Device	Touch Scroll Pad<br>\r\nKeyboard	Standard Keyboard<br>\r\nEthernet	10/100/1000 LAN<br>\r\nWireless LAN	IEEE 802.11 b/g/n<br>\r\nBluetooth	v3.0', '2012-08-26', 89),
(16, 'Apotop DDR3 4 GB PC RAM (DDR3-1333 U-DIMM)', 1393, 'In Stock', 'Apotop ', 'DDR3-1333 U-DIMM', 'computer', 'Memory Type: 	4 GB (8 x 256 MB) 1333 MHz DDR3 UDIMM<br>\r\nMemory Standard: 	DDR3-1333/PC3-10600<br>\r\nCompatible Device: 	PC<br>\r\nPins: 	240-pin<br>\r\nBurst Length: 	4, 8<br>\r\nError Check: 	Non-ECC<br>\r\nBuffered/Unbuffered: 	Unbuffered<br>\r\nModel ID: 	DDR3-1333 U-DIMM<br>\r\nFrequency: 	PC3-10600 MHz (Specified)<br>\r\nMemory Clock: 	666 MHz<br>\r\nTechnology: 	DDR3 SDRAM Memory<br>\r\nCAS Latency: 	9<br>\r\nMemory Configuration: 	Dual Channel<br>\r\nSpecified Voltage: 	1.5 V<br>\r\nDomestic Term: 	3 Years<br>\r\nWarranty Summary: 	3 Years Domestic Warranty<br>', '2012-08-26', 20),
(17, 'G.Skill SQ DDR3 8 GB Laptop (Mac) RAM', 200, 'In Stock', 'G.Skill', 'FA-1333C9S-8GSQ', 'ram', 'Memory Type: 	8 GB (1 x 8 GB) 1333 MHz DDR3 SO-DIMM<br>\r\nMemory Standard: 	DDR3-1333/PC3-10600<br>\r\nCompatible Device: 	Laptop (Mac)<br>\r\nPins: 	204-pin<br>\r\nError Check: 	Non-ECC<br>\r\nBuffered/Unbuffered: 	Unbuffered<br>\r\nModel ID: 	FA-1333C9S-8GSQ<br>\r\nPart Number: 	FA-1333C9S-8GSQ<br>\r\n\r\nFrequency: 	PC3-10600 MHz (Specified)<br>\r\nTechnology: 	DDR3 DRAM Memory<br>\r\nCAS Latency: 	9/9/2009<br>\r\nMemory Configuration: 	Dual Channel<br>\r\n\r\nTest Voltage: 	1.5 V<br>\r\n\r\nDomestic Term: 	10 Years<br>\r\nWarranty Summary: 	10 Years Domestic Warranty<br>', '2012-08-26', 9),
(18, 'Corsair DDR3 4 GB (1 x 4 GB) PC RAM', 1299, 'In Stock', 'Corsair', 'CMV4GX3M1A1333C9', 'ram', 'Memory Type: 	4 GB 1333 MHz DDR3 DIMM<br>\r\nMemory Standard: 	DDR3-1333/PC3-10600<br>\r\nCompatible Device: 	PC<br>\r\nPins: 	240-pin<br>\r\nBurst Length: 	8<br>\r\nModel ID: 	CMV4GX3M1A1333C9<br>\r\n\r\nFrequency: 	1333 MHz (Specified), 1333 MHz (Test)<br>\r\nMemory Clock: 	166 MHz<br>\r\nTechnology: 	DDR3 SDRAM Memory<br>\r\nCAS Latency: 	9/9/2009<br>\r\n\r\nSpecified Voltage: 	1.5 V<br>\r\nTest Voltage: 	1.5 V\r\n<br>\r\nDomestic Term: 	10 Years<br>\r\nWarranty Type: 	Limited<br>', '2012-08-26', 8),
(19, 'Intel 2.66 GHz LGA 775 Q9400 Processor', 13621, 'In Stock', 'Intel ', 'Q9400', 'processor', 'Type: 	Desktop<br>\r\nSocket Type: 	LGA 775<br>\r\nArchitecture: 	64-bit<br>\r\nInstruction Sets: 	SSE, SSE2, SSE3, SSE4.1<br>\r\nThreading/Transport: 	No<br>\r\nTurbo Boost: 	No<br>\r\nVirtualisation: 	Yes<br>\r\nModel ID: 	Q9400<br>\r\nNumber of Cores: 	4 Cores<br>\r\nNumber of Threads: 	4 Threads<br>\r\nSpeed: 	2.66 GHz<br>\r\nCache Memory: 	256 KB (L1), 6 MB (L2)<br>\r\nBus-Core Ratio: 	8<br>\r\nMaximum Thermal Design Power [TDP]: 	95 W<br>\r\nVoltage Range: 	0.8500 V - 1.3625 V<br>\r\nManufacturing Process: 	45 nm<br>\r\nService Type: 	Carry In<br>\r\nNot Covered in Warranty: 	Forceful Tampering, Burnt, Mishandling and Physical Damage<br>\r\nCovered in Warranty: 	Manufacturing Defects / Dead on Arrival<br>\r\nDomestic Term: 	3 Years', '2012-08-26', 78),
(20, 'AMD 3 GHz FM1 uPGA A8 3870K Processor', 6678, 'In Stock', 'AMD', 'A8 3870K', 'processor', 'Type: 	Desktop<br>\r\nSocket Type: 	FM1 uPGA<br>\r\nModel ID: 	A8 3870K<br>\r\nNumber of Cores: 	4 Cores<br>\r\nSpeed: 	3 GHz<br>\r\nCache Memory: 	128 KB (L1), 1 MB (L2)<br>\r\nMaximum Thermal Design Power [TDP]: 	100 W<br>\r\nVoltage Range: 	0.45 V - 1.4125 V<br>\r\nManufacturing Process: 	32 nm<br>\r\nMemory Type Supported: 	DDR3-1866<br>\r\nIntegrated Graphics: 	Yes<br>\r\nBase Frequency: 	3000 MHz<br>\r\nOther Graphics Features: 	Radeon HD 6550D, Radeon Cores on Die - 400, GPU Clock Speed: 600 MHz<br>\r\nDomestic Term: 	3 Years<br>\r\nWarranty Summary: 	3 Years Domestic Warranty', '2012-08-26', 67),
(21, 'Intel 3.2 GHz LGA 1366 Core i7-960 Processor', 18603, 'In Stock', 'Intel ', 'Core i7-960', 'processor', 'Type: 	Desktop<br>\r\nSocket Type: 	LGA 1366<br>\r\nArchitecture: 	64-bit<br>\r\nInstruction Sets: 	SSE4.2<br>\r\nThreading/Transport: 	Yes<br>\r\nTurbo Boost: 	Yes<br>\r\nVirtualisation: 	Yes<br>\r\nModel ID: 	Core i7-960<br>\r\nNumber of Cores: 	4 Cores<br>\r\nNumber of Threads: 	8 Threads<br>\r\nSpeed: 	3.2 GHz with Maximum Turbo Speed of 3.46 GHz<br>\r\nIntel Smart Cache: 	8 MB<br>\r\nBus-Core Ratio: 	24<br>\r\nBus Speed: 	4.8 GT/s<br>\r\nMaximum Thermal Design Power [TDP]: 	130 W<br>\r\nVoltage Range: 	0.800 V - 1.375 V<br>\r\nManufacturing Process: 	45 nm<br>\r\nMemory Type Supported: 	DDR3-800, DDR3-1066<br>\r\nMemory Channels Supported: 	3 Channel<br>\r\nMaximum Memory Size Supported: 	24 GB<br>\r\nMaximum Memory Bandwidth: 	25.6 GB/s<br>\r\nIntegrated Graphics: 	No', '2012-08-26', 678),
(22, 'EVGA X79 SLI Motherboard', 20116, 'In Stock', 'EVGA ', 'X79 SLI', 'motherboard', 'Model ID: 	X79 SLI<br>\r\nForm Factor: 	ATX<br>\r\nSocket Type: 	LGA 2011<br>\r\nCompatible Processors: 	Intel Core i7 Processor<br>\r\nChipset: 	Intel X79<br>\r\nNumber of Memory Slots: 	4 Slots<br>\r\nMemory Configuration: 	32 GB DDR3 Quad Channel DIMM<br>\r\nMemory Frequency: 	800, 1066, 1333, 1600, 1866, 2133 MHz<br>\r\nSATA 3 Gb/s: 	Intel X79 Express Chipset<br>\r\nSATA 6 Gb/s: 	Intel X79 Express Chipset<br>\r\nRAID Configurations: 	0, 1, 0 + 1, 5, 10, JBOD<br>\r\nExternal Graphics Card Support: 	Yes<br>\r\nMulti GPU Support: 	Yes, 2-way SLI, 3-way SLI, CrossfireX<br>\r\nAudio Codec: 	Realtek ALC898<br>\r\nAudio Channels: 	8<br>\r\nAudio Features: 	High Definition Audio<br>\r\nEthernet Controller: 	Marvell 88E8059<br>\r\nEthernet Features: 	Gigabit LAN<br>\r\nFireWire Specifications: 	1 Port Onboard<br>\r\nPCIe x1 Slots, Generation: 	2, 3.0<br>\r\nPCIe x16 Slots, Generation: 	3, 3.0<br>\r\nSATA 3 Gb/s Headers: 	4<br>\r\nSATA 6 Gb/s Headers: 	2<br>\r\nUSB 2.0 Headers: 	8<br>\r\nATX Power Connectors: 	1 (24 Pin ATX Power Connectors), 1 (8 Pin ATX 12V Power Connectors)<br>\r\nFront Panel Headers: 	1<br>\r\nOther Connectors: 	7 x Fan Headers, 1 x S/pdif Connector, 1 x 1394b Header<br>\r\nUSB 2.0 Ports, Controller: 	2, Intel X79 Express Chipset<br>\r\nUSB 3.0 Ports, Controller: 	4, VLI VL800-Q8<br>\r\neSATA Ports, Controller: 	2, Marvell 6121<br>\r\nIEEE 1394a Ports: 	1<br>\r\nAudio I/O Channels: 	6<br>\r\nRJ-45 Ethernet Jacks: 	1<br>\r\nPS/2: 	1\r\nGeneral Features\r\nOverclocking: 	EVGA E-LEET Tuning Support, EVGA EVBot Support\r\nHardware Monitoring: 	Onboard CPU Temperature Monitor, EVGA EZ Voltage Read Points,\r\nOS Support: 	Windows XP and Above\r\nBIOS: 	BIOS Type: AMI, UEFI\r\nFeatures: 	240-pin DIMM Sockets, POSCAP Capacitors, Passive Chipset Heatsink, 100 % Solid State Capacitors\r\nAdvanced Technologies: 	PCI Express 3.0 Ready, EVGA EVBot Support\r\nAdvanced Features: 	6 + 2 Phase PWM, Dual BIOS Support, Clear CMOS, Power and Reset\r\nLimitations\r\n	External Graphics Card Required (Not Included in the Box)\r\nDimensions\r\nDimensions: 	243.8 x 304.8 mm\r\nWarranty\r\nService Type: 	Carry In\r\nCovered in Warranty: 	Manufacturing Defects\r\nDomestic Term: 	3 Years\r\nWarranty Type: 	Limited', '2012-08-26', 5678),
(23, 'ASUS SABERTOOTH X79 Motherboard', 24301, 'In Stock', 'ASUS ', 'SABERTOOTH X79', 'motherboard', 'Model ID: 	SABERTOOTH X79<br>\r\nForm Factor: 	ATX<br>\r\nSocket Type: 	LGA 2011<br>\r\nCompatible Processors: 	Intel 2nd Generation Core i7-3930K, Intel 2nd Generation Core i7-3960X<br>\r\nChipset: 	Intel X79<br>\r\nNumber of Memory Slots: 	8 Slots<br>\r\nMemory Configuration: 	64 GB DDR3 Quad Channel DIMM<br>\r\nMemory Frequency: 	1066, 1333, 1600, 1866 MHz<br>\r\nECC Support: 	Non-ECC<br>\r\nBuffered Memory: 	Unbuffered<br>\r\nSATA 3 Gb/s: 	Intel X79<br>\r\nSATA 6 Gb/s: 	Intel X79, Marvell PCIe 9128<br>\r\nRAID Controller: 	Intel X79<br>\r\nRAID Configurations: 	0, 1, 5, 10<br>\r\nMulti GPU Support: 	Yes, NVIDIA Quad-GPU SLI, AMD Quad-GPU CrossFireX<br>\r\nAudio Codec: 	Realtek ALC892<br>\r\nAudio Channels: 	8<br>\r\nEthernet Controller: 	Intel 82579V<br>\r\nIEEE 1394a FireWire Controller: 	VIA 6315N<br>\r\nNumber of FireWire Ports: 	1<br>\r\nPCI Slots: 	1<br>\r\nPCIe x1 Slots, Generation: 	2, 2.0<br>\r\nPCIe x16 Slots, Generation: 	2, 3.0/2.0 (dual x16) *1, 2, 3.0/2.0 (dual x16) *1<br>\r\nSATA 3 Gb/s Headers: 	4<br>\r\nSATA 6 Gb/s Headers: 	4<br>\r\nUSB 2.0 Headers: 	4<br>\r\nUSB 3.0 Headers: 	1<br>\r\nATX Power Connectors: 	1 (8 Pin ATX 12V Power Connectors)<br>\r\nFan Headers: 	1 (Processor Fan Headers), 4 (System Fan Headers)<br>\r\nOther Connectors: 	1 x S/PDIF Out Header, 1 x System Panel (Q-Connector), 1 x Assistant Fan Connector, 1 x COM Connector, 1 x Assistant Fan Connector<br>\r\nUSB 2.0 Ports, Controller: 	6, Intel X79<br>\r\nUSB 3.0 Ports, Controller: 	4, ASMedia<br>\r\neSATA Ports, Controller: 	1, ASMedia ASM1061<br>\r\nIEEE 1394a Ports: 	1\r\n\r\nAudio I/O Channels: 	6\r\nRJ-45 Ethernet Jacks: 	1\r\nPS/2: 	1', '2012-08-26', 56),
(24, 'Gigabyte GA-X79-UD3 Motherboard', 16430, 'In Stock', 'Gigabyte ', 'GA-X79-UD3', 'motherboard', 'Form Factor: 	ATX<br>\r\nSocket Type: 	LGA 2011<br>\r\nCompatible Processors: 	Intel Core i7 Processor<br>\r\nChipset: 	Intel X79<br>\r\nNumber of Memory Slots: 	4 Slots<br>\r\nMemory Configuration: 	32 GB DDR3 Quad Channel DIMM<br>\r\nMemory Frequency: 	1066, 1333, 1600, 1866, 2133 MHz<br>\r\nECC Support: 	Non-ECC<br>\r\nSATA 3 Gb/s: 	Intel X79 Express<br>\r\nSATA 6 Gb/s: 	Intel X79 Express, Marvell 88SE9172 Chip<br>\r\nRAID Controller: 	Intel X79 Express, Marvell 88SE9172 Chip<br>\r\nRAID Configurations: 	0, 1, 5, 10<br>\r\nExternal Graphics Card Support: 	Yes<br>\r\nMulti GPU Support: 	Yes, 2-way AMD CrossFireX, 3-way AMD CrossFireX, 4-way AMD CrossFireX, NVIDIA SLI<br>\r\nAudio Codec: 	Realtek ALC898<br>\r\nAudio Channels: 	7.1<br>\r\nAudio Features: 	High Definition Audio, Support for Dolby Home Theater, Support for CD In<br>\r\nEthernet Features: 	10/100/1000 Mbit<br>\r\nPCI Slots: 	1<br>\r\nPCIe x1 Slots, Generation: 	2, 2.0<br>\r\nPCIe x16 Slots, Generation: 	4, 3.0<br>\r\nSATA 3 Gb/s Headers: 	4<br>\r\nSATA 6 Gb/s Headers: 	6<br>\r\nUSB 2.0 Headers: 	3<br>\r\nUSB 3.0 Headers: 	1<br>\r\nATX Power Connectors: 	1 (24 Pin ATX Power Connectors), 1 (8 Pin ATX 12V Power Connectors)<br>\r\nFan Headers: 	1 (Processor Fan Headers), 4 (System Fan Headers)<br>\r\nFront Panel Headers: 	2<br>\r\nOther Connectors: 	1 x S/PDIF Out Header, 1 x Serial Port Header, 1 x Clear CMOS Jumper, 2 x eSATA 6 Gb/s Connectors<br>\r\nUSB 2.0 Ports, Controller: 	8, Intel X79 Express<br>\r\nUSB 3.0 Ports, Controller: 	2, Fresco FL1009 Chip<br>\r\nAudio I/O Channels: 	6<br>\r\nOptical S/PDIF Ports and S/PDIF Out ports: 	1 (Optical S/PDIF Ports)<br>\r\nRJ-45 Ethernet Jacks: 	1<br>\r\nPS/2: 	1', '2012-08-26', 67),
(25, 'Asus NVIDIA GeForce EN210 1 GB DDR3 Graphics Card', 2020, 'In Stock', 'Asus ', 'GeForce EN210', 'graphicscard', 'Sales Package: 	Graphic Card, Installation CD, Manual<br>\r\nGraphics Engine: 	NVIDIA GeForce 210<br>\r\nGPU Clock: 	589 MHz<br>\r\nRAMDAC Clock Speed: 	400<br>\r\nBus Standard: 	PCI Express 2.0<br>\r\nModel ID: 	GeForce EN210<br>\r\nMemory: 	64-bit, 1 GB DDR3 Memory with 1200 MHz<br>\r\nMaximum Resolution : 	2560 x 1600 (Digital), 2048 x 1536 (Analog)<br>\r\nGraphics Technologies Supported: 	Microsoft DirectX v10.1<br>\r\nVGA/D-SUB Output: 	1xVGA DSub Output<br>\r\nDVI and HDMI Interface: 	1 x DVI Output Out, 1 x HDMI Output Out, 1 Slots x 2 Low Profile Bracket Bundled<br>\r\nSupported OS: 	Windows 7<br>\r\nSoftware Included: 	ASUS Utilities<br>\r\nOther Technologies: 	OdB Silent Cooling, GPU Guard, EMI Shield, ASUS Smart Doctor, ASUS Gamer OSD, Splendid Video Intelligence Technology, GeForce CUDA, NVIDIA PureVideo HD<br>\r\nDimensions: 	x 177.8 x 120.9 mm<br>', '2012-08-26', 56),
(26, 'Galaxy NVIDIA GeForce 210 1 GB DDR3 Graphics Card', 2005, 'In Stock', 'Galaxy NVIDIA ', 'GeForce 210', 'graphicscard', 'Graphics Engine: 	NVIDIA GeForce 210<br>\r\nGPU Clock: 	589 MHz<br>\r\nShader: 	Clock speed of 1402<br>\r\nProcessors and Cores: 	16 Stream Processor, 16 CUDA Cores<br>\r\nRAMDAC Clock Speed: 	400<br>\r\nBus Standard: 	PCI Express 2.0<br>\r\nCooling and Heatsink: 	Heatsink<br>\r\nModel ID: 	GeForce 210<br>\r\nPower Supply Required: 	300 W<br>\r\nMemory: 	64-bit, 1 GB DDR3 Memory with 800 MHz<br>\r\nMemory Bandwidth: 	8 GB/sec<br>\r\nMaximum Resolution : 	2560 x 1600 (Digital), 2048 x 1536 (Analog)<br>\r\nGraphics Technologies Supported: 	Microsoft DirectX v10.1, Open GL Optimization v3.1<br>\r\nVGA/D-SUB Output: 	1xVGA DSub Output<br>\r\nDVI and HDMI Interface: 	1 x DVI Output Out, Yes x Dual Link DVI Out, 1 x HDMI Output Out<br>\r\nHD Content Support: 	HDCP Support', '2012-08-26', 45),
(27, 'Sapphire AMD/ATI Radeon HD 6670 1 GB DDR3 Graphics', 5152, 'In Stock', 'Sapphire ', 'Radeon HD 6670', 'graphicscard', 'Graphics Engine: 	AMD/ATI Radeon HD 6670 GPU<br>\r\nGPU Clock: 	800 MHz<br>\r\nShader: 	Shader Version 5<br>\r\nProcessors and Cores: 	480 Stream Processor<br>\r\nGPU Manufacturing Process: 	40<br>\r\nBus Standard: 	PCI Express 2.0<br>\r\nModel ID: 	Radeon HD 6670<br>\r\nPower Supply Required: 	400 W<br>\r\nMemory: 	128-bit, 1 GB DDR3 Memory with 1600 MHz<br>\r\nMemory Bandwidth: 	64 GB/sec<br>\r\nMaximum Resolution : 	2560 x 1600 (Digital), 2048 x 1536 (Analog)<br>\r\nGraphics Technologies Supported: 	Microsoft DirectX v11, Open GL Optimization v4.1, AMD CrossFireX supported<br>\r\n3D Support: 	Yes support<br>\r\nVGA/D-SUB Output: 	1xVGA DSub Output<br>\r\nDVI and HDMI Interface: 	Yes x Dual Link DVI Out, 1 x HDMI Output Out<br>\r\nHD Content Support: 	HDCP Support<br>\r\nSupported OS: 	Windows 7<br>\r\nOther System Requirements: 	PCI Express based PC, 1 GB Minimum of system memory, CD-ROM, DVD-ROM<br>\r\nSoftware Included: 	Driver CD', '2012-08-26', 6),
(28, 'Seagate Barracuda 3 TB HDD', 9646, 'In Stock', 'Seagate ', 'ST3000DM001', 'harddisk', 'OS Compatibility: 	Windows 7<br>\r\nDevice: 	Desktop<br>\r\nDevice Type: 	3.5 Inch HDD<br>\r\nDrive Capacity: 	3 TB<br>\r\nSpin Speed: 	7200 rpm<br>\r\nInterface: 	SATA 6.0 Gbps<br>\r\nCache Memory: 	64 MB<br>\r\nTransfer Rate: 	210 Mbps<br>\r\nI/O Transfer Rate: 	600 Mbps<br>\r\nAverage Latency: 	4.16 ms<br>\r\nAverage Seek Time: 	8.5 ms (Read), 9.5 ms (Write)<br>\r\nNon-recoverable Read Error: 	1 per 10^14<br>\r\nReliability: 	300000 (Load/Unload Cycles)<br>\r\nCompatible OS: 	Windows 7<br>\r\nStandard Input Voltage: 	12 V DC<br>\r\nMaximum Start Current: 	2 A<br>\r\nIdle: 	5.4 W<br>\r\nPower Consumption: 	8 W (Read/Write), 0.75 W (Standby/Sleep)<br>\r\nOperating Temperature: 	0 to 60DegC<br>\r\nNon-Operating Temperature: 	-40DegC to 70DegC<br>\r\nOperating Humidity: 	5 % - 90 %<br>\r\nNon-Operating Humidity: 	5 % - 95 %<br>\r\nShock Tolerance: 	80 Gs for 2 ms (Operating), 300 Gs for 2 ms (Non-Operating)<br>\r\nDimensions: 	101.6 x 26.1 x 146.99 mm<br>\r\nWeight: 	626 g<br>\r\nDomestic Term: 	1 Year', '2012-08-26', 67),
(29, 'Seagate Barracuda 1 TB HDD', 5100, 'In Stock', 'Seagate ', 'ST31000524AS', 'harddisk', 'OS Compatibility: 	Windows 7<br>\r\nDevice: 	Desktop<br>\r\nDevice Type: 	3.5 Inch HDD<br>\r\nDrive Capacity: 	1 TB<br>\r\nSpin Speed: 	7200 rpm<br>\r\nInterface: 	SATA 6.0 Gbps<br>\r\nCache Memory: 	32 MB<br>\r\nTransfer Rate: 	1000 Mbps<br>\r\nI/O Transfer Rate: 	4800 Mbps<br>\r\nAverage Latency: 	4.17 ms<br>\r\nAverage Seek Time: 	8.5 ms (Read), 9.5 ms (Write)<br>\r\nNon-recoverable Read Error: 	1 per 10^14<br>\r\nReliability: 	50000 (Load/Unload Cycles)<br>\r\nCompatible OS: 	Windows 7<br>\r\nStandard Input Voltage: 	12 V DC<br>\r\nMaximum Start Current: 	2 A<br>\r\nIdle: 	5 W<br>\r\nPower Consumption: 	9.4 W (Read/Write)<br>\r\nOperating Temperature: 	0 to 60DegC<br>\r\nNon-Operating Temperature: 	-40DegC to 70DegC<br>\r\nShock Tolerance: 	70 G for 2 ms (Operating), 300 G for 1 ms (Non-Operating)<br>\r\nDimensions: 	101.6 x 26.1 x 146.99 mm<br>\r\nWeight: 	622 g<br>\r\nDomestic Term: 	1 Year<br>\r\nWarranty Type: 	Limited', '2012-08-27', 56),
(30, 'WD Caviar Green 1 TB HDD', 5240, 'In Stock', 'WD Caviar', 'WD10EZRX', 'harddisk', 'OS Compatibility: 	Windows 7, Windows Vista, Mac<br>\r\nDevice: 	Desktop<br>\r\nDevice Type: 	3.5 Inch HDD<br>\r\nDrive Capacity: 	1 TB<br>\r\nInterface: 	SATA 6.0 Gbps<br>\r\nCache Memory: 	64 MB<br>\r\nTransfer Rate: 	880 Mbps<br>\r\nI/O Transfer Rate: 	4800 Mbps<br>\r\nData Transfer Rate (To/From Host): 	6144 Mbps<br>\r\nNon-recoverable Read Error: 	1 per 10^14<br>\r\nReliability: 	300000 (Load/Unload Cycles)<br>\r\nCompatible OS: 	Windows 7, Windows Vista, Mac<br>\r\nStandard Input Voltage: 	12 V DC<br>\r\nMaximum Start Current: 	1.47 A<br>\r\nIdle: 	3.3 W<br>\r\nPower Consumption: 	5.3 W (Read/Write), 0.7 W (Standby/Sleep)', '2012-08-26', 78),
(34, 'ASRock X79 Extreme9 Motherboard', 25232, 'In Stock', 'ASRock ', 'X79 Extreme9', 'motherboard', 'Form Factor:	 ATX<br>\r\nSocket Type:	 LGA 2011<br>\r\nCompatible Processors:	 Intel Core i7 Processors<br>\r\nChipset:	 Intel X79<br>\r\nForm Factor:	 ATX<br>\r\nSocket Type:	 LGA 2011<br>\r\nCompatible Processors:	 Intel Core i7 Processors<br>\r\nChipset:	 Intel X79<br>\r\nSATA 6 Gb/s:	 Intel X79 Express Chipset, Marvell SE9220, Marvell SE9172<br>\r\nRAID Configurations:	 0, 1,5, 10<br>\r\nMulti GPU Support:	 Yes, AMD 3-Way CrossFireX, NVIDIA 3-Way SLI<br>\r\nAudio Channels:	 7.1<br>\r\nEthernet Features:	 10/100/1000 Mbps, Supports Wake-On-LAN, Supports PXE<br>\r\nEXPANSION SLOTS<br>\r\nPCIe x1 Slots, Generation:	 1, 2.0<br>\r\nPCIe x16 Slots, Generation:	 5, 3.0 (PCIE1/PCIE2/PCIE4/PCIE5: x8/8/8/8 mode or x16/0/16/0 mode; PCIE6: x8 mode)<br>\r\nINTERNAL I/O HEADERS<br>\r\nSATA 3 Gb/s Headers:	 4<br>\r\nSATA 6 Gb/s Headers:	 8<br>\r\nUSB 2.0 Headers:	 3<br>\r\nUSB 3.0 Headers:	 2<br>\r\nUSB 2.0 Ports, Controller:	 6<br>\r\nUSB 3.0 Ports, Controller:	 4<br>\r\neSATA Ports, Controller:	 2<br>\r\nIEEE 1394a Ports:	 1<br>\r\nRJ-45 Ethernet Jacks:	 1<br>\r\nPS/2:	 1', '2012-08-31', 0),
(35, 'Transcend DDR3 4 GB PC RAM', 4400, 'In Stock', 'Transcend ', 'TX2400KLU-4GK', 'ram', 'Memory Type:	 4 GB (8 x 256 MB) 2400 MHz DDR3 DIMM<br>\r\nMemory Standard:	 DDR3-2400/PC3-19200<br>\r\nCompatible Device:	 PC<br>\r\nPins:	 240-pin<br>\r\nBurst Length:	 4, 8<br>\r\nError Check:	 Non-ECC<br>\r\nBuffered/Unbuffered:	 Unbuffered<br>\r\nModel ID:	 TX2400KLU-4GK<br>\r\nPart Number:	 TX2400KLU-4GK<br>\r\nMemory Clock:	 1200 MHz<br>\r\nTechnology:	 DDR3 SDRAM Memory<br>\r\nCAS Latency:	 10-12-11-28<br>\r\nMemory Configuration:	 Dual Channel<br>\r\nSpecified Voltage:	 1.5 V<br>\r\nTest Voltage:	 1.65 V<br>\r\nCooling and Heatsink:	 Heatsink', '2012-08-31', 0),
(36, 'HP USB 3 Button Optical Mouse', 359, 'In Stock', 'HP', 'KY619AA', 'other product', 'Brand: 	HP<br>\r\nColor: 	Black<br>\r\nButtons: 	3<br>\r\nFeatures: 	Precision optics provide smooth and precise cursor movement on all surfaces without cleaning., Beautiful and easy to use Three-button Optical Mouse HP USB was designed for an elegant appearance, comfort and performance.<br>\r\nInterface: 	USB 2.0<br>\r\nModel: 	KY619AA<br>\r\nOS Supported: 	Windows XP, Windows Vista<br>\r\nPart Number: 	KY619AA<br>\r\nTechnology: 	Optical<br>\r\nWarranty: 	1 Year Limited Warranty<br>\r\nWeight: 	111 gm', '2012-08-31', 0),
(37, 'SanDisk 240 GB SSD Internal Hard Drive', 20496, 'In Stock', 'SanDisk', 'Ultra 240 GB', 'harddisk', 'Device:	 SSD<br>\r\nDevice Type:	 2.5 inch SSD<br>\r\nDrive Capacity:	 240 GB<br>\r\nInterface:	 SATA 3.0 Gbps<br>\r\nTransfer Rate:	 2400 Mbps<br>\r\nI/O Transfer Rate:	 2160 Mbps<br>\r\nOperating Temperature:	 0 to 60DegC<br>\r\nDimensions:	 70.6 x 9.9 x 100.5 mm<br>\r\nWeight:	 96 g<br>', '2012-08-31', 0),
(38, 'Dell Alienware M14X Laptop', 83846, 'In Stock', 'Dell ', 'M14X', 'laptop', 'Processor	Core i7 (2nd Generation)<br>\r\nVariant	2670QM<br>\r\nChipset	Mobile Intel HM65 Express<br>\r\nBrand	Intel<br>\r\nClock Speed	2.2 GHz With Turbo Boost Upto 3.1 GHz<br>\r\nCache	6 MB<br>\r\nMemory Slots	2 (Unused Slot - 0)<br>\r\nSystem Memory	4 GB DDR3<br>\r\nHardware Interface	SATA<br>\r\nRPM	5400<br>\r\nHDD Capacity	500 GB<br>\r\nOptical Drive	DVD RW Drive<br>\r\nArchitecture	64 bits<br>\r\nOperating System	Windows 7 Home Premium<br>\r\nScreen Size	14 Inch<br>\r\nScreen Type	HD WLED<br>\r\nDedicated Graphics Memory Type	DDR3<br>\r\nDedicated Graphics Memory Capacity	1.5 GB<br>\r\nGraphic Processor	NVIDIA GeForce GT 555M<br>\r\nWeb Camera	2 Megapixel<br>\r\nEthernet	Integrated 10/100/1000 Ethernet NIC<br>\r\nWireless LAN	Intel Wireless-N WiFi Link 1000<br>\r\nBluetooth	v3.0<br>\r\nBattery Backup	Upto 6 hours<br>\r\nPower Supply	65 W AC Adapter<br>\r\nBattery Cell	8 cell<br>\r\nUSB Port	2 x USB 3.0, 1 x USB 2.0<br>\r\nRJ45 LAN	Yes<br>\r\nHDMI Port	Yes, 1.4 with 3D Support<br>\r\nVGA Port	Yes<br>\r\nMulti Card Slot	9-in-1 Card Reader<br>\r\nLock Port	Yes<br>\r\nAntivirus	15 Months McAfee<br>\r\nDimension	337 x 258.34 x 37.8 mm<br>\r\nColor	Black<br>\r\nWARRANTY	1 Year, Repair or Replacement, Onsite', '2012-08-31', 0),
(39, 'Transcend DDR3 4 GB Laptop RAM ', 1181, 'In Stock', 'Transcend', 'JM1066KSN-4G', 'ram', 'DDR3-1066<br>\r\nSO-DIMM Memory Module<br>\r\n204-pin Configuration<br>\r\n5-6-7-8 CAS Latency<br>\r\n1.5 V Specified Voltage<br>\r\n533 MHz Memory Clock Speed<br>\r\n8 x 256 MB DRAM Structure', '2012-08-31', 0),
(42, 'Apple USB 2.0 Keyboard', 2600, 'IN  STOCK', 'Apple', 'MB110LL/B', 'other product', 'Brand: 	Apple<br>\r\nFeatures: 	Full-size Keys, Hot Keys Function: Volume, Optical Media Eject, Brightness, Expose, 2 x USB 2.0 Ports<br>\r\nInterface: 	USB 2.0<br>\r\nModel: 	MB110LL/B<br>\r\nMultimedia Keys: 	Yes<br>\r\nOS Supported: 	Mac OS X v10.6.8 or Later<br>\r\nPart Number: 	MB110LL/B', '2012-09-03', 1300),
(43, 'HP compact Laptop', 45000, 'IN  STOCK', 'HP', 'c234', 'laptop', 'Processor : core i3<br>\r\nRam : 2GB<br>\r\nHard disk : 500GB\r\n\r\n', '2012-09-05', 56),
(44, 'Cooler Master DI5', 262, 'IN  STOCK', 'Cooler ', '9HDSL-0L-GP', 'other product', 'Processor Fan<br>\r\n95 mm diameter Fan<br>\r\nFan with Heatsink<br>\r\nNoise Level of 22 dB<br>\r\n2200 RPM Max Fan Speed<br>', '2012-09-05', 12),
(45, 'Zotac NVIDIA Geforce GTX ', 14840, 'IN  STOCK', 'Zotac ', 'Geforce GTX 560 Ti OC Edition', 'graphicscard', '384 CUDA Cores<br>\r\n905 MHz GPU Clock Speed<br>\r\nPCI-E 2.0 x16 Bus Standard<br>\r\n1 GB GDDR5 Memory<br>\r\n1 GB GDDR5 Memory<br>\r\nNVIDIA 3D Vision Support<br>\r\n2560 x 1600 Maximum Digital Resolution<br>', '2012-09-05', 140),
(46, 'Corsair Dominator DDR3', 10545, 'IN  STOCK', 'Corsair ', 'CMD8GX3M2A2133C9', 'ram', 'DDR3-2133/PC3-17066<br>\r\nDIMM Memory Module<br>\r\n240-pin Configuration<br>\r\n9-9-9-24 CAS Latency<br>\r\n1.5 V Specified Voltage<br>\r\nDual Channel Memory Configuration<br>\r\n2 x 4 GB DRAM Structure', '2012-09-05', 2134),
(47, 'D-Link DSL-2750U Wi-Fi Router', 2562, 'IN  STOCK', 'D-Link', 'DSL-2750U', 'other product', 'High-speed Internet<br>\r\nUltimate wireless connection with maximum security<br>\r\nFirewall Protection<br>\r\nQoS Technology', '2012-09-05', 123),
(48, 'Samsung NP300V5A', 38490, 'IN  STOCK', 'Samsung ', 'NP300V5A-S0GIN', 'laptop', 'Processor Core i5 (2nd Generation)<br>\r\nVariant 2450M <br>\r\nChipset Mobile Intel HM65 Express <br>\r\nBrand Intel <br>\r\nClock Speed 2.5 GHz With Turbo Boost Upto 3.1 GHz <br>\r\nCache 3 MB <br>\r\nMemory Slots 2 (Unused Slot - 1) <br>\r\nSystem Memory 4 GB DDR3 <br>\r\nHardware Interface SATA <br>\r\nHDD Capacity 1 TB <br>\r\nOperating System Windows 7 Home Premium <br>\r\nScreen Size 15.6 Inch <br>\r\nScreen Type LED HD Anti-reflective Display <br>\r\nDedicated Graphics Memory Type DDR3 <br>\r\nDedicated Graphics Memory Capacity 1 GB <br>\r\nBluetooth v3.0 <br>\r\nPower Supply 60 W AC Adapter <br>\r\nBattery Cell 6 cell <br>\r\nUSB Port 3 x USB 2.0 <br>\r\nRJ45 LAN Yes <br>\r\nHDMI Port Yes <br>\r\nVGA Port Yes <br>\r\nMulti Card Slot Yes ', '2012-09-07', 145),
(53, 'Apple Magic Trackpad', 3795, 'IN  STOCK', 'Apple', 'Magic Trackpad', 'other product', ' Magic Trackpad gives you a whole new way to control what’s<br>\r\n on your Mac desktop computer. When you perform gestures,<br>\r\n you actually interact with what’s on your screen. You feel<br>\r\n closer to your content, and moving around feels completely<br>\r\n natural. Swiping through pages on screen is just like<br>\r\n flipping through pages in a magazine, and inertial scrolling<br>\r\n senses the momentum in your fingers as you move up and down<br>\r\n a page.', '2012-09-07', 3435),
(52, 'World of Warcraft Headphone', 9990, 'IN  STOCK', 'World of Warcra', '9012', 'other product', '\r\nOther Features: With Mic,Wireless<br>\r\n\r\nBatteries: Rechargeable Lithium-Ion<br>\r\nBattery life: Up to 8-9 hours wireless productivity.<br>\r\n\r\nJack Type: Straight<br>\r\n\r\nForm Factor: Over Ear<br>\r\nOpen & Closed Back: Closed<br>\r\n\r\nFrequency Response: 20Hz - 20kHz<br>\r\nDriver Type: Diaphragm<br>\r\nDriver Size: 40 mm<br>\r\nSound Pressure Level: 112dB<br>\r\nImpedance: 32 ohms', '2012-09-07', 2345),
(54, 'Shure SRH550DJ Headphone', 5951, 'IN  STOCK', 'Shure ', 'SRH550DJ ', 'other product', 'Wired On-the-ear Headphones<br>\r\nSupra-aural<br>\r\nClosed Headphones<br>\r\nOver-the-head Design<br>\r\n3000 mW of Max Power Input<br>\r\n50 mm Headphone Driver Units<br>\r\nNeodymium Magnet<br>\r\n5 Hz - 22000 Hz Headphone Frequency Response', '2012-09-07', 2345),
(55, 'Epson Single Function Laser Printer', 4816, 'IN  STOCK', 'Epson', 'M1200', 'other product', 'Standby Noise Level:	39 db<br>\r\nActive Noise Level:	54 dB<br>\r\nPrinting Method:	Laser<br>\r\nType:	Single Function<br>\r\nModel Name:	M1200<br>\r\nPart Number:	C11CA71001<br>\r\nPrinting Output:	Monochrome<br>\r\nFunctions:	Print<br>\r\nInternal Memory:	2 MB<br>\r\nBrand:	Epson<br>', '2012-09-11', 134),
(56, 'Samsung Single Function Laser Printer', 4906, 'IN  STOCK', 'Samsung ', 'ML 1676', 'other product', 'Active Noise Level:	49 dB<br>\r\nPrinting Method:	Laser<br>\r\nType:	Single Function<br>\r\nModel Name:	ML 1676<br>\r\nPrinting Output:	Monochrome<br>\r\nPrinter Languages:	SPL (Samsung Printer Language)<br>\r\nFunctions:	Print<br>\r\nInternal Memory:	8 MB<br>\r\nBrand:	Samsung<br>', '2012-09-11', 123);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `prod_id` varchar(10) NOT NULL COMMENT 'product Id',
  `prod_name` varchar(15) NOT NULL COMMENT 'product name',
  `quntity` int(5) NOT NULL COMMENT 'Quantity',
  `price` float NOT NULL COMMENT 'Price',
  `dateofpurchace` date NOT NULL COMMENT 'Date of Purchase',
  `manufacturer` varchar(100) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Purchase details';

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`prod_id`, `prod_name`, `quntity`, `price`, `dateofpurchace`, `manufacturer`, `catagory`) VALUES
('38', 'Dell Alienware ', 50, 3773070, '2012-09-02', 'Dell ', 'laptop'),
('14', 'Apple MacBook P', 12, 774989, '2013-01-14', 'Apple', 'laptop'),
('34', 'ASRock X79 Extr', 10, 227088, '2012-09-02', 'ASRock ', 'motherboard'),
('8', 'Mad Catz Cyborg', 17, 91477, '2014-01-25', 'Mad Catz', 'other product'),
('10', 'Apple MB829ZM/A', 64, 248960, '2012-09-06', 'Apple', 'other product'),
('11', 'Case Logic Lapt', 6, 29970, '2012-09-02', 'Case Logic', 'other product'),
('27', 'Sapphire AMD/AT', 13, 66976, '2013-01-12', 'Sapphire ', 'graphicscard'),
('16', 'Apotop DDR3 4 G', 2, 2786, '2013-01-13', 'Apotop ', 'ram'),
('12', 'Apple MacBook A', 8, 541592, '2012-09-05', 'Apple', 'laptop'),
('36', 'HP USB 3 Button', 1, 359, '2012-09-03', 'HP', 'other product'),
('5', 'Lenovo ThinkCen', 10, 503440, '2012-09-03', 'Lenovo', 'computer'),
('7', 'Altec Lansing M', 7, 66150, '2014-01-25', 'Altec Lansing', 'other product'),
('2', 'Hp z1 Workstati', 1, 109945, '2012-09-03', 'HP', 'computer'),
('42', 'Apple USB 2.0 K', 4, 10400, '2012-09-05', 'Apple', 'other product'),
('24', 'Gigabyte GA-X79', 4, 65720, '2012-09-04', 'Gigabyte ', 'motherboard'),
('22', 'EVGA X79 SLI Mo', 1, 20116, '2012-09-05', 'EVGA ', 'motherboard'),
('44', 'Cooler Master D', 1, 262, '2012-09-06', 'Cooler ', 'other product'),
('9', 'Logitech PN 981', 1, 6924, '2012-09-06', 'Logitech', 'other product'),
('55', 'Epson Single Fu', 6, 28896, '2014-01-25', 'Epson', 'other product'),
('53', 'Apple Magic Tra', 6, 22770, '2013-11-17', 'Apple', 'other product'),
('43', 'HP compact Lapt', 2, 90000, '2013-11-16', 'HP', 'laptop'),
('4', 'Lenovo Essentia', 3, 73110, '2013-01-13', 'Lenovo', 'computer'),
('52', 'World of Warcra', 2, 19980, '2013-11-17', 'World of Warcra', 'other product'),
('56', 'Samsung Single ', 3, 14718, '2014-01-25', 'Samsung ', 'other product');

-- --------------------------------------------------------

--
-- Table structure for table `registerdetail`
--

CREATE TABLE IF NOT EXISTS `registerdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL COMMENT 'Full Name',
  `lname` varchar(15) NOT NULL COMMENT 'Last Name',
  `password` varchar(15) NOT NULL COMMENT 'password',
  `username` varchar(15) NOT NULL COMMENT 'Username',
  `gender` varchar(1) NOT NULL DEFAULT 'M' COMMENT 'Gender',
  `dob` date NOT NULL COMMENT 'Date of Birth',
  `mobileno` varchar(10) NOT NULL COMMENT 'Mobile Number',
  `email` varchar(30) NOT NULL COMMENT 'E-mail',
  `country` varchar(15) NOT NULL COMMENT 'Country',
  `state` varchar(15) NOT NULL COMMENT 'State',
  `city` varchar(15) NOT NULL COMMENT 'City',
  `Address` varchar(100) NOT NULL COMMENT 'Address',
  `date_added` date NOT NULL,
  `buyed` varchar(1000) NOT NULL,
  `datebuyed` date NOT NULL,
  `last_log_date` datetime NOT NULL,
  `confirm` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Registration Details' AUTO_INCREMENT=69 ;

--
-- Dumping data for table `registerdetail`
--

INSERT INTO `registerdetail` (`id`, `fname`, `lname`, `password`, `username`, `gender`, `dob`, `mobileno`, `email`, `country`, `state`, `city`, `Address`, `date_added`, `buyed`, `datebuyed`, `last_log_date`, `confirm`) VALUES
(15, 'mohit', 'amgaonkar', 'mohit', 'mohit', 'm', '1991-06-21', '9898989898', 'admin@mohitblogs.org', 'india', 'mp', 'Munbai', 'sadkbxckvjbkregfdsxz', '2012-09-04', '<br>Altec Lansing MX6021E<br>Apple MB829ZM/A Wireless Mouse<br>Mad Catz Cyborg R.A.T. 5 Gaming Mouse<br>Altec Lansing MX6021E<br>Apple MB829ZM/A Wireless Mouse<br>Mad Catz Cyborg R.A.T. 5 Gaming Mouse<br>Apple Magic Trackpad<br>Altec Lansing MX6021E<br>Mad Catz Cyborg R.A.T. 5 Gaming Mouse<br>Epson Single Function Laser Printer<br>Apotop DDR3 4 GB PC RAM (DDR3-1333 U-DIMM)<br>Apple Magic Trackpad<br>Samsung Single Function Laser Printer<br>Altec Lansing MX6021E<br>Mad Catz Cyborg R.A.T. 5 Gaming Mouse<br>Epson Single Function Laser Printer<br>Samsung Single Function Laser Printer<br>Altec Lansing MX6021E<br>Mad Catz Cyborg R.A.T. 5 Gaming Mouse<br>Epson Single Function Laser Printer', '2014-01-25', '2014-01-25 02:55:39', 1),
(12, 'pri', 'amgaonkar', 'oshin', 'oshin', 'f', '1991-10-21', '7276671869', 'gurdeepashish@gmail.com', 'india', 'Maharashtra', 'Nagpur', 'jawahar nagar        ', '2012-09-04', '<br>Apple USB 2.0 Keyboard<br>Gigabyte GA-X79-UD3 Motherboard<br>Sapphire AMD/ATI Radeon HD 6670 1 GB DDR3 Graphics<br>Apple USB 2.0 Keyboard<br>Gigabyte GA-X79-UD3 Motherboard<br>Sapphire AMD/ATI Radeon HD 6670 1 GB DDR3 Graphics<br>Apple USB 2.0 Keyboard<br>Mad Catz Cyborg R.A.T. 5 Gaming Mouse<br>EVGA X79 SLI Motherboard', '2012-09-05', '2012-09-06 04:18:03', 1),
(58, 'mohit', 'amgaonkar', '12345', 'kirakira', 'm', '2012-10-01', '9404365989', 'mohitjob1@gmail.com', '', '', '', '        ', '2012-10-19', '', '0000-00-00', '0000-00-00 00:00:00', 1),
(16, 'test', 'test', 'test123', 'test123', 'm', '1980-01-01', '9845440435', 'pradeep@tectrendz.com', 'india', 'karnataka', 'bangalore', 'test        ', '2012-09-05', '', '0000-00-00', '2012-09-05 12:24:12', 1),
(17, 'gaurav', 'vishwakarma', '099759929270', 'gaurav', 'm', '1990-09-28', '7276171196', 'gaurav.vishwakarma54@gmail.com', 'india', 'maharastra', 'nagpur', '        fgfeghdhdh', '2012-09-05', '', '0000-00-00', '2012-09-05 08:34:55', 1),
(18, 'MD', 'SHEIKH', 'BALLARPUR', 'SHOAIB', 'm', '1990-09-17', '8446031039', 'sheikhshoaib718@gmail.com', 'india', 'maharashtra', 'nagpur', '        ', '2012-09-05', '<br>Apple MacBook Air 11-inch<br>Apple USB 2.0 Keyboard', '2012-09-05', '2012-09-05 08:08:26', 1),
(19, 'Rohan', 'Agashe', 'rohan', 'Rohan', 'm', '1990-11-04', '8087372780', 'rohan_pce@yahoo.com', 'india', 'maharashtra', 'nagpur', 'medical sq.', '2012-09-05', '', '0000-00-00', '0000-00-00 00:00:00', 1),
(20, 'Anant', 'Khadatkar', 'jamesbond007', 'ananta007', 'm', '1991-09-22', '9561134328', 'ananta.khadatkar0@gmail.com', 'india', 'maharashtra', 'nagpur', '        Kashi nagar, rameshwari,ring road, nagpur 440027', '2012-09-05', '', '0000-00-00', '2012-09-05 09:11:57', 1),
(22, 'sagar', '', 'sagarkakde', 'sagarkakde', 'm', '1990-06-29', '9096402468', 'skkakde@yahoo.com', 'Ind', '', '', '        ', '2012-09-05', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(24, 'aaaaaaaa', 'aa', 'madmad', 'pagal', 'm', '2000-12-12', '9890929234', 'ashghatbandhe@rediffmail.com', 'India', '', '', '        ', '2012-09-05', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(25, 'aaaaaaaa', 'aa', '789456', 'pagal123', 'm', '2000-12-12', '9890929234', 'ash@rediffmail.com', 'India', 'mh', 'ngp', 'jkkjbf  k jjklf bkjgk         ', '2012-09-05', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(26, 'ANIMESH', 'JAIN', '9325176138', 'RIDER', '', '0000-00-00', '', '', '', '', '', '        ', '2012-09-06', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(27, 'Pratik', 'Jiwane', 'Pratik', 'Pratik', 'm', '2012-09-29', '8421014445', 'pratik0012@gmail.com', 'india', 'maharashtra', 'nagpur', '        chandan nagar nagpur', '2012-09-06', '<br>Cooler Master DI5<br>Apple MB829ZM/A Wireless Mouse<br>Logitech PN 981-000116 Headset', '2012-09-06', '2012-09-06 01:35:09', 1),
(28, 'vikas', 'kushwava', 'vikas', 'vikas', 'm', '1991-10-10', '12341234', '1234@sdf', 'asdf', 'asdf', 'asdf', '        asdf', '2012-09-06', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(29, 'Param', 'Lulle', 'Lulle', 'Param', 'm', '1987-06-09', '9730132838', 'prem.lulle143@gmail.com', 'India', 'Maharashtra', 'Pune', 'Kothrud,pune        ', '2012-09-06', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(30, 'sadsa', 'asda', 'abcd12345', 'sada', 'm', '1111-11-11', '1231432421', 'ddasa@dasdas.com', 'aasdad', 'sadas', 'sads', 'dsadsad        ', '2012-09-06', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(31, 'sdas', 'dsadsa', 'abcd12345', 'abcd', 'm', '1233-11-11', '1231432421', 'dasasda@dasda.com', 'asdasd', 'sadas', 'dasdas', 'adasd        ', '2012-09-06', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(32, 'Gur', 'suri', 'jabed123', 'gss123', 'm', '1991-02-02', '1234567890', 'gmail@gmail.com', 'india', 'maharashtra', 'mumbai', 'friends colony        ', '2012-09-06', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(33, 'Gurdeep Singh S', 'suri', 'abcdefg123', 'gss234', 'm', '1991-02-02', '1234567890', 'gs_s786@yahoo.com', 'india', 'maharashtra', 'mumbai', 'katol road        ', '2012-09-06', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(34, 'Kiran', 'Dhapodkar', '9021302318', 'kdkiran', 'm', '1990-10-24', '8087427472', 'kdkiran840@gmail.com', 'INDIA', 'Maharashtra', 'Nagpur', '        159,Revati Nagar , Besa , Nagpur', '2012-09-06', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(35, 'mohit', 'mohit', 'mohit', 'mohitas', 'm', '0000-00-00', '9898989898', 'animeshjain@gzxcv.com', '', '', '', '        ', '2012-09-06', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(36, 'mohit', 'amgaonkar', 'asdf', 'asdfgdsfg', 'm', '1991-06-12', '1234567890', 'gmail@gmaizl.com', 'fdafa', 'asdf', 'fdsgfdg', '       zxcvzxcv', '2012-09-06', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(40, 'manish', 'rathi', 'papababa', 'manish', 'm', '1991-09-09', '8149063965', 'manishrth06@gmail.com', 'india', 'maharastra', 'nagpur', '        nandanvan main road nagpur-9', '2012-09-08', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(43, 'Yeshwant', 'Wasnik', '120319992', 'yeshwant', 'm', '1992-03-12', '9028365572', 'jitu12392@gmail.com', 'india', 'Maharashtra', 'Nagpur', '        E.W.S,48,4/7,Rambagh Colony Medical Square Nagpur ', '2012-09-08', '', '0000-00-00', '2012-09-08 05:57:27', 1),
(44, 'swapnil', 'samrit', '4350', 'swap', 'm', '1990-07-12', '8087346382', 'swapnilsamrit8@gmail.com', 'india', 'maharashtra', 'ngp', '        dfsdf', '2012-09-12', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(45, 'guri', 'suri', 'abcdefg', 'guri123', 'm', '1991-02-02', '1234567890', 'gurdeep786@gmail.com', 'india', 'maharashtra', 'mumbai', 'asdfasfgsafasdf        ', '2012-09-12', '<br>HP compact Laptop<br>Sapphire AMD/ATI Radeon HD 6670 1 GB DDR3 Graphics<br>Lenovo Essential C200<br>Samsung Single Function Laser Printer<br>Apple MacBook Pro 13.3-Inch Laptop<br>Apple MacBook Pro 13.3-Inch Laptop', '2013-01-14', '2013-01-14 00:05:31', 1),
(46, 'ashish', 'Ghatbandhe', '123456', 'greatmohit', 'm', '1989-12-05', '9890929234', 'ashishghatbandhe12@gmail.com', 'India', 'mh', 'ngp', '        hkhjfdjkhhjhfjdjn kk kjkhjj', '2012-09-12', '<br>Epson Single Function Laser Printer<br>Mad Catz Cyborg R.A.T. 5 Gaming Mouse', '2012-09-12', '2012-09-12 02:33:26', 1),
(60, 'Sonpreet', 'Kaur', 'sonpreet', 'Sonpreet29', 'f', '2012-10-03', '9005521770', 'sonpreet29@gmail.com', 'India', 'Maharashtra', 'Vashi', 'B-2/8-5 , sector 16         ', '2012-10-19', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(61, 'Sonpreet', 'Kaur', 'sonpreet', 'Sonpreet1', 'f', '2012-10-10', '9005521770', 'sonpreet29@yahoo.com', 'india', 'Maharashtra', 'Vashi', '        ', '2012-10-19', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(59, 'praful', 'pusadkar', '12345', 'praful', 'm', '0000-00-00', '8446420567', 'ppusadkar96@gmail.com', '', '', '', '        ', '2012-10-19', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(53, 'asdfuhjk', 'asdfjhjkahsfd', '12345', 'asdflhasdf', 'm', '2012-10-25', '7276671866', 'pradeeppatel@gmail.com', 'fdafa', '', '', '        ', '2012-10-19', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(62, 'krunal', 'nandekar', 'krunal123', 'krunal', 'm', '0000-00-00', '8275394758', 'krunalnandekar@ymail.com', 'india', 'maharashtra', 'nagpur', 'narendra nagar        ', '2012-12-07', '', '0000-00-00', '2012-12-07 09:46:34', 1),
(63, 'pranay', 'shahu', 'pranay13579', 'pranayshahu', 'm', '1991-01-31', '9404365989', 'pranayshahu@gmail.com', 'india', 'Maharashtra', 'Nagpur', 'friends colony katol naka        ', '2012-12-08', '', '0000-00-00', '0000-00-00 00:00:00', 0),
(64, 'pranay', 'shahu', 'pranay13579', 'pranayshahu1', 'm', '1991-01-31', '9404365989', 'pranayshahu1@gmail.com', 'india', 'Maharashtra', 'Nagpur', 'friends colony        ', '2012-12-08', '', '0000-00-00', '2012-12-09 04:49:31', 1),
(65, 'priyanka', 'bissa', 'priyanka', 'priyanka', 'f', '1990-02-13', '9561309092', 'bissapriyanka.1390@gmail.com', '', '', '', '      wardhamannagar  ', '2012-12-18', '', '0000-00-00', '2012-12-18 11:22:35', 1),
(67, 'rohitqw', 'asdfsdf', '12345', 'rohitrohit', 'm', '2013-01-16', '8087909069', 'rohitjapulkar@gmail.com', 'sdrfgsa', '', '', '        ', '2013-01-13', '<br>World of Warcraft Headphone', '2013-01-13', '2013-01-13 23:54:44', 1),
(68, 'pranay', 'khob', 'pranay', 'pranay', 'm', '2013-11-01', '8983194526', 'pranayk7@gmail.com', 'india', 'maharashtra', 'mumbhai', '        ', '2013-11-13', '<br>Epson Single Function Laser Printer<br>HP compact Laptop<br>Apple Magic Trackpad<br>World of Warcraft Headphone', '2013-11-17', '2014-05-05 02:40:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_login`
--

CREATE TABLE IF NOT EXISTS `sales_login` (
  `said` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `last_log_date` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` bigint(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `last_logout_date` datetime NOT NULL,
  PRIMARY KEY (`said`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sales_login`
--

INSERT INTO `sales_login` (`said`, `username`, `password`, `last_log_date`, `name`, `email`, `mobileno`, `city`, `state`, `address`, `last_logout_date`) VALUES
(2, 'vikas', 'vikas', '2012-09-02 00:00:00', 'vikas', 'mohithamgaonkar@yahoo.in', 1234567890, 'Nagpur', 'Maharashtra', 'kahya', '0000-00-00 00:00:00'),
(3, 'mohit', 'mohit', '2013-08-04 21:58:26', 'mohit', 'mohithamgaonkar@yahoo.in', 7276671866, 'Nagpur', 'Maharashtra', 'jawahar nagar', '2012-09-28 22:07:16'),
(4, 'vijay', 'vijay', '0000-00-00 00:00:00', 'vijay', 'asdf', 1234, 'asdf', 'asdf', 'asdf', '0000-00-00 00:00:00'),
(5, 'vaishali', 'vaishali', '2012-09-05 03:11:17', 'vaishali  Amgaonkar', 'gurdeepashish@gmail.com', 8934567887, 'Nagpur', 'Maharashtra', 'sdfvxcbfgnndfxvcbx', '0000-00-00 00:00:00'),
(6, 'gurdeep', 'abcd123', '2013-01-12 22:51:33', 'Gurdeep', 'gurdeep786@gmail.com', 1234567890, 'mumbai', 'maharashtra', 'dsfsdafsafs', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_table`
--

CREATE TABLE IF NOT EXISTS `sales_table` (
  `bid` int(15) NOT NULL AUTO_INCREMENT,
  `product` varchar(1000) NOT NULL,
  `purchased_on` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'in process',
  `state` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `delivered_on` date NOT NULL,
  `mobileno` int(200) NOT NULL,
  `price` int(200) NOT NULL,
  `quantity` int(200) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `sales_table`
--

INSERT INTO `sales_table` (`bid`, `product`, `purchased_on`, `email`, `address`, `status`, `state`, `city`, `country`, `fname`, `lname`, `delivered_on`, `mobileno`, `price`, `quantity`) VALUES
(1, 'iMac', '2012-08-30', 'mohithamgaonkar@gmail.com', 'myaddress', 'done', 'maharahstra', 'nagpur', 'india', 'mohit', 'amgaonkar', '2012-08-31', 0, 0, 0),
(13, 'Dell Alienware M14X Laptop', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'done', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '2012-09-02', 2147483647, 0, 0),
(14, 'Apple MacBook Pro 13.3-Inch Laptop', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(15, 'ASRock X79 Extreme9 Motherboard', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(16, 'Mad Catz Cyborg R.A.T. 5 Gaming Mouse', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(17, 'Apple MB829ZM/A Wireless Mouse', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(18, 'Dell Alienware M14X Laptop', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(19, 'Apple MacBook Pro 13.3-Inch Laptop', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(20, 'ASRock X79 Extreme9 Motherboard', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(21, 'Mad Catz Cyborg R.A.T. 5 Gaming Mouse', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(22, 'Apple MB829ZM/A Wireless Mouse', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(23, 'Case Logic Laptop Backpack', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(24, 'Sapphire AMD/ATI Radeon HD 6670 1 GB DDR3 Graphics', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 0, 0),
(25, 'Apotop DDR3 4 GB PC RAM (DDR3-1333 U-DIMM)', '2012-09-02', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'done', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '2012-09-02', 2147483647, 1393, 0),
(26, 'Apple MacBook Air 11-inch', '2012-09-03', 'mohithamgaonkar@yahoo.in', 'nosdfghzxcviojlnkzxcjl', 'in process', 'sdfgczxvb', 'mohijjcxi', 'xoicv', 'mohit', 'amgaonkar', '2012-09-03', 2147483647, 473893, 0),
(27, 'HP USB 3 Button Optical Mouse', '2012-09-03', 'mohithamgaonkar@yahoo.in', 'jawahar', 'done', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '2012-09-03', 2147483647, 359, 0),
(28, 'Apple MB829ZM/A Wireless Mouse', '2012-09-03', 'mohithamgaonkar@yahoo.in', 'jawahar', 'done', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '2012-09-03', 2147483647, 237290, 0),
(29, 'Lenovo ThinkCentre M90z', '2012-09-03', 'mohithamgaonkar@yahoo.in', 'jawahar', 'done', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '2012-09-03', 2147483647, 251720, 5),
(30, 'Altec Lansing MX6021E', '2012-09-03', 'mohithamgaonkar@yahoo.in', 'jawahar', 'in process', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 9450, 1),
(31, 'Lenovo ThinkCentre M90z', '2012-09-03', 'mohithamgaonkar@yahoo.in', 'jawahar', 'in process', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 503440, 5),
(32, 'Altec Lansing MX6021E', '2012-09-03', 'mohithamgaonkar@yahoo.in', 'jawahar', 'in process', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 18900, 1),
(33, 'Hp z1 Workstation', '2012-09-03', 'mohithamgaonkar@yahoo.in', 'jawahar', 'in process', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 109945, 1),
(34, 'Altec Lansing MX6021E', '2012-09-04', 'mohithamgaonkar@yahoo.in', 'gsdfojpjibncxoixc        ', 'in process', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '2012-09-05', 2147483647, 28350, 1),
(35, 'Apple MB829ZM/A Wireless Mouse', '2012-09-04', 'mohithamgaonkar@yahoo.in', 'gsdfojpjibncxoixc        ', 'done', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '2012-09-05', 2147483647, 241180, 1),
(36, 'Mad Catz Cyborg R.A.T. 5 Gaming Mouse', '2012-09-04', 'mohithamgaonkar@yahoo.in', 'gsdfojpjibncxoixc        ', 'done', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '2012-09-05', 2147483647, 59191, 1),
(37, 'Altec Lansing MX6021E', '2012-09-04', 'mohithamgaonkar@yahoo.in', 'gsdfojpjibncxoixc        ', 'in process', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 37800, 1),
(38, 'Apple MB829ZM/A Wireless Mouse', '2012-09-04', 'mohithamgaonkar@yahoo.in', 'gsdfojpjibncxoixc        ', 'in process', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 245070, 1),
(39, 'Mad Catz Cyborg R.A.T. 5 Gaming Mouse', '2012-09-04', 'mohithamgaonkar@yahoo.in', 'gsdfojpjibncxoixc        ', 'in process', 'Maharashtra', 'Nagpur', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 64572, 1),
(49, 'Apple MacBook Air 11-inch', '2012-09-05', 'sheikhshoaib718@gmail.com', '        ', 'in process', 'maharashtra', 'nagpur', 'india', 'MD', 'SHEIKH', '0000-00-00', 2147483647, 541592, 1),
(50, 'Apple USB 2.0 Keyboard', '2012-09-05', 'sheikhshoaib718@gmail.com', '        ', 'in process', 'maharashtra', 'nagpur', 'india', 'MD', 'SHEIKH', '0000-00-00', 2147483647, 10400, 1),
(51, 'Cooler Master DI5', '2012-09-06', 'pratik0012@gmail.com', '        chandan nagar nagpur', 'done', 'maharashtra', 'nagpur', 'india', 'Pratik', 'Jiwane', '2012-09-06', 2147483647, 262, 1),
(52, 'Apple MB829ZM/A Wireless Mouse', '2012-09-06', 'pratik0012@gmail.com', '        chandan nagar nagpur', 'in process', 'maharashtra', 'nagpur', 'india', 'Pratik', 'Jiwane', '0000-00-00', 2147483647, 248960, 1),
(53, 'Logitech PN 981-000116 Headset', '2012-09-06', 'pratik0012@gmail.com', '        chandan nagar nagpur', 'in process', 'maharashtra', 'nagpur', 'india', 'Pratik', 'Jiwane', '0000-00-00', 2147483647, 6924, 1),
(54, 'Epson Single Function Laser Printer', '2012-09-12', 'ashishghatbandhe12@gmail.com', '        hkhjfdjkhhjhfjdjn kk kjkhjj', 'done', 'mh', 'ngp', 'India', 'ashish', 'Ghatbandhe', '2012-09-17', 2147483647, 4816, 1),
(55, 'Mad Catz Cyborg R.A.T. 5 Gaming Mouse', '2012-09-12', 'ashishghatbandhe12@gmail.com', '        hkhjfdjkhhjhfjdjn kk kjkhjj', 'in process', 'mh', 'ngp', 'India', 'ashish', 'Ghatbandhe', '0000-00-00', 2147483647, 75334, 1),
(56, 'Apple Magic Trackpad', '2012-10-20', 'mohithamgaonkar@yahoo.in', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 15180, 4),
(57, 'Altec Lansing MX6021E', '2012-10-20', 'mohithamgaonkar@yahoo.in', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 47250, 1),
(58, 'Mad Catz Cyborg R.A.T. 5 Gaming Mouse', '2012-10-20', 'mohithamgaonkar@yahoo.in', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 80715, 1),
(59, 'HP compact Laptop', '2013-01-12', 'gurdeep786@gmail.com', 'asdfasfgsafasdf        ', 'in process', 'maharashtra', 'mumbai', 'india', 'guri', 'suri', '0000-00-00', 1234567890, 45000, 1),
(60, 'Sapphire AMD/ATI Radeon HD 6670 1 GB DDR3 Graphics', '2013-01-12', 'gurdeep786@gmail.com', 'asdfasfgsafasdf        ', 'done', 'maharashtra', 'mumbai', 'india', 'guri', 'suri', '2013-01-13', 1234567890, 66976, 1),
(61, 'Lenovo Essential C200', '2013-01-13', 'gurdeep786@gmail.com', 'asdfasfgsafasdf        ', 'in process', 'maharashtra', 'mumbai', 'india', 'guri', 'suri', '0000-00-00', 1234567890, 73110, 3),
(62, 'Epson Single Function Laser Printer', '2013-01-13', 'mohithamgaonkar@yahoo.in', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 9632, 1),
(63, 'Apotop DDR3 4 GB PC RAM (DDR3-1333 U-DIMM)', '2013-01-13', 'mohithamgaonkar@yahoo.in', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 2786, 1),
(64, 'Apple Magic Trackpad', '2013-01-13', 'mohithamgaonkar@yahoo.in', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 18975, 1),
(65, 'World of Warcraft Headphone', '2013-01-13', 'rohitjapulkar@gmail.com', '        ', 'in process', '', '', 'sdrfgsa', 'rohitqw', 'asdfsdf', '0000-00-00', 2147483647, 9990, 1),
(66, 'Samsung Single Function Laser Printer', '2013-01-14', 'gurdeep786@gmail.com', 'asdfasfgsafasdf        ', 'done', 'maharashtra', 'mumbai', 'india', 'guri', 'suri', '2013-08-04', 1234567890, 4906, 1),
(67, 'Apple MacBook Pro 13.3-Inch Laptop', '2013-01-14', 'gurdeep786@gmail.com', 'asdfasfgsafasdf        ', 'in process', 'maharashtra', 'mumbai', 'india', 'guri', 'suri', '0000-00-00', 1234567890, 769990, 1),
(68, 'Apple MacBook Pro 13.3-Inch Laptop', '2013-01-14', 'gurdeep786@gmail.com', 'asdfasfgsafasdf        ', 'in process', 'maharashtra', 'mumbai', 'india', 'guri', 'suri', '0000-00-00', 1234567890, 774989, 1),
(69, 'Epson Single Function Laser Printer', '2013-11-16', 'pranayk7@gmail.com', '        ', 'in process', 'maharashtra', 'mumbhai', 'india', 'pranay', 'khob', '0000-00-00', 2147483647, 19264, 2),
(70, 'HP compact Laptop', '2013-11-16', 'pranayk7@gmail.com', '        ', 'in process', 'maharashtra', 'mumbhai', 'india', 'pranay', 'khob', '0000-00-00', 2147483647, 90000, 1),
(71, 'Apple Magic Trackpad', '2013-11-17', 'pranayk7@gmail.com', '        ', 'in process', 'maharashtra', 'mumbhai', 'india', 'pranay', 'khob', '0000-00-00', 2147483647, 22770, 1),
(72, 'World of Warcraft Headphone', '2013-11-17', 'pranayk7@gmail.com', '        ', 'in process', 'maharashtra', 'mumbhai', 'india', 'pranay', 'khob', '0000-00-00', 2147483647, 19980, 1),
(73, 'Samsung Single Function Laser Printer', '2014-01-25', 'mohithamgaonkar@yahoo.in', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 9812, 1),
(74, 'Altec Lansing MX6021E', '2014-01-25', 'mohithamgaonkar@yahoo.in', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 56700, 1),
(75, 'Mad Catz Cyborg R.A.T. 5 Gaming Mouse', '2014-01-25', 'mohithamgaonkar@yahoo.in', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 86096, 1),
(76, 'Epson Single Function Laser Printer', '2014-01-25', 'mohithamgaonkar@yahoo.in', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 24080, 1),
(77, 'Samsung Single Function Laser Printer', '2014-01-25', 'admin@mohitblogs.org', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 14718, 1),
(78, 'Altec Lansing MX6021E', '2014-01-25', 'admin@mohitblogs.org', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 66150, 1),
(79, 'Mad Catz Cyborg R.A.T. 5 Gaming Mouse', '2014-01-25', 'admin@mohitblogs.org', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 91477, 1),
(80, 'Epson Single Function Laser Printer', '2014-01-25', 'admin@mohitblogs.org', 'sadkbxckvjbkregfdsxz', 'in process', 'mp', 'Munbai', 'india', 'mohit', 'amgaonkar', '0000-00-00', 2147483647, 28896, 1);

-- --------------------------------------------------------

--
-- Table structure for table `support_login`
--

CREATE TABLE IF NOT EXISTS `support_login` (
  `sid` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `last_log_date` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` bigint(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `last_logout_date` datetime NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `support_login`
--

INSERT INTO `support_login` (`sid`, `username`, `password`, `last_log_date`, `name`, `email`, `mobileno`, `city`, `state`, `address`, `last_logout_date`) VALUES
(2, 'mohit', 'mohit', '2013-08-04 21:59:35', 'mohit amgaonkar', 'mohithamgaonkar@gmail.com', 7276671866, 'nagpur', 'maharahstra', 'jawahar nagar', '2013-01-12 22:50:17'),
(3, 'vikas', 'vikas', '2012-09-02 00:00:00', 'vikas', 'vikas@gmail.com', 9898982132, 'nagpur', 'Maharashtra', 'khaya', '0000-00-00 00:00:00'),
(4, 'VIJAY', '', '2012-09-02 00:00:00', 'vijay', 'vijay@gmIL', 0, '', '', '', '0000-00-00 00:00:00'),
(5, 'vaishali', 'vaishali', '2012-09-05 03:12:41', 'vaishali  Amgaonkar', 'gurdeepashish@gmail.com', 7276671869, 'Nagpur', 'Maharashtra', 'fsdbxcvbnfgnd', '0000-00-00 00:00:00'),
(6, 'gurdeep', 'abcdefg', '2013-01-12 22:58:47', 'Gurdeep', 'gurdeep786@gmail.com', 1234567890, 'mumbai', 'maharashtra', 'dsfasdfasdfasd', '2013-01-12 22:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `support_table`
--

CREATE TABLE IF NOT EXISTS `support_table` (
  `suid` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `productname` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `mobileno` bigint(100) NOT NULL,
  `query` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'in process',
  `complain_date` datetime NOT NULL,
  `resolved_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`suid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `support_table`
--

INSERT INTO `support_table` (`suid`, `name`, `productname`, `email`, `mobileno`, `query`, `status`, `complain_date`, `resolved_on`) VALUES
(1, 'mohit', 'dell', 'mohithamgaonkar@gmail.com', 2147483647, 'worst laptop', 'done', '2012-09-19 00:00:00', '2013-01-12 00:00:00'),
(2, 'mohit amgaonkar', 'dell11', 'mohithamgaonkar@yahoo.in', 1234567890, 'sfasdfasdfaf', 'in process', '2012-09-01 00:00:00', '2012-09-05 00:00:00'),
(3, 'mohit amgaonkar', 'Apple New Product', 'mohithamgaonkar@yahoo.in', 9898982132, 'asdgasdgdfagsdfg', 'done', '2012-09-03 23:19:52', '2013-01-12 00:00:00'),
(5, 'mohit amgaonkar', 'Apple New Product', 'mohithamgaonkar@yahoo.in', 9898989898, 'sabxcuvkblkxcvoihweb,bxcvxzb', 'in process', '2012-09-06 04:10:55', '0000-00-00 00:00:00'),
(8, 'mohit amgaonkar', 'this site ', 'mohithamgaonkar@yahoo.in', 9898989898, 'this is gerat', 'done', '2012-10-20 02:51:35', '2013-01-12 00:00:00'),
(9, 'guri suri', ' hp laptop', 'gurdeep786@gmail.com', 1234567890, 'not working', 'in process', '2013-01-12 22:56:24', '0000-00-00 00:00:00'),
(10, 'guri suri', 'logitech headset', 'gurdeep786@gmail.com', 1234567890, 'headset is not good ', 'in process', '2013-01-12 22:56:56', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
