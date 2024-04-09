<?php
include("../header.php");
$key = $_SESSION['id'];
$comid = xss(no_i($_POST['comid']));

if(empty($key)){
	die("0: Tenes que estar logueado para realizar esta acci&oacute;n");
}

if(empty($comid)){
	die("0: El campo <b>ID de la Comunidad</b> es requerido para esta operaci&oacute;n");
}

$q1=mysql_query("SELECT * FROM c_miembros WHERE iduser='{$key}' AND idcomunity='{$comid}' AND rangoco='5' and estado='0'");
if(!mysql_num_rows($q1)){
	die("0: Tenes que ser parte de la Comunidad o no tienes rango");
}else{
$sqlfin=mysql_query("Update c_comunidades SET eliminado='1' WHERE idco='{$comid}'");
die("4: Jejejeje");}
?>