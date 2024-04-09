<?php
$id_mensaje = xss(no_i($_GET['mensaje']));
$id_user = $_SESSION['id'];	
mysql_query("Update mensajes Set leido_receptor='1' where id_mensaje='".$id_mensaje."' and id_receptor = '".$id_user."'",$con);
?>