<?php
require_once("header.php");

$id = $_SESSION['id'];

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='$id'"));
$rango = $sqlrango['rango'];
$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
$nick = $sqlnick['nick'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){

?>