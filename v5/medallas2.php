<?php
require_once("header.php");

$n2 = time();


//Administrador
$sql = "SELECT * FROM usuarios WHERE rango='755'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Causa'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Causa';
$medalla = 'medalla-oro';
$detalles = 'Logr&oacute;';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";	
	
mysql_query($sql);

}}
//Fin Administrador
















?>