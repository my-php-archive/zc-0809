<?php
include("../header.php");
$key = $_SESSION['id'];
$comid = xss(no_i($_POST['comid']));
$nombre = xss(no_i($_POST['nombre']));
$shortname = xss(no_i($_POST['shortnamez']));
$imagen = xss(no_i($_POST['imagen']));
$pais = xss(no_i($_POST['pais']));
$categoria = xss(no_i($_POST['categoria']));
$subcategoria = xss(no_i($_POST['subcategoria']));
$descripcion = xss(no_i($_POST['descripcion']));
$privada = xss(no_i($_POST['privada']));
$tipo_val = xss(no_i($_POST['tipo_val']));
$rango_default = xss(no_i($_POST['rango_default']));
$titulo=$descripcion;
cabecera_normal();

if(empty($key)){
	fatal_error('Tenes que estar logueado');
}

$q=mysql_query("SELECT * FROM c_miembros WHERE iduser='{$key}' AND idcomunity='{$comid}' AND rangoco='5' ");

if(!mysql_num_rows($q)){
	fatal_error('Tenes que ser parte de la comunidad o no tienes rango.');
}
if(empty($nombre)){
	fatal_error('El campo <b>Nombre</b> es requerido para esta operacion','Volver','history.go(-1)');
}
if(empty($categoria)){
	fatal_error('El campo <b>Categor&#237;a</b> es requerido para esta operacion','Volver','history.go(-1)');
}
if(empty($descripcion)){
	fatal_error('El campo <b>Descripcion</b> es requerido para esta operacion','Volver','history.go(-1)');
}

if(strlen($imagen) < 7){
	fatal_error('La url ingresada en el campo <b>Imagen para mostrar</b> es incorrecta','Volver','history.go(-1)');
}
if($pais==null){
	fatal_error('El pais seleccionado es incorrecto','Volver','history.go(-1)');
}
mysql_query("UPDATE c_comunidades SET nombre='{$nombre}',imagen='{$imagen}',pais='{$pais}',categoria='{$categoria}',subcategoria='{$subcategoria}',descripcion='{$descripcion}',privada='{$privada}',tipo_val='{$tipo_val}',rango_default='{$rango_default}' WHERE idco='{$comid}'");
fatal_error('La comunidad fue editada exitosamente','Ir a la comunidad',"location.href='/comunidades/$shortname/','YEAH!!!'");
?>