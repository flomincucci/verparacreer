<?php
require_once 'system.php';

$recorridoid = $_GET['id'];
$recorrido = new Recorrido($recorridoid);

$lugares = execute_select('lugar_recorrido
INNER JOIN lugar ON lugar_recorrido.lugar_id = lugar.id',array('*'),'recorrido_id = '.$recorridoid.' group by lugar.id');

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
			<h2>Recorrido: <?php echo $recorrido->getNombre() ?></h2>
			<div class="separador">&nbsp;</div>
			<div id="welcome">
				<p>
					<?php echo $recorrido->getDescripcion() ?>
				</p>
			</div>
			<a href="solicitarinvitacion.php?recorrido=<?php echo $recorrido->getId() ?>" id="confirm">solicitar invitaci&oacute;n</a>
			<!--<img src="imgs/mapa.jpg" id="mapa" alt="Mapa" />-->
			<?php if ($recorrido->getMapa()):?> 
  			<!--<iframe width="965" height="334" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $recorrido->getMapa() ?>"></iframe>-->
  			<div id="map" style="width: 965px; height: 334px"></div>
        <script type="text/javascript">
          var map = new GMap(document.getElementById("map"));
          <?php
          $totalx = 0; $totaly = 0; 
          foreach($lugares as $lugar) {
            $coordenadas = $lugar['coordenadas']; 
            $x = strtok($coordenadas,',');
            $y = strtok(',');
            $totalx += $x;
            $totaly += $y;
          }
          $promediox = $totalx / count($lugares);
          $promedioy = $totaly / count($lugares);             
          ?> 
          map.setCenter(new GLatLng(<?php echo $promediox.','.$promedioy; ?>), 15);
          map.addControl(new GLargeMapControl());
          <?php foreach($lugares as $lugar): ?>  
            var point = new GLatLng(<?php echo $lugar['coordenadas'] ?>);
            map.addOverlay(new GMarker(point));
          <?php endforeach; ?>
        </script>
      <?php endif; ?>
			<div class="boxes">
      <?php $i = 1; ?>
      <?php foreach($lugares as $lugar): ?>  
        <div class="box <?php if ($i%3 == 0) echo 'last' ?>">			
					<div class="num">
						
						<h3><span><?php echo $i ?></span><?php echo $lugar['nombre'] ?></h3>
					</div>
          <!--<img src="<?php echo $lugar['imagen'] ?>" alt="<?php echo $lugar['nombre'] ?>" width="275" height="180" />-->
          <img src="timthumb.php?src=<?php echo $lugar['imagen'] ?>&amp;w=275&amp;h=180&amp;zc=1'" alt="<?php echo $lugar['nombre'] ?>" width="275" height="180" />
					<div class="texto">
						<?php echo $lugar['descripcion'] ?>
					</div>
				</div>
        <?php $i++; ?>
      <?php endforeach; ?>				
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
