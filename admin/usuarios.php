<?php
include('../header.php');

$id = $_SESSION['id'];

$sql = "SELECT id, rango FROM usuarios WHERE id='$id'";
$rs = mysql_query($sql,$con);
$ram = mysql_fetch_array($rs);

$rango = $ram['rango'];

if ($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755"){
$titulo	=	$descripcion;
cabecera_normal();

$sort = no_injection($_GET['orden']);

switch($sort){

case "id":
$sort_by = "id ASC";
break;

case "nick":
$sort_by = "nick ASC";
break;

case "ultimaccion":
$sort_by = "ultimaaccion DESC";
break;

case "rango":
$sort_by = "rango DESC";
break;

case "puntos":
$sort_by = "puntos DESC";
break;

case "mail":
$sort_by = "mail ASC";
break;

case "uip":
$sort_by = "ultimaip ASC";
break;

case "uipdsc":
$sort_by = "ultimaip DESC";
break;

case "pais":
$sort_by = "pais ASC";
break;

default:
$sort_by = "id ASC";}

function estado($valor){
$valor = str_replace("0", "<span class=\"color_green\">Activo</span>", $valor);
$valor = str_replace("1", "<span class=\"color_red\">Suspendido</span>", $valor);
return $valor;}

include("menu.php");

echo'<div class="boxy xtralarge">
		<div class="boxy-title">
		<h3>Usuarios</h3>
		</div>
	<div class="boxy-content">
<table class="linksList">
<thead>
<tr>
<th><a';if($direccion[3]=="" or $direccion[3]=="id"){echo' class="here"';}echo' href="/admin/usuarios/id">ID:</a></th>
<th><a';if($direccion[3]=="nick"){echo' class="here"';}echo' href="/admin/usuarios/nick">Nick:</a></th>
<th>Estatus:</th>
<th>Activo hace:</th>
<th><a';if($direccion[3]=="ip" or $direccion[3]=="ipdesc"){echo' class="here"';}echo' href="/admin/usuarios/ip';if($direccion[3]=="ip"){echo'desc';}echo'">Ultima IP:</a></th>
<th>';if($rango=="255"){echo'<a';if($direccion[3]=="mail"){echo' class="here"';}echo' href="/admin/usuarios/mail">Email:</a>';}else{echo'Email:';}echo'</th>
<th><a';if($direccion[3]=="rango"){echo' class="here"';}echo' href="/admin/usuarios/rango">Rango:</a></th>
<th><a';if($direccion[3]=="puntos"){echo' class="here"';}echo' href="/admin/usuarios/puntos">Puntos:</a></th>
<th><a';if($direccion[3]=="pais"){echo' class="here"';}echo' href="/admin/usuarios/pais">Pais:</a></th>
<th>Opciones:</th>
</tr>
</thead>
<tbody>';

$_pagi_sql = "SELECT * FROM usuarios ORDER BY ".$sort_by."";
$rs = mysql_query($_pagi_sql,$con);

$_pagi_cuantos = 150; 
include("paginator.inc.php");

while($row = mysql_fetch_array($_pagi_result)){

$activacion = $row['activacion'];
$id_usuario = $row['id'];
$nick = $row['nick'];
$nombre = $row['nombre'];
$mail = $row['mail'];
$sexo = $row['sexo'];
$ip = $row['ultimaip'];

echo'
<tr id="div_'.$row['id'].'">

<td>'.$row['id'].'</td>

<td><a href="/perfil/'.$row['nick'].'" target="_blank">'.$row['nick'].'</a></td>';

if($row['activacion']==0){
echo'<td><span style="color: orange;">Inactivo</span></td>';
}else{
echo'<td>'.estado($row['ban']).'</td>';}

if($row['ultimaaccion']==0){echo'<td> - </td>';
}else{
echo'<td>'.hace($row['ultimaaccion']).'</td>';}

if($row['ultimaip']==null){echo'<td> - </td>';}
else
{echo'<td>'.$row['ultimaip'].'</td>';}

echo'<td>';
if($rango=="255")
{echo'<span title="'.$row['mail'].'">'.cortar($row['mail'],'16').'</span>';}else{echo'<i>Oculto</i>';}echo'</td>

<td>'.rngo($row['rango']).'</td>

<td>'.$row['puntos'].'</td>';

$sql = "SELECT * FROM paises WHERE img_pais='".$row['pais']."'";
$rs = mysql_query($sql,$con);
$pis = mysql_fetch_array($rs);

echo'<td><img src="'.$images.'/flags/'.bandera($pis['img_pais']).'.png" title="'.$pis['nombre_pais'].'" align="absmiddle"></td>
<td>';

if ($rango=='255'){echo'<a onclick="javascript:com.rango_usuario()" title="Cambiar Rango"><img src="'.$images.'/editar.png"></a>&nbsp;
<a onclick="javascript:com.agregar_puntos()" title="Dar Puntos a Usuario"><img src="'.$images.'/add.png"></a>&nbsp;
<a onclick="javascript:com.quitar_puntos()" title="Quitar Puntos a Usuario"><img src="'.$images.'/quit.png"></a>&nbsp;';}

if($row['ban']==0)
{echo'<a onclick="javascript:com.banear_usuario()" title="Suspender Usuario"><img src="'.$images.'/ban.gif">';}
else
{echo'<a onclick="javascript:desbanear_usuario(\''.$row['nick'].'\')"><img src="'.$images.'/reactivar.png" align="absmiddle" title="Desbanear Usuario">';}
echo'</a></td>
</tr>';}
echo'</tbody>
		   </table>';
?>
<center><?php echo "".$_pagi_navegacion."";?></center>
</div>
<br clear="left" />
</div>
<?php
pie();}
else{
include('../404.php');}
?>