<?php
include("header.php");
$minuto = time()-60;
$key = $_SESSION['id'];
/***********************************/

$sql = mysql_query("SELECT * FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id = '$key'") or die(mysql_error());
if(mysql_num_rows($sql)) {die("FLOOD"); }else{ mysql_query("UPDATE usuarios SET ultimaaccion2 = unix_timestamp() WHERE id = '$key'");

echo'OK';}
echo mysql_num_rows($sql);
//Soy re pete ._.
?>