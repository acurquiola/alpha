-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2015 a las 23:00:43
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `saar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeronaves`
--

CREATE TABLE IF NOT EXISTS `aeronaves` (
`id` int(10) unsigned NOT NULL,
  `matricula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidad_id` int(10) unsigned NOT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  `modelo_id` int(10) unsigned NOT NULL,
  `peso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_id` int(10) unsigned DEFAULT NULL,
  `hangar_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `aeronaves`
--

INSERT INTO `aeronaves` (`id`, `matricula`, `nacionalidad_id`, `tipo_id`, `modelo_id`, `peso`, `cliente_id`, `hangar_id`, `created_at`, `updated_at`) VALUES
(2, 'YV-1381', 246, 3, 71, '55000', 124, NULL, '2015-09-09 03:44:47', '2015-09-09 03:44:47'),
(3, 'YV-380T', 246, 3, 71, '53000', 124, NULL, '2015-09-09 03:45:36', '2015-09-09 03:45:36'),
(4, 'YV-390T', 246, 3, 71, '53000', 124, NULL, '2015-09-09 03:46:26', '2015-12-08 03:50:41'),
(5, 'YV-137T', 246, 3, 233, '54488', 13, NULL, '2015-09-11 17:55:38', '2015-09-11 17:55:38'),
(6, 'YV-2992', 246, 3, 362, '64000', 13, NULL, '2015-09-11 17:56:35', '2015-09-11 17:56:35'),
(7, 'YV-505T', 246, 3, 362, '61009', 13, NULL, '2015-09-11 17:57:45', '2015-09-11 17:57:45'),
(8, 'YV-2957', 246, 3, 362, '61009', 13, NULL, '2015-09-11 17:58:50', '2015-09-11 17:58:50'),
(9, 'YV-539T', 246, 3, 363, '72000', 40, NULL, '2015-09-11 18:18:29', '2015-09-11 18:18:29'),
(10, 'YV-481T', 246, 3, 363, '72576', 40, NULL, '2015-09-11 18:21:07', '2015-09-11 18:21:07'),
(11, 'YV-485T', 246, 3, 363, '72576', 40, NULL, '2015-09-11 18:22:16', '2015-09-11 18:22:16'),
(12, 'YV-348T', 246, 3, 361, '67813', 40, NULL, '2015-09-11 19:04:54', '2015-09-11 19:04:54'),
(13, 'YV-494T', 246, 3, 362, '66679', 40, NULL, '2015-09-11 19:09:08', '2015-09-11 19:09:08'),
(14, 'YV-3024', 246, 3, 363, '72000', 40, NULL, '2015-09-11 19:10:02', '2015-09-11 19:10:02'),
(15, 'YV-2990', 246, 3, 363, '72000', 40, NULL, '2015-09-11 19:10:47', '2015-09-11 19:10:47'),
(16, 'YV-2971', 246, 3, 363, '64000', 40, NULL, '2015-09-11 19:11:41', '2015-09-11 19:11:41'),
(17, 'YV-153T', 246, 3, 362, '64000', 40, NULL, '2015-09-11 19:13:27', '2015-09-11 19:13:27'),
(18, 'YV-2754', 246, 3, 362, '67813', 40, NULL, '2015-09-11 19:17:58', '2015-09-11 19:17:58'),
(19, 'YV-2749', 246, 3, 361, '67813', 40, NULL, '2015-09-11 19:19:47', '2015-09-11 19:19:47'),
(20, 'YV-1019', 246, 2, 313, '5000', 139, 28, '2015-09-12 01:28:09', '2015-09-12 01:28:09'),
(21, 'YV-1116', 246, 2, 313, '5000', 139, 28, '2015-09-12 01:31:50', '2015-09-12 01:31:50'),
(22, 'N-429PL', 89, 1, 102, '6000', 68, 2, '2015-09-12 01:34:22', '2015-09-12 01:34:22'),
(23, 'N-16LJ', 89, 1, 328, '10000', 130, NULL, '2015-09-12 01:36:50', '2015-09-12 01:36:50'),
(24, 'YV-1024', 246, 2, 122, '1000', 125, 38, '2015-09-12 01:39:39', '2015-09-12 01:39:40'),
(25, 'YV-2021', 246, 1, 440, '7000', 24, NULL, '2015-09-12 01:41:08', '2015-12-08 05:49:45'),
(26, 'YV-2456', 246, 2, 313, '5000', 139, NULL, '2015-09-12 01:42:07', '2015-09-12 01:42:07'),
(27, 'YV-2272', 246, 2, 313, '5000', 139, 28, '2015-09-12 01:42:55', '2015-09-12 01:42:55'),
(28, 'YV-2536', 246, 2, 313, '5000', 139, 28, '2015-09-12 01:44:27', '2015-09-12 01:44:27'),
(29, 'YV-1007', 246, 3, 74, '57000', 63, NULL, '2015-09-15 02:07:16', '2015-09-15 02:07:16'),
(30, 'YV-2556', 246, 3, 74, '57000', 63, NULL, '2015-09-15 02:08:00', '2015-09-15 02:08:00'),
(31, 'YV-2558', 246, 3, 71, '53000', 63, NULL, '2015-09-15 02:08:51', '2015-09-15 02:08:51'),
(32, 'YV-2559', 246, 3, 71, '53000', 63, NULL, '2015-09-15 02:09:47', '2015-09-15 02:09:47'),
(33, 'YV-1111', 246, 3, 200, '21000', 63, NULL, '2015-09-15 02:11:01', '2015-09-15 02:11:01'),
(34, 'YV-1115', 246, 3, 200, '21000', 63, NULL, '2015-09-15 02:11:37', '2015-09-15 02:11:37'),
(35, 'YV-2088', 246, 3, 200, '21000', 63, NULL, '2015-09-15 02:12:33', '2015-09-15 02:12:33'),
(36, 'YV-2115', 246, 3, 200, '21000', 63, NULL, '2015-09-15 02:16:25', '2015-09-15 02:16:25'),
(37, 'YV-2849', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:21:23', '2015-09-15 02:21:23'),
(38, 'YV-2850', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:22:54', '2015-09-15 02:22:54'),
(39, 'YV-2851', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:28:22', '2015-09-15 02:28:22'),
(40, 'YV-2911', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:29:02', '2015-09-15 02:29:02'),
(41, 'YV-2912', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:30:17', '2015-09-15 02:30:17'),
(42, 'YV-2913', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:50:03', '2015-09-15 02:50:03'),
(43, 'YV-2943', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:51:03', '2015-09-15 02:51:03'),
(44, 'YV-2944', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:52:03', '2015-09-15 02:52:03'),
(45, 'YV-2953', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:52:36', '2015-09-15 02:52:36'),
(46, 'YV-2954', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:53:35', '2015-09-15 02:53:35'),
(47, 'YV-2964', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:54:16', '2015-09-15 02:54:16'),
(48, 'YV-2965', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:55:00', '2015-09-15 02:55:00'),
(49, 'YV-2966', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:55:49', '2015-09-15 02:55:49'),
(50, 'YV-3052', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:56:27', '2015-09-15 02:56:27'),
(51, 'YV-3071', 246, 3, 253, '51800', 63, NULL, '2015-09-15 02:56:58', '2015-09-15 02:56:58'),
(52, 'YV-1234', 246, 4, 327, '9752', NULL, NULL, '2015-12-08 03:52:12', '2015-12-08 03:52:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeropuertos`
--

CREATE TABLE IF NOT EXISTS `aeropuertos` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `aeropuertos`
--

INSERT INTO `aeropuertos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'PZO', '2015-07-31 12:44:28', '2015-07-31 12:44:28'),
(2, 'CBL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'SEU', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajustes`
--

CREATE TABLE IF NOT EXISTS `ajustes` (
`id` int(10) unsigned NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `cobro_id` int(10) unsigned NOT NULL,
  `monto` double(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aterrizajes`
--

CREATE TABLE IF NOT EXISTS `aterrizajes` (
`id` int(10) unsigned NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `aeropuerto_id` int(11) unsigned NOT NULL,
  `aeronave_id` int(10) unsigned NOT NULL,
  `cliente_id` int(10) unsigned DEFAULT NULL,
  `tipoMatricula_id` int(10) unsigned NOT NULL,
  `nacionalidadVuelo_id` int(10) unsigned DEFAULT NULL,
  `piloto_id` int(10) unsigned DEFAULT NULL,
  `num_vuelo` int(11) DEFAULT NULL,
  `puerto_id` int(10) unsigned DEFAULT NULL,
  `desembarqueAdultos` int(11) NOT NULL DEFAULT '0',
  `desembarqueInfante` int(11) NOT NULL DEFAULT '0',
  `desembarqueTercera` int(11) NOT NULL DEFAULT '0',
  `desembarqueTransito` int(11) NOT NULL DEFAULT '0',
  `despego` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `aterrizajes`
--

INSERT INTO `aterrizajes` (`id`, `hora`, `fecha`, `aeropuerto_id`, `aeronave_id`, `cliente_id`, `tipoMatricula_id`, `nacionalidadVuelo_id`, `piloto_id`, `num_vuelo`, `puerto_id`, `desembarqueAdultos`, `desembarqueInfante`, `desembarqueTercera`, `desembarqueTransito`, `despego`, `created_at`, `updated_at`) VALUES
(32, '21:05:00', '2015-12-03', 0, 14, 40, 3, 1, 7, 747, 3, 140, 4, 3, 3, 1, '2015-12-08 04:12:52', '2015-12-08 04:20:27'),
(33, '00:10:00', '2015-12-03', 0, 2, 124, 3, 1, 9, 803, 4, 68, 2, 5, 0, 1, '2015-12-08 04:15:13', '2015-12-08 04:21:59'),
(34, '18:38:00', '2015-12-03', 0, 25, 24, 1, 1, 31, 0, 5, 2, 0, 0, 0, 1, '2015-12-08 04:17:18', '2015-12-08 04:23:13'),
(35, '00:53:39', '2015-12-06', 0, 6, 13, 3, 1, 8, 123, 4, 124, 5, 3, 0, 1, '2015-12-08 05:54:00', '2015-12-08 05:54:32'),
(36, '20:55:51', '2015-12-07', 0, 6, 13, 3, 2, 6, 1234, 1, 35, 2, 0, 0, 0, '2015-12-08 05:56:06', '2015-12-08 05:56:06'),
(37, '04:50:44', '2015-12-08', 0, 7, 13, 3, 1, 10, 123, 3, 120, 1, 2, 5, 1, '2015-12-08 13:51:06', '2015-12-08 13:52:05'),
(38, '15:43:06', '2015-12-08', 0, 3, 124, 3, 1, 8, 420, 3, 15, 15, 15, 0, 0, '2015-12-09 00:43:32', '2015-12-09 00:43:32'),
(39, '15:54:21', '2015-12-08', 0, 23, 130, 1, 1, 17, 0, 4, 3, 0, 0, 0, 1, '2015-12-09 00:54:49', '2015-12-09 01:29:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
`id` int(10) unsigned NOT NULL,
  `nombre` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Caroni', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Venezuela', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancoscuentas`
--

CREATE TABLE IF NOT EXISTS `bancoscuentas` (
`id` int(10) unsigned NOT NULL,
  `descripcion` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `isActivo` tinyint(1) NOT NULL,
  `banco_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `bancoscuentas`
--

INSERT INTO `bancoscuentas` (`id`, `descripcion`, `isActivo`, `banco_id`, `created_at`, `updated_at`) VALUES
(1, '11111111111111111', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '22222222222222222222', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargas`
--

CREATE TABLE IF NOT EXISTS `cargas` (
`id` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `aeronave_id` int(10) unsigned NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `num_vuelo` int(11) DEFAULT NULL,
  `peso_embarcado` double(8,2) NOT NULL,
  `peso_desembarcado` double(8,2) NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monto_total` double(8,2) NOT NULL,
  `precio_carga` int(10) unsigned NOT NULL,
  `facturado` int(11) NOT NULL DEFAULT '0',
  `condicionPago` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `factura_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cargas`
--

INSERT INTO `cargas` (`id`, `fecha`, `cliente_id`, `aeronave_id`, `aeropuerto_id`, `num_vuelo`, `peso_embarcado`, `peso_desembarcado`, `observaciones`, `monto_total`, `precio_carga`, `facturado`, `condicionPago`, `factura_id`, `created_at`, `updated_at`) VALUES
(1, '0000-00-00', 4, 5, 1, 432, 123.00, 999999.99, '', 999999.99, 0, 0, 'Crédito', 0, '2015-12-08 09:58:15', '2015-11-30 04:30:47'),
(2, '2015-11-30', 8, 4, 1, 323, 1212.00, 424323.00, '', 638302.50, 0, 0, 'Crédito', 19, '2015-12-08 09:58:15', '2015-12-08 02:34:49'),
(3, '2015-11-30', 8, 4, 1, 323, 1212.00, 424323.00, '', 638302.50, 0, 0, 'Crédito', 0, '2015-12-08 09:58:15', '2015-11-30 04:39:36'),
(4, '2015-11-30', 10, 5, 1, 211, 232.00, 323.00, '', 832.50, 0, 0, 'Crédito', 0, '2015-12-08 09:58:15', '2015-11-30 04:43:57'),
(5, '2015-12-08', 4, 5, 0, 123, 11.00, 11.00, '', 33.00, 0, 0, 'Contado', 0, '2015-12-08 18:58:47', '2015-12-08 18:58:47'),
(6, '2015-12-08', 13, 6, 0, 425, 150.00, 1500.00, '', 2475.00, 0, 0, 'Crédito', 25, '2015-12-08 21:56:51', '2015-12-09 02:26:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Cargo 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos_varios`
--

CREATE TABLE IF NOT EXISTS `cargos_varios` (
`id` int(10) unsigned NOT NULL,
  `eq_formulario` double(8,2) NOT NULL,
  `eq_derechoHabilitacion` double(8,2) NOT NULL,
  `eq_usoAbordajeSinHab` double(8,2) NOT NULL,
  `eq_usoAbordajeConHab` double(8,2) NOT NULL,
  `formularioCredito_id` int(10) unsigned NOT NULL,
  `formularioContado_id` int(10) unsigned NOT NULL,
  `habilitacionCredito_id` int(10) unsigned NOT NULL,
  `habilitacionContado_id` int(10) unsigned NOT NULL,
  `abordajeCredito_id` int(10) unsigned NOT NULL,
  `abordajeContado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cargos_varios`
--

INSERT INTO `cargos_varios` (`id`, `eq_formulario`, `eq_derechoHabilitacion`, `eq_usoAbordajeSinHab`, `eq_usoAbordajeConHab`, `formularioCredito_id`, `formularioContado_id`, `habilitacionCredito_id`, `habilitacionContado_id`, `abordajeCredito_id`, `abordajeContado_id`, `created_at`, `updated_at`) VALUES
(1, 0.14, 14.00, 5.14, 5.71, 71, 57, 70, 56, 72, 58, '0000-00-00 00:00:00', '2015-12-08 06:27:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(10) unsigned NOT NULL,
  `codigo` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `cedRifPrefix` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedRif` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nit` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('Aeronáutico','No Aeronáutico','Mixto') COLLATE utf8_unicode_ci NOT NULL,
  `isActivo` tinyint(1) NOT NULL,
  `isEnvioAutomatico` tinyint(1) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci,
  `ciudad` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais_id` int(10) unsigned NOT NULL,
  `codpostal` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefonos` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsable` char(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` char(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `limiteCredito` double(8,2) DEFAULT NULL,
  `diasCredito` double(8,2) DEFAULT NULL,
  `prontoPago` double(8,2) DEFAULT NULL,
  `descTasa` double(8,2) DEFAULT NULL,
  `isContribuyente` tinyint(1) NOT NULL,
  `islrpercentage` double(8,2) DEFAULT NULL,
  `ivapercentage` double(8,2) DEFAULT NULL,
  `comentario` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=149 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `codigo`, `cedRifPrefix`, `cedRif`, `nit`, `nombre`, `tipo`, `isActivo`, `isEnvioAutomatico`, `fechaIngreso`, `direccion`, `ciudad`, `pais_id`, `codpostal`, `telefonos`, `fax`, `responsable`, `email`, `web`, `limiteCredito`, `diasCredito`, `prontoPago`, `descTasa`, `isContribuyente`, `islrpercentage`, `ivapercentage`, `comentario`, `created_at`, `updated_at`) VALUES
(1, '1276', 'J', '297288945', '', 'EL TEKEÑAZO, C.A.', 'No Aeronáutico', 0, 0, '2009-08-31', 'CALLE RUBIO CASA NRO. B-12 URB CAMPO A-2 DE LA FERROMINERA  PTO', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-08-31 04:30:00', '0000-00-00 00:00:00'),
(2, '0222', 'J', '001428860', '', 'ACO ALQUILER S A', 'No Aeronáutico', 0, 0, '2013-07-01', 'AV 1RA AV SUR ALTAMIRA EDIF SAN LUIS PISO PB LOCAL 1 Y 2  URB EL DORADO', 'CARACAS', 232, '1073', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2013-07-01 04:30:00', '0000-00-00 00:00:00'),
(3, '0068', 'J', '002629134', '3077691', 'AEREO TRANSPORTE LA MONTAÑA', 'Aeronáutico', 0, 0, '2005-11-22', 'AV. LOS MANGOS 3ERA TRANVERSAL QUINTA CABRINI. DISTRITO FEDERAL', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-22 04:30:00', '0000-00-00 00:00:00'),
(4, '1382', 'J', '307759380', '', 'AERO 1069 C.A.', 'Aeronáutico', 0, 0, '2012-01-24', 'CALLE REAL EDIFICIO OCAMZA, PISO 1, OFICINA 38, VALLE LA PASCUA, ESTADO GUARICO.', 'VALLE LA PASCUA', 232, '', '0212- 2003511', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-01-24 04:30:00', '0000-00-00 00:00:00'),
(5, '1283', 'J', '305331510', '', 'AERO CENTRO DE SERVICIOS CARONI, C.A.', 'No Aeronáutico', 0, 0, '2009-10-22', 'AEROPUERTO INTERNACIONAL MANUEL CARLOS PIAR.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-10-22 04:30:00', '0000-00-00 00:00:00'),
(6, '1417', 'J', '401020216', '', 'AERO EJECUTIVOS GUAYANA, C.A.', 'Aeronáutico', 0, 0, '2012-08-28', 'AV. GUAYANA LOCAL AEROCLUB CARONI HANGAR 14-B NRO MZ SECTOR PUERTO ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-08-28 04:30:00', '0000-00-00 00:00:00'),
(7, '0001', 'J', '303574408', '', 'AEROCLUB CARONI', 'Mixto', 0, 0, '2005-11-16', 'AEROPUERTO INTERNACIONAL  DEL ORINOCO MANUEL  PIAR.  PUERTO  ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(8, '1356', 'J', '309810634', '', 'AEROCOPTER C.A.', 'Aeronáutico', 0, 0, '2011-09-23', 'CARRETERA  NACIONAL AL CALLAO, RN1 SECTOR LA FRONTERA,  TUMEREMO, ESTADO BOLIVAR.', 'CIUDAD GUAYANA', 232, '8050', '0288-7711635', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-09-23 04:30:00', '0000-00-00 00:00:00'),
(9, '0122', 'J', '297314628', '', 'AEROCOSMETIC, COMPAÑIA ANONIMA', 'No Aeronáutico', 0, 0, '2009-07-10', 'VDA AVENIDA GUAYANA  EDIF AEROPUERTO INTERNACIONAL CARLOS MANUEL PIAR PISO NIVEL PLANTA BAJA LOCAL PLA.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-07-10 04:30:00', '0000-00-00 00:00:00'),
(10, '1375', 'J', '309342428', '', 'AEROECOM, C.A.', 'Aeronáutico', 0, 0, '2011-11-15', 'AV. FRANCISCO DE MIRANDA  TORRE LA PRIMERA PISO 3 OFIC.381. CARACAS.', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-11-15 04:30:00', '0000-00-00 00:00:00'),
(11, '1425', 'J', '307376236', '', 'AEROGUAPARO, C.A.', 'Aeronáutico', 0, 0, '2012-10-19', 'VALENCIA - ESTADO CARABOBO.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-10-19 04:30:00', '0000-00-00 00:00:00'),
(12, '0082', 'J', '001531297', '', 'AEROPANAMERICANO, C.A', 'Aeronáutico', 0, 0, '2006-02-15', 'AV. TERESA  DE  LA  PARRA  ED. SERPAPROCA  STA.  MONICADTO. FEDERAL', 'CARACAS', 232, '1041', '0286-9511552', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-02-15 04:30:00', '0000-00-00 00:00:00'),
(13, '0004', 'J', '303994911', '81984700', 'AEROPOSTAL ALAS DE VENEZUELA,  C.A.', 'Aeronáutico', 0, 0, '2005-11-16', 'AV. PASEO COLON, URB. LOS CAOBOS , PLAZA  VENEZUELA, TORRE POLAR OESTE.  PISOS 21, 22 Y 23  CARACAS', 'CARACAS', 232, '', '0212-7086211 /7826323', '0212-9510100', NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(14, '1338', 'J', '299707554', '', 'AEROPULLMAN 01, C.A.', 'Aeronáutico', 0, 0, '2011-05-25', 'HANGAR  Nº 129, AEROPUERTO CARACAS, VENEZUELA.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-05-25 04:30:00', '0000-00-00 00:00:00'),
(15, '1400', 'J', '306900926', '', 'AEROQUEST C.A .', 'Aeronáutico', 0, 0, '2012-05-15', 'CARACAS - VENEZUELA.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-05-15 04:30:00', '0000-00-00 00:00:00'),
(16, '0100', 'J', '314755250', '', 'AEROSERVICIO GUAYANA. R.L.', 'No Aeronáutico', 0, 0, '2007-08-13', 'AV. GUAYANA URB. UNARE II, SECTOR II. AEROPUERTO MANUEL CARLOS PIAR. PTO. ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2007-08-13 04:30:00', '0000-00-00 00:00:00'),
(17, '2273', 'J', '402999690', '', 'AEROSERVICIOS SKYPPER, C.A.', 'Aeronáutico', 0, 0, '2013-11-29', 'CARACAS - VENEZUELA.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2013-11-29 04:30:00', '0000-00-00 00:00:00'),
(18, '0003', 'J', '000652821', '42518220', 'AGENCIA DE VIAJES OMEGA, C.A', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV. FRANCISCO  DE  MIRANDA.  PARQUE  CRISTAL. TORRE  OESTE. PISO 1. OFICINA 5  CARACAS', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(19, '0002', 'J', '095053180', '4821297', 'AGENCIA DE VIAJES Y TURISMO DON VICTOR, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'CENTRO COMERCIAL CERVEZA ZULIA, LOCAL Nº 21. ALTA VISTA. PUERTO ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(20, '0053', 'J', '300700429', '25119754', 'AGENCIA DE VIAJES Y TURISMO GIORGIO, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'CALLE GUASDUALITO. EDIF. GIORGIO LOCAL Nº 1 Y 2. CIUDAD OJEDA. EDO. ZULIA', 'CIUDAD OJEDA', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(21, '1360', 'J', '317395611', '', 'AGENCIA PLUS DIGITAL, C.A', 'No Aeronáutico', 0, 0, '2011-09-29', 'C.C. ORINOKIA MALL, PLAZA SANTO TOME IV - SEGUNDO PISO - LOCAL P2-09 PUERTO ORDAZ, ESTADO BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '0286 - 9221534', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-09-29 04:30:00', '0000-00-00 00:00:00'),
(22, '2272', 'J', '402950039', '', 'AIR RORAIMA C.A.', 'Aeronáutico', 0, 0, '2013-10-24', 'CR  CIUDAD PIAR EDIF. UPATA PISO 2 OF 2, SECTOR PUERTO ORDAZ, CIUDAD GUAYANA. BOLIVAR.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2013-10-24 04:30:00', '0000-00-00 00:00:00'),
(23, '1336', 'J', '312162805', '', 'AIR WAY SERVICES & SUPPORT A.S & S, C.A.', 'Aeronáutico', 0, 0, '2011-05-25', 'AV.31 DE JULIO, CCT PLAZA LM-3, LOMA DE GUERRA , NUEVA ESPARTA.', 'NUEVA ESPARTA', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-05-25 04:30:00', '0000-00-00 00:00:00'),
(24, '0088', 'J', '313379344', '', 'ALAS DE GUAYANA', 'Aeronáutico', 0, 0, '2006-04-07', 'CARACAS - DISTRITO CAPITAL.', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-04-07 04:30:00', '0000-00-00 00:00:00'),
(25, '0105', 'J', '305519501', '', 'ALBATROS VIAJES Y TURISMO C.A.', 'No Aeronáutico', 0, 0, '2008-04-17', 'AV. LAS AMERICAS EDIF. TORRE LORETO II PISO PB LOCAL PN2-05 PUERTO ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2008-04-17 04:30:00', '0000-00-00 00:00:00'),
(26, '1395', 'J', '297979751', '', 'ALC AVIATION, C.A .', 'Aeronáutico', 0, 0, '2012-03-12', 'CARACAS - DISTRITO CAPITAL.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-03-12 04:30:00', '0000-00-00 00:00:00'),
(27, '1277', 'J', '305879400', '', 'ALFA CENTER, C.A.', 'No Aeronáutico', 0, 0, '2009-09-08', 'AV. MONTILLA CON CALLE CAMEJO EDIF. CENTRO EMPRESARIAL QUERO SILVA  PISO 1 LOCAL 7 Y 8 SECTOR CENTRO, B.', 'BARINAS', 232, '5201', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-09-08 04:30:00', '0000-00-00 00:00:00'),
(28, 'D314', 'J', '295366809', '', 'ALIANZA GLANCELOT, C.A.', 'Aeronáutico', 0, 0, '2010-09-30', 'MARACAY -  ESTADO ARAGUA.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2010-09-30 04:30:00', '0000-00-00 00:00:00'),
(29, '0005', 'J', '302242401', '', 'ALMACENADORA CARONI, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'CALLE NEVERI 284-09-04 ZONA INDUSTRIAL UNARE I, PUERTO ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(30, '1371', 'J', '317142071', '', 'AMC AVIATION CONSULT C.A.', 'Aeronáutico', 0, 0, '2011-11-09', 'CALLE EDIFICIO AEROPUERTO CARACAS, CHARALLAVE EDIFICIO FASA PISO 1 OFICINA UNICA, ESTADO MIRANDA.', 'CHARALLAVE', 232, '1215', '0212- 2664090', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-11-09 04:30:00', '0000-00-00 00:00:00'),
(31, '0102', 'J', '304138032', '', 'AMERIJET INTERNACIONAL INC, LINEA AEREA, C.A', 'Aeronáutico', 0, 0, '2007-11-28', 'AV. DON MANUEL  BELLOSO EDIF. AEROPUERTO INTERNACIONAL  LA CHINITA  PISO PB OF ZONA DE CARGA SECTOR PALIT MARACAIBO ESTADO ZULIA', 'MARACAIBO', 232, '4001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2007-11-28 04:30:00', '0000-00-00 00:00:00'),
(32, '2284', 'V', '11972122', '', 'ANDRES FERNANDEZ', 'Aeronáutico', 0, 0, '2014-10-28', 'PUERTO ORDAZ - ESTADO BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-10-28 04:30:00', '0000-00-00 00:00:00'),
(33, '1387', 'V', '8546834', '', 'ANTONIO ROJAS SUAREZ.', 'Aeronáutico', 0, 0, '2012-01-24', 'PUERTO ORDAZ - ESTADO BOLIVAR.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-01-24 04:30:00', '0000-00-00 00:00:00'),
(34, '1419', 'J', '307211741', '', 'ARCADE CORPORATION, C.A.', 'Aeronáutico', 0, 0, '2012-09-07', 'AVENIDA FRANCISCO DE MIRANDA CC LIDO PISO 7 OFICINA 70-A, URBANIZACIÓN EL ROSAL , CARACAS.', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-09-07 04:30:00', '0000-00-00 00:00:00'),
(35, '0007', 'V', '041405500', '', 'ARTESANIA  SHURUATA', 'No Aeronáutico', 0, 0, '2005-11-16', 'AEROPUERTO DE CIUDAD GUAYANA. PUERTO ORDAZ. EDO BOLIVAR.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(36, '0008', 'J', '095069630', '2729652', 'ARTESANIA Y REGALOS YURUARI, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV.  GUAYANA  ZONA I NDUSTRIAL   AEROPUERTO  INTERNACIONAL  DEL  ORINOCO  CARLOS  MANUEL   PIAR   P.B.  LOCAL  5  PUERTO  ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(37, '2281', 'J', '403301999', '', 'ARTESANIAS AUTOCTONAS SHURUATA,C.A', 'No Aeronáutico', 0, 0, '2014-10-06', 'AV GUAYANA LOCAL AEROPUERTO INTERNACIONAL DEL ORINOCO MANUEL CARLOS PIAR  NRO4 SECTOR UNARE, PUERTO ORDAZ CIUDAD GUAYANA BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-10-06 04:30:00', '0000-00-00 00:00:00'),
(38, '0006', 'V', '089464435', '', 'ARTESANIAS CARONI GALETTI', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV. GUAYANA. AEROPUERTO INTERNACIONAL. MANUEL PIAR. LOCAL Nº 1. PUERTO ORDAZ. EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(39, '0055', 'J', '303607322', '5789320', 'ARTESANIAS EL ORFEBRE', 'No Aeronáutico', 0, 0, '2005-11-18', 'AV. JESUS SOTO CIUDAD BOLIVAR. EDO. BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-18 04:30:00', '0000-00-00 00:00:00'),
(40, '0009', 'J', '075035593', '15355522', 'ASERCA AIRLINES, C.A.', 'Aeronáutico', 0, 0, '2005-11-16', 'AV. ANDRES  ELOY  BLANCO. C/C CALLE 137-C URB. PREBO -1 EDIFICIO ASERCA AIRLINES  VALENCIA. EDO. CARABOBO.', 'VALENCIA', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(41, '0126', 'J', '294032486', '', 'ASOC COOPERATIVA TAXIS AEROPUERTO TOMAS DE HERES RL', 'No Aeronáutico', 0, 0, '2009-07-15', 'CIUDAD BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-07-15 04:30:00', '0000-00-00 00:00:00'),
(42, '1389', 'J', '312585773', '', 'ASOC. COOP. LIDEM SERVICIOS 061, R.L', 'No Aeronáutico', 0, 0, '2012-01-26', 'CARRERA NEKUIMA, TORRE NEKUIMA PISO # 2 OFICINA # 27,  ALTA VISTA PUERTO ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-01-26 04:30:00', '0000-00-00 00:00:00'),
(43, '1324', 'J', '003192252', '', 'AUTO SIETE VEINTISIETE C.A.', 'No Aeronáutico', 0, 0, '2011-01-28', 'CALLE CARABOBO QTA NRO 727 URB EL ROSAL', '', 232, '1060', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-01-28 04:30:00', '0000-00-00 00:00:00'),
(44, '0011', 'J', '304942265', '', 'AVIACION CUYUNI C.A.', 'Mixto', 0, 0, '2005-11-16', 'AEROPUERTO INTERNACIONAL MANUEL CARLOS PIAR. PUERTO ORDAZ. EDO. BOLIVAR.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(45, '0012', 'J', '302097843', '', 'AVIOR AIRLINES, C.A.', 'Aeronáutico', 0, 0, '2005-11-16', 'AV. 4 DE MAYO SECTOR GENOVES EDIF. RESD. ORTEGA PLANTA BAJA LOCAL 1. NUEVA ESPARTA.', 'PORLAMAR', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(46, '0013', 'V', '126452442', '263356802', 'BAGAJES  GILBERT', 'No Aeronáutico', 0, 0, '2005-11-16', 'URB.  LA  FLORESTA  EDIFICIO  LA  CEIBA.  APTO  2. C.  CARRERA  RUBIO.  PUERTO ORDAZ.  EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(47, '0090', 'J', '000029679', '52524237', 'BANCO   PROVINCIAL , S.A.  BANCO  UNIVERSAL', 'No Aeronáutico', 0, 0, '2006-05-08', 'AV.   VOLLMER  CON   AV.  ESTE  O  URB.  SAN  BERNARDINO ,   CENTRO  FINANCIERO  PROVINCIAL,  CARACAS', 'CARACAS', 232, '1010', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-05-08 04:30:00', '0000-00-00 00:00:00'),
(48, '0084', 'J', '095048551', '', 'BANCO CARONI, C.A, BANCO UNIVERSAL', 'Aeronáutico', 0, 0, '2006-02-22', 'AVENIDA UNIVERSIDAD, EDIFICIO BANCO CARONI, CARACAS', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-02-22 04:30:00', '0000-00-00 00:00:00'),
(49, '1394', 'G', '200078588', '', 'BANCO DEL PUEBLO SOBERANO C.A. BANCO DE DESARROLLO', 'No Aeronáutico', 0, 0, '2012-03-09', 'CALLE ANDRES ELOY BLANCO EDIF. GALLO DE ORO PISO MEZZANINA OF. MEZZANINA SECTOR CATEDRAL', 'CARACAS', 232, '1010', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-03-09 04:30:00', '0000-00-00 00:00:00'),
(50, '2278', 'J', '299788627', '', 'BIENES RAICES 286,C.A', 'No Aeronáutico', 0, 0, '2014-08-08', 'AV LAS AMERICAS CC LORETO II MEZANINA LOCAL NRO 27 SECTOR CENTRO PUERTO ORDAZ CIUDAD GUAYANA BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-08-08 04:30:00', '0000-00-00 00:00:00'),
(51, '0095', 'G', '200051434', '', 'C.V.G. TELECOMUNIC ACIONES,  C.A.', 'No Aeronáutico', 0, 0, '2007-03-13', 'VIA COLOMBIA  VIA COLOMBIA TORRE  LORETO II PISO 2', 'CIUDAD GUAYANA', 232, '8050', '0212-9501321 / 9501323', NULL, NULL, 'jsoto@cvgtelecom.com.ve', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2007-03-13 04:30:00', '0000-00-00 00:00:00'),
(52, '1272', 'J', '308440272', '', 'CACAO TRAVEL GROUP, C.A', 'No Aeronáutico', 0, 0, '2009-08-20', 'CALLE BOYACA CASA NRO 08 SECTOR CASCO HISTORICO CD. BOLIVAR.', 'CIUDAD BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-08-20 04:30:00', '0000-00-00 00:00:00'),
(53, '2285', 'J', '305804176', '', 'CADENA PANAMERICANA, C.A', 'No Aeronáutico', 0, 0, '2014-11-21', 'CALLE LAS ORQUIDEAS MANZ. 2 CASA Nº 3 URB. UD-232. VILLA LOEFLING CIUDAD GUAYANA. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-11-21 04:30:00', '0000-00-00 00:00:00'),
(54, '1337', 'J', '302211220', '', 'CAMPAMENTO PARAKAUPA, C.A', 'Aeronáutico', 0, 0, '2011-05-25', 'PARQUE NACIONAL CANAIMA, ESTADO BOLIVAR.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-05-25 04:30:00', '0000-00-00 00:00:00'),
(55, '0018', 'J', '095006557', '1509756', 'CANAIMA TOURS, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'PARQUE NACIONAL CANAIMA', 'CANAIMA', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(56, '0019', 'J', '095118177', '2731045', 'CARONI RENTAL''S,  C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'ZONA  INDUSTRIAL  UNARE  II.  CALLE  QUERECURE.  EDIFICIO  CARONI.  RENTAL''S. PUERTO  ORDAZ.  EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(57, '0116', 'J', '313533408', '', 'CENTRO COMERCIAL HOTEL PORTOFINO INN, C.A', 'No Aeronáutico', 0, 0, '2009-07-08', 'CALLE COCHABAMBA CON POTOSI CC PORTOFINO NIVEL TERRAZA OF D-15 URB. VILLA BOLIVIA PTO ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-07-08 04:30:00', '0000-00-00 00:00:00'),
(58, '0071', 'J', '080008219', '2695499', 'COMERCIAL DE AVIACIÓN', 'Aeronáutico', 0, 0, '2005-11-22', 'CALLE  PRINCIPAL DEL  YAQUE  EDIF.  AEROPUERTO  SANTIAGO  MARIÑO  PISO  SN  LOCAL  SN  SECTOR  EL  YAQUE', 'MARGARITA', 232, '6325', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-22 04:30:00', '0000-00-00 00:00:00'),
(59, '0106', 'J', '295533128', '', 'COMUNICACIONES VENESPAN, C.A.', 'No Aeronáutico', 0, 0, '2008-04-28', 'AV. GUAYANA NRO. PB-10 LOCAL AEROPUERTO INTERNACIONAL CARLOS MANUEL PIAR SECTOR UNARE.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2008-04-28 04:30:00', '0000-00-00 00:00:00'),
(60, '0021', 'J', '313244759', '413483808', 'COMUNICACIONES VICKY  VICTOR, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV. GUAYANA. AEROPUERTO INTERNACIONAL MANUEL PIAR  PB. UNARE. PUERTO ORDAZ. EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(61, '1339', 'J', '003320072', '', 'CONSORCIO HELITEC, C.A.', 'Aeronáutico', 0, 0, '2011-05-25', 'CCCT CHUAO, CARACAS, DISTRITO CAPITAL, VENEZUELA.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-05-25 04:30:00', '0000-00-00 00:00:00'),
(62, '0092', 'J', '309388479', '252760512', 'CONSORCIO TRANSPORTE LOS PINOS', 'No Aeronáutico', 0, 0, '2006-05-01', 'EDIFICIO TRAKI  -  GALPON  I  ZONA INDUSTRIAL  LOS PINOS  PUERTO  ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-05-01 04:30:00', '0000-00-00 00:00:00'),
(63, '0081', 'G', '200077743', '', 'CONVIASA', 'Aeronáutico', 0, 0, '2006-02-08', 'AV. INTERCOMUNAL AEROPUERTO INTERNACIONAL DE MAIQUETIA EDIF. SECTOR 6.3, ZONA ESTRATEGICA, LADO ESTE DEL  AEROPUERTO INTERNACIONAL  DE MAIQUETIA, ADYANCENTE A TRANSITO TERRESTRE.', 'CARACAS', 232, '1071', '0212-3037367', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-02-08 04:30:00', '0000-00-00 00:00:00'),
(64, '0099', 'J', '293856655', '', 'COOP. AEROPUERTO MANUEL CARLOS PIAR, R.L.', 'No Aeronáutico', 0, 0, '2007-07-20', 'AV. GUAYANA EDIF.AEROP. PISO PB OF. AEROPUERTO CARLOS MANUEL PIAR, URB. UNARE. PUERTO ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2007-07-20 04:30:00', '0000-00-00 00:00:00'),
(65, '0098', 'J', '293874483', '', 'COOP. DE TRANSP. EJEC. AEROPUERTO CARLOS MANUEL PIAR, RL.', 'No Aeronáutico', 0, 0, '2007-07-13', 'AV. GUAYANA EDIF. AEROPUERTO PISO PB, OF PB URB UNARE PUERTO ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2007-07-13 04:30:00', '0000-00-00 00:00:00'),
(66, '0025', 'J', '313285480', '415187076', 'DE ORIS ARTESANIA, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV. GUAYANA.  AEROPUERTO  INTERNACIONAL  MANUEL  PIAR  MZZ..  LOCAL 02 PUERTO ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(67, '1041', 'J', '000797234', '', 'DEL SUR BANCO UNIVERSAL, C.A.', 'No Aeronáutico', 0, 0, '2009-08-20', 'AV.  SAN JUAN  BOSCO EDIF CENTRO ALTAMAIRA PISO 18 OF UNICA ALTAMIRA.', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-08-20 04:30:00', '0000-00-00 00:00:00'),
(68, '1362', 'J', '000107017', '', 'DELL AQUA, C.A.', 'Aeronáutico', 0, 0, '2011-10-06', 'AVENIDA LAS AMERICAS, TORRE ANTON PISO 02, PUERTO ORDAZ - ESTADO BOLIVAR.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-10-06 04:30:00', '0000-00-00 00:00:00'),
(69, '0027', 'J', '307184671', '152917584', 'DESARROLLOS EL GRANO DE CAFE, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'CALLE CHACAITO BELLO MONTE. EDIFICIO MINA P-1-11. CARACAS.', 'CARACAS', 232, '1050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(70, '0028', 'J', '311657193', '339425400', 'DISTRIBUIDORA  DE  QUESOS  Y  DULCES  GUAIPO, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'PASEO CARONI  AEROPUERTO  INTERNACIONAL  DEL  ORINOCO  MANUEL  PIAR.  ALTA  VISTA  GAL  DE  ARTE  DEL  SUR  Nº 2  PUERTO  ORDAZ.  EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(71, '0056', 'J', '306937757', '', 'DULCES EL PANAL', 'No Aeronáutico', 0, 0, '2005-11-18', 'URB. LAS ROSAS CALLE PRINCIPAL LAS FLORES. CIUDAD BOLIVAR. EDO. BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-18 04:30:00', '0000-00-00 00:00:00'),
(72, '0057', 'V', '088683567', '', 'DULCES GUAIPO', 'No Aeronáutico', 0, 0, '2005-11-18', 'CALLE BOLIVAR Nº 42. CIUDAD BOLIVAR EDO BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-18 04:30:00', '0000-00-00 00:00:00'),
(73, '0083', 'J', '314635557', '492602531', 'EC. VENEZUELA , C.A.', 'No Aeronáutico', 0, 0, '2006-02-22', 'AV. BOLIVAR NORTE EDIF. TORRE STRATOS PISO 7 OF S/N URB EL RECREO', 'VALENCIA', 232, '2001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-02-22 04:30:00', '0000-00-00 00:00:00'),
(74, '1355', 'J', '095133133', '', 'ECO, C.A.', 'Aeronáutico', 0, 0, '2011-09-19', 'CIUDAD GUAYANA,  ESTADO BOLIVAR.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-09-19 04:30:00', '0000-00-00 00:00:00'),
(75, '1325', 'J', '301113381', '', 'EDITORIAL RG, C.A.', 'No Aeronáutico', 0, 0, '2011-02-03', 'CALLE ARO CON CARRERA CHURUN MERU EDIF EDIFICIO CENTRO CORPORATIVO NUEVA PRENSA PISO 01 OF 01 SECTO', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-02-03 04:30:00', '0000-00-00 00:00:00'),
(76, '1291', 'J', '298034777', '', 'EDNA''S CAFE EXPRESS, C.A.', 'No Aeronáutico', 0, 0, '2009-11-27', 'AV GUAYANA EDIF. TERMINAL AEREO PISO P.B. LOCAL PA-09 SECTOR AEROPUERTO MANUEL PIAR.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-11-27 04:30:00', '0000-00-00 00:00:00'),
(77, '1354', 'G', '200002522', '', 'EJECUTIVO DEL ESTADO BOLÍVAR', 'No Aeronáutico', 0, 0, '2011-09-19', 'CALLE AMOR PATRIO CON CONSTITUCIÓN, CIUDAD BOLÍVAR', 'CIUDAD BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-09-19 04:30:00', '0000-00-00 00:00:00'),
(78, '0031', 'V', '039717880', '', 'EL PANAL', 'No Aeronáutico', 0, 0, '2005-11-16', 'CALLE VICTORIA Nº 21. LAS FLORES. CIUDAD BOLIVAR. EDO. BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(79, '1357', 'J', '295678053', '', 'ESTELAR LATINOAMERICANA C.A.', 'Aeronáutico', 0, 0, '2011-09-27', 'CARACAS - DISTRITO CAPITAL.', 'CARACAS', 232, '', '0212-9616979', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-09-27 04:30:00', '0000-00-00 00:00:00'),
(80, 'D099', 'J', '001215590', '', 'EUROBUILDING INTERNACIONAL, C.A.', 'Aeronáutico', 0, 0, '2007-05-10', 'CALLE LA GUAIRITA,  CHUAO - ESTADO MIRANDA.', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2007-05-10 04:30:00', '0000-00-00 00:00:00'),
(81, '0085', 'J', '314369300', '476536731', 'F1  EXPRESS, C.A.', 'No Aeronáutico', 0, 0, '2006-03-10', 'LOCAL PB  - 11  INSTALACIONES  DEL  AEROPUERTO  MANUEL PIAR  AV.  GUAYANA   PUERTO  ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-03-10 04:30:00', '0000-00-00 00:00:00'),
(82, '1350', 'G', '200086904', '', 'FUNDACION SOCIAL BOLIVAR', 'Aeronáutico', 0, 0, '2011-08-26', 'URB. RORAIMA CARRERA CHURUM MERU EDIF. MUNDO DE SONRISAS, PUERTO ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-08-26 04:30:00', '0000-00-00 00:00:00'),
(83, '1418', 'J', '400861390', '', 'GALAUTOS RENTA CAR II, C.A', 'No Aeronáutico', 0, 0, '2012-09-04', 'AV. JESUS SOTO EDIF. AEROPUERTO GENERAL TOMAS DE HERES LOCAL PB-10 SECTOR AEROPUERTO CD BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-09-04 04:30:00', '0000-00-00 00:00:00'),
(84, '2297', 'J', '311618775', '', 'GRUPO ATAHUALPA, C.A.', 'Aeronáutico', 0, 0, '2015-07-13', 'ESQUINA ROMUALDA A MANDUCA, CALLEJON MANDUCA EDIF. 93, LA CANDELARIA, CARACAS', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2015-07-13 04:30:00', '0000-00-00 00:00:00'),
(85, '1379', 'J', '297615237', '', 'GRUPO FANJET, S.A.', 'Aeronáutico', 0, 0, '2011-12-13', 'AV. PRINCIPAL DEL HATILLO, CC PASEO, TORRE DE OFICINA, PISO 10.', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-12-13 04:30:00', '0000-00-00 00:00:00'),
(86, '0034', 'J', '311041567', '316073107', 'GUAYANA HANDLING, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV. GUAYANA AEROPUERTO INTERNACIONAL MANUEL CARLOS  PIAR. PLATAFORMA. PUERTO ORDAZ. EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(87, '2288', 'J', '307201975', '', 'IMPORTACIONES Y EXPORTACIONES CHALBRAVEN, C.A', 'Aeronáutico', 0, 0, '2015-01-23', 'TRONCAL 10, GALPON BVP, SANTA ELENA DE UAIREN , ESTADO BOLIVAR', '', 232, '', '0289-9951957', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2015-01-23 04:30:00', '0000-00-00 00:00:00'),
(88, '0035', 'J', '313498831', '426607360', 'INFOTRAVEL, C.A', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV. PASEO CARONI. CENTRO COMERCIAL GRAN SABANA. PISO 02. OFICINA Nº 71. PUERTO ORDAZ. EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(89, '2290', 'G', '200086327', '', 'INSAI', 'No Aeronáutico', 0, 0, '2015-03-18', 'MARACAY EDO. ARAGUA A. LAS DELICIAS EDF. INIA OFC. INSAI', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2015-03-18 04:30:00', '0000-00-00 00:00:00'),
(90, '2293', 'J', '293569320', '', 'INSEL AIR INTERNATIONAL B.V, S.R.L', 'Aeronáutico', 0, 0, '2015-04-14', 'VALENCIA ESTADO CARABOBO', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2015-04-14 04:30:00', '0000-00-00 00:00:00'),
(91, '1367', 'G', '200028386', '', 'INSTITUTO NACIONAL DE AERONAUTICA CIVIL', 'No Aeronáutico', 0, 0, '2011-11-08', 'AEROPUERTO INTERNACIONAL MANUEL CARLOS PIAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-11-08 04:30:00', '0000-00-00 00:00:00'),
(92, '1442', 'J', '310545537', '', 'INVERSIONES ALMACENADORA 2020, C.A', 'Aeronáutico', 0, 0, '2013-03-20', 'CARACAS - DISTRITO CAPITAL', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2013-03-20 04:30:00', '0000-00-00 00:00:00'),
(93, '1273', 'J', '293600030', '', 'INVERSIONES CASTRO BIENES Y RAICES, C.A.', 'No Aeronáutico', 0, 0, '2009-08-20', 'CR TOCOMA, CRUCE AV. GUAYANA CC CAURA NIVEL PB LOCAL 06 URB ALTA VISTA NORTE, PUERTO ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-08-20 04:30:00', '0000-00-00 00:00:00'),
(94, '0036', 'J', '311985212', '353850458', 'INVERSIONES INGEDANA, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV. 50. URB  MONTALBAN  I  EDIFICIO VEGA  DEL  ESTE  II.  P  3.', 'CARACAS', 232, '1020', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(95, '1343', 'J', '307925671', '', 'INVERSIONES MARIA SANCHEZ, C.A.', 'No Aeronáutico', 0, 0, '2011-06-14', 'VDA. 4 CASA NRO 6 URB LAS MERCEDES, SECTOR 3. LA VICTORIA, ESTADO ARAGUA', 'LA VICTORIA', 232, '2121', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-06-14 04:30:00', '0000-00-00 00:00:00'),
(96, '0037', 'J', '000572500', '64049526', 'ITALCAMBIO CASA DE CAMBIO, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV. URDANETA, ESQUINA  DE  ANIMAS  A   PLATANAL.  EDIFICIO  CAMORUCO,  P.B.  URB. LA CANDELARIA  CARACAS.', 'CARACAS', 232, '', '5629555', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(97, '1326', 'J', '299586862', '', 'LAFLICH RENTAL SERVICES, C.A.', 'No Aeronáutico', 0, 0, '2011-02-04', 'AV. JOSE TADEO MONAGAS, CASA N 54, SECTOR LAS COCUIZAS', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-02-04 04:30:00', '0000-00-00 00:00:00'),
(98, '0039', 'V', '039701657', '326006033', 'LIBRERIA  Y  REVISTERO  AEROPUERTO', 'No Aeronáutico', 0, 0, '2005-11-16', 'PUERTO  ORDAZ.  URB.  LOS  OLIVOS,  CALLE  PONTEVEDRA   C.R.  DON  MIGUEL. CASA  02 - F', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(99, '1358', 'J', '003644455', '', 'LINEA  AEREA DE SERVCICIO EJECUTIVO REGIONAL (LASER), C.A.', 'Aeronáutico', 0, 0, '2011-09-27', 'AV. FRANCISCO DE MIRANDA, TORRE BAZAR BOLIVAR, PISO 8, URB. EL MARQUEZ. CARACAS.', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-09-27 04:30:00', '0000-00-00 00:00:00'),
(100, '0069', 'J', '001633650', '40866272', 'LINEA TURISTICA AEROTUY L.T.A. C.A', 'Aeronáutico', 0, 0, '2005-11-22', 'EDIFICIO GRAN SABANA. SABANA GRANDE', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-22 04:30:00', '0000-00-00 00:00:00'),
(101, '0080', 'J', '095143201', '', 'LLOYD AVIATION, C.A.', 'Aeronáutico', 0, 0, '2006-02-06', 'CALLE EL CALLAO, EDIF TORRE LLOYD, PISO MZ LOCAL 2 SECTOR CENTRO', 'CIUDAD GUAYANA', 232, '8050', '9514584 / 9527078', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-02-06 04:30:00', '0000-00-00 00:00:00'),
(102, '0107', 'J', '000214107', '', 'MAPFRE LA SEGURIDAD C.A.', 'No Aeronáutico', 0, 0, '2008-07-14', 'CALLE 3-A EDIFICIO MAPFRE LA SEGURIDAD PB, LA URBINA SUR EDO. MIRANDA', 'CARACAS', 232, '', '0212- 2138036', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2008-07-14 04:30:00', '0000-00-00 00:00:00'),
(103, '2279', 'V', '11205493', '', 'MAURICIO MENDOZA', 'Aeronáutico', 0, 0, '2014-08-20', 'CALLE MAGISTERIO Nº 17, TUCUPITA EDO. DELTA AMACURO', '', 232, '', '0424-9267107', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-08-20 04:30:00', '0000-00-00 00:00:00'),
(104, '0113', 'J', '002747587', '74997872', 'MENSAJEROS RADIO WORLD WIDE, C.A.', 'Aeronáutico', 0, 0, '2009-03-26', 'CALLE PANTIN, ENTRE CALLE SAMAN Y LOS ANGELES, EDIFICIO MRW, URBANIZACION ESTADO LEAL. CHACAO, CARACAS.', 'CIUDAD GUAYANA', 232, '8050', '0212-2778620', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-03-26 04:30:00', '0000-00-00 00:00:00'),
(105, '0015', 'J', '000029610', '48432743', 'MERCANTIL, C.A., BANCO  UNIVERSAL', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV.  ANDRES  BELLO  EDIFICIO MERCANTIL  PISO 26  OFIC P26  URB. SAN BERNARDINO .', 'CARACAS', 232, '1010', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(106, '1416', 'J', '400753953', '', 'MILLA''S TRAVEL, C.A.', 'No Aeronáutico', 0, 0, '2012-08-09', 'AV. VIA CARACAS C.C. EMPRESARIAL AUTANA NIVEL # 1 OFICINA 104, ZONA INDUSTRIAL LOS PINOS', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-08-09 04:30:00', '0000-00-00 00:00:00'),
(107, '0041', 'J', '310439486', '', 'NAVIERA BONYO, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'AEROPUERTO INTERNACIONAL DEL ORINOCO MANUEL PIAR. PUERTO ORDAZ. EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(108, '0042', 'J', '306819398', '126629800', 'NEW CAR RENTAL''S, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'UNARE  II.  CALLE  PRESPUNTAL,  PARCELA  289 - 0204.  PUERTO  ORDAZ.  EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(109, '0044', 'J', '300605019', '4828461', 'ORINOCO CAR RENT, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'HOTEL  RASIL.  CENTRO  CIVICO.  PUERTO  ORDAZ.  EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(110, '1322', 'J', '095178030', '', 'ORINOCO WING AIR, C.A', 'No Aeronáutico', 0, 0, '2011-01-04', 'CALLE EL CALLAO EDIF TORRE LLOYD PISO MZ LOCAL 2 SECTOR CENTRO', 'CIUDAD GUAYANA', 232, '8050', '0286- 9237376', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-01-04 04:30:00', '0000-00-00 00:00:00'),
(111, '1293', 'J', '000020388', '', 'ORINOKIA  DE LUXE HOTEL, C.A', 'No Aeronáutico', 0, 0, '2010-02-11', 'CALLE CARONI, 2DA TRANSVERSAL CASTILLITO NRO S/N SECTOR CERRO RONDON / PUERTO ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2010-02-11 04:30:00', '0000-00-00 00:00:00'),
(112, '0026', 'J', '001230726', '19615', 'PDVSA  PETRÓLEOS, S.A.', 'Aeronáutico', 0, 0, '2005-11-16', 'EDIFICIO PETRÓLEOS DE VENEZUELA, TORRE ESTE, P.H., AV. LIBERTADOR CON CALLE EL EL EMPALME, URB. LA CAMPIÑA,  CARACAS  - DISTRITO  FEDERAL', 'CARACAS', 232, '1071', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(113, '1381', 'J', '306995188', '', 'PREMIER CLUB, C.A.', 'No Aeronáutico', 0, 0, '2012-01-04', 'AV. PRINCIPAL DE PLAYA GRANDE CON CALLE N 5 CC MINI CENTRO COMERCIAL MARIA VIRGINIA NIVEL PLANTA BAJA', 'CARACAS', 232, '1160', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-01-04 04:30:00', '0000-00-00 00:00:00'),
(114, '1376', 'J', '003173924', '', 'PROFIT C.A.', 'Aeronáutico', 0, 0, '2011-11-15', 'AVENIDA LA ESTANCIA, CCCT TORRE A NIVEL 6 OFIC. 608, URB. CHUAO, CARACAS.', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-11-15 04:30:00', '0000-00-00 00:00:00'),
(115, '1369', 'J', '293696631', '', 'PROSPERI AIR,C.A.', 'Aeronáutico', 0, 0, '2011-11-09', 'AEROPUERTO CARACAS, CHARALLAVE, ESTADO MIRANDA.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-11-09 04:30:00', '0000-00-00 00:00:00'),
(116, '0226', 'J', '303756603', '', 'PROYECTOS Y CONSTRUCCIONES P&H C.A.', 'Aeronáutico', 0, 0, '2013-09-20', 'CENTRO COMERCIAL GRAN SABANA, SEGUNDO PISO, OFICINA 73, PUERTO ORDAZ.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2013-09-20 04:30:00', '0000-00-00 00:00:00'),
(117, '0046', 'J', '000450730', '', 'RENTA MOTOR , C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV.  PRINCIPAL  EL  BOSQUE.  EDIFICIO  PICHINCHA  PISO 7.  OFICINA 71.  URB.  EL BOSQUE  CHACAITO  CARACAS', 'CARACAS', 232, '1050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(118, '0017', 'J', '316497976', '', 'REPRESENTACIONES TURISTICAS CANAIMA, C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'AEROPUERTO INTERNACIONAL DEL ORINOCO MANUEL PIAR, SECTOR AEROCLUB CARONI HANGAR 08-09. PUERTO ORDAZ, ESTADO BOLIVAR', 'CIUDAD GUAYANA', 232, '8015', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(119, '1352', 'J', '307326328', '', 'REPRESENTACIONES VINSOCA, C.A.', 'Aeronáutico', 0, 0, '2011-09-14', 'TORRE KLM PISO 10 SANTA EDUBIGIS, CARACAS, DISTRITO CAPITAL, VENEZUELA.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-09-14 04:30:00', '0000-00-00 00:00:00'),
(120, '1286', 'J', '297915290', '', 'REPRESENTACIONES Y SERVICIOS  MAGALLANES LONGONI, C.A.', 'No Aeronáutico', 0, 0, '2009-11-12', 'AV. GUAYANA AEROPUERTO MANUEL CARLOS PIAR NRO B URB  UNARE II, PUERTO ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-11-12 04:30:00', '0000-00-00 00:00:00'),
(121, '1388', 'J', '314671367', '', 'RG AVIATIÓN, C.A', 'Aeronáutico', 0, 0, '2012-01-26', 'AEROPUERTO CARACAS OMZ, HANGAR CORPORATIVO 2.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-01-26 04:30:00', '0000-00-00 00:00:00'),
(122, '0047', 'J', '000860874', '', 'ROFRER, S.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'CALLE  LOURDES  CON  AV. NUEVA  GRANADA.  EDIFICIO  DUDGET CAR  RENTAL. URB.  LAS  ACACIAS.  CARACAS  DF. 1040  VENEZUELA', 'CARACAS', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(123, '1278', 'J', '308192252', '', 'RUTAS AEREAS DE VENEZUELA RAV S.A.', 'Aeronáutico', 0, 0, '2009-09-08', 'AV. PPAL ZONA DE CARGA LOCAL C0003 AEROPUERTO INTERNACIONAL LA CHINITA.', 'MARACAIBO', 232, '4001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-09-08 04:30:00', '0000-00-00 00:00:00'),
(124, '0048', 'J', '095003965', '2906619', 'RUTAS AEREAS, C.A.', 'Aeronáutico', 0, 0, '2005-11-16', 'AV. JESUS SOTO SECTOR AEROPUERTO EDIFICIO  TALLER MARES . CIUDAD BOLIVAR. EDO. BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(125, '0103', 'J', '312952512', '', 'S&S ORINOCO AVIATIÓN C.A', 'Aeronáutico', 0, 0, '2007-12-27', 'CALLE ARO CC CARONI PLAZA NIVEL 4 LOCAL 4-1 SECTOR ALTA VISTA PUERTO ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2007-12-27 04:30:00', '0000-00-00 00:00:00'),
(126, '1341', 'G', '200040637', '', 'SERVICIO AUTONOMO DE AEROPUERT REG DEL EDO BOLIVAR', 'No Aeronáutico', 0, 0, '2011-06-06', 'AVENIDA JESUS SOTO EDIFICIO TERMINAL AEREO CIUDAD BOLIVAR', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-06-06 04:30:00', '0000-00-00 00:00:00'),
(127, '1316', 'G', '200003030', '', 'SERVICIO NACIONAL INTEGRADO DE ADMON ADUANERA Y TRI', 'No Aeronáutico', 0, 0, '2010-11-05', 'CARRERA TOCOMA CON CALLE ARO, EDIFICIO MIMU, 1 ER. PISO, ALTA VISTA NORTE. PUERTO ORDAZ. - EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2010-11-05 04:30:00', '0000-00-00 00:00:00'),
(128, '0049', 'J', '095016714', '2722720', 'SERVICIOS AEREOS MINEROS, C.A.', 'Aeronáutico', 0, 0, '2005-11-16', 'AEROPUERTO INTERNACIONAL DEL ORINOCO MANUEL PIAR, PUERTO ORDAZ', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(129, '2276', 'J', '299292311', '', 'SERVICIOS AEREOS PROFESIONALES SAP, C.A.', 'Aeronáutico', 0, 0, '2014-04-12', 'CARRIZAL, ESTADO MIRANDA.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-04-12 04:30:00', '0000-00-00 00:00:00'),
(130, '1428', 'J', '317653440', '', 'SERVICIOS DE EMPAQUES Y MANTENIMIENTO NEKUIMA C.A.', 'Aeronáutico', 0, 0, '2012-11-07', 'ZONA INDUSTRIAL LOS PINOS, MANZANA Nº 6, PARCELA 9 Y 10, PUERTO ORDAZ  - ESTADO BOLIVAR.', 'CIUDAD GUAYANA', 232, '8050', '0286 - 9942156', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-11-07 04:30:00', '0000-00-00 00:00:00'),
(131, '0223', 'J', '297695796', '', 'SERVICIOS Y SUMINISTROS LA MAXIMA, C.A', 'No Aeronáutico', 0, 0, '2013-07-15', 'CTRA PARQUE  INDUSTRIAL LOS PINOS, EDIF CENTRO EMPRESARIAL CUBO VERDE PISO P/B', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2013-07-15 04:30:00', '0000-00-00 00:00:00'),
(132, '0050', 'J', '000413916', '', 'SIDOR C.A.', 'No Aeronáutico', 0, 0, '2005-11-16', 'ZONA INDUSTRIAL MATANZAS. PUERTO ORDAZ. EDO. BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(133, '1321', 'J', '301791940', '', 'SILVA SHIPPING AGENCY, C.A', 'Aeronáutico', 0, 0, '2011-01-04', 'CALLE ARO CC CARONI PLAZA NIVEL LOCAL 4 - 01 ZONA ALTA VISTA PUERTO ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-01-04 04:30:00', '0000-00-00 00:00:00'),
(134, '0123', 'J', '307371889', '', 'SUNDANCE AIR VENEZUELA, C.A.', 'No Aeronáutico', 0, 0, '2009-07-15', 'AV. LA ESTANCIA URB. CHUAO C.C.C.T. NIVEL C-2 OFIC. MZ - 03-B2', 'CARACAS', 232, '1060', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-07-15 04:30:00', '0000-00-00 00:00:00'),
(135, '1407', 'J', '296161364', '', 'SUNDANCE AVSEC CONTROL AND SERVICE C.A.', 'No Aeronáutico', 0, 0, '2012-06-11', 'AV. CALLE 10 CON AVENIDA PRINCIPAL LA ATLANTIDA CC CENTRO EMPRESARIAL JARDINES PLAZA NIVEL 3 LOCAL', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2012-06-11 04:30:00', '0000-00-00 00:00:00'),
(136, '1292', 'J', '003439940', '', 'TELEFÓNICA VENEZOLANA, C.A..', 'No Aeronáutico', 0, 0, '2009-12-11', 'AV. FRANCISCO DE MIRANDA CC EL PARQUE NIVEL 6 OF 6 URB LOS PALOS GRANDES CARACAS.', 'CARACAS', 232, '1070', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-12-11 04:30:00', '0000-00-00 00:00:00'),
(137, '0101', 'J', '311767096', '', 'TRAKI  IVG  PLUS, C.A', 'Aeronáutico', 0, 0, '2007-11-28', 'ZONA INDUSTRIAL LOS PINOS CALLE 6 MANZANA 29 GALPON 2 EDIFICIO TRAKI PUERTO ORDAZ ESTADO BOLIVAR', 'CIUDAD GUAYANA', 232, '8050', '0286-9944661 / 9944385', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2007-11-28 04:30:00', '0000-00-00 00:00:00'),
(138, 'D078', 'J', '305703809', '', 'TRANSCARGA INTL. AIRWAYS, C.A', 'Aeronáutico', 0, 0, '2006-02-03', 'Av. Rio Caura. Torre Humbolt,  piso 05 oficina 5-13. Prado del Este. Caracas. Punto referencia Centro Comercial Congresa.', 'CARACAS', 232, '1030', '2129776918', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-02-03 04:30:00', '0000-00-00 00:00:00'),
(139, '0074', 'J', '095006573', '3314812', 'TRANSMANDU C.A.', 'Aeronáutico', 0, 0, '2005-11-22', 'AV. JESUS SOTO. AEROPUERTO CIUDAD BOLIVAR EDO. BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-22 04:30:00', '0000-00-00 00:00:00'),
(140, '1443', 'J', '001976663', '', 'TRANSPORTE DE VALORES BANCARIOS TRANSBANCA, C.A.', 'No Aeronáutico', 0, 0, '2013-03-21', 'SAN MARTIN CENTRO INDUSTRIAL PALO GRANDE', 'DISTRITO CAPITAL', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2013-03-21 04:30:00', '0000-00-00 00:00:00'),
(141, '1282', 'J', '304684339', '', 'TRANSPORTE DE VALORES VISETECA', 'No Aeronáutico', 0, 0, '2009-10-05', 'EDIF. BANCO PROVINCIAL , SÓTANO AV. GUAYANA, ALATA VISTA. PUERTO ORDAZ.', 'CIUDAD GUAYANA', 232, '8050', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2009-10-05 04:30:00', '0000-00-00 00:00:00'),
(142, '0073', 'J', '095034330', '3094359', 'TRANSPORTE NACIONALES (TRANACA)', 'Aeronáutico', 0, 0, '2005-11-22', 'AV. JESUS SOTO. CIUDAD BOLIVAR. EDO. BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-22 04:30:00', '0000-00-00 00:00:00'),
(143, '0064', 'J', '300925811', '5763606', 'TURISMO AEREO AMAZONAS', 'Aeronáutico', 0, 0, '2005-11-18', 'AV JESUS SOTO CIUDAD BOLIVAR EDO. BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-18 04:30:00', '0000-00-00 00:00:00'),
(144, '2280', 'J', '297310118', '', 'ULTRA INSTRUCCION AERONAUTICA, C.A', 'Aeronáutico', 0, 0, '2014-08-20', 'AV PASEO CARONI CC NARAYA NIVEL 5 OF 24 URB ALTA VISTA SUR, PUERTO ORDAZ', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-08-20 04:30:00', '0000-00-00 00:00:00'),
(145, '0087', 'J', '003314609', '', 'UNIGLOBE CANDES  TRAVEL, C.A.', 'No Aeronáutico', 0, 0, '2006-03-23', 'AVENIDA  FRANCISCO  DE  MIRANDA  URB.  LOS  PALOS  GRANDES  EDIF.  PARQUE  CRISTAL  TORRE  OESTE  PISO  6  LOC.  63 - 64', 'CARACAS', 232, '1060', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2006-03-23 04:30:00', '0000-00-00 00:00:00'),
(146, '0051', 'V', '037694661', '', 'VARIEDADES MICHELANGELLI', 'No Aeronáutico', 0, 0, '2005-11-16', 'AV. 1. URB SAN RAFAEL. QTA. ITIMAR Nº 03. CIUDAD BOLIVAR. EDO. BOLIVAR', 'BOLIVAR', 232, '8001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2005-11-16 04:30:00', '0000-00-00 00:00:00'),
(147, '1347', 'J', '304780869', '', 'VENEQUIP, S.A.', 'Aeronáutico', 0, 0, '2011-07-08', 'ZONA INDUSTRIAL 1 CALLE 4 EDIFICIO VENEQUIP, BARQUISIMETO -  ESTADO LARA.', 'BARQUISIMETO', 232, '3001', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2011-07-08 04:30:00', '0000-00-00 00:00:00'),
(148, '2296', 'J', '405395311', '', 'VUELOS I VUELOS C.A.', 'Aeronáutico', 0, 0, '2015-05-25', 'CALLE ESTE EDIF. ESTE 9 PISO 2 APT.24-A, URB. MANZANARES, BARUTA, CARACAS, MIRANDA.', '', 232, '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2015-05-25 04:30:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_hangar`
--

CREATE TABLE IF NOT EXISTS `cliente_hangar` (
`id` int(10) unsigned NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `hangar_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobros`
--

CREATE TABLE IF NOT EXISTS `cobros` (
`id` int(10) unsigned NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL,
  `hasrecaudos` text COLLATE utf8_unicode_ci NOT NULL,
  `montofacturas` double(15,2) NOT NULL,
  `montodepositado` double(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobrospagos`
--

CREATE TABLE IF NOT EXISTS `cobrospagos` (
`id` int(10) unsigned NOT NULL,
  `tipo` enum('D','NC') COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `banco_id` int(10) unsigned NOT NULL,
  `cuenta_id` int(10) unsigned NOT NULL,
  `ncomprobante` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(15,2) NOT NULL,
  `cobro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro_factura`
--

CREATE TABLE IF NOT EXISTS `cobro_factura` (
`id` int(10) unsigned NOT NULL,
  `factura_id` int(10) unsigned NOT NULL,
  `cobro_id` int(10) unsigned NOT NULL,
  `monto` double(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE IF NOT EXISTS `conceptos` (
`id` int(10) unsigned NOT NULL,
  `codpre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nompre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codcta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stacod` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `coduni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iva` double(8,2) unsigned NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modulo_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=99 ;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id`, `codpre`, `nompre`, `codcta`, `stacod`, `coduni`, `iva`, `aeropuerto_id`, `created_at`, `updated_at`, `modulo_id`) VALUES
(50, '0-033-001-124-301-09-02-01-001  ', 'TASAS NACIONALES MODULO', '4-2-302-02-01-0001              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(51, '0-033-001-124-301-09-02-01-002  ', 'TASAS INTERNACIONALES MODULO', '4-2-302-02-01-0001              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(52, '0-033-001-124-301-09-02-01-003  ', 'TASAS NACIONALES SCV', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:13', 5),
(53, '0-033-001-124-301-09-02-01-004  ', 'TASAS INTERNACIONALES SCV', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:13', 5),
(54, '0-033-001-124-301-09-02-02-001  ', 'ATERRIZAJE Y DESPEGUE DE AERONAVES', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:13', 5),
(55, '0-033-001-124-301-09-02-02-002  ', 'ESTACIONAMIENTO DE AERONAVES', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:13', 5),
(56, '0-033-001-124-301-09-02-02-003  ', 'HABILITACION', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:13', 5),
(57, '0-033-001-124-301-09-02-02-004  ', 'FORMULARIO DOSA', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-11-20 19:27:34', 5),
(58, '0-033-001-124-301-09-02-02-005  ', 'JET WAY', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-11-20 19:27:34', 5),
(59, '0-033-001-124-301-09-02-02-006  ', 'CARGA', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:20', 6),
(60, '0-033-001-124-301-09-02-03-000  ', 'CANON DE ARRENDAMIENTO', '1-1-122-02-01-0003              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-08-08 01:50:09', 2),
(61, '0-033-001-124-301-09-02-04-000  ', 'ESTACIONAMIENTO DE VEHICULOS', '4-2-302-02-01-0004              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-08-08 01:51:06', 4),
(62, '0-033-001-124-301-09-02-05-000  ', 'PUBLICIDAD', '4-2-302-02-01-0005              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-08-08 01:50:37', 3),
(63, '0-033-001-124-301-09-02-06-000  ', 'OTROS INGRESOS COMBUSTIBLE', '1-1-122-02-01-0007              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:13', 5),
(64, '0-033-001-124-301-09-02-06-001  ', 'TARJETA DE IDENTIFICACION ', '4-2-302-02-01-0006              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(65, '0-033-001-124-301-09-02-06-002  ', 'OTROS INGRESOS 10% SERVICIOS DE HANDLING ', '4-2-302-02-01-0006              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:13', 5),
(66, '0-033-001-124-301-09-02-06-003  ', 'OTROS INGRESOS CARNET DE CIRCULACION', '4-2-302-02-01-0006              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(67, '0-033-001-124-301-09-02-06-005  ', ' OTROS INGRESOS', '1-1-122-02-01-0007              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(68, '0-033-001-124-301-09-02-07-001  ', ' ATERRIZAJE Y DESPEGUE DE AERONAVES CREDITO', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-08-08 01:51:53', 5),
(69, '0-033-001-124-301-09-02-07-002  ', 'ESTACIONAMIENTO DE AERONAVES CREDITO', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-11-20 19:27:34', 5),
(70, '0-033-001-124-301-09-02-07-003  ', 'HABILITACION CREDITO', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:13', 5),
(71, '0-033-001-124-301-09-02-07-004  ', 'FOMULARIO DOSA CREDITO', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:13', 5),
(72, '0-033-001-124-301-09-02-07-005  ', 'JET WAY CREDITO', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:13', 5),
(73, '0-033-001-124-301-09-02-07-006  ', 'CARGA CREDITO', '4-2-302-02-01-0002              ', 'A', '', 0.00, 1, '0000-00-00 00:00:00', '2015-12-04 20:15:20', 6),
(74, '0-033-002-125-302-99-02-01-001  ', 'TASAS NACIONALES MODULO', '1-1-122-03-01-0001              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(75, '0-033-002-125-302-99-02-01-003  ', 'TASAS NACIONALES SCV ', '1-1-122-03-01-0002              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(76, '0-033-002-125-302-99-02-02-001  ', 'ATERRIZAJE Y DESPEGUE DE AERONAVES', '1-1-122-03-01-0002              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(77, '0-033-002-125-302-99-02-02-002  ', 'ESTACIONAMIENTO DE AERONAVES', '1-1-122-03-01-0002              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(78, '0-033-002-125-302-99-02-02-003  ', 'HABILITACION', '1-1-122-03-01-0002              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(79, '0-033-002-125-302-99-02-02-004  ', 'FORMULARIO DOSA', '1-1-122-03-01-0002              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(80, '0-033-002-125-302-99-02-02-005  ', 'JET WAY', '1-1-122-03-01-0002              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(81, '0-033-002-125-302-99-02-02-006  ', 'CARGA', '1-1-122-03-01-0002              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(82, '0-033-002-125-302-99-02-03-000  ', 'CANON DE ARRENDAMIENTO', '1-1-122-03-01-0003              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(83, '0-033-002-125-302-99-02-04-000  ', 'ESTACIONAMIENTO DE VEHICULOS', '1-1-122-03-01-0004              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(84, '0-033-002-125-302-99-02-05-000  ', 'PUBLICIDAD', '1-1-122-03-01-0005              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(85, '0-033-002-125-302-99-02-06-000  ', 'OTROS INGRESOS', '1-1-122-03-01-0007              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(86, '0-033-002-125-302-99-02-06-001  ', 'TARJETAS DE IDENTIFICACI?N', '1-1-122-03-01-0007              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(87, '0-033-002-125-302-99-02-06-002  ', 'TARJETAS DE ESTACIONAMIENTO', '1-1-122-03-01-0007              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(88, '0-033-002-125-302-99-02-06-003  ', 'FORMULARIOS ANULADOS', '1-1-122-03-01-0007              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(89, '0-033-002-125-302-99-02-07-001  ', 'ATERRIZAJE Y DESPEGUE CREDITO ', '1-1-122-03-01-0002              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(90, '0-033-002-125-302-99-02-07-002  ', 'ESTACIONAMIENTO DE AERONAVES CREDITO', '1-1-122-03-01-0002              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(91, '0-033-002-125-302-99-02-07-003  ', ' FORMULARIO DOSA CREDITO', '1-1-122-03-01-0002              ', 'A', '', 0.00, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(92, '0-033-003-126-301-09-02-01-002  ', 'TASAS AEROPORTUARIAS NACIONALES', '1-1-122-04-01-0001              ', 'A', '', 0.00, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(93, '0-033-003-126-301-09-02-02-001  ', 'ATERRIZAJE Y DESPEGUE DE AERONAVES', '1-1-122-04-01-0002              ', 'A', '', 0.00, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(94, '0-033-003-126-301-09-02-02-002  ', 'ESTACIONAMIENTO DE AERONAVES', '1-1-122-04-01-0002              ', 'A', '', 0.00, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(95, '0-033-003-126-301-09-02-02-003  ', 'FORMULARIO DOSA', '1-1-122-04-01-0002              ', 'A', '', 0.00, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(96, '0-033-003-126-301-09-02-03-000  ', 'CANON DE ARRENDAMIENTO', '1-1-122-04-01-0003              ', 'A', '', 0.00, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(97, '0-033-003-126-301-09-02-06-001  ', 'OTROS INGRESOS TARJETA DE IDENTIFICACION', '1-1-122-04-01-0007              ', 'A', '', 0.00, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(98, '0-033-003-126-301-09-02-06-002  ', 'OTROS INGRESOS FORMULARIOS ANULADOS', '1-1-122-04-01-0007              ', 'A', '', 0.00, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concils`
--

CREATE TABLE IF NOT EXISTS `concils` (
`id` int(10) unsigned NOT NULL,
  `encargado` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `codbarras` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fVer` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hVer` time NOT NULL,
  `serie` text COLLATE utf8_unicode_ci NOT NULL,
  `codtas` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `tiptas` int(11) NOT NULL,
  `valor` double(14,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE IF NOT EXISTS `contratos` (
`id` int(10) unsigned NOT NULL,
  `nContrato` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `concepto_id` int(10) unsigned NOT NULL,
  `monto` double(8,2) unsigned NOT NULL,
  `montoTipo` enum('Mensual','Anual') COLLATE utf8_unicode_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `isReanudacionAutomatica` tinyint(1) NOT NULL,
  `mesesReanudacion` int(11) NOT NULL,
  `isGeneracionAutomaticaFactura` tinyint(1) NOT NULL,
  `diaGeneracion` int(11) NOT NULL,
  `metros` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `imagen` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Departamento 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despegues`
--

CREATE TABLE IF NOT EXISTS `despegues` (
`id` int(10) unsigned NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `aeropuerto_id` int(11) unsigned NOT NULL,
  `num_vuelo` int(11) DEFAULT NULL,
  `aeronave_id` int(10) unsigned NOT NULL,
  `puerto_id` int(10) unsigned DEFAULT NULL,
  `piloto_id` int(10) unsigned DEFAULT NULL,
  `tipoMatricula_id` int(10) unsigned NOT NULL,
  `nacionalidadVuelo_id` int(10) unsigned DEFAULT NULL,
  `cliente_id` int(10) unsigned DEFAULT NULL,
  `embarqueAdultos` int(11) NOT NULL DEFAULT '0',
  `embarqueInfante` int(11) NOT NULL DEFAULT '0',
  `embarqueTercera` int(11) NOT NULL DEFAULT '0',
  `transitoAdultos` int(11) NOT NULL DEFAULT '0',
  `transitoInfante` int(11) NOT NULL DEFAULT '0',
  `transitoTercera` int(11) NOT NULL DEFAULT '0',
  `tiempo_estacionamiento` double(8,2) DEFAULT NULL,
  `numero_puenteAbordaje` int(11) DEFAULT NULL,
  `tiempo_puenteAbord` double(8,2) DEFAULT NULL,
  `cobrar_estacionamiento` int(11) NOT NULL DEFAULT '0',
  `cobrar_puenteAbordaje` int(11) NOT NULL DEFAULT '0',
  `cobrar_Formulario` int(11) NOT NULL DEFAULT '0',
  `cobrar_AterDesp` int(11) NOT NULL DEFAULT '0',
  `cobrar_Combustible` int(11) NOT NULL DEFAULT '0',
  `cobrar_servHandling` int(11) NOT NULL DEFAULT '0',
  `cobrar_habilitacion` int(11) NOT NULL DEFAULT '0',
  `aterrizaje_id` int(10) unsigned NOT NULL,
  `condicionPago` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `factura_id` int(10) unsigned NOT NULL,
  `facturado` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Volcado de datos para la tabla `despegues`
--

INSERT INTO `despegues` (`id`, `hora`, `fecha`, `aeropuerto_id`, `num_vuelo`, `aeronave_id`, `puerto_id`, `piloto_id`, `tipoMatricula_id`, `nacionalidadVuelo_id`, `cliente_id`, `embarqueAdultos`, `embarqueInfante`, `embarqueTercera`, `transitoAdultos`, `transitoInfante`, `transitoTercera`, `tiempo_estacionamiento`, `numero_puenteAbordaje`, `tiempo_puenteAbord`, `cobrar_estacionamiento`, `cobrar_puenteAbordaje`, `cobrar_Formulario`, `cobrar_AterDesp`, `cobrar_Combustible`, `cobrar_servHandling`, `cobrar_habilitacion`, `aterrizaje_id`, `condicionPago`, `factura_id`, `facturado`, `created_at`, `updated_at`) VALUES
(53, '05:50:00', '2015-12-04', 0, 740, 14, 3, 14, 3, 1, 40, 123, 0, 1, 0, 0, 0, 525.00, 1, 2.00, 1, 1, 0, 1, 0, 0, 0, 32, 'Crédito', 20, 0, '2015-12-08 04:20:27', '2015-12-08 05:44:33'),
(54, '06:00:00', '2015-12-03', 0, 802, 2, 4, 20, 3, 1, 124, 66, 0, 0, 0, 0, 0, 350.00, 1, 2.00, 1, 1, 0, 1, 0, 0, 1, 33, 'Crédito', 22, 0, '2015-12-08 04:21:59', '2015-12-08 05:53:06'),
(55, '14:30:00', '2015-12-04', 0, 0, 25, 5, 18, 1, 1, 24, 2, 0, 0, 0, 0, 0, 1192.00, 0, 0.00, 1, 0, 0, 1, 0, 0, 0, 34, 'Contado', 21, 0, '2015-12-08 04:23:13', '2015-12-08 05:51:05'),
(56, '20:54:02', '2015-12-07', 0, 563, 6, 4, 12, 3, 1, 13, 0, 0, 0, 0, 0, 0, 2640.00, 1, 1.00, 1, 1, 0, 0, 0, 0, 1, 35, 'Contado', 0, 0, '2015-12-08 05:54:31', '2015-12-08 05:54:32'),
(57, '04:51:10', '2015-12-08', 0, 121, 7, 4, 22, 3, 1, 13, 12, 2, 0, 0, 0, 0, 0.00, 0, 0.00, 0, 0, 0, 1, 0, 0, 1, 37, 'Contado', 23, 0, '2015-12-08 13:52:05', '2015-12-08 14:07:57'),
(58, '16:25:01', '2015-12-08', 0, 0, 23, 4, NULL, 1, 1, 130, 15, 1, 0, 4, 1, 2, 30.00, 0, 0.00, 1, 0, 1, 1, 0, 0, 0, 39, 'Contado', 24, 0, '2015-12-09 01:29:17', '2015-12-09 01:33:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despegue_otros_cargo`
--

CREATE TABLE IF NOT EXISTS `despegue_otros_cargo` (
`id` int(10) unsigned NOT NULL,
  `despegue_id` int(10) unsigned NOT NULL,
  `otrosCargo_id` int(10) unsigned NOT NULL,
  `monto` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamientoclientes`
--

CREATE TABLE IF NOT EXISTS `estacionamientoclientes` (
`id` int(10) unsigned NOT NULL,
  `nombre` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costoUnidad` int(10) unsigned NOT NULL,
  `fechaSuscripcion` date NOT NULL,
  `isActivo` tinyint(1) NOT NULL,
  `nPagos` int(11) NOT NULL,
  `estacionamiento_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamientoconceptos`
--

CREATE TABLE IF NOT EXISTS `estacionamientoconceptos` (
`id` int(10) unsigned NOT NULL,
  `nombre` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `costo` double(8,2) NOT NULL,
  `estacionamiento_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamientoops`
--

CREATE TABLE IF NOT EXISTS `estacionamientoops` (
`id` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `nTaquillas` int(11) NOT NULL,
  `nTurnos` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `depositado` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamientooptarjetas`
--

CREATE TABLE IF NOT EXISTS `estacionamientooptarjetas` (
`id` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `estacionamientocliente_id` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `banco_id` int(10) unsigned NOT NULL,
  `bancoscuenta_id` int(10) unsigned NOT NULL,
  `total` double(8,2) NOT NULL,
  `deposito` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `estacionamientoop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamientooptickets`
--

CREATE TABLE IF NOT EXISTS `estacionamientooptickets` (
`id` int(10) unsigned NOT NULL,
  `econcepto_id` int(10) unsigned NOT NULL,
  `taquilla` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `costo` double(8,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` double(8,2) NOT NULL,
  `estacionamientoop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamientoopticketsdepositos`
--

CREATE TABLE IF NOT EXISTS `estacionamientoopticketsdepositos` (
`id` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `banco_id` int(10) unsigned NOT NULL,
  `bancoscuenta_id` int(10) unsigned NOT NULL,
  `total` double(8,2) NOT NULL,
  `deposito` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `estacionamientoop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamientoportons`
--

CREATE TABLE IF NOT EXISTS `estacionamientoportons` (
`id` int(10) unsigned NOT NULL,
  `nombre` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `estacionamiento_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamientos`
--

CREATE TABLE IF NOT EXISTS `estacionamientos` (
`id` int(10) unsigned NOT NULL,
  `nTaquillas` int(11) NOT NULL,
  `nTurnos` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `aeropuerto_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamiento_aeronaves`
--

CREATE TABLE IF NOT EXISTS `estacionamiento_aeronaves` (
`id` int(10) unsigned NOT NULL,
  `tiempoLibreInt` int(11) NOT NULL,
  `eq_bloqueInt` double(7,5) NOT NULL,
  `minBloqueInt` int(11) NOT NULL,
  `tiempoLibreNac` int(11) NOT NULL,
  `eq_bloqueNac` double(7,5) NOT NULL,
  `minBloqueNac` int(11) NOT NULL,
  `conceptoCredito_id` int(10) unsigned NOT NULL,
  `conceptoContado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `estacionamiento_aeronaves`
--

INSERT INTO `estacionamiento_aeronaves` (`id`, `tiempoLibreInt`, `eq_bloqueInt`, `minBloqueInt`, `tiempoLibreNac`, `eq_bloqueNac`, `minBloqueNac`, `conceptoCredito_id`, `conceptoContado_id`, `created_at`, `updated_at`) VALUES
(1, 120, 0.09810, 60, 60, 0.07480, 60, 69, 55, '0000-00-00 00:00:00', '2015-12-08 05:06:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturadetalles`
--

CREATE TABLE IF NOT EXISTS `facturadetalles` (
`id` int(10) unsigned NOT NULL,
  `factura_id` int(10) unsigned NOT NULL,
  `concepto_id` int(10) unsigned NOT NULL,
  `cantidadDes` int(10) unsigned NOT NULL,
  `montoDes` double(8,2) unsigned NOT NULL,
  `descuentoPerDes` double(8,2) unsigned NOT NULL,
  `descuentoTotalDes` double(8,2) unsigned NOT NULL,
  `ivaDes` double(8,2) unsigned NOT NULL,
  `recargoPerDes` double(8,2) unsigned NOT NULL,
  `recargoTotalDes` double(8,2) unsigned NOT NULL,
  `totalDes` double(8,2) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `facturadetalles`
--

INSERT INTO `facturadetalles` (`id`, `factura_id`, `concepto_id`, `cantidadDes`, `montoDes`, `descuentoPerDes`, `descuentoTotalDes`, `ivaDes`, `recargoPerDes`, `recargoTotalDes`, `totalDes`, `created_at`, `updated_at`) VALUES
(25, 20, 69, 1, 6260.76, 0.00, 0.00, 0.00, 0.00, 0.00, 6260.76, '2015-12-08 05:44:33', '2015-12-08 05:44:33'),
(26, 20, 68, 1, 3780.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3780.00, '2015-12-08 05:44:33', '2015-12-08 05:44:33'),
(27, 20, 58, 1, 1542.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1542.00, '2015-12-08 05:44:33', '2015-12-08 05:44:33'),
(28, 21, 69, 1, 1481.79, 0.00, 0.00, 0.00, 0.00, 0.00, 1481.79, '2015-12-08 05:51:05', '2015-12-08 05:51:05'),
(29, 21, 68, 1, 367.50, 0.00, 0.00, 0.00, 0.00, 0.00, 367.50, '2015-12-08 05:51:05', '2015-12-08 05:51:05'),
(30, 22, 69, 1, 2982.65, 0.00, 0.00, 0.00, 0.00, 0.00, 2982.65, '2015-12-08 05:53:06', '2015-12-08 05:53:06'),
(31, 22, 68, 1, 2887.50, 0.00, 0.00, 0.00, 0.00, 0.00, 2887.50, '2015-12-08 05:53:06', '2015-12-08 05:53:06'),
(32, 22, 58, 1, 1713.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1713.00, '2015-12-08 05:53:06', '2015-12-08 05:53:06'),
(33, 22, 56, 1, 2100.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2100.00, '2015-12-08 05:53:06', '2015-12-08 05:53:06'),
(34, 23, 54, 1, 3202.97, 0.00, 0.00, 0.00, 0.00, 0.00, 3202.97, '2015-12-08 14:07:57', '2015-12-08 14:07:57'),
(35, 23, 56, 1, 2100.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2100.00, '2015-12-08 14:07:57', '2015-12-08 14:07:57'),
(36, 24, 57, 1, 21.00, 0.00, 0.00, 0.00, 0.00, 0.00, 21.00, '2015-12-09 01:33:30', '2015-12-09 01:33:30'),
(37, 24, 55, 1, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2015-12-09 01:33:30', '2015-12-09 01:33:30'),
(38, 24, 54, 1, 435.00, 0.00, 0.00, 0.00, 0.00, 0.00, 435.00, '2015-12-09 01:33:30', '2015-12-09 01:33:30'),
(39, 25, 73, 1, 2475.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2475.00, '2015-12-09 02:26:51', '2015-12-09 02:26:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturametadatas`
--

CREATE TABLE IF NOT EXISTS `facturametadatas` (
`id` int(10) unsigned NOT NULL,
  `factura_id` int(10) unsigned NOT NULL,
  `ncobros` int(10) unsigned NOT NULL,
  `ncuotas` int(10) unsigned NOT NULL,
  `montoiniciocuota` double(15,2) NOT NULL,
  `montopagado` double(15,2) NOT NULL,
  `basepagado` double(15,2) NOT NULL,
  `ivapagado` double(15,2) NOT NULL,
  `islrpercentage` double NOT NULL,
  `ivapercentage` double NOT NULL,
  `retencion` double(15,2) NOT NULL,
  `total` double(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
`id` int(10) unsigned NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `condicionPago` enum('Crédito','Contado') COLLATE utf8_unicode_ci NOT NULL,
  `nControl` int(10) unsigned NOT NULL,
  `nFactura` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `subtotalNeto` double(8,2) unsigned NOT NULL,
  `descuentoTotal` double(8,2) unsigned NOT NULL,
  `subtotal` double(8,2) unsigned NOT NULL,
  `iva` double(8,2) unsigned NOT NULL,
  `recargoTotal` double(8,2) unsigned NOT NULL,
  `total` double(8,2) unsigned NOT NULL,
  `nroDosa` int(11) DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `isImpresa` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `aeropuerto_id`, `condicionPago`, `nControl`, `nFactura`, `fecha`, `fechaVencimiento`, `cliente_id`, `subtotalNeto`, `descuentoTotal`, `subtotal`, `iva`, `recargoTotal`, `total`, `nroDosa`, `descripcion`, `comentario`, `estado`, `isImpresa`, `created_at`, `updated_at`) VALUES
(1, 1, 'Crédito', 123, 123, '2015-10-17', '2015-11-26', 1, 1000.00, 0.00, 1000.00, 120.00, 0.00, 1120.00, NULL, 'Prueba', '', '', 0, '2015-10-26 18:12:28', '2015-10-26 18:12:28'),
(2, 1, 'Crédito', 11111, 1111, '2015-10-31', '2015-12-12', 1, 1233.00, 0.00, 1233.00, 147.96, 0.00, 1380.96, NULL, 'adsds', '', '', 0, '2015-10-26 18:14:46', '2015-10-26 18:14:46'),
(3, 1, 'Crédito', 12312, 13231, '2015-11-07', '2015-12-03', 1, 123123.00, 0.00, 123123.00, 14774.76, 0.00, 137897.76, NULL, 'sdfsd', '', '', 0, '2015-10-26 18:15:32', '2015-10-26 18:15:32'),
(4, 1, 'Crédito', 1234, 1234, '2015-12-02', '2016-01-02', 63, 114.50, 0.00, 114.50, 0.00, 0.00, 114.50, NULL, 'bla bla bla', '', '', 0, '2015-12-02 06:06:35', '2015-12-02 06:06:35'),
(5, 1, 'Crédito', 1122, 1122, '2015-12-02', '2016-01-02', 13, 247.50, 0.00, 247.50, 0.00, 0.00, 247.50, NULL, 'bla2 bla2 bla2', '', '', 0, '2015-12-02 06:12:20', '2015-12-02 06:12:20'),
(6, 1, 'Crédito', 1111, 2222, '2015-12-03', '2016-01-03', 8, 638.00, 0.00, 638.00, 0.00, 0.00, 638.00, NULL, 'Carga del Mes de Noviembre', '', '', 0, '2015-12-04 03:41:25', '2015-12-04 03:41:25'),
(7, 1, 'Crédito', 44, 47, '2015-12-03', '2016-01-03', 8, 638.00, 0.00, 638.00, 0.00, 0.00, 638.00, NULL, 'er', '', '', 0, '2015-12-04 03:45:52', '2015-12-04 03:45:52'),
(9, 1, 'Crédito', 45, 45, '2015-12-04', '2016-01-04', 40, 226.00, 0.00, 226.00, 0.00, 0.00, 226.00, NULL, '5rh', '', '', 0, '2015-12-04 04:56:23', '2015-12-04 04:56:23'),
(10, 1, 'Crédito', 1111, 111111, '2015-12-04', '2016-01-04', 13, 2100.00, 0.00, 2100.00, 0.00, 0.00, 2100.00, 1111, '1111', '', '', 0, '2015-12-04 21:05:41', '2015-12-04 21:05:41'),
(11, 1, 'Crédito', 1111, 1111, '2015-12-04', '2016-01-04', 13, 2100.00, 0.00, 2100.00, 0.00, 0.00, 2100.00, 1111, 'hhh', '', '', 0, '2015-12-04 21:06:34', '2015-12-04 21:06:34'),
(12, 1, 'Crédito', 1111, 11111, '2015-12-04', '2016-01-04', 13, 2100.00, 0.00, 2100.00, 0.00, 0.00, 2100.00, 11111, 'ñññ', '', '', 0, '2015-12-04 21:07:20', '2015-12-04 21:07:20'),
(13, 1, 'Crédito', 123, 121, '2015-12-04', '2016-01-04', 127, 2100.00, 0.00, 2100.00, 0.00, 0.00, 2100.00, 1414, 'tyutyut', '', '', 0, '2015-12-04 21:11:46', '2015-12-04 21:11:46'),
(14, 1, 'Crédito', 123, 121, '2015-12-04', '2016-01-04', 127, 2100.00, 0.00, 2100.00, 0.00, 0.00, 2100.00, 1414, 'tyutyut', '', '', 0, '2015-12-04 21:13:06', '2015-12-04 21:13:06'),
(15, 1, 'Crédito', 123, 121, '2015-12-04', '2016-01-04', 127, 2100.00, 0.00, 2100.00, 0.00, 0.00, 2100.00, 1414, 'tyutyut', '', '', 0, '2015-12-04 21:14:05', '2015-12-04 21:14:05'),
(16, 1, 'Crédito', 111, 111, '2015-12-07', '2016-01-07', 8, 638302.50, 0.00, 638302.50, 0.00, 0.00, 638302.50, NULL, 'Da', '', '', 0, '2015-12-08 02:01:03', '2015-12-08 02:01:03'),
(17, 1, 'Crédito', 3333, 33333, '2015-12-07', '2016-01-07', 4, 999999.99, 0.00, 999999.99, 0.00, 0.00, 999999.99, NULL, 'ttttt', '', '', 0, '2015-12-08 02:09:25', '2015-12-08 02:09:25'),
(18, 1, 'Crédito', 3333, 33333, '2015-12-07', '2016-01-07', 4, 999999.99, 0.00, 999999.99, 0.00, 0.00, 999999.99, NULL, 'ttttt', '', '', 0, '2015-12-08 02:09:33', '2015-12-08 02:09:33'),
(19, 1, 'Crédito', 111, 11111, '2015-12-07', '2016-01-07', 8, 638302.50, 0.00, 638302.50, 0.00, 0.00, 638302.50, NULL, 'ffef', '', '', 0, '2015-12-08 02:34:49', '2015-12-08 02:34:49'),
(20, 1, 'Crédito', 1234, 1234, '2015-12-08', '2016-01-08', 40, 11582.76, 0.00, 11582.76, 0.00, 0.00, 11582.76, 1234, 'Factura', '', '', 0, '2015-12-08 05:44:32', '2015-12-08 05:44:32'),
(21, 1, 'Crédito', 1235, 1235, '2015-12-08', '2016-01-08', 24, 1849.29, 0.00, 1849.29, 0.00, 0.00, 1849.29, 1235, 'Factura', '', '', 0, '2015-12-08 05:51:05', '2015-12-08 05:51:05'),
(22, 1, 'Crédito', 1236, 1236, '2015-12-08', '2016-01-08', 124, 9683.15, 0.00, 9683.15, 0.00, 0.00, 9683.15, 1236, 'Factura Crédito Con Habilitación', '', '', 0, '2015-12-08 05:53:06', '2015-12-08 05:53:06'),
(23, 1, 'Contado', 1237, 1237, '2015-12-08', '2016-01-08', 13, 5302.97, 0.00, 5302.97, 0.00, 0.00, 5302.97, 1237, 'factura', '', '', 0, '2015-12-08 14:07:57', '2015-12-08 14:07:57'),
(24, 1, 'Contado', 1111, 1111, '2015-12-08', '2016-01-08', 130, 399.90, 0.00, 399.90, 0.00, 0.00, 399.90, 1111, 'Factura Contado', '', 'P', 0, '2015-12-09 01:33:30', '2015-12-09 01:33:30'),
(25, 1, 'Crédito', 1111, 1111, '2015-12-08', '2016-01-08', 13, 2475.00, 0.00, 2475.00, 0.00, 0.00, 2475.00, NULL, 'Carga ', '', 'P', 0, '2015-12-09 02:26:51', '2015-12-09 02:26:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `footers`
--

CREATE TABLE IF NOT EXISTS `footers` (
`id` int(10) unsigned NOT NULL,
  `footer` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hangars`
--

CREATE TABLE IF NOT EXISTS `hangars` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `hangars`
--

INSERT INTO `hangars` (`id`, `nombre`, `aeropuerto_id`, `created_at`, `updated_at`) VALUES
(2, '1-A', 1, '2015-09-11 00:50:52', '2015-09-11 00:50:52'),
(5, '4-A', 1, '2015-09-11 02:02:04', '2015-09-11 02:02:04'),
(6, '5-A', 1, '2015-09-11 02:02:11', '2015-09-11 02:02:11'),
(7, '6-A', 1, '2015-09-11 02:02:20', '2015-09-11 02:02:20'),
(8, '7-A', 1, '2015-09-11 02:02:37', '2015-09-11 02:02:37'),
(9, '8-A', 1, '2015-09-11 02:02:43', '2015-09-11 02:02:43'),
(10, '9-A', 1, '2015-09-11 02:03:45', '2015-09-11 02:03:45'),
(11, '10-A', 1, '2015-09-11 02:03:54', '2015-09-11 02:03:54'),
(12, '11-A', 1, '2015-09-11 02:04:03', '2015-09-11 02:04:03'),
(13, '1-B', 1, '2015-09-11 02:04:20', '2015-09-11 02:04:20'),
(14, '2-B', 1, '2015-09-11 02:04:27', '2015-09-11 02:04:27'),
(15, '3-B', 1, '2015-09-11 02:04:34', '2015-09-11 02:04:34'),
(16, '4-B', 1, '2015-09-11 02:04:41', '2015-09-11 02:07:54'),
(17, '5-B', 1, '2015-09-11 02:04:52', '2015-09-11 02:04:52'),
(19, '2-A', 1, '2015-09-11 02:15:32', '2015-09-11 02:15:32'),
(20, '3-A', 1, '2015-09-11 02:15:45', '2015-09-11 02:15:45'),
(21, '6-B', 1, '2015-09-11 02:16:49', '2015-09-11 02:16:49'),
(22, '7-B', 1, '2015-09-11 02:17:12', '2015-09-11 02:17:12'),
(23, '8-B', 1, '2015-09-11 02:17:28', '2015-09-11 02:17:28'),
(24, '9-B', 1, '2015-09-11 02:17:34', '2015-09-11 02:17:34'),
(25, '10-B', 1, '2015-09-11 02:17:46', '2015-09-11 02:17:46'),
(26, '11-B', 1, '2015-09-11 02:18:03', '2015-09-11 02:18:03'),
(27, '12-B', 1, '2015-09-11 02:18:16', '2015-09-11 02:18:16'),
(28, '13-B', 1, '2015-09-11 02:18:51', '2015-09-11 02:18:51'),
(29, '14-B', 1, '2015-09-11 02:18:59', '2015-09-11 02:18:59'),
(30, '1-C', 1, '2015-09-11 02:19:26', '2015-09-11 02:19:26'),
(31, '2-C', 1, '2015-09-11 02:19:36', '2015-09-11 02:19:36'),
(32, '3-C', 1, '2015-09-11 02:19:42', '2015-09-11 02:19:42'),
(33, '4-C', 1, '2015-09-11 02:19:48', '2015-09-11 02:19:48'),
(34, '5-C', 1, '2015-09-11 02:19:53', '2015-09-11 02:19:53'),
(35, '6-C', 1, '2015-09-11 02:20:00', '2015-09-11 02:20:00'),
(36, '7-C', 1, '2015-09-11 02:20:06', '2015-09-11 02:20:06'),
(37, '8-C', 1, '2015-09-11 02:20:20', '2015-09-11 02:20:20'),
(38, '9-C', 1, '2015-09-11 02:20:28', '2015-09-11 02:20:28'),
(39, '10-C', 1, '2015-09-11 02:20:37', '2015-09-11 02:20:37'),
(40, '11-C', 1, '2015-09-11 02:21:11', '2015-09-11 02:21:11'),
(41, '12-C', 1, '2015-09-11 02:21:18', '2015-09-11 02:21:18'),
(42, '13-C', 1, '2015-09-11 02:21:24', '2015-09-11 02:21:24'),
(43, '14-C', 1, '2015-09-11 02:21:34', '2015-09-11 02:21:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_aeronauticos`
--

CREATE TABLE IF NOT EXISTS `horarios_aeronauticos` (
`id` int(10) unsigned NOT NULL,
  `operaciones_inicio` time NOT NULL,
  `operaciones_fin` time NOT NULL,
  `sol_salida` time NOT NULL,
  `sol_puesta` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `horarios_aeronauticos`
--

INSERT INTO `horarios_aeronauticos` (`id`, `operaciones_inicio`, `operaciones_fin`, `sol_salida`, `sol_puesta`, `created_at`, `updated_at`) VALUES
(1, '05:00:00', '23:59:00', '05:00:00', '17:30:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_tasas`
--

CREATE TABLE IF NOT EXISTS `lista_tasas` (
`id` int(10) unsigned NOT NULL,
  `opcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `relacion` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metas`
--

CREATE TABLE IF NOT EXISTS `metas` (
`id` int(10) unsigned NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meta_detalles`
--

CREATE TABLE IF NOT EXISTS `meta_detalles` (
`id` int(10) unsigned NOT NULL,
  `meta_id` int(10) unsigned NOT NULL,
  `concepto_id` int(10) unsigned NOT NULL,
  `gobernacion_meta` double(8,2) NOT NULL,
  `saar_meta` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_01_12_210508_crear_tabla_usuario', 1),
('2015_01_15_105324_create_roles_table', 1),
('2015_01_15_114412_create_role_user_table', 1),
('2015_01_26_115212_create_permissions_table', 1),
('2015_01_26_115523_create_permission_role_table', 1),
('2015_02_09_132439_create_permission_user_table', 1),
('2015_06_19_203145_create_departamentos_table', 1),
('2015_06_19_203850_create_cargos_table', 1),
('2015_06_19_203900_create_aeropuertos_table', 1),
('2015_06_19_204816_claves_foraneas_tabla_usuarios', 1),
('2015_06_22_152418_creacion_tablas_estacionamiento', 1),
('2015_06_23_022444_creacion_tablas_bancos_cuentas', 1),
('2015_06_23_145953_create_pais_table', 1),
('2015_06_25_145636_create_tipo_aeronaves_table', 1),
('2015_06_25_145710_create_modelo_aeronaves_table', 1),
('2015_06_25_160950_create_puertos_table', 1),
('2015_07_20_185459_create_nacionalidad_matriculas_table', 1),
('2015_07_21_150533_creacion_tabla_cliente', 1),
('2015_07_21_160679_create_hangars_table', 1),
('2015_07_21_160999_create_tipo_matriculas_table', 1),
('2015_07_21_161000_create_aeronaves_table', 1),
('2015_07_22_154747_create_pilotos_table', 1),
('2015_07_22_174910_create_contratos_table', 1),
('2015_07_22_180751_create_modulos_table', 1),
('2015_07_23_060536_create_facturas_table', 1),
('2015_08_04_152519_create_cliente_hangar_table', 1),
('2015_08_20_160827_creacion_tabla_facturametadatas', 1),
('2015_08_20_181530_creacion_tablas_cobranzas', 1),
('2015_01_12_210508_crear_tabla_usuario', 1),
('2015_01_15_105324_create_roles_table', 1),
('2015_01_15_114412_create_role_user_table', 1),
('2015_01_26_115212_create_permissions_table', 1),
('2015_01_26_115523_create_permission_role_table', 1),
('2015_02_09_132439_create_permission_user_table', 1),
('2015_06_19_203145_create_departamentos_table', 1),
('2015_06_19_203850_create_cargos_table', 1),
('2015_06_19_203900_create_aeropuertos_table', 1),
('2015_06_19_204816_claves_foraneas_tabla_usuarios', 1),
('2015_06_22_152418_creacion_tablas_estacionamiento', 1),
('2015_06_23_022444_creacion_tablas_bancos_cuentas', 1),
('2015_06_23_145953_create_pais_table', 1),
('2015_06_25_145636_create_tipo_aeronaves_table', 1),
('2015_06_25_145710_create_modelo_aeronaves_table', 1),
('2015_06_25_160950_create_puertos_table', 1),
('2015_07_20_185459_create_nacionalidad_matriculas_table', 1),
('2015_07_21_150533_creacion_tabla_cliente', 1),
('2015_07_21_160679_create_hangars_table', 1),
('2015_07_21_160999_create_tipo_matriculas_table', 1),
('2015_07_21_161000_create_aeronaves_table', 1),
('2015_07_22_154747_create_pilotos_table', 1),
('2015_07_22_174910_create_contratos_table', 1),
('2015_07_22_180751_create_modulos_table', 1),
('2015_07_23_060536_create_facturas_table', 1),
('2015_08_04_152519_create_cliente_hangar_table', 1),
('2015_08_20_160827_creacion_tabla_facturametadatas', 1),
('2015_08_20_181530_creacion_tablas_cobranzas', 1),
('2015_10_02_221826_create_nacionalidad_vuelos_table', 2),
('2015_10_03_145826_create_vuelos_table', 3),
('2015_10_05_145826_create_vuelos_table', 4),
('2015_10_05_145827_create_vuelos_table', 5),
('2015_10_05_145828_create_vuelos_table', 6),
('2015_10_05_192529_create_aterrizajes_table', 7),
('2015_10_05_194317_create_desembarques_table', 8),
('2015_10_07_194317_create_desembarques_table', 9),
('2015_10_07_194318_create_desembarques_table', 10),
('2015_10_07_190738_create_desembarques_table', 11),
('2015_10_07_191032_create_desembarques_table', 12),
('2015_10_07_191326_create_aterrizajes_table', 13),
('2015_10_07_191327_create_aterrizajes_table', 14),
('2015_10_09_191328_create_aterrizajes_table', 15),
('2015_10_09_201851_create_montos_fijos_table', 16),
('2015_10_14_195516_create_precios_aterrizajes_despegues_table', 17),
('2015_10_15_161731_create_estacionamiento_aeronaves_table', 18),
('2015_10_15_200735_create_horarios_aeronaticos_table', 19),
('2015_10_15_200735_create_horarios_aeronauticos_table', 20),
('2015_10_20_194806_create_horarios_aeronauticos_table', 21),
('2015_10_20_195000_create_cargos_varios_table', 21),
('2015_10_28_144452_create_precios_cargas_table', 22),
('2015_10_28_160450_create_precios_otros_cargos_table', 23),
('2015_10_28_185118_create_otros_cargos_table', 23),
('2015_10_29_160450_create_precios_otros_cargos_table', 24),
('2015_10_29_185118_create_otros_cargos_table', 24),
('2015_10_30_185118_create_otros_cargos_table', 25),
('2015_11_06_135819_create_metas_table', 25),
('2015_11_06_135827_create_meta_detalles_table', 25),
('2015_11_09_141140_create_despegues_table', 25),
('2015_11_12_163326_create_concils_table', 25),
('2015_11_12_163501_create_footers_table', 25),
('2015_11_12_163515_create_lista_tasas_table', 25),
('2015_11_12_163533_create_tasa_cierres_table', 25),
('2015_11_12_163551_create_ta_tasas_table', 25),
('2015_11_12_163600_create_tip_tas_table', 25),
('2015_11_12_163608_create_topes_table', 25),
('2015_11_20_143239_create_cargas_table', 25),
('2015_11_30_020918_create_despegue_otros_cargo_table', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_aeronaves`
--

CREATE TABLE IF NOT EXISTS `modelo_aeronaves` (
`id` int(10) unsigned NOT NULL,
  `modelo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `peso_maximo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=461 ;

--
-- Volcado de datos para la tabla `modelo_aeronaves`
--

INSERT INTO `modelo_aeronaves` (`id`, `modelo`, `peso_maximo`, `tipo_id`, `created_at`, `updated_at`) VALUES
(1, '206B3', '1500', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '8R-GHB', '2500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'A-109', '2000', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'A-119', '3000', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'A-300', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'A-310', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'A-319', '76000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'A-320', '78000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'A-330', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'A-340-200', '275000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'A-340-300', '260000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'A-36', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'AA-5B', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'AASB', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'AC-14', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'AC-21', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'AC-500', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'AC-520', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'AC-560', '2800', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'AC-600', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'AC-640', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'AC-680', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'AC-690', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'AC-695', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'AC-81', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'AC-840', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'AC-90', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'AC-900', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'AC-980', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'AE-355', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'AEROESTAR 600', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'AG-109', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'AG-109C', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'AJ-25', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'AK-88B', '4000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'ALOUETTE-2', '650', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'ALOVTTE 2', '1500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'AMT-200', '850', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'AN-124-100', '300000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'AN-12BP', '61000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'AN-2', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'AN-26', '24000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'AN-28', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'AN-II', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'AP-681P', '2590', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'AP-68P', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'as-350b', '1300', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'AS-355F1', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'AS-TR', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'ASTR-SPX', '11000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'AT-401', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'AT-42', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'AT-502B', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'ATR-42', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'ATR-42-500', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'ATR-72', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'ATR-72500', '22000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'B-190', '7815', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'B-206 B', '1500', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'B-212', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'B-300', '6500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'B-407', '2500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'B-427', '2682', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'B-707', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'B-707-300', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'B-727', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'B-727-100', '69000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'B-727-200', '87000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'B-727-227', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'B-727-300', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'B-737-200', '53000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'B-737-200RDV', '55000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'B-737-241', '52390', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'B-737-300', '57000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'B-737-400', '66000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'B-737-500', '66000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'B-737-700', '68000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'B-737-800', '79010', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'B-747', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'B-747-200', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'B-752', '114000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'B-757', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'B-757-2', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'B-757-236', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'B-767', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'B-767-100', '142881', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'B-767-3', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'B-767-300', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'B-777-200', '294200', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'B-777-300', '299370', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'BA-31', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'BA-900', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'BAE-800', '12000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'BE-02', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'BE-10', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'BE-100', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'BE-109', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'BE-18', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'BE-1900', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'BE-1900-D', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'BE-20', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'BE-200', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'BE-23', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'BE-24r', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'BE-300', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'BE-33', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'BE-35', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'BE-350', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'BE-36', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'BE-400', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'BE-50', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'BE-55', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'BE-58', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'BE-60', '4000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'BE-65', '4000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'BE-76', '4000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'BE-80', '4000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'BE-90', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'BE-95', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'BE-99', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'BE-9L', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'BELL-206L', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'BELL-222U', '4500', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'BELL-406', '2200', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'BELL-407', '2000', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'BELL-412', '5410', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'BELL-427', '2100', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'BELL-429', '3175', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'BELL-L3', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'BELL206', '1000', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'BELL206BIII', '1000', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'BELL230', '4000', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'BH-06', '2000', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'BH-07', '2268', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'BH-206', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'BH-412', '3000', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'BID-1900', '7700', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'BL-26', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'BN-2', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'BN-3', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'BN-III', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'BN2', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'BO-105', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'C-1', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'C-130J HERCULES', '70310', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'C-152', '800', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'C-160', '50000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'C-172', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'C-177', '1600', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'C-17A GLOBEMAST', '266000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'C-182', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'C-185', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'C-206', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'C-207', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'C-208', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'C-208B', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'C-210', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'C-212', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'C-302', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'C-303', '1500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'C-310', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'C-335', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'C-337', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'C-340', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'C-401', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'C-402', '4000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'C-404', '4000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'C-406', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'C-411', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'C-414', '2856', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'C-421', '4000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'C-425', '4000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'C-440', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'C-441', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'C-500', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'C-501', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'C-510', '3921', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'C-525', '4800', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'C-52A', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'C-550', '7000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'C-551', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'C-560', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'C-56X', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'C-601', '21000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'C-650', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'C-750', '16195', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'C-III', '9500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'CHALLENGER', '19618', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'CL-22', '20000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'CL-300', '26000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'CL-60', '21000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'CL-600', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'CL-601', '20200', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'CL-602', '22000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'CL-604', '21000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'CL-605', '21000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'CL-64', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'CN-232', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'CN-235', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'CRJ-700', '21000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'CV-24', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'CV-340', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'CV-440', '15500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'CV-580', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'CW-3', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'D-228-2', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'D-28', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'D-328', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'D02802', '3500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'DA-10', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'DA-20', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'DA-50', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'DA-90', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'DAS-8-300', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'DASH 7', '12273', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'DASH-7', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'DC-10', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'DC-10-10', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'DC-10-15', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'DC-10-30', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'DC-10/15', '206400', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'DC-3', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'DC-3C', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'DC-6', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'DC-8', '159091', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'DC-9', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'DC-9-15', '43000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'DC-9-30', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'DC-9-31', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'DC-9-32', '50000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'DC-9-34CF', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'DC-9-50', '55000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'DC-9-51', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'DC-9-82', '66000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'DC-9-83', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'DH-06', '5682', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'DH-7', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'DH-8', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'DHS-7', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'DO-C6', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'DSH7', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'E-120', '12000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'E50-P', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'EA-30', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'EA-31', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'EA-320', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'EC-120', '900', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'EC-130', '2427', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'EC-135', '2800', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'EMB-110', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'EMB-120', '12000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 'EMB-135BJ', '22500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'EMB-190-100', '51800', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 'EMB-810', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'EPIC', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 'ERJ-145', '22000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 'F-10', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 'F-100', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 'F-20', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 'F-27', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 'F-50', '17300', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 'F-900', '20000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 'FA-50', '20000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 'FALCOM 2000LX', '19142', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 'G-02', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 'G-100', '12000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 'G-150', '12000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 'G-159', '16200', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 'G-200', '16000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 'G-280', '16000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 'G-3', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 'G-4', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 'G-73', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 'G-II', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 'GA-8', '1800', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 'GA-LX', '16000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 'GL-25', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 'GL-F2', '28000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 'GL-F4', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 'GLEX', '55000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 'GLF-3', '31615', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 'GLF-5', '41300', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 'GLF/5M', '40910', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 'GULFTREAM', '33000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 'GULFTREAM - G550', '34156', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 'H-25A', '11000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 'H-25B', '12000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 'H-400', '8500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 'H-500C', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 'H-500D', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 'H-700', '13000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 'H-800', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 'H-A1', '1200', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 'H-M18', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 'HA-1', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 'HF-32', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 'HI-125', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 'HP-137', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 'HS-125', '9000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 'HS-155', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 'HS-25', '12500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 'HS-25A', '12000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 'HS-400', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 'HS-800', '12600', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 'IL-18', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 'IL-62', '60000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 'IL-62M', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 'IL-76', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 'J-328', '16000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 'JC-1121', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 'JCOM', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 'JS-31', '7000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 'JS-32', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 'KODI', '3770', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 'L-1011', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 'L-1011-500', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 'L-1329', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 'L-329', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 'L-39', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 'LANCER', '1000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 'LC-30', '1454', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 'LEARJET 55', '9525', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 'LET-410', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 'LJ-25', '7000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 'LJ-31', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 'LJ-35', '8319', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 'LJ-45', '9752', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 'LJ-55', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 'LJ-60', '11000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 'LNC-4', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 'LONG-RANGER', '1500', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 'LOR-35', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 'LR-23', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 'LR-24', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, 'LR-25', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 'LR-28', '7000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 'LR-31', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 'LR-31A', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, 'LR-35', '7000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 'LR-35A', '7000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 'LR-36', '8910', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 'LR-45', '9320', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 'LR-55', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 'LR-60', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, 'LR-915', '1500', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, 'M-02K', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, 'M-20P', '1246', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, 'M-20R', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, 'M-21', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, 'M-220J', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 'M-26', '1200', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 'M-28', '7000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 'M-3', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 'M-7', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 'MALIBU', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 'MD-11', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, 'MD-500', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 'MD-500E', '1500', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 'MD-520', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, 'MD-600', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, 'MD-80', '67955', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(362, 'MD-82', '64000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, 'MD-83', '72000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, 'MD-87', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, 'MD-88', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, 'MD-90', '75500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, 'MD-900', '3000', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, 'MI-02', '3000', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, 'MI-8', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, 'MID-2', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, 'MO-20', '1800', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, 'MO-21', '1000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, 'MR-404', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, 'MU-2', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, 'MU-2B', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, 'MU-30', '7000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, 'MU-300', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, 'MU-60', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, 'MV-02', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, 'MY-20', '3000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, 'N-235', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, 'N-265', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, 'N-265-60', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, 'N-327AR   LJ-60', '23500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, 'N-731PC', '3200', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, 'NA-265', '9000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, 'NE-821', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, 'P-58', '2495', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, 'P-68T', '2627', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, 'P68C', '1600', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, 'PA-18', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, 'PA-22', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, 'PA-23', '2360', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, 'PA-28', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, 'PA-30', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, 'PA-31', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, 'PA-31T', '3200', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, 'PA-32', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, 'PA-34', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, 'PA-38', '920', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, 'PA-41', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, 'PA-42', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, 'PA-44', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, 'PA-46', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, 'PA-60', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, 'PAT-31', '3200', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, 'PAY-1', '2800', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, 'PAY-2', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(409, 'PC-68', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, 'PC12', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, 'PH-206', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, 'PIPER-28', '1450', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(413, 'PR-M1', '6000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(414, 'PY1', '4000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(415, 'R-22', '410', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(416, 'R-44', '800', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(417, 'RANYE', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(418, 'RF-10', '850', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(419, 'RL-893', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(420, 'S-135', '2700', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(421, 'S-300C', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(422, 'S-350', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, 'S2R', '2800', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(424, 'SAAB-340B', '13155', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(425, 'SBR1', '9000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(426, 'SC-80', '9000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(427, 'SD-360', '10387', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(428, 'SE-210', '52000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(429, 'SF-34', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(430, 'SIKORSKI', '3500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(431, 'SK-59', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(432, 'SK-76', '0', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(433, 'SL-265', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(434, 'SL-8', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(435, 'SR-20', '1500', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(436, 'SR-22', '1900', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(437, 'SR22', '1900', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(438, 'ST-200', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(439, 'SW-2', '4600', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, 'SW-3', '5680', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, 'SW-4', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, 'T-39', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, 'TB-9', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, 'TS-60', '2800', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, 'TU-154M', '100000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, 'TWINS OSTER', '5300', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(447, 'V35B', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(448, 'VU-93', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(449, 'W-201', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(450, 'WW-1123', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(451, 'WW-1124', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(452, 'WW-2', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(453, 'WW-23', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(454, 'WW-24', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(455, 'XSH-500', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(456, 'Y-12', '12000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(457, 'YAK-40', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(458, 'YAK-42', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(459, 'YAK-42D', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(460, 'YV-136T', '4800', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `isRetencion` tinyint(1) NOT NULL,
  `isPredeterminado` tinyint(1) NOT NULL,
  `aeropuerto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `nombre`, `descripcion`, `isRetencion`, `isPredeterminado`, `aeropuerto_id`, `created_at`, `updated_at`) VALUES
(2, 'CANON', 'ARRENDAMIENTO DE LOCALES COMERCIALES', 0, 0, 1, '2015-08-04 15:40:52', '2015-08-08 01:50:09'),
(3, 'PUBLICIDAD', 'INGRESOS POR ALQUILER DE ESPACIOS PUBLICITARIOS', 0, 0, 1, '2015-08-08 01:50:37', '2015-08-08 01:50:37'),
(4, 'ESTACIONAMIENTO', 'INGRESOS POR TICKETS DE ESTACIONAMIENTO DE VEHICULOS', 0, 0, 1, '2015-08-08 01:51:06', '2015-08-08 01:51:06'),
(5, 'DOSAS', 'MANEJO DE MOVIMIENTOS AERONAUTICOS POR CONTROL DE VUELO', 0, 0, 1, '2015-08-08 01:51:53', '2015-08-08 01:51:53'),
(6, 'CARGA', '', 0, 0, 1, '2015-12-04 20:13:03', '2015-12-04 20:13:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montos_fijos`
--

CREATE TABLE IF NOT EXISTS `montos_fijos` (
`id` int(10) unsigned NOT NULL,
  `unidad_tributaria` double(8,2) NOT NULL,
  `dolar_oficial` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `montos_fijos`
--

INSERT INTO `montos_fijos` (`id`, `unidad_tributaria`, `dolar_oficial`, `created_at`, `updated_at`) VALUES
(1, 150.00, 195.25, '0000-00-00 00:00:00', '2015-10-15 00:36:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad_matriculas`
--

CREATE TABLE IF NOT EXISTS `nacionalidad_matriculas` (
`id` int(10) unsigned NOT NULL,
  `siglas` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=252 ;

--
-- Volcado de datos para la tabla `nacionalidad_matriculas`
--

INSERT INTO `nacionalidad_matriculas` (`id`, `siglas`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'YA', 'Afganistán', '2015-08-31 15:47:40', '0000-00-00 00:00:00'),
(2, 'ZA', 'Albania', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'D', 'Alemania', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'C3', 'Andorra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'D2', 'Angola', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'VP-LA', 'Anguila', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'V2', 'Antigua y Barbuda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'HZ', 'Arabia Saudita', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '7T', 'Argelia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'LV', 'Argentina', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'EK', 'Armenia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'P4', 'Aruba', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'VH', 'Australia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'OE', 'Austria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '4K', 'Azerbaiyá', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(21, 'C6', 'Bahamas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'S2', 'Bangladés', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(23, '8P', 'Barbados', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'A9', 'Baréis', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(25, 'OO', 'Bélgica', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(26, 'V3', 'Belice', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'TY', 'Benín', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(29, 'VR-B', 'Bermudas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'EW', 'Bielorrusia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'XY', 'Myanmar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'CP', 'Bolivia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'T9', 'Bosnia y Herzegovina', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'A2', 'Botsuana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'PP', 'Brasil', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'V8', 'Brunéi', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(45, 'LZ', 'Bulgaria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'XT', 'Burkina Faso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '9U', 'Burundi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'A5', 'Bután', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(49, 'D4', 'Cabo Verde', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'XU', 'Camboya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'TJ', 'Camerú', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(52, 'CF', 'Canadá', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(56, 'A7', 'Catar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'TT', 'Chad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'CC', 'Chile', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'B', 'China', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'B', 'República de China', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(61, '5B', 'Chipre', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'HK', 'Colombia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'D6', 'Comoras', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'P', 'Corea del Norte', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'HL', 'Corea del Sur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'TU', 'Costa de Marfil', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'TI', 'Costa Rica', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, '9A', 'Croacia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'CU', 'Cuba', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'OY', 'Dinamarca', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'OY', 'Dinamarca', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'J7', 'Dominica', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'HC', 'Ecuador', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'SU', 'Egipto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'YS', 'El Salvador', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'A6', 'Emiratos Árabes Unidos', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(85, 'E3', 'Eritrea', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'OM', 'Eslovaquia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'S5', 'Eslovenia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'EC', 'España', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(89, 'N', 'Estados Unidos', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'ES', 'Estonia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'ET', 'Etiopía', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(92, 'RP', 'Filipinas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'OH', 'Finlandia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'DQ', 'Fiyi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'F', 'Francia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'TR', 'Gabón', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(100, 'C5', 'Gambia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, '4L', 'Georgia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, '9G', 'Ghana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'VP', 'Gibraltar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'J3', 'Granada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'SX', 'Grecia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'OY', 'Groenlandia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'TG', 'Guatemala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, '3X', 'Guinea', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'J5', 'Guinea-Bisáu', '2015-08-31 15:43:37', '0000-00-00 00:00:00'),
(110, '3C', 'Guinea Ecuatorial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, '8R', 'Guyana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'HH', 'Haití', '2015-08-31 15:43:38', '0000-00-00 00:00:00'),
(113, 'HR', 'Honduras', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'VR-H', 'Hong Kong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'HA', 'Hungría', '2015-08-31 15:43:38', '0000-00-00 00:00:00'),
(118, 'VT', 'India', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'PK', 'Indonesia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'YI', 'Irak', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'EP', 'Irán', '2015-08-31 15:43:38', '0000-00-00 00:00:00'),
(122, 'EI', 'Irlanda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'M1', 'Isla de Man', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'TF', 'Islandia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'VP', 'Islas Caimá', '2015-08-31 15:43:38', '0000-00-00 00:00:00'),
(126, 'E5', 'Islas Cook', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'OY', 'Islas Feroe', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'VP', 'Islas Malvinas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'V7', 'Islas Marshall', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'H4', 'Islas Salomón', '2015-08-31 15:43:38', '0000-00-00 00:00:00'),
(131, 'VQ', 'Islas Turcas y Caico', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'VP', 'Islas Vírgenes Británicas', '2015-08-31 15:43:38', '0000-00-00 00:00:00'),
(133, '4X', 'Israel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'I', 'Italia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, '6Y', 'Jamaica', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'JA', 'Japón', '2015-08-31 15:45:51', '0000-00-00 00:00:00'),
(137, 'JY', 'Jordania', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'UN', 'Kazajistán', '2015-08-31 15:45:51', '0000-00-00 00:00:00'),
(139, '5Y', 'Kenia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'EX', 'Kirguistán', '2015-08-31 15:45:51', '0000-00-00 00:00:00'),
(141, 'T3', 'Kiribati', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, '9K', 'Kuwait', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'RD', 'Laos', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, '7P', 'Lesoto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'YL', 'Letonia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'OD', 'Líbano', '2015-08-31 15:45:51', '0000-00-00 00:00:00'),
(147, 'A8', 'Liberia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, '5A', 'Libia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'LY', 'Lituania', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'LX', 'Luxemburgo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'B-', 'Macao', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'Z3', 'Macedonia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, '5R', 'Madagascar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, '9M', 'Malasia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, '7Q', 'Malaui', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, '8Q', 'Maldivas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'TZ', 'Malí', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(158, '9H', 'Malta', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'CN', 'Marruecos', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, '3B', 'Mauricio', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, '5T', 'Mauritania', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'XA', 'México', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(163, 'XB', 'México', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(164, 'XC', 'México', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(165, 'V6', 'Micronesia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'ER', 'Moldavia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, '3A', 'Mónaco', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(168, 'JU', 'Mongolia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, '4O', 'Montenegro', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'VP', 'Montserrat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'C9', 'Mozambique', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'V5', 'Namibia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'C2', 'Nauru', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, '9N', 'Nepal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'YN', 'Nicaragua', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, '5U', 'Nigería', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(177, '5N', 'Nigeria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'LN', 'Noruega', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'ZK', 'Nueva Zelanda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'A4', 'Omán', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(181, '4U', 'ONU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'PH', 'Países Bajos', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(183, 'PJ', 'Antillas Neerlandesa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'AP', 'Pakistán', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(185, 'HP', 'Panamá', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(186, 'P2', 'Papúa Nueva Guinea', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(187, 'ZP', 'Paraguay', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'OB', 'Perú', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(193, 'SP', 'Polonia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'CS', 'Portugal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'G', 'Reino Unido', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'TL', 'República Centroafricana', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(197, 'OK', 'República Checa', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(198, 'TN', 'República del Congo', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(199, '9Q', 'República Democrática del Zaire', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(200, 'HI', 'República Dominicana', '2015-08-31 15:45:52', '0000-00-00 00:00:00'),
(201, '9X', 'Ruanda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'YR', 'Rumania', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'RA', 'Rusia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, '5W', 'Samoa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'V4', 'San Cristóbal y Nieves', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(206, 'T7', 'San Marino', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'J8', 'San Vicente y las Granadinas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'VQ', 'Santa Helena', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'J6', 'Santa Lucía', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(210, 'S9', 'Santo Tomé y Príncipe', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(211, '6V', 'Senegal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'YU', 'Serbia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'S7', 'Seychelles', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, '9L', 'Sierra Leona', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, '9V', 'Singapur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'YK', 'Siria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, '6O', 'Somalia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, '4R', 'Sri Lanka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, '3D', 'Suazilandia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'ZS', 'Sudáfrica', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(224, 'ST', 'Sudán', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(225, 'SE', 'Suecia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'HB', 'Suiza', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'PZ', 'Surinam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'F-', 'Tahití', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(229, 'HS', 'Tailandia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, '5H', 'Tanzania', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'EY', 'Tayikistán', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(232, '4W', 'Timor Oriental', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, '5V', 'Togo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'A3', 'Tonga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, '9Y', 'Trinidad y Tobago', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'TS', 'Túnez', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(237, 'EZ', 'Turkmenistán', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(238, 'TC', 'Turquía', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(239, 'T2', 'Tuvalu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, '5X', 'Uganda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'UR', 'Ucrania', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'CX', 'Uruguay', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'UK', 'Uzbekistán', '2015-08-31 15:46:56', '0000-00-00 00:00:00'),
(245, 'YJ', 'Vanuatu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'YV', 'Venezuela', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'VN', 'Vietnam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, '7O', 'Yemen', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'J2', 'Yibuti', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, '9J', 'Zambia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'Z', 'Zimbabue', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad_vuelos`
--

CREATE TABLE IF NOT EXISTS `nacionalidad_vuelos` (
`id` int(10) unsigned NOT NULL,
  `siglas` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `nacionalidad_vuelos`
--

INSERT INTO `nacionalidad_vuelos` (`id`, `siglas`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'V', 'Nacional', '2015-10-06 02:13:59', '2015-10-06 02:13:59'),
(2, 'I', 'Internacional', '2015-10-06 02:14:12', '2015-10-06 02:14:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_cargos`
--

CREATE TABLE IF NOT EXISTS `otros_cargos` (
`id` int(10) unsigned NOT NULL,
  `nombre_cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio_cargo` double(8,2) NOT NULL,
  `conceptoCredito_id` int(10) unsigned DEFAULT NULL,
  `conceptoContado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `otros_cargos`
--

INSERT INTO `otros_cargos` (`id`, `nombre_cargo`, `precio_cargo`, `conceptoCredito_id`, `conceptoContado_id`, `created_at`, `updated_at`) VALUES
(2, 'hola', 12345.00, 67, 67, '2015-11-25 20:58:07', '2015-11-25 20:58:07'),
(3, 'nuevo', 1500.00, 67, 67, '2015-12-09 01:05:45', '2015-12-09 01:05:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
`id` int(10) unsigned NOT NULL,
  `siglas` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=241 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `siglas`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afganistan', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(2, 'AX', 'Islas Gland', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(3, 'AL', 'Albania', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(4, 'DE', 'Alemania', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(5, 'AD', 'Andorra', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(6, 'AO', 'Angola', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(7, 'AI', 'Anguilla', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(8, 'AQ', 'Antártida', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(9, 'AG', 'Antigua y Barbuda', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(10, 'AN', 'Antillas Holandesas', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(11, 'SA', 'Arabia Saudí', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(12, 'DZ', 'Argelia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(13, 'AR', 'Argentina', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(14, 'AM', 'Armenia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(15, 'AW', 'Aruba', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(16, 'AU', 'Australia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(17, 'AT', 'Austria', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(18, 'AZ', 'Azerbaiyán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(19, 'BS', 'Bahamas', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(20, 'BH', 'Bahréin', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(21, 'BD', 'Bangladesh', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(22, 'BB', 'Barbados', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(23, 'BY', 'Bielorrusia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(24, 'BE', 'Bélgica', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(25, 'BZ', 'Belice', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(26, 'BJ', 'Benin', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(27, 'BM', 'Bermudas', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(28, 'BT', 'Bhután', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(29, 'BO', 'Bolivia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(30, 'BA', 'Bosnia y Herzegovina', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(31, 'BW', 'Botsuana', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(32, 'BV', 'Isla Bouvet', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(33, 'BR', 'Brasil', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(34, 'BN', 'Brunéi', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(35, 'BG', 'Bulgaria', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(36, 'BF', 'Burkina Faso', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(37, 'BI', 'Burundi', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(38, 'CV', 'Cabo Verde', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(39, 'KY', 'Islas Caimán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(40, 'KH', 'Camboya', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(41, 'CM', 'Camerún', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(42, 'CA', 'Canadá', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(43, 'CF', 'República Centroafricana', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(44, 'TD', 'Chad', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(45, 'CZ', 'República Checa', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(46, 'CL', 'Chile', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(47, 'CN', 'China', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(48, 'CY', 'Chipre', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(49, 'CX', 'Isla de Navidad', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(50, 'VA', 'Ciudad del Vaticano', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(51, 'CC', 'Islas Cocos', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(52, 'CO', 'Colombia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(53, 'KM', 'Comoras', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(54, 'CD', 'República Democrática del Congo', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(55, 'CG', 'Congo', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(56, 'CK', 'Islas Cook', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(57, 'KP', 'Corea del Norte', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(58, 'KR', 'Corea del Sur', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(59, 'CI', 'Costa de Marfil', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(60, 'CR', 'Costa Rica', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(61, 'HR', 'Croacia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(62, 'CU', 'Cuba', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(63, 'DK', 'Dinamarca', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(64, 'DM', 'Dominica', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(65, 'DO', 'República Dominicana', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(66, 'EC', 'Ecuador', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(67, 'EG', 'Egipto', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(68, 'SV', 'El Salvador', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(69, 'AE', 'Emiratos Árabes Unidos', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(70, 'ER', 'Eritrea', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(71, 'SK', 'Eslovaquia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(72, 'SI', 'Eslovenia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(73, 'ES', 'España', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(74, 'UM', 'Islas ultramarinas de Estados Unidos', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(75, 'US', 'Estados Unidos', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(76, 'EE', 'Estonia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(77, 'ET', 'Etiopía', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(78, 'FO', 'Islas Feroe', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(79, 'PH', 'Filipinas', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(80, 'FI', 'Finlandia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(81, 'FJ', 'Fiyi', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(82, 'FR', 'Francia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(83, 'GA', 'Gabón', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(84, 'GM', 'Gambia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(85, 'GE', 'Georgia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(87, 'GH', 'Ghana', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(88, 'GI', 'Gibraltar', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(89, 'GD', 'Granada', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(90, 'GR', 'Grecia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(91, 'GL', 'Groenlandia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(92, 'GP', 'Guadalupe', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(93, 'GU', 'Guam', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(94, 'GT', 'Guatemala', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(95, 'GF', 'Guayana Francesa', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(96, 'GN', 'Guinea', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(97, 'GQ', 'Guinea Ecuatorial', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(98, 'GW', 'Guinea-Bissau', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(99, 'GY', 'Guyana', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(100, 'HT', 'Haití', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(101, 'HM', 'Islas Heard y McDonald', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(102, 'HN', 'Honduras', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(103, 'HK', 'Hong Kong', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(104, 'HU', 'Hungría', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(105, 'IN', 'India', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(106, 'ID', 'Indonesia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(107, 'IR', 'Irán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(108, 'IQ', 'Iraq', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(109, 'IE', 'Irlanda', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(110, 'IS', 'Islandia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(111, 'IL', 'Israel', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(112, 'IT', 'Italia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(113, 'JM', 'Jamaica', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(114, 'JP', 'Japón', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(115, 'JO', 'Jordania', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(116, 'KZ', 'Kazajstán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(117, 'KE', 'Kenia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(118, 'KG', 'Kirguistán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(119, 'KI', 'Kiribati', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(120, 'KW', 'Kuwait', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(121, 'LA', 'Laos', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(122, 'LS', 'Lesotho', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(123, 'LV', 'Letonia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(124, 'LB', 'Líbano', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(125, 'LR', 'Liberia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(126, 'LY', 'Libia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(127, 'LI', 'Liechtenstein', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(128, 'LT', 'Lituania', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(129, 'LU', 'Luxemburgo', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(130, 'MO', 'Macao', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(131, 'MK', 'ARY Macedonia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(132, 'MG', 'Madagascar', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(133, 'MY', 'Malasia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(134, 'MW', 'Malawi', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(135, 'MV', 'Maldivas', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(136, 'ML', 'Malí', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(137, 'MT', 'Malta', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(138, 'FK', 'Islas Malvinas', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(139, 'MP', 'Islas Marianas del Norte', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(140, 'MA', 'Marruecos', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(141, 'MH', 'Islas Marshall', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(142, 'MQ', 'Martinica', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(143, 'MU', 'Mauricio', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(144, 'MR', 'Mauritania', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(145, 'YT', 'Mayotte', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(146, 'MX', 'México', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(147, 'FM', 'Micronesia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(148, 'MD', 'Moldavia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(149, 'MC', 'Mónaco', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(150, 'MN', 'Mongolia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(151, 'MS', 'Montserrat', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(152, 'MZ', 'Mozambique', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(153, 'MM', 'Myanmar', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(154, 'NA', 'Namibia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(155, 'NR', 'Nauru', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(156, 'NP', 'Nepal', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(157, 'NI', 'Nicaragua', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(158, 'NE', 'Níger', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(159, 'NG', 'Nigeria', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(160, 'NU', 'Niue', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(161, 'NF', 'Isla Norfolk', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(162, 'NO', 'Noruega', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(163, 'NC', 'Nueva Caledonia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(164, 'NZ', 'Nueva Zelanda', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(165, 'OM', 'Omán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(166, 'NL', 'Países Bajos', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(167, 'PK', 'Pakistán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(168, 'PW', 'Palau', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(169, 'PS', 'Palestina', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(170, 'PA', 'Panamá', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(171, 'PG', 'Papúa Nueva Guinea', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(172, 'PY', 'Paraguay', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(173, 'PE', 'Perú', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(174, 'PN', 'Islas Pitcairn', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(175, 'PF', 'Polinesia Francesa', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(176, 'PL', 'Polonia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(177, 'PT', 'Portugal', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(178, 'PR', 'Puerto Rico', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(179, 'QA', 'Qatar', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(180, 'GB', 'Reino Unido', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(181, 'RE', 'Reunión', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(182, 'RW', 'Ruanda', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(183, 'RO', 'Rumania', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(184, 'RU', 'Rusia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(185, 'EH', 'Sahara Occidental', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(186, 'SB', 'Islas Salomón', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(187, 'WS', 'Samoa', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(188, 'AS', 'Samoa Americana', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(189, 'KN', 'San Cristóbal y Nevis', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(190, 'SM', 'San Marino', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(191, 'PM', 'San Pedro y Miquelón', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(192, 'VC', 'San Vicente y las Granadinas', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(193, 'SH', 'Santa Helena', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(194, 'LC', 'Santa Lucía', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(195, 'ST', 'Santo Tomé y Príncipe', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(196, 'SN', 'Senegal', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(197, 'CS', 'Serbia y Montenegro', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(198, 'SC', 'Seychelles', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(199, 'SL', 'Sierra Leona', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(200, 'SG', 'Singapur', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(201, 'SY', 'Siria', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(202, 'SO', 'Somalia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(203, 'LK', 'Sri Lanka', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(204, 'SZ', 'Suazilandia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(205, 'ZA', 'Sudáfrica', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(206, 'SD', 'Sudán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(207, 'SE', 'Suecia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(208, 'CH', 'Suiza', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(209, 'SR', 'Surinam', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(210, 'SJ', 'Svalbard y Jan Mayen', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(211, 'TH', 'Tailandia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(212, 'TW', 'Taiwán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(213, 'TZ', 'Tanzania', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(214, 'TJ', 'Tayikistán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(215, 'IO', 'Territorio Británico del Océano Índico', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(216, 'TF', 'Territorios Australes Franceses', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(217, 'TL', 'Timor Oriental', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(218, 'TG', 'Togo', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(219, 'TK', 'Tokelau', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(220, 'TO', 'Tonga', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(221, 'TT', 'Trinidad y Tobago', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(222, 'TN', 'Túnez', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(223, 'TC', 'Islas Turcas y Caicos', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(224, 'TM', 'Turkmenistán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(225, 'TR', 'Turquía', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(226, 'TV', 'Tuvalu', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(227, 'UA', 'Ucrania', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(228, 'UG', 'Uganda', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(229, 'UY', 'Uruguay', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(230, 'UZ', 'Uzbekistán', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(231, 'VU', 'Vanuatu', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(232, 'VE', 'Venezuela', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(233, 'VN', 'Vietnam', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(234, 'VG', 'Islas Vírgenes Británicas', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(236, 'WF', 'Wallis y Futuna', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(237, 'YE', 'Yemen', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(238, 'DJ', 'Yibuti', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(239, 'ZM', 'Zambia', '2015-06-25 19:41:13', '2015-06-25 19:41:13'),
(240, 'ZW', 'Zimbabue', '2015-06-25 19:41:13', '2015-06-25 19:41:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `model`, `created_at`, `updated_at`) VALUES
(1, 'Menu contrato', 'menu.contrato', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Menu factura', 'menu.factura', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Menu cliente', 'menu.cliente', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Menu modulo', 'menu.modulo', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Menu concepto', 'menu.concepto', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Menu pilotos', 'menu.piloto', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Menu aeronaves', 'menu.aeronave', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Menu puertos', 'menu.puerto', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Menu hangares', 'menu.hangar', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Menu modelo aeronave', 'menu.modeloaeronave', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Menu usuario', 'menu.usuario', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Menu cobranza', 'menu.cobranza', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Menu estacionamiento', 'menu.estacionamiento', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Menu grupos de usuario', 'menu.role', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Menu Aterrizaje', 'menu.aterrizaje', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Menu Despegue', 'menu.despegue', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Menu Carga', 'menu.carga', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Menu Configuración de Precios SCV', 'menu.preciosSCV', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Menú Información', 'menu.informacion', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Menú Reportes SCV', 'menu.reporteSCV', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Menú Reportes Recaudación', 'menu.reporteRecaudacion', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Menú Tasas', 'menu.tasas', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Menú Systas', 'menu.systas', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
`id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(25, 3, 1, '2015-09-01 19:14:15', '2015-09-01 19:14:15'),
(27, 5, 1, '2015-09-01 19:14:15', '2015-09-01 19:14:15'),
(29, 13, 1, '2015-09-01 19:14:15', '2015-09-01 19:14:15'),
(31, 14, 1, '2015-09-01 19:14:15', '2015-09-01 19:14:15'),
(34, 4, 1, '2015-09-01 19:14:15', '2015-09-01 19:14:15'),
(37, 11, 1, '2015-09-01 19:14:15', '2015-09-01 19:14:15'),
(38, 7, 2, '2015-09-02 00:34:18', '2015-09-02 00:34:18'),
(39, 9, 2, '2015-09-02 00:34:18', '2015-09-02 00:34:18'),
(40, 10, 2, '2015-09-02 00:34:18', '2015-09-02 00:34:18'),
(41, 6, 2, '2015-09-02 00:34:18', '2015-09-02 00:34:18'),
(42, 8, 2, '2015-09-02 00:34:18', '2015-09-02 00:34:18'),
(43, 7, 1, '2015-09-02 01:16:44', '2015-09-02 01:16:44'),
(44, 12, 1, '2015-09-02 01:17:12', '2015-09-02 01:17:12'),
(45, 1, 1, '2015-09-02 01:17:12', '2015-09-02 01:17:12'),
(46, 2, 1, '2015-09-02 01:17:12', '2015-09-02 01:17:12'),
(47, 9, 1, '2015-09-02 01:17:12', '2015-09-02 01:17:12'),
(48, 10, 1, '2015-09-02 01:17:12', '2015-09-02 01:17:12'),
(49, 6, 1, '2015-09-02 01:17:12', '2015-09-02 01:17:12'),
(50, 8, 1, '2015-09-02 01:17:12', '2015-09-02 01:17:12'),
(51, 3, 3, '2015-09-02 01:19:32', '2015-09-02 01:19:32'),
(52, 12, 3, '2015-09-02 01:19:32', '2015-09-02 01:19:32'),
(53, 5, 3, '2015-09-02 01:19:32', '2015-09-02 01:19:32'),
(54, 1, 3, '2015-09-02 01:19:32', '2015-09-02 01:19:32'),
(55, 2, 3, '2015-09-02 01:19:32', '2015-09-02 01:19:32'),
(57, 4, 3, '2015-09-02 01:19:32', '2015-09-02 01:19:32'),
(58, 15, 1, '2015-10-05 18:38:09', '2015-10-05 18:38:09'),
(59, 17, 1, '2015-10-05 18:38:09', '2015-10-05 18:38:09'),
(60, 16, 1, '2015-10-05 18:38:09', '2015-10-05 18:38:09'),
(61, 18, 2, '2015-10-10 00:54:39', '2015-10-10 00:54:39'),
(62, 18, 1, '2015-10-10 00:54:46', '2015-10-10 00:54:46'),
(63, 19, 1, '2015-12-10 02:05:30', '2015-12-10 02:05:30'),
(64, 21, 1, '2015-12-10 02:05:30', '2015-12-10 02:05:30'),
(65, 20, 1, '2015-12-10 02:05:30', '2015-12-10 02:05:30'),
(66, 22, 1, '2015-12-10 02:05:30', '2015-12-10 02:05:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_usuario`
--

CREATE TABLE IF NOT EXISTS `permission_usuario` (
`id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pilotos`
--

CREATE TABLE IF NOT EXISTS `pilotos` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidad_id` int(10) unsigned NOT NULL,
  `documento_identidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `licencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=121 ;

--
-- Volcado de datos para la tabla `pilotos`
--

INSERT INTO `pilotos` (`id`, `nombre`, `nacionalidad_id`, `documento_identidad`, `telefono`, `licencia`, `estado`, `created_at`, `updated_at`) VALUES
(6, 'ABREU RODRIGUEZ RAUL', 232, '11061864', '04241312040', '11064864', 1, '2015-09-02 01:59:37', '2015-09-02 20:11:31'),
(7, 'VELASQUES JOSE', 232, '2980419', NULL, '2980419', 1, '2015-09-03 01:16:40', '2015-09-03 01:16:40'),
(8, 'RADOMIR ALEKSIC', 232, '4437969', NULL, '4437969', 1, '2015-09-03 20:08:31', '2015-09-03 20:08:31'),
(9, 'SILVA JOSE', 232, '8176555', '', '8176555', 1, '2015-09-03 20:10:44', '2015-09-03 20:13:34'),
(10, 'VILLA JOSE', 232, '8378052', '', '8378052', 1, '2015-09-03 20:11:45', '2015-09-03 20:13:48'),
(11, 'KABBABE JORGE', 232, '8436081', '', '8436081', 1, '2015-09-03 20:12:44', '2015-09-03 20:13:16'),
(12, 'HERNANDEZ GERONIMO', 232, '10582334', NULL, '10582334', 1, '2015-09-03 20:14:56', '2015-09-03 20:14:56'),
(13, 'CASTILLO JAIRO', 232, '10630006', NULL, '10630006', 1, '2015-09-03 20:15:58', '2015-09-03 20:15:58'),
(14, 'GONZALEZ CARLOS', 232, '14917644', NULL, '14917644', 1, '2015-09-03 20:16:47', '2015-09-03 20:16:47'),
(15, 'JIMENEZ OMAR', 232, '17837581', NULL, '17837581', 1, '2015-09-03 20:17:45', '2015-09-03 20:17:45'),
(16, 'GUIA ALEJANDRO', 232, '23565494', NULL, '23565494', 1, '2015-09-03 20:27:01', '2015-09-03 20:27:01'),
(17, 'ALVAREZ RICCIUTI MICKHAIL CAMILO', 232, '13325677', '04122880318', '13325677', 1, '2015-09-03 20:30:57', '2015-09-03 20:31:37'),
(18, 'AMER FAUZI YORDI SOUKI', 232, '15327442', '04123100213', '15327442', 1, '2015-09-03 20:33:02', '2015-09-03 20:33:28'),
(19, 'BAFFONE SOGAMOSO VINCENZO', 232, '6975871', '04143651019', '6975871', 1, '2015-09-03 20:35:13', '2015-09-03 20:35:38'),
(20, 'CISNEROS PERFETTI ELIO ANTONIO', 232, '10568561', '04141555353', '10568561', 1, '2015-09-03 20:37:40', '2015-09-03 20:38:06'),
(21, 'CORNET CAYAMA JESUS RAFAEL', 232, '4177877', '04142398877', '4177877', 1, '2015-09-03 20:39:14', '2015-09-03 20:39:56'),
(22, 'COTTIN MENDOZA EDUARDO ENRIQUE', 232, '11306456', '04142821258', '11306456', 1, '2015-09-03 20:40:58', '2015-09-03 20:41:25'),
(23, 'DE VITA JOYCE GIANFRANCO JORGE', 232, '5532284', '04142560662', '5532284', 1, '2015-09-03 20:43:26', '2015-09-03 20:47:57'),
(24, 'DEGOUT PELAEZ GUILLERMO ANTONIO', 232, '3888287', '04241311033', '3888287', 1, '2015-09-03 20:48:51', '2015-09-03 20:49:17'),
(25, 'EDUARDO GONZALEZ HAROLD JESUS', 232, '14567397', '04126083856', '14567397', 1, '2015-09-03 20:51:12', '2015-09-03 20:51:34'),
(26, 'GARCIA MORILLOCARLOS ENRIQUE', 232, '5093045', '04142405068', '5093045', 1, '2015-09-03 20:53:25', '2015-09-03 20:54:07'),
(27, 'GONZALEZ SABAL FELIPE ALBERTO', 232, '3478445', '04143321341', '3478445', 1, '2015-09-03 20:55:10', '2015-09-03 20:55:31'),
(28, 'HEVER PLAZA GUILLERMO ALFREDO', 232, '4559273', '04129911570', '4559273', 1, '2015-09-03 20:56:37', '2015-09-03 20:57:00'),
(29, 'LAGARDERA LOZANO ANGEL DAVID', 232, '14201847', '04142495621', '14201847', 1, '2015-09-03 20:58:04', '2015-09-03 20:58:24'),
(30, 'LANDAETA MONZON JESUS EDUARDO', 232, '5519233', '04146246151', '5519233', 1, '2015-09-03 20:59:42', '2015-09-03 21:01:27'),
(31, 'MEDINA SILVERIO JORGE LUIS', 232, '5406859', '04141293680', '5406859', 1, '2015-09-03 21:02:42', '2015-09-03 21:02:59'),
(36, 'MIRANDA RAMOS CESAR MIGUEL', 232, '5940813', '04142709710', '5940813', 1, '2015-09-04 01:42:57', '2015-09-04 01:42:57'),
(37, 'MONTIEL PARRA LEONARDO RAFAEL', 232, '15162272', '04146715656', '15162272', 1, '2015-09-05 00:51:19', '2015-09-05 00:51:19'),
(38, 'NARANJO TOVAR CARLOS JOSE', 232, '3562587', '04141199019', '3562587', 1, '2015-09-05 00:52:57', '2015-09-05 00:52:57'),
(39, 'OCONNOR JAVIER', 232, '4251408', '04168994568', '4251408', 1, '2015-09-05 00:55:41', '2015-09-05 00:55:41'),
(40, 'PEREZ CRUZ MANUEL DARIO', 232, '7991335', '04147877678', '7991335', 1, '2015-09-05 00:57:16', '2015-09-05 00:57:16'),
(41, 'PEREZ LUNA COLINA ALEXIS', 232, '12626563', '04167022937', '12626563', 1, '2015-09-05 00:59:00', '2015-09-05 00:59:00'),
(42, 'PORTILLO GONZALEZ ERNESTO JOSE', 232, '14369112', '04146098900', '14369112', 1, '2015-09-05 01:00:24', '2015-09-05 01:00:24'),
(43, 'POSADAS JESUS', 232, '10788282', '04129638096', '10788282', 1, '2015-09-05 01:01:52', '2015-09-05 01:01:53'),
(44, 'PRADA PAVEL', 232, '4556796', '04267166755', '4556796', 1, '2015-09-05 01:03:12', '2015-09-05 01:03:12'),
(45, 'QUINTERO TRUJILLO HUGO', 232, '16330706', '04141959036', '16330706', 1, '2015-09-05 01:04:44', '2015-09-05 01:04:44'),
(46, 'REYES LUIS', 232, '10584716', '04122286000', '10584716', 1, '2015-09-05 01:05:51', '2015-09-05 01:05:52'),
(47, 'ROMERO ACOSTA', 232, '4357954', '04142780517', '4357954', 1, '2015-09-05 01:07:11', '2015-09-05 01:07:11'),
(48, 'SANOJA OLIVIERI ALEXIS ANTONIO', 232, '2906578', '04148892366', '2906578', 1, '2015-09-05 01:08:35', '2015-09-05 01:08:35'),
(49, 'SARDI TANCREDI VICTOR EDUARDO', 232, '11225530', '04123397907', '11225530', 1, '2015-09-05 01:09:51', '2015-09-05 01:09:51'),
(50, 'SOSA UTRERA ALEXIS ANTONIO', 232, '10389436', '04148773806', '10389436', 1, '2015-09-05 01:11:22', '2015-09-05 01:11:23'),
(51, 'SCHELLING VALLENILLA JORGE ERNESTO', 232, '4006103', '04143573134', '4006103', 1, '2015-09-05 01:12:54', '2015-09-05 01:12:54'),
(52, 'VECCHIONE BELLO PEDRO PABLO', 232, '3725524', '04144040856', '3725524', 1, '2015-09-05 01:14:22', '2015-09-05 01:14:22'),
(53, 'YAGUARACUTO MANUEL', 232, '14187680', '04148059901', '14187680', 1, '2015-09-05 01:16:41', '2015-09-05 01:16:41'),
(54, 'ZAPATA NAHMENS', 232, '3182675', '04142028243', '3182675', 1, '2015-09-05 01:18:16', '2015-09-05 01:18:16'),
(55, 'BORTONE JOSE', 232, '12626549', '04142527566', '12626549', 1, '2015-09-05 01:53:36', '2015-09-05 01:53:36'),
(57, 'LANZON EDGAR', 232, '11059497', '', '11059497', 1, '2015-09-07 19:51:12', '2015-09-07 19:51:12'),
(58, 'OZONIAN ALEX', 232, '12039059', '', '12039059', 1, '2015-09-07 19:53:21', '2015-09-07 19:53:21'),
(59, 'FERNANDEZ ', 232, '9675994', '', '9675994', 1, '2015-09-07 19:55:33', '2015-09-07 19:55:33'),
(60, 'TAVARES PAULO', 232, '18186685', '', '18186685', 1, '2015-09-07 19:56:31', '2015-09-07 19:56:31'),
(61, 'YUMAR IVAN', 232, '13887427', '', '13887427', 1, '2015-09-07 19:57:54', '2015-09-07 19:57:54'),
(62, 'AGUDELO ERWIN', 232, '11995910', '', '11995910', 1, '2015-09-07 19:58:46', '2015-09-07 19:58:46'),
(63, 'JACKSON PABLO', 232, '10614582', '', '10614582', 1, '2015-09-07 19:59:37', '2015-09-07 19:59:37'),
(64, 'FLORES OMAR', 232, '7368825', '', '7368825', 1, '2015-09-07 20:01:07', '2015-09-07 20:01:07'),
(65, 'SILVA MARIO', 232, '13335802', '', '13338802', 1, '2015-09-07 20:01:52', '2015-09-07 20:01:52'),
(66, 'PARRA JOSE', 232, '9609116', '', '9609116', 1, '2015-09-07 20:02:41', '2015-09-07 20:02:41'),
(67, 'GRATEROL JONATHAN', 232, '15119777', '', '15119777', 1, '2015-09-07 20:03:30', '2015-09-07 20:03:30'),
(68, 'PERNALETE JOSE', 232, '5096520', '', '5096520', 1, '2015-09-07 20:04:28', '2015-09-07 20:04:28'),
(69, 'ISSA RICARDO', 232, '15931820', '', '15931820', 1, '2015-09-07 20:05:45', '2015-09-07 20:05:45'),
(70, 'SOSA VLADIMIR', 232, '10542402', '', '10542402', 1, '2015-09-07 20:06:46', '2015-09-07 20:06:46'),
(71, 'CEGARRA LUIS', 232, '12417605', '', '12417605', 1, '2015-09-07 20:07:59', '2015-09-07 20:07:59'),
(72, 'RODRIGUEZ RICARDO', 232, '12568179', '', '12568179', 1, '2015-09-07 20:09:08', '2015-09-07 20:09:08'),
(73, 'MORBIDELLI REMO', 232, '12560171', '', '12560171', 1, '2015-09-07 20:10:08', '2015-09-07 20:10:08'),
(74, 'BERMUDEZ HECTOR', 232, '9664751', '', '9664751', 1, '2015-09-07 20:11:02', '2015-09-07 20:11:02'),
(75, 'CALVIÑO JOSE ', 232, '7993795', '', '7993795', 1, '2015-09-07 20:11:39', '2015-09-07 20:11:39'),
(76, 'FORTUL JORGE', 232, '11120999', '', '11120999', 1, '2015-09-07 20:12:11', '2015-09-07 20:12:11'),
(77, 'MILLAN GUSTAVO', 232, '11028206', '', '11028206', 1, '2015-09-07 20:20:06', '2015-09-07 20:20:06'),
(78, 'RAMONES ALEXIS', 232, '9807561', '', '9807561', 1, '2015-09-07 20:21:16', '2015-09-07 20:21:16'),
(79, 'CARVAJAL RIGOBERTO', 232, '14197215', '', '14197215', 1, '2015-09-07 20:22:04', '2015-09-07 20:22:04'),
(80, 'ARIAS ALBERTO', 232, '17346180', '', '17643180', 1, '2015-09-07 20:22:45', '2015-09-07 20:22:45'),
(81, 'CARRILLO ELIO', 232, '8818257', '', '8818257', 1, '2015-09-07 20:23:42', '2015-09-07 20:23:42'),
(82, 'OTERO HOMER', 232, '13053466', '', '13053466', 1, '2015-09-07 20:24:35', '2015-09-07 20:24:35'),
(83, 'SERRA HUMBERTO', 232, '14129730', '', '14129730', 1, '2015-09-07 20:25:30', '2015-09-07 20:25:30'),
(84, 'CARRIZALES RAMON', 232, '14395597', '', '14395597', 1, '2015-09-07 20:26:17', '2015-09-07 20:26:17'),
(85, 'GRANADOS JESUS', 232, '10169569', '', '10169596', 1, '2015-09-07 20:27:24', '2015-09-07 20:27:24'),
(86, 'PEREIRA DANIEL', 232, '9063007', '', '9063007', 1, '2015-09-07 20:28:55', '2015-09-07 20:28:55'),
(87, 'NAVARRO OSWALDO', 232, '12260023', '', '12260023', 1, '2015-09-07 20:29:41', '2015-09-07 20:29:41'),
(88, 'SALAS ARTURO', 232, '11033637', '', '11033637', 1, '2015-09-07 20:30:30', '2015-09-07 20:30:30'),
(89, 'GASPARRINI EDDY', 232, '6682031', '', '6682031', 1, '2015-09-07 20:31:16', '2015-09-07 20:31:16'),
(90, 'CARRATU FELIX', 232, '116422083', '', '116422083', 1, '2015-09-07 20:32:05', '2015-09-07 20:32:05'),
(91, 'FERNANDEZ CESAR', 232, '15122548', '', '15122548', 1, '2015-09-07 20:32:49', '2015-09-07 20:32:49'),
(92, 'MARTINEZ DAVID', 232, '11391024', '', '11391024', 1, '2015-09-07 20:33:37', '2015-09-07 20:33:37'),
(93, 'DIAZ MICHAEL', 232, '11413408', '', '11413408', 1, '2015-09-07 20:34:32', '2015-09-07 20:34:32'),
(94, 'BITORZOLI GIOVANNI', 232, '6977466', '', '6977466', 1, '2015-09-07 20:35:18', '2015-09-07 20:35:18'),
(95, 'TERAN ANGEL', 232, '15780479', '', '15780479', 1, '2015-09-07 20:36:00', '2015-09-07 20:36:00'),
(96, 'MARCANO JOSE', 232, '15830660', '', '15830660', 1, '2015-09-07 20:37:12', '2015-09-07 20:37:12'),
(97, 'SILVESTRE JOSE', 232, '5967398', '', '5967398', 1, '2015-09-07 20:38:06', '2015-09-07 20:38:06'),
(98, 'HERNANDEZ JOSE', 232, '18441491', '', '18441491', 1, '2015-09-07 20:39:46', '2015-09-07 20:39:46'),
(99, 'CASTILLO HECTOR', 232, '12994855', '', '12994855', 1, '2015-09-07 20:40:28', '2015-09-07 20:40:28'),
(100, 'CELIS RUBEN', 232, '9967178', '', '9967178', 1, '2015-09-07 20:41:05', '2015-09-07 20:41:05'),
(101, 'BETANCOURT JORGE', 232, '3180391', '', '3180391', 1, '2015-09-11 00:15:26', '2015-09-11 00:15:26'),
(102, 'MOSQUEDA JOSE', 232, '2473673', '', '2473673', 1, '2015-09-11 00:16:07', '2015-09-11 00:16:07'),
(103, 'BERNAL GUSTAVO', 232, '3541137', '', '3541137', 1, '2015-09-11 00:16:58', '2015-09-11 00:16:58'),
(104, 'IRISARRI JOSE ', 232, '2136658', '', '2136658', 1, '2015-09-11 00:17:45', '2015-09-11 00:17:45'),
(105, 'BARRAGAN HERNAN', 232, '3542779', '', '3542779', 1, '2015-09-11 00:19:02', '2015-09-11 00:19:02'),
(106, 'KOUKOUBINOSATHAANASSIOS', 232, '6191637', '', '6191637', 1, '2015-09-11 00:20:00', '2015-09-11 00:20:00'),
(107, 'LEON GUSTAVO', 232, '3973809', '', '3973809', 1, '2015-09-11 00:20:31', '2015-09-11 00:20:31'),
(108, 'MORENO HUGO', 232, '5570066', '', '5570066', 1, '2015-09-11 00:21:00', '2015-09-11 00:21:00'),
(109, 'ABREU TOMAS', 232, '5577495', '', '5577495', 1, '2015-09-11 00:21:39', '2015-09-11 00:21:39'),
(110, 'DARRIBA JOSE', 232, '9098121', '', '9098121', 1, '2015-09-11 00:22:12', '2015-09-11 00:22:12'),
(111, 'ANTON ANTONIO', 232, '6153225', '', '6153225', 1, '2015-09-11 00:23:06', '2015-09-11 00:23:06'),
(112, 'RAMOS ADELSIS', 232, '5299596', '', '5299596', 1, '2015-09-11 00:23:57', '2015-09-11 00:23:57'),
(113, 'BLANCO MANUEL', 232, '6498989', '', '6498989', 1, '2015-09-11 00:25:34', '2015-09-11 00:25:34'),
(114, 'GRILLO FRANCISCO', 232, '17705495', '', '17705495', 1, '2015-09-11 00:26:27', '2015-09-11 00:26:27'),
(115, 'BONILLA OSCAR', 232, '11985112', '', '11985112', 1, '2015-09-11 00:27:15', '2015-09-11 00:27:15'),
(116, 'RAMIREZ WILFREDO', 232, '15183117', '', '15183117', 1, '2015-09-11 00:28:00', '2015-09-11 00:28:00'),
(117, 'WHITE ANTONIO', 232, '13832371', '', '13832271', 1, '2015-09-11 00:28:39', '2015-09-11 00:28:39'),
(118, 'MAYORCA JUAN', 232, '16182296', '', '16182296', 1, '2015-09-11 00:29:24', '2015-09-11 00:29:24'),
(119, 'OVALLES ALEJANDRO', 232, '18037618', '', '18037618', 1, '2015-09-11 00:30:26', '2015-09-11 00:30:26'),
(120, 'JAIMES ROBERTO', 232, '637330', '', '637330', 1, '2015-09-11 01:26:19', '2015-09-11 01:26:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios_aterrizajes_despegues`
--

CREATE TABLE IF NOT EXISTS `precios_aterrizajes_despegues` (
`id` int(10) unsigned NOT NULL,
  `eq_diurnoNac` double(8,2) NOT NULL,
  `eq_diurnoInt` double(8,2) NOT NULL,
  `eq_nocturNac` double(8,2) NOT NULL,
  `eq_nocturInt` double(8,2) NOT NULL,
  `conceptoCredito_id` int(10) unsigned NOT NULL,
  `conceptoContado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `precios_aterrizajes_despegues`
--

INSERT INTO `precios_aterrizajes_despegues` (`id`, `eq_diurnoNac`, `eq_diurnoInt`, `eq_nocturNac`, `eq_nocturInt`, `conceptoCredito_id`, `conceptoContado_id`, `created_at`, `updated_at`) VALUES
(1, 0.29, 0.85, 0.35, 1.65, 68, 54, '0000-00-00 00:00:00', '2015-12-08 04:29:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios_cargas`
--

CREATE TABLE IF NOT EXISTS `precios_cargas` (
`id` int(10) unsigned NOT NULL,
  `equivalenteUT` double(8,2) NOT NULL,
  `toneladaPorBloque` double(8,2) NOT NULL,
  `conceptoCredito_id` int(10) unsigned NOT NULL,
  `conceptoContado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `precios_cargas`
--

INSERT INTO `precios_cargas` (`id`, `equivalenteUT`, `toneladaPorBloque`, `conceptoCredito_id`, `conceptoContado_id`, `created_at`, `updated_at`) VALUES
(1, 0.01, 1.00, 73, 59, '0000-00-00 00:00:00', '2015-12-08 04:42:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puertos`
--

CREATE TABLE IF NOT EXISTS `puertos` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `siglas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `pais_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `puertos`
--

INSERT INTO `puertos` (`id`, `nombre`, `siglas`, `estado`, `pais_id`, `created_at`, `updated_at`) VALUES
(1, 'ARUBA', 'TNCA', 1, 15, '2015-09-03 01:15:27', '2015-12-08 04:07:25'),
(3, 'SIMÓN BOLIVAR', 'SVMI', 1, 232, '2015-12-08 04:08:06', '2015-12-08 04:08:06'),
(4, 'BARCELONA', 'SVBC', 1, 232, '2015-12-08 04:08:34', '2015-12-08 04:08:34'),
(5, 'CHARALLAVE', 'SVCS', 1, 232, '2015-12-08 04:09:05', '2015-12-08 04:09:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '', 1, '2015-07-31 14:07:13', '2015-08-05 01:24:35'),
(2, 'SCV', 'scv', '', 1, '2015-09-02 00:34:18', '2015-09-02 00:34:18'),
(3, 'recaudacion', 'recaudacion', '', 1, '2015-09-02 01:19:32', '2015-09-02 01:19:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_usuario`
--

CREATE TABLE IF NOT EXISTS `role_usuario` (
`id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `role_usuario`
--

INSERT INTO `role_usuario` (`id`, `role_id`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-07-31 14:08:02', '2015-07-31 14:08:02'),
(2, 2, 2, '2015-09-02 00:34:25', '2015-09-02 00:34:25'),
(3, 3, 3, '2015-09-02 01:19:39', '2015-09-02 01:19:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasa_cierres`
--

CREATE TABLE IF NOT EXISTS `tasa_cierres` (
`id` int(10) unsigned NOT NULL,
  `fcierre` date NOT NULL,
  `hcierre` time NOT NULL,
  `monto` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `encargado` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ta_tasas`
--

CREATE TABLE IF NOT EXISTS `ta_tasas` (
`id` int(10) unsigned NOT NULL,
  `codtas` int(11) NOT NULL,
  `serie` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `femision` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hemision` time NOT NULL,
  `tiptas` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `encargado` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `codbarras` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fVer` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hVer` time NOT NULL,
  `valor` double(14,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_aeronaves`
--

CREATE TABLE IF NOT EXISTS `tipo_aeronaves` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_aeronaves`
--

INSERT INTO `tipo_aeronaves` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Helicóptero', '2015-08-26 02:56:26', '2015-08-26 02:56:26'),
(2, 'Avión', '2015-08-26 02:56:31', '2015-08-26 02:56:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_matriculas`
--

CREATE TABLE IF NOT EXISTS `tipo_matriculas` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `siglas` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tipo_matriculas`
--

INSERT INTO `tipo_matriculas` (`id`, `nombre`, `siglas`, `created_at`, `updated_at`) VALUES
(1, 'Privado', 'P ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Comercial Privado', 'CP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Comercial', 'C ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Oficial / Gobierno', 'O ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Escuela', 'E ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Militar', 'M ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Agrícola', 'A ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Adiestramiento', 'MR', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_tas`
--

CREATE TABLE IF NOT EXISTS `tip_tas` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `monto` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topes`
--

CREATE TABLE IF NOT EXISTS `topes` (
`id` int(10) unsigned NOT NULL,
  `nombre_archivo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ruta_imagen` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `aeropuerto` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `departamento_id` int(10) unsigned DEFAULT NULL,
  `aeropuerto_id` int(10) unsigned DEFAULT NULL,
  `cargo_id` int(10) unsigned DEFAULT NULL,
  `directo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `fullname`, `estado`, `departamento_id`, `aeropuerto_id`, `cargo_id`, `directo`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$IiAw5mwzKZwMjPMP7gv64OBUMHL2INfwOYpZaYxbHPPaS1oJComkm', '', 0, NULL, NULL, NULL, '', '', '7RAWXVUUPE4tfNZU4ZhhWJcUulWCe1btZ3nSiukdgsrk90HjG9Wx05Jag9rv', '2015-07-31 12:42:36', '2015-12-08 00:42:47'),
(2, 'supervisor-scv', '$2y$10$hZdmhsjIpdtl0elgxBhg4OIbeTa4EnN6525Gm/ZmtTgrvDCKOZ4Sy', 'Supervisor SCV', 1, 1, 1, 1, '0000', 'saar@gmail.com', 'Ate9WJDGMcl1BpKn382FipyUJxuOIbRWVPySyyEmpC5DtWJM50v3frWp6bKC', '2015-09-02 00:32:49', '2015-09-15 02:58:26'),
(3, 'recaudacion', '$2y$10$euqvcZN2k7eP6B6gFfbb.eIfKJ7JaUZMHe8hg9ORz5zWD6uKBIrQ.', 'Recaudacion', 1, 1, 1, 1, '1234', 'email@gmail.com', 'B75Y0W3frFNjkXwEqzh6gHgcssFIxBBJf4NGRjoi0brkjHCGUJMSUrK2XiS4', '2015-09-02 01:18:54', '2015-09-02 01:40:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aeronaves`
--
ALTER TABLE `aeronaves`
 ADD PRIMARY KEY (`id`), ADD KEY `aeronaves_nacionalidad_id_foreign` (`nacionalidad_id`), ADD KEY `aeronaves_tipo_id_foreign` (`tipo_id`), ADD KEY `aeronaves_modelo_id_foreign` (`modelo_id`), ADD KEY `aeronaves_cliente_id_foreign` (`cliente_id`), ADD KEY `aeronaves_hangar_id_foreign` (`hangar_id`);

--
-- Indices de la tabla `aeropuertos`
--
ALTER TABLE `aeropuertos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ajustes`
--
ALTER TABLE `ajustes`
 ADD PRIMARY KEY (`id`), ADD KEY `ajustes_cliente_id_foreign` (`cliente_id`), ADD KEY `ajustes_cobro_id_foreign` (`cobro_id`);

--
-- Indices de la tabla `aterrizajes`
--
ALTER TABLE `aterrizajes`
 ADD PRIMARY KEY (`id`), ADD KEY `aterrizajes_aeronave_id_foreign` (`aeronave_id`), ADD KEY `aterrizajes_cliente_id_foreign` (`cliente_id`), ADD KEY `aterrizajes_tipomatricula_id_foreign` (`tipoMatricula_id`), ADD KEY `aterrizajes_nacionalidadvuelo_id_foreign` (`nacionalidadVuelo_id`), ADD KEY `aterrizajes_piloto_id_foreign` (`piloto_id`), ADD KEY `aterrizajes_puerto_id_foreign` (`puerto_id`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bancoscuentas`
--
ALTER TABLE `bancoscuentas`
 ADD PRIMARY KEY (`id`), ADD KEY `bancoscuentas_banco_id_foreign` (`banco_id`);

--
-- Indices de la tabla `cargas`
--
ALTER TABLE `cargas`
 ADD PRIMARY KEY (`id`), ADD KEY `cargas_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos_varios`
--
ALTER TABLE `cargos_varios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id`), ADD KEY `clientes_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `cliente_hangar`
--
ALTER TABLE `cliente_hangar`
 ADD PRIMARY KEY (`id`), ADD KEY `cliente_hangar_cliente_id_foreign` (`cliente_id`), ADD KEY `cliente_hangar_hangar_id_foreign` (`hangar_id`);

--
-- Indices de la tabla `cobros`
--
ALTER TABLE `cobros`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cobrospagos`
--
ALTER TABLE `cobrospagos`
 ADD PRIMARY KEY (`id`), ADD KEY `cobrospagos_banco_id_foreign` (`banco_id`), ADD KEY `cobrospagos_cuenta_id_foreign` (`cuenta_id`), ADD KEY `cobrospagos_cobro_id_foreign` (`cobro_id`);

--
-- Indices de la tabla `cobro_factura`
--
ALTER TABLE `cobro_factura`
 ADD PRIMARY KEY (`id`), ADD KEY `cobro_factura_factura_id_foreign` (`factura_id`), ADD KEY `cobro_factura_cobro_id_foreign` (`cobro_id`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
 ADD PRIMARY KEY (`id`), ADD KEY `conceptos_aeropuerto_id_foreign` (`aeropuerto_id`), ADD KEY `conceptos_modulo_id_foreign` (`modulo_id`);

--
-- Indices de la tabla `concils`
--
ALTER TABLE `concils`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `contratos_ncontrato_unique` (`nContrato`), ADD KEY `contratos_cliente_id_foreign` (`cliente_id`), ADD KEY `contratos_concepto_id_foreign` (`concepto_id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `despegues`
--
ALTER TABLE `despegues`
 ADD PRIMARY KEY (`id`), ADD KEY `despegues_puerto_id_foreign` (`puerto_id`), ADD KEY `despegues_piloto_id_foreign` (`piloto_id`), ADD KEY `despegues_tipomatricula_id_foreign` (`tipoMatricula_id`), ADD KEY `despegues_nacionalidadvuelo_id_foreign` (`nacionalidadVuelo_id`), ADD KEY `despegues_aeronave_id_foreign` (`aeronave_id`), ADD KEY `despegues_cliente_id_foreign` (`cliente_id`), ADD KEY `despegues_aterrizaje_id_foreign` (`aterrizaje_id`);

--
-- Indices de la tabla `despegue_otros_cargo`
--
ALTER TABLE `despegue_otros_cargo`
 ADD PRIMARY KEY (`id`), ADD KEY `despegue_otros_cargo_despegue_id_foreign` (`despegue_id`), ADD KEY `despegue_otros_cargo_otroscargo_id_foreign` (`otrosCargo_id`);

--
-- Indices de la tabla `estacionamientoclientes`
--
ALTER TABLE `estacionamientoclientes`
 ADD PRIMARY KEY (`id`), ADD KEY `estacionamientoclientes_estacionamiento_id_foreign` (`estacionamiento_id`);

--
-- Indices de la tabla `estacionamientoconceptos`
--
ALTER TABLE `estacionamientoconceptos`
 ADD PRIMARY KEY (`id`), ADD KEY `estacionamientoconceptos_estacionamiento_id_foreign` (`estacionamiento_id`);

--
-- Indices de la tabla `estacionamientoops`
--
ALTER TABLE `estacionamientoops`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estacionamientooptarjetas`
--
ALTER TABLE `estacionamientooptarjetas`
 ADD PRIMARY KEY (`id`), ADD KEY `estacionamientooptarjetas_estacionamientocliente_id_foreign` (`estacionamientocliente_id`), ADD KEY `estacionamientooptarjetas_estacionamientoop_id_foreign` (`estacionamientoop_id`), ADD KEY `estacionamientooptarjetas_banco_id_foreign` (`banco_id`), ADD KEY `estacionamientooptarjetas_bancoscuenta_id_foreign` (`bancoscuenta_id`);

--
-- Indices de la tabla `estacionamientooptickets`
--
ALTER TABLE `estacionamientooptickets`
 ADD PRIMARY KEY (`id`), ADD KEY `estacionamientooptickets_econcepto_id_foreign` (`econcepto_id`), ADD KEY `estacionamientooptickets_estacionamientoop_id_foreign` (`estacionamientoop_id`);

--
-- Indices de la tabla `estacionamientoopticketsdepositos`
--
ALTER TABLE `estacionamientoopticketsdepositos`
 ADD PRIMARY KEY (`id`), ADD KEY `estacionamientoopticketsdepositos_estacionamientoop_id_foreign` (`estacionamientoop_id`), ADD KEY `estacionamientoopticketsdepositos_banco_id_foreign` (`banco_id`), ADD KEY `estacionamientoopticketsdepositos_bancoscuenta_id_foreign` (`bancoscuenta_id`);

--
-- Indices de la tabla `estacionamientoportons`
--
ALTER TABLE `estacionamientoportons`
 ADD PRIMARY KEY (`id`), ADD KEY `estacionamientoportons_estacionamiento_id_foreign` (`estacionamiento_id`);

--
-- Indices de la tabla `estacionamientos`
--
ALTER TABLE `estacionamientos`
 ADD PRIMARY KEY (`id`), ADD KEY `estacionamientos_aeropuerto_id_foreign` (`aeropuerto_id`);

--
-- Indices de la tabla `estacionamiento_aeronaves`
--
ALTER TABLE `estacionamiento_aeronaves`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturadetalles`
--
ALTER TABLE `facturadetalles`
 ADD PRIMARY KEY (`id`), ADD KEY `facturadetalles_factura_id_foreign` (`factura_id`), ADD KEY `facturadetalles_concepto_id_foreign` (`concepto_id`);

--
-- Indices de la tabla `facturametadatas`
--
ALTER TABLE `facturametadatas`
 ADD PRIMARY KEY (`id`), ADD KEY `facturametadatas_factura_id_foreign` (`factura_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
 ADD PRIMARY KEY (`id`), ADD KEY `facturas_aeropuerto_id_foreign` (`aeropuerto_id`), ADD KEY `facturas_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `footers`
--
ALTER TABLE `footers`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hangars`
--
ALTER TABLE `hangars`
 ADD PRIMARY KEY (`id`), ADD KEY `hangars_aeropuerto_id_foreign` (`aeropuerto_id`);

--
-- Indices de la tabla `horarios_aeronauticos`
--
ALTER TABLE `horarios_aeronauticos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista_tasas`
--
ALTER TABLE `lista_tasas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metas`
--
ALTER TABLE `metas`
 ADD PRIMARY KEY (`id`), ADD KEY `metas_aeropuerto_id_foreign` (`aeropuerto_id`);

--
-- Indices de la tabla `meta_detalles`
--
ALTER TABLE `meta_detalles`
 ADD PRIMARY KEY (`id`), ADD KEY `meta_detalles_meta_id_foreign` (`meta_id`), ADD KEY `meta_detalles_concepto_id_foreign` (`concepto_id`);

--
-- Indices de la tabla `modelo_aeronaves`
--
ALTER TABLE `modelo_aeronaves`
 ADD PRIMARY KEY (`id`), ADD KEY `modelo_aeronaves_tipo_id_foreign` (`tipo_id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
 ADD PRIMARY KEY (`id`), ADD KEY `modulos_aeropuerto_id_foreign` (`aeropuerto_id`);

--
-- Indices de la tabla `montos_fijos`
--
ALTER TABLE `montos_fijos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nacionalidad_matriculas`
--
ALTER TABLE `nacionalidad_matriculas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nacionalidad_vuelos`
--
ALTER TABLE `nacionalidad_vuelos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `otros_cargos`
--
ALTER TABLE `otros_cargos`
 ADD PRIMARY KEY (`id`), ADD KEY `otros_cargos_conceptocredito_id_foreign` (`conceptoCredito_id`), ADD KEY `otros_cargos_conceptocontado_id_foreign` (`conceptoContado_id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
 ADD PRIMARY KEY (`id`), ADD KEY `permission_role_permission_id_index` (`permission_id`), ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `permission_usuario`
--
ALTER TABLE `permission_usuario`
 ADD PRIMARY KEY (`id`), ADD KEY `permission_usuario_permission_id_index` (`permission_id`), ADD KEY `permission_usuario_usuario_id_index` (`usuario_id`);

--
-- Indices de la tabla `pilotos`
--
ALTER TABLE `pilotos`
 ADD PRIMARY KEY (`id`), ADD KEY `pilotos_nacionalidad_id_foreign` (`nacionalidad_id`);

--
-- Indices de la tabla `precios_aterrizajes_despegues`
--
ALTER TABLE `precios_aterrizajes_despegues`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `precios_cargas`
--
ALTER TABLE `precios_cargas`
 ADD PRIMARY KEY (`id`), ADD KEY `precios_cargas_conceptocredito_id_foreign` (`conceptoCredito_id`), ADD KEY `precios_cargas_conceptocontado_id_foreign` (`conceptoContado_id`);

--
-- Indices de la tabla `puertos`
--
ALTER TABLE `puertos`
 ADD PRIMARY KEY (`id`), ADD KEY `puertos_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_usuario`
--
ALTER TABLE `role_usuario`
 ADD PRIMARY KEY (`id`), ADD KEY `role_usuario_role_id_index` (`role_id`), ADD KEY `role_usuario_usuario_id_index` (`usuario_id`);

--
-- Indices de la tabla `tasa_cierres`
--
ALTER TABLE `tasa_cierres`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ta_tasas`
--
ALTER TABLE `ta_tasas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_aeronaves`
--
ALTER TABLE `tipo_aeronaves`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_matriculas`
--
ALTER TABLE `tipo_matriculas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tip_tas`
--
ALTER TABLE `tip_tas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `topes`
--
ALTER TABLE `topes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD KEY `usuarios_departamento_id_foreign` (`departamento_id`), ADD KEY `usuarios_aeropuerto_id_foreign` (`aeropuerto_id`), ADD KEY `usuarios_cargo_id_foreign` (`cargo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aeronaves`
--
ALTER TABLE `aeronaves`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `aeropuertos`
--
ALTER TABLE `aeropuertos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ajustes`
--
ALTER TABLE `ajustes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `aterrizajes`
--
ALTER TABLE `aterrizajes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `bancoscuentas`
--
ALTER TABLE `bancoscuentas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cargas`
--
ALTER TABLE `cargas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cargos_varios`
--
ALTER TABLE `cargos_varios`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT de la tabla `cliente_hangar`
--
ALTER TABLE `cliente_hangar`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cobros`
--
ALTER TABLE `cobros`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cobrospagos`
--
ALTER TABLE `cobrospagos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cobro_factura`
--
ALTER TABLE `cobro_factura`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT de la tabla `concils`
--
ALTER TABLE `concils`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `despegues`
--
ALTER TABLE `despegues`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT de la tabla `despegue_otros_cargo`
--
ALTER TABLE `despegue_otros_cargo`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estacionamientoclientes`
--
ALTER TABLE `estacionamientoclientes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estacionamientoconceptos`
--
ALTER TABLE `estacionamientoconceptos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estacionamientoops`
--
ALTER TABLE `estacionamientoops`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estacionamientooptarjetas`
--
ALTER TABLE `estacionamientooptarjetas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estacionamientooptickets`
--
ALTER TABLE `estacionamientooptickets`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estacionamientoopticketsdepositos`
--
ALTER TABLE `estacionamientoopticketsdepositos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estacionamientoportons`
--
ALTER TABLE `estacionamientoportons`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estacionamientos`
--
ALTER TABLE `estacionamientos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estacionamiento_aeronaves`
--
ALTER TABLE `estacionamiento_aeronaves`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `facturadetalles`
--
ALTER TABLE `facturadetalles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `facturametadatas`
--
ALTER TABLE `facturametadatas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `footers`
--
ALTER TABLE `footers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `hangars`
--
ALTER TABLE `hangars`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `horarios_aeronauticos`
--
ALTER TABLE `horarios_aeronauticos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `lista_tasas`
--
ALTER TABLE `lista_tasas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `metas`
--
ALTER TABLE `metas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `meta_detalles`
--
ALTER TABLE `meta_detalles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modelo_aeronaves`
--
ALTER TABLE `modelo_aeronaves`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=461;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `montos_fijos`
--
ALTER TABLE `montos_fijos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `nacionalidad_matriculas`
--
ALTER TABLE `nacionalidad_matriculas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT de la tabla `nacionalidad_vuelos`
--
ALTER TABLE `nacionalidad_vuelos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `otros_cargos`
--
ALTER TABLE `otros_cargos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=241;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `permission_usuario`
--
ALTER TABLE `permission_usuario`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pilotos`
--
ALTER TABLE `pilotos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT de la tabla `precios_aterrizajes_despegues`
--
ALTER TABLE `precios_aterrizajes_despegues`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `precios_cargas`
--
ALTER TABLE `precios_cargas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `puertos`
--
ALTER TABLE `puertos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `role_usuario`
--
ALTER TABLE `role_usuario`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tasa_cierres`
--
ALTER TABLE `tasa_cierres`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ta_tasas`
--
ALTER TABLE `ta_tasas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_aeronaves`
--
ALTER TABLE `tipo_aeronaves`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_matriculas`
--
ALTER TABLE `tipo_matriculas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tip_tas`
--
ALTER TABLE `tip_tas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `topes`
--
ALTER TABLE `topes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aeronaves`
--
ALTER TABLE `aeronaves`
ADD CONSTRAINT `aeronaves_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
ADD CONSTRAINT `aeronaves_hangar_id_foreign` FOREIGN KEY (`hangar_id`) REFERENCES `hangars` (`id`),
ADD CONSTRAINT `aeronaves_modelo_id_foreign` FOREIGN KEY (`modelo_id`) REFERENCES `modelo_aeronaves` (`id`),
ADD CONSTRAINT `aeronaves_nacionalidad_id_foreign` FOREIGN KEY (`nacionalidad_id`) REFERENCES `nacionalidad_matriculas` (`id`),
ADD CONSTRAINT `aeronaves_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_matriculas` (`id`);

--
-- Filtros para la tabla `ajustes`
--
ALTER TABLE `ajustes`
ADD CONSTRAINT `ajustes_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
ADD CONSTRAINT `ajustes_cobro_id_foreign` FOREIGN KEY (`cobro_id`) REFERENCES `cobros` (`id`);

--
-- Filtros para la tabla `aterrizajes`
--
ALTER TABLE `aterrizajes`
ADD CONSTRAINT `aterrizajes_aeronave_id_foreign` FOREIGN KEY (`aeronave_id`) REFERENCES `aeronaves` (`id`),
ADD CONSTRAINT `aterrizajes_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
ADD CONSTRAINT `aterrizajes_nacionalidadvuelo_id_foreign` FOREIGN KEY (`nacionalidadVuelo_id`) REFERENCES `nacionalidad_vuelos` (`id`),
ADD CONSTRAINT `aterrizajes_piloto_id_foreign` FOREIGN KEY (`piloto_id`) REFERENCES `pilotos` (`id`),
ADD CONSTRAINT `aterrizajes_puerto_id_foreign` FOREIGN KEY (`puerto_id`) REFERENCES `puertos` (`id`),
ADD CONSTRAINT `aterrizajes_tipomatricula_id_foreign` FOREIGN KEY (`tipoMatricula_id`) REFERENCES `tipo_matriculas` (`id`);

--
-- Filtros para la tabla `bancoscuentas`
--
ALTER TABLE `bancoscuentas`
ADD CONSTRAINT `bancoscuentas_banco_id_foreign` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`);

--
-- Filtros para la tabla `cargas`
--
ALTER TABLE `cargas`
ADD CONSTRAINT `cargas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
ADD CONSTRAINT `clientes_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `cliente_hangar`
--
ALTER TABLE `cliente_hangar`
ADD CONSTRAINT `cliente_hangar_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
ADD CONSTRAINT `cliente_hangar_hangar_id_foreign` FOREIGN KEY (`hangar_id`) REFERENCES `hangars` (`id`);

--
-- Filtros para la tabla `cobrospagos`
--
ALTER TABLE `cobrospagos`
ADD CONSTRAINT `cobrospagos_banco_id_foreign` FOREIGN KEY (`banco_id`) REFERENCES `bancoscuentas` (`banco_id`),
ADD CONSTRAINT `cobrospagos_cobro_id_foreign` FOREIGN KEY (`cobro_id`) REFERENCES `cobros` (`id`),
ADD CONSTRAINT `cobrospagos_cuenta_id_foreign` FOREIGN KEY (`cuenta_id`) REFERENCES `bancoscuentas` (`id`);

--
-- Filtros para la tabla `cobro_factura`
--
ALTER TABLE `cobro_factura`
ADD CONSTRAINT `cobro_factura_cobro_id_foreign` FOREIGN KEY (`cobro_id`) REFERENCES `cobros` (`id`),
ADD CONSTRAINT `cobro_factura_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`);

--
-- Filtros para la tabla `conceptos`
--
ALTER TABLE `conceptos`
ADD CONSTRAINT `conceptos_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
ADD CONSTRAINT `conceptos_modulo_id_foreign` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`);

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
ADD CONSTRAINT `contratos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
ADD CONSTRAINT `contratos_concepto_id_foreign` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`);

--
-- Filtros para la tabla `despegues`
--
ALTER TABLE `despegues`
ADD CONSTRAINT `despegues_aeronave_id_foreign` FOREIGN KEY (`aeronave_id`) REFERENCES `aeronaves` (`id`),
ADD CONSTRAINT `despegues_aterrizaje_id_foreign` FOREIGN KEY (`aterrizaje_id`) REFERENCES `aterrizajes` (`id`),
ADD CONSTRAINT `despegues_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
ADD CONSTRAINT `despegues_nacionalidadvuelo_id_foreign` FOREIGN KEY (`nacionalidadVuelo_id`) REFERENCES `nacionalidad_vuelos` (`id`),
ADD CONSTRAINT `despegues_piloto_id_foreign` FOREIGN KEY (`piloto_id`) REFERENCES `pilotos` (`id`),
ADD CONSTRAINT `despegues_puerto_id_foreign` FOREIGN KEY (`puerto_id`) REFERENCES `puertos` (`id`),
ADD CONSTRAINT `despegues_tipomatricula_id_foreign` FOREIGN KEY (`tipoMatricula_id`) REFERENCES `tipo_matriculas` (`id`);

--
-- Filtros para la tabla `despegue_otros_cargo`
--
ALTER TABLE `despegue_otros_cargo`
ADD CONSTRAINT `despegue_otros_cargo_despegue_id_foreign` FOREIGN KEY (`despegue_id`) REFERENCES `despegues` (`id`),
ADD CONSTRAINT `despegue_otros_cargo_otroscargo_id_foreign` FOREIGN KEY (`otrosCargo_id`) REFERENCES `otros_cargos` (`id`);

--
-- Filtros para la tabla `estacionamientoclientes`
--
ALTER TABLE `estacionamientoclientes`
ADD CONSTRAINT `estacionamientoclientes_estacionamiento_id_foreign` FOREIGN KEY (`estacionamiento_id`) REFERENCES `estacionamientos` (`id`);

--
-- Filtros para la tabla `estacionamientoconceptos`
--
ALTER TABLE `estacionamientoconceptos`
ADD CONSTRAINT `estacionamientoconceptos_estacionamiento_id_foreign` FOREIGN KEY (`estacionamiento_id`) REFERENCES `estacionamientos` (`id`);

--
-- Filtros para la tabla `estacionamientooptarjetas`
--
ALTER TABLE `estacionamientooptarjetas`
ADD CONSTRAINT `estacionamientooptarjetas_banco_id_foreign` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`),
ADD CONSTRAINT `estacionamientooptarjetas_bancoscuenta_id_foreign` FOREIGN KEY (`bancoscuenta_id`) REFERENCES `bancoscuentas` (`id`),
ADD CONSTRAINT `estacionamientooptarjetas_estacionamientocliente_id_foreign` FOREIGN KEY (`estacionamientocliente_id`) REFERENCES `estacionamientoclientes` (`id`),
ADD CONSTRAINT `estacionamientooptarjetas_estacionamientoop_id_foreign` FOREIGN KEY (`estacionamientoop_id`) REFERENCES `estacionamientoops` (`id`);

--
-- Filtros para la tabla `estacionamientooptickets`
--
ALTER TABLE `estacionamientooptickets`
ADD CONSTRAINT `estacionamientooptickets_econcepto_id_foreign` FOREIGN KEY (`econcepto_id`) REFERENCES `estacionamientoconceptos` (`id`),
ADD CONSTRAINT `estacionamientooptickets_estacionamientoop_id_foreign` FOREIGN KEY (`estacionamientoop_id`) REFERENCES `estacionamientoops` (`id`);

--
-- Filtros para la tabla `estacionamientoopticketsdepositos`
--
ALTER TABLE `estacionamientoopticketsdepositos`
ADD CONSTRAINT `estacionamientoopticketsdepositos_banco_id_foreign` FOREIGN KEY (`banco_id`) REFERENCES `bancos` (`id`),
ADD CONSTRAINT `estacionamientoopticketsdepositos_bancoscuenta_id_foreign` FOREIGN KEY (`bancoscuenta_id`) REFERENCES `bancoscuentas` (`id`),
ADD CONSTRAINT `estacionamientoopticketsdepositos_estacionamientoop_id_foreign` FOREIGN KEY (`estacionamientoop_id`) REFERENCES `estacionamientoops` (`id`);

--
-- Filtros para la tabla `estacionamientoportons`
--
ALTER TABLE `estacionamientoportons`
ADD CONSTRAINT `estacionamientoportons_estacionamiento_id_foreign` FOREIGN KEY (`estacionamiento_id`) REFERENCES `estacionamientos` (`id`);

--
-- Filtros para la tabla `estacionamientos`
--
ALTER TABLE `estacionamientos`
ADD CONSTRAINT `estacionamientos_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`);

--
-- Filtros para la tabla `facturadetalles`
--
ALTER TABLE `facturadetalles`
ADD CONSTRAINT `facturadetalles_concepto_id_foreign` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`),
ADD CONSTRAINT `facturadetalles_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`);

--
-- Filtros para la tabla `facturametadatas`
--
ALTER TABLE `facturametadatas`
ADD CONSTRAINT `facturametadatas_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
ADD CONSTRAINT `facturas_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
ADD CONSTRAINT `facturas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `hangars`
--
ALTER TABLE `hangars`
ADD CONSTRAINT `hangars_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`);

--
-- Filtros para la tabla `metas`
--
ALTER TABLE `metas`
ADD CONSTRAINT `metas_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`);

--
-- Filtros para la tabla `meta_detalles`
--
ALTER TABLE `meta_detalles`
ADD CONSTRAINT `meta_detalles_concepto_id_foreign` FOREIGN KEY (`concepto_id`) REFERENCES `conceptos` (`id`),
ADD CONSTRAINT `meta_detalles_meta_id_foreign` FOREIGN KEY (`meta_id`) REFERENCES `metas` (`id`);

--
-- Filtros para la tabla `modelo_aeronaves`
--
ALTER TABLE `modelo_aeronaves`
ADD CONSTRAINT `modelo_aeronaves_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_aeronaves` (`id`);

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
ADD CONSTRAINT `modulos_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`);

--
-- Filtros para la tabla `otros_cargos`
--
ALTER TABLE `otros_cargos`
ADD CONSTRAINT `otros_cargos_conceptocontado_id_foreign` FOREIGN KEY (`conceptoContado_id`) REFERENCES `conceptos` (`id`),
ADD CONSTRAINT `otros_cargos_conceptocredito_id_foreign` FOREIGN KEY (`conceptoCredito_id`) REFERENCES `conceptos` (`id`);

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_usuario`
--
ALTER TABLE `permission_usuario`
ADD CONSTRAINT `permission_usuario_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `permission_usuario_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pilotos`
--
ALTER TABLE `pilotos`
ADD CONSTRAINT `pilotos_nacionalidad_id_foreign` FOREIGN KEY (`nacionalidad_id`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `precios_cargas`
--
ALTER TABLE `precios_cargas`
ADD CONSTRAINT `precios_cargas_conceptocontado_id_foreign` FOREIGN KEY (`conceptoContado_id`) REFERENCES `conceptos` (`id`),
ADD CONSTRAINT `precios_cargas_conceptocredito_id_foreign` FOREIGN KEY (`conceptoCredito_id`) REFERENCES `conceptos` (`id`);

--
-- Filtros para la tabla `puertos`
--
ALTER TABLE `puertos`
ADD CONSTRAINT `puertos_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `role_usuario`
--
ALTER TABLE `role_usuario`
ADD CONSTRAINT `role_usuario_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `role_usuario_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_aeropuerto_id_foreign` FOREIGN KEY (`aeropuerto_id`) REFERENCES `aeropuertos` (`id`),
ADD CONSTRAINT `usuarios_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
ADD CONSTRAINT `usuarios_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
