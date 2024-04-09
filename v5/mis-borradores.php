<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();
?><div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script src="/images/js/es/borradores.js?1.0.1" type="text/javascript"></script>

<div id="borradores">

<script type="text/javascript">
var borradores_data = [<?php
$sqlp=$db->query("SELECT p.*,c.*,u.rango FROM borradores p LEFT JOIN categorias c ON c.id_categoria=p.categoria LEFT JOIN usuarios u ON u.id=p.id_autor WHERE p.id_autor=".$_SESSION['id']." ORDER BY p.fecha2 DESC");
$existep=$db->num_rows($sqlp);
if($existep==0){
echo'<div class="emptyData">No tienes ning&uacute;n borrador ni post eliminado</div>
';}
else{
	while($postsst=$db->fetch_array($sqlp))
	{?>
		{"id":<?=$postsst['id']?>,"titulo":"<?=$postsst['titulo']?>","categoria":"<?=$postsst['link_categoria']?>","fecha_guardado":<?=$postsst['fecha2']?>,"status":<?=$postsst['estatus']?>,"causa":"<?=$postsst['causa']?>","categoria_name":"<?=$postsst['nom_categoria']?>","tipo":"<?=$postsst['tipo']?>","url":"\/agregar\/<?=$postsst['id']?>","fecha_print":"<?php echo date("d.m.Y", strtotime($row['fecha2'])); ?> a las <?php echo date("H:m:s", strtotime($row['fecha2'])); ?> hs."},
		    <?php }}?>];


</script>
<div class="clearfix">
	<div class="left" style="float:left;width:200px">
		<div class="boxy">
			<div class="boxy-title">
				<h3>Filtrar</h3>
				<span></span>
			</div><!-- boxy-title -->
			<div class="boxy-content">

				<h4>Mostrar</h4>
				<ul class="cat-list" id="borradores-filtros">
					<li id="todos" class="active"><span class="cat-title"><a href="" onclick="borradores.active(this); borradores.filtro = 'todos'; borradores.query(); cajasBorradores(1); return false;">Todos</a></span> <span class="count"></span></li>
                                        <li id="total_post"><span class="cat-title"><a href="" onclick="borradores.active(this); cajasBorradores(2); return false;">Posts</a></span> <span class="count"></span></li>
                                        <li id="total_temas"><span class="cat-title"><a href="" onclick="borradores.active(this); cajasBorradores(3); return false;">Temas</a></span> <span class="count"></span></li>

                                        <li id="borradores"><span class="cat-title"><a href="" onclick="borradores.active(this); borradores.filtro = 'borradores'; borradores.query(); cajasBorradores(1); return false;">Borradores</a></span> <span class="count"></span></li>
					<li id="eliminados"><span class="cat-title"><a href="" onclick="borradores.active(this); borradores.filtro = 'eliminados'; borradores.query(); cajasBorradores(1); return false;">Eliminados</a></span> <span class="count"></span></li>
				</ul>

				<h4>Ordenar por</h4>
				<ul id="borradores-orden" class="cat-list">
					<li class="active"><span><a href="" onclick="borradores.active(this); borradores.orden = 'fecha_guardado'; borradores.query(); return false;">Fecha guardado</a></span></li>
					<li><span><a href="" onclick="borradores.active(this); borradores.orden = 'titulo'; borradores.query(); return false;">T&iacute;tulo</a></span></li>
					<li><span><a href="" onclick="borradores.active(this); borradores.orden = 'categoria'; borradores.query(); return false;">Categor&iacute;a</a></span></li>

				</ul>
				<h4>Categorias</h4>
				<ul class="cat-list" id="borradores-categorias">
					<li id="todas" class="active"><span class="cat-title active"><a href="" onclick="borradores.active(this); borradores.categoria = 'todas'; borradores.query(); return false;">Ver todas</a></span> <span class="count"></span></li>
				</ul>
			</div><!-- boxy-content -->
		</div>

	</div><!-- END LEFT -->
	<div class="right" style="float:left;margin-left:10px;width:730px">
		<div class="boxy">
			<div class="boxy-title">
				<h3>Posts</h3>
				<label for="borradores-search" style="color:#999999;float:right;position:absolute;right:135px;top:11px;z-index:5;">Buscar</label><input type="text" id="borradores-search" value="" onKeyUp="borradores.search(this.value, event)" onFocus="borradores.search_focus()" onBlur="borradores.search_blur()" autocomplete="off" />
			</div>
			<div id="res" class="boxy-content">
<?php if($existep==0){
echo'<div class="emptyData">No tienes ning&uacute;n borrador ni post eliminado</div>
';}?>
								<ul id="resultados-borradores"></ul>
			</div>
		</div>
	</div>
</div>

<div id="template-result-borrador" style="display:none">
	<li id="borrador_id___id__">
		<a title="__categoria_name__" class="categoriaPost __categoria__ __tipo__" href="__url__" onclick="__onclick__">__titulo__</a>
		<span class="causa">Causa: __causa__</span>

		<span class="gray">&Uacute;ltima vez guardado el __fecha_guardado__</span> <a style="float:right" href="" onclick="borradores.eliminar(__borrador_id__, true); return false;"><img src="/images/borrar.png" alt="eliminar" title="Eliminar Borrador" /></a>
	</li>
</div>

</div> <!-- #borradores -->
<div style="clear:both"></div>
<!-- fin cuerpocontainer -->

<?php
pie();
?>