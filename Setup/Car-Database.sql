-- phpMyAdmin SQL Dump
-- http://www.phpmyadmin.net

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `strobe_cmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `SIT_car_cars`
--

CREATE TABLE IF NOT EXISTS `SIT_car_cars` (
  `id` int(11) NOT NULL auto_increment,
  `vehicle` varchar(3) collate latin1_general_ci NOT NULL,
  `make` varchar(32) collate latin1_general_ci NOT NULL,
  `model` varchar(32) collate latin1_general_ci NOT NULL,
  `year` varchar(4) collate latin1_general_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `vat` varchar(2) collate latin1_general_ci NOT NULL,
  `fuel` varchar(32) collate latin1_general_ci NOT NULL,
  `transmission` varchar(32) collate latin1_general_ci NOT NULL,
  `colour` varchar(32) collate latin1_general_ci NOT NULL,
  `minidescription` text collate latin1_general_ci NOT NULL,
  `features` text collate latin1_general_ci NOT NULL,
  `fulldescription` longtext collate latin1_general_ci NOT NULL,
  `miles` varchar(10) collate latin1_general_ci NOT NULL,
  `inven_num` varchar(16) collate latin1_general_ci NOT NULL,
  `pic1` varchar(32) collate latin1_general_ci NOT NULL,
  `pic2` varchar(32) collate latin1_general_ci NOT NULL,
  `pic3` varchar(32) collate latin1_general_ci NOT NULL,
  `pic4` varchar(32) collate latin1_general_ci NOT NULL,
  `pic5` varchar(32) collate latin1_general_ci NOT NULL,
  `pic6` varchar(32) collate latin1_general_ci NOT NULL,
  `special` varchar(7) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=308 ;

--
-- Dumping data for table `SIT_car_cars`
--

INSERT INTO `SIT_car_cars` (`id`, `vehicle`, `make`, `model`, `year`, `price`, `vat`, `fuel`, `transmission`, `colour`, `minidescription`, `features`, `description`, `miles`, `inven_num`, `pic1`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `special`) VALUES
(305, 'CAR', 'Mazda', 'Mazda 2', '2012', '8295', '', 'Petrol', 'Manual', 'Grey Metalic', 'Mazda 2 Venture Edition', 'ABS,Air Conditioning,Alloy Wheels,Drivers Airbag,Electric Windows,Electric Mirrors,Full Service History,Mettalic Paint,Sat Nav,Passenger Air Bag,Power Steering,Remote Locking', '<p><span style="font-size: medium;"><strong>With a Full service history and only 1 Owner from new this smart little compact has all you want. It has remote central locking power steering and sat nav. Ideal second car or small family car</strong></span></p>', '19300', 'WF62 KBJ', 'c305p1.JPG', 'c305p2.JPG', 'c305p3.JPG', 'c305p4.JPG', 'c305p5.JPG', 'c305p6.JPG', ''),
(263, 'CAR', 'Renault', 'Clio 1.5Td Estate', '2008', '5295', '', 'Diesel', '5 speed manual', 'Red Metalic', 'Clio 1,5 Td Dynamique Estate', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Central Locking,Cloth Upholstery,Onboard Computer,Electric Windows,Electric Mirrors,Full Service History,Folding Rear Seats,Locking Wheel Nut,Mettalic Paint,Parking Sensors,Passenger Air Bag,Power Steering,Remote Locking,Roof Rails,Radio / CD,Side Air Bags,Tinted Glass', '<p><strong><span style="font-size: medium;">VERY USEABLE SUPER MINI ESTATE WITH LOW RUNNING COSTS. SPEC INCLUDES AIR CON , REMOTE LOCKING ,ALLOYS , RADIO/CD , ELECTRIC MIRRORS AND WINDOWS , ROOF RAILS AND MORE&nbsp; ONLY &pound;30 RFL</span></strong></p>', '58980', 'CE58FZK', 'c263p1.JPG', 'c263p2.JPG', 'c263p3.JPG', 'c263p4.JPG', 'c263p5.JPG', 'c263p6.JPG', ''),
(307, 'CAR', 'Renault', 'Grand Modus 1.5 DCi', '2011', '7495', '', 'Diesel', 'Manual', 'Ice Blue Met', 'Grand Modus 1.5 DCi Dynamique', 'ABS,Air Conditioning,Alloy Wheels,Anti Theft System,Drivers Airbag,Electric Windows,Electric Mirrors,Full Service History,Folding Rear Seats,Mettalic Paint,Passenger Air Bag,Power Steering,Remote Locking,Radio / CD,Side Air Bags', '<p><span style="font-size: medium;"><strong>This low mileage Grand Modus offers fantastic MPG low tax costs with the maxium space possible from a small car. With a good sized boot and good head room its an ideal choice if your after space but dont want a big car</strong></span></p>', '7800', 'BF11FEH', 'c307p1.JPG', 'c307p2.JPG', 'c307p3.JPG', 'c307p4.JPG', 'c307p5.JPG', 'c307p6.JPG', ''),
(297, 'CAR', 'Renault', 'Clio 1.2 16v', '2013', '9995', '', 'Petrol', 'Manual ', 'Flame Red', 'Clio 1.2 16v Dynamique MediaNav', 'ABS,Air Conditioning,Alloy Wheels,Anti Theft System,Cruse Control,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Mettalic Paint,Sat Nav,Bluetooth Connectivity,Passenger Air Bag,Power Steering,Remote Locking,Side Air Bags,Rear Spoler', '<p><span style="font-size: medium;"><strong>This Clio is finished in a fantastic Flame Red.&nbsp;With only 1 owner from new and a full service history you know its been looked after.&nbsp;Low running costs are a key benifit to owning this car, with meaningful fuel economy a key factor. Front seat occupants will have no concerns with leg room while rear ones can enjoy the space. The boot is also generous and storage space in the cabin is good.</strong></span></p>', '17000', 'AU63 BUP', 'c297p1.JPG', 'c297p2.JPG', 'c297p3.JPG', 'c297p4.JPG', 'c297p5.JPG', 'c297p6.JPG', ''),
(178, 'CAR', 'Renault', 'Megane 1.5Td 5dr ', '2010', '8995', '', 'Diesel', '5 Speed Manual ', 'Ruby Red Metalic', 'Megan 1.5TD i-Music 5dr Hatch', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Anti Theft System,Central Locking,Cloth Upholstery,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Full Service History,Folding Rear Seats,Locking Wheel Nut,Mettalic Paint,Passenger Air Bag,Power Steering,Remote Locking,Side Air Bags,Tinted Glass', '<p><span style="font-size: medium;"><strong>A VERY ECONOMICAL FAMILLY HATCHBACK IN SUPER RUBY RED METALIC.AIR CON, ALLOYS , REMOTE LOCKING ,AND MUCH MORE. ONLT &pound;30.00 A YEAR RFL.</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '9000', '4070', 'c178p1.JPG', 'c178p2.JPG', 'c178p3.JPG', 'c178p4.JPG', 'c178p5.JPG', 'c178p6.JPG', ''),
(286, 'CAR', 'Renault', 'Grand Modus', '2011', '7295', '', 'Diesel', '5 speed manual', 'Stione Met', 'Grand Modus 1.5 DCi Dynamique', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Anti Theft System,Central Locking,Cloth Upholstery,Cruse Control,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Full Service History,Folding Rear Seats,Locking Wheel Nut,Mettalic Paint,Passenger Air Bag,Power Steering,Remote Locking,Radio / CD,Side Air Bags,Tinted Glass', '<p><strong><span style="font-size: medium;">VERSATILE AND ECONOMICAL 5 DR MINI PEOPLE CARRIER.THIS&nbsp; ONE OWNER VEHICLE HAS A/C , CRUISE , FRONT FOGS , ALLOYS , ELECTRIC FOLDING MIRRORS AND MORE .</span></strong></p>\r\n<p>&nbsp;</p>', '16750', 'PX61XAY', 'c286p1.JPG', 'c286p2.JPG', 'c286p3.JPG', 'c286p4.JPG', 'c286p5.JPG', 'c286p6.JPG', ''),
(294, 'CAR', 'Renault', 'Megane 1.5 dCi  ', '2012', '10595', '', 'Diesel', '6 speed manual', 'Eclipse Metalic', 'Megane 1.5 DCi Dyn  TomTom Sport Tourer  ', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Anti Theft System,Central Locking,Cloth Upholstery,Cruse Control,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Front Arm Rests,Full Service History,Folding Rear Seats,Locking Wheel Nut,Mettalic Paint,Sat Nav,Bluetooth Connectivity,Passenger Air Bag,Power Steering,Remote Locking,Roof Rails,Radio / CD,Side Air Bags,Tinted Glass', '<p><strong><span style="font-size: medium;">THIS ONE OWNER STYLISH ESTATE CAR OFFERS THAT GREAT SPECIFICATION WITH SUPER ECONOMY AND LOW ROAD TAX [ ONLY &pound;20&nbsp; ]&nbsp; . FEATURES INCLUDE ROOF RAILS , SAT NAV , AIR CON , CRUISE AND SPEED LIMITER , PLUS MORE , A GREAT FAMILY CAR .</span></strong>&nbsp;</p>', '17720', 'BV12RVZ', 'c294p1.JPG', 'c294p2.JPG', 'c294p3.JPG', 'c294p4.JPG', 'c294p5.JPG', 'c294p6.JPG', ''),
(280, 'CAR', 'Citreon', 'C3 Picasso', '2009', '7995', '', 'Diesel', '5 speed manual', 'Cherry Red Metalic', 'C3 Picasso1.6 TD Exclusive', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Anti Theft System,Central Locking,Cloth Upholstery,Climate Control,Cruse Control,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Front Arm Rests,Full Service History,Folding Rear Seats,Locking Wheel Nut,Mettalic Paint,Parking Sensors,Passenger Air Bag,Power Steering,Remote Locking,Roof Rails,Radio / CD,Side Air Bags,Tinted Glass', '<p><strong><span style="font-size: medium;">A VERSATILE WELL SPECED ECONOMICAL VEHICLE .THIS ONE OWNER CAR HAS FULL SERVICE HISTORY AND COVERED ONLY 7600 MILES .THIS SMART CHERRY RED CAR COMES WITH CLIMATE CONTROL , AUTO LIGHTS AND WIPERS , REVERSING SENSORS , ROOF BARS AND MUCH MORE.</span></strong></p>', '7760', 'WN59NYU', 'c280p1.JPG', 'c280p2.JPG', 'c280p3.JPG', 'c280p4.JPG', 'c280p5.JPG', 'c280p6.JPG', ''),
(265, 'CAR', 'Renault', 'Clio 1.2TCe Estate', '2011', '7695', '', 'Petrol', '5 Speed Manual ', 'Oyster Grey ', 'Clio 1.2 TCe GT Line Estate', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Anti Theft System,Central Locking,Cloth Upholstery,Climate Control,Cruse Control,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Full Service History,Folding Rear Seats,Locking Wheel Nut,Mettalic Paint,Sat Nav,Bluetooth Connectivity,Parking Sensors,Passenger Air Bag,Power Steering,Remote Locking,Roof Rails,Radio / CD,Side Air Bags,Tinted Glass', '<p><strong><span style="font-size: medium;">VERSATILE COMPACT ESTATE CAR WITH A GREAT SPEC WHICH INCLUDES CLIMATE CONTROL , CRUISE CONTROL , REVERSING SENSORS , ELECTRIC FOLDING MIRRORS AND MUCH MORE.</span></strong></p>', '11220', 'YB11DMF', 'c265p1.JPG', 'c265p2.JPG', 'c265p3.JPG', 'c265p4.JPG', 'c265p5.JPG', 'c265p6.JPG', ''),
(292, 'CAR', 'Renault', 'Megane 1.5 dCi  ', '2012', '10995', '', 'Diesel', '6 speed manual', 'White', 'Megane 1.5 DCi GT Line Coupe', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Anti Theft System,Central Locking,Cloth Upholstery,Climate Control,Cruse Control,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Front Arm Rests,Full Service History,Folding Rear Seats,Locking Wheel Nut,Sat Nav,Bluetooth Connectivity,Parking Sensors,Passenger Air Bag,Power Steering,Remote Locking,Radio / CD,Side Air Bags,Tinted Glass,Tow Bar', '<p><strong><span style="font-size: medium;">THIS STUNNING LOOKING 3 DOOR COUPE OFFER STYLE, PERFORMANCE AND ECONOMY. A ONE OWNER CAR WITH FULL HISTORY AND COVERED ONLY 14300 MLS , WITH A SUPER SPEC.&nbsp;</span></strong></p>', '14300', 'RJ61ZDK', 'c292p1.JPG', 'c292p2.JPG', 'c292p3.JPG', 'c292p4.JPG', 'c292p5.JPG', 'c292p6.JPG', ''),
(248, 'CAR', 'Renault', 'Clio 5dr 1.5TD', '2011', '7995', '', 'Diesel', '5 Speed Manual ', 'Oyester Grey Metalic', 'Clio 1.5TD GT Line TomTom', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Central Locking,Cloth Upholstery,Climate Control,Cruse Control,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Full Service History,Folding Rear Seats,Locking Wheel Nut,Mettalic Paint,Sat Nav,Bluetooth Connectivity,Parking Sensors,Passenger Air Bag,Power Steering,Remote Locking,Radio / CD,Side Air Bags,Tinted Glass', '<p><strong><span style="font-size: medium;">THIS SUPER 5 DOOR HATCH OFFERS GREAT ECONOMY AND RUNNING COSTS ( ONLY &pound;30 RFL ) WITH A SUPER SPEC WHICH INCLUDES, SAT NAV, CLIMATE , AUTO LIGHTS AND WIPERS , FOG LIGHTS AND MUCH MORE.</span></strong></p>', '14766', 'VK11YGR', 'c248p1.JPG', 'c248p2.JPG', 'c248p3.JPG', 'c248p4.JPG', 'c248p5.JPG', 'c248p6.JPG', ''),
(302, 'CAR', 'Renault', 'Clio 0.9 TCe Exp', '2013', '8695', '', 'Petrol', 'Manual', 'White', '0.9 TCe Expression +', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Anti Theft System,Cloth Upholstery,Cruse Control,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Full Service History,Folding Rear Seats,Bluetooth Connectivity,Passenger Air Bag,Power Steering,Remote Locking,Rear Spoler', '<p><strong></strong><strong><span style="font-size: medium;">At only &pound;20 a year tax and MPG in the 60s running costs are at a low with this Clio. Finished in a stunning white with day light running lights and front fogs good looks are also included</span></strong></p>', '8800', 'WJ13CWY', 'c302p1.JPG', 'c302p2.JPG', 'c302p3.JPG', 'c302p4.JPG', 'c302p5.JPG', 'c302p6.JPG', 'SOLD'),
(304, 'CAR', 'Renault', 'Clio Dynamique 2015', '2015', '13995', '', 'Diesel', 'Manual', 'Black', 'DCi 90 Dynamique MediaNav', 'ABS,Air Conditioning,Alloy Wheels,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Folding Rear Seats,Mettalic Paint,Sat Nav,Bluetooth Connectivity,Passenger Air Bag,Power Steering,Remote Locking,Side Air Bags', '<p style="text-align: center;"><span style="font-size: large;"><strong><span style="font-size: x-large;">15% OFF!!!!!!!!!</span></strong></span></p>\r\n<p style="text-align: center;"><span style="font-size: large;"><strong><span style="font-size: x-large;"><span style="font-size: xx-large;">2015 Registered</span><br /></span></strong></span></p>\r\n<p style="text-align: center;"><span style="font-size: large;"><strong><span style="font-size: x-large;">Retail Price &pound;16,600 Our price &pound;13,995</span><br /></strong></span></p>', '36', '2015', 'c304p1.JPG', 'c304p2.JPG', 'c304p3.JPG', 'c304p4.JPG', 'c304p5.JPG', 'c304p6.JPG', ''),
(301, 'CAR', 'Renault', 'Megane 1.5 dCi  ', '2011', '6495', '', 'Diesel', '6 speed manual', 'Ruby Red Met', 'Megane 1.5 DCi Expression Eco', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Central Locking,Cloth Upholstery,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Full Service History,Folding Rear Seats,Mettalic Paint,Passenger Air Bag,Power Steering,Remote Locking,Radio / CD,Side Air Bags,Steel Wheels,Tinted Glass', '<p><strong><span style="font-size: medium;">THE 1.5DCi ENGINE OFFERS FANTASTIC MPG RETURNS AND AT ONLY &pound;20 A YEAR TO TAX RUNNING COSTS ARE LOW . IDEAL MEDIUM SIZED FAMILY CAR WITH GOOD BOOT SPACE AND PLENTY OF ROOM IN THE CABIN .</span></strong></p>', '64600', 'SM61HHD', 'c301p1.JPG', 'c301p2.JPG', 'c301p3.JPG', 'c301p4.JPG', 'c301p5.JPG', 'c301p6.JPG', ''),
(187, 'CAR', 'Renault', 'Clio 5dr 1.5TD', '2010', '8995', '', 'Diesel', '5 Speed Manual ', 'Silver', 'Clio 1.5TD 5dr Dynamique TomTom', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Anti Theft System,Central Locking,Cloth Upholstery,Cruse Control,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Full Service History,Folding Rear Seats,Locking Wheel Nut,Mettalic Paint,Sat Nav,Bluetooth Connectivity,Passenger Air Bag,Power Steering,Remote Locking,Radio / CD,Side Air Bags,Tinted Glass', '<p><strong><span style="font-size: medium;">A GREAT&nbsp;5 DR ECONOMICAL WELL SPECED CAR INCLUDING SAT NAV&nbsp;, AIR CON, FOG LIGHTS , REMOTE LOCKING , ALLOYS ,AUTO LIGHTS AND MORE , THIS ONE OWNER CAR HAS ONLY DONE&nbsp;7990 MILES AND IS ONLY&pound;30 A YEAR RFL.</span></strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '7990', '4080', 'c187p1.JPG', 'c187p2.JPG', 'c187p3.JPG', 'c187p4.JPG', 'c187p5.JPG', 'c187p6.JPG', ''),
(238, 'CAR', 'Renault', 'Clio 90TCe 5Dr', '2014', '11995', '', 'Petrol', '5 Speed Manual ', 'French Blue', 'Clio 0.9 TCe 90 Dynamique Medianav', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Anti Theft System,Central Locking,Cloth Upholstery,Cruse Control,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Folding Rear Seats,Locking Wheel Nut,Sat Nav,Bluetooth Connectivity,Passenger Air Bag,Power Steering,Remote Locking,Side Air Bags,Tinted Glass', '<p><strong><span style="font-size: medium;">RENAULTS NEW CLIO OFFERS GREAT PERFORMANCE AND ECONOMY FROM ITS 900 cc TURBO ENGINE AND ONLY &pound;20 A YEAR RFL.STANDARD FEATURES INCLUDE , AIR CON , SAT NAV , BLUETOOTH , ALLOY WHEELS, FRONT FOG LIGHTS , HANDS FREE ENTRY AND START AND MORE .</span></strong></p>', 'Please inq', 'WF14RPU', 'c238p1.JPG', 'c238p2.JPG', 'c238p3.JPG', 'c238p4.JPG', 'c238p5.JPG', 'c238p6.JPG', ''),
(293, 'CAR', 'Renault', 'Grand Modus', '2012', '7995', '', 'Petrol', 'Automatic', 'Mercury silver', 'Grand Modus 1.6 Dynamique Auto', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Central Locking,Cloth Upholstery,Cruse Control,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Full Service History,Folding Rear Seats,Locking Wheel Nut,Mettalic Paint,Power Steering,Remote Locking,Radio / CD,Side Air Bags,Tinted Glass', '<p><strong><span style="font-size: medium;">A ONE OWNER LOW MILAGE AUTOMATIC OFFERING THAT EXTRA BIT OF HEIGHT FOR EASE OF ENTRY AND SIT UP DRIVING POSITION. STANDARD FEATURES INCLUDE FOLDIND MIRRORS , CRUISE AND SPEED LIMITER , AIR CON , SLIDING AND FOLDING REAR SEAT PLUS LOTS MORE.</span></strong></p>', '8020', 'YT12VXA', 'c293p1.JPG', 'c293p2.JPG', 'c293p3.JPG', 'c293p4.JPG', 'c293p5.JPG', 'c293p6.JPG', ''),
(303, 'CAR', 'NISSAN', 'Note', '2012', '7995', '', 'Petrol', 'Manual', 'Silver', 'Nissan Note 1.4 Ntec +', 'ABS,Air Conditioning,Alloy Wheels,Anti Theft System,Climate Control,Cruse Control,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Full Service History,1/2 Leather Trim,Locking Wheel Nut,Mettalic Paint,Sat Nav,Parking Sensors,Passenger Air Bag,Power Steering,Remote Locking,Radio / CD,Side Air Bags', '<p><strong><span style="font-size: medium;">This Nissan note Ntec has all you could ask for. It has Satnav, half leather, Security glass in the rear, Cruise control, Alloy wheels the list goes on. Top spec small MPV</span></strong></p>', '14300', 'WJ62YHU', 'c303p1.JPG', 'c303p2.JPG', 'c303p3.JPG', 'c303p4.JPG', 'c303p5.JPG', 'c303p6.JPG', ''),
(299, 'CAR', 'Renault', 'Scenic 1.5 Dci Dyn', '2011', '10495', '', 'Diesel', 'Manual', 'Ruby Red Metalic', '1.5 Dci Dynamique TomTom ', 'ABS,Air Conditioning,Alloy Wheels,Anti Theft System,Cruse Control,Drivers Airbag,Electric Windows,Electric Mirrors,Full Service History,1/2 Leather Trim,Mettalic Paint,Sat Nav,Passenger Air Bag,Power Steering,Remote Locking,Radio / CD,Side Air Bags', '<p><strong><span style="font-size: medium;">As the most fuel-efficient engine in the range the 1.5 dCi offers the best combinatin of lower fuel bills and more affordable tax. The scenic offers plenty of space for a growing family and with Renault strongly focusing on interior quality and space the cabin is a great place to spend time in.</span></strong></p>', '14200', 'YP61UAM', 'c299p1.JPG', 'c299p2.JPG', 'c299p3.JPG', 'c299p4.JPG', 'c299p5.JPG', 'c299p6.JPG', ''),
(149, 'CAR', 'Seat', 'Ibiza SE Estate', '2011', '7295', '', 'Petrol', 'Manual', 'White', '1.4 SE Estate', 'ABS,Adjustable Steering Column / Wheel,Air Conditioning,Alloy Wheels,Anti Theft System,Central Locking,Cloth Upholstery,Cruse Control,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Electric Sunroof,Front Fog Lights,Full Service History,Folding Rear Seats,Passenger Air Bag,Power Steering,Remote Locking,Radio / CD,Tinted Glass', '<p><span style="font-size: medium;"><strong>THIS VW ENGINEERED ESTATE IS A GREAT MID RANGE VEHICLE WITH LOADS OF SPACE AND SPECIFICATION INCLUDING A SUNROOF AS WELL AS AIR CON.<br /> IDEAL FOR TRANSPORTING THE FAMILY OR PET&nbsp;OR BOTH.&nbsp;</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span></p>\r\n<p><span style="font-size: medium;">&nbsp;</span></p>\r\n<p><span style="font-size: medium;"><span style="font-size: x-large;">&nbsp;&nbsp;</span><br /></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '9530', '4045', 'c149p1.JPG', 'c149p2.JPG', 'c149p3.JPG', 'c149p4.JPG', 'c149p5.JPG', 'pj 015.JPG', ''),
(298, 'CAR', 'Citreon', 'Berlingo', '2012', '10495', '', 'Diesel', 'Manual', 'Grey Metalic', 'Berlingo Multispace 1.6HDi XTR', 'Air Conditioning,Alloy Wheels,Anti Theft System,Drivers Airbag,Electric Windows,Electric Mirrors,Front Fog Lights,Full Service History,Locking Wheel Nut,Mettalic Paint,Passenger Air Bag,Power Steering,Remote Locking,Roof Rails,Radio / CD', '<p><span style="font-size: small;"><strong><span style="font-size: medium;">With only 1 owner and a full service history the Berlingo would make an ideal family car, with lots of storage space in the boot and in the cabin. Also with its 1.6HDi engine its very cheap to run but not lacking in performance</span></strong></span></p>', '9100', 'EX12UMS', 'c298p1.JPG', 'c298p2.JPG', 'c298p3.JPG', 'c298p4.JPG', 'c298p5.JPG', 'c298p6.JPG', ''),
(140, 'VAN', 'Renault', 'Kangoo van ML20 DCi', '2011', '7495', 'EX', 'Diesel', 'Manual', 'White', 'Renault Kangoo Van ML20 1.5 DCi 85 Tom Tom', 'Adjustable Steering Column / Wheel,Air Conditioning,Anti Theft System,Central Locking,Cloth Upholstery,Onboard Computer,Drivers Airbag,Electric Windows,Electric Mirrors,Full Service History,Sat Nav,Parking Sensors,Passenger Air Bag,Power Steering,Remote Locking,Radio / CD', '<p><span style="font-size: large;"><strong>SUPERB AND TOP OF THE RANGE KANGOO VAN WITH SLIDING SIDE DOOR SAT NAV AND AIR CON. HUGE SAVING ON COST NEW AND&nbsp;VERY LOW&nbsp;MILES...TAXED AND READY FOR THGE NEW PROUD OWNER...</strong></span></p>', '9000', 'demo183', 'c140p1.JPG', 'c140p2.JPG', 'c140p3.JPG', 'c140p4.JPG', 'c140p5.JPG', 'c140p6.JPG', '');

-- --------------------------------------------------------

--
-- Table structure for table `SIT_car_make`
--

CREATE TABLE IF NOT EXISTS `SIT_car_make` (
  `id` int(11) NOT NULL auto_increment,
  `make` varchar(32) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `SIT_car_make`
--

INSERT INTO `SIT_car_make` (`id`, `make`) VALUES
(26, 'Renault'),
(15, 'Ford'),
(31, 'Fiat'),
(30, 'Honda'),
(20, 'Seat'),
(21, 'Citreon'),
(33, 'Mazda'),
(24, 'Hyundai'),
(25, 'Skoda'),
(32, 'Nissan');

-- --------------------------------------------------------

--
-- Table structure for table `SIT_car_year`
--

CREATE TABLE IF NOT EXISTS `SIT_car_year` (
  `id` int(11) NOT NULL auto_increment,
  `year` varchar(4) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `SIT_car_year`
--

INSERT INTO `SIT_car_year` (`id`, `year`) VALUES
(36, '2008'),
(33, '2009'),
(34, '2011'),
(35, '2004'),
(37, '2001'),
(38, '2007'),
(39, '2010'),
(40, '2006'),
(41, '2003'),
(42, '2012'),
(43, '2005'),
(44, '2002'),
(45, '2013'),
(46, '2014'),
(47, '2015');


INSERT INTO `SIT_settings` (`name`, `VALUE`) VALUES
('module_car', '1');
('module_car_path', 'car');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
