-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `car-rental` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `car-rental`;

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `car_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `car_model` varchar(50) NOT NULL,
  `plate_no` varchar(50) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `car_unit` varchar(50) NOT NULL,
  `car_color` varchar(50) NOT NULL,
  `car_type` varchar(50) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cars` (`car_id`, `car_model`, `plate_no`, `capacity`, `car_unit`, `car_color`, `car_type`, `car_name`, `price`, `manufacturer`, `created`) VALUES
(7,	'SENTRA',	'fa sdfa sdfasdf',	'ssd',	'dd',	'asd',	'dd',	'asdasd',	1222,	'asdasd',	'2018-12-19 03:27:06'),
(9,	'WILDTRAC',	'ddddxxxx',	'a sda sd',	'a sda sd',	'asd asd',	'a sdasd ',	'asd asd ',	123123,	'a sdas dsad',	'2019-01-06 01:03:57'),
(10,	'RANGER',	'dasda',	'asdasd',	'dasd',	'asdasd',	'asdasd',	'asdasd',	123123,	'asdasda',	'2019-01-06 01:40:44'),
(11,	'sdf sdf',	'sdfsdfsd',	'fsdfsd',	'fsdf',	'sdfsdf',	'sdfsdf',	'sdfsdf',	232,	'sdfsdfsdf',	'2019-01-06 01:40:55'),
(12,	'xxx',	'xxx',	'xxxx',	'xxx',	'xxx',	'xxx',	'xxxx',	123123,	'xxxx',	'2019-01-06 02:12:45');

DROP TABLE IF EXISTS `car_trans`;
CREATE TABLE `car_trans` (
  `car_trans_id` bigint(20) NOT NULL,
  `trans_id` bigint(20) NOT NULL,
  `car_id` bigint(20) NOT NULL,
  `pick_up_date` date NOT NULL,
  `pick_up_time` time NOT NULL,
  `return_date` date NOT NULL,
  `return_time` time NOT NULL,
  `total_price` float NOT NULL,
  KEY `car_id` (`car_id`),
  KEY `trans_id` (`trans_id`),
  CONSTRAINT `car_trans_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  CONSTRAINT `car_trans_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `trans_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reservation_id` varchar(50) NOT NULL,
  `transaction_no` varchar(100) NOT NULL,
  `payment_info` varchar(255) NOT NULL,
  `rental` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `first_name`, `middle_name`, `last_name`, `phone_no`, `address`, `usertype`, `date_created`) VALUES
(1,	'admin',	'1a1dc91c907325c69271ddf0c944bc72',	'xxx@gmail.com',	'Pancho',	'xxx',	'Pilato',	'jnkj',	'njnkjn',	'admin',	'2018-11-10 16:05:39'),
(4,	'asdasd',	'f67c2bcbfcfa30fccb36f72dca22a817',	'',	'asdasd',	'asdasd',	'asdasd',	'asda',	'asdasd',	'customer',	'2019-01-06 02:21:16'),
(7,	'wang',	'1a1dc91c907325c69271ddf0c944bc72',	'long@gmail.com',	'wang',	'd',	'long',	'123',	'asdasd',	'customer',	'2019-01-06 14:23:49');

-- 2019-01-06 22:04:16
