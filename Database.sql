-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2024 a las 17:29:16
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fedexbrayam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL,
  `actividad` varchar(1000) NOT NULL,
  `fechaInicial` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `responsableActividad` varchar(40) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `Terminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `actividad`, `fechaInicial`, `fechaFinal`, `responsableActividad`, `id_obra`, `fechaRegistro`, `Terminado`) VALUES
(1, 'Colocar baldosas en los suelos', '2024-05-17', '2024-05-24', 'Brayam Fajardo', 6, '2024-05-17', 0),
(2, 'Colocar ventanas', '2024-05-18', '2024-05-20', 'Brayam Fajardo', 6, '2024-05-17', 1),
(3, 'Colocar Marcos y aligerar la parte superior de ellos', '2024-05-17', '2024-05-31', 'Brayam Fajardo', 6, '2024-05-17', 0),
(4, 'Ubicación de los arbustos en el patio', '2024-05-17', '2024-05-24', 'Silvana barandica', 6, '2024-05-17', 1),
(5, 'Que se dedica a la imprenta desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente', '2024-05-17', '2024-05-24', 'Silvana barandica', 6, '2024-05-17', 0),
(6, 'programa de entregas', '2024-05-23', '2024-05-30', 'marco', 1, '2024-05-23', 0),
(7, 'tuberia en piso 5', '2024-06-07', '2024-06-14', 'marisol hernandez', 6, '2024-06-03', 0),
(8, 'ter', '2024-06-22', '2024-06-23', 'jorge', 1, '2024-06-21', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `alias` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombres` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` bigint(14) NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_clientep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `alias`, `nombres`, `apellidos`, `telefono`, `mail`, `id_clientep`) VALUES
(1, 'ismael jr', 'ismael', 'rodriguez duran', 6144883903, 'irodriguez@cen.com', 2),
(2, 'teporaca', 'jorge federico', 'duran armendariz', 6144883904, 'jfduranar@outlook.com', 1),
(3, 'CTU', 'ANDRES', 'ELIAS MADERO', 6141844364, 'irodriguez@cen.com', 1),
(10, 'marycha', 'Marisol', 'Hernandez', 6141844364, 'hdez@hotmail.com', 1),
(17, 'bfajardo', 'Brayam', 'Fajardo Velasquez', 3023158717, 'brayamFajardo23@gmail.com', 2),
(25, 'MJimena', 'Maria Jimena', 'Muñoz garavito', 3204950121, 'Mjimena@gmail.com', 1),
(26, 'RuFino', 'Raul', 'Hernandez pumarejo', 3098798628, 'RaulFino@gmail.com', 1),
(27, 'Jdavid', 'Jose David', 'Velasquez', 3152569816, 'jDavid@gmail.com', 1),
(28, 'TRengifo', 'Tamara', 'Rengifo', 3203562024, 'TRengifo@gmail.com', 1),
(29, 'TRengifo', 'Tamara', 'Rengifo', 3098798628, 'TRengifo@gmail.com', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientep`
--

