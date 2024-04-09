<?php
require_once("../header.php");

$moderador = $_SESSION['user'];
$id = xss(no_i($_POST['id']));

$rs = mysql_query("SELECT rango FROM usuarios WHERE nick='$moderador'", $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="255" or $rango=="655" or $rango=="755"){

mysql_query("DELETE FROM contacto WHERE id='$id'");
            
echo '1';
}else{
echo '0';
echo '   No Tienes Rango';}
?>