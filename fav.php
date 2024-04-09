<?php
include("header.php");
$key = $_SESSION['id'];
# Funciones necesarias
function GetTitle($id)
{
  $sql = mysql_query("SELECT * FROM posts WHERE id = '$id'");
  $rowg = mysql_fetch_assoc($sql);
  return $rowg["titulo"];
}
// Function GetCat()
function GetCat($id,$ret)
{
  $sqlc = mysql_query("SELECT * FROM categorias WHERE id_categoria = '$id'");
  $row = mysql_fetch_assoc($sqlc);
  return $row[$ret];
}
function GetP($id,$ret)
{
  $sqlp = mysql_query("SELECT * FROM posts WHERE id = '$id'");
  $rowp = mysql_fetch_assoc($sqlp);
  return $rowp["categoria"];
}
function getCommentP($postid)
{
  $sqlc = mysql_query("SELECT * FROM comentarios WHERE id_post = '$postid'");
  return mysql_num_rows($sqlc);
}
function GetPuntos($id)
{
  $sqlpp = mysql_query("SELECT * FROM posts WHERE id = '$id'");
  $sqlsx = mysql_fetch_assoc($sqlpp);
  return $sqlsx['puntos'];
}
# Funciones necesarias
cabecera_normal();
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script src="http://o1.t26.net/images/js/es/favoritos.js?1.2" type="text/javascript"></script>
<?php echo'
<script type="text/javascript">
var favoritos_data = [';
$sqlf = mysql_query("SELECT * FROM favoritos WHERE id_usuario = '$key'");
while($row = mysql_fetch_assoc($sqlf))
{
  echo'{"fav_id":"'.$row['id'].'","post_id":"'.$row['id_post'].'","titulo":"'.GetTitle($row['id_post']).'","categoria":"'.GetCat(GetP($row['id_post']),"link_categoria").'","categoria_name":"'.GetCat(GetP($row['id_post']),"nom_categoria").'","autor_nick":"facudk","url":"/posts/'.GetCat(GetP($row['id_post']),"nom_categoria").'/'.$row['id_post'].'/'.urlencode(GetTitle($row['id_post'])).'.html","fecha_creado":1213135210,"fecha_creado_formato":"10.06.2008 a las 19:00 hs.","fecha_creado_palabras":"M&aacute;s de 3 a&ntilde;os","fecha_guardado":'.$row['fecha'].',"fecha_guardado_formato":"25.02.2011 a las 13:46 hs.","fecha_guardado_palabras":"'.hace($row['fecha']).'","puntos":"'.GetPuntos($row['id_post']).'","comentarios":'.getCommentP($row['id_post']).'},';
}
?>
];
</script>


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
					<th style="text-align:left;width:350px;overflow:hidden;"><a href="" onclick="favoritos.active2(this); favoritos.orden = 'titulo'; favoritos.query(); return false;">T&iacute;tulo</a></th>
					<th><a href="" onclick="favoritos.active2(this); favoritos.orden = 'fecha_creado'; favoritos.query(); return false;">Creado</a></th>
					<th><a href="" onclick="favoritos.active2(this); favoritos.orden = 'fecha_guardado'; favoritos.query(); return false;" class="here">Guardado</a></th>
					<th><a href="" onclick="favoritos.active2(this); favoritos.orden = 'puntos'; favoritos.query(); return false;">Puntos</a></th>
					<th><a href="" onclick="favoritos.active2(this); favoritos.orden = 'comentarios'; favoritos.query(); return false;">Comentarios</a></th>
					<th></th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>
</div>


<div id="favoritos-templates" style="display:none">
	<div id="favorito"><!--
		<tr id="favorito_id___fav_id__">
			<td>
				<span class="categoriaPost __categoria__" title="__categoria_name__"></span>
			</td>
			<td style="text-align:left;font-size:12px">
				<a class="titlePost" title="__titulo__" href="__url__">__titulo__</a>
			</td>
			<td title="__fecha_creado_formato__">__fecha_creado_palabras__</td>
			<td title="__fecha_guardado_formato__">__fecha_guardado_palabras__</td>
			<td class="color_green">__puntos__</td>
			<td>__comentarios__</td>
			<td>
				<a id="change_status" href="" onclick="favoritos.eliminar(__fav_id__, this); return false;"><img src="http://o1.t26.net/images/borrar.png" alt="borrar" title="Borrar Favorito" /></a>
			</td>
		</tr>
	--></div>
	<div id="categoria"><!--
		<li id="cat___categoria__">
			<a href="" onclick="favoritos.active(this); favoritos.categoria = \'__categoria__\'; favoritos.query(); return false;">__categoria_name__</a> (<span class="count">__count__</span>)
		</li>
	--></div>
</div><div style="clear:both"></div>
<?php
pie();
?>