<?php
require_once("header.php");
$sesion  = $_SESSION['id'];
$id_post = htmlspecialchars($_POST['postid'], ENT_QUOTES);
$id_user = htmlspecialchars($_POST['key'], ENT_QUOTES);
$fecha = time();
$detalle = 'sprite-star';
$Xetalle = 'post-favorite';

	$sql = "SELECT id_autor FROM posts WHERE id='".$id_post."'";
    $rs = mysql_query($sql,$con);
    $row = mysql_fetch_array($rs);
    $receptor = $row['id_autor'];
	
if($id_user==$receptor){
echo "0";
echo "  No podes agregar tus propios posts a favoritos";
}
else{
if ($id_user!=null)
{
if ($id_user==$sesion)
{
$sql = "SELECT id FROM favoritos WHERE id_post=".$id_post." AND id_usuario=".$id_user;
$rs = mysql_query($sql);
if (mysql_num_rows($rs)<=0)
{
if ($id_user!=$receptor){
$sql = "INSERT INTO notificaciones (id_autor, id_user, id_post, detalle, detalle2, fecha, estatus) VALUES ('$id_user', '$receptor', '$id_post', '$detalle', '$Xetalle','$fecha','1')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
mysql_query("Update usuarios Set notificaciones=notificaciones+'1' where id='".$receptor."' ");
}
$sql = "INSERT INTO favoritos (id_post, id_usuario, fecha) VALUES ('$id_post', '$id_user', '$fecha')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);

mysql_query("Update posts Set favoritos=favoritos+1 WHERE id='$id_post' ");

 //  Agregar Accion
$p = mysql_query("SELECT p.id, p.titulo, c.link_categoria, c.id_categoria
                 FROM (posts AS p, categorias AS c)
                 WHERE p.id = {$id_post} and p.categoria = c.id_categoria");
$p = mysql_fetch_object(($p));
$href2 = "/posts/{$p->link_categoria}/{$p->id}/".corregir($p->titulo).".html";

$tipo_ac = tipo_accion("favoritos-post");
mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$id_user}','{$tipo_ac}','Agreg&#243; a favoritos <a href=\"$href2\" >".urlencode($p->titulo)."</a>',unix_timestamp(),'')");


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