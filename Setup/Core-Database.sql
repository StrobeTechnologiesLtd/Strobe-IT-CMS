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
-- Table structure for table `SIT_pages`
--

CREATE TABLE IF NOT EXISTS `SIT_pages` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `creatorId` int(11) NOT NULL,
  `updaterId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `dateAdded` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL default '0000-00-00 00:00:00',
  `subpage` tinyint(1) NOT NULL,
  `mainpageid` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `SIT_pages`
--

INSERT INTO `SIT_pages` (`id`, `creatorId`, `updaterId`, `title`, `url`, `content`, `description`, `keywords`, `dateAdded`, `dateUpdated`, `subpage`, `mainpageid`) VALUES
(1, 1, 1, 'Home', 'home', '<h1>Welcome to Thorne + Carter</h1>\r\n<h2>The Culm Valley estate agents.</h2>\r\n<p>We are based in Cullompton on junction 28 of the M5 between Exeter and Taunton.<br /> For a professional personal service in selling, buying, letting or surveying contact us now.</p>', 'Thorne + Carter - Independent Chartered Surveyors, Estate Agents, Valuers and Auctioneers based in the Culm Valley town of Cullompton, Devon, England.', 'estate agents, property, estate agents Cullompton, houses for sale, Culm Valley, Willand, Kentisbeare, Plymtree, Bradninch, Uffculme, Culmstock', '2015-01-16 09:55:31', '2015-01-16 09:55:31', 0, 1),
(12, 1, 1, 'Contact Us', 'contactus', '<h1>The Team</h1>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td class="name"><strong>John Parkin</strong><span class="note"> FNAEA</span>&nbsp;</td>\r\n<td class="top">-</td>\r\n<td style="text-align: justify;">Heads the residential team handling sales and valuations of all types of residential property.</td>\r\n</tr>\r\n<tr>\r\n<td class="name"><strong>Clive Madge</strong><span class="note"> BSc MRICS FAAV</span>&nbsp;</td>\r\n<td class="top">-</td>\r\n<td style="text-align: justify;">Heads the letting department, carries out surveys/valuations and handles commercial property</td>\r\n</tr>\r\n<tr>\r\n<td class="name"><strong>Alison Underhill</strong>&nbsp;</td>\r\n<td class="top">-</td>\r\n<td style="text-align: justify;">Sales and Lettings Negotiator</td>\r\n</tr>\r\n<tr>\r\n<td class="name"><strong>Henry Parkin</strong>&nbsp;</td>\r\n<td class="top">-</td>\r\n<td style="text-align: justify;">Residential Negotiator</td>\r\n</tr>\r\n<tr>\r\n<td class="name"><strong>Maya Shapland</strong>&nbsp;</td>\r\n<td class="top">-</td>\r\n<td style="text-align: justify;">Secretary to the Survey and Commercial Departments</td>\r\n</tr>\r\n<tr>\r\n<td class="name"><strong>Jenny Hellier</strong>&nbsp;</td>\r\n<td class="top">-</td>\r\n<td style="text-align: justify;">Secretary to the Survey and Commercial Departments</td>\r\n</tr>\r\n<tr>\r\n<td class="name"><strong>Judy Barton</strong>&nbsp;</td>\r\n<td class="top">-</td>\r\n<td style="text-align: justify;">Secretary to the Agricultural Department</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<h1>Address</h1>\r\n</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>\r\n<h1>Opening Hours</h1>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p><span class="bold">Thorne + Carter</span><br /> 11 &amp; 13 High Street<br /> Cullompton<br /> Devon<br /> EX15 1AB<br /> Telephone: 01884 33333<br /> After Hours: 07802 448363<br />Email: enquiries@thorneandcarter.co.uk</p>\r\n</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td class="top">\r\n<p>9:00am - 6:00pm &nbsp;&nbsp; Monday - Friday<br /> 9:00am - 1:00pm &nbsp;&nbsp; Saturday</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<h1>Map</h1>\r\n<p><iframe class="googlemap" src="https://maps.google.co.uk/maps?ie=UTF8&amp;q=thorne+and+carter&amp;fb=1&amp;gl=uk&amp;hq=thorne+and+carter&amp;cid=0,0,10606454959308290615&amp;t=m&amp;source=embed&amp;ll=50.860212,-3.388424&amp;spn=0.006501,0.013733&amp;z=16&amp;iwloc=A&amp;output=embed" width="640" height="480"></iframe><br /><small><a style="color: #0000ff; text-align: left;" href="https://maps.google.co.uk/maps?ie=UTF8&amp;q=thorne+and+carter&amp;fb=1&amp;gl=uk&amp;hq=thorne+and+carter&amp;cid=0,0,10606454959308290615&amp;t=m&amp;source=embed&amp;ll=50.860212,-3.388424&amp;spn=0.006501,0.013733&amp;z=16&amp;iwloc=A">View Larger Map</a></small></p>\r\n<p>&nbsp;</p>', 'Thorne + Carter - Independent Chartered Surveyors, Estate Agents, Valuers and Auctioneers based in the Culm Valley town of Cullompton, Devon, England.', 'estate agents, property, estate agents Cullompton, houses for sale, Culm Valley, Willand, Kentisbeare, Plymtree, Bradninch, Uffculme, Culmstock', '2014-05-19 14:26:34', '2013-11-26 18:15:48', 0, 1),
(13, 1, 1, 'About Us', 'aboutus', '<h2>THE HISTORY OF THORNE AND CARTER</h2>\r\n<p style="text-align: justify;">The story of Thorne and Carter unfolds across three centuries of estate agency, auctioneering and surveying in the Culm Valley.</p>\r\n<p style="text-align: justify;">The practice was originally founded in the mid 1800s in Willand by William Thorne. When he retired towards the end of the century his son, Bill Thorne, was too young to take over the practice and so there was a gap of some years until Bill Thorne restarted the firm, again in Willand in 1911.</p>\r\n<p style="text-align: justify;">In the 1930s Bill Thorne relocated the practice to the larger town of Cullompton and on his retirement in 1950 the practice was acquired by the late Ken Carter and had by then moved offices to Church Street.</p>\r\n<p style="text-align: justify;">The changing face of estate agency later necessitated the move to 29 High Street, a large three storey Victorian property. Ken Carter in partnership with his son Stephen ran a thriving multi disciplined chartered surveyors practice specialising in residential sales, surveys, farm sales and associated agricultural work, with the firm even having its own livestock market based at Tiverton Junction in Willand.</p>\r\n<p style="text-align: justify;">At the end of 1988 Ken Carter retired and his son Stephen formed a new partnership with Clive Madge, who had been specialising in the agricultural and professional side of the practice, together with John Parkin who had been handling the residential sales.</p>\r\n<p style="text-align: justify;">Throughout the 1990s steady growth in the residential sales resulted in increased staff and emphasised the need for even larger premises in a more prominent and central High Street position. With this in mind the partners acquired 11 &amp; 13 High Street fondly known locally as the &ldquo;Old Police Station&rdquo;.</p>\r\n<p style="text-align: justify;">During much of the autumn of 1999 the premises underwent a complete refurbishment and remodelling including the former &ldquo;cells&rdquo; being integrated into the company&rsquo;s boardroom.</p>\r\n<p style="text-align: justify;">Following his retirement from the partnership Stephen Carter continued as a consultant for several years before retiring fully.</p>\r\n<p style="text-align: justify;">John and Clive continue in partnership with their long standing experienced team in both the residential and professional departments.</p>\r\n<p style="text-align: justify;">A nostalgic inspection of the archives reveals that the first property sold under the Thorne and Carter partnership was near Taunton in February 1951 selling for &pound;3,500 and earned the company the princely sum of &pound;29 in commission! Interestingly the same property sold in 2012 for &pound;320,000. This at the time when a gallon of petrol cost 3 shillings 6 pence (17&frac12;p), a loaf of bread was 6 pence (2&frac12;p) and a brand new Morris Minor car would set you back &pound;520 whilst the internet was not even a distant dream!</p>\r\n<p>&nbsp;</p>\r\n<h2>The Partners</h2>\r\n<h4>Clive Madge &nbsp; BSc MRICS FAAV</h4>\r\n<p>Chartered Surveyor. Fellow of the Central Association of Agricultural Valuers.<br />RICS registered valuer.</p>\r\n<p style="text-align: justify;">Clive specialises in surveys of residential property and valuation, sale and letting of commerical and agricultural property. He also heads up our residential letting department. After studying estate management at London University and subsequent training positions Clive has been engaged with Thorne and Carter in both professional and agency work in Mid Devon since joining the firm in 1976. He became a partner in 1989. Clive is therefore well versed in the local property market and draws on a wealth of experience in his work.</p>\r\n<p>&nbsp;</p>\r\n<h4>John Parkin &nbsp; FNAEA</h4>\r\n<p>Fellow of the National Association of Estate Agents.</p>\r\n<p style="text-align: justify;">John is in charge of the valuation, marketing and sale of residential property, from town cottage to country house. John comes from a background of law and subsequently trained with a large multi office firm of estate agents in Hampshire before moving to Devon in 1979 to manage the residential department of an Exeter based rural practice. John became an equity partner of Thorne and Carter in 1989 and offers an immense wealth of expertise combined with local knowledge and experience.</p>\r\n<p>&nbsp;</p>\r\n<h2>Location</h2>\r\n<p>Cullompton, Devon<br /><strong>A wonderful rural yet accessible location in which to live!</strong></p>\r\n<p style="text-align: justify;">The rapidly expanding country town of Cullompton enjoys an unrivalled easily accessible location close to junction 28 of the M5 which facilitates rapid commuting south to the cathedral city of Exeter (about 14 miles) and north to the country town of Taunton (22 miles). Tiverton Parkway Station lies about 6 miles to the north and provides a fast service to London (Paddington).</p>\r\n<p style="text-align: justify;">Cullompton offers a range of high street shops together with Tesco supermarket in addition to two primary schools and two doctors'' surgeries. Secondary schooling is provided by the Cullompton Community College and the highly regarded Uffculme Secondary School which serves a large proportion of the Culm Valley. The renowned Blundell''s public school at Tiverton is about 5 miles, whilst Exeter offers a wide range of independent schooling in addition to the recently completed Princesshay shopping mall.</p>\r\n<p style="text-align: justify;">Cullompton''s comparatively central Mid Devon location places the picturesque National Parks of Dartmoor and Exmoor together with the north and south Devon coastlines all within a modest car journey. The surrounding countryside offers a wealth of rural pursuits with gliding and flying being available in the nearby Blackdown Hills, an area designated as being of Outstanding Natural Beauty.</p>', 'Thorne + Carter - Independent Chartered Surveyors, Estate Agents, Valuers and Auctioneers based in the Culm Valley town of Cullompton, Devon, England.', 'estate agents, property, estate agents Cullompton, houses for sale, Culm Valley, Willand, Kentisbeare, Plymtree, Bradninch, Uffculme, Culmstock', '2013-12-23 11:03:31', '2013-12-03 09:46:04', 0, 1),
(14, 1, 1, 'Surveys', 'surveys', '<h1>Professional Services</h1>\r\n<p style="text-align: justify;">As chartered surveyors, with the benefit of an estate agency department, Thorne and Carter is well placed to provide a wide range of professional property services backed up with practical experience of the local property market.</p>\r\n<p style="text-align: justify;">With 37 years in practice to call on, our chartered surveyor, Clive Madge is particularly well versed to carry out:</p>\r\n<p><strong>Valuations</strong> - of residential, commercial and agricultural property for purchase, sale, pension administration, inheritance tax, compensation, compulsory purchase and family division.</p>\r\n<p><strong>Surveys</strong> - including building surveys, RICS Homebuyer Reports and condition reports on residential property for those wishing to check a property before buying.</p>\r\n<p style="text-align: justify;">We also advise on a wide range of other professional matters including dilapidation claims, boundary disputes and assessments for fire insurance.</p>', 'Thorne + Carter - Independent Chartered Surveyors, Estate Agents, Valuers and Auctioneers based in the Culm Valley town of Cullompton, Devon, England.', 'estate agents, property, estate agents Cullompton, houses for sale, Culm Valley, Willand, Kentisbeare, Plymtree, Bradninch, Uffculme, Culmstock', '2013-12-23 09:10:02', '2013-11-29 20:03:38', 0, 1),
(15, 1, 1, 'Lists', 'mailing', '<h2>Subscribe to our newsletters / housing alerts</h2>\r\n<p>To keep up-to-date with the housing market or be alerted to new properties as they come on-line please subscribe to our lists.</p>\r\n<p><a href="/lists/?p=subscribe&amp;id=1">Housing Alerts List</a></p>\r\n<p><a href="/lists/?p=unsubscribe">Unsubscribe from our Newsletters</a></p>\r\n<p><a title="visit the phpList website" href="http://www.phplist.com/poweredby?utm_source=pl3.0.5&amp;utm_medium=poweredhostedimg&amp;utm_campaign=phpList"><img title="powered by phpList version 3.0.5, &copy; phpList ltd" src="http://powered.phplist.com/images/3.0.5/power-phplist.png" alt="powered by phpList 3.0.5, &copy; phpList ltd" width="70" height="30" border="0" /></a></p>', 'Thorne + Carter Mailing Lists', 'Mailing List', '2015-01-21 13:28:30', '2015-01-21 13:28:30', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SIT_pages_auth`
--

