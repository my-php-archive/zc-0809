<?php
include("header.php");
$titulo	=	$descripcion;

$key = $_SESSION['id'];
$theme = xss(no_i($_POST["theme"]));




mysql_query("Update usuarios Set theme='{$theme}' Where id='$key'");

echo'<font size="3"><b><center>El theme se ha cambiando y ser&aacute; 
<br>
aplicado en unos instantes.</center></b></font>';

?>