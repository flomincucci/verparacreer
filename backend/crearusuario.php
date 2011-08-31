<?php
include 'system.php';

$usuario = new Usuario();
if (isset($_POST['nombre'])) $usuario->setNombre($_POST['nombre']);
if (isset($_POST['mailpersonal'])) $usuario->setNombre($_POST['mailpersonal']);
if (isset($_POST['mailcontacto'])) $usuario->setNombre($_POST['mailcontacto']);
/* Crear password */
if (isset($_POST['rubro'])) $usuario->setNombre($_POST['rubro']);
if (isset($_POST['categoria'])) $usuario->setNombre($_POST['categoria']);
if (isset($_POST['tipo'])) $usuario->setNombre($_POST['tipo']);
$usuario->save();
?>