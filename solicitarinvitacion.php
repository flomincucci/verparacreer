<?php
require_once 'lib/swift_required.php';
require_once 'system.php';

$hitoid = $_GET['hito'];
$hito = new Lugar($hitoid);

$usuarioid = $_SESSION["user_id"];
$usuario = new Usuario($usuarioid);

$message = Swift_Message::newInstance();
$message->setFrom('info@buenosaires.gob.ar');
$message->setTo($usuario->getMailContacto());
$subject = 'Subject1';
$body = 'Estas invitado';
$message->setSubject($subject);
$message->setBody($body);
$result = $mailer->send($message);

?>