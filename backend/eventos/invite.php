<?php
include_once "../system.php";
require_once '../header.php';
$id = 0;
if(isset($_GET["id"]))
{
    $id = sanitize($_GET["id"]);
    $action = "invite";
}
$evento = new Evento($id);
?>
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">
<div id="page-heading"><h1><?="Invitar $current";?></h1></div>
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
            <table border="0" cellpadding="0" cellspacing="0" width="80%"  id="id-form">
                
                <tr>
                    <th valign="top">Buscar:</th>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0">
                        <tr align="center" valign="middle">
                            <td>
                                <input class="" type="text" id="autocomplete" value="" />
                                <script type="text/javascript">
                                    function checkarray(array,id)
                                    {
                                        for(var i=0;i<array.length;i++){
                                            if(id==array[i])
                                            {
                                                return false;
                                            }
                                        }
                                        return true;
                                    }
                                    var ids = new Array();
                                    function formatresult(row){
                                        return row[1];
                                    }
                                    function formatitem(row){
                                        return row[1];
                                    }
                                    $("#autocomplete").autocomplete("search.php", {
                                        width: 260,
                                        selectFirst: true,
                                        extraParams:{
                                            id:function(){
                                                return <?=$id?>
                                            }
                                        },
                                        formatResult:formatresult,
                                        formatItem:formatitem
                                    }).result(function (evt, data, formatted){
                                        $("#iduser").val(data[0]);
                                    });
                                    $(document).ready(function(){
                                        $("#search").click(function(e){
                                            var id = $("#iduser").val();
                                            if(id!=""){
                                                if(checkarray(ids,id)){
                                                    ids[ids.length] = id;
                                                    $.ajax(
                                                    {
                                                            contentType: "application/x-www-form-urlencoded",
                                                            type: "POST",
                                                            url: "append.php",
                                                            data: "id="+id+"",
                                                            success: function(datos)
                                                            {
                                                                if(datos!="0")
                                                                {
                                                                    $("#replacewith").replaceWith(datos);
                                                                }
                                                            }
                                                    });
                                                    $("#iduser").val("");
                                                }
                                                else
                                                {
                                                    alert("El elemento ya se encuentra en la lista");
                                                }
                                            }
                                            e.preventDefault();
                                        });
                                        $("#ministerio,#rubro").change(function(){
                                            $(".filtered").remove();
                                            var id = $(this).val();
                                            var tipo = $(this).attr("id");
                                            $.ajax(
                                            {
                                                    contentType: "application/x-www-form-urlencoded",
                                                    type: "POST",
                                                    url: "filtro.php",
                                                    data: "id="+id+"&tipo="+tipo+"",
                                                    success: function(datos)
                                                    {
                                                        if(datos!="0")
                                                        {
                                                            $("#filterreplace").replaceWith(datos);
                                                        }
                                                    }
                                            });
                                        });
                                        $(".adduser").live("click",function(e){
                                            var id = $(this).attr("title");
                                            if(checkarray(ids,id)){
                                                ids[ids.length] = id;
                                                $.ajax(
                                                {
                                                        contentType: "application/x-www-form-urlencoded",
                                                        type: "POST",
                                                        url: "append.php",
                                                        data: "id="+id+"",
                                                        success: function(datos)
                                                        {
                                                            if(datos!="0")
                                                            {
                                                                $("#replacewith").replaceWith(datos);
                                                            }
                                                        }
                                                });
                                            }
                                            else
                                            {
                                                alert("El elemento ya se encuentra en la lista");
                                            }
                                            $(this).parent("td").parent("tr").remove();
                                            e.preventDefault();
                                        });
                                        $("#close").live("click",function(){
                                            $(".filtered").remove();
                                        });
                                    });
                            </script>
                            </td>
                            <td width="50"></td>
                            <td>
                                <?
                                $ministerio = new Ministerio();
                                $ministerios = $ministerio->getAll();
                                ?>
                                <select id="ministerio" class="">
                                    <option value="">Ministerio: </option>
                                    <?
                                        for($i=0;$i<count($ministerios);$i++)
                                        {
                                            ?>
                                            <option value="<?=$ministerios[$i]->id?>"><?= $ministerios[$i]->nombre ?></option>
                                            <?
                                        }
                                    ?>
                                </select>
                            </td>
                            <td width="50"><input type="hidden" id="iduser" /></td>
                            <td>
                            <?
                                $rubro = new Rubro();
                                $rubros = $rubro->getAll();
                                ?>
                                <select id="rubro" class="">
                                    <option value="">Rubro: </option>
                                    <?
                                        for($i=0;$i<count($rubros);$i++)
                                        {
                                            ?>
                                            <option value="<?=$rubros[$i]->id?>"><?= $rubros[$i]->nombre ?></option>
                                            <?
                                        }
                                    ?>
                                </select>
                            </td>
                            <td width="50">&nbsp;</td>
                            <td>
                                <a href="#" id="search">Buscar</a>
                            </td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="message-green">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="green-left">Para agregar solo por el campo de texto, busque el nombre y luego haga click en "+". Para buscar por Ministerio o Rubro, solo seleccione la lista y debajo filtrar&aacute; los usuarios.</td>
                                        <td class="green-right"><a class="close-green"><img src="<?=BACKEND_URL?>images/table/icon_close_green.gif"   alt="" /></a></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <hr />
                    </td>
                </tr>
                    <tr id="filterreplace">
                        <td></td>
                    </tr>
                <tr>
                    <td colspan="3">
                        <hr />
                    </td>
                </tr>
                    <tr>
                        <td>
                            <h4>Listado de usuarios invitados:</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            &nbsp;
                        </th>
                        <th>
                            &nbsp;
                        </th>
                        <th>
                            No enviar mail
                        </th>
                    </tr>
                    <tr id="replacewith"><td></td></tr>
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
</div>
<!--  end content-outer -->
<?php
require_once '../footer.php';
?>