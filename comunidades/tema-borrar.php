<?php
require_once("../header.php");
$conectado = $_SESSION['id'];
$temaid = xss(no_i($_POST['temaid']));
$causa = xss(no_i($_POST['causa']));
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

$sql = "SELECT * FROM c_miembros WHERE iduser='{$conectado}' AND idcomunity='{$comunidad}'";
$rs = mysql_query($sql);
$rngc = mysql_fetch_array($rs);

$sql = "SELECT idco, nombre,shortname FROM c_comunidades WHERE idco='{$comunidad}'";
$rs = mysql_query($sql);
$comu = mysql_fetch_array($rs);
$caca = $comu['shortname'];
$sqlq = "INSERT INTO comhis VALUES (NULL,'$temaid','$caca','$key','$causa',0)";
mysql_query($sqlq) or die(mysql_error());

if ($autor==$conectado or $rngc['rangoco']==5 or $rngc['rangoco']==4){

mysql_query("Update c_temas Set elimte='1' Where idte='{$temaid}'");
mysql_query("Update c_comunidades Set numte=numte-'1' Where idco='{$comunidad}'");

if ($autor!=$conectado){
$asunto  = 'Tema Eliminado: '.$titulo.'';
$contenido = '
Lamento contarte que tu tema titulado [b]'.$titulo.'[/b] ha sido eliminado de la comunidad [b]'.$comu['nombre'].'[/b] 

Causa: [b]'.$causa.'[/b]

Por favor, la proxima vez que cree una comunidad lea antentamente el [b][url='.$url.'/protocolo]Protocolo de Comunidades[/url][/b].

Muchas gracias por entender!';

$sql = "INSERT INTO mensajes (id_emisor, id_receptor, asunto, contenido, fecha) ";
$sql.= "VALUES ('$conectado', '$autor', '$asunto', '$contenido', NOW())";
mysql_query($sql);}


mysql_close();
die("1: El tema fue eliminado satisfactoriamente");}else{die("0: No puedes borrar este tema por que no te pertenece");}
?>