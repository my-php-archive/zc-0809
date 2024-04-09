<?php
require_once("header.php");

$user = (int) $_POST['user'];
$bloqueado = (int) $_POST['bloqueado'];

if($key==null){
	die("0: Logueate");
}
if($key==$user){
	die("0: No puedes blockearte a ti mismo");
}

if(empty($user)){
	die("0: El campo <b>ID del usuario</b> es requerido para esta operacion");
}

$sqlb = mysql_query("SELECT b_user FROM bloqueados WHERE b_user = '{$user}' AND b_iduser = '{$key}' ");
$existe = mysql_num_rows($sqlb);

if ($bloqueado){
	if($existe){
		die("0: Este Usuario ya se encuentra Bloqueado");
	}
	mysql_query("INSERT INTO bloqueados (b_user, b_iduser) VALUES ('$user', '$key')");
	die("1: El usuario fue bloqueado satisfactoriamente");
} else {
	if(!$existe){
		die("0: Este Usuario no se encuentra Bloqueado");
	}
	mysql_query("DELETE FROM bloqueados WHERE b_user = '{$user}' AND b_iduser = '{$key}' ");
	die("1: El usuario fue desbloqueado satisfactoriamente");
}
?>
