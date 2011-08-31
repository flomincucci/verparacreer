<?php
require_once '../system.php';
switch ($_REQUEST["action"])
{
    case "delete":
    if(isset($_GET["id"]))
    {
        $id = sanitize($_GET["id"]);
        $recorrido = Recorrido::delete($id);
        $alert = array (
            "action"=>"delete",
            "value"=>$recorrido,
            "id"=>$id
        );
        $_SESSION["alert"] = $alert;
    }
    break;
    case "edit":
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $recorrido = new Recorrido($id);
        if (isset($_POST['nombre'])) $recorrido->setNombre($_POST['nombre']);
        if (isset($_POST['descripcion'])) $recorrido->setDescripcion($_POST['descripcion']);
        /*if (isset($_POST['mapa'])) $recorrido->setMapa($_POST['mapa']);*/
        /*if (isset($_POST['ubicacion'])) $recorrido->setUbicacion($_POST['ubicacion']);*/
        $insert_id = $recorrido->save();
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
        $id = $_POST["id"];
        $recorrido = new Recorrido();
        if (isset($_POST['nombre'])) $recorrido->setNombre($_POST['nombre']);
        if (isset($_POST['descripcion'])) $recorrido->setDescripcion($_POST['descripcion']);
        /*if (isset($_POST['mapa'])) $recorrido->setMapa($_POST['mapa']);*/
        /*if (isset($_POST['ubicacion'])) $recorrido->setUbicacion($_POST['ubicacion']);*/
        $insert_id = $recorrido->save();
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
}
?>
<script type="text/javascript">
    document.location = "index.php";
</script>
