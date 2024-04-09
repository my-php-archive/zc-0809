<?php
include('../header.php');
$titulo	=	$descripcion;
cabecera_normal();
$id = $_SESSION['id'];
$sql = "SELECT nick, rango FROM usuarios where id='".$id."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);
$rango = $row['rango'];
$user = $row['user'];

if ($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755")
{
echo'<script src="/admin/acciones.js?5.7" type="text/javascript"></script>
<div id="cuerpocontainer">';
include('menu.php');
echo"
<div class='boxy xtralarge2'>
			<div class='boxy-title'>
				<h3>Posts en Sticky</h3>

				<span class='icon-noti follow-n'></span>
			</div>
			<div class='boxy-content'>

		<table class='linksList'>
		<thead>
			<tr>
				<th>ID:</th>
				<th>T&iacute;tulo:</th>
				<th>Creador:</th>

				<th>Opciones:</th>
			</tr>
		</thead>
	<tbody>
		<tbody>
<tr>";
$sqlp=$db->query("SELECT u.*, p.*, c.* FROM  usuarios as u, posts as p, categorias as c WHERE p.categoria=c.id_categoria AND p.id_autor=u.id AND p.sticky='on' AND p.elim='0' ORDER BY p.fecha desc");
$existep=$db->num_rows($sqlp);
if($existep==0){
echo "<div class='emptyData'>No hay Stickys</div>";
}
else{
while ($postz=$db->fetch_array($sqlp)){
$cont=$cont+1;
echo"
<td width='50'>
<b>{$postz['id']}</b>
</td>

<td width='500'>
<b><a href='/posts/{$postz['link_categoria']}/{$postz['id']}/".corregir($postz['titulo']).".html'>{$postz['titulo']}</a></b>
</td>

<td width='150'>
<b><a href='/perfil/{$postz['nick']}/'>{$postz['nick']}</a></b>
</td>
	
<td>
		<a id='change_status' href=\"javascript:sticky_quitar('{$postz['id']}')\"><img src='/images/borrar.png' title='Quitar sticky' alt='X'></a>
</td>

</tr>";
}}
$db->free_result($sqlp);
echo"
</tbody>
		</tbody>

	</table>

<br />
	</div>
		</div>
		
		<div class='boxy xtralarge2'>
			<div class='boxy-title'>
				<h3>Stickear Posts</h3>

				<span class='icon-noti follow-n'></span>
			</div>
			<div class='boxy-content'>

<div id='sticky-agregar' class='form-container'>
	<div id='error_data' class='warningData' style='display:none'></div>
	<div class='data'>
		<label>ID del post</label>
		<input class='c_input' id='idpost' />
	</div>
	
</div>
<br />
<center>
<input onclick='javascript:com.agregar_sticky()' title='Agregar Nuevo Sticky' value='Agregar Nuevo Sticky' class='mBtn btnOk' type='button'>





</center>
	</div>
		</div></div>
<div style=\"clear:both\"></div>
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
";
}
else
{
?>
<SCRIPT LANGUAGE="javascript"> location.href = ".."; </SCRIPT>
<?php
}
pie();
?>