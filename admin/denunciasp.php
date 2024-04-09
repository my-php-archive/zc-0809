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

include("menumas.php");
?>
		<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Lista de Denuncias Publicas</h3>
			</div>
			<div class="boxy-content">
		
<?php
	$_pagi_sql = "SELECT * FROM p_denuncias ORDER BY fecha DESC";
	$rs = mysql_query($_pagi_sql, $con);
	if(mysql_num_rows($rs)!=0){
?>	
		<table class="linksList">
		<thead>
			<tr>
				<th>Url:</th>
				<th>Denunciante:</th>
				<th>E-Mail:</th>
				<th>Causa:</th>
				<th>Comentarios:</th>
				<th>Fecha:</th>
				<th>Opciones:</th>
			</tr>
		</thead>
	<tbody>
		<tbody>
<?php
		$_pagi_cuantos = 30; 
		include("paginator.inc.php"); 
		while($row = mysql_fetch_array($_pagi_result)){
?>	
	<tr id="div_<?=$row['id']?>">
		<td style="text-align: left;"><a href="<?=$row['url'];?>"><?=$row['url'];?></a></td>
		<td><?=$row['nombre'];?></td>
		<td><?=$row['mail'];?></td>
		<td><span class="color_green"><?=$row['razon'];?></span></td>
		<td style="text-align: left;"><span class="color_red"><?=$row['comentarios'];?></span></td>
		<td><?php echo date("d.m.Y", date($row['fecha'])); ?> a las <?php echo date("H:m:s", date($row['fecha'])); ?> hs.</td>
		<td><a onclick="javascript:borrar_denunciapub('<?=$row['id']?>')"><img src="<?=$images?>/borrar.png" title="Quitar denuncia" alt="X"></a></td>
	</tr>
<?php
}}else{
echo'<div class="emptyData"> No Hay Denuncias Realizadas </div>';}
?>
</tbody>
		</tbody>
	</table>
</div>
		</div>
<div style="clear:both"></div>
<?php
pie();}
else{
include('../404.php');}
?>