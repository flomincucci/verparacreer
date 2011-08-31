<?php
require_once 'system.php';

$lugarid = $_GET['id'];
$lugar = new Lugar($lugarid);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ver para Creer</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA427X7LlsRuvm2np_4bQ86hSfthRaxTdJDc7DzmOnXSbazG3i3BRTAVMZU0GdPO3wENWSL_KLO-iLmw&sensor=false" type="text/javascript"></script>
</head>
<body onload="initialize()" onunload="GUnload()">
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
      <h2>Hito: <?php echo htmlentities($lugar->getNombre()) ?></h2>
      <div class="separador">&nbsp;</div>
      <div id="welcome">
        <p>
          <?php echo htmlentities($lugar->getDescripcion()) ?>
        </p>
      </div>
      <a href="solicitarinvitacion.php?hito=<?php echo $lugar->getId() ?>" id="confirm">solicitar invitaci&oacute;n</a>
        <div id="map" style="width: 965px; height: 334px"></div>
        <script type="text/javascript">
          var map = new GMap(document.getElementById("map"));
          map.setCenter(new GLatLng(<?php echo $lugar->getCoordenadas() ?>), 16);
          map.addControl(new GLargeMapControl()); 
          var point = new GLatLng(<?php echo $lugar->getCoordenadas() ?>);
          map.addOverlay(new GMarker(point));
        </script>

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
