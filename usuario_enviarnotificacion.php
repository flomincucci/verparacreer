<?php
require_once 'lib/swift_required.php';
require_once 'system.php';

$message = Swift_Message::newInstance();
$message->setFrom('info@buenosaires.gob.ar');
$message->setTo($_POST['destinatario']);
switch($_POST['motivo']) {
  case 'invitacion':
    $subject = 'Subject1';
    $body = 'Estas invitado';
    break;
  case 'aceptacion':
    $subject = 'Subject1';
    $body = 'Ha sido aceptado';
    break;
}
$message->setSubject($subject);
$message->setBody($body);
$result = $mailer->send($message);

?>