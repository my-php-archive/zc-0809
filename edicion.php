<?php
include("header.php");
$id_user = $_SESSION['id'];
$id = no_injection(xss($_GET["id"]));
$key = xss($_POST["key"]);
$titulo = xss($_POST["titulo"]);
$tags = xss(htmlentities(trim(guardartags($_POST['tags']))));
$cuerpo = xss($_POST["cuerpo"]);
$categoria = xss($_POST["categoria"]);
$privado = xss($_POST["privado"]);
$coments = xss($_POST["coments"]);
$causa   = xss($_POST["causa"]);
$fecha= time();

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id_user."'"));
$rango = $sqlrango['rango'];

if($id_user!=null)
{
$sqlautor = mysql_fetch_array(mysql_query("SELECT elim, id_autor FROM posts where id='".$id."'"));
$id_autor2 = $sqlautor['id_autor'];
$elim = $sqlautor['elim'];

if($id_autor2==$id_user or $rango==255 or $rango==655 or $rango==755 or $rango==100)
{

$sql = "Update posts Set titulo='$titulo', contenido='$cuerpo', privado='$privado', coments='$coments', categoria='$categoria', tags='$tags' Where id='$id'"; 	
mysql_query($sql);

if($rango==255 or $rango==100 or $rango==655 or $rango==755)
{
$accion = 2;
$sql = "INSERT INTO posts_eliminados (causa, accion, id_post, id_modera, fecha) ";
$sql.= "VALUES ('$causa', '$accion', '$id', '$key', '$fecha')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error());
$ult_id = mysql_insert_id($con);
}
cabecera_normal();
$titulo_error	=	"Hecho!";
$mensaje_error	=	"El post ha sido modificado satisfactoriamente! IMPORTANTE: Los cambios ser&aacute;n aplicados en menos de 1 minuto.";
$boton_error	=	"Ir a la p&aacute;gina principal";
error();
pie();
}
}
?>