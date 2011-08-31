<?php
require_once '../system.php';
switch ($_REQUEST["action"])
{
    case "delete":
    if(isset($_GET["id"]))
    {
        $id = sanitize($_GET["id"]);
        $usuario = Usuario::delete($id);
        $alert = array (
            "action"=>"delete",
            "value"=>$usuario,
            "id"=>$id
        );
        $_SESSION["alert"] = $alert;
    }
    break;
    case "edit":
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $usuario = new Usuario($id);
        if (isset($_POST['nombre'])) $usuario->setNombre($_POST['nombre']);
        if (isset($_POST['mailpersonal'])) $usuario->setMailPersonal($_POST['mailpersonal']);
        if (isset($_POST['mailcontacto'])) $usuario->setMailContacto($_POST['mailcontacto']);
        if (isset($_POST['password'])&&($_POST['password'])!="") $usuario->setPassword($_POST['password']);
        if (isset($_POST['rubro'])&&($_POST['rubro']!="")) $usuario->setRubro($_POST['rubro']);
        if (isset($_POST['categoria'])) $usuario->setCategoria($_POST['categoria']);
        if (isset($_POST['tipo'])) $usuario->setTipoUsuario($_POST['tipo']);
        if (isset($_POST['ministerio'])) $usuario->setMinisterio($_POST['ministerio']);
        if (isset($_POST['mensaje'])) $usuario->setMensaje($_POST['mensaje']);
        $insert_id = $usuario->save();
        if($insert_id>0)
        {
            execute_update("senias", array("usuario_id"=>$insert_id,"santoysenia"=>  base64_encode($_POST["password"])),"usuario_id=$insert_id");
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
        $usuario = new Usuario();
        if (isset($_POST['nombre'])) $usuario->setNombre($_POST['nombre']);
        if (isset($_POST['mailpersonal'])) $usuario->setMailPersonal($_POST['mailpersonal']);
        if (isset($_POST['mailcontacto'])) $usuario->setMailContacto($_POST['mailcontacto']);
        if (isset($_POST['password'])) $usuario->setPassword($_POST['password']);
        if (isset($_POST['rubro'])&&($_POST['rubro']!="")) $usuario->setRubro($_POST['rubro']);
        if (isset($_POST['categoria'])) $usuario->setCategoria($_POST['categoria']);
        if (isset($_POST['tipo'])) $usuario->setTipoUsuario($_POST['tipo']);
        if (isset($_POST['ministerio'])) $usuario->setMinisterio($_POST['ministerio']);
        $insert_id = $usuario->save();
        if($insert_id>0)
        {
            execute_insert("senias", array("usuario_id"=>$insert_id,"santoysenia"=>  base64_encode($_POST["password"])));
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
