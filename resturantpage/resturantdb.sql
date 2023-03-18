CREATE DATABASE IF NOT EXISTS `RESTURANTDB`;
USE RESTURANTDB;
CREATE TABLE IF NOT EXISTS `users` (
  `User_id` int(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `age` int(255) NOT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

