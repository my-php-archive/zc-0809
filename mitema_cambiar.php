<?php
include("header.php");
$titulo	=	$descripcion;

$key = $_SESSION['id'];
$tema = xss(no_i($_POST["tema"]));

if($key==null){
fatal_error('Para editar tu tema debes autentificarte');
}


mysql_query("Update usuarios Set tema='{$tema}' Where id='$key'");

echo'<b><font color="red">El Banner Se Subio Correctamente!</fon></b>';

?>