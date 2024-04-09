<?php
include("../header.php");
$comid = xss(no_i($_GET['comid']));
$key=$_SESSION['id'];

if($key==null){
	die("0: Tenes que estar logueado para realizar esta acci&oacute;n");
}

$cronj=mysql_query("SELECT * FROM c_miembros WHERE iduser='$key' AND idcomunity='$comid'");
$rap=mysql_fetch_array($cronj);

if($rap['rangoco']==3 or $rap['rangoco']==2 or $rap['rangoco']==1){
	die("0: Tu rango no te permite realizar esta operaci&oacute;n");
}

if(empty($comid)){
	die("0: Faltan Datos");
}
$sqluserz=mysql_query("SELECT s.*,us.nick 
FROM c_suspendidos s 
LEFT JOIN usuarios us ON us.id=s.idusersu
WHERE s.idcomusu='{$comid}' ORDER BY s.idsu DESC");

if(!mysql_num_rows($sqluserz)){
	die('1: <div class="emptyData">No hay nada en el historial de administraci&oacute;n</div>');
}
$dia=86400;
echo'1: ';
while($row=mysql_fetch_array($sqluserz))
{
echo'Usuario: <a href="/perfil/'.$row['nick'].'" target="_blank"><strong>'.$row['nick'].'</strong></a> ';
if($row['accionsu']==1){
	echo'<strong style="color:red">suspendido</strong> por: <a href="/perfil/'.$row['porsu'].'" target="_blank"><strong>'.$row['porsu'].'</strong></a>';
}else if($row['accionsu']==2){
	echo'cambiado de <strong style="color:blue;">rango</strong> por: <a href="/perfil/'.$row['porsu'].'" target="_blank"><strong>'.$row['porsu'].'</strong></a>';
}else if($row['accionsu']==3){
	echo'<strong style="color:green">desuspendido</strong> por: <a href="/perfil/'.$row['porsu'].'" target="_blank"><strong>'.$row['porsu'].'</strong></a>';
}
echo' el d&iacute;a: <strong>'.date('Y-m-d H:m:s',$row['fechasu']).'</strong>';
if($row['accionsu']==1){
	echo'<br />Raz&oacute;n: <strong style="color:red">'.$row['causasu'].'</strong><br />Duraci&oacute;n: ';
	if($row['diasu']==0){
		echo'<strong>Permanente</strong>';
	}else{
		echo'<strong>'.$row['diasu'].' d&iacute;as </strong> Hasta el: <strong>'.date('Y-m-d',$row['fechasu']+$row['diasu']*$dia).'</strong>';
	}
}else if($row['accionsu']==3){
	echo'<br />Raz&oacute;n: <strong style="color:green">'.$row['causasu'].'</strong>';
}
echo'<hr />';
}
mysql_free_result($sqluserz);
?>