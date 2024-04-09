<?php
include("../../header.php");
$titulo	=	$descripcion;
$kid	=	$_SESSION['id'];
$sql = "SELECT nick, rango FROM usuarios where id='".$kid."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);
$rango = $row['rango'];
$user = $row['nick'];
if($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755")
{
cabecera_normal();
include("menu.php");
?>
	<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Lista de Denuncias</h3>
		</div>
	<div class="boxy-content">
<?php
	$_pagi_sql = "SELECT * FROM c_denuncias ORDER BY id ASC ";
	$rs = mysql_query($_pagi_sql, $con);
	if (mysql_num_rows($rs)!=0)
	{
?>
		<table class="linksList">
		<thead>
			<tr>
				<th>Denunciante:</th>
				<th>Email:</th>
				<th>Tel&eacute;fono:</th>
				<th>Horario de contacto:</th>
				<th>Empresa:</th>
				<th>Url:</th>
				<th>Comentarios:</th>
				<th>Fecha:</th>
				<th>Opciones:</th>
			</tr>
		</thead>
	<tbody>
<?php

$_pagi_cuantos = 100; 
include("../paginator.inc.php"); 

while($row = mysql_fetch_array($_pagi_result)){

$id = $row['id'];
$nombre = $row['nombre'];
$email = $row['email'];
$telefono = $row['telefono'];
$horario = $row['horario'];
$empresa = $row['empresa'];
$twourl = $row['url'];
$comentarios = $row['comentarios'];
?>	
<tr id="div_<?=$id?>">
	<td><?=$nombre?></td>
	<td><?=$email?></td>
	<td><span class="color_blue"><?=$telefono?></span></td>
	<td><span class="color_green"><?=$horario?></span></td>
	<td><span class="color_red"><?=$comentarios?></span></td>
	<td><span class="color_green"><?=$twourl?></span></td>
	<td><?=$comentarios?></td>
	<td><?php echo date("d.m.Y", date($row['fecha'])); ?> a las <?php echo date("H:m:s", date($row['fecha'])); ?> hs.</td>
	<td><a onclick="javascript:borrar_denuncia_comunidad('<?=$id?>')" title="Borrar la Denuncia"><img src="<?=$images?>/borrar.png" align="absmiddle"></a></td>
</tr>
<?php
}
echo'</tbody>
	</table>';}else{echo'<div class="emptyData"> No hay comunidades denunciadas</div>';}
?>
	</div></div>
	<br clear="left" />
<?php
pie();
}else{
include('../../404.php');}
?>