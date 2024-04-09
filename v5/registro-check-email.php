<?php
include("header.php");
$email = xss(no_i($_POST['email']));

$pmico=mysql_query("SELECT mail FROM usuarios WHERE mail='{$email}'");
if(mysql_num_rows($pmico)){
	die("0: El Mail ya est&aacute; en uso");
}
die("1: OK");
?>
