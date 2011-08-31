<?php
require_once '../system.php';
switch ($_REQUEST["action"])
{
    case "delete":
    if(isset($_GET["id"]))
    {
        $id = sanitize($_GET["id"]);
        $rubro = Rubro::delete($id);
        $alert = array (
            "action"=>"delete",
            "value"=>$rubro,
            "id"=>$id
        );
        $_SESSION["alert"] = $alert;
    }
    break;
    case "edit":
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $rubro = new Rubro($id);
        if (isset($_POST['nombre'])) $rubro->setNombre($_POST['nombre']);
        if (isset($_POST['descripcion'])) $rubro->setMensaje($_POST['descripcion']);
        $insert_id = $rubro->save();
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
        $rubro = new Rubro();
        if (isset($_POST['nombre'])) $rubro->setNombre($_POST['nombre']);
        if (isset($_POST['descripcion'])) $rubro->setMensaje($_POST['descripcion']);
        $insert_id = $rubro->save();
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
