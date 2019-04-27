

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `detalle` (
  `solicitud` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `costo` DECIMAL(18,3) DEFAULT NULL,
  `cantida` DECIMAL(18,3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='Tabla detalle';


ALTER TABLE `detalle`
 ADD PRIMARY KEY (`solicitud`);

