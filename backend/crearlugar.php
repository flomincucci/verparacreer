<?php
function __autoload($className){
  require_once 'clases/'.strtolower($className).'.php';
  require_once 'dbfunctions.php';
}

$lugar = new Lugar();
if (isset($_POST['nombre'])) $lugar->setNombre($_POST['nombre']);
if (isset($_POST['descripcion'])) $lugar->setNombre($_POST['descripcion']);
if (isset($_POST['imagen'])) $lugar->setNombre($_POST['imagen']);
if (isset($_POST['coordenadas'])) $lugar->setNombre($_POST['coordenadas']);
$lugar->save();

?>