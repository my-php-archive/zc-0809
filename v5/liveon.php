<?php
include_once("header.php");
cabecera_normal();
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script src="/images/js/es/live.js?1.0" type="text/javascript"></script>

<link href="http://o2.t26.net/images/css/live.css?1.1" rel="stylesheet" type="text/css" />

<?php echo'<script type="text/javascript">
var live_data = [ ';
$sql = mysql_query("SELECT * FROM acciones LIMIT 15");
while($row = mysql_fetch_assoc($sql))
{
echo'{"accionObjeto":"comentario","accionTipo":"agregar","ts":"20:19:36","nick":"maximilianomauricio","id":26979538,"accion_name":"Creo un nuevo comentario","url":"\/posts\/manga-anime\/10526195\/Baccano-13_13-_mu_.html","titulo":"Baccano 13\/13 [mu]"},';
}

echo'];

	$(document).ready(function(){

		live.calcVel(135); //Velocidad inicial

		live.inicializar();

	});

</script>';?>

<div id="live">

<div style="float:left; width:705px">

	<div class="">

		<h2 style="font-size: 24px;font-family:Helvetica,Arial">Taringa! al minuto</h2>

	</div>

	<table id="liveBoard" cellpadding="0" cellspacing="0">

		<thead>

			<th class="usuario">Usuario</th>

			<th class="accion">Acci&oacute;n</th>

			<th class="titulo">T&iacute;tulo</th>

		</thead>

		<tbody></tbody>

	</table>

</div>



<div style="width:210px; float:right">

	<div id="estadisticas" class="categoriaList estadisticasList">

		<div class="clearfix">

		<h6>Estadísticas</h6>

		<span id="PlayPause"><img src="http://o2.t26.net/images/icon_pause.png" alt="" /></span>

		</div>

		<ul>

			<li class="clearfix"><span class="floatL">Tiempo</span><span id="time" class="floatR number">00:00:00</span></li>

			<li class="clearfix"><span class="floatL">Velocidad actual</span><span id="velocidad" class="floatR number" title="Medido en acciones por segundo">0 a/s</span></li>

			<li class="clearfix"><span class="floatL">Acciones totales</span><span id="total" class="floatR number">0</span></li>

		</ul>

	</div>



	<div id="filtros" class="categoriaList">

		<div class="clearfix">

		<h6>Filtrar Actividad</h6>

		</div>

		<ul>

			<span class="accionObjeto_post">

				<li class="clearfix"><strong>Posts</strong></li>

				<li class="clearfix"><label><span class="icon-noti post-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('post', 'agregar')">Nuevos</label><span class="accionTipo_agregar floatR number">0</span></li>

				<li class="clearfix"><label><span class="icon-noti puntos-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('post', 'votar')">Votados</label><span class="accionTipo_votar floatR number">0</span></li>

				<li class="clearfix"><label><span class="icon-noti favoritos-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('post', 'favorito')">Favoritos</label><span class="accionTipo_favorito floatR number">0</span></li>

				<li class="clearfix"><label><span class="icon-noti recomendar-p"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('post', 'recomendar')">Recomendados</label><span class="accionTipo_recomendar floatR number">0</span></li>

				<li class="clearfix"><label><span class="icon-noti follow-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('post', 'seguir')">Seguidores</label><span class="accionTipo_seguir floatR number">0</span></li>

			</span>



			<span class="accionObjeto_comentario">

				<li class="clearfix"><strong>Comentarios</strong></li>

				<li class="clearfix"><label><span class="icon-noti comentarios-n-b"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('comentario', 'agregar')">Nuevos</label><span class="accionTipo_agregar floatR number">0</span></li>

				<li class="clearfix"><label><span class="thumbs thumbsUp"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('comentario', 'votar')">Votados</label><span class="accionTipo_votar floatR number">0</span></li>

			</span>



			<span class="accionObjeto_comunidad">

				<li class="clearfix"><strong>Comunidades</strong></li>

				<li class="clearfix"><label><span class="icon-noti post-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('comunidad', 'agregar')">Nuevas</label><span class="accionTipo_agregar floatR number">0</span></li>

				<li class="clearfix"><label><span class="icon-noti follow-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('comunidad', 'participar')">Miembros</label><span class="accionTipo_participar floatR number">0</span></li>

				<li class="clearfix"><label><span class="icon-noti follow-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('comunidad', 'seguir')">Seguidores</label><span class="accionTipo_seguir floatR number">0</span></li>

			</span>



			<span class="accionObjeto_tema">

				<li class="clearfix"><strong>Temas</strong></li>

				<li class="clearfix"><label><span class="icon-noti post-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('tema', 'agregar')">Nuevos</label><span class="accionTipo_agregar floatR number">0</span></li>

				<li class="clearfix"><label><span class="thumbs thumbsUp"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('tema', 'votar')">Votados</label><span class="accionTipo_votar floatR number">0</span></li>

				<li class="clearfix"><label><span class="icon-noti follow-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('tema', 'seguir')">Seguidores</label><span class="accionTipo_seguir floatR number">0</span></li>

			</span>



			<span class="accionObjeto_usuario">

				<li class="clearfix"><strong>Usuarios</strong></li>

				<li class="clearfix"><label><span class="icon-noti post-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('usuario', 'agregar')">Registrados</label><span class="accionTipo_agregar floatR number">0</span></li>

				<li class="clearfix"><label><span class="icon-noti follow-n"></span><input type="checkbox" autocomplete="off" checked="checked" onchange="live.changeFiltro('usuario', 'seguir')">Seguidores</label><span class="accionTipo_seguir floatR number">0</span></li>

			</span>

		</ul>

	</div>

</div>



<div id="template-liveBoard"><!--

	<tr class="__class__">

		<td class="usuario">

			<a href="/perfil/__nick__" target="_blank">__nick__</a>

		</td>

		<td class="accion">__accion_name__</td>

		<td class="titulo">

			<a href="__url__" target="_blank">__titulo__</a>

		</td>

	</tr>

--></div>

</div><div style="clear:both"></div>
<?php
pie();
?>