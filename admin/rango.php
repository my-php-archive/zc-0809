<?php
require_once("../header.php");

$moderador = $_SESSION['user'];
$nombre = xss(no_i($_POST['nombre']));
$rng = xss(no_i($_POST['email']));

$sql = "SELECT rango ";
$sql.= "FROM usuarios WHERE nick='$moderador' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="255" or $rango=="655" or $rango=="755"){

if($moderador!=$nombre){

	$spl = "SELECT * from rangos WHERE id_rango='$rng'";
    $rs4 = mysql_query($spl,$con);

if(mysql_num_rows($rs4)!=0){

	$sql3 = "select * from usuarios where nick='$nombre' ";
    $rs3 = mysql_query($sql3,$con);

if (mysql_num_rows($rs3)>0){

$sql = "Update usuarios set rango='$rng' where nick='$nombre'";
mysql_query($sql);

echo '   El usuario <b>'.$nombre.'</b> Ha Sido Cambiado de Rango';
}else{
echo '   No Existe el Usuario <b>'.$nombre.'</b>';}
}else{
echo '   No existe ese rango :|';}
}else{
echo '   CHAN!!! No Puedes Autocambiarte el rango';}
}else{
echo '   No Tienes Rango Sufuiciente para realizar esta operaci&oacute;n';}
?>