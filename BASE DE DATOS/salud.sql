-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2023 a las 15:53:27
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
-- Estructura de tabla para la tabla `tbl_nivel_usuario`
--

CREATE TABLE `tbl_nivel_usuario` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_nivel_usuario`
--

INSERT INTO `tbl_nivel_usuario` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15);

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
  `estado_permiso` int(1) NOT NULL,
  `detalles` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_permisos`
--

INSERT INTO `tbl_permisos` (`id`, `idempleado`, `idtipopermiso`, `fechasolicitud`, `fechapermiso`, `permisohasta`, `jornada`, `jefedirecto`, `jefecesfam`, `rrhh`, `estado_permiso`, `detalles`) VALUES
(79, 93950380, 1, '2023-03-15', '2023-03-14', '2023-03-14', 3, 1, 0, 0, 2, 'Primer Permiso, Firmado solo por Directo'),
(80, 93950380, 1, '2023-03-15', '2023-03-16', '2023-03-17', 3, 1, 1, 1, 1, 'firmado por ambos');

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
-- Estructura de tabla para la tabla `tbl_tipo_categoria`
--

CREATE TABLE `tbl_tipo_categoria` (
  `id` int(2) NOT NULL,
  `descripcion` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_tipo_categoria`
--

INSERT INTO `tbl_tipo_categoria` (`id`, `descripcion`) VALUES
(1, 'F'),
(2, 'E'),
(3, 'D'),
(4, 'C'),
(5, 'B'),
(6, 'A');

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
  `tipousuario` int(11) NOT NULL,
  `ingreso` date DEFAULT NULL,
  `fincontrato` date DEFAULT NULL,
  `funcion` varchar(255) DEFAULT NULL,
  `categoria` int(1) NOT NULL,
  `nivel` int(11) NOT NULL,
  `horas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `correo`, `rut`, `dv`, `nombre`, `apellido_pat`, `apellido_mat`, `tipousuario`, `ingreso`, `fincontrato`, `funcion`, `categoria`, `nivel`, `horas`) VALUES
(18, 'root', '123456', 'correoelectronico@correo.cl', 18427293, '3', 'Matias', 'Muñoz', 'Guzman', 4, '2023-02-06', '2023-04-06', 'Informatica', 5, 15, 22),
(20, 'cesfam', '123456', 'matias@correo.cl', 3, '', 'Jefe', 'cesfam', 'cesfam', 3, '2023-03-01', NULL, 'Medico', 1, 2, 0),
(21, 'Usuario', '123456', 'perfil@gmail.com', 93950380, '0', 'Usuario ', 'Normal', 'Sin permisos', 1, NULL, NULL, NULL, 1, 3, 0),
(22, 'directo', '123456', 'directo@gmail.com', 16427293, '', 'Jefe', 'Directo', 'Directo', 2, NULL, NULL, NULL, 1, 4, 0),
(33, 'prueba', '123456', 'asda@com.cl', 213123, '', 'Nombre', 'Apellido', 'Materno', 1, NULL, NULL, NULL, 1, 5, 0),
(36, 'RRHH', '123456', 'rrhh@gmail.com', 16293457, '', 'Ingreso', 'RRHH', 'Test', 5, NULL, NULL, NULL, 1, 6, 0),
(37, 'superjefe', '123456', 'superjefe@gmail.com', 693574, 'k', 'Super', 'Jefe', 'Completo', 6, '2023-03-08', NULL, NULL, 1, 7, 0),
(38, 'jose', '123456', 'jose@gmail.co', 182938427, 'k', 'jose', 'gonzales', 'villega', 1, NULL, NULL, NULL, 1, 8, 0);

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
-- Indices de la tabla `tbl_nivel_usuario`
--
ALTER TABLE `tbl_nivel_usuario`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `tbl_tipo_categoria`
--
ALTER TABLE `tbl_tipo_categoria`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `tipousuario` (`tipousuario`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `nivel` (`nivel`);

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
-- AUTO_INCREMENT de la tabla `tbl_nivel_usuario`
--
ALTER TABLE `tbl_nivel_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

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
-- AUTO_INCREMENT de la tabla `tbl_tipo_categoria`
--
ALTER TABLE `tbl_tipo_categoria`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`tipousuario`) REFERENCES `tipo_usuario` (`id`),
  ADD CONSTRAINT `tbl_usuarios_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `tbl_tipo_categoria` (`id`),
  ADD CONSTRAINT `tbl_usuarios_ibfk_3` FOREIGN KEY (`nivel`) REFERENCES `tbl_nivel_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
