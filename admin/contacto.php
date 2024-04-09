<?php
include("../header.php");

$id	=	$_SESSION['id'];

$sql = "SELECT nick, rango FROM usuarios where id='".$id."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="255" or $rango=="655" or $rango=="755"){
$titulo	=	$descripcion;
cabecera_normal();

	$_pagi_sql = "SELECT * FROM contacto ORDER BY fecha DESC ";
	$rs = mysql_query($_pagi_sql, $con);

include("menumas.php");
?>

		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Lista De Contactantes</h3>

				<span class="icon-noti follow-n"></span>
			</div>
			<div class="boxy-content">
<?php
if (mysql_num_rows($rs)!=0){
?>
		<table class="linksList">
		<thead>
			<tr>
				<th>Nombre:</th>
				<th>E-Mail:</th>
				<th>Empresa:</th>
				<th>Telefono:</th>
				<th>Horarios:</th>
				<th>Comentarios:</th>
				<th>Fecha:</th>
				<th>Opciones:</th>
			</tr>
	</thead>
	<tbody>
<?php
		$_pagi_cuantos = 30; 
		include("paginator.inc.php"); 
		while($row = mysql_fetch_array($_pagi_result))
		{
?>	
	<tr id="div_<?=$row['id']?>">
		<td><?=$row['nombre'];?></a></td>
		<td><?=$row['mail'];?></td>
		<td><?=$row['empresa'];?></td>
		<td><?=$row['telefono'];?></td>
		<td><?=$row['horario'];?></td>
		<td><span class="color_red"><?=$row['comentarios'];?></span></td>
		<td><span class="color_green"><?=$row['fecha'];?></span></td>
		<td><a onclick="javascript:borrar_contactante('<?=$row['id']?>')"><img src="<?=$images?>/borrar.png" title="Quitar contactante" alt="X"></a></td>
	</tr>
<?php
}
?>
</tbody>
	</table>
<?php
}else{echo'<div class="emptyData">No hay nada</div>';}
?>
	</div>
		</div>
<div style="clear:both"></div>
<?php
pie();}
else{
include('../404.php');}
?>