<?php
require_once 'system.php';

$invitados = execute_select('usuario_evento LEFT JOIN usuario ON usuario_evento.usuario_id = usuario.id LEFT JOIN evento ON usuario_evento.evento_id = evento.id LEFT JOIN lugar ON evento.lugar_id = lugar.id LEFT JOIN ministerio ON evento.ministerio_id = ministerio.id', array('usuario.nombre as invitado', 'lugar.nombre as lugar', 'evento.fechahora as fechahora', 'ministerio.nombre as ministerio', 'usuario_evento.rsvp as estado'), 'usuario_evento.evento_id = '.$_GET['evento']);

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
            <a href="javascript:void(0)">Home</a>
          </li>
          <li>
            <a href="javascript:void(0)">lista de invitados</a>
          </li>
        </ul>
      </div>
      <div class="separador">&nbsp;</div>
      <div id="order">
        <form action="">
          <div id="searchtext">
            <input type="text" value="BUSCAR POR NOMBRE" name="name" />
          </div>
          <div id="abc">
            <ul>
              <li>a</li>
              <li>b</li>
              <li>c</li>
              <li>d</li>
              <li>e</li>
              <li>f</li>
              <li>g</li>
              <li>h</li>
              <li>i</li>
              <li>j</li>
              <li>k</li>
              <li>l</li>
              <li>m</li>
              <li>n</li>
              <li>o</li>
              <li>p</li>
              <li>q</li>
              <li>r</li>
              <li>s</li>
              <li>t</li>
              <li>u</li>
              <li>v</li>
              <li>w</li>
              <li>x</li>
              <li>y</li>
              <li>z</li>
            </ul>
          </div>
          <div id="orderby">
            <label for="orderselect">ordenar por:</label>
            <select id="orderselect" name="orderselect">
              <option>Recorrido</option>
            </select>
          </div>
        </form>
      </div>
      <div id="table">
        <table width="100%">
          <thead>
            <tr>
              <th class="inv-guest">
                invitado
              </th>
              <th class="rec-guest">
                recorrido
              </th>
              <th class="min-guest">
                ministerio
              </th>
              <th class="dia-guest">
                dia
              </th>
              <th class="hor-guest">
                hora
              </th>
              <th class="est-guest"><!--Los colores se ponen en este class. Se define como estado-id-->
                estado
              </th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($invitados as $invitado): ?>
            <tr>
              <td class="inv-guest">
                <?php echo $invitado['invitado'] ?>
              </td>
              <td class="rec-guest">
                <?php echo $invitado['lugar'] ?>
              </td>
              <td class="min-guest">
                <?php echo $invitado['ministerio'] ?>
              </td>
              <td class="dia-guest">
                <?php echo substr($invitado['fechahora'],0,10) ?>
              </td>
              <td class="hor-guest">
                <?php echo substr($invitado['fechahora'],10,6) ?>
              </td>
              <td class="est-guest">
                <?php echo $invitado['estado'] ?>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div id="footer">
        <div class="separador">
          &nbsp;
        </div>
        <p>
          Gobierno de la Ciudad de Buenos Aires. 2011 &copy;
        </p>
      </div>
    </div>
  </div>
</body>
</html>

