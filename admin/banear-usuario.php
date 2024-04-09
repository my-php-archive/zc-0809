<?php
require_once("../header.php");

$moderador = $_SESSION['user'];
$nombre = xss(no_i($_POST['nombre']));
$email = xss(no_i($_POST['email']));
$url = xss(no_i($_POST['url']));

$fechaActual = date("d/m/Y",time());

if(!is_numeric($url)){
   $url = "Indefinido";
}

$sql = "SELECT rango ";
$sql.= "FROM usuarios where nick='$moderador' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){

if($moderador!=$nombre){

	$sql3 = "select * from usuarios where nick='$nombre' ";
    $rs3 = mysql_query($sql3,$con);

    if (mysql_num_rows($rs3)>0)
    {
        $sql2 = "select * from suspendidos where nick='$nombre' and activo='1' ";
		$rs2 = mysql_query($sql2,$con);
		if (!mysql_num_rows($rs2)>0)
		{
$sql = "INSERT INTO suspendidos (nick,modera,causa,fecha1,fecha2,activo)";
$sql.= "VALUES ('$nombre','$moderador','$email','$fechaActual','$url','1')";
mysql_query($sql);

$sql = "Update usuarios set ban='1' where nick='$nombre'";
mysql_query($sql);

echo '   El usuario <b>'.$nombre.'</b> ha sido suspendido';
}else{
	echo '   El usuario <b>'.$nombre.'</b> ya se encuentra suspendido';
}
}else{
	echo '   No existe el usuario <b>'.$nombre.'</b> ';
}
}else{
	echo '   No puedes auto-suspenderte';
}
}else{
	echo '   No tienes rango';
}

?>