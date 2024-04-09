<?php
require_once("header.php");
$sesion  = $_SESSION['id'];
$id_post = htmlspecialchars($_POST['postid'], ENT_QUOTES);
$id_user = htmlspecialchars($_POST['key'], ENT_QUOTES);
$fecha = time();
$detalle = 'spritee-star';
$Xetalle = 'post-favoritee';

	$sql = "SELECT id_autor FROM fotos WHERE id='".$id_post."'";
    $rs = mysql_query($sql,$con);
    $row = mysql_fetch_array($rs);
    $receptor = $row['id_autor'];
	
if($id_user==$receptor){
echo "0";
echo "  No podes agregar tus propias Fotos a favoritos";
}
else{
if ($id_user!=null)
{
if ($id_user==$sesion)
{
$sql = "SELECT id FROM favoritosfotos WHERE id_post=".$id_post." AND id_usuario=".$id_user;
$rs = mysql_query($sql);
if (mysql_num_rows($rs)<=0)
{
if ($id_user!=$receptor){
$sql = "INSERT INTO notificaciones (id_autor, id_user, id_post, detalle, detalle2, fecha, estatus) VALUES ('$id_user', '$receptor', '$id_post', '$detalle', '$Xetalle','$fecha','1')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
mysql_query("Update usuarios Set notificaciones=notificaciones+'1' where id='".$receptor."' ");
}
$sql = "INSERT INTO favoritosfotos (id_post, id_usuario, fecha) VALUES ('$id_post', '$id_user', '$fecha')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);






echo "1";
echo "  Agregado a favoritos!";
}
else
{
echo "0";
echo "  Ese favorito ya lo tienes";
}
}
}}
?>