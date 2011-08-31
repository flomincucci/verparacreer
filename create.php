<?php
$conexion = mysql_connect('10.10.10.64','verparacreer','notengoquever');

$sql0 = 'CREATE DATABASE prueba';
if (mysql_query($sql0, $conexion)) {
    echo "Database my_db created successfully\n";
} else {
    echo 'Error creating database: ' . mysql_error() . "\n";
}

mysql_select_db('prueba',$conexion);

/*$sql1 = 'CREATE TABLE rubro(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'nombre  VARCHAR(50), ';
$sql1 .= 'mensaje TEXT, ';
$sql1 .= 'PRIMARY KEY (id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE usuario(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'nombre  VARCHAR(100), ';
$sql1 .= 'mail_personal VARCHAR(100), ';
$sql1 .= 'mail_contacto VARCHAR(100), ';
$sql1 .= 'santoysenia VARCHAR(50), ';
$sql1 .= 'rubro_id int , ';
$sql1 .= 'categoria int, ';
$sql1 .= 'tipousuario int default 0,';
$sql1 .= 'ministerio_id int,';
$sql1 .= 'mensaje TEXT,';
$sql1 .= 'PRIMARY KEY (id), ';
$sql1 .= 'FOREIGN KEY(rubro_id) REFERENCES rubro(id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE ministerio(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'nombre  VARCHAR(100), ';
$sql1 .= 'PRIMARY KEY (id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE recorrido(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'nombre  VARCHAR(100), ';
$sql1 .= 'descripcion TEXT, ';
$sql1 .= 'mapa  VARCHAR(200), ';
$sql1 .= 'ubicacion  VARCHAR(150), ';
$sql1 .= 'PRIMARY KEY (id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE lugar(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'nombre  VARCHAR(50), ';
$sql1 .= 'descripcion TEXT, ';
$sql1 .= 'imagen  VARCHAR(100), ';
$sql1 .= 'coordenadas  VARCHAR(30), ';
$sql1 .= 'PRIMARY KEY (id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE lugar_recorrido(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'lugar_id  int NOT NULL, ';
$sql1 .= 'recorrido_id  int NOT NULL, ';
$sql1 .= 'PRIMARY KEY (id),';
$sql1 .= 'FOREIGN KEY(lugar_id) REFERENCES lugar(id),';
$sql1 .= 'FOREIGN KEY(recorrido_id) REFERENCES recorrido(id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE recorrido_categoria_rubro(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'recorrido_id  int NOT NULL , ';
$sql1 .= 'categoria  int, ';
$sql1 .= 'rubro int,';
$sql1 .= 'PRIMARY KEY (id),';
$sql1 .= 'FOREIGN KEY(recorrido_id) REFERENCES recorrido(id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE lugar_media(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'lugar_id  int NOT NULL , ';
$sql1 .= 'tipo  varchar(30), ';
$sql1 .= 'url varchar(200),';
$sql1 .= 'descripcion text,';
$sql1 .= 'PRIMARY KEY (id),';
$sql1 .= 'FOREIGN KEY(recorrido_id) REFERENCES recorrido(id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE evento(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'recorrido_id  int , ';
$sql1 .= 'lugar_id int, ';
$sql1 .= 'fechahora  datetime, ';
$sql1 .= 'acompaniante_id int,';
$sql1 .= 'ministerio_id int, ';
$sql1 .= 'vamm boolean,';
$sql1 .= 'PRIMARY KEY (id),';
$sql1 .= 'FOREIGN KEY(recorrido_id) REFERENCES recorrido(id),';
$sql1 .= 'FOREIGN KEY(acompaniante_id) REFERENCES usuario(id),';
$sql1 .= 'FOREIGN KEY(ministerio_id) REFERENCES ministerio(id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE usuario_evento(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'usuario_id  int NOT NULL, ';
$sql1 .= 'evento_id  int NOT NULL, ';
$sql1 .= 'rsvp int,';
$sql1 .= 'PRIMARY KEY (id),';
$sql1 .= 'FOREIGN KEY(usuario_id) REFERENCES usuario(id),';
$sql1 .= 'FOREIGN KEY(evento_id) REFERENCES evento(id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);*/


