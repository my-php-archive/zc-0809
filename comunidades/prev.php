<?php
include("../header.php");
/* CODIGO */
$id	=	no_injection($_GET['id']);
$idcom = no_injection($_GET['com_id']);

$sqldult=$db->query("SELECT t.*,c.* FROM c_temas as t, c_comunidades as c WHERE t.idte='$id' AND t.idcomunid='$idcom' AND c.idco='$idcom'");
$resultado=$db->fetch_array($sqldult);

$sqldult2=$db->query("SELECT t.*,c.* FROM c_temas as t, c_comunidades as c WHERE t.fechate<'".$resultado['fechate']."' AND t.idcomunid='$idcom' AND c.idco='$idcom'");
$resultado2=$db->fetch_array($sqldult2);
$mensn=$db->num_rows($sqldult2);

if($mensn != 0){
Header("Location: ".$url."/comunidades/".$resultado2['shortname']."/".$resultado2['idte']."/".corregir($resultado2['titulo']).".html");
}else{
cabecera_comunidad();
$titulo	=	$descripcion;
$titulo_error	=	"Oops";
$mensaje_error	=	"Eso es todo amigos. Ese fue el &uacute;ltimo tema...";
$boton_error	=	"Ver Otras comunidades";
error();
pie();
}
?>