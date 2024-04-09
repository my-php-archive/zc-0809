<?php
include('../header.php');

$id = $_SESSION['id'];

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
		<h3>Posts Eliminados</h3>
		</div>
	<div class="boxy-content">
		
<table class="linksList">
<thead>
<tr>
				<th>Post:</th>
				<th>Acci&oacute;n:</th>
				<th>Moderador:</th>
				<th>Causa:</th>
				<th>Opciones:</th>
</tr>
</thead>
<tbody>
<?php
$_pagi_sql	=	"SELECT pe.accion, pe.id_modera, pe.id_post, pe.causa, pe.fecha, po.id AS idp, po.titulo, po.id_autor, po.categoria, us.id as idu , us.nick as moderador, ue.id AS autor_id, ue.nick, ue.rango AS a_rango, c.id_categoria, c.link_categoria, c.nom_categoria
		FROM (posts_eliminados AS pe, posts AS po, usuarios AS us, categorias AS c, usuarios AS ue)
		WHERE pe.id_modera=us.id
		AND po.id_autor=ue.id
		AND pe.id_post=po.id
		AND pe.accion=1
		AND po.categoria=c.id_categoria
		ORDER BY pe.id desc";
		
$rs	=	mysql_query($_pagi_sql, $con) or die( "Error en query: $_pagi_sql, el error  es: " . mysql_error() );

$_pagi_cuantos = 30; 
include("paginator.inc.php");

while ($row=mysql_fetch_array($_pagi_result)){
$mtitulo	=	$row['titulo'];
$idp	=	$row['idp'];
$causa	=	$row['causa'];
$moderador	=	$row['moderador'];
$causa	=	$row['causa'];
$autor	=	$row['nick'];
$a_rango	=	$row['a_rango'];
$autor_id	=	$row['autor_id'];
$accion	=	$row['accion'];
?>
<tr id="div_<?=$idp?>">
	<td style="text-align: left;"><a href="<?=$url?>/posts/cualquiera/<?=$idp?>/<?=corregir($mtitulo)?>.html" target="_blank"><?=$mtitulo?></a><br />Por <a href="/perfil/<?=$autor?>" target="_blank"><?=$autor?></a></td>
	<td><?=historial($accion)?></td>
	<td><?=$moderador?></td>
	<td><?php if($causa==""){ echo "-"; } else {echo $causa;}?></td>
	<td><a id="change_status" onclick="javascript:reactivar_post('<?=$idp?>')"><img src="<?=$images?>/reactivar.png" alt="Reactivar" title="Reactivar Post" /></td>
</tr>
<?php
}
?>
</tbody>
	</table>
		<center><?php echo "".$_pagi_navegacion."";?></center>

</div></div>

<br clear="left" />

<center>
<input onclick="javascript:com.borrar_postmod()" title="Borrar Post" value="Borrar Post" class="mBtn btnOk" type="button">
</center>
<?php
pie();
}else{
include('../404.php');}
?>