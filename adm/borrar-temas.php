<?php
include('../header.php');

$titulo	=	$descripcion;
$id_user	=	$_SESSION['id'];

$sql = "SELECT rango FROM usuarios where id='{$id_user}' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="255" or $rango=="755" or $rango=="100"){
cabecera_normal();
?>

<div id="cuerpocontainer">
<?php include("menu2.php");?>	

<div class="boxy xtralarge2">
		<div class="boxy-title">
		<h3>Temas eliminados</h3>
		</div>
	<div class="boxy-content">
		
<table class="linksList">
<thead>
<tr>
				<th>Tema:</th>
				<th>Acci&oacute;n:</th>
				<th>Opciones:</th>
</tr>
</thead>
<tbody>
<tbody>
<?php
$_pagi_sql	=	"SELECT * FROM c_temas t, c_comunidades c, usuarios u
				 WHERE t.idcomunid=c.idco
				 AND t.id_autor=u.id
			   	 AND t.elimte='1'
				 ORDER BY t.fechate DESC";
		
$rs	=	mysql_query($_pagi_sql, $con);

$_pagi_cuantos = 30; 
include("../paginator.inc.php");

while ($row=mysql_fetch_array($_pagi_result)){

$mtitulo	=	$row['titulo'];
$idt	=	$row['idte'];
$shortn	=	$row['shortname'];
$autor	=	$row['nick'];
?>
<tr id="div_<?=$idt?>">
	<td style="text-align: left;"><a href="<?=$url?>/comunidades/<?=$shortn?>/<?=$idt?>/<?=corregir($mtitulo)?>.html" target="_blank"><?=$mtitulo?></a><br />Por <a href="/perfil/<?=$autor?>" target="_blank"><?=$autor?></a></td>
	<td><span class="color_red">Eliminado</span></td>
	<td><a id="change_status" onclick="javascript:reactivar_tema('<?=$idt?>')"><img src="<?=$images?>/reactivar.png" alt="Reactivar" title="Reactivar Tema" /></td>
</tr>
<?php
}
?>
</tbody>
		</tbody>
	</table>
		<center><?php echo "".$_pagi_navegacion."";?></center>

</div></div></div>

<br clear="left" />

<center>
<input onclick="javascript:com.borrar_temamod()" title="Borrar Tema" value="Borrar Tema" class="mBtn btnOk" type="button">
</center>
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
}else{
include('../../404.php');}
?>