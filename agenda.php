<?php
require_once 'system.php';

if ((!isset($_GET['semana'])) || $_GET['semana'] == 0  ) {
  $comienzo = date('Y-m-d');
  $fin = date('Y-m-d',strtotime('+1 week'));
  $criterio = 'evento.fechahora between "'.$comienzo.'" and "'.$fin.'"';
} else {
  $timecomienzo = strtotime($_GET['semana'].' week');
  $comienzo = date('Y-m-d',$timecomienzo);
  $fin = date('Y-m-d',strtotime('+1 week',$timecomienzo));
  $criterio = 'evento.fechahora between "'.$comienzo.'" and "'.$fin.'"';
}

$eventos = execute_select('evento
LEFT JOIN lugar ON evento.lugar_id = lugar.id LEFT JOIN usuario ON evento.acompaniante_id = usuario.id LEFT JOIN ministerio ON evento.ministerio_id = ministerio.id', array('evento.id','lugar.nombre as lugar','evento.fechahora','usuario.nombre as acompaniante','ministerio.nombre as ministerio','evento.vamm'),$criterio);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ver Para Creer</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
</head>
<body>
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
        <ul id="menu">
          <li>
            <a href="agenda.php">Home</a>
          </li>
          <li>
            <a href="#">Ver semana</a>
          </li>
        </ul>
      </div>
      <div class="separador">&nbsp;</div>
      <div id="table">
        <table width="100%">
          <thead>
            <tr>
              <th class="rec">
                hito
              </th>
              <th class="min">
                ministerio
              </th>
              <th class="dia">
                d&iacute;a
              </th>
              <th class="hor">
                hora
              </th>
              <th class="inv">
                invitados
              </th>
              <th class="aco">
                acompa&ntilde;a
              </th>
              <th class="mm">
                mm
              </th>
            </tr>
          </thead>
          <tbody>
          <?php $total = count($eventos); $i = 2; ?>
          <?php foreach($eventos as $evento): ?>
            <tr class="<?php echo ($i%2 == 0)? 'par' : 'impar' ?>">
              <td class="rec">
                <p><?php echo $evento['lugar'] ?></p>
              </td>
              <td class="min">
                <p><?php echo $evento['ministerio'] ?></p>
              </td>
              <td class="dia">
                <p><?php echo substr($evento['fechahora'],0,10) ?></p>
              </td>
              <td class="hor">
                <p><?php echo substr($evento['fechahora'],10) ?></p>
              </td>
              <td class="inv">
                <div><a href="invitados.php?evento=<?php echo $evento['id']?>">Ver invitados</a></div>
              </td>
              <td class="aco">
                <p><?php echo $evento['acompaniante'] ?></p>
              </td>
              <td class="mm">
                <p><?php echo ($evento['vamm'])? 'SI' : 'NO' ?></p>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div id="weekbuttons">
        <a href="agenda.php?semana=<?php echo (isset($_GET['semana']))? $_GET['semana']-1 : '-1' ?>" class="left">semana anterior</a>
        <a href="agenda.php?semana=<?php echo (isset($_GET['semana']))? $_GET['semana']+1 : '+1' ?>" class="right">semana siguiente</a>
      </div>
      <div id="footer">
        <div class="separador">
          &nbsp;
        </div>
        <p>
          Gobierno de la Ciudad de Buenos Aires. 2011 · <a href="javascript:void(0)">Contacto</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>