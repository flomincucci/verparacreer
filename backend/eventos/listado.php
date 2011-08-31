<?php
include_once "../system.php";
require_once '../header.php';
$id = 0;
$action = "new";
if(isset($_GET["id"]))
{
    $id = sanitize($_GET["id"]);
    $action = "invite";
}
$usuarios = Evento::getInvitados($id);
?>
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Listado de invitados</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">

			<!--  start table-content  -->
			<div id="table-content">
                                <?
                                require_once '../alert.php';
                                ?>
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
                                <th class="table-header-repeat line-left minwidth-1"><a>Nombre</a></th>
				</tr>
                                <?
                                for ($i=0;$i<count(($usuarios));$i++)
                                {
                                ?>
				<tr>
                                    <td>
                                    <?
                                        echo htmlentities($usuarios[$i]->nombre);
                                    ?>
                                    </td>
				</tr>
                                <?
                                }
                                ?>
				</table>
				<!--  end product-table................................... -->
				</form>
			</div>
			<!--  end content-table  -->

			<!--  start actions-box ............................................... -->
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
</div>
<!--  end content -->

</div>
<?php
require_once '../footer.php';
?>