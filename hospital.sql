/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : hospital

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2017-01-07 12:50:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) DEFAULT NULL,
  `commision` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'X-Ray', '50');
INSERT INTO `category` VALUES ('2', 'Pathology', '30');
INSERT INTO `category` VALUES ('12', 'fffff', '323');

-- ----------------------------
-- Table structure for category_service
-- ----------------------------
DROP TABLE IF EXISTS `category_service`;
CREATE TABLE `category_service` (
  `category_service_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `service_list_id` int(10) NOT NULL,
  PRIMARY KEY (`category_service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category_service
-- ----------------------------
INSERT INTO `category_service` VALUES ('1', '1', '1');
INSERT INTO `category_service` VALUES ('2', '1', '2');
INSERT INTO `category_service` VALUES ('3', '2', '2');
INSERT INTO `category_service` VALUES ('4', '1', '1');
INSERT INTO `category_service` VALUES ('5', '1', '1');
INSERT INTO `category_service` VALUES ('6', '1', '1');
INSERT INTO `category_service` VALUES ('7', '2', '1');

-- ----------------------------
-- Table structure for dr_info
-- ----------------------------
DROP TABLE IF EXISTS `dr_info`;
CREATE TABLE `dr_info` (
  `dr_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`dr_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dr_info
-- ----------------------------
INSERT INTO `dr_info` VALUES ('1', 'ccc', 'sadf', 'asdf', 'asdf');
INSERT INTO `dr_info` VALUES ('2', 'two', 'tsdkf', 'sljf', 'sjdfks');
INSERT INTO `dr_info` VALUES ('3', 'two', 'tsdkf', 'sljf', 'nnnnnnn');
INSERT INTO `dr_info` VALUES ('4', 'aaaaaaaaaa', 'sadf', 'asdf', 'asdf');
INSERT INTO `dr_info` VALUES ('5', 'bbbbb', 'tsdkf', 'sljf', 'sjdfks');
INSERT INTO `dr_info` VALUES ('6', 'bbpp', 'tsdkf', 'sljf', 'nnnnnnn');
INSERT INTO `dr_info` VALUES ('7', 'sdf', 'asdf', 'asdf', 'asdf');
INSERT INTO `dr_info` VALUES ('8', 'sdf', 'asdf', 'asdf', 'asdf');
INSERT INTO `dr_info` VALUES ('9', 'vv', 'vv', 'vv', 'vv');
INSERT INTO `dr_info` VALUES ('10', '11', '11', '11', '11');
INSERT INTO `dr_info` VALUES ('11', '22', '22', '22', '22');

-- ----------------------------
-- Table structure for investigation_billing
-- ----------------------------
DROP TABLE IF EXISTS `investigation_billing`;
CREATE TABLE `investigation_billing` (
  `investigation_billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `sex` enum('Female','Male') DEFAULT NULL,
  `age_type` varchar(50) DEFAULT NULL,
  `address_phone` varchar(250) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_time` varchar(100) DEFAULT NULL,
  `doctors_name` int(11) NOT NULL,
  `ref_name` varchar(150) NOT NULL,
  `category_service_json` text NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `less` int(11) DEFAULT NULL,
  `less_percent` int(11) DEFAULT NULL,
  `total_paid` int(11) NOT NULL,
  `due` int(11) DEFAULT NULL,
  PRIMARY KEY (`investigation_billing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of investigation_billing
-- ----------------------------
INSERT INTO `investigation_billing` VALUES ('30', '12345', '0000-00-00', 'Jakir', 'Male', '32 Year', 'Dhaka', '0000-00-00', '8.00PM', '2', 'qqq', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('31', '12345', '0000-00-00', 'Jakir', 'Male', '32 Year', 'Dhaka', '0000-00-00', '8.00PM', '2', 'qqq', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('32', '12345', '0000-00-00', 'Jakir', 'Male', '32 Year', 'Dhaka', '0000-00-00', '8.00PM', '2', 'qqq', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('33', '12345', '0000-00-00', 'Jakir', 'Male', '32 Year', 'Dhaka', '0000-00-00', '8.00PM', '2', 'qqq', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('34', 'sdf', '0000-00-00', 'lklk', 'Male', '33 Year', 'klk', '0000-00-00', '8.00PM', '1', 'Select Referance', '[\"1\",\"2\"]', '3203', '0', '0', '0', '3203');
INSERT INTO `investigation_billing` VALUES ('35', 'sdf', '0000-00-00', 'lklk', 'Male', '33 Year', 'klk', '0000-00-00', '8.00PM', '1', 'Select Referance', '[\"1\",\"2\"]', '3203', '0', '0', '0', '3203');
INSERT INTO `investigation_billing` VALUES ('36', '76543', '0000-00-00', '', 'Male', ' Year', '', '0000-00-00', '8.00PM', '0', 'Select Referance', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('37', '76543', '0000-00-00', '', 'Male', ' Year', '', '0000-00-00', '8.00PM', '0', 'Select Referance', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('38', '76543', '0000-00-00', '', 'Male', ' Year', '', '0000-00-00', '8.00PM', '0', 'Select Referance', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('39', '76543', '0000-00-00', '', 'Male', ' Year', '', '0000-00-00', '8.00PM', '0', 'Select Referance', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('40', '76543', '0000-00-00', '', 'Male', ' Year', '', '0000-00-00', '8.00PM', '0', 'Select Referance', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('41', '76543', '0000-00-00', '', 'Male', ' Year', '', '0000-00-00', '8.00PM', '0', 'Select Referance', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('42', '76543', '0000-00-00', '', 'Male', ' Year', '', '0000-00-00', '8.00PM', '0', 'Select Referance', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('43', '76543', '0000-00-00', '', 'Male', ' Year', '', '0000-00-00', '8.00PM', '0', 'Select Referance', '[\"1\",\"2\",\"1\"]', '5906', '0', '0', '0', '5906');
INSERT INTO `investigation_billing` VALUES ('44', '100', '0000-00-00', 'Hunny', 'Female', '20 Year', 'Dhaka', '0000-00-00', '8.00PM', '1', 'aaaaaaaaaa', '[\"1\",\"2\"]', '3203', '0', '0', '0', '3203');

-- ----------------------------
-- Table structure for referance_commision
-- ----------------------------
DROP TABLE IF EXISTS `referance_commision`;
CREATE TABLE `referance_commision` (
  `referance_commision_id` int(10) NOT NULL AUTO_INCREMENT,
  `investigation_billing_id` int(10) NOT NULL,
  `referance_name` varchar(150) NOT NULL,
  `commision` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`referance_commision_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of referance_commision
-- ----------------------------
INSERT INTO `referance_commision` VALUES ('15', '30', 'qqq', '80');
INSERT INTO `referance_commision` VALUES ('16', '31', 'qqq', '80');
INSERT INTO `referance_commision` VALUES ('17', '32', 'qqq', '80');
INSERT INTO `referance_commision` VALUES ('18', '33', 'qqq', '80');
INSERT INTO `referance_commision` VALUES ('19', '42', 'Select Referance', '80');
INSERT INTO `referance_commision` VALUES ('20', '44', 'aaaaaaaaaa', '80');

-- ----------------------------
-- Table structure for ref_info
-- ----------------------------
DROP TABLE IF EXISTS `ref_info`;
CREATE TABLE `ref_info` (
  `ref_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ref_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ref_info
-- ----------------------------
INSERT INTO `ref_info` VALUES ('1', 'aaaaaaaaaa', 'sadf', 'asdf');
INSERT INTO `ref_info` VALUES ('2', 'qqq', 'ww', 'eee');
INSERT INTO `ref_info` VALUES ('3', 'sadf', 'asdf', 'asfd');
INSERT INTO `ref_info` VALUES ('4', 'ooo', 'ooooooo', 'ooooo');
INSERT INTO `ref_info` VALUES ('5', 'ppppp', 'ppppp', 'ppppppp');
INSERT INTO `ref_info` VALUES ('6', 'rrr', 'rrr', 'rrr');
INSERT INTO `ref_info` VALUES ('7', 'lola sex', '838478', 'kdsjf');
INSERT INTO `ref_info` VALUES ('8', 'df', 'dfg', 'dfg');
INSERT INTO `ref_info` VALUES ('9', 'sad', 'asd', 'asd');
INSERT INTO `ref_info` VALUES ('10', 'sad', 'asd', 'asd');
INSERT INTO `ref_info` VALUES ('11', 'dfad', 'asdf', 'asdf');
INSERT INTO `ref_info` VALUES ('12', 'dfgd', 'sdfg', '453');
INSERT INTO `ref_info` VALUES ('13', 'yy', 'by', 'yy');
INSERT INTO `ref_info` VALUES ('14', 'ddd', 'ddd', 'ddd');
INSERT INTO `ref_info` VALUES ('15', 'hhh', 'hhh', 'hhh');
INSERT INTO `ref_info` VALUES ('16', 'bbbbbbbbb', '43434', '344');
INSERT INTO `ref_info` VALUES ('17', 'llll', 'lll', 'llll');

-- ----------------------------
-- Table structure for service_list
-- ----------------------------
DROP TABLE IF EXISTS `service_list`;
CREATE TABLE `service_list` (
  `service_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_list_name` varchar(250) DEFAULT NULL,
  `service_list_price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`service_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_list
-- ----------------------------
INSERT INTO `service_list` VALUES ('1', 'APTT', '2703');
INSERT INTO `service_list` VALUES ('2', 'AGP', '500');
INSERT INTO `service_list` VALUES ('35', 'Immunoglobulin', '33');
INSERT INTO `service_list` VALUES ('36', 'Hormone Report', '44');
INSERT INTO `service_list` VALUES ('37', '3', '0');
INSERT INTO `service_list` VALUES ('38', '43', '0');
INSERT INTO `service_list` VALUES ('39', 'sdf', '43');
INSERT INTO `service_list` VALUES ('40', 'sdf', '43');
INSERT INTO `service_list` VALUES ('41', 'sdf', '0');
INSERT INTO `service_list` VALUES ('42', 'test', '78');

-- ----------------------------
-- Table structure for service_report
-- ----------------------------
DROP TABLE IF EXISTS `service_report`;
CREATE TABLE `service_report` (
  `service_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_list_id` int(11) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `normal_value` varchar(255) DEFAULT NULL,
  `service_report_status` int(10) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`service_report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_report
-- ----------------------------
INSERT INTO `service_report` VALUES ('1', '35', 'CA-125', 'U/L', 'Up to 35 U/L', null, 'Active', '2016-12-31 01:45:46', '0', '2017-01-05 00:42:31', null);
INSERT INTO `service_report` VALUES ('2', '35', 'Anti-CCP Antiboday', 'U/L', '< 5.0 is Negative > 5.0 is Pos', null, 'Active', '2017-01-04 01:25:34', '0', '2017-01-05 00:43:47', null);
INSERT INTO `service_report` VALUES ('3', '35', 'Serum', 'U/ml', '>10=Positive<10=Negative', null, 'Active', '2017-01-05 00:44:36', '0', '2017-01-05 00:44:36', null);
INSERT INTO `service_report` VALUES ('4', '35', 'Anti HPylori', 'Urbo/ml', '<12 Urbo/ml=Negative>12', null, 'Active', '2017-01-05 00:45:43', '0', '2017-01-05 00:45:43', null);
INSERT INTO `service_report` VALUES ('5', '35', 'Anti Dengue IgG', 'g/L', '7.0- 16.0 g/L', null, 'Active', '2017-01-05 00:46:40', '0', '2017-01-05 00:46:40', null);
INSERT INTO `service_report` VALUES ('6', '35', 'Anti Dengue IgM', 'g/L', '0.4 - 2.30 g/L', null, 'Active', '2017-01-05 00:47:23', '0', '2017-01-05 00:47:23', null);
INSERT INTO `service_report` VALUES ('7', '35', 'Complement 3(C3)', 'g/L', '0.90 - 1.80', null, 'Active', '2017-01-05 00:48:01', '0', '2017-01-05 00:48:01', null);
INSERT INTO `service_report` VALUES ('8', '35', 'Complement 4(C4)', 'mg/dl', '15-45', null, 'Active', '2017-01-05 00:48:32', '0', '2017-01-05 00:48:32', null);
INSERT INTO `service_report` VALUES ('9', '36', 'T3', 'ng/ml', '0.80-2.10', null, 'Active', '2017-01-05 00:49:58', '0', '2017-01-05 00:49:58', null);
INSERT INTO `service_report` VALUES ('10', '36', 'T4', 'ug/dl', '5.0-13.0', null, 'Active', '2017-01-05 00:50:26', '0', '2017-01-05 00:50:26', null);
INSERT INTO `service_report` VALUES ('11', '36', 'Free T3', 'pmol/Li', '2.8-7.30', null, 'Active', '2017-01-05 00:50:59', '0', '2017-01-05 00:50:59', null);

-- ----------------------------
-- Table structure for service_report_details
-- ----------------------------
DROP TABLE IF EXISTS `service_report_details`;
CREATE TABLE `service_report_details` (
  `service_report_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_list_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `test_value_json` text,
  `service_report_details_status` int(10) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`service_report_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_report_details
-- ----------------------------
INSERT INTO `service_report_details` VALUES ('1', '35', '111', 'jakir', '323', '{\"1\":\"fgh\",\"2\":\"\",\"3\":\"\",\"4\":\"fgh\",\"5\":\"\",\"6\":\"\",\"7\":\"\",\"8\":\"\"}', null, 'Active', '2017-01-06 21:20:35', '0', '2017-01-06 21:20:35', null);
INSERT INTO `service_report_details` VALUES ('2', '35', '7654', 'hgfds', '543', '[\"fgf\",\"fgf\",\"fgfg\"]', null, 'Active', '2017-01-06 21:25:41', '0', '2017-01-06 21:25:41', null);
INSERT INTO `service_report_details` VALUES ('3', '35', '0', 'dfa', '0', '{\"2\":\"sdf\",\"5\":\"sdf\",\"6\":\"sad\"}', null, 'Active', '2017-01-06 21:28:07', '0', '2017-01-06 21:28:07', null);
INSERT INTO `service_report_details` VALUES ('4', '35', '0', 'sdf', '0', '{\"1\":\"sdf\",\"3\":\"sdf\",\"6\":\"dsf\"}', null, 'Active', '2017-01-06 22:08:20', '0', '2017-01-06 22:08:20', null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role_id` varchar(255) DEFAULT NULL,
  `module_id` varchar(255) DEFAULT NULL,
  `default_module_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `rl` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', 'jakir', 'e10adc3949ba59abbe56e057f20f883e', 'Zilon Jakir', 'Admin', '01915117181', 'jzilon@yahoo.com', '1', '[\"1\",\"2\",\"4\"]', '1');
INSERT INTO `user` VALUES ('3', '', '', null, null, null, null, null, '[\"4\",\"3\",\"2\"]', null);
