<?php
require_once 'system.php';

//$usuarioid = $_POST['usuario'];
$usuarioid = /*$SESSION["user_id"]*/ 1;
$usuario = new Usuario($usuarioid);

//$lugarid = $_GET['id']; // Harcodeado asqueroso
$arrayevento = execute_select('usuario_evento',array('evento_id'),'usuario_id = '.$usuarioid);
$eventoid = $arrayevento[0]['evento_id'];
$arraylugar = execute_select('evento',array('lugar_id'),'id = '.$eventoid);
$lugar = new Lugar($arraylugar[0]['lugar_id']);
$mensaje_array = execute_select("conf", array("valor") ,"clave='mensaje_bienvenida'");
$mensaje = $mensaje_array[0]["valor"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ver Para Creer</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">
  function initialize() {
    var latlng = new google.maps.LatLng(<?php echo $lugar->getCoordenadas() ?>);
    var myOptions = {
      zoom: 16,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"), myOptions);
  }

</script>

</head>
<body onload="initialize()" >
  <div id="wrapper">
    <div id="header">
      <span id="gcba">
        <a href="javascript:void(0)">
          Gobierno de la Ciudad de Buenos Aires
        </a>
      </span>
      <span id="haciendo">
        <a href="javascript:void(0)">
          Haciendo Buenos Aires
        </a>
      </span>
    </div>
    <div id="container">
      <h1>Ver Para Creer</h1>
      <div id="welcome">
        <p>
          <?php echo str_replace("%s","<span>".$usuario->getNombre()."</span>",$mensaje); ?>
        </p>
        <a href="rsvp.php" id="confirm">
          Confirmar Asistencia
        </a>
      </div>
      <div class="separador">&nbsp;</div>
        <div id="map" style="width: 965px; height: 334px"></div>

      <div class="descripcion">
        <p><?php echo $lugar->getDescripcion() ?></p>
      </div>
      <div id="footer">
        <div class="separador">
          &nbsp;
        </div>
        <p>
          Gobierno de la Ciudad de Buenos Aires. 2011 &copy; <a href="javascript:void(0)">Contacto</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
