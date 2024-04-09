<?php
include("../header.php");
if($acciones=="true")
{
  echo $bd_host;
  echo'<br>';
  echo $bd_usuario;
  echo'<br>';
  echo $bd_password;
}
$titulo = $descripcion;
cabecera_normal();
fatal_error('Esta opci&oacute;n se encuentra temporalmente deshabilitada.');
?>