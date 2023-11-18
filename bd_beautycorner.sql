-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 17:10:42
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
-- Base de datos: `bd_beautycorner`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nomServicio` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `idempleado` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `disponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nomServicio`, `descripcion`, `idempleado`, `direccion`, `telefono`, `precio`, `disponible`) VALUES
(1, 'Gelish de Color', 'En Tonos Mate', '1', 'Nueva Zelanda 7870', 2147483647, '500.00', 22),
(2, 'Extensiones', 'Con Buena Calidad', '4', 'Nueva Zelanda 7870', 2147483647, '5000.00', 28),
(3, 'Manicure Freancesa', 'Incluye Exfoliación', '7', 'Nueva Zelanda 7870', 2147483647, '300.00', 67),
(4, 'Tratamiento Capilar', 'Con Productos de Confianza', '5', 'Nueva Zelanda 7870', 2147483647, '6300.00', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_vendidos`
--

CREATE TABLE `servicios_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_servicio` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `servicios_vendidos`
--

INSERT INTO `servicios_vendidos` (`id`, `id_servicio`, `cantidad`, `id_venta`) VALUES
(14, 2, 1, 11),
(15, 1, 5, 12),
(16, 4, 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`) VALUES
(11, '2023-11-17 00:00:58', '5000.00'),
(12, '2023-11-17 08:03:55', '2500.00'),
(13, '2023-11-17 13:26:59', '6300.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios_vendidos`
--
ALTER TABLE `servicios_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vuelo` (`id_servicio`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `servicios_vendidos`
--
ALTER TABLE `servicios_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
