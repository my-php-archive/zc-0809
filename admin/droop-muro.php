<?php
require_once("../header.php");

$key = $_SESSION['id'];
$id_autor = $_SESSION['id'];
$moderador = $_SESSION['user'];
$id = xss(no_i($_POST['id']));

$rs = mysql_query("SELECT rango FROM usuarios WHERE nick='$moderador'", $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755" or $id_autor=="{$key}"){

mysql_query("DELETE FROM muroperfil WHERE id='$id'");
            
echo '1';
}else{
echo '0';
echo '   No Tienes Rango';}
?>