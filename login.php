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

$baneo	=	"SELECT *
			FROM suspendidos
			WHERE nick='$user'";
$bane	=	mysql_query($baneo, $con);
$bane2	=	mysql_fetch_array($bane);

function ToUnix($string){
   $string = str_replace("/","-",$string);
    return strtotime($string);
}

  $baneo = $bane2['fecha2']; 
 $dia = 60*60*24; 
  $baneo2 = $baneo*$dia;
 $fechaone = ToUnix($bane2['fecha1']);
  $fechaone2 = $fechaone;
   
  if(date("d/m/Y",$baneo2+$fechaone2) == date("d/m/Y") and is_numeric($bane2['fecha2'])){
    mysql_query("UPDATE usuarios SET ban = 0 WHERE nick = '$user'");
	mysql_query("DELETE FROM suspendidos WHERE nick = '$user'");
}
   

if($data["ban"]=='1' and date("d/m/Y",$baneo2+$fechaone2) !== date("d/m/Y")){

    /*
	* Desarrollado por timbalentimba...
	*  Puto el que lee
	*/





	echo'2: 

<font color="red"><b>Tu cuenta se encuentra suspendida</b></font>
<p align=left>
<b>Causa:</b> '.$bane2['causa'].'
<br/><b>Fecha:</b> '.$bane2['fecha1'].'
<br/><b>Duraci&oacute;n:</b> '.(!is_numeric($bane2['fecha2']) ? 'Indefinido' : $bane2['fecha2'].' Dia/s');
 echo '<br> <b>Rehabilitacion el :</b> '.date("d/m/Y",$baneo2+$fechaone2);

die();
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