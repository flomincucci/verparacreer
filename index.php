<?php
require_once 'system.php';

/*$recorridos = execute_select('recorrido',array('*'));*/
$recorridos = execute_select('lugar',array('*'));
/*$mensaje_array = execute_select("conf", array("valor") ,"clave='mensaje_bienvenida'");
$mensaje = $mensaje_array[0]["valor"];*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ver Para Creer</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
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
			<div id="welcome">
				<p>
					<strong>Estimados:</strong><br />
					<p>Soy parte de un equipo de personas que comparte el sueño de construir una Ciudad y una Argentina mejor; y todos juntos trabajamos desde el priemr día con pasión y entusiasmo para hacerlo realidad.<br />
					Decidí involucrarme en política con la convicción de que cada argentino tiene algo que aprtar para cumplir ese sueño, y llegué con el entusiasmo de quien quiere que la gente viva bien, de quien se interesa por lo que le pasa al otro.<br />
					Hace ya tres años que asumí como Jefe de Gobierno de la Ciudad y estoy orgulloso de todo lo que hemos logrado desde entonces.<br />
					Trabajamos sin descanso y demostramos que una forma distinta de gobernar es posible. Dimos y damos todo de cada uno, con la mirada puesta en la verdadera responsabilidad de la política: hacer que todos podamos vivir mejor.<br />
					En solo tres años, demostramos que estamos haciendo de BuenosAires una gran Ciudad, avanzando en todas las áreas con grandes y pequeñas obras y acciones.<br />
					Hoy queremos compartir algunas de ellas con ustedes. Por eso lanzamos Ver Para Creer, un programa de visitas a través del cual los invitamos a recorrer algunas de las principales obras de esta gestión. Espero que lo disfruten y se contagien del entusiasmo que nosotros tenemos desde el primer día y que hoy mantenemos más intacto que nunca.</p>
					Mauricio Macri<br /> Jefe de Gobierno
				</p>
			</div>
			<div class="separador">&nbsp;</div>
			<p id="quote">Estos son los hitos:</p>
      <div class="boxes">
      <?php $i = 1; ?>
	    <?php foreach($recorridos as $recorrido): ?>  
				<div class="box <?php if ($i%3 == 0) echo 'last' ?>">
					<div class="num">
						
						<h3><div><?php echo $i ?></div><?php echo htmlentities($recorrido['nombre']) ?></h3>
					</div>
					<!--<img src="imgs/foto.jpg" alt="Foto" />-->
					<!--<img src="timthumb.php?src=<?php echo $recorrido['imagen'] ?>&amp;w=275&amp;h=180&amp;zc=1'" alt="<?php echo $recorrido['nombre'] ?>" width="275" height="180" />-->
				<div id="map<?php echo $i ?>" style="width: 275px; height: 180px"><img src="timthumb.php?src=backend/upload/<?php echo $recorrido['imagen'] ?>&h=170&w=275" /></div>
				<!--<script type="text/javascript">
								  var map = new GMap(document.getElementById("map<?php echo $i ?>"));
								  map.setCenter(new GLatLng(<?php echo $recorrido['coordenadas'] ?>), 14);
								  map.addControl(new GLargeMapControl()); 
								  var point = new GLatLng(<?php echo $recorrido['coordenadas'] ?>);
								  map.addOverlay(new GMarker(point));
        </script>-->
					<div class="texto">
						<?php echo substr(htmlentities($recorrido['descripcion']),0,300).'...' ?>
					</div>
					<div class="links">
						<a href="hito.php?id=<?php echo $recorrido['id'] ?>" class="left" >+ ver m&aacute;s</a>
						<!--<a href="solicitarinvitacion.php?recorrido=<?php echo $recorrido['id'] ?>" class="right" >solicitar invitaci&oacute;n</a>-->
						<a href="mailto:info@verparacreer.gob.ar?subject=<?php echo htmlentities($recorrido['nombre']) ?>" class="right" >solicitar invitaci&oacute;n</a>
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
	<script type="text/javascript">
  	/*var size = 0;
    $(".box").each(function(i,element){
           if($(this).height()>size)
           {
                   size = $(this).height();
           }
    });
    $(".box").height(size);*/
	</script>
</body>
</html>
