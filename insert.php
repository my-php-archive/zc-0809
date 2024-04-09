<?php
include("header.php");

$id_posts = $_POST['idposts'];
$medalla = $_POST['medalla'];
$causa = $_POST['causa'];
$fecha = $_POST['fecha'];
$usuario = $_POST['usuario'];
$detalles = $_POST['detalles'];

mysql_query(”INSERT INTO medallas (idposts, medalla, causa, fecha, usuario, detalles, apellido)
VALUES (’{$idposts}’,  ’{$medalla}’,  ’{$causa}’,  ’{$fecha}’,  ’{$usuario}’,  ‘{$detalles}’)”, $conexion);
if (!$insertar) {
die(”Fallo en la insercion de registro en la Base de Datos: ” . mysql_error());
}

?>