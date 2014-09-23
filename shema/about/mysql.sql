
DROP TABLE IF EXISTS OC_USER;

CREATE TABLE `oc_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nick` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(96) NOT NULL,
  `iphone` varchar(32) NOT NULL,
  `sex` tinyint(2) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_CAT;

CREATE TABLE `oc_cat` (
  `cid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `top` tinyint(1) NOT NULL,
  `sort` int(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ctime` int
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_ITEM;

CREATE TABLE `oc_item` (
  `iid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `sku` varchar(64) NOT NULL,
  `quantity` int(4) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `point` int(8) NOT NULL,
  `weight` decimal(15,1) NOT NULL DEFAULT '0.0',
  `length` decimal(15,1) NOT NULL DEFAULT '0.0',
  `width` decimal(15,1) NOT NULL DEFAULT '0.0',
  `height` decimal(15,1) NOT NULL DEFAULT '0.0',
  `sort` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ctime` int
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_ITEM_IMAGE;

CREATE TABLE `oc_item_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `iid` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort` int(3) NOT NULL,
  `cover` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_OPTION;

CREATE TABLE `oc_option` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(120) NOT NULL,
  `type` varchar(32) NOT NULL,
  `sort` int(3) NOT NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_OPTION_VALUE;

CREATE TABLE `oc_option_value` (
  `option_value_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(120) NOT NULL,
  `option_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `color` varchar(32),
  `sort` int(3) NOT NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_RELATEDOPTION;

CREATE TABLE `oc_relatedoption` (
  `relatedoption_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `iid` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `price` decimal(15,4) NOT NULL,
  `model` varchar(64) NOT NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_RELATEDOPTION_OPTION;

CREATE TABLE `oc_relatedoption_option` (
  `relatedoption_id` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_value_id` int(11) NOT NULL,
  KEY `relatedoption_id` (`relatedoption_id`),
  KEY `option_value_id` (`option_value_id`),
  KEY `option_id` (`option_id`),
  KEY `iid` (`iid`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_RELATEDOPTION_DISCOUNT;

CREATE TABLE `oc_relatedoption_discount` (
  `relatedoption_id` int(11) NOT NULL,
  `customer_group_id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `priority` int(5) NOT NULL,
  `price` decimal(15,4) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  KEY `relatedoption_id` (`relatedoption_id`),
  KEY `customer_group_id` (`customer_group_id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_RELATEDOPTION_IMAGE;

CREATE TABLE `oc_relatedoption_image` (
  `relatedoption_id` int(10) unsigned NOT NULL,
  `item_image_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`relatedoption_id`,`item_image_id`),
  KEY `id_image` (`item_image_id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_ATTR_GROUP;

CREATE TABLE `oc_attr_group` (
  `attr_group_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(64) NOT NULL,
  `sort` int(3) NOT NULL
) ENGINE=InnoDB;

-- attribute

DROP TABLE IF EXISTS OC_ATTR;

CREATE TABLE `oc_attr` (
  `attr_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(64) NOT NULL,
  `attr_group_id` int(11) NOT NULL,
  `sort` int(3) NOT NULL
) ENGINE=InnoDB;


DROP TABLE IF EXISTS OC_ITEM_ATTR;

CREATE TABLE `oc_item_attr` (
  `iid` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`iid`,`attr_id`)
) ENGINE=InnoDB;



