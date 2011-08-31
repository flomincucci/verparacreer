<?php
include_once "../system.php";
require_once '../header.php';
$id = 0;
$action = "new";
if(isset($_GET["id"]))
{
    $id = sanitize($_GET["id"]);
    $action = "edit";
}
$lugar = new Lugar($id);
?>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">
<div id="page-heading"><h1><?if($id==0){echo "Nuevo $current";}else{echo "Editar $current";}?></h1></div>
<form action="actions.php" method="post" enctype="multipart/form-data">
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
    <tr>
            <th rowspan="3" class="sized"><img src="<?=BACKEND_URL?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
            <th class="topleft"></th>
            <td id="tbl-border-top">&nbsp;</td>
            <th class="topright"></th>
            <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
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
                    <th valign="top">Nombre:</th>
                    <td>
                        <input type="text" name="nombre" value="<?=htmlentities($lugar->nombre)?>" class="inp-form" />
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">
                       Descripcion:
                    </th>
                    <td>
                        <textarea rows="" name="descripcion" cols="" class="form-textarea"><?=htmlentities($lugar->descripcion)?></textarea>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">Coordenadas:</th>
                    <td>
                        <input type="text" name="coordenadas" value="<?=htmlentities($lugar->coordenadas)?>" class="inp-form" />
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">Im&aacute;gen:</th>
                    <td>
                        <input type="file" name="imagen" class="file_1" />
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td valign="top">
                            <input type="hidden" value="<?=$action?>" name="action" />
                            <input type="hidden" value="<?=$id?>" name="id" />
                            <input type="submit" value="Confirmar" class="form-submit" />
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