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
?>
<script src="/admin/acciones.js" type="text/javascript"></script>
<div id="cuerpocontainer">
<?php include("menu.php");?>
		
<script>
function acept_denuncia_beta(id,denunciante,postid){
		mydialog.procesando_inicio('Cargando...', 'Aceptar Denuncia');
		$.ajax({
			type: 'GET',
			url: '/admin/acept-denuncia-form.php',
			data: 'id='+id+'&denunciante='+denunciante+'&postid='+postid,
			success: function(h){
				mydialog.title('Aceptar Denuncia');
				mydialog.body(h, 500);
				mydialog.buttons(true, true, 'Aceptar denuncia', 'com.acept_denuncia_send()', true, true, true);
				mydialog.center();
				$('#acept-denuncia #denun').focus();
			},
			error: function(){
				mydialog.error_500("acept_denuncia_beta()");
			},
			complete: function(){
				mydialog.procesando_fin();
			}
		});
	}
</script>


<div class="boxy xtralarge2">
			<div class="boxy-title">
				<h3>Posts denunciados</h3>

				<span class="icon-noti follow-n"></span>
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
				<th>Post:</th>
				<th>Acusado:</th>
				<th>Denunciante:</th>
				<th>Causa:</th>
				<th>Comentarios:</th>
				<th>Fecha:</th>
				<th>Acciones:</th>
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
		<td><a onclick="javascript:acept_denuncia_beta('<?=denuncias($razon)?>','<?=$autor?>','<?=$id_post?>')" title="Aceptar denuncia"><img src="<?=$images?>/acept.gif" align="absmiddle"></a> <img src="<?=$images?>/d-opt.gif"> 
<a onclick="javascript:com.rech_denuncia()" title="Rechazar denuncia"><img src="<?=$images?>/rechazar.png" align="absmiddle"></a> <img src="<?=$images?>/d-opt.gif"> 
<a id="change_status" onclick="javascript:borrar_denuncia('<?=$row['deid']?>')" title="Eliminar denuncia"><img src="<?=$images?>/borrar.png" align="absmiddle"></a></td>
	</tr>
<?php
		}
echo'</tbody>
		</tbody>
	</table>';}else{echo'<div class="emptyData">No hay posts denunciados hasta el momento</div>';}
?>
</tbody>
		</tbody>
	</table>
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
	background: #d9d9d9 url('/images/bg-title-boxy.gif') repeat-x top left;
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
	background-image:url('/images/sprite-notification.png');
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