<?php
require_once '../system.php';
switch ($_REQUEST["action"])
{
    case "delete":
    if(isset($_GET["id"]))
    {
        $id = sanitize($_GET["id"]);
        $lugar = Lugar::delete($id);
        $alert = array (
            "action"=>"delete",
            "value"=>$lugar,
            "id"=>$id
        );
        $_SESSION["alert"] = $alert;
    }
    break;
    case "edit":
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $lugar = new Lugar($id);
        if (isset($_POST['nombre'])) $lugar->setNombre($_POST['nombre']);
        if (isset($_POST['descripcion'])) $lugar->setDescripcion($_POST['descripcion']);
        if (isset($_FILES['imagen'])){if(($_FILES['imagen']["name"]!="")){$name = $id."_".time().".jpg";move_uploaded_file($_FILES['imagen']['tmp_name'], UPLOAD_PATH."$name");$lugar->setImagen($name);}};
        if (isset($_POST['coordenadas'])) $lugar->setCoordenadas($_POST['coordenadas']);
        $insert_id = $lugar->save();
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
        $lugar = new Lugar();
        if (isset($_POST['nombre'])) $lugar->setNombre($_POST['nombre']);
        if (isset($_POST['descripcion'])) $lugar->setDescripcion($_POST['descripcion']);
        if (isset($_POST['coordenadas'])) $lugar->setCoordenadas($_POST['coordenadas']);
        $insert_id = $lugar->save();
        if($insert_id>0)
        {
            $lugar = new Lugar($insert_id);
            if (isset($_FILES['imagen'])){if(($_FILES['imagen']["name"]!="")){$name = $id."_".time().".jpg";move_uploaded_file($_FILES['imagen']['tmp_name'], UPLOAD_PATH."$name");$lugar->setImagen($name);$insert_id = $lugar->save();}};
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
