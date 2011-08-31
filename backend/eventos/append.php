<?php
include("../system.php");
if(isset($_REQUEST["id"]))
{
    $id = $_REQUEST["id"];
    $usuario = new Usuario($id);
    ?>
    <tr>
        <th valign="top"><?=$usuario->nombre?>:</th>
        <td>
            <input type="checkbox" value="<?=$usuario->id?>" name="usuario[]" />
        </td>
        <td>
            <input type="checkbox" value="Y" name="usuario-<?=$usuario->id?>" />
        </td>
    </tr>
    <tr id="replacewith"><td></td></tr>
    <?
}
else
{
    ?>
    0
    <?
}
?>
