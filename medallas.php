<?php
require_once("header.php");

$n2 = time();


//Administrador
$sql = "SELECT * FROM usuarios WHERE rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Administrador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Administrador';
$medalla = 'medalla-255';
$detalles = 'Logr&oacute; el rango de administrador';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";	
	
mysql_query($sql);

}}
//Fin Administrador


//Moderador
$sql = "SELECT * FROM usuarios WHERE rango='100' or rango='255' or rango='755'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Moderador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Moderador';
$medalla = 'medalla-100';
$detalles = 'Logr&oacute; el rango de moderador';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Fin Moderadores

//Gold Users
$sql = "SELECT * FROM usuarios WHERE rango='16' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Gold User'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Gold User';
$medalla = 'medalla-diamante';
$detalles = 'Distinguido como Gold User por una acci&oacute;n especial';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Fin Gold Users

//Silver Users
$sql = "SELECT * FROM usuarios WHERE rango='15' or rango='16' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Silver User'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Silver User';
$medalla = 'medalla-platino';
$detalles = 'Distinguido como Silver User por una acci&oacute;n especial';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Fin silver Users

//Great Users
$sql = "SELECT * FROM usuarios WHERE rango='15' or rango='16' or rango='14' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Great User'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Great User';
$medalla = 'medalla-great-user';
$detalles = 'Distinguido como Great User por una acci&oacute;n especial';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Fin Great Users

//Full Users
$sql = "SELECT * FROM usuarios WHERE rango='13' or rango='14' or rango='15' or rango='16' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Full User'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Full User';
$medalla = 'medalla-oro';
$detalles = 'Distinguido como Full User por una acci&oacute;n especial';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Fin Full Users

//New Full Users
$sql = "SELECT * FROM usuarios WHERE rango='12' or rango='13' or rango='14' or rango='15 'or rango='16' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='New Full User'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'New Full User';
$medalla = 'medalla-plata';
$detalles = 'Distinguido como New Full User por Puntuacion Requerida';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Fin New Full Users

//Novatos
$sql = "SELECT * FROM usuarios WHERE rango='11' or rango='12' or rango='13' or rango='14' or rango='15' or rango='16' or rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Novato'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Novato';
$medalla = 'medalla-bronce';
$detalles = 'Distinguido como Novato por Inscripcion a Zincomienzo';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
		//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";	
mysql_query($sql);

}}
//Fin Novatos

//Zincomienzo! Team
$sql = "SELECT * FROM usuarios WHERE rango='100' or rango='255'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Zincomienzo! Team'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Zincomienzo! Team';
$medalla = 'medalla-bronce';
$detalles = 'Premio consuelo para el Staff de Zincomienzo!';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Zincomienzo! Team


//Usuario Puntuado
$sql = "SELECT * FROM usuarios WHERE puntos>='250'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Puntuado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Puntuado';
$medalla = 'medalla-bronce';
$detalles = 'Distinguido como Usuario Puntuado Por Tener <b> 250</b> Puntos';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usuario Puntuado





//Usuario Top Puntuado
$sql = "SELECT * FROM usuarios WHERE puntos>='500'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Top Puntuado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Top Puntuado';
$medalla = 'medalla-plata';
$detalles = 'Distinguido como Usuario Puntuado Por Tener M&aacute;s de<b> 500</b> Puntos';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";	
mysql_query($sql);

}}
//Usuario Top Puntuado


//Usuario Top mas Puntuado
$sql = "SELECT * FROM usuarios WHERE puntos>='1000'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Top m&aacute;s Puntuado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Top M&aacute;s Puntuado';
$medalla = 'medalla-oro';
$detalles = 'Distinguido como Usuario m&aacute;s Puntuado Por Tener M&aacute;s de<b> 1000</b> Puntos';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usuario Top Mas Puntuado


