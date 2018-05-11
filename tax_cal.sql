/*
SQLyog Community v12.09 (64 bit)
MySQL - 5.7.13-log : Database - tax_cal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tax_cal` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tax_cal`;

/*Table structure for table `basic_income` */

DROP TABLE IF EXISTS `basic_income`;

CREATE TABLE `basic_income` (
  `id` int(11) NOT NULL,
  `min_income` varchar(45) NOT NULL,
  `max_income` varchar(45) NOT NULL,
  `tax_rates` varchar(45) NOT NULL,
  `max_tax` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `basic_income` */

insert  into `basic_income`(`id`,`min_income`,`max_income`,`tax_rates`,`max_tax`) values (1,'0','250000','0','0'),(2,'250000','400000','.1','15000'),(3,'400000','500000','.15','15000'),(4,'500000','600000','.20','20000'),(5,'600000','3000000','.25','600000'),(6,'3000000','100000000000','.30','9997000000'),(7,'300000','400000','.10','10000');

/*Table structure for table `home_rant` */

DROP TABLE IF EXISTS `home_rant`;

CREATE TABLE `home_rant` (
  `id` int(11) NOT NULL,
  `min_income` varchar(45) DEFAULT NULL,
  `max_income` varchar(45) DEFAULT NULL,
  `tax_rates` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `home_rant` */

insert  into `home_rant`(`id`,`min_income`,`max_income`,`tax_rates`) values (1,'0','120000','0.00'),(2,'120000','0','.10');

/*Table structure for table `medicare` */

DROP TABLE IF EXISTS `medicare`;

CREATE TABLE `medicare` (
  `id` int(11) NOT NULL,
  `min_income` varchar(45) DEFAULT NULL,
  `max_income` varchar(45) DEFAULT NULL,
  `tax_rates` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `medicare` */

insert  into `medicare`(`id`,`min_income`,`max_income`,`tax_rates`) values (1,'0','36000','0'),(2,'36000','NILL','.10');

/*Table structure for table `other_income` */

DROP TABLE IF EXISTS `other_income`;

CREATE TABLE `other_income` (
  `id` int(11) NOT NULL,
  `min_income` varchar(45) DEFAULT NULL,
  `max_income` varchar(45) DEFAULT NULL,
  `tax_rates` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `other_income` */

insert  into `other_income`(`id`,`min_income`,`max_income`,`tax_rates`) values (1,'0','50000','0'),(2,'50000','NILL','.1');

/*Table structure for table `transport_cost` */

DROP TABLE IF EXISTS `transport_cost`;

CREATE TABLE `transport_cost` (
  `id` int(11) NOT NULL,
  `min_income` varchar(45) DEFAULT NULL,
  `max_income` varchar(45) DEFAULT NULL,
  `tax_rates` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `transport_cost` */

insert  into `transport_cost`(`id`,`min_income`,`max_income`,`tax_rates`) values (1,'0','12000','0'),(2,'12000','NULL','.10');

/*Table structure for table `my_view1` */

DROP TABLE IF EXISTS `my_view1`;

/*!50001 DROP VIEW IF EXISTS `my_view1` */;
/*!50001 DROP TABLE IF EXISTS `my_view1` */;

/*!50001 CREATE TABLE  `my_view1`(
 `id` int(11) ,
 `min_income` varchar(45) ,
 `max_income` varchar(45) ,
 `tax_rates` varchar(45) 
)*/;

/*Table structure for table `my_view_table` */

DROP TABLE IF EXISTS `my_view_table`;

/*!50001 DROP VIEW IF EXISTS `my_view_table` */;
/*!50001 DROP TABLE IF EXISTS `my_view_table` */;

/*!50001 CREATE TABLE  `my_view_table`(
 `id` int(11) ,
 `min_income` varchar(45) ,
 `max_income` varchar(45) ,
 `tax_rates` varchar(45) ,
 `max_tax` varchar(255) 
)*/;

/*Table structure for table `new_view` */

DROP TABLE IF EXISTS `new_view`;

/*!50001 DROP VIEW IF EXISTS `new_view` */;
/*!50001 DROP TABLE IF EXISTS `new_view` */;

/*!50001 CREATE TABLE  `new_view`(
 `id` int(11) ,
 `min_income` varchar(45) ,
 `max_income` varchar(45) ,
 `tax_rates` varchar(45) 
)*/;

/*View structure for view my_view1 */

/*!50001 DROP TABLE IF EXISTS `my_view1` */;
/*!50001 DROP VIEW IF EXISTS `my_view1` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `my_view1` AS select `basic_income`.`id` AS `id`,`basic_income`.`min_income` AS `min_income`,`basic_income`.`max_income` AS `max_income`,`basic_income`.`tax_rates` AS `tax_rates` from `basic_income` */;

/*View structure for view my_view_table */

/*!50001 DROP TABLE IF EXISTS `my_view_table` */;
/*!50001 DROP VIEW IF EXISTS `my_view_table` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `my_view_table` AS select `basic_income`.`id` AS `id`,`basic_income`.`min_income` AS `min_income`,`basic_income`.`max_income` AS `max_income`,`basic_income`.`tax_rates` AS `tax_rates`,`basic_income`.`max_tax` AS `max_tax` from `basic_income` */;

/*View structure for view new_view */

/*!50001 DROP TABLE IF EXISTS `new_view` */;
/*!50001 DROP VIEW IF EXISTS `new_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `new_view` AS select `basic_income`.`id` AS `id`,`basic_income`.`min_income` AS `min_income`,`basic_income`.`max_income` AS `max_income`,`basic_income`.`tax_rates` AS `tax_rates` from `basic_income` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
