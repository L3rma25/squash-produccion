/*
SQLyog Ultimate v8.61 
MySQL - 8.0.26 : Database - squash
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`squash` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `squash`;

/*Table structure for table `canchas` */

DROP TABLE IF EXISTS `canchas`;

CREATE TABLE `canchas` (
  `id_cancha` int NOT NULL AUTO_INCREMENT,
  `nombre_cancha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cancha`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `canchas` */

insert  into `canchas`(`id_cancha`,`nombre_cancha`) values (1,'Cancha 1'),(2,'Cancha 2');

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `categorias` */

insert  into `categorias`(`id_categoria`,`nombre_categoria`) values (1,'Refrescos'),(2,'Jugos'),(3,'Sabritas'),(4,'Chicles'),(5,'Cervezas'),(8,'Cigarros');

/*Table structure for table `detalle_canchas` */

DROP TABLE IF EXISTS `detalle_canchas`;

CREATE TABLE `detalle_canchas` (
  `id_det_cancha` int NOT NULL AUTO_INCREMENT,
  `id_cancha` int DEFAULT NULL,
  `hora_inicio` varchar(255) DEFAULT NULL,
  `hora_termino` varchar(255) DEFAULT NULL,
  `tiempo_transcurrido` varchar(255) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_det_cancha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalle_canchas` */

/*Table structure for table `detalle_mesas` */

DROP TABLE IF EXISTS `detalle_mesas`;

CREATE TABLE `detalle_mesas` (
  `id_det_mesa` int NOT NULL AUTO_INCREMENT,
  `id_mesa` int DEFAULT NULL,
  `hora_inicio` varchar(255) DEFAULT NULL,
  `hora_termino` varchar(255) DEFAULT NULL,
  `tiempo_transcurrido` varchar(255) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_det_mesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalle_mesas` */

/*Table structure for table `detalle_venta` */

DROP TABLE IF EXISTS `detalle_venta`;

CREATE TABLE `detalle_venta` (
  `id_det_venta` int NOT NULL AUTO_INCREMENT,
  `id_venta` int DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `id_categoria` int DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_det_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalle_venta` */

/*Table structure for table `mesas` */

DROP TABLE IF EXISTS `mesas`;

CREATE TABLE `mesas` (
  `id_mesa` int NOT NULL AUTO_INCREMENT,
  `nombre_mesa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `mesas` */

insert  into `mesas`(`id_mesa`,`nombre_mesa`) values (1,'Mesa 1'),(2,'Mesa 2'),(3,'Mesa 3');

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_producto` int NOT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `stock` varchar(11) DEFAULT NULL,
  `id_categoria` int DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

insert  into `productos`(`id_producto`,`nombre_producto`,`stock`,`id_categoria`,`costo`) values (1,'Coca Cola 600ml','0',1,'22'),(2,'Sprite 600ml','0',1,'18'),(3,'Cheetos','0',3,'15'),(4,'Trident','0',4,'3'),(5,'Cerveza Victoria 355 ml','0',5,'22'),(6,'Cerveza Indio 355 ml','0',5,'22'),(7,'Cerveza Tecate 355 ml','0',5,'22'),(8,'Cerveza XXX 355 ml','0',5,'23'),(9,'Doritos','0',3,'18'),(10,'Rufles','0',3,'18'),(11,'Gatorade 500 ml','0',2,'27'),(12,'Cigarros Malboro','19',8,'6');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id_venta` int NOT NULL,
  `status` varchar(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `activada` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ventas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
