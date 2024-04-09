<?php
include("../header.php");

$id	=	$_SESSION['id'];

$sql = "SELECT nick, rango FROM usuarios where id='".$id."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755"){
$titulo	=	$descripcion;
cabecera_normal();

include("menu.php");
?>
	<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Lista de Denuncias</h3>
		</div>
	<div class="boxy-content">
<?php
	$_pagi_sql = "SELECT d.*, p.*, d.id as deid, h.*, u.id, u.nick FROM (denuncias as d, posts as p, categorias as h, usuarios as u) WHERE p.id=d.id_post and p.categoria=h.id_categoria and p.id_autor=u.id ORDER BY d.id ASC ";
	$rs = mysql_query($_pagi_sql, $con);
	if (mysql_num_rows($rs)!=0){
?>
		<table class="linksList">
		<thead>
			<tr>
			    <th>ID:</th>
				<th>Post ID:</th>
				<th>Post:</th>
				<th>Denunciante:</th>
				<th>Causa:</th>
				<th>Comentarios:</th>
				<th>Fecha:</th>
				<th>Opciones:</th>
			</tr>
		</thead>
	<tbody>
		<tbody>
<?php
		$_pagi_cuantos = 100; 
		include("paginator.inc.php"); 
		while($row = mysql_fetch_array($_pagi_result)){
					$id_post = $row['id_post'];
					$razon = $row['razon'];
					$autor = $row['autor'];
					$cuerpo = $row['cuerpo'];
					$fecha = $row['fecha'];
					$ptitulo = $row['titulo'];
					$pcategoria = $row['link_categoria'];
?>	
	<tr id="div_<?=$row['deid']?>">
	    <td><?=$row['deid'];?></td>
		<td><?echo $id_post; ?></td>
		<td><a href="/posts/<?echo $pcategoria; ?>/<?echo $id_post; ?>/<?=corregir($ptitulo).".html";?>"><?php echo $ptitulo; ?></a></td>
		<td><a href="/perfil/<?=$autor?>"><?=$autor?></a></td>
		<td><span class="color_green"><?echo denuncias($razon)?></span></td>
		<td><span class="color_red"><?=$cuerpo?></span></td>
		<td><?php echo date("d.m.Y", date($row['fecha'])); ?> a las <?php echo date("H:m:s", date($row['fecha'])); ?> hs.</td>
		<td><a onclick="javascript:com.acept_denuncia()" title="Aceptar Denuncia"><img src="<?=$images?>/acept.gif" align="absmiddle"></a> <img src="<?=$images?>/d-opt.gif"> 
<a onclick="javascript:com.rech_denuncia()" title="Rechazar Denuncia"><img src="<?=$images?>/rechazar.png" align="absmiddle"></a> <img src="<?=$images?>/d-opt.gif"> 
<a id="change_status" onclick="javascript:borrar_denuncia('<?=$row['deid']?>')" title="Borrar la Denuncia"><img src="<?=$images?>/borrar.png" align="absmiddle"></a></td>
	</tr>
<?php
		}
echo'</tbody>
		</tbody>
	</table>';}else{echo'<div class="emptyData"> No hay denuncias realizadas </div>';}
?>
	</div></div>
	<br clear="left" />
<?php
pie();}
else{
include('../404.php');}
?>