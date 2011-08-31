<?php
require_once 'system.php';



//$usuario = new Usuario(1);
/*$usuario->setNombre('Flo Mincucci');
$usuario->setPassword('revolucion');
$usuario->setMailPersonal('flomincucci@gmail.com');
$usuario->setTipoUsuario(2);
$usuario->save();*/
//var_dump($usuario);

$array = execute_select("conf", array("*"));
var_dump($array);



/*$usuario = new Usuario();
$usuario->setNombre('Melina Javkin');
$usuario->setPassword('mjavkin');
$usuario->setMailPersonal('mjavkin@gmail.com');
$usuario->setTipoUsuario(2);
$usuario->save();

var_dump($usuario);*/




?>