<?php
function __autoload($className){
  require_once 'clases/'.strtolower($className).'.php';
}
session_start();
header("Content-type: text/html; charset=utf-8");
include("functions/dbfunctions.php");
ini_set("display_errors", 1);
define("DBHOST", "10.10.10.64");
define("DBUSER", "verparacreer");
define("DBPASS","notengoquever");
define("SALT","0303456");
define("BACKEND_URL","/verparacreer/backend/");
define("DASHBOARD_URL","/verparacreer/backend/dashboard.php");
define("UPLOAD_PATH", "/var/www/html/verparacreer/backend/upload/");
connect();
$menu = array(
    "dashboard"=>(object)array(
        "url"=>BACKEND_URL,
        "name"=>"Dashboard"
    ),
    "usuario"=>(object)array(
        "url"=>BACKEND_URL."usuarios/index.php",
        "name"=>"Usuario"
    ),
    "evento"=>(object)array(
        "url"=>BACKEND_URL."eventos/index.php",
        "name"=>"Evento"
    ),
    "lugar"=>(object)array(
        "url"=>BACKEND_URL."lugares/index.php",
        "name"=>"Hito"
    ),
    "rubro"=>(object)array(
        "url"=>BACKEND_URL."rubros/index.php",
        "name"=>"Rubro"
    ),
    "ministerio"=>(object)array(
        "url"=>BACKEND_URL."ministerios/index.php",
        "name"=>"Ministerio"
    )/*,
    "recorrido"=>(object)array(
        "url"=>BACKEND_URL."recorridos/index.php",
        "name"=>"Recorrido"
    )*/,
    "configuracion"=>(object)array(
        "url"=>BACKEND_URL."conf/form.php",
        "name"=>"Configuración"
    )
);
/*
phpinfo();
die();
 * 
 */

if(isset($_SESSION["user_id"]))
{
    $user = new Usuario($_SESSION["user_id"]);
    if(($_SERVER["REQUEST_URI"]==BACKEND_URL."index.php")||($_SERVER["REQUEST_URI"]==BACKEND_URL))
    {
        ?>
        <script type="text/javascript">
            document.location="<?=DASHBOARD_URL?>";
        </script>
        <?
    }
}
else
{
    if(($_SERVER["REQUEST_URI"]!=BACKEND_URL."index.php")&&($_SERVER["REQUEST_URI"]!==BACKEND_URL))
    {
    ?>
    <script type="text/javascript">
        document.location="<?=BACKEND_URL?>";
    </script>
    <?
    }
}
?>
