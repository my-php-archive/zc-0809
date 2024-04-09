<?php
include('../header.php');

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){

$titulo	=	$descripcion;
cabecera_normal();

include("menu.php");
?>
	<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Lista de Usuarios Supendidos</h3>
		</div>
	<div class="boxy-content">
		
		
		<table class="linksList">
		<thead>
			<tr>
				<th>Usuario:</th>
				<th>Suspendido por:</th>
				<th>Raz&oacute;n:</th>
				<th>Fecha:</th>
				<th>Opciones:</th>
			</tr>
		</thead>
	<tbody>
		<tbody>
<?php
	$_pagi_sql = "SELECT * FROM suspendidos where activo='1' order by id desc ";
	$rs = mysql_query($_pagi_sql,$con);
	
$_pagi_cuantos = 30; 
include("paginator.inc.php");

while($row = mysql_fetch_array($_pagi_result))
{
		$nick = $row['nick'];
		$causa = $row['causa'];
		$moderador = $row['modera'];
		$fecha1 = $row['fecha1'];
		$tiempo = $row['tiempo'];
?>
	<tr id="div_<?=$nick?>">
		<td><a href="/perfil/<?=$nick?>"><?=$nick?></a></td>
		<td><a href="/perfil/<?=$moderador?>"><?=$moderador?></a></td>
		<td style="text-align: left;"><span class="color_red"><?=$causa?></span></td>
		<td>Inicia:<br /><?=$fecha1?><br />Termina:<br /><?=$tiempo?></td>
		<td>
		<a id="change_status" onclick="javascript:desbanear_usuario('<?=$nick?>')"><img src="<?=$images?>/reactivar.png" alt="Desbanear" title="Desbanear Usuario" /></a>
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

	</div></div>
	<br clear="left" />

<center>
<input onclick="javascript:com.banear_usuario()" title="Suspender Usuario" value="Suspender Usuario" class="mBtn btnOk" type="button">
</center>
<?php
pie();
}else{
include('../404.php');}
?>