CREATE TABLE `clientep` (
  `id_clientep` int(11) NOT NULL,
  `alias` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombres` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` bigint(14) NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numusuarios` int(11) NOT NULL,
  `pagaste` tinyint(1) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientep`
--

INSERT INTO `clientep` (`id_clientep`, `alias`, `nombres`, `apellidos`, `telefono`, `mail`, `numusuarios`, `pagaste`, `fecha_inicio`, `fecha_final`, `fecha_registro`) VALUES
(1, 'CTU', 'jorge federico', 'duran armendariz', 6144883904, 'jfduranar@outlook.com', 3, 1, '2023-12-19', '2024-12-19', '2023-12-19'),
(2, 'cen', 'ismael', 'rodriguez duran', 6144883903, 'irodriguez@cen.com', 2, 1, '0000-00-00', '0000-00-00', '0000-00-00'),
(3, 'angeles', 'rodolfo', 'chavez', 6144883904, 'rchavez@angeles.com', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(6, 'teporaca', 'jorge federico', 'duran armendariz', 6144883904, 'jfduranar@outlook.com', 10, 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(7, 'MARY', 'MARISOL', 'HERNANDEZ', 6141844364, 'mary@hotmail.com', 3, 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(15, 'Jumbo', 'Silvana', 'Lopez', 3023158717, 'SilvanaLopez@gmail.com', 3, 1, '2024-05-03', '2024-06-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE `concepto` (
  `id_concepto` int(11) NOT NULL,
  `concepto` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `concepto`
--

INSERT INTO `concepto` (`id_concepto`, `concepto`, `id_obra`) VALUES
(1, 'Casa', 6),
(3, 'Losas', 6),
(4, 'Muros', 6),
(5, 'Patio', 6),
(7, 'AlbaÃ±ileria', 6),
(8, 'ESTUCTURA', 6),
(9, 'minipartida', 6),
(10, 'ACCESO', 6),
(11, 'BRAYAM', 6),
(12, 'ACABADOS', 1),
(13, 'MARISOL', 6),
(14, 'JORGE', 6),
(15, 'ESTRUCTURA', 11),
(16, 'ADMINISTRADOR DE OBRA', 11),
(17, 'SUPERVISION EXTERNA', 11),
(18, 'PATIO', 6),
(19, 'ESTUCTURA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id_concepto` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `concepto` varchar(600) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id_concepto`, `id_obra`, `concepto`) VALUES
(1, 6, 'colocacion cerÃ¡mica'),
(4, 6, 'piso de cerÃ¡mica modelo stan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratista`
--

CREATE TABLE `contratista` (
  `id_contratista` int(11) NOT NULL,
  `aliascontratista` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombres` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` bigint(14) NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `contratista`
--

INSERT INTO `contratista` (`id_contratista`, `aliascontratista`, `nombres`, `apellidos`, `telefono`, `mail`, `id_obra`) VALUES
(2, 'MSimpson', 'March', 'Simpson', 3023148718, 'MarchSimpson@gmail.com', 6),
(4, 'Trengifo', 'Tamara nicoll', 'rengifo Benavides', 3203269294, 'Trengifo@gmail.com', 6),
(6, 'Marisol', 'Marisol', 'Hernandez Martinez', 6148443904, 'jfduranar@outlook.com', 6),
(7, 'Redux', 'Esau', 'armenta', 6148443904, 'jfduranar@outlook.com', 1),
(8, 'REDUX', 'Esau', 'armenta', 6148443904, 'jfduranar@outlook.com', 6),
(9, 'REDUX', 'Esau', 'armenta', 6148443904, 'jfduranar@outlook.com', 11),
(10, 'COESPELEC', 'Esau', 'armenta', 6148443904, 'jfduranar@outlook.com', 11),
(11, 'TEPORACA', 'jorge', 'duran armendariz', 6148443904, 'jfduranar@outlook.com', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id_contrato` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `importe_pesos` float NOT NULL,
  `anticipo_pesos` float NOT NULL,
  `importe_dolares` float NOT NULL,
  `anticipo_dolares` float NOT NULL,
  `id_contratista` int(11) NOT NULL,
  `fgpesos` float NOT NULL,
  `fgdolares` float NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `id_subconcepto` int(11) NOT NULL,
  `fact_pesos` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `factt_dolares` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id_contrato`, `id_obra`, `importe_pesos`, `anticipo_pesos`, `importe_dolares`, `anticipo_dolares`, `id_contratista`, `fgpesos`, `fgdolares`, `id_concepto`, `id_subconcepto`, `fact_pesos`, `factt_dolares`) VALUES
(2, 6, 12345, 1, 23, 2, 6, 0.05, 0.05, 3, 19, '1', ''),
(3, 6, 12346, 1, 23, 2, 6, 0.05, 0.05, 1, 26, '2', ''),
(4, 6, 1, 0, 2, 0, 2, 0.05, 0.05, 4, 20, '3', ''),
(5, 6, 2, 1, 3, 1, 4, 0.05, 0.05, 1, 24, '4', ''),
(6, 6, 1, 0, 2, 0, 4, 0, 0, 8, 30, '5', ''),
(7, 6, 250, 0, 250, 0, 2, 0, 0, 10, 32, '6', ''),
(8, 6, 1, 0, 2, 0, 8, 0.05, 0.05, 11, 33, '7', ''),
(9, 6, 100000, 25, 30000, 30, 6, 0.05, 0.05, 13, 36, '8', ''),
(10, 6, 100010, 1, 25000, 2, 6, 0.05, 0.05, 13, 35, '9', 'primera'),
(11, 6, 1, 0.5, 2, 0.5, 6, 0.05, 0.05, 14, 37, '10', ''),
(12, 6, 20, 10, 30, 10, 6, 0.05, 0.05, 14, 38, '11', ''),
(13, 11, 1000000, 200000, 0, 0, 9, 0.05, 0, 15, 39, '12', ''),
(14, 11, 900000, 100000, 0, 0, 10, 0.05, 0, 16, 40, 'lkjhhu', ''),
(15, 11, 220000, 0, 0, 0, 11, 0, 0, 17, 42, '14', ''),
(18, 1, 30000, 0, 0, 0, 7, 0.05, 0, 19, 45, '', ''),
(19, 6, 1, 0, 1, 0, 6, 0, 0, 13, 36, '', ''),
(20, 6, 10000, 0, 0, 0, 6, 0, 0, 8, 27, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadrilla`
--

CREATE TABLE `cuadrilla` (
  `id_cuadrilla` int(11) NOT NULL,
  `cuadrilla` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuadrilla`
--

INSERT INTO `cuadrilla` (`id_cuadrilla`, `cuadrilla`, `id_obra`) VALUES
(1, 'CUADRILLA 1', 6),
(2, 'CUDRILLA 2', 6),
(3, 'CUADRILLA 3', 6),
(4, 'CUADRILLA 4', 6),
(5, 'CUADRILLA 5', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadrillas`
--

CREATE TABLE `cuadrillas` (
  `id_cuadrillas` int(11) NOT NULL,
  `id_cuadrilla` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `id_oficio` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `salariobase` float NOT NULL,
  `salarioreal` float NOT NULL,
  `unidad` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuadrillas`
--

INSERT INTO `cuadrillas` (`id_cuadrillas`, `id_cuadrilla`, `id_obra`, `id_oficio`, `cantidad`, `salariobase`, `salarioreal`, `unidad`) VALUES
(1, 1, 6, 6, 1, 642.86, 1159.1, 'jornada'),
(2, 1, 6, 7, 1, 642.86, 1159.1, 'jornada'),
(3, 1, 6, 8, 1, 642.86, 1159.1, 'jornada'),
(4, 2, 6, 7, 1, 642.86, 1159.1, 'jornada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estimacion`
--

CREATE TABLE `estimacion` (
  `id_estimacion` int(11) NOT NULL,
  `numestimacion` int(11) NOT NULL,
  `importe_pesos` float NOT NULL,
  `amort_pesos` float NOT NULL,
  `importe_dolares` float NOT NULL,
  `amort_dolares` float NOT NULL,
  `id_obra` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `fg_pesos` float NOT NULL,
  `fg_dolares` float NOT NULL,
  `factura_pesos` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `factura_dolares` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estimacion`
--

INSERT INTO `estimacion` (`id_estimacion`, `numestimacion`, `importe_pesos`, `amort_pesos`, `importe_dolares`, `amort_dolares`, `id_obra`, `id_contrato`, `fg_pesos`, `fg_dolares`, `factura_pesos`, `factura_dolares`) VALUES
(2, 2, 10000, 5000, 0, 0, 6, 10, 2000, 0, '', ''),
(3, 3, 7500, 5000, 0, 0, 6, 10, 2000, 0, '', ''),
(4, 4, 2500, 1000, 0, 0, 6, 10, 200, 0, '', ''),
(5, 5, 10, 2, 0, 0, 6, 10, 1, 0, '', ''),
(6, 6, 25, 10, 0, 0, 6, 10, 2, 0, '', ''),
(14, 9, 15, 1, 0, 0, 6, 10, 1, 0, 'fasdf', ''),
(19, 14, 25, 12, 0, 0, 6, 10, 5, 0, 'wgwey35', ''),
(20, 15, 25, 12, 0, 0, 6, 10, 10, 0, 'wgwey356', ''),
(21, 16, 52, 30, 0, 0, 6, 10, 2, 0, 'wgwey356', ''),
(22, 17, 52, 30, 0, 0, 6, 10, 2, 0, 'wgwey300', ''),
(23, 18, 152, 30, 0, 0, 6, 10, 2, 0, 'wgwey400', ''),
(24, 19, 10, 1, 0, 0, 6, 10, 1, 0, '1235', ''),
(25, 20, 5000, 300, 0, 0, 6, 10, 20, 0, 'wgwey', ''),
(26, 21, 6, 1, 0, 0, 6, 10, 1, 0, 'lopez1', ''),
(27, 1, 100, 30, 0, 0, 6, 7, 5, 0, 'lopez1', ''),
(28, 1, 200000, 40000, 0, 0, 11, 13, 10000, 0, 'wgwey', ''),
(29, 1, 100000, 10000, 0, 0, 11, 14, 5000, 0, 'wgwey', ''),
(30, 2, 25000, 2, 0, 0, 11, 14, 1, 0, 'wgwey', ''),
(31, 1, 55000, 0, 0, 0, 11, 15, 0, 0, 'wgwey', ''),
(32, 2, 100000, 10000, 0, 0, 11, 13, 5000, 0, 'lopez1', ''),
(33, 22, 2, 0, 0, 0, 6, 10, 0, 0, '365', ''),
(34, 1, 1, 0, 0, 0, 6, 2, 0, 0, 'lopez1', ''),
(35, 2, 1, 0, 0, 0, 6, 2, 0, 0, 'lopez1', ''),
(36, 3, 1, 0, 0, 0, 6, 2, 0, 0, 'lopez1', ''),
(37, 23, 1, 0, 0, 0, 6, 10, 0, 0, 'lopez1', ''),
(38, 24, 1, 0, 0, 0, 6, 10, 0, 0, 'lopez1', ''),
(39, 1, 1, 0, 0, 0, 6, 12, 0, 0, 'lopez1', ''),
(40, 25, 1, 0, 0, 0, 6, 10, 0, 0, 'lopez1', ''),
(41, 2, 1, 0, 0, 0, 11, 15, 0, 0, 'lopez1', ''),
(42, 1, 1, 0, 0, 0, 6, 8, 0, 0, 'lopez1', ''),
(43, 26, 1, 0, 0, 0, 6, 10, 0, 0, 'lopez1', ''),
(44, 27, 5, 2, 0, 0, 6, 10, 1, 0, 'lopez1', ''),
(45, 1, 1, 0, 0, 0, 6, 5, 0, 0, 'lopez', ''),
(46, 2, 0, 0, 2, 0, 6, 8, 0, 0, '', '366'),
(54, 28, 50, 20, 0, 0, 6, 10, 10, 0, 'asdfadf', ''),
(63, 29, 15, 5, 0, 0, 6, 10, 2, 0, 'asdfadf', ''),
(70, 1, 23, 1, 0, 0, 6, 0, 1, 0, 'eyeuue', ''),
(71, 7, 0, 0, 5000, 1000, 6, 9, 0, 50, '', 'pore'),
(72, 1, 25000, 12000, 0, 0, 6, 0, 6000, 0, 'poty', ''),
(73, 1, 1, 1, 0, 0, 6, 0, 0, 0, 'wert', ''),
(74, 1, 50000, 25000, 0, 0, 6, 0, 12500, 0, 'trew', ''),
(75, 30, 0, 0, 12000, 5000, 6, 10, 0, 0, '', 'poiuyt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estimaciondet`
--

CREATE TABLE `estimaciondet` (
  `id_estimaciondet` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `importe_pesos` float NOT NULL,
  `importe_dolares` float NOT NULL,
  `concepto` varchar(600) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pupesos` float NOT NULL,
  `cantidadpesos` float NOT NULL,
  `cantidaddolares` float NOT NULL,
  `pudolares` float NOT NULL,
  `unidad` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `contador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estimaciondet`
--

INSERT INTO `estimaciondet` (`id_estimaciondet`, `id_obra`, `importe_pesos`, `importe_dolares`, `concepto`, `pupesos`, `cantidadpesos`, `cantidaddolares`, `pudolares`, `unidad`, `id_contrato`, `contador`) VALUES
(1, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 1),
(2, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 1),
(3, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 1),
(4, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 1),
(5, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 5, 1),
(6, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 1),
(7, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 2),
(8, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 3),
(9, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 4),
(10, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 5),
(11, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 6),
(12, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 7),
(13, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 8),
(14, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 9),
(15, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 10),
(16, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 11),
(17, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 12),
(18, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 13),
(19, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 14),
(20, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 7, 15),
(21, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 1),
(22, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 2),
(23, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 3),
(24, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 4),
(25, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 5),
(26, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 6),
(27, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 7),
(28, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 8),
(29, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 9),
(30, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 10),
(31, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 11),
(32, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 12),
(33, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 13),
(34, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 14),
(35, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 15),
(36, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 1),
(37, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 2),
(38, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 3),
(39, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 4),
(40, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 5),
(41, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 6),
(42, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 7),
(43, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 8),
(44, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 9),
(45, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 10),
(46, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 11),
(47, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 12),
(48, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 13),
(49, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 14),
(50, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 15),
(51, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 1),
(52, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 2),
(53, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 3),
(54, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 4),
(55, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 5),
(56, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 6),
(57, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 7),
(58, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 8),
(59, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 9),
(60, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 10),
(61, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 11),
(62, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 12),
(63, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 13),
(64, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 14),
(65, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 15),
(66, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 1),
(67, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 2),
(68, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 3),
(69, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 4),
(70, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 5),
(71, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 6),
(72, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 7),
(73, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 8),
(74, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 9),
(75, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 10),
(76, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 11),
(77, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 12),
(78, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 13),
(79, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 14),
(80, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 10, 15),
(81, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 1),
(82, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 2),
(83, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 3),
(84, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 4),
(85, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 5),
(86, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 6),
(87, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 7),
(88, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 8),
(89, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 9),
(90, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 10),
(91, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 11),
(92, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 12),
(93, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 13),
(94, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 14),
(95, 6, 150, 0, 'abc', 15, 10, 0, 0, 'ml', 3, 15),
(96, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 1),
(97, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 2),
(98, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 3),
(99, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 4),
(100, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 5),
(101, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 6),
(102, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 7),
(103, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 8),
(104, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 9),
(105, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 10),
(106, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 11),
(107, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 12),
(108, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 13),
(109, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 14),
(110, 6, 0, 150, 'abc', 0, 0, 10, 15, 'ml', 9, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `id_familia` int(11) NOT NULL,
  `familia` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`id_familia`, `familia`, `id_obra`) VALUES
(1, 'ALBAÃ‘ILERIA', 6),
(2, 'ESTRUCTURA', 6),
(4, 'ACABADOS', 6),
(6, 'ELECTRICO', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fasar`
--

CREATE TABLE `fasar` (
  `id_fasar` int(11) NOT NULL,
  `uma` float NOT NULL,
  `salmin` float NOT NULL,
  `diasano` float NOT NULL,
  `diasvacaciones` float NOT NULL,
  `diasprimavacacional` float NOT NULL,
  `diasfestivos` float NOT NULL,
  `diasclima` float NOT NULL,
  `diascostumbre` float NOT NULL,
  `diasenfermedad` float NOT NULL,
  `diassindicales` float NOT NULL,
  `diasdomingo` float NOT NULL,
  `diasaguinaldo` float NOT NULL,
  `id_obra` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `pisn` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fasar`
--

INSERT INTO `fasar` (`id_fasar`, `uma`, `salmin`, `diasano`, `diasvacaciones`, `diasprimavacacional`, `diasfestivos`, `diasclima`, `diascostumbre`, `diasenfermedad`, `diassindicales`, `diasdomingo`, `diasaguinaldo`, `id_obra`, `ano`, `pisn`) VALUES
(1, 108.57, 248.93, 366, 12, 3, 8, 3.85, 6, 0.45, 1, 52, 15, 0, 2024, 0.03);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `id_oficio` int(11) NOT NULL,
  `oficio` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `importe_pesos` float NOT NULL,
  `importe_pesostotal` float NOT NULL,
  `id_obra` int(11) NOT NULL,
  `unidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`id_oficio`, `oficio`, `importe_pesos`, `importe_pesostotal`, `id_obra`, `unidad`) VALUES
(1, 'PEON', 350, 0, 6, 'jornada'),
(2, 'ALBAÑIL', 500, 0, 6, 'jornada'),
(3, 'HERRERO', 400, 0, 6, 'jornada'),
(4, 'CARPINTERO', 0, 0, 6, ''),
(8, 'AYUDANTE', 0, 0, 6, ''),
(11, 'AYUDANTE HERRERO', 0, 0, 6, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id_material` int(11) NOT NULL,
  `material` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_familia` int(11) NOT NULL,
  `fechareg` date NOT NULL,
  `id_obra` int(11) NOT NULL,
  `unidad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `importe_pesos` float NOT NULL,
  `importe_dolares` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id_material`, `material`, `id_familia`, `fechareg`, `id_obra`, `unidad`, `importe_pesos`, `importe_dolares`) VALUES
(1, 'blok 15 x 20 x 40', 1, '0000-00-00', 6, 'pza', 15, 0),
(2, 'block de concreto 20 x20 x20', 1, '0000-00-00', 6, 'pza', 18, 0),
(3, 'concreto fc 200 kg/cm2', 2, '0000-00-00', 6, 'm3', 3000, 0),
(4, 'pintura amarilla osel plata', 4, '0000-00-00', 6, 'bote 19 lts', 450, 0),
(5, 'piso de ceramica 30x30 modelo inter', 4, '0000-00-00', 6, 'm2', 0, 0),
(6, 'cable de cobre calibre 12', 6, '0000-00-00', 6, 'kg', 0, 0),
(7, 'cable de cobre calibre 10', 6, '0000-00-00', 6, 'kg', 0, 0),
(8, 'concreto fc 400 kg/cm2', 2, '0000-00-00', 6, 'm3', 0, 0),
(9, 'cemento portland', 1, '0000-00-00', 6, 'saco', 0, 0),
(10, 'PISO DE CERAMICA 60 x 120', 4, '0000-00-00', 6, 'M2', 750, 0),
(11, 'PISO CERAMICA 30 X 60', 1, '0000-00-00', 6, 'm2', 750, 1),
(12, 'pegamento para piso', 1, '0000-00-00', 6, 'saco', 350, 0),
(13, 'pegamento para piso1', 1, '0000-00-00', 6, 'saco', 350, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `id_obra` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_clientep` int(11) NOT NULL,
  `tc` float NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`id_obra`, `nombre`, `id_clientep`, `tc`, `id_cliente`) VALUES
(1, 'element', 1, 18.53, 3),
(2, 'ismael jr', 2, 18.5, 2),
(4, 'angeles', 3, 18.58, 1),
(6, 'brayam', 1, 21.2, 17),
(7, 'Metro', 1, 18.9, 26),
(9, 'TransMilenio', 1, 13.7, 2),
(11, 'Calle 68', 1, 20, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio`
--

CREATE TABLE `oficio` (
  `id_oficio` int(11) NOT NULL,
  `oficio` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `unidad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `importe_pesos` float NOT NULL,
  `importe_pesosfsr` float NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `oficio`
--

INSERT INTO `oficio` (`id_oficio`, `oficio`, `unidad`, `importe_pesos`, `importe_pesosfsr`, `id_obra`) VALUES
(6, 'HERRERO', 'jornada', 642.86, 0, 6),
(7, 'PEON', 'jornada', 642.86, 0, 6),
(8, 'CARPINTERO', 'jornada', 642.86, 0, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preciospu`
--

CREATE TABLE `preciospu` (
  `id_preciospu` int(11) NOT NULL,
  `unidad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidadmatp` float NOT NULL,
  `pumatd` float NOT NULL,
  `pumatp` float NOT NULL,
  `cantidadmatd` float NOT NULL,
  `cantidadmo` float NOT NULL,
  `pumo` float NOT NULL,
  `cantidadmaq` float NOT NULL,
  `pumaq` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preciospu`
--

INSERT INTO `preciospu` (`id_preciospu`, `unidad`, `id_concepto`, `id_obra`, `id_material`, `cantidadmatp`, `pumatd`, `pumatp`, `cantidadmatd`, `cantidadmo`, `pumo`, `cantidadmaq`, `pumaq`) VALUES
(2, 'm2', 1, 6, 10, 1.05, 0, 750, 0, 0, 0, 0, 0),
(3, '', 1, 6, 12, 0.25, 0, 350, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `id_presupuesto` int(11) NOT NULL,
  `contratado` tinyint(1) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `importe_pesos` float NOT NULL,
  `importe_dolares` float NOT NULL,
  `id_contratista` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `id_subconcepto` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`id_presupuesto`, `contratado`, `id_obra`, `importe_pesos`, `importe_dolares`, `id_contratista`, `id_concepto`, `id_subconcepto`, `id_contrato`, `numero`) VALUES
(1, 0, 6, 10000, 20000, 0, 1, 24, 0, 0),
(2, 0, 6, 5000, 10000, 0, 1, 25, 0, 0),
(3, 0, 6, 75325.2, 0, 0, 7, 23, 0, 0),
(4, 0, 6, 150000, 0, 0, 3, 19, 0, 0),
(5, 0, 6, 50000, 50000, 0, 8, 27, 0, 0),
(6, 0, 6, 35000, 35000, 0, 8, 30, 0, 0),
(7, 0, 6, 10000, 2000, 0, 10, 32, 0, 0),
(8, 0, 6, 5000, 5000, 0, 11, 33, 0, 0),
(10, 0, 6, 500000, 100000, 0, 13, 35, 0, 0),
(11, 0, 6, 1000000, 50000, 0, 14, 37, 0, 0),
(12, 0, 11, 1500000, 0, 0, 15, 39, 0, 0),
(13, 0, 11, 950000, 0, 0, 16, 40, 0, 0),
(14, 0, 11, 220000, 0, 0, 17, 42, 0, 0),
(15, 0, 6, 10000, 15000, 0, 5, 43, 0, 0),
(20, 0, 1, 30000, 0, 0, 19, 45, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestopu`
--

CREATE TABLE `presupuestopu` (
  `id_preupuestoPU` int(11) NOT NULL,
  `ssubconcepto` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `id_subconcepto` int(11) NOT NULL,
  `id_ssubconcepto` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `cantidadpesos` float NOT NULL,
  `unidad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `pupesos` float NOT NULL,
  `cantidaddolares` float NOT NULL,
  `importepesos` float NOT NULL,
  `pud` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presupuestopu`
--

INSERT INTO `presupuestopu` (`id_preupuestoPU`, `ssubconcepto`, `id_concepto`, `id_subconcepto`, `id_ssubconcepto`, `id_obra`, `cantidadpesos`, `unidad`, `pupesos`, `cantidaddolares`, `importepesos`, `pud`) VALUES
(7, 'concepto 3', 13, 36, 0, 6, 250, 'ml', 20, 300, 0, 0),
(9, 'zapata a-1', 8, 30, 0, 6, 8, 'pza', 0, 0, 0, 0),
(10, 'zapata -A3', 8, 27, 0, 6, 10, 'pza', 0, 0, 0, 0),
(11, 'delete', 13, 35, 0, 6, 15, 'm3', 0, 2, 0, 0),
(12, 'concepto 1', 8, 30, 0, 6, 12, 'pza', 0, 13, 0, 23),
(15, 'concepto3', 1, 24, 0, 6, 0, 'ml', 0, 0, 0, 0),
(19, 'colocacion cerÃ¡mica', 13, 36, 0, 6, 250, 'm2', 0, 0, 0, 0),
(21, 'coloacion cerÃ¡mica', 13, 36, 0, 6, 250, 'm2', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ssubconcepto`
--

CREATE TABLE `ssubconcepto` (
  `id_ssubconcepto` int(11) NOT NULL,
  `ssubconcepto` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_subconcepto` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ssubconcepto`
--

INSERT INTO `ssubconcepto` (`id_ssubconcepto`, `ssubconcepto`, `id_subconcepto`, `id_concepto`, `id_obra`) VALUES
(1, 'asimASIM', 36, 13, 6),
(2, 'piso de concreto', 36, 13, 6),
(3, 'piso de concreto pulido', 36, 13, 6),
(5, 'concepto1', 33, 11, 6),
(17, 'concepto 3', 0, 13, 6),
(18, 'concepto 4', 36, 13, 6),
(19, 'zapata a-1', 30, 8, 6),
(30, 'zapata -A3', 27, 8, 6),
(31, 'delete', 35, 13, 6),
(32, 'concepto 1', 30, 8, 6),
(36, 'zapata A-2', 30, 8, 6),
(37, 'zapata A-2', 30, 8, 6),
(38, 'zapata A-2', 26, 1, 6),
(39, 'zapata A-2', 26, 1, 6),
(40, 'concepto1', 24, 1, 6),
(41, 'concepto1', 24, 1, 6),
(42, 'concepto2', 24, 1, 6),
(43, 'concepto2', 24, 1, 6),
(44, 'concepto2', 24, 1, 6),
(45, 'concepto2', 24, 1, 6),
(46, 'concepto3', 24, 1, 6),
(47, 'concepto4', 24, 1, 6),
(48, 'concepto5', 24, 1, 6),
(49, 'zapata retractil de morena con lopez beltran', 24, 1, 6),
(50, 'ColocaciÃ³n de cerÃ¡mica en piso 23, incluye pegamento, mano de obra, etc', 35, 13, 6),
(51, 'ColocaciÃ³n de cerÃ¡mica en piso 23, incluye pegamento, mano de obra, etc', 35, 13, 6),
(52, 'ColocaciÃ³n de cerÃ¡mica en piso 23, incluye pegamento, mano de obra, etc', 35, 13, 6),
(53, 'ColocaciÃ³n de cerÃ¡mica en piso 23, incluye pegamento, mano de obra, etc', 35, 13, 6),
(54, 'zapata a50', 24, 1, 6),
(55, 'zapata a50', 24, 1, 6),
(59, 'colocacion cerÃ¡mica', 36, 13, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subconcepto`
--

CREATE TABLE `subconcepto` (
  `id_subconcepto` int(11) NOT NULL,
  `subconcepto` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `subconcepto`
--

INSERT INTO `subconcepto` (`id_subconcepto`, `subconcepto`, `id_concepto`, `id_obra`) VALUES
(19, 'Baldosas', 3, 6),
(20, 'Vigas1', 4, 6),
(21, 'Cesped', 5, 6),
(22, 'nomenclatura', 5, 6),
(23, 'Muro a', 7, 6),
(24, 'Muro a', 1, 6),
(25, 'Muro B', 1, 6),
(26, 'Muro D', 1, 6),
(27, 'edificio principal', 8, 6),
(30, 'edificio a', 8, 6),
(31, 'nomenclatura', 9, 6),
(32, 'SUR', 10, 6),
(33, 'JORGE', 11, 6),
(34, 'PINTURA FACHADA EXTERIOR', 12, 1),
(35, 'TOTAL', 13, 6),
(36, 'TOTAL1', 13, 6),
(37, 'TOTAL', 14, 6),
(38, 'MUROA', 14, 6),
(39, 'ZAPATAS', 15, 11),
(40, 'ELEVADOR PROVISIONAL', 16, 11),
(41, 'OPERADOR', 16, 11),
(42, 'CONTRATISTA TEPORACA', 17, 11),
(43, 'PARTE', 5, 6),
(44, 'PISOA', 19, 1),
(45, 'PISOB', 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipusuario`
--

CREATE TABLE `tipusuario` (
  `id_tipusuario` int(11) NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipusuario`
--

INSERT INTO `tipusuario` (`id_tipusuario`, `tipo`) VALUES
(1, 'administrador'),
(2, 'residente'),
(3, 'contratista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `alias` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombres` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` bigint(14) NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `passw` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_clientep` int(11) NOT NULL,
  `en_uso` tinyint(1) NOT NULL,
  `pagaste` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `alias`, `nombres`, `apellidos`, `telefono`, `mail`, `passw`, `id_rol`, `id_clientep`, `en_uso`, `pagaste`) VALUES
(1, 'JORGE', 'jorge federico', 'duran armendariz', 6144883904, 'jfduranar@outlook.com', '1234', 2, 1, 1, 1),
(2, 'FEDEX', 'jorge federico', 'duran armendariz', 6144883904, 'jfduranar@outlook.com', '12345', 0, 0, 0, 1),
(5, 'Mary', 'Marisol', 'Hernandez', 6141844364, 'hdez@hotmail.com', 'abc123', 1, 1, 0, 0),
(7, 'bfajardo', 'Brayam', 'Fajardo Velasquez', 3023158717, 'bfajardo@gmail.com', '1234', 1, 0, 0, 1),
(8, 'Silvana', 'Silvana', 'Lopez', 3023158717, 'SilvanaLopez@gmail.com', '1234', 2, 15, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_clientep` (`id_clientep`);

--
-- Indices de la tabla `clientep`
--
ALTER TABLE `clientep`
  ADD PRIMARY KEY (`id_clientep`),
  ADD KEY `id_clientep` (`id_clientep`);

--
-- Indices de la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD PRIMARY KEY (`id_concepto`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id_concepto`);

--
-- Indices de la tabla `contratista`
--
ALTER TABLE `contratista`
  ADD PRIMARY KEY (`id_contratista`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_contrato`);

--
-- Indices de la tabla `cuadrilla`
--
ALTER TABLE `cuadrilla`
  ADD PRIMARY KEY (`id_cuadrilla`);

--
-- Indices de la tabla `cuadrillas`
--
ALTER TABLE `cuadrillas`
  ADD PRIMARY KEY (`id_cuadrillas`);

--
-- Indices de la tabla `estimacion`
--
ALTER TABLE `estimacion`
  ADD PRIMARY KEY (`id_estimacion`);

--
-- Indices de la tabla `estimaciondet`
--
ALTER TABLE `estimaciondet`
  ADD PRIMARY KEY (`id_estimaciondet`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id_familia`);

--
-- Indices de la tabla `fasar`
--
ALTER TABLE `fasar`
  ADD PRIMARY KEY (`id_fasar`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`id_oficio`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`id_obra`);

--
-- Indices de la tabla `oficio`
--
ALTER TABLE `oficio`
  ADD PRIMARY KEY (`id_oficio`);

--
-- Indices de la tabla `preciospu`
--
ALTER TABLE `preciospu`
  ADD PRIMARY KEY (`id_preciospu`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`id_presupuesto`);

--
-- Indices de la tabla `presupuestopu`
--
ALTER TABLE `presupuestopu`
  ADD PRIMARY KEY (`id_preupuestoPU`);

--
-- Indices de la tabla `ssubconcepto`
--
ALTER TABLE `ssubconcepto`
  ADD PRIMARY KEY (`id_ssubconcepto`);

--
-- Indices de la tabla `subconcepto`
--
ALTER TABLE `subconcepto`
  ADD PRIMARY KEY (`id_subconcepto`);

--
-- Indices de la tabla `tipusuario`
--
ALTER TABLE `tipusuario`
  ADD PRIMARY KEY (`id_tipusuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_clientep` (`id_clientep`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `clientep`
--
ALTER TABLE `clientep`
  MODIFY `id_clientep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `concepto`
--
ALTER TABLE `concepto`
  MODIFY `id_concepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id_concepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contratista`
--
ALTER TABLE `contratista`
  MODIFY `id_contratista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cuadrilla`
--
ALTER TABLE `cuadrilla`
  MODIFY `id_cuadrilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cuadrillas`
--
ALTER TABLE `cuadrillas`
  MODIFY `id_cuadrillas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estimacion`
--
ALTER TABLE `estimacion`
  MODIFY `id_estimacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `estimaciondet`
--
ALTER TABLE `estimaciondet`
  MODIFY `id_estimaciondet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `id_familia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fasar`
--
ALTER TABLE `fasar`
  MODIFY `id_fasar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `id_oficio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `oficio`
--
ALTER TABLE `oficio`
  MODIFY `id_oficio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `preciospu`
--
ALTER TABLE `preciospu`
  MODIFY `id_preciospu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `id_presupuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `presupuestopu`
--
ALTER TABLE `presupuestopu`
  MODIFY `id_preupuestoPU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ssubconcepto`
--
ALTER TABLE `ssubconcepto`
  MODIFY `id_ssubconcepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `subconcepto`
--
ALTER TABLE `subconcepto`
  MODIFY `id_subconcepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `tipusuario`
--
ALTER TABLE `tipusuario`
  MODIFY `id_tipusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
