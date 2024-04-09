<?php
include('../header.php');

$id = $_SESSION['id'];

$sql = "SELECT nick, rango FROM usuarios where id='".$id."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];
$user = $row['nick'];

if ($rango=="255" or $rango=="100"){
$titulo	=	$descripcion;
cabecera_normal();

include("menu.php");

echo'
	<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Listado de Stickys (Posts Importantes)</h3>
		</div>
	<div class="boxy-content">';
$sql = "SELECT p.*, u.nick AS creador, u.id AS uid FROM (posts as p, usuarios as u) WHERE sticky='on' AND p.id_autor=u.id ORDER by p.id DESC ";
$rs = mysql_query($sql, $con);

if(mysql_num_rows($rs)!=0){echo'
	<table class="linksList">
		<thead>
			<tr>
				<th>ID del Post:</th>
				<th>T&iacute;tulo:</th>
				<th>Creador:</th>
				<th>Opciones:</th>
			</tr>
		</thead>
	<tbody>';
while($row = mysql_fetch_array($rs)){

$id = $row['id'];
$creador = $row['creador'];
echo'<tr id="div_'.$row['id'].'">

<td width="50">
<b>'.$row['id'].'</b>
</td>

<td width="500">
<b><a href="/posts/categoria/'.$row['id'].'/'.corregir($row['titulo']).'.html" target="_blank">'.$row['titulo'].'</a></b>
</td>

<td width="150">
<b><a href="/perfil/'.$creador.'">'.$creador.'</a></b>
</td>
	
<td>
<a id="change_status" onclick="javascript:sticky_quitar(\''.$row['id'].'\')"><img src="'.$images.'/borrar.png" title="Quitar sticky" alt="X"></a>
</td>
</tr>';}
echo'</tbody>
		</table>';}
else{echo'<div class="emptyData">No hay ningun post en sticky</div>';}
echo'
	</div></div>
	<br clear="left" />

	<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Agregar un Sticky</h3>
		</div>
	<div class="boxy-content">

<div id="sticky-agregar" class="form-container">
	<div id="error_data" class="warningData" style="display:none"></div>
	<div class="data">
		<label>ID Post</label>
		<input class="c_input" id="idpost" />
	</div>
</div>

<br>

<center>
<input onclick="javascript:com.agregar_sticky()" title="Agregar Nuevo Sticky" value="Agregar Nuevo Sticky" class="mBtn btnOk" type="button">
</center>
</div>
</div>';
pie();}
else{
include('../404.php');}
?>