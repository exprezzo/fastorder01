/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : fastorder

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2013-05-07 12:49:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `almacenes`
-- ----------------------------
DROP TABLE IF EXISTS `almacenes`;
CREATE TABLE `almacenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of almacenes
-- ----------------------------
INSERT INTO `almacenes` VALUES ('1', 'Limpieza');
INSERT INTO `almacenes` VALUES ('2', 'Cocina');
INSERT INTO `almacenes` VALUES ('3', 'Compras');

-- ----------------------------
-- Table structure for `articulo`
-- ----------------------------
DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(4) DEFAULT '1',
  `presentacion` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idarticuloclase` int(11) NOT NULL DEFAULT '0',
  `inventariable` bit(1) NOT NULL DEFAULT b'0',
  `impuesto1` decimal(6,2) NOT NULL DEFAULT '0.00',
  `impuesto2` decimal(6,2) NOT NULL DEFAULT '0.00',
  `impuesto3` decimal(6,2) NOT NULL DEFAULT '0.00',
  `costo` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `precio` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `puntos` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `usado` int(11) NOT NULL DEFAULT '0' COMMENT 'cuenta cuantas veces se ha usado el artículo.',
  `periodo` int(11) NOT NULL DEFAULT '1',
  `kilometraje` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1',
  `idsublinea` int(11) NOT NULL DEFAULT '0',
  `idcategoria` int(11) NOT NULL DEFAULT '0',
  `idlinea` int(11) NOT NULL DEFAULT '0',
  `idgrupo` int(11) NOT NULL DEFAULT '0',
  `idtemporada` int(11) NOT NULL DEFAULT '0',
  `iddepartamento` int(11) NOT NULL DEFAULT '0',
  `idtipo` int(11) NOT NULL DEFAULT '0',
  `info` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaalta` datetime NOT NULL DEFAULT '2000-01-01 00:00:01',
  `nombrebot` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagenbot` blob,
  `fechainv` datetime NOT NULL DEFAULT '2000-01-01 00:00:01',
  `puntoscompra` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `ultimocosto` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `utilidadminima` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `comision` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `comisionmax` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `costomax` decimal(12,5) NOT NULL DEFAULT '0.00000',
  PRIMARY KEY (`idarticulo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articulo
-- ----------------------------
INSERT INTO `articulo` VALUES ('4', 'AAbb', '1', '', '', '0', '', '0.00', '0.00', '0.00', '0.00000', '0.00000', '0.00000', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '', '2000-01-01 00:00:01', '', '', '2000-01-01 00:00:01', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000');

-- ----------------------------
-- Table structure for `articulocat`
-- ----------------------------
DROP TABLE IF EXISTS `articulocat`;
CREATE TABLE `articulocat` (
  `idarticulocat` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idarticulocat`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articulocat
-- ----------------------------

-- ----------------------------
-- Table structure for `articuloclase`
-- ----------------------------
DROP TABLE IF EXISTS `articuloclase`;
CREATE TABLE `articuloclase` (
  `idarticuloclase` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(255) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`idarticuloclase`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articuloclase
-- ----------------------------
INSERT INTO `articuloclase` VALUES ('1', 'Insumos', 'Articulos usados para elaborar productos.');
INSERT INTO `articuloclase` VALUES ('2', 'Wacal', 'sadf');

-- ----------------------------
-- Table structure for `articulocod`
-- ----------------------------
DROP TABLE IF EXISTS `articulocod`;
CREATE TABLE `articulocod` (
  `idarticulocod` int(11) NOT NULL AUTO_INCREMENT,
  `idarticulo` int(11) NOT NULL DEFAULT '0',
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idproducto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idarticulocod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articulocod
-- ----------------------------

-- ----------------------------
-- Table structure for `articulodep`
-- ----------------------------
DROP TABLE IF EXISTS `articulodep`;
CREATE TABLE `articulodep` (
  `idarticulodep` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idarticulodep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articulodep
-- ----------------------------

-- ----------------------------
-- Table structure for `articulodet`
-- ----------------------------
DROP TABLE IF EXISTS `articulodet`;
CREATE TABLE `articulodet` (
  `idarticulodet` int(11) NOT NULL AUTO_INCREMENT,
  `idarticulo` int(11) NOT NULL DEFAULT '0',
  `cantidad` decimal(12,5) NOT NULL DEFAULT '1.00000',
  `preciocompra` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `costototal` decimal(12,5) NOT NULL DEFAULT '0.00000',
  PRIMARY KEY (`idarticulodet`),
  KEY `articulo_idx` (`idarticulo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articulodet
-- ----------------------------
INSERT INTO `articulodet` VALUES ('1', '0', '0.00000', '0.00000', '0.00000');
INSERT INTO `articulodet` VALUES ('2', '0', '0.00000', '0.00000', '0.00000');
INSERT INTO `articulodet` VALUES ('4', '0', '0.00000', '0.00000', '0.00000');
INSERT INTO `articulodet` VALUES ('5', '0', '0.00000', '0.00000', '0.00000');
INSERT INTO `articulodet` VALUES ('6', '0', '0.00000', '0.00000', '0.00000');
INSERT INTO `articulodet` VALUES ('7', '0', '0.00000', '0.00000', '0.00000');

-- ----------------------------
-- Table structure for `articulodetalle`
-- ----------------------------
DROP TABLE IF EXISTS `articulodetalle`;
CREATE TABLE `articulodetalle` (
  `idarticulo` int(11) NOT NULL DEFAULT '0' COMMENT 'id del maestro',
  `cantidad` decimal(12,5) DEFAULT NULL,
  `preciocompra` decimal(12,5) DEFAULT NULL,
  `costototal` decimal(12,5) DEFAULT NULL,
  `idarticulodetalle` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idarticulodetalle`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articulodetalle
-- ----------------------------
INSERT INTO `articulodetalle` VALUES ('26', '4.50000', '5.00000', '5.00000', '1');
INSERT INTO `articulodetalle` VALUES ('26', '2.00000', '6.00000', '6.00000', '2');
INSERT INTO `articulodetalle` VALUES ('26', '1.00000', '1.00000', '1.00000', '3');
INSERT INTO `articulodetalle` VALUES ('26', '1.00000', '1.00000', '1.00000', '4');
INSERT INTO `articulodetalle` VALUES ('27', '0.50000', '5.00000', '5.00000', '5');

-- ----------------------------
-- Table structure for `articuloequ`
-- ----------------------------
DROP TABLE IF EXISTS `articuloequ`;
CREATE TABLE `articuloequ` (
  `idarticuloequ` int(11) NOT NULL AUTO_INCREMENT,
  `articuloid` int(11) NOT NULL DEFAULT '0',
  `articuloid2` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idarticuloequ`,`articuloid`,`articuloid2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articuloequ
-- ----------------------------

-- ----------------------------
-- Table structure for `articulogru`
-- ----------------------------
DROP TABLE IF EXISTS `articulogru`;
CREATE TABLE `articulogru` (
  `idarticulogru` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL COMMENT 'lugar donde aparecerá en la pantalla de ventas',
  PRIMARY KEY (`idarticulogru`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articulogru
-- ----------------------------

-- ----------------------------
-- Table structure for `articulolin`
-- ----------------------------
DROP TABLE IF EXISTS `articulolin`;
CREATE TABLE `articulolin` (
  `idarticulolin` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idarticulolin`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articulolin
-- ----------------------------

-- ----------------------------
-- Table structure for `articulopre`
-- ----------------------------
DROP TABLE IF EXISTS `articulopre`;
CREATE TABLE `articulopre` (
  `idarticulopre` int(11) NOT NULL AUTO_INCREMENT,
  `idarticulo` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `factor` decimal(12,3) NOT NULL DEFAULT '1.000',
  `ultimocosto` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `default` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idarticulopre`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articulopre
-- ----------------------------
INSERT INTO `articulopre` VALUES ('1', '1', 'pre_Piolin', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('2', '2', 'pre_Flor Feliz', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('3', '3', 'pre_Flor', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('4', '4', 'pre_Corazon', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('5', '5', 'pre_Rosita', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('16', '6', 'pre_Osito', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('17', '7', 'pre_Pez', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('18', '8', 'pre_Dinosaurio Trice', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('19', '9', 'pre_Dinosaurio Diplo', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('20', '10', 'pre_tortuga', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('21', '11', 'pre_ELmo', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('22', '12', 'pre_blanca nieves', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('23', '13', 'pre_Wini poh', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('24', '14', 'pre_Jessy vaquerita', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('25', '15', 'pre_Perro lanudo', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('26', '16', 'pre_Perro lasio', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('27', '17', 'pre_Caballito', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('28', '18', 'pre_Jaiba', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('39', '19', 'pre_Austin', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('40', '20', 'pre_Tasha', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('41', '21', 'pre_pulpo', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('42', '22', 'Kg', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('43', '23', 'pre_cebolla', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('44', '24', 'pre_ajo', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('45', '25', 'pre_cilantro', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('46', '26', 'Litro', '1.000', '0.00000', '');
INSERT INTO `articulopre` VALUES ('47', '27', 'Litro', '1.000', '0.00000', '');

-- ----------------------------
-- Table structure for `articulostock`
-- ----------------------------
DROP TABLE IF EXISTS `articulostock`;
CREATE TABLE `articulostock` (
  `idarticuloalmacen` int(11) NOT NULL AUTO_INCREMENT,
  `idarticulo` int(11) DEFAULT NULL,
  `idalmacen` int(11) DEFAULT NULL,
  `existencia` decimal(12,5) DEFAULT NULL,
  `minimo` decimal(12,5) DEFAULT NULL,
  `maximo` decimal(12,5) DEFAULT NULL,
  `puntoreorden` decimal(12,5) DEFAULT NULL,
  `idgrupo` int(11) DEFAULT NULL,
  `grupoposicion` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idarticuloalmacen`),
  UNIQUE KEY `artalm` (`idarticulo`,`idalmacen`),
  KEY `articulo_idx` (`idarticulo`),
  KEY `almacen_idx` (`idalmacen`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articulostock
-- ----------------------------
INSERT INTO `articulostock` VALUES ('21', '1', '1', '1.00000', '1.00000', '5.00000', '2.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('22', '2', '1', '1.00000', '1.00000', '5.00000', '2.00000', '1', '2');
INSERT INTO `articulostock` VALUES ('23', '3', '1', '1.00000', '1.00000', '5.00000', '2.00000', '1', '3');
INSERT INTO `articulostock` VALUES ('24', '4', '1', '2.00000', '1.00000', '5.00000', '2.00000', '2', '4');
INSERT INTO `articulostock` VALUES ('25', '5', '1', '2.00000', '1.00000', '5.00000', '2.00000', '1', '5');
INSERT INTO `articulostock` VALUES ('26', '6', '1', '2.00000', '1.00000', '5.00000', '2.00000', '2', '6');
INSERT INTO `articulostock` VALUES ('27', '7', '1', '2.00000', '1.00000', '5.00000', '2.00000', '2', '7');
INSERT INTO `articulostock` VALUES ('28', '8', '1', '3.00000', '1.00000', '5.00000', '2.00000', '2', '8');
INSERT INTO `articulostock` VALUES ('29', '9', '1', '3.00000', '1.00000', '5.00000', '2.00000', '2', '9');
INSERT INTO `articulostock` VALUES ('30', '10', '1', '3.00000', '1.00000', '5.00000', '2.00000', '2', '10');
INSERT INTO `articulostock` VALUES ('31', '11', '1', '4.00000', '1.00000', '5.00000', '2.00000', '2', '11');
INSERT INTO `articulostock` VALUES ('32', '12', '1', '4.00000', '1.00000', '5.00000', '2.00000', '2', '12');
INSERT INTO `articulostock` VALUES ('33', '13', '1', '4.00000', '1.00000', '5.00000', '2.00000', '2', '13');
INSERT INTO `articulostock` VALUES ('34', '14', '1', '5.00000', '1.00000', '5.00000', '2.00000', '2', '14');
INSERT INTO `articulostock` VALUES ('35', '15', '1', '5.00000', '1.00000', '5.00000', '2.00000', '29', '15');
INSERT INTO `articulostock` VALUES ('36', '16', '1', '5.00000', '1.00000', '5.00000', '2.00000', '9', '16');
INSERT INTO `articulostock` VALUES ('37', '17', '1', '5.00000', '1.00000', '5.00000', '2.00000', '9', '17');
INSERT INTO `articulostock` VALUES ('38', '18', '1', '6.00000', '1.00000', '5.00000', '2.00000', '2', '18');
INSERT INTO `articulostock` VALUES ('39', '19', '1', '6.00000', '1.00000', '5.00000', '2.00000', '3', '19');
INSERT INTO `articulostock` VALUES ('40', '20', '1', '6.00000', '1.00000', '5.00000', '2.00000', '3', '20');
INSERT INTO `articulostock` VALUES ('41', '21', '1', '6.00000', '1.00000', '5.00000', '2.00000', '2', '21');
INSERT INTO `articulostock` VALUES ('42', '22', '2', '6.00000', '11.00000', '50.00000', '10.00000', '4', '1');
INSERT INTO `articulostock` VALUES ('43', '23', '2', '7.00000', '12.00000', '51.00000', '11.00000', '4', '2');
INSERT INTO `articulostock` VALUES ('44', '24', '2', '7.00000', '13.00000', '52.00000', '12.00000', '4', '3');
INSERT INTO `articulostock` VALUES ('45', '25', '2', '7.00000', '14.00000', '53.00000', '13.00000', '4', '4');
INSERT INTO `articulostock` VALUES ('46', '26', '2', '7.00000', '15.00000', '54.00000', '14.00000', '4', '5');
INSERT INTO `articulostock` VALUES ('47', '27', '2', '7.00000', '16.00000', '55.00000', '15.00000', '4', '6');
INSERT INTO `articulostock` VALUES ('48', '1', '3', '8.00000', '1.00000', '11.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('49', '2', '3', '6.00000', '2.00000', '20.00000', '6.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('50', '3', '3', '8.00000', '1.00000', '13.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('51', '4', '3', '8.00000', '1.00000', '14.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('52', '5', '3', '9.00000', '1.00000', '15.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('53', '6', '3', '9.00000', '1.00000', '16.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('54', '7', '3', '9.00000', '1.00000', '17.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('55', '8', '3', '9.00000', '1.00000', '18.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('56', '9', '3', '9.00000', '1.00000', '119.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('57', '10', '3', '10.00000', '1.00000', '20.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('58', '11', '3', '10.00000', '1.00000', '21.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('59', '12', '3', '10.00000', '1.00000', '22.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('60', '13', '3', '10.00000', '1.00000', '23.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('61', '14', '3', '10.00000', '1.00000', '24.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('62', '15', '3', '10.00000', '1.00000', '25.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('63', '16', '3', '10.00000', '1.00000', '26.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('64', '17', '3', '10.00000', '1.00000', '27.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('65', '18', '3', '11.00000', '1.00000', '28.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('66', '19', '3', '11.00000', '1.00000', '29.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('67', '20', '3', '11.00000', '1.00000', '30.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('68', '21', '3', '11.00000', '1.00000', '31.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('70', '22', '3', '8.00000', '23.00000', '21.00000', '7.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('71', '23', '3', '4.00000', '2.00000', '1.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('72', '24', '3', '11.00000', '1.00000', '34.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('73', '25', '3', '11.00000', '1.00000', '35.00000', '3.00000', '1', '1');
INSERT INTO `articulostock` VALUES ('74', '26', '3', null, null, null, null, '1', '1');
INSERT INTO `articulostock` VALUES ('75', '27', '3', null, null, '0.00000', null, '1', '1');
INSERT INTO `articulostock` VALUES ('78', '22', '1', '1.00000', '11.00000', '1.00000', '1.00000', '1', '1');

-- ----------------------------
-- Table structure for `articulosub`
-- ----------------------------
DROP TABLE IF EXISTS `articulosub`;
CREATE TABLE `articulosub` (
  `idarticulosub` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idarticulosub`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articulosub
-- ----------------------------

-- ----------------------------
-- Table structure for `articulotem`
-- ----------------------------
DROP TABLE IF EXISTS `articulotem`;
CREATE TABLE `articulotem` (
  `idarticulotem` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idarticulotem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articulotem
-- ----------------------------

-- ----------------------------
-- Table structure for `articulotip`
-- ----------------------------
DROP TABLE IF EXISTS `articulotip`;
CREATE TABLE `articulotip` (
  `idarticulotip` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idarticulotip`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articulotip
-- ----------------------------
INSERT INTO `articulotip` VALUES ('1', 'Materias primas y partes compradas');

-- ----------------------------
-- Table structure for `articuloubi`
-- ----------------------------
DROP TABLE IF EXISTS `articuloubi`;
CREATE TABLE `articuloubi` (
  `idarticuloubi` int(11) NOT NULL AUTO_INCREMENT,
  `articuloid` int(11) NOT NULL DEFAULT '0',
  `almacenid` int(11) NOT NULL DEFAULT '0',
  `ubicacion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idarticuloubi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of articuloubi
-- ----------------------------

-- ----------------------------
-- Table structure for `compra`
-- ----------------------------
DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra` (
  `idcompra` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) NOT NULL DEFAULT '0',
  `idalmacen` int(11) NOT NULL DEFAULT '0',
  `idcxp` int(11) NOT NULL DEFAULT '0',
  `tipo` tinyint(4) NOT NULL DEFAULT '0',
  `serie` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `folio` int(11) NOT NULL,
  `documento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `fechavence` datetime DEFAULT NULL,
  `descuento` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `subtotal` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `impuesto1` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `impuesto2` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `impuesto3` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `total` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `nota` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `idinvmov` int(11) NOT NULL DEFAULT '0',
  `impreso` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `enviado` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcompra`),
  KEY `proveedor_idx` (`idproveedor`),
  KEY `almacen_idx` (`idalmacen`),
  KEY `cxp_idx` (`idcxp`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of compra
-- ----------------------------
INSERT INTO `compra` VALUES ('16', '1', '0', '0', '0', '4', '2', '', '2013-04-19 15:59:03', '2013-04-19 15:59:03', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', '', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `compradetalle`
-- ----------------------------
DROP TABLE IF EXISTS `compradetalle`;
CREATE TABLE `compradetalle` (
  `idcompradetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idcompra` int(11) NOT NULL DEFAULT '0',
  `idarticulo` int(11) NOT NULL DEFAULT '0',
  `idarticulopre` int(11) NOT NULL DEFAULT '0',
  `idordencompradet` int(11) NOT NULL DEFAULT '0',
  `precio` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `cantidad` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `descuento` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `subtotal` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `impuesto1` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `impuesto2` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `impuesto3` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `total` decimal(12,5) NOT NULL DEFAULT '0.00000',
  `descripcion` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `impreso` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `enviado` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcompradetalle`) USING BTREE,
  KEY `articulo_idx` (`idarticulo`),
  KEY `articulopre_idx` (`idarticulopre`),
  KEY `compra_idx` (`idcompra`),
  KEY `ordencompradet_idx` (`idordencompradet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of compradetalle
-- ----------------------------

-- ----------------------------
-- Table structure for `conf_serie`
-- ----------------------------
DROP TABLE IF EXISTS `conf_serie`;
CREATE TABLE `conf_serie` (
  `idconf_serie` int(11) NOT NULL AUTO_INCREMENT,
  `serie` char(5) NOT NULL,
  `folio_i` int(11) DEFAULT NULL,
  `folio_f` int(11) DEFAULT NULL,
  `sig_folio` int(11) DEFAULT NULL,
  `es_default` bit(1) DEFAULT NULL,
  `idalmacen` int(11) DEFAULT NULL,
  `proceso` varchar(50) NOT NULL,
  `idempresa` int(11) DEFAULT NULL,
  `idsucursal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idconf_serie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of conf_serie
-- ----------------------------
INSERT INTO `conf_serie` VALUES ('2', 'OC', '1', '100', '7', '', '2', 'ordencompra', '1', '0');
INSERT INTO `conf_serie` VALUES ('3', 'pi', '1', '1000', '11', '', '3', 'compra', '1', '1');
INSERT INTO `conf_serie` VALUES ('4', 'CO2', '1', '0', '3', '', '0', 'compra', '1', '0');
INSERT INTO `conf_serie` VALUES ('5', 'CO_A1', '1', '0', '1', '', '0', 'compra', '1', '1');

-- ----------------------------
-- Table structure for `conf_unidadmedida`
-- ----------------------------
DROP TABLE IF EXISTS `conf_unidadmedida`;
CREATE TABLE `conf_unidadmedida` (
  `idconf_unidadmedida` int(11) NOT NULL AUTO_INCREMENT,
  `abrev` char(255) NOT NULL,
  `descripcion` char(255) DEFAULT NULL,
  PRIMARY KEY (`idconf_unidadmedida`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of conf_unidadmedida
-- ----------------------------
INSERT INTO `conf_unidadmedida` VALUES ('1', 'PZA', 'esta es la descripcion');
INSERT INTO `conf_unidadmedida` VALUES ('2', 'U', null);
INSERT INTO `conf_unidadmedida` VALUES ('3', 'Kg', '');
INSERT INTO `conf_unidadmedida` VALUES ('4', 'M', 'as');
INSERT INTO `conf_unidadmedida` VALUES ('5', 'Km', null);

-- ----------------------------
-- Table structure for `empresa`
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) COLLATE utf8_spanish_ci NOT NULL,
  `razonsocial` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `calle` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numint` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numext` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idempresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO `empresa` VALUES ('1', 'La Mona', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `empresasuc`
-- ----------------------------
DROP TABLE IF EXISTS `empresasuc`;
CREATE TABLE `empresasuc` (
  `idempresasuc` int(11) NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) DEFAULT '1',
  `nombre` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `calle` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numint` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numext` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `colonia` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idempresasuczon` int(11) DEFAULT NULL,
  PRIMARY KEY (`idempresasuc`),
  KEY `idempresasuczon` (`idempresasuczon`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of empresasuc
-- ----------------------------
INSERT INTO `empresasuc` VALUES ('1', '1', 'Marina', '', '', '', '', '', '', '', '', '', '', '0');

-- ----------------------------
-- Table structure for `empresasuczon`
-- ----------------------------
DROP TABLE IF EXISTS `empresasuczon`;
CREATE TABLE `empresasuczon` (
  `idempresasuczon` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idempresasuczon`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- ----------------------------
-- Records of empresasuczon
-- ----------------------------

-- ----------------------------
-- Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` char(255) DEFAULT NULL,
  `target` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', 'inicio', '/paginas/inicio');
INSERT INTO `menus` VALUES ('2', 'productos', '/portal/productos');

-- ----------------------------
-- Table structure for `ordencompra`
-- ----------------------------
DROP TABLE IF EXISTS `ordencompra`;
CREATE TABLE `ordencompra` (
  `idordencompra` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `vencimiento` datetime DEFAULT NULL,
  `idestado` tinyint(1) DEFAULT '1',
  `serie` varchar(5) DEFAULT NULL,
  `folio` int(11) DEFAULT NULL,
  `idalmacen` int(11) DEFAULT NULL,
  `enviada` tinyint(3) unsigned DEFAULT '0',
  `impresa` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`idordencompra`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ordencompra
-- ----------------------------
INSERT INTO `ordencompra` VALUES ('106', '6', '2013-03-05 10:02:57', '2013-03-29 10:02:57', '1', '4', '63', '1', '0', '0');
INSERT INTO `ordencompra` VALUES ('107', '1', '2013-03-29 17:47:21', '2013-03-29 17:47:21', '1', '1', '0', '1', '0', '0');
INSERT INTO `ordencompra` VALUES ('108', '1', '2013-03-29 07:59:04', '2013-03-29 07:59:04', '1', null, '0', '1', '0', '0');

-- ----------------------------
-- Table structure for `ordencompraestado`
-- ----------------------------
DROP TABLE IF EXISTS `ordencompraestado`;
CREATE TABLE `ordencompraestado` (
  `idordencompraestado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(255) DEFAULT NULL,
  PRIMARY KEY (`idordencompraestado`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ordencompraestado
-- ----------------------------
INSERT INTO `ordencompraestado` VALUES ('1', 'borrador');
INSERT INTO `ordencompraestado` VALUES ('2', 'ordenado');
INSERT INTO `ordencompraestado` VALUES ('3', 'surtido');
INSERT INTO `ordencompraestado` VALUES ('4', 'parcialmente surtido');
INSERT INTO `ordencompraestado` VALUES ('5', 'concentrado');

-- ----------------------------
-- Table structure for `orden_compra_productos`
-- ----------------------------
DROP TABLE IF EXISTS `orden_compra_productos`;
CREATE TABLE `orden_compra_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_orden_compra` int(11) DEFAULT NULL,
  `fk_articulo` int(11) DEFAULT NULL,
  `idarticulopre` int(11) DEFAULT NULL,
  `cantidad` decimal(18,6) DEFAULT NULL,
  `fk_pedido_detalle` int(11) DEFAULT NULL,
  `fk_producto_origen` int(11) DEFAULT NULL,
  `fk_pedido` int(11) DEFAULT NULL,
  `pedidoi` decimal(18,6) DEFAULT NULL,
  `fk_almacen` int(11) DEFAULT NULL,
  `pendiente` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1045 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orden_compra_productos
-- ----------------------------
INSERT INTO `orden_compra_productos` VALUES ('1024', '106', '22', '42', '7.000000', '1985', '22', '0', '25.000000', '2', '18.000000');
INSERT INTO `orden_compra_productos` VALUES ('1025', '106', '23', '43', '9.000000', '1987', '23', '0', '9.000000', '2', '0.000000');
INSERT INTO `orden_compra_productos` VALUES ('1026', '106', '24', '44', '10.000000', '1989', '24', '0', '35.000000', '2', '25.000000');
INSERT INTO `orden_compra_productos` VALUES ('1028', '106', '22', '46', '6.000000', '1986', '26', '0', '0.000000', '2', '-6.000000');
INSERT INTO `orden_compra_productos` VALUES ('1029', '106', '23', '46', '8.000000', '1986', '26', '0', '0.000000', '2', '-8.000000');
INSERT INTO `orden_compra_productos` VALUES ('1032', '106', '22', '47', '5.000000', '1988', '27', '0', '0.000000', '2', '-5.000000');
INSERT INTO `orden_compra_productos` VALUES ('1033', '107', '5', '0', '12.000000', '0', '5', '0', '0.000000', '3', null);
INSERT INTO `orden_compra_productos` VALUES ('1034', '108', '3', '0', '0.000000', '0', '3', '0', '0.000000', '3', null);
INSERT INTO `orden_compra_productos` VALUES ('1041', '106', '2', '0', '1.000000', '0', '2', '0', '0.000000', '0', '0.000000');
INSERT INTO `orden_compra_productos` VALUES ('1042', '106', '5', '0', '4.000000', '0', '5', '0', '0.000000', '0', '0.000000');
INSERT INTO `orden_compra_productos` VALUES ('1043', '106', '5', '0', '3.000000', '0', '5', '0', '0.000000', '0', '0.000000');
INSERT INTO `orden_compra_productos` VALUES ('1044', '106', '5', '0', '2.000000', '0', '5', '0', '0.000000', '0', '0.000000');

-- ----------------------------
-- Table structure for `pedidoint`
-- ----------------------------
DROP TABLE IF EXISTS `pedidoint`;
CREATE TABLE `pedidoint` (
  `idpedidoint` int(11) NOT NULL AUTO_INCREMENT,
  `idalmacen` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `vencimiento` datetime DEFAULT NULL,
  `idestado` tinyint(1) DEFAULT '1',
  `serie` varchar(5) DEFAULT NULL,
  `folio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpedidoint`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pedidoint
-- ----------------------------
INSERT INTO `pedidoint` VALUES ('163', '2', '2013-03-29 11:29:12', '2013-03-29 11:29:12', '2', '2', '6');

-- ----------------------------
-- Table structure for `pedidointdetalle`
-- ----------------------------
DROP TABLE IF EXISTS `pedidointdetalle`;
CREATE TABLE `pedidointdetalle` (
  `idpedidointdetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idarticulo` int(11) DEFAULT NULL,
  `idpedidoint` int(11) DEFAULT NULL,
  `cantidad` decimal(18,6) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `concentrado` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`idpedidointdetalle`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1991 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pedidointdetalle
-- ----------------------------
INSERT INTO `pedidointdetalle` VALUES ('1985', '22', '163', '12.000000', '2', '12.000000');
INSERT INTO `pedidointdetalle` VALUES ('1986', '26', '163', '12.000000', '2', '12.000000');
INSERT INTO `pedidointdetalle` VALUES ('1987', '23', '163', '12.000000', '2', '12.000000');
INSERT INTO `pedidointdetalle` VALUES ('1988', '27', '163', '12.000000', '2', '12.000000');
INSERT INTO `pedidointdetalle` VALUES ('1989', '24', '163', '12.000000', '2', '12.000000');
INSERT INTO `pedidointdetalle` VALUES ('1990', '25', '163', '12.000000', '2', '12.000000');

-- ----------------------------
-- Table structure for `pedidointestado`
-- ----------------------------
DROP TABLE IF EXISTS `pedidointestado`;
CREATE TABLE `pedidointestado` (
  `idpedidointestado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(255) DEFAULT NULL,
  PRIMARY KEY (`idpedidointestado`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pedidointestado
-- ----------------------------
INSERT INTO `pedidointestado` VALUES ('1', 'Solicitado');
INSERT INTO `pedidointestado` VALUES ('2', 'Concentrado');
INSERT INTO `pedidointestado` VALUES ('3', 'Parcialmente Surtido');
INSERT INTO `pedidointestado` VALUES ('4', 'Surtido');
INSERT INTO `pedidointestado` VALUES ('5', 'Cancelado');
INSERT INTO `pedidointestado` VALUES ('6', 'Caducado');

-- ----------------------------
-- Table structure for `proveedor`
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(254) COLLATE utf8_spanish_ci NOT NULL,
  `razonsocial` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rfc` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `calle` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numint` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `colonia` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cp` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `conven` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `conventel` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `convenfax` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `convenema` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `concom` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `concomtel` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `concomfax` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `concomema` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `diacre` int(11) NOT NULL DEFAULT '0',
  `despropag` decimal(5,2) NOT NULL DEFAULT '0.00',
  `limcre` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `observaciones` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idproveedor`),
  KEY `pagos_idx` (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
INSERT INTO `proveedor` VALUES ('1', 'Fruteria Don Miguel', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0.00', '', '');
INSERT INTO `proveedor` VALUES ('2', 'SuKarne', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0.00', '', '');
INSERT INTO `proveedor` VALUES ('3', 'Productos Bogamar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0.00', '', '');

-- ----------------------------
-- Table structure for `proveedorarticulo`
-- ----------------------------
DROP TABLE IF EXISTS `proveedorarticulo`;
CREATE TABLE `proveedorarticulo` (
  `idarticulo` int(11) NOT NULL DEFAULT '0',
  `idproveedor` int(11) NOT NULL DEFAULT '0',
  `prioridad` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of proveedorarticulo
-- ----------------------------

-- ----------------------------
-- Table structure for `system_acl`
-- ----------------------------
DROP TABLE IF EXISTS `system_acl`;
CREATE TABLE `system_acl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `modulo` char(255) DEFAULT NULL,
  `controlador` char(255) DEFAULT NULL,
  `accion` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_acl
-- ----------------------------

-- ----------------------------
-- Table structure for `system_catalogos`
-- ----------------------------
DROP TABLE IF EXISTS `system_catalogos`;
CREATE TABLE `system_catalogos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_modulo` int(11) DEFAULT NULL,
  `nombre` char(255) DEFAULT NULL,
  `controlador` char(255) DEFAULT NULL,
  `modelo` char(255) DEFAULT NULL,
  `tabla` char(255) DEFAULT NULL,
  `pk_tabla` char(255) DEFAULT 'id',
  `icono` char(255) DEFAULT NULL,
  `titulo_nuevo` char(255) DEFAULT NULL,
  `titulo_edicion` char(255) DEFAULT NULL,
  `titulo_busqueda` char(255) DEFAULT NULL,
  `msg_creado` char(255) DEFAULT NULL,
  `msg_actualizado` char(255) DEFAULT NULL,
  `pregunta_eliminar` char(255) DEFAULT NULL,
  `msg_eliminado` char(255) DEFAULT NULL,
  `msg_cambios` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_catalogos
-- ----------------------------
INSERT INTO `system_catalogos` VALUES ('18', '1', 'Usuarios', 'usuarios', 'Usuario', 'system_users', 'id', 'http://png.findicons.com/files/icons/1620/crystal_project/64/personal.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('31', '1', 'Configuracion', 'config', 'config', 'system_config', 'id', 'http://png.findicons.com/files/icons/2645/super_mono_3d/64/super_mono_3d_part2_65.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('32', '1', 'Modulos', 'modulos', 'Modulo', 'system_modulos', 'id', 'http://png.findicons.com/files/icons/1681/siena/48/puzzle_yellow.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('33', '1', 'Catalogos', 'catalogos', 'Catalogo', 'system_catalogos', 'id', 'http://png.findicons.com/files/icons/577/refresh_cl/48/windows_view_icon.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('36', '1', 'seguridad', 'seguridad', 'Seguridad', 'system_acl', 'id', 'http://png.findicons.com/files/icons/1035/human_o2/48/keepassx.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('37', '2', 'paginas', 'paginas', 'pagina', 'cms_paginas', 'id', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('38', '7', 'articulos', 'articulos', 'articulo', 'articulo', 'idarticulo', 'http://png.findicons.com/files/icons/2166/oxygen/48/rss_tag.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('39', '7', 'Clase de articulo', 'articulo_clase', 'articulo_clase', 'articuloclase', 'idarticuloclase', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('41', '7', 'Codigo de articulo', 'articulo_cod', 'articulo_cod', 'articulocod', 'idarticulocod', 'http://png.findicons.com/files/icons/126/sleek_xp_basic/48/barcode.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('43', '7', 'articulodep', 'articulodep', 'articulodep', 'articulodep', 'idarticulodep', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('44', '7', 'Receta', 'articulodet', 'articulodet', 'articulodet', 'idarticulodet', 'http://png.findicons.com/files/icons/827/livejournal/48/sup.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('45', '7', 'articulodetalle', 'articulodetalle', 'articulodetalle', 'articulodetalle', 'idarticulodetalle', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('46', '7', 'articuloequ', 'articuloequ', 'articuloequ', 'articuloequ', 'idarticuloequ', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('47', '7', 'articulogru', 'articulogru', 'articulogru', 'articulogru', 'idarticulogru', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('48', '7', 'articulolin', 'articulolin', 'articulolin', 'articulolin', 'idarticulolin', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('49', '7', 'articulopre', 'articulopre', 'articulopre', 'articulopre', 'idarticulopre', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('50', '7', 'articulostock', 'articulostock', 'articulostock', 'articulostock', 'idarticuloalmacen', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('51', '7', 'articulosub', 'articulosub', 'articulosub', 'articulosub', 'idarticulosub', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('52', '7', 'articulotem', 'articulotem', 'articulotem', 'articulotem', 'idarticulotem', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('53', '7', 'articulotip', 'articulotip', 'articulotip', 'articulotip', 'idarticulotip', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('54', '7', 'articuloubi', 'articuloubi', 'articuloubi', 'articuloubi', 'idarticuloubi', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('55', '7', 'compra', 'compra', 'compra', 'compra', 'idcompra', 'http://png.findicons.com/files/icons/42/basic/48/buy.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('56', '7', 'compradetalle', 'compradetalle', 'compradetalle', 'compradetalle', 'idcompradetalle', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('57', '7', 'conf_serie', 'conf_serie', 'conf_serie', 'conf_serie', 'idconf_serie', 'http://png.findicons.com/files/icons/2579/iphone_icons/40/barcode_gear.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('58', '7', 'conf_unidadmedida', 'conf_unidadmedida', 'conf_unidadmedida', 'conf_unidadmedida', 'idconf_unidadmedida', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('59', '7', 'empresa', 'empresa', 'empresa', 'empresa', 'idempresa', 'http://png.findicons.com/files/icons/2018/business_icons_for/48/company.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('60', '7', 'empresasuc', 'empresasuc', 'empresasuc', 'empresasuc', 'idempresasuc', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('61', '7', 'empresasuczon', 'empresasuczon', 'empresasuczon', 'empresasuczon', 'idempresasuczon', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('62', '7', 'ordencompra', 'ordencompra', 'ordencompra', 'ordencompra', 'idordencompra', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('63', '7', 'ordencompraestado', 'ordencompraestado', 'ordencompraestado', 'ordencompraestado', 'idordencompraestado', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('64', '7', 'orden_compra_productos', 'orden_compra_productos', 'orden_compra_productos', 'orden_compra_productos', 'id', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('65', '7', 'pedidoint', 'pedidoint', 'pedidoint', 'pedidoint', 'idpedidoint', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('66', '7', 'pedidointdetalle', 'pedidointdetalle', 'pedidointdetalle', 'pedidointdetalle', 'idpedidointdetalle', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('67', '7', 'pedidointestado', 'pedidointestado', 'pedidointestado', 'pedidointestado', 'idpedidointestado', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('68', '7', 'proveedor', 'proveedor', 'proveedor', 'proveedor', 'idproveedor', 'http://png.findicons.com/files/icons/2257/berlin/32/suppliers.png', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('69', '7', 'proveedorarticulo', 'proveedorarticulo', 'proveedorarticulo', 'proveedorarticulo', 'id', '', '', '', '', '', '', '', '', '');
INSERT INTO `system_catalogos` VALUES ('70', '7', 'almacenes', 'almacenes', 'almacenes', 'almacenes', 'id', 'http://png.findicons.com/files/icons/2579/iphone_icons/40/warehouse.png', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `system_config`
-- ----------------------------
DROP TABLE IF EXISTS `system_config`;
CREATE TABLE `system_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) DEFAULT NULL,
  `tema` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_config
-- ----------------------------
INSERT INTO `system_config` VALUES ('1', '1', 'artic');

-- ----------------------------
-- Table structure for `system_modulos`
-- ----------------------------
DROP TABLE IF EXISTS `system_modulos`;
CREATE TABLE `system_modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(255) DEFAULT NULL,
  `icono` char(255) DEFAULT NULL,
  `nombre_interno` char(255) DEFAULT NULL,
  `ruta_base` char(255) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_modulos
-- ----------------------------
INSERT INTO `system_modulos` VALUES ('1', 'Sistema', 'http://png.findicons.com/files/icons/1681/siena/48/puzzle_yellow.png', 'backend', '/modulos/', null);
INSERT INTO `system_modulos` VALUES ('7', 'Fast Order', '', 'fastorder', '/', '0');

-- ----------------------------
-- Table structure for `system_rol`
-- ----------------------------
DROP TABLE IF EXISTS `system_rol`;
CREATE TABLE `system_rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_rol
-- ----------------------------
INSERT INTO `system_rol` VALUES ('1', 'Super Admin');
INSERT INTO `system_rol` VALUES ('2', 'System Admin');
INSERT INTO `system_rol` VALUES ('3', 'Gerente');
INSERT INTO `system_rol` VALUES ('4', 'Almacenista');

-- ----------------------------
-- Table structure for `system_users`
-- ----------------------------
DROP TABLE IF EXISTS `system_users`;
CREATE TABLE `system_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` char(255) NOT NULL,
  `pass` blob,
  `email` char(255) NOT NULL,
  `rol` int(11) DEFAULT '1',
  `fbid` int(11) DEFAULT NULL,
  `name` char(255) NOT NULL DEFAULT '0',
  `picture` varchar(255) DEFAULT NULL,
  `originalName` char(255) DEFAULT NULL,
  `tema` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_users
-- ----------------------------
INSERT INTO `system_users` VALUES ('1', 'zesar1', 0x1E398E80A894F4559B8CB0E74C8BEBBA, 'cbibriesca@hotmail.com', '1', '0', 'Zesar X', 'pic_1.jpg', 'retro_blue_background.jpg', null);

-- ----------------------------
-- Table structure for `system_users_copy`
-- ----------------------------
DROP TABLE IF EXISTS `system_users_copy`;
CREATE TABLE `system_users_copy` (
  `nick` char(255) NOT NULL,
  `pass` blob,
  `email` char(255) NOT NULL,
  `rol` int(11) DEFAULT '1',
  `fbid` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL DEFAULT '0',
  `picture` varchar(255) DEFAULT NULL,
  `originalName` char(255) DEFAULT NULL,
  `bio` varchar(150) DEFAULT NULL,
  `allowFavorites` tinyint(1) DEFAULT '1',
  `allowShared` tinyint(1) DEFAULT '1',
  `allowLiked` tinyint(1) DEFAULT '1',
  `keepLoged` tinyint(1) DEFAULT '0',
  `request` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_users_copy
-- ----------------------------
INSERT INTO `system_users_copy` VALUES ('zesar1', 0x1E398E80A894F4559B8CB0E74C8BEBBA, 'cbibriesca@hotmail.com', '2', null, '1', 'Zesar X', 'pic_1.jpg', 'retro_blue_background.jpg', 'sdfas ad asdasd a dasd ad asd asd asd asd as asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd  as as as dasd sad asd asd asd asd asd asd as', '0', '1', '1', '1', '1355958733');
INSERT INTO `system_users_copy` VALUES ('cesarx', 0x1E398E80A894F4559B8CB0E74C8BEBBA, 'cesar@correo.com', '1', null, '2', '0', null, null, 'asdf', '1', '1', '1', '1', null);
INSERT INTO `system_users_copy` VALUES ('asdfasdf', 0x1E398E80A894F4559B8CB0E74C8BEBBA, 'asd@asd.com', '1', null, '3', '0', null, null, 'asdf', '1', '1', '1', '1', null);
INSERT INTO `system_users_copy` VALUES ('username', 0x1E398E80A894F4559B8CB0E74C8BEBBA, 'asdf@sadf.com', '1', null, '5', 'name', null, null, 'asdf', '1', '1', '1', '1', null);
INSERT INTO `system_users_copy` VALUES ('asd', 0x7F1300B33D82209DB71110F778FA07C4, '', '1', null, '16', '0', null, null, null, '1', '1', '1', '0', null);
