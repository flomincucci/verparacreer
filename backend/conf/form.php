<?php
include_once "../system.php";
require_once '../header.php';
?>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">
<div id="page-heading"><h1><?=$current?></h1></div>

<form action="actions.php" method="post" id="form" enctype="multipart/form-data">
    <div id="message-green">
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr>
            <td class="green-left">El texto debe tener un '%s' que luego sera reemplazado por el nombre.</td>
            <td class="green-right"><a class="close-green"><img src="<?=BACKEND_URL?>images/table/icon_close_green.gif"   alt="" /></a></td>
    </tr>
    </table>
    </div>
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
    <tr>
            <th rowspan="3" class="sized"><img src="<?=BACKEND_URL?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
            <th class="topleft"></th>
            <td id="tbl-border-top">&nbsp;</td>
            <th class="topright"></th>
            <th rowspan="3" class="sized"><img src="<?=BACKEND_URL?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
    </tr>
    <tr>
            <td id="tbl-border-left"></td>
            <td>
            <!--  start content-table-inner -->
            <div id="content-table-inner">

            <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
            <td>
            <!-- start id-form -->
            <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                <tr>
                    <th valign="top">Mensaje del mail:</th>
                    <td>
                        <textarea cols="" rows="" class="form-textarea" name="mensaje_mail"><?$columns = array("*");$array = execute_select("conf", $columns ,"clave='mensaje_mail'");if(isset($array[0]))echo $array[0]["valor"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <th valign="top">Mensaje de bienvenida:</th>
                    <td>
                        <textarea cols="" rows="" class="form-textarea" name="mensaje_bienvenida"><?$columns = array("*");$array = execute_select("conf", $columns ,"clave='mensaje_bienvenida'");if(isset($array[0]))echo $array[0]["valor"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <th valign="top">Mensaje de confirmaci&oacute;n:</th>
                    <td>
                        <textarea cols="" rows="" class="form-textarea" name="mensaje_confirmacion"><?$columns = array("*");$array = execute_select("conf", $columns ,"clave='mensaje_confirmacion'");if(isset($array[0]))echo $array[0]["valor"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td valign="top">
                            <input type="submit" value="Confirmar" name="post" id="submit" class="form-submit" />
                            <input type="reset" value="Reset" class="form-reset"  />
                    </td>
                    <td></td>
                </tr>
            </table>
            <!-- end id-form  -->
            </td>
    </tr>
    <tr>
    <td><img src="<?=BACKEND_URL?>images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
    <td></td>
    </tr>
    </table>
    </div>
    <!--  end content-table-inner  -->
    </td>
    <td id="tbl-border-right"></td>
    </tr>
    <tr>
            <th class="sized bottomleft"></th>
            <td id="tbl-border-bottom">&nbsp;</td>
            <th class="sized bottomright"></th>
    </tr>
    </table>
</form>
</div>
<!--  end content -->
</div>
<!--  end content-outer -->
<?php
require_once '../footer.php';
?>