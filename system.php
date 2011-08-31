<?php
function __autoload($className){
  require_once 'clases/'.strtolower($className).'.php';
}
require_once 'dbfunctions.php';
session_start();
//ini_set("display_errors", 0);
/*define("DBHOST", "localhost");
define("DBUSER", "vpc");
define("DBPASS","vpc");
define("SALT","0303456");*/
define("BACKEND_URL","/verparacreer/backend/");
define("FRONTEND_URL","/verparacreer/");

connect();

?>