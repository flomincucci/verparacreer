<?php
require_once 'system.php';

$lugarid = $_GET['id'];
$lugar = new Recorrido($lugarid);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ver para Creer</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA427X7LlsRuvm2np_4bQ86hSHmzmRoDrRJuPkAwzFi5y8ynsGkhRHQvvhpmi_TUKUH1L-4MFEiQFXlg&sensor=false" type="text/javascript"></script>
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
      <h2>Hito: <?php echo $lugar->getNombre() ?></h2>
      <div class="separador">&nbsp;</div>
      <div id="welcome">
        <p>
          <?php echo $lugar->getDescripcion() ?>
        </p>
      </div>
      <!--<img src="imgs/mapa.jpg" id="mapa" alt="Mapa" />-->
      <?php if ($recorrido->getMapa()):?> 
        <!--<iframe width="965" height="334" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $recorrido->getMapa() ?>"></iframe>-->
        <div id="map" style="width: 965px; height: 334px"><img src="timthumb.php?src=backend/upload/<?php echo $recorrido['imagen'] ?>&h=334&w=965" /></div>
        <!--<script type="text/javascript">
          var map = new GMap(document.getElementById("map"));
          map.setCenter(new GLatLng(<?php echo $lugar['coordenadas'] ?>), 15);
          map.addControl(new GLargeMapControl()); 
          var point = new GLatLng(<?php echo $lugar['coordenadas'] ?>);
          map.addOverlay(new GMarker(point));
        </script>-->
      <?php endif; ?>

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
