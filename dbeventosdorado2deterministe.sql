-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2024 a las 17:32:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbeventosdorado2`
--

	CREATE DATABASE dbeventosdorado;
    USE dbeventosdorado;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `primerApellido` varchar(50) NOT NULL,
  `segundoApellido` varchar(50) NOT NULL,
  `ci` varchar(9) NOT NULL,
  `celular` varchar(12) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `idUsuario` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



CREATE TABLE `detalle` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `subTotal` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `fechaHoraInicio` datetime NOT NULL,
  `fechaHoraFin` datetime NOT NULL,
  `idServicios` tinyint(3) UNSIGNED NOT NULL,
  `idReservas` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioevento`
--

CREATE TABLE `horarioevento` (
  `id` smallint(6) NOT NULL,
  `fecha` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFIn` time NOT NULL,
  `cantidadPersona` smallint(6) NOT NULL,
  `idReservas` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` smallint(6) NOT NULL,
  `cantidadPersonas` varchar(45) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `plazoConfirmacion` time NOT NULL,
  `adelantoReserva` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pagado` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=eliminado\n1=Cornfirmado con un poco\n2=Reservado pero no cancelo ningun motno tiende a elminar en plazo de tiempo\n3=CompleTADO LA PAGA\n4=RESERVADO PER FALTA PAGAR\\\\\\\\n5=libre\\\\\\\\n',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaModificacion` timestamp NULL DEFAULT NULL,
  `idUsuario` smallint(5) UNSIGNED NOT NULL,
  `idTipoEvento` tinyint(3) UNSIGNED NOT NULL,
  `idCliente` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descriccion` varchar(45) NOT NULL,
  `unidadMedida` varchar(45) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `maximo` smallint(6) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1= activo \\n0= inactivo',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaModificacion` timestamp NULL DEFAULT NULL,
  `idUsuario` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Estructura de tabla para la tabla `tipoevento`
--

CREATE TABLE `tipoevento` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipoevento`
--

INSERT INTO `tipoevento` (`id`, `nombre`) VALUES
(1, 'Matrimonio'),
(2, '15 años'),
(3, 'promocion'),
(4, 'Graduacion'),
(5, 'Bautizo'),
(6, '18 años'),
(7, 'Cumpleaños infantiles'),
(8, 'Fiesta privada'),
(9, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `rol` varchar(45) NOT NULL DEFAULT 'invitado' COMMENT 'admin root\ninvitado menos privilegio tiene',
  `email` varchar(30) NOT NULL DEFAULT '',
  `nombre` varchar(50) NOT NULL,
  `primerApellido` varchar(50) NOT NULL,
  `segundoApellido` varchar(50) DEFAULT NULL,
  `ci` varchar(15) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `celular` varchar(32) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 =activo\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n0= inactivo\\\\\\\\n2= correo no envado',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `idUsuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--


--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_servicios1_idx` (`idServicios`),
  ADD KEY `fk_detalle_reservas1_idx` (`idReservas`);

--
-- Indices de la tabla `horarioevento`
--
ALTER TABLE `horarioevento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_HorarioEvento_reservas1_idx` (`idReservas`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservas_usuario1_idx` (`idUsuario`),
  ADD KEY `fk_reservas_tipoevento1_idx` (`idTipoEvento`),
  ADD KEY `fk_reservas_clientes1_idx` (`idCliente`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_persona1_idx` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `horarioevento`
--
ALTER TABLE `horarioevento`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `fk_detalle_reservas1` FOREIGN KEY (`idReservas`) REFERENCES `reservas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_servicios1` FOREIGN KEY (`idServicios`) REFERENCES `servicios` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarioevento`
--
ALTER TABLE `horarioevento`
  ADD CONSTRAINT `fk_HorarioEvento_reservas1` FOREIGN KEY (`idReservas`) REFERENCES `reservas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_reservas_clientes1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservas_tipoevento1` FOREIGN KEY (`idTipoEvento`) REFERENCES `tipoevento` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservas_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;
DELIMITER $$
--
-- Funciones
--
CREATE  FUNCTION `diasEventos` (`idReserva` INT) RETURNS VARCHAR(255)
DETERMINISTIC 
 BEGIN
    DECLARE fechasConcatenadas VARCHAR(255);
    
    SELECT GROUP_CONCAT(DAY(fecha) ORDER BY fecha SEPARATOR '-') INTO fechasConcatenadas
    FROM horarioevento
    WHERE idReservas = idReserva;
    
    RETURN fechasConcatenadas;
END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
