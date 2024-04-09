<?php
require_once('header.php');
$session = $_SESSION['id'];
$idc = (int) xss(no_i($_GET['id']));
$keyc = (int) xss(no_i($_GET['key']));
$titulo	=	$descripcion;
cabecera_normal();

if(empty($session)){
fatal_error('Logueate');}

if(empty($idc) or empty($keyc)){
fatal_error('Falta informaci&oacute;n','Centro de mensajes','location.href=\'/mensajes/\'');}

$rs = mysql_query("SELECT * FROM carpmp WHERE id='$idc' AND user_creator='$session'");

if(!mysql_num_rows($rs)){
fatal_error('Hubo un error al eliminar la carpeta ','Centro de mensajes','location.href=\'/mensajes/\'','Error');}else{
$rowp = mysql_fetch_array($rs);

mysql_query("UPDATE mensajes SET id_carpeta='0' WHERE id_carpeta='".$rowp['id']."'");

mysql_query("DELETE FROM carpmp WHERE id='$idc' AND user_creator='$session'");

fatal_error('La carpeta fue eliminada','Centro de mensajes','location.href=\'/mensajes/\'','OK');}
?>