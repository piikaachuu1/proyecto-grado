-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2023 a las 22:03:39
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbeventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `primerApellido` varchar(50) NOT NULL,
  `segundoApellido` varchar(50) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `email` varchar(50) DEFAULT '',
  `numeroTelefono` varchar(10) DEFAULT '',
  `login` varchar(50) NOT NULL,
  `claveUsuario` varchar(50) NOT NULL,
  `rolUsuario` varchar(30) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 =activo\n0= inactivo',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `primerApellido`, `segundoApellido`, `ci`, `fechaNacimiento`, `sexo`, `email`, `numeroTelefono`, `login`, `claveUsuario`, `rolUsuario`, `estado`, `fechaRegistro`, `fechaActualizacion`) VALUES
(5, 'Elmer', 'Mamani', 'Nn', '8381326', '1996-03-06', 'M', '', '', 'Elmer', '1', 'Admin', 1, '2023-05-21 15:20:26', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
