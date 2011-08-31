<?php
require_once '../system.php';
if (isset($_REQUEST["post"]))
{
    if(isset($_POST["mensaje_mail"]))
    {
        $columns = array("*");
        $array = execute_select("conf", $columns ,'clave="mensaje_mail"');
        if(!isset($array[0]))
        {
            $array = array("clave"=>"mensaje_mail","valor"=> $_POST["mensaje_mail"]);
            execute_insert("conf", $array);
        }
        else
        {
            $array = array("clave"=>"mensaje_mail","valor"=> $_POST["mensaje_mail"]);
            execute_update("conf", $array,"clave='mensaje_mail'");
        }
    }
    if(isset($_POST["mensaje_bienvenida"]))
    {
        $columns = array("*");
        $array = execute_select("conf", $columns ,"clave='mensaje_bienvenida'");
        if(!isset($array[0]))
        {
            $array = array("clave"=>"mensaje_bienvenida","valor"=>$_POST["mensaje_bienvenida"]);
            execute_insert("conf", $array);
        }
        else
        {
            $array = array("clave"=>"mensaje_bienvenida","valor"=> $_POST["mensaje_bienvenida"]);
            execute_update("conf", $array,"clave='mensaje_bienvenida'");
        }
        
    }
    if(isset($_POST["mensaje_confirmacion"]))
    {
        $columns = array("*");
        $array = execute_select("conf", $columns ,"clave='mensaje_confirmacion'");
        if(!isset($array[0]))
        {
            $array = array("clave"=>"mensaje_confirmacion","valor"=>$_POST["mensaje_confirmacion"]);
            execute_insert("conf", $array);
        }
        else
        {
            $array = array("clave"=>"mensaje_confirmacion","valor"=> $_POST["mensaje_confirmacion"]);
            execute_update("conf", $array,"clave='mensaje_confirmacion'");
        }
    }
}
?>
<script type="text/javascript">
    document.location = "form.php";
</script>