CREATE TABLE IF NOT EXISTS `SIT_pages_auth` (
  `id` int(10) NOT NULL auto_increment,
  `updaterId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `subpage` tinyint(1) NOT NULL,
  `mainpageid` int(10) NOT NULL,
  `pageid` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `SIT_security`
--

CREATE TABLE IF NOT EXISTS `SIT_security` (
  `id` int(11) NOT NULL auto_increment,
  `securityno` int(11) NOT NULL,
  `description` text NOT NULL,
  `settings` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `SIT_security`
--

INSERT INTO `SIT_security` (`id`, `securityno`, `description`, `settings`) VALUES
(4, 1, 'User', 'File Manager,Page - List Pages,Page - Edit Page'),
(3, 10, 'Admin', 'User,File Manager,Page - List Pages,Page - New Page,Page - Edit Page,Page - Delete Page ,Page - List Page Approval,Page - Delete Page Approval,User - List Users,User - New User,User - Edit User,User - Delete User,Settings'),
(6, 5, 'power', 'User (Required),Page - List Pages,User - List Users,User - New User,User - Edit User');

-- --------------------------------------------------------

--
-- Table structure for table `SIT_settings`
--

CREATE TABLE IF NOT EXISTS `SIT_settings` (
  `name` varchar(20) default NULL,
  `VALUE` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SIT_settings`
--

INSERT INTO `SIT_settings` (`name`, `VALUE`) VALUES
('style', '1');

-- --------------------------------------------------------

--
-- Table structure for table `SIT_users`
--

CREATE TABLE IF NOT EXISTS `SIT_users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `logontime` timestamp NULL default NULL,
  `lastlogon` timestamp NULL default NULL,
  `accesslevel` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `SIT_users`
--

INSERT INTO `SIT_users` (`id`, `username`, `firstname`, `surname`, `email`, `pass`, `logontime`, `lastlogon`, `accesslevel`) VALUES
(1, 'admin', 'Administrator', 'Account', 'admin@domain.name', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, NULL, 10),
(2, 'user', 'Test', 'User', 'test@domain.name', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, NULL, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
