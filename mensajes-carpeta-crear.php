<?php
require_once('header.php');
$session = $_SESSION['id'];
$name = xss(no_i($_POST['carpeta_nombre']));
$titulo	=	$descripcion;
cabecera_normal();

if(empty($name)){
fatal_error('Faltan datos');}

mysql_query("INSERT INTO carpmp(name, user_creator, fecha) VALUES ('$name','$session',unix_timestamp())");

fatal_error('La carpeta fue creada','Centro de mensajes','location.href=\'/mensajes/\'','OK');
?>