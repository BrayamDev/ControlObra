-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2024 a las 01:10:48
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlobra`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `actividad`, `fechaInicial`, `fechaFinal`, `responsableActividad`, `id_obra`, `fechaRegistro`, `Terminado`) VALUES
(1, 'Colocar baldosas en los suelos', '2024-05-17', '2024-05-24', 'Brayam Fajardo', 6, '2024-05-17', 0),
(2, 'Colocar ventanas', '2024-05-18', '2024-05-20', 'Brayam Fajardo', 6, '2024-05-17', 1),
(3, 'Colocar Marcos', '2024-05-17', '2024-05-31', 'Brayam Fajardo', 6, '2024-05-17', 0),
(4, 'Ubicación de los arbustos en el patio', '2024-05-17', '2024-05-24', 'Silvana barandica', 6, '2024-05-17', 1),
(5, 'Que se dedica a la imprenta desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente', '2024-05-17', '2024-05-24', 'Silvana barandica', 6, '2024-05-17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `nombres` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `telefono` bigint(14) NOT NULL,
  `mail` varchar(50) NOT NULL,
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
  `alias` varchar(20) NOT NULL,
  `nombres` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `telefono` bigint(14) NOT NULL,
  `mail` varchar(50) NOT NULL,
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
  `concepto` varchar(500) NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `concepto`
--

INSERT INTO `concepto` (`id_concepto`, `concepto`, `id_obra`) VALUES
(1, 'Casa', 6),
(2, 'Estructura', 6),
(3, 'Losas', 6),
(4, 'Muros', 6),
(5, 'Patio', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratista`
--

CREATE TABLE `contratista` (
  `id_contratista` int(11) NOT NULL,
  `aliascontratista` varchar(40) NOT NULL,
  `nombres` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` bigint(14) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `contratista`
--

INSERT INTO `contratista` (`id_contratista`, `aliascontratista`, `nombres`, `apellidos`, `telefono`, `mail`, `id_obra`) VALUES
(2, 'MSimpson', 'March', 'Simpson', 3023148718, 'MarchSimpson@gmail.com', 6),
(4, 'Trengifo', 'Tamara nicoll', 'rengifo Benavides', 3203269294, 'Trengifo@gmail.com', 6);

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
  `anticipo_dolares` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estimacion`
--

CREATE TABLE `estimacion` (
  `id_estimacion` int(11) NOT NULL,
  `importe_pesos` float NOT NULL,
  `anticipo_pesos` float NOT NULL,
  `amort_pesos` float NOT NULL,
  `importe_dolares` float NOT NULL,
  `anticipo_dolares` float NOT NULL,
  `amort_dolares` float NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estimaciondet`
--

CREATE TABLE `estimaciondet` (
  `id_estimaciondet` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `importe_pesos` float NOT NULL,
  `importe_dolares` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `id_obra` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
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
(11, 'Calle 68', 1, 14.2, 25);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ssubconcepto`
--

CREATE TABLE `ssubconcepto` (
  `id_ssubconcepto` int(11) NOT NULL,
  `ssubconcepto` varchar(500) NOT NULL,
  `id_subconcepto` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subconcepto`
--

CREATE TABLE `subconcepto` (
  `id_subconcepto` int(11) NOT NULL,
  `subconcepto` varchar(500) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `subconcepto`
--

INSERT INTO `subconcepto` (`id_subconcepto`, `subconcepto`, `id_concepto`, `id_obra`) VALUES
(19, 'Baldosas', 3, 6),
(20, 'Vigas1', 4, 6),
(21, 'Cesped', 5, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipusuario`
--

CREATE TABLE `tipusuario` (
  `id_tipusuario` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
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
  `alias` varchar(20) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` bigint(14) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `passw` varchar(20) NOT NULL,
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
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`id_obra`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`id_presupuesto`);

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
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_concepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contratista`
--
ALTER TABLE `contratista`
  MODIFY `id_contratista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estimacion`
--
ALTER TABLE `estimacion`
  MODIFY `id_estimacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estimaciondet`
--
ALTER TABLE `estimaciondet`
  MODIFY `id_estimaciondet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `id_presupuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ssubconcepto`
--
ALTER TABLE `ssubconcepto`
  MODIFY `id_ssubconcepto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subconcepto`
--
ALTER TABLE `subconcepto`
  MODIFY `id_subconcepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
