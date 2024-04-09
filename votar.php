<?php
require_once("header.php");
$id_user = $_SESSION['id'];
$puntos = xss(no_i($_POST["puntos"]));
$postid = xss(no_i($_POST["postid"]));
$x = xss(no_i($_POST["x"]));
$fecha = time();
$detalle = 'sprite-point';

	$sql = "SELECT id_autor FROM posts WHERE id='".$postid."'";
    $rs = mysql_query($sql,$con);
    $row = mysql_fetch_array($rs);
    $receptor = $row['id_autor'];
// Numero 10
if($puntos=="10" and $x=="434be78f65dea94d80f8430edba31d04" or $puntos=="9" and $x=="acef33bd0f2d6704272c78dce020d7ef" or $puntos=="8" and $x=="0b4d0c142964196f15d87e9b56955445" or $puntos=="7" and $x=="6f9545fe5048be9ca8c9a4094511dcab" or $puntos=="6" and $x=="22dc40b09a8fa2a7632483ee8367cc38" or $puntos=="5" and $x=="490c32c0ba97584d06b3bf099c013821" or $puntos=="4" and $x=="7de0f021e2f783e8f39dd760eaf73003" or $puntos=="3" and $x=="fbbb498bd083a93f620152abb7101340" or $puntos=="2" and $x=="b76b07c84b21cfe8d2e2d7d3a4b1871f" or $puntos=="1" and $x=="4051a35ddbaf0d04f4a3f59643e54f2a"){
if($puntos!=null && $postid!=null && $x!=null && $id_user!=null)
{



if($id_user==$receptor){
echo "0";
echo "  No puedes votar tus propios posts";
}
else{
$sqlpuntosv = "SELECT num FROM puntos WHERE id_punteador=".$id_user." AND num=".$postid;
$rspuntosv = mysql_query($sqlpuntosv,$con);
$existe = mysql_num_rows($rspuntosv);

if ($existe<=0){
$sql = "SELECT puntosdar FROM usuarios where id='".$id_user."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);
$puntosdar = $row['puntosdar'];
if($puntosdar <= 0){
    echo "0";
echo "  No Tienes Suficientes Puntos";
}
if ($puntos<=10){
	
$sql = "Update usuarios Set puntos=puntos+'".$puntos."' where id='".$receptor."'"; 	
mysql_query($sql);

$sql = "Update usuarios Set puntosdar=puntosdar-'".$puntos."' where id='".$id_user."'"; 	
mysql_query($sql);

$sql = "Update posts Set puntos=puntos+'".$puntos."' where id='".$postid."'"; 	
mysql_query($sql);

$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$receptor."' ";
mysql_query($sql);

$sql = "INSERT INTO notificaciones (id_autor, id_user, id_post, puntos, detalle, detalle2, fecha, estatus) VALUES ('$id_user', '$receptor', '$postid', '$puntos', '$detalle','post-points','$fecha','1')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);



$idc = mysql_insert_id();






$sql = "INSERT INTO puntos (num, id_punteador, puntos, fecha) VALUES ('$postid','$id_user','$puntos','$fecha')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);

echo "1";
echo "  Puntos agregados correctamente.";
}
else{
echo "0";
echo "  No Tienes Suficientes Puntos";
}
}
else{
echo "0";
echo "  No es posible votar a un mismo post mas de una vez";
}
mysql_close($con);
}
}
else
{
	echo'0: El campo <b>Puntos</b> es requerido para esta operacion';
}
}
else
{
echo "0";
echo "  C&oacute;digo de seguridad no v&aacute;lido";
}
?>