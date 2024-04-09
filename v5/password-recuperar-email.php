<?php
include('header.php');
$titulo = $descripcion;
cabecera_normal();
$id = no_i($_POST["id"]);
$password1 = no_i($_POST["password1"]);
$password2 =no_i($_POST["password2"]);
if(empty($password1) or empty($password2)){
fatal_error('Faltan datos','Volver','history.back()');}
if($password1==$password2){
$passwordnuevo = md5($password2);
$id_extreme = md5(uniqid(rand(), true));
mysql_query("UPDATE usuarios SET id_extreme='$id_extreme', password='$passwordnuevo' WHERE id='$id'");
fatal_error('La contrase&ntilde;a fue cambiada','Ir a la p&aacute;gina principal','location.href=\'/\'','Confirmaci&oacute;n');
}else{
fatal_error('Las claves son diferentes','Volver','history.go(-1)','Error');}
pie();
?>