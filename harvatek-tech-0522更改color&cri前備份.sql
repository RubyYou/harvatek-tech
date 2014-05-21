
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2014 at 01:27 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a5099492_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

DROP TABLE IF EXISTS `tbl_color`;
CREATE TABLE `tbl_color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto id',
  `name` text NOT NULL COMMENT '選單名稱',
  `sel_option` text NOT NULL COMMENT '選項(json)',
  PRIMARY KEY (`color_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` VALUES(3, 'Color-A', '["pink","yellow","black"]');
INSERT INTO `tbl_color` VALUES(6, 'Color-B', '["blue","red"]');
INSERT INTO `tbl_color` VALUES(5, 'Color-C', '["orange","white"]');
INSERT INTO `tbl_color` VALUES(8, 'Red', '["Hyper Red","Super Red"]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto_id',
  `name` varchar(100) NOT NULL,
  `company` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` text NOT NULL,
  `phone` int(11) NOT NULL,
  `other_feedback` text NOT NULL,
  `inquiry_topic` text NOT NULL,
  `application_assistant` text NOT NULL,
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` VALUES(10, 'Nick Chen', 'aaa', 'weiyu14@yahoo.com.tw', 'bbb', 299910100, 'ccc\r\nddd', '["SMD-LED","Surface-Mount","Round-Lamp","Oval-Lamp","Lamp-with-housing"]', 'a\r\nb\r\nc\r\nd\r\ne', '2014-05-15 00:10:25');
INSERT INTO `tbl_contact` VALUES(9, 'Nick Chen', 'aaa', 'weiyu14@yahoo.com.tw', 'bbb', 299910100, 'ccc\r\nddd', '["SMD-LED","Surface-Mount","Round-Lamp","Oval-Lamp","Lamp-with-housing"]', 'a\r\nb\r\nc\r\nd\r\ne', '2014-05-15 00:09:06');
INSERT INTO `tbl_contact` VALUES(5, 'nick', 'targets', 'weiyu14@yahoo.com.tw', 'ab ', 200091999, 'abc', '["SMD-LED","Surface-Mount","Back-Lighting","Through-Hole-LED","Round-Lamp","Oval-Lamp"]', 'aaa', '2014-05-14 23:34:20');
INSERT INTO `tbl_contact` VALUES(11, 'Nick Chen', 'aaa', 'weiyu14@yahoo.com.tw', 'bbb', 299910100, 'ccc\r\nddd', '["SMD-LED","Surface-Mount","Round-Lamp","Oval-Lamp","Lamp-with-housing"]', 'a\r\nb\r\nc\r\nd\r\ne', '2014-05-15 00:11:06');
INSERT INTO `tbl_contact` VALUES(12, 'Nick Chen', 'aaa', 'weiyu14@yahoo.com.tw', 'bbb', 299910100, 'ccc\r\nddd', '["SMD-LED","Surface-Mount","Round-Lamp","Oval-Lamp","Lamp-with-housing"]', 'a\r\nb\r\nc\r\nds\r\ne', '2014-05-15 00:11:49');
INSERT INTO `tbl_contact` VALUES(13, 'Shih-Yu', 'test', 'shih@svisualjoint.co.uk', '', 893084239, 'aaa', '["Back-Lighting","General-Lighting","Oval-Lamp","Sensor"]', 'adfads', '2014-05-20 00:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cri`
--

