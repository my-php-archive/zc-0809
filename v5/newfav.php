<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();
$var2=0;
$id_key = $_SESSION['id'];


if($_SESSION['user']!=null)
{
$sql = "SELECT id_categoria, nom_categoria FROM categorias ORDER BY nom_categoria ASC";
$rs = mysql_query($sql);
?><div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<?php echo'<script src="'.$images.'/js/es/favoritos.js?1.1" type="text/javascript"></script>
<script type="text/javascript">
var favoritos_data = ['; ?>
<?
$sqlc = "SELECT f.id, f.id_post, f.fecha as fecha_guardado, p.titulo, p.privado, p.fecha2 as fecha_creado, p.puntos, c.nom_categoria, c.link_categoria, u.nick, p.visitas
			FROM favoritos as f
			INNER JOIN posts as p
			ON p.id = f.id_post
			INNER JOIN categorias as c
			ON p.categoria = c.id_categoria
			INNER JOIN usuarios as u
			ON u.id = p.id_autor
			WHERE p.elim = 0 AND f.id_usuario='$id_key' GROUP BY f.id";
$sqlf=$db->query($sqlc);
while($row=$db->fetch_array($sqlf)) { 
				$id_favorito = $row['id'];
				$id_post = $row['id_post'];
				$fecha_guardado = $row['fecha_guardado'];
				$fecha_creado = $row['fecha_creado'];
				$titulo = $row['titulo'];
				$cat = $row['cat'];
				$nom_categoria = $row['nom_categoria'];
				$link_categoria = $row['link_categoria'];
				$nick = $row['nick'];
				$puntos = $row['puntos'];
				$visitas = $row['visitas'];
$script = ',{"fav_id":'.$id_favorito.',"post_id":'.$id_post.',"titulo":"'.$titulo.'","categoria":"'.$link_categoria.'","categoria_name":"'.$nom_categoria.'","autor_nick":"'.$nick.'","url":"\/posts\/'.$link_categoria.'\/'.$id_post.'\/'.$titulo.'.html","fecha_creado":'.$fecha_creado.',"fecha_creado_formato":"'.date("d.m.Y", $fecha_creado).' a las '.date("H:m", $fecha_creado).' hs.","fecha_creado_palabras":"'.hace($fecha_creado).'","fecha_guardado":'.$fecha_guardado.',"fecha_guardado_formato":"'.date("d.m.Y", $fecha_guardado).' a las '.date("H.m", $fecha_guardado).' hs.","fecha_guardado_palabras":"'.hace($fecha_guardado).'","puntos":'.$puntos.',"comentarios":0}';
echo $script;
} 
?>
];</script>
<div class="comunidades">
<div id="izquierda" style="width:170px">
<div>
<label for="favoritos-search" style="color:#999999;float:right;position:absolute;z-index:5;margin:12px">Buscar</label><input type="text" id="favoritos-search" style="width:164px; margin-bottom:10px; margin-top:7px;" value="" onKeyUp="favoritos.search(this.value, event)" onFocus="favoritos.search_focus()" onBlur="favoritos.search_blur()" autocomplete="off" />
	</div>
	<div class="categoriaList">
		<ul>
<li id="cat_-1" style="margin-bottom: 5px;background:#555555; -moz-border-radius-topleft: 5px;-moz-border-radius-topright: 5px"><a href="" onclick="favoritos.active(this); favoritos.categoria = 'todas'; favoritos.query(); return false;" style="color:#FFF"><strong>Categor&iacute;as</strong></a></li>
		</ul>
	</div>
</div>
 
<div id="centroDerecha">
	<div id="resultados">
		<table class="linksList favoritos">
			<thead>
				<tr>
					<th></th>
					<th style="text-align:left;width:350px;overflow:hidden;"><a href="javascript:favoritos.active2(this); favoritos.orden = 'titulo'; favoritos.query(); return false;" >T&iacute;tulo</a></th>
					<th><a href="javascript:favoritos.active2(this); favoritos.orden = 'fecha_creado'; favoritos.query(); return false;" >Creado</a></th>
					<th><a href="javascript:favoritos.active2(this); favoritos.orden = 'fecha_guardado'; favoritos.query(); return false;" class="here">Guardado</a></th>
					<th><a href="javascript:favoritos.active2(this); favoritos.orden = 'puntos'; favoritos.query(); return false;" >Puntos</a></th>
					<th><a href="javascript:favoritos.active2(this); favoritos.orden = 'comentarios'; favoritos.query(); return false;">Comentarios</a></th>
					<th></th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>

	</div>
</div>
</div>
<?
}
else
	echo '<SCRIPT LANGUAGE="javascript">
			location.href = "/";
		</SCRIPT>';
pie();
?>