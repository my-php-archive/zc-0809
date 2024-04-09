<?php
require_once("../header.php");

$id = xss(no_i($_POST['id']));

if($rangodg=="255"){

mysql_query("UPDATE websfriends SET elim='1' WHERE id='$id'");
            
echo'1';}else{die("0: No Tienes Rango");}
?>