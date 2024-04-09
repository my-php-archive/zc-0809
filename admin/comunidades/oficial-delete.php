<?php
require_once("../../header.php");

$moderador = $_SESSION['user'];
$id = xss(no_i($_POST['id']));

$sql = "SELECT rango FROM usuarios where nick='$moderador' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){

$sql = "UPDATE c_comunidades SET oficial='0' WHERE idco='$id'";
mysql_query($sql);
            
die("1");
}else{
echo '   No Tienes Rango';
die("0");}
?>