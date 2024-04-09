<?php
require_once("../header.php");
$conectado = $_SESSION['id'];
$temaid = xss(no_i($_POST['temaid']));
$key    = xss(no_i($_POST['key']));

if(empty($conectado)){
	die("0: Tenes que estar logueado para realizar esta acci&oacute;n");
}

if(empty($temaid)){
	die("0: El campo <b>ID del tema</b> es requerido para esta operaci&oacute;n");
}

$sql = "SELECT id_autor, idcomunid, titulo, idte FROM c_temas WHERE idte='{$temaid}'";
$rs = mysql_query($sql);
$row = mysql_fetch_array($rs);

$autor = $row['id_autor'];
$titulo = $row['titulo'];
$comunidad = $row['idcomunid'];

function GetShortC($id)
{
  $sql = mysql_query("SELECT * FROM c_comunidades WHERE idco = '{$id}'");
  $comu = mysql_fetch_assoc($sql);
  return $comu['shortname'];
}

$caca = GetShortC($comunidad);
$sqlq = "INSERT INTO comhis VALUES (NULL,'$temaid','$caca','$conectado','-',3)";
mysql_query($sqlq) or die(mysql_error());

$sql = "SELECT * FROM c_miembros WHERE iduser='{$conectado}' AND idcomunity='{$comunidad}'";
$rs = mysql_query($sql);
$rngc = mysql_fetch_array($rs);

if ($rngc['rangoco']==5 or $rngc['rangoco']==4){
$sql = "Update c_temas Set elimte='0' Where idte='{$temaid}'";
mysql_query($sql);

mysql_query("Update c_comunidades Set numte=numte+'1' Where idco='{$comunidad}'");
mysql_close();
die("1: El tema fue reactivado satisfactoriamente");}else{die("0: No puedes realizar esta operaci&oacute;n");}
?>