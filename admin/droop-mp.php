<?php
require_once("../header.php");

$moderador = $_SESSION['user'];
$id_mensaje = xss(no_i($_POST['id_mensaje']));

$rs = mysql_query("SELECT rango FROM usuarios WHERE nick='$moderador'", $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){

mysql_query("DELETE FROM mensajes WHERE id='$id_mensaje'");
            
echo '1';
}else{
echo '0';
echo '   No Tienes Rango';}
?>