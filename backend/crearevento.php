<?php
function __autoload($className){
  require_once 'clases/'.strtolower($className).'.php';
  require_once 'dbfunctions.php';
}

$evento = new Evento();
if (isset($_POST['recorrido'])) $evento->setRecorrido($_POST['recorrido']);
if (isset($_POST['recorrido'])) $evento->setLugar($_POST['lugar']);
if (isset($_POST['fechahora'])) $evento->setFechahora($_POST['fechahora']);
if (isset($_POST['acompaniante'])) $evento->setAcompaniante($_POST['acompaniante']);
if (isset($_POST['ministerio'])) $evento->setMinisterio($_POST['ministerio']);
if (isset($_POST['vamm'])) $evento->setVamm($_POST['vamm']);
$evento->save();

?>