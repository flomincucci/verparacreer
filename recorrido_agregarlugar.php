<?php
require_once 'system.php';
// Agrega un lugar a un recorrido

$datos = array('lugar_id' => $_POST['lugar'], 'recorrido_id' => $_POST['recorrido']);
execute_insert('lugar_recorrido',$datos);  

?>