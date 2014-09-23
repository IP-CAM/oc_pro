
DROP TABLE IF EXISTS OC_ADMIN;

CREATE TABLE `oc_admin` (
  `uid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `group_id` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(9) NOT NULL,
  `email` varchar(96) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_EXTENSION;

CREATE TABLE `oc_extension` (
  `extension_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS OC_SETTING;

CREATE TABLE `oc_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `group` varchar(32) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` text NOT NULL,
  `serialized` tinyint(1) NOT NULL
) ENGINE=InnoDB;