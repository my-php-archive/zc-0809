<?php
include('../header.php');

$id = $_SESSION['id'];

$sql = "SELECT nick, rango FROM usuarios where id='".$id."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="255"){

$titulo	=	$descripcion;
cabecera_normal();

include('menumas.php');
echo'
		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Lista De Webs Amigas</h3>

				<span class="icon-noti post-n"></span>
			</div>
			<div class="boxy-content">';

$_pagi_sql = "select * from webs_amigas $cadena order by id asc ";
$rs = mysql_query($_pagi_sql,$con);
if(mysql_num_rows($rs)!=0){
echo'<table class="linksList">
<thead>
<tr>
<th>ID:</th>
<th>Nombre del Sitio:</th>
<th>URL del Sitio:</th>
<th>Icono del Sitio:</th>
<th>Opciones:</th>
</tr>
</thead>
<tbody>';

$_pagi_cuantos = 10;
include("paginator.inc.php");

while($row = mysql_fetch_array($_pagi_result)){

$webid = $row['id'];
$webname = $row['nombre'];
$weburl = $row['url'];
$webicon = $row['icono'];
echo'
<tr id="div_'.$row['id'].'">
<td>'.$row['id'].'</td>
<td><a href="'.$row['url'].'" title"'.$row['nombre'].'" >'.$row['nombre'].'</a></td>
<td><a href="'.$row['url'].'" title"'.$row['nombre'].'" >'.$row['url'].'</a></td>
<td><a href="'.$row['url'].'" title="'.$row['nombre'].'"><img src="'.$row['icono'].'" width="16" height="16" border="0"></a></td>
<td><a onclick="javascript:web_quitar(\''.$row['id'].'\')"><img src="'.$images.'/borrar.png" title="Quitar Web Amiga" alt="X"></td>
</tr>';}
echo'</tbody></table>';}
else{echo'
<div class="emptyData">No hay webs amigas agregadas a&uacute;n</div>';}
?>
<center><?php echo "".$_pagi_navegacion."";?></center>

	</div>
		</div>
<br clear="left" />

<center>
<input onclick="javascript:com.agregar_web()" title="Agregar Web Amiga" value="Agregar Web Amiga" class="mBtn btnOk" type="button">
</center>
<div style="clear:both"></div>
<?php
pie();}
else{
include('../404.php');}
?>