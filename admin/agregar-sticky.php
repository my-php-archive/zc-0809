<?php
require_once("../header.php");

$id_user = $_SESSION['id'];
$user = $_SESSION['user'];

$id = xss(no_i($_POST['idpost']));
$termina = xss(no_i($_POST['termina']));

$sql = "SELECT rango ";
$sql.= "FROM usuarios where id='$id_user' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if ($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755"){

	if (trim($id)!=""){

		$sql2 = "SELECT sticky ";
		$sql2.= "FROM posts where id='$id'";
		$rs2 = mysql_query($sql2);
		$row = mysql_fetch_array($rs2);
	    $onsticky = $row['sticky'];
if($onsticky==null){

			$sql2 = "Update posts Set sticky='on' where id='$id' ";
            mysql_query($sql2);

echo"   El ID <b>{$id}</b> se ha Agregado a Sticky";
}else{
echo"   El ID Post <b>{$id}</b> ya esta Stickeado";}}
}else{
echo"   No Tienes Rango Para Esta Seccion";}
?>