<?php
include('../header.php');

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755")
{

$titulo	=	$descripcion;
cabecera_normal();
echo'<script src="'.$images.'/images/js/es/admin.js?5.7" type="text/javascript"></script>
<div id="cuerpocontainer">
<center>
<img src="'.$images.'/images/admin.png" align="absmiddle" vspace="2">
</center>';
include("menu2.php");
echo"
		<div class='boxy xtralarge2'>
			<div class='boxy-title'>
				<h3>Lista de Comunidades Suspendidas</h3>

				<span class='icon-noti'></span>
			</div>
			<div class='boxy-content'>";
?>


		<table class="linksList">
		<thead>
			<tr>
				<th>Comunidad:</th>
				<th>Tipo:</th>
				<th>Fecha De Creacion:</th>
				<th>No. Miembros:</th>
				<th>No. Temas:</th>
				<th>Opciones:</th>
			</tr>
		</thead>
	<tbody>
		<tbody>
<?php
	$_pagi_sql = "SELECT * FROM c_comunidades WHERE eliminado=1 order by idco desc ";
	$rs = mysql_query($_pagi_sql,$con);
	
$_pagi_cuantos = 6; 
include("paginator.inc.php"); 
while($row = mysql_fetch_array($_pagi_result))
{
		$nick = $row['nombre'];
		$causa = $row['oficial'];
		$fecha = $row['fecha'];
		$moderador = $row['numm'];
		$fecha1 = $row['numte'];
?>
	<tr id="div_<?=$nick?>">
		<td><?=$nick?></td>
		<td><?=$fecha?></td>
		<td style="text-align: left;"><span class="color_red"></span></td>
		<td><?=$moderador?></td>
		<td><?=$fecha1?><br /><?=$fecha2?></td>
		<td>
		<a id="change_status" href="javascript:desbanear_usuario('<?=$nick?>')"><img src="<?=$url?>/images/reactivar.png" alt="Desbanear" title="Desbanear Usuario" /></a>
		</td>
   </tr>
<?php
}
mysql_close();
?>
</tbody>
		</tbody>
	</table>
		<center><?php echo "".$_pagi_navegacion."";?></center>
<br/>
<br/>
<center>
<input onclick="javascript:com.banear_usuario()" title="Suspender Comunidad" value="Suspender Comunidad" class="mBtn btnOk" type="button">
</center>
</div>
		</div></div>
<div style=\"clear:both\"></div>
<style>
.boxy {
	background: #FFF;
	border: 1px solid #CCC;
	-moz-box-shadow: 0 0 5px #CCC;
	-webkit-box-shadow: 0 0 5px #CCC
}
.boxy a {
	color: #0f0fb4;
	font-weight: bold;
}
.boxy a.selected {
	background-color:#0F0FB4;
	color:#FFFFFF;
	display:block;

	margin:3px 0;
	padding:3px;
}
.boxy-title {
	background: #d9d9d9 url('<?=$images?>/images/bg-title-boxy.gif') repeat-x top left;
	padding: 10px;
	border-bottom: #bdbdbd 1px solid;
	position: relative;
}
.boxy-title h3 {
	margin: 0;
	text-shadow: #f4f4f4  0 1px 0;
	font-size:13px;
}

.boxy-title span.icon-noti {
	background-image:url('<?=$images?>/images/sprite-notification.png');
	display:block;
	float:right;
	height:16px;
	position:absolute;
	right:9px;
	top:8px;
	width:16px;
}

.boxy-content {
	padding: 12px;
}
.boxy select {
	width: 125px;
}
.boxy h4 {
	color: #FF6600;
	margin: 0 0 5px 0;
	font-size: 14px;
}
.boxy hr {
	border-top: dashed 1px #CCC;
	background: #FFF;
	margin: 10px 0;
}
.xtralarge2 {
	width: 702px;
	margin: 0 5px 10px 0px;
	float: left;
}
.xtralarge ol {
	padding-left:30px;
	margin:0;
	list-style-image:none;
	list-style-position:outside!important;
	list-style-type:decimal;
	position:relative;
}

.xtralarge .categoriaPost, .xtralarge .categoriaUsuario, .xtralarge .categoriaCom {
	font-size: 12px;
	list-style-image:none;
	list-style-position:outside!important;
	list-style-type:decimal;	
	font-weight: bold;
	margin-bottom: 3px;
	display:list-item;
	position:relative;
	border:none;
	height:16px
}

.xtralarge .categoriaCom {
	padding: 3px;
}

.xtralarge .categoriaPost {
	margin-bottom: 0;
	_list-style:none
}

.xtralarge .categoriaPost:hover {
	background-color:none!important;
}



.xtralarge .categoriaPost a, .xtralarge .categoriaUsuario a, .xtralarge .categoriaCom a {
	font-size: 12px;
	font-weight: bold;
	width:250px;
	height:16px;
	overflow:hidden;
	margin:0;
	display:block;
	padding:0
	height:auto!important;
	position:absolute;
	float:none;
}

.xtralarge .categoriaPost span, .xtralarge .categoriaUsuario span, .xtralarge .categoriaCom span {
	font-weight: normal;
	color: #999;
	position:absolute;
	right:0;
	top:0
}

.xtralarge .categoriaUsuario  {
	padding:3px;
}

 .xtralarge .categoriaUsuario a {
 	left: 25px;
 	top:3px;
 	height:16px;
 }

.xtralarge .categoriaCom {
	height:13px;
}

.xtralarge .categoriaCom .titletema {
	margin:0
}
.xtralarge .categoriaUsuario img {

	vertica-align:middle;
	padding:1px;
	border:1px solid #EEE;
	display:block;
	margin-right:5px;
	position:absolute;	
}

.boxy-title .popular-n { background-position:0 -240px; }
.boxy-title .votada-n { background-position:0 -261px; }


</style>
<?php
}
pie();
?>