<?php
require_once 'system.php';
// Agrega un lugar a un recorrido

$datos = array('lugar_id' => $_POST['lugar'], 'tipo' => $_POST['tipo'], 'url' => $_POST['url'], 'descripcion' => $_POST['descripcion']);
execute_insert('lugar_media',$datos);  

?>