<?php
require_once 'system.php';
// Agrega una categoria o rubro a un lugar
$datos = array('recorrido_id' => $_POST['recorrido']);
if (isset($_POST['categoria'])) array_push($datos,$_POST['categoria']);
if (isset($_POST['rubro'])) array_push($datos,$_POST['rubro']);
execute_insert('lugar_media',$datos);  

?>