//Usuario Top mas Puntuado de la historia
$sql = "SELECT * FROM usuarios WHERE puntos>='2000'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Top m&aacute;s Puntuado de la historia'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Top m&aacute;s Puntuado de la historia';
$medalla = 'medalla-diamante';
$detalles = 'Distinguido como Usuario Top m&aacute;s Puntuado de la historia por Tener M&aacute;s de <b>2000</b> Puntos';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";	
mysql_query($sql);

}}
//Usuario Top Mas Puntuado



//Usuario Comentador
$sql = "SELECT * FROM usuarios WHERE numcomentarios>='50'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Comentador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Comentador';
$medalla = 'medalla-bronce';
$detalles = 'Distinguido como Usuario Comentador por Tener <b>50</b> Comentarios';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usuario Comentador


//Usuario Muy Comentador
$sql = "SELECT * FROM usuarios WHERE numcomentarios>='100'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Muy Comentador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Muy Comentador';
$medalla = 'medalla-plata';
$detalles = 'Distinguido como Usuario Muy Comentador por Tener <b>100</b> Comentarios';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usuario Muy Comentador



//Usuario Compulsivamente Comentador
$sql = "SELECT * FROM usuarios WHERE numcomentarios>='200'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Compulsivamente Comentador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Compulsivamente Comentador';
$medalla = 'medalla-oro';
$detalles = 'Distinguido como Usuario Compulsivamente Comentador por Tener <b>200</b> Comentarios';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usuario Compulsivamente Comentador


//Usuario mas Comentador de la historia
$sql = "SELECT * FROM usuarios WHERE numcomentarios>='200'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario m&aacute;s Comentador de la historia'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario m&aacute;s Comentador de la historia';
$medalla = 'medalla-diamante';
$detalles = 'Distinguido como Usuario Compulsivamente Comentador por Tener M&aacute;s de <b>300</b> Comentarios';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usuario Compulsivamente Comentador


//Usuario Posteador
$sql = "SELECT * FROM usuarios WHERE numposts>='50'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Posteador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Posteador';
$medalla = 'medalla-bronce';
$detalles = 'Distinguido como Usuario Posteador por Tener <b>50</b> post';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usuario Posteador


//Usario Muy Posteador
$sql = "SELECT * FROM usuarios WHERE numposts>='100'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Muy Posteador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Muy Posteador';
$medalla = 'medalla-plata';
$detalles = 'Distinguido como Usuario Muy Posteador por Tener <b>100</b> post';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usuario Muy Posteador


//Usuario Top Mas Posteador
$sql = "SELECT * FROM usuarios WHERE numposts>='200'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Top Mas Posteador'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Top Mas Posteador';
$medalla = 'medalla-oro';
$detalles = 'Distinguido como Usuario Top m&aacute;s Posteador por tener M&aacute;s de <b> 200</b> Post';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usuario Top Mas Posteador


//Usuario Top mas Posteador de la historia
$sql = "SELECT * FROM usuarios WHERE numposts>='300'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usuario Top m&aacute;s Posteador de la historia");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usuario Top m&aacute;s Posteador de la historia';
$medalla = 'medalla-diamante';
$detalles = 'Distinguido como Usuario Top m&aacute;s Posteador de la historia por Tener M&aacute;s de <b> 300</b> Post';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usuario Top mas Posteador de la historia


//Usario Seguido
$sql = "SELECT * FROM usuarios WHERE seguidores>='25'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Seguido'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Seguido';
$medalla = 'medalla-bronce';
$detalles = 'Distinguido como Usario Seguido por Tener <b>25</b> Seguidores';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usario Mas Seguido


//Usario Mas Seguido
$sql = "SELECT * FROM usuarios WHERE seguidores>='50'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Mas Seguido'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Mas Seguido';
$medalla = 'medalla-plata';
$detalles = 'Distinguido como Usario m&aacute;s Seguido por Tener <b>50</b> Seguidores';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usario Mas Seguido



