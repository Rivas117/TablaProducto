CREATE TABLE `works` (
    `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `nombre` varchar(128),
    `descripcion` varchar(128),
    `precio` int(11),
    `estado` char(3),
    `creado` datetime,
    `actualizado` datetime,
) COMMENT = 'Lista de productos Electrodomesticos'