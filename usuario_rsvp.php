<?php
require_once 'system.php';
// RSVP a un evento por parte de un usuario

$datos = array('rsvp' => $_POST['rsvp']); 
execute_update('usuario_evento',$datos,'usuario_id = '.$_POST['usuario'].' AND evento_id ='.$_POST['evento']);

?>