//Usario muy Seguido
$sql = "SELECT * FROM usuarios WHERE seguidores>='100'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario muy Seguido'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario muy Seguido';
$medalla = 'medalla-oro';
$detalles = 'Distinguido como Usario muy Seguido por Tener <b>100</b> Seguidores';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usario muy Seguido


//Usario Compulsivamente Seguido
$sql = "SELECT * FROM usuarios WHERE seguidores>='200'";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='Usario Compulsivamente Seguido'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'Usario Compulsivamente Seguido';
$medalla = 'medalla-diamante';
$detalles = 'Distinguido como Usario Compulsivamente Seguido por Tener <b>200</b> Seguidores';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) VALUES ('$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Usario Compulsivamente Seguido


//top post mas comentado del mes

$sql = "SELECT * FROM posts WHERE comentarios>='500' AND fecha2 BETWEEN '$fechames' AND unix_timestamp()";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
$id_post = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='TOP Post Mensual Mas Comentado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'TOP Post Mensual Mas Comentado';
$medalla = 'medalla-platino';
$detalles = 'Cre&oacute; el post m&aacute;s comentado del Mes';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (id_posts, medalla, causa, fecha, usuario, detalles) VALUES ('$id_post', '$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Fin top post mas comentado del mes

//top post mas puntuado del mes

$sql = "SELECT * FROM posts WHERE puntos>='500' AND fecha2 BETWEEN '$fechames' AND unix_timestamp()";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
$id_post = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='TOP Post Mensual Mas Puntuado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'TOP Post Mensual Mas Puntuado';
$medalla = 'medalla-platino';
$detalles = 'Cre&oacute; el post m&aacute;s puntuado del Mes';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (id_posts, medalla, causa, fecha, usuario, detalles) VALUES ('$id_post', '$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Fin top post mas puntuado del mes 

//top post mas comentado de la semana

$sql = "SELECT * FROM posts WHERE comentarios>='100'  AND fecha2 BETWEEN '$fusemana' AND unix_timestamp()";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
$id_post = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND causa='TOP Post Semanal Mas Comentado'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'TOP Post Semanal Mas Comentado';
$medalla = 'medalla-oro';
$detalles = 'Cre&oacute; el post m&aacute;s comentado de la Semana';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (id_posts, medalla, causa, fecha, usuario, detalles) VALUES ('$id_post', '$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		
mysql_query($sql);

}}
//Fin top post mas comentado de la semana

//top post mas puntuado de la semana

$sql = "SELECT * FROM posts WHERE puntos>='100' AND fecha2 BETWEEN '$fusemana' AND unix_timestamp()";
$rs = mysql_query($sql);
while($row = mysql_fetch_array($rs))
{
$autor = $row['id_autor'];
$id_post = $row['id'];

$sqlp=$db->query("SELECT id FROM medallas where usuario='$autor' AND id_posts='$id_post'");
$existep=$db->num_rows($sqlp);
if($existep==0){
$tipo = 'TOP Post  Semanal Mas Puntuado';
$medalla = 'medalla-oro';
$detalles = 'Cre&oacute; el post m&aacute;s puntuado de la Semana';
	//insetamos la medalla :D
	$db->query("INSERT INTO medallas (id_posts, medalla, causa, fecha, usuario, detalles) VALUES ('$id_post', '$medalla', '$tipo', unix_timestamp(), '$autor', '$detalles')");
	//insetamos la notificacion
	$db->query("INSERT INTO notificaciones (id_autor, id_user, id_post, id_tema, id_comuni, puntos, detalle, detalle2, medalla, concepto, fecha, estatus) VALUES ('1', '$autor', '1', '1', '1', '', 'icon-medallas', 'medal', '$medalla', '$tipo', '$n2', '1')");
        //Avisamos De La Notificacion
	$sql = "Update usuarios Set notificaciones=notificaciones+'1' where id='".$autor."' ";		//insetamos la notificacion
	
mysql_query($sql);

}}
//Fin top post mas puntuado de la semana
?>