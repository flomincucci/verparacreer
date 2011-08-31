<?php
$conexion = mysql_connect('localhost','user','password');

$sql0 = 'CREATE DATABASE vpc';
if (mysql_query($sql0, $conexion)) {
    echo "Database my_db created successfully\n";
} else {
    echo 'Error creating database: ' . mysql_error() . "\n";
}

mysql_select_db('vpc',$conexion);

$sql1 = 'CREATE TABLE rubro(';
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

$sql1 = 'CREATE TABLE recorrido_media(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'recorrido_id  int NOT NULL , ';
$sql1 .= 'tipo  varchar(30), ';
$sql1 .= 'url varchar(200),';
$sql1 .= 'descripcion text,';
$sql1 .= 'PRIMARY KEY (id),';
$sql1 .= 'FOREIGN KEY(recorrido_id) REFERENCES recorrido(id)';
$sql1 .= ') ENGINE=InnoDB;';

mysql_query($sql1,$conexion);

$sql1 = 'CREATE TABLE evento(';
$sql1 .= 'id int NOT NULL AUTO_INCREMENT, ';
$sql1 .= 'recorrido_id  int NOT NULL , ';
$sql1 .= 'fechahora  datetime, ';
$sql1 .= 'acompaniante_id int,';
$sql1 .= 'ministerio_id int, ';
$sql1 .= 'vamm boolean,';
$sql1 .= 'PRIMARY KEY (id),';
$sql1 .= 'FOREIGN KEY(recorrido_id) REFERENCES recorrido(id)';
$sql1 .= 'FOREIGN KEY(acompaniante_id) REFERENCES usuario(id)';
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

mysql_query($sql1,$conexion);

?>