-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2023 a las 15:18:05
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `salud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `id` int(10) NOT NULL,
  `primernombre` varchar(255) NOT NULL,
  `segundonombre` varchar(255) NOT NULL,
  `primerapellido` varchar(255) NOT NULL,
  `segundoapellido` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `idpuesto` int(255) NOT NULL,
  `fechaingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`id`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `foto`, `cv`, `idpuesto`, `fechaingreso`) VALUES
(37, 'matias', 'ignacio', 'muñoz', 'guzman', '18427293', '8', 33, '2020-12-12'),
(38, 'trabajador', 'segudn', 'creado', 'apelldi', '182', '2', 33, '2022-12-25'),
(39, 'asdasd', 'Matias Ignacio', 'Muñoz', 'Guzman', '1842729', 'k', 33, '1993-12-12'),
(41, 'empleado prueba', 'segundo nombre', 'apellido', 'materno', '184272938', '2', 34, '1993-02-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_jornada`
--

CREATE TABLE `tbl_jornada` (
  `id` int(11) NOT NULL,
  `tipojornada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_jornada`
--

INSERT INTO `tbl_jornada` (`id`, `tipojornada`) VALUES
(3, 'Jornada Completa'),
(1, 'Mañana'),
(2, 'Tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_permisos`
--

CREATE TABLE `tbl_permisos` (
  `id` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `idtipopermiso` int(11) NOT NULL,
  `fechasolicitud` date NOT NULL,
  `fechapermiso` date NOT NULL,
  `permisohasta` date NOT NULL,
  `jornada` int(11) NOT NULL,
  `jefedirecto` tinyint(1) NOT NULL,
  `jefecesfam` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_permisos`
--

INSERT INTO `tbl_permisos` (`id`, `idempleado`, `idtipopermiso`, `fechasolicitud`, `fechapermiso`, `permisohasta`, `jornada`, `jefedirecto`, `jefecesfam`) VALUES
(1, 38, 1, '2023-02-15', '2023-02-16', '2023-02-16', 1, 0, 0),
(2, 38, 1, '2023-02-15', '2023-02-15', '2023-02-15', 1, 0, 0),
(4, 38, 1, '2023-02-15', '2023-02-16', '2023-02-16', 3, 0, 0),
(5, 38, 2, '2023-02-15', '2023-02-16', '2023-02-16', 3, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_puestos`
--

CREATE TABLE `tbl_puestos` (
  `id` int(11) NOT NULL,
  `nombredelpuesto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_puestos`
--

INSERT INTO `tbl_puestos` (`id`, `nombredelpuesto`) VALUES
(33, 'secretaria'),
(34, 'Informatica'),
(36, 'seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_permiso`
--

CREATE TABLE `tbl_tipo_permiso` (
  `id` int(11) NOT NULL,
  `tipopermiso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipo_permiso`
--

INSERT INTO `tbl_tipo_permiso` (`id`, `tipopermiso`) VALUES
(1, 'Vacaciones'),
(2, 'Descanso Complementario'),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `correo`) VALUES
(14, 'topooh', '123456', 'matiasi.munozg@gmail.com'),
(18, 'root', '', 'matiasi.munozg@gmail.co');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpuesto` (`idpuesto`);

--
-- Indices de la tabla `tbl_jornada`
--
ALTER TABLE `tbl_jornada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipojornada` (`tipojornada`);

--
-- Indices de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idempleado` (`idempleado`,`idtipopermiso`),
  ADD KEY `jornada` (`jornada`);

--
-- Indices de la tabla `tbl_puestos`
--
ALTER TABLE `tbl_puestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipo_permiso`
--
ALTER TABLE `tbl_tipo_permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tbl_jornada`
--
ALTER TABLE `tbl_jornada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_puestos`
--
ALTER TABLE `tbl_puestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_permiso`
--
ALTER TABLE `tbl_tipo_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD CONSTRAINT `tbl_empleados_ibfk_1` FOREIGN KEY (`idpuesto`) REFERENCES `tbl_puestos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  ADD CONSTRAINT `tbl_permisos_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tbl_tipo_permiso` (`id`),
  ADD CONSTRAINT `tbl_permisos_ibfk_2` FOREIGN KEY (`jornada`) REFERENCES `tbl_jornada` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
