-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2023 a las 02:33:09
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
-- Base de datos: `trabajoalarma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alarma`
--

CREATE TABLE `alarma` (
  `id_al` int(11) NOT NULL,
  `info_al` int(11) NOT NULL,
  `estado_al` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `alarma`
--

INSERT INTO `alarma` (`id_al`, `info_al`, `estado_al`) VALUES
(1, 1, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoridad`
--

CREATE TABLE `autoridad` (
  `id_auto` int(11) NOT NULL,
  `nombre_auto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `autoridad`
--

INSERT INTO `autoridad` (`id_auto`, `nombre_auto`) VALUES
(1, 'Medico'),
(2, 'Adminsitrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `box`
--

CREATE TABLE `box` (
  `id_box` int(11) NOT NULL,
  `num_box` varchar(30) NOT NULL,
  `ocupado_box` int(11) NOT NULL,
  `carac_box` int(11) NOT NULL,
  `hab_box` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `box`
--

INSERT INTO `box` (`id_box`, `num_box`, `ocupado_box`, `carac_box`, `hab_box`) VALUES
(1, '100', 1, 1, 1),
(2, '101', 2, 1, 1),
(3, '102', 1, 1, 1),
(4, '103', 2, 1, 1),
(5, '104', 1, 1, 1),
(6, '105', 2, 1, 1),
(7, '106', 1, 2, 4),
(8, '107', 2, 2, 4),
(9, '108', 1, 2, 4),
(10, '109', 2, 2, 4),
(11, '110', 1, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristica`
--

CREATE TABLE `caracteristica` (
  `id_carac` int(11) NOT NULL,
  `nombre_carac` varchar(50) NOT NULL,
  `desc_carac` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `caracteristica`
--

INSERT INTO `caracteristica` (`id_carac`, `nombre_carac`, `desc_carac`) VALUES
(1, 'Box de preparacion general', 'Monitor de Signos Vitales.\r\nSistema de Oxigenación.\r\nDesfibrilador.\r\nEstetoscopio y Esfigmomanómetro.\r\nSuministros de Venopunción.\r\nSuministros de Anestesia.\r\nCarro de Paro.\r\n'),
(2, 'Box de preparacion cardiovascular', 'Monitor de Signos Vitales.\r\nDesfibrilador.\r\nElectrocardiógrafo.\r\nSistema de Oxigenación.\r\nEquipo de Ecocardiografía.\r\nEstetoscopio y Esfigmomanómetro.\r\nSuministros de Venopunción.\r\nMáquina de Circulación Extracorpórea.\r\nMonitor de Presión Arterial Invasiva.\r\nEquipamiento de Esterilización.\r\nMaterial de Anestesia Cardiovascular.\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `alarma_estado` tinyint(4) NOT NULL,
  `nombre_estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `alarma_estado`, `nombre_estado`) VALUES
(1, 0, 'Apagada'),
(2, 1, 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id_hab` int(11) NOT NULL,
  `numero_hab` int(11) NOT NULL,
  `tipo_hab` int(11) NOT NULL,
  `zona_hab` int(11) NOT NULL,
  `ocupado_hab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_hab`, `numero_hab`, `tipo_hab`, `zona_hab`, `ocupado_hab`) VALUES
(1, 200, 1, 4, 1),
(2, 201, 1, 4, 2),
(3, 202, 1, 4, 1),
(4, 203, 1, 4, 2),
(5, 204, 1, 4, 1),
(6, 205, 1, 4, 2),
(7, 206, 2, 2, 1),
(8, 207, 2, 2, 2),
(9, 208, 2, 2, 1),
(10, 209, 2, 2, 2),
(11, 210, 3, 2, 1),
(12, 211, 3, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `id_info` int(11) NOT NULL,
  `paciente_info` int(11) NOT NULL,
  `llegada_info` time NOT NULL,
  `operacion_info` time DEFAULT NULL,
  `salida_info` time DEFAULT NULL,
  `desc_info` text DEFAULT NULL,
  `box_info` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`id_info`, `paciente_info`, `llegada_info`, `operacion_info`, `salida_info`, `desc_info`, `box_info`) VALUES
(6, 2, '12:06:00', '12:13:00', '14:50:00', 'Fractura de hueso', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupado`
--

CREATE TABLE `ocupado` (
  `id_ocu` int(11) NOT NULL,
  `nombre_ocu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ocupado`
--

INSERT INTO `ocupado` (`id_ocu`, `nombre_ocu`) VALUES
(1, 'Ocupado'),
(2, 'Desocupado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_pac` int(11) NOT NULL,
  `nombre_pac` varchar(30) NOT NULL,
  `dni_pac` varchar(30) NOT NULL,
  `tel_pac` varchar(30) NOT NULL,
  `correo_pac` varchar(30) NOT NULL,
  `sexo_pac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_pac`, `nombre_pac`, `dni_pac`, `tel_pac`, `correo_pac`, `sexo_pac`) VALUES
(1, 'Ivan Martinez', '46376001', '3515168439', 'Braian@mail.com', 1),
(2, 'Sebastian Juarez', '23432432423', '2221113323', 'seba@hola.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piso`
--

CREATE TABLE `piso` (
  `id_piso` int(11) NOT NULL,
  `numero_piso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `piso`
--

INSERT INTO `piso` (`id_piso`, `numero_piso`) VALUES
(1, 'Planta baja'),
(2, 'Primer piso'),
(3, 'Segundo piso'),
(4, 'Tercer piso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `nombre_sexo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `nombre_sexo`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'Habitacion comun'),
(2, 'Quirofano'),
(3, 'Sala intensiva'),
(4, 'Habitacion especializada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_us` int(11) NOT NULL,
  `nombre_us` varchar(30) NOT NULL,
  `sexo_us` int(11) NOT NULL,
  `dni_us` varchar(10) NOT NULL,
  `correo_us` varchar(30) NOT NULL,
  `tel_us` varchar(30) NOT NULL,
  `autoridad_us` int(11) NOT NULL,
  `clave_us` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_us`, `nombre_us`, `sexo_us`, `dni_us`, `correo_us`, `tel_us`, `autoridad_us`, `clave_us`) VALUES
(1, 'Ivan Martinez', 1, '44433322', 'Ivan@gmail.com', '3543342212', 2, '1234'),
(2, 'Braian Valles', 1, '3344223311', 'Braian@mail.com', '1122233344', 1, '1111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_informe`
--

CREATE TABLE `usuario_informe` (
  `id_infous` int(11) NOT NULL,
  `us_infous` int(11) NOT NULL,
  `info_infous` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario_informe`
--

INSERT INTO `usuario_informe` (`id_infous`, `us_infous`, `info_infous`) VALUES
(1, 2, 6),
(2, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id_zona` int(11) NOT NULL,
  `nombre_zona` varchar(30) NOT NULL,
  `piso_zona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id_zona`, `nombre_zona`, `piso_zona`) VALUES
(1, 'Guardia', 1),
(2, 'Emergencia', 1),
(3, 'Recepcion', 2),
(4, 'Regular', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alarma`
--
ALTER TABLE `alarma`
  ADD PRIMARY KEY (`id_al`),
  ADD KEY `info_alarma` (`info_al`),
  ADD KEY `estado_alarma` (`estado_al`);

--
-- Indices de la tabla `autoridad`
--
ALTER TABLE `autoridad`
  ADD PRIMARY KEY (`id_auto`);

--
-- Indices de la tabla `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id_box`),
  ADD KEY `carac_box` (`carac_box`),
  ADD KEY `estado_box` (`ocupado_box`),
  ADD KEY `hab_box` (`hab_box`),
  ADD KEY `ocupado_box` (`ocupado_box`);

--
-- Indices de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`id_carac`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id_hab`),
  ADD KEY `tipo_hab` (`tipo_hab`),
  ADD KEY `zona_hab` (`zona_hab`),
  ADD KEY `ocupado_hab` (`ocupado_hab`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `pac_info` (`paciente_info`),
  ADD KEY `box_info` (`box_info`);

--
-- Indices de la tabla `ocupado`
--
ALTER TABLE `ocupado`
  ADD PRIMARY KEY (`id_ocu`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_pac`),
  ADD KEY `sexo_pac` (`sexo_pac`);

--
-- Indices de la tabla `piso`
--
ALTER TABLE `piso`
  ADD PRIMARY KEY (`id_piso`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_us`),
  ADD KEY `autoridad_us` (`autoridad_us`),
  ADD KEY `sexo_us` (`sexo_us`);

--
-- Indices de la tabla `usuario_informe`
--
ALTER TABLE `usuario_informe`
  ADD PRIMARY KEY (`id_infous`),
  ADD KEY `us_infous` (`us_infous`),
  ADD KEY `info_infous` (`info_infous`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id_zona`),
  ADD KEY `piso_zona` (`piso_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alarma`
--
ALTER TABLE `alarma`
  MODIFY `id_al` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `autoridad`
--
ALTER TABLE `autoridad`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `box`
--
ALTER TABLE `box`
  MODIFY `id_box` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `id_carac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id_hab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ocupado`
--
ALTER TABLE `ocupado`
  MODIFY `id_ocu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_pac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `piso`
--
ALTER TABLE `piso`
  MODIFY `id_piso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario_informe`
--
ALTER TABLE `usuario_informe`
  MODIFY `id_infous` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alarma`
--
ALTER TABLE `alarma`
  ADD CONSTRAINT `alarma_ibfk_1` FOREIGN KEY (`info_al`) REFERENCES `usuario_informe` (`id_infous`),
  ADD CONSTRAINT `alarma_ibfk_2` FOREIGN KEY (`estado_al`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `box`
--
ALTER TABLE `box`
  ADD CONSTRAINT `box_ibfk_1` FOREIGN KEY (`carac_box`) REFERENCES `caracteristica` (`id_carac`),
  ADD CONSTRAINT `box_ibfk_2` FOREIGN KEY (`ocupado_box`) REFERENCES `ocupado` (`id_ocu`),
  ADD CONSTRAINT `box_ibfk_3` FOREIGN KEY (`hab_box`) REFERENCES `habitacion` (`id_hab`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`tipo_hab`) REFERENCES `tipo` (`id_tipo`),
  ADD CONSTRAINT `habitacion_ibfk_3` FOREIGN KEY (`zona_hab`) REFERENCES `zona` (`id_zona`),
  ADD CONSTRAINT `habitacion_ibfk_4` FOREIGN KEY (`ocupado_hab`) REFERENCES `ocupado` (`id_ocu`);

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `informe_ibfk_2` FOREIGN KEY (`paciente_info`) REFERENCES `paciente` (`id_pac`),
  ADD CONSTRAINT `informe_ibfk_3` FOREIGN KEY (`box_info`) REFERENCES `box` (`id_box`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`sexo_pac`) REFERENCES `sexo` (`id_sexo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`autoridad_us`) REFERENCES `autoridad` (`id_auto`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`sexo_us`) REFERENCES `sexo` (`id_sexo`);

--
-- Filtros para la tabla `usuario_informe`
--
ALTER TABLE `usuario_informe`
  ADD CONSTRAINT `usuario_informe_ibfk_1` FOREIGN KEY (`us_infous`) REFERENCES `usuario` (`id_us`),
  ADD CONSTRAINT `usuario_informe_ibfk_2` FOREIGN KEY (`info_infous`) REFERENCES `informe` (`id_info`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `zona_ibfk_1` FOREIGN KEY (`piso_zona`) REFERENCES `piso` (`id_piso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
