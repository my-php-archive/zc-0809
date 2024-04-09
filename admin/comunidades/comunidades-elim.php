<?php
include('../../header.php');

$titulo	=	$descripcion;
$id_user	=	$_SESSION['id'];

$sql = "SELECT rango FROM usuarios where id='{$id_user}' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755"){
cabecera_normal();
include("menu.php");
?>
	<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Comunidades Eliminados</h3>
		</div>
	<div class="boxy-content">
		
<table class="linksList">
<thead>
<tr>
				<th>Comunidad:</th>
				<th>Acci&oacute;n:</th>
				<th>Opciones:</th>
</tr>
</thead>
<tbody>
<tbody>
<?php
$_pagi_sql	=	"SELECT c.*, u.nick FROM c_comunidades c, usuarios u
				 WHERE c.creadorid=u.id
			   	 AND c.eliminado='1'
				 ORDER BY c.fecha DESC";
		
$rs	=	mysql_query($_pagi_sql, $con);

$_pagi_cuantos = 30; 
include("../paginator.inc.php");

while ($row = mysql_fetch_array($_pagi_result)){

$idc	=	$row['idco'];
$mtitulo	=	$row['nombre'];
$shortn	=	$row['shortname'];
$autor	=	$row['nick'];
?>
<tr id="div_<?=$idc?>">
	<td style="text-align: left;"><a href="<?=$url?>/comunidades/<?=$shortn?>/" target="_blank"><?=$mtitulo?></a><br />Por <a href="/perfil/<?=$autor?>" target="_blank"><?=$autor?></a></td>
	<td><span class="color_red">Eliminado</span></td>
	<td><a id="change_status" onclick="javascript:reactivar_comunidad('<?=$idc?>')"><img src="<?=$images?>/reactivar.png" alt="Reactivar" title="Reactivar Comunidad" /></td>
</tr>
<?php
}
?>
</tbody>
		</tbody>
	</table>
		<center><?php echo "".$_pagi_navegacion."";?></center>

</div></div>

<br clear="left" />

<center>
<input onclick="javascript:com.borrar_comumod()" title="Borrar Comunidad" value="Borrar Comunidad" class="mBtn btnOk" type="button">
</center>
<?php
pie();
}else{
include('../../404.php');}
?>