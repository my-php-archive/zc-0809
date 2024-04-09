<?php
include("header.php");
$titulo	=	$descripcion;

$key = $_SESSION['id'];
$theme = xss(no_i($_POST["theme"]));




mysql_query("Update usuarios Set theme='{$theme}' Where id='$key'");

echo'<font size="4"><font color="red"><b>Su tema seleccionado se cambio.</b></font></font>';

?>