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
$usuario = new Usuario($id);
?>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">
<div id="page-heading"><h1><?if($id==0){echo "Nuevo $current";}else{echo "Editar $current";}?></h1></div>
<form action="actions.php" method="post" id="form" enctype="multipart/form-data">
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
                        <input type="text" name="nombre" value="<?=$usuario->nombre?>" class="inp-form" />
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">
                       Mail personal:
                    </th>
                    <td>
                        <input type="text" name="mailpersonal" value="<?=$usuario->mailpersonal?>" class="inp-form" />
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">
                       Mail Contacto:
                    </th>
                    <td>
                        <input type="text" name="mailcontacto" value="<?=$usuario->mailcontacto?>" class="inp-form" />
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">
                       Password:
                    </th>
                    <td>
                        <input type="password" name="password" value="" class="inp-form" />
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">
                      Repite Password:
                    </th>
                    <td>
                        <input id="passwordrepeat" type="password" name="passwordrepeat" value="" class="inp-form" />
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <?
                        $rubros = $usuario->getRubros();
                    ?>
                    <th valign="top">
                      Rubro:
                    </th>
                    <td>
                        <select name="rubro" class="styledselect_form_1">
                                <option value="">---</option>
                            <?
                            for($i = 0; $i<count($rubros);$i++)
                            {
                            ?>
                                <option <?if($usuario->rubro==$rubros[$i]->id){?>selected="selected"<?}?> value="<?=$rubros[$i]->id?>"><?=$rubros[$i]->nombre?></option>
                            <?
                            }
                            ?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">
                      Categoria:
                    </th>
                    <td>
                        <select name="categoria" class="styledselect_form_1">
                            <option <?if($usuario->categoria==0){?>selected="selected"<?}?> value="0">A</option>
                            <option <?if($usuario->categoria==1){?>selected="selected"<?}?> value="1">AA</option>
                            <option <?if($usuario->categoria==2){?>selected="selected"<?}?> value="2">AAA</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">
                      Tipo de usuario:
                    </th>
                    <td>
                        <select name="tipo" class="styledselect_form_1">
                            <option <?if($usuario->tipousuario==0){?>selected="selected"<?}?> value="0">Invitado</option>
                            <option <?if($usuario->tipousuario==1){?>selected="selected"<?}?> value="1">Ministerio</option>
                            <option <?if($usuario->tipousuario==2){?>selected="selected"<?}?> value="2">Administrador</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">
                      Ministerio:
                    </th>
                    <td>
                        <?
                            $ministerios = $usuario->getMinisterios();
                        ?>
                        <select name="ministerio" class="styledselect_form_1">
                            <option value="0">---</option>
                            <?
                            for ($i = 0;$i < count($ministerios);$i++){?>
                            <option <?if($usuario->ministerio==$ministerios[$i]->id){?>selected="selected"<?}?> value="<?=$ministerios[$i]->id?>"><?=$ministerios[$i]->nombre?></option>
                            <?}?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">
                       Mensaje:
                    </th>
                    <td>
                        <textarea rows="" name="mensaje" cols="" class="form-textarea"><?=$usuario->mensaje?></textarea>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td valign="top">
                            <input type="hidden" value="<?=$action?>" name="action" />
                            <input type="hidden" value="<?=$id?>" name="id" />
                            <input type="submit" value="Confirmar" id="submit" class="form-submit" />
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
<script type="text/javascript" src="<?=BACKEND_URL?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=BACKEND_URL?>js/additional-methods.js"></script>
<script type="text/javascript">
    $("#form").validate({
        rules:{
            nombre: "required",
            mailpersonal:{
                required:true,
                email:true
            },
            password:{
                required:true,
                equalTo: "#passwordrepeat",
                minlength: 8
            }
        }
    });
</script>
</div>
<!--  end content-outer -->
<?php
require_once '../footer.php';
?>