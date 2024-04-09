<?php
include('header.php');
$id_session = xss(no_i($_GET["k"]));

$sqlve = mysql_query("SELECT id_extreme FROM usuarios Where id_extreme='".$id_session."'");
$sqlver = mysql_fetch_array($sqlve);

$titulo=$descripcion;
cabecera_normal();

if($sqlver){
	mysql_query("UPDATE usuarios SET activacion='1' Where id_extreme = '".$id_session."'");
	$titulo_error="Enhorabuena!";
	$mensaje_error="Tu cuenta fue habilitada, ahora puedes ingresar a t&uacute; cuenta";
	$boton_error="Ir a la P&aacute;gina Principal";
	$url_error="/";
	error();
}else{
	echo'<script>window.location.href="http://www.zincomienzo.net/"</script>';}
pie();
?>