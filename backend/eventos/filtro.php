<?php
include("../system.php");
if(isset($_REQUEST["id"])&&($_REQUEST["id"]!=""))
{
    switch($_REQUEST["tipo"])
    {
        case "ministerio":
        $id = $_REQUEST["id"];
        $usuario = new Usuario();
        $usuarios = $usuario->getUsuarioPorMinisterio($id);
        ?>
            <tr class="filtered">
                <td></td>
                <td></td>
                <td><a href="javascript:void(0)" id="close">Cerrar</a></td>
            </tr>
        <?
        for($i=0;$i<count($usuarios);$i++)
        {
            ?>
            <tr class="filtered">
                <td valign="top">
                    <a href="javascript:void(0);" class="adduser" title="<?=$usuarios[$i]->id?>">
                        <?=$usuarios[$i]->nombre?>
                    </a>
                </td>
                <td>

                </td>
                <td>

                </td>
            </tr>
            <?
        }
        break;
        case "rubro":
        $id = $_REQUEST["id"];
        $usuario = new Usuario();
        $usuarios = $usuario->getUsuarioPorRubro($id);
        ?>
            <tr class="filtered">
                <td></td>
                <td></td>
                <td><a href="javascript:void(0)" id="close">Cerrar</a></td>
            </tr>
        <?
        for($i=0;$i<count($usuarios);$i++)
        {
            ?>
            <tr class="filtered">
                <td valign="top">
                    <a href="javascript:void(0);" class="adduser" title="<?=$usuarios[$i]->id?>">
                        <?=$usuarios[$i]->nombre?>
                    </a>
                </td>
                <td>

                </td>
                <td>

                </td>
            </tr>
            <?
        }
        break;
    }
}
else
{
    ?>
    0
    <?
}
?>
<tr id="filterreplace"></tr>