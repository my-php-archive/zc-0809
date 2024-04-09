<?php
include('../../header.php');
$titulo	=	$descripcion;
cabecera_normal();

$id = $_SESSION['id'];

$sql = "SELECT nick, rango FROM usuarios where id='".$id."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];
$user = $row['user'];

if ($rango=="255" or $rango=="655" or $rango=="755"){
include('menu.php');
echo'<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Listado de comunidades oficiales</h3>
		</div>
	<div class="boxy-content">';
$sql = "SELECT c.*,u.id,u.nick FROM c_comunidades c, usuarios u WHERE c.creadorid=u.id AND c.oficial='1' ORDER BY c.idco DESC ";
$rs = mysql_query($sql, $con);
if (mysql_num_rows($rs)!=0){
echo'<table class="linksList">
		<thead>
			<tr>
			    <th>ID:</th>
				<th>Comunidad:</th>
				<th>Shortname:</th>
				<th>Creador:</th>
				<th>Opciones:</th>
			</tr>
		</thead>
	<tbody>';
while($row = mysql_fetch_array($rs)){
echo'<tr id="div_'.$row['idco'].'">
<td width="50">
<b>'.$row['idco'].'</b>
</td>

<td width="500">
<a href="'.$url.'/comunidades/'.$row['shortname'].'/"><b>'.$row['nombre'].'</b></a>
</td>

<td width="150">
<b>'.$row['shortname'].'</b>
</td>

<td width="150">
<b><a href="'.$url.'/perfil/'.$row['nick'].'">'.$row['nick'].'</a></b>
</td>
	
<td>
		<a id="change_status" onclick="javascript:oficial_quitar(\''.$row['idco'].'\')"><img src="'.$images.'/borrar.png" title="Quitar sticky" alt="X"></a>
</td>

</tr>';}
echo'</tbody>
	</table>';
}else{echo'<div class="emptyData"> No hay ninguna comunidad oficial </div>';}
echo'</div>
    </div>
	<br clear="left" />

	<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Agregar una comunidad oficial</h3>
		</div>
	<div class="boxy-content">

<div id="comunidad-agregar" class="form-container">
	<div id="error_data" class="warningData" style="display:none"></div>
	<div class="data">
		<label>Shortname</label>
		<input class="c_input" id="name" />
	</div>
</div>

<br>

<center>
<input onclick="javascript:com.agregar_oficial()" title="Agregar" value="Agregar" class="mBtn btnOk" type="button">
</center>
</div></div>';
pie();
}else{
include('../../404.php');}
?>