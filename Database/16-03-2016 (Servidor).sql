-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2016 at 04:20 AM
-- Server version: 5.5.48-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `besfit_midas`
--
CREATE DATABASE IF NOT EXISTS `besfit_midas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `besfit_midas`;

-- --------------------------------------------------------

--
-- Table structure for table `ges_acceso`
--

CREATE TABLE IF NOT EXISTS `ges_acceso` (
  `acc_codigo` varchar(225) COLLATE utf8_spanish_ci NOT NULL,
  `ges_usuarios_usu_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `acc_clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `acc_estado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `acc_fecha_creacion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `acc_num_intentos` int(1) DEFAULT NULL,
  `acc_ultimaconexion` datetime NOT NULL,
  `acc_tour` int(11) NOT NULL DEFAULT '0',
  `acc_primeravez` int(11) NOT NULL,
  PRIMARY KEY (`acc_codigo`),
  KEY `fk_ges_acceso_ges_usuarios1_idx` (`ges_usuarios_usu_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_acceso`
--

INSERT INTO `ges_acceso` (`acc_codigo`, `ges_usuarios_usu_codigo`, `acc_clave`, `acc_estado`, `acc_fecha_creacion`, `acc_num_intentos`, `acc_ultimaconexion`, `acc_tour`, `acc_primeravez`) VALUES
('ACC-0001', 'USU-001', '$1$o/4aB32G$IbMP537t26TgWGvebqn3T.', 'Desconectado', '08-29-2015', NULL, '2016-03-12 04:07:13', 0, 1),
('ACC-023347', 'USU-04490905', '$2y$09$rKwgQM0lGIhKGHXn13TxuexmfbW7I4upG2hUv3QqGjcM4aDfthw3K', 'Desconectado', '2016-03-03 06:57:52', NULL, '2016-03-12 04:33:07', 0, 1),
('ACC-02605', 'USU-0052231', '$2y$09$rKwgQM0lGIhKGHXn13TxuexmfbW7I4upG2hUv3QqGjcM4aDfthw3K', 'Desconectado', '2016-03-02 09:47:04', NULL, '2016-03-16 01:32:24', 0, 1),
('ACC-123', 'USU-003', '$2y$09$rKwgQM0lGIhKGHXn13TxuexmfbW7I4upG2hUv3QqGjcM4aDfthw3K', 'Desconectado', '', NULL, '2016-03-12 05:33:36', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ges_agenda`
--

