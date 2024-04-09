<?php
require_once("../header.php");
$moderador = $_SESSION['user'];

$nombre = xss(no_i($_POST['nombre']));
$quit = xss(no_i($_POST['email']));

$sql = "SELECT rango ";
$sql.= "FROM usuarios where nick='$moderador' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="255" or $rango=="655" or $rango=="755"){
if($moderador!=$nombre){

	$sql3 = "SELECT * FROM usuarios WHERE nick='$nombre' ";
    $rs3 = mysql_query($sql3,$con);
if (mysql_num_rows($rs3)>0){

$sql = "Update usuarios set puntos=puntos-'$quit' where nick='$nombre'";
mysql_query($sql);

echo '   Al Usuario <b>'.$nombre.'</b> se le han restado <b>'.$quit.'</b> Puntos ';
}else{
echo '   No Existe el Usuario <b>'.$nombre.'</b>';}
}else{
echo '   CHAN!!! No Puedes Autoquitarte Puntos';}
}else{
echo '   No Tienes Rango Sufuiciente para realizar esta operaci&oacute;n';}
?>