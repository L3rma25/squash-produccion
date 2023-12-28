/*
SQLyog Ultimate v8.61 
MySQL - 5.5.5-10.4.14-MariaDB : Database - squash
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

insert  into `categorias`(`id_categoria`,`nombre_categoria`) values (1,'Refrescos'),(2,'Jugos'),(3,'Sabritas'),(4,'Chicles'),(5,'Cervezas');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `detalle_canchas` */

insert  into `detalle_canchas`(`id_det_cancha`,`id_cancha`,`hora_inicio`,`hora_termino`,`tiempo_transcurrido`,`costo`,`activo`,`fecha`) values (1,1,'19 : 57 : 18','12 : 49 : 07',NULL,'','No',NULL),(2,1,'12 : 46 : 25','12 : 49 : 07',NULL,'','No',NULL),(4,1,'12 : 51 : 33','12 : 54 : 48',NULL,'0','No','2022-09-05'),(5,1,'13 : 16 : 35','13 : 28 : 01',NULL,'0','No','2022-09-05'),(6,1,'13:34:51','21:01:03',NULL,'300','No','2022-09-05'),(7,1,'20:03:38','21:03:39',NULL,'60','No','2022-09-05'),(8,1,'20:15:31','21:18:09','62','41','No','2022-09-05'),(9,1,'22:15:18','22:17:38','2','1','No','2022-09-05'),(12,1,'22:25:31','22:33:01','7','4','No','2022-09-05'),(13,1,'22:37:49','22:38:45','0','0','No','2022-09-05'),(14,1,'19:57:01','20:22:08','25','17','No','2022-09-06'),(15,2,'20:13:19','20:21:46','8','5','No','2022-09-06'),(17,1,'15:19:43','15:20:08','0','0','No','2022-09-07'),(18,1,'15:50:10','15:50:49','0','0','No','2022-09-21'),(19,1,'15:54:08','15:57:16','3','2','No','2022-11-05'),(20,1,'18:12:09','19:02:00','49','39','No','2022-11-06');

/*Table structure for table `detalle_mesas` */

DROP TABLE IF EXISTS `detalle_mesas`;

CREATE TABLE `detalle_mesas` (
  `id_det_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesa` int(11) DEFAULT NULL,
  `hora_inicio` varchar(255) DEFAULT NULL,
  `hora_termino` varchar(255) DEFAULT NULL,
  `tiempo_transcurrido` varchar(255) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_det_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `detalle_mesas` */

insert  into `detalle_mesas`(`id_det_mesa`,`id_mesa`,`hora_inicio`,`hora_termino`,`tiempo_transcurrido`,`costo`,`activo`,`fecha`) values (19,3,'13:23:12','13:31:12','8','5','No','2022-09-14'),(20,1,'13:25:05','13:42:41','17','14','No','2022-09-14');

/*Table structure for table `detalle_venta` */

DROP TABLE IF EXISTS `detalle_venta`;

CREATE TABLE `detalle_venta` (
  `id_det_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` varchar(20) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_det_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `detalle_venta` */

insert  into `detalle_venta`(`id_det_venta`,`id_venta`,`id_producto`,`id_categoria`,`costo`) values (2,1,'7501153821038',1,'20'),(3,1,'7501153821038',1,'20'),(8,1,'070330506923',1,'5');

/*Table structure for table `mesas` */

DROP TABLE IF EXISTS `mesas`;

CREATE TABLE `mesas` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_mesa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `mesas` */

insert  into `mesas`(`id_mesa`,`nombre_mesa`) values (1,'Mesa 1'),(2,'Mesa 2'),(3,'Mesa 3');

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_producto` varchar(20) NOT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `stock` varchar(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  `codigo_barras` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

insert  into `productos`(`id_producto`,`nombre_producto`,`stock`,`id_categoria`,`costo`,`codigo_barras`) values ('070330506923','Cigarro','2',1,'5','070330506923'),('3','Cerveza XXX','0',5,'20','0000'),('7500810005026','Chipotles','0',3,'16','7500810005026'),('7501011143586','Cheetos','1',3,'16','7501011143586'),('7501064112546','Cerveza Modelo 355 ml','0',5,'22','7501064112546'),('7501153821038','Crema','3',1,'20','7501153821038');

/*Table structure for table `tipo_usuarios` */

DROP TABLE IF EXISTS `tipo_usuarios`;

CREATE TABLE `tipo_usuarios` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_usuarios` */

insert  into `tipo_usuarios`(`id_tipo_usuario`,`tipo`) values (1,'Administrador');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido_p` varchar(255) DEFAULT NULL,
  `apellido_m` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `intentos` varchar(10) DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nombre`,`apellido_p`,`apellido_m`,`usuario`,`contrasena`,`intentos`,`id_tipo_usuario`) values (1,'Lorenzo','Carrillo','Carrillo','chito','12345','1',1);

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

insert  into `ventas`(`id_venta`,`status`,`fecha`,`total`,`cliente`,`activada`) values (1,'Si','2022-11-07','0','JUAN','Si');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
