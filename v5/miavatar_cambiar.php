<?php
include("header.php");
$titulo	=	$descripcion;

$key = $_SESSION['id'];
$avatar = xss(no_i($_POST["avatar"]));

if($key==null){
fatal_error('Para editar tu avatar debes autentificarte');
}

if(empty($avatar)){
fatal_error('Error faltan datos');
}
mysql_query("Update usuarios Set avatar='{$avatar}' Where id='$key'");

echo'<img src="/images/cambiazo.png">';

?>