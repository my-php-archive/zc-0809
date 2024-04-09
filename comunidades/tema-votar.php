<?php
include("../header.php");
$key = $_SESSION['id'];
$voto = xss(no_i($_POST['voto']));
$temaid = xss(no_i($_POST['temaid']));

if(empty($key)){
	die("0: Tenes que estar logueado para realizar esta acci&oacute;n");
}

if(empty($temaid)){
	die("0: El campo <b>ID del tema</b> es requerido para esta operaci&oacute;n");
}

$sqm=mysql_query("SELECT m.*, c.*, t.* 
                 FROM (c_miembros as m, c_comunidades as c, c_temas as t) 
				 WHERE t.idte='{$temaid}' 
				 AND t.idcomunid=m.idcomunity 
				 AND m.idcomunity=c.idco 
				 AND m.iduser='{$key}'");

if(!mysql_num_rows($sqm)){
	die("0: Tienes que ser miembro para realizar esta operaci&oacute;n");
}
$vot=mysql_fetch_array($sqm);

if($key==$vot['id_autor']){
	die("0: No podes votar tus propios temas");
}

mysql_free_result($sqm);

if($voto>'1'){die("0: Nooo no no, de a un voto por favor ;)");}
if($voto<'-1'){die("0: Nooo no no, de a un voto por favor ;)");}

if($voto=='1'){
$sqvo=mysql_query("SELECT * FROM c_voto WHERE id_tema='{$temaid}' AND user='{$key}'");
$voto=mysql_fetch_array($sqvo);
if(!mysql_num_rows($sqvo)){

$insertp=mysql_query("INSERT INTO c_voto (id_tema, user, fecha, voto) VALUES('$temaid','$key', unix_timestamp(),'$voto')");
$i=mysql_insert_id();

mysql_query("Update c_temas Set calificacion=calificacion+1 WHERE idte='{$temaid}' ");
die("1");

}else{
die("2: Ya votaste este tema");}

mysql_free_result($sqvo);
}else{

$sqvo=mysql_query("SELECT * FROM c_voto WHERE id_tema='{$temaid}' AND user='{$key}'");
$voto=mysql_fetch_array($sqvo);
if(!mysql_num_rows($sqvo)){

$insertn=mysql_query("INSERT INTO c_voto (id_tema, user, fecha, voto) VALUES('$temaid','$key', unix_timestamp(),'$voto')");
$i=mysql_insert_id();

mysql_query("Update c_temas Set calificacion=calificacion-1 WHERE idte='{$temaid}' ");
die("1");

}else{
die("2: Ya votaste este tema");}

mysql_free_result($sqvo);
}
?>