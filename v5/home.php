<?php
require_once("header.php");

$user = xss(no_i($_POST['nick']));
$pass = xss(no_i($_POST['pass']));
$ajax = xss(no_i($_POST['ajax']));

if($user!=null && $pass!=null && $ajax!=null)
{
$pass = md5($pass);
// Comprobamos los datos
$query = mysql_query("SELECT id, activacion, ban, password FROM usuarios WHERE nick = '".$user."'") or die(mysql_error());
if ($data = mysql_fetch_array($query))
{
if($data['password'] == $pass) 
{
if($data["activacion"] == 1)
{
if($data["ban"]==0)
{
$ip = no_i($_SERVER['REMOTE_ADDR']);

$id_extreme = md5(uniqid(rand(), true));
$_SESSION['user'] = $user;
$_SESSION['id'] = $data['id'];
$_SESSION['id2'] = $id_extreme;
// Crea la cookie y actualiza le nonce (md5 aleatorio para hacerlo m&#225;s seguro.)
$id_extreme2 = $data["id"]."%".$id_extreme."%".$ip;
setcookie('id_extreme', $id_extreme2, time()+7776000,'/');
$query = mysql_query("UPDATE usuarios SET id_extreme = '$id_extreme' WHERE nick = '$user'");
echo "1==";
}
else
{
echo "2==Tu cuenta se encuentra suspendida\n <B>Causa:</B>";
}
}
else
{
echo "0==Activa tu Usuario";
}
}
else
{
echo "0==Datos no validos";
}
}
else
{
echo "0==Datos no validos";
}
mysql_close();
?>
<?php
}
else
{
echo "Faltan datos";
}
?>