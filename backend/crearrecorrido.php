<?php
function __autoload($className){
  require_once 'clases/'.strtolower($className).'.php';
  require_once 'dbfunctions.php';
}

$recorrido = new Recorrido();
if (isset($_POST['nombre'])) $recorrido->setNombre($_POST['nombre']);
if (isset($_POST['descripcion'])) $recorrido->setDescripcion($_POST['descripcion']);
if (isset($_POST['mapa'])) $recorrido->setMapa($_POST['mapa']);
if (isset($_POST['ubicacion'])) $recorrido->setUbicacion($_POST['ubicacion']);
$recorrido->save();

?>