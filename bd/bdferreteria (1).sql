-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2019 a las 10:47:47
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdferreteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `codigo` int(11) NOT NULL,
  `codigoBarras` varchar(13) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `costo` decimal(18,3) DEFAULT NULL,
  `utilidad` decimal(6,3) DEFAULT NULL,
  `impuesto` decimal(18,3) DEFAULT NULL,
  `precioVenta` decimal(18,3) DEFAULT NULL,
  `existencia` decimal(18,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla articulos';

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`codigo`, `codigoBarras`, `descripcion`, `costo`, `utilidad`, `impuesto`, `precioVenta`, `existencia`) VALUES
(13, '5465465465484', 'Martillo 2', '0.000', '0.000', '3.000', '0.000', '0.000'),
(14, '46546', 'casa', '0.000', '10.000', '13.000', '0.000', '0.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `solicitud` int(11) NOT NULL,
  `numeroFactura` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  `cedulaUsuario` decimal(6,3) DEFAULT NULL,
  `totalCompra` decimal(18,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla compra';

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`solicitud`, `numeroFactura`, `fechaRegistro`, `cedulaUsuario`, `totalCompra`) VALUES
(1, '123', '2019-04-24 00:00:00', '123.000', '123.000'),
(2, '123', '2019-04-27 01:43:03', '2.000', '0.000'),
(3, '', '2019-04-27 01:46:13', '0.000', '0.000'),
(4, '3333', '2019-04-27 01:46:17', '0.000', '0.000'),
(5, '', '2019-04-27 01:46:38', '0.000', '0.000'),
(6, '44444444', '2019-04-27 01:48:43', '0.000', '0.000'),
(7, 'sdasa', '2019-04-27 01:55:06', '0.000', '0.000'),
(8, 'qwe', '2019-04-27 01:56:01', '0.000', '0.000'),
(9, 'qwe', '2019-04-27 01:56:18', '0.000', '0.000'),
(10, 'qwe', '2019-04-27 01:56:45', '999.999', '0.000'),
(11, 'ccc', '2019-04-27 01:57:50', '0.000', '0.000'),
(12, '1122', '2019-04-27 02:01:21', '1.000', '0.000'),
(13, '1122', '2019-04-27 02:01:43', '1.000', '0.000'),
(14, '11', '2019-04-27 02:02:03', '1.000', '0.000'),
(15, '12333', '2019-04-27 02:02:41', '1.000', '0.000'),
(16, 'r', '2019-04-27 02:02:44', '1.000', '0.000'),
(17, '1', '2019-04-27 02:05:20', '1.000', '0.000'),
(18, '4', '2019-04-27 02:05:25', '1.000', '0.000'),
(19, 'qde', '2019-04-27 02:09:51', '1.000', '0.000'),
(20, '2313', '2019-04-27 02:12:09', '1.000', '0.000'),
(21, '123', '2019-04-27 02:16:15', '1.000', '0.000'),
(22, '333', '2019-04-27 02:19:19', '1.000', '0.000'),
(23, '3333', '2019-04-27 02:20:43', '1.000', '0.000'),
(24, '123', '2019-04-27 02:21:16', '1.000', '0.000'),
(25, '1', '2019-04-27 02:22:55', '1.000', '0.000'),
(26, 'eee', '2019-04-27 02:23:27', '1.000', '0.000'),
(27, '222', '2019-04-27 02:25:46', '1.000', '0.000'),
(28, '2312', '2019-04-27 02:27:01', '1.000', '0.000'),
(29, '', '2019-04-27 02:27:01', '1.000', '0.000'),
(30, '12', '2019-04-27 02:27:49', '1.000', '0.000'),
(31, 'ffff', '2019-04-27 02:28:54', '1.000', '0.000'),
(32, '312', '2019-04-27 02:30:23', '1.000', '0.000'),
(33, '123', '2019-04-27 02:31:09', '1.000', '0.000'),
(34, '', '2019-04-27 02:32:04', '1.000', '0.000'),
(35, '123', '2019-04-27 02:36:08', '1.000', '0.000'),
(36, '212', '2019-04-27 02:40:40', '1.000', '0.000'),
(37, '2', '2019-04-27 02:41:12', '1.000', '0.000'),
(38, '231', '2019-04-27 02:42:12', '1.000', '0.000'),
(39, '5646546', '2019-04-27 02:45:39', '1.000', '0.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `solicitud` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `costo` decimal(18,3) DEFAULT NULL,
  `cantida` decimal(18,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla detalle';

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`solicitud`, `codigo`, `costo`, `cantida`) VALUES
(1, 1, '3.000', '3.000'),
(26, 45, '2.000', '0.000'),
(26, 321, '2.000', '0.000'),
(26, 3333, '2.000', '0.000'),
(26, 11111, '2.000', '0.000'),
(27, 0, '2.000', '0.000'),
(27, 1, '2.000', '0.000'),
(27, 2, '2.000', '0.000'),
(29, 1, '2.000', '0.000'),
(29, 2, '2.000', '0.000'),
(29, 444, '2.000', '0.000'),
(30, 1, '2.000', '0.000'),
(30, 2, '2.000', '0.000'),
(30, 333, '2.000', '0.000'),
(31, 1, '2.000', '0.000'),
(31, 3, '2.000', '0.000'),
(31, 444, '2.000', '0.000'),
(31, 31232, '2.000', '0.000'),
(32, 1, '2.000', '0.000'),
(33, 333, '2.000', '0.000'),
(34, 0, '2.000', '0.000'),
(34, 1, '2.000', '0.000'),
(34, 3, '2.000', '0.000'),
(35, 1, '2.000', '0.000'),
(35, 2, '2.000', '0.000'),
(36, 13, '2.000', '0.000'),
(37, 13, '2.000', '0.000'),
(38, 13, '2.000', '0.000'),
(39, 13, '2.000', '0.000'),
(39, 14, '2.000', '0.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(5) NOT NULL,
  `Cedula` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Usuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Contrasena` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Rol` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Cedula`, `Nombre`, `Apellido`, `Telefono`, `Email`, `Usuario`, `Contrasena`, `Rol`) VALUES
(6, '2', 'Rene', 'Morales', '71175012', 'win@gmail.com', 'rene', '123', 'admin'),
(8, '1122', 'Win', 'Morales', '71063630', 'win@gmail.com', 'win', '12345', 'admin'),
(10, '30490525', 'Yeison', 'PicadoAbarca', '', '', 'yeco', '202cb962ac59075b964b07152d234b70', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`solicitud`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`solicitud`,`codigo`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`solicitud`) REFERENCES `compra` (`solicitud`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