$sql1 = 'CREATE TABLE IF NOT EXISTS `conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `valor` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recorrido_id` int(11) DEFAULT NULL,
  `lugar_id` int(11) DEFAULT NULL,
  `fechahora` datetime DEFAULT NULL,
  `acompaniante_id` int(11) DEFAULT NULL,
  `ministerio_id` int(11) DEFAULT NULL,
  `vamm` tinyint(1) DEFAULT NULL,
  `duracion` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recorrido_id` (`recorrido_id`),
  KEY `acompaniante_id` (`acompaniante_id`),
  KEY `ministerio_id` (`ministerio_id`),
  KEY `lugar_id` (`lugar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE IF NOT EXISTS `lugar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `imagen` varchar(100) DEFAULT NULL,
  `coordenadas` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

CREATE TABLE IF NOT EXISTS `lugar_recorrido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lugar_id` int(11) NOT NULL,
  `recorrido_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lugar_id` (`lugar_id`),
  KEY `recorrido_id` (`recorrido_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE IF NOT EXISTS `ministerio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `recorrido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1,
  `mapa` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `ubicacion` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE IF NOT EXISTS `recorrido_categoria_rubro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recorrido_id` int(11) NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  `rubro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recorrido_id` (`recorrido_id`),
  KEY `rubro` (`rubro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `recorrido_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recorrido_id` int(11) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`),
  KEY `recorrido_id` (`recorrido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE IF NOT EXISTS `rubro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `mensaje` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `senias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `santoysenia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `mail_personal` varchar(100) DEFAULT NULL,
  `mail_contacto` varchar(100) DEFAULT NULL,
  `santoysenia` varchar(50) DEFAULT NULL,
  `rubro_id` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `tipousuario` int(11) DEFAULT "0",
  `ministerio_id` int(11) DEFAULT NULL,
  `mensaje` text,
  PRIMARY KEY (`id`),
  KEY `rubro_id` (`rubro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

CREATE TABLE IF NOT EXISTS `usuario_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `rsvp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `evento_id` (`evento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;';

mysql_query($sql1,$conexion);

$sql1 = 'ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`recorrido_id`) REFERENCES `recorrido` (`id`),
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`acompaniante_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `evento_ibfk_3` FOREIGN KEY (`ministerio_id`) REFERENCES `ministerio` (`id`),
  ADD CONSTRAINT `evento_ibfk_4` FOREIGN KEY (`lugar_id`) REFERENCES `lugar` (`id`);
	
	ALTER TABLE `lugar_recorrido`
  ADD CONSTRAINT `lugar_recorrido_ibfk_1` FOREIGN KEY (`lugar_id`) REFERENCES `lugar` (`id`),
  ADD CONSTRAINT `lugar_recorrido_ibfk_2` FOREIGN KEY (`recorrido_id`) REFERENCES `recorrido` (`id`);
	
	
	ALTER TABLE `recorrido_categoria_rubro`
  ADD CONSTRAINT `recorrido_categoria_rubro_ibfk_1` FOREIGN KEY (`recorrido_id`) REFERENCES `recorrido` (`id`),
  ADD CONSTRAINT `recorrido_categoria_rubro_ibfk_2` FOREIGN KEY (`rubro`) REFERENCES `rubro` (`id`);
	
	ALTER TABLE `recorrido_media`
  ADD CONSTRAINT `recorrido_media_ibfk_1` FOREIGN KEY (`recorrido_id`) REFERENCES `recorrido` (`id`);
	
	ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rubro_id`) REFERENCES `rubro` (`id`);
	
	ALTER TABLE `usuario_evento`
  ADD CONSTRAINT `usuario_evento_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `usuario_evento_ibfk_2` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`);';

?>

mysql_query($sql1,$conexion);