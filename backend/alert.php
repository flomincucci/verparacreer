<?
if (isset($_SESSION["alert"]))
{
    switch ($_SESSION["alert"]["value"])
    {
        case true:
        ?>
            <!--  start message-green -->
            <div id="message-green">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                    <td class="green-left">
                        <?php
                            echo $current;
                            switch ($_SESSION["alert"]["action"])
                            {
                                case "new":
                                ?>
                                agregado exitosamente
                                <?
                                break;
                                case "edit":
                                ?>
                                editado exitosamente
                                <?
                                break;
                                case "delete":
                                ?>
                                borrado exitosamente
                                <?
                                break;
                            }
                        ?>
                    </td>
                    <td class="green-right"><a class="close-green"><img src="<?=BACKEND_URL?>images/table/icon_close_green.gif"   alt="" /></a></td>
            </tr>
            </table>
            </div>
            <!--  end message-green -->
        <?
        break;
        default:
        ?>
            <!--  start message-red -->
            <div id="message-red">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td class="red-left">
                <?php
                    switch ($_SESSION["alert"]["action"])
                    {
                        case "new":
                        ?>
                        Error. <a href="form.php">Int&eacute;ntelo nuevamente.</a>
                        <?
                        break;
                        case "edit":
                        ?>
                        Error. <a href="form.php?id=<?=$_SESSION["alert"]["id"]?>">Int&eacute;ntelo nuevamente.</a>
                        <?
                        break;
                        case "delete":
                        ?>
                        Error (¿Tal vez est&aacute; relacionado?). <a href="actions.php?action=delete&amp;id=<?=$_SESSION["alert"]["id"]?>">Int&eacute;ntelo nuevamente.</a>
                        <?
                        break;
                    }
                ?>
                </td>
                <td class="red-right"><a class="close-red"><img src="<?=BACKEND_URL?>images/table/icon_close_red.gif"   alt="" /></a></td>
            </tr>
            </table>
            </div>
            <!--  end message-red -->
        <?
        break;
    }
?>
<!--  start message-red -->

<!--  end message-red -->


<?
unset($_SESSION["alert"]);
}
?>