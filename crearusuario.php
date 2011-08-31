<?php
include("system.php");

$usuario = new Usuario();
if (isset($_POST['nombre'])) $usuario->setNombre($_POST['nombre']);
if (isset($_POST['mailpersonal'])) $usuario->setMailpersonal($_POST['mailpersonal']);
if (isset($_POST['mailcontacto'])) $usuario->setMailcontacto($_POST['mailcontacto']);
if (isset($_POST['password'])) $usuario->setPassword($_POST['password']);
if (isset($_POST['rubro'])) $usuario->setRubro($_POST['rubro']);
if (isset($_POST['categoria'])) $usuario->setCategoria($_POST['categoria']);
if (isset($_POST['tipo'])) $usuario->setTipo($_POST['tipo']);
$usuario->save();

?>