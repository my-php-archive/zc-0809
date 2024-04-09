<?php
require_once("../header.php");

$id_user    =   $_SESSION['id'];
$nombre	=	xss(no_i($_POST['nombre']));
$email		=	xss(no_i($_POST['email']));
$telefono		=	xss(no_i($_POST['telefono']));
$horario		=	xss(no_i($_POST['horario']));
$empresa		=	xss(no_i($_POST['empresa']));
$link		=	xss(no_i($_POST['url']));
$comentarios		=	xss(no_i($_POST['comentarios']));

$envdenun=mysql_query("INSERT INTO c_denuncias (sesionid, nombre, email, telefono, horario, empresa, url, comentarios, fecha) VALUES ('{$id_user}','{$nombre}','{$email}','{$telefono}','{$horario}','{$empresa}','{$link}','{$comentarios}', unix_timestamp())");
$insert=mysql_insert_id();
?>

Su denuncia ha sido enviada con &eacute;xito.<br><br>
Pr&oacute;ximamente la Administraci&oacute;n del sitio estar&aacute; revis&aacute;ndola.<br><br>
De ser necesario nos pondremos en contacto con Usted.<br><br>
Muchas gracias.