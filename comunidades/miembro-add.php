<?php
function limpia($var){
	$var = strip_tags($var); //esto te libra de los xss x)
	$malo = array("\\",";","\'","'"); // dami emo, aqui pones caracteres no permitidos x)
	$i=0;$o=count($malo);
	while($i<=$o){
		$var = str_replace($malo[$i],"",$var);
		$i++;
	}
	return $var;
}

function LimpiarTodo($datos){
	if(is_array($datos)){
		$datos = array_map('limpia',$datos);
	}else{
	   header("location: http://www.dozzu.com/");
		die();
	}
	return $datos;	
}
if($_POST)  $_POST =& LimpiarTodo($_POST);
if($_GET)   $_GET =& LimpiarTodo($_GET);
 
include("../header.php");
$key = $_SESSION['id'];
$comid = (int)$_POST['comid'];
$aceptar = no_injection($_POST['aceptar']);

if(empty($key)){
	die("0: Tenes que estar logueado para realizar esta accion");
}

if(empty($comid)){
	die("0: El campo <b>ID de la Comunidad</b> es requerido para esta operacion");
}

$pmico=$db->query("SELECT * FROM c_suspendidos WHERE idusersu='{$key}' and idcomusu='{$comid}'");

if($db->num_rows($pmico)){
	die("0: No podes ingresar a esta comunidad ya que fuiste suspendido de la misma");
}

$pmico=$db->query("SELECT * FROM c_miembros WHERE iduser='{$key}' and idcomunity='{$comid}'");

if($db->num_rows($pmico)){
	die("0: Ya estas en esta comunidad deja de pasarte de listo");
}

$comunisql     = $db->query("SELECT idco,rango_default,shortname,nombre FROM c_comunidades WHERE idco='{$comid}'");
$co            = $db->fetch_array($comunisql);
$rango         = $co['rango_default'];
$rango_default = rangocomunidad($rango);

if($aceptar == "1"){

$href2 = "/comunidades/{$co['shortname']}/";

$tipo_ac = tipo_accion("unio-comunidad");
mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$key}','{$tipo_ac}','Se Uni&#243; a la comunidad <a href=\"$href2\">".urlencode($co['nombre'])."</a>',unix_timestamp(),'')");

    $db->query("INSERT INTO c_miembros (iduser, idcomunity, rangoco, fechaco) VALUES('$key','$comid','$rango', unix_timestamp())");
    $db->query("UPDATE c_comunidades SET numm=numm+'1' WHERE idco='{$comid}'");
    die("1: Felicitaciones!<br> Te has unido a la comunidad");
}
echo'3: &iquest;Realmende deseas ser miembro de esta comunidad?<br>Tu rango dentro de la comunidad ser&aacute;: <b>'.$rango_default.'</b>';
?>