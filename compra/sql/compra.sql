
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `compra` (
  `solicitud` int(11) NOT NULL,
  `numeroFactura` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  `cedulaUsuario` DECIMAL(6,3) DEFAULT NULL,
  `totalCompra` DECIMAL(18,3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='Tabla compra';


ALTER TABLE `compra`
 ADD PRIMARY KEY (`solicitud`);

ALTER TABLE `compra`
MODIFY `solicitud` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

