<?php
require_once("header.php");

$user = no_i($_POST['nick']);
$pass = no_i($_POST['pass']);

if(empty($user) or empty($pass)){
	die('0: Faltan Datos');
}
$pass = md5($pass);
// Comprobamos los datos
$query = mysql_query("SELECT id, activacion, ban FROM usuarios WHERE nick = '".$user."' and password = '".$pass."'") or die(mysql_error());

if (!$data = mysql_fetch_array($query)){
	die('0: Datos no validos');
}

if($data["activacion"] != '1'){
	die('0: Activa Tu Usuario');
}
if($data["ban"]=='1'){
$baneo	=	"SELECT *
			FROM suspendidos
			WHERE nick='$user'";
$bane	=	mysql_query($baneo, $con);
$bane2	=	mysql_fetch_array($bane);
	die('2: <span class="color_red"><b>Tu cuenta se encuentra suspendida</b></span> <div style="text-align: left;"> <br/><B>Causa:</B> '.$bane2['causa'].'
<br/><B>Fecha:</B> '.$bane2['fecha1'].'
<br/><B>Baneado Por:</B> '.$bane2['modera'].'</div>');
}

$ip = no_i($_SERVER['REMOTE_ADDR']);

$id_A = md5(uniqid(rand(), true));
$_SESSION['user'] = $user;
$_SESSION['id'] = $data['id'];
$_SESSION['id2'] = $id_A;

$id_B = $data["id"]."%".$id_A."%".$ip;
setcookie('id_extreme', $id_B, time()+7776000,'/');
$query = mysql_query("UPDATE usuarios SET id_extreme = '$id_A' WHERE nick = '$user'");

echo'1:';
?>