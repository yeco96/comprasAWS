
ALTER TABLE `compra` ADD FOREIGN KEY (solicitud) REFERENCES `detalleCompra` (`solicitud`) ;
ALTER TABLE `detalleCompra` ADD FOREIGN KEY (codigo) REFERENCES `articulo` (`codigo`) ;




ALTER TABLE `detalleCompra` ADD FOREIGN KEY (solicitud) REFERENCES `compra` (`solicitud`) ;
ALTER TABLE `articulo` ADD FOREIGN KEY (codigo) REFERENCES `detalleCompra` (`codigo`) ;