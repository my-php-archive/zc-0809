<?php
include("../header.php");
$titulo	=	$descripcion;
$kid	=	$_SESSION['id'];
$sql = "SELECT nick, rango FROM usuarios where id='".$kid."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);
$rango = $row['rango'];
$user = $row['user'];
if($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755")
{
cabecera_normal();
echo'<script src="/admin/acciones.js?5.7" type="text/javascript"></script>';
?>
<div id="cuerpocontainer">
<?php include("menu.php");?>
		

<div class="boxy xtralarge2">
			<div class="boxy-title">
				<h3>Posts eliminados</h3>

				<span class="icon-noti follow-n"></span>
			</div>
			<div class="boxy-content">
		
<table class="linksList">
<thead>
<tr>
				<th>Post</th>
				<th>Acci&oacute;n</th>
				<th>Moderador</th>
				<th>Causa</th>
				<th>Reactivar</th>
</tr>
</thead>
<tbody>
<tbody>
<?php
$mh	=	"SELECT pe.accion, pe.id_modera, pe.id_post, pe.causa, pe.fecha, po.id AS idp, po.titulo, po.id_autor, po.categoria, us.id as idu , us.nick as moderador, ue.id AS autor_id, ue.nick, ue.rango AS a_rango, c.id_categoria, c.link_categoria, c.nom_categoria
		FROM (posts_eliminados AS pe, posts AS po, usuarios AS us, categorias AS c, usuarios AS ue)
		WHERE pe.id_modera=us.id
		AND po.id_autor=ue.id
		AND pe.id_post=po.id
		AND pe.accion=1
		AND po.categoria=c.id_categoria
		ORDER BY pe.id desc
		LIMIT 20";
		
$mh2	=	mysql_query($mh, $con) or die( "Error en query: $mh, el error  es: " . mysql_error() );
while ($row=mysql_fetch_array($mh2)){
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
<td><a id="change_status" onclick="javascript:reactivar_post('<?=$idp?>')"><img src="<?=$images?>/reactivar.png" alt="Reactivar" title="Reactivar post" /></td>


</tr>
<?php
}
?>
</tbody>
		</tbody>
	</table>
		<center><?php echo "".$_pagi_navegacion."";?></center>
<br />
<center>
<input onclick="javascript:com.borrar_postmod()" title="Eliminar post" value="Eliminar post" class="mBtn btnDelete" type="button">
</center>
</div>
		</div></div>
<div style="clear:both"></div>
<style>
.boxy {
	background: #FFF;
	border: 1px solid #CCC;
	-moz-box-shadow: 0 0 5px #CCC;
	-webkit-box-shadow: 0 0 5px #CCC
}
.boxy a {
	color: #0f0fb4;
	font-weight: bold;
}
.boxy a.selected {
	background-color:#0F0FB4;
	color:#FFFFFF;
	display:block;

	margin:3px 0;
	padding:3px;
}
.boxy-title {
	background: #d9d9d9 url('<?=$images?>/images/bg-title-boxy.gif') repeat-x top left;
	padding: 10px;
	border-bottom: #bdbdbd 1px solid;
	position: relative;
}
.boxy-title h3 {
	margin: 0;
	text-shadow: #f4f4f4  0 1px 0;
	font-size:13px;
}

.boxy-title span.icon-noti {
	background-image:url('<?=$images?>/images/sprite-notification.png');
	display:block;
	float:right;
	height:16px;
	position:absolute;
	right:9px;
	top:8px;
	width:16px;
}

.boxy-content {
	padding: 12px;
}
.boxy select {
	width: 125px;
}
.boxy h4 {
	color: #FF6600;
	margin: 0 0 5px 0;
	font-size: 14px;
}
.boxy hr {
	border-top: dashed 1px #CCC;
	background: #FFF;
	margin: 10px 0;
}
.xtralarge2 {
	width: 702px;
	margin: 0 5px 10px 0px;
	float: left;
}
.xtralarge ol {
	padding-left:30px;
	margin:0;
	list-style-image:none;
	list-style-position:outside!important;
	list-style-type:decimal;
	position:relative;
}

.xtralarge .categoriaPost, .xtralarge .categoriaUsuario, .xtralarge .categoriaCom {
	font-size: 12px;
	list-style-image:none;
	list-style-position:outside!important;
	list-style-type:decimal;	
	font-weight: bold;
	margin-bottom: 3px;
	display:list-item;
	position:relative;
	border:none;
	height:16px
}

.xtralarge .categoriaCom {
	padding: 3px;
}

.xtralarge .categoriaPost {
	margin-bottom: 0;
	_list-style:none
}

.xtralarge .categoriaPost:hover {
	background-color:none!important;
}



.xtralarge .categoriaPost a, .xtralarge .categoriaUsuario a, .xtralarge .categoriaCom a {
	font-size: 12px;
	font-weight: bold;
	width:250px;
	height:16px;
	overflow:hidden;
	margin:0;
	display:block;
	padding:0
	height:auto!important;
	position:absolute;
	float:none;
}

.xtralarge .categoriaPost span, .xtralarge .categoriaUsuario span, .xtralarge .categoriaCom span {
	font-weight: normal;
	color: #999;
	position:absolute;
	right:0;
	top:0
}

.xtralarge .categoriaUsuario  {
	padding:3px;
}

 .xtralarge .categoriaUsuario a {
 	left: 25px;
 	top:3px;
 	height:16px;
 }

.xtralarge .categoriaCom {
	height:13px;
}

.xtralarge .categoriaCom .titletema {
	margin:0
}
.xtralarge .categoriaUsuario img {

	vertica-align:middle;
	padding:1px;
	border:1px solid #EEE;
	display:block;
	margin-right:5px;
	position:absolute;	
}

.boxy-title .popular-n { background-position:0 -240px; }
.boxy-title .votada-n { background-position:0 -261px; }


</style>

<?php
pie();
}
?>