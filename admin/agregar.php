<?php
require_once("../header.php");

$moderador = $_SESSION['user'];
$nombre = xss(no_i($_POST['nombre']));
$agr = xss(no_i($_POST['email']));

$sql = "SELECT rango ";
$sql.= "FROM usuarios where nick='$moderador' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if ($rango=="255" or $rango=="655" or $rango=="755"){

if($moderador!=$nombre){

	$sql3 = "select * from usuarios where nick='$nombre' ";
    $rs3 = mysql_query($sql3,$con);

if (mysql_num_rows($rs3)>0){

$sql = "Update usuarios set puntos=puntos+'$agr' where nick='$nombre'";
mysql_query($sql);

echo '   Al Usuario <b>'.$nombre.'</b> se le han agregado <b>'.$agr.'</b> Puntos ';
}else{
echo '   No Existe el Usuario <b>'.$nombre.'</b>';}
}else{
echo '   CHAN!!! No Puedes Autopuntuarte';}
}else{
echo '   No Tienes Rango Sufuiciente para realizar esta operaci&oacute;n';}
?>