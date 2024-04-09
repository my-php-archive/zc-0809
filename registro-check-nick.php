<?php
include("header.php");
$name = xss(no_i($_POST['nick']));

$pmico=mysql_query("SELECT nick FROM usuarios WHERE nick='{$name}'");
if(mysql_num_rows($pmico)){
	die("0: El nick ya est&aacute; en uso");
}
die("1: El nick esta disponible");
?>
