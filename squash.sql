-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 28. Dez 2023 um 23:43
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `squash`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `canchas`
--

CREATE TABLE IF NOT EXISTS `canchas` (
  `id_cancha` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cancha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cancha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `canchas`
--

INSERT INTO `canchas` (`id_cancha`, `nombre_cancha`) VALUES
(1, 'Cancha NORTE'),
(2, 'Cancha SUR');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Daten für Tabelle `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'BOTANAS SABRITAS'),
(2, 'BIMBO'),
(3, 'MARINELA'),
(4, 'COCA COLA'),
(5, 'JUGOS'),
(6, 'GATORADE'),
(7, 'PEÃ‘AFIEL'),
(8, 'BEBIDAS ENERGIZANTES'),
(9, 'DULCES'),
(10, 'CIGARROS'),
(11, 'CERVEZAS'),
(12, 'AGUAS EMBOTELLADAS'),
(13, 'SOPAS'),
(14, 'PELOTAS');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `detalle_canchas`
--

CREATE TABLE IF NOT EXISTS `detalle_canchas` (
  `id_det_cancha` int(11) NOT NULL AUTO_INCREMENT,
  `id_cancha` int(11) DEFAULT NULL,
  `hora_inicio` varchar(255) DEFAULT NULL,
  `hora_termino` varchar(255) DEFAULT NULL,
  `tiempo_transcurrido` varchar(255) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_det_cancha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `detalle_canchas`
--

INSERT INTO `detalle_canchas` (`id_det_cancha`, `id_cancha`, `hora_inicio`, `hora_termino`, `tiempo_transcurrido`, `costo`, `activo`, `fecha`, `cliente`) VALUES
(1, 1, '16:08:02', '', '', '', 'Si', '2023-12-28', 'RAFAEL-FIERROS'),
(2, 2, '16:18:36', '', '', '', 'Si', '2023-12-28', 'PASCUAL-RAFA');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `detalle_mesas`
--

CREATE TABLE IF NOT EXISTS `detalle_mesas` (
  `id_det_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `id_mesa` int(11) DEFAULT NULL,
  `hora_inicio` varchar(255) DEFAULT NULL,
  `hora_termino` varchar(255) DEFAULT NULL,
  `tiempo_transcurrido` varchar(255) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_det_mesa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `detalle_mesas`
--

INSERT INTO `detalle_mesas` (`id_det_mesa`, `id_mesa`, `hora_inicio`, `hora_termino`, `tiempo_transcurrido`, `costo`, `activo`, `fecha`) VALUES
(1, 1, '16:09:45', '16:40:48', '31', '26', 'No', '2023-12-28');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id_det_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` varchar(20) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_det_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_det_venta`, `id_venta`, `id_producto`, `id_categoria`, `costo`) VALUES
(1, 1, '036731323002', 6, '30'),
(2, 1, '75038762', 9, '3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_mesa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mesa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `mesas`
--

INSERT INTO `mesas` (`id_mesa`, `nombre_mesa`) VALUES
(1, 'Mesa 1'),
(2, 'Mesa 2'),
(3, 'Mesa 3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` varchar(20) NOT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `stock` varchar(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  `codigo_barras` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `stock`, `id_categoria`, `costo`, `codigo_barras`) VALUES
('026388010011', 'PELOTA WILSON 4', '9', 14, '75', '026388010011'),
('036731103512', 'GATORADE NARANJA 350 ML', '7', 6, '15', '036731103512'),
('036731103536', 'GATORADE LIMA LIMON 350 ML', '5', 6, '15', '036731103536'),
('036731322005', 'GATORADE LIMONADA 1L', '5', 6, '30', '036731322005'),
('036731323002', 'GATORADE LIMA LIMON 1L', '6', 6, '30', '036731323002'),
('036731324009', 'GATORADE UVA 1L', '4', 6, '30', '036731324009'),
('036731326003', 'GATORADE PONCHE 1L', '9', 6, '30', '036731326003'),
('7500478015481', 'CHEETOS FLAMIN HOT', '6', 1, '15', '7500478015481'),
('7500478018512', 'DORITOS DINAMITA', '4', 1, '15', '7500478018512'),
('7500810010747', 'MANTECADAS BITES', '1', 2, '15', '7500810010747'),
('7500810011126', 'PRINCIPE CHOCOLATE', '1', 3, '19', '7500810011126'),
('7500810011157', 'PRINCIPE LIMON', '2', 3, '19', '7500810011157'),
('7500810014738', 'BARRITAS PIÃ‘A', '1', 3, '16', '7500810014738'),
('7500810014745', 'BARRITAS MORAS', '1', 3, '16', '7500810014745'),
('7500810014752', 'MANTECADAS MARMOL', '1', 2, '29', '7500810014752'),
('7500810022801', 'CANELITAS ', '1', 3, '20', '7500810022801'),
('7500810025314', 'BIMBOCAO', '2', 2, '10', '7500810025314'),
('7501000112203', 'COLCHONES SABOR NARANJA', '2', 2, '16', '7501000112203'),
('7501000138944', 'SPONCH', '2', 3, '21', '7501000138944'),
('7501000140855', 'TRIKI TRAKES', '2', 3, '17', '7501000140855'),
('7501000153107', 'GANSITO', '1', 3, '15', '7501000153107'),
('7501000153282', 'SUBMARINOS VAINILLA', '2', 3, '20', '7501000153282'),
('7501000153374', 'SUBMARINOS FRESA', '4', 3, '20', '7501000153374'),
('7501000153763', 'ROCKO', '6', 3, '12', '7501000153763'),
('7501000153800', 'PINGUINOS PASTELITO', '1', 3, '21', '7501000153800'),
('7501011102095', 'RUFFLES ORIGINAL', '0', 1, '15', '7501011102095'),
('7501011123878', 'DORITOS INCOGNITA', '3', 1, '15', '7501011123878'),
('7501011130272', 'DORITOS FLAMIN HOT', '6', 1, '15', '7501011130272'),
('7501011148963', 'PAKETAXO MEZCLADITO', '1', 1, '15', '7501011148963'),
('7501011167438', 'SABRITAS ORIGINAL', '12', 1, '15', '7501011167438'),
('7501011167445', 'SABRITAS ADOBADAS', '9', 1, '15', '7501011167445'),
('7501011167469', 'RUFFLES QUESO', '10', 1, '15', '7501011167469'),
('7501011167605', 'CHEETOS TORCIDITOS', '15', 1, '15', '7501011167605'),
('7501011167612', 'DORITOS NACHO', '12', 1, '15', '7501011167612'),
('7501011167629', 'RANCHERITOS', '8', 1, '15', '7501011167629'),
('7501013103359', 'JUMEX 450ML DURAZNO', '4', 5, '15', '7501013103359'),
('7501013103649', 'JUMEX 450ML MANZANA', '4', 5, '15', '7501013103649'),
('7501013174038', 'JUMEX 450ML MANGO', '4', 5, '15', '7501013174038'),
('7501022009529', 'GATORADE MORAS 350 ML', '4', 6, '15', '7501022009529'),
('7501022009857', 'GATORADE MORAS 1L', '1', 6, '30', '7501022009857'),
('7501030420262', 'DONERS', '2', 2, '25', '7501030420262'),
('7501030426912', 'MINIPAY NUEZ', '1', 3, '25', '7501030426912'),
('7501030431190', 'SUAVICREMAS FRESA', '2', 3, '16', '7501030431190'),
('7501030462293', 'PAN TOSTADO', '1', 2, '35', '7501030462293'),
('7501030472698', 'BIMBUÃ‘UELOS', '1', 2, '21', '7501030472698'),
('7501030475514', 'MANTECADAS CON NUEZ', '2', 2, '29', '7501030475514'),
('7501030475521', 'MANTECADAS VAINILLA', '3', 2, '29', '7501030475521'),
('7501030477488', 'MADALENAS', '3', 2, '21', '7501030477488'),
('7501030490951', 'POLVORONES', '1', 3, '20', '7501030490951'),
('7501055317653', 'POWERADE MORAS 1L', '6', 6, '32', '7501055317653'),
('7501055317660', 'POWERADE FRUTAS 1L', '1', 6, '32', '7501055317660'),
('7501055355310', 'COCA COLA 250ML PLASTICO', '1', 4, '12', '7501055355310'),
('75038762', 'ORBIT FRESA', '2', 9, '3', '75038762'),
('758104005796', 'AGUA BONAFONT 1L', '12', 12, '15', '758104005796');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tipo_usuarios`
--

CREATE TABLE IF NOT EXISTS `tipo_usuarios` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id_tipo_usuario`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido_p` varchar(255) DEFAULT NULL,
  `apellido_m` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `intentos` varchar(10) DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido_p`, `apellido_m`, `usuario`, `contrasena`, `intentos`, `id_tipo_usuario`) VALUES
(1, 'Lorenzo', 'Carrillo', 'Carrillo', 'SQUASHCHITO', '15nov62', '1', 1),
(2, 'Empleado', 'Empleado', 'Empleado', 'empleado', 'empleado1', '1', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL,
  `status` varchar(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `activada` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `ventas`
--

INSERT INTO `ventas` (`id_venta`, `status`, `fecha`, `total`, `cliente`, `activada`) VALUES
(1, 'Si', '2023-12-28', '0', 'FIERROS-RAFAEL', 'Si');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
