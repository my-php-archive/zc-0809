<?php
require_once("header.php");
$sesion  = $_SESSION['id'];
$id_post = xss(no_i($_POST['postid']));
$id_user = xss(no_i($_POST['key']));
$fecha = time();
$detalle = 'sprite-star';

	$sql = "SELECT id_autor FROM posts WHERE id='".$id_post."'";
    $rs = mysql_query($sql,$con);
    $row = mysql_fetch_array($rs);
    $receptor = $row['id_autor'];
	
	
if ($id_user!=null)
{
if ($id_user==$sesion)
{
$sql = "SELECT id FROM favoritos WHERE id_post=".$id_post." AND id_usuario=".$id_user;
$rs = mysql_query($sql);
if (mysql_num_rows($rs)<=0)
{

$sql = "INSERT INTO notificaciones (id_autor, id_user, id_post,  detalle, fecha, estatus) VALUES ('$id_user', '$receptor', '$id_post', '$detalle','$fecha','1')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);

$sql = "INSERT INTO favoritos (id_post, id_usuario, fecha) VALUES ('$id_post', '$id_user', '$fecha')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);
mysql_query("Update usuarios Set notificaciones=notificaciones+'1' where id='".$receptor."' ");
mysql_query("Update posts Set favoritos=favoritos+1 WHERE id='$id_post' ");
echo "1";
echo "  Agregado a favoritos!";
}
else
{
echo "0";
echo "  Ese favorito ya lo tienes";
}
}
}
?>