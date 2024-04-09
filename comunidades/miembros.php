<?php
include("../header.php");
$comid = xss(no_i($_GET['comid']));
$key = xss(no_i($_GET['key']));
$ajax = xss(no_i($_GET['ajax']));
$section = xss(no_i($_GET['section']));
$p = xss(no_i($_GET['p']));

if($section=='susp'){
	$cadena="m.estado='1'";
}else{
	$cadena="m.estado='0'";
}

$cronj=mysql_query("SELECT * FROM c_miembros WHERE iduser='".$_SESSION['id']."' AND idcomunity='$comid'");
$rap=mysql_fetch_array($cronj);

if($section=='susp' and $rap['rangoco']==3 or $rap['rangoco']==2 or $rap['rangoco']==1){
	die("0: Tu rango no te permite realizar esta operaci&oacute;n");
}

if(empty($comid) or empty($key)){
	die("0: Faltan Datos");
}

$sqluserz=mysql_query("SELECT m.*,us.* FROM c_miembros m
LEFT JOIN usuarios us ON us.id=m.iduser
WHERE {$cadena} and m.idcomunity='{$comid}'");
if(!mysql_num_rows($sqluserz)){
	die('1: <div class="emptyData">No hay miembros suspendidos en la comunidad</div>');
}
echo'1: ';
while($rowu=mysql_fetch_array($sqluserz))
{
echo'<ul id="userid_'.$rowu['id'].'">
<li class="resultBox">
<h4><a href="/perfil/'.$rowu['nick'].'" title="Perfil de '.$rowu['nick'].'">'.$rowu['nick'].'</a></h4>
<div class="floatL avatarBox">
<a href="/perfil/'.$rowu['nick'].'" title="Perfil de '.$rowu['nick'].'">
<img width="75px" height="75px" src="'.$rowu['avatar'].'" onerror="error_avatar(this)" /></a></div>
<div class="floatL infoBox">
<ul><li>Rango: <strong>'.rangocomunidad($rowu['rangoco']).'</strong></li>
<li>Sexo: <strong>'.sexcom($rowu['sexo']).'</strong></li>
<li><a href="/mensajes/a/'.$rowu['nick'].'" title="Enviar mensaje">Enviar mensaje</a></li>';
if($rap['rangoco']==5 or $rap['rangoco']==4){
if($rowu['nick']!=$_SESSION['user']){echo'
<li><a href="javascript:com.admin_users(\''.$rowu['id'].'\');" title="Administrar al usuario">Administrar</a></li>';}}
echo'
</ul></div></li></ul>';
}
mysql_free_result($sqluserz);
?>