<?php
include 'system.php';

$usuario = new Usuario(1);
$usuario->setNombre('Juan Carlos');
$usuario->setPassword("12345");
$usuario->save();

$otrousuario = new Usuario(2);
$otrousuario->setNombre('Analia');
$otrousuario->save();

?>