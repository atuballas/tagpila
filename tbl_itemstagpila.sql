-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2013 at 11:22 AM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tagpila_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE IF NOT EXISTS `tbl_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_title` varchar(255) NOT NULL,
  `item_desc` text NOT NULL,
  `item_price` double(4,2) NOT NULL,
  `isActive` tinyint(1) NOT NULL COMMENT '0 - inactive 1 - active. if inactive, it will not show in the result page',
  `item_category_fk` int(10) NOT NULL COMMENT 'this is useful if the categorized feature is to be added',
  `item_subcategory_fk` int(10) NOT NULL COMMENT 'this is useful if the categorized feature is to be added',
  `item_image_fk` int(10) NOT NULL COMMENT 'linked to table image',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'time and date the item has been added',
  PRIMARY KEY (`id`),
  KEY `timestamp` (`timestamp`),
  KEY `item_title` (`item_title`),
  KEY `item_price` (`item_price`),
  KEY `isActive` (`isActive`),
  KEY `item_category` (`item_category_fk`),
  KEY `item_subcategory` (`item_subcategory_fk`),
  KEY `item_images` (`item_image_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_items`
--

