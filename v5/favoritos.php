<?php
include("header.php");
$titulo	=	$descripcion;
$id_user = $_SESSION['id'];
cabecera_normal();

if($key==null){
fatal_error('Para acceder a tus favoritos necesit&aacute;s autentificarte');}

$var2=0;
$action = xss(no_i($_GET['action']));
$cat    = xss(no_i($_GET['cat']));
$sort_by = xss(no_i($_GET['sort_by']));

if($cat=="") $cat = "-1";
$cadena_categoria = "";

if ($cat>=0 and $cat<=50 and $cat)
{$cadena_categoria = " AND p.categoria='".$cat."'";}



	switch($sort_by)
	{
		case "titulo":
		$cadena_orden = " ORDER BY p.titulo ASC";
		break;
		case "creado":
		$cadena_orden = " ORDER BY fecha_creado DESC";
		break;
		case "guardado":
		$cadena_orden = " ORDER BY fecha_guardado DESC";
		break;
		case "puntos":
		$cadena_orden = " ORDER BY p.puntos DESC";
		break;
		case "visitas":
		$cadena_orden = " ORDER BY p.visitas DESC";
		break;
		default:
		$cadena_orden = " ORDER BY f.id DESC";}

$sql = "SELECT f.id, f.id_post, f.fecha as fecha_guardado, p.titulo, p.privado, p.fecha as fecha_creado, p.puntos, c.nom_categoria, c.link_categoria, u.nick, p.visitas
		FROM favoritos as f
		INNER JOIN posts as p
		ON p.id = f.id_post
		INNER JOIN categorias as c
		ON p.categoria = c.id_categoria
		INNER JOIN usuarios as u
		ON u.id = p.id_autor
		WHERE p.elim = 0 AND f.id_usuario=".$id_user.$cadena_categoria." ".$cadena_orden;

$rds = mysql_query($sql, $con);

if (!mysql_num_rows($rds)){echo'

<div class="emptyData">No agregaste ning&uacute;n post a favoritos todav&iacute;a</div>';
pie();
die();}
?>



<script>

/* Eliminar Favorito */
function borrar_favs(postid){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/favoritos-borrar2.php',
		data: 'postid='+postid,
		success: function(h){
			switch(h.charAt(0)){
				case '0': //Error
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+postid).css('opacity', '0.5');
					$('#div_'+postid+' a#change_status').attr('href', "javascript:reactivar_favs('"+postid+"')");
					$('#div_'+postid+' a#change_status img').attr('src', global_data.img + 'images/reactivar.png').attr('title', 'Reactivar').attr('alt', 'reactivar');
					break;
			}
		},
		error: function(){
			mydialog.error_500("borrar_favs('"+postid+"')");
		}
	});
}
//Reactivar favoritos
function reactivar_favs(postid){
	mydialog.close();
	$.ajax({
		type: 'POST',
		url: '/favoritos-agregar.php',
		data: 'postid=' + postid + gget('key'),
		success: function(h){
			switch(h.charAt(0)){
				case '0': //Error
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('#div_'+postid).css('opacity', '1');
					$('#div_'+postid+' a#change_status').attr('href', "javascript:borrar_favs('"+postid+"')");
					$('#div_'+postid+' a#change_status img').attr('src', global_data.img + 'images/borrar.png').attr('title', 'Borrar').attr('alt', 'borrar');
					break;
			}
		},
		error: function(){
			mydialog.error_500("reactivar_favs('"+postid+"')");
		}
	});
}




</script>




<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="comunidades">
<div id="izquierda" style="width:170px">
	<div class="categoriaList">
		<ul>
			<li id="cat_-1" style="margin-bottom: 5px;background:#555555; -moz-border-radius-topleft: 5px;-moz-border-radius-topright: 5px"><a href="?cat=-1" style="color:#FFF"><strong>Categor&iacute;as</strong></a></li>
<?php
$categorias2	=	mysql_query("SELECT DISTINCT p.id, p.categoria, c.*, f.id_post, f.id_usuario, COUNT(c.id_categoria) as number 
				FROM (posts AS p, favoritos as f, categorias AS c)
				WHERE c.id_categoria = p.categoria
				AND f.id_usuario='$key'
				AND f.id_post=p.id
				GROUP BY c.nom_categoria ORDER BY c.nom_categoria", $con);

while($ctgrs=mysql_fetch_array($categorias2)){
?>
<li id="cat_<?=$ctgrs['id_categoria']?>"><a href="?cat=<?=$ctgrs['categoria']?>"><?=$ctgrs['nom_categoria']?></a> (<?=$ctgrs['number']?>)</li>
<?php
}
?>
	</div>
</div>

<div id="centroDerecha">
	<div id="resultados">
		<table class="linksList">

			<thead>
				<tr>
					<th></th>
					<th style="text-align:left;width:350px;overflow:hidden;"><a href="?cat=<?=$cat?>&sort_by=titulo"<?if($sort_by=="titulo")echo ' class="here"';?>>T&iacute;tulo</a></th>
					<th><a href="?cat=<?=$cat?>&sort_by=creado"<?if ($sort_by=="creado") echo ' class="here"';?>>Creado</a></th>
					<th><a href="?cat=<?=$cat?>&sort_by=guardado"<?if ($sort_by=="guardado" or $direccion[1]=="favoritos.php") echo ' class="here"';?>>Guardado</a></th>
					<th><a href="?cat=<?=$cat?>&sort_by=puntos"<?if ($sort_by=="puntos") echo ' class="here"';?>>Puntos</a></th>
					<th><a href="?cat=<?=$cat?>&sort_by=visitas"<?if ($sort_by=="visitas") echo ' class="here"';?>>Visitas</a></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		<?
		$i = 0;
			while($row = mysql_fetch_array($rds))
			{
				$id_favorito = $row['id'];
				$fecha_guardado = $row['fecha_guardado'];
				$fecha_creado = $row['fecha_creado'];
				$id_post = $row['id_post'];
				$titulo = $row['titulo'];
				$cat = $row['cat'];
				$nom_categoria = $row['nom_categoria'];
				$link_categoria = $row['link_categoria'];
				$nick = $row['nick'];
				$puntos = $row['puntos'];
				$visitas = $row['visitas'];
				
				?>
				<tr id="div_<?=$id_post?>">
					<td>
						<span><img src="/images/categorias/<?=$link_categoria?>.png"></span>
					</td>
					<td style="text-align:left">
						<a class="titlePost" href="/posts/<?=$link_categoria?>/<?=$id_post?>/<?=corregir($titulo).".html"?>" title="<?=$titulo?>" alt="<?=$titulo?>"><?=$titulo?></a>
					</td>
					<td title="<?=date("d.m.Y", $fecha_creado)?> a las <?=date("H:m", $fecha_creado)?> hs.">
						<?=hace($fecha_creado)?>					</td>
					<td title="<?=date("d.m.Y", $fecha_guardado)?> a las <?=date("H.m", $fecha_guardado)?> hs.">

						<?=hace($fecha_guardado)?>					</td>
					<td class="color_green">
						<?=$puntos?>					</td>
					<td>
						<?=$visitas?>				</td>
					<td>
						<a id="change_status" href="javascript:borrar_favs('<?=$id_post?>')"><img src="<?=$images?>/borrar.png" alt="borrar" title="Borrar Favorito" /></a>

					</td>
				</tr>
				<?}?>
			</tbody>
		</table>
	</div>
  </div>
</div>
<?php
$i++;
pie();
?>