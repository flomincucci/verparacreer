<?php
function __autoload($className){
  require_once 'clases/'.strtolower($className).'.php';
  require_once 'dbfunctions.php';
}
// Agrega un lugar a un recorrido

$datos = array('lugar_id' => $_POST['lugar'], 'recorrido_id' => $_POST['recorrido']);
execute_insert('lugar_recorrido',$datos);  

?>