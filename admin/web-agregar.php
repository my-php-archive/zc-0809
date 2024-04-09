<?php
require_once("../header.php");

$moderador = $_SESSION['user'];
$weburl = xss(no_i($_POST['url']));
$webname = xss(no_i($_POST['nombre']));
$webicon = xss(no_i($_POST['icono']));

$sql = "SELECT rango ";
$sql.= "FROM usuarios where nick='$moderador' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];
$weburl = $row['url'];
$webname = $row['nombre'];
$webicon = $row['icono'];
if ($rango=="255"){

$sql = "INSERT INTO webs_amigas (url,nombre,icono)";
$sql.= "VALUES ('$weburl','$webname','$webicon')";
mysql_query($sql);

echo '   <b>'.$webname.'</b> Ha Sido Agregada Como Web Amiga';
}else{
	echo '   El Sitio <b>'.$webname.'</b> Ya Ha Sido Agregada Como Web Amiga';

	echo '   No Tienes Rango';
}
?>
