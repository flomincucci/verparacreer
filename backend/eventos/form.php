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
$evento = new Evento($id);
$fecha = getdate(strtotime($evento->fechahora));
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
                <!--
                <tr>
                    <th valign="top">Recorrido:</th>
                    <td>
                        <select name="recorrido" class="select_sub">
                            <?
                                $recorrido = new Recorrido();
                                $recorridos = $recorrido->getAll();
                                for($i=0;$i<count($recorridos);$i++)
                                {
                                    ?>
                                    <option value="<?=$recorridos[$i]->id?>" <?if($recorridos[$i]->id==$evento->recorrido){?>selected<?}?> ><?=htmlentities($recorridos[$i]->nombre)?></option>
                                    <?
                                }
                            ?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                -->
                <tr>
                    <th valign="top">Lugar:</th>
                    <td>
                        <select name="lugar" class="select_sub">
                            <?
                                $lugar = new Lugar();
                                $lugares = $lugar->getAll();
                                var_dump($lugares);
                                for($i=0;$i<count($lugares);$i++)
                                {
                                    ?>
                            <option value="<?=$lugares[$i]->id?>" <?if($lugares[$i]->id==$evento->lugar){?>selected<?}?>><?=htmlentities($lugares[$i]->nombre)?></option>
                                    <?
                                }
                            ?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">Fecha:</th>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr align="center" valign="middle">
                            <td>
                                <select name="dia" class="styledselect-day">
                                    <?
                                        for($i=0;$i<32;$i++)
                                        {
                                            ?>
                                    <option value="<?=$i?>" <?if($i==$fecha["mday"]){?>selected<?}?>><?= str_pad($i,2,"0",STR_PAD_LEFT)?></option>
                                            <?
                                        }
                                    ?>
                                </select>
                            </td>
                            <td width="15">/</td>
                            <td>
                                <select name="mes" class="styledselect-day">
                                    <?
                                        for($i=0;$i<13;$i++)
                                        {
                                            ?>
                                            <option value="<?=$i?>" <?if($i==$fecha["mon"]){?>selected<?}?>><?= str_pad($i,2,"0",STR_PAD_LEFT)?></option>
                                            <?
                                        }
                                    ?>
                                </select>
                            </td>
                            <td width="50"></td>
                            <td>
                                <select name="hora" class="styledselect-day">
                                    <?
                                        for($i=0;$i<25;$i++)
                                        {
                                            ?>
                                            <option value="<?=$i?>" <?if($i==$fecha["hours"]){?>selected<?}?>><?= str_pad($i,2,"0",STR_PAD_LEFT)?></option>
                                            <?
                                        }
                                    ?>
                                </select>
                            </td>
                            <td width="15">:</td>
                            <td>
                                <select name="minuto" class="styledselect-day">
                                    <?
                                        for($i=0;$i<61;$i++)
                                        {
                                            ?>
                                            <option value="<?= str_pad($i,2,"0",STR_PAD_LEFT)?>" <?if($i==$fecha["minutes"]){?>selected<?}?>><?= str_pad($i,2,"0",STR_PAD_LEFT)?></option>
                                            <?
                                        }
                                    ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <th valign="top">Duraci&oacute;n:</th>
                    <td>
                        <input type="text" value="<?=$evento->duracion?>" name="duracion" />
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">Acompa&ntilde;ante:</th>
                    <td>
                        <select name="acompaniante" class="select_sub">
                            <option value="">---</option>
                            <?
                                $usuario = new Usuario();
                                $usuarios = $usuario->getAll();
                                for($i=0;$i<count($usuarios);$i++)
                                {
                                    ?>
                                    <option value="<?=$usuarios[$i]->id?>" <?if($usuarios[$i]->id==$evento->acompaniante){?>selected<?}?> ><?=htmlentities($usuarios[$i]->nombre)?></option>
                                    <?
                                }
                            ?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">Ministerio:</th>
                    <td>
                        <select name="ministerio" class="select_sub">
                            <option value="">---</option>
                            <?
                                $ministerio = new Ministerio();
                                $ministerios = $ministerio->getAll();
                                for($i=0;$i<count($ministerios);$i++)
                                {
                                    ?>
                                    <option value="<?=$ministerios[$i]->id?>" <?if($ministerios[$i]->id==$evento->ministerio){?>selected<?}?> ><?=htmlentities($ministerios[$i]->nombre)?></option>
                                    <?
                                }
                            ?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th valign="top">Va MM:</th>
                    <td>
                        <select name="vamm" class="select_sub">
                            <option value="0" <?if($evento->vamm== 0){?>selected<?}?> >No</option>
                            <option value="1" <?if($evento->vamm== 1){?>selected<?}?> >Si</option>
                        </select>
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
</div>
<!--  end content-outer -->
<script type="text/javascript">
    
    $(document).ready(function(){
        $("#form").submit(function(){
            var month = $("select[name='mes']").val();
            var day = $("select[name='dia']").val();
            if(isDate(month+"/"+day+"/2011"))
            {
                $(this).submit();
            }
            else
            {
                return false;
            }
            return false;
        });
    });
    /**
 * DHTML date validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */
// Declaring valid date character, minimum year and maximum year
var dtCh= "/";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   }
   return this
}

function isDate(dtStr){
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strMonth=dtStr.substring(0,pos1)
	var strDay=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth)
	day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
		alert("The date format should be : mm/dd/yyyy")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Por favor, ingrese un mes válido")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Por favor, ingrese un día válido")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Por favor, ingrese un valor de 4 dígitos entre "+minYear+" y "+maxYear)
		return false
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Por favor, ingrese una fecha correcta")
		return false
	}
return true
}
</script>
<?php
require_once '../footer.php';
?>