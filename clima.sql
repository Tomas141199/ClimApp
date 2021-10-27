-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2021 a las 20:40:10
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

drop database if exists clima;
create database clima;
use clima;

--
-- Base de datos: `clima`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(5) NOT NULL,
  `temperatura_h` int(3) DEFAULT NULL,
  `humedad_h` int(3) DEFAULT NULL,
  `velocidadViento_h` int(3) DEFAULT NULL,
  `resultado_h` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_id_usuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroclima`
--

CREATE TABLE `registroclima` (
  `id` int(5) NOT NULL,
  `temperatura` int(3) DEFAULT NULL,
  `humedad` int(3) DEFAULT NULL,
  `velocidadViento` int(3) DEFAULT NULL,
  `resultado` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(4) NOT NULL,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `app` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apm` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `app`, `apm`, `email`, `password`, `is_admin`) VALUES
(1, 'Tomás', 'Hernández', 'García', 'tomas_hg@gmail.com', 'tomashg', 1),
(2, 'Monserrat', 'Navarro', 'Lazcano', 'monse_nl@gmail.com', 'monsenl', 1),
(3, 'Pablo', 'León', 'Morales', 'pablo_lm@gmail.com', 'pablolm', 1),
(4, 'Patricia', 'Márquez', 'Tepox', 'paty_mt@gmail.com', 'patymt', 1),
(5, 'Ximena', 'Fernández', 'Robles', 'ximena_fernandez@gmail.co', 'ximenafr', 0),
(6, 'Fernando', 'Hernández', 'Sánchez', 'fernando_her@gmail.com', 'fernandohs', 0),
(7, 'Ileana', 'Rivera', 'Hernández', 'ileana_rivera@gmail.com', 'ileanarh', 0),
(8, 'Melissa', 'Jiménez', 'Flores', 'melissa_jf@gmail.com', 'melissajf', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`,`usuario_id_usuario`);

--
-- Indices de la tabla `registroclima`
--
ALTER TABLE `registroclima`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registroclima`
--
ALTER TABLE `registroclima`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
