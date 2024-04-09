<?php
require_once("../header.php");

$id_user = $_SESSION['id'];
$respid = xss(no_i($_POST['respid']));
$key = xss(no_i($_POST['key']));
$comunidad = (int) xss(no_i($_POST['comid']));
$temaid = (int) xss(no_i($_POST['temaid']));

if(empty($id_user)){
	die("0: Tenes que estar logueado para realizar esta acci&oacute;n");
}

if(empty($temaid)){
	die("0: El campo <b>ID del tema</b> es requerido para esta operaci&oacute;n");
}

if(empty($respid)){
	die("0: El campo <b>ID respuesta</b> es requerido para esta operaci&oacute;n");
}

$quest=mysql_query("SELECT cr.idautorre, ct.id_autor
				   FROM c_temas ct, c_respuestas cr
				   WHERE cr.idautorre='$id_user'
				   AND cr.idtemare='$temaid'
				   AND ct.idte='$temaid'");
$row=mysql_fetch_array($quest);

$id_autor = $row['id_autor'];

$rs = mysql_query("SELECT idcomunid FROM c_temas WHERE idte='{$temaid}'");
$soad = mysql_fetch_array($rs);

$comunidad = $soad['idcomunid'];

$sql = "SELECT * FROM c_miembros WHERE iduser='$id_user' AND idcomunity='$comunidad'";
$rs = mysql_query($sql);
$rngc = mysql_fetch_array($rs);

if($rngc['rangoco']=='5' or $rngc['rangoco']=='4' or $row['id_autor']==$id_user or $row['idautorre']==$id_user){
mysql_query("DELETE FROM c_respuestas WHERE idre='$respid'");
mysql_query("UPDATE c_temas SET numco=numco-'1' WHERE idte='$temaid'");
die("1");}
else{die("0: Tu rango no te permite realizar esta operaci&oacute;n");}
?>