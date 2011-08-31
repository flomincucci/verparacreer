<?php
include("../system.php");
if(isset($_REQUEST["q"]))
{
    $q = $_REQUEST["q"];
    $id="";
    $ministerio="";
    $rubro = "";
    if(isset($_REQUEST["id"])) $id = "AND id NOT IN (SELECT usuario_id FROM usuario_evento WHERE evento_id=".$_REQUEST["id"].")";
    $names = execute_select("usuario", array("id","nombre"),"nombre LIKE '%$q%' $id ");
    for($i = 0;$i<count($names);$i++)
    {
        echo $names[$i]["id"]."|".$names[$i]["nombre"]."\n";
    }
}
?>
