<?php
include($_SERVER['DOCUMENT_ROOT']."/header.php");
include($_SERVER['DOCUMENT_ROOT'].'/session.php');
$idcoment2 = no_injection($_POST['comentario']);
$id_user = $_SESSION['id'];
$punto = no_injection($_POST['puntos']);

error_reporting(0);
switch($punto){
case "-1":
$puntitoCosito = '';
$puntosQueTieneElComentarioQMal = mysql_query("SELECT mal FROM prueba WHERE idcoment='$idcoment2'");
$puntosQueTieneElComentarioMal = mysql_fetch_array($puntosQueTieneElComentarioQMal);
$puntosDar = $puntosQueTieneElComentarioMal['mal'] + 1;
$puntoCoso = 'mal';
break;
case "1":
$puntitoCosito = '+';
$puntosQueTieneElComentarioQBien = mysql_query("SELECT bien FROM prueba WHERE idcoment='$idcoment2'");
$puntosQueTieneElComentarioBien = mysql_fetch_array($puntosQueTieneElComentarioQ);
$puntosDar = $puntosQueTieneElComentarioMal['bien'] + 1;
$puntoCoso = 'bien';
break;
default:
die('0: No se especifico la cantidad');
break;
}

$verSiEsSuComentario = mysql_query("SELECT * FROM comentarios WHERE id = '$idcoment2' and id_autor = '$id_user'");
if(mysql_num_rows($verSiEsSuComentario)){
die('0: No puedes votar tu propio comentario');
}
$verSiYaLoVoto = mysql_query("SELECT * FROM prueba WHERE idcoment='$idcoment2' AND iduser='$id_user'");
if(mysql_num_rows($verSiYaLoVoto)){
die('0: Ya votastes este comentario');
}

$hacerElCosor_r = mysql_query("INSERT INTO `prueba` (
`id` ,
`idcoment` ,
`iduser` ,
".$puntoCoso."
)
VALUES (
NULL, $idcoment2, $id_user, $puntosDar
);
");
if($hacerElCosor_r){
die('1');
} else {
die('0: Error en la consulta '.mysql_error().'');
}
?>