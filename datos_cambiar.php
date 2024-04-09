<?php
include("header.php");

$id = $_SESSION['id'];
if($_SESSION['user']!=null)
{
$nombre = xss(no_i($_POST["nombre"]));

$nombre_mostrar = xss(no_i($_POST["nombre_mostrar"]));

$email = xss(no_i($_POST["email"]));

$email_mostrar = xss(no_i($_POST["email_mostrar"]));

$ciudad = xss(no_i($_POST["ciudad"]));
$dia = xss(no_i($_POST["dia"]));
$mes = xss(no_i($_POST["mes"]));
$ano = xss(no_i($_POST["ano"]));

$fecha_nacimiento_mostrar = xss(no_i($_POST["fecha_nacimiento_mostrar"]));

$sitio = xss(no_i($_POST["sitio"]));
$im = xss(no_i($_POST["im"]));

$im_mostrar = xss(no_i($_POST["im_mostrar"]));

$pais = xss(no_i($_POST["pais"]));
$sexo = xss(no_i($_POST["sexo"]));
$key = xss(no_i($_POST["key"]));

$sqlu=mysql_query("Update usuarios Set nombre='$nombre', mail='$email', ciudad='$ciudad', dia='$dia', mes='$mes', ano='$ano', sitio_web='$sitio', mensajero='$im', pais='$pais', sexo='$sexo' Where id='$id'");
$sqlu=mysql_query("Update preferencias Set nombre_mostrar='$nombre_mostrar', email_mostrar='$email_mostrar', fecha_nacimiento_mostrar='$fecha_nacimiento_mostrar', im_mostrar='$im_mostrar' Where iduser='$id'");
echo"OK";
}
?>
