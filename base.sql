/*
SQLyog Ultimate v8.61 
MySQL - 5.5.16 : Database - squash
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`squash` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `squash`;

/*Table structure for table `canchas` */

DROP TABLE IF EXISTS `canchas`;

CREATE TABLE `canchas` (
  `id_cancha` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cancha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cancha`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `canchas` */

insert  into `canchas`(`id_cancha`,`nombre_cancha`) values (1,'Cancha 1'),(2,'Cancha 2');

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `categorias` */

insert  into `categorias`(`id_categoria`,`nombre_categoria`) values (1,'Refrescos'),(2,'Jugos'),(3,'Sabritas'),(4,'Chicles'),(5,'Cervecas');

/*Table structure for table `detalle_canchas` */

DROP TABLE IF EXISTS `detalle_canchas`;

CREATE TABLE `detalle_canchas` (
  `id_det_cancha` int(11) NOT NULL AUTO_INCREMENT,
  `id_cancha` int(11) DEFAULT NULL,
  `hora_inicio` varchar(255) DEFAULT NULL,
  `hora_termino` varchar(255) DEFAULT NULL,
  `tiempo_transcurrido` varchar(255) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_det_cancha`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `detalle_canchas` */

insert  into `detalle_canchas`(`id_det_cancha`,`id_cancha`,`hora_inicio`,`hora_termino`,`tiempo_transcurrido`,`costo`,`activo`,`fecha`) values (1,1,'19 : 57 : 18','12 : 49 : 07',NULL,'','No',NULL),(2,1,'12 : 46 : 25','12 : 49 : 07',NULL,'','No',NULL),(4,1,'12 : 51 : 33','12 : 54 : 48',NULL,'','No','2022-09-05'),(5,1,'13 : 16 : 35','13 : 28 : 01',NULL,'','No','2022-09-05'),(6,1,'13:34:51','21:01:03',NULL,'300','No','2022-09-05'),(7,1,'20:03:38','21:03:39',NULL,'60','No','2022-09-05'),(8,1,'20:15:31','21:18:09','62','41.333333333333','No','2022-09-05'),(9,1,'22:15:18','22:17:38','2','1.3333333333333','No','2022-09-05'),(12,1,'22:25:31','22:33:01','7','4.6666666666667','No','2022-09-05'),(13,1,'22:37:49','22:38:45','0','0','No','2022-09-05'),(14,1,'19:57:01','20:22:08','25','17','No','2022-09-06'),(15,2,'20:13:19','20:21:46','8','5','No','2022-09-06'),(17,1,'15:19:43','15:20:08','0','0','No','2022-09-07'),(18,1,'12:43:10','','','','Si','2022-09-09');

/*Table structure for table `detalle_venta` */

DROP TABLE IF EXISTS `detalle_venta`;

CREATE TABLE `detalle_venta` (
  `id_det_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_det_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `detalle_venta` */

insert  into `detalle_venta`(`id_det_venta`,`id_venta`,`id_producto`,`id_categoria`,`costo`) values (1,1,1,1,'20'),(2,1,3,3,'15'),(3,2,2,1,'18'),(4,2,3,3,'15'),(5,2,1,1,'20'),(6,3,5,5,'22'),(7,3,5,5,'22'),(8,3,5,5,'22'),(9,4,1,1,'20'),(10,4,3,3,'15'),(11,4,1,1,'20'),(12,4,1,1,'20'),(13,2,3,3,'15');

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

insert  into `productos`(`id_producto`,`nombre_producto`,`stock`,`id_categoria`,`costo`) values (1,'Coca Cola 600ml',-5,1,'20'),(2,'Sprite 600ml',8,1,'18'),(3,'Cheetos',2,3,'15'),(4,'Trident',10,4,'3'),(5,'Cerveza Victoria 355 ml',86,5,'22');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `status` varchar(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `activada` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ventas` */

insert  into `ventas`(`id_venta`,`status`,`fecha`,`total`,`cliente`,`activada`) values (1,'No','2022-09-09','35','JUAN','No'),(2,'Si','2022-09-09','0','Yuli','Si'),(3,'Si','2022-09-09','0','lerma','Si'),(4,'Si','2022-09-09','0','Paco','Si');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