DROP TABLE IF EXISTS `tbl_cri`;
CREATE TABLE `tbl_cri` (
  `cri_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto id',
  `name` text NOT NULL COMMENT '選單名稱',
  `sel_option` text NOT NULL COMMENT '選項(json)',
  PRIMARY KEY (`cri_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_cri`
--

INSERT INTO `tbl_cri` VALUES(1, 'Cri-A', '["10","20","30","40","80"]');
INSERT INTO `tbl_cri` VALUES(2, 'Cri-B', '["80","90","100"]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry`
--

DROP TABLE IF EXISTS `tbl_inquiry`;
CREATE TABLE `tbl_inquiry` (
  `inquiry_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto id',
  `country` varchar(100) NOT NULL COMMENT '國家',
  `first_name` varchar(50) NOT NULL COMMENT '姓',
  `last_name` varchar(50) NOT NULL COMMENT '名',
  `email` varchar(50) NOT NULL COMMENT 'email',
  `phone` varchar(20) NOT NULL COMMENT '電話',
  `address` text NOT NULL COMMENT '地址1',
  `address_option` text NOT NULL COMMENT '地址2',
  `postcode` varchar(10) NOT NULL COMMENT '郵遞區號',
  `additionalInfo` text NOT NULL COMMENT '備註',
  `send_time` datetime NOT NULL COMMENT '寄送時間',
  `ip` varchar(20) NOT NULL COMMENT 'ip',
  PRIMARY KEY (`inquiry_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` VALUES(15, 'Taiwan', 'Chen', 'Nick', 'weiyu14@yahoo.com.tw', '1234444', 'Taiwan', 'Taipei', '123', 'aaa\r\nbbb', '2014-05-19 16:56:37', '::1');
INSERT INTO `tbl_inquiry` VALUES(16, 'Taiwan', 'Chen', 'Nick', 'weiyu14@yahoo.com.tw', '1234444', 'Taiwan', 'Taipei', '123', 'aaa\r\nbbb', '2014-05-19 16:57:34', '::1');
INSERT INTO `tbl_inquiry` VALUES(17, 'Taiwan', 'Chen', 'Weiyu', 'weiyu14@yahoo.com.tw', '123456', 'Taiwan', 'Taipei', '123', 'aaa\r\nbbb', '2014-05-19 17:34:24', '49.158.120.103');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry_item`
--

DROP TABLE IF EXISTS `tbl_inquiry_item`;
CREATE TABLE `tbl_inquiry_item` (
  `inquiry_id` int(11) NOT NULL COMMENT 'inquiry foreign key',
  `product_name` text NOT NULL COMMENT 'product name',
  `quantity` text NOT NULL COMMENT '數量',
  `other_info` text NOT NULL COMMENT '其他資訊'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_inquiry_item`
--

INSERT INTO `tbl_inquiry_item` VALUES(15, '0.67″ 5×7 Dot Matrix', '0~10k', '{"color":"black","cri":"80"}');
INSERT INTO `tbl_inquiry_item` VALUES(15, '0.67″ 5×7 Dot Matrix', '0~10k', '{"color":"pink","cri":"80"}');
INSERT INTO `tbl_inquiry_item` VALUES(16, '0.67″ 5×7 Dot Matrix', '0~10k', '{"color":"black","cri":"80"}');
INSERT INTO `tbl_inquiry_item` VALUES(16, '0.67″ 5×7 Dot Matrix', '0~10k', '{"color":"pink","cri":"80"}');
INSERT INTO `tbl_inquiry_item` VALUES(17, '0.67″ 5×7 Digit', '0~10k', '{"color":"pink","cri":"80"}');
INSERT INTO `tbl_inquiry_item` VALUES(17, '0.67″ 5×7 Digit', '0~10k', '{"color":"yellow","cri":"80"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto id',
  `name` text NOT NULL COMMENT '標題',
  `post_date` date NOT NULL COMMENT '日期',
  `content` text NOT NULL COMMENT '內文',
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` VALUES(3, 'Harvatek Technologies Implements New Product Branding Strategy', '2014-05-05', '<p>Santa Clara, CA &ndash; Harvatek Technologies announces the implementation of a new product branding strategy for its opto-electronics product portfolios. Beginning on Feb. 1, 2014, Harvatek Technologies will market and sell products under the following brand names:</p>\r\n\r\n<ul>\r\n	<li>Harvatek - SMD LED products</li>\r\n	<li>CT Micro - Infrared and optocoupler products</li>\r\n	<li>Inolux - Display LED, through hole LED and non-standard solutions products</li>\r\n</ul>\r\n\r\n<p>Harvatek, along with its subsidiaries, has design centers, marketing and manufacturing sites in various locations around the world. To best focus our design, marketing and manufacturing resources, these divisions will operate under their own P&amp;L structures. In the Americas region, Harvatek Technologies will continue to be the sales channel for these brands, as well as their sales representatives and distribution channels.</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto id',
  `table_id` int(11) NOT NULL COMMENT 'table id',
  `products_id` int(11) NOT NULL COMMENT 'product1~4 id',
  `name` text NOT NULL COMMENT '產品名稱',
  `dimension` varchar(100) NOT NULL COMMENT '規格',
  `datasheet` text NOT NULL COMMENT 'datasheet連結',
  `ext` varchar(5) NOT NULL COMMENT '產品圖副檔名',
  `quantity_visible` int(11) NOT NULL COMMENT '顯示數量選單',
  `color_options` int(11) NOT NULL COMMENT '顏色選單',
  `cri_options` int(11) NOT NULL COMMENT 'cri選單',
  `content` text NOT NULL COMMENT '內文',
  `order_num` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` VALUES(18, 3, 2, '0.67″ 5×7 Dot Matrix', '', '', '.jpg', 1, 3, 2, '<div class="product-description row">\r\n<h3>Product Descriptions</h3>\r\n<img class="img-responsive" src="http://harvatek-tech.com/wp-content/uploads/2013/08/ThDot0.67-01-1024x488.jpg" />\r\n<table border="1" class="table">\r\n	<thead>\r\n		<tr>\r\n			<th colspan="2">Product</th>\r\n			<th rowspan="2">IF (mA)</th>\r\n			<th rowspan="2">Color</th>\r\n			<th rowspan="2">&lambda;D (nm)</th>\r\n			<th rowspan="2">IV (mcd)</th>\r\n			<th rowspan="2">VF (V)</th>\r\n		</tr>\r\n		<tr>\r\n			<th>Common Anode</th>\r\n			<th>Common Cathode</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>HDMT5767UAA</td>\r\n			<td>HDMT5767UAC</td>\r\n			<td>20</td>\r\n			<td>Amber</td>\r\n			<td>606</td>\r\n			<td>40</td>\r\n			<td>2.1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HDMT5767UYGA</td>\r\n			<td>HDMT5767UYGC</td>\r\n			<td>20</td>\r\n			<td>Yellow Green</td>\r\n			<td>571</td>\r\n			<td>20</td>\r\n			<td>3.2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HDMT5767TGA</td>\r\n			<td>HDMT5767TGC</td>\r\n			<td>20</td>\r\n			<td>True Green</td>\r\n			<td>525</td>\r\n			<td>160</td>\r\n			<td>2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HDMT5767UYA</td>\r\n			<td>HDMT5767UYC</td>\r\n			<td>20</td>\r\n			<td>Yellow</td>\r\n			<td>590</td>\r\n			<td>40</td>\r\n			<td>2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HDMT5767USRA</td>\r\n			<td>HDMT5767USRC</td>\r\n			<td>20</td>\r\n			<td>Super Red</td>\r\n			<td>639</td>\r\n			<td>30</td>\r\n			<td>2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HDMT5767URA</td>\r\n			<td>HDMT5767URC</td>\r\n			<td>20</td>\r\n			<td>Hyper Red</td>\r\n			<td>625</td>\r\n			<td>40</td>\r\n			<td>3.2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HDMT5767UBA</td>\r\n			<td>HDMT5767UBC</td>\r\n			<td>20</td>\r\n			<td>Blue</td>\r\n			<td>470</td>\r\n			<td>60</td>\r\n			<td>2.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', 1);
INSERT INTO `tbl_product` VALUES(19, 4, 4, '0.67″ 5×7 Digit', '3.0 x 2.0 x 1.3 (mm)', '', '.jpg', 1, 3, 2, '<h2>Product Description</h2>\r\n\r\n<p><a href="wp-content/uploads/2013/10/HT-PT30A02.pdf" target="_blank">Download Datasheet</a><br />\r\n3.0 x 1.4 x 0.8 (mm) Top View LED</p>\r\n\r\n<table border="1" class="tftable" id="tfhover">\r\n	<tbody>\r\n		<tr>\r\n			<th>Product</th>\r\n			<th>Emission Color</th>\r\n			<th>Power(W)</th>\r\n			<th>IF (mA)</th>\r\n			<th>CCT (K)</th>\r\n			<th>CRI</th>\r\n			<th>Brightness(Lm)</th>\r\n			<th>Viewing Angle<br />\r\n			2&theta;1/2</th>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan="3">HT-PT30A02</td>\r\n			<td rowspan="3">White</td>\r\n			<td rowspan="3">0.1</td>\r\n			<td rowspan="3">30</td>\r\n			<td>3000k</td>\r\n			<td rowspan="3">80</td>\r\n			<td rowspan="3">8</td>\r\n			<td rowspan="3">120</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4000k</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6000k</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product1`
--

DROP TABLE IF EXISTS `tbl_product1`;
CREATE TABLE `tbl_product1` (
  `product1_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto id',
  `name` text NOT NULL COMMENT '名稱',
  `link` text NOT NULL COMMENT '連結',
  `ext` varchar(5) NOT NULL COMMENT 'logo副檔名',
  `order_num` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`product1_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_product1`
--

INSERT INTO `tbl_product1` VALUES(1, 'Display', '', '.png', 1);
INSERT INTO `tbl_product1` VALUES(2, 'SMD LED', '', '.png', 2);
INSERT INTO `tbl_product1` VALUES(3, 'Through Hole LED', '', '.png', 3);
INSERT INTO `tbl_product1` VALUES(7, 'Infrared Emitter/Sensor/Coupler', '', '.png', 4);
INSERT INTO `tbl_product1` VALUES(8, 'UV LED', '', '.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product2`
--

DROP TABLE IF EXISTS `tbl_product2`;
CREATE TABLE `tbl_product2` (
  `product1_id` int(11) NOT NULL COMMENT 'foreign key',
  `product2_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto id',
  `name` text NOT NULL COMMENT '名稱',
  `link` text NOT NULL COMMENT '連結',
  `order_num` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`product2_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_product2`
--

INSERT INTO `tbl_product2` VALUES(1, 1, 'Through Hole Display', '', 1);
INSERT INTO `tbl_product2` VALUES(1, 2, 'SMD Display', '', 2);
INSERT INTO `tbl_product2` VALUES(2, 3, 'Surface Mount', '', 1);
INSERT INTO `tbl_product2` VALUES(2, 4, 'Back lighting', '', 2);
INSERT INTO `tbl_product2` VALUES(2, 5, 'General lighting', '', 3);
INSERT INTO `tbl_product2` VALUES(2, 6, 'LM-80', '', 4);
INSERT INTO `tbl_product2` VALUES(3, 7, 'Round Lamp', '', 1);
INSERT INTO `tbl_product2` VALUES(3, 8, 'Oval Lamp', '', 2);
INSERT INTO `tbl_product2` VALUES(3, 9, 'Piranha', '', 3);
INSERT INTO `tbl_product2` VALUES(3, 10, 'Lead Frame Axial', '', 4);
INSERT INTO `tbl_product2` VALUES(3, 11, 'Lamp with Housing', '', 5);
INSERT INTO `tbl_product2` VALUES(7, 12, 'Emitter', '', 1);
INSERT INTO `tbl_product2` VALUES(7, 13, 'Sensor', '', 2);
INSERT INTO `tbl_product2` VALUES(7, 14, 'Photo Coupler', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product3`
--

DROP TABLE IF EXISTS `tbl_product3`;
CREATE TABLE `tbl_product3` (
  `product2_id` int(11) NOT NULL COMMENT 'foreign key',
  `product3_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto id',
  `name` text NOT NULL COMMENT '名稱',
  `link` text NOT NULL COMMENT '連結',
  `order_num` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`product3_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_product3`
--

INSERT INTO `tbl_product3` VALUES(1, 1, 'Numeric', '', 1);
INSERT INTO `tbl_product3` VALUES(1, 2, 'Dot Metrix', '', 2);
INSERT INTO `tbl_product3` VALUES(2, 3, 'Four digit', '', 4);
INSERT INTO `tbl_product3` VALUES(2, 4, 'Triple Digit', '', 3);
INSERT INTO `tbl_product3` VALUES(2, 5, 'Dual Digit', '', 2);
INSERT INTO `tbl_product3` VALUES(2, 6, 'Single Digit', '', 1);
INSERT INTO `tbl_product3` VALUES(5, 13, '1W', '', 5);
INSERT INTO `tbl_product3` VALUES(4, 9, '1.0W', '', 4);
INSERT INTO `tbl_product3` VALUES(4, 10, '0.4W', '', 3);
INSERT INTO `tbl_product3` VALUES(4, 11, '0.1W', '', 2);
INSERT INTO `tbl_product3` VALUES(4, 12, '0.06W', '', 1);
INSERT INTO `tbl_product3` VALUES(5, 14, '0.5W', '', 4);
INSERT INTO `tbl_product3` VALUES(5, 15, '0.2W', '', 3);
INSERT INTO `tbl_product3` VALUES(5, 16, '0.1W', '', 2);
INSERT INTO `tbl_product3` VALUES(5, 17, '0.06W', '', 1);
INSERT INTO `tbl_product3` VALUES(6, 18, '0.5W', '', 2);
INSERT INTO `tbl_product3` VALUES(6, 19, '0.1W', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product4`
--

DROP TABLE IF EXISTS `tbl_product4`;
CREATE TABLE `tbl_product4` (
  `product3_id` int(11) NOT NULL COMMENT 'foreign key',
  `product4_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto id',
  `name` text NOT NULL COMMENT '名稱',
  `link` text NOT NULL COMMENT '連結',
  `order_num` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`product4_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_product4`
--

INSERT INTO `tbl_product4` VALUES(1, 1, 'Four Digit', '', 4);
INSERT INTO `tbl_product4` VALUES(1, 2, 'Triple Digit', '', 3);
INSERT INTO `tbl_product4` VALUES(1, 3, 'Dual Digit', '', 2);
INSERT INTO `tbl_product4` VALUES(1, 4, 'Single Digit', '', 1);