CREATE TABLE IF NOT EXISTS `ges_agenda` (
  `age_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `sed_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `age_sala` int(11) NOT NULL,
  `age_fecha` date NOT NULL,
  `age_hora` time NOT NULL,
  `age_estado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `age_color` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `age_cancelo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `age_motivocancelacion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `age_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `age_fechacreacion` date NOT NULL,
  PRIMARY KEY (`age_codigo`),
  KEY `cli_codigo` (`cli_codigo`),
  KEY `sed_codigo` (`sed_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `ges_agenda`
--

INSERT INTO `ges_agenda` (`age_codigo`, `cli_codigo`, `sed_codigo`, `age_sala`, `age_fecha`, `age_hora`, `age_estado`, `age_color`, `age_cancelo`, `age_motivocancelacion`, `age_autor`, `age_fechacreacion`) VALUES
(1, 'CLI-03730', 'SED-0001', 1, '2016-02-26', '06:30:00', 'Sin Facturar', '', '', '', 'Guillermo Valencia', '2016-02-25'),
(2, 'CLI-03730', 'SED-0001', 1, '2016-03-05', '06:00:00', 'Activa', '', '', '', 'Guillermo Valencia', '2016-03-03'),
(3, 'CLI-0116764', 'SED-0001', 1, '2016-03-07', '06:00:00', 'Sin Facturar', '', '', '', 'Guillermo Valencia', '2016-03-05'),
(4, 'CLI-019136', 'SED-03918845', 1, '2016-03-25', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(5, 'CLI-019136', 'SED-03918845', 1, '2016-04-01', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(6, 'CLI-019136', 'SED-03918845', 1, '2016-04-08', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(7, 'CLI-019136', 'SED-03918845', 1, '2016-04-15', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(8, 'CLI-019136', 'SED-03918845', 1, '2016-04-22', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(9, 'CLI-019136', 'SED-03918845', 1, '2016-04-29', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(10, 'CLI-019136', 'SED-03918845', 1, '2016-05-06', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(11, 'CLI-019136', 'SED-03918845', 1, '2016-05-13', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(12, 'CLI-019136', 'SED-03918845', 1, '2016-05-20', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(13, 'CLI-019136', 'SED-03918845', 1, '2016-05-27', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(14, 'CLI-019136', 'SED-03918845', 1, '2016-06-03', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(15, 'CLI-019136', 'SED-03918845', 1, '2016-06-10', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(16, 'CLI-019136', 'SED-03918845', 1, '2016-06-17', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(17, 'CLI-019136', 'SED-03918845', 1, '2016-06-24', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(18, 'CLI-019136', 'SED-03918845', 1, '2016-07-01', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(19, 'CLI-019136', 'SED-03918845', 1, '2016-07-08', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(20, 'CLI-019136', 'SED-03918845', 1, '2016-07-15', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(21, 'CLI-019136', 'SED-03918845', 1, '2016-07-22', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(22, 'CLI-019136', 'SED-03918845', 1, '2016-07-29', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(23, 'CLI-019136', 'SED-03918845', 1, '2016-08-05', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(24, 'CLI-019136', 'SED-03918845', 1, '2016-08-12', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(25, 'CLI-019136', 'SED-03918845', 1, '2016-08-19', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(26, 'CLI-019136', 'SED-03918845', 1, '2016-08-26', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(27, 'CLI-019136', 'SED-03918845', 1, '2016-09-02', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(28, 'CLI-019136', 'SED-03918845', 1, '2016-09-09', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(29, 'CLI-019136', 'SED-03918845', 1, '2016-09-16', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(30, 'CLI-019136', 'SED-03918845', 1, '2016-09-23', '09:00:00', 'Sin facturar', '', '', '', 'Margarita María Alvarez', '2016-03-12'),
(31, 'CLI-019136', 'SED-03918845', 1, '2016-09-30', '09:00:00', 'Sin facturar', '#ff0000', '', '', 'Margarita María Alvarez', '2016-03-12'),
(32, 'CLI-019136', 'SED-03918845', 1, '2016-10-07', '09:00:00', 'Reservada', '#5d5d5d', '', '', 'Margarita María Alvarez', '2016-03-12'),
(33, 'CLI-069102', 'SED-03918843', 1, '2016-04-04', '08:00:00', 'Sin facturar', '', '', '', 'Diego Fernando Salazar ', '2016-03-12'),
(34, 'CLI-069102', 'SED-03918843', 1, '2016-04-11', '08:00:00', 'Sin facturar', '', '', '', 'Diego Fernando Salazar ', '2016-03-12'),
(35, 'CLI-069102', 'SED-03918843', 1, '2016-04-18', '08:00:00', 'Sin facturar', '', '', '', 'Diego Fernando Salazar ', '2016-03-12'),
(36, 'CLI-069102', 'SED-03918843', 1, '2016-04-25', '08:00:00', 'Sin facturar', '', '', '', 'Diego Fernando Salazar ', '2016-03-12'),
(37, 'CLI-069102', 'SED-03918843', 1, '2016-05-02', '08:00:00', 'Sin facturar', '', '', '', 'Diego Fernando Salazar ', '2016-03-12'),
(38, 'CLI-069102', 'SED-03918843', 1, '2016-05-09', '08:00:00', 'Sin facturar', '', '', '', 'Diego Fernando Salazar ', '2016-03-12'),
(39, 'CLI-069102', 'SED-03918843', 1, '2016-05-16', '08:00:00', 'Sin facturar', '', '', '', 'Diego Fernando Salazar ', '2016-03-12'),
(40, 'CLI-069102', 'SED-03918843', 1, '2016-05-23', '08:00:00', 'Sin facturar', '#ff0000', '', '', 'Diego Fernando Salazar ', '2016-03-12'),
(41, 'CLI-069102', 'SED-03918843', 1, '2016-05-30', '08:00:00', 'Reservada', '#5d5d5d', '', '', 'Diego Fernando Salazar ', '2016-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `ges_banco`
--

CREATE TABLE IF NOT EXISTS `ges_banco` (
  `ban_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ban_banco` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ban_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ban_fecha_creacion` date NOT NULL,
  PRIMARY KEY (`ban_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_banco`
--

INSERT INTO `ges_banco` (`ban_codigo`, `ban_banco`, `ban_autor`, `ban_fecha_creacion`) VALUES
('BAN-001', 'Bancolombia', 'Diego Salazar', '2016-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `ges_ciudades`
--

CREATE TABLE IF NOT EXISTS `ges_ciudades` (
  `ciu_departamento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ciu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ciu_nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ciu_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ges_clientes`
--

CREATE TABLE IF NOT EXISTS `ges_clientes` (
  `cli_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cli_tipo_identificacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cli_identificacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cli_nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cli_apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cli_sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cli_fecha_nac` date NOT NULL,
  `cli_telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cli_celular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cli_email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cli_direccion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `ges_ciudad_ciu_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ges_sedes_sed_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ges_planes_pla_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cli_foto` longtext COLLATE utf8_spanish_ci,
  `cli_refererido` int(11) NOT NULL,
  `cli_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cli_fecha_creacion` date NOT NULL,
  `cli_pais` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cli_departamento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cli_estado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cli_eps` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `historiaclinica` longblob,
  `tipo_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cli_credito` int(11) NOT NULL,
  `cli_cortesia` int(11) NOT NULL,
  PRIMARY KEY (`cli_codigo`),
  UNIQUE KEY `cli_identificacion` (`cli_identificacion`),
  KEY `ges_sedes_sed_codigo` (`ges_sedes_sed_codigo`,`ges_planes_pla_codigo`),
  KEY `ges_planes_pla_codigo` (`ges_planes_pla_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_clientes`
--

INSERT INTO `ges_clientes` (`cli_codigo`, `cli_tipo_identificacion`, `cli_identificacion`, `cli_nombre`, `cli_apellido`, `cli_sexo`, `cli_fecha_nac`, `cli_telefono`, `cli_celular`, `cli_email`, `cli_direccion`, `ges_ciudad_ciu_codigo`, `ges_sedes_sed_codigo`, `ges_planes_pla_codigo`, `cli_foto`, `cli_refererido`, `cli_autor`, `cli_fecha_creacion`, `cli_pais`, `cli_departamento`, `cli_estado`, `cli_eps`, `historiaclinica`, `tipo_usuario`, `cli_credito`, `cli_cortesia`) VALUES
('CLI-0016794', 'Cedula', '1017234567', 'Jhon', 'Gutierrez', 'Mujer', '1984-07-17', '253-75-89', '(312)-567-87-89', 'jgutierrez@gmail.com', '', '', 'SED-03918843', 'PLA-02392', '../FotoCliente/1017234567.jpg', 0, 'Guillermo Valencia', '2016-03-02', 'CO', '05', 'Activo', 'Sanitas', NULL, 'Fijo', 12, 0),
('CLI-0116764', 'Cedula', '43150640', 'Monica', 'Valencia Machado', 'Mujer', '1987-03-02', '434-23-42', '', 'mvalencia@gmail.com', 'Calle 77 B  # 100   - 3', '', 'SED-03918844', 'PLA-02392', '../FotoCliente/43150640.jpg', 0, 'Guillermo Valencia', '2016-03-05', 'CO', '05', 'Activo', 'Coomeva', NULL, 'Fijo', 5, 1),
('CLI-019136', 'Cedula', '123456', 'Cesar', 'Moreno', 'Hombre', '1975-03-11', '245-24-23', '(423)-242-42-4', 'cesar@hotmail.com', '', '', 'SED-03918843', 'PLA-02393', '../FotoCliente/123456.jpg', 0, 'Margarita María Alvarez', '2016-03-12', 'CO', '05', 'Activo', 'sura', NULL, 'Fijo', 28, 0),
('CLI-03730', 'Cedula', '43984605', 'Claudia ', 'Milena', 'Mujer', '1985-04-18', '421-50-62', '(300)-208-22-33', 'claudiamile@gmail.com', 'Cl 49   # 79   - 12', '', 'SED-0001', 'PLA-02391', '../FotoCliente/43984605.jpg', 0, 'Guillermo Valencia', '2016-02-25', 'CO', '05', 'Activo', 'Coomeva', NULL, 'Fijo', 6, 1),
('CLI-069102', 'Cedula', '123456789', 'Aura ', 'Ortega', 'Mujer', '1985-03-12', '456-78-90', '(466)-789-02', 'aura@gmail.com', '', '', 'SED-03918845', 'PLA-02391', '../FotoCliente/123456789.jpg', 0, 'Diego Fernando Salazar ', '2016-03-12', 'CO', '05', 'Activo', 'sura', NULL, 'Fijo', 8, 0),
('CLI-069103', 'Cedula', '987654', 'Ramiro', 'Barrientos', 'Hombre', '1981-08-20', '456-78-90', '(466)-789-02', 'rameliz@gmail.com', '', '', 'SED-03918845', 'PLA-02393', '../FotoCliente/123456789.jpg', 0, 'Margarita Alvarez', '2016-03-12', 'CO', '05', 'Activo', 'sura', NULL, 'Fijo', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ges_conf_factura`
--

CREATE TABLE IF NOT EXISTS `ges_conf_factura` (
  `fac_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fac_logo` longblob NOT NULL,
  `fac_terminosycondiciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fac_textoresolucion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fac_resolucion_ini` int(11) NOT NULL,
  `fac_resolucion_fin` int(11) NOT NULL,
  PRIMARY KEY (`fac_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ges_correo`
--

CREATE TABLE IF NOT EXISTS `ges_correo` (
  `cod_correo` varchar(255) NOT NULL,
  `tra_codigo` varchar(255) NOT NULL,
  `cor_estado` varchar(30) NOT NULL,
  `cor_observacion` longtext NOT NULL,
  `cor_fechacre` date NOT NULL,
  PRIMARY KEY (`cod_correo`),
  KEY `tra_codigo` (`tra_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ges_detallefactura`
--

CREATE TABLE IF NOT EXISTS `ges_detallefactura` (
  `det_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ges_factura_fac_codigo` int(11) NOT NULL,
  `ges_producto_pro_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `det_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`det_codigo`),
  KEY `ges_factura_fac_codigo` (`ges_factura_fac_codigo`,`ges_producto_pro_codigo`),
  KEY `ges_producto_pro_codigo` (`ges_producto_pro_codigo`),
  KEY `ges_factura_fac_codigo_2` (`ges_factura_fac_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `ges_detallefactura`
--

INSERT INTO `ges_detallefactura` (`det_codigo`, `ges_factura_fac_codigo`, `ges_producto_pro_codigo`, `det_cantidad`) VALUES
(23, 47, 'PRO-088235', 1),
(24, 48, 'PRO-0007', 131),
(25, 49, 'PRO-088235', 10),
(26, 49, 'PRO-0003', 1),
(27, 50, 'PRO-088235', 10),
(28, 51, 'PRO-0007', 1),
(29, 52, 'PRO-0007', 1),
(30, 53, 'PRO-088235', 10),
(31, 53, 'PRO-0007', 1),
(32, 54, 'PRO-088235', 2),
(33, 54, 'PRO-0003', 1),
(34, 55, 'PRO-088235', 2),
(35, 55, 'PRO-0309638', 5),
(36, 55, 'PRO-0004', 1),
(37, 56, 'PRO-0003', 1),
(38, 56, 'PRO-0309638', 5),
(39, 57, 'PRO-0003', 1),
(40, 57, 'PRO-088235', 2),
(41, 58, 'PRO-088235', 1),
(42, 58, 'PRO-07590211', 1),
(43, 58, 'PRO-0007', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ges_empresa`
--

CREATE TABLE IF NOT EXISTS `ges_empresa` (
  `emp_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_nit` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_razon_social` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_representante` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_pais` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_ciudad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_telefono` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_sitioweb` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_moneda` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_fecha_creacion` datetime NOT NULL,
  `emp_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `emp_regimen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`emp_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_empresa`
--

INSERT INTO `ges_empresa` (`emp_codigo`, `emp_nit`, `emp_razon_social`, `emp_representante`, `emp_pais`, `emp_ciudad`, `emp_telefono`, `emp_direccion`, `emp_email`, `emp_sitioweb`, `emp_moneda`, `emp_fecha_creacion`, `emp_autor`, `emp_regimen`) VALUES
('EMP-890983815-5', '890983815-5', 'MIHA S.A.S', 'PABLO URIBE VÉLEZ', 'Colombia', 'Medellín', '3128609', 'Crr 30 Nº 8 B - 25 Oficina 2105', 'asistente.bes@gmail.com', '\nwww.bes.com.co', 'COP', '2016-02-01 00:00:00', 'Guille Valencia', 'Comun');

-- --------------------------------------------------------

--
-- Table structure for table `ges_estudios`
--

CREATE TABLE IF NOT EXISTS `ges_estudios` (
  `est_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `est_nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ges_sedes_sed_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `est_telefono` int(11) NOT NULL,
  `est_email` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `est_direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `est_geoubicacion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `est_fecha_creacion` date NOT NULL,
  PRIMARY KEY (`est_codigo`),
  KEY `ges_sedes_sed_codigo` (`ges_sedes_sed_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ges_factura`
--

CREATE TABLE IF NOT EXISTS `ges_factura` (
  `fac_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fac_numero` int(11) NOT NULL,
  `fac_fecha` varchar(211) COLLATE utf16_spanish_ci DEFAULT NULL,
  `fac_plazo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fac_vencimiento` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fac_descuento` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fac_subtotal` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fac_total` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fac_observacion` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `ges_clientes_cli_codigo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ges_sedes_sed_codigo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ges_usuarios_usu_codigo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fac_ruta_factura` longtext COLLATE utf16_spanish_ci COMMENT 'Aca va la ruta del archivo pdf de la factura',
  `fac_estado` varchar(200) COLLATE utf16_spanish_ci NOT NULL,
  `fac_pagado` varchar(250) COLLATE utf16_spanish_ci NOT NULL DEFAULT '0',
  `fac_porpagar` varchar(250) COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`fac_codigo`),
  KEY `ges_usuarios_usu_codigo` (`ges_usuarios_usu_codigo`),
  KEY `ges_sedes_sed_codigo` (`ges_sedes_sed_codigo`),
  KEY `ges_clientes_cli_codigo` (`ges_clientes_cli_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci AUTO_INCREMENT=59 ;

--
-- Dumping data for table `ges_factura`
--

INSERT INTO `ges_factura` (`fac_codigo`, `fac_numero`, `fac_fecha`, `fac_plazo`, `fac_vencimiento`, `fac_descuento`, `fac_subtotal`, `fac_total`, `fac_observacion`, `ges_clientes_cli_codigo`, `ges_sedes_sed_codigo`, `ges_usuarios_usu_codigo`, `fac_ruta_factura`, `fac_estado`, `fac_pagado`, `fac_porpagar`) VALUES
(47, 2001, '0000-00-00 00:00:00.000000', 'Contado', '31/01/2016', '10', '426', '724', 'hjhhjhk297', 'CLI-037601', 'SED-03918844', 'USU-001', '', 'activo', 'pago', '23'),
(48, 0, '05/03/2016', 'Contado', '05/03/2016', NULL, '1,229,480', '1,414,800', '', 'CLI-03730', 'SED-0001', 'USU-001', NULL, 'Abierta', '0', '1,414,800'),
(49, 1, '05/03/2016', 'Contado', '05/03/2016', NULL, '1.313.103', '1,500,000', '', 'CLI-0116764', 'SED-0001', 'USU-0052231', NULL, 'Abierta', '0', '1.500.000'),
(50, 2, '05/03/2016', 'Contado', '05/03/2016', NULL, '1,293,103', '1,500,000', '', 'CLI-0116764', 'SED-0001', 'USU-001', NULL, 'Abierta', '0', '1,500,000'),
(51, 3, '05/03/2016', 'Contado', '05/03/2016', NULL, '9,385', '10,800', '', 'CLI-0116764', 'SED-0001', 'USU-001', NULL, 'Abierta', '800', '10,000'),
(52, 3, '05/03/2016', 'Contado', '05/03/2016', NULL, '9,385', '10,800', '', 'CLI-0116764', 'SED-0001', 'USU-001', NULL, 'Abierta', '0', '10,800'),
(53, 4, '05/03/2016', 'Contado', '05/03/2016', NULL, '1,302,488', '1,510,800', '', 'CLI-0116764', 'SED-0001', 'USU-001', 'EMP-890983815-5FAC4CC43150640.pdf', 'Cerrada', '1510800', '0'),
(54, 1, '05/03/2016', 'Contado', '05/03/2016', NULL, '278.621', '300,000', '', 'CLI-0016794', 'SED-03918845', 'USU-0052231', 'EMP-890983815-5FAC1CC1017234567.pdf', 'Cerrada', '300', '0'),
(55, 2, '05/03/2016', 'Contado', '05/03/2016', NULL, '355.518', '395.000', '', 'CLI-0016794', 'SED-03918845', 'USU-0052231', 'EMP-890983815-5FAC2CC1017234567.pdf', 'Cerrada', '395', '0'),
(56, 3, '08/03/2016', 'Contado', '08/03/2016', NULL, '81.897', '95.000', '', 'CLI-037601', 'SED-03918845', 'USU-0052231', 'EMP-890983815-5FAC3CC43185104.pdf', 'Cerrada', '95', '0'),
(57, 4, '12/03/2016', 'Contado', '12/03/2016', NULL, '258.621', '300.000', '', 'CLI-019136', 'SED-03918845', 'USU-0052231', 'EMP-890983815-5FAC4CC123456.pdf', 'Cerrada', '300', '0'),
(58, 0, '12/03/2016', 'Contado', '12/03/2016', NULL, '141.120', '155.000', '', 'CLI-069102', 'SED-03918843', 'USU-003', 'EMP-890983815-5FAC0CC123456789.pdf', 'Cerrada', '155', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ges_finanzas`
--

CREATE TABLE IF NOT EXISTS `ges_finanzas` (
  `fin_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fin_banco` varchar(255) NOT NULL,
  `fin_sede` varchar(255) NOT NULL,
  `fin_tipo_cuenta` varchar(255) NOT NULL,
  `fin_numero_cuenta` varchar(255) NOT NULL,
  `fin_saldo` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fin_codigo`),
  KEY `fin_banco` (`fin_banco`),
  KEY `fin_sede` (`fin_sede`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ges_finanzas`
--

INSERT INTO `ges_finanzas` (`fin_codigo`, `fin_banco`, `fin_sede`, `fin_tipo_cuenta`, `fin_numero_cuenta`, `fin_saldo`) VALUES
(1, 'BAN-001', 'SED-0001', 'Ahorro', '145786', '1511600'),
(2, 'BAN-001', 'SED-03918845', 'Ahorro', '145786', '1090'),
(3, 'BAN-001', 'SED-03918843', 'Ahorro', '42424', '155');

-- --------------------------------------------------------

--
-- Table structure for table `ges_formas_pago`
--

CREATE TABLE IF NOT EXISTS `ges_formas_pago` (
  `forpag_codigo` varchar(255) NOT NULL,
  `forpag_nombre` varchar(255) NOT NULL,
  `forpag_descripcion` longtext NOT NULL,
  `forpag_estado` varchar(250) NOT NULL,
  `forpag_autor` varchar(250) NOT NULL,
  `forpag_fecha_creacion` date NOT NULL,
  PRIMARY KEY (`forpag_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ges_formas_pago`
--

INSERT INTO `ges_formas_pago` (`forpag_codigo`, `forpag_nombre`, `forpag_descripcion`, `forpag_estado`, `forpag_autor`, `forpag_fecha_creacion`) VALUES
('12', 'Efectivo', 'Pago realizado en efectivo', 'Activo', 'Diego Salazar', '2016-01-31'),
('1234', 'Tarjeta Crédito', 'Pagado en débito', 'Activo', 'Diego Salazar', '2016-01-31'),
('PAG-03540531', 'Tarjeta Débito', 'Pago con tarjeta debito ', 'Activo', '', '2016-01-28'),
('PAG-095697', 'ensayo', 'hola', 'Activo', 'Margarita María Alvarez', '2016-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `ges_historiaplan`
--

CREATE TABLE IF NOT EXISTS `ges_historiaplan` (
  `hplan_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_codigo` varchar(255) NOT NULL,
  `pla_codigo` varchar(255) NOT NULL,
  `hpla_fecha_compra` date NOT NULL,
  `hpla_fecha_vence` date NOT NULL,
  `hpla_credito_disponible` int(11) NOT NULL,
  `hpla_credito_perdido` int(11) NOT NULL,
  `hplan_estado` varchar(255) NOT NULL,
  PRIMARY KEY (`hplan_codigo`),
  KEY `cli_codigo` (`cli_codigo`),
  KEY `pla_codigo` (`pla_codigo`),
  KEY `cli_codigo_3` (`cli_codigo`),
  KEY `cli_codigo_2` (`cli_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ges_impuestos`
--

CREATE TABLE IF NOT EXISTS `ges_impuestos` (
  `imp_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imp_nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imp_tipo_impuesto` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `imp_porcentaje` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `imp_descripcion` longtext COLLATE utf8_spanish_ci,
  `imp_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imp_fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`imp_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_impuestos`
--

INSERT INTO `ges_impuestos` (`imp_codigo`, `imp_nombre`, `imp_tipo_impuesto`, `imp_porcentaje`, `imp_descripcion`, `imp_autor`, `imp_fecha_creacion`) VALUES
('IMP-0279', 'IVA 16%', 'IVA', '0.16', '', 'Guillermo Valencia', '2016-02-23 06:32:52'),
('IMP-0736312', 'IVA 10%', 'IVA', '0.10', '', 'Guillermo León Valencia', '2016-02-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ges_inbody`
--

CREATE TABLE IF NOT EXISTS `ges_inbody` (
  `inb_codigo` varchar(255) NOT NULL,
  `inb_codigo_be` varchar(20) NOT NULL,
  `inb_nombre` varchar(255) NOT NULL,
  `inb_edad` int(10) NOT NULL,
  `inb_altura` int(10) NOT NULL,
  `inb_peso` int(10) NOT NULL,
  `inb_sexo` varchar(5) NOT NULL,
  `inb_tasmetbas` int(10) NOT NULL,
  `inb_porgrascor` int(10) NOT NULL,
  `inb_dieta` varchar(255) NOT NULL,
  `inb_patologias` longtext NOT NULL,
  `inb_fecha` date NOT NULL,
  PRIMARY KEY (`inb_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ges_inbody`
--

INSERT INTO `ges_inbody` (`inb_codigo`, `inb_codigo_be`, `inb_nombre`, `inb_edad`, `inb_altura`, `inb_peso`, `inb_sexo`, `inb_tasmetbas`, `inb_porgrascor`, `inb_dieta`, `inb_patologias`, `inb_fecha`) VALUES
('INB-00683106', '1', 'Aura  Ortega', 31, 160, 67, 'Mujer', 2324, 20, 'Dieta 1500Kcal (TMB <0 a 1500k - PGC >0 a 20%)', 'Sufre de rodillas', '2016-03-04'),
('INB-0482730', '2', 'Ramiro Barrientos', 35, 175, 80, 'Hombr', 1230, 25, 'Dieta de 2300Kcal (TMB >0 a 2000k - PGC <10% )', 'Ninguna', '2016-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `ges_menu`
--

CREATE TABLE IF NOT EXISTS `ges_menu` (
  `men_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ges_paginas_pag_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `men_nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `men_icono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `men_method` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `men_seccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `men_orden` int(11) NOT NULL,
  `men_descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `men_visible` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'SI',
  `men_migapan` longtext COLLATE utf8_spanish_ci NOT NULL,
  `men_urlmigapan` longtext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`men_codigo`),
  KEY `ges_paginas_pag_codigo` (`ges_paginas_pag_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_menu`
--

INSERT INTO `ges_menu` (`men_codigo`, `ges_paginas_pag_codigo`, `men_nombre`, `men_icono`, `men_method`, `men_seccion`, `men_orden`, `men_descripcion`, `men_visible`, `men_migapan`, `men_urlmigapan`) VALUES
('MEN-PPAL-0001', 'PAG-10001', 'Clientes', 'fa fa-users', NULL, 'menu', 3, '', 'SI', '', ''),
('MEN-PPAL-00011', 'PAG-100011', 'Impuestos', 'fa fa-money', NULL, 'configuracion', 1, 'Configura los impuestos que vas a manejar en tus facturas', 'SI', '', ''),
('MEN-PPAL-00012', 'PAG-100012', 'Numeraciones', 'fa fa-sort-numeric-asc', NULL, 'configuracion', 1, 'Edita y estable el orden de las numeraciones para las facturas, cuentas de cobro y demás items.', 'SI', '', ''),
('MEN-PPAL-00013', 'PAG-100013', 'Perfiles', 'fa fa-eye', NULL, 'configuracion', 1, 'Crea los perfiles de tu lab para que hagan un uso correcto de MIDAS', 'SI', '', ''),
('MEN-PPAL-00014', 'PAG-100014', 'Proveedores', 'fa fa-truck', NULL, 'configuracion', 5, 'Administra los proveedores de tu lab', 'SI', '', ''),
('MEN-PPAL-00015', 'PAG-100015', 'Laboratorios', 'fa fa-map-marker', NULL, 'menu', 4, 'Administra tus laboratorios', 'SI', '', ''),
('MEN-PPAL-00016', 'PAG-100016', 'Usuarios', 'fa fa-user-secret', NULL, 'configuracion', 5, 'Administra los usuarios que van a usar MIDAS', 'SI', '', ''),
('MEN-PPAL-00017', 'PAG-100017', 'Ingresos', 'fa fa-balance-scale', NULL, 'menu', 1, 'Realiza facturas de venta a tus clientes al momento de adquirir un plan, producto o servicio del laboratorio', 'SI', '', ''),
('MEN-PPAL-00018', 'PAG-100017', 'Factura de venta', 'fa fa-balance-scale', NULL, 'ingresos', 1, '', 'SI', '', ''),
('MEN-PPAL-00019', 'PAG-100018', 'Pagos recibidos', 'fa fa-balance-scale', NULL, 'ingresos', 2, '', 'SI', '', ''),
('MEN-PPAL-0002', 'PAG-10002', 'ADMINISTRAR CLIENTE', 'fa fa-user', NULL, 'clientes', 2, 'Administra toda la información del afiliado ', 'SI', '', ''),
('MEN-PPAL-00020', 'PAG-100019', 'Notas credito', 'fa fa-balance-scale', NULL, 'ingresos', 3, '', 'SI', '', ''),
('MEN-PPAL-00021', 'PAG-100020', 'Remisiones', 'fa fa-balance-scale', NULL, 'ingresos', 4, '', 'SI', '', ''),
('MEN-PPAL-00022', 'PAG-100021', 'Nota debito', 'fa fa-balance-scale', NULL, 'ingresos', 5, '', 'SI', '', ''),
('MEN-PPAL-0003', 'PAG-10003', 'AFILIAR NUEVO CLIENTE', 'fa fa-user-plus', NULL, 'clientes', 1, 'Registra uno o varios clientes para este LAB', 'SI', '\n	', ''),
('MEN-PPAL-00045', 'PAG-100045', 'Traslados', 'fa fa-exchange', NULL, 'menu', 5, '', 'SI', '', ''),
('MEN-PPAL-00046', 'PAG-100046', 'Formas de Pago', 'fa fa-usd', NULL, 'configuracion', 8, 'Administra las diferentes formas de pago', 'SI', '', ''),
('MEN-PPAL-00049', 'PAG-100049', 'Traslados Recibidos', 'fa fa-exchange', NULL, 'traslados', 2, 'Muestra los clientes que se han trasladado de otros laboratorios\r\n', 'SI', '', ''),
('MEN-PPAL-0005', 'PAG-10005', 'CONSULTAS CLIENTE', 'fa fa-search', NULL, 'clientes', 3, 'Realizar consultas sobre el estado de los planes de los clientes', 'SI', '', ''),
('MEN-PPAL-00050', 'PAG-100050', 'Traslados Enviados', 'fa fa-exchange', NULL, 'traslados', 1, 'Muestra los clientes que se han trasladado de esta sede\n', 'SI', '', ''),
('MEN-PPAL-00051', 'PAG-100051', 'InBody', 'fa fa-street-view', NULL, 'menu', 6, 'Gestiona y administra los InBodys de los clientes', 'SI', '', ''),
('MEN-PPAL-0006', 'PAG-10006', 'Agendar cita', 'fa fa-calendar', NULL, 'menu', 2, 'Controla las citas de cada afiliado', 'SI', '', ''),
('MEN-PPAL-0007', 'PAG-10007', 'Configuración', 'fa fa-wrench', NULL, 'header', 1, 'Controla las citas de cada afiliado', 'SI', '', ''),
('MEN-PPAL-0008', 'PAG-10008', 'Mi empresa', 'fa fa-briefcase', NULL, 'menu', 4, 'Administra los datos de tu empresa', 'SI', '', ''),
('MEN-PPAL-0009', 'PAG-10009', 'Empresas', 'fa fa-building', NULL, 'configuracion', 1, 'Crea y Edita diferentes empresas para que manejen la marca BeSmart', 'SI', '', ''),
('MEN-PPAL-00100', 'PAG-10100', 'Gestionar Productos', 'fa fa-leaf', NULL, 'menu', 1, '', 'SI', '', ''),
('MEN-PPAL-00101', 'PAG-10101', 'Gestionar Productos', 'fa fa-leaf', NULL, 'inventario', 1, '', 'SI', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ges_numeracion`
--

CREATE TABLE IF NOT EXISTS `ges_numeracion` (
  `num_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `num_recibocaja` int(11) NOT NULL,
  `num_comprobantepago` int(11) NOT NULL,
  `num_notacredito` int(11) NOT NULL,
  `num_remisiones` int(11) NOT NULL,
  `num_cotizaciones` int(11) NOT NULL,
  `num_factura` int(11) NOT NULL,
  `ges_sedes_sed_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`num_codigo`),
  UNIQUE KEY `num_factura` (`num_factura`),
  UNIQUE KEY `num_cotizaciones` (`num_cotizaciones`),
  UNIQUE KEY `num_remisiones` (`num_remisiones`),
  UNIQUE KEY `num_notacredito` (`num_notacredito`),
  UNIQUE KEY `num_comprobantepago` (`num_comprobantepago`),
  UNIQUE KEY `num_recibocaja` (`num_recibocaja`),
  KEY `ges_sedes_sed_codigo` (`ges_sedes_sed_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_numeracion`
--

INSERT INTO `ges_numeracion` (`num_codigo`, `num_recibocaja`, `num_comprobantepago`, `num_notacredito`, `num_remisiones`, `num_cotizaciones`, `num_factura`, `ges_sedes_sed_codigo`) VALUES
('NUM-01', 1, 1, 1, 1, 1, 1, 'SED-03918845');

-- --------------------------------------------------------

--
-- Table structure for table `ges_paginas`
--

CREATE TABLE IF NOT EXISTS `ges_paginas` (
  `pag_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pag_nombre` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `pag_descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pag_archivo` varchar(255) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del archivo .php o .html',
  `pag_parametros` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pag_titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL COMMENT 'title',
  `pag_seccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `pag_migapan` longtext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`pag_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_paginas`
--

INSERT INTO `ges_paginas` (`pag_codigo`, `pag_nombre`, `pag_descripcion`, `pag_archivo`, `pag_parametros`, `pag_titulo`, `pag_seccion`, `pag_migapan`) VALUES
('PAG-10001', 'GESTION CLIENTES', 'En esta gestión lograras administrar la información relacionada con los clientes BeSmart, Registro, Ranking, Cambio de Plan o traslado a otro Lab. ', 'module/pagina_gestion.php', '', 'Administrar Clientes BeSmart', 'clientes', ''),
('PAG-100010', 'EDITAR EMPRESA', '', 'module/empresa_edita.php', '', 'EDITAR EMPRESA', '', ''),
('PAG-100011', 'GESTIONAR IMPUESTOS', 'Configura los impuestos que vas a manejar en tus facturas', 'module/impuestos.php', '', 'CONFIGURACIÓN DE IMPUESTOS', '', ''),
('PAG-100012', 'CONFIGURAR NUMERACIONES PARA FACTURAS', '', 'module/numeraciones.php', '', 'CONFIGURACIÓN DE NUMERACIONES', '', ''),
('PAG-100013', 'GESTIONAR PERFILES', 'Administra los perfiles de los usuarios que van a utilizar la aplicación, facilitando la asignación de permisos para un grupo de perfil o rol especifico.', 'module/perfiles.php', '', 'GESTIÓN DE PERFILES', '', ''),
('PAG-100014', 'GESTIONAR PROVEEDORES', '', 'module/proveedores.php', '', 'GESTIONAR PROVEEDORES', '', ''),
('PAG-100015', 'GESTIONAR LABORATORIOS', '', 'module/sedes.php', '', 'GESTIONAR LABORATORIOS', '', ''),
('PAG-100016', 'GESTIONAR USUARIOS', '', 'module/usuarios.php', '', 'GESTIONAR USUARIOS', '', ''),
('PAG-100017', 'FACTURA DE VENTA', 'Realiza facturas de venta a tus clientes al momento de adquirir un plan, producto o servicio del laboratorio', 'module/factura_venta.php', '', 'FACTURA DE VENTA', '', ''),
('PAG-100018', 'PAGOS RECIBIDOS', 'Controla y administra los pagos realizados por los clientes.', 'module/pagos_recibidos.php', '', 'PAGOS RECIBIDOS', '', ''),
('PAG-100019', 'NOTAS CREDITO', 'Genera un documento para justificar el crédito a favor de un cliente', 'module/notas_credito.php', '', 'NOTAS CREDITO', '', ''),
('PAG-10002', 'ADMINISTRAR CLIENTE', 'Administra la información de un afiliado', 'module/clientes_detalle.php', '', 'Afiliar un nuevo cliente', '', '  <ol class="breadcrumb">\n    <li><a href="dashboard.php">Inicio</a></li> \n    <li><a href="dashboard.php?m=bW9kdWxlL3BhZ2luYV9nZXN0aW9uLnBocA==&pagid=UEFHLTEwMDAx">Gestion Clientes</a></li> \n    <li class="active">Administrar Cliente</li>\n  </ol>'),
('PAG-100020', 'REMISIONES', '', 'module/remisiones.php', '', 'REMISIONES', '', ''),
('PAG-100021', 'NOTA DEBITO', '', 'module/nota_debito.php', '', 'NOTA DEBITO', '', ''),
('PAG-10003', 'AFILIAR NUEVO CLIENTE', 'Registrar clientes para el laboratorio', 'module/clientes_nuevo.php', '', 'Afiliar un nuevo cliente', '', '  <ol class="breadcrumb">\n    <li><a href="dashboard.php">Inicio</a></li> \n    <li><a href="dashboard.php?m=bW9kdWxlL3BhZ2luYV9nZXN0aW9uLnBocA==&pagid=UEFHLTEwMDAx">Gestion Clientes</a></li> \n    <li class="active">Afiliar Cliente</li>\n  </ol>'),
('PAG-100045', 'TRASLADOS', '', 'module/traslados.php', '', 'TRASLADOS', '', ''),
('PAG-100046', 'FORMAS DE PAGO', '', 'module/formas_pago.php', '', 'FORMAS DE PAGO', '', ''),
('PAG-100049', 'TRASLADOS RECIBIDOS', 'Muestra los clientes que se han trasladado a nuestro laboratorio', 'module/traslados_recibidos.php', '', 'Traslados Recibidos', '', ''),
('PAG-10005', 'CONSULTAS CLIENTE', '', 'module/clientes_consultas.php', '', 'CONSULTAS CLIENTE', '', '  <ol class="breadcrumb">\n    <li><a href="dashboard.php">Inicio</a></li> \n    <li><a href="dashboard.php?m=bW9kdWxlL3BhZ2luYV9nZXN0aW9uLnBocA==&pagid=UEFHLTEwMDAx">Gestion Clientes</a></li> \n    <li class="active">Consultas</li>\n  </ol>'),
('PAG-100050', 'TRASLADOS ENVIADOS', 'Muestra los clientes que se han trasladado a otro laboratorio', 'module/traslados.php', '', 'Traslados Enviados', '', ''),
('PAG-100051', 'GESTIÓN INBODY', 'En este módulo se gestiona todo lo relacionado con el InBody de cada cliente.', 'module/inbody.php', '', 'INBODY', 'menu', ''),
('PAG-10006', 'AGENDA', '', 'module/agenda.php', '', 'AGENDA', '', ''),
('PAG-10007', 'CONFIGURACION', '', 'module/configuracion.php', '', 'CONFIGURACION', '', ''),
('PAG-10008', 'MI EMPRESA', '', 'module/empresa_editar.php', '', 'MI EMPRESA', '', ''),
('PAG-10009', 'GESTION DE EMPRESAS', '', 'module/empresa.php', '', 'GESTION DE EMPRESAS', '', ''),
('PAG-10100', 'Gestionar Productos', 'Los productos son aquellos items físicos que se venden en cada laboratorio y que deben estar inventariados. ', 'module/gestion_productos.php', '', 'Gestionar Productos', 'inventario', ''),
('PAG-10101', 'Gestionar Productos', 'Los productos son aquellos items físicos que se venden en cada laboratorio y que deben estar inventariados. ', 'module/gestion_productos.php', '', 'Gestionar Productos', 'menu', '');

-- --------------------------------------------------------

--
-- Table structure for table `ges_pagos`
--

CREATE TABLE IF NOT EXISTS `ges_pagos` (
  `pag_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ges_facturas_fac_codigo` int(11) NOT NULL,
  `pag_destno` varchar(250) NOT NULL,
  `ges_formaspago_codigo` varchar(250) NOT NULL,
  `pag_valor` varchar(250) NOT NULL,
  `pag_fechapag` date NOT NULL,
  `ges_retenciones_ret_codigo` varchar(255) NOT NULL,
  PRIMARY KEY (`pag_codigo`),
  KEY `ges_facturas_fac_codigo` (`ges_facturas_fac_codigo`),
  KEY `ges_formaspago_codigo` (`ges_formaspago_codigo`),
  KEY `ges_retenciones_ret_codigo` (`ges_retenciones_ret_codigo`),
  KEY `ges_retenciones_ret_codigo_2` (`ges_retenciones_ret_codigo`),
  KEY `ges_retenciones_ret_codigo_3` (`ges_retenciones_ret_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `ges_pagos`
--

INSERT INTO `ges_pagos` (`pag_codigo`, `ges_facturas_fac_codigo`, `pag_destno`, `ges_formaspago_codigo`, `pag_valor`, `pag_fechapag`, `ges_retenciones_ret_codigo`) VALUES
(12, 47, 'destin', '12', '25000', '2016-01-31', 'RET-2300'),
(13, 51, '1', '1234', '800', '2016-03-05', '0'),
(14, 53, '1', '1234', '300000', '2016-03-05', '0'),
(15, 53, '1', '12', '1000800', '2016-03-05', '0'),
(16, 54, '2', '1234', '200', '2016-03-05', '0'),
(17, 54, '2', '12', '100', '2016-03-05', '0'),
(18, 55, '2', 'PAG-03540531', '95000', '2016-03-05', '0'),
(19, 55, '2', '1234', '300000', '2016-03-05', '0'),
(20, 56, '2', '1234', '50000', '2016-03-08', '0'),
(21, 56, '2', 'PAG-03540531', '45000', '2016-03-08', '0'),
(22, 57, '2', 'PAG-03540531', '100000', '2016-03-12', '0'),
(23, 57, '2', '1234', '150000', '2016-03-12', '0'),
(24, 57, '2', '12', '50000', '2016-03-12', '0'),
(25, 58, '3', '12', '35000', '2016-03-12', '0'),
(26, 58, '3', 'PAG-03540531', '100000', '2016-03-12', '0'),
(27, 58, '3', '1234', '20000', '2016-03-12', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ges_perfiles`
--

CREATE TABLE IF NOT EXISTS `ges_perfiles` (
  `per_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `per_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `per_funciones` longtext COLLATE utf8_spanish_ci NOT NULL,
  `per_estado` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `per_fecha_creacion` datetime NOT NULL,
  `per_autor` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`per_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_perfiles`
--

INSERT INTO `ges_perfiles` (`per_codigo`, `per_nombre`, `per_funciones`, `per_estado`, `per_fecha_creacion`, `per_autor`) VALUES
('PER-00001', 'Desarrollador', 'Encargado de gestionar todos los procesos de MIDAS, Errores, Actualizaciones, Mantenimiento.\n', 'Activo', '2015-07-27 08:48:40', ' Guillermo León Valencia'),
('PER-03978', 'Administrador', '', 'Activo', '2016-03-02 09:44:18', 'Guillermo Valencia');

-- --------------------------------------------------------

--
-- Table structure for table `ges_permisos`
--

CREATE TABLE IF NOT EXISTS `ges_permisos` (
  `ges_perfiles_per_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ges_menu_men_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `per_C` int(11) DEFAULT '0',
  `per_R` int(11) NOT NULL DEFAULT '0',
  `per_U` int(11) NOT NULL DEFAULT '0',
  `per_D` int(11) NOT NULL DEFAULT '0',
  `per_DG` int(11) NOT NULL DEFAULT '0',
  `per_Report` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ges_menu_men_codigo`,`ges_perfiles_per_codigo`),
  KEY `fk_ges_secciones_has_ges_perfiles_ges_perfiles1_idx` (`ges_perfiles_per_codigo`),
  KEY `fk_ges_secciones_has_ges_perfiles_ges_secciones1_idx` (`ges_menu_men_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_permisos`
--

INSERT INTO `ges_permisos` (`ges_perfiles_per_codigo`, `ges_menu_men_codigo`, `per_C`, `per_R`, `per_U`, `per_D`, `per_DG`, `per_Report`) VALUES
('PER-00001', 'MEN-PPAL-0001', 0, 0, 0, 0, 0, 0),
('PER-03978', 'MEN-PPAL-0001', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00011', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00011', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00012', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00012', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00013', 1, 1, 1, 1, 1, 0),
('PER-00001', 'MEN-PPAL-00014', 1, 1, 1, 1, 1, 0),
('PER-00001', 'MEN-PPAL-00015', 1, 1, 1, 1, 1, 0),
('PER-00001', 'MEN-PPAL-00016', 1, 1, 1, 1, 1, 0),
('PER-00001', 'MEN-PPAL-00017', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00017', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00018', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00018', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00019', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00019', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-0002', 0, 0, 0, 0, 0, 0),
('PER-03978', 'MEN-PPAL-0002', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00020', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00020', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00021', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00021', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00022', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00022', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-0003', 0, 0, 0, 0, 0, 0),
('PER-03978', 'MEN-PPAL-0003', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00045', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00045', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00046', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00046', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00049', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00049', 1, 1, 1, 1, 1, 0),
('PER-00001', 'MEN-PPAL-0005', 0, 0, 0, 0, 0, 0),
('PER-03978', 'MEN-PPAL-0005', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00050', 1, 1, 1, 1, 1, 1),
('PER-03978', 'MEN-PPAL-00050', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00051', 1, 1, 1, 1, 1, 1),
('PER-03978', 'MEN-PPAL-00051', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-0006', 0, 0, 0, 0, 0, 0),
('PER-03978', 'MEN-PPAL-0006', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-0007', 0, 0, 0, 0, 0, 0),
('PER-00001', 'MEN-PPAL-0008', 0, 0, 0, 0, 0, 0),
('PER-00001', 'MEN-PPAL-0009', 1, 1, 1, 1, 1, 0),
('PER-00001', 'MEN-PPAL-00100', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00100', 1, 1, 1, 1, 1, 1),
('PER-00001', 'MEN-PPAL-00101', 1, 1, 1, 1, 1, 0),
('PER-03978', 'MEN-PPAL-00101', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ges_planes`
--

CREATE TABLE IF NOT EXISTS `ges_planes` (
  `pla_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pla_nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pla_color` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `pla_tipo_plan` varchar(255) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Si es fijo, flotante etc',
  `pla_cupo` int(11) NOT NULL COMMENT 'Numero de Sesiones',
  `pla_vigencia` int(11) NOT NULL,
  `pla_tiempo_programar` int(11) NOT NULL COMMENT 'tiempo limite para programar citas luego de facturarlas',
  `pla_tiempo_cancela` varchar(255) COLLATE utf8_spanish_ci NOT NULL COMMENT 'teimpo_minimo_para_cancelar o mover',
  `pla_espacio_citas` varchar(255) COLLATE utf8_spanish_ci NOT NULL COMMENT 'espacio_minimo_entre_citas',
  `pla_citas_x_sem` int(11) NOT NULL COMMENT 'Cantidad máxima citas por semana',
  `pla_utl_x_sem` varchar(2) COLLATE utf8_spanish_ci NOT NULL COMMENT 'conservar_espacio_ultima_semana_para_evitar_mas_programaciones',
  `pla_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pla_fecha_creacion` date NOT NULL,
  `pla_valor` int(11) NOT NULL,
  `pla_valorTotal` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pla_impuesto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pla_descuento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`pla_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_planes`
--

INSERT INTO `ges_planes` (`pla_codigo`, `pla_nombre`, `pla_color`, `pla_tipo_plan`, `pla_cupo`, `pla_vigencia`, `pla_tiempo_programar`, `pla_tiempo_cancela`, `pla_espacio_citas`, `pla_citas_x_sem`, `pla_utl_x_sem`, `pla_autor`, `pla_fecha_creacion`, `pla_valor`, `pla_valorTotal`, `pla_impuesto`, `pla_descuento`) VALUES
('PLA-00001', 'Cortesia', '', 'Fijo', 5, 1, 2, '4', '48', 0, '0', '$ 0', '2015-10-12', 0, '', '', ''),
('PLA-02391', 'Platino - Meses', '', 'Fijo', 8, 30, 2, '4', '48', 0, '0', '250000', '2015-10-12', 250000, '', '', ''),
('PLA-02392', 'Platino - Trimestre', '', 'Fijo', 12, 90, 2, '4', '48', 1, 'SI', 'Guille Valencia', '2015-10-12', 300000, '', '', ''),
('PLA-02393', 'Platino - Semestre', '', '', 28, 180, 2, '4', '48', 1, 'SI', '', '2015-10-12', 329900, '', '', ''),
('PLA-077377', 'Ensayo', '', '', 10, 30, 2, '4', '48', 2, 'SI', '', '2016-02-24', 800000, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ges_planescancelados`
--

CREATE TABLE IF NOT EXISTS `ges_planescancelados` (
  `pcan_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pcan_motivo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pcan_fechacre` date NOT NULL,
  `pcan_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`pcan_codigo`),
  UNIQUE KEY `cli_codigo_2` (`cli_codigo`),
  KEY `cli_codigo` (`cli_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ges_planescongelados`
--

CREATE TABLE IF NOT EXISTS `ges_planescongelados` (
  `pcon_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pcon_fechaini` date NOT NULL,
  `pcon_fechafin` date NOT NULL,
  `pcon_motivos` longtext COLLATE utf8_spanish_ci NOT NULL,
  `pcon_autor` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pcon_fechacre` date NOT NULL,
  PRIMARY KEY (`pcon_codigo`),
  UNIQUE KEY `cli_codigo_2` (`cli_codigo`),
  KEY `cli_codigo` (`cli_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ges_productos`
--

CREATE TABLE IF NOT EXISTS `ges_productos` (
  `prod_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `prod_nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `prod_valor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `prod_observacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `prod_fecha_creacion` date NOT NULL,
  `ges_proveedores_pro_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ges_impuestos_imp_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `prod_descuentos` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0,00',
  `prod_valorTotal` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `obsequio` tinyint(1) NOT NULL,
  PRIMARY KEY (`prod_codigo`),
  KEY `ges_impuestos_imp_codigo` (`ges_impuestos_imp_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_productos`
--

INSERT INTO `ges_productos` (`prod_codigo`, `prod_nombre`, `prod_valor`, `prod_observacion`, `prod_fecha_creacion`, `ges_proveedores_pro_codigo`, `ges_impuestos_imp_codigo`, `prod_descuentos`, `prod_valorTotal`, `obsequio`) VALUES
('PRO-0003', 'Obsequio Toalla', '5000', ' Toalla', '2015-12-09', '', 'IMP-0736312', '100', '0', 1),
('PRO-0004', 'Obsequio Termo', '15000', 'Obsequio Termo', '2015-12-09', '', 'IMP-0736312', '100', '0', 1),
('PRO-0007', 'Obsequio Bolso', '7500', 'Bolso lona', '2016-03-02', '', 'IMP-0279', '100', '0', 1),
('PRO-0309638', 'Shampoo', '16379', '', '2016-03-03', '', 'IMP-0279', '0', '19000', 0),
('PRO-07590211', 'Barra Cereal', '4310', '', '2016-03-12', '', 'IMP-0279', '0', '5000', 0),
('PRO-088235', 'Body slim reductor', '126000', 'Reduce medidas desde la primera puesta ;)', '2016-02-25', '', 'IMP-0279', '0', '150000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ges_proveedores`
--

CREATE TABLE IF NOT EXISTS `ges_proveedores` (
  `pro_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ges_sede_sed_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pro_nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pro_nit` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `pro_representante` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pro_direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pro_pais` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `pro_municipio` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `pro_ciudad` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `pro_email` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `pro_telefono` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `pro_extension` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_fax` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_contacto_directo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `pro_contacto_celular` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `pro_terminos_pago` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pro_observaciones` longtext COLLATE utf8_spanish_ci,
  `pro_fecha_creacion` date NOT NULL,
  `pro_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`pro_codigo`),
  KEY `ges_sede_sed_codigo` (`ges_sede_sed_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ges_retenciones`
--

CREATE TABLE IF NOT EXISTS `ges_retenciones` (
  `ret_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ret_nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ret_tipo_retencion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ret_porcentaje` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ret_descripcion` longtext COLLATE utf8_spanish_ci,
  `ret_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ret_fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`ret_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ges_sedes`
--

CREATE TABLE IF NOT EXISTS `ges_sedes` (
  `sed_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ges_empresa_emp_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `sed_nombre` varchar(218) COLLATE utf8_spanish_ci NOT NULL,
  `sed_telefono` int(30) NOT NULL,
  `sed_email` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sed_direccion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `sed_pais` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `sed_departamento` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `sed_ciudad` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `sed_geoubicacion` longtext COLLATE utf8_spanish_ci,
  `sed_fecha_creacion` date NOT NULL,
  `sed_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `sed_horainicio` time NOT NULL,
  `sed_horacierre` time NOT NULL,
  `ges_bancos_ban_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`sed_codigo`),
  KEY `ges_empresa_emp_codigo` (`ges_empresa_emp_codigo`),
  KEY `ges_empresa_emp_codigo_2` (`ges_empresa_emp_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_sedes`
--

INSERT INTO `ges_sedes` (`sed_codigo`, `ges_empresa_emp_codigo`, `sed_nombre`, `sed_telefono`, `sed_email`, `sed_direccion`, `sed_pais`, `sed_departamento`, `sed_ciudad`, `sed_geoubicacion`, `sed_fecha_creacion`, `sed_autor`, `sed_horainicio`, `sed_horacierre`, `ges_bancos_ban_codigo`) VALUES
('SED-0001', 'EMP-890983815-5', 'Casa Matriz', 3128609, 'asistente.bes@gmail.com', 'Crr 30 Nº 8 B - 25 Oficina 2105', 'Colombia', 'Antioquia', 'Medellín', NULL, '2015-08-01', 'Guillermo León Valencia', '06:00:00', '20:00:00', ''),
('SED-03918843', 'EMP-890983815-5', 'Unicentro Medellin ', 439488292, '', 'Carrera 82 # 78 B 12', 'Colombia', 'Antioquia', 'Medellin', '', '2015-08-01', 'Guillermo León Valencia', '08:00:00', '20:00:00', 'ban-032091'),
('SED-03918844', 'EMP-890983815-5', 'Balsos', 5678903, 'balsos@besmart.com', 'Carrera 56 # 90 10', 'Colombia', 'Antioquia', 'Medellin', '', '2015-08-01', 'Guillermo León Valencia', '08:00:00', '20:00:00', 'ban-032091'),
('SED-03918845', 'EMP-890983815-5', 'Ciudad de Rio', 567834567, 'ciudaddelrio@besmart.com', 'Carrera 89 # 23 g 12', 'Colombia', 'Antioquia', 'Medellin', '', '2015-08-01', 'Guillermo León Valencia', '08:00:00', '20:00:00', 'ban-032091'),
('SED-03918846', 'EMP-890983815-5', 'Del Este', 2567438, 'Unicentro@besmart.com', 'Carrera 89 # 23 g 12', 'Colombia', 'Antioquia', 'Medellin', '', '2015-08-01', 'Guillermo León Valencia', '08:00:00', '20:00:00', 'ban-032091'),
('SED-071020', 'EMP-890983815-5', 'sede pepito perez', 2147483647, 'claudiamile@gmail.com', 'frfwergrg', 'Colombia', 'Antioquia', 'Medellin', '', '2016-02-26', 'Guillermo Valencia', '11:11:10', '12:12:10', '');

-- --------------------------------------------------------

--
-- Table structure for table `ges_traslados`
--

CREATE TABLE IF NOT EXISTS `ges_traslados` (
  `tra_codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cli_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tra_laborigen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tra_labdestino` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tra_motivos` longtext COLLATE utf8_spanish_ci NOT NULL,
  `tra_valor` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Número de sesiones pendientes',
  `tra_estado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tra_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tra_aprobadopor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tra_fechacre` date NOT NULL,
  `tra_comision` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tra_saldofavor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tra_obsequio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tra_codigo`),
  KEY `cli_codigo` (`cli_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_traslados`
--

INSERT INTO `ges_traslados` (`tra_codigo`, `cli_codigo`, `tra_laborigen`, `tra_labdestino`, `tra_motivos`, `tra_valor`, `tra_estado`, `tra_autor`, `tra_aprobadopor`, `tra_fechacre`, `tra_comision`, `tra_saldofavor`, `tra_obsequio`) VALUES
('TRAS-007562', 'CLI-019136', 'Ciudad de Rio', 'SED-03918843', 'Apertura nuevo laboratorio', '$ 329.900', '1', 'Margarita María Alvarez', 'Aprobado por', '2016-03-12', '$ 12.500', '$ 312.400', '$ 5.000'),
('TRAS-02353759', 'CLI-069102', 'Unicentro Medellin ', 'SED-03918845', 'Cambio de vivienda', '$ 250.000', '1', 'Diego Fernando Salazar ', 'Aprobado por', '2016-03-12', '$ 6.000', '$ 236.500', '$ 7.500');

-- --------------------------------------------------------

--
-- Table structure for table `ges_usuarios`
--

CREATE TABLE IF NOT EXISTS `ges_usuarios` (
  `usu_codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ges_perfiles_per_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ges_sede_sed_codigo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `usu_tipodocumento` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `usu_documento` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `usu_nombre` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `usu_apellido_1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usu_apellido_2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_telefono` int(30) NOT NULL,
  `usu_extension` int(30) DEFAULT NULL,
  `usu_movil` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_cargo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_foto` longtext COLLATE utf8_spanish_ci NOT NULL,
  `usu_estado` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `usu_fecha_creacion` date NOT NULL,
  `usu_autor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usu_sexo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`usu_codigo`),
  UNIQUE KEY `usu_documento` (`usu_documento`),
  KEY `fk_ges_usuarios_ges_perfiles1_idx` (`ges_perfiles_per_codigo`),
  KEY `ges_sede_sed_cod` (`ges_sede_sed_codigo`),
  KEY `ges_sede_sed_cod_2` (`ges_sede_sed_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ges_usuarios`
--

INSERT INTO `ges_usuarios` (`usu_codigo`, `ges_perfiles_per_codigo`, `ges_sede_sed_codigo`, `usu_tipodocumento`, `usu_documento`, `usu_nombre`, `usu_apellido_1`, `usu_apellido_2`, `usu_email`, `usu_telefono`, `usu_extension`, `usu_movil`, `usu_cargo`, `usu_foto`, `usu_estado`, `usu_fecha_creacion`, `usu_autor`, `usu_sexo`) VALUES
('USU-001', 'PER-00001', 'SED-0001', 'Cedula', '1037571915', 'Guillermo', 'Valencia', 'Machado', 'guivalen@gmail.com', 4215062, NULL, '3002997730', 'Desarrollador', '', 'Activo', '2016-02-01', '', 'M'),
('USU-003', 'PER-00001', 'SED-03918843', 'Cédula', '1035229067', 'Diego Fernando', 'Salazar ', 'Nanclares', '@', 4444, 106, '310', 'Desarrollador', '', 'Activo', '2016-03-12', 'Diego Salazar', 'M'),
('USU-0052231', 'PER-00001', 'SED-03918845', 'Cedula', '43890456', 'Margarita María', 'Alvarez', 'Tobón', 'mmat@gmail.com', 3623456, 345, '301456780', 'Administradora', '', 'Activo', '2016-03-02', 'Guillermo Valencia', ''),
('USU-04490905', 'PER-03978', 'SED-03918844', 'Cedula', '10173456732', 'Rosa', 'Zapata', '43890456', 'rosa@gmail.com', 2678904, 0, '32167809', 'Administrador', '', 'Activo', '2016-03-03', 'Margarita María Alvarez', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ges_acceso`
--
ALTER TABLE `ges_acceso`
  ADD CONSTRAINT `ges_acceso_ibfk_1` FOREIGN KEY (`ges_usuarios_usu_codigo`) REFERENCES `ges_usuarios` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_agenda`
--
ALTER TABLE `ges_agenda`
  ADD CONSTRAINT `ges_agenda_ibfk_1` FOREIGN KEY (`cli_codigo`) REFERENCES `ges_clientes` (`cli_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ges_agenda_ibfk_2` FOREIGN KEY (`sed_codigo`) REFERENCES `ges_sedes` (`sed_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_clientes`
--
ALTER TABLE `ges_clientes`
  ADD CONSTRAINT `ges_clientes_ibfk_1` FOREIGN KEY (`ges_planes_pla_codigo`) REFERENCES `ges_planes` (`pla_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ges_clientes_ibfk_2` FOREIGN KEY (`ges_sedes_sed_codigo`) REFERENCES `ges_sedes` (`sed_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_detallefactura`
--
ALTER TABLE `ges_detallefactura`
  ADD CONSTRAINT `ges_detallefactura_ibfk_1` FOREIGN KEY (`ges_factura_fac_codigo`) REFERENCES `ges_factura` (`fac_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ges_estudios`
--
ALTER TABLE `ges_estudios`
  ADD CONSTRAINT `ges_estudios_ibfk_1` FOREIGN KEY (`ges_sedes_sed_codigo`) REFERENCES `ges_sedes` (`sed_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_factura`
--
ALTER TABLE `ges_factura`
  ADD CONSTRAINT `ges_factura_ibfk_2` FOREIGN KEY (`ges_usuarios_usu_codigo`) REFERENCES `ges_usuarios` (`usu_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ges_factura_ibfk_3` FOREIGN KEY (`ges_sedes_sed_codigo`) REFERENCES `ges_sedes` (`sed_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_menu`
--
ALTER TABLE `ges_menu`
  ADD CONSTRAINT `ges_menu_ibfk_1` FOREIGN KEY (`ges_paginas_pag_codigo`) REFERENCES `ges_paginas` (`pag_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_numeracion`
--
ALTER TABLE `ges_numeracion`
  ADD CONSTRAINT `ges_numeracion_ibfk_1` FOREIGN KEY (`ges_sedes_sed_codigo`) REFERENCES `ges_sedes` (`sed_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_pagos`
--
ALTER TABLE `ges_pagos`
  ADD CONSTRAINT `ges_pagos_ibfk_1` FOREIGN KEY (`ges_facturas_fac_codigo`) REFERENCES `ges_factura` (`fac_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ges_pagos_ibfk_2` FOREIGN KEY (`ges_formaspago_codigo`) REFERENCES `ges_formas_pago` (`forpag_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ges_permisos`
--
ALTER TABLE `ges_permisos`
  ADD CONSTRAINT `ges_permisos_ibfk_1` FOREIGN KEY (`ges_menu_men_codigo`) REFERENCES `ges_menu` (`men_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ges_permisos_ibfk_2` FOREIGN KEY (`ges_perfiles_per_codigo`) REFERENCES `ges_perfiles` (`per_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_planescancelados`
--
ALTER TABLE `ges_planescancelados`
  ADD CONSTRAINT `ges_planescancelados_ibfk_1` FOREIGN KEY (`cli_codigo`) REFERENCES `ges_clientes` (`cli_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_planescongelados`
--
ALTER TABLE `ges_planescongelados`
  ADD CONSTRAINT `ges_planescongelados_ibfk_1` FOREIGN KEY (`cli_codigo`) REFERENCES `ges_clientes` (`cli_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_productos`
--
ALTER TABLE `ges_productos`
  ADD CONSTRAINT `ges_productos_ibfk_1` FOREIGN KEY (`ges_impuestos_imp_codigo`) REFERENCES `ges_impuestos` (`imp_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_proveedores`
--
ALTER TABLE `ges_proveedores`
  ADD CONSTRAINT `ges_proveedores_ibfk_1` FOREIGN KEY (`ges_sede_sed_codigo`) REFERENCES `ges_sedes` (`sed_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_sedes`
--
ALTER TABLE `ges_sedes`
  ADD CONSTRAINT `ges_sedes_ibfk_1` FOREIGN KEY (`ges_empresa_emp_codigo`) REFERENCES `ges_empresa` (`emp_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_traslados`
--
ALTER TABLE `ges_traslados`
  ADD CONSTRAINT `ges_traslados_ibfk_1` FOREIGN KEY (`cli_codigo`) REFERENCES `ges_clientes` (`cli_codigo`) ON UPDATE CASCADE;

--
-- Constraints for table `ges_usuarios`
--
ALTER TABLE `ges_usuarios`
  ADD CONSTRAINT `fk_ges_usuarios_ges_perfiles1` FOREIGN KEY (`ges_perfiles_per_codigo`) REFERENCES `ges_perfiles` (`per_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ges_usuarios_ibfk_1` FOREIGN KEY (`ges_sede_sed_codigo`) REFERENCES `ges_sedes` (`sed_codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
