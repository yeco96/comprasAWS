-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-04-2019 a las 21:38:43
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

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
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `IdArticulo` int(5) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Marca` int(25) NOT NULL,
  `Descripcion` int(25) NOT NULL,
  `Precio` int(10) NOT NULL,
  `Cantidad` int(5) NOT NULL,
  PRIMARY KEY (`IdArticulo`),
  UNIQUE KEY `Codigo` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Id_usuario` int(5) NOT NULL,
  `Id_articulo` int(5) NOT NULL,
  `Numero_factura` int(5) NOT NULL,
  `Fecha_compra` date NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Numero_factura` (`Numero_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(5) NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Usuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Contrasena` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Rol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  UNIQUE KEY `Cedula` (`Cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Cedula`, `Nombre`, `Apellido`, `Telefono`, `Email`, `Usuario`, `Contrasena`, `Rol`) VALUES
(6, '2', 'Rene', 'Morales', '71175012', 'win@gmail.com', 'rene', '123', 'admin'),
(8, '1122', 'Win', 'Morales', '71063630', 'win@gmail.com', 'win', '12345', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
