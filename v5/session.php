<?php session_start();
$ip = $_SERVER["REMOTE_ADDR"];
$val_0_to_255 = "(25[012345]|2[01234]\d|[01]?\d\d?)";  
$reg = "#^($val_0_to_255\.$val_0_to_255\.$val_0_to_255\.$val_0_to_255)$#";  
if(!preg_match($reg, $ip, $matches)){
die('Kakerrrrr.');}

require_once("header.php");
// Comprobamos si existe sesión
if(isset($_SESSION['user'])) 
{
	$user=no_i($_SESSION['user']);
	$sql = "SELECT id_extreme, ban FROM usuarios WHERE nick='$user'";
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
	if($data['ban']!=0 or $data['id_extreme'] != $_SESSION['id2'] )
	{
		$_SESSION['user'] = null;
		$_SESSION['id'] = null;
		$_SESSION['id2'] = null;
		unset($_SESSION);
		session_destroy();
	}
}
//Comprobamos si hay cookie, si está bien y le asignamos una sesión
if(isset($_COOKIE['id_extreme'])) 
{
   	$cookie = no_i($_COOKIE['id_extreme']);
  	$cookie = explode("%",$cookie);
	$user = $cookie[0];
	$id = $cookie[1];
	$ip = $cookie[2];
	$ip2 = no_i($_SERVER['REMOTE_ADDR']);
	if($ip == $ip2) {
		$query = mysql_query("SELECT * FROM usuarios WHERE id_extreme='".$id."' and id='".$user."'") or die(mysql_error());
   		$data = mysql_fetch_array($query);
   		mysql_free_result($query);
   		if(isset($data['nick']) and $data['ban'] == 0 ) {
      		$_SESSION['user'] = $data['nick'];
			$_SESSION['id'] = $data['id'];
			$_SESSION['id2'] = $data['id_extreme'];
			return true;
   		}
	}
}
?>