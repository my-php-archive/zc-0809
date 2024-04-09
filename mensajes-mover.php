<?php
include('header.php');
$titulo	= $descripcion;
cabecera_index();
$id_session = $_SESSION['id'];
$carpet = (int) xss(no_i($_GET['carpeta']));
$mp = (int) xss(no_i($_GET['ids']));
$id_user = (int) xss(no_i($_GET['key']));
$titulo = $descripcion
?><?php

if(empty($id_session)){
fatal_error('Logueate');}

if(empty($mp) or empty($carpet)){
fatal_error('Falta informaci&oacute;n','Centro de mensajes','location.href=\'/mensajes/\'');}

$rs = mysql_query("SELECT * FROM carpmp WHERE id='$carpet' AND user_creator='$id_session'");

if(!mysql_num_rows($rs)){

fatal_error('Hubo un error al efectuar la operaci&oacute;n','Centro de mensajes','location.href=\'/mensajes/\'','Error');}else{
$rowp = mysql_fetch_array($rs);

mysql_query("UPDATE mensajes SET id_carpeta='$carpet' WHERE id_mensaje='$mp' AND id_receptor='$id_session'");

fatal_error('Cambios aceptados','Centro de mensajes','location.href=\'/mensajes/\'','OK');}
?>