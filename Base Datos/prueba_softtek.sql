-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2022 a las 16:57:16
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_softtek`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearUsuario` (IN `cedula` INT(15), IN `nombre` VARCHAR(64), IN `apellido` VARCHAR(11), IN `id_rol` INT(10), IN `password` VARCHAR(64))   BEGIN
	INSERT INTO usuarios (cedula,nombre_usuario,apellido_usuario,id_rol,password,fecha_ingreso)
	VALUES (cedula,nombre,apellido,id_rol,password,current_date());
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Estandar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `cedula` int(15) NOT NULL,
  `nombre_usuario` varchar(64) DEFAULT NULL,
  `apellido_usuario` varchar(64) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cedula`, `nombre_usuario`, `apellido_usuario`, `id_rol`, `password`, `fecha_ingreso`) VALUES
(1, 1234567, 'Javier', 'Romero', 1, 'e10adc3949ba59abbe56e057f20f883e', '2022-01-22'),
(2, 1234568, 'Pepe', 'Romero', 2, 'e10adc3949ba59abbe56e057f20f883e', '2022-10-26'),
(3, 1234569, 'Camilo', 'Romero', 2, 'e10adc3949ba59abbe56e057f20f883e', '2022-01-24'),
(4, 1234570, 'Khadija', 'Burgos', 2, 'e10adc3949ba59abbe56e057f20f883e', '2022-10-21'),
(5, 1234571, 'Julen', 'Gallego', 2, 'e10adc3949ba59abbe56e057f20f883e', '2022-07-04'),
(6, 1234572, 'Gregoria', 'Sanchez', 1, 'e10adc3949ba59abbe56e057f20f883e', '2022-06-10'),
(7, 1234573, 'Nayra', 'Viñas', 2, 'e10adc3949ba59abbe56e057f20f883e', '2022-03-24'),
(8, 1234574, 'Fernando', 'Gaspar', 2, 'e10adc3949ba59abbe56e057f20f883e', '2022-10-17'),
(9, 1234575, 'Filomena', 'Puente', 2, 'e10adc3949ba59abbe56e057f20f883e', '2022-10-27'),
(10, 1234576, 'Alba', 'Yague', 2, 'e10adc3949ba59abbe56e057f20f883e', '2022-10-05'),
(14, 583839, 'Camilo', 'ganba', 1, 'c5fe25896e49ddfe996db7508cf00534', '2022-10-25');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_usuarios_nombres`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_usuarios_nombres` (
`id_usuario` int(11)
,`nombre_completo` varchar(129)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_usuarios_octubre`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_usuarios_octubre` (
`id_usuario` int(11)
,`cedula` int(15)
,`nombre_usuario` varchar(64)
,`apellido_usuario` varchar(64)
,`id_rol` int(11)
,`password` varchar(64)
,`fecha_ingreso` date
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_usuarios_rol`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_usuarios_rol` (
`id` int(11)
,`rol` varchar(64)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_usuarios_nombres`
--
DROP TABLE IF EXISTS `view_usuarios_nombres`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuarios_nombres`  AS SELECT `usuarios`.`id_usuario` AS `id_usuario`, concat(`usuarios`.`nombre_usuario`,' ',`usuarios`.`apellido_usuario`) AS `nombre_completo` FROM `usuarios` ORDER BY concat(`usuarios`.`nombre_usuario`,' ',`usuarios`.`apellido_usuario`) ASC  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_usuarios_octubre`
--
DROP TABLE IF EXISTS `view_usuarios_octubre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuarios_octubre`  AS SELECT `usuarios`.`id_usuario` AS `id_usuario`, `usuarios`.`cedula` AS `cedula`, `usuarios`.`nombre_usuario` AS `nombre_usuario`, `usuarios`.`apellido_usuario` AS `apellido_usuario`, `usuarios`.`id_rol` AS `id_rol`, `usuarios`.`password` AS `password`, `usuarios`.`fecha_ingreso` AS `fecha_ingreso` FROM `usuarios` WHERE `usuarios`.`fecha_ingreso` between '2022-10-01' and '2022-10-31''2022-10-31'  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_usuarios_rol`
--
DROP TABLE IF EXISTS `view_usuarios_rol`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuarios_rol`  AS SELECT `roles`.`id` AS `id`, `roles`.`rol` AS `rol`, count(1) AS `total` FROM (`usuarios` join `roles` on(`roles`.`id` = `usuarios`.`id_rol`)) GROUP BY `roles`.`id``id`  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuarios_un` (`cedula`),
  ADD KEY `usuarios_FK` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_FK` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
