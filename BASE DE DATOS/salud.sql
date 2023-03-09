-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2023 a las 20:41:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
  `foto` int(255) NOT NULL,
  `cv` varchar(1) NOT NULL,
  `idpuesto` int(255) NOT NULL,
  `fechaingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`id`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `foto`, `cv`, `idpuesto`, `fechaingreso`) VALUES
(37, 'matias', 'ignacio', 'muñoz', 'guzman', 18427293, '8', 33, '2020-12-12'),
(38, 'trabajador', 'segudn', 'creado', 'apelldi', 182, '2', 33, '2022-12-25'),
(39, 'asdasd', 'Matias Ignacio', 'Muñoz', 'Guzman', 1842729, 'k', 33, '1993-12-12'),
(41, 'empleado prueba', 'segundo nombre', 'apellido', 'materno', 184272938, '2', 34, '1993-02-15'),
(42, 'primer nombre', 'segundo nombre', 'Apellido Paterno', 'Apellido Materno', 9395038, '0', 34, '2023-02-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_permiso`
--

CREATE TABLE `tbl_estado_permiso` (
  `id` int(1) NOT NULL,
  `estado_permiso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_estado_permiso`
--

INSERT INTO `tbl_estado_permiso` (`id`, `estado_permiso`) VALUES
(1, 'Pendiente'),
(2, 'Rechazado'),
(3, 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_reembolso`
--

CREATE TABLE `tbl_estado_reembolso` (
  `id` int(2) NOT NULL,
  `descripcion` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_estado_reembolso`
--

INSERT INTO `tbl_estado_reembolso` (`id`, `descripcion`) VALUES
(1, 'Pendiente'),
(2, 'Aceptado'),
(3, 'Rechazado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_jornada`
--

CREATE TABLE `tbl_jornada` (
  `id` int(11) NOT NULL,
  `tipojornada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `jefecesfam` tinyint(1) NOT NULL,
  `rrhh` tinyint(1) NOT NULL,
  `estado_permiso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_permisos`
--

INSERT INTO `tbl_permisos` (`id`, `idempleado`, `idtipopermiso`, `fechasolicitud`, `fechapermiso`, `permisohasta`, `jornada`, `jefedirecto`, `jefecesfam`, `rrhh`, `estado_permiso`) VALUES
(20, 93950380, 1, '2023-02-22', '1993-05-05', '1993-05-05', 1, 1, 1, 0, 1),
(22, 93950380, 5, '2023-02-22', '2023-02-25', '2023-02-25', 3, 1, 1, 0, 1),
(23, 93950380, 8, '2023-02-22', '2023-02-23', '2023-02-24', 3, 1, 1, 0, 1),
(24, 37, 4, '2023-02-22', '2023-02-25', '2023-02-25', 2, 1, 1, 0, 2),
(26, 3, 5, '2023-02-22', '2023-02-25', '2023-02-25', 3, 0, 0, 0, 1),
(28, 3, 8, '2023-02-23', '2023-02-24', '2023-02-24', 3, 1, 1, 0, 1),
(29, 93950380, 2, '2023-02-23', '2023-02-25', '2023-02-26', 2, 1, 1, 0, 1),
(30, 213123, 2, '2023-02-24', '2023-02-28', '2023-03-01', 3, 1, 1, 1, 1),
(31, 213123, 7, '2023-02-28', '2023-03-01', '2023-03-02', 3, 1, 1, 1, 2),
(32, 93950380, 4, '2023-02-28', '2023-03-01', '2023-03-02', 3, 1, 1, 0, 2),
(58, 16427293, 1, '2023-03-08', '2023-03-09', '2023-03-09', 3, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_puestos`
--

CREATE TABLE `tbl_puestos` (
  `id` int(11) NOT NULL,
  `nombredelpuesto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_puestos`
--

INSERT INTO `tbl_puestos` (`id`, `nombredelpuesto`) VALUES
(33, 'secretaria'),
(34, 'Informatica'),
(36, 'seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reembolso`
--

CREATE TABLE `tbl_reembolso` (
  `id` int(11) NOT NULL,
  `rut_usuario` int(11) NOT NULL,
  `tipo_reembolso` int(11) NOT NULL,
  `fechasolicitud` date NOT NULL,
  `fechaprestacion` date NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_reembolso`
--

INSERT INTO `tbl_reembolso` (`id`, `rut_usuario`, `tipo_reembolso`, `fechasolicitud`, `fechaprestacion`, `estado`) VALUES
(3, 693574, 1, '2023-03-08', '2023-03-09', 1),
(4, 693574, 1, '2023-03-08', '2023-03-09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_permiso`
--

CREATE TABLE `tbl_tipo_permiso` (
  `id` int(11) NOT NULL,
  `tipopermiso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_tipo_permiso`
--

INSERT INTO `tbl_tipo_permiso` (`id`, `tipopermiso`) VALUES
(1, 'Vacaciones'),
(2, 'Descanso Complementario'),
(4, 'Ley 21409'),
(5, 'Cursos'),
(6, 'Dias Administrativos'),
(7, 'Sin gose de sueldo'),
(8, 'Cometidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_reembolso`
--

CREATE TABLE `tbl_tipo_reembolso` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_tipo_reembolso`
--

INSERT INTO `tbl_tipo_reembolso` (`id`, `descripcion`) VALUES
(1, 'Médico'),
(2, 'Médicamentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `rut` int(11) NOT NULL,
  `dv` varchar(1) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido_pat` varchar(255) NOT NULL,
  `apellido_mat` varchar(255) NOT NULL,
  `tipousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `correo`, `rut`, `dv`, `nombre`, `apellido_pat`, `apellido_mat`, `tipousuario`) VALUES
(18, 'root', '123456', 'correoelectronico@correo.cl', 37, '', 'Administrador', '', '', 4),
(20, 'cesfam', '123456', 'matias@correo.cl', 3, '', 'Jefe', 'cesfam', 'cesfam', 3),
(21, 'Usuario', '123456', 'perfil@gmail.com', 93950380, '0', 'Usuario ', 'Normal', 'Sin permisos', 1),
(22, 'directo', '123456', 'directo@gmail.com', 16427293, '', 'Jefe', 'Directo', 'Directo', 2),
(33, 'prueba', '123456', 'asda@com.cl', 213123, '', 'Nombre', 'Apellido', 'Materno', 1),
(36, 'RRHH', '123456', 'rrhh@gmail.com', 16293457, '', 'Ingreso', 'RRHH', 'Test', 5),
(37, 'superjefe', '123456', 'superjefe@gmail.com', 693574, '', 'Super', 'Jefe', 'Completo', 6),
(38, 'jose', '123456', 'jose@gmail.co', 182938427, 'k', 'jose', 'gonzales', 'villega', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipousuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipousuario`) VALUES
(1, 'Usuario'),
(2, 'Jefe Directo'),
(3, 'Director'),
(4, 'Administrador'),
(5, 'RRHH'),
(6, 'Super Jefe');

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
-- Indices de la tabla `tbl_estado_permiso`
--
ALTER TABLE `tbl_estado_permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_estado_reembolso`
--
ALTER TABLE `tbl_estado_reembolso`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `jornada` (`jornada`),
  ADD KEY `idtipopermiso` (`idtipopermiso`),
  ADD KEY `idempleado_2` (`idempleado`),
  ADD KEY `idempleado_3` (`idempleado`),
  ADD KEY `estado_permiso` (`estado_permiso`);

--
-- Indices de la tabla `tbl_puestos`
--
ALTER TABLE `tbl_puestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_reembolso`
--
ALTER TABLE `tbl_reembolso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rut_usuario` (`rut_usuario`),
  ADD KEY `tipo_reembolso` (`tipo_reembolso`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `tbl_tipo_permiso`
--
ALTER TABLE `tbl_tipo_permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipo_reembolso`
--
ALTER TABLE `tbl_tipo_reembolso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rut` (`rut`),
  ADD KEY `tipousuario` (`tipousuario`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `tbl_estado_permiso`
--
ALTER TABLE `tbl_estado_permiso`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_estado_reembolso`
--
ALTER TABLE `tbl_estado_reembolso`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_jornada`
--
ALTER TABLE `tbl_jornada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `tbl_puestos`
--
ALTER TABLE `tbl_puestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tbl_reembolso`
--
ALTER TABLE `tbl_reembolso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_permiso`
--
ALTER TABLE `tbl_tipo_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_reembolso`
--
ALTER TABLE `tbl_tipo_reembolso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `tbl_permisos_ibfk_2` FOREIGN KEY (`jornada`) REFERENCES `tbl_jornada` (`id`),
  ADD CONSTRAINT `tbl_permisos_ibfk_3` FOREIGN KEY (`idtipopermiso`) REFERENCES `tbl_tipo_permiso` (`id`),
  ADD CONSTRAINT `tbl_permisos_ibfk_4` FOREIGN KEY (`idempleado`) REFERENCES `tbl_usuarios` (`rut`),
  ADD CONSTRAINT `tbl_permisos_ibfk_5` FOREIGN KEY (`estado_permiso`) REFERENCES `tbl_estado_permiso` (`id`);

--
-- Filtros para la tabla `tbl_reembolso`
--
ALTER TABLE `tbl_reembolso`
  ADD CONSTRAINT `tbl_reembolso_ibfk_1` FOREIGN KEY (`tipo_reembolso`) REFERENCES `tbl_tipo_reembolso` (`id`),
  ADD CONSTRAINT `tbl_reembolso_ibfk_2` FOREIGN KEY (`rut_usuario`) REFERENCES `tbl_usuarios` (`rut`),
  ADD CONSTRAINT `tbl_reembolso_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `tbl_estado_reembolso` (`id`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`tipousuario`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
