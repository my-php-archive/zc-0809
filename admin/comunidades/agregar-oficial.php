<?php
require_once("../../header.php");

$id_user = $_SESSION['id'];

$short = xss(no_i($_POST['shortname']));

$sql = "SELECT rango FROM usuarios WHERE id='$id_user' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755"){

		$sql2 = "SELECT oficial FROM c_comunidades WHERE shortname='$short'";
		$rs2 = mysql_query($sql2);
		$row = mysql_fetch_array($rs2);
	    $oficial = $row['oficial'];
if($oficial=='0'){

$sql2 = "Update c_comunidades SET oficial='1' WHERE shortname='$short'";
mysql_query($sql2);

echo"   La comunidad <b>{$id}</b> ahora es una Comunidad Oficial!";
}else{
echo"   La comunidad <b>{$id}</b> ya es una Comunidad Oficial!";}
}else{
echo"   No Tienes Rango Para Esta Seccion";}
?>