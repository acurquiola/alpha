-- phpMyAdmin SQL Dump
-- version 3.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-11-2015 a las 17:47:42
-- Versión del servidor: 5.1.58
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `systat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeropuerto`
--

CREATE TABLE IF NOT EXISTS `aeropuerto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aeropuerto` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concil`
--

CREATE TABLE IF NOT EXISTS `concil` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `encargado` varchar(150) NOT NULL,
  `codbarras` varchar(150) NOT NULL,
  `fVer` varchar(10) NOT NULL,
  `hVer` time NOT NULL,
  `serie` text NOT NULL,
  `codtas` varchar(4) NOT NULL,
  `tiptas` int(4) NOT NULL,
  `valor` float(14,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=1 AUTO_INCREMENT=1934069 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctg_tiposusuario`
--

CREATE TABLE IF NOT EXISTS `ctg_tiposusuario` (
  `id_TipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tx_TipoUsuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_TipoUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `footer`
--

CREATE TABLE IF NOT EXISTS `footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `footer` varchar(200) NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `usuario` varchar(100) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Mensaje de Pie de Página' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_tasas`
--

CREATE TABLE IF NOT EXISTS `lista_tasas` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `opcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `relacion` int(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `codigo_pais` (`relacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasauth`
--

CREATE TABLE IF NOT EXISTS `tasauth` (
  `idNombre` varchar(100) NOT NULL COMMENT 'Nombre del Usuario',
  `idUsuario` varchar(15) NOT NULL,
  `idPass` varchar(100) NOT NULL,
  `idTipo` varchar(10) NOT NULL,
  `Activo` varchar(1) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tascierre`
--

CREATE TABLE IF NOT EXISTS `tascierre` (
  `fcierre` date NOT NULL,
  `hcierre` time NOT NULL,
  `monto` varchar(12) NOT NULL,
  `encargado` varchar(150) NOT NULL,
  `observacion` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tatasas`
--

CREATE TABLE IF NOT EXISTS `tatasas` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `codtas` int(12) NOT NULL,
  `serie` varchar(3) NOT NULL,
  `femision` varchar(10) NOT NULL,
  `hemision` time NOT NULL,
  `tiptas` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL,
  `encargado` varchar(150) NOT NULL,
  `codbarras` varchar(150) NOT NULL,
  `fVer` varchar(10) NOT NULL,
  `hVer` time NOT NULL,
  `valor` float(14,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=3278894 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tx_nombre` varchar(100) NOT NULL COMMENT 'Nombre del Usuario',
  `tx_nombre_2` varchar(100) NOT NULL,
  `tx_apellidoPaterno` varchar(50) NOT NULL,
  `tx_apellidoMaterno` varchar(50) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `tx_username` varchar(100) NOT NULL,
  `tx_password` varchar(100) NOT NULL,
  `id_TipoUsuario` varchar(10) NOT NULL,
  `tx_correo` varchar(250) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `Activo` varchar(1) NOT NULL,
  `aeropuerto` varchar(100) NOT NULL,
  `oficina` varchar(100) NOT NULL,
  `dt_registro` date NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiptas`
--

CREATE TABLE IF NOT EXISTS `tiptas` (
  `id` varchar(4) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `monto` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tope`
--

CREATE TABLE IF NOT EXISTS `tope` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ruta_imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `status` int(1) NOT NULL,
  `aeropuerto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
