<?php
require_once '../system.php';
switch ($_REQUEST["action"])
{
    case "delete":
    if(isset($_GET["id"]))
    {
        $id = sanitize($_GET["id"]);
        $evento = Evento::delete($id);
        $alert = array (
            "action"=>"delete",
            "value"=>$evento,
            "id"=>$id
        );
        $_SESSION["alert"] = $alert;
    }
    break;
    case "drop":
    if(isset($_GET["id"]))
    {
        $id = sanitize($_GET["id"]);
        $evento = Evento::drop($id);
        $alert = array (
            "action"=>"delete",
            "value"=>$evento,
            "id"=>$id
        );
        $_SESSION["alert"] = $alert;
    }
    break;
    case "edit":
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $evento = new Evento($id);
        /*if (isset($_POST['recorrido'])) $evento->setRecorrido($_POST['recorrido']);*/
        if (isset($_POST['lugar'])) $evento->setLugar($_POST['lugar']);
        $evento->setFechahora(date("Y-m-d H:m:s",  mktime($_POST["hora"], $_POST["minuto"], 0, $_POST["mes"], $_POST["dia"], 2011)));
        if (isset($_POST['acompaniante'])&&($_POST['acompaniante']!="")) $evento->setAcompaniante($_POST['acompaniante']);
        if (isset($_POST['ministerio'])&&($_POST['ministerio']!="")) $evento->setMinisterio($_POST['ministerio']);
        if (isset($_POST['vamm'])) $evento->setVamm($_POST['vamm']);
        if ((isset($_POST["duracion"]))&&(is_numeric($_POST["duracion"]))&&($_POST["duracion"]>0)) $evento->setDuracion ($_POST["duracion"]);
        $insert_id=$evento->save();
        if($insert_id>0)
        {
            $alert = array (
                "action"=>"edit",
                "value"=>true,
                "id"=>$id
            );
            $_SESSION["alert"] = $alert;
        }
        else
        {
            $alert = array (
                "action"=>"edit",
                "value"=>false,
                "id"=>$id
            );
            $_SESSION["alert"] = $alert;
        }
    }
    break;
    case "new":
        $evento = new Evento();
        /*if (isset($_POST['recorrido'])) $evento->setRecorrido($_POST['recorrido']);*/
        if (isset($_POST['lugar'])) $evento->setLugar($_POST['lugar']);
        $evento->setFechahora(date("Y-m-d H:m:s",  mktime($_POST["hora"], $_POST["minuto"], 0, $_POST["mes"], $_POST["dia"], 2011)));
        if (isset($_POST['acompaniante'])&&($_POST['acompaniante']!="")) $evento->setAcompaniante($_POST['acompaniante']);
        if (isset($_POST['ministerio'])&&($_POST['ministerio']!="")) $evento->setMinisterio($_POST['ministerio']);
        if (isset($_POST['vamm'])) $evento->setVamm($_POST['vamm']);
        if ((isset($_POST["duracion"]))&&(is_numeric($_POST["duracion"]))&&($_POST["duracion"]>0)) $evento->setDuracion ($_POST["duracion"]);
        $insert_id=$evento->save();
        if($insert_id>0)
        {
            $alert = array (
                "action"=>"new",
                "value"=>true,
                "id"=>$insert_id
            );
        }
        else
        {
            $alert = array (
                "action"=>"new",
                "value"=>false,
                "id"=>0
            );
        }
        $_SESSION["alert"] = $alert;
    break;
    case "invite":
        if(isset($_POST["usuario"]))
        {
            for($i=0;$i<count($_POST["usuario"]);$i++)
            {
                $id = $_POST['usuario'][$i];
                $datos = array('usuario_id' => $id, 'evento_id' => $_POST['id']);
                execute_insert('usuario_evento',$datos);
                if((isset($_POST["usuario-$id"]))&&($_POST["usuario-$id"]=="Y"))
                {
                    /* ENVIAR MAIL */
                }
            }
        }
    break;
}
?>
<script type="text/javascript">
    document.location = "index.php";
</script>
