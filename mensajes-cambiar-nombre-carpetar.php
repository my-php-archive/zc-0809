<?php
require_once('header.php');
$session = $_SESSION['id'];
$idc = (int) xss(no_i($_GET['id']));
$keyc = (int) xss(no_i($_GET['key']));
$namec = xss(no_i($_GET['carpeta']));
$titulo	=	$descripcion;
cabecera_normal();

if(empty($session)){
fatal_error('Logueate');}

if(empty($idc)){
fatal_error('Falta informaci&oacute;n','Centro de mensajes','location.href=\'/mensajes/\'');}

if(empty($idc)){
fatal_error('Falta informaci&oacute;n','Centro de mensajes','location.href=\'/mensajes/\'');}

if(empty($namec)){
fatal_error('Falta informaci&oacute;n','Centro de mensajes','location.href=\'/mensajes/\'');}

$rs = mysql_query("SELECT * FROM carpmp WHERE id='$idc' AND user_creator='$session'");

if(!mysql_num_rows($rs)){
fatal_error('Hubo un error al efectuar la operaci&oacute;n','Centro de mensajes','location.href=\'/mensajes/\'');}else{
$rowp = mysql_fetch_array($rs);

mysql_query("UPDATE carpmp SET name='$namec' WHERE id='$idc' AND user_creator='$session'");

fatal_error('Cambios aceptados','Centro de mensajes','location.href=\'/mensajes/\'','Confirmaci&oacute;n');}
?>