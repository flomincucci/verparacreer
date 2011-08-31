<?php
require_once 'system.php';

$hito = new Hito();
if (isset($_POST['nombre'])) $hito->setNombre($_POST['nombre']);
if (isset($_POST['descripcion'])) $hito->setDescripcion($_POST['descripcion']);
if (isset($_POST['imagen'])) $hito->setImagen($_POST['imagen']);
if (isset($_POST['coordenadas'])) $hito->setCoordenadas($_POST['coordenadas']);
$hito->save();